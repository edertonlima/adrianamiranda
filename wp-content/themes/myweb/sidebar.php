<div class="sidebar widget-block">
	<div class="row content-block">

		<div class="col-12 categorias">
			<h3>CATEGORIAS</h3>
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
					foreach ( $categories as $category ){
						echo '<li><a href="'. esc_url(get_category_link($category->term_id)) .'" title="">'. $category->name .'</a> ('.$category->category_count.')</li>';
					}
				?>
			</ul>
		</div>

		<div class="col-12 ultimos">
			<h3>ÚLTIMAS PUBLICAÇÕES</h3>
		    <?php
		        $getPosts = array(
		            'post_type'   => 'post',
		            'post_status' => 'any',
		            'orderby'     => date,
		            'order'       => 'DESC',
		            'posts_per_page' => '5',
		        );
		        $posts = new WP_Query( $getPosts );
		        if(count($posts) > 0){
					while($posts->have_posts()) : $posts->the_post(); 
						get_template_part( 'content-widget', get_post_format() );
					endwhile;
		        }
		    ?>
		</div>

	</div>
</div>