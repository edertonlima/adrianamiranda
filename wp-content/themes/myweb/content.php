<article class="post">

	<header class="post-header">
		<div class="container-info">
			<span class="categoria"><?php the_category(' '); ?></span>
			<h2><a href="#" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<span class="post-date" title="2016-10-06 21:32:47"><?php the_date(); ?></span>
		</div>
	</header>

	<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); ?>
	<img src="<?php if($imagem[0]){ echo $imagem[0]; } ?>" alt="" class="image-post">

	<div class="conteudo-post">
		<?php the_content(); ?>

		<div class="leia-mais">
			<a href="#">Continue lendo</a>
		</div>
	</div>

	<footer class="post-footer">
		<span class="comentarios">
			<a href="#">
				<i class="fa fa-comments-o"></i> 0
			</a>
		</span>	
		<ul class="social">
			<li><a href="http://youtube.com" title="Youtube" target="_blank"><i class="fa fa-youtube"></i></a></li>
			<li><a href="http://instagram.com" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a></li>
			<li><a href="http://facebook.com" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
		</ul>			
		<span class="likes">
			<a href="#" class="" title="">
				<i class="fa fa-heart" aria-hidden="true"></i>
				<span class="zilla-likes-count">10</span>
			</a>
		</span>
	</footer>
</article>