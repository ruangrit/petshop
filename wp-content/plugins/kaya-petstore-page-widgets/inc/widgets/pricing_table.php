<?php
class Petstore_Pricing_Table_Widget extends WP_Widget{
  public function __construct(){
     global $petstore_plugin_name;
    parent::__construct(
      $petstore_plugin_name.'-pricing-table',
      __('Petstore - Pricing Table',$petstore_plugin_name),
      array('description' => __('Displays pricing table ',$petstore_plugin_name))
      );
  }
  public function widget($args, $instance){
    global $petstore_plugin_name;
      $instance = wp_parse_args($instance, array(
          'pricing_content' => __('<ul><li>Price List-1</li><li>Price List-2</li></ul>',$petstore_plugin_name),
          'pricing_title' => __('Price Title',$petstore_plugin_name),
          'price' => '$45',
          'price_description' => __('Per Month',$petstore_plugin_name),
          'button_text' => __('Signup',$petstore_plugin_name),
          'button_link' => '#',
          'pricing_box_bg_color' => '#ffffff',
          'pricing_box_text_color' => '#333333',
          'pricing_box_hover_bg_color' => '#de4a4a',
          'pricing_box_hover_text_color' => '#ffffff',
          'Price_text_color' => '#ffffff',
          'Price_bg_color' => '#333333',
           'Price_box_signup_bg_color' => '#de4a4a',
          'Price_box_signup_text_color' => '#ffffff',
          'Price_box_signup_hover_bg_color' => '#252525',
          'Price_box_signup_hover_text_color' => '#ffffff',
          'animation_names' => '',
          'price_hover_text_color' => '#ffffff',
        ));
      $rand_color = rand(1,100); ?>
       <style>
        .pricing_table_wrapper_<?php echo $rand_color; ?>:hover, .pricing_table_wrapper_<?php echo $rand_color; ?>:hover .pricing_table .price_wrapper {
          background:<?php echo $instance['pricing_box_hover_bg_color']; ?>!important;
           color: <?php echo $instance['pricing_box_hover_text_color']; ?>!important;
        }
        .pricing_table_wrapper_<?php echo $rand_color; ?>:hover  h3, .pricing_table_wrapper_<?php echo $rand_color; ?>:hover .pricing_table ul li{
           color: <?php echo $instance['pricing_box_hover_text_color']; ?>!important;
        }
        .pricing_table_wrapper_<?php echo $rand_color; ?>:hover .pricing_footer a{
            background:<?php echo $instance['Price_box_signup_hover_bg_color']; ?>!important;
           color: <?php echo $instance['Price_box_signup_hover_text_color']; ?>!important;
        }
        .pricing_table_wrapper_<?php echo $rand_color; ?>:hover .price h1, .pricing_table_wrapper_<?php echo $rand_color; ?>:hover .price em{
          color:<?php echo $instance['price_hover_text_color'] ?>!important;
        }
      </style>
      <?php echo $args['before_widget'];
       // echo 'testing pricing table content';
       $animation_class = trim( $instance['animation_names']  ) ? 'wow '.$instance['animation_names'] : '';
      echo '<div class="'.$animation_class.' pricing_table_wrapper pricing_table_wrapper_'.$rand_color.'" style="background-color:'.$instance['pricing_box_bg_color'].'; color:'.$instance['pricing_box_text_color'].'">';
        echo '<div class="pricing_table">';
            if( $instance['price'] || $instance['price_description'] ):
              echo '<div class="price_wrapper" style="background-color:'.$instance['Price_bg_color'].';">';
                echo '<div class="price">';
                if( $instance['price'] ): echo '<h1 style="color:'.$instance['Price_text_color'].';">'.$instance['price'].'</h1>'; endif;
                if( $instance['price_description'] ): echo '<em style="color:'.$instance['Price_text_color'].';">'.$instance['price_description'].'</em>'; endif;
                echo '</div>';
              echo '</div>'; 
            endif;
            if( $instance['pricing_title'] ): 
              echo '<div class="pricing_header">';
                echo '<h3 style="color:'.$instance['pricing_box_text_color'].';">'.$instance['pricing_title'] .'</h3>';
              echo '</div>'; 
            endif; 
  
            if( $instance['pricing_content'] ):
                echo '<div class="pricing_content">';
                  echo $instance['pricing_content']; 
                echo '</div>';
            endif;    
            if( $instance['button_text'] ):
              echo '<div class="pricing_footer"><a class="read_more" style="background-color:'.$instance['Price_box_signup_bg_color'].'; color:'.$instance['Price_box_signup_text_color'].';" href="'.$instance['button_link'].'">'.$instance['button_text'].'</a></div>';
            endif;
          echo '</div>';
          echo '</div>';
          echo $args['after_widget'];
  }
  public function form($instance){
    global $petstore_plugin_name;
         $instance = wp_parse_args($instance, array(
          'pricing_content' => __('<ul><li>Price List-1</li><li>Price List-2</li></ul>',$petstore_plugin_name),
          'pricing_title' => __('Price Title',$petstore_plugin_name),
          'price' => '$45',
          'price_description' => __('Per Month',$petstore_plugin_name),
          'button_text' => __('Signup',$petstore_plugin_name),
          'button_link' => '#',
          'pricing_box_bg_color' => '#ffffff',
          'pricing_box_text_color' => '#333333',
          'pricing_box_hover_bg_color' => '#de4a4a',
          'pricing_box_hover_text_color' => '#ffffff',
          'Price_text_color' => '#ffffff',
          'Price_bg_color' => '#333333',
          'Price_box_signup_bg_color' => '#de4a4a',
          'Price_box_signup_text_color' => '#ffffff',
          'Price_box_signup_hover_bg_color' => '#252525',
          'Price_box_signup_hover_text_color' => '#ffffff',
          'price_hover_text_color' => '#ffffff',
          'animation_names' => '',

        )); ?>
<script type='text/javascript'>
  jQuery(document).ready(function($) {
  jQuery('.pricing_table_color_pickr').each(function(){
  jQuery(this).wpColorPicker();
  });
  });
</script>     
<div class="input-elements-wrapper">         
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('pricing_title') ?>"><?php _e('Pricing Title', $petstore_plugin_name) ?></label>
    <input class="widefat" type="text" id="<?php echo $this->get_field_id('pricing_title') ?>" name="<?php echo $this->get_field_name('pricing_title') ?>" value="<?php echo esc_attr($instance['pricing_title']) ?>">
    <small><?php _e('Ex:Basic, Premium, Standard',$petstore_plugin_name) ?></small>     
  </p>  
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('price') ?>"><?php _e('Price', $petstore_plugin_name) ?></label>
    <input class="widefat" type="text" id="<?php echo $this->get_field_id('price') ?>" name="<?php echo $this->get_field_name('price') ?>" value="<?php echo esc_attr($instance['price']) ?>"> 
    <small><?php _e('Ex:$45, $61.5',$petstore_plugin_name) ?></small>     
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('Price_bg_color') ?>"><?php _e('Price Background Color ', $petstore_plugin_name) ?></label>
    <input class="pricing_table_color_pickr" type="text" id="<?php echo $this->get_field_id('Price_bg_color') ?>" name="<?php echo $this->get_field_name('Price_bg_color') ?>" value="<?php echo esc_attr($instance['Price_bg_color']) ?>">    
  </p>
  <p class="one_fourth_last">
    <label for="<?php echo $this->get_field_id('Price_text_color') ?>"><?php _e('Price Color ', $petstore_plugin_name) ?></label>
    <input class="pricing_table_color_pickr" type="text" id="<?php echo $this->get_field_id('Price_text_color') ?>" name="<?php echo $this->get_field_name('Price_text_color') ?>" value="<?php echo esc_attr($instance['Price_text_color']) ?>">    
  </p>
  <p class="one_fourth" style="clear:both;">
    <label for="<?php echo $this->get_field_id('price_hover_text_color') ?>"><?php _e('Price Hover Text Color ', $petstore_plugin_name) ?></label>
    <input class="pricing_table_color_pickr" type="text" id="<?php echo $this->get_field_id('price_hover_text_color') ?>" name="<?php echo $this->get_field_name('price_hover_text_color') ?>" value="<?php echo esc_attr($instance['price_hover_text_color']) ?>">    
  </p>
</div> 
<div class="input-elements-wrapper"> 
  <p class="three_fourth">
    <label for="<?php echo $this->get_field_id('pricing_content') ?>"><?php _e('Pricing Content',$petstore_plugin_name) ?></label>
    <textarea cols="10" class="widefat" id="<?php echo $this->get_field_id('pricing_content') ?>" value="<?php echo esc_attr($instance['pricing_content']) ?>" name="<?php echo $this->get_field_name('pricing_content') ?>" ><?php echo esc_attr($instance['pricing_content']) ?></textarea>
    <small><?php _e('Note: Pricing content add ul li only',$petstore_plugin_name) ?></small>
  </p>
  <p class="one_fourth_last">
    <label for="<?php echo $this->get_field_id('price_description') ?>"><?php _e('Price Description', $petstore_plugin_name) ?></label>
    <input class="widefat" type="text" id="<?php echo $this->get_field_id('price_description') ?>" name="<?php echo $this->get_field_name('price_description') ?>" value="<?php echo esc_attr($instance['price_description']) ?>">
    <small><?php _e('Ex:Per Month, Per Year',$petstore_plugin_name) ?></small>    
  </p>
</div>
<div class="input-elements-wrapper"> 
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('pricing_box_bg_color') ?>"><?php _e('Pricing Box BG Color', $petstore_plugin_name) ?></label>
    <input class="pricing_table_color_pickr" type="text" id="<?php echo $this->get_field_id('pricing_box_bg_color') ?>" name="<?php echo $this->get_field_name('pricing_box_bg_color') ?>" value="<?php echo esc_attr($instance['pricing_box_bg_color']) ?>"> 
    <small><?php _e('Ex: #FF9D01',$petstore_plugin_name) ?></small>  
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('pricing_box_text_color') ?>"><?php _e('Pricing Box Text Color', $petstore_plugin_name) ?></label>
    <input class="pricing_table_color_pickr" type="text" id="<?php echo $this->get_field_id('pricing_box_text_color') ?>" name="<?php echo $this->get_field_name('pricing_box_text_color') ?>" value="<?php echo esc_attr($instance['pricing_box_text_color']) 
    ?>">
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('pricing_box_hover_bg_color') ?>"><?php _e('Pricing Box Hover BG Color', $petstore_plugin_name) ?></label>
    <input class="pricing_table_color_pickr" type="text" id="<?php echo $this->get_field_id('pricing_box_hover_bg_color') ?>" name="<?php echo $this->get_field_name('pricing_box_hover_bg_color') ?>" value="<?php echo esc_attr($instance['pricing_box_hover_bg_color']) ?>">    
  </p>
  <p class="one_fourth_last">
    <label for="<?php echo $this->get_field_id('pricing_box_hover_text_color') ?>"><?php _e('Pricing Box Hover Text Color', $petstore_plugin_name) ?></label>
    <input class="pricing_table_color_pickr" type="text" id="<?php echo $this->get_field_id('pricing_box_hover_text_color') ?>" name="<?php echo $this->get_field_name('pricing_box_hover_text_color') ?>" value="<?php echo esc_attr($instance['pricing_box_hover_text_color']) ?>">    
  </p>
</div>     
<div class="input-elements-wrapper">   
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('Price_box_signup_bg_color') ?>"><?php _e('Signup Button BG Color ', $petstore_plugin_name) ?>
    </label>
    <input class="pricing_table_color_pickr" type="text" id="<?php echo $this->get_field_id('Price_box_signup_bg_color') ?>" name="<?php echo $this->get_field_name('Price_box_signup_bg_color') ?>" value="<?php echo esc_attr($instance['Price_box_signup_bg_color']) ?>">    
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('Price_box_signup_text_color') ?>"><?php _e('Signup Button Text Color', $petstore_plugin_name) ?>
    </label>
    <input class="pricing_table_color_pickr" type="text" id="<?php echo $this->get_field_id('Price_box_signup_text_color') ?>" name="<?php echo $this->get_field_name('Price_box_signup_text_color') ?>" value="<?php echo esc_attr($instance['Price_box_signup_text_color']) ?>">    
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('Price_box_signup_hover_bg_color') ?>"><?php _e('Signup Button Hover BG Color', $petstore_plugin_name) ?></label>
    <input class="pricing_table_color_pickr" type="text" id="<?php echo $this->get_field_id('Price_box_signup_hover_bg_color') ?>" name="<?php echo $this->get_field_name('Price_box_signup_hover_bg_color') ?>" value="<?php echo esc_attr($instance['Price_box_signup_hover_bg_color']) ?>">    
  </p>
  <p class="one_fourth_last">
    <label for="<?php echo $this->get_field_id('Price_box_signup_hover_text_color') ?>"><?php _e('Signup Button Hover Text Color', $petstore_plugin_name) ?>
    </label>
    <input class="pricing_table_color_pickr" type="text" id="<?php echo $this->get_field_id('Price_box_signup_hover_text_color') ?>" name="<?php echo $this->get_field_name('Price_box_signup_hover_text_color') ?>" value="<?php echo esc_attr($instance['Price_box_signup_hover_text_color']) ?>">    
  </p>
</div>
<div class="input-elements-wrapper"> 
<p class="one_fourth">
  <label for="<?php echo $this->get_field_id('button_text') ?>"><?php _e('Signup Button Text', $petstore_plugin_name) ?></label>
  <input class="widefat" type="text" id="<?php echo $this->get_field_id('button_text') ?>" name="<?php echo $this->get_field_name('button_text') ?>" value="<?php echo esc_attr($instance['button_text']) ?>">    
  <small><?php _e('Ex: Signup',$petstore_plugin_name) ?></small>  
</p>
<p class="one_fourth">
  <label for="<?php echo $this->get_field_id('button_link') ?>"><?php _e('Signup Button Link', $petstore_plugin_name) ?></label>
  <input class="widefat" type="text" id="<?php echo $this->get_field_id('button_link') ?>" name="<?php echo $this->get_field_name('button_link') ?>" value="<?php echo esc_attr($instance['button_link']) ?>">
  <small><?php _e('Ex: http://www.google.com',$petstore_plugin_name) ?></small>     
</p>
</div>
<p>
  <label for="<?php echo $this->get_field_id('animation_names') ?>">  <?php _e('Select Animation Effect',$petstore_plugin_name) ?> 
  </label>
  <?php animation_effects($this->get_field_name('animation_names'), $instance['animation_names'] ); ?>
<p> 
<?php }
} 
petstore_kaya_register_widgets('pricing-table', __FILE__);
?>