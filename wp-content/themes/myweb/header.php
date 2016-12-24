<!DOCTYPE html>
<html lang="pt-br">
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="" type="image/x-icon">
<link rel="icon" href="" type="image/x-icon">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="content-language" content="pt" />
<meta name="rating" content="General" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="robots" content="index,follow" />
<meta name="author" content="" />
<meta name="language" content="pt-br" />
<meta name="title" content="" />
<!--<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />-->

<title></title>

<?php get_header(); ?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css" media="screen" />

<!-- JQUERY -->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.3.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<!-- CSS SELECT2-->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/select2.min.css" media="screen" />
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/select2.min.js"></script>

<!-- FILE STYLE -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap-filestyle.min.js"></script>

<script type="text/javascript">

	/* MENU FIXED */
	var position = '';
	function menuFixed(position){		
		if(position > 1){
			jQuery('.header-menu').addClass('menu-fixed');
		}else{
			jQuery('.header-menu').removeClass('menu-fixed');
		}
	}

	$(document).ready(function(){

		/* OPEN/CLOSE MENU */
		$('.menu-mobile').click(function(){
			if($(this).hasClass('active')){
				$(this).removeClass('active');
				$('.nav').css('top','-100vh');
				$('.submenu').hide();
			}else{
				$(this).addClass('active');
				$('.nav').css('top','0');
			}
		});

		/* SUB MENU */
		$('.menu-item-has-children a').click(function(){
			$('.sub-menu').toggle();
		});

		/* SELECT */
		/* SELECT2 */
		$("select").select2({
			minimumResultsForSearch: 200
		});

		/* FILE STYLE */
		$("input").filestyle({buttonText: "Selecionar"});

		/* MENU FIXED */
		position = jQuery(window).scrollTop();
    	menuFixed(position);
	    jQuery(window).scroll(function(){
	    	position = jQuery(window).scrollTop();
	    	menuFixed(position);
	    });

	});	

</script>

</head>
<body>
	<header class="header">
		<session class="top-menu">
			<div class="header-menu">
				<div class="container">
					<a href="javascript:" class="menu-mobile"><span><em>X</em></span></a>
					<h1>
						<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/toplog.png" alt="Toplog"></a>
					</h1>
				</div>
			</div>			
				
			<?php 

				$pt = 'style="display: inline-block;"';
				$en = 'style="display: inline-block;"';
				$es = 'style="display: inline-block;"';

				if(qtrans_getLanguage() == 'pt'){
					$pt = 'style="display: none;"';
				}

				if(qtrans_getLanguage() == 'en'){
					$en = 'style="display: none;"';
				}

				if(qtrans_getLanguage() == 'es'){
					$es = 'style="display: none;"';
				}

				wp_nav_menu( array(
					'menu'           => 'Menu Topo',
				    'theme_location' => 'primary',
				    'items_wrap'     => '<nav class="nav"><ul class="menu"><div class="container">
				    	<li class="idioma">
				    		<a href="http://www.toplogtrade.com.br/pt" '.$pt.' title="PT">PT</a>
				    		<a href="http://www.toplogtrade.com.br/en" '.$en.' title="EN">EN</a>
				    		<a href="http://www.toplogtrade.com.br/es" '.$es.' title="ES">ES</a>
				    	</li>
				    %3$s</div></ul></nav>'
				) );
			 ?>

		</session>
	</header>