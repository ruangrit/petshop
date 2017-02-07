<?php
class Petstore_Client_Images_Widget extends WP_Widget
 {
   function __construct()
   {
    global $petstore_plugin_name;
    parent::__construct( 'kaya-client-images-boxes',
        __('Petstore - Client Images',$petstore_plugin_name),
       array('description' => __('Displays client images as a grid view',$petstore_plugin_name)  )
      );
   }
   function widget( $args, $instance ){
      $instance = wp_parse_args($instance,array(             
        'upload_images_ids' => '',
        'client_logo_columns' => '4',
        'tooltip_text_color' => '#ffffff',
        'tooltip_bg_color' => '#333333',
        'disable_tooltip' => '',
        'animation_names' => '',
      ));
    echo $args['before_widget'];
    global $post, $petstore_plugin_name;
      $client_rand=rand(1,500);
      $client_images_animation = ( trim( $instance['animation_names'] ) )  ? 'wow '. $instance['animation_names'] : '';
     ?>
     <style type="text/css">
        .image_tooltip_<?php echo $client_rand; ?>:after{
          border-top:7px solid <?php echo $instance['tooltip_bg_color'] ?>; 
        }
      </style>

      <div class="<?php echo $client_images_animation; ?>">
      <div class="clear"> </div>
    <?php 
        $upload_image_ids = explode(',', trim( $instance['upload_images_ids']));
        $upload_image_ids = array_unique( array_combine(range(1, count($upload_image_ids)), $upload_image_ids));
        if( trim( !empty($instance['upload_images_ids'])) ){
            echo '<div class="client_image_wrapper client_image_columns_'.$instance['client_logo_columns'].' client_image_wrapper_'.$client_rand.'" data-columns="'.$instance['client_logo_columns'].'" data-class="client_image_wrapper_'.$client_rand.'">';
          echo '<ul>';
          $i= 1; 
          
          foreach ($upload_image_ids as  $i=>$upload_image_id) {
          $attachment = get_post( $upload_image_id );
          $values =  array(
              'caption' => $attachment->post_excerpt,
              'description' => $attachment->post_content,
              'href' => get_permalink( $attachment->ID ),
              'src' => $attachment->guid,
              'title' => $attachment->post_title
            );
            if($i%$instance['client_logo_columns']==0)
             {
                $class = 'class="last"';
             }else{
              $class = "";
             }
            $src = wp_get_attachment_image_src( $upload_image_id, '' );
            $src = $src[0];
            echo "<li ".$class.">";
            //echo "<span class='image_tooltip' style='opacity:1!important;'>".$attachment->post_title."</span>";
            if( $instance['disable_tooltip'] != 'on'): echo "<span class='image_tooltip image_tooltip_$client_rand' style='background-color:".$instance['tooltip_bg_color']."; color:".$instance['tooltip_text_color'].";'>".$attachment->post_title."</span>"; endif;
              echo "<img src=\" $src \" alt=\" $attachment->post_title \" />";
            echo "</li>";
           }
          echo '</ul>';
          echo '</div>';
        }else{ 
          $post_id = $post->ID;
          $post_url = admin_url( 'post.php?post=' . $post_id ) . '&action=edit';
          echo '<p style="text-align:center;">There is no image attachment IDs in "'.strtoupper($petstore_plugin_name).' Client Images" . To upload images <a target="_balnk" href="'.$post_url.'">open this page</a> &  edit "'.strtoupper($petstore_plugin_name).' Images Gallery > Upload Logo Images " button.</p>';
        }
        echo '</div>';
        echo $args['after_widget'];
    }

    function form( $instance ){
      global $petstore_plugin_name;
      $instance = wp_parse_args($instance, array(       
        'upload_images_ids' => '',
        'client_logo_columns' => '4',
        'tooltip_text_color' => '#ffffff',
        'tooltip_bg_color' => '#333333',
        'disable_tooltip' => '',
        'animation_names' => '',
        ));

        ?>
<script type='text/javascript'>
    (function( $ ) {
    "use strict";
      $('.client_color_pickr').each(function(){
        $(this).wpColorPicker();
      });
    })(jQuery);
  </script>        

<div class="input-elements-wrapper"> 
<p><?php $i = rand(1,100); ?>
      <input type="text" class="widefat custom_media_url_<?php echo $i; ?>" name="<?php echo $this->get_field_name('upload_images_ids'); ?>" id="<?php echo $this->get_field_id('upload_images_ids'); ?>" value="<?php echo $instance['upload_images_ids']; ?>">
      <input type="button" value="<?php _e( 'Upload Logo Images', $petstore_plugin_name ); ?>" class="button custom_media_upload_<?php echo $i; ?>" id="custom_media_upload_<?php echo $i; ?>"/>
      <script type="text/javascript">
        jQuery(document).ready( function(){
          var file_frame;
          jQuery('.custom_media_upload_<?php echo $i; ?>').live('click', function( event ){
           event.preventDefault();
          if ( file_frame ) {
          file_frame.open();
          return;
          }
           // Create the media frame.
          file_frame = wp.media.frames.file_frame = wp.media({
          title: 'Upload Client Logo Images',
          button: {
          text: 'Upload Client Logo Images',
          },
          multiple: true // Set to true to allow multiple files to be selected
          });

        file_frame.on( 'select', function() {
        var selection = file_frame.state().get('selection');
        var attachment_ids = selection.map( function( attachment ) {
            attachment = attachment.toJSON();
            return attachment.id;
          }).join();
            if( attachment_ids.charAt(0) === ',' ) { attachment_ids = attachment_ids.substring(1); }
            jQuery('.custom_media_url_<?php echo $i; ?>').val( attachment_ids );
        });
          // Finally, open the modal
          file_frame.open();
          });
          });

      </script><br />
      <small><?php _e('Note:Comma separated attachment IDs',$petstore_plugin_name) ?></small>
  </p>
<p class="one_fourth">
  <label for="<?php echo $this->get_field_id('client_logo_columns') ?>">  <?php _e('Select Columns',$petstore_plugin_name)?>  </label>
  <select id="<?php echo $this->get_field_id('client_logo_columns') ?>" name="<?php echo $this->get_field_name('client_logo_columns') ?>">
    <option value="4" <?php selected('4', $instance['client_logo_columns']) ?>>  <?php esc_html_e('Columns 4', $petstore_plugin_name) ?>    </option>
    <option value="3" <?php selected('3', $instance['client_logo_columns']) ?>>  <?php esc_html_e('Columns 3', $petstore_plugin_name) ?>    </option>
    <option value="2" <?php selected('2', $instance['client_logo_columns']) ?>>    <?php esc_html_e('Columns 2', $petstore_plugin_name) ?>    </option>
  </select>
</p>
<p class="one_fourth">
<label for="<?php echo $this->get_field_id('tooltip_bg_color'); ?>"> <?php _e('Tooltip Backround Color',$petstore_plugin_name) ?> </label>
<input type="text" name="<?php echo $this->get_field_name('tooltip_bg_color') ?>" id="<?php echo $this->get_field_id('tooltip_bg_color') ?>" class="client_color_pickr" value="<?php echo $instance['tooltip_bg_color'] ?>" />
</p>
<p class="one_fourth">
<label for="<?php echo $this->get_field_id('tooltip_text_color'); ?>"> <?php _e('Text Color',$petstore_plugin_name) ?> </label>
<input type="text" name="<?php echo $this->get_field_name('tooltip_text_color') ?>" id="<?php echo $this->get_field_id('tooltip_text_color') ?>" class="client_color_pickr" value="<?php echo $instance['tooltip_text_color'] ?>" />
</p>
<p class="one_fourth_last">
<label for="<?php echo $this->get_field_id('disable_tooltip') ?>">  <?php _e('Disable Tooltip',$petstore_plugin_name)?>  </label>
<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("disable_tooltip"); ?>" name="<?php echo $this->get_field_name("disable_tooltip"); ?>"<?php checked( (bool) $instance["disable_tooltip"], true ); ?> />
</p>
</div>
<p>
   <label for="<?php echo $this->get_field_id('animation_names') ?>">  <?php _e('Select Animation Effect',$petstore_plugin_name) ?>  </label>
    <?php animation_effects($this->get_field_name('animation_names'), $instance['animation_names'] ); ?>
  <p>
<?php }
 } 
  petstore_kaya_register_widgets('client-images', __FILE__);
  ?>