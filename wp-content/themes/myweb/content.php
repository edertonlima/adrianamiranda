<article class="post">

	<header class="post-header">
		<div class="container-info">
			<span class="categoria"><?php the_category(' '); ?></span>
			<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<span class="post-date" title="2016-10-06 21:32:47"><?php the_date(); ?></span>
		</div>
	</header>

	<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); ?>
	<img src="<?php if($imagem[0]){ echo $imagem[0]; } ?>" alt="<?php the_title(); ?>" class="image-post">

	<div class="conteudo-post">
		<?php if(is_front_page()){ ?>
			<p><?php the_field('descrição'); ?></p>
		<?php }else{
			the_content();
		} ?>
	</div>
	
	
	<div class="leia-mais">
		<?php if(is_front_page()){ ?>
			<a href="<?php the_permalink(); ?>" title="Continue lendo">Continue lendo</a>
		<?php } ?>
	</div>

	<footer class="post-footer">
		<?php /* if(is_single()){ ?>
			<span class="autor">
				<a href="#">
					por <?php the_author(); ?>
				</a>
			</span>
		<?php }else{ ?>
			<span class="comentarios">
				<a href="#">
					<i class="fa fa-comments-o"></i> 0
				</a>
			</span>
		<?php } ?>
		</span>	*/ ?>
		
		<?php include 'social-share.php'; ?>
					
		<?php /*<span class="likes">
			<a href="#" class="" title="">
				<i class="fa fa-heart" aria-hidden="true"></i>
				<span class="zilla-likes-count">10</span>
			</a>
		</span> */?>
	</footer>
</article>