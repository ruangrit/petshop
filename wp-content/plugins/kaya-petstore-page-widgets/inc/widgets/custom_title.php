<?php
// Title Widget
 class Petstore_Title_Widget extends WP_Widget{
   public function __construct(){
    global $petstore_plugin_name;
   parent::__construct(  'kaya-title',
      __('Petstore - Custom Title',$petstore_plugin_name).'&nbsp; <a class="widget_video_tutorials" target="_blank" href="https://youtu.be/sOEHTgNsVaQ">'.__('Watch this video', $petstore_plugin_name).'</a>',
      array( 'description' => __('Use this widget to add custom title to the blocks',$petstore_plugin_name) ,'class' => 'kaya_title' )
    );
    }
    public function widget( $args , $instance ){
        echo $args['before_widget'];
        global $petstore_plugin_name;
        $instance = wp_parse_args($instance, array(
            'title1' => '',
            'title1_heading_styles' => '5',
            'title1_color' => '#333333',
            'title1_font_weight' => __('normal',$petstore_plugin_name),
            'title1_font_style' => __('normal',$petstore_plugin_name),
            'title' => __('Custom Title', $petstore_plugin_name),
            'description' => __('Custom Title Description', $petstore_plugin_name),
            'desc_color' => '#787878',
            'title_color' => '#333333',
            'text_align' => __('center',$petstore_plugin_name),
            'heading_styles' => '3',
            'container_bg_color' => '',
            'enable_fullwidth_container' => '',
            'enable_arrow_top' => '',
            'enable_arrow_bottom' => '',
            'container_padding' => '0',
            'container_arrow_top' => '',
            'container_arrow_bottom' => '',
            'disable_margin_bottom' => '',
            'title_bottom_space' =>'50',
            'title_font_weight' => __('normal',$petstore_plugin_name),
            'title_font_style' => __('normal',$petstore_plugin_name),
            'description_font_weight' => __('normal',$petstore_plugin_name),
            'description_font_style' => __('normal',$petstore_plugin_name),
            'title1_margin_bottom' => '10',
            'title_margin_bottom' => '15',
            'title1_letter_spacing' => '0',
            'title2_letter_spacing' => '0',
            'separator_style' => '',
            'separator_height' => '2',
            'separator_width' => '15',
            'separator_color' => '#cccccc',
            'image_uri' => '',
            'separator_bottom' => '20',
            'animation_names' => '',
             'description_letter_spacing' => '0',
             'description_font_size' => '14',
             'description_margin_bottom' => '0',
         ) ); 
          $rand = rand(1,100);
          $title_animation = ( trim( $instance['animation_names'] ) )  ? 'wow '. $instance['animation_names'] : '';
            if( $instance['enable_fullwidth_container'] == 'on' ):
              $container_open_tag = '<div class="container">';
              $container_close_tag = '</div>';
              else:
              $container_open_tag = '';
              $container_close_tag = '';
           endif;
          if( $instance['container_arrow_top'] == 'on' ):
              $top_arrow = '<span class="title_container_border_top" style="background-color:'.$instance['container_bg_color'].'!important;"> </span>';
          else:
              $top_arrow=''; 

          endif;
          if( $instance['container_arrow_bottom'] == 'on' ):
               $bottom_arrow = '<span class="title_container_border_bottom" style="background-color:'.$instance['container_bg_color'].'!important;"> </span>';
              $margin_bottom = 'margin-bottom:30px!important;';
          else:
              $bottom_arrow=''; 
              $margin_bottom ='';
          endif;
          $margin_bottom = $instance['disable_margin_bottom'] ? $instance['disable_margin_bottom'] : 'off';
          $fluid_width = $instance['enable_fullwidth_container'] ? $instance['enable_fullwidth_container'] :'off';
          if( $instance['separator_style'] == 'double' ){
            $border_top ='border-top:'.$instance['separator_height'].'px solid '.$instance['separator_color'].';';
            $border_bottom ='border-bottom:'.$instance['separator_height'].'px  solid '.$instance['separator_color'].';';
            $border_class="double_line";
          }else{
            $border_top ='border-top:'.$instance['separator_height'].'px '.$instance['separator_style'].' '.$instance['separator_color'].';';
            $border_bottom='';
            $border_class="";
          }
          echo '<div class="'.$title_animation.' custom_title custom_title_'.$rand.' " data-margin="'.$margin_bottom.'" data-fluid_width="'.$fluid_width.'">';
          echo $top_arrow;
          echo '<div class="kaya_title_'.$instance['text_align'].'">';
          //echo '<div class="container">';
          echo $container_open_tag;
          if( $instance['title1'] ):  echo  '<h'.$instance['title1_heading_styles'].' style="letter-spacing:'.$instance['title1_letter_spacing'].'px; font-weight:'.$instance['title1_font_weight'].'; font-style:'.$instance['title1_font_style'].'; text-align:'.$instance['text_align'].'; color:'.$instance['title1_color'].'!important; margin-bottom:'.$instance['title1_margin_bottom'].'px;">'.$instance['title1'].'</h'.$instance['title1_heading_styles'].'>'; endif;

            if( $instance['title'] ):  echo  '<h'.$instance['heading_styles'].' style="letter-spacing:'.$instance['title2_letter_spacing'].'px; margin-bottom:'.$instance['title_margin_bottom'].'px; font-weight:'.$instance['title_font_weight'].'; font-style:'.$instance['title_font_style'].'; text-align:'.$instance['text_align'].'; color:'.$instance['title_color'].'!important;">'.$instance['title'].'</h'.$instance['heading_styles'].'>'; endif;
            //Separator
            if( $instance['image_uri'] ){
              echo '<div class="row_img_separator align'.$instance['text_align'].'" style="width:'.$instance['separator_width'].'%; margin-bottom:'.$instance['separator_bottom'].'px;">';
                echo '<img src="'.$instance['image_uri'].'" />';
              echo '</div> <div class="clear"> </div>';  
            }else{
                echo '<div class="row_separator '.$border_class.' align'.$instance['text_align'].'" style="'.$border_top.' '.$border_bottom.' width:'.$instance['separator_width'].'%; margin-bottom:'.$instance['separator_bottom'].'px;"></div> <div class="clear"> </div>';
            }
            // Description
            if( trim( $instance['description'] ) ):   echo  '<p style="margin-bottom:'.$instance['description_margin_bottom'].'px; font-size:'.$instance['description_font_size'].'px; font-weight:'.$instance['description_font_weight'].'; letter-spacing:'.$instance['description_letter_spacing'].'px; font-style:'.$instance['description_font_style'].'; text-align:'.$instance['text_align'].'; color:'.$instance['desc_color'].'!important;">'.trim( $instance['description'] ).'</p>'; endif;
            echo $container_close_tag;
          echo '</div>';
          echo $bottom_arrow;
          echo '</div>';

      ?>
    <div class="clear"> </div>
    <?php    echo  $args['after_widget'];
   }
   public function form( $instance ){
        global $petstore_plugin_name;
        $instance = wp_parse_args( $instance, array(
            'title' => __('Custom Title', $petstore_plugin_name),
             'description' => __('Custom Title Description', $petstore_plugin_name),
            'desc_color' => '#787878',
            'title_color' => '#333333',
            'text_align' => __('center',$petstore_plugin_name),
            'heading_styles' => '3',
            'container_bg_color' => '',
            'enable_fullwidth_container' => '',
            'enable_arrow_top' => '',
            'enable_arrow_bottom' => '',
            'container_padding' => '0',
            'container_arrow_top' => '',
            'container_arrow_bottom' => '',
            'disable_margin_bottom' => '',
            'title_bottom_space' =>'50',
            'title_font_weight' => __('normal',$petstore_plugin_name),
            'title_font_style' => __('normal',$petstore_plugin_name),
            'description_font_weight' => __('normal',$petstore_plugin_name),
            'description_font_style' => __('normal',$petstore_plugin_name),
            'title1' => '',
            'title1_heading_styles' => '5',
            'title1_color' => '#333333',
            'title1_font_weight' => __('normal',$petstore_plugin_name),
            'title1_font_style' => __('normal',$petstore_plugin_name),
            'title1_margin_bottom' => '10',
            'title_margin_bottom' => '15',
            'title1_letter_spacing' => '0',
            'title2_letter_spacing' => '0',
            'separator_style' => '',
            'separator_height' => '2',
            'separator_width' => '15',
            'separator_color' => '#cccccc',
            'image_uri' => '',
            'separator_bottom' => '20',
            'animation_names' => '',
            'description_letter_spacing' => '0',
            'description_font_size' => '14',
            'description_margin_bottom' => '0',
        ) );       ?>
<script type='text/javascript'>
    (function( $ ) {
    "use strict";
      $('.title_color_pickr').each(function(){
        $(this).wpColorPicker();
      });
    })(jQuery);
  </script>
<div class="input-elements-wrapper">
  <p>
    <label for="<?php echo $this->get_field_id('title1'); ?>"> <?php _e('Title1',$petstore_plugin_name) ?> </label>
    <input type="text" name="<?php echo $this->get_field_name('title1') ?>" id="<?php echo $this->get_field_id('title1') ?>" class="widefat" value="<?php echo esc_attr( $instance['title1'] ) ?>" />
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('title1_heading_styles') ?>"> <?php _e('Title1 Heading Style',$petstore_plugin_name) ?></label>
    <select id="<?php echo $this->get_field_id('title1_heading_styles') ?>" name="<?php echo $this->get_field_name('title1_heading_styles') ?>">
      <option value="1" <?php selected('1', $instance['title1_heading_styles']) ?>> <?php esc_html_e('Heading Style H1 ', $petstore_plugin_name) ?>   </option>
      <option value="2" <?php selected('2', $instance['title1_heading_styles']) ?>>  <?php esc_html_e('Heading Style H2 ',$petstore_plugin_name) ?></option>
      <option value="3" <?php selected('3', $instance['title1_heading_styles']) ?>> <?php esc_html_e('Heading Style H3 ', $petstore_plugin_name) ?>  </option>
      <option value="4" <?php selected('4', $instance['title1_heading_styles']) ?>> <?php esc_html_e('Heading Style H4 ', $petstore_plugin_name) ?>   </option>
      <option value="5" <?php selected('5', $instance['title1_heading_styles']) ?>>  <?php esc_html_e('Heading Style H5 ',$petstore_plugin_name) ?></option>
      <option value="6" <?php selected('6', $instance['title1_heading_styles']) ?>> <?php esc_html_e('Heading Style H6 ', $petstore_plugin_name) ?>  </option>
    </select>
  </p> 
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('title1_font_weight') ?>"> <?php _e('Title1 Font Weight',$petstore_plugin_name) ?></label>
    <select id="<?php echo $this->get_field_id('title1_font_weight') ?>" name="<?php echo $this->get_field_name('title1_font_weight') ?>">
      <option value="normal" <?php selected('normal', $instance['title1_font_weight']) ?>> <?php esc_html_e('Normal', $petstore_plugin_name) ?>   </option>
      <option value="bold" <?php selected('bold', $instance['title1_font_weight']) ?>>  <?php esc_html_e('Bold',$petstore_plugin_name) ?></option>
    </select>
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('title1_font_style') ?>"> <?php _e('Title1 Font Style',$petstore_plugin_name) ?></label>
    <select id="<?php echo $this->get_field_id('title1_font_style') ?>" name="<?php echo $this->get_field_name('title1_font_style') ?>">
      <option value="normal" <?php selected('normal', $instance['title1_font_style']) ?>> <?php esc_html_e('Normal', $petstore_plugin_name) ?>   </option>
      <option value="italic" <?php selected('italic', $instance['title1_font_style']) ?>>  <?php esc_html_e('Italic', $petstore_plugin_name) ?></option>
    </select>
  </p>
   <p class="one_fourth_last">
    <label for="<?php echo $this->get_field_id('title1_letter_spacing'); ?>"> <?php _e('Title1 Letter Spacing',$petstore_plugin_name) ?> </label>
    <input type="text" name="<?php echo $this->get_field_name('title1_letter_spacing') ?>" id="<?php echo $this->get_field_id('title1_letter_spacing') ?>" class="small-text" value="<?php echo esc_attr( $instance['title1_letter_spacing'] ) ?>" />
    <small><?php _e('px',$petstore_plugin_name); ?></small>
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('title1_color'); ?>"> <?php _e('Title1 Color',$petstore_plugin_name) ?> </label>
    <input type="text" name="<?php echo $this->get_field_name('title1_color') ?>" id="<?php echo $this->get_field_id('title1_color') ?>" class="title_color_pickr" value="<?php echo $instance['title1_color'] ?>" />
  </p>
 <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('title1_margin_bottom'); ?>"> <?php _e('Title1 Margin Bottom',$petstore_plugin_name) ?> </label>
    <input type="text" name="<?php echo $this->get_field_name('title1_margin_bottom') ?>" id="<?php echo $this->get_field_id('title1_margin_bottom') ?>" class="small-text" value="<?php echo $instance['title1_margin_bottom'] ?>" />
     <small><?php _e('px',$petstore_plugin_name); ?></small>
  </p>
</div>
<div class="input-elements-wrapper">  
  <p>
    <label for="<?php echo $this->get_field_id('title'); ?>"> <?php _e('Title2',$petstore_plugin_name) ?> </label>
    <input type="text" name="<?php echo $this->get_field_name('title') ?>" id="<?php echo $this->get_field_id('title') ?>" class="widefat" value="<?php echo esc_attr( $instance['title'] ) ?>" />
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('heading_styles') ?>"> <?php _e('Title2 Heading Style',$petstore_plugin_name) ?></label>
    <select id="<?php echo $this->get_field_id('text_align') ?>" name="<?php echo $this->get_field_name('heading_styles') ?>">
  <option value="1" <?php selected('1', $instance['heading_styles']) ?>> <?php esc_html_e('Heading Style H1 ',$petstore_plugin_name) ?></option>
    <option value="2" <?php selected('2', $instance['heading_styles']) ?>>  <?php esc_html_e('Heading Style H2 ', $petstore_plugin_name) ?></option>
      <option value="3" <?php selected('3', $instance['heading_styles']) ?>> <?php esc_html_e('Heading Style H3 ', $petstore_plugin_name) ?>  </option>
       <option value="4" <?php selected('4', $instance['heading_styles']) ?>> <?php esc_html_e('Heading Style H4 ', $petstore_plugin_name) ?>  </option>
        <option value="5" <?php selected('5', $instance['heading_styles']) ?>> <?php esc_html_e('Heading Style H5 ', $petstore_plugin_name) ?>  </option>
         <option value="6" <?php selected('6', $instance['heading_styles']) ?>> <?php esc_html_e('Heading Style H6 ', $petstore_plugin_name) ?>  </option>
    </select>
  </p>
  <p class="one_fourth">
  <label for="<?php echo $this->get_field_id('title_font_weight') ?>"> <?php _e('Title2 Font Weight',$petstore_plugin_name) ?></label>
    <select id="<?php echo $this->get_field_id('title_font_weight') ?>" name="<?php echo $this->get_field_name('title_font_weight') ?>">
      <option value="normal" <?php selected('normal', $instance['title_font_weight']) ?>> <?php esc_html_e('Normal', $petstore_plugin_name) ?>   </option>
        <option value="bold" <?php selected('bold', $instance['title_font_weight']) ?>>  <?php esc_html_e('Bold',$petstore_plugin_name) ?></option>
          </select>
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('title_font_style') ?>"> <?php _e('Title2 Font Style',$petstore_plugin_name) ?></label>
    <select id="<?php echo $this->get_field_id('title_font_style') ?>" name="<?php echo $this->get_field_name('title_font_style') ?>">
      <option value="normal" <?php selected('normal', $instance['title_font_style']) ?>> <?php esc_html_e('Normal', $petstore_plugin_name) ?>   </option>
      <option value="italic" <?php selected('italic', $instance['title_font_style']) ?>>  <?php esc_html_e('Italic', $petstore_plugin_name) ?></option>
    </select>
  </p>
   <p class="one_fourth_last">
    <label for="<?php echo $this->get_field_id('title2_letter_spacing'); ?>"> <?php _e('Title2 Letter Spacing',$petstore_plugin_name) ?> </label>
    <input type="text" name="<?php echo $this->get_field_name('title2_letter_spacing') ?>" id="<?php echo $this->get_field_id('title2_letter_spacing') ?>" class="small-text" value="<?php echo esc_attr( $instance['title2_letter_spacing'] ) ?>" />
    <small><?php _e('px',$petstore_plugin_name); ?></small>
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('title_color'); ?>"> <?php _e('Title2 Color',$petstore_plugin_name) ?> </label>
    <input type="text" name="<?php echo $this->get_field_name('title_color') ?>" id="<?php echo $this->get_field_id('title_color') ?>" class="title_color_pickr" value="<?php echo $instance['title_color'] ?>" />
  </p>
 
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('title_margin_bottom'); ?>"> <?php _e('Title2 Margin Bottom',$petstore_plugin_name) ?> </label>
    <input type="text" name="<?php echo $this->get_field_name('title_margin_bottom') ?>" id="<?php echo $this->get_field_id('title_margin_bottom') ?>" class="small-text" value="<?php echo $instance['title_margin_bottom'] ?>" />
     <small><?php _e('px',$petstore_plugin_name); ?></small>
  </p>
</div>

<!-- Separator Section -->
<div class="input-elements-wrapper">
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('separator_style') ?>">  <?php _e('Separator Style',$petstore_plugin_name)?>  </label>
    <select id="<?php echo $this->get_field_id('separator_style') ?>" name="<?php echo $this->get_field_name('separator_style') ?>">
      <option value="solid" <?php selected('solid', $instance['separator_style']) ?>>  <?php esc_html_e('Single Line', $petstore_plugin_name) ?>    </option>
      <option value="double" <?php selected('double', $instance['separator_style']) ?>>  <?php esc_html_e('Double Line', $petstore_plugin_name) ?>    </option>
      <option value="dashed" <?php selected('dashed', $instance['separator_style']) ?>>    <?php esc_html_e('Dashed Line', $petstore_plugin_name) ?>    </option>
      <option value="dotted" <?php selected('dotted', $instance['separator_style']) ?>>  <?php esc_html_e('Dotted Line', $petstore_plugin_name) ?>    </option>
    </select>
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('separator_width'); ?>"> <?php _e('Separator Width',$petstore_plugin_name) ?> </label>
    <input type="text" name="<?php echo $this->get_field_name('separator_width') ?>" id="<?php echo $this->get_field_id('separator_width') ?>" class="small-widget" value="<?php echo $instance['separator_width'] ?>" />
    <small><?php _e('%',$petstore_plugin_name);?></small>
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('separator_height'); ?>"> <?php _e('Separator height',$petstore_plugin_name) ?> </label>
    <input type="text" name="<?php echo $this->get_field_name('separator_height') ?>" id="<?php echo $this->get_field_id('separator_height') ?>" class="small-widget" value="<?php echo $instance['separator_height'] ?>" />
    <small><?php _e('PX',$petstore_plugin_name);?></small>
  </p>
  <p class="one_fourth_last">
    <label for="<?php echo $this->get_field_id('separator_color'); ?>"> <?php _e('Separator Color',$petstore_plugin_name) ?> </label>
    <input type="text" name="<?php echo $this->get_field_name('separator_color') ?>" id="<?php echo $this->get_field_id('separator_color') ?>" class="title_color_pickr" value="<?php echo $instance['separator_color'] ?>" />
  </p>
</div>
<div class="input-elements-wrapper">
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('separator_bottom'); ?>"> <?php _e('Separator Margin Bottom',$petstore_plugin_name) ?> </label>
    <input type="text" name="<?php echo $this->get_field_name('separator_bottom') ?>" id="<?php echo $this->get_field_id('separator_bottom') ?>" class="small-text" value="<?php echo $instance['separator_bottom'] ?>" />
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
                      title: 'Separator Image Upload',
                      button: {
                          text: 'Separator Image Upload'
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
<!-- End Separator --> 
<div class="input-elements-wrapper">  
  <p class="three_fourth">
    <label for="<?php echo $this->get_field_id('description'); ?>"> <?php _e('Description',$petstore_plugin_name) ?>  </label>
    <textarea name="<?php echo $this->get_field_name('description') ?>" id="<?php echo $this->get_field_id('description') ?>" class="widefat" value="<?php echo $instance['description'] ?>" > <?php echo esc_attr( $instance['description'] ) ?> </textarea>
  </p>
   <p class="one_fourth_last">
    <label for="<?php echo $this->get_field_id('description_font_size'); ?>"> <?php _e('Description Font Size',$petstore_plugin_name) ?> </label>
    <input type="text" name="<?php echo $this->get_field_name('description_font_size') ?>" id="<?php echo $this->get_field_id('description_font_size') ?>" class="small-text" value="<?php echo esc_attr( $instance['description_font_size'] ) ?>" />
    <small><?php _e('px',$petstore_plugin_name); ?></small>
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('description_font_weight') ?>"> <?php _e('Description Font Weight',$petstore_plugin_name) ?></label>
    <select id="<?php echo $this->get_field_id('description_font_weight') ?>" name="<?php echo $this->get_field_name('description_font_weight') ?>">
      <option value="normal" <?php selected('normal', $instance['description_font_weight']) ?>> <?php esc_html_e('Normal', $petstore_plugin_name) ?>   </option>
      <option value="bold" <?php selected('bold', $instance['description_font_weight']) ?>>  <?php esc_html_e('Bold',$petstore_plugin_name) ?></option>
    </select>
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('description_font_style') ?>"> <?php _e('Description Font Style',$petstore_plugin_name) ?></label>
    <select id="<?php echo $this->get_field_id('description_font_style') ?>" name="<?php echo $this->get_field_name('description_font_style') ?>">
      <option value="normal" <?php selected('normal', $instance['description_font_style']) ?>> <?php esc_html_e('Normal', $petstore_plugin_name) ?>   </option>
      <option value="italic" <?php selected('italic', $instance['description_font_style']) ?>>  <?php esc_html_e('Italic', $petstore_plugin_name) ?></option>
    </select>
  </p>
   <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('description_letter_spacing'); ?>"> <?php _e('Description Letter Spacing',$petstore_plugin_name) ?> </label>
    <input type="text" name="<?php echo $this->get_field_name('description_letter_spacing') ?>" id="<?php echo $this->get_field_id('description_letter_spacing') ?>" class="small-text" value="<?php echo esc_attr( $instance['description_letter_spacing'] ) ?>" />
    <small><?php _e('px',$petstore_plugin_name); ?></small>
  </p>
  <p class="one_fourth_last">
    <label for="<?php echo $this->get_field_id('desc_color'); ?>"> <?php _e('Description Color',$petstore_plugin_name) ?>  </label>
    <input type="text" name="<?php echo $this->get_field_name('desc_color') ?>" id="<?php echo $this->get_field_id('desc_color') ?>" class="title_color_pickr" value="<?php echo $instance['desc_color'] ?>" />
  </p>  
</div>
<div class="input-elements-wrapper">
   <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('description_margin_bottom'); ?>"> <?php _e('Description Margin Bottom',$petstore_plugin_name) ?> </label>
    <input type="text" name="<?php echo $this->get_field_name('description_margin_bottom') ?>" id="<?php echo $this->get_field_id('description_margin_bottom') ?>" class="small-text" value="<?php echo esc_attr( $instance['description_margin_bottom'] ) ?>" />
    <small><?php _e('px',$petstore_plugin_name); ?></small>
  </p>
</div>
<div class="input-elements-wrapper">  
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('text_align') ?>"> <?php _e('Titles / Description Position',$petstore_plugin_name) ?>  </label>
    <select id="<?php echo $this->get_field_id('text_align') ?>" name="<?php echo $this->get_field_name('text_align') ?>">
      <option value="left" <?php selected('left', $instance['text_align']) ?>>   <?php esc_html_e(' Left', $petstore_plugin_name) ?>    </option>
      <option value="right" <?php selected('right', $instance['text_align']) ?>>   <?php esc_html_e('Right', $petstore_plugin_name) ?>   </option>
      <option value="center" <?php selected('center', $instance['text_align']) ?>>  <?php esc_html_e(' Center', $petstore_plugin_name) ?>   </option>
    </select>
  </p>
</div>
<div class="input-elements-wrapper">  

  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('container_arrow_top') ?>">  <?php _e('Top Arrow',$petstore_plugin_name) ?>  </label>
      <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("container_arrow_top"); ?>" name="<?php echo $this->get_field_name("container_arrow_top"); ?>"<?php checked( (bool) $instance["container_arrow_top"], true ); ?> />
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('container_arrow_bottom') ?>">  <?php _e('Bottom Arrow',$petstore_plugin_name) ?>  </label>
      <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("container_arrow_bottom"); ?>" name="<?php echo $this->get_field_name("container_arrow_bottom"); ?>"<?php checked( (bool) $instance["container_arrow_bottom"], true ); ?> />
  </p> 

</div>
<p>
    <label for="<?php echo $this->get_field_id('animation_names') ?>">  <?php _e('Select Animation Effect',$petstore_plugin_name) ?>  </label>
      <?php animation_effects($this->get_field_name('animation_names'), $instance['animation_names'] ); ?>
  <p>
<?php  }
 }
  petstore_kaya_register_widgets('title', __FILE__); 
  ?>