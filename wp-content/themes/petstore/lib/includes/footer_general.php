<?php
	$footer_page_id = get_theme_mod('footer_page_id') ? get_theme_mod('footer_page_id') : '';
	if(!empty($footer_page_id)){
		echo '<div class="page_content_footer">';
		echo '<div class="container">';
			$post = get_page($footer_page_id); 
			$content = apply_filters('the_content', $post->post_content); 
			echo $content;
		echo '</div></div>';
	}
?>
<footer>
	<div class="footer_wrapper"> <!-- Start Footer section -->
	<!-- Start Footer bottom section -->
	<?php $most_footer_disable=get_theme_mod('most_footer_disable') ? get_theme_mod('most_footer_disable') : '0'; 
	if($most_footer_disable == "0"){ ?> 
		<div id="footer_bottom">
		<div class="container"> 
			<div class="one_half">
				<?php
                    echo '<span class="copyrights">';
                       	echo get_theme_mod('most_footer_left_section') ? do_shortcode( get_theme_mod('most_footer_left_section') ) :'Copy rights &copy; kayapati.com ';
                    echo '</span>';
                   ?>
				</div>
				<div class="one_half_last"> <!-- Footer Menu  -->
				 <?php if( has_nav_menu( 'footer' ) ){
				   wp_nav_menu( array( 'container_class' => 'menu-footer', 'theme_location' => 'footer' , 'menu_class' => '') );
                   }else{ ?>
					<span class="footer_right"><?php echo get_theme_mod('most_footer_right_section') ? do_shortcode( get_theme_mod('most_footer_right_section') )  :''; ?></span>
					<?php } ?>				
				</div>
			</div>
		</div> <!-- end Footer bottom section  -->
	<?php } ?>			
		</div> <!-- end Footer  section -->
	</footer>