<?php 
global $post_item_id, $post;
  echo  kaya_post_item_id();
if( class_exists('RW_Meta_Box') ){
$page_slider_images = rwmb_meta( 'page_slider_images', 'type=image&size=full', $post_item_id );
}else{
$page_slider_images ='';	
}
$page_slider_images = ( array ) $page_slider_images;
if( count($page_slider_images) < 1 ): 
		echo $slide_transition_speed = '0';
	else:
		$Kaya_slider_auto_play=get_post_meta($post_item_id,'Kaya_slider_auto_play',true) ? get_post_meta($post_item_id,'Kaya_slider_auto_play',true) : '0';
		$Kaya_slider_transitions_time=get_post_meta($post_item_id,'Kaya_slider_transitions_time',true) ? get_post_meta($post_item_id,'Kaya_slider_transitions_time',true) : '4000';
		$slide_transition_speed = ( $Kaya_slider_auto_play !='0') ? $Kaya_slider_transitions_time :$Kaya_slider_auto_play; 
endif; 
$Kaya_slider_transitions=get_post_meta($post_item_id,'Kaya_slider_transitions',true) ? get_post_meta($post_item_id,'Kaya_slider_transitions',true) : '8000';
 $kaya_slider_height=get_post_meta($post_item_id,'kaya_slider_height',true);
if( !empty($page_slider_images) ){
	foreach ($page_slider_images as $key => $page_slider_image) { 
 //echo $slide_zoom_effects= get_post_meta( $page_slider_image['ID'], '_slide_zoom_effects', true ) ? get_post_meta( $page_slider_image['ID'], '_slide_zoom_effects', true ) : 'none';
}
}
   ?>
  <script>
  (function($) {
    $(function() {
    	"use strict";
      var $slides = $('#slides');
         $slides.superslides({
       // hashchange: true
       animation : '<?php echo $Kaya_slider_transitions; ?>',
       play :<?php echo trim($slide_transition_speed); ?>,
      });
      Hammer($slides[0]).on("swiperight", function(e) {
     	$slides.data('superslides').animate('prev');
      });
      Hammer($slides[0]).on("swipeleft", function(e) {
        $slides.data('superslides').animate('next');
      });

 var slides ={ init:function(e){
 		$('#slides').delay(4000);
 		$('.super_slides img').addClass('animating');
 	}
 }	
 slides.init();
	  
	$('#slides').on('animating.slides', function() {
		$('.slides_description').addClass('slider_before_animate');
		$('.slides_description').removeClass('slider_after_animate');
		$('.super_slides img').removeClass('animated');
		$('.super_slides img').addClass('animating');
	});
	$('#slides').on('animated.slides', function() {
		var slideNo = $('#slides').superslides('current');
		  setTimeout(function ()
              {
				$('.slides_description').addClass('slider_after_animate');
				$('.slides_description').removeClass('slider_before_animate');
				$('.super_slides img').addClass('animated');
				$('.super_slides img').removeClass('animating');
			}, 100);
	});
	var currentslide = $('#slides').superslides('current');
  });
  })(jQuery);
  </script>
 <?php if( !empty($kaya_slider_height) ){ 
 	$height = 'height:'.$kaya_slider_height.'px!important'; ?>
  <style type="text/css">
  	#slides, .slides-control{
  		height:<?php echo $kaya_slider_height; ?>px!important;
  	}
  </style>
  <?php  }else{ $height = ""; } ?>
<div class="super_slides" style="<?php echo $height; ?>">
<div id="slides" >
	<ul class="slides-container">

