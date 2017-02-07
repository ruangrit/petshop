<?php
// Recent Blog post
 class Petstore_Recent_Blog_Widget extends WP_Widget{
    public function __construct(){
        global $petstore_plugin_name;
        parent::__construct('kaya-recent-blog-post-widget',
            __('Petstore - Recent Blog Posts',$petstore_plugin_name),
            array('description' => __('Displays recent blog items',$petstore_plugin_name), 'class' => 'recent_blog_post_widget')
        );
    }
    public function widget( $args, $instance ) {
      echo $args['before_widget'];
      global $post, $petstore_plugin_name;
      $instance=wp_parse_args($instance, array(

        'columns'  => '4',
        'readmore_text' => __('Read More',$petstore_plugin_name),
        'limit' => '2',
        'recent_blog_post' => '',
        'recent_blog_title_color' => '#343434',
        'recent_blog_desc_color' => '#757575',
        'recent_blog_date_color' => '#ffffff',
        'disable_description' => '',
        'disable_date' => '',
        'post_content_limit' => '8',
        'recent_blog_date_bg_color' => '#32be91',
        'recent_blog_date_bg_right_color' => '#a9bf2a',
        'extra_class_name' => '',
        'disable_post_image' => '',
        'recent_blog_title_hover_color' => '#32be91',
        'image_width' => '100',
        'image_height' => '100',
        'recent_blog_img_border_color' => '',
        'image_border_radius' => '0',
        'animation_names' => '',
        'recent_blog_date_size' => '13',
        'recent_blog_date_weight' => __('normal',$petstore_plugin_name),
        'recent_blog_date_top' => '',
        'recent_blog_title_size' => '16',
        'recent_blog_title_letter_space' => '0',
        'recent_blog_title_wight' => __('normal',$petstore_plugin_name),
        'recent_blog_title_style' => __('normal',$petstore_plugin_name),
        'recent_blog_img_position' => __('left',$petstore_plugin_name),
        'blog_post_style' => __('image_with_desc',$petstore_plugin_name),        
        'recent_blog_date_day_style' => __('normal',$petstore_plugin_name),
        'recent_blog_date_day_weight' => __('normal',$petstore_plugin_name),
        'recent_blog_date_day_size' => '50',
        'recent_blog_date_day_color' => '#32be91',
        'recent_blog_date_month_color' => '#353535',
        'recent_blog_date_month_style' => __('normal',$petstore_plugin_name),
        'recent_blog_date_month_weight' => __('normal',$petstore_plugin_name),
        'recent_blog_date_month_size' => '24',
        'recent_blog_date_border_color' => '#e5e5e5',
        'recent_blog_date_right' => ''

      ));
  $post_rand = rand(1,20);
    $recent_blog_posts_animation = $instance['animation_names'] ? 'wow '. $instance['animation_names'] : '';

  ?>
<div class="<?php echo $recent_blog_posts_animation; ?> recent_blog_post <?php echo $instance['extra_class_name'] ?> recent_blog_post_<?php echo $post_rand; ?>">
<div class="clear"> </div> 
  <ul>
        <style>
          .recent_blog_post_<?php echo $post_rand; ?>  ul li h4 a:hover{
              color: <?php echo $instance['recent_blog_title_hover_color'] ?>!important;
          }
        </style>
    <?php
        $loop = new WP_Query(array('post_type' => 'post', 'orderby' => '', 'order' => 'DESC', 'posts_per_page' => $instance['limit'], 'cat' =>  $instance['recent_blog_post']));
           if( $loop->have_posts() ) : while( $loop->have_posts() ) : $loop->the_post();
          $title_line_height = (ceil($instance['recent_blog_title_size']) * 1.4);
          $date_position_top = ( $instance['recent_blog_date_top'] == 'on' ) ? 'top:0px;' : 'bottom:0px;';
        ?>
    <li>
      <?php
      $img_border = $instance['recent_blog_img_border_color'] ? 'border:3px solid '.$instance['recent_blog_img_border_color'].';':'';
      if( $instance['blog_post_style'] == 'image_with_desc' ){
        $recent_blog_desc_align = $instance['recent_blog_img_position'];
        $img_description_margin = ( ( $instance['recent_blog_img_position'] == 'center' ) || ( $instance['recent_blog_img_position'] == 'none' ) ) ? 'margin-top:25px;' : '';
        if( $instance['disable_post_image'] != 'on') :
          echo '<div class="post_image align'.$instance['recent_blog_img_position'].'" style="'.$img_border.' border-radius:'.$instance['image_border_radius'].'px; width:'.$instance['image_width'].'px; height:'.$instance['image_height'].'px;">';
              if( $instance['disable_date'] != '1' && $instance['disable_date'] != 'on') : ?>
              <div class="post_date_color" style="background-color:<?php echo $instance['recent_blog_date_bg_color']; ?>; <?php echo $date_position_top; ?>">
                 <span style="color:<?php echo $instance['recent_blog_date_color']; ?>; font-size:<?php echo $instance['recent_blog_date_size'] ?>px; font-weight:<?php echo $instance['recent_blog_date_weight'] ?>;"><?php echo get_the_date('d M'); ?> </span>
              </div> 
            <?php endif; 
            $img_url = wp_get_attachment_url( get_post_thumbnail_id() ); ?>
          <a href="<?php echo the_permalink(); ?>" >
          <?php if( $img_url ){
              echo '<img src="'.kaya_image_resize( $img_url, $instance['image_width'], $instance['image_height'], 't' ).'" class="" alt="'.get_the_title().'" />';  
            }
            else{
              echo '<img src="'.constant(strtoupper($petstore_plugin_name).'_PLUGIN_URL').'images/recent_blog.jpg" style="width:'.$instance['image_width'].'px; Height:'.$instance['image_height'].'px;" >';
            }  
            echo '</a></div>';
          endif;
      }else{
        $img_description_margin ='';
        $recent_blog_desc_align = ( $instance['recent_blog_date_right'] == 'on' ) ? 'right' : 'left';
        $recent_blog_date_border = ( $instance['recent_blog_date_right'] == 'on' ) ? 'left' : 'right';
        $month_font_line_height = ( ceil( $instance['recent_blog_date_month_size']) * 1.4 );
        $day_font_line_height = ( ceil( $instance['recent_blog_date_day_size']) * 1.1  );
        echo '<div class="widget_blog_post_date align'.$recent_blog_desc_align.'" style="border-'.$recent_blog_date_border.':1px solid '.$instance['recent_blog_date_border_color'].'; padding-'.$recent_blog_date_border.' : 15px;">';
          echo '<h4 style="color:'.$instance['recent_blog_date_day_color'].'; font-size:'.$instance['recent_blog_date_day_size'].'px; font-weight:'.$instance['recent_blog_date_day_weight'].'; font-style:'.$instance['recent_blog_date_day_style'].'; line-height:'.$day_font_line_height.'px;">'.get_the_date('d').'</h4>';
          echo '<h5 style="color:'.$instance['recent_blog_date_month_color'].'; font-size:'.$instance['recent_blog_date_month_size'].'px; font-weight:'.$instance['recent_blog_date_month_weight'].'; font-style:'.$instance['recent_blog_date_month_style'].'; line-height:'.$month_font_line_height.'px;">'.strtoupper(get_the_date('M')).'</h5>';
        echo '</div>';
      }    
        ?>
      <div class="description" style="text-align:<?php echo $recent_blog_desc_align; ?>; <?php echo $img_description_margin; ?>">
        <h4 style="color:<?php echo $instance['recent_blog_title_color']; ?>; font-size:<?php echo $instance['recent_blog_title_size'] ?>px; line-height:<?php echo $title_line_height; ?>px; letter-spacing:<?php echo $instance['recent_blog_title_letter_space'] ?>px; font-weight:<?php echo $instance['recent_blog_title_weight'] ?>; font-style:<?php echo $instance['recent_blog_title_style'] ?>;"> <a style="font-size:<?php echo $instance['recent_blog_title_size'] ?>px; line-height:<?php echo $title_line_height; ?>px; color:<?php echo $instance['recent_blog_title_color']; ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?> </a> </h4>
        <?php if( $instance['disable_description'] != '1' && $instance['disable_description'] != 'on') : ?>
        <span style="color:<?php echo $instance['recent_blog_desc_color']; ?>">
        <?php  echo strip_tags(kaya_short_content($instance['post_content_limit'])); ?>
        </span>
        <?php endif; ?>        
      </div>
    </li>
    <?php endwhile; endif; ?>
  </ul>
  <?php wp_reset_query(); ?>
</div>
<?php echo $args['after_widget'];
    }
  public function form($instance){
    global $petstore_plugin_name;  
     $blog_categories = get_categories('hide_empty=0');
    if( $blog_categories ){
        foreach ($blog_categories as $category) {
               $blog_cat_name[] = $category->name.'-'.$category->cat_ID;
                $blog_cat_id[] = $category->cat_ID;  
      } } else{   
          $blog_cat_id[] = '';
          $blog_cat_name[] ='';
      }
      $instance = wp_parse_args($instance, array(
        'columns'  => '4',
        'readmore_text' => __('Read More',$petstore_plugin_name),
        'limit' => '2',
        'recent_blog_post' => implode(',', $blog_cat_id),
        'recent_blog_title_color' => '#343434',
        'recent_blog_desc_color' => '#757575',
        'recent_blog_date_color' => '#EF7360',
        'disable_description' => '',
        'disable_date' => '',
        'post_content_limit' => '8',
        'recent_blog_date_bg_color' => '#32be91',
        'extra_class_name' => '',
        'disable_post_image' => '',
        'recent_blog_title_hover_color' => '#de4a4a',
        'image_width' => '100',
        'image_height' => '100',
        'recent_blog_img_border_color' => '',
        'animation_names' => '',
        'image_border_radius' => '0',
        'recent_blog_date_size' => '13',
        'recent_blog_date_weight' => __('normal',$petstore_plugin_name),
        'recent_blog_date_top' => '',
        'recent_blog_title_size' => '16',
        'recent_blog_title_letter_space' => '0',
        'recent_blog_title_weight' => __('normal',$petstore_plugin_name),
        'recent_blog_title_style' => __('normal',$petstore_plugin_name),
        'recent_blog_img_position' => __('left',$petstore_plugin_name),
        'blog_post_style' => __('image_with_desc',$petstore_plugin_name),        
        'recent_blog_date_day_style' => __('normal',$petstore_plugin_name),
        'recent_blog_date_day_weight' => __('normal',$petstore_plugin_name),
        'recent_blog_date_day_size' => '50',
        'recent_blog_date_day_color' => '#32be91',
         'recent_blog_date_month_color' => '#353535',
        'recent_blog_date_month_style' => __('normal',$petstore_plugin_name),
        'recent_blog_date_month_weight' => __('normal',$petstore_plugin_name),
        'recent_blog_date_month_size' => '24',
        'recent_blog_date_border_color' => '#e5e5e5',
        'recent_blog_date_right' => '',
       ) ); ?>
<script type="text/javascript">
  (function($) {
    "use strict";
    $(function() {
      // Color Pickr 
      $('.recent_blog_post_color_pickr').each(function(){
        $(this).wpColorPicker();
      });
      // IMage Filed 
      $("#<?php echo $this->get_field_id('disable_post_image') ?>").change(function () {
        $("#<?php echo $this->get_field_id('image_width') ?>").parent().hide();
        $(".<?php echo $this->get_field_id('disable_date') ?>").hide();
        $(".<?php echo $this->get_field_id('recent_blog_img_border_color') ?>").hide();
        $("#<?php echo $this->get_field_id('image_border_radius') ?>").parent().hide();
        $("#<?php echo $this->get_field_id('recent_blog_img_position') ?>").parent().parent().hide();
        if( $("#<?php echo $this->get_field_id('disable_post_image') ?>").is(":checked") ){
        }
        else{
          $("#<?php echo $this->get_field_id('image_width') ?>").parent().show();
          $(".<?php echo $this->get_field_id('disable_date') ?>").show();
          $(".<?php echo $this->get_field_id('recent_blog_img_border_color') ?>").show();
          $("#<?php echo $this->get_field_id('image_border_radius') ?>").parent().show();
          $("#<?php echo $this->get_field_id('recent_blog_img_position') ?>").parent().parent().show();
        }
      }).change();
      // Date Filed 
      $("#<?php echo $this->get_field_id('disable_date') ?>").change(function () {
        $(".<?php echo $this->get_field_id('recent_blog_date_color') ?>").hide();
        $(".<?php echo $this->get_field_id('recent_blog_date_bg_color') ?>").hide();
        $("#<?php echo $this->get_field_id('recent_blog_date_size') ?>").parent().hide();
        $("#<?php echo $this->get_field_id('recent_blog_date_weight') ?>").parent().hide();
        $("#<?php echo $this->get_field_id('recent_blog_date_top') ?>").parent().hide();
        if( $("#<?php echo $this->get_field_id('disable_date') ?>").is(":checked") ){
        }
        else{
          $(".<?php echo $this->get_field_id('recent_blog_date_color') ?>").show();
          $(".<?php echo $this->get_field_id('recent_blog_date_bg_color') ?>").show();
          $("#<?php echo $this->get_field_id('recent_blog_date_size') ?>").parent().show();
          $("#<?php echo $this->get_field_id('recent_blog_date_top') ?>").parent().show();
          $("#<?php echo $this->get_field_id('recent_blog_date_weight') ?>").parent().show();
        }
      }).change();
    // News
      $(".<?php echo $this->get_field_id('blog_post_style') ?> input").change(function () {
        var image_with_desc = $(".<?php echo $this->get_field_id('blog_post_style') ?> input[value='image_with_desc']");
        var date_with_desc = $(".<?php echo $this->get_field_id('blog_post_style') ?> input[value='date_with_desc']");
        if( image_with_desc.is(":checked") ){
          $(".<?php echo $this->get_field_id('disable_date') ?>").show();
          $(".<?php echo $this->get_field_id('disable_post_image') ?>").show();
          $(".<?php echo $this->get_field_id('recent_blog_date_day_color') ?>").hide();
        }
        else if( date_with_desc.is(":checked") ){
          $(".<?php echo $this->get_field_id('disable_date') ?>").hide();
          $(".<?php echo $this->get_field_id('disable_post_image') ?>").hide();
          $(".<?php echo $this->get_field_id('recent_blog_date_day_color') ?>").show();
        }else{

        }
      }).change();
    });
  })(jQuery);
</script> 
<div class="input-elements-wrapper">
  <p class="img_radio_select <?php echo $this->get_field_id('blog_post_style') ?>">
      <label for="<?php echo $this->get_field_id('blog_post_style') ?>"> <?php _e('Choose Blog Post Type',$petstore_plugin_name) ?>  </label>
      <label>
        <input type="radio" id="<?php echo $this->get_field_id( 'blog_post_style' ); ?>" name="<?php echo $this->get_field_name( 'blog_post_style' ); ?>" value="image_with_desc" <?php checked( $instance['blog_post_style'], 'image_with_desc' ); ?>>  <img alt="Image With Description" src="<?php echo  constant(strtoupper($petstore_plugin_name).'_PLUGIN_URL').'images/blog/image_post_style.png' ?>">
      </label>
      <label>
       <input type="radio" id="<?php echo $this->get_field_id( 'blog_post_style' ); ?>" name="<?php echo $this->get_field_name( 'blog_post_style' ); ?>" value="date_with_desc" <?php checked( $instance['blog_post_style'], 'date_with_desc' ); ?>> <img alt="Date With Description" src="<?php echo  constant(strtoupper($petstore_plugin_name).'_PLUGIN_URL').'images/blog/data_post_style.png' ?>">
      </label>
  </p>
</div>
<div class="input-elements-wrapper"> 
  <p class="three_fourth">
    <label for="<?php echo $this->get_field_id('recent_blog_post') ?>"><?php _e('Select Blog Category IDs',$petstore_plugin_name) ?>
    </label>
    <input type="text" name="<?php echo $this->get_field_name('recent_blog_post') ?>" id="<?php echo $this->get_field_id('recent_blog_post') ?>" class="widefat" value="<?php echo $instance['recent_blog_post'] ?>" />
    <em><strong style="color:green;"><?php _e('Available Categories and IDs : ',$petstore_plugin_name); ?> </strong> <?php echo implode
    (',', $blog_cat_name); ?></em><br />
    <stong><?php _e('Note:',$petstore_plugin_name); ?></strong><?php _e('Separate IDs with commas only',$petstore_plugin_name); ?>
  </p>
   <p class="one_fourth_last">
    <label for="<?php echo $this->get_field_id('limit') ?>">  <?php _e('Display Number of Posts',$petstore_plugin_name)?>  </label>
    <input type="text" class="small-text" id="<?php echo $this->get_field_id('limit') ?>" value="<?php echo esc_attr($instance['limit']) ?>" name="<?php echo $this->get_field_name('limit') ?>" />
  </p>
</div>
<div class="input-elements-wrapper <?php echo $this->get_field_id('disable_post_image') ?>">
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('disable_post_image') ?>">  <?php _e('Disable Posts Image',$petstore_plugin_name) ?>  </label>
    <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("disable_post_image"); ?>" name="<?php echo $this->get_field_name("disable_post_image"); ?>"<?php checked( (bool) $instance["disable_post_image"], true ); ?> />
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('image_width'); ?>"> <?php _e('Image Width & Height',$petstore_plugin_name) ?>  </label>
    <input type="text" name="<?php echo $this->get_field_name('image_width') ?>" id="<?php echo $this->get_field_id('image_width') ?>" class="small-text" value="<?php echo $instance['image_width'] ?>" /> X
    <input type="text" name="<?php echo $this->get_field_name('image_height') ?>" id="<?php echo $this->get_field_id('image_height') ?>" class="small-text" value="<?php echo $instance['image_height'] ?>" />
    <small><?php _e('PX',$petstore_plugin_name); ?></small>
  </p>
  <p class="one_fourth <?php echo $this->get_field_id('recent_blog_img_border_color') ?>">
    <label for="<?php echo $this->get_field_id('recent_blog_img_border_color') ?>"><?php _e('Posts Image Border Color',$petstore_plugin_name) ?> </label>
    <input type="text" class="recent_blog_post_color_pickr" id="<?php echo $this->get_field_id('recent_blog_img_border_color') ?>" value="<?php echo esc_attr($instance['recent_blog_img_border_color']) ?>" name="<?php echo $this->get_field_name('recent_blog_img_border_color') ?>" />
  </p>
  <p class="one_fourth_last">
    <label for="<?php echo $this->get_field_id('image_border_radius'); ?>"> <?php _e('Image Border Radius',$petstore_plugin_name) ?>  </label>
    <input type="text" name="<?php echo $this->get_field_name('image_border_radius') ?>" id="<?php echo $this->get_field_id('image_border_radius') ?>" class="small-text" value="<?php echo $instance['image_border_radius'] ?>" />
    <small><?php _e('px',$petstore_plugin_name); ?></small>
  </p>
  <p class="two_fourth img_radio_select" style="clear:both;">
      <label for="<?php echo $this->get_field_id('recent_blog_img_position') ?>"> <?php _e('Image Position',$petstore_plugin_name) ?>  </label>
      <label>
        <input type="radio" id="<?php echo $this->get_field_id( 'recent_blog_img_position' ); ?>" name="<?php echo $this->get_field_name( 'recent_blog_img_position' ); ?>" value="center" <?php checked( $instance['recent_blog_img_position'], 'center' ); ?>>  <img alt="Align Center" alt="Align Center" src="<?php echo  constant(strtoupper($petstore_plugin_name).'_PLUGIN_URL').'images/align_center.png' ?>">
      </label>
      <label>
       <input type="radio" id="<?php echo $this->get_field_id( 'recent_blog_img_position' ); ?>" name="<?php echo $this->get_field_name( 'recent_blog_img_position' ); ?>" value="left" <?php checked( $instance['recent_blog_img_position'], 'left' ); ?>> <img alt="Align Left" alt="Align Left" src="<?php echo  constant(strtoupper($petstore_plugin_name).'_PLUGIN_URL').'images/align_left.png' ?>">
      </label>
      <label> 
        <input type="radio" id="<?php echo $this->get_field_id( 'recent_blog_img_position' ); ?>" name="<?php echo $this->get_field_name( 'recent_blog_img_position' ); ?>" value="right" <?php checked( $instance['recent_blog_img_position'], 'right' ); ?>>  <img alt="Align Right"  src="<?php echo  constant(strtoupper($petstore_plugin_name).'_PLUGIN_URL').'images/align_right.png' ?>">
     </label>
     <label> 
        <input type="radio" id="<?php echo $this->get_field_id( 'recent_blog_img_position' ); ?>" name="<?php echo $this->get_field_name( 'recent_blog_img_position' ); ?>" value="none" <?php checked( $instance['recent_blog_img_position'], 'none' ); ?>>  <img alt="Align None" src="<?php echo  constant(strtoupper($petstore_plugin_name).'_PLUGIN_URL').'images/align_none.png' ?>">
     </label>
  </p>
</div>
<div class="input-elements-wrapper <?php echo $this->get_field_id('disable_date') ?>">
   <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('disable_date') ?>">  <?php _e('Disable Date',$petstore_plugin_name)?>  </label>
    <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("disable_date"); ?>" name="<?php echo $this->get_field_name("disable_date"); ?>"<?php checked( (bool) $instance["disable_date"], true ); ?> />
  </p>
  <p class="one_fourth <?php echo $this->get_field_id('recent_blog_date_bg_color') ?>">
    <label for="<?php echo $this->get_field_id('recent_blog_date_bg_color') ?>"><?php _e('Posts Date Background Color',$petstore_plugin_name) ?> </label>
    <input type="text" class="recent_blog_post_color_pickr" id="<?php echo $this->get_field_id('recent_blog_date_bg_color') ?>" value="<?php echo esc_attr($instance['recent_blog_date_bg_color']) ?>" name="<?php echo $this->get_field_name('recent_blog_date_bg_color') ?>" />
  </p>
  <p class="one_fourth <?php echo $this->get_field_id('recent_blog_date_color') ?>">
    <label for="<?php echo $this->get_field_id('recent_blog_date_color') ?>">  <?php _e('Posts Date Color',$petstore_plugin_name) ?>  </label>
    <input type="text" class="recent_blog_post_color_pickr" id="<?php echo $this->get_field_id('recent_blog_date_color') ?>" value="<?php echo esc_attr($instance['recent_blog_date_color']) ?>" name="<?php echo $this->get_field_name('recent_blog_date_color') ?>" />
  </p>
  <p class="one_fourth_last">
    <label for="<?php echo $this->get_field_id('recent_blog_date_size') ?>">  <?php _e('Date Font Size',$petstore_plugin_name) ?>  </label>
    <input type="text" class="small-text" id="<?php echo $this->get_field_id('recent_blog_date_size') ?>" name="<?php echo $this->get_field_name('recent_blog_date_size') ?>" value="<?php echo esc_attr($instance['recent_blog_date_size']) ?>" />
    <small>  <?php _e('px',$petstore_plugin_name) ?>  </small> 
  </p>
  <p class="one_fourth" style="clear:both;">
    <label for="<?php echo $this->get_field_id('recent_blog_date_weight') ?>"> <?php _e('Date Font Weight',$petstore_plugin_name) ?></label>
    <select id="<?php echo $this->get_field_id('recent_blog_date_weight') ?>" name="<?php echo $this->get_field_name('recent_blog_date_weight') ?>">
      <option value="normal" <?php selected('normal', $instance['recent_blog_date_weight']) ?>> <?php esc_html_e('Normal', $petstore_plugin_name) ?>   </option>
      <option value="bold" <?php selected('bold', $instance['recent_blog_date_weight']) ?>>  <?php esc_html_e('Bold',$petstore_plugin_name) ?></option>
    </select>
  </p>
   <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('recent_blog_date_top') ?>">  <?php _e('Date Position Top',$petstore_plugin_name)?>  </label>
    <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("recent_blog_date_top"); ?>" name="<?php echo $this->get_field_name("recent_blog_date_top"); ?>"<?php checked( (bool) $instance["recent_blog_date_top"], true ); ?> />
  </p>
</div>
<div class="input-elements-wrapper <?php echo $this->get_field_id('recent_blog_date_day_color') ?>">
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('recent_blog_date_day_size') ?>">  <?php _e('Posts Date Day Font Size',$petstore_plugin_name) ?>  </label>
    <input type="text" class="small-text" id="<?php echo $this->get_field_id('recent_blog_date_day_size') ?>" name="<?php echo $this->get_field_name('recent_blog_date_day_size') ?>" value="<?php echo esc_attr($instance['recent_blog_date_day_size']) ?>" />
    <small>  <?php _e('px',$petstore_plugin_name) ?>  </small> 
  </p>
  <p class="one_fourth">
  <label for="<?php echo $this->get_field_id('recent_blog_date_day_style') ?>"> <?php _e('Posts Date Day Font Style',$petstore_plugin_name) ?></label>
  <select id="<?php echo $this->get_field_id('recent_blog_date_day_style') ?>" name="<?php echo $this->get_field_name('recent_blog_date_day_style') ?>">
    <option value="normal" <?php selected('normal', $instance['recent_blog_date_day_style']) ?>> <?php esc_html_e('Normal', $petstore_plugin_name) ?></option>
    <option value="italic" <?php selected('italic', $instance['recent_blog_date_day_style']) ?>>  <?php esc_html_e('Italic',$petstore_plugin_name) ?></option>
  </select>
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('recent_blog_date_day_weight') ?>"><?php _e('Posts Date Day Font Weight',$petstore_plugin_name) ?></label>
    <select id="<?php echo $this->get_field_id('recent_blog_date_day_weight') ?>" name="<?php echo $this->get_field_name('recent_blog_date_day_weight') ?>">
      <option value="normal" <?php selected('normal', $instance['recent_blog_date_day_weight']) ?>> <?php esc_html_e('Normal', $petstore_plugin_name) ?>   </option>
      <option value="bold" <?php selected('bold', $instance['recent_blog_date_day_weight']) ?>>  <?php esc_html_e('Bold',$petstore_plugin_name) ?></option>
    </select>
  </p>
  <p class="one_fourth_last">
    <label for="<?php echo $this->get_field_id('recent_blog_date_day_color') ?>">  <?php _e('Posts Date Day Color',$petstore_plugin_name) ?>  </label>
    <input type="text" class="recent_blog_post_color_pickr" id="<?php echo $this->get_field_id('recent_blog_date_day_color') ?>" value="<?php echo esc_attr($instance['recent_blog_date_day_color']) ?>" name="<?php echo $this->get_field_name('recent_blog_date_day_color') ?>" />
  </p>


  <p class="one_fourth"  style="clear:both;">
    <label for="<?php echo $this->get_field_id('recent_blog_date_month_size') ?>">  <?php _e('Posts Date Month Font Size',$petstore_plugin_name) ?>  </label>
    <input type="text" class="small-text" id="<?php echo $this->get_field_id('recent_blog_date_month_size') ?>" name="<?php echo $this->get_field_name('recent_blog_date_month_size') ?>" value="<?php echo esc_attr($instance['recent_blog_date_month_size']) ?>" />
    <small>  <?php _e('px',$petstore_plugin_name) ?>  </small> 
  </p>
  <p class="one_fourth">
  <label for="<?php echo $this->get_field_id('recent_blog_date_month_style') ?>"> <?php _e('Posts Date Month Font Style',$petstore_plugin_name) ?></label>
  <select id="<?php echo $this->get_field_id('recent_blog_date_month_style') ?>" name="<?php echo $this->get_field_name('recent_blog_date_month_style') ?>">
    <option value="normal" <?php selected('normal', $instance['recent_blog_date_month_style']) ?>> <?php esc_html_e('Normal', $petstore_plugin_name) ?></option>
    <option value="italic" <?php selected('italic', $instance['recent_blog_date_month_style']) ?>>  <?php esc_html_e('Italic',$petstore_plugin_name) ?></option>
  </select>
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('recent_blog_date_month_weight') ?>"><?php _e('Posts Date Month Font Weight',$petstore_plugin_name) ?></label>
    <select id="<?php echo $this->get_field_id('recent_blog_date_month_weight') ?>" name="<?php echo $this->get_field_name('recent_blog_date_month_weight') ?>">
      <option value="normal" <?php selected('normal', $instance['recent_blog_date_month_weight']) ?>> <?php esc_html_e('Normal', $petstore_plugin_name) ?>   </option>
      <option value="bold" <?php selected('bold', $instance['recent_blog_date_month_weight']) ?>>  <?php esc_html_e('Bold',$petstore_plugin_name) ?></option>
    </select>
  </p>
  <p class="one_fourth_last">
    <label for="<?php echo $this->get_field_id('recent_blog_date_month_color') ?>">  <?php _e('Posts Date Month Color',$petstore_plugin_name) ?> </label>
    <input type="text" class="recent_blog_post_color_pickr" id="<?php echo $this->get_field_id('recent_blog_date_month_color') ?>" value="<?php echo esc_attr($instance['recent_blog_date_month_color']) ?>" name="<?php echo $this->get_field_name('recent_blog_date_month_color') ?>" />
  </p>
  <p class="one_fourth" style="clear:both;">
    <label for="<?php echo $this->get_field_id('recent_blog_date_border_color') ?>">  <?php _e('Posts Date Right Border Color',$petstore_plugin_name) ?></label>
    <input type="text" class="recent_blog_post_color_pickr" id="<?php echo $this->get_field_id('recent_blog_date_border_color') ?>" value="<?php echo esc_attr($instance['recent_blog_date_border_color']) ?>" name="<?php echo $this->get_field_name('recent_blog_date_border_color') ?>" />
  </p>
   <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('recent_blog_date_right') ?>">  <?php _e('Date Position Right',$petstore_plugin_name)?>  </label>
    <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("recent_blog_date_right"); ?>" name="<?php echo $this->get_field_name("recent_blog_date_right"); ?>"<?php checked( (bool) $instance["recent_blog_date_right"], true ); ?> />
  </p>
</div>
<div class="input-elements-wrapper">
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('recent_blog_title_color') ?>"> <?php _e('Posts Title Color',$petstore_plugin_name) ?>  </label>
    <input type="text" class="recent_blog_post_color_pickr" id="<?php echo $this->get_field_id('recent_blog_title_color') ?>" value="<?php echo esc_attr($instance['recent_blog_title_color']) ?>" name="<?php echo $this->get_field_name('recent_blog_title_color') ?>" />
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('recent_blog_title_hover_color') ?>"> <?php _e('Posts Title Hover Color',$petstore_plugin_name) ?></label>
    <input type="text" class="recent_blog_post_color_pickr" id="<?php echo $this->get_field_id('recent_blog_title_hover_color') ?>" value="<?php echo esc_attr($instance['recent_blog_title_hover_color']) ?>" name="<?php echo $this->get_field_name('recent_blog_title_hover_color') ?>" />
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('recent_blog_title_size') ?>">  <?php _e('Title Font Size',$petstore_plugin_name) ?>  </label>
    <input type="text" class="small-text" id="<?php echo $this->get_field_id('recent_blog_title_size') ?>" name="<?php echo $this->get_field_name('recent_blog_title_size') ?>" value="<?php echo esc_attr($instance['recent_blog_title_size']) ?>" />
    <small>  <?php _e('px',$petstore_plugin_name) ?>  </small> 
  </p>
  <p class="one_fourth_last">
  <label for="<?php echo $this->get_field_id('recent_blog_title_letter_space') ?>">  <?php _e('Title Letter Space',$petstore_plugin_name) ?>  </label>
  <input type="text" class="small-text" id="<?php echo $this->get_field_id('recent_blog_title_letter_space') ?>" name="<?php echo $this->get_field_name('recent_blog_title_letter_space') ?>" value="<?php echo esc_attr($instance['recent_blog_title_letter_space']) ?>" />
  <small>  <?php _e('px',$petstore_plugin_name) ?>  </small> 
</p>
<p class="one_fourth" style="clear:both;">
  <label for="<?php echo $this->get_field_id('recent_blog_title_style') ?>"> <?php _e('Title Font Style',$petstore_plugin_name) ?></label>
  <select id="<?php echo $this->get_field_id('recent_blog_title_style') ?>" name="<?php echo $this->get_field_name('recent_blog_title_style') ?>">
    <option value="normal" <?php selected('normal', $instance['recent_blog_title_style']) ?>> <?php esc_html_e('Normal', $petstore_plugin_name) ?></option>
    <option value="italic" <?php selected('italic', $instance['recent_blog_title_style']) ?>>  <?php esc_html_e('Italic',$petstore_plugin_name) ?></option>
  </select>
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('recent_blog_title_weight') ?>"> <?php _e('Title Font Weight',$petstore_plugin_name) ?></label>
    <select id="<?php echo $this->get_field_id('recent_blog_title_weight') ?>" name="<?php echo $this->get_field_name('recent_blog_title_weight') ?>">
      <option value="normal" <?php selected('normal', $instance['recent_blog_title_weight']) ?>> <?php esc_html_e('Normal', $petstore_plugin_name) ?>   </option>
      <option value="bold" <?php selected('bold', $instance['recent_blog_title_weight']) ?>>  <?php esc_html_e('Bold',$petstore_plugin_name) ?></option>
    </select>
  </p>
</div>
<div class="input-elements-wrapper">
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('disable_description') ?>">  <?php _e('Disable Description',$petstore_plugin_name)?>  </label>
    <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("disable_description"); ?>" name="<?php echo $this->get_field_name("disable_description"); ?>"<?php checked( (bool) $instance["disable_description"], true ); ?> />
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('recent_blog_desc_color') ?>">  <?php _e('Posts Description Color',$petstore_plugin_name)?>  </label>
    <input type="text" class="recent_blog_post_color_pickr" id="<?php echo $this->get_field_id('recent_blog_desc_color') ?>" value="<?php echo esc_attr($instance['recent_blog_desc_color']) ?>" name="<?php echo $this->get_field_name('recent_blog_desc_color') ?>" />
  </p>
  <p class="one_fourth" style="">
    <label for="<?php echo $this->get_field_id('post_content_limit') ?>">  <?php _e('Posts Content Limit',$petstore_plugin_name)?>  </label>
    <input type="text" class="small-text" id="<?php echo $this->get_field_id('post_content_limit') ?>" value="<?php echo esc_attr($instance['post_content_limit']) ?>" name="<?php echo $this->get_field_name('post_content_limit') ?>" />
  </p>
</div>
 <p>
      <label for="<?php echo $this->get_field_id('animation_names') ?>">  <?php _e('Select Animation Effect',$petstore_plugin_name) ?>  </label>
      <?php animation_effects($this->get_field_name('animation_names'), $instance['animation_names'] ); ?>
    <p>   
<?php  }
 }
 petstore_kaya_register_widgets('recent-blog', __FILE__);
 ?>