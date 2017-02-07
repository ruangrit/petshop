<div id="Custom_Slider_wrapper">
	<?php 
		$customslider_type=get_post_meta(get_the_id(),'customslider_type',true);
		echo do_shortcode($customslider_type); ?>
</div>