<?php
 class Petstore_Team_Widget extends WP_Widget{
    public function __construct(){
      global $petstore_plugin_name;
      parent::__construct(
        $petstore_plugin_name.'-team-widget',
        __('Petstore - Team Widget',$petstore_plugin_name),
        array('description' => __('Display client slider from "Team" CPT post featured image',$petstore_plugin_name), 'class' => 'team_widget')
        );
    }
     public function widget( $args, $instance ) {
        global $petstore_plugin_name;
        wp_enqueue_script('jquery_owlcarousel');
        wp_enqueue_style('css_owl.carousel');
        $instance = wp_parse_args($instance, array(
            'readmore_text' => __('Read More',$petstore_plugin_name),
            'team_category' => '',
            'team_slide_items' => '4',
            'image_width' => '450',
            'image_height' => '400',
            'team_designation_color' => '#787878',
            'team_title_color' => '#333333',
            'team_description_color' => '#787878',
            'team_content_bg_color' => '#eeeeee',
            'team_auto_play' => __('true',$petstore_plugin_name),
            'disable_team_content' => '',
            'team_icon_bg_color' => '',
            'team_icon_size' => '16',
            'team_icon_color' => '#333333',
            'team_icon_border_radius' => '3',
            'team_icon_bg_hover_color' => '',
            'team_icon_hover_color' => '',
            'animation_names' => '',
             'img_border_radius_top' => '0',
            'img_border_radius_right' => '0',
            'img_border_radius_bottom' => '0',
            'img_border_radius_left' => '0',
            'title_font_size' => '18',
            'title_letter_space' => '0',
            'title_font_weight' => __('normal',$petstore_plugin_name),
            'title_font_style' => __('normal',$petstore_plugin_name),
            'designation_letter_space' => '0',
            'designation_font_weight' => __('normal',$petstore_plugin_name),
            'designation_font_style' => __('normal',$petstore_plugin_name),
            'designation_font_size' => '14',
            'disable_designation' => '',
            'desc_font_size' => '14',
            'desc_letter_space' => '0',
            'desc_font_weight' => __('normal',$petstore_plugin_name),
            'desc_font_style' => __('normal',$petstore_plugin_name),
            'team_alignment' => __('center',$petstore_plugin_name),
          ));
        $team_rand = rand(1,100);
      echo $args['before_widget'];
      $trand = rand(1,100);
      $animation_class = trim( $instance['animation_names']  ) ? 'wow '.$instance['animation_names'] : '';
        echo '<div class="'.$animation_class.'">';
        if(!empty($instance['team_content_bg_color'])){
           $css ='<style>
            .team_image_'.$trand.' .team_description::before{
              border-bottom:11px solid '.$instance['team_content_bg_color'].';
            }
          </style>';
          echo $css;
          $with_out_bg = '';
        }else{
          $with_out_bg = 'padding-left:0px; padding-right:0;';
        }
      if(!empty($instance['team_icon_bg_color'])){
          $icon_size = ceil( $instance['team_icon_size'] * 1.4 );
          $icon_styles = 'width:'.$icon_size.'px; height:'.$icon_size.'px; line-height:'.$icon_size.'px;';
          $padding_remove = '';
      }else{
          $icon_styles = '';
          $padding_remove = 'padding:0px;';
      } 
      if( $instance['team_alignment'] == 'left' ){
          $team_description_align = 'text-align:left;';
           $team_icons_align = 'float:left';
      }elseif( $instance['team_alignment'] == 'right' ){
          $team_description_align = 'text-align:right;';
           $team_icons_align = 'float:right;';
      }elseif( $instance['team_alignment'] == 'center'){
          $team_description_align = 'text-align:center;';
          $team_icons_align = 'display:table;';
      }else{    }
      $line_height = ceil( $instance['title_font_size'] * 1.4 );
      ?>
      <div class="clear"> </div>
      <?php
      echo '<div class="team_wrapper_container" data-columns="'.$instance['team_slide_items'].'" data-autoplay="'.$instance['team_auto_play'].'">'; 
      $array_val = ( !empty( $instance['team_category'] )) ? explode(',',  $instance['team_category']) : '';
       if( $array_val ) {
           $loop = new WP_Query( array(  'post_type' => 'team',  'orderby' =>'ASC', 'order' => '',  'tax_query' => array('relation' => 'AND', array( 'taxonomy' => 'team_category',   'field' => 'id', 'terms' => $array_val  ))));
          }else{
            $loop = new WP_Query( array( 'post_type' => 'team', 'taxonomy' => 'portfolio_category','term' => $instance['team_category'], 'orderby' => '', 'posts_per_page' => '','order' => ''));
          }
        if( $loop->have_posts() ) : while( $loop->have_posts() ) : $loop->the_post();
        global $post;
        $image_url = wp_get_attachment_url(get_post_thumbnail_id());
        $team_designation = get_post_meta($post->ID,'team_designation', true);
        $team_description = get_post_meta($post->ID,'team_description', true);
        $team_link = get_post_meta($post->ID,'team_link', true);
        $team_content_bg_color = $instance['team_content_bg_color'] ? 'background-color:'.$instance['team_content_bg_color'].';' : '';
        $team_target_link = get_post_meta($post->ID,'team_target_link', true) ? '_blank' :'_self';
          echo '<div class="team_image team_image_'.$trand.'">';
            //echo '<span class="title_bottom_line"> </span>';
          if( $image_url )
             echo '<img src="'.kaya_image_resize( $image_url, $instance['image_width'], $instance['image_height'], 't' ).'" class="" style="border-radius:'.$instance['img_border_radius_top'].'px '.$instance['img_border_radius_right'].'px '.$instance['img_border_radius_bottom'].'px '.$instance['img_border_radius_left'].'px;" alt="'.get_the_title().'"  />';
            else{
              echo '<img src="'.constant(strtoupper($petstore_plugin_name).'_PLUGIN_URL').'images/team.jpg" style="width:'.$instance['image_width'].'px; height:'.$instance['image_height'].'px;">';
                }
             echo '<div class="team_description  team_bg_arrow-'.$trand.'" style="'.$team_description_align.' '.$team_content_bg_color.'">';
             echo '<div class="team_content_wrapper" style="'.$with_out_bg.'">';
                echo '<h3 style="color:'.$instance['team_title_color'].'; line-height:'.$line_height.'px; font-size:'.$instance['title_font_size'].'px; letter-spacing:'.$instance['title_letter_space'].'px; font-style:'.$instance['title_font_style'].'; font-weight:'.$instance['title_font_weight'].';">';
                  if( !empty( $team_link ) ): echo '<a style="color:'.$instance['team_title_color'].';" target="'.$team_target_link.'" href="'.$team_link.'">'; endif;
                    echo get_the_title();
                   if( !empty( $team_link ) ): echo '</a>'; endif;
                echo '</h3>';
               if( !empty($team_designation) ):
                if( $instance['disable_designation'] != 'on' ){
                  echo '<em style="color:'.$instance['team_designation_color'].'; font-size:'.$instance['designation_font_size'].'px; letter-spacing:'.$instance['designation_letter_space'].'px; font-style:'.$instance['designation_font_style'].'; font-weight:'.$instance['designation_font_weight'].';">'.$team_designation.'</em>';
                } 
               endif;
                if( !empty($team_description) && ( $instance['disable_team_content'] != 'on' ) ): echo '<p style="color:'.$instance['team_description_color'].'; font-size:'.$instance['desc_font_size'].'px; letter-spacing:'.$instance['desc_letter_space'].'px; font-style:'.$instance['desc_font_style'].'; font-weight:'.$instance['desc_font_weight'].';">'.$team_description.'</p>'; endif;
                  $select_icon_type = get_post_meta($post->ID,'select_icon_type', true);
                  if( $select_icon_type == 'awesome_icon' ){
                    $data_hover_color = 'data-bghover-color="'.$instance['team_icon_bg_hover_color'].'" data-hover-color="'.$instance['team_icon_hover_color'].'" data-bg-color="'.$instance['team_icon_bg_color'].'" data-color="'.$instance['team_icon_color'].'" ';
                  }else{ $data_hover_color =''; }
                  echo '<div class="team_social_icons" style="'.$team_icons_align.' '.$padding_remove.'" '.$data_hover_color.'>';
                    for ($i=1; $i < 6 ; $i++) {
                      if( $select_icon_type == 'awesome_icon' ){
                         $icon_name{$i} = get_post_meta($post->ID,'social_awesome_icon_'.$i, true);
                      }else{
                        $icon_url{$i} = get_post_meta($post->ID,'social_media_icon_'.$i, true);
                      }                     
                      $icon_link{$i} = get_post_meta($post->ID,'social_media_link_'.$i, true);
                        if( (!empty($icon_url{$i}) || ( !empty($icon_name{$i})) )):
                          echo '<a href="'.$icon_link{$i}.'" target="_blank">';
                          if( $select_icon_type == 'awesome_icon' ){
                            $icon_bg_color = $instance['team_icon_bg_color'] ? 'background-color:'.$instance['team_icon_bg_color'].';' : '';
                             echo '<i class="fa '.$icon_name{$i}.'" style="'.$icon_styles.' font-size:'.$instance['team_icon_size'].'px; '.$icon_bg_color.' color:'.$instance['team_icon_color'].'; border-radius:'.$instance['team_icon_border_radius'].'px;"> </i>';
                          }else{
                              $src = wp_get_attachment_image_src( $icon_url{$i}, '' );
                              $src = $src[0];
                              echo '<img src="'.kaya_image_resize( $src, '32', '32', 't' ).'" class="" alt="'.get_the_title().'"  />';
                           }
                              
                          echo '</a>';
                      endif;
                    }
                 echo '</div>';
                 echo '</div>';
              echo '</div>';
          echo '</div>';
          endwhile; endif;
        echo '</div>';
        wp_reset_query();
        echo "</div>";
      echo $args['after_widget'];
     }
     public function form( $instance ){
      global $petstore_plugin_name;
      $team_terms=  get_terms('team_category','');
        if( $team_terms ){
          foreach ($team_terms as $team_term) { 
            $team_cat_ids[] = $team_term->term_id;
             $team_cats_name[] = $team_term->name.' - '.$team_term->term_id;
          }
        }else{ $team_cats_name[] = ''; $team_cat_ids[] =''; }

          $instance = wp_parse_args($instance, array(
            'readmore_text' => __('Read More',$petstore_plugin_name),
            'team_category' => '',
            'team_slide_items' => '4',
            'image_width' => '450',
            'image_height' => '400',
            'team_designation_color' => '#787878',
            'team_title_color' => '#333333',
            'team_description_color' => '#787878',
            'team_content_bg_color' => '#eeeeee',
            'team_auto_play' => __('true',$petstore_plugin_name),
            'disable_team_content' => '',
            'team_icon_bg_color' => '',
            'team_icon_size' => '16',
            'team_icon_color' => '#333333',
            'team_icon_border_radius' => '3',
            'team_icon_bg_hover_color' => '',
            'team_icon_hover_color' => '',
            'animation_names' => '',
             'img_border_radius_top' => '0',
            'img_border_radius_right' => '0',
            'img_border_radius_bottom' => '0',
            'img_border_radius_left' => '0',
            'title_font_size' => '18',
            'title_letter_space' => '0',
            'title_font_weight' => __('normal',$petstore_plugin_name),
            'title_font_style' => __('normal',$petstore_plugin_name),
            'designation_letter_space' => '0',
            'designation_font_weight' => __('normal',$petstore_plugin_name),
            'designation_font_style' => __('normal',$petstore_plugin_name),
            'designation_font_size' => '14',
            'disable_designation' => '',
            'desc_font_size' => '14',
            'desc_letter_space' => '0',
            'desc_font_weight' => __('normal',$petstore_plugin_name),
            'desc_font_style' => __('normal',$petstore_plugin_name),
            'team_alignment' => __('center',$petstore_plugin_name),
          ));
      ?>
  <script type='text/javascript'>
  (function($) {
    "use strict";
    $(function() {
      $('.team_color_pickr').each(function(){
      $(this).wpColorPicker();
      });
    // Checkbox Enable  Description
      $("#<?php echo $this->get_field_id('disable_team_content') ?>").change(function () {
        $(".input-elements-wrapper.<?php echo $this->get_field_id('disable_team_content'); ?>").find('.disable_team_description').hide();
        var checkbox_val = $("#<?php echo $this->get_field_id('disable_team_content') ?>").is(':checked');
        if(  checkbox_val == false ){
          $(".input-elements-wrapper.<?php echo $this->get_field_id('disable_team_content'); ?>").find('.disable_team_description').show();
        }else{   }
      }).change();
      // Checkbox Enable  Designation
      $("#<?php echo $this->get_field_id('disable_designation') ?>").change(function () {
        $(".input-elements-wrapper.<?php echo $this->get_field_id('disable_designation'); ?>").find('.disable_team_designation').hide();
        var checkbox_val = $("#<?php echo $this->get_field_id('disable_designation') ?>").is(':checked');
        if(  checkbox_val == false ){
          $(".input-elements-wrapper.<?php echo $this->get_field_id('disable_designation'); ?>").find('.disable_team_designation').show();
        }else{   }
      }).change();
    });
  })(jQuery);
  </script>

<div class="input-elements-wrapper"> 
  <p>
    <label for="<?php echo $this->get_field_id('team_category') ?>"> <?php _e('Enter Team Category IDs : ',$petstore_plugin_name) ?> </label>
   <input type="text" name="<?php echo $this->get_field_name('team_category') ?>" id="<?php echo $this->get_field_id('team_category') ?>" class="widefat" value="<?php echo $instance['team_category'] ?>" />
    <em><strong style="color:green;"><?php _e('Available Categories and IDs : ',$petstore_plugin_name); ?> </strong> <?php echo implode(', ', $team_cats_name); ?></em><br />
    <stong><?php _e('Note:',$petstore_plugin_name); ?></strong><?php _e('Separate IDs with commas only',$petstore_plugin_name); ?>
  </p>
</div>
<div class="input-elements-wrapper">
   <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('team_slide_items') ?>">   <?php _e('Team Slide Items',$petstore_plugin_name); ?>        </label>
    <select id="<?php echo $this->get_field_id('team_slide_items') ?>" name="<?php echo $this->get_field_name('team_slide_items') ?>">
    <option value="1" <?php selected('1', $instance['team_slide_items']) ?>> <?php esc_html_e('1 Item', $petstore_plugin_name) ?>  </option>
    <option value="2" <?php selected('2', $instance['team_slide_items']) ?>>  <?php esc_html_e('2 Items', $petstore_plugin_name) ?>     </option>
    <option value="3" <?php selected('3', $instance['team_slide_items']) ?>>    <?php esc_html_e('3 Items', $petstore_plugin_name) ?>   </option>
    <option value="4" <?php selected('4', $instance['team_slide_items']) ?>>   <?php esc_html_e('4 Items', $petstore_plugin_name) ?>  </option>
    </select>
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('team_auto_play') ?>">   <?php _e('Auto Play',$petstore_plugin_name); ?>        </label>
    <select id="<?php echo $this->get_field_id('team_auto_play') ?>" name="<?php echo $this->get_field_name('team_auto_play') ?>">
      <option value="true" <?php selected('true', $instance['team_auto_play']) ?>> <?php esc_html_e('True', $petstore_plugin_name) ?>  </option>
      <option value="false" <?php selected('false', $instance['team_auto_play']) ?>>  <?php esc_html_e('False', $petstore_plugin_name) ?>     </option>
    </select>
  </p>
</div>
<div class="input-elements-wrapper">
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('image_width'); ?>"><?php _e('Image Width & Height',$petstore_plugin_name) ?></label>
    <input type="text" name="<?php echo $this->get_field_name('image_width') ?>" id="<?php echo $this->get_field_id('image_width') ?>" class="small-text" value="<?php echo $instance['image_width'] ?>" /> X
    <input type="text" name="<?php echo $this->get_field_name('image_height') ?>" id="<?php echo $this->get_field_id('image_height') ?>" class="small-text" value="<?php echo $instance['image_height'] ?>" />
    <small><?php _e('PX',$petstore_plugin_name); ?></small>
  </p>

    <p class="three_fourth_last">
    <label for="<?php echo $this->get_field_id('img_border_radius_top'); ?>"><?php _e('Image Border Radius',$petstore_plugin_name) ?></label>
    <?php _e('TL ',$petstore_plugin_name) ?> <input type="text" name="<?php echo $this->get_field_name('img_border_radius_top') ?>" id="<?php echo $this->get_field_id('img_border_radius_top') ?>" class="small-text" value="<?php echo $instance['img_border_radius_top'] ?>" /> &nbsp;
    <?php _e('TR ',$petstore_plugin_name) ?> <input type="text" name="<?php echo $this->get_field_name('img_border_radius_right') ?>" id="<?php echo $this->get_field_id('img_border_radius_right') ?>" class="small-text" value="<?php echo $instance['img_border_radius_right'] ?>" /> &nbsp;
    <?php _e('BR ',$petstore_plugin_name) ?> <input type="text" name="<?php echo $this->get_field_name('img_border_radius_bottom') ?>" id="<?php echo $this->get_field_id('img_border_radius_bottom') ?>" class="small-text" value="<?php echo $instance['img_border_radius_bottom'] ?>" />  &nbsp;
    <?php _e('BL ',$petstore_plugin_name) ?> <input type="text" name="<?php echo $this->get_field_name('img_border_radius_left') ?>" id="<?php echo $this->get_field_id('img_border_radius_left') ?>" class="small-text" value="<?php echo $instance['img_border_radius_left'] ?>" />
    <small><?php _e('PX',$petstore_plugin_name); ?></small>
  </p>
</div>
<div class="input-elements-wrapper">
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('team_content_bg_color'); ?>"><?php _e('Team Content Background Color',$petstore_plugin_name) ?></label>
    <input type="text" class="team_color_pickr" id="<?php echo $this->get_field_id('team_content_bg_color'); ?>" name="<?php echo $this->get_field_name('team_content_bg_color') ?>" value="<?php echo esc_attr($instance['team_content_bg_color']) ?>"
     />
  </p>
  <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('team_title_color'); ?>"><?php _e('Team Title Color',$petstore_plugin_name) ?></label>
      <input type="text" class="team_color_pickr" id="<?php echo $this->get_field_id('team_title_color'); ?>" name="<?php echo $this->get_field_name('team_title_color') ?>" value="<?php echo esc_attr($instance['team_title_color']) ?>" />
  </p> 

<p class="one_fourth">
    <label for="<?php echo $this->get_field_id('title_font_size') ?>">  <?php _e('Title Font Size',$petstore_plugin_name) ?>  </label>
    <input type="text" class="small-text" id="<?php echo $this->get_field_id('title_font_size') ?>" value="<?php echo esc_attr($instance['title_font_size']) ?>" name="<?php echo $this->get_field_name('title_font_size') ?>" />
    <small><?php _e('px',$petstore_plugin_name); ?></small>
  </p>
  <p class="one_fourth_last">
    <label for="<?php echo $this->get_field_id('title_letter_space') ?>">  <?php _e('Title Font Letter Space',$petstore_plugin_name) ?>  </label>
    <input type="text" class="small-text" id="<?php echo $this->get_field_id('title_letter_space') ?>" value="<?php echo esc_attr($instance['title_letter_space']) ?>" name="<?php echo $this->get_field_name('title_letter_space') ?>" />
    <small><?php _e('px',$petstore_plugin_name); ?></small>
  </p>
</div>
  <div class="input-elements-wrapper">
  <p class="one_fourth">
  <label for="<?php echo $this->get_field_id('title_font_weight') ?>"> <?php _e('Title Font Weight',$petstore_plugin_name) ?> </label>
  <select id="<?php echo $this->get_field_id('title_font_weight') ?>" name="<?php echo $this->get_field_name('title_font_weight') ?>">
    <option value="normal" <?php selected('normal', $instance['title_font_weight']) ?>>  <?php esc_html_e('Normal', $petstore_plugin_name) ?>   </option>
    <option value="bold" <?php selected('bold', $instance['title_font_weight']) ?>>   <?php esc_html_e('Bold', $petstore_plugin_name) ?>  </option>
  </select>
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('title_font_style') ?>"> <?php _e('Title Font Style',$petstore_plugin_name) ?> </label>
    <select id="<?php echo $this->get_field_id('title_font_style') ?>" name="<?php echo $this->get_field_name('title_font_style') ?>">
      <option value="normal" <?php selected('normal', $instance['title_font_style']) ?>>  <?php esc_html_e('Normal', $petstore_plugin_name) ?>   </option>
      <option value="italic" <?php selected('italic', $instance['title_font_style']) ?>>   <?php esc_html_e('Italic', $petstore_plugin_name) ?>  </option>
    </select>
  </p>
</div>
<div class="input-elements-wrapper <?php echo $this->get_field_id('disable_designation') ?>">
  <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('disable_designation') ?>">  <?php _e('Disable Designation',$petstore_plugin_name) ?>  </label>
      <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("disable_designation"); ?>" name="<?php echo $this->get_field_name("disable_designation"); ?>"<?php checked( (bool) $instance["disable_designation"], true ); ?> />
  </p>
  <p class="one_fourth disable_team_designation">
    <label for="<?php echo $this->get_field_id('designation_font_size') ?>">  <?php _e('Designation Font Size',$petstore_plugin_name) ?>  </label>
    <input type="text" class="small-text" id="<?php echo $this->get_field_id('designation_font_size') ?>" value="<?php echo esc_attr($instance['designation_font_size']) ?>" name="<?php echo $this->get_field_name('designation_font_size') ?>" />
    <small><?php _e('px',$petstore_plugin_name); ?></small>
  </p>
 <p class="one_fourth disable_team_designation">
    <label for="<?php echo $this->get_field_id('designation_letter_space') ?>">  <?php _e('Designation Letter Space',$petstore_plugin_name) ?>  </label>
    <input type="text" class="small-text" id="<?php echo $this->get_field_id('designation_letter_space') ?>" value="<?php echo esc_attr($instance['designation_letter_space']) ?>" name="<?php echo $this->get_field_name('designation_letter_space') ?>" />
    <small><?php _e('px',$petstore_plugin_name); ?></small>
  </p>
  <p class="one_fourth_last disable_team_designation">
  <label for="<?php echo $this->get_field_id('designation_font_weight') ?>"> <?php _e('Designation Font Weight',$petstore_plugin_name) ?> </label>
  <select id="<?php echo $this->get_field_id('designation_font_weight') ?>" name="<?php echo $this->get_field_name('designation_font_weight') ?>">
    <option value="normal" <?php selected('normal', $instance['designation_font_weight']) ?>>  <?php esc_html_e('Normal', $petstore_plugin_name) ?>   </option>
    <option value="bold" <?php selected('bold', $instance['designation_font_weight']) ?>>   <?php esc_html_e('Bold', $petstore_plugin_name) ?>  </option>
  </select>
  </p>
  <p class="one_fourth disable_team_designation">
    <label for="<?php echo $this->get_field_id('designation_font_style') ?>"> <?php _e('Designation Font Style',$petstore_plugin_name) ?> </label>
    <select id="<?php echo $this->get_field_id('designation_font_style') ?>" name="<?php echo $this->get_field_name('designation_font_style') ?>">
      <option value="normal" <?php selected('normal', $instance['designation_font_style']) ?>>  <?php esc_html_e('Normal', $petstore_plugin_name) ?>   </option>
      <option value="italic" <?php selected('italic', $instance['designation_font_style']) ?>>   <?php esc_html_e('Italic', $petstore_plugin_name) ?>  </option>
    </select>
  </p>
<p class="one_fourth disable_team_designation">
    <label for="<?php echo $this->get_field_id('team_designation_color'); ?>"><?php _e('Designation Color',$petstore_plugin_name) ?>
    </label>
    <input type="text" class="team_color_pickr" id="<?php echo $this->get_field_id('team_designation_color'); ?>" name="<?php echo $this->get_field_name('team_designation_color') ?>" value="<?php echo esc_attr($instance['team_designation_color']) ?>" />
  </p>
</div>

<div class="input-elements-wrapper <?php echo $this->get_field_id('disable_team_content') ?>">
   <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('disable_team_content') ?>">  <?php _e('Disable Team Description',$petstore_plugin_name) ?>  </label>
      <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("disable_team_content"); ?>" name="<?php echo $this->get_field_name("disable_team_content"); ?>"<?php checked( (bool) $instance["disable_team_content"], true ); ?> />
  </p>
  <p class="one_fourth disable_team_description">
    <label for="<?php echo $this->get_field_id('desc_font_size') ?>">  <?php _e('Description Font Size',$petstore_plugin_name) ?>  </label>
    <input type="text" class="small-text" id="<?php echo $this->get_field_id('desc_font_size') ?>" value="<?php echo esc_attr($instance['desc_font_size']) ?>" name="<?php echo $this->get_field_name('desc_font_size') ?>" />
    <small><?php _e('px',$petstore_plugin_name); ?></small>
  </p>
  <p class="one_fourth disable_team_description">
    <label for="<?php echo $this->get_field_id('desc_letter_space') ?>">  <?php _e('Description Font Letter Space',$petstore_plugin_name) ?>  </label>
    <input type="text" class="small-text" id="<?php echo $this->get_field_id('desc_letter_space') ?>" value="<?php echo esc_attr($instance['desc_letter_space']) ?>" name="<?php echo $this->get_field_name('desc_letter_space') ?>" />
    <small><?php _e('px',$petstore_plugin_name); ?></small>
  </p>
  <p class="one_fourth_last disable_team_description">
  <label for="<?php echo $this->get_field_id('desc_font_weight') ?>"> <?php _e('Description Font Weight',$petstore_plugin_name) ?> </label>
  <select id="<?php echo $this->get_field_id('desc_font_weight') ?>" name="<?php echo $this->get_field_name('desc_font_weight') ?>">
    <option value="normal" <?php selected('normal', $instance['desc_font_weight']) ?>>  <?php esc_html_e('Normal', $petstore_plugin_name) ?>   </option>
    <option value="bold" <?php selected('bold', $instance['desc_font_weight']) ?>>   <?php esc_html_e('Bold', $petstore_plugin_name) ?>  </option>
  </select>
  </p>
  <p class="one_fourth disable_team_description">
    <label for="<?php echo $this->get_field_id('desc_font_style') ?>"> <?php _e('Description Font Style',$petstore_plugin_name) ?> </label>
    <select id="<?php echo $this->get_field_id('desc_font_style') ?>" name="<?php echo $this->get_field_name('desc_font_style') ?>">
      <option value="normal" <?php selected('normal', $instance['desc_font_style']) ?>>  <?php esc_html_e('Normal', $petstore_plugin_name) ?>   </option>
      <option value="italic" <?php selected('italic', $instance['desc_font_style']) ?>>   <?php esc_html_e('Italic', $petstore_plugin_name) ?>  </option>
    </select>
  </p>
   <p class="one_fourth disable_team_description">
    <label for="<?php echo $this->get_field_id('team_description_color'); ?>"><?php _e('Description Color',$petstore_plugin_name) ?></label>
    <input type="text" class="team_color_pickr" id="<?php echo $this->get_field_id('team_description_color'); ?>" name="<?php echo $this->get_field_name('team_description_color') ?>" value="<?php echo esc_attr($instance['team_description_color']) ?>" />
  </p> 
</div> 

<div class="input-elements-wrapper">
 <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('team_icon_size') ?>"> <?php _e('Icon Font Size',$petstore_plugin_name) ?> </label>
    <input type="text" class="small-text" id="<?php echo $this->get_field_id('team_icon_size') ?>" value="<?php echo esc_attr($instance['team_icon_size']) ?>" name="<?php echo $this->get_field_name('team_icon_size') ?>" />
    <small><?php _e('px',$petstore_plugin_name); ?></small>
  </p> 
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('team_icon_bg_color'); ?>"><?php _e('Awesome Icon BG Color',$petstore_plugin_name) ?></label>
    <input type="text" class="team_color_pickr" id="<?php echo $this->get_field_id('team_icon_bg_color'); ?>" name="<?php echo $this->get_field_name('team_icon_bg_color') ?>" value="<?php echo esc_attr($instance['team_icon_bg_color']) ?>" />
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('team_icon_color'); ?>"><?php _e('Awesome Icon Color',$petstore_plugin_name) ?></label>
    <input type="text" class="team_color_pickr" id="<?php echo $this->get_field_id('team_icon_color'); ?>" name="<?php echo $this->get_field_name('team_icon_color') ?>" value="<?php echo esc_attr($instance['team_icon_color']) ?>" />
  </p>
  <p class="one_fourth_last">
    <label for="<?php echo $this->get_field_id('team_icon_bg_hover_color'); ?>"><?php _e('Awesome Icon BG Hover Color',$petstore_plugin_name) ?></label>
    <input type="text" class="team_color_pickr" id="<?php echo $this->get_field_id('team_icon_bg_hover_color'); ?>" name="<?php echo $this->get_field_name('team_icon_bg_hover_color') ?>" value="<?php echo esc_attr($instance['team_icon_bg_hover_color']) ?>" />
  </p>
  </div>  
  <div class="input-elements-wrapper">
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('team_icon_hover_color'); ?>"><?php _e('Awesome Icon Hover Color',$petstore_plugin_name) ?></label>
    <input type="text" class="team_color_pickr" id="<?php echo $this->get_field_id('team_icon_hover_color'); ?>" name="<?php echo $this->get_field_name('team_icon_hover_color') ?>" value="<?php echo esc_attr($instance['team_icon_hover_color']) ?>" />
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('team_icon_border_radius') ?>"> <?php _e('Icon Border Radius',$petstore_plugin_name) ?> </label>
    <input type="text" class="small-text" id="<?php echo $this->get_field_id('team_icon_border_radius') ?>" value="<?php echo esc_attr($instance['team_icon_border_radius']) ?>" name="<?php echo $this->get_field_name('team_icon_border_radius') ?>" />
    <small><?php _e('px',$petstore_plugin_name); ?></small>
  </p>
<p class="one_fourth img_radio_select icon_alignment">
  <label for="<?php echo $this->get_field_id('team_alignment') ?>">  <?php _e('Team Title & Description Alignment',$petstore_plugin_name)  ?>  </label>
    <label>
      <input type="radio" id="<?php echo $this->get_field_id( 'team_alignment' ); ?>" name="<?php echo $this->get_field_name( 'team_alignment' ); ?>" value="center" <?php checked( $instance['team_alignment'], 'center' ); ?>>  <img alt="Align Center" title="Align Center"  src="<?php echo constant(strtoupper($petstore_plugin_name).'_PLUGIN_URL').'images/team_center.jpg' ?>">
    </label>
    <label>
     <input type="radio" id="<?php echo $this->get_field_id( 'team_alignment' ); ?>" name="<?php echo $this->get_field_name( 'team_alignment' ); ?>" value="left" <?php checked( $instance['team_alignment'], 'left' ); ?>> <img alt="Align Left" title="Align Left" src="<?php echo constant(strtoupper($petstore_plugin_name).'_PLUGIN_URL').'images/team_left.jpg' ?>">
    </label>
    <label> 
      <input type="radio" id="<?php echo $this->get_field_id( 'team_alignment' ); ?>" name="<?php echo $this->get_field_name( 'team_alignment' ); ?>" value="right" <?php checked( $instance['team_alignment'], 'right' ); ?>>  <img alt="Align Right" title="Align Right"  src="<?php echo constant(strtoupper($petstore_plugin_name).'_PLUGIN_URL').'images/team_right.jpg' ?>">
    </label>
  </p>

</div>  
<p>
  <label for="<?php echo $this->get_field_id('animation_names') ?>">  <?php _e('Select Animation Effect',$petstore_plugin_name) ?>  </label>
  <?php animation_effects($this->get_field_name('animation_names'), $instance['animation_names'] ); ?>
<p>  
   <?php  
  } } 

petstore_kaya_register_widgets('team', __FILE__);
  ?>