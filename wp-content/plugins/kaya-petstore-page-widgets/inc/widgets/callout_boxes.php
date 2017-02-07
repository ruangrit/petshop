<?php
/**
 * Callout Box
 */
 class Petstore_Callout_Box_Widget extends WP_Widget
 {
 public function __construct(){
		global $petstore_plugin_name;  
		parent::__construct('kaya-calloutbox-widget',
				__('Petstore - Callout Box',$petstore_plugin_name),
				array( 'description' => __('Use this widget to add callout box with Description', $petstore_plugin_name))
		 );
	 }
	 public function widget($args, $instance){
		 global $petstore_plugin_name;
			$instance = wp_parse_args($instance, array(
					'callout_content_box_bg' => '#333333',
					'title_color' => '#333333',
					'callout_content' => '<h3 style="color:#ffffff; font-size:1.5em;"> A fully <span class="accent"> responsive theme </span> with clean design for your success! </h3>',
					'callout_color' => '#787878',
					'callout_button_text' => __('Readmore',$petstore_plugin_name),
					'callout_button_link' => 'http://www.google.com',
					'button_bg_color' => '#de4a4a',
					'button_text_color' => '#ffffff',
					'button_hover_bg_color' => '#333333',
					'button_hover_text_color' => '#ffffff',
					'button_border_color_1' => '#de4a4a',
					'button_border_1' => '2',
					'disable_fluid' => '',
					'callout_margin_bottom' => '',
					'callout_box_style' => '1',
					'button_icon_name' => __('fa-link',$petstore_plugin_name),
					'callout_button_icon_2' => __('fa-link',$petstore_plugin_name),
					'button_icon_color' => '#ffffff',
					'callout_button_icon_color_2' => '#de4a4a',
					'callout_button_text_2' => __('Buy This Theme',$petstore_plugin_name),
					'callout_button_link_2' => 'http://www.google.com',
					'callout_button_bg_color_2' => '#ffffff',
					'callout_button_text_color_2' => '#de4a4a',
					'callout_button_hover_bg_color_2' => '#333333',
					'callout_button_hover_text_color_2' => '#ffffff',
					'callout_button_border_2' => '2',
					'callout_button_border_color_2' => '#ffffff',
					 'callout_box_padding_top' => '30',
					'callout_box_padding_bottom' => '30',
					'callout_image_url' => '',
					'callout_bg_repeat' => __('no-repeat',$petstore_plugin_name),
					'bg_image_opacity' => '0.5',
					'callout_button_padding_t_b' => '7',
					'callout_button_padding_l_r' => '20',
					'callout_button_padding_t_b_2' => '7',
					'callout_button_padding_l_r_2' => '20',
					'callout_button_border_radius' => '3',
					'callout_button_border_radius_2' => '3',
					'animation_names' => ''
					));

			echo $args['before_widget'];
			$callout_rand = rand(1,100); ?>
			<?php
			 if( $instance['disable_fluid'] != 'on'  ){
					$fluid_css = 'margin-left:-3000px; margin-right:-3000px; padding-left:3000px; padding-right:3000px; padding-bottom:'.$instance['callout_box_padding_bottom'].'px; padding-top:'.$instance['callout_box_padding_top'].'px;'; 
			 }else{
					$fluid_css = '';
			 }
			 $css = '';
			 $css .='.callout_box_'.$callout_rand.' .callout_button_1::before{
					background:'.$instance['button_hover_bg_color'].';
			 }
			 .callout_box_'.$callout_rand.' .callout_button_2::before{
					background:'.$instance['callout_button_hover_bg_color_2'].';
			 }
			 .callout_box_'.$callout_rand.' .callout_button::before{
					background:'.$instance['button_hover_bg_color'].';
			 }
			 .callout_box_'.$callout_rand.' .callout_button_1:hover i{
					color:'.$instance['button_hover_text_color'].'!important;
			 }
			 .callout_box_'.$callout_rand.' .callout_button_2:hover i{
					color:'.$instance['callout_button_hover_text_color_2'].'!important;
			 }
			 .callout_box_'.$callout_rand.' .callout_button:hover i{
					color:'.$instance['button_hover_text_color'].'!important;
			 }';
			 $css = preg_replace( '/\s+/', ' ', $css );
			$output = "<style type=\"text/css\">\n" . $css . "\n</style>";
			echo $output;
			 $callout_bg_img_repeat = ($instance['callout_bg_repeat']=='fit_width') ? 'background-size:cover; background-repeat:no-repeat;' : 'background-repeat:'.$instance['callout_bg_repeat'];
			 $margin_bottom_remove = ($instance['callout_margin_bottom'] == 'on') ? 'on' :'off';
			 $button1_bg_color = $instance['button_bg_color'] ? 'background:'.$instance['button_bg_color'].';' : '';
				$callout_animation = $instance['animation_names'] ? 'wow '.$instance['animation_names'].'' : '';
				echo '<div class="'.$callout_animation.' callout_box_wrapper callout_box_style_'.$instance['callout_box_style'].'  callout_box_'.$callout_rand.'" style="" data-bottom='.$margin_bottom_remove.'>';
				if(  $instance['callout_box_style'] == '1' ){
					echo '<div class="callout_box_content">';
					if($instance['callout_content']): echo '<div class="three_fourth" style="color:'.$instance['callout_color'].'!important;">'.$instance['callout_content'].'</div>';  endif;
					if($instance['button_text_color']):
						echo '<a href="'.$instance['callout_button_link'].'" data-hoverbg="'.$instance['button_hover_bg_color'].'" data-hovertext="'.$instance['button_hover_text_color'].'" class="callout_button one_fourth_last" style="'.$button1_bg_color.' border-radius:'.$instance['callout_button_border_radius'].'px; padding:'.$instance['callout_button_padding_t_b'].'px '.$instance['callout_button_padding_l_r'].'px; border:'.$instance['button_border_1'].'px solid '.$instance['button_border_color_1'].'; color:'.$instance['button_text_color'].'"><i class="fa '.$instance['button_icon_name'].'" style="color:'.$instance['button_icon_color'].'"> </i>&nbsp; '.$instance['callout_button_text'].'</a>';
						endif;
						echo '</div>';
				}
				elseif ($instance['callout_box_style'] == '2') {
					echo '<div class="callout_box_content">';
							$button2_bg_color = $instance['callout_button_bg_color_2'] ? 'background:'.$instance['callout_button_bg_color_2'].';' : '';
							if( $instance['callout_content'] ): echo $instance['callout_content']; endif;
							if( !empty( $instance['callout_button_text'] )):
							 echo '<a href="'.$instance['callout_button_link'].'"  data-hoverbg="'.$instance['button_hover_bg_color'].'" data-hovertext="'.$instance['button_hover_text_color'].'" class="callout_button_1" style="'.$button1_bg_color.'; border-radius:'.$instance['callout_button_border_radius'].'px; padding:'.$instance['callout_button_padding_t_b'].'px '.$instance['callout_button_padding_l_r'].'px; color:'.$instance['button_text_color'].'; border:'.$instance['button_border_1'].'px solid '.$instance['button_border_color_1'].';"><i class="fa '.$instance['button_icon_name'].'" style="color:'.$instance['button_icon_color'].'"></i>&nbsp; '. $instance['callout_button_text'].'</a>';
							endif;
							if( !empty( $instance['callout_button_text_2'] )):
								echo '<a class="callout_button_2"  data-hoverbg="'.$instance['callout_button_hover_bg_color_2'].'" data-hovertext="'.$instance['callout_button_hover_text_color_2'].'" style="'.$button2_bg_color.' border-radius:'.$instance['callout_button_border_radius_2'].'px; padding:'.$instance['callout_button_padding_t_b_2'].'px '.$instance['callout_button_padding_l_r_2'].'px; color:'.$instance['callout_button_text_color_2'].'; border:'.$instance['callout_button_border_2'].'px solid '.$instance['callout_button_border_color_2'].';" href="'.$instance['callout_button_link_2'].'"><i class="fa '.$instance['callout_button_icon_2'].'" style="color:'.$instance['callout_button_icon_2'].'"></i>&nbsp; '.$instance['callout_button_text_2'].'</a>';
							endif;
					echo '</div>';
				}
				else{ }
				echo '</div>';
			echo $args['after_widget'];
	 }

