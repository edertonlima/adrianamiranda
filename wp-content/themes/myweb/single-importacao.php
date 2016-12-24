<?php get_header(); ?>

<session class="slide-page">
	<div class="slide">
		<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); ?>
		<div class="item <?php if($i == 1){ echo 'active'; } ?>" style="background-image: url('<?php if($imagem[0]){ echo $imagem[0]; } ?>');">
			<h2 class="destaque"><span><?php the_title(); ?></span></h2>
		</div>
	</div>
</session>

<session class="box-conteudo">
	<div class="container" style="top:0;">
		<div class="row">
			<div class="col-md-4">
				<img src="<?php the_field('icone_do_produto') ?>" alt="">
			</div>
			<div class="col-md-8">
				<div class="resumo-single">
					<h2><?php the_title(); ?></h2>
					<span><?php the_field('conteudo_produto'); ?></span>
				</div>
				<div class="content-single">
					<?php echo $post->post_content; ?>
				</div>
			</div>
		</div>
	</div>
</session>

<?php get_footer(); ?>