<?php
$root = dirname(dirname(dirname(dirname(dirname(__FILE__)))));
if ( file_exists( $root.'/wp-load.php' ) ) {
    require_once( $root.'/wp-load.php' );
//    require_once( $root.'/wp-config.php' );
}
header('Content-type: application/x-javascript');
//function kaya_custom_js(){
global $post;
	$upload_top_bar = get_option('upload_top_bar');
	$top_bar_bg_color = get_option( 'top_bar_bg_color' ) ? get_option( 'top_bar_bg_color' ) : ''; 
	 $header_bg_color = get_option('header_bg_color') ? get_option('header_bg_color') : '' ;
	  $header_border_bottom = get_option('header_border_bottom') ? get_option('header_border_bottom') : '' ;
	 $upload_header = get_option('upload_header');
	 $upload_header_val = $upload_header['bg_image'];
	if( !empty($header_bg_color) || !empty($upload_header_val) || !empty($header_border_bottom) ): ?>
	jQuery('.sub_header_wrapper').addClass('page_title_bg');
	<?php endif; ?>
	// Shopping Cart Icon

jQuery('.panel-row-style').parent().addClass("panel-row-style-parent");
