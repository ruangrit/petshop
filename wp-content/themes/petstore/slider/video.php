<?php global $post;
	$video_bg_id=get_post_meta($post->ID,'video_bg_id',true);
	$video_bg_height=get_post_meta($post->ID,'video_bg_height',true);
	$video_bg_description=get_post_meta($post->ID,'video_bg_description',true);
	$select_video_bg_type = get_post_meta($post->ID,'select_video_bg_type',true);
	$video_bg_webm = get_post_meta($post->ID,'video_bg_webm',true);
	$video_bg_mp4 = get_post_meta($post->ID,'video_bg_mp4',true);
	$video_bg_ogg = get_post_meta($post->ID,'video_bg_ogg',true);
	$bg_video_opcaity = get_post_meta($post->ID,'bg_video_opcaity',true) ? get_post_meta($post->ID,'bg_video_opcaity',true) :'1';
	$video_bg_color = get_post_meta($post->ID,'video_bg_color',true) ? get_post_meta($post->ID,'video_bg_color',true) : '#000000';
	$enable_video_screen_height = get_post_meta($post->ID,'enable_video_screen_height',true);
	$video_height = ( $enable_video_screen_height != '1' ) ? 'height:'.$video_bg_height.'px' : '';
	 ?>
		<script type="text/javascript">
			(function($) {
			"use strict";
			$(function() {
				<?php 	if( $enable_video_screen_height == '1'): ?>
			 $('#mbYTP_video_bg_wrapper').css('opacity',<?php echo $bg_video_opcaity; ?>);
			var $screen_height=$(window).height();
			 mute : true,
			 $('.video_background').css('height',$screen_height);
			 $(window).resize(function(){
			 	var $screen_height=$(window).height();
			 $('.video_background').css('height',$screen_height);
			 });
			 <?php endif; ?>	
			 $(".player").mb_YTPlayer();
			//$('audio').mediaelementplayer(); 
			});
			})(jQuery);
		</script>
		<style>
			#mbYTP_video_bg_wrapper{
				opacity:<?php echo $bg_video_opcaity; ?>!important;
			}
		</style>
 <div class="video_background"  style="<?php echo $video_height; ?>;" >
 <?php if($select_video_bg_type == 'youtube_video'){ ?>
	<a id="video_bg_wrapper" class="player" data-property="{videoURL:'<?php echo trim($video_bg_id); ?>',containment:'.video_background', showControls:true, autoPlay:true, loop:true, vol:50, startAt:10, opacity:1, addRaster:false, quality:'default'}"></a>
	<?php }
	elseif($select_video_bg_type == 'video_webm'){ ?>
		<video id="main_video_wrapper"  preload="auto" poster="" preload="auto" width="auto" height="auto" autoplay="" loop=""  style="visibility: visible; width:1950px; opacity:<?php echo $bg_video_opcaity ?>;"> 
			<?php if(!empty($video_bg_webm)){ ?><source src="<?php echo trim($video_bg_webm); ?>" type="video/webm" /> <?php } ?>
			<?php if(!empty($video_bg_mp4)){ ?><source src="<?php echo trim($video_bg_mp4); ?>" type="video/mp4" />  <?php } ?>
			<?php if(!empty($video_bg_ogg)){ ?><source src="<?php echo trim($video_bg_ogg); ?>" type="video/ogg" /> <?php } ?>
		</video>
	<?php }else{
		//echo 'Add Your Video here';
	} ?>	
	<div class="video_description"> 
	<?php echo $video_bg_description; ?>
	</div>
</div>
