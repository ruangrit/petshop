<?php
// Vspace Widget
 class Petstore_Vspace_Widget extends WP_Widget{
   public function __construct(){
    global $Petcare_plugin_name;
     parent::__construct(  'kaya-vspace',
        __('Petstore - Vertical Space',$Petcare_plugin_name),
        array( 'description' => __('Use this widget to add vertical height in between block rows',''),'class' => 'kaya_title' )
      );
   }

    public function widget( $args , $instance ){
        echo $args['before_widget'];
        $instance = wp_parse_args($instance, array(
            'height' => '20',
         ) );
        echo '<div class="vspace" style="margin-bottom: '.$instance['height'].'px;"> </div>';
        echo  $args['after_widget'];
    }

    public function form( $instance ){
      global $Petcare_plugin_name;
        $instance = wp_parse_args( $instance, array(
            'height' => '30',
        ) );
        ?>
<div class="input-elements-wrapper">
  <p>
    <label for="<?php echo $this->get_field_id('height'); ?>">  <?php _e('Height',$Petcare_plugin_name) ?>  </label>
    <input type="text" name="<?php echo $this->get_field_name('height') ?>" id="<?php echo $this->get_field_id('height') ?>" class="small-text" value="<?php echo $instance['height'] ?>" />
    <small><?php _e('px',$Petcare_plugin_name);?></small>
  </p>
</div>
<?php  }
 }
 petstore_kaya_register_widgets('vspace', __FILE__);
 ?>