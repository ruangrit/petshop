<?php
get_header();
$options=get_option('kayapati');
 ?>
<!-- Slider -->
<script type="text/javascript">
(function($) {
  "use strict";
$(window).load(function() {
		$('.bxslider_post_single').owlCarousel({
			nav:false,
		    loop : true,
		    navText: [ '', '' ],
		    autoPlay : true,
		    stopOnHover : true,
		    items :1,
			autoHeight : true,
			animateOut: 'fadeOut',
			animateIn: 'fadeIn',
		}); 
	});
})(jQuery);
</script>
<?php
//Blog Page Options Left / Right / Fullwidth
$blog_single_page_sidebar = get_theme_mod( 'blog_single_page_sidebar' ) ? get_theme_mod( 'blog_single_page_sidebar' ): 'fullwidth';
$blog_sidebar_position = ( $blog_single_page_sidebar == 'two_third' ) ? 'one_third_last'  : 'one_third';
$sidebar_border_class=( $blog_single_page_sidebar == 'two_third' ) ? 'right_sidebar' : 'left_sidebar';
	// Sub Header Section ?>
	<!--Start Middle Section  -->
<div id="mid_container_wrapper" class="mid_container_wrapper_section">
<div id="blog_mid_container" class=""> 
<div class="single_post_meta">
<div class="container">
<div class="one_fourth single_post_info">
	<i class="fa fa-calendar"> </i><span><?php echo get_the_date(get_option('date-fotmat')); ?></span>
</div>
<div class="one_fourth single_post_info">
	<?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> 
		<i class="fa fa-user"> </i><span><?php echo _e('By ','petstore'); ?><?php the_author_posts_link(); ?></span>
	<?php endwhile; endif; ?> 
</div>
<div class="one_fourth single_post_info">
	<i class="fa fa-tags"> </i><span><?php echo get_the_category_list( __( ', ', 'petstore' ) ); ?></span>
</div>
<div class="one_fourth_last single_post_info">
	<i class="fa fa-comments"> </i><span><?php echo comments_popup_link( __( 'No Comments', 'petstore' ) . '</span>', __( '1 Comment', 'petstore' ), __( '% Comments', 'petstore' ) ); ?></span>
