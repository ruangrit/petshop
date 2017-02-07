<?php
// global variables
global $more;
$more='0';
 echo '<div class="blog_post_wrapper">';
$kaya_readmore_blog=get_theme_mod('kaya_readmore_blog') ? get_theme_mod('kaya_readmore_blog')  : 'Read More';
$blog_post_date_title_color = get_theme_mod('blog_post_date_title_color') ? get_theme_mod('blog_post_date_title_color') : '#ffffff';
$blog_post_date_bg_color = get_theme_mod('blog_post_date_bg_color') ? get_theme_mod('blog_post_date_bg_color') : '#de4a4a';
 while ( have_posts() ) : the_post();
 ?>
  <!-- Start While Loop here -->
  <article <?php post_class('standard-blog'); ?> >
          <?php 
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
        echo '<div class="post_title_wrapper">';
          echo '<div class="blog_post_format_icon"> <i class="fa fa-'.$iocn.'"> </i></div>';
          the_title( '<h2 class="blog_post_title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
          <span class="post_by" style="" ><i class="fa fa-user">&nbsp; </i> <?php _e('By ','petstore'); ?> <?php the_author_posts_link(); ?></span>
        <?php echo '</div>'; 
          $img_url = wp_get_attachment_url( get_post_thumbnail_id() );
          if(has_post_format()){
			$class = '';
            get_template_part( 'formates/'.get_post_format() );
          }else{
            if(has_post_thumbnail()){
				$class="featured_image_with_desc";
             // $params = array('width' => '1160', 'height' => '650', 'crop' => true);
              echo '<div class="post_image">';
                echo '<a href="'.get_the_permalink().'">';
                 // echo '<img src="'.kaya_thumb($img_url, 1160, 650, 't').'" class="" alt="'.get_the_title().'" />';  
					echo '<img src="'.kaya_thumb($img_url, '', '', 't').'" class="" alt="'.get_the_title().'" />';  	
				echo '</a>';
              echo '</div>';
            }else{
				$class="no_featured_image_with_desc";
			}
          } 
      if( has_post_format('link') || has_post_format('quote')  ){ }else{ ?>
        <div class="description <?php echo $class; ?> ">
        <div class="post_content_warpper">
          <div class="post_title_info"> 
            <?php //if( $instance['disable_post_meta_desc'] != 'on') : ?>
            <div class="blog_post_meta">
               <span class=""><i class="fa fa-calendar">&nbsp;</i> <?php echo the_date(get_option('date-formate')); ?></span>
              <span  class="comment_color"><i class="fa fa-comments">&nbsp;</i> <?php comments_popup_link(__('0 Comments','petstore' ), __( '1 Comment', 'petstore' ), __( '% Comments', 'petstore' ) ); ?></span> 
              <span class="post_category"><i class="fa fa-tags">&nbsp;</i> <?php the_category(','); ?></span> 
              <?php  //if( !has_post_thumbnail() ){ ?>              
                <?php //} ?>
            </div>
          </div>
        </div> 
        <p><?php  echo strip_tags(the_content( $kaya_readmore_blog )); ?></p>
       <!-- <a href="<?php //echo the_permalink(); ?>" class="readmore"><?php //echo $kaya_readmore_blog; ?></a> -->
         <?php  ?>
        </div> 
       <?php } ?> 
    </article>
  <?php  // Comment Section
  $commentsection = get_post_meta( $post->ID, 'commentsection', true );
  if( $commentsection != "on") {
    comments_template( '', true );
  } ?>
  <?php endwhile; // End the loop. While. ?>
</div>
  <?php /* Display navigation to next/previous pages when applicable */ ?>
  <?php echo kaya_pagination(); ?>
