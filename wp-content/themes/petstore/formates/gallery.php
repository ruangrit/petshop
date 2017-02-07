<script type="text/javascript">
(function($) {
  "use strict";
	$(function() {	
		$('.gllery_slider').owlCarousel({
			nav:false,
		    loop : true,
		    navText: [ '', '' ],
		    autoPlay : true,
		    stopOnHover : true,
		    items :1,
			autoHeight : true,
			animateOut: 'fadeOut',
			animateIn: 'fadeIn',
		});
});
})(jQuery);
</script>	
	<?php echo '<div class="blog_single_img ">'; 
$meta = get_post_meta($post->ID, 'post_gallery', false );
$blog_single_page_sidebar = get_theme_mod( 'blog_single_page_sidebar' ) ? get_theme_mod( 'blog_single_page_sidebar' ): 'fullwidth';
	$kaya_gallery_slider = get_post_meta($post->ID, 'kaya_gallery_slider', true );
	$gallery_slider = ( $kaya_gallery_slider == '1' ) ? 'gllery_slider' : 'blog-isotope-container isotope_gallery';
	$img_width = ( $kaya_gallery_slider == '1' ) ? 1160 : '397';
	if( $blog_single_page_sidebar == 'fullwidth' ){
		$image_size = '1160';
	}else{
		$image_size = '720';
	}
//print_r($meta);
	if ( !is_array( $meta ) )
	$meta = ( array ) $meta;
	if ( !empty( $meta ) ) {
	if(count($meta) > 1 ){
			echo '<div class="post_image gllery_slider clearfix ">';
			foreach ( $meta as $att ) {
				$src = wp_get_attachment_image_src( $att, '' );
				$src = $src[0];
			echo "<div>" ?>
	<?php //$params = array('width' => $img_width, 'height' => '650', 'crop' => true); ?>
	<a rel="prettyPhoto[gallery]" href='<?php echo "$src"; ?>' class="" title="">
		<img src='<?php echo kaya_thumb($src, $image_size, 450, "t"); ?>' />
	</a>
		<?php 
		echo '<div class="blog_post_icons">';
			    echo '<a class="" data-gal="prettyPhoto" href="'.$src.'" ><i class="fa fa-camera"></i></a>';
			    echo '<a class="" href="'.get_the_permalink().'"><i class="fa fa-link"></i></a>';
		echo '</div>';
		echo '</div>';
		}
		echo '</div>';
		} else{
				foreach ( $meta as $att ) {
			$src = wp_get_attachment_image_src( $att, '' );
				$src = $src[0]; ?>
				<a rel="prettyPhoto[gallery]" href='<?php echo "{$src}"; ?>' class="" title="">
					<img src='<?php echo kaya_thumb($src, $image_size, 450, "t"); ?>' />
				<?php echo "</a>";
			}			
		} 
	} ?>
