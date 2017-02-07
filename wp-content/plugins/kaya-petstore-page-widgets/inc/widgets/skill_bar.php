<?php
class Petstore_Skillset_Widget extends WP_Widget{
   public function __construct(){
    global $petstore_plugin_name;
   parent::__construct(  'kaya-skillbar',
      __('Petstore - Skill bar',$petstore_plugin_name),
      array( 'description' => __('Use this widget to add horizontal skill set',$petstore_plugin_name) ,'class' => 'kaya_skllbar' )
    );
    }
    public function widget( $args , $instance ){
      global $petstore_plugin_name;
      echo $args['before_widget'];
        $instance = wp_parse_args($instance, array(
        'skillbar_values' => __('80|PHP|#4e00ff
92|WordPress|#048f4f
65|Web Design|#35048f',$petstore_plugin_name),
        'skillset_width' => '85',
        'skillbar_color' => '#de4a4a',
        'skillbar_title_color' => '#333333',
        'skillbar_percentage_color' => '#333333',
        'extra_class_name' => '',
        'animation_names' => '',
         ) ); ?>
         <?php $explode_values =  kaya_explode_data(trim($instance['skillbar_values']));
         $animation_class = trim( $instance['animation_names']  ) ? 'wow '.$instance['animation_names'] : '';
          $sting_vales = explode(',', trim($explode_values));
          //print_r($sting_vales);
            $string_data = array();
          foreach ($sting_vales as $key => $sting_vale) {
            $data_values = array();
              $data = explode("|", $sting_vale);
              $data_values['bar_percentage'] = isset($data[0]) ? trim($data[0]) : 0;
              $data_values['value'] = isset($data[1]) ? $data[1] : 1;
              $data_values['bar_color'] = isset($data[2]) ? trim($data[2]) : '#84bf4b';
              $string_data[] = $data_values;
          }
          echo '<div class="'.$animation_class.' skillbar_widget '.$instance['extra_class_name'].'">';
          foreach ($string_data as $key => $string_values) {
            $skillbar_color = 'background-color:'.$string_values['bar_color'];
            $skillbar_title_color = 'color:'.$instance['skillbar_title_color'];
            $skillbar_percentage_color = 'color:'.$instance['skillbar_percentage_color'];
               echo '<div class="skillbar clearfix ">';
              echo '<div class="skillbar-title" style="">';
                  echo '<span style="'.$skillbar_title_color.'">'.$string_values['value'].'</span>';
              echo '</div>';
              echo '<div class="skillbar-bar" data-percent="'.$string_values['bar_percentage'].'%" style="'.$skillbar_color.'"></div>';
              echo '<span class="skillbar_width" style="'.$skillbar_percentage_color.'">'.$string_values['bar_percentage'].'%</span>';
              echo '<div style="background-color:'.$string_values['bar_color'].'" class="skill-bar-percent"></div>';
            echo '</div>';  ?>
        <?php  }
          echo '</div>';
          ?>
        <?php  echo $args['after_widget']; ?>
    <?php }

    public function form( $instance ){
      global $petstore_plugin_name;
        $instance = wp_parse_args( $instance, array(
        'skillbar_values' => __('80|PHP|#4e00ff
         92|WordPress|#048f4f
         65|Web Design|#35048f',$petstore_plugin_name),
        'skillset_width' => '85',
        'skillbar_color' => '#de4a4a',
        'skillbar_title_color' => '#333333',
        'skillbar_percentage_color' => '#333333',
        'extra_class_name' => '',
        'animation_names' => '',

             ) );       ?>
<script type='text/javascript'>
  jQuery(document).ready(function($) {
  jQuery('.skill_bar_color_pickr').each(function(){
  jQuery(this).wpColorPicker();
  });
      
  });
</script>   
<div class="input-elements-wrapper">             
  <p>
    <label for="<?php echo $this->get_field_id('skillbar_values'); ?>"><?php _e('Skillbar Values',$petstore_plugin_name) ?></label>
    <textarea class="widefat" id="<?php echo $this->get_field_id('skillbar_values'); ?>" name="<?php echo $this->get_field_name('skillbar_values') ?>" value="<?php echo esc_attr($instance['skillbar_values']) ?>" ><?php echo esc_attr($instance['skillbar_values']) ?></textarea>
    <small> <?php _e( 'Divide values with linebreaks (Enter) Ex:80|PHP|#4e00ff </small>',$petstore_plugin_name) ?>
  </p>
</div> 
<div class="input-elements-wrapper">  
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('skillbar_title_color') ?>"><?php _e('Skillbar Title Color',$petstore_plugin_name)?></label>
    <input type="text" class="skill_bar_color_pickr" id="<?php echo $this->get_field_id('skillbar_title_color') ?>" name="<?php echo $this->get_field_name('skillbar_title_color') ?>" value="<?php echo $instance['skillbar_title_color']; ?>" />
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('skillbar_percentage_color') ?>"><?php _e('Skillbar Percentage Color',$petstore_plugin_name)?></label>
    <input type="text" class="skill_bar_color_pickr" id="<?php echo $this->get_field_id('skillbar_percentage_color') ?>" name="<?php echo $this->get_field_name('skillbar_percentage_color') ?>" value="<?php echo $instance['skillbar_percentage_color']; ?>" />
  </p>
</div>
<p>
  <label for="<?php echo $this->get_field_id('animation_names') ?>">  <?php _e('Select Animation Effect',$petstore_plugin_name) ?>  </label>
    <?php animation_effects($this->get_field_name('animation_names'), $instance['animation_names'] ); ?>
</p> 
             
<?php  }
}
petstore_kaya_register_widgets('skillset', __FILE__);
?>