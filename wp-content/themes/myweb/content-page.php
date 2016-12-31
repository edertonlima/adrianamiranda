<article class="post">

	<header class="post-header">
		<div class="container-info">
			<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<span class="post-date" title="2016-10-06 21:32:47"><?php the_date(); ?></span>
		</div>
	</header>

	<div class="conteudo-post">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

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
		
		<?php include 'social.php'; ?>
					
		<span class="likes">
			<a href="#" class="" title="">
				<i class="fa fa-heart" aria-hidden="true"></i>
				<span class="zilla-likes-count">10</span>
			</a>
		</span>
	</footer>

</article><!-- #post-## -->
