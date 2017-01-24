<?php 
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
    //wp den çağrılma önce deaktif sonra sil çıkıyor o zaman bu kodlar çağrılıyor
    if(!defined('WP_UNINSTALL_PLUGIN')){
	exit;
    }
    if(get_option("wpig_settings") !== false) {
	delete_option("wpig_settings");
    }
?>