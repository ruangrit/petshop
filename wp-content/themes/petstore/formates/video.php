<?php
$video = get_post_meta( get_the_ID(), 'post_video', true );
if($video!=''){ ?>
	<?php echo $video;
}
else{ ?>
	<?php  echo '<h3 class="no_video_class">Sorry, No Video Files Found... </h3>';
} ?>
<?php
$icon_name='fa fa-video-camera ';
//echo kaya_post_content( $kaya_readmore_blog, $icon_name ); ?>
