<?php
$img_width=kaya_image_width(get_the_id());	
//$aside_class=($sidebar_layout== "leftsidebar" ) ?  'one_third' : 'one_third_last';
$list_images= get_post_meta($post->ID,'list_images',true);
$isotop_gal=( ($list_images=='isotope_gallery') || ($list_images=='grid_gallery') ) ? 'isotope-container' : '';
if( ( $list_images == 'isotope_gallery' ) || ( $list_images == 'grid_gallery' ) ){
	$gallery_with_space=get_post_meta(get_the_ID(),'gallery_with_space' ,true);
	$gallery_class =( $gallery_with_space != '1' ) ? 'gallery_with_space' : '';
}else{
	$gallery_class = '';
}

?>
	<?php if($list_images=='slider'){  ?>
<script type="text/javascript">
(function($) {
  "use strict";
$(window).load(function() {
		$('.bxslider_post_single').bxSlider({
			  minSlides: 1,
			  maxSlides: 1,
			  adaptiveHeight: true,
			  slideMargin: 0,
				nextText: '',
				prevText: '',
			   onSliderLoad: function(){
					$(".bxslider_post_single").css("visibility", "visible");
		 }
			});
      });        
})(jQuery);
</script>
<?php $slider_class="bxslider_post_single";
} else{
	$slider_class='';
 } ?>
 <?php // loop Start here 
	if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php
			observePostViews($post->ID);
			//echo fetchPostViews(get_the_ID());
			$sidebar_layout=get_post_meta(get_the_id(),'kaya_pagesidebar',true); 
			$youtube_video= get_post_meta($post->ID,'youtube_video',true);
			$vimeo_video= get_post_meta($post->ID,'vimeo_video',true);
			$video_type = get_post_meta(get_the_ID(), 'video_type', true );
			$portfolio_project_skills=get_post_meta(get_the_ID(),'portfolio_project_skills' ,false);
			$portfolio_project_skills_title=get_post_meta(get_the_ID(),'portfolio_project_skills_title' ,true);
			$portfolio_skills_title= isset( $options['portfolio_skills_title']) ?  $options['portfolio_skills_title'] : '';
			$pf_featuread_image_disable=get_post_meta(get_the_ID(),'pf_featuread_image_disable' ,true);
			$video_embed_code= get_post_meta($post->ID,'video_embed_code',true);
			$Featuredimage=get_post_meta(get_the_ID(),'Featuredimage' ,true);
			if( class_exists('RW_Meta_Box') ){
			$images = rwmb_meta( 'portfolio_slide', 'type=image&size=full' );
		}else{
			$images ='';
		}
			$title=get_the_title($post->ID);
			foreach($images as $val)
			{		}		
			$postid=$post->ID;
			echo '<div class="single_img '.$list_images.'">';
			 if( isset( $val )!='' ){ 
					global $wpdb, $post;
					if ( !is_array( $images ) )
						$images = ( array ) $images;
						if ( !empty( $images ) ) {
						if(count($images) > 1 ){
							echo '<ul class="'.$slider_class.' '.$isotop_gal.' clearfix '.$list_images.' '.$gallery_class.'">';
							foreach ( $images as $image ){
								if( $sidebar_layout == 'full' ){
									$image_size = '280';
									$list_img_size = (  $image['width'] > '1160' ) ? '1160' : $image['width'];
								}else{
									$image_size = '180';			
									$list_img_size = (  $image['width'] > '715' ) ? '715' : $image['width'];
								}
								echo "<li class='isotope-item all  '>"; 
								 echo "<a href='{$image['url']}' title='{$image['title']}' data-gal='prettyPhoto[gallery]' >"; ?>
								<?php if($list_images=="isotope_gallery"){ ?>
								<?php //$params = array('width' => '480', 'height' => '', 'crop' => false);
								echo "<img src='".kaya_thumb($image['url'], 480, '', 't')."'  alt='{$image['title']}' />"; ?> 
								<?php } elseif($list_images=="grid_gallery"){ ?>
								<?php //params = array('width' => $image_size, 'height' => $image_size, 'crop' => true);
								echo "<img src='".kaya_thumb($image['url'], $image_size, $image_size, 't')."'  alt='{$image['title']}' />"; 		
								}else { ?>
								<?php //$params = array('width' => $list_img_size, 'height' => '', 'crop' => true);
								echo "<img src='".kaya_thumb($image['url'], $list_img_size, '', 't')."' alt='{$image['title']}' width='".$list_img_size."' />"; ?> <?php } ?>	</a>	</li>
										<?php	}
										echo '</ul>';
										}else{
											foreach ( $images as $image ) {
												if( $sidebar_layout == 'full' ){
													$image_size = '280';
													$list_img_size = (  $image['width'] > '1160' ) ? '1160' : $image['width'];
												}else{
													$image_size = '180';			
													$list_img_size = (  $image['width'] > '715' ) ? '715' : $image['width'];
												}
												//$params = array('width' => $list_img_size, 'height' => '', 'crop' => false);
												echo "<img src='".kaya_thumb($image['url'], $list_img_size, '', 't')."' alt='{$image['title']}' width='".$list_img_size."'  />"; 
											}
										}
								} 
						} else {   }
		echo '</div>'; 
				if( $video_embed_code && $images ){
			echo '<br>';
		}
		if($video_embed_code!='')
		{		
			echo $video_embed_code;
		}
		echo '<div class="clear"></div>'; 
				if($sidebar_layout == "full") { 
				if(!empty($post->post_content) ) {	?>
					<div class="fullwidth portfolio_fullwidth portfolio_aside">
						<?php echo the_content(); ?>
					</div>
				<?php } ?>
				<?php }
			else{ }   
		wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'haircare' ), 'after' => '</div>' ) ); 
		edit_post_link( __( 'Edit', 'haircare' ), '<span class="edit-link">', '</span>' ); ?>
		</div>
		<!-- End Ps -->
		<?php  endwhile; // end of the loop. ?>