<?php			//echo $fluid_portfolio_category.'aaaaaaa';
if( !empty($page_slider_images) ){
	foreach ($page_slider_images as $key => $page_slider_image) { 
$slide_zoom_effects= get_post_meta( $page_slider_image['ID'], '_slide_zoom_effects', true ) ? get_post_meta( $page_slider_image['ID'], '_slide_zoom_effects', true ) : 'none';
		$slider_link=get_post_meta(get_the_ID(),'customlink' ,true); 
		$slide_description=get_post_meta(get_the_ID(),'slide_description',true);
		$slider_target_link= get_post_meta($post->ID,'slider_target_link',true);
		$disable_slide_content = get_post_meta($post->ID,'disable_slide_content',true);
		// Image Title options
		$slide_bg_color= get_post_meta( $page_slider_image['ID'], '_image_bg_color', true ) ? get_post_meta( $page_slider_image['ID'], '_image_bg_color', true ) : '#ffffff';

		$slide_bg_image_opcaity= get_post_meta( $page_slider_image['ID'], '_image_opacity_value', true ) ? get_post_meta( $page_slider_image['ID'], '_image_opacity_value', true ) : '#ffffff';

		$slide_title_font_size= get_post_meta( $page_slider_image['ID'], '_slide_title_font_size', true ) ? get_post_meta( $page_slider_image['ID'], '_slide_title_font_size', true ) : '56';

		$slide_title_font_weight= get_post_meta( $page_slider_image['ID'], '_title_font_weight', true ) ? get_post_meta( $page_slider_image['ID'], '_title_font_weight', true ) : 'normal';

		$slide_title_font_style= get_post_meta( $page_slider_image['ID'], '_title_font_style', true ) ? get_post_meta( $page_slider_image['ID'], '_title_font_style', true ) : 'normal';

		$slide_text_color= get_post_meta( $page_slider_image['ID'], '_title_font_color', true ) ? get_post_meta( $page_slider_image['ID'], '_title_font_color', true ) : '#ffffff';

		$disable_title= get_post_meta( $page_slider_image['ID'], '_disable_title', true ) ?  get_post_meta( $page_slider_image['ID'], '_disable_title', true ) : 'on';
		// Image Description Options
		$slide_description_font_size= get_post_meta( $page_slider_image['ID'], '_slide_description_font_size', true ) ? get_post_meta( $page_slider_image['ID'], '_slide_description_font_size', true ) : '20';

		$slide_description_font_weight= get_post_meta( $page_slider_image['ID'], '_description_font_weight', true ) ? get_post_meta( $page_slider_image['ID'], '_description_font_weight', true ) : 'normal';

		$slide_description_font_style= get_post_meta( $page_slider_image['ID'], '_description_font_style', true ) ? get_post_meta( $page_slider_image['ID'], '_description_font_style', true ) : 'normal';

		$slide_description_color= get_post_meta( $page_slider_image['ID'], '_description_font_color', true ) ? get_post_meta( $page_slider_image['ID'], '_description_font_color', true ) : '#ffffff';

		$title_alignment= get_post_meta( $page_slider_image['ID'], '_title_position', true ) ? get_post_meta( $page_slider_image['ID'], '_title_position', true ) : 'center';

		$title_text_shadow =  get_post_meta( $page_slider_image['ID'], '_title_text_shadow', true ) ? get_post_meta( $page_slider_image['ID'], '_title_text_shadow', true ) : 'on';
		$description_text_shadow =  get_post_meta( $page_slider_image['ID'], '_description_text_shadow', true ) ? get_post_meta( $page_slider_image['ID'], '_description_text_shadow', true ) : 'off';
		// End
		$title_shadow = ($title_text_shadow == 'on') ? 'text-shadow:1px 2px 3px rgba(0, 0, 0, 0.5);' : 'text-shadow:0 0 0 rgba(0, 0, 0, 0.5);';
		$description_shadow = ($description_text_shadow == 'on') ? 'text-shadow:1px 2px 3px rgba(0, 0, 0, 0.5);' : '';
		if( $slider_target_link == '1' ){ $target_link_class='target=_blank';}else{ $target_link_class="_self"; }
		
		$img_url = wp_get_attachment_url( get_post_thumbnail_id() ); //get img URL
		?>
		<li style="background:<?php echo $slide_bg_color; ?>;">
		<?php if( $slider_link ): ?><a href="<?php echo $slider_link; ?>" target="<?php echo $target_link_class; ?>">
		<?php endif; 
		//$params = array('width' => '1920', 'height' => '', 'crop' => true);
		if( $page_slider_image['url'] ){
			echo "<img class='bg_img_slide img_".$page_slider_image['ID']." ".$slide_zoom_effects."' style=\"opacity:$slide_bg_image_opcaity\" src='".kaya_thumb($page_slider_image['url'], 1920, '', 't')."'  alt='{$page_slider_image['title']}' />"; 
		 }else{ ?>
			<img style="opacity:<?php echo $slide_bg_image_opcaity; ?>" src="<?php echo get_template_directory_uri(); ?>/images/defult_featured_img.png" alt="<?php echo the_title(); ?>" />
		<?php }	
		//echo $slide_zoom_effects;
		//if( $disable_slide_content == "0" ){
		echo '<div class="slides_description container" >'; echo '<div class="slides_title_description" style="text-align:'.$title_alignment.';" >'; ?>
					<?php if( $disable_title == 'on' ): ?>
						<h3 style="<?php echo $title_shadow; ?> color:<?php echo $slide_text_color; ?>; font-size:<?php echo $slide_title_font_size; ?>px; font-weight:<?php echo $slide_title_font_weight; ?>; font-style:<?php echo $slide_title_font_style; ?>;"><?php echo $page_slider_image['title']; ?></h3>
					<?php endif; ?>	
					<?php if( $page_slider_image['description'] ): ?><p style="<?php echo $description_shadow; ?> color:<?php echo $slide_description_color; ?>;  font-size:<?php echo $slide_description_font_size; ?>px; font-weight:<?php echo $slide_description_font_weight; ?>; font-style:<?php echo $slide_description_font_style; ?>;"><?php echo $page_slider_image['description']; ?></p> <?php endif; ?>
				<?php	echo '</div></div>';  //}
				if( $slider_link ): ?> </a> <?php endif;
				?>
				</li>
			<?php  } } ?>
		</ul>
<?php if( count($page_slider_images) > 1 ): ?>		
	<nav class="slides-navigation">
      <a href="#" class="next">&nbsp;</a>
      <a href="#" class="prev">&nbsp;</a>
    </nav>
<?php endif; ?>
	</div>
</div>
<?php wp_reset_query(); ?>