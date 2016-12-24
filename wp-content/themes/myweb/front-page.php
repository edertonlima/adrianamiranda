<?php get_header(); ?>

<session class="slide-page">
    <?php
        $getSlide = array(
            'post_type' => 'post',
            'post_status' => 'any',
            'category_name' => 'home',
            'orderby'           => date,
            'order'             => 'ASC'
        );
        $slide = new WP_Query( $getSlide );
        if(count($slide) > 0){ 
        	$i = 0; ?>

			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<?php while($slide->have_posts()) : $slide->the_post(); 
						$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); ?>
						<div class="item <?php if($i == 0){ echo 'active'; } ?>" style="background-image: url('<?php if($imagem[0]){ echo $imagem[0]; } ?>');">
							<?php the_field('texto_slide') ?>
						</div>
						<?php $i = $i+1; 
					endwhile; ?>
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

<session class="box-conteudo beneficios-servicos">
	<div class="container">
		<div class="row">
			<div class="col-md-5 justify-center">
				<img src="<?php the_field('imagem_beneficio', 12) ?>" alt="Benefícios">
				<h2 class="destaque"><?php the_field('titulo_beneficio', 12) ?></h2>
				<p><?php the_field('texto_beneficio', 12) ?></p>
			</div>
			<div class="col-md-5 col-md-offset-2 justify-center ">
				<img src="<?php the_field('imagem_servicos', 12) ?>" alt="Serviços">
				<h2 class="destaque"><?php the_field('titulo_servicos', 12) ?></h2>
				<p><?php the_field('texto_servicos', 12) ?></p>
			</div>
		</div>
	</div>
</session>

<session class="box-conteudo imagem full-height" style="background-image: url('<?php the_field('imagem_destaque', 12) ?>');">
	<h2 class=""><span><?php the_field('texto_destaque', 12) ?></span></h2>
</session>

<?php switch (qtrans_getLanguage()) {
	case "pt":
		$localizacao = 'Localização';
		$brasil = 'Brasil';
		$china = 'China';
		$fale_conosco = 'Fale Conosco';
		$enviar = 'ENVIAR';
	break;

	case "en":
		$localizacao = 'Location';
		$brasil = 'Brasil';
		$china = 'China';
		$fale_conosco = 'Contact Us';
		$enviar = 'SEND';
	break;

	case "es":
		$localizacao = 'Localização';
		$brasil = 'Brasil';
		$china = 'China';
		$fale_conosco = 'Hable con nosotros';
		$enviar = 'ENVIAR';
	break;
} ?>

<session class="box-conteudo" id="contato">
	<div class="container">
		<div class="row">
			<div class="col-md-6 box-contato">
				<h2 class="destaque center"><?php echo $localizacao; ?></h2>
				<div class="col-md-6 localizacao">
					<h3><img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-mapa-verde.png"><?php echo $brasil; ?></h3>
					<p><?php the_field('brasil', 12) ?></p>
				</div>
				<div class="col-md-6 localizacao">
					<h3><img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-mapa-vermelho.png"><?php echo $china; ?></h3>
					<p><?php the_field('china', 12) ?></p>
				</div>
			</div>
			<div class="col-md-5 col-md-offset-1 box-contato">
				<h2 class="destaque center"><?php echo $fale_conosco; ?></h2>
				<p class="msg-form"></p>
				<form action="javascript:" class="contato">
					<fieldset>
						<input type="text" name="nome" id="nome" placeholder="NOME">
						<input type="text" name="email" id="email" placeholder="E-MAIL">
						<input type="text" name="telefone" id="telefone" placeholder="TELEFONE">
						<textarea name="mensagem" id="mensagem" placeholder="ESCREVA AQUI SUA MENSAGEM"></textarea>
						<button type="submit" class="enviar"><?php echo $enviar; ?></button>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</session>

<session class="box-conteudo" style="padding-top: 0;">
	<div class="container">

		<?php
	    $getClientes = array(
	        'post_type' => 'clientes',
	        'post_status' => 'any',
	        'orderby'           => date,
	        'order'             => 'ASC'
	    );
	    $clientes = new WP_Query( $getClientes ); ?>

		<div class="row">
			<div class="col-md-12">
				<div class="carousel" id="clientes">
					<?php while($clientes->have_posts()) : $clientes->the_post(); 
						$i = $i+1; 
						$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); ?>
						<div class="item">
							<?php if(get_field('url_cliente')){ ?>
								<a href="<?php the_field('url_cliente'); ?>" target="_blank" title="<?php echo get_the_title(); ?>"><img src="<?php echo $imagem[0]; ?>" alt="<?php echo get_the_title(); ?>"></a>
							<?php }else{ ?>
								<img src="<?php echo $imagem[0]; ?>" alt="<?php echo get_the_title(); ?>">
							<?php } ?>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		</div>

	</div>
</session>

<?php get_footer(); ?>
 
<script type="text/javascript">
	$(document).ready(function(){
		$(".enviar").click(function(){
			$('.enviar').html('ENVIANDO').prop( "disabled", true );
			$('.msg-form').html('').hide();
			var nome = $('#nome').val();
			var email = $('#email').val();
			var telefone = $('#telefone').val();
			var mensagem = $('#mensagem').val();

			if(email!=''){
				$.getJSON("<?php echo get_template_directory_uri(); ?>/mail.php", { nome: nome, email: email, telefone: telefone, mensagem: mensagem }, function(result){		
					$('.msg-form').html(result).show();
					$('.contato').trigger("reset");
					$('.enviar').html('ENVIAR').prop( "disabled", false );
				});
			}else{
				$('.msg-form').html('Por favor, digite um e-mail válido.').show();
				$('.enviar').html('Enviar').prop( "disabled", false );
			}
		});
	});
</script>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.bxslider.js"></script>
<script type="text/javascript">
	$(function() {
		$('#clientes').bxSlider({
			minSlides: 2,
			maxSlides: 4,
			slideWidth: 150,
			slideMargin: 50,
			pager: false,
			auto: true,
			pause: 6000,
			controls: false,
			autoStart: true,
			responsive: true
		});
	});
</script>