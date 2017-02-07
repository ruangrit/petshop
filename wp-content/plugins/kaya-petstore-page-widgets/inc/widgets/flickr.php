<?php
class Petstore_Flickr_Widget extends WP_Widget {
  public function __construct() {
    global $petstore_plugin_name;
    parent::__construct(
      'flickr-widget', // Base ID
      __('Petstore - Flickr', $petstore_plugin_name), // Name
      array( 'description' => __( 'Displays flickr image', $petstore_plugin_name), ) // Args
    );
  }
public function widget( $args, $instance ) {
  global $petstore_plugin_name;
  $instance = wp_parse_args( $instance, array(
      'title' => __('Flickr Images',$petstore_plugin_name),
      'id' => '',
      'number' => '8',
      'animation_names' => '',
      ));

// outputs the content of the widget
  extract($args); // Make before_widget, etc available.
   $fli_name = empty($instance['title']) ? __('Flickr', $petstore_plugin_name) : $instance['title'];
   $fli_id = $instance['id'];
   $fli_number = $instance['number'];
   $unique_id = $args['widget_id'];
   $instance['id'];
  echo $before_widget;
    echo $before_title . $fli_name . $after_title; ?>
   <?php
     $flicker_animation = (trim($instance['animation_names'])) ? 'wow '.$instance['animation_names'].' ' : '';?>
    <div class="<?php echo  $flicker_animation; ?> flickr-widget">
      <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $fli_number; ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $fli_id; ?>"></script>
    </div>
    <?php echo $after_widget; ?>
  <?php 
}

public function form($instance) {
  global $petstore_plugin_name;
  $instance = wp_parse_args( $instance, array(
      'title' => __('Flickr Images',$petstore_plugin_name),
      'id' => '',
      'number' => '8',
      'animation_names' => '',
      ));

?>
<div class="input-elements-wrapper"> 
  <p>
    <label for="<?php echo $this->get_field_id('title'); ?>"> <?php  _e('Flickr Name',$petstore_plugin_name); ?> </label>
    <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" class="widefat" value="<?php echo $instance['title'] ?>" />
   
  </p>
  <p>
    <label for="<?php echo $this->get_field_id('id'); ?>"> <?php  _e('Flickr ID - ',$petstore_plugin_name); ?> <a target="_blank" href="http://www.idgettr.com">idGettr</a> ex: 52617155@N08 </label>
    <input id="<?php echo $this->get_field_id('id'); ?>" name="<?php echo $this->get_field_name('id'); ?>" type="text" class="widefat" value="<?php echo $instance['id'] ?>"  />
    
  </p>
  <p>
    <label for="<?php echo $this->get_field_id('number'); ?>"> <?php _e('Number of photos:',$petstore_plugin_name); ?> </label>
    <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" class="widefat" value="<?php echo $instance['number'] ?>"  />
    
  </p>
</div>
<p>
   <label for="<?php echo $this->get_field_id('animation_names') ?>">  <?php _e('Select Animation Effect',$petstore_plugin_name) ?>  </label>
    <?php animation_effects($this->get_field_name('animation_names'), $instance['animation_names'] ); ?>
<p>
<?php

}
}
 petstore_kaya_register_widgets('flickr', __FILE__);
?>