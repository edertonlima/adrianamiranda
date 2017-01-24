<?php

/*
  Plugin Name:	Instapress Gallery
  Plugin URI:
  Description:	This plugin utilizes lightbox and creates a instagram post gallery
  Version:  1.0
  Author:   TileApps
  Author URI:	https://plus.google.com/u/1/115340233246038441651
  License:  GPLv2
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
//load css and js files of lightbox to wp
add_action("wp_enqueue_scripts", "wpig_js_css");

function wpig_js_css() {
    //lightbox css
    wp_enqueue_style("lightbox_css", plugins_url("css/lightbox.css", __FILE__));
    //bootstrap
    wp_enqueue_style("bootstrap_css", plugins_url("css/bootstrap.min.css", __FILE__));
    //jquery before and then lightbox
    wp_register_script("lightbox_js", plugins_url("js/lightbox.js", __FILE__), array('jquery'));
    wp_enqueue_script("lightbox_js");
    wp_enqueue_script("bootstrap_js", plugins_url("js/bootstrap.min.js", __FILE__));
}

//add admin css to admin panel
add_action("admin_enqueue_scripts", "wpig_admin_js_css");

function wpig_admin_js_css() {
    //wpig style.css
    wp_enqueue_style("wpig_style", plugins_url("css/style.css", __FILE__));
    //wpig main.js
    wp_register_script("wpig_main", plugins_url("js/main.js", __FILE__), array('jquery'));
    wp_enqueue_script("wpig_main", plugins_url("js/main.js", __FILE__));
}

//add shortcode 
add_shortcode("wpig", "wpig_gallery");

function wpig_gallery($atts) {
    $options = get_option("wpig_settings");
    $gallery = $options['gallery'];
    $i = 0;
    $output = "<div class='image-set row'>";
    foreach ($gallery['images'] as $g) {
	    
	$output .= 
		'<div class="col-xs-'. 12 / $gallery['columns']. '">'
		. '<a class="image-link" href="' . urldecode($g['url']) . '" data-lightbox="roadtrip" data-title="' . $g['caption'] . '">'
		. '<img src="' . urldecode($g['url']) . '" />'
		. '</a>'
		. '</div>';
	$i++;
    }
    $output .= "</div>";
    return $output;
}

//add admin settings menu and help tabs
add_action("admin_menu", "wpig_settings_menu");

function wpig_settings_menu() {
    $options_page = add_options_page("Instapress Page", "Instapress Settings", "manage_options", "wpig-settings", "wpig_admin_page");
    if ($options_page) {
	add_action('load-' . $options_page, 'wpig_help_tabs');
    }
}

function wpig_admin_page() {
    $options = get_option("wpig_settings");
    $redirect_uri = admin_url() . "options-general.php?page=wpig-settings";
    if (isset($options['client_id']) && isset($options['client_secret'])) {
	$instagram_link = "https://api.instagram.com/oauth/authorize/?client_id=" . $options['client_id'] . "&redirect_uri=" . $redirect_uri . "&response_type=code";
    }
    if (isset($_GET['code'])) {
	$url = "https://api.instagram.com/oauth/access_token";
	$response = wp_remote_post($url, array(
	    'method' => 'POST',
	    'timeout' => 45,
	    'redirection' => 5,
	    'httpversion' => '1.0',
	    'blocking' => true,
	    'headers' => array(),
	    'body' => array(
		'client_id' => $options['client_id'],
		'client_secret' => $options['client_secret'],
		'grant_type' => 'authorization_code',
		'redirect_uri' => $redirect_uri,
		'code' => $_GET['code']
	    ),
	    'cookies' => array()
	));

	if (is_wp_error($response)) {
	    $error_message = $response->get_error_message();
	    wp_redirect(add_query_arg(array(
		'page' => 'wpig-settings',
		'error' => 1,
		'msg' => $error_message), admin_url('options-general.php'))
	    );
	    wp_die();
	} else {
	    $body = wp_remote_retrieve_body($response);
	    $result = json_decode($body);
	    if (isset($result->access_token)) {
		$options['access_token'] = $result->access_token;
		update_option("wpig_settings", $options);
	    }
	}
    }
    require "admin/settings.php";
}

function wpig_help_tabs() {
    
}

//admin gallery save ajax action

add_action("wp_ajax_" . "image_load", "wpig_load_images");

function wpig_load_images() {
    if (!current_user_can("manage_options")) {
	wp_die("Permission Denied");
    }
    $options = get_option("wpig_settings");
    $url = "https://api.instagram.com/v1/users/self/media/recent/?access_token=" . $options["access_token"] . "&count=33";
    if (!empty($_POST['next_url'])) {
	$url = $_POST['next_url'];
    }
    $response = wp_remote_post($url, array(
	'method' => 'GET',
	'timeout' => 45,
	'redirection' => 5,
	'httpversion' => '1.0',
	'blocking' => true,
	'headers' => array(),
	'cookies' => array()
    ));

    if (is_wp_error($response)) {
	$error_message = $response->get_error_message();
	wp_redirect(add_query_arg(array(
	    'page' => 'wpig-settings',
	    'error' => 1,
	    'msg' => $error_message), admin_url('options-general.php'))
	);
	wp_die();
    } else {
	$body = wp_remote_retrieve_body($response);
	$result = json_decode($body);
	$list = array("items" => array());
	if ($result->meta->code == 200) {
	    foreach ($result->data as $item) {
		if ($item->type == "image") {
		    $list["items"][] = array(
			"id" => $item->id,
			"thumbnail" => $item->images->thumbnail->url,
			"url" => $item->images->standard_resolution->url,
			"caption" => isset($item->caption) ? $item->caption->text : ""
		    );
		}
	    }
	}
	if (isset($result->pagination->next_url)) {
	    $list['next_url'] = $result->pagination->next_url;
	} else {
	    $list['next_url'] = "finished";
	}
	echo json_encode($list);
	wp_die();
    }
}

//admin settings post save
add_action("admin_init", "wpig_form_handle");

function wpig_form_handle() {
    add_action("admin_post_" . "save_wpig_options", 'process_form');
}

function process_form() {
    if (!current_user_can("manage_options")) {
	wp_die("Permission Denied");
    }
    //html nonce field
    check_admin_referer("wpig_settings");

    $options = get_option('wpig_settings');

    if (isset($_POST['client_id'])) {
	$options['client_id'] = sanitize_text_field($_POST['client_id']);
    }
    if (isset($_POST['client_secret'])) {
	$options['client_secret'] = sanitize_text_field($_POST['client_secret']);
    }

    update_option('wpig_settings', $options);

    //wp-admin/options-general.php?page=portal-calculator-settings-slug
    wp_redirect(add_query_arg(array(
	'page' => 'wpig-settings',
	'success' => 1), admin_url('options-general.php'))
    );
    exit;
}

//admin gallery images save ajax
add_action("wp_ajax_" . "gallery_save", "process_gallery_form");

function process_gallery_form() {
    if (!current_user_can("manage_options")) {
	wp_die("Permission Denied");
    }
    $options = get_option("wpig_settings");
    $postData = json_decode(str_replace("\\", "", $_POST['str_val']), true);
    $gallery = array("columns" => $postData['columns'], "images" => array());
    if (isset($postData['item_postid[]'])) {
	for ($i = 0; $i < count($postData['item_postid[]']); $i++) {
	    $gallery["images"][] = array(
		"id" => $postData['item_postid[]'][$i],
		"thumbnail" => $postData['item_thumbnail[]'][$i],
		"url" => $postData['item_url[]'][$i],
		"caption" => $postData['item_caption[]'][$i]
	    );
	}
	$options['gallery'] = $gallery;
	update_option("wpig_settings", $options);
	echo "OK";
    } else {
	echo "NOK";
    }
    wp_die();
}
