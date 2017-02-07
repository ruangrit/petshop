<?php
class Petstore_Testimonial_Widget extends WP_Widget{
   public function __construct(){
    global $petstore_plugin_name;
   parent::__construct(  'kaya-testimonials',
      __('Petstore - Testimonial',$petstore_plugin_name),
      array( 'description' => __('Displays testimonial boxes',$petstore_plugin_name), 'class' => 'kaya_testimonial_widget' )
    );
    }
    public function widget( $args , $instance ){
      global $petstore_plugin_name;
      $instance = wp_parse_args($instance, array(
              'title' => __('Client Name <span>Designation</span>',$petstore_plugin_name),
              'testimonial_img' => '#',
              'description' => __('Add Your Testimonial description', $petstore_plugin_name),
              'link' => '#',
              "image_size" => __("full",$petstore_plugin_name),
              "image_id" => "",
              "image_uri" => '',
              'tm_bg_color' => '#EAEAEA',
              'tm_client_name_color' => '#333',
              'tm_description_color' => '#555',
              'animation_names' => '',
              'tm_description_font_size' => '14',
              'tm_description_font_style' => __('normal',$petstore_plugin_name),
              'tm_description_letter_space' => '0',
              'tm_description_font_weight' =>  __('normal',$petstore_plugin_name),
              'tm_client_name_size' => '16',
              'tm_client_name_font_weight' =>  __('normal',$petstore_plugin_name),
              'tm_client_name_leter_sapce' => '0',
              'tm_client_name_font_style' =>  __('normal',$petstore_plugin_name),
             )); 
                $tm_rand = rand(1,20);
             ?>
            <style>
            .testimonial-<?php echo $tm_rand; ?>  h5:before{
              background:  <?php echo $instance['tm_client_name_color']; ?>!important;
            }
            </style>
          <?php
          echo $args['before_widget'];
            $testimonial_animation = $instance['animation_names'] ? 'wow '.$instance['animation_names'].'' : '';
            $desc_line_height = (  ceil($instance['tm_description_font_size']) * 1.85 );
            $client_name_line_height = ( ceil($instance['tm_client_name_size']) * 1.4 );
            echo '<div class="'.$testimonial_animation.' testimonial_wrapper testimonial-'.$tm_rand.'" >';
              echo '<a href="'.$instance['link'].'" target="_blank">';
                   if( $instance["testimonial_img"] ){
                  echo '<img src="'.kaya_image_resize( $instance["testimonial_img"], '100', '100', 't' ).'" class="testimonial_img" alt="'.$instance['title'].'"  />';
                  }else{     ?> 
                    <img src="http://placehold.it/100x100" class="testimonial_img">
               <?php    } ?>
                   <?php echo '</a>';
                // endif;
              echo '<div class="testimonial_content_wrapper">';
               echo '<div class="description" >';
                if( $instance['description']): echo '<p style="color:'.$instance['tm_description_color'].'; font-size:'.$instance['tm_description_font_size'].'px; font-weight:'.$instance['tm_description_font_weight'].'; font-style:'.$instance['tm_description_font_style'].'; letter-spacing:'.$instance['tm_description_letter_space'].'px; line-height:'.$desc_line_height.'px;">"'. $instance['description'].'"</p>'; endif;
              echo '</div>';
              if( $instance['title'] ): echo '<h5 style="color:'.$instance['tm_client_name_color'].'; font-size:'.$instance['tm_client_name_size'].'px; font-weight:'.$instance['tm_client_name_font_weight'].'; font-style:'.$instance['tm_client_name_font_style'].'; letter-spacing:'.$instance['tm_client_name_leter_sapce'].'px; line-height:'.$client_name_line_height.'px;">-- '.$instance['title'].'</h5>'; endif;
          echo '</div></div>';
          echo $args['after_widget'];

    }
    public function form( $instance ){
        global $petstore_plugin_name;
        $instance = wp_parse_args( $instance, array(
              'title' => __('Client Name <span>Designation</span>',$petstore_plugin_name),
              'img_url' => '#',
              'description' => __('Add Your Testimonial description', $petstore_plugin_name),
              'link' => '#',
               "testimonial_img" => '',
              'tm_bg_color' => '#EAEAEA',
              'tm_client_name_color' => '#333',
              'tm_description_color' => '#555',
              'animation_names' => '',
              'tm_description_font_size' => '14',
              'tm_description_font_style' =>  __('normal',$petstore_plugin_name),
              'tm_description_letter_space' => '0',
              'tm_description_font_weight' =>  __('normal',$petstore_plugin_name),
              'tm_client_name_size' => '16',
              'tm_client_name_font_weight' =>  __('normal',$petstore_plugin_name),
              'tm_client_name_leter_sapce' => '0',
              'tm_client_name_font_style' =>  __('normal',$petstore_plugin_name),
        ) );
        ?>
<script type='text/javascript'>
  jQuery(document).ready(function($) {
  jQuery('.testimonial_color_pickr').each(function(){
  jQuery(this).wpColorPicker();
  });
      
  });
</script>  
<div class="input-elements-wrapper">
  <p class="three_fourth">
    <?php $i = rand(1,100); ?>
    <img class="custom_media_image_<?php echo $i; ?>" src="<?php if(!empty($instance['testimonial_img'])){echo $instance['testimonial_img'];} ?>" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" />
    <input type="text" class="widefat custom_media_url_<?php echo $i; ?>" name="<?php echo $this->get_field_name('testimonial_img'); ?>" id="<?php echo $this->get_field_id('testimonial_img'); ?>" value="<?php echo $instance['testimonial_img']; ?>">
    <input type="button" value="<?php _e( 'Upload Testimonial Image', 'themename' ); ?>" class="button custom_media_upload_<?php echo $i; ?>" id="custom_media_upload_<?php echo $i; ?>"/>
    <script type="text/javascript">
      jQuery(document).ready( function(){
      jQuery('.custom_media_upload_<?php echo $i; ?>').click(function(e) {
        e.preventDefault();
        var custom_uploader = wp.media({
        title: 'Testimonial Image',
        button: {
        text: 'Upload Testimonial Image'
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
  <p class="one_fourth_last"> 
    <label for="<?php echo $this->get_field_id('link') ?>"><?php _e('Image Link',$petstore_plugin_name); ?></label>
    <input type="text" name="<?php echo $this->get_field_name('link') ?>" id="<?php echo $this->get_field_id('link') ?>" class="widefat" value="<?php echo $instance['link'] ?>"  />
    <small><?php _e('Ex: http://www.google.com',$petstore_plugin_name); ?></small>
  </p>
</div>
<div class="input-elements-wrapper">
<p class="three_fourth">
  <label for="<?php echo $this->get_field_id('title') ?>"><?php _e('Client Name',$petstore_plugin_name); ?></label>
  <input type="text" name="<?php echo $this->get_field_name('title') ?>" id="<?php echo $this->get_field_id('title') ?>" class="widefat" value="<?php echo $instance['title'] ?>" placeholder="Jhon Deo" />
</p>
<p class="one_fourth_last">
  <label for="<?php echo $this->get_field_id('tm_client_name_size') ?>">  <?php _e('Client Name Font Size',$petstore_plugin_name) ?>  </label>
  <input type="text" class="small-text" id="<?php echo $this->get_field_id('tm_client_name_size') ?>" name="<?php echo $this->get_field_name('tm_client_name_size') ?>" value="<?php echo esc_attr($instance['tm_client_name_size']) ?>" />
  <small>  <?php _e('px',$petstore_plugin_name) ?>  </small> 
</p>
<p class="one_fourth">
  <label for="<?php echo $this->get_field_id('tm_client_name_leter_sapce') ?>">  <?php _e('Client Name Letter Space',$petstore_plugin_name) ?>  </label>
  <input type="text" class="small-text" id="<?php echo $this->get_field_id('tm_client_name_leter_sapce') ?>" name="<?php echo $this->get_field_name('tm_client_name_leter_sapce') ?>" value="<?php echo esc_attr($instance['tm_client_name_leter_sapce']) ?>" />
  <small>  <?php _e('px',$petstore_plugin_name) ?>  </small> 
</p>
<p class="one_fourth">
    <label for="<?php echo $this->get_field_id('tm_client_name_font_style') ?>"> <?php _e('Client Name Font Style',$petstore_plugin_name) ?></label>
    <select id="<?php echo $this->get_field_id('tm_client_name_font_style') ?>" name="<?php echo $this->get_field_name('tm_client_name_font_style') ?>">
      <option value="normal" <?php selected('normal', $instance['tm_client_name_font_style']) ?>> <?php esc_html_e('Normal', $petstore_plugin_name) ?>   </option>
      <option value="italic" <?php selected('italic', $instance['tm_client_name_font_style']) ?>>  <?php esc_html_e('Italic',$petstore_plugin_name) ?></option>
    </select>
  </p>
<p class="one_fourth">
    <label for="<?php echo $this->get_field_id('tm_client_name_font_weight') ?>"> <?php _e('Client Name Font Weight',$petstore_plugin_name) ?></label>
    <select id="<?php echo $this->get_field_id('tm_client_name_font_weight') ?>" name="<?php echo $this->get_field_name('tm_client_name_font_weight') ?>">
      <option value="normal" <?php selected('normal', $instance['tm_client_name_font_weight']) ?>> <?php esc_html_e('Normal', $petstore_plugin_name) ?>   </option>
      <option value="bold" <?php selected('bold', $instance['tm_client_name_font_weight']) ?>>  <?php esc_html_e('Bold',$petstore_plugin_name) ?></option>
    </select>
  </p>
<p class="one_fourth_last">
  <label for="<?php echo $this->get_field_id('tm_client_name_color') ?>"><?php _e('Client Name Color',$petstore_plugin_name); ?></label>
  <input type="text" name="<?php echo $this->get_field_name('tm_client_name_color') ?>" id="<?php echo $this->get_field_id('tm_client_name_color') ?>" class="testimonial_color_pickr" value="<?php echo $instance['tm_client_name_color'] ?>" 
  />
</p>
</div>
<div class="input-elements-wrapper">
<p class="three_fourth">
  <label for="<?php echo $this->get_field_id('description') ?>"><?php _e('Description',$petstore_plugin_name); ?></label>
   <textarea cols="40" name="<?php echo $this->get_field_name('description') ?>" id="<?php echo $this->get_field_id('description') ?>" value="<?php echo $instance['description'] ?>" class="widefat" ><?php echo $instance['description'] 
   ?>
  </textarea>
</p>

  <p class="one_fourth_last">
  <label for="<?php echo $this->get_field_id('tm_description_font_size') ?>">  <?php _e('Description Font Size',$petstore_plugin_name) ?>  </label>
  <input type="text" class="small-text" id="<?php echo $this->get_field_id('tm_description_font_size') ?>" name="<?php echo $this->get_field_name('tm_description_font_size') ?>" value="<?php echo esc_attr($instance['tm_description_font_size']) ?>" />
  <small>  <?php _e('px',$petstore_plugin_name) ?>  </small> 
</p>
<p class="one_fourth">
  <label for="<?php echo $this->get_field_id('tm_description_letter_space') ?>">  <?php _e('Description Letter Space',$petstore_plugin_name) ?>  </label>
  <input type="text" class="small-text" id="<?php echo $this->get_field_id('tm_description_letter_space') ?>" name="<?php echo $this->get_field_name('tm_description_letter_space') ?>" value="<?php echo esc_attr($instance['tm_description_letter_space']) ?>" />
  <small>  <?php _e('px',$petstore_plugin_name) ?>  </small> 
</p>
<p class="one_fourth">
    <label for="<?php echo $this->get_field_id('tm_description_font_style') ?>"> <?php _e('Description Font Style',$petstore_plugin_name) ?></label>
    <select id="<?php echo $this->get_field_id('tm_description_font_style') ?>" name="<?php echo $this->get_field_name('tm_description_font_style') ?>">
      <option value="normal" <?php selected('normal', $instance['tm_description_font_style']) ?>> <?php esc_html_e('Normal', $petstore_plugin_name) ?>   </option>
      <option value="italic" <?php selected('italic', $instance['tm_description_font_style']) ?>>  <?php esc_html_e('Italic',$petstore_plugin_name) ?></option>
    </select>
  </p>
<p class="one_fourth">
    <label for="<?php echo $this->get_field_id('tm_description_font_weight') ?>"> <?php _e('Description Font Weight',$petstore_plugin_name) ?></label>
    <select id="<?php echo $this->get_field_id('tm_description_font_weight') ?>" name="<?php echo $this->get_field_name('tm_description_font_weight') ?>">
      <option value="normal" <?php selected('normal', $instance['tm_description_font_weight']) ?>> <?php esc_html_e('Normal', $petstore_plugin_name) ?>   </option>
      <option value="bold" <?php selected('bold', $instance['tm_description_font_weight']) ?>>  <?php esc_html_e('Bold',$petstore_plugin_name) ?></option>
    </select>
  </p>
<p class="one_fourth_last">
  <label for="<?php echo $this->get_field_id('tm_description_color') ?>"><?php _e('Description Color',$petstore_plugin_name); ?></label>
  <input type="text" name="<?php echo $this->get_field_name('tm_description_color') ?>" id="<?php echo $this->get_field_id('tm_description_color') ?>" class="testimonial_color_pickr" value="<?php echo $instance['tm_description_color'] ?>"  />
</p>
</div>
<p>
  <label for="<?php echo $this->get_field_id('animation_names') ?>">  <?php _e('Select Animation Effect',$petstore_plugin_name) ?>
   </label>
 <?php animation_effects($this->get_field_name('animation_names'), $instance['animation_names'] ); ?>
<p>
<?php  } 
}
petstore_kaya_register_widgets('testimonial', __FILE__);
?>