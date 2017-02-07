<?php
// juqery and css loads
add_action('wp_enqueue_scripts', 'kaya_jquery_scripts');
if( !function_exists('kaya_jquery_scripts') ){
	function kaya_jquery_scripts()
	{
		global $post_item_id, $post;
		if( class_exists('woocommerce') ){
            if( is_shop() ){
    			$select_page_options=get_post_meta( woocommerce_get_page_id( 'shop' ),'select_page_options',true);
            }else{ if( get_post() ) { $select_page_options=get_post_meta(get_the_ID(),'select_page_options',true); } else{ $select_page_options = ''; } }
        }elseif( is_page()){
            $select_page_options=get_post_meta($post->ID,'select_page_options',true);
        }else{
            $select_page_options = '';
        }	
		wp_enqueue_script("jquery");
	 	wp_enqueue_style('css_font_awesome', get_template_directory_uri() . '/css/font-awesome.css', false, '3.0', 'all');
		wp_localize_script( 'jquery', 'wppath', array('template_path' => get_template_directory_uri('template_directory')));
		wp_register_script( 'jquery_easing', get_template_directory_uri() .'/js/jquery.easing.1.3.js',array(),'', true);	 // Easing	
		wp_enqueue_style('css_prettyphoto', get_template_directory_uri().'/css/prettyPhoto.css',false, '', 'all');
		wp_enqueue_script('jquery_prettyphoto', get_template_directory_uri() .'/js/jquery.prettyPhoto.js',array(),'', true); // for fancybox  script
		//wp_enqueue_style('css_Isotope', get_template_directory_uri().'/css/Isotope.css',false, '', 'all');
		if( $select_page_options == 'page_slider_setion'){
			wp_enqueue_script('jquery_owlcarousel', get_template_directory_uri() .'/js/owl.carousel.min.js',array(),'', true);
		}
		if( $select_page_options == 'video_bg'){
			wp_enqueue_script('mb.YTPlayer', get_template_directory_uri() .'/js/jquery.mb.YTPlayer.js',array(),'', true); // for ytp Player
			//wp_enqueue_script( 'mediaelement');	 // Video
		}
		wp_enqueue_script('jquery_owlcarousel', get_template_directory_uri() .'/js/owl.carousel.min.js',array(),'', true);
		if(is_single() || is_author() || is_category() || is_home() || is_archive()){
		    wp_enqueue_style('css_Isotope', get_template_directory_uri().'/css/Isotope.css',false, '', 'all');
		    wp_enqueue_script('jquery.isotope', get_template_directory_uri() .'/js/jquery.isotope.min.js',array(),'', true);
		}
		if( is_tax() ){
			wp_enqueue_style('css_Isotope', get_template_directory_uri().'/css/Isotope.css',false, '', 'all');
			wp_enqueue_script('jquery.isotope', get_template_directory_uri() .'/js/jquery.isotope.min.js',array(),'', true);
		}
		if( class_exists('woocommerce')){
			wp_enqueue_style('kaya_woocommerce', get_template_directory_uri().'/css/kaya_woocommerce.css',false, '', 'all');
			wp_enqueue_script('jquery.isotope', get_template_directory_uri() .'/js/jquery.isotope.min.js',array(),'', true);
			if(is_product()){
			    wp_enqueue_script( 'cloud-zoom', get_template_directory_uri() .'/js/cloud-zoom.1.0.2.min.js',array(),'', true);
			}
		}
		//smartmenu files
		wp_enqueue_script('jquery-jquery.smartmenus', get_template_directory_uri() .'/js/jquery.smartmenus.js',array(),'', true);
		wp_enqueue_style('css_sm-blue', get_template_directory_uri().'/css/sm-blue.css',false, '', 'all');
		wp_enqueue_style('css_sm-core-css', get_template_directory_uri().'/css/sm-core-css.css',false, '', 'all');
		//end
		wp_enqueue_script('jquery-custom', get_template_directory_uri() .'/js/custom.js',array(),'', true);
		wp_enqueue_script('kaya_custom_js', get_template_directory_uri() .'/js/kaya_custom_js.php',array(),'', true);// Php with js
		global $is_IE; // IE
	    if( $is_IE ) {
			wp_enqueue_script('jquery-html5', get_template_directory_uri() .'/js/html5.js',array(),'', true);
		}
	}
}
//Styles
add_action('wp_enqueue_scripts', 'kaya_css_styles');
if( !function_exists('kaya_css_styles') ){
	function kaya_css_styles() {
		global $wp_styles;
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
		}
		wp_enqueue_style( 'globel-style', get_stylesheet_uri(), array() );
		//wp_enqueue_style('rtl', get_template_directory_uri() . '/rtl.css',true, '', 'all');
		wp_enqueue_style('sliders', get_template_directory_uri() . '/css/sliders.css',true, '1.0', 'all');
		//wp_enqueue_style('css_slidemenu', get_template_directory_uri() . '/css/menu.css', true , '', 'all');
		//wp_enqueue_style('mediaelementplayer', get_template_directory_uri() . '/css/mediaelementplayer.css', true , '', 'all');
		wp_enqueue_style('typography', get_template_directory_uri() . '/css/typography.css', true , '', 'all');
		wp_enqueue_style('blog_style', get_template_directory_uri() . '/css/blog_style.css', true , '', 'all');
		wp_enqueue_style('widgets/css', get_template_directory_uri() . '/css/widgets.css', true , '', 'all');
		wp_enqueue_style('layout', get_template_directory_uri() . '/css/layout.css', true , '', 'all');
		wp_register_style('css_responsive', get_template_directory_uri() . '/css/responsive.css', true, '3.0', 'all');
		$responsive_mode = get_theme_mod( 'responsive_layout_mode' ) ? get_theme_mod( 'responsive_layout_mode' ) : 'on';
		if($responsive_mode == "on"){
			wp_enqueue_style('css_responsive');
		} 
			wp_enqueue_style( 'globel-ie', get_template_directory_uri() . '/css/ie9_down.css', array( 'globel-style' ) );
			$wp_styles->add_data( 'globel-ie', 'conditional', 'gt IE 8' );
		}
}	
//Admin script
add_action('admin_enqueue_scripts', 'kaya_admin_scripts');
if( !function_exists('kaya_admin_scripts') ){
	function kaya_admin_scripts()
	{
		wp_enqueue_script('kaya_custommeta', get_template_directory_uri() .'/js/kaya_custommeta.js');
	}
}
// Customizer
if( !function_exists('theme_customizer_js') ){
	function theme_customizer_js(){
		wp_enqueue_media();
		wp_enqueue_script('jquery_theme-customizer', get_template_directory_uri() .'/js/theme-customizer.js',array(),'', true);
		wp_enqueue_style('customizer_styles', get_template_directory_uri() . '/css/customizer_styles.css', false, '', 'all');
		wp_enqueue_script( 'customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '', true );
	}
}
add_action( 'customize_controls_enqueue_scripts', 'theme_customizer_js',100 );
if( !function_exists('globel_customize_preview_js') ){
	function globel_customize_preview_js() {
		wp_enqueue_script( 'customizer', get_template_directory_uri() . '/js/customizer.js', array( 'jquery', 'customize-preview' ), '' , true );
	}
}
add_action( 'customize_preview_init', 'globel_customize_preview_js' );
//add_action( 'customize_preview_init' , array( 'globel_customize_preview_js' , 'live_preview' ) );
//add_action( 'customize_controls_enqueue_scripts', 'globel_customize_preview_js' );
?>