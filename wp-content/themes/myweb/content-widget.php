<div class="item">
	<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
	<a href="<?php the_permalink(); ?>" class="post-img">
		<img src="<?php if($imagem[0]){ echo $imagem[0]; } ?>" alt="">
	</a>

	<div class="post-info">
		<div class="container-info">
			<h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<span class="categoria"><?php the_category(' '); ?></span>
		</div>
	</div>
</div>