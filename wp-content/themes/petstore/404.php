<?php get_header();  ?>
	<div id="mid_container_wrapper" class="mid_container_wrapper_section">
		<div id="mid_container" class="container"> 
	        <!-- End Page Titles -->
			<div class="one_half">
				<?php _e( ' <h3>Archives by Subject:</h3>', 'petstore' ); ?>
				<ul>
					<?php wp_list_categories('&title_li='); ?>
				</ul>
			</div>
			<div class="one_half_last">
				<?php _e( ' <h3>Archives by Month::</h3>', 'petstore' ); ?>
				<ol>
					<?php wp_get_archives('type=monthly'); 
					next_posts_link() 
					?>
				</ol>
			</div>
    <!-- Footer  -->
<?php get_footer(); ?>