</div>
</div>
</div>
	<div class="single_body container">
		<section class="<?php echo $blog_single_page_sidebar; ?>" id="content_section">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php	
					$img_url=wp_get_attachment_url( get_post_thumbnail_id() );			
					// image resize setting
					$featuredImage=get_post_meta($post->ID,'featuredImage', true);
					$single_image=get_option('blog_bigger_image');	
					if(has_post_format('video')){ // Video
						echo '<div class="single_img ">'; 
						$video = get_post_meta( get_the_ID(), 'post_video', true ); 
						echo $video;
						echo '</div>';
					}else if(has_post_format('gallery')){ // Gallery 
						 echo '<div class="single_img ">'; 
						if( class_exists('RW_Meta_Box') ){
						$images = rwmb_meta( 'post_gallery', 'type=image&size=full' );
					}else{
						$images = '';
					}
						$kaya_gallery_slider = get_post_meta($post->ID, 'kaya_gallery_slider', true );
						$gallery_slider = ( $kaya_gallery_slider == '1' ) ? 'bxslider_post_single' : 'blog-isotope-container isotope_gallery';
						$width = ( $kaya_gallery_slider == '1' ) ? '1100' : '397';
						$height = ( $kaya_gallery_slider == '1' ) ? '' : '450';
						//print_r($meta);
						if ( !is_array( $images ) )
						$images = ( array ) $images;
						if ( !empty( $images ) ) {
							unset($images[0]);
						if(count($images) > 1 ){
							echo '<ul class="'.$gallery_slider .' clearfix ">';
							foreach ( $images as $image ) {
							echo "<li>";
								if( $blog_single_page_sidebar == 'fullwidth' ){
									$image_size = '280';
								}else{
									$image_size = '180';
								} ?>
								<?php $params = array('width' => $image_size, 'height' => $image_size, 'crop' => true);?>
								<a rel="prettyPhoto[gallery]" href='<?php echo "{$image['url']}"; ?>' class="" title="">
									<img src="<?php echo kaya_thumb($image['url'], $image_size, $image_size, 't'); ?>" />
								</a>
							<?php echo '</li>';
							}
							echo '</ul>';
							} else{
									foreach ( $images as $image ) {
										if( $blog_single_page_sidebar == 'fullwidth' ){
											$image_size = '1160';
										}else{
											$image_size = '720';
										} ?>
									<a rel="prettyPhoto[gallery]" href='<?php echo "{$image['url']}"; ?>' class="" title="">
									<?php echo "<img src='". kaya_thumb($image['url'], $image_size, '', 't')."' /> </a>";						
								}								
							} 
						}						
						echo '</div>'; 
					}else if(has_post_format('audio')){ // Audio
						$audio = get_post_meta( get_the_ID(), 'kaya_audio', true ); 
						echo $audio;
					}else if(has_post_format('quote')){ // Quote
						$source = get_post_meta(get_the_ID(), 'kaya_quote_desc', true); ?>
						 <div class="quote_format"><blockquote> <?php echo $source; ?> </blockquote></div>
					<?php }else if(has_post_format('link')){ // Link
						$pf_link = get_post_meta(get_the_ID(), 'kaya_link', true); ?>
						<h3><a title="Permalink to: <?php echo $pf_link; ?>" href="<?php echo $pf_link; ?>" target="_blank"> <?php the_title(); ?>  </a>
						</h3>
						<p> <?php echo $pf_link; ?> </p>
					<?php } else{		
					// Slider Attachment images
						//echo '<div class="single_img ">'; 
						//if( has_post_thumbnail() ) {
			 				//echo "<img src='". kaya_thumb($img_url, '1100', '', 't') ."' alt='' />"; 		
						//echo '</div>';
						//}
					}
					?>
					<div class="content_box">
						<?php the_content(); ?> 
					</div>
					<div class="vspace"> </div>
					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'petstore' ), 'after' => '</div>' ) ); ?>
				</div>
					<!-- .entry-content -->
			<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
			<div id="entry-author-info"> <!-- Author Information -->
				<div id="author-avatar" class="alignleft"> <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'kaya_author_bio_avatar_size', 60 ) ); ?> </div>
				<!-- #author-avatar -->
					<div id="author-description" class="description">
						<h4><?php printf( esc_attr__( 'About %s', 'petstore' ), get_the_author() ); ?></h4>
						<p><?php the_author_meta( 'description' ); ?></p>
						<div id="author-link"> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"> <?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'petstore' ), get_the_author() ); ?> </a> </div>
					</div>
			</div>
			<?php endif; ?>
			<!-- End Author information -->    
			<?php   // Comment Section
			$commentsection = get_post_meta( $post->ID, 'commentsection', true );	
			if( $commentsection != "on") {
				comments_template( '', true );
			} ?>
			<?php endwhile; // end of the loop. ?>
		</section>
        <?php // Sidebar Section
		if( $blog_single_page_sidebar != 'fullwidth' ) :	?>
			<article class="<?php echo $blog_sidebar_position. ' ' . $sidebar_border_class; ?>" >
				<?php get_sidebar();?>
			</article>
			<?php endif; ?>
			<div class="clear"></div>
			<div id="singlepage_nav" > <!-- Navigation Buttons -->
		<?php //next_post_link( '%link', '<div class="meta-nav-next"><i class="fa fa-angle-left"></i><span>PREVIOUS POST<br/>DISPLAY POST NAME</span></div>' ); ?>
		<?php //previous_post_link( '%link', '<div class="meta-nav-prev"> <i class="fa fa-angle-right"></i><span>NEXT POST<br/>DISPLAY POST NAME</span></div>' ); ?>
		<?php
		$prev_post = get_previous_post(); ?>
		<?php $next_post = get_next_post(); ?>
		<?php if ( !empty( $next_post ) ): ?>
		 	<a href="<?php echo get_permalink($next_post->ID); ?>">
		 		<div class="meta-nav-next"><i class="fa fa-angle-left"></i>
		 			<span>
			 			<strong><?php _e('PREVIOUS POST', 'petstore') ?></strong>
			 			<p><?php echo $next_post->post_title; ?></p>
		 			</span>
		 		</div>
		 	</a>
		 <?php endif; ?>
		  <?php if ( !empty( $prev_post ) ): ?>
		 		<a href="<?php echo get_permalink($prev_post->ID); ?>">
		 			<div class="meta-nav-prev"> <i class="fa fa-angle-right"></i>
		 				<span>
			 				<strong><?php _e('NEXT POST', 'petstore') ?></strong>
			 				<p><?php echo  $prev_post->post_title; ?></p>
			 			</span>	
		 			</div>
		 		</a>
		 <?php endif; ?>
	</div>
			</div>
	<?php get_footer(); ?>