public function form( $instance ){
global $petstore_plugin_name;
$instance = wp_parse_args($instance, array(
	'callout_content_box_bg' => '#333333',
	'title_color' => '#333333',
	'callout_content' => '<h3 style="color:#333333; font-size:1.5em;"> A fully <span class="accent">responsive theme</span>with clean design for your success! </h3>',
	'callout_color' => '#787878',
	'callout_button_text' => __('Readmore',$petstore_plugin_name),
	'callout_button_link' => 'http://www.google.com',
	'button_bg_color' => '#de4a4a',
	'button_text_color' => '#ffffff',
	'button_hover_bg_color' => '#333333',
	'button_hover_text_color' => '#ffffff',
	'button_border_color_1' => '#de4a4a',
	'button_border_1' => '2',
	'disable_fluid' => '',
	'callout_margin_bottom' => '',
	'callout_box_style' => '1',
 'button_icon_name' => __('fa-link',$petstore_plugin_name),
	'callout_button_icon_2' => __('fa-link',$petstore_plugin_name),
	'button_icon_color' => '#ffffff',
	'callout_button_icon_color_2' => '#de4a4a',
	'callout_button_text_2' => __('Buy This Theme',$petstore_plugin_name),
	'callout_button_link_2' => 'http://www.google.com',
	'callout_button_bg_color_2' => '#ffffff',
	'callout_button_text_color_2' => '#de4a4a',
	'callout_button_hover_bg_color_2' => '#333333',
	'callout_button_hover_text_color_2' => '#ffffff',
	'callout_button_border_2' => '2',
	'callout_button_border_color_2' => '#ffffff',
	'callout_box_padding_top' => '30',
	'callout_box_padding_bottom' => '30',
	'callout_image_url' => '',
	'callout_bg_repeat' => __('no-repeat',$petstore_plugin_name),
	'bg_image_opacity' => '0.5',

	'callout_button_padding_t_b' => '7',
	'callout_button_padding_l_r' => '20',
	'callout_button_padding_t_b_2' => '7',
	'callout_button_padding_l_r_2' => '20',
	'callout_button_border_radius' => '3',
	'callout_button_border_radius_2' => '3',

	'animation_names' => '',
));

?>
<script type="text/javascript">
	(function($) {
	"use strict";
	$(function() {
	$("#<?php echo $this->get_field_id('callout_box_style') ?>").change(function () {
	$("#<?php echo $this->get_field_id('callout_button_text_2') ?>").hide();
	$("#<?php echo $this->get_field_id('callout_button_border_color_2') ?>").hide();
	var selectlayout = $("#<?php echo $this->get_field_id('callout_box_style') ?> option:selected").val(); 
	switch(selectlayout)
	{
	case '2':
	$("#<?php echo $this->get_field_id('callout_button_text_2') ?>").show();
	$("#<?php echo $this->get_field_id('callout_button_border_color_2') ?>").show();
	break;      
	}
	}).change();
	$('.callout_boxes_color_pickr').each(function(){
		$(this).wpColorPicker();
	});
	});
	})(jQuery);
</script>

<div class="input-elements-wrapper">   
	<p>
		<label for="<?php echo $this->get_field_id('callout_box_style') ?>">  <?php _e('Select Callout Box Style',$petstore_plugin_name) ?> </label>
		<select id="<?php echo $this->get_field_id('callout_box_style') ?>" name="<?php echo $this->get_field_name
		 ('callout_box_style') ?>">
			<option value="1" <?php selected('1', $instance['callout_box_style']) ?>> <?php esc_html_e('Style - 1', $petstore_plugin_name) ?> </option>
			<option value="2" <?php selected('2', $instance['callout_box_style']) ?>> <?php esc_html_e('Style - 2', $petstore_plugin_name) ?> </option>
		</select>
	</p>
	<?php $i = rand(1,100); ?>
</div>
<div class="input-elements-wrapper">  
	<p class="one_fourth">
		<label for="<?php echo $this->get_field_id('callout_margin_bottom') ?>"> <?php _e('Disable Callout Box Margin Bottom',$petstore_plugin_name) ?>  </label>
		<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("callout_margin_bottom"); ?>" name="<?php echo $this->get_field_name("callout_margin_bottom"); ?>"<?php checked( (bool) $instance["callout_margin_bottom"], true ); ?> />
	</p>
</div>
<div class="input-elements-wrapper">
	<p>
		<lable for="<?php echo $this->get_field_id('callout_content') ?>">  <?php _e('Callout Box Content',$petstore_plugin_name) ?>  </label>
		<textarea type="text" id="<?php echo $this->get_field_id('description') ?>" class="widefat" name="<?php echo $this
		 ->get_field_name('callout_content') ?>" value = "<?php echo esc_attr( $instance['callout_content'] ) ?>" > <?php echo esc_attr( $instance['callout_content'] ) ?>
		</textarea>
	</p>
</div>
<div class="input-elements-wrapper">
	 <p class="one_fourth">
		<label for="<?php echo $this->get_field_id('callout_button_text') ?>"> <?php _e('Button Text',$petstore_plugin_name) ?>  </label>
			<input type="text" id="<?php echo $this->get_field_id('callout_button_text') ?>" class="widefat" name="<?php echo $this->get_field_name('callout_button_text') ?>" value = "<?php echo $instance['callout_button_text'] ?>" />
	</p>
	<p class="one_fourth">
		<label for="<?php echo $this->get_field_id('button_bg_color') ?>"> <?php _e('Button BG Color',$petstore_plugin_name) ?>  </label>
		<input type="text" id="<?php echo $this->get_field_id('button_bg_color') ?>" class="callout_boxes_color_pickr" name="<?php echo $this->get_field_name('button_bg_color') ?>" value = "<?php echo $instance['button_bg_color'] ?>" />
	</p>
	<p class="one_fourth">
		<label for="<?php echo $this->get_field_id('button_text_color') ?>"> <?php _e('Button Text Color',$petstore_plugin_name) ?>  </label>
		<input type="text" id="<?php echo $this->get_field_id('button_text_color') ?>" class="callout_boxes_color_pickr" name="<?php echo $this->get_field_name('button_text_color') ?>" value = "<?php echo $instance['button_text_color'] ?>" />
	</p>
	<p class="one_fourth_last">
		<label for="<?php echo $this->get_field_id('button_icon_name'); ?>"><?php  _e('Button Icon Name',$petstore_plugin_name); ?></label>
		<input id="<?php echo $this->get_field_id('button_icon_name'); ?>" name="<?php echo $this->get_field_name
		('button_icon_name'); ?>" type="text" class="widefat" value="<?php echo $instance['button_icon_name'] ?>" />
		<small>  <?php _e('for More Awesome icons click',$petstore_plugin_name); ?> <a href='http://fontawesome.io/icons/' target='_blank'> here </a></small>
	</p>

</div>
<div class="input-elements-wrapper">
	 <p class="one_fourth">
		<label for="<?php echo $this->get_field_id('button_icon_color'); ?>"><?php  _e('Button Icon Color',$petstore_plugin_name); ?></label>
		<input id="<?php echo $this->get_field_id('button_icon_color'); ?>" name="<?php echo $this->get_field_name
		('button_icon_color'); ?>" type="text" class="callout_boxes_color_pickr" value="<?php echo $instance
		['button_icon_color'] ?>" />
	</p>
	<p class="one_fourth">
		<label for="<?php echo $this->get_field_id('button_border_1') ?>"> <?php _e('Button Border Width',$petstore_plugin_name) ?>  </label>
		<input type="text" id="<?php echo $this->get_field_id('button_border_1') ?>" class="small-text" name="<?php echo $this->get_field_name('button_border_1') ?>" value = "<?php echo $instance['button_border_1'] ?>" />
		<small><?php _e('px',$petstore_plugin_name);?></small>
	</p>
	<p class="one_fourth">
		<label for="<?php echo $this->get_field_id('button_border_color_1') ?>"> <?php _e('Button Border Color',$petstore_plugin_name) ?>  </label>
		<input type="text" id="<?php echo $this->get_field_id('button_border_color_1') ?>" class="callout_boxes_color_pickr" name="<?php echo $this->get_field_name('button_border_color_1') ?>" value = "<?php echo $instance['button_border_color_1'] ?>" />
	</p>
	<p class="one_fourth_last">
		<label for="<?php echo $this->get_field_id('button_hover_bg_color') ?>"> <?php _e('Button Hover BG Color',$petstore_plugin_name) ?>  </label>
		<input type="text" id="<?php echo $this->get_field_id('button_hover_bg_color') ?>" class="callout_boxes_color_pickr" name="<?php echo $this->get_field_name('button_hover_bg_color') ?>" value = "<?php echo $instance['button_hover_bg_color'] ?>" />
	</p>
	</div>
	<div class="input-elements-wrapper">
	<p class="one_fourth">
		<label for="<?php echo $this->get_field_id('button_hover_text_color') ?>"> <?php _e('Button Hover Text Color',$petstore_plugin_name) ?>  </label>
		<input type="text" id="<?php echo $this->get_field_id('button_hover_text_color') ?>" class="callout_boxes_color_pickr" name="<?php echo $this->get_field_name('button_hover_text_color') ?>" value = "<?php echo $instance['button_hover_text_color'] ?>" />
	</p>

	<p class="one_fourth">
		<label for="<?php echo $this->get_field_id('callout_button_padding_t_b') ?>"> <?php _e('Button Padding Top & Bottom',$petstore_plugin_name) ?>  </label>
		<input type="text" id="<?php echo $this->get_field_id('callout_button_padding_t_b') ?>" class="small-text" name="<?php echo $this->get_field_name('callout_button_padding_t_b') ?>" value = "<?php echo $instance['callout_button_padding_t_b'] ?>" />
		<small><?php _e('px',$petstore_plugin_name);?></small>
	</p>

	<p class="one_fourth">
		<label for="<?php echo $this->get_field_id('callout_button_padding_l_r') ?>"> <?php _e('Button Padding Left & Right',$petstore_plugin_name) ?>  </label>
		<input type="text" id="<?php echo $this->get_field_id('callout_button_padding_l_r') ?>" class="small-text" name="<?php echo $this->get_field_name('callout_button_padding_l_r') ?>" value = "<?php echo $instance['callout_button_padding_l_r'] ?>" />
		<small><?php _e('px',$petstore_plugin_name);?></small>
	</p>
	<p class="one_fourth_last">
		<label for="<?php echo $this->get_field_id('callout_button_border_radius') ?>"> <?php _e('Button Border Radius',$petstore_plugin_name) ?>  </label>
		<input type="text" id="<?php echo $this->get_field_id('callout_button_border_radius') ?>" class="small-text" name="<?php echo $this->get_field_name('callout_button_border_radius') ?>" value = "<?php echo $instance['callout_button_border_radius'] ?>" />
		<small><?php _e('px',$petstore_plugin_name);?></small>
	</p>

	<p class="one_fourth" style="clear:both;">
		<label for="<?php echo $this->get_field_id('callout_button_link') ?>">  <?php _e('Button link',$petstore_plugin_name) ?>  </label>
		<input type="text" id="<?php echo $this->get_field_id('callout_button_link') ?>" class="widefat" name="<?php echo $this->get_field_name('callout_button_link') ?>" value = "<?php echo $instance['callout_button_link'] ?>" />
	</p>
</div>

<!-- Button - 2 -->
<div class="input-elements-wrapper" id="<?php echo $this->get_field_id('callout_button_text_2') ?>">
	 <p class="one_fourth">
		<label for="<?php echo $this->get_field_id('callout_button_text_2') ?>"> <?php _e('Button2 Text',$petstore_plugin_name) ?>  </label>
		<input type="text" id="<?php echo $this->get_field_id('callout_button_text_2') ?>" class="widefat" name="<?php echo $this->get_field_name('callout_button_text_2') ?>" value = "<?php echo $instance['callout_button_text_2'] ?>" />
	</p>
	 <p class="one_fourth">
		<label for="<?php echo $this->get_field_id('callout_button_bg_color_2') ?>"> <?php _e('Button2 BG Color',$petstore_plugin_name) ?> 
		 </label>
		<input type="text" id="<?php echo $this->get_field_id('callout_button_bg_color_2') ?>" class="callout_boxes_color_pickr" name="<?php echo $this->get_field_name('callout_button_bg_color_2') ?>" value = "<?php echo $instance['callout_button_bg_color_2'] ?>" />
	</p>
	<p class="one_fourth">
		<label for="<?php echo $this->get_field_id('callout_button_text_color_2') ?>"> <?php _e('Button2 Text Color',$petstore_plugin_name) ?>  </label>
		<input type="text" id="<?php echo $this->get_field_id('callout_button_text_color_2') ?>" class="callout_boxes_color_pickr" name="<?php echo $this->get_field_name('callout_button_text_color_2') ?>" value = "<?php echo $instance['callout_button_text_color_2'] ?>" />
	</p>
		<p class="one_fourth_last">
		<label for="<?php echo $this->get_field_id('callout_button_icon_2'); ?>"><?php  _e('Button2 Icon Name',$petstore_plugin_name); ?></label>
		<input id="<?php echo $this->get_field_id('callout_button_icon_2'); ?>" name="<?php echo $this->get_field_name
		('callout_button_icon_2'); ?>" type="text" class="widefat" value="<?php echo $instance['callout_button_icon_2'] ?>" />
		<small>  <?php _e('for More Awesome icons click',$petstore_plugin_name); ?> <a href='http://fontawesome.io/icons/' target='_blank'> here </a></small>
	</p>
</div>
<div class="input-elements-wrapper" id="<?php echo $this->get_field_id('callout_button_border_color_2') ?>">
	 <p class="one_fourth">
		<label for="<?php echo $this->get_field_id('callout_button_icon_color_2'); ?>"><?php  _e('Button2 Icon Color',$petstore_plugin_name); ?></label>
		<input id="<?php echo $this->get_field_id('callout_button_icon_color_2'); ?>" name="<?php echo $this->get_field_name
		('callout_button_icon_color_2'); ?>" type="text" class="callout_boxes_color_pickr" value="<?php echo $instance
		['callout_button_icon_color_2'] ?>" />
	</p>
	<p class="one_fourth">
		<label for="<?php echo $this->get_field_id('callout_button_border_2') ?>"> <?php _e('Button2 Border Width',$petstore_plugin_name) ?>  </label>
		<input type="text" id="<?php echo $this->get_field_id('callout_button_border_2') ?>" class="small-text" name="<?php echo $this->get_field_name('callout_button_border_2') ?>" value = "<?php echo $instance['callout_button_border_2'] ?>" />
		<small><?php _e('PX',$petstore_plugin_name);?></small>
	</p>
	<p class="one_fourth">
		<label for="<?php echo $this->get_field_id('callout_button_border_color_2') ?>"> <?php _e('Button2 Border Color',$petstore_plugin_name) ?>  </label>
		<input type="text" id="<?php echo $this->get_field_id('callout_button_border_color_2') ?>" class="callout_boxes_color_pickr" name="<?php echo $this->get_field_name('callout_button_border_color_2') ?>" value = "<?php echo $instance['callout_button_border_color_2'] ?>" />
	</p>

	<p class="one_fourth_last"> 
		<label for="<?php echo $this->get_field_id('callout_button_hover_bg_color_2') ?>"> <?php _e('Button2 Hover BG Color',$petstore_plugin_name) ?>  </label>
		<input type="text" id="<?php echo $this->get_field_id('callout_button_hover_bg_color_2') ?>" class="callout_boxes_color_pickr" name="<?php echo $this->get_field_name('callout_button_hover_bg_color_2') ?>" value = "<?php echo $instance['callout_button_hover_bg_color_2'] ?>" />
	</p>
	<p class="one_fourth" style="clear:both;">
		<label for="<?php echo $this->get_field_id('callout_button_hover_text_color_2') ?>"> <?php _e('Button2 Hover Text Color',$petstore_plugin_name) ?>  </label>
		<input type="text" id="<?php echo $this->get_field_id('callout_button_hover_text_color_2') ?>" class="callout_boxes_color_pickr" name="<?php echo $this->get_field_name('callout_button_hover_text_color_2') ?>" value = "<?php echo $instance['callout_button_hover_text_color_2'] ?>" />
	</p>
	<p class="one_fourth">
		<label for="<?php echo $this->get_field_id('callout_button_padding_t_b_2') ?>"> <?php _e('Button2 Padding Top & Bottom',$petstore_plugin_name) ?>  </label>
		<input type="text" id="<?php echo $this->get_field_id('callout_button_padding_t_b_2') ?>" class="small-text" name="<?php echo $this->get_field_name('callout_button_padding_t_b_2') ?>" value = "<?php echo $instance['callout_button_padding_t_b_2'] ?>" />
		<small><?php _e('px',$petstore_plugin_name);?></small>
	</p>

	<p class="one_fourth">
		<label for="<?php echo $this->get_field_id('callout_button_padding_l_r_2') ?>"> <?php _e('Button2 Padding Left & Right',$petstore_plugin_name) ?>  </label>
		<input type="text" id="<?php echo $this->get_field_id('callout_button_padding_l_r_2') ?>" class="small-text" name="<?php echo $this->get_field_name('callout_button_padding_l_r_2') ?>" value = "<?php echo $instance['callout_button_padding_l_r_2'] ?>" />
		<small><?php _e('px',$petstore_plugin_name);?></small>
	</p>
	<p class="one_fourth_last">
		<label for="<?php echo $this->get_field_id('callout_button_border_radius_2') ?>"> <?php _e('Button2 Border Radius',$petstore_plugin_name) ?>  </label>
		<input type="text" id="<?php echo $this->get_field_id('callout_button_border_radius_2') ?>" class="small-text" name="<?php echo $this->get_field_name('callout_button_border_radius_2') ?>" value = "<?php echo $instance['callout_button_border_radius_2'] ?>" />
		<small><?php _e('px',$petstore_plugin_name);?></small>
	</p>
	<p class="one_fourth" style="clear:both;">
		<label for="<?php echo $this->get_field_id('callout_button_link_2') ?>">  <?php _e('Button2 link',$petstore_plugin_name) ?>  </label>
		<input type="text" id="<?php echo $this->get_field_id('callout_button_link_2') ?>" class="widefat" name="<?php echo $this->get_field_name('callout_button_link_2') ?>" value = "<?php echo $instance['callout_button_link_2'] ?>" />
	</p>
</div> 

<!-- End; -->
<p>
	 <label for="<?php echo $this->get_field_id('animation_names') ?>">  <?php _e('Select Animation Effect',$petstore_plugin_name) ?>  </label>
		<?php animation_effects($this->get_field_name('animation_names'), $instance['animation_names'] ); ?>
<p>
<?php 
	 }
 }
	petstore_kaya_register_widgets('callout-box', __FILE__);
 ?>