<?php
// Slider Settings
if( !function_exists('kaya_image_slider') ) :
function kaya_image_slider(){
  global $post_item_id, $post;
  echo  kaya_post_item_id();
 $slider=get_post_meta($post_item_id,'slider',true);
 if( $slider == 'none'){ echo '<div id="main_slider"> </div>'; }
 		else {

			echo '<div id="main_slider">';
			if($slider=="image_attachment_slider"){
				get_template_part('slider/super','slider');
			}
			if($slider=="kaya_post_slider"){
				get_template_part('slider/post','slider');
			}
			elseif($slider=="customslider"){
				get_template_part('slider/custom','slider');
			}
			elseif($slider=="none"){
				//get_template_part('slider/custom','slider');

			}
			else{ }
		echo '</div>';
	}
	//else{ ?>

<?php	//}
	wp_reset_query();
}
endif;
?>