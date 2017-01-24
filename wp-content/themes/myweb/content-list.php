<article class="item">
	<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
	<a class="img" href="<?php the_permalink(); ?>" class="">
		<img src="<?php if($imagem[0]){ echo $imagem[0]; } ?>" alt="">
	</a>

	<header class="post-info">
		<div class="container-info">
			<span class="categoria"><?php the_category(' '); ?></span>
			<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

			<div class="post-footer">
				<?php /*
				<span class="comentarios">
					<a href="#">
						<i class="fa fa-comments-o"></i> 0
					</a>
				</span>
				*/ ?>
				<span class="post-date" title="2016-10-06 21:32:47"><?php the_date(); ?></span>
				<?php /*<span class="post-likes">
					<a href="#" class="zilla-likes active" id="zilla-likes-90" title="You already like this">
						<i class="fa fa-heart" aria-hidden="true"></i>
						<span class="zilla-likes-count">10</span>
					</a>
				</span>*/ ?>
			</div>
		</div>
	</header>
	
	<?php if(is_category()){ ?>
		<div class="post-body">
			<p><?php the_field('descrição'); ?></p>
			<a href="<?php the_permalink(); ?>" title="Continue lendo">Continue lendo</a>
		</div>
	<?php } ?>

</article>