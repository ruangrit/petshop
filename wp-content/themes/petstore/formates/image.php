<?php
 global $post;
	$img_url = wp_get_attachment_url(get_post_thumbnail_id());
  //$params = array('width' => '1160', 'height' => '650', 'crop' => false);
  if( !empty($img_url) ){
	  echo '<div class="post_image">';
		echo '<a href="'.get_the_permalink().'">';
		  echo '<img src="'.kaya_thumb($img_url, 1160, 650, 't').'" class="" alt="'.get_the_title().'" />';  
		echo '</a>';
	  echo '</div>';
  }
?>