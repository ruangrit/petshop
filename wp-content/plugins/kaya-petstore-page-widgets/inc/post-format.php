<?php 
global $post;
if( !function_exists('gallery_format')  ){
function gallery_format($post, $class){
	$blog_single_page_sidebar = get_theme_mod( 'blog_single_page_sidebar' ) ? get_theme_mod( 'blog_single_page_sidebar' ): 'fullwidth';
	if( $class == "one_half" ){
		$width="600";
	}else{
		$width="1160";
	}	
 echo '<div class="single_img '.$class.'">'; 
	$meta = get_post_meta($post->ID, 'post_gallery', false );
	$kaya_gallery_slider = get_post_meta($post->ID, 'kaya_gallery_slider', true );
	$gallery_slider = 'gllery_slider';
	$img_width = '1100';
	$kaya_image_streatch = get_post_meta($post->ID, 'kaya_image_streatch', true );

	//print_r($meta);
	if ( !is_array( $meta ) )
	$meta = ( array ) $meta;
	if ( !empty( $meta ) ) {
	if(count($meta) > 1 ){
			echo '<div class="'.$gallery_slider .' clearfix ">';
			foreach ( $meta as $att ) {
				$src = wp_get_attachment_image_src( $att, '' );
				$src = $src[0];
			echo "<div>" ?>
	<?php //$params = array('width' => $img_width, 'height' => '600', 'crop' => true);?>
	<!-- <a rel="prettyPhoto[gallery]" href='<?php //echo "{$src}"; ?>' class="" title=""> -->
	<?php 
	echo "<a href='".get_the_permalink()."'><img src=".kaya_image_resize($src, $width, 500, 't')." alt='".get_the_title()."' /></a>"; ?>
	<!-- </a> -->
	<div class="blog_post_icons">
		<a class="" data-gal="prettyPhoto[gallery12]" href='<?php echo "{$src}" ?>' ><i class="fa fa-camera"></i></a>
		<a class="" href="<?php echo  get_the_permalink(); ?>"><i class="fa fa-link"></i></a>
		<?php echo '</div>';
		 echo '</div>';
		}
		echo '</div>';
		 
		} else{
				foreach ( $meta as $att ) {
			$src = wp_get_attachment_image_src( $att, '' );
				$src = $src[0]; ?>
				<!--<a rel="prettyPhoto[gallery]" href='<?php //echo "{$src}"; ?>' class="" title="">-->
				<?php echo "<a href='".get_the_permalink()."'><img src=".kaya_image_resize($src, $width, 500, 't')." alt='".get_the_title()."' />"; 
				echo '</a>';
			}			
		} 
	}
						
	echo '</div>';				
}
}
if( !function_exists('video_format') ){
function video_format($post, $class){
	echo '<div class="single_img '.$class.'">'; 
		$video = get_post_meta( get_the_ID(), 'post_video', true ); 
		echo trim( $video );
	echo '</div>';	
}
}
if( !function_exists('standard_format') ){
function standard_format($class, $img_url){
	if( $class == "one_half" ){
		$width="600";
	}else{
		$width="1160";
	}
	echo '<div class="post_image '.$class.'">';
		//echo '<a href="'.get_the_permalink().'">';
	   	 echo '<a href='.get_the_permalink().'><img src="'.kaya_image_resize($img_url, $width, 500, 't').'" class="" alt="'.get_the_title().'" /></a>';  
	   // echo '</a>';
	    echo '<div class="blog_post_icons">';
		    echo '<a class="" data-gal="prettyPhoto" href="'.$img_url.'" ><i class="fa fa-camera"></i></a>';
		    echo '<a class="" href="'.get_the_permalink().'"><i class="fa fa-link"></i></a>';
		echo '</div>';    
    echo '</div>';
}
}
if( !function_exists('quote_format') ){
function quote_format($title_color, $class){
	global $petstore_plugin_name;
	$source = get_post_meta(get_the_ID(), 'kaya_quote_desc', true);
	echo '<div class="quote_format '.$class.'">';
	echo '<i class="fa fa-quote-right"></i>';
	echo '<div class="quote_format_text">';
	echo '<div class="blog_post_meta">'; ?>
		<span  class="comment_color"><i class="fa fa-comments">&nbsp; </i> <?php comments_popup_link(__('0 Comments',$petstore_plugin_name), __( '1 Comment', $petstore_plugin_name ), __( '% Comments', $petstore_plugin_name) ); ?>
		</span> 
		<span class="post_category"><i class="fa fa-tags">&nbsp; </i> <?php the_category(','); ?></span> 
		<span class=""><i class="fa fa-calendar">&nbsp; </i> <?php echo the_date(get_option('date-formate')); ?></span>
   <?php  echo '</div>';
	echo '<p>'.$source.'</p>';
	//echo '<h5 style="color:'.$title_color.'">--'.get_the_title().'</h5>';
	echo '</div></div>';
}
}
if( !function_exists('medium_quote_format') ){
function medium_quote_format($title_color, $img_url, $class){
	global $petstore_plugin_name;
	if( $class == "one_half" ){
		$width="600";
	}else{
		$width="1160";
	}
	$source = get_post_meta(get_the_ID(), 'kaya_quote_desc', true);
	if( has_post_thumbnail() ){
		$colums = 'one_half_last';
		echo '<div class="post_image '.$class.'">';
		   	 echo '<img src="'.kaya_image_resize($img_url, $width, 500, 't').'" class="" alt="'.get_the_title().'" />'; 
		   	echo '<div class="blog_post_icons">';
			    echo '<a class="" data-gal="prettyPhoto" href="'.$img_url.'" ><i class="fa fa-camera"></i></a>';
			    echo '<a class="" href="'.get_the_permalink().'"><i class="fa fa-link"></i></a>';
		echo '</div>'; 
	    echo '</div>';
	}else{
		$colums = 'fullwidth';
	}
    echo '<div class="'.$colums.'">';
	echo '<div class="quote_format">';
	echo '<i class="fa fa-quote-right"></i>';
	echo '<div class="quote_format_text">';
	echo '<div class="blog_post_meta">'; ?>
		<span class="post_by"><?php the_author_posts_link(); ?></span>
		<span  class="comment_color"><?php comments_popup_link(__('0 Comments',$petstore_plugin_name ), __( '1 Comment', $petstore_plugin_name ), __( '% Comments', $petstore_plugin_name ) ); ?></span> 
		<span class="post_category"><?php the_category(','); ?></span> 
		 <span class=""><?php echo the_date(get_option('date-formate')); ?></span>
   <?php  echo '</div>';
	echo '<p>'.$source.'</p>';
	echo '<h5 style="color:'.$title_color.'">--'.get_the_title().'</h5>';
	echo '</div></div></div>';
}
}
if( !function_exists('link_format') ){
function link_format($title_color, $class){
	global $petstore_plugin_name;
	$pf_link = get_post_meta(get_the_ID(), 'kaya_link', true);
	echo '<div class="link_format_wrapper '.$class.'">';
	echo '<i class="fa fa-link"></i>';
	echo '<div class="link_format_title">';
	echo '<div class="blog_post_meta">'; ?>
		<span class="post_by"><?php the_author_posts_link(); ?></span>
		<span  class="comment_color"><?php comments_popup_link(__('0 Comments',$petstore_plugin_name ), __( '1 Comment', $petstore_plugin_name ), __( '% Comments', $petstore_plugin_name ) ); ?></span> 
		<span class="post_category"><?php the_category(','); ?></span> 
		<span class=""><?php echo the_date(get_option('date-formate')); ?></span>
   <?php  echo '</div>';
	echo '<h3 style="color:'.$title_color.'"><a style="color:'.$title_color.'" title="Permalink to: '.$pf_link.'" href="'.esc_url($pf_link).'" target="_blank">'.get_the_title().'</a></h3></div>';
	echo '</div>';
}
}
if( !function_exists('image_link_format') ){
function image_link_format( $class,$img_url,$title_color){
	global $petstore_plugin_name;
	if( $class == "one_half" ){
		$width="600";
	}else{
		$width="1160";
	}
	$pf_link = get_post_meta(get_the_ID(), 'kaya_link', true);
	if(has_post_thumbnail() && !empty($img_url) ){
		$colums = 'one_half_last';
		echo '<div class="post_image '.$class.'">';
	   	echo '<img src="'.kaya_image_resize($img_url, $width, 500, 't').'" class="" alt="'.get_the_title().'" />';
	   	 echo '<div class="blog_post_icons">';
		    echo '<a class="" data-gal="prettyPhoto" href="'.$img_url.'" ><i class="fa fa-camera"></i></a>';
		    echo '<a class="" href="'.get_the_permalink().'"><i class="fa fa-link"></i></a>';
		echo '</div>';  
	    echo '</div>';
    }else{
		$colums = 'fullwidth';
	}
    echo '<div class="'.$colums.'">';
	echo '<div class="link_format_wrapper">';
	echo '<i class="fa fa-link"></i>';
	echo '<div class="link_format_title">';
	echo '<div class="blog_post_meta">'; ?>
		<span class="post_by"><?php echo _e('By ',$petstore_plugin_name); ?><?php the_author_posts_link(); ?></span>
		<span  class="comment_color"><?php comments_popup_link(__('0 Comments',$petstore_plugin_name ), __( '1 Comment', $petstore_plugin_name ), __( '% Comments', $petstore_plugin_name ) ); ?></span> 
		<span class="post_category"><?php the_category(','); ?></span> 
		<?php  if( !has_post_thumbnail() ){ ?>  <span class=""><?php echo the_date(get_option('date-formate')); ?></span> <?php } ?>
   <?php  echo '</div>';
	echo '<h3 style="color:'.$title_color.'"><a style="color:'.$title_color.'" title="Permalink to: '.$pf_link.'" href="'.esc_url($pf_link).'" target="_blank">'.get_the_title().'</a></h3></div>';
	echo '</div></div>';
}
}
if( !function_exists('audio_format') ){
function audio_format($class){ 
	$kaya_audio = get_post_meta(get_the_ID(), 'kaya_audio', true); ?>
	<div class="blog_audo_player <?php echo $class; ?>">
		<audio id="format_audo_player" src="<?php echo trim($kaya_audio); ?>" type="audio/mp3" controls="controls"></audio>	
	</div>
<?php }
}
?>