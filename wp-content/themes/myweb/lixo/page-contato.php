<?php get_header(); ?>

<session class="slide-page">
    <?php
        $getSlide = array(
            'post_type' => 'post',
            'post_status' => 'any',
            'category_name' => 'contato',
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

<?php while ( have_posts() ) : the_post(); ?>
	



	<session class="box-conteudo" id="fale-conosco">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">

					<?php switch (qtrans_getLanguage()) {
						case "pt": ?>
							<h2 class="destaque center no-margim"><?php echo $fale_conosco; ?></h2>
							<p class="msg-form msg-contato"></p>
							<form action="javascript:">
								<fieldset class="col-md-6">
									<input type="text" name="" placeholder="NOME COMPLETO *">
									<input type="text" name="" placeholder="E-MAIL *">
									<input type="text" name="" placeholder="TELEFONE *">
									<input type="text" name="" placeholder="EMPRESA *">
									<input type="text" name="" placeholder="CIDADE *">
									<select name="" data-placeholder="ESTADO *">
										<option value="AC">Acre</option>
										<option value="AL">Alagoas</option>
										<option value="AP">Amapá</option>
										<option value="AM">Amazonas</option>
										<option value="BA">Bahia</option>
										<option value="CE">Ceará</option>
										<option value="DF">Distrito Federal</option>
										<option value="ES">Espirito Santo</option>
										<option value="GO">Goiás</option>
										<option value="MA">Maranhão</option>
										<option value="MS">Mato Grosso do Sul</option>
										<option value="MT">Mato Grosso</option>
										<option value="MG">Minas Gerais</option>
										<option value="PA">Pará</option>
										<option value="PB">Paraíba</option>
										<option value="PR">Paraná</option>
										<option value="PE">Pernambuco</option>
										<option value="PI">Piauí</option>
										<option value="RJ">Rio de Janeiro</option>
										<option value="RN">Rio Grande do Norte</option>
										<option value="RS">Rio Grande do Sul</option>
										<option value="RO">Rondônia</option>
										<option value="RR">Roraima</option>
										<option value="SC">Santa Catarina</option>
										<option value="SP">São Paulo</option>
										<option value="SE">Sergipe</option>
										<option value="TO">Tocantins</option>
									</select>
									<select name="" data-placeholder="CATEGORIA">
										<optgroup label="Importação">
											<option value="volvo">Alimentos</option>
											<option value="saab">Construção</option>
										</optgroup>
										<optgroup label="Exportação">
											<option value="volvo">Alimentos</option>
											<option value="saab">Construção</option>
										</optgroup>
									</select>
								</fieldset>
								<fieldset class="col-md-6">
									<input type="text" name="" placeholder="ASSUNTO">
									<textarea name="" id="" class="row-5" placeholder="ESCREVA AQUI SUA MENSAGEM"></textarea>
									<button type="submit"><?php echo $enviar; ?></button>
								</fieldset>
							</form>
						<?php break;

						case "en": ?>
							<h2 class="destaque center">Contact Us</h2>
							<p class="msg-form msg-contato"></p>
							<form action="javascript:">
								<fieldset class="col-md-6">
									<input type="text" name="" placeholder="NAME *">
									<input type="text" name="" placeholder="EMAIL *">
									<input type="text" name="" placeholder="PHONE *">
									<input type="text" name="" placeholder="COMPANY *">
									<input type="text" name="" placeholder="CITY *">
									<select name="" data-placeholder="STATE *">
										<option value="AC">Acre</option>
										<option value="AL">Alagoas</option>
										<option value="AP">Amapá</option>
										<option value="AM">Amazonas</option>
										<option value="BA">Bahia</option>
										<option value="CE">Ceará</option>
										<option value="DF">Distrito Federal</option>
										<option value="ES">Espirito Santo</option>
										<option value="GO">Goiás</option>
										<option value="MA">Maranhão</option>
										<option value="MS">Mato Grosso do Sul</option>
										<option value="MT">Mato Grosso</option>
										<option value="MG">Minas Gerais</option>
										<option value="PA">Pará</option>
										<option value="PB">Paraíba</option>
										<option value="PR">Paraná</option>
										<option value="PE">Pernambuco</option>
										<option value="PI">Piauí</option>
										<option value="RJ">Rio de Janeiro</option>
										<option value="RN">Rio Grande do Norte</option>
										<option value="RS">Rio Grande do Sul</option>
										<option value="RO">Rondônia</option>
										<option value="RR">Roraima</option>
										<option value="SC">Santa Catarina</option>
										<option value="SP">São Paulo</option>
										<option value="SE">Sergipe</option>
										<option value="TO">Tocantins</option>
									</select>
									<select name="" data-placeholder="CATEGORY">
										<optgroup label="Import">
											<option value="">Alimentos</option>
											<option value="">Construção</option>
										</optgroup>
										<optgroup label="Exportação">
											<option value="">Alimentos</option>
											<option value="">Construção</option>
										</optgroup>
									</select>
								</fieldset>
								<fieldset class="col-md-6">
									<input type="text" name="" placeholder="SUBJECT">
									<textarea name="" id="" class="row-5" placeholder="WRITE YOUR MESSAGE HERE"></textarea>
									<button type="submit">SEND</button>
								</fieldset>
							</form>
						<?php break;

						case "es": ?>
							<h2 class="destaque center">HABLE CON NOSOTROS</h2>
							<p class="msg-form msg-contato"></p>
							<form action="javascript:">
								<fieldset class="col-md-6">
									<input type="text" name="" placeholder="NOMBRE *">
									<input type="text" name="" placeholder="E-MAIL *">
									<input type="text" name="" placeholder="TELÉFONO *">
									<input type="text" name="" placeholder="EMPRESA *">
									<input type="text" name="" placeholder="CIUDAD *">
									<select name="" data-placeholder="ESTADO *">
										<option value="AC">Acre</option>
										<option value="AL">Alagoas</option>
										<option value="AP">Amapá</option>
										<option value="AM">Amazonas</option>
										<option value="BA">Bahia</option>
										<option value="CE">Ceará</option>
										<option value="DF">Distrito Federal</option>
										<option value="ES">Espirito Santo</option>
										<option value="GO">Goiás</option>
										<option value="MA">Maranhão</option>
										<option value="MS">Mato Grosso do Sul</option>
										<option value="MT">Mato Grosso</option>
										<option value="MG">Minas Gerais</option>
										<option value="PA">Pará</option>
										<option value="PB">Paraíba</option>
										<option value="PR">Paraná</option>
										<option value="PE">Pernambuco</option>
										<option value="PI">Piauí</option>
										<option value="RJ">Rio de Janeiro</option>
										<option value="RN">Rio Grande do Norte</option>
										<option value="RS">Rio Grande do Sul</option>
										<option value="RO">Rondônia</option>
										<option value="RR">Roraima</option>
										<option value="SC">Santa Catarina</option>
										<option value="SP">São Paulo</option>
										<option value="SE">Sergipe</option>
										<option value="TO">Tocantins</option>
									</select>
									<select name="" data-placeholder="CATEGORÍA">
										<optgroup label="Importación">
											<option value="">Alimentos</option>
											<option value="">Construção</option>
										</optgroup>
										<optgroup label="exportación">
											<option value="">Alimentos</option>
											<option value="">Construção</option>
										</optgroup>
									</select>
								</fieldset>
								<fieldset class="col-md-6">
									<input type="text" name="" placeholder="ASSUNTO">
									<textarea name="" id="" class="row-5" placeholder="ESCRIBE UN MENSARJE AQUÍ"></textarea>
									<button type="submit">ENVIAR</button>
								</fieldset>
							</form>
						<?php break;
					} ?>
				</div>
			</div>
		</div>
	</session>

	<session class="box-conteudo imagem full-height" style="background-image: url('<?php the_field('imagem_destaque'); ?>');">
		<h2><span><?php the_field('texto_destaque') ?></span></h2>
	</session>


	<session class="box-conteudo" id="trabalhe-conosco">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<?php switch (qtrans_getLanguage()) {
						case "pt": ?>
							<h2 class="destaque center no-margim"><?php echo $curriculo; ?></h2>
							<p class="msg-form msg-curriculo"></p>
							<form action="javascript:" class="trabalhe">
								<fieldset class="col-md-6">
									<input type="text" name="" placeholder="NOME COMPLETO *">
									<input type="text" name="" placeholder="E-MAIL *">
									<input type="text" name="" placeholder="TELEFONE *">
									<input type="file" class="filestyle" placeholder="ANEXAR CURRÍCULO *" data-input="false">
									<input type="text" name="" placeholder="QUAL CARGO DESEJA? *">
								</fieldset>
								<fieldset class="col-md-6">
									<textarea name="" id="" class="row-4" placeholder="ESCREVA AQUI SUA MENSAGEM"></textarea>
									<button type="submit"><?php echo $enviar; ?></button>
								</fieldset>
							</form>
						<?php break;

						case "en": ?>
							<h2 class="destaque center">YOUR RESUME</h2>
							<p class="msg-form msg-curriculo"></p>
							<form action="javascript:" class="trabalhe">
								<fieldset class="col-md-6">
									<input type="text" name="" placeholder="NAME *">
									<input type="text" name="" placeholder="EMAIL *">
									<input type="text" name="" placeholder="PHONE *">
									<input type="file" class="filestyle" placeholder="ATTACH CURRICULUM *" data-input="false">
									<input type="text" name="" placeholder="WHAT IS DESIRED POSITION? *">
								</fieldset>
								<fieldset class="col-md-6">
									<textarea name="" id="" class="row-4" placeholder="WRITE YOUR MESSAGE HERE"></textarea>
									<button type="submit">SEND</button>
								</fieldset>
							</form>
						<?php break;

						case "es": ?>
							<h2 class="destaque center">SU CURRICULUM</h2>
							<p class="msg-form msg-curriculo"></p>
							<form action="javascript:" class="trabalhe">
								<fieldset class="col-md-6">
									<input type="text" name="" placeholder="NOMBRE *">
									<input type="text" name="" placeholder="E-MAIL *">
									<input type="text" name="" placeholder="TELÉFONO *">
									<input type="file" class="filestyle" placeholder="ADJUNTAR CURRICULUM *" data-input="false">
									<input type="text" name="" placeholder="¿QUÉ ES POSICIÓN DESEADA? *">
								</fieldset>
								<fieldset class="col-md-6">
									<textarea name="" id="" class="row-4" placeholder="ESCRIBE UN MENSARJE AQUÍ"></textarea>
									<button type="submit">ENVIAR</button>
								</fieldset>
							</form>
						<?php break;
					} ?>
				</div>
			</div>
		</div>
	</session>

<?php endwhile; ?>
<?php get_footer(); ?>

<script type="text/javascript">
	$(document).ready(function(){
		$(".trabalhe").submit(function(){
			$('.enviar').html('ENVIANDO').prop( "disabled", true );
			$('.msg-curriculo').html('').hide();
			var nome = $('#nome').val();
			var email = $('#email').val();
			var telefone = $('#telefone').val();
			var mensagem = $('#mensagem').val();

			if(email!=''){
				$.getJSON("<?php echo get_template_directory_uri(); ?>/mail.php", { nome: nome, email: email, telefone: telefone, mensagem: mensagem }, function(result){		
					$('.msg-curriculo').html(result).show();
					$('.contato').trigger("reset");
					$('.enviar').html('ENVIAR').prop( "disabled", false );
				});
			}else{
				$('.msg-curriculo').html('Por favor, digite um e-mail válido.').show();
				$('.enviar').html('Enviar').prop( "disabled", false );
			}
		});
	});
</script>