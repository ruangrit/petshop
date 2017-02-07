<?php
/*
Template Name: Page with Left Sidebar
*/
get_header();
global $post_item_id, $post;
  echo  kaya_post_item_id(); ?>
<div id="mid_container_wrapper" class="mid_container_wrapper_section">
		<div id="mid_container" class="container"> 
			<section class="two_third_last" id="content_section">
				<?php 
				if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry-content">
							<?php the_content(); ?>
						</div>
					</div>
				<!-- #post-## -->
				<?php endwhile; ?>
			</section>
			<aside class="one_third sidebar_left">
					<?php get_sidebar(); ?>	
			</aside>
<?php  get_footer(); ?>			