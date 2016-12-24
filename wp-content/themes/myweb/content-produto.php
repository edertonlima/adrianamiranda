<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); ?>
<?php switch (qtrans_getLanguage()) {
	case "pt":
		$veja_mais = 'VEJA MAIS';
		$saiba_mais = 'SAIBA MAIS';
	break;

	case "en":
		$veja_mais = 'MORE';
		$saiba_mais = 'KNOW MORE';
	break;

	case "es":
		$veja_mais = 'VER MÁS';
		$saiba_mais = 'SEPA MAS';
	break;
} ?>

<li class="box-conteudo imagem full-height item" style="background-image: url('<?php if($imagem[0]){ echo $imagem[0]; } ?>');"">
	<div class="container" style="top:0;">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<a href="javascript:" class="mais close-item" title="Saiba mais"></a>
				<div class="scroll">
					<img src="<?php the_field('icone_do_produto') ?>" alt="">
					<h2><?php the_title(); ?></h2>
					<?php //the_field('conteudo_produto'); ?>
					<a href="<?php echo get_permalink(); ?>" class="button" title="<?php echo $veja_mais; ?>"><?php echo $veja_mais; ?></a>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-item">
		<a href="javascript:" class="mais" title="<?php echo $saiba_mais; ?>"></a>
	</div>
</li>