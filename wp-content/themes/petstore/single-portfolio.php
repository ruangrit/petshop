<?php
get_header();
$sidebar_layout=get_post_meta(get_the_id(),'kaya_pagesidebar',true) ? get_post_meta(get_the_id(),'kaya_pagesidebar',true) : 'full';
$portfolio_project_skills_title=get_post_meta(get_the_ID(),'portfolio_project_skills_title' ,true);
$pf_project_title=get_post_meta(get_the_ID(),'pf_project_title' ,true);
$disable_pf_project_information=get_post_meta(get_the_ID(),'disable_pf_project_information' ,true);
$pf_project_information=get_post_meta(get_the_ID(),'pf_project_information' ,true);
$relatedpost=get_post_meta(get_the_ID(),'relatedpost' ,true);
$portfolio_project_skills=get_post_meta(get_the_ID(),'portfolio_project_skills' ,false);		
$pf_categories = get_the_terms(get_the_ID(), 'portfolio_category');
switch( $sidebar_layout ){
	case 'leftsidebar':
		$sidebar_class="two_third_last";
		break;
	case 'rightsidebar':
		$sidebar_class="two_third";
		break;	
	case 'full':
		$sidebar_class="fullwidth";
		break;		
}
$aside_class=($sidebar_layout== "leftsidebar" ) ?  'one_third' : 'one_third_last'; ?>
<!-- Start Middle Section  -->
<div id="mid_container_wrapper" class="mid_container_wrapper_section">
	<div id="mid_container" class="container">
	<div class="entry-content">
	<div class="<?php echo $sidebar_class; ?>">	
	<?php
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	   <?php 	the_content(); ?>
		</div>
	<?php  endwhile; endif;   
	wp_reset_query(); ?>
	<div id="singlepage_nav" > <!-- Navigation Buttons -->
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
	<?php	//wp_reset_query();
	// Commtent Section
	$comment_status = get_post_meta($post->ID,'comment_status', false);
	if( $comment_status != "1") {
		comments_template( '', true );
	} 
	?>
</div>
<!-- Sidebar Section -->
<?php if(  $sidebar_layout !='full' ){ ?>
	<aside class="<?php echo $aside_class; ?>"> <!--Start Sidebar Section -->
		<?php get_sidebar(); ?>	
	</aside> <!--End Sidebar Section -->
	<?php
}
// Related Post Section
if($relatedpost=='1') {
	kaya_relatedpost($post->ID); 
} ?>
</div>			
<?php get_footer(); ?>