<?php
class Petstore_Counter_Widget extends WP_Widget{
   public function __construct(){
    global $petstore_plugin_name;
     parent::__construct('kaya-'.$petstore_plugin_name.'-counters',
        __('Petstore - Counters',$petstore_plugin_name),
        array( 'description' => 'Use this widget to add Counters with description')
     );
   }
   public function widget( $args, $instance){
    global $petstore_plugin_name;
    echo $args['before_widget'];
    $instance = wp_parse_args($instance, array(
      'title_desc' => '',
      'icon_name' => __('fa-cog',$petstore_plugin_name),
      'counter_start' => '10',
      'counter_end' => '20',
      'counter_title' => __('Counters Title',$petstore_plugin_name),
      'icon_color' => '#de4a4a',
      'counter_title_color' => '#333333',
      'counter_color' => '#333333',
      'animation_names' => '',
    ));
    $icon_border = $instance['icon_name'] ? '3' : '0';
    $counters_animation = ( trim( $instance['animation_names'] ) )  ? 'wow '. $instance['animation_names'] : '';
      echo '<div class="counters '.$counters_animation.'">';
       if(!empty($instance['icon_name'])): echo '<i class="fa '.$instance['icon_name'].'" style="border:3px solid '.$instance['icon_color'].'; color:'.$instance['icon_color'].'"></i>'; endif;
        echo '<div class="timer counter" style="color:'.$instance['counter_color'].'" data-start="'.$instance['counter_start'].'" data-end="'.$instance['counter_end'].'"> </div>';
        echo '<div class="description">';
          echo '<h4 style="color:'.$instance['counter_title_color'].'">'.$instance['counter_title'].'</h4>';
        echo '</div>';
      echo '</div>';
    echo $args['after_widget'];

   }
   public function form( $instance )
   {
    global $petstore_plugin_name;
    $instance = wp_parse_args($instance, array(
      'title_desc' => '',
      'icon_name' => __('fa-home',$petstore_plugin_name),
      'counter_start' => '10',
      'counter_end' => '20',
      'counter_title' => __('Counters Title',$petstore_plugin_name),
      'icon_color' => '#de4a4a',
      'counter_title_color' => '#333333',
      'counter_color' => '#333333',
      'animation_names' => '',
    )); ?>
    <script type='text/javascript'>
      jQuery(document).ready(function($) {
        jQuery('.counters_color_pickr').each(function(){
          jQuery(this).wpColorPicker();
        });
      });
    </script>
  <div class="input-elements-wrapper">
  <p class="one_half">
    <label for="<?php echo $this->get_field_id('icon_name') ?>"> <?php _e('Font Awesome Icon Name', $petstore_plugin_name) ?> 
    </label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id('icon_name') ?>" name="<?php echo $this->get_field_name('icon_name') ?>" value="<?php echo esc_attr($instance['icon_name']) ?>" />
    <small><?php _e('Ex: fa-home, For More Awesome icons ',$petstore_plugin_name); ?><a href='http://fontawesome.io/icons/' target='_blank'> click here</a>  </small>
  </p>
  <p class="one_half_last">
    <label for="<?php echo $this->get_field_id('icon_color') ?>"><?php _e('Icon Color',$petstore_plugin_name) ?></label>
    <input type="text" name="<?php echo $this->get_field_name('icon_color') ?>" id="<?php echo $this->get_field_id('icon_color') ?>" class="counters_color_pickr" value="<?php echo $instance['icon_color'] ?>" />
  </p>
  </div>
  <div class="input-elements-wrapper">
  <p class="one_third">
    <label for="<?php echo $this->get_field_id('counter_start') ?>"><?php _e('Counter Start',$petstore_plugin_name) ?></label>
    <input type="text" name="<?php echo $this->get_field_name('counter_start') ?>" id="<?php echo $this->get_field_id('counter_start') ?>" class="widefat" value="<?php echo $instance['counter_start'] ?>" />
  </p>
  <p class="one_third">
    <label for="<?php echo $this->get_field_id('counter_end') ?>"><?php _e('Counter End',$petstore_plugin_name) ?></label>
    <input type="text" name="<?php echo $this->get_field_name('counter_end') ?>" id="<?php echo $this->get_field_id('counter_end') ?>" class="widefat" value="<?php echo $instance['counter_end'] ?>" />
  </p>
  <p class="one_third_last">
    <label for="<?php echo $this->get_field_id('counter_color') ?>"><?php _e('Counter Color',$petstore_plugin_name) ?></label>
    <input type="text" name="<?php echo $this->get_field_name('counter_color') ?>" id="<?php echo $this->get_field_id('counter_color') ?>" class="counters_color_pickr" value="<?php echo $instance['counter_color'] ?>" />
  </p>
  </div>
  <div class="input-elements-wrapper">
    <p class="one_half">
      <label for="<?php echo $this->get_field_id('counter_title') ?>"><?php _e('Title',$petstore_plugin_name) ?></label>
      <input type="text" name="<?php echo $this->get_field_name('counter_title') ?>" id="<?php echo $this->get_field_id('counter_title') ?>" class="widefat" value="<?php echo $instance['counter_title'] ?>" />
    </p>
    <p class="one_half_last">
      <label for="<?php echo $this->get_field_id('counter_title_color') ?>"><?php _e('Title Color',$petstore_plugin_name) ?></label>
      <input type="text" name="<?php echo $this->get_field_name('counter_title_color') ?>" id="<?php echo $this->get_field_id('counter_title_color') ?>" class="counters_color_pickr" value="<?php echo $instance['counter_title_color'] ?>" />
    </p>
  </div>
  <p>
   <label for="<?php echo $this->get_field_id('animation_names') ?>">  <?php _e('Select Animation Effect',$petstore_plugin_name) ?>  </label>
    <?php animation_effects($this->get_field_name('animation_names'), $instance['animation_names'] ); ?>
  <p>
   <?php }
 }
 petstore_kaya_register_widgets('counter', __FILE__);
 ?>