<article class="post">

	<header class="post-header">
		<div class="container-info">
			<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<span class="post-date" title="2016-10-06 21:32:47"><?php the_date(); ?></span>
		</div>
	</header>
	
	<div class="row">
		<div class="col-12">

			<?php $imgPage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); ?>
			
			<div class="conteudo-post<?php if(is_page(2)){ echo ' sobre-mim'; } ?>">
				<?php if($imgPage){ ?>
					<img src="<?php if($imgPage[0]){ echo $imgPage[0]; } ?>" alt="" class="img-page">
				<?php } ?>

				<div class="conteudo-post">
					<?php the_content(); ?>
				</div>

				<?php if(is_page(84)){ ?>
					<form action="javascript:" class="contato">
						<fieldset class="">
							<label for="nome">Seu Nome</label>
							<input type="text" name="nome" id="nome" placeholder="Nome">
						</fieldset>

						<fieldset class="">
							<label for="email">Seu E-mail</label>
							<input type="text" name="email" id="email" placeholder="E-mail">
						</fieldset>

						<fieldset class="mensagem">
							<label for="mensagem">Sua Mensagem</label>
							<textarea name="mensagem" id="mensagem" rows="10"></textarea>
						</fieldset>

						<button type="button" class="enviar">Enviar</button>
						<p class="msg-form"></p>	
					</form>
				<?php } ?>
			</div>

		</div>
	</div>

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
		
		<?php include 'social-share.php'; ?>
					
		<span class="likes">
			<a href="#" class="" title="">
				<i class="fa fa-heart" aria-hidden="true"></i>
				<span class="zilla-likes-count">10</span>
			</a>
		</span>
	</footer>

</article><!-- #post-## -->

<?php if(is_page(84)){ ?>
<script type="text/javascript">
	$(document).ready(function(){
	
		$(".enviar").click(function(){
			$('.enviar').html('ENVIANDO').prop( "disabled", true );
			$('.msg-form').removeClass('erro ok').html('');
			var nome = $('#nome').val();
			var email = $('#email').val();
			var mensagem = $('#mensagem').val();
			var para = '<?php the_field('email', 'option'); ?>';
			var nome_site = '<?php bloginfo('name') ?>';

			if(email!=''){
				if(mensagem!=''){
					$.getJSON("<?php echo get_template_directory_uri(); ?>/mail.php", { nome: nome, email: email, mensagem: mensagem, para: para, nome_site: nome_site }, function(result){		
						if(result=='ok'){
							resultado = 'Enviado com sucesso! Obrigado.';
							classe = 'ok';
						}else{
							resultado = result;
							classe = 'erro';
						}
						$('.msg-form').addClass(classe).html(resultado);
						$('.contato').trigger("reset");
						$('.enviar').html('ENVIAR').prop( "disabled", false );
					});
				}else{
					$('.msg-form').addClass('erro').html('Por favor, você precisa digitar uma mensagem.');
					$('.enviar').html('Enviar').prop( "disabled", false );
				}
			}else{
				$('.msg-form').addClass('erro').html('Por favor, digite um e-mail válido.');
				$('.enviar').html('Enviar').prop( "disabled", false );
			}
		});
	});
</script>
<?php } ?>
