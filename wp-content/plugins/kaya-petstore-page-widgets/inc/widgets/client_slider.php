<?php
class Petstore_Client_Slider_Widget extends WP_Widget
{
  public function __construct()  
  {
     global $petstore_plugin_name;
    parent::__construct( $petstore_plugin_name.'-client-slider',
      __('Petstore - Client Slider',$petstore_plugin_name),
      array('description' => __('Display client slider from "Client" CPT post featured image',$petstore_plugin_name),'class' => 'client_slider'));
  }
  public function widget( $args, $instance){
      global $petstore_plugin_name;
      wp_enqueue_script('jquery_owlcarousel');
      wp_enqueue_style('css_owl.carousel');
      $instance = wp_parse_args($instance, array( 
        'client_slider_cat' => '',
        'client_display_orderby' => __('date',$petstore_plugin_name),
        'client_display_order' => __('DESC',$petstore_plugin_name),
        'clinet_slide_items' => '4',
        'client_auto_play' => __('true',$petstore_plugin_name),
        'tooltip_text_color' => '#ffffff',
        'tooltip_bg_color' => '#333333',
        'disable_tooltip' => '',
        'description_color' => '#333333',
        'animation_names' => '',
        'disable_description' => '',
        ));
      echo $args['before_widget']; 
       $client_rand = rand(1,100); ?>
      <style type="text/css">
        .image_tooltip_<?php echo $client_rand; ?>:after{
          border-top:7px solid <?php echo $instance['tooltip_bg_color'] ?>; 
        }
      </style>
     <?php 
       $client_slider_animation =   ( trim( $instance['animation_names'] ) )  ? 'wow '. $instance['animation_names'] : '';
       echo '<span class="slider_bg_loading_img container" style="position:relative;height:150px; background:url('.constant(strtoupper($petstore_plugin_name).'_PLUGIN_URL').'images/bx_loader.GIF)"></span>';
      echo '<div class="client_slider_wrapper '.$client_slider_animation.'">'; ?>
              <div class="clear"> </div>
           <?php 
           echo '<div class="client_slider" data-columns="'.$instance['clinet_slide_items'].'" data-autoplay="'.$instance['client_auto_play'].'">';
           $array_val = ( !empty( $instance['client_slider_cat'] )) ? explode(',',  $instance['client_slider_cat']) : '';
           if( is_array($array_val ) ){
          $loop = new WP_Query(array( 'post_type' => 'client',  'orderby' => $instance['client_display_orderby'], 'posts_per_page' =>-1,'order' => $instance['client_display_order'],  'tax_query' => array('relation' => 'AND', array( 'taxonomy' => 'client_category',   'field' => 'id', 'terms' => $array_val  ) )));
          }else{
                 $loop = new WP_Query(array('post_type' => 'client', 'taxonomy' => 'client_category','term' => '', 'orderby' => $instance['client_display_orderby'], 'posts_per_page' => -1,'order' => $instance['client_display_order']));
          }

          if( $loop->have_posts() ) : while( $loop->have_posts()) : $loop->the_post();
          global $post;
            $img_url = wp_get_attachment_url(get_post_thumbnail_id());
            $customlink = get_post_meta($post->ID,'client_link',true);
             $client_description = get_post_meta($post->ID,'client_description',true);
            $client_target_link = get_post_meta($post->ID,'client_target_link',true);
           // $description_color = get_post_meta($post->ID,'description_color',true) ? get_post_meta($post->ID,'description_color',true):'#333333';
            $target_link = ( $client_target_link == '1' ) ? '_blank' :'_self';
            echo '<div class="clients_image_wrapper">';
             if( $instance['disable_tooltip'] != 'on'): echo "<span class='image_tooltip image_tooltip_$client_rand' style='background-color:".$instance['tooltip_bg_color']."; color:".$instance['tooltip_text_color'].";'>".get_the_title()."</span>"; endif;
             if( !empty( $customlink ) ): echo "<a href=\" $customlink \" target=\"$target_link\">"; endif;
             if( !empty($img_url) ){
                echo "<img src=\" $img_url \" alt=\" get_the_title() \">";
             }else{
              echo '<img src="'.constant(strtoupper($petstore_plugin_name).'_PLUGIN_URL').'images/client.png" >';
                }
              if(!empty($customlink)): echo '</a>'; endif;

             if( !empty($client_description) && ( $instance['disable_description'] != 'on' ) ):
              echo "<p style='color:".$instance['description_color']."'>$client_description</p>";
              endif;
            echo '</div>';  
          endwhile; endif;
          wp_reset_query();
        echo '</div>';
        echo '</div>';
      echo $args['after_widget'];
  }
  public function form($instance){
    global $petstore_plugin_name;
    $client_terms=  get_terms('client_category','');
     if( $client_terms ){   
      foreach ($client_terms as $client_term) { 
        $client_cats_name[] = $client_term->name.'- '. $client_term->term_id;
        $client_cats_id[] = $client_term->term_id;
      } $slider_items = implode(',', $client_cats_id); }else{ $client_cats_name[] = '';  $slider_items = ''; $client_cats_id[]='';}
    $instance = wp_parse_args($instance,array(
        'client_slider_cat' => implode(',', $client_cats_id),
        'client_display_orderby' => __('date',$petstore_plugin_name),
        'client_display_order' => __('DESC',$petstore_plugin_name),
        'clinet_slide_items' => '4',
        'client_auto_play' => __('true',$petstore_plugin_name),
        'tooltip_text_color' => '#ffffff',
        'tooltip_bg_color' => '#333333',
        'disable_tooltip' => '',
        'description_color' => '#333333',
        'animation_names' => '',
        'disable_description' => '',
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
  <p>
    <label for="<?php echo $this->get_field_id('client_slider_cat') ?>">   <?php _e('Enter Client Slider Category IDs : ',$petstore_plugin_name) ?>  </label>
    <input type="text" name="<?php echo $this->get_field_name('client_slider_cat') ?>" id="<?php echo $this->get_field_id('client_slider_cat') ?>" class="widefat" value="<?php echo $instance['client_slider_cat'] ?>" />
    <em><strong style="color:green;"><?php _e('Available Categories and IDs : ',$petstore_plugin_name); ?> </strong><?php echo implode(',', $client_cats_name); ?></em><br />
    <stong><?php _e('Note:',$petstore_plugin_name); ?></strong><?php _e('Separate IDs with commas only',$petstore_plugin_name); ?>
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('clinet_slide_items') ?>">  <?php _e('Client Slide Items',$petstore_plugin_name); ?> </label>
    <select id="<?php echo $this->get_field_id('clinet_slide_items') ?>" name="<?php echo $this->get_field_name('clinet_slide_items') ?>">
      <option value="1" <?php selected('1', $instance['clinet_slide_items']) ?>>   <?php esc_html_e('1 Item', $petstore_plugin_name) ?>   </option>
      <option value="2" <?php selected('2', $instance['clinet_slide_items']) ?>>  <?php esc_html_e('2 Items', $petstore_plugin_name) ?>  </option>
      <option value="3" <?php selected('3', $instance['clinet_slide_items']) ?>>   <?php esc_html_e('3 Items', $petstore_plugin_name) ?>  </option>
      <option value="4" <?php selected('4', $instance['clinet_slide_items']) ?>>   <?php esc_html_e('4 Items', $petstore_plugin_name) ?>  </option>
      <option value="5" <?php selected('5', $instance['clinet_slide_items']) ?>>  <?php esc_html_e('5 Items', $petstore_plugin_name) ?>    </option>
      <option value="6" <?php selected('6', $instance['clinet_slide_items']) ?>>  <?php esc_html_e('6 Items', $petstore_plugin_name) ?>    </option>
    </select>
  </p>
 <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('client_auto_play') ?>">   <?php _e('Auto Play',$petstore_plugin_name) ?> </label>
    <select id="<?php echo $this->get_field_id('client_auto_play') ?>" name="<?php echo $this->get_field_name('client_auto_play') ?>">
      <option value="true" <?php selected('true', $instance['client_auto_play']) ?>>  <?php esc_html_e('True', $petstore_plugin_name) ?>  </option>
      <option value="false" <?php selected('false', $instance['client_auto_play']) ?>>   <?php esc_html_e('False', $petstore_plugin_name) ?></option>
    </select>
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('client_display_orderby') ?>"> <?php _e('Orderby',$petstore_plugin_name) ?>  </label>
    <select id="<?php echo $this->get_field_id('client_display_orderby') ?>" name="<?php echo $this->get_field_name('client_display_orderby') ?>">
      <option value="date" <?php selected('date', $instance['client_display_orderby']) ?>> <?php esc_html_e('Date', $petstore_plugin_name) ?> </option>
      <option value="menu_order" <?php selected('menu_order', $instance['client_display_orderby']) ?>> <?php esc_html_e('Menu Order', $petstore_plugin_name) ?>
      </option>
      <option value="title" <?php selected('title', $instance['client_display_orderby']) ?>> <?php esc_html_e('Title', $petstore_plugin_name) ?>   </option>
      <option value="rand" <?php selected('rand', $instance['client_display_orderby']) ?>> <?php esc_html_e('Random', $petstore_plugin_name) ?> </option>
      <option value="author" <?php selected('author', $instance['client_display_orderby']) ?>> <?php esc_html_e('Author', $petstore_plugin_name) ?> </option>
    </select>
  </p>
  <p class="one_fourth_last">
    <label for="<?php echo $this->get_field_id('client_display_order') ?>">   <?php _e('Order',$petstore_plugin_name)?>    </label>
    <select id="<?php echo $this->get_field_id('client_display_order') ?>" name="<?php echo $this->get_field_name('client_display_order') ?>">
      <option value="ASC" <?php selected('ASC', $instance['client_display_order']) ?>>  <?php esc_html_e('Ascending', $petstore_plugin_name) ?>  </option>   
      <option value="DESC" <?php selected('DESC', $instance['client_display_order']) ?>>  <?php esc_html_e('Descending', $petstore_plugin_name) ?> </option>
    </select>
  </p>
  </div>
  <div class="input-elements-wrapper">
  <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('disable_description'); ?>"> <?php _e('Disable Description',$petstore_plugin_name) ?> </label>
     <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("disable_description"); ?>" name="<?php echo $this->get_field_name("disable_description"); ?>"<?php checked( (bool) $instance["disable_description"], true ); ?> />
    </p>
    <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('description_color'); ?>"> <?php _e('Description Color',$petstore_plugin_name) ?> </label>
      <input type="text" name="<?php echo $this->get_field_name('description_color') ?>" id="<?php echo $this->get_field_id('description_color') ?>" class="client_color_pickr" value="<?php echo $instance['description_color'] ?>" />
    </p> 
  </div>
  <div class="input-elements-wrapper">
     
    <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('tooltip_bg_color'); ?>"> <?php _e('Tooltip Backround Color',$petstore_plugin_name) ?> </label>
      <input type="text" name="<?php echo $this->get_field_name('tooltip_bg_color') ?>" id="<?php echo $this->get_field_id('tooltip_bg_color') ?>" class="client_color_pickr" value="<?php echo $instance['tooltip_bg_color'] ?>" />
    </p>
    <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('tooltip_text_color'); ?>"> <?php _e('Tooltip Text Color',$petstore_plugin_name) ?> </label>
      <input type="text" name="<?php echo $this->get_field_name('tooltip_text_color') ?>" id="<?php echo $this->get_field_id('tooltip_text_color') ?>" class="client_color_pickr" value="<?php echo $instance['tooltip_text_color'] ?>" />
    </p>
    <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('disable_tooltip') ?>">  <?php _e('Disable Tooltip',$petstore_plugin_name)?>  </label>
      <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("disable_tooltip"); ?>" name="<?php echo $this->get_field_name("disable_tooltip"); ?>"<?php checked( (bool) $instance["disable_tooltip"], true ); ?> />
    </p>
  </div>
 <p>
   <label for="<?php echo $this->get_field_id('animation_names') ?>">  <?php _e('Select Animation Effect',$petstore_plugin_name) ?>  </label>
    <?php animation_effects($this->get_field_name('animation_names'), $instance['animation_names'] ); ?>
  <p>
<?php
  }
} 
 petstore_kaya_register_widgets('client-slider', __FILE__);
?>