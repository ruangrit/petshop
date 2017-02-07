<?php
class Petstore_Imagetext_Widget extends WP_Widget
  {
   function __construct()
   {
    global $petstore_plugin_name;
     parent::__construct( 'kaya-image-text-boxes',
      __('Petstore - Image With Overlay Text',$petstore_plugin_name),
      array('description' => __('Displays images with on overlay text',$petstore_plugin_name) )
      );
   }
   function widget( $args, $instance ){
       global $petstore_plugin_name;
      $instance = wp_parse_args($instance,array(
        'title' => __('Enter Title Here',$petstore_plugin_name),
        'link' => '',
        "image_uri" => "",
        'image_width' => '500',
        'image_height' => '500',
        'content_color' => '#ffffff',
        'content' => __('Add here Image Overlay Content', $petstore_plugin_name),
        'image_bg_color' => '#000000',
        'image_opacity' => '0.6',
        'content_align' => __('center',$petstore_plugin_name),
        'content_align_vertical' => __('middle',$petstore_plugin_name),
        'image_border_radius' => '0',
        'image_shadow' => '',
        'animation_names' => '',
        'link_open_new_window' => '',

      ));
      echo $args['before_widget'];
      $target_window = ( $instance['link_open_new_window'] == 'on' ) ? '_blank' : '_self';
      $image_width = $instance['image_width'] ? $instance['image_width'] :'500';
      $image_height = $instance['image_height'] ? $instance['image_height'] :'500';
      $image_shadow = ($instance['image_shadow'] == 'on') ? 'box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);' : '';
       $img_text_animation_class = trim( $instance['animation_names'] )  ? 'wow '.$instance['animation_names'] : '';
     
       echo "<div class='".$img_text_animation_class." image_overlay_content' style='".$image_shadow." color:".$instance['content_color']."; background-color:".$instance['image_bg_color']."; border-radius:".$instance['image_border_radius']."px;'>";   ?>
      <?php  if( !empty($instance['link'])){
             echo '<a href="'.$instance['link'].'" style="color:'.$instance['content_color'].'" target="'.$target_window.'">'; 
           }  ?>
          <div class="figure">
           <?php $default_img_url = constant(strtoupper($petstore_plugin_name).'_PLUGIN_URL').'images/over_lay_default_img.jpg';
            ?>
          <?php if( $instance['image_uri'] ){
            echo '<img src="'.kaya_image_resize( $instance['image_uri'], $image_width, $image_height, 't' ).'" class="" alt="'.$instance['title'].'"  style="opacity:'.$instance['image_opacity'].'; border-radius:'.$instance['image_border_radius'].'px;" />';
          }else{
                 if (is_multisite()){
                     $instance['image_uri'] = $default_img_url;
                  }else{                  
                    $instance['image_uri'] = kaya_image_resize( $default_img_url, $image_width, $image_height,'t' );
                  }
                  echo '<img src="'.$instance['image_uri'].'" class="" alt="'.$instance['title'].'"  style="opacity:'.$instance['image_opacity'].'; border-radius:'.$instance['image_border_radius'].'px;" />';
                }
           ?>
          <div class="overlay_content vertical_align_<?php echo $instance['content_align_vertical']; ?>" style="text-align:<?php echo $instance['content_align']; ?>">
            <?php echo  $instance['content']; ?>
          </div>
          <?php  ?>
          </div>
          <?php
        if( !empty($instance['link'])){ 
            echo '</a>';
          }
         echo "</div>"; 
      echo $args['after_widget'];
    }

    function form( $instance ){
       global $petstore_plugin_name;
      $instance = wp_parse_args($instance, array(
        'title' => __('Enter Title Here',$petstore_plugin_name),
        'link' => '',
        "image_uri" => "",
        'image_width' => '500',
        'image_height' => '500',
        'content_color' => '#ffffff',
        'content' => __('Add here Image Overlay Content', $petstore_plugin_name),
        'image_bg_color' => '#000000',
        'image_opacity' => '1',
        'content_align' => __('center',$petstore_plugin_name),
        'content_align_vertical' => __('middle',$petstore_plugin_name),
        'image_border_radius' => '0',
        'image_shadow' => '',
        'animation_names' => '',
        'link_open_new_window' => '',
        ));

        ?>
<script type='text/javascript'>
  jQuery(document).ready(function($) {
  jQuery('.image_with_overlay_text_color_pickr').each(function(){
  jQuery(this).wpColorPicker();
  });
      
  });
</script>
<div class="input-elements-wrapper"> 
<p>
    <?php $i = rand(1,100); ?>
      <img class="custom_media_image_<?php echo $i; ?>" src="<?php if(!empty($instance['image_uri'])){echo $instance['image_uri'];} ?>" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" />
      <input type="text" class="widefat custom_media_url_<?php echo $i; ?>" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php echo $instance['image_uri']; ?>">
      <input type="button" value="<?php _e( 'Upload Image', 'themename' ); ?>" class="button custom_media_upload_<?php echo $i; ?>" id="custom_media_upload_<?php echo $i; ?>"/>
      <script type="text/javascript">
        jQuery(document).ready( function(){
          jQuery('.custom_media_upload_<?php echo $i; ?>').click(function(e) {
              e.preventDefault();
              var custom_uploader = wp.media({
                  title: 'Image Box Uploading',
                  button: {
                      text: 'Upload Image'
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

      </script>
</p>
<p class="one_fourth">
  <label for="<?php echo $this->get_field_id('image_width') ?>"> <?php _e('Image Width',$petstore_plugin_name) ?>  </label>
  <input type="text" class="small-text" id="<?php echo $this->get_field_id('image_width') ?>" value="<?php echo esc_attr($instance['image_width']) ?>" name="<?php echo $this->get_field_name('image_width') ?>" />
  <small><?php _e('PX',$petstore_plugin_name);?></small>
</p>
<p class="one_fourth">
  <label for="<?php echo $this->get_field_id('image_height') ?>"> <?php _e('Image Height',$petstore_plugin_name) ?>  </label>
  <input type="text" class="small-text" id="<?php echo $this->get_field_id('image_height') ?>" value="<?php echo esc_attr($instance['image_height']) ?>" name="<?php echo $this->get_field_name('image_height') ?>" />
  <small><?php _e('PX',$petstore_plugin_name);?></small>
</p>
<p class="one_fourth">
  <label for="<?php echo $this->get_field_id('image_opacity') ?>"> <?php _e('Image Opacity (0-1)',$petstore_plugin_name) ?>  </label>
  <input type="text" class="widefat" id="<?php echo $this->get_field_id('image_opacity') ?>" value="<?php echo esc_attr($instance['image_opacity']) ?>" name="<?php echo $this->get_field_name('image_opacity') ?>" />
</p>
<p class="one_fourth_last">
  <label for="<?php echo $this->get_field_id('image_bg_color') ?>"> <?php _e('Image Background Color',$petstore_plugin_name) ?>  </label>
  <input type="text" class="image_with_overlay_text_color_pickr" id="<?php echo $this->get_field_id('image_bg_color') ?>" value="<?php echo esc_attr($instance['image_bg_color']) ?>" name="<?php echo $this->get_field_name('image_bg_color') ?>" />
</p>
</div>
<div class="input-elements-wrapper"> 
<p class="one_fourth">
  <label for="<?php echo $this->get_field_id('image_border_radius') ?>"> <?php _e('Image Border Radius',$petstore_plugin_name) ?>  </label>
  <input type="text" class="small-text" id="<?php echo $this->get_field_id('image_border_radius') ?>" value="<?php echo esc_attr($instance['image_border_radius']) ?>" name="<?php echo $this->get_field_name('image_border_radius') ?>" />
  <small><?php _e('PX',$petstore_plugin_name);?></small>
</p>
<p class="one_fourth">
  <label for="<?php echo $this->get_field_id('image_shadow') ?>">  <?php _e('Enable Image Shadow',$petstore_plugin_name) ?>  </label>
    <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("image_shadow"); ?>" name="<?php echo $this->get_field_name("image_shadow"); ?>"<?php checked( (bool) $instance["image_shadow"], true ); ?> />
  </p>
<p class="one_fourth">
  <label for="<?php echo $this->get_field_id('link') ?>"> <?php _e('Image Link',$petstore_plugin_name) ?>  </label>
  <input type="text" class="widefat" id="<?php echo $this->get_field_id('link') ?>" value="<?php echo esc_attr($instance['link']) ?>" name="<?php echo $this->get_field_name('link') ?>" />
  <small><?php _e('Ex:',$petstore_plugin_name); ?> http://www.google.com</small>
</p>
 <p class="one_fourth_last">
     <label for="<?php echo $this->get_field_id('link_open_new_window') ?>"> <?php _e('Open In New Window',$petstore_plugin_name) ?>  </label>
     <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("link_open_new_window"); ?>" name="<?php echo $this->get_field_name("link_open_new_window"); ?>"<?php checked( (bool) $instance["link_open_new_window"], true ); ?> />
  </p> 
</div>
<div class="input-elements-wrapper">  
<p>
  <label for="<?php echo $this->get_field_id('content') ?>"> <?php _e('Image Overlay Content',$petstore_plugin_name) ?> </label>
  <textarea cols="10" class="widefat" id="<?php echo $this->get_field_id('content') ?>" value="<?php echo esc_attr($instance['content']) ?>" name="<?php echo $this->get_field_name('content') ?>" ><?php echo esc_attr($instance['content']) ?></textarea>
</p>
</div>
<div class="input-elements-wrapper"> 
    <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('content_color') ?>"> <?php _e('Content Color',$petstore_plugin_name) ?>  </label>
      <input type="text" class="image_with_overlay_text_color_pickr" id="<?php echo $this->get_field_id('content_color') ?>" value="<?php echo esc_attr($instance['content_color']) ?>" name="<?php echo $this->get_field_name('content_color') ?>" />
    </p>
    <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('content_align') ?>">   <?php _e('Content Horizontal Alignment',$petstore_plugin_name)?>
      </label>
      <select id="<?php echo $this->get_field_id('content_align') ?>" name="<?php echo $this->get_field_name('content_align') ?>">
        <option value="left" <?php selected('left', $instance['content_align']) ?>>   <?php esc_html_e('Align left', $petstore_plugin_name) ?>   </option>
        <option value="right" <?php selected('right', $instance['content_align']) ?>>    <?php esc_html_e('Align Right', $petstore_plugin_name) ?>   </option>
        <option value="center" <?php selected('center', $instance['content_align']) ?>>   <?php esc_html_e('Align Center', $petstore_plugin_name) ?>   </option>
      </select>
    </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('content_align_vertical') ?>">   <?php _e('Content Vertical Alignment',$petstore_plugin_name)
    ?></label>
    <select id="<?php echo $this->get_field_id('content_align_vertical') ?>" name="<?php echo $this->get_field_name('content_align_vertical') ?>">
      <option value="top" <?php selected('top', $instance['content_align_vertical']) ?>>   <?php esc_html_e('Top', $petstore_plugin_name) ?>   </option>
      <option value="bottom" <?php selected('bottom', $instance['content_align_vertical']) ?>>    <?php esc_html_e('Bottom', $petstore_plugin_name) ?>   </option>
      <option value="middle" <?php selected('middle', $instance['content_align_vertical']) ?>>   <?php esc_html_e('Middle', $petstore_plugin_name) ?>   </option>
    </select>
  </p>
</div>
<p>
   <label for="<?php echo $this->get_field_id('animation_names') ?>">  <?php _e('Select Animation Effect',$petstore_plugin_name) ?>  </label>
    <?php animation_effects($this->get_field_name('animation_names'), $instance['animation_names'] ); ?>
  <p> 
<?php }
 }
  petstore_kaya_register_widgets('imagetext', __FILE__);
 ?>