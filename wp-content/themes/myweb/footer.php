	<footer class="footer">
		<div class="container">
			<div class="row">

				<div class="col-md-3">
					
					<?php switch (qtrans_getLanguage()) {
						case "pt":
							$institucional = 'Institucional';
							$serviços = 'Serviços';
							$contato = 'Contato';
						break;

						case "en":
							$institucional = 'Institutional';
							$serviços = 'Services';
							$contato = 'Contact';
						break;

						case "es":
							$institucional = 'institucional';
							$serviços = 'Servicios';
							$contato = 'Contacto';
						break;
					} ?>
						<h2><a href="<?php echo home_url(); ?>/institucional" title="<?php echo $institucional; ?>"><?php echo $institucional; ?></a></h2>
					<?php 
						wp_nav_menu( array(
							'menu'           => 'Menu Institucional',
						    'theme_location' => 'primary',
						    'items_wrap'     => '%3$s'
						) );
					 ?>
				</div>
				<div class="col-md-3">
					<h2><a href="<?php echo home_url(); ?>/servicos" title="<?php echo $serviços; ?>"><?php echo $serviços; ?></a></h2>
					<?php 
						wp_nav_menu( array(
							'menu'           => 'Menu Serviços',
						    'theme_location' => 'primary',
						    'items_wrap'     => '%3$s'
						) );
					 ?>
				</div>
				<div class="col-md-3">
					<h2>Produtos</h2>
					<?php 
						wp_nav_menu( array(
							'menu'           => 'Menu Produtos',
						    'theme_location' => 'primary',
						    'items_wrap'     => '%3$s'
						) );
					 ?>
				</div>
				<div class="col-md-3">
					<h2><a href="<?php home_url(); ?>/contato" title="<?php echo $contato; ?>"><?php echo $contato; ?></a></h2>
					<?php 
						wp_nav_menu( array(
							'menu'           => 'Menu Contato',
						    'theme_location' => 'primary',
						    'items_wrap'     => '%3$s'
						) );
					 ?>
				</div>

				<div class="copy col-md-12">
					<a href="<?php echo home_url(); ?>" class="toplog"><img src="<?php echo  get_template_directory_uri(); ?>/assets/images/toplog.png" alt="Toplog"></a>
					<a href="javascript:" class="di20"><img src="<?php echo  get_template_directory_uri(); ?>/assets/images/di20.png" alt="di20"></a>
				</div>
				
			</div>
		</div>
	</footer>

</body>
</html>