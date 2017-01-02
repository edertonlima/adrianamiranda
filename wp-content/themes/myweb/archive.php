<?php get_header(); ?>

<session class="list-categoria post-list">
	<div class="container">

		<header class="categoria-header">
			<span class="subTit">CATEGORIA</span><h2>
			<h2><?php the_archive_title(); ?></h2>			
			<?php the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
		</header><!-- .page-header -->

		<div class="row">
			<div class="col-8">
				
				<?php if ( have_posts() ) :

					while ( have_posts() ) : the_post();
						get_template_part( 'content','list');
					endwhile;

					// Previous/next page navigation.
					the_posts_pagination( array(
						'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
						'next_text'          => __( 'Next page', 'twentyfifteen' ),
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
					) );

				else :
					get_template_part( 'content', 'none' );

				endif; ?>

			</div>
			<div class="col-4">
				<?php include 'sidebar.php'; ?>
			</div>
		</div>

	</div>
</session>

<?php get_footer(); ?>