<?php
class Petstore_Flipping_Box_Widget extends WP_Widget{
   public function __construct(){
    global $petstore_plugin_name;
     parent::__construct('kaya-'.$petstore_plugin_name.'-flipping-boxes',
        __('Petstore - Flipping Boxes',$petstore_plugin_name),
        array( 'description' => __('Use this widget to add flipping box with description',$petstore_plugin_name)));
   }
   public function widget( $args, $instance){
    global $petstore_plugin_name;
    echo $args['before_widget'];
    $instance = wp_parse_args($instance, array(
      'flip_front_bg_color' => '#9cbf00',
      'flip_back_bg_color' => '#ffffff',
      'flip_icon' => __('fa-glass',$petstore_plugin_name),
      'flip_icon_size'=>'64',
      'flip_icon_color' => '#ffffff',
      'flip_title' => __('Flip Box Title',$petstore_plugin_name),
      'flip_description' => __('Flip Box Description',$petstore_plugin_name),
      'flip_title_color' => '#333',
      'flip_description_color' =>'#333',
      'flip_box_height' => '250',
      'extra_class_name' => '',
      'flip_box_link' => '',
      'link_open_new_window' => '',
      'flip_box_shadow' => '',
      'flip_box_border_radius' => '',
      'flip_icon_bottom_border' => '',
      'animation_names' => '',
      'flip_title_letter_space' => '0',
      'flip_title_size' => '18',
      'flip_title_font_weight' => __('normal',$petstore_plugin_name),
      'flip_title_font_style' => __('normal',$petstore_plugin_name),
      'disable_flip_animtion' => '',
    )); 
      $flip_animation = ( $instance['disable_flip_animtion'] != 'on' ) ? 'on' : 'off';
      $flip_box_shadow = ($instance['flip_box_shadow'] != 'on') ? 'box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);' : '';
      $flip_box_border_radius = ($instance['flip_box_border_radius'] != 'on') ? 'border-radius: 5px;' : '';
      $animation_class = trim( !empty( $instance['animation_names'] ) ) ? 'wow '.$instance['animation_names'] : '';
      $target_window = ( $instance['link_open_new_window'] == 'on' ) ? '_blank' : '_self';
     ?>
    <div class="<?php echo $animation_class; ?> flipping_box_wrapper <?php echo $instance['extra_class_name'] ?>" style="<?php echo $flip_box_shadow.' '.$flip_box_border_radius; ?> <?php //echo $flip_box_border_radius; ?> background-color:<?php echo $instance['flip_front_bg_color']; ?>; height:<?php echo $instance['flip_box_height'] ?>px;">
      <div class="flip_container">
     <div class="flip_content" data-flip-animation="<?php echo $flip_animation; ?>">
          <div class="front">
            <i class="fa <?php echo $instance['flip_icon'] ?>" style="color:<?php echo $instance['flip_icon_color'] ?>; font-size:<?php echo  $instance['flip_icon_size']; ?>px;"></i>
            <?php if( $instance['flip_icon_bottom_border'] ): ?><span style="background:<?php echo $instance['flip_icon_bottom_border']; ?>; width:<?php echo $instance['flip_icon_size']; ?>px;" class="bottom_border"> </span> <?php endif; ?>
             <?php  if($instance['flip_title']): ?><h3 style="color:<?php echo $instance['flip_title_color'] ?>; letter-spacing:<?php echo $instance['flip_title_letter_space'] ?>px; font-size:<?php echo $instance['flip_title_size'] ?>px; font-weight:<?php echo $instance['flip_title_font_weight']; ?>; font-style:<?php echo $instance['flip_title_font_style']; ?>;">
               <?php echo $instance['flip_title'] ?></h3>
             <?php endif; ?>
          </div>
          <div class="back" >
             <?php if(  $instance['flip_box_link'] ): ?> <a target="<?php echo $target_window; ?>" style="color:<?php echo $instance['flip_title_color'] ?>" href="<?php echo $instance['flip_box_link'] ?>"> <?php endif; ?>
              <div class="flipping_box_content" style="background-color:<?php echo $instance['flip_back_bg_color'] ?>; height:<?php echo $instance['flip_box_height'] ?>px; ">
                <?php  if($instance['flip_description']): ?><p style="color:<?php echo $instance['flip_description_color'] ?>"><?php echo $instance['flip_description']; ?></p><?php endif; ?>
             </div>
             <?php if(  $instance['flip_box_link'] ): ?> </a><?php endif; ?>
         </div>
      </div>
</div>
</div>
  <?php 
echo $args['after_widget'];
}
public function form( $instance )
   {
    global $petstore_plugin_name;
    $instance = wp_parse_args($instance, array(
      'flip_front_bg_color' => '#9cbf00',
      'flip_back_bg_color' => '#ffffff',
      'flip_icon' => __('fa-glass',$petstore_plugin_name),
      'flip_icon_size'=>'64',
      'flip_icon_color' => '#ffffff',
      'flip_title' => __('Flip Box Title',$petstore_plugin_name),
      'flip_description' => __('Flip Box Description',$petstore_plugin_name),
      'flip_title_color' => '#333',
      'flip_description_color' =>'#333',
      'flip_box_height' => '250',
      'extra_class_name' => '',
      'flip_box_link' => '',
      'link_open_new_window' => '',
      'flip_box_shadow' => '',
      'flip_box_border_radius' => '',
      'animation_names' => '',
      'flip_icon_bottom_border' => '',
      'flip_title_letter_space' => '0',
      'flip_title_size' => '18',
      'flip_title_font_weight' => __('normal',$petstore_plugin_name),
      'flip_title_font_style' => __('normal',$petstore_plugin_name),
      'disable_flip_animtion' => '',
     
    ));
    $font_sizes = array(16,24,32,48,64,128);
     ?>
     <script type='text/javascript'>
    jQuery(document).ready(function($) {
      jQuery('.flip_box_color_picker').each(function(){
        jQuery(this).wpColorPicker();
      }); 
    });
  </script> 
<div class="input-elements-wrapper">
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('flip_front_bg_color') ?>"><?php _e('Flip Box Background Color',$petstore_plugin_name) ?></label>
    <input type="text" name="<?php echo $this->get_field_name('flip_front_bg_color') ?>" id="<?php echo $this->get_field_id('flip_front_bg_color') ?>" class="flip_box_color_picker" value="<?php echo $instance['flip_front_bg_color'] ?>" />
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('flip_box_height') ?>"><?php _e('Flip Box Height',$petstore_plugin_name) ?></label>
    <input type="text" name="<?php echo $this->get_field_name('flip_box_height') ?>" id="<?php echo $this->get_field_id('flip_box_height') ?>" class="small-text" value="<?php echo $instance['flip_box_height'] ?>" />
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('flip_icon') ?>"> <?php _e('Flip Box Icon Name',$petstore_plugin_name) ?> </label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id('flip_icon') ?>" name="<?php echo $this->get_field_name('flip_icon') ?>" value="<?php echo esc_attr($instance['flip_icon']) ?>" />
    <small><?php _e('Ex: fa-home, For More Awesome icons ',$petstore_plugin_name); ?><a href='http://fontawesome.io/icons/' target='_blank'> click here</a>  </small>
  </p>
  <p class="one_fourth_last">
  <label for="<?php echo $this->get_field_id('flip_icon_size') ?>">  <?php _e('Icon Size',$petstore_plugin_name)?>  </label>
  <select id="<?php echo $this->get_field_id('flip_icon_size') ?>" name="<?php echo $this->get_field_name('flip_icon_size') ?>">
    <?php  foreach ($font_sizes as $font_size) {
             echo '<option value="' .$font_size. '"  id="' .$font_size. '"',  $instance['flip_icon_size'] == $font_size  ? 'selected = "selected"' : '',' >'.$font_size.'</option>';
         }?>
  </select>
</p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('flip_icon_color') ?>"><?php _e('Icon Color',$petstore_plugin_name) ?></label>
    <input type="text" name="<?php echo $this->get_field_name('flip_icon_color') ?>" id="<?php echo $this->get_field_id('flip_icon_color') ?>" class="flip_box_color_picker" value="<?php echo $instance['flip_icon_color'] ?>" />
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('flip_icon_bottom_border') ?>"><?php _e('Icon Bottom Border Color',$petstore_plugin_name) ?></label>
    <input type="text" name="<?php echo $this->get_field_name('flip_icon_bottom_border') ?>" id="<?php echo $this->get_field_id('flip_icon_bottom_border') ?>" class="flip_box_color_picker" value="<?php echo $instance['flip_icon_bottom_border'] ?>" />
  </p>
 <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('flip_title') ?>"><?php _e('Title',$petstore_plugin_name) ?></label>
    <input type="text" name="<?php echo $this->get_field_name('flip_title') ?>" id="<?php echo $this->get_field_id('flip_title') ?>" class="widefat" value="<?php echo $instance['flip_title'] ?>" />
  </p>
  <p class="one_fourth_last">
    <label for="<?php echo $this->get_field_id('flip_title_size') ?>"><?php _e('Title Font Size',$petstore_plugin_name) ?></label>
    <input type="text" name="<?php echo $this->get_field_name('flip_title_size') ?>" id="<?php echo $this->get_field_id('flip_title_size') ?>" class="small-text" value="<?php echo $instance['flip_title_size'] ?>" />
     <small><?php _e('px',$petstore_plugin_name); ?></small>
  </p>
  <p class="one_fourth" style="clear:both;">
    <label for="<?php echo $this->get_field_id('flip_title_letter_space') ?>"><?php _e('Title Letter Space',$petstore_plugin_name) ?></label>
    <input type="text" name="<?php echo $this->get_field_name('flip_title_letter_space') ?>" id="<?php echo $this->get_field_id('flip_title_letter_space') ?>" class="small-text" value="<?php echo $instance['flip_title_letter_space'] ?>" />
    <small><?php _e('px',$petstore_plugin_name); ?></small>
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('flip_title_font_weight') ?>"> <?php _e('Title Font Weight',$petstore_plugin_name) ?></label>
    <select id="<?php echo $this->get_field_id('flip_title_font_weight') ?>" name="<?php echo $this->get_field_name('flip_title_font_weight') ?>">
      <option value="normal" <?php selected('normal', $instance['flip_title_font_weight']) ?>> <?php esc_html_e('Normal', $petstore_plugin_name) ?>   </option>
      <option value="bold" <?php selected('bold', $instance['flip_title_font_weight']) ?>>  <?php esc_html_e('Bold',$petstore_plugin_name) ?></option>
    </select>
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('flip_title_font_style') ?>"> <?php _e('Title Font Style',$petstore_plugin_name) ?></label>
    <select id="<?php echo $this->get_field_id('flip_title_font_style') ?>" name="<?php echo $this->get_field_name('flip_title_font_style') ?>">
      <option value="normal" <?php selected('normal', $instance['flip_title_font_style']) ?>> <?php esc_html_e('Normal', $petstore_plugin_name) ?>   </option>
      <option value="italic" <?php selected('italic', $instance['flip_title_font_style']) ?>>  <?php esc_html_e('Italic', $petstore_plugin_name) ?></option>
    </select>
  </p>
 <p class="one_fourth_last">
    <label for="<?php echo $this->get_field_id('flip_title_color') ?>"><?php _e('Title Color',$petstore_plugin_name) ?></label>
    <input type="text" name="<?php echo $this->get_field_name('flip_title_color') ?>" id="<?php echo $this->get_field_id('flip_title_color') ?>" class="flip_box_color_picker" value="<?php echo $instance['flip_title_color'] ?>" />
  </p>
</div>
<div class="input-elements-wrapper">
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('flip_back_bg_color') ?>"><?php _e('Flip Box Content Background Color',$petstore_plugin_name) ?></label>
    <input type="text" name="<?php echo $this->get_field_name('flip_back_bg_color') ?>" id="<?php echo $this->get_field_id('flip_back_bg_color') ?>" class="flip_box_color_picker" value="<?php echo $instance['flip_back_bg_color'] ?>" />
  </p>  
  <p class="three_fourth">
    <label for="<?php echo $this->get_field_id('flip_description') ?>"><?php _e('Description',$petstore_plugin_name) ?></label>
    <textarea class="widefat" id="<?php echo $this->get_field_id('flip_description'); ?>" name="<?php echo $this->get_field_name('flip_description') ?>" value="<?php echo esc_attr($instance['flip_description']) ?>" ><?php echo esc_attr($instance['flip_description']) ?></textarea>
  </p>
  <p class="one_fourth_last">
    <label for="<?php echo $this->get_field_id('flip_description_color') ?>"><?php _e('Description Color',$petstore_plugin_name) ?></label>
    <input type="text" name="<?php echo $this->get_field_name('flip_description_color') ?>" id="<?php echo $this->get_field_id('flip_description_color') ?>" class="flip_box_color_picker" value="<?php echo $instance['flip_description_color'] ?>" />
  </p>
</div>
<div class="input-elements-wrapper">
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('flip_box_link') ?>"><?php _e('Flip Box Link',$petstore_plugin_name) ?></label>
    <input type="text" name="<?php echo $this->get_field_name('flip_box_link') ?>" id="<?php echo $this->get_field_id('flip_box_link') ?>" class="widefat" value="<?php echo $instance['flip_box_link'] ?>" />
    <small>Ex:http://www.google.com</small>
  </p>
  <p class="one_fourth">
  <label for="<?php echo $this->get_field_id('link_open_new_window') ?>">  <?php _e('Link Open In New Window',$petstore_plugin_name) ?>  </label>
    <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("link_open_new_window"); ?>" name="<?php echo $this->get_field_name("link_open_new_window"); ?>"<?php checked( (bool) $instance["link_open_new_window"], true ); ?> />
  </p>
  <p class="one_fourth">
  <label for="<?php echo $this->get_field_id('flip_box_shadow') ?>">  <?php _e('Disable Box Shadow',$petstore_plugin_name) ?>  </label>
    <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("flip_box_shadow"); ?>" name="<?php echo $this->get_field_name("flip_box_shadow"); ?>"<?php checked( (bool) $instance["flip_box_shadow"], true ); ?> />
  </p>
  <p class="one_fourth_last">
  <label for="<?php echo $this->get_field_id('flip_box_border_radius') ?>">  <?php _e('Disable Border Radius',$petstore_plugin_name) ?>  </label>
    <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("flip_box_border_radius"); ?>" name="<?php echo $this->get_field_name("flip_box_border_radius"); ?>"<?php checked( (bool) $instance["flip_box_border_radius"], true ); ?> />
  </p>
   <p class="one_fourth" style="clear:both;">
  <label for="<?php echo $this->get_field_id('disable_flip_animtion') ?>">  <?php _e('Disable Flip box Hover Animation',$petstore_plugin_name) ?>  </label>
    <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("disable_flip_animtion"); ?>" name="<?php echo $this->get_field_name("disable_flip_animtion"); ?>"<?php checked( (bool) $instance["disable_flip_animtion"], true ); ?> />
  </p>
</div>
    <p>
   <label for="<?php echo $this->get_field_id('animation_names') ?>">  <?php _e('Select Animation Effect',$petstore_plugin_name) ?>  </label>
    <?php animation_effects($this->get_field_name('animation_names'), $instance['animation_names'] ); ?>
  <p>   
   <?php }
}
 petstore_kaya_register_widgets('flipping-box', __FILE__);
?>