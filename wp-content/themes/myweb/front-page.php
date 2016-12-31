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
		<h2><a href="#">EU SOU ADRIANA MIRANDA</a></h2>

		<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id(2), 'thumbnail' ); ?>
		<!--<img src="<?php if($imagem[0]){ echo $imagem[0]; } ?>" alt="">-->
		<img class="capa-home" src="<?php echo get_template_directory_uri(); ?>/assets/images/capa-home.jpg" alt="">

		<h3>SUPERANDO OS SINAIS DO TEMPO</h3>
		<p>Ter um corpo bonito e saudável com tantas mudanças que o tempo proporciona é um verdadeiro desafio. É aqui que começamos a sentir os claros sinais do tempo.</p>
		
		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/assinatura.png" class="assinatura" alt="">
		<ul class="social">
			<li><a href="http://youtube.com" title="Youtube" target="_blank"><i class="fa fa-youtube"></i></a></li>
			<li><a href="http://instagram.com" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a></li>
			<li><a href="http://facebook.com" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
		</ul>
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

	<?php
		the_posts_pagination( array(
			'prev_text'          => __( 'Previous page', 'myweb' ),
			'next_text'          => __( 'Next page', 'myweb' ),
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'myweb' ) . ' </span>',
		) );
	?>
</session>

<session class="news">
	<div class="container">
		<form action="#">
			<h2>Cadastre-se em nossa newsletter</h2>
			<input type="text" name="" placeholder="E-mail">
			<button type="submit">CADASTRAR</button>
			<p></p>
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
		$('.post-destaque .post-info').each(function(){
			var atualHeight = $(this).height();
			if(atualHeight>height){
				height = atualHeight;
			}
		});
		$('.post-destaque .post-info').height(height);


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