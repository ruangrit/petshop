<?php
class Petstore_Banner_Widget extends WP_Widget
  {
   function __construct()
   {
    global $petstore_plugin_name;
     parent::__construct( 'kaya-banner-image',
      __('Petstore - Banner',$petstore_plugin_name).'&nbsp; <a class="widget_video_tutorials" target="_blank" href="https://youtu.be/7yJg26Tv6OE">'.__('Watch this video', $petstore_plugin_name).'</a>',
      array('description' => __('Displays Banner with description',$petstore_plugin_name) )
      );
   }
   function widget( $args, $instance ){
      global $petstore_plugin_name;
      wp_enqueue_script('jquery.isotope');
      $instance = wp_parse_args($instance,array(
        'image_uri' => '',
        'banner_content' => __('Add here Banner Content', $petstore_plugin_name),
        'banner_content_align' => __('center', $petstore_plugin_name),
        'image_width' => '500',
        'image_height' => '500',
        'banner_bg_color' => '',
        'image_hover_bg_color' =>'',
        'image_hover_opacity' =>'',
        'image_hover_text_color'=>'',
        'link' => '',
        'link_open_in_new_tab' => '',
      )); ?>
       <style type="text/css">
        .banner_image_content_wrapper:hover h1,.banner_image_content_wrapper:hover h2,.banner_image_content_wrapper:hover h3,.banner_image_content_wrapper:hover h4,.banner_image_content_wrapper:hover h5,.banner_image_content_wrapper:hover h6,.banner_image_content_wrapper:hover p, .banner_image_content_wrapper:hover span, .banner_image_content_wrapper:hover a{
          color:<?php echo $instance['image_hover_text_color']?>!important;
       }
     </style>
     <?php
      echo $args['before_widget'];
              $image_hover_bg_color = ( $instance['image_hover_opacity'] == 'on' ) ? 'rgba('.kaya_hex_rgba_color($instance['image_hover_bg_color']).',0.3)' : $instance['image_hover_bg_color'];
              $image_width = $instance['image_width'] ? $instance['image_width'] :'500';
              $image_height = $instance['image_height'] ? $instance['image_height'] :'500';
              $image_uri = $instance['image_uri'] ? 'background:url('.kaya_image_resize($instance['image_uri'], $instance['image_width'],  $instance['image_height'], 't').');' :'';
              $banner_bg_color = $instance['banner_bg_color'] ? 'background-color:'.$instance['banner_bg_color'].';' :'';
              $link_open_in_new_tab = ($instance['link_open_in_new_tab'] == 'on') ? '_blank' : '_self';
             if( !empty($instance['link'])){ 
             echo '<a href="'.$instance['link'].'" target="'.$link_open_in_new_tab.'">'; 
           }  
            echo '<div class="banner_image_content_wrapper" style="'.$image_uri.' '.$banner_bg_color.' width:'.$image_width.'px; height:'.$image_height.'px;">';
                echo '<span class="banner_image_hover_bg_color" style="background:'.$image_hover_bg_color.';"> </span>';
                echo '<div class="banner_image_content" style="text-align:'.$instance['banner_content_align'].';">'; ?>
                <?php echo  $instance['banner_content']; ?>
                <?php
                echo '</div>';
            echo '</div>';
             if( !empty($instance['link'])){ 
            echo '</a>';
          }
      echo $args['after_widget'];
    }

    function form( $instance ){
      global $petstore_plugin_name;
      $instance = wp_parse_args($instance, array(
         'image_uri' => '',
         'banner_content' => __('Add here Banner Content', $petstore_plugin_name),
         'image_width' => '500',
        'image_height' => '500',
        'banner_content_align' => __('center', $petstore_plugin_name),
        'banner_bg_color' => '',
        'image_hover_bg_color' =>'',
        'image_hover_opacity' =>'',
        'image_hover_text_color'=>'',
        'link' => '',
        'link_open_in_new_tab' => '',
        ));

        ?>
  <script type='text/javascript'>
  jQuery(document).ready(function($) {
  jQuery('.banner_color_pickr').each(function(){
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
  </div>
<div class="input-elements-wrapper">
<p class="one_fourth">
  <label for="<?php echo $this->get_field_id('banner_bg_color') ?>"> <?php _e('Banner Bg Color',$petstore_plugin_name) ?>  </label>
  <input type="text" class="banner_color_pickr" id="<?php echo $this->get_field_id('banner_bg_color') ?>" value="<?php echo esc_attr($instance['banner_bg_color']) ?>"name="<?php echo $this->get_field_name('banner_bg_color') ?>" /><br>
  <stong><?php _e('Note:',$petstore_plugin_name); ?></strong><?php _e('Banner Bg color works only when Image is  not uploaded.',$petstore_plugin_name); ?>
</p>
<p class="one_fourth">
  <label for="<?php echo $this->get_field_id('image_hover_bg_color') ?>"> <?php _e('Banner Hover Bg Color',$petstore_plugin_name) ?>  </label>
  <input type="text" class="banner_color_pickr" id="<?php echo $this->get_field_id('image_hover_bg_color') ?>" value="<?php echo esc_attr($instance['image_hover_bg_color']) ?>" name="<?php echo $this->get_field_name('image_hover_bg_color') ?>" />
</p>
<p class="one_fourth">
  <label for="<?php echo $this->get_field_id('image_hover_text_color') ?>"> <?php _e('Banner Hover Text Color',$petstore_plugin_name) ?>  </label>
  <input type="text" class="banner_color_pickr" id="<?php echo $this->get_field_id('image_hover_text_color') ?>" value="<?php echo esc_attr($instance['image_hover_text_color']) ?>" name="<?php echo $this->get_field_name('image_hover_text_color') ?>" />
</p>
 <p class="one_fourth_last">
    <label for="<?php echo $this->get_field_id('banner_content_align') ?>"> <?php _e('Content Alignment',$petstore_plugin_name) ?>  </label>
    <select id="<?php echo $this->get_field_id('banner_content_align') ?>" name="<?php echo $this->get_field_name('banner_content_align') ?>">
      <option value="left" <?php selected('left', $instance['banner_content_align']) ?>>   <?php esc_html_e(' Left', $petstore_plugin_name) ?>    </option>
      <option value="right" <?php selected('right', $instance['banner_content_align']) ?>>   <?php esc_html_e('Right', $petstore_plugin_name) ?>   </option>
      <option value="center" <?php selected('center', $instance['banner_content_align']) ?>>  <?php esc_html_e(' Center', $petstore_plugin_name) ?>   </option>
    </select>
  </p>
</div>
<div class="input-elements-wrapper">
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
     <label for="<?php echo $this->get_field_id('image_hover_opacity') ?>"> <?php _e('Image Hover Opacity',$petstore_plugin_name) ?>  </label>
     <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("image_hover_opacity"); ?>" name="<?php echo $this->get_field_name("image_hover_opacity"); ?>"<?php checked( (bool) $instance["image_hover_opacity"], true ); ?> />
  </p>
  <p class="one_fourth_last">
    <label for="<?php echo $this->get_field_id('link') ?>"> <?php _e('Image Link',$petstore_plugin_name) ?>  </label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id('link') ?>" value="<?php echo esc_attr($instance['link']) ?>" name="<?php echo $this->get_field_name('link') ?>" />
  </p>
  <p class="one_fourth">
     <label for="<?php echo $this->get_field_id('link_open_in_new_tab') ?>"> <?php _e('Open Link In New Tab',$petstore_plugin_name) ?>  </label>
     <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("link_open_in_new_tab"); ?>" name="<?php echo $this->get_field_name("link_open_in_new_tab"); ?>"<?php checked( (bool) $instance["link_open_in_new_tab"], true ); ?> />
  </p>
</div>
<p>
  <label for="<?php echo $this->get_field_id('banner_content') ?>"> <?php _e('Image Overlay Content',$petstore_plugin_name) ?> </label>
  <textarea cols="10" class="widefat" id="<?php echo $this->get_field_id('banner_content') ?>" value="<?php echo esc_attr($instance['banner_content']) ?>" name="<?php echo $this->get_field_name('banner_content') ?>" ><?php echo esc_attr($instance['banner_content']) ?></textarea>
</p>
<?php }
 }
  petstore_kaya_register_widgets('banner', __FILE__);
 ?>