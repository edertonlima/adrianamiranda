<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php

?>
<?php 
	$titulo = '';
	$descricao = get_field('descricao', 'option');
	$imgPage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
	$page = get_page_by_path('sobre-mim');
	$imagem = get_field('imagem_perfil',$page->ID);
	$url = get_home_url();

	if(is_category()){ 
		$category= get_queried_object(); //print_r($category);
		$infoCategoria = get_the_category($category->term_id); //print_r($infoCategoria);
		$titulo = $infoCategoria[0]->name.' - ';
		$descricao = $infoCategoria[0]->description;
		//$imagem = '';
		$url = $url.'/'.$infoCategoria[0]->slug;
	}

	if(is_page()){
		if(!is_home()){
			$titulo = get_the_title().' - ';
			if(get_field('descrição') != ''){
				$descricao = get_field('descrição');
			}
			if($imgPage[0] != ''){
				$imagem = $imgPage[0];	
			}			
			$url = get_the_permalink();
		}
	}

	if(is_single()){
		$titulo = get_the_title().' - ';
		if(get_field('descrição') != ''){
			$descricao = get_field('descrição');
		}
		if($imgPage[0] != ''){
			$imagem = $imgPage[0];	
		}			
		$url = get_the_permalink();
	}

	$titulo = $titulo.get_bloginfo('name'); 
	$autor = get_bloginfo('name');
?>

<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="shortcut icon" href="<?php the_field('favicon', 'option'); ?>" type="image/x-icon" />
<link rel="icon" href="<?php the_field('favicon', 'option'); ?>" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="pt" />
<meta name="rating" content="General" />
<meta name="description" content="<?php echo $descricao; ?>" />
<meta name="keywords" content="" />
<meta name="robots" content="index,follow" />
<meta name="author" content="<?php echo $autor; ?>" />
<meta name="language" content="pt-br" />
<meta name="title" content="<?php echo $titulo; ?>" />

<!-- SOCIAL META -->
<meta itemprop="name" content="<?php echo $titulo; ?>" />
<meta itemprop="description" content="<?php echo $descricao; ?>" />
<meta itemprop="image" content="<?php echo $imagem; ?>" />

<html itemscope itemtype="<?php echo $url; ?>" />
<link rel="image_src" href="<?php echo $imagem; ?>" />
<link rel="canonical" href="<?php echo $url; ?>" />

<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo $titulo; ?>" />
<meta property="og:type" content="article" />
<meta property="og:description" content="<?php echo $descricao; ?>" />
<meta property="og:image" content="<?php echo $imagem; ?>" />
<meta property="og:url" content="<?php echo $url; ?>" />
<meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>" />
<meta property="fb:admins" content="<?php echo $autor; ?>" />
<meta property="fb:app_id" content="1205127349523474" /> 

<meta name="twitter:card" content="summary" />
<meta name="twitter:url" content="<?php echo $url; ?>" />
<meta name="twitter:title" content="<?php echo $titulo; ?>" />
<meta name="twitter:description" content="<?php echo $descricao; ?>" />
<meta name="twitter:image" content="<?php echo $imagem; ?>" />
<!-- SOCIAL META -->

<title><?php echo $titulo; ?></title>

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css" media="screen" />

<!-- JQUERY -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-2.2.3.min.js"></script>
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

					<?php $page = get_page_by_path('home'); ?>
					<li class="<?php if(is_page($page->ID)){ echo 'ativo'; } ?>"><a href="<?php echo get_home_url(); ?>" title="HOME">HOME</a></li>
					<li class="<?php if(is_category()){ echo 'ativo'; } ?>">
						<a href="javascript:" title="">CATEGORIAS <i class="fa fa-angle-down"></i></a>

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

					<?php $page = get_page_by_path('sobre-mim'); ?>
					<li class="<?php if(is_page($page->ID)){ echo 'ativo'; } ?>"><a href="<?php echo get_page_link($page->ID); ?>" title="<?php echo get_the_title($page->ID); ?>"><?php echo get_the_title($page->ID); ?></a></li>

					<?php $page = get_page_by_path('contato'); ?>
					<li class="<?php if(is_page($page->ID)){ echo 'ativo'; } ?>"><a href="<?php echo get_page_link($page->ID); ?>" title="<?php echo get_the_title($page->ID); ?>"><?php echo get_the_title($page->ID); ?></a></li>
				</ul>

				<?php include 'social.php'; ?>

			</div>
		</nav>

		<h1 class="logo"><a href="<?php echo get_home_url(); ?>" alt="<?php bloginfo( 'name' ); ?>">
			<img src="<?php the_field('logo','option'); ?>" alt="<?php bloginfo( 'name' ); ?>">
		</a></h1>
	</header>