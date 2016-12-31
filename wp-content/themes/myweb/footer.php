	<footer class="footer widget-block">
		<session class="instagran">
			<h2>INSTAGRAN</h2>
			<ul class="instagram-pics instagram-size-large"><li class=""><a href="//instagram.com/p/x0kF1zjNxk/" target="_self" class=""><img src="//scontent-ams3-1.cdninstagram.com/t51.2885-15/e15/10932571_844609388928559_1752389150_n.jpg?ig_cache_key=ODk3NTAwOTU2Nzk4NTQwOTAw.2" alt="Relaxing afternoons in Hawaii. I'm going to try to post more frequently. I'm alive, I promise." title="Relaxing afternoons in Hawaii. I'm going to try to post more frequently. I'm alive, I promise." class=""></a></li><li class=""><a href="//instagram.com/p/v9cwKojN-4/" target="_self" class=""><img src="//scontent-ams3-1.cdninstagram.com/t51.2885-15/e15/10831851_289992014544824_374398392_n.jpg?ig_cache_key=ODYzOTczMTU4Nzc5OTM2Njk2.2" alt="Day in Melrose" title="Day in Melrose" class=""></a></li><li class=""><a href="//instagram.com/p/pK5V5njNzi/" target="_self" class=""><img src="//scontent-ams3-1.cdninstagram.com/t51.2885-15/e15/10349685_779999568700670_202211920_n.jpg?ig_cache_key=NzQxNjU3MjgyMjgyODM5MjY2.2" alt="Must-haves in my bag at all times: sunglasses, headphones, my camera, a good book, and my favorite lipstick ✨" title="Must-haves in my bag at all times: sunglasses, headphones, my camera, a good book, and my favorite lipstick ✨" class=""></a></li><li class=""><a href="//instagram.com/p/pIF1vWjN_w/" target="_self" class=""><img src="//scontent-ams3-1.cdninstagram.com/t51.2885-15/e15/10375883_1423830627900568_254126994_n.jpg?ig_cache_key=NzQwODY3ODIxOTExNDY1OTY4.2" alt="Beginning to realize all the things I'll be missing when I move away from home in the fall, like afternoon coffee with @ashlynsabatine ☕️ #lateupload" title="Beginning to realize all the things I'll be missing when I move away from home in the fall, like afternoon coffee with @ashlynsabatine ☕️ #lateupload" class=""></a></li><li class=""><a href="//instagram.com/p/pFjtuJjNw3/" target="_self" class=""><img src="//scontent-ams3-1.cdninstagram.com/t51.2885-15/e15/10387972_816240331721949_499638373_n.jpg?ig_cache_key=NzQwMTU0Nzg3MzI5MDA2NjQ3.2" alt="It's been awhile since I've actually been in my own bed 😌" title="It's been awhile since I've actually been in my own bed 😌" class=""></a></li><li class=""><a href="//instagram.com/p/nUQuYgjN2u/" target="_self" class=""><img src="//scontent-ams3-1.cdninstagram.com/t51.2885-15/e15/10296986_1433020353613253_898412197_n.jpg?ig_cache_key=NzA4MjY0NTk3NTYwMDI0NDk0.2" alt="Happy Sunday! I'm back ☺️ You guys can also follow me at @katelynsabatinephotography where I'll be posting more work-related photos. Hope you all had a great weekend 💫 thank you for everyone who has been patient with me, and welcome new followers 😊💕" title="Happy Sunday! I'm back ☺️ You guys can also follow me at @katelynsabatinephotography where I'll be posting more work-related photos. Hope you all had a great weekend 💫 thank you for everyone who has been patient with me, and welcome new followers 😊💕" class=""></a></li><li class=""><a href="//instagram.com/p/jappr_jN8R/" target="_self" class=""><img src="//scontent-ams3-1.cdninstagram.com/t51.2885-15/e15/924243_206389829557547_1693051231_n.jpg?ig_cache_key=NjM4MDA1NDgxODY4OTQzMTIx.2" alt="I'm a terrible at baking but I must admit these cookies were delicious 😋" title="I'm a terrible at baking but I must admit these cookies were delicious 😋" class=""></a></li><li class=""><a href="//instagram.com/p/i5hgngDN-C/" target="_self" class=""><img src="//scontent-ams3-1.cdninstagram.com/t51.2885-15/e15/1597281_438957049566373_599219936_n.jpg?ig_cache_key=NjI4NjgwOTk5OTY2NjYyNTMw.2" alt="This is a photo I took while I was in San Francisco this past holiday. I miss this great city already!" title="This is a photo I took while I was in San Francisco this past holiday. I miss this great city already!" class=""></a></li></ul>
		</session>

		<div class="container">
		
			<div class="row content-block">
				<div class="col-4 ultimos">
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
				<div class="col-4 sobre">
					<h3>SOBRE MIM</h3>
					<div class="sobre-home">
						<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id(2), 'thumbnail' ); ?>
						<!--<img src="<?php if($imagem[0]){ echo $imagem[0]; } ?>" alt="">-->
						<img class="capa-home" src="<?php echo get_template_directory_uri(); ?>/assets/images/capa-home.jpg" alt="">
						<p>Ter um corpo bonito e saudável com tantas mudanças que o tempo proporciona é um verdadeiro desafio. É aqui que começamos a sentir os claros sinais do tempo.</p>
						
						<?php include 'social.php'; ?>
						
					</div>
				</div>
				<div class="col-4 categorias">
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
			</div>

			<div class="logo-rodape">
				<a href="<?php echo get_home_url(); ?>" alt="Adriana Miranda">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Adriana Miranda">
				</a>
			</div>

			<p class="copy"><i class="fa fa-copyright" aria-hidden="true"></i> ADRIANA MIRANDA. TODOS OS DIREITOS RESERVADOS.</p>

		</div>
	</footer>

</body>
</html>