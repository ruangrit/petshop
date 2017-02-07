<?php
/*
Template Name: Full Width Page
*/
get_header(); 
global $post_item_id, $post;
  echo  kaya_post_item_id();
	$page_middle_content = get_post_meta($post_item_id,'page_middle_content',true) ? get_post_meta($post_item_id,'page_middle_content',true) : '0';
	if( $page_middle_content == '0' ){ ?>
		<div id="mid_container_wrapper" class="mid_container_wrapper_section">
			<div id="mid_container" class="container">
				<section class="fullwidth" id="content_section">
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
	<?php } ?>
	<?php   get_footer(); ?>