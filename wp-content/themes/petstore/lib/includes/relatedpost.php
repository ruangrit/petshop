<?php
if( !function_exists('kaya_relatedpost') ){
	function kaya_relatedpost($postid)
	{	
	global $post;
	//$kaya_readmore_portfolio=$options['kaya_readmore_portfolio'] ? $options['kaya_readmore_portfolio'] : 'Read More';
	$tags = wp_get_post_tags($postid);
	if ($tags) {
	$tag_ids = array();
	foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;

	$args=array(
	'tag__in' => $tag_ids,
	'post_type' => 'portfolio',
	'post__not_in' => array($postid),
	'showposts'=>4,  // Number of related posts that will be shown.
	'ignore_sticky_posts'=>1
	); 
	?>
	<?php
	$my_query = new wp_query($args);
	$kaya_related_projects_text=get_theme_mod('pf_related_post_title') ?  get_theme_mod('pf_related_post_title') :'Related Projects';
	$pf_related_images_height=get_theme_mod('pf_related_images_height') ?  get_theme_mod('pf_related_images_height') :'480';
	$pf_thumbnail_post_link=get_theme_mod('pf_thumbnail_post_link') ?  get_theme_mod('pf_thumbnail_post_link') :'lightbox';
	$pf_disable_title=get_theme_mod('pf_disable_title') ?  get_theme_mod('pf_disable_title') :'0';
	$pf_disable_cateogy=get_theme_mod('pf_disable_cateogy') ?  get_theme_mod('pf_disable_cateogy') :'0';
	$pf_posts_img_bg_color=get_theme_mod('pf_posts_img_bg_color') ?  get_theme_mod('pf_posts_img_bg_color') :'#000';
	$pf_posts_title_color=get_theme_mod('pf_posts_title_color') ?  get_theme_mod('pf_posts_title_color') :'#ffffff';
	$pf_posts_category_color=get_theme_mod('pf_posts_category_color') ?  get_theme_mod('pf_posts_category_color') :'#ffffff';
	$pf_related_title_color=get_theme_mod('pf_related_title_color') ?  get_theme_mod('pf_related_title_color') :'#333333';
	if( $my_query->have_posts() ) {
			echo '<div id="relatedposts">';
			echo '<div class="relatedpost_title">';
				echo '<h3 style="color:'.$pf_related_title_color.'">'.$kaya_related_projects_text.'</h3>
			</div>';
			echo '<div class="portfolio_extra grid clearfix" id="related_post_slider">';
				while ($my_query->have_posts()) {
					$my_query->the_post();
				$imgurl=wp_get_attachment_url( get_post_thumbnail_id() );
							$pf_lightbox =  $imgurl ? $imgurl : get_template_directory_uri().'/images/defult_featured_img.png';
							$video_url= get_post_meta($post->ID,'video_url',true);
					        $lightbox_type = $video_url ? trim($video_url) : $pf_lightbox;
					        $class = $video_url ? 'link_to_video' : 'link_to_image';
					//if ( has_post_thumbnail() ) { 
					$terms = get_the_terms(get_the_ID(), 'portfolio_category');
					$terms_slug = array();
					$terms_name = array();
					if($terms ){
					foreach ($terms as $term) {
						$terms_slug[] = $term->slug;
						$terms_name[] = $term ->name;
					}
				}else{
					$terms_name[] = 'Uncategorized';
				}  
		switch ($pf_thumbnail_post_link) {
	      case 'lightbox':
	        $link_url = $lightbox_type;
	        $rel = 'data-gal="prettyPhoto[pf_gallery]"';
	        break;
	      case 'post':
	        $link_url = get_permalink();
	        $rel = '';
	        break;
	      case 'none':
	        $link_url = '';
	        $rel = '';
	        break;
	      default:
	        $link_url = $lightbox_type;
	        $rel = 'rel="prettyPhoto[pf_gallery]"';
	        break;
	    }
	    $pf_bottom_title=get_theme_mod('pf_bottom_title') ?  get_theme_mod('pf_bottom_title') :'0';
				?>
				<?php if(  $pf_thumbnail_post_link != 'none'){ ?>
					<a class=" " <?php echo $rel; ?> href="<?php echo $link_url; ?>">
				<?php } ?>
	                <div class="pf_image_wrapper" style="background-color:<?php echo $pf_posts_img_bg_color; ?>">
						<?php $img_url=wp_get_attachment_url( get_post_thumbnail_id() );
						if( !empty($img_url) ){
							echo "<img src='". kaya_thumb($img_url, '600', $pf_related_images_height, 't') ."' alt='' />"; 
						}else{
							echo '<img src="http://placehold.it/400x350">';
						}  ?>
						<?php
						if( $pf_bottom_title != '1'){ 
						 if( $pf_disable_title != '1'  || $pf_disable_cateogy != '1'  ): ?>
						<div class="figcaption">
							<div class="pf_title_wrapper">
								<?php if($pf_disable_title != '1' ): ?><h2 style="color:<?php echo $pf_posts_title_color; ?>"><?php echo the_title(); ?></h2> <?php endif; ?>
								<?php if($pf_disable_cateogy != '1' ): ?><p style="color:<?php echo $pf_posts_category_color; ?>"><?php echo implode(',', $terms_name); ?></p><?php endif; ?>
							</div>
						</div>
					<?php endif; 
				} ?>				
				</div>
				<?php if( $pf_bottom_title == '1'){ ?>
						<?php if( $pf_disable_title != '1'  || $pf_disable_cateogy != '1'  ): ?>
							<div class="pf_bottom_title_wrapper">
								<?php if($pf_disable_title != '1' ): ?>
								<h3 style="color:<?php echo $pf_posts_title_color; ?>"><?php echo the_title(); ?></h3> <?php endif; ?>
								<?php if($pf_disable_cateogy != '1' ): ?>
								<p style="color:<?php echo $pf_posts_category_color; ?>"><?php echo implode(',', $terms_name); ?></p><?php endif; ?>
							</div>
						<?php endif; } ?>
				<?php if(  $pf_thumbnail_post_link != 'none'){ ?>
					</a>
				<?php } ?>
				<?php 	//}
				}
		echo '</div>';echo '</div>';
	}
	}
	$backup='';
	$post = $backup;
	wp_reset_query();
	}
}	
?>