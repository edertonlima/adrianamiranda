<ul class="social">
	<li>Compartilhar: </li>
	<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); ?>
	<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
	<li><a href="https://twitter.com/home?status=<?php the_title(); echo '%0a'; bloginfo('name'); echo '%0a'; echo gera_url_encurtada(get_the_permalink()); ?>" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
	<li><a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo $imagem[0]; ?>&description=<?php the_title(); ?>" title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i></a></li>
	<li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&summary=<?php the_field('descrição'); ?>&source=Notumn" title="LinkedIn" target="_blank"><i class="fa fa-linkedin"></i></a></li>
	<li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" title="Google+" target="_blank"><i class="fa fa-google-plus"></i></a></li>
</ul>