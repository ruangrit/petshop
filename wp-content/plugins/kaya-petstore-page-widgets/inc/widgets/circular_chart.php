<?php
  class Petstore_Circular_Chart_Widget extends WP_Widget{
    public function __construct(){
      global $petstore_plugin_name; 
      parent::__construct(  'kaya-skillset',
          __('Petstore - Circular Skillset',$petstore_plugin_name),
          array( 'description' => __('Use this widget to display circular Skillset',$petstore_plugin_name),'class' => 'kaya_skillset' )
        );  
        add_action( 'wp_enqueue_scripts', array( &$this, 'circular_script' ) );        
      } 
    public function circular_script(){
      wp_enqueue_script('jquery.easy-pie-chart');
    } 
    public function widget( $args , $instance ){
      global $petstore_plugin_name;
      wp_enqueue_script('jquery.easy-pie-chart');
      echo $args['before_widget'];
        $instance = wp_parse_args($instance, array(
            'title' => __('Enter Title Here',$petstore_plugin_name),
            'title_color' =>'#333333',
            'bar_color'  =>'#2ACCBF' ,
            'track_color' => '#cccccc',
            'skillset_width' => '75',
            'skill_bar_icon' => __('fa-camera',$petstore_plugin_name),
            'skill_bar_icon_color' => '#333',
            'skill_bar_content' => __('Enter circular Chart Descritpion',$petstore_plugin_name),
            'content_color' => '#787878',
            'animation_names' => '',
         ));
      $circular_chart_cap_animation =   ( trim( $instance['animation_names'] ) )  ? 'wow '. $instance['animation_names'] : ''; ?>  
      <div class="chart_wrapper <?php echo $circular_chart_cap_animation; ?>">
          <div class="chart">
             <?php if( $instance['title'] ): ?><div class="label"><h3 style="color:<?php echo $instance['title_color']; ?>"><?php echo $instance['title']; ?></h3></div>  <?php endif; ?>
              <div class="chart_percentage" data-percent="<?php echo $instance['skillset_width']; ?>%" data-trackcolor="<?php echo $instance['track_color']; ?>" data-barcolor="<?php echo $instance['bar_color']; ?>" style="color:<?php echo $instance['title_color']; ?>">
                  <div class="skills">
                    <?php if( $instance['skill_bar_icon'] ): 
                      echo '<span style="color:'.$instance['skill_bar_icon_color'].'!important;" class="fa '.$instance['skill_bar_icon'].'"></span>';
                    else: 
                      echo '<span style="color:'.$instance['skill_bar_icon_color'].'!important;">'.$instance['skillset_width'].'%</span>';
                    endif; ?>
                 </div>
             </div>
          </div>
          <p style="color:<?php echo $instance['content_color']; ?>"><?php echo $instance['skill_bar_content']; ?> </p>
      </div>
     <?php echo  $args['after_widget'];
      }
    public function form( $instance ){
      global $petstore_plugin_name;
          $instance = wp_parse_args( $instance, array(
             'title' => __('Enter Title Here',$petstore_plugin_name),
             'title_color' =>'#333333',
             'bar_color'  =>'#2ACCBF' ,
             'track_color' => '#cccccc',
             'skillset_width' => '75',
             'skill_bar_icon' => __('fa-camera',$petstore_plugin_name),
             'skill_bar_icon_color' => '#333',
             'skill_bar_content' => __('Enter circular Chart Descritpion',$petstore_plugin_name),
             'content_color' => '#787878',
             'animation_names' => '',
          ) );
          ?>
   <script type='text/javascript'>
      jQuery(document).ready(function($) {
      jQuery('.circular_chart_color_pickr').each(function(){
      jQuery(this).wpColorPicker();
      });
          
      });
    </script> 
  <div class="input-elements-wrapper">
    <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title',$petstore_plugin_name) ?></label>
      <input type="text" name="<?php echo $this->get_field_name('title') ?>" id="<?php echo $this->get_field_id('title') ?>" class="widefat" value="<?php echo $instance['title'] ?>" />
    </p>
    <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('title_color'); ?>"><?php _e('Title Color',$petstore_plugin_name) ?></label>
      <input type="text" name="<?php echo $this->get_field_name('title_color') ?>" id="<?php echo $this->get_field_id
      ('title_color') ?>" class="circular_chart_color_pickr" value="<?php echo $instance['title_color'] ?>" />
    </p>
  </div> 
  <div class="input-elements-wrapper">       
    <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('skillset_width'); ?>"><?php _e('Skillset Width',$petstore_plugin_name) ?></label>
      <input type="text" name="<?php echo $this->get_field_name('skillset_width') ?>" id="<?php echo $this->get_field_id
      ('skillset_width') ?>" class="widefat" value="<?php echo $instance['skillset_width'] ?>" />
    </p>
    <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('bar_color'); ?>"><?php _e('Circular Bar Color',$petstore_plugin_name) ?></label>
      <input type="text" name="<?php echo $this->get_field_name('bar_color') ?>" id="<?php echo $this->get_field_id('bar_color') ?>" class="circular_chart_color_pickr" value="<?php echo $instance['bar_color'] ?>" />
    </p>
    <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('track_color'); ?>"><?php _e('Track Color',$petstore_plugin_name) ?></label>
      <input type="text" name="<?php echo $this->get_field_name('track_color') ?>" id="<?php echo $this->get_field_id
      ('track_color') ?>" class="circular_chart_color_pickr" value="<?php echo $instance['track_color'] ?>" />
    </p>
  </div> 
  <div class="input-elements-wrapper"> 
   <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('skill_bar_icon'); ?>"><?php _e('Circular Chart Icon',$petstore_plugin_name) ?></label>
      <input type="text" name="<?php echo $this->get_field_name('skill_bar_icon') ?>" id="<?php echo $this->get_field_id
      ('skill_bar_icon') ?>" class="widefat" value="<?php echo $instance['skill_bar_icon'] ?>" />
   
      <small>  <?php _e('Ex: fa-camera, for More Awesome icons click',$petstore_plugin_name); ?> <a href='http://fontawesome.io/icons/' target='_blank'> click here </a></small>
    </p>
    <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('skill_bar_icon_color'); ?>"><?php _e('Circular Chart Icon Color'
      ,$petstore_plugin_name) ?></label>
      <input type="text" name="<?php echo $this->get_field_name('skill_bar_icon_color') ?>" id="<?php echo $this->get_field_id('skill_bar_icon_color') ?>" class="circular_chart_color_pickr" value="<?php echo $instance['skill_bar_icon_color'] ?>" />
    </p>
  </div>
  <div class="input-elements-wrapper"> 
    <p class="three_fourth">
      <label for="<?php echo $this->get_field_id('skill_bar_content') ?>">  <?php _e('Circular Chart Description',$petstore_plugin_name)?>   </label>
      <textarea type="text" id="<?php echo $this->get_field_id('skill_bar_content') ?>" class="widefat" name="<?php echo $this->get_field_name('skill_bar_content') ?>" value = "<?php echo esc_attr( $instance['skill_bar_content'] ) ?>" > <?php echo $instance['skill_bar_content'] ?></textarea>
    </p>
    <p class="one_fourth_last">
      <label for="<?php echo $this->get_field_id('content_color'); ?>"><?php _e('Content Color',$petstore_plugin_name) ?></label>
      <input type="text" name="<?php echo $this->get_field_name('content_color') ?>" id="<?php echo $this->get_field_id
      ('content_color') ?>" class="circular_chart_color_pickr" value="<?php echo $instance['content_color'] ?>" />
    </p>
  </div>
    <p>
      <label for="<?php echo $this->get_field_id('animation_names') ?>">  <?php _e('Select Animation Effect',$petstore_plugin_name) ?> 
      </label>
      <?php animation_effects($this->get_field_name('animation_names'), $instance['animation_names'] ); ?>
    <p>

       <?php  }
   }
  petstore_kaya_register_widgets('circular-chart', __FILE__);
 ?>