<?php
class Petstore_Blog_Widget extends WP_Widget{
   public function __construct(){
    global $petstore_plugin_name;
   parent::__construct(  'kaya-blog',
      __('Petstore - Blog',$petstore_plugin_name),
      array( 'description' => __('Use this widget to add blog post items',$petstore_plugin_name) ,'class' => 'kaya_blog' )
    );
    }
    public function widget( $args , $instance ){
        global $petstore_plugin_name;
        wp_enqueue_script('jquery_owlcarousel');
        wp_enqueue_style('css_owl.carousel');
        $instance = wp_parse_args($instance, array(
            'content_limit' => '30',
            'post_limit' => '10',
            'blog_category' => '',
            'title_color' => '#333333',
            'content_color' => '#787878',
            'posts_link_color' => '#de4a4a',
            'posts_link_hover_color' => '#333',
            'disable_pagination' => '',
            'blog_posts_order_by' => '',
            'blog_posts_order' => '',
            'readmore_button_text' => __('Read More',$petstore_plugin_name),
            'disable_date' => '',
            'blog_date_color' =>'#ffffff',
            'disable_post_meta_desc' => '',
            'blog_date_bg_color' => '#32be91',
            'blog_date_bg_right_color' => '#a9bf2a',
            'blog_display_type' => '',
            'title_hover_color' => '#de4a4a',
           'posts_bg_color' => '#ffffff',
           'posts_border_color' => 'dfdfdf',
           'posts_meta_icons_color' => '#de4a4a'
         ) );
          $post_rand =rand(1,100);
          ?>
        <style type="text/css">
          #mid_container .post_title_wrapper .blog_post_title a:hover{
            color: <?php echo $instance['title_hover_color']; ?>!important;
          }
          #mid_container .post_title_info .blog_post_meta a,  #mid_container .post_title_wrapper .post_by a{
            color: <?php echo $instance['posts_link_color']; ?>!important;
          }
          #mid_container .post_title_wrapper .post_by a:hover, #mid_container .blog_post_meta a:hover{
            color: <?php echo $instance['posts_link_hover_color']; ?>!important;
          }
          #mid_container .blog_post_wrapper p,  #mid_container .blog_post_wrapper{
            color: <?php echo $instance['content_color']; ?>
          }
        </style>
        <?php
          switch ($instance['blog_display_type']) {
            case 'masonry':
              $class="";
              $class_last='';
              $masonry_columns="masonry_blog";
              $masonry_class="blog-isotope-container";
              break;
            case 'fullwidth_blog':
              $class="";
              $class_last='';
              $masonry_columns='';
              $masonry_class='';
              break;
            case 'medium_blog':
              $class="one_half";
              $class_last='one_half_last';
              $masonry_columns='';
              $masonry_class='';
              break;    
            default:
              $class="";
              $masonry_columns='';
              $masonry_class='';
              $class_last='';
              break;
          }
         echo '<div class="blog_post_wrapper>';
          echo '<div class="blog_post_content_wrapper '.$masonry_class.'">';
          $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $args = array(
               'cat' =>  $instance['blog_category'],
               'post_type' => 'post',
               'posts_per_page' => $instance['post_limit'],
               'paged' => $page,
                'orderby' => $instance['blog_posts_order_by'], 
                'order' => $instance['blog_posts_order'], 
               );
      query_posts($args);
      if(have_posts() ) : while( have_posts() ) : the_post(); 
      global $post;
        if( has_post_format('gallery') ){
           $iocn = 'th';
        }elseif( has_post_format('video') ){
           $iocn = 'video-camera';
        }elseif(has_post_format('quote')){
          $iocn = 'quote-left';
        }elseif(has_post_format('link')){
          $iocn = 'link';
        }elseif(has_post_format('audio')){
          $iocn = 'play';
        }else{
          $iocn = 'image';
        }
       ?>
        <article <?php post_class('standard-blog '.$masonry_columns.''); ?> style="background-color:<?php echo $instance['posts_bg_color']; ?>; border:1px solid <?php echo $instance['posts_border_color'] ?>">
          <div class="blog_<?php echo $instance['blog_display_type']; ?>">
        <?php 
        if( $instance['blog_display_type']  != 'medium_blog' ){
          echo '<div class="post_title_wrapper">';
            echo '<div class="blog_post_format_icon"> <i class="fa fa-'.$iocn.'"> </i></div>';
            the_title( '<h2 class="blog_post_title" style="color:'.$instance['title_color'].'"><a style="color:'.$instance['title_color'].'" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
            <span class="post_by" style="color:<?php echo $instance['content_color']; ?>" ><i style="color:<?php echo $instance['posts_meta_icons_color']; ?>" class="fa fa-user" >&nbsp; </i> <?php _e('By ',$petstore_plugin_name); ?> <?php the_author_posts_link(); ?></span>
          <?php echo '</div>';
         }   
      $img_url = wp_get_attachment_url( get_post_thumbnail_id() );
          if( get_post_format() == '0'){
            if( $img_url ){ $post_class_last = $class_last; }else{
             $post_class_last = '';
          }
        }
        else{
           $post_class_last = $class_last; 
        }
      $img_url = wp_get_attachment_url( get_post_thumbnail_id() );
        if( has_post_format('gallery') ){
           gallery_format($post, $class);
           $standard_class_last ='';
           $iocn = 'th';
        }elseif( has_post_format('video') ){
           video_format($post, $class);
           $standard_class_last ='';
           $iocn = 'video-camera';
        }elseif(has_post_format('quote')){
          $standard_class_last ='';
          $iocn = 'quote-left';
          if($instance['blog_display_type'] != 'medium_blog'){ quote_format($instance['title_color'], $class); }
          else{  medium_quote_format($instance['title_color'], $img_url, $class); }
        }elseif(has_post_format('link')){
          $standard_class_last ='';
          $iocn = 'link';
           if($instance['blog_display_type'] != 'medium_blog'){link_format($instance['title_color'], $class); }
          else{  image_link_format($class, $img_url,$instance['title_color']); }
        }elseif(has_post_format('audio')){
          $iocn = 'play';
          audio_format($class);
        }else{
          $iocn = 'image';
          if( $img_url ){
           $standard_class_last ="fullwidth";
            standard_format($class,$img_url);
          } else{ $standard_class_last="fullwidth post_with_out_image"; } 
        }
      if( has_post_format('link') || has_post_format('quote')  ){ }else{  ?>
      <div class="<?php echo $standard_class_last.' '.$post_class_last; ?>">
        <div class="description">
        <?php
          if( $instance['blog_display_type']  == 'medium_blog' ){
          echo '<div class="post_title_wrapper">';
            echo '<div class="blog_post_format_icon"> <i class="fa fa-'.$iocn.'"> </i></div>';
            the_title( '<h3 class="blog_post_title" style="color:'.$instance['title_color'].'"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
            <span class="post_by" style="color:<?php echo $instance['content_color']; ?>" ><i style="color:<?php echo $instance['posts_meta_icons_color'] ?>;" class="fa fa-user">&nbsp; </i> <?php _e('By ',$petstore_plugin_name); ?> <?php the_author_posts_link(); ?></span>
          <?php echo '</div>';
         }
        ?>
        <div class="post_content_warpper">
          <div class="post_title_info"> 
            <?php if( $instance['disable_post_meta_desc'] != 'on') : ?>
            <div class="blog_post_meta">
            <?php if( $instance['blog_display_type'] == 'masonry' ): ?>
                  <?php //echo get_the_date(); ?>
                  <span><i class="fa fa-calendar" style="color:<?php echo $instance['posts_meta_icons_color'] ?>;">&nbsp; </i><?php echo get_the_date('M d, Y'); ?></span>
                  <span  class="comment_color"><i class="fa fa-comments" style="color:<?php echo $instance['posts_meta_icons_color'] ?>;">&nbsp; </i> <?php comments_popup_link(__('0',$petstore_plugin_name ), __( '1', $petstore_plugin_name ), __( '%', $petstore_plugin_name ) ); ?></span>
            <?php endif; ?>
              <?php if( $instance['blog_display_type'] != 'masonry' ){ ?>  
                 <span class=""><i class="fa fa-calendar" style="color:<?php echo $instance['posts_meta_icons_color'] ?>;">&nbsp; </i> <?php echo get_the_date('M d, Y'); ?></span>
                 <span  class="comment_color"><i class="fa fa-comments" style="color:<?php echo $instance['posts_meta_icons_color'] ?>;" >&nbsp; </i> <?php comments_popup_link(__('0 Comments',$petstore_plugin_name ), __( '1 Comment', $petstore_plugin_name ), __( '% Comments', $petstore_plugin_name ) ); ?></span> <?php  } ?>
                  <span class="post_category"><i class="fa fa-tags" style="color:<?php echo $instance['posts_meta_icons_color'] ?>;">&nbsp; </i> <?php the_category(','); ?></span> 
            </div>
          </div>
        </div> 
         <?php endif; ?>
          <p style="color:<?php echo $instance['content_color']; ?>"><?php  echo strip_tags(kaya_short_content($instance['content_limit'])); ?></p>
          <?php if( $instance['readmore_button_text'] ): ?><a href="<?php echo the_permalink(); ?>" class="readmore"><?php echo $instance['readmore_button_text'] ?></a><?php endif; ?>
        </div>
        </div>
      <?php } ?>
      </div>  
    </article>
      <?php endwhile; endif; 
      if( $instance['disable_pagination'] != 'on' ){
         echo kaya_pagination(); 
      }
       wp_reset_query(); ?>
    </div>
    <?php  //echo $args['after_widget']; 
   ?>
    <?php }
public function form( $instance ){
  global $petstore_plugin_name;
  $blog_categories = get_categories('hide_empty=0');
    if( $blog_categories ){
        foreach ($blog_categories as $category) {
               $blog_cat_name[] = $category->name .' - '.$category->cat_ID;
               $blog_cat_id[] = $category->cat_ID;
      } } else{   
          $blog_cat_id[] = '';
          $blog_cat_name[] = '';
      }
    $instance = wp_parse_args( $instance, array(
            'content_limit' => '30',
            'post_limit' => '10',
            'blog_category' => implode(',',$blog_cat_id),
            'title_color' => '#333333',
            'content_color' => '#787878',
            'posts_link_color' => '#de4a4a',
            'posts_link_hover_color' => '#333',
            'disable_pagination' => '',
            'blog_posts_order_by' => '',
            'blog_posts_order' => '',
            'readmore_button_text' => __('Read More',$petstore_plugin_name),
            'disable_date' => '',
            'blog_date_color' =>'#ffffff',
            'disable_post_meta_desc' => '',
            'blog_date_bg_color' => '#32be91',
            'blog_date_bg_right_color' => '#a9bf2a',
            'blog_display_type' => '',
            'title_hover_color' => '#de4a4a',
            'posts_bg_color' => '#ffffff',
            'posts_border_color' => 'dfdfdf',
            'posts_meta_icons_color' => '#de4a4a'
             ) );  ?>
    <script type='text/javascript'>
    (function( $ ) {
    "use strict";
      $('.blog_color_pickr').each(function(){
        $(this).wpColorPicker();
      });
    })(jQuery);
  </script>
  <div class="input-elements-wrapper">
    <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('blog_display_type') ?>"><?php _e('Select Blog Style',$petstore_plugin_name)?></label>
        <select id="<?php echo $this->get_field_id('blog_display_type') ?>" name="<?php echo $this->get_field_name('blog_display_type') ?>">
         <option value="fullwidth_blog" <?php selected('fullwidth_blog', $instance['blog_display_type']) ?>><?php esc_html_e('Fullwidth Blog', $petstore_plugin_name) ?></option> 
        <option value="medium_blog" <?php selected('medium_blog', $instance['blog_display_type']) ?>><?php esc_html_e('Medium Blog', $petstore_plugin_name) ?></option>
        <option value="masonry" <?php selected('masonry', $instance['blog_display_type']) ?>><?php esc_html_e('Masonry Blog', $petstore_plugin_name) ?></option>
      </select>
    </p>         
    <p class="three_fourth_last">
      <label for="<?php echo $this->get_field_id('blog_category') ?>">    <?php _e('Enter Blog Category IDs',$petstore_plugin_name) ?>   </label>
          <input type="text" name="<?php echo $this->get_field_name('blog_category') ?>" id="<?php echo $this->get_field_id('blog_category') ?>" class="widefat" value="<?php echo $instance['blog_category'] ?>" />
     <em><strong style="color:green;"><?php _e('Available Categories and IDs : ',$petstore_plugin_name); ?> </strong> <?php echo implode(',', $blog_cat_name); ?></em><br />
      <stong><?php _e('Note:',$petstore_plugin_name); ?></strong><?php _e('Separate IDs with commas only',$petstore_plugin_name); ?></stong>
    </p>
    </div>
    <div class="input-elements-wrapper">
    <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('blog_posts_order_by') ?>"><?php _e('Orderby',$petstore_plugin_name)?></label>
        <select id="<?php echo $this->get_field_id('blog_posts_order_by') ?>" name="<?php echo $this->get_field_name('blog_posts_order_by') ?>">
        <option value="date" <?php selected('date', $instance['blog_posts_order_by']) ?>>
          <?php esc_html_e('Date', $petstore_plugin_name) ?></option>
       <option value="menu_order" <?php selected('menu_order', $instance['blog_posts_order_by']) ?>>
        <?php esc_html_e('Menu Order', $petstore_plugin_name) ?></option>
        <option value="title" <?php selected('title', $instance['blog_posts_order_by']) ?>>
          <?php esc_html_e('Title', $petstore_plugin_name) ?></option>
        <option value="rand" <?php selected('rand', $instance['blog_posts_order_by']) ?>>
          <?php esc_html_e('Random', $petstore_plugin_name) ?></option>
        <option value="author" <?php selected('author', $instance['blog_posts_order_by']) ?>>
          <?php esc_html_e('Author', $petstore_plugin_name) ?></option>
      </select>
    </p>
    <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('blog_posts_order') ?>"><?php _e('Order',$petstore_plugin_name)?></label>
      <select id="<?php echo $this->get_field_id('blog_posts_order') ?>" name="<?php echo $this->get_field_name('blog_posts_order') ?>">
       <option value="DESC" <?php selected('DESC', $instance['blog_posts_order']) ?>><?php esc_html_e('Descending', $petstore_plugin_name) ?></option> 
      <option value="ASC" <?php selected('ASC', $instance['blog_posts_order']) ?>><?php esc_html_e('Ascending', $petstore_plugin_name) ?></option>
    </select>
  </p>
  </div>
   <div class="input-elements-wrapper">     
        <p class="one_fourth">
            <label for="<?php echo $this->get_field_id('content_limit') ?>"><?php _e('Post Content Limit',$petstore_plugin_name)?></label>
            <input type="text" class="small-text" id="<?php echo $this->get_field_id('content_limit') ?>" name="<?php echo $this->get_field_name('content_limit') ?>" value="<?php echo $instance['content_limit']; ?>" />
        </p>
        <p class="one_fourth">
            <label for="<?php echo $this->get_field_id('readmore_button_text') ?>"><?php _e('Readmore Button Text',$petstore_plugin_name)?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('readmore_button_text') ?>" name="<?php echo $this->get_field_name('readmore_button_text') ?>" value="<?php echo $instance['readmore_button_text']; ?>" />
        </p>
    </div>
    <div class="input-elements-wrapper">
      <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('posts_bg_color') ?>"><?php _e('Posts Background  Color',$petstore_plugin_name)?></label>
        <input type="text" class="blog_color_pickr" id="<?php echo $this->get_field_id('posts_bg_color') ?>" name="<?php echo $this->get_field_name('posts_bg_color') ?>" value="<?php echo $instance['posts_bg_color']; ?>" />
      </p>
     <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('posts_border_color') ?>"><?php _e('Posts Background Border  Color',$petstore_plugin_name)?></label>
        <input type="text" class="blog_color_pickr" id="<?php echo $this->get_field_id('posts_border_color') ?>" name="<?php echo $this->get_field_name('posts_border_color') ?>" value="<?php echo $instance['posts_border_color']; ?>" />
     </p>
     <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('title_color') ?>"><?php _e('Posts Title  Color',$petstore_plugin_name)?>
        </label>
        <input type="text" class="blog_color_pickr" id="<?php echo $this->get_field_id('title_color') ?>" name="<?php echo $this->get_field_name('title_color') ?>" value="<?php echo $instance['title_color']; ?>" />
    </p>
      <p class="one_fourth_last">
          <label for="<?php echo $this->get_field_id('title_hover_color') ?>"><?php _e('Posts Title Hover Color',$petstore_plugin_name)?></label>
          <input type="text" class="blog_color_pickr" id="<?php echo $this->get_field_id('title_hover_color') ?>" name="<?php echo $this->get_field_name('title_hover_color') ?>" value="<?php echo $instance['title_hover_color']; ?>" />
      </p>
      <p class="one_fourth" style="clear:both;">
          <label for="<?php echo $this->get_field_id('posts_link_color') ?>"><?php _e('Posts Meta Links Color',$petstore_plugin_name)?></label>
          <input type="text" class="blog_color_pickr" id="<?php echo $this->get_field_id('posts_link_color') ?>" name="<?php echo $this->get_field_name('posts_link_color') ?>" value="<?php echo $instance['posts_link_color']; ?>" />
      </p>
      <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('posts_link_hover_color') ?>"><?php _e('Posts Meta Links Hover Color',$petstore_plugin_name)?></label>
          <input type="text" class="blog_color_pickr" id="<?php echo $this->get_field_id('posts_link_hover_color') ?>" name="<?php echo $this->get_field_name('posts_link_hover_color') ?>" value="<?php echo $instance['posts_link_hover_color']; ?>" />
      </p>

      <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('posts_meta_icons_color') ?>"><?php _e('Posts Meta Icons Color',$petstore_plugin_name)?></label>
          <input type="text" class="blog_color_pickr" id="<?php echo $this->get_field_id('posts_meta_icons_color') ?>" name="<?php echo $this->get_field_name('posts_meta_icons_color') ?>" value="<?php echo $instance['posts_meta_icons_color']; ?>" />
      </p>

      <p class="one_fourth_last" >
          <label for="<?php echo $this->get_field_id('content_color') ?>"><?php _e('Posts Content Color',$petstore_plugin_name)?></label>
          <input type="text" class="blog_color_pickr" id="<?php echo $this->get_field_id('content_color') ?>" name="<?php echo $this->get_field_name('content_color') ?>" value="<?php echo $instance['content_color']; ?>" />
      </p>         
   </div>
  <div class="input-elements-wrapper">
    <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('post_limit') ?>"><?php _e('Display Posts Per Page',$petstore_plugin_name)?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id('post_limit') ?>" name="<?php echo $this->get_field_name('post_limit') ?>" value="<?php echo $instance['post_limit']; ?>" />
    </p>
     <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('disable_pagination') ?>"> <?php _e('Disable Pagination',$petstore_plugin_name) ?> </label>
      <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("disable_pagination"); ?>" name="<?php echo $this->get_field_name("disable_pagination"); ?>"<?php checked( (bool) $instance["disable_pagination"], true ); ?> />
    </p>
  </div>
     <?php  }
 }
 petstore_kaya_register_widgets('blog', __FILE__);
 ?>