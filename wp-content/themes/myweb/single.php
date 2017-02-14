<?php get_header(); ?>

<session class="post-det">
	<div class="container">

		<div class="row">
			<div class="col-8 content-page">

				<?php while ( have_posts() ) : the_post();

					get_template_part( 'content', get_post_format() ); ?>

					<?php /* if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif; */ ?>
					
					<?php the_post_navigation( array(
						'prev_text' => '<span class="prev"><i class="fa fa-long-arrow-left"></i> %title</span>',
						'next_text' => '<span class="next">%title <i class="fa fa-long-arrow-right"></i></span>',
					)); ?>

				<?php endwhile; ?>

			</div>
			<div class="col-4 content-sidebar">
				<?php include 'sidebar.php'; ?>
			</div>
		</div>

	</div>
</session>

<?php get_footer(); ?>
