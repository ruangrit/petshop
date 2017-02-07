<?php
class Petstore_Dividers_Widget extends WP_Widget
 {
   function __construct()
   {
    global $petstore_plugin_name;
    parent::__construct($petstore_plugin_name.'-custom-dividers',
      __('Petstore - Divider', $petstore_plugin_name),
      array( 'description' => __('Add your custom dividers where you want',$petstore_plugin_name) ));
   }
   public function widget($args, $instance){
    global $petstore_plugin_name;
    $instance = wp_parse_args($instance, array(
         'row_separator_style' => '',
        'row_separator_height' => '1',
        'row_separator_width' => '100',
        'row_separator_color' => '#cccccc',
        'image_uri' => '',
        'divider_align' =>__('center',$petstore_plugin_name),
        'row_separator_top' => '',
        'row_separator_bottom' => '30',
        'animation_names' => '',
      ));
      if( $instance['row_separator_style'] == 'double' ){
        $border_top ='border-top:'.$instance['row_separator_height'].'px solid '.$instance['row_separator_color'].';';
        $border_bottom ='border-bottom:'.$instance['row_separator_height'].'px  solid '.$instance['row_separator_color'].';';
        $border_class="double_line";
      }else{
        $border_top ='border-top:'.$instance['row_separator_height'].'px '.$instance['row_separator_style'].' '.$instance['row_separator_color'].';';
        $border_bottom='';
        $border_class="";
      }
      switch ($instance['divider_align']) {
        case 'left':
          $position="float:left";
          break;
        case 'right':
          $position="float:right";
          break;
        case 'center':
          $position="margin:0px auto";
          break;                  
        default:
          $position="float:left";
          break; 
      }
      echo $args['before_widget'];
      $divider_animation = (trim($instance['animation_names'])) ? 'wow '.$instance['animation_names'].' ' : ''; ?>
     <div class="<?php echo $divider_animation;?>">
        <?php
        if( $instance['image_uri'] ){
          echo '<div class="row_img_separator" style="'.$position.'; margin-top:'.$instance['row_separator_top'].'px; margin-bottom:'.$instance['row_separator_bottom'].'px;">';
            echo '<img src="'.$instance['image_uri'].'" />';
          echo '</div>';  
        }else{
            echo '<div class="row_separator '.$border_class.'" style="'.$position.'; '.$border_top.' '.$border_bottom.' width:'.$instance['row_separator_width'].'%; margin-top:'.$instance['row_separator_top'].'px; margin-bottom:'.$instance['row_separator_bottom'].'px;"></div>';
        }?>
      </div>
      <?php
      echo $args['after_widget'];
      
   }
   public function form($instance){
    global $petstore_plugin_name;
    $instance = wp_parse_args($instance, array(
        'row_separator_style' => '',
        'row_separator_height' => '1',
        'row_separator_width' => '100',
        'row_separator_color' => '#cccccc',
        'image_uri' => '',
        'divider_align' =>__('center',$petstore_plugin_name),
        'row_separator_top' => '',
        'row_separator_bottom' => '30',
        'animation_names' => '',
      )); ?>
 <script type='text/javascript'>
    jQuery(document).ready(function($) {
    jQuery('.divider_color_pickr').each(function(){
    jQuery(this).wpColorPicker();
    });
        
    });
  </script>
<div class="input-elements-wrapper">
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('row_separator_style') ?>">  <?php _e('Divider Style',$petstore_plugin_name)?>  </label>
    <select id="<?php echo $this->get_field_id('row_separator_style') ?>" name="<?php echo $this->get_field_name('row_separator_style') ?>">
      <option value="solid" <?php selected('solid', $instance['row_separator_style']) ?>>  <?php esc_html_e('Single Line', $petstore_plugin_name) ?>    </option>
      <option value="double" <?php selected('double', $instance['row_separator_style']) ?>>  <?php esc_html_e('Double Line', $petstore_plugin_name) ?>    </option>
      <option value="dashed" <?php selected('dashed', $instance['row_separator_style']) ?>>    <?php esc_html_e('Dashed Line', $petstore_plugin_name) ?>    </option>
      <option value="dotted" <?php selected('dotted', $instance['row_separator_style']) ?>>  <?php esc_html_e('Dotted Line', $petstore_plugin_name) ?>    </option>
    </select>
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('row_separator_width'); ?>"> <?php _e('Divider Width',$petstore_plugin_name) ?> </label>
    <input type="text" name="<?php echo $this->get_field_name('row_separator_width') ?>" id="<?php echo $this->get_field_id('row_separator_width') ?>" class="small-widget" value="<?php echo $instance['row_separator_width'] ?>" />
    <small><?php _e('%',$petstore_plugin_name);?></small>
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('row_separator_height'); ?>"> <?php _e('Divider height',$petstore_plugin_name) ?> </label>
    <input type="text" name="<?php echo $this->get_field_name('row_separator_height') ?>" id="<?php echo $this->get_field_id('row_separator_height') ?>" class="small-widget" value="<?php echo $instance['row_separator_height'] ?>" />
    <small><?php _e('PX',$petstore_plugin_name);?></small>
  </p>
  <p class="one_fourth_last">
    <label for="<?php echo $this->get_field_id('row_separator_color'); ?>"> <?php _e('Divider Color',$petstore_plugin_name) ?> </label>
    <input type="text" name="<?php echo $this->get_field_name('row_separator_color') ?>" id="<?php echo $this->get_field_id('row_separator_color') ?>" class="divider_color_pickr" value="<?php echo $instance['row_separator_color'] ?>" />
  </p>
</div>
<div class="input-elements-wrapper">
 <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('divider_align') ?>">  <?php _e('Divider Position',$petstore_plugin_name)?>  </label>
    <select id="<?php echo $this->get_field_id('divider_align') ?>" name="<?php echo $this->get_field_name('divider_align') ?>">
      <option value="left" <?php selected('left', $instance['divider_align']) ?>>  <?php esc_html_e('Left', $petstore_plugin_name) ?>    </option>
      <option value="right" <?php selected('right', $instance['divider_align']) ?>>  <?php esc_html_e('Right', $petstore_plugin_name) ?>    </option>
      <option value="center" <?php selected('center', $instance['divider_align']) ?>>    <?php esc_html_e('Center', $petstore_plugin_name) ?>    </option>
   </select>
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('row_separator_top'); ?>"> <?php _e('Divider Margin Top',$petstore_plugin_name) ?> </label>
    <input type="text" name="<?php echo $this->get_field_name('row_separator_top') ?>" id="<?php echo $this->get_field_id('row_separator_top') ?>" class="small-text" value="<?php echo $instance['row_separator_top'] ?>" />
    <small><?php _e('PX',$petstore_plugin_name);?></small>
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('row_separator_bottom'); ?>"> <?php _e('Divider Margin Bottom',$petstore_plugin_name) ?> </label>
    <input type="text" name="<?php echo $this->get_field_name('row_separator_bottom') ?>" id="<?php echo $this->get_field_id('row_separator_bottom') ?>" class="small-text" value="<?php echo $instance['row_separator_bottom'] ?>" />
    <small><?php _e('PX',$petstore_plugin_name);?></small>
  </p>
</div>
<div class="input-elements-wrapper">
  <p>
      <?php $i = rand(1,100); ?>
          <img class="custom_media_image_<?php echo $i; ?>" src="<?php if(!empty($instance['image_uri'])){echo $instance['image_uri'];} ?>" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" />
          <input type="text" class="widefat custom_media_url_<?php echo $i; ?>" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php echo $instance['image_uri']; ?>">
          <input type="button" value="<?php _e( 'Upload Custom Divider', $petstore_plugin_name ); ?>" class="button custom_media_upload_<?php echo $i; ?>" id="custom_media_upload_<?php echo $i; ?>"/>
          <script type="text/javascript">
            jQuery(document).ready( function(){
              jQuery('.custom_media_upload_<?php echo $i; ?>').click(function(e) {
                  e.preventDefault();
                  var custom_uploader = wp.media({
                      title: 'Upload Divider',
                      button: {
                          text: 'Divider Image Upload'
                      },
                      multiple: false  // Set this to true to allow multiple files to be selected
                  })
                  .on('select', function() {
                      var attachment = custom_uploader.state().get('selection').first().toJSON();
                      jQuery('.custom_media_image_<?php echo $i; ?>').attr('src', attachment.url);
                      jQuery('.custom_media_url_<?php echo $i; ?>').val(attachment.url);
                  })
                  .open();
              });
              });

          </script><br/>
  <stong><?php _e('Note:',$petstore_plugin_name); ?></strong><?php _e(' Which overwrite divider styles ',$petstore_plugin_name); ?>
  </p>
</div>
<p>
    <label for="<?php echo $this->get_field_id('animation_names') ?>">  <?php _e('Select Animation Effect',$petstore_plugin_name) ?> 
    </label>
    <?php animation_effects($this->get_field_name('animation_names'), $instance['animation_names'] ); ?>
<p> 
<?php 
   }
 }
  petstore_kaya_register_widgets('dividers', __FILE__); ?>