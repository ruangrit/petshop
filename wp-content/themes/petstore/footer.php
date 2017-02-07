<?php 
global $post_item_id, $post;
$header_menu_position = get_theme_mod('header_position') ? get_theme_mod('header_position') : 'top';
  echo  kaya_post_item_id();
	$page_middle_content = get_post_meta($post_item_id,'page_middle_content',true) ? get_post_meta($post_item_id,'page_middle_content',true) : '0';
	$page_footer_container = get_post_meta($post_item_id,'page_footer_container',true) ? get_post_meta($post_item_id,'page_footer_container',true) : '0';
	if( $page_footer_container == '0' ){ ?>
</div> <!-- end middle content section -->
</div> <!-- end middle Container wrapper section -->
<?php } 
	if( $page_footer_container == '0' ){ ?>
		<div class="clear"> </div>	
		<!-- end middle section -->
		<?php  get_template_part('lib/includes/footer_general'); // General Footer ?>
		<div class="clear"></div>
	<?php } ?>
	<!--  Scrollto Top  -->
	<a href="#" class="scroll_top "><i class = "fa fa-arrow-up"> </i></a>
	<!--  Google Analytic  -->
	<?php  
	$google_tracking_code= get_theme_mod('google_tracking_code') ? get_theme_mod('google_tracking_code') : '';
		if (!empty( $google_tracking_code ) ) { ?>
			<script type="text/javascript">
				var _gaq = _gaq || [];
				_gaq.push(['_setAccount', '<?php echo trim(stripslashes($google_tracking_code)); ?>']);
				_gaq.push(['_trackPageview']);
				(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
				})();
				</script>
		<?php 					
		} else { ?>
	<?php } ?>
	<!--  end Google Analytics  -->
	</section> <!-- Main Layout Section End -->
	<?php
		if( ($header_menu_position == 'left') || ($header_menu_position == 'right') ){
		 echo '</div>';
		}
	 ?>
	<?php wp_footer(); ?>
</body>
</html>