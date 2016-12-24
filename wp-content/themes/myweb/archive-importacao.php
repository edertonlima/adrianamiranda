<?php get_header(); ?>

<session class="slide-page">
    <?php
        $getSlide = array(
            'post_type' => 'post',
            'post_status' => 'any',
            'category_name' => 'importacao',
            'orderby'           => date,
            'order'             => 'ASC'
        );
        $slide = new WP_Query( $getSlide );
        if(count($slide) > 0){ ?>

			<div id="myCarousel" class="carousel slide" data-ride="carousel">

				<div class="carousel-inner" role="listbox">
					<?php while($slide->have_posts()) : $slide->the_post(); 
						$i = $i+1; 
						$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); ?>
						<div class="item <?php if($i == 1){ echo 'active'; } ?>" style="background-image: url('<?php if($imagem[0]){ echo $imagem[0]; } ?>');">
							<?php the_field('texto_slide') ?>
						</div>
					<?php endwhile; ?>
				</div>

				<?php if($i > 0){ ?>
					<ol class="carousel-indicators">
						<?php for($indicator=0; $indicator<$i; $indicator++){ ?>
							<li data-target="#myCarousel" data-slide-to="<?php echo $indicator; ?>" class="<?php if($indicator == 0){ echo "active"; } ?>"></li>
						<?php } ?>
					</ol>
				<?php } ?>
			</div>
            
        <?php }
    ?>
</session>

<ul class="list-produtos">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'content-produto', get_post_format() ); ?>
	<?php endwhile; ?>
</ul>

<!-- JQUERY SLIM SCROLL -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.slimscroll.js"></script>
<script type="text/javascript">
	$(function(){
	    $('.scroll').slimScroll({
		    size: '5px',
		    color: '#afafaf'
	    });
	});

	$(document).ready(function(){

		/* OPEN/CLOSE ITEM */
		$('.footer-item .mais').click(function(){
			$(this).css('opacity', 0);
			$(this).parent().siblings('.container').css('top',0);
		});

		$('.close-item').click(function(){
			$(this).parents('.container').css('top','100vh');
			$(this).parents('.container').siblings('.footer-item').find('.mais').css('opacity', '1');
		});
	});	
</script>

<?php get_footer(); ?>