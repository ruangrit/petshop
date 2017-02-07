<?php
class Petstore_Info_Boxes_Widget extends WP_Widget{
  public function __construct(){
    global $petstore_plugin_name;
    parent::__construct(
        'info-boxes',
          __('Petstore - Info Boxes', $petstore_plugin_name), // Name
        array( 'description' => __('Displays success,warning, info and error boxes',$petstore_plugin_name) , 'class' => '' )
      );
}
public function widget( $args, $instance){
         global $petstore_plugin_name;
        $instance= wp_parse_args($instance, array(
              'info_box_type' => __('success', $petstore_plugin_name),
              'info_box_content' => '',
              'animation_names' => '',
          ));
        echo $args['before_widget'];
         $info_animation_class = trim( $instance['animation_names']  ) ? 'wow '.$instance['animation_names'] : '';
          echo '<div class="'.$info_animation_class.' info_box '.$instance['info_box_type'].'">';
              echo $instance['info_box_content'];
              //echo '<img src="'.plugins_url( 'images/'.$instance['info_box_type'].'_btn.png' , __FILE__ ).'" class="delete">';
               echo '<img src="'.constant(strtoupper($petstore_plugin_name).'_PLUGIN_URL').'images/'.$instance['info_box_type'].'_btn.png" class="delete">';
              
          echo '</div>';
        echo $args['after_widget'];

    }
    public function form($instance){
       global $petstore_plugin_name;
        $instance= wp_parse_args($instance, array(
              'info_box_type' => __('success', $petstore_plugin_name),
              'info_box_content' => '',
              'animation_names' => '',
          ));
      ?>
<div class="input-elements-wrapper">
  <p> 
    <label for="<?php echo $this->get_field_id('info_box_type') ?>"><?php _e('Info Box Type', $petstore_plugin_name) ?></label>
    <select id="<?php echo $this->get_field_id('info_box_type') ?>" name="<?php echo $this->get_field_name('info_box_type')
     ?>"  >
      <option value="success" id="<?php echo $this->get_field_id('info_box_type') ?>" <?php selected( 'success',$instance['info_box_type'] ) ?> >
      <?php esc_html_e('Success', $petstore_plugin_name) ?></option>
      <option value="info" id="<?php echo $this->get_field_id('info_box_type') ?>" <?php selected( 'info',$instance['info_box_type'] ) ?> >
      <?php esc_html_e('Info', $petstore_plugin_name) ?></option>
      <option value="warning" id="<?php echo $this->get_field_id('info_box_type') ?>" <?php selected( 'warning',$instance['info_box_type'] ) ?> >
      <?php esc_html_e('Warning', $petstore_plugin_name) ?></option>
      <option value="error" id="<?php echo $this->get_field_id('info_box_type') ?>" <?php selected( 'error',$instance['info_box_type'] ) ?> >
      <?php esc_html_e('Error', $petstore_plugin_name) ?></option>      
    </select>
  </p>
  <p>
    <label for="<?php echo $this->get_field_id('info_box_content') ?>"><?php _e('Info Box Content',$petstore_plugin_name) ?></lable>
    <textarea type="text" id="<?php echo $this->get_field_id('info_box_content') ?>" class="widefat" name="<?php echo $this
      ->get_field_name('info_box_content') ?>" value = "<?php echo $instance['info_box_content'] ?>" > <?php echo $instance
      ['info_box_content'] ?>
   </textarea>
</p>
</div>
<p>
  <label for="<?php echo $this->get_field_id('animation_names') ?>">  <?php _e('Select Animation Effect',$petstore_plugin_name) ?>  </label>
  <?php animation_effects($this->get_field_name('animation_names'), $instance['animation_names'] ); ?>
<p> 
<?php
    }
  }
petstore_kaya_register_widgets('info-boxes', __FILE__);
  ?>