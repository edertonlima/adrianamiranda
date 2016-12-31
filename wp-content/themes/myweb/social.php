<?php if( have_rows('configuracoes-geral') ): ?>
	
	<ul class="social">
	    <?php while( have_rows('configuracoes-geral') ) : the_row();
	        
	        

	    endwhile; ?>    
    </ul>

<?php endif; ?>


<ul class="social" style="display: none;">
	
	<?php if(get_sub_field('youtube') != ''){ ?>
		<li><a href="http://youtube.com" title="Youtube" target="_blank"><i class="fa fa-youtube"></i></a></li>
	<?php } ?>
	<li><a href="<?php echo get_sub_field('instagran'); ?>" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a></li>
	<li><a href="http://facebook.com" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
	<li style="display: none;"><a href="javascript:void(0)" class="search-nav">&nbsp;&nbsp;<label for="search"><i class="fa fa-search"></i></label></a></li>
</ul>