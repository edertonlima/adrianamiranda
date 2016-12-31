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

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css" media="screen" />

<!-- JQUERY -->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/owl.carousel.min.js"></script>

<script type="text/javascript">

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

	});	

</script>

</head>
<body <?php body_class(); ?>>

	<header class="header">
		<nav class="nav">
			<div class="container">
				<ul class="menu">
					<li class="<?php if(is_home()){ echo 'ativo'; } ?>"><a href="<?php echo get_home_url(); ?>" title="HOME">HOME</a></li>
					<li class="<?php if(is_category()){ echo 'ativo'; } ?>">
						<a href="javascript://" title="">CATEGORIAS <i class="fa fa-angle-down"></i></a>

						<ul>
							<?php
								$args = array(
								    'taxonomy'      => 'category',
								    'parent'        => 0, // get top level categories
								    'orderby'       => 'name',
								    'order'         => 'ASC',
								    'hierarchical'  => 1,
								    'pad_counts'    => 0
								);

								$categories = get_categories( $args );
								if(is_category()){ $category_active = get_the_category(); }
								foreach ( $categories as $category ){
									if(is_category()){ 
										if($category->term_id == $category_active[0]->term_id){
											$class_category = 'ativo';
										}else{
											$class_category = '';
										}
									}
									echo '<li class="'.$class_category.'"><a href="'. esc_url(get_category_link($category->term_id)) .'" title="">'. $category->name .'</a></li>'; //print_r($category);
								}
							?>

						</ul>

					</li>
					<li><a href="<?php echo get_page_link(2); ?>" title="<?php echo get_the_title(2); ?>"><?php echo get_the_title(2); ?></a></li>
				</ul>

				<?php include 'social.php'; ?>

			</div>
		</nav>

		<h1 class="logo"><a href="<?php echo get_home_url(); ?>" alt="<?php bloginfo( 'name' ); ?>">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php bloginfo( 'name' ); ?>">
		</a></h1>
	</header>