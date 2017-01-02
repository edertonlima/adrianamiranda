<?php get_header(); ?>

<session class="post-list"> 
    <?php
        $getPosts = array(
            'post_type'   => 'post',
            'post_status' => 'any',
            'orderby'     => date,
            'order'       => 'DESC'
        );
        $posts = new WP_Query( $getPosts );
        if(count($posts) > 0){ ?>

			<div class="slide-home">
				<?php 
					while($posts->have_posts()) : $posts->the_post(); 
						get_template_part( 'content-list', get_post_format() );
					endwhile;
				?>
			</div>

        <?php }
    ?>
</session>

<session class="sobre-home">
	<div class="container">
		<?php $page = get_page_by_path('sobre-mim'); ?>
		<h2><a href="<?php the_permalink($page->ID); ?>" title="<?php the_field('titulo_home',$page->ID); ?>"><?php the_field('titulo_home',$page->ID); ?></a></h2>

		<img src="<?php the_field('imagem_perfil',$page->ID); ?>" class="capa-home" alt="<?php the_field('titulo_home',$page->ID); ?>">
		
		<?php if(get_field('assinatura',$page->ID)){ ?>
			<h3><?php the_field('sub_titulo_home',$page->ID); ?></h3>
		<?php } ?>
		<p><?php the_field('descrição',$page->ID); ?></p>
		
		<?php if(get_field('assinatura',$page->ID)){ ?>
			<img src="<?php the_field('assinatura',$page->ID); ?>" class="assinatura" alt="<?php the_field('titulo_home',$page->ID); ?>">
		<?php } ?>

		<?php include 'social.php'; ?>
	</div>
</session>

<session class="post-det"> 
	<div class="container">
	    <?php
	        $getPosts = array(
	            'post_type'   => 'post',
	            'post_status' => 'any',
	            'orderby'     => date,
	            'order'       => 'DESC'
	        );
	        $posts = new WP_Query( $getPosts );
	        if(count($posts) > 0){ ?>

				<?php 
					while($posts->have_posts()) : $posts->the_post(); 
						get_template_part( 'content', get_post_format() );
					endwhile;
				?>

	        <?php }
	    ?>
	</div>

	<?php /*
		the_posts_pagination( array(
			'prev_text'          => __( 'Previous page', 'myweb' ),
			'next_text'          => __( 'Next page', 'myweb' ),
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'myweb' ) . ' </span>',
		) );*/
	?>
</session>

<session class="news">
	<div class="container">
		<form action="javascript:">
			<h2>Cadastre-se em nossa newsletter</h2>
			<input type="text" name="email" id="email" placeholder="E-mail">
			<button type="button" class="enviar">CADASTRAR</button>
			<p class="msg-form"></p>
		</form>
	</div>
</session>

<?php get_footer(); ?>

<script>
	var owl = $('.slide-home');
	owl.owlCarousel({
		margin: 0,
		loop: false,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 2
			},
			1000: {
				items: 3
			}
		}
	})
</script>
 
<script type="text/javascript">
	$(document).ready(function(){

		var height = 0;
		$('.post-list .post-info').each(function(){
			var atualHeight = $(this).height();
			if(atualHeight>height){
				height = atualHeight;
			}
		});
		$('.post-list .post-info').height(height);

		$(".enviar").click(function(){
			$('.enviar').html('ENVIANDO').prop( "disabled", true );
			$('.msg-form').removeClass('erro ok').html('');
			var email = $('#email').val();
			var para = '<?php the_field('email', 'option'); ?>';
			var nome_site = '<?php bloginfo('name') ?>';

			if(email!=''){
				$.getJSON("<?php echo get_template_directory_uri(); ?>/news.php", { email: email, para: para, nome_site: nome_site }, function(result){		
					if(result=='ok'){
						resultado = 'Enviado com sucesso! Obrigado.';
						classe = 'ok';
					}else{
						resultado = result;
						classe = 'erro';
					}
					$('.msg-form').addClass(classe).html(resultado);
					$('.news form').trigger("reset");
					$('.enviar').html('CADASTRAR').prop( "disabled", false );
				});
			}else{
				$('.msg-form').addClass('erro').html('Por favor, digite um e-mail válido.');
				$('.enviar').html('CADASTRAR').prop( "disabled", false );
			}
		});
	});
</script>