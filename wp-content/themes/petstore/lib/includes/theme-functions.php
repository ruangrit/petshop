<?php
/* These are functions specific to the included option settings and this theme */
/*-----------------------------------------------------------------------------------*/
/* Theme Header Output - wp_head() */
/*-----------------------------------------------------------------------------------*/

/* Add Body Classes for Layout

/*-----------------------------------------------------------------------------------*/
// This used to be done through an additional stylesheet call, but it seemed like
// a lot of extra files for something so simple. Adds a body class to indicate sidebar position.

add_filter('body_class','kaya_body_class');
if( !function_exists('kaya_body_class') ){
    function kaya_body_class($classes) {
    	$shortname =  get_option('kaya_shortname');
    	$layout = get_option($shortname .'_layout');
    	if ($layout == '') {
    		$layout = 'layout-2cr';
    	}
    	$classes[] = $layout;
    	return $classes;
    }
}
/*-----------------------------------------------------------------------------------*/
/* Add Favicon
/*-----------------------------------------------------------------------------------*/
if( !function_exists('favicon') ){
    function favicon() {
      $favicon = get_option('favicon');
      $favi_img_ul = $favicon['favi_img'];
        if ( !empty( $favi_img_ul) ) {
    		echo '<link rel="shortcut icon" href="'.  $favi_img_ul  .'"/>'."\n";
      }
    }
}    
add_action('wp_head', 'favicon');
/*-----------------------------------------------------------------------------------*/
/* Custom CSS
/*-----------------------------------------------------------------------------------*/
if( !function_exists('custom_css') ){
    function custom_css() {
    $kaya_custom_css = get_theme_mod('kaya_custom_css') ? get_theme_mod('kaya_custom_css') : '';
    if($kaya_custom_css)
        {
          echo '<style>';
          echo $kaya_custom_css;
          echo '</style>';
        }
    }
}
add_action('wp_head', 'custom_css');
/*-----------------------------------------------------------------------------------*/
/* Custom JS
/*-----------------------------------------------------------------------------------*/
if( !function_exists('custom_js') ){
    function custom_js() {
        $kaya_custom_js = get_theme_mod('kaya_custom_jquery') ? get_theme_mod('kaya_custom_jquery') : '';
        if($kaya_custom_js)
        {
          echo '<script>';
          echo $kaya_custom_js;
          echo '</script>';
        }
    }
}
add_action('wp_head', 'custom_js');
/*-----------------------------------------------------------------------------------*/
/* Show analytics code in footer */
/*----------------------------------------------------------------------------------

function childtheme_analytics(){
	$shortname =  get_option('kaya_shortname');
	$output = get_option($shortname . '_google_analytics');
	if ( $output <> "" ) 
		echo stripslashes($output) . "\n";
}
add_action('wp_footer','childtheme_analytics');
-----------------------------------------------------------------------------------*/
/* Sub header options  */
/*----------------------------------------------------------------------------------*/
if( !function_exists('kaya_subheader_data') ){
    function kaya_subheader_data(){
    	global $post_item_id, $post;
    	echo  kaya_post_item_id();
        if( class_exists('woocommerce') ){
            if( is_shop() ){
    			$select_page_options=get_post_meta( woocommerce_get_page_id( 'shop' ),'select_page_options',true);
            }else{ if( get_post() ) { $select_page_options=get_post_meta(get_the_ID(),'select_page_options',true); } else{ $select_page_options = ''; } }
        }elseif( is_page()){
            $select_page_options=get_post_meta($post->ID,'select_page_options',true);
        }else{
            $select_page_options = '';
        }
    // Select Page Sub header Options
       if( $select_page_options == 'page_slider_setion'){
    		kaya_image_slider(); 
        }
        elseif($select_page_options=="singleimage"){
    		get_template_part('slider/single','image');
        }
       elseif($select_page_options=="video_bg"){  
    		get_template_part('slider/video');
        }
        elseif($select_page_options == 'page_title_setion'){
    		//if( is_front_page()){ }else{
    			kaya_custom_pagetitle($post->ID); 
    		//} 
    	}
    	elseif($select_page_options == 'none'){
    	}
    	else{
    		if( is_single() || is_tax() || is_archive() ){
    			kaya_custom_pagetitle($post_item_id); 
    		}else{
    		kaya_custom_pagetitle($post_item_id); 
    		}
    	}
    }
}    
add_action('kaya_subheader_data','kaya_subheader_data');
/* -----------------------------------------------------------------------------------------
 Theme Style Color customization 
------------------------------------------------------------------------------------------*/
function kaya_custom_colors(){
	global $post_item_id, $post;
	echo  kaya_post_item_id();
    $theme_img_url = get_template_directory_uri().'/images/';
   // Layout Options
    $body_margin_top = get_theme_mod( 'body_margin_top' ) ? get_theme_mod( 'body_margin_top' ) : '0';
    $body_margin_bottom = get_theme_mod( 'body_margin_bottom' ) ? get_theme_mod( 'body_margin_bottom' ) : '0';
    $body_background_color = get_theme_mod( 'body_background_color' ) ? get_theme_mod( 'body_background_color' ) : '#ffffff';
    $boxed_layout_position = get_theme_mod( 'boxed_layout_position' ) ? get_theme_mod( 'boxed_layout_position' ) : 'center';
    $select_body_background_type = get_theme_mod( 'select_body_background_type' ) ? get_theme_mod( 'select_body_background_type' ) : 'bg_type_color';
    $boxed_layout_shadow = get_theme_mod( 'boxed_layout_shadow' ) ? get_theme_mod( 'boxed_layout_shadow' ) : '0';
    $responsive_layout_mode = get_option( 'responsive_layout_mode' );
    // Header top section 
    $select_top_header_background_type = get_theme_mod('select_top_header_background_type') ? get_theme_mod('select_top_header_background_type') : 'bg_type_color';
    $enable_top_header = get_theme_mod('enable_top_header') ? get_theme_mod('enable_top_header') : '0';
    $upload_top_bar = get_theme_mod('upload_top_bar');
    $top_bar_bg_repeat = get_theme_mod('top_bar_bg_repeat') ? get_theme_mod('top_bar_bg_repeat') : 'repeat';
    $top_bar_bg_color = get_theme_mod( 'top_bar_bg_color' ) ?  $top_bar_bg_color = get_theme_mod( 'top_bar_bg_color' ) : '#2f2f2f';
    $top_bar_text_color = get_theme_mod( 'top_bar_text_color' ) ? get_theme_mod( 'top_bar_text_color' ) :'#333333';
    $top_bar_link_color = get_theme_mod( 'top_bar_link_color' ) ? get_theme_mod( 'top_bar_link_color' ) :'#ffffff';
    $top_bar_link_hover_color = get_theme_mod( 'top_bar_link_hover_color' ) ? get_theme_mod( 'top_bar_link_hover_color' ) :'#F85204';
    $top_bar_icon_color = get_theme_mod( 'top_bar_icon_color' ) ? get_theme_mod( 'top_bar_icon_color' ) :'#F85204';
    $top_bar_icon_hover_color = get_theme_mod( 'top_bar_icon_hover_color' ) ? get_theme_mod( 'top_bar_icon_hover_color' ) :'#000';
    // Header Section
    $logo_margin_top = get_theme_mod( 'logo_margin_top' ) ? get_theme_mod( 'logo_margin_top' ) : '0';
    $logo_margin_bottom = get_theme_mod( 'logo_margin_bottom' ) ? get_theme_mod( 'logo_margin_bottom' ) : '0';
    // Header right Section
    $header_right_content_text_color = get_theme_mod('header_right_content_text_color') ? get_theme_mod('header_right_content_text_color') : '#ffffff' ;
    $header_right_content_link_color = get_theme_mod('header_right_content_link_color') ? get_theme_mod('header_right_content_link_color') : '#F85204' ;
    $header_right_content_link_hover_color = get_theme_mod('header_right_content_link_hover_color') ? get_theme_mod('header_right_content_link_hover_color') : '#ffffff' ;
     // Header Section
    $select_header_background_type = get_theme_mod('select_header_background_type') ? get_theme_mod('select_header_background_type') : 'bg_type_image' ;
    $header_bg_color = get_theme_mod('header_bg_color') ? get_theme_mod('header_bg_color') : '' ;
    $upload_header = get_theme_mod('upload_header');  
    $backgroundbg_repeat = get_theme_mod('backgroundbg_repeat') ? get_theme_mod('backgroundbg_repeat') : 'repeat';
    $header_padding_top_bottom = get_theme_mod('header_padding_top_bottom') ? get_theme_mod('header_padding_top_bottom') : '35' ;
    $header_top_border_color = get_theme_mod('header_top_border_color') ? get_theme_mod('header_top_border_color') : '#19acca';
    $header_left_right_content_color = get_theme_mod('header_left_right_content_color') ? get_theme_mod('header_left_right_content_color') : '#333333' ;
    $mobile_header_bg_color = get_theme_mod('mobile_header_bg_color') ? get_theme_mod('mobile_header_bg_color') : '' ;
    //Border colors
    $header_border_top_color = get_theme_mod('header_border_top_color') ? get_theme_mod('header_border_top_color') : '#454545' ;
    $enable_rgba_color = get_theme_mod('enable_rgba_color') ? get_theme_mod('enable_rgba_color') : '0' ;
    $page_titlebar_border_bottom_color = get_theme_mod('page_titlebar_border_bottom_color') ? get_theme_mod('page_titlebar_border_bottom_color') : '#454545' ;
    $page_titlebar_border_bottom = get_theme_mod('page_titlebar_border_bottom') ? get_theme_mod('page_titlebar_border_bottom') : '0' ;
    $header_border_top = get_theme_mod('header_border_top') ? get_theme_mod('header_border_top') : '0' ;
    // Right Header & Left 
    $sidebar_text_link_color = get_theme_mod('sidebar_text_link_color') ? get_theme_mod('sidebar_text_link_color') :'#333333';
    $sidebar_text_color = get_theme_mod('sidebar_text_color') ? get_theme_mod('sidebar_text_color') : '#ffffff';
    //Page title bar color settings
    $page_title_bar = get_option('page_title_bar');
    $page_title_bg = get_option('page_title_bg');
    $page_title_bar_bg_repeat = get_theme_mod('page_title_bar_bg_repeat') ? get_theme_mod('page_title_bar_bg_repeat') : 'repeat' ;
    $page_title_bg_color = get_theme_mod( 'page_title_bg_color' ) ? get_theme_mod( 'page_title_bg_color' ) : '#e8e8e8';
    $page_titlebar_title_color = get_theme_mod('page_titlebar_title_color') ? get_theme_mod('page_titlebar_title_color') : '#ffffff';
    $title_description_color = get_theme_mod('title_description_color') ? get_theme_mod('title_description_color') : '#ffffff';
   // $bread_crumb_text_color = get_theme_mod( 'bread_crumb_text_color' ) ? get_theme_mod( 'bread_crumb_text_color' ) : '#fff';
	$title_left_right_border=get_post_meta($post_item_id,'title_left_right_border',true) ? get_post_meta($post_item_id,'title_left_right_border',true) :'off';
    $border_bottom = ($title_left_right_border == 'on') ? '' :'padding-bottom:0; margin-bottom:0;';
	// Page title Font & Alignment Section
    $title_font_weight = get_post_meta($post_item_id,'title_font_weight',true);
    $title_font_style = get_post_meta($post_item_id,'title_font_style',true);
    $description_font_weight = get_post_meta($post_item_id,'description_font_weight',true);
    $description_font_style = get_post_meta($post_item_id,'description_font_style',true);
    $paget_title_position=get_post_meta($post_item_id,'paget_title_position',true) ? get_post_meta($post_item_id,'paget_title_position',true) :'center';
    // Page title position	
    // Menu  Section
    $menu_padding_top_bottom =get_theme_mod( 'menu_padding_top_bottom') ? get_theme_mod( 'menu_padding_top_bottom') : '20';
    $menu_links_border_left_color =get_theme_mod( 'menu_links_border_left_color') ? get_theme_mod( 'menu_links_border_left_color') : '';
    $menu_links_border_right_color =get_theme_mod( 'menu_links_border_right_color') ? get_theme_mod( 'menu_links_border_right_color') : '';
    $menu_bar_top_border_color =get_theme_mod( 'menu_bar_top_border_color') ? get_theme_mod( 'menu_bar_top_border_color') : ''; 
    $menu_bar_top_border = $menu_bar_top_border_color ? '1' :'0';
    $menu_links_border_left = $menu_links_border_left_color ? '1' :'0';
    $menu_links_border_right = $menu_links_border_right_color ? '1' :'0';
    $header_logo_position =get_theme_mod( 'header_logo_position') ? get_theme_mod( 'header_logo_position') : 'left';
    $menu_bar_position =get_theme_mod( 'menu_bar_position') ? get_theme_mod( 'menu_bar_position') : 'left'; 
    $menu_margin_top =get_theme_mod( 'menu_margin_top') ? get_theme_mod( 'menu_margin_top') : '0'; 
    $menu_margin_bottom =get_theme_mod( 'menu_margin_bottom') ? get_theme_mod( 'menu_margin_bottom') : '0'; 
    $menubg = get_theme_mod('menubg');
    $menubg_repeat = get_theme_mod('menubg_repeat') ? get_theme_mod('menubg_repeat') : 'repeat' ;
    $menu_bg_active_color = get_theme_mod('menu_bg_active_color') ? get_theme_mod('menu_bg_active_color') : '#c9c9c9' ;
    $menu_link_active_color = get_theme_mod('menu_link_active_color') ? get_theme_mod('menu_link_active_color') : '#333333' ;
    $menu_background_color = get_theme_mod('menu_background_color') ? get_theme_mod('menu_background_color') : '#2f2f2f' ;
    $menu_link_bg_hover_color = get_theme_mod('menu_link_bg_hover_color') ? get_theme_mod('menu_link_bg_hover_color') : '' ;
    $menu_link_color = get_theme_mod('menu_link_color') ? get_theme_mod('menu_link_color') : '' ;
    $menu_icon_color = get_theme_mod('menu_icon_color') ? get_theme_mod('menu_icon_color') : '#ffffff' ;
    $menu_link_hover_text_color = get_theme_mod('menu_link_hover_text_color') ? get_theme_mod('menu_link_hover_text_color') : '#333333';
    $sub_menu_link_color = get_theme_mod('sub_menu_link_color') ? get_theme_mod('sub_menu_link_color') : '#eee';
    $sub_menu_link_hover_color = get_theme_mod('sub_menu_link_hover_color') ? get_theme_mod('sub_menu_link_hover_color') : '#ffffff';
    $sub_menu_bg_color = get_theme_mod('sub_menu_bg_color') ? get_theme_mod('sub_menu_bg_color') : '#2B2B2B';
    $sub_menu_top_border_color = get_theme_mod('sub_menu_top_border_color') ? get_theme_mod('sub_menu_top_border_color') : '';
    $sub_menu_link_hover_bg_color = get_theme_mod('sub_menu_link_hover_bg_color') ? get_theme_mod('sub_menu_link_hover_bg_color') : '#333333';
    $sub_menu_bottom_border_color = get_theme_mod('sub_menu_bottom_border_color') ? get_theme_mod('sub_menu_bottom_border_color') : '#1e1e1e';
    $sub_menu_link_active_color = get_theme_mod('sub_menu_link_active_color') ? get_theme_mod('sub_menu_link_active_color') : '#F85204';
    $sub_menu_active_bg_color = get_theme_mod('sub_menu_active_bg_color') ? get_theme_mod('sub_menu_active_bg_color') : '#333';
    $child_menu_uppercase = get_theme_mod('child_menu_uppercase') ? get_theme_mod('child_menu_uppercase') : '0';
    $main_menu_uppercase = get_theme_mod('main_menu_uppercase') ? get_theme_mod('main_menu_uppercase') : '0';
    $childmenu_uppercase = ( $child_menu_uppercase == '1' ) ? 'uppercase':'normal';
    $mainmenu_uppercase = ( $main_menu_uppercase == '1' ) ? 'uppercase':'normal';
    $sticky_header_bg_color = get_theme_mod( 'sticky_header_bg_color' ) ? get_theme_mod( 'sticky_header_bg_color' ) :'#ffffff';
    $sticky_header_link_color = get_theme_mod( 'sticky_header_link_color' ) ? get_theme_mod( 'sticky_header_link_color' ) :'#333333';
    $sticky_header_link_hover_color = get_theme_mod( 'sticky_header_link_hover_color' ) ? get_theme_mod( 'sticky_header_link_hover_color' ) :'#F85204';
    $select_sticky_background_type = get_theme_mod('select_sticky_background_type') ? get_theme_mod('select_sticky_background_type') : 'bg_type_color' ;
    $upload_sticky_bg_image = get_theme_mod('upload_sticky_bg_image');
    $sticky_background_repeat = get_theme_mod('sticky_background_repeat') ? get_theme_mod('sticky_background_repeat') : 'repeat';
    // different menu color section//
    $menu1_color = get_theme_mod('menu1_color') ? get_theme_mod('menu1_color') : '' ;
    $menu2_color = get_theme_mod('menu2_color') ? get_theme_mod('menu2_color') : '' ;
    $menu3_color = get_theme_mod('menu3_color') ? get_theme_mod('menu3_color') : '' ;
    $menu4_color = get_theme_mod('menu4_color') ? get_theme_mod('menu4_color') : '' ;
    $menu5_color = get_theme_mod('menu5_color') ? get_theme_mod('menu5_color') : '' ;
    $menu6_color = get_theme_mod('menu6_color') ? get_theme_mod('menu6_color') : '' ;
    $menu7_color = get_theme_mod('menu7_color') ? get_theme_mod('menu7_color') : '' ;
    $menu8_color = get_theme_mod('menu8_color') ? get_theme_mod('menu8_color') : '' ;
    $menu9_color = get_theme_mod('menu9_color') ? get_theme_mod('menu9_color') : '' ;
    $menu10_color = get_theme_mod('menu10_color') ? get_theme_mod('menu10_color') : '' ;
    //Page Middle Content color settings
    $page_content_bg = get_theme_mod('page_content_bg');
    $select_page_mid_background_type = get_theme_mod('select_page_mid_background_type') ? get_theme_mod('select_page_mid_background_type') : 'bg_type_color' ;
    $page_content_bg_repeat = get_theme_mod('page_content_bg_repeat') ? get_theme_mod('page_content_bg_repeat') : 'repeat' ;
    $page_bg_color = get_theme_mod('page_bg_color') ? get_theme_mod('page_bg_color') : '';
    $page_titles_color = get_theme_mod('page_titles_color') ? get_theme_mod('page_titles_color') : '#333';
    $page_description_color = get_theme_mod('page_description_color') ? get_theme_mod('page_description_color') : '#787878';
    $page_link_color = get_theme_mod('page_link_color') ? get_theme_mod('page_link_color') : '#333333';
    $page_link_hover_color = get_theme_mod('page_link_hover_color') ? get_theme_mod('page_link_hover_color') : '#F85204 ';
    //Sidebar color settings
    $sidebar_title_color = get_theme_mod('sidebar_title_color') ? get_theme_mod('sidebar_title_color') : '#333';
    $sidebar_link_color = get_theme_mod('sidebar_link_color') ? get_theme_mod('sidebar_link_color') : '#454545';
    $sidebar_link_hover_color = get_theme_mod('sidebar_link_hover_color') ? get_theme_mod('sidebar_link_hover_color') : '#F85204';
    $sidebar_content_color = get_theme_mod('sidebar_content_color') ? get_theme_mod('sidebar_content_color') : '#787878';
    // Accent Color Section
     /* General settings */
     $enable_prettyphoto_socialicons = get_theme_mod('enable_prettyphoto_socialicons') ? get_theme_mod('enable_prettyphoto_socialicons') : '';
    $disable_prettyphoto_thumbnails = get_theme_mod('disable_prettyphoto_thumbnails') ? get_theme_mod('disable_prettyphoto_thumbnails') : '';
    $disable_prettyphoto_post_title = get_theme_mod('disable_prettyphoto_post_title') ? get_theme_mod('disable_prettyphoto_post_title') : '';
    $accent_bg_color = get_theme_mod('accent_bg_color') ? get_theme_mod('accent_bg_color') : '#F85204';
    $accent_text_color = get_theme_mod('accent_text_color') ? get_theme_mod('accent_text_color') : '#ffffff';
    // Buttons Color Section
    $button_bg_color = get_theme_mod('button_bg_color') ? get_theme_mod('button_bg_color') : '';
    $button_bg_text_color = get_theme_mod('button_bg_text_color') ? get_theme_mod('button_bg_text_color') : '#333333';
    $button_bg_hover_color = get_theme_mod('button_bg_hover_color') ? get_theme_mod('button_bg_hover_color') : '';
    $button_hover_text_color = get_theme_mod('button_hover_text_color') ? get_theme_mod('button_hover_text_color') : '#F85204';
    $button_border_color = get_theme_mod('button_border_color') ? get_theme_mod('button_border_color') : '#F85204';
    $button_hover_border_color = get_theme_mod('button_hover_border_color') ? get_theme_mod('button_hover_border_color') : '';
    $button_padding_top_bottom = get_theme_mod('button_padding_top_bottom') ? get_theme_mod('button_padding_top_bottom') : '10';
    $button_padding_left_right = get_theme_mod('button_padding_left_right') ? get_theme_mod('button_padding_left_right') : '15';
    $button_border_radius = get_theme_mod('button_border_radius') ? get_theme_mod('button_border_radius') : '2';

    $button_font_weight = get_theme_mod('button_font_weight') ? get_theme_mod('button_font_weight') : 'normal';
    $button_font_style = get_theme_mod('button_font_style') ? get_theme_mod('button_font_style') : 'normal';
    $button_font_size = get_theme_mod('button_font_size') ? get_theme_mod('button_font_size') : '14';

    // Input fields Color Section
    $input_background_color = get_theme_mod('input_background_color') ? get_theme_mod('input_background_color') : '#EEEEEE';
    $input_text_color = get_theme_mod('input_text_color') ? get_theme_mod('input_text_color') : '#333';
    $input_border_color = get_theme_mod('input_border_color') ? get_theme_mod('input_border_color') : '#f3f3f3';
    $input_error_border_color = get_theme_mod('input_error_border_color') ? get_theme_mod('input_error_border_color') : '#F85204';
    /* Search Box Colors */
    $search_box_bg_color = get_theme_mod('search_box_bg_color') ? get_theme_mod('search_box_bg_color') : '#151515';
    $Search_box_text_color = get_theme_mod('Search_box_text_color') ? get_theme_mod('Search_box_text_color') : '#FFFFFF';
    /* Blog Page */
    $author_meta_comment_bg_color = get_theme_mod('author_meta_comment_bg_color') ? get_theme_mod('author_meta_comment_bg_color') : '#ffffff';
    $author_meta_comment_link_color = get_theme_mod('author_meta_comment_link_color') ? get_theme_mod('author_meta_comment_link_color') : '#353535';
    $author_meta_comment_link_hover_color = get_theme_mod('author_meta_comment_link_hover_color') ? get_theme_mod('author_meta_comment_link_hover_color') : '#F85204';
    $author_meta_comment_text_color = get_theme_mod('author_meta_comment_text_color') ? get_theme_mod('author_meta_comment_text_color') : '#717171';
    $author_meta_comment_border_color = get_theme_mod('author_meta_comment_border_color') ? get_theme_mod('author_meta_comment_border_color') : '#dfdfdf';    
    /* Footer Section */
    $select_footer_background_type = get_theme_mod('select_footer_background_type') ? get_theme_mod('select_footer_background_type') : 'bg_type_color' ;
    $footerbg = get_theme_mod('footerbg');
    $footerbg_repeat = get_theme_mod('footerbg_repeat') ? get_theme_mod('footerbg_repeat') : 'repeat' ;
    $footer_bg_color = get_theme_mod('footer_bg_color') ? get_theme_mod('footer_bg_color') : '';
    $footer_title_color = get_theme_mod('footer_title_color') ? get_theme_mod('footer_title_color') : '#FFFFFF';
    $footer_text_color = get_theme_mod('footer_text_color') ? get_theme_mod('footer_text_color') : '#787878';
    $footer_link_color = get_theme_mod('footer_link_color') ? get_theme_mod('footer_link_color') : '#F85204';
    $footer_link_hover_color = get_theme_mod('footer_link_hover_color') ? get_theme_mod('footer_link_hover_color') : '#FFACAF';
    // Most Footer
     $select_most_footer_background_type = get_theme_mod('select_most_footer_background_type') ? get_theme_mod('select_most_footer_background_type') : 'bg_type_color' ;
    $most_footerbg = get_theme_mod('mostfooterbg');
    $most_footerbg_repeat = get_theme_mod('most_footerbg_repeat') ? get_theme_mod('most_footerbg_repeat') : 'repeat' ;
    $most_footer_bg_color = get_theme_mod('most_footer_bg_color') ? get_theme_mod('most_footer_bg_color') : '';
    $most_footer_text_color = get_theme_mod('most_footer_text_color') ? get_theme_mod('most_footer_text_color') : '#787878';
    $most_footer_link_color = get_theme_mod('most_footer_link_color') ? get_theme_mod('most_footer_link_color') : '#F85204';
    $most_footer_link_hover_color = get_theme_mod('most_footer_link_hover_color') ? get_theme_mod('most_footer_link_hover_color') : '#FFACAF';
    /* Font Family */
    $header_text_logo_font_family = get_theme_mod('header_text_logo_font_family') ? get_theme_mod('header_text_logo_font_family') : 'Arial,Helvetica,sans-serif';
    $text_logo_tagline_font_family = get_theme_mod('text_logo_tagline_font_family') ? get_theme_mod('text_logo_tagline_font_family') : 'Arial,Helvetica,sans-serif';
    $google_body_font=get_theme_mod( 'google_body_font' ) ? get_theme_mod( 'google_body_font') : 'Arial,Helvetica,sans-serif';
    $google_bodyfont= ( $google_body_font == '0' ) ? 'arial' : $google_body_font;
    $google_menu_font=get_theme_mod( 'google_menu_font' ) ? get_theme_mod( 'google_menu_font' ) : 'Arial,Helvetica,sans-serif';
    $google_menufont= ( $google_menu_font == '0' ) ? 'arial' : $google_menu_font;
    $google_general_titlefont=get_theme_mod( 'google_heading_font') ? get_theme_mod( 'google_heading_font' ) : 'Arial,Helvetica,sans-serif';
    $google_generaltitlefont= ( $google_general_titlefont == '0' ) ? 'arial' : $google_general_titlefont;
    /* Font Sizes */
    /* Title Font sizes H1 */
    $h1_title_font_size=get_theme_mod( 'h1_title_fontsize', '' ) ? get_theme_mod( 'h1_title_fontsize', '' ) : '30'; // H1
    $h2_title_font_size=get_theme_mod( 'h2_title_fontsize', '' ) ? get_theme_mod( 'h2_title_fontsize', '' ) : '27'; // H2
    $h3_title_font_size=get_theme_mod( 'h3_title_fontsize', '' ) ? get_theme_mod( 'h3_title_fontsize', '' ) : '19'; // H3
    $h4_title_font_size=get_theme_mod( 'h4_title_fontsize', '' ) ? get_theme_mod( 'h4_title_fontsize', '' ) : '18'; // H4
    $h5_title_font_size=get_theme_mod( 'h5_title_fontsize', '' ) ? get_theme_mod( 'h5_title_fontsize', '' ) : '16'; // H5
    $h6_title_font_size=get_theme_mod( 'h6_title_fontsize', '' ) ? get_theme_mod( 'h6_title_fontsize', '' ) : '12'; // H6
    // Letter Spaceing
    $h1_font_letter_space=get_theme_mod( 'h1_font_letter_space') ? get_theme_mod( 'h1_font_letter_space') : '0'; // H1
    $h2_font_letter_space=get_theme_mod( 'h2_font_letter_space') ? get_theme_mod( 'h2_font_letter_space') : '0'; // H2
    $h3_font_letter_space=get_theme_mod( 'h3_font_letter_space') ? get_theme_mod( 'h3_font_letter_space') : '0'; // H3
    $h4_font_letter_space=get_theme_mod( 'h4_font_letter_space') ? get_theme_mod( 'h4_font_letter_space') : '0'; // H4
    $h5_font_letter_space=get_theme_mod( 'h5_font_letter_space') ? get_theme_mod( 'h5_font_letter_space') : '0'; // H5
    $h6_font_letter_space=get_theme_mod( 'h6_font_letter_space') ? get_theme_mod( 'h6_font_letter_space') : '0'; // H6
    // Font Weight
    $h1_font_weight_bold=get_theme_mod( 'h1_font_weight_bold') ? get_theme_mod( 'h1_font_weight_bold') : 'normal'; // H1
    $h2_font_weight_bold=get_theme_mod( 'h2_font_weight_bold') ? get_theme_mod( 'h2_font_weight_bold') : 'normal'; // H2
    $h3_font_weight_bold=get_theme_mod( 'h3_font_weight_bold') ? get_theme_mod( 'h3_font_weight_bold') : 'normal'; // H3
    $h4_font_weight_bold=get_theme_mod( 'h4_font_weight_bold') ? get_theme_mod( 'h4_font_weight_bold') : 'normal'; // H4
    $h5_font_weight_bold=get_theme_mod( 'h5_font_weight_bold') ? get_theme_mod( 'h5_font_weight_bold') : 'normal'; // H5
    $h6_font_weight_bold=get_theme_mod( 'h6_font_weight_bold') ? get_theme_mod( 'h6_font_weight_bold') : 'normal'; // H6
    // Line height
    $h1_line_height=get_theme_mod( 'h1_line_height') ? get_theme_mod( 'h1_line_height') : '42'; // H1
    $h2_line_height=get_theme_mod( 'h2_line_height') ? get_theme_mod( 'h2_line_height') : '38'; // H2
    $h3_line_height=get_theme_mod( 'h3_line_height') ? get_theme_mod( 'h3_line_height') : '27'; // H3
    $h4_line_height=get_theme_mod( 'h4_line_height') ? get_theme_mod( 'h4_line_height') : '25'; // H4
    $h5_line_height=get_theme_mod( 'h5_line_height') ? get_theme_mod( 'h5_line_height') : '22'; // H5
    $h6_line_height=get_theme_mod( 'h6_line_height') ? get_theme_mod( 'h6_line_height') : '17'; // H6
    // Body & Menu
    $body_font_weight_bold=get_theme_mod( 'body_font_weight_bold') ? get_theme_mod( 'body_font_weight_bold') : 'normal'; // body
    $menu_font_weight=get_theme_mod( 'menu_font_weight') ? get_theme_mod( 'menu_font_weight') : 'normal'; // Menu
    $child_menu_font_weight=get_theme_mod( 'child_menu_font_weight') ? get_theme_mod( 'child_menu_font_weight') : 'normal'; //Child 
    $body_line_height=get_theme_mod( 'body_line_height') ? get_theme_mod( 'body_line_height') : '30'; 
    // Menu Latter Sapcing
    $body_font_letter_space=get_theme_mod( 'body_font_letter_space') ? get_theme_mod( 'body_font_letter_space') : '0'; // H4
    $menu_font_letter_space=get_theme_mod( 'menu_font_letter_space') ? get_theme_mod( 'menu_font_letter_space') : '0'; // H5
    $child_menu_font_letter_space=get_theme_mod( 'child_menu_font_letter_space') ? get_theme_mod( 'child_menu_font_letter_space') : '0'; // H6
    $body_font_size=get_theme_mod( 'body_font_size', '' ) ? get_theme_mod( 'body_font_size', '' ) : '13'; // Body Font Size
    $menu_font_size=get_theme_mod( 'menu_font_size', '' ) ? get_theme_mod( 'menu_font_size', '' ) : '14'; // Body Font Size
    $child_menu_font_size=get_theme_mod( 'child_menu_font_size', '' ) ? get_theme_mod( 'child_menu_font_size', '' ) : '11'; // Body Font Size
    /* Menu TOp */
   /* Woocommerce Color Section */ 
    $menu_bar_cart_icon = get_theme_mod('menu_bar_cart_icon') ? get_theme_mod('menu_bar_cart_icon') : '0';
    $woo_product_details_bg_color = get_theme_mod('woo_product_details_bg_color') ? get_theme_mod('woo_product_details_bg_color') : '';
    $woo_product_border_color = get_theme_mod('woo_product_border_color') ? get_theme_mod('woo_product_border_color') : '';
    $woo_product_title_color = get_theme_mod('woo_product_title_color') ? get_theme_mod('woo_product_title_color') : '';
    $woo_product_title_hover_color = get_theme_mod('woo_product_title_hover_color') ? get_theme_mod('woo_product_title_hover_color') : '';
    $woo_product_description_color = get_theme_mod('woo_product_description_color') ? get_theme_mod('woo_product_description_color') : '';
    $woo_product_rating_color = get_theme_mod('woo_product_rating_color') ? get_theme_mod('woo_product_rating_color') : '';
    $woo_product_price_color = get_theme_mod('woo_product_price_color') ? get_theme_mod('woo_product_price_color') : '';
    $primary_buttons_bg_color = get_theme_mod('primary_buttons_bg_color') ? get_theme_mod('primary_buttons_bg_color') : '#434a54';
    $primary_buttons_text_color = get_theme_mod('primary_buttons_text_color') ? get_theme_mod('primary_buttons_text_color') : '#ffffff';
    $primary_buttons_bg_hover_color = get_theme_mod('primary_buttons_bg_hover_color') ? get_theme_mod('primary_buttons_bg_hover_color') : '#F85204';
    $primary_buttons_text_hover_color = get_theme_mod('primary_buttons_text_hover_color') ? get_theme_mod('primary_buttons_text_hover_color') : '#333333';
	// Woo Seconday Color Section
    $secondary_buttons_bg_color = get_theme_mod('secondary_buttons_bg_color') ? get_theme_mod('secondary_buttons_bg_color') : '#F85204';
    $secondary_buttons_text_color = get_theme_mod('secondary_buttons_text_color') ? get_theme_mod('secondary_buttons_text_color') : '#fff';
    $secondary_buttons_bg_hover_color = get_theme_mod('secondary_buttons_bg_hover_color') ? get_theme_mod('secondary_buttons_bg_hover_color') : '#434a54';
    $secondary_buttons_text_hover_color = get_theme_mod('secondary_buttons_text_hover_color') ? get_theme_mod('secondary_buttons_text_hover_color') : '#333333';
    $woo_elments_colors = get_theme_mod('woo_elments_colors') ? get_theme_mod('woo_elments_colors') : '#F85204';
    $woo_elments_text_colors = get_theme_mod('woo_elments_text_colors') ? get_theme_mod('woo_elments_text_colors') : '';
	// Alert message color section
    $success_msg_bg_color = get_theme_mod('success_msg_bg_color') ? get_theme_mod('success_msg_bg_color') : '#dff0d8';
    $success_msg_text_color = get_theme_mod('success_msg_text_color') ? get_theme_mod('success_msg_text_color') : '#468847';
    $notification_msg_bg_color = get_theme_mod('notification_msg_bg_color') ? get_theme_mod('notification_msg_bg_color') : '#b8deff';
    $notification_msg_text_color = get_theme_mod('notification_msg_text_color') ? get_theme_mod('notification_msg_text_color') : '#333';
    $warning_msg_bg_color = get_theme_mod('warning_msg_bg_color') ? get_theme_mod('warning_msg_bg_color') : '#f2dede';
    $warning_msg_text_color = get_theme_mod('warning_msg_text_color') ? get_theme_mod('warning_msg_text_color') : '#a94442';
    /* Header Postion  Chage Hide / Show */
    $header_position = get_theme_mod('header_position') ? get_theme_mod('header_position') : 'top';
    $sticky_header_position = get_theme_mod('sticky_header_position') ? get_theme_mod('sticky_header_position') : 'top_position';
    // menu border check
    $sub_menu_top_border = $sub_menu_top_border_color ? '3' : '0';
    // Main Slider Dynamic CSS
    $slide_button_color= get_post_meta($post_item_id,'post_slide_button_bg_color',true) ? get_post_meta($post_item_id,'post_slide_button_color',true) : '#ffffff' ;
    $post_slide_button_bg_color= get_post_meta($post_item_id,'post_slide_button_bg_color',true) ? get_post_meta($post_item_id,'post_slide_button_bg_color',true) : '#333333' ;
    $post_slide_button_text_color= get_post_meta($post_item_id,'post_slide_button_text_color',true) ? get_post_meta($post_item_id,'post_slide_button_text_color',true) : '#ffffff' ;

    $post_slide_button_hover_text_color= get_post_meta($post_item_id,'post_slide_button_hover_text_color',true) ? get_post_meta($post_item_id,'post_slide_button_hover_text_color',true) : '#ffffff' ;
    $post_slides_button_hover_bg_color= get_post_meta($post_item_id,'post_slides_button_hover_bg_color',true) ? get_post_meta($post_item_id,'post_slides_button_hover_bg_color',true) : '#333333' ;
    $post_slide_nav_button_bg_color= get_post_meta($post_item_id,'post_slide_nav_button_bg_color',true) ? get_post_meta($post_item_id,'post_slide_nav_button_bg_color',true) : '#333333' ;
    $post_slide_nav_disable= get_post_meta($post_item_id,'post_slide_nav_disable',true) ? get_post_meta($post_item_id,'post_slide_nav_disable',true) : 'true' ;
    $boxed_slider_padding_top= get_post_meta($post_item_id,'boxed_slider_padding_top',true) ? get_post_meta($post_item_id,'boxed_slider_padding_top',true) : '0' ;
    $boxed_slider_padding_bottom= get_post_meta($post_item_id,'boxed_slider_padding_bottom',true) ? get_post_meta($post_item_id,'boxed_slider_padding_bottom',true) : '0' ;
    $enable_boxed_slider= get_post_meta($post_item_id,'enable_boxed_slider',true) ? get_post_meta($post_item_id,'enable_boxed_slider',true) : '0' ;
    $boxed_slider_border_radius= get_post_meta($post_item_id,'boxed_slider_border_radius',true) ? get_post_meta($post_item_id,'boxed_slider_border_radius',true) : '0' ;
    $boxed_slider_border_size= get_post_meta($post_item_id,'boxed_slider_border_size',true) ? get_post_meta($post_item_id,'boxed_slider_border_size',true) : '0' ;
    $boxed_slider_border_color= get_post_meta($post_item_id,'boxed_slider_border_color',true) ? get_post_meta($post_item_id,'boxed_slider_border_color',true) : '#ffffff' ;
    $boxed_slider_bg_color= get_post_meta($post_item_id,'boxed_slider_bg_color',true) ? get_post_meta($post_item_id,'boxed_slider_bg_color',true) : '' ;
	// Print color options / settings in header section start here
    $enable_slider_screen_height=get_post_meta($post_item_id,'enable_slider_screen_height',true);
    $enable_boxed_slider_type=get_post_meta($post_item_id,'enable_boxed_slider',true) ? get_post_meta($post_item_id,'enable_boxed_slider',true) : '0';
    $kaya_slider_height=get_post_meta($post_item_id,'kaya_slider_height',true);
    $enable_boxed_slider = ( $enable_boxed_slider_type == '1') ? 'container' : '';
    $enable_boxed_slider_on = ( $enable_boxed_slider_type == '1') ? 'on' : 'off';
    $height = 'height:'.$kaya_slider_height.'px';
    if( class_exists('woocommerce') ){
            if( is_shop() ){
                $select_page_options=get_post_meta( woocommerce_get_page_id( 'shop' ),'select_page_options',true);
            }else{ if( get_post() ) { $select_page_options=get_post_meta(get_the_ID(),'select_page_options',true); } else{ $select_page_options = ''; } }
        }elseif( is_page()){
            $select_page_options=get_post_meta($post->ID,'select_page_options',true);
        }else{
            $select_page_options = '';
        }
    $css = '';
     if( $enable_slider_screen_height != '1' ){  
       $css .='#main_slider_slides, .slides-container{
            height:'.$kaya_slider_height.'px;
        }';
    }else{ $height = ""; }
      if( $enable_boxed_slider_on == 'on' ){ 
        $css .= '.slides-container{
            position: relative!important;
        }
        #main_slider_slides{
            padding:30px 0;
        }
        #main_slider_slides, .slides-container{
            height:'.$kaya_slider_height.'px;
        }';
     } 
	$css .= '.slides-navigation a.prev, .slides-navigation a.next{
          color:'.$post_slide_button_text_color.'!important;
          background:'.$post_slide_button_bg_color.'!important;
    }
    .slides-navigation a.prev:hover, .slides-navigation a.next:hover{
        color:'.$post_slide_button_hover_text_color.'!important;
        background:'.$post_slides_button_hover_bg_color.'!important;
    }';
    $css .= '#main_slider_slides .owl-theme .owl-dots .owl-dot span{
          border-color:'.$post_slide_nav_button_bg_color.'!important;
    }
    #main_slider_slides .owl-dot.active{
          border-color:'.$post_slide_nav_button_bg_color.'!important;
          background:'.$post_slide_nav_button_bg_color.'!important;
    }';
    if( $enable_boxed_slider_on == 'on' ){
        $css .= '#main_slider{
            padding-bottom : '.$boxed_slider_padding_bottom.'px;
            padding-top : '.$boxed_slider_padding_top.'px;
            background:'.$boxed_slider_bg_color.';
        }
        #main_slider .slides-container{
            border-radius : '.$boxed_slider_border_radius.'px;
             border:'.$boxed_slider_border_size.'px solid '.$boxed_slider_border_color.';
        }
        .slides_description{
            width:80%!important;
        }
        #main_slider .slides-container{
            width:auto!important;
        }';

    }
    if($post_slide_nav_disable != 'true'){
        $css .='#main_slider_slides .owl-theme .owl-dots{
            display:none!important;
        }';
    }
    /* Body & Menu & Title's Font Line Height  */
    if( $boxed_layout_position == 'center' ){
        $boxed_layout = 'margin:0px auto';
    }elseif( $boxed_layout_position == 'left' ){
        $boxed_layout = 'float:left';
    }else{
        $boxed_layout = 'float:right';
    }
	// Boxed Layout Setttings
    if( $select_body_background_type == 'bg_type_color' ){
        $css .= 'body.custom-background{
            background-image:none!important;
        }';
        $css .= 'body{
            background:'.$body_background_color.'!important;
        }';
    }else{
         
    }
    $css .= '#box_layout{
          box-shadow: 0 0 '.$boxed_layout_shadow.'px rgba(0, 0, 0, 0.5);
          margin-top : '.$body_margin_top.'px!important;
          margin-bottom : '.$body_margin_bottom.'px!important;
            '.$boxed_layout.';
        }';
    $css .= '.menu ul li a{
        font-family:'.$google_menufont.';
        font-size:'.$menu_font_size.'px;
        line-height: 100%;
        letter-spacing:'.$menu_font_letter_space.'px;
        font-weight:'.$menu_font_weight.';
    }
    .menu ul ul li a{
        font-size:'.$child_menu_font_size.'px;
        line-height: 130%;
        letter-spacing:'.$child_menu_font_letter_space.'px;
        font-weight:'.$child_menu_font_weight.';
    }
    body, p{
        font-family:'.$google_bodyfont.';
        line-height:'.$body_line_height.'px!important;
        font-size:'.$body_font_size.'px;
        letter-spacing:'.$body_font_letter_space.'px;
        font-weight:'.$body_font_weight_bold.';
    }
    a, span{
        font-family:'.$google_bodyfont.';
    }
    p{
        padding-bottom:'.$body_line_height.'px;
    }
    /* Heading Font Family */
     h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a{
        font-family:'.$google_generaltitlefont.';
    }
    /* Logo Font Family */
    .header_logo_wrapper h1 a,  .header_logo_section h1.sticky_logo a, #right_header_section  h1.logo a, #left_header_section  h1.logo a{
        font-family:'.$header_text_logo_font_family.';
    }
    .header_logo_wrapper .logo_tag_line, .right_header_section  .logo_tag_line, .left_header_section  .logo_tag_line {
        font-family:'.$text_logo_tagline_font_family.';
    }
     /* Font Sizes */
    h1{
		font-size:'.$h1_title_font_size.'px;
		line-height:'.$h1_line_height.'px;
		letter-spacing:'.$h1_font_letter_space.'px;
        font-weight: '.$h1_font_weight_bold.';
    }
    h2{
		font-size:'.$h2_title_font_size.'px;
		line-height:'.$h2_line_height.'px;
		letter-spacing:'.$h2_font_letter_space.'px;
        font-weight: '.$h2_font_weight_bold.';
    }
    h3, .woocommerce ul.products li.product h3, .woocommerce-page ul.products li.product h3{
		font-size:'.$h3_title_font_size.'px;
		line-height:'.$h3_line_height.'px;
		letter-spacing:'.$h3_font_letter_space.'px;
        font-weight: '.$h3_font_weight_bold.';
    }
    h4{
		font-size:'.$h4_title_font_size.'px;
		line-height:'.$h4_line_height.'px;
		letter-spacing:'.$h4_font_letter_space.'px;
        font-weight: '.$h4_font_weight_bold.';
    }
    h5{
		font-size:'.$h5_title_font_size .'px;
		line-height:'. $h5_line_height .'px;
		letter-spacing:'.$h5_font_letter_space.'px;
        font-weight: '.$h5_font_weight_bold.';
    }
    h6{
		font-size:'.$h6_title_font_size.'px;
		line-height:'.$h6_line_height.'px;
		letter-spacing:'.$h6_font_letter_space.'px;
        font-weight: '.$h6_font_weight_bold.';
    }';
    // Top Header Section 
    $top_header_display = ( $enable_top_header == '1' ) ? 'none' : 'block';
    $top_bar_bg_size = ( $top_bar_bg_repeat == 'cover' ) ? 'cover' : 'inherit';

    if( $select_top_header_background_type == 'bg_type_color' ){
         $css .='.header_top_section{
            background:'.$top_bar_bg_color.';
        }';
    }else{
        if( $upload_top_bar['top_bg_image'] ){
            $css .='.header_top_section{
                background:url('.$upload_top_bar['top_bg_image'].');
                background-repeat:'.$top_bar_bg_repeat.';
                background-position:center top!important;
                background-size:'.$top_bar_bg_size.';    
            }';
        }
    }

     $css .='.header_top_section{
            color:'.$top_bar_text_color.';
        }
        .header_top_section a{
            color:'.$top_bar_link_color.';
        }
        .header_top_section a:hover{
            color:'.$top_bar_link_hover_color.';
        }
        .top_right_section i{
            color:'.$top_bar_icon_color.'!important;
        }
        .header_top_section{
            display:'.$top_header_display.'!important;
        }';
	/* Header Section */
	if( $select_header_background_type == 'bg_type_color'){
	   $css .= '#header_container{    
			 background: '.$header_bg_color.';
			}';
	   }else{ 
         $upload_header_bg_img = $upload_header['bg_image'] ? $upload_header['bg_image'] : $theme_img_url.'header-defaul-image.jpg';
		if( $upload_header_bg_img ){ 
			$backgroundbg_image_repeat = ( $backgroundbg_repeat == 'cover' ) ? 'cover' : 'inherit';
			$css .='#header_container {
				background:url('.$upload_header_bg_img.');
				background-size : '.$backgroundbg_image_repeat.'!important;
				background-repeat : '.$backgroundbg_repeat.'!important;
				background-attachment: scroll!important;
				background-position: center top!important;
				background-repeat:repeat;  
			}
			.slides-navigation{
				margin-top:50px;
			}';
		}else{
			$css .= '.slides-navigation{
				margin-top:-20px;
			}';
		}
	}
     /* Sticky Header */
     if( $select_sticky_background_type == 'bg_type_color'){
        $css .= '#main_content_inner_section #header_container.sticky.sticky_menu{
                   background-color:'.$sticky_header_bg_color.'!important;
            }';
            }else{ 
             $css .= '#main_content_inner_section #header_container.sticky.sticky_menu{
                   background:url('.$upload_sticky_bg_image['sticky_bg_image'].'); 
                   background-repeat : '.$sticky_background_repeat.'!important;
                   background-position:center top!important;
            }';
        }
        

    $kaya_hex_rgba_color = ($enable_rgba_color == '1') ? 'rgba('.kaya_hex_rgba_color($header_border_top_color).', 0.3)' : $header_border_top_color;
		$css .='#header_container, .search_box_wrapper{
		  border-top:'.$header_border_top.'px solid '.$kaya_hex_rgba_color.';
		}
        .sub_header_wrapper{
             border-bottom:'.$page_titlebar_border_bottom.'px solid '.$page_titlebar_border_bottom_color.';
        }';
	// Header Right Section Color
	$css .= '.header_right_section p, .header_right_section , .header_right_section h1, .header_right_section h2, .header_right_section h3, .header_right_section h4, .header_right_section h5, .header_right_section h6 {
		color:'.$header_right_content_text_color.';
	}
	.header_right_section a{
		color:'.$header_right_content_link_color.'!important;
	}
    .top_right_section i{
        color:'.$header_right_content_link_color.';
    }
	.header_right_section a:hover{
		color:'.$header_right_content_link_hover_color.';
	}
    #header_wrapper{
        padding-top:'.$header_padding_top_bottom.'px!important;
        padding-bottom:'.$header_padding_top_bottom.'px!important;
    }
    #header_wrapper .left_content, #header_wrapper .right_content{
        color:'.$header_left_right_content_color.';
    }';
/*Different menu color section */
    $css .='
.menu-1 { background-color:'.$menu1_color.'!important; }
.menu-2{background-color:'.$menu2_color.'!important;}
.menu-3{background-color: '.$menu3_color.'!important;}
.menu-4{background-color: '.$menu4_color.'!important;}
.menu-5{background-color: '.$menu5_color.';}
.menu-6{background-color:'.$menu6_color.'!important;}
.menu-7{background-color:'.$menu7_color.'!important;}
.menu-8{background-color:'.$menu8_color.'!important;}
.menu-9{background-color:'.$menu9_color.'!important;}
.menu-10{background-color:'.$menu10_color.'!important;}'; 

   /* Accent Color Settings */
	$css .= '.post_description, #crumbs li:last-child, .blog_single_img .isotope_gallery li, #main_slider .prevBtn, 
	#main_slider .nextBtn, .widget_container .tagcloud a:hover , #sidebar .widget_calendar table caption, .cal-blog, .pagination span a.current, ul.page-numbers .current, .single_img .isotope_gallery li, a.social-icons:hover, .slides-pagination a.current,  .post_share, .portfolio_gallery li:hover, .owl_slider_img, .ei-slider-thumbs li, .ei-slider-thumbs li a:hover, .blog_post_icons > a, .blog_post_format_icon, .cart-contents > span, .meta-nav-next i, .meta-nav-prev i, .blog_post_wrapper .gllery_slider .owl-next, .blog_post_wrapper .gllery_slider .owl-prev,  .blog_post_wrapper .gllery_slider .owl-dots, .pf_tool_tip{
		background-color:'.$accent_bg_color.';
	}';
	$css .= '.bx-pager div a:after, .mejs-controls .mejs-time-rail .mejs-time-current, .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current{
		background:'.$accent_bg_color.'!important;
	}
	.blog_post_wrapper .gllery_slider .owl-dot::after{
        border-color: transparent '.$accent_bg_color.' '.$accent_bg_color.' transparent;
    }
    blockquote{
        border-left-color:'.$accent_bg_color.'!important;
    }
    .cart-contents > span:before{
        border-right-color:'.$accent_bg_color.'!important;
    }
    .pf_tool_tip::after{
        border-color: '.$accent_bg_color.' transparent transparent;
    }';
    $css .= '.testimonial_wrapper strong span, .video_inner_text h2 span,.video_inner_text p span, .single_img_parallex_inner_text span, #entry-author-info h4 , .custom_title i, .widget_title i, .page_sidebar:before, .dropcap span, .custom_title span, .image-boxes span, #ei-slider h2 span, .accent, .mid_container_wrapper_section .pagination a:hover, .pagination .current, .pagination  span a.current, ul.page-numbers .current, #mid_content_right_section .pagination a:hover , .single_post_info i, #main_slider_slides .slides_description h3 span{
		color:'.$accent_bg_color.'!important;
    }'; 
	$css .= '.blog_post_meta span i, .post_title_wrapper .post_by i, {
		color : '.$accent_bg_color.';	
	}';
    /* Accent background text color */
	$css .= '.mid_container_wrapper_section  #mid_container .widget_container .tagcloud a:hover, #sidebar .widget_calendar table caption, #sidebar .widget_calendar table td a, #sidebar .widget_calendar table td a:visited, a.social-icons:hover, .slider_items h4, .post_share, .bx-prev:hover:before, .bx-next:hover:before, #singlepage_nav span, #mid_container .blog_post_icons > a, .blog_post_format_icon, .cart-contents > span, .meta-nav-next i, .meta-nav-prev i, .blog_post_wrapper .gllery_slider .owl-next, .blog_post_wrapper .gllery_slider .owl-prev, .pf_tool_tip{
		color:'.$accent_text_color.'!important;
	}
    .widget_container .tagcloud a:hover{
        color:'.$accent_text_color.'!important;
    }
    .blog_post_wrapper .gllery_slider .owl-dot{
        border-color:'.$accent_text_color.';
    }
    .blog_post_wrapper .gllery_slider .owl-dot.active{
        background-color:'.$accent_text_color.';
    }';
    //prettyphoto social icons
if( $enable_prettyphoto_socialicons == '1' ){ 

$css .= '.pp_social{
            display: none!important;
        }';
}else{
   $css .= '.pp_social{
            display: block!important;
        }'; 
}
//prettyphoto thumbnails
if( $disable_prettyphoto_thumbnails == '1' ){ 

$css .= '.pp_gallery{
            display: none!important;
        }';
}else{
   $css .= '.pp_gallery{
            display: block!important;
        }'; 
}
    //prettyphoto post title
if( $disable_prettyphoto_post_title == '1' ){ 
$css .= 'div.ppt{
            display: none!important;
        }';
}else{
   $css .= 'div.ppt{
            display: block!important;
        }'; 
}
    /* Menu Section */
    if( ($header_logo_position == 'left') || ( $header_logo_position == 'right' ) || ( $header_logo_position == 'centerlogo_leftright_menu' ) ){
        $css .= '.header_menu_center_position {
                    display: table!important;
               }
        .header_menu_section{
            border:0px solid '.$menu_bar_top_border_color.';
        }';
    }
    else{    
        if( $menu_bar_position == 'left' ){
            $menu_position = 'float:left;';
        }elseif( $menu_bar_position == 'right' ){
            $menu_position = 'float:right;';
        }else{
            $menu_position = 'margin:0px auto;';
        }
        $css .='.nav_wrap{
                '.$menu_position.'
            }
        .header_menu_section{
            border-top:'.$menu_bar_top_border.'px solid '.$menu_bar_top_border_color.';
        }';

    }   
    $css .= '#header_wrapper nav{
        margin-top:'.$menu_margin_top.'px!important;
        margin-bottom:'.$menu_margin_bottom.'px!important;
    }
    .menu > ul > li > a{
        padding-top:'.$menu_padding_top_bottom.'px;
        padding-bottom:'.$menu_padding_top_bottom.'px;
        border-left:'.$menu_links_border_left.'px solid '.$menu_links_border_left_color.';
        border-right:'.$menu_links_border_right.'px solid '.$menu_links_border_right_color.';
    }
    .search_box_icon{
        padding-top:'.ceil($menu_padding_top_bottom - 15).'px;
        padding-bottom:'.ceil($menu_padding_top_bottom - 15).'px;
        border-left:'.$menu_links_border_left.'px solid '.$menu_links_border_left_color.';
    }
    .menu > ul > li > a, .shop_cart_icon a, .search_box_icon, .search_box_icon i, .mobile_toggle_menu i, .mobile_drop_down_icons i{
      color:'.$menu_link_color.';
    }
    .header_menu_section{
       background: '.$menu_background_color.';
    }
     .mobile_menu a{
      color:'.$menu_link_color.';
    }
	.menu > li.current-menu-item > a,  .menu > ul  > li:hover > a
    {
      color:'.$menu_link_hover_text_color.';
      background-color:'.$menu_link_bg_hover_color.';
    }
    .menu .current_page_ancestor > a, .menu .current-menu-item > a{
       color:'.$menu_link_active_color.';
    }
    .menu > li.current_page_item > a, .sm-blue> li.current_page_item > a{
        background-color:'.$menu_bg_active_color.';
        color:'.$menu_link_active_color.'!important;
    }
    .menu > li.current-menu-item > a{
        background-color:'.$menu_bg_active_color.';
    }
    .menu .current_page_ancestor > a{
        color:'.$menu_link_active_color.'!important;
    }
    .nav_wrap .wide_menu > .megamenu_wrapper > ul, .megamenu_wrapper.menu_content_wrapper > ul,.sub_level_menu, .nav_wrap .wide_menu > .megamenu_wrapper > ul .narrow_menu .megamenu_wrapper ul li ul.sub_level_menu{
      background-color:'.$sub_menu_bg_color.';
    }
    .sm-blue ul, .sm-blue ul ul{
      background-color:'.$sub_menu_bg_color.';
    }
    .megamenu_wrapper.menu_content_wrapper > ul, .nav_wrap .wide_menu > .megamenu_wrapper > ul {
        border-top: '.$sub_menu_top_border.'px solid '.$sub_menu_top_border_color.';
    }
    .menu ul ul li a{
      color:'.$sub_menu_link_color.';
    }
    .menu ul ul li a:hover{
      color:'.$sub_menu_link_hover_color.';
    }
    .menu ul ul li{
      border-bottom:  1px solid '.$sub_menu_bottom_border_color.'; 
    }
    .menu ul ul li a{
      text-transform:'.$childmenu_uppercase.';
    }
    .menu > ul > li > a{
      text-transform:'.$mainmenu_uppercase.';
    }
    .menu .menu_content_wrapper .current-menu-item > a, .menu .sub-menu .current-menu-item > a, .sm-blue .current-menu-item > a{
         color:'.$sub_menu_link_active_color.';
    }
    .menu .current_page_ancestor > a, .menu .current-menu-ancestor > a, .menu .current-menu-item > a, .sm-blue .current-menu-item > a{
        color:'.$sub_menu_link_active_color.';
    }
     .sticky_menu .menu > ul > li > a,  .sticky_menu .search_box_icon, .sticky_menu .search_box_icon i{
      color:'.$sticky_header_link_color.';
    }
    .sticky_menu .menu > ul > li > a:hover, .sticky_menu  .menu > li.current-menu-item > a, .sticky_menu .nav_wrap > ul > li:hover > a, .sticky_menu .current-menu-ancestor{
      color:'.$sticky_header_link_hover_color.';
    }
    .logo, .sticky_logo{
        //margin-top:'.$logo_margin_top.'px;
        //margin-bottom:'.$logo_margin_bottom.'px;
    }';  
     
     /* Left / Righr Sidebar */
     $css .= '.sidebar_bottom_content a{
        color:'.$sidebar_text_link_color.';
     }
     .sidebar_bottom_content{
        color:'.$sidebar_text_color.';
     }';
      /*Page color settings */
      if(  $select_page_mid_background_type == 'bg_type_color' ){
        $css .= '.mid_container_wrapper_section, #mid_content_right_section, #mid_content_left_section{
            background : '.$page_bg_color.';
        }';
      }else{ 
        if( $page_content_bg['bg_img'] ){
          $bg_size_cover = ( $page_content_bg_repeat == 'cover' ) ? 'cover' : 'inherit';
             $css .= '.mid_container_wrapper_section, .blog .mid_container_wrapper_section, #mid_content_right_section, #mid_content_left_section{
                   background:url('.$page_content_bg['bg_img'].')!important;
                   background-repeat:'.$page_content_bg_repeat.'!important;
                   background-size: '.$bg_size_cover.'!important;
                   background-position:center top!important;
            }';
        }
    }
    $css .= '.mid_container_wrapper_section h1, #mid_content_left_section h1, #mid_content_right_section h1,
    .mid_container_wrapper_section h2, #mid_content_left_section h2, #mid_content_right_section h2,
    .mid_container_wrapper_section h3, #mid_content_left_section h3, #mid_content_right_section h3,
    .mid_container_wrapper_section h4, #mid_content_left_section h4, #mid_content_right_section h4,
    .mid_container_wrapper_section h5, #mid_content_left_section h5, #mid_content_right_section h5,
    .mid_container_wrapper_section h6, #mid_content_left_section h6, #mid_content_right_section h6, .meta-nav-next strong, .meta-nav-prev strong{
		color: '.$page_titles_color.';
    }

	.mid_container_wrapper_section p, .mid_container_wrapper_section #mid_content_left_section, #mid_content_right_section{
       color: '.$page_description_color.';
    }
    .mid_container_wrapper_section a:not(.add_to_cart_button){
       color: '.$page_link_color.';
    }  
    .mid_container_wrapper_section a:hover:not(.add_to_cart_button){
       color: '.$page_link_hover_color.';
    }';
    /* Sidebar Section */
    $css .= '.mid_container_wrapper_section #sidebar h3, #mid_content_left_section #sidebar h3, #mid_content_right_section #sidebar h3{
		color:'.$sidebar_title_color.';
    }
    .mid_container_wrapper_section #sidebar p, .mid_container_wrapper_section #sidebar, .mid_container_wrapper_section #sidebar .search_form input, #mid_content_left_section #sidebar, #mid_content_right_section #sidebar,  #mid_content_right_section #sidebar .search_form input,  #mid_content_left_section #sidebar .search_form input{
		color: '.$sidebar_content_color.';
    }
    #sidebar a{
      color: '.$sidebar_link_color.';
    }
    .mid_container_wrapper_section #sidebar a:hover, #mid_content_left_section #sidebar a:hover, #mid_content_right_section #sidebar a:hover{
      color:'.$sidebar_link_hover_color.';
    }
    .mid_container_wrapper_section .blog_post h4 a, #mid_content_left_section #sidebar .blog_post h4 a, #mid_content_right_section #sidebar .blog_post h4 a{
      color: '.$page_titles_color.';
    }';
    /* Input field  Colors */
     $css .= '.vaidate_error{
      border:1px solid '.$input_error_border_color.'!important;
    }';
	$css .= '.search_form input, #contact-form input, #contact-form textarea, #commentform input, #commentform textarea, #reservation-form input, #reservation-form textarea{
        background-color:'.$input_background_color.';
        color:'.$input_text_color.';
        border:1px solid '.$input_border_color.';
     }';
     /* Search Box */
    $css .= '.main_search_wrapper{
        background:'.$search_box_bg_color.'!important;
        color:'.$Search_box_text_color.';
     }
     body .search_box_wrapper{
        background:'.$search_box_bg_color.'!important;
        color:'.$Search_box_text_color.';
     }
     .search_box_wrapper .search_form input{
         background:'.$search_box_bg_color.'!important;
         color:'.$Search_box_text_color.';
     }
     .search_close_button{
        color:'.$Search_box_text_color.';
     }';
	 /* Buttons Colors */
	$border_color = $button_border_color ? 'border:2px solid '.$button_border_color.';' : '';
    $border_hover_color = $button_hover_border_color ? 'border:2px solid '.$button_hover_border_color.';' : '';
	$css .= '.mid_container_wrapper_section a.readmore, input#submit, #contact-form p #contact_submit, #commentform #submit , #contact-form #reset ,  .mid_container_wrapper_section .blog_read_more, #main_slider a.readmore, input#reset {
        background-color:'.$button_bg_color.';
        color:'.$button_bg_text_color.';
         '.$border_color.';
         border-radius:'.$button_border_radius.'px;
         padding:'.$button_padding_top_bottom.'px '.$button_padding_left_right.'px;
         font-size:'.$button_font_size.'px;
         font-weight:'.$button_font_weight.';
         font-style : '.$button_font_style.';
     }
    .mid_container_wrapper_section a.readmore:hover, input#submit:hover, #contact-form p #contact_submit:hover, #commentform #submit:hover , #contact-form #reset:hover,  .mid_container_wrapper_section .blog_read_more:hover, #main_slider a.readmore:hover, input#reset:hover {
        background-color:'.$button_bg_hover_color.'!important;
        color:'.$button_hover_text_color.'!important;
       '.$border_hover_color.';       
     }
     .readmore::before{
        background:'.$button_bg_hover_color.'!important;
     }';    
	/* Woocommerce Color Section */
    if( $menu_bar_cart_icon == 1 ){
        $css .= '.menu_shop_cart_icon{
            display:none!important;
        }';
    }else{
        $css .= '.menu_shop_cart_icon{
            display:inline-block!important;
        }';
    }
    $css .= '.primary-button, #mid_container input#submit.primary-button, p.buttons .button.wc-forwards{
        background:'.$primary_buttons_bg_color.'!important;
        color:'.$primary_buttons_text_color.'!important;
     }
     .shop-produt-image .product-cart-button a{
       background:'.$primary_buttons_bg_color.'!important;
        color:'.$primary_buttons_text_color.'!important;
     }
     .primary-button:hover,#mid_container input#submit.primary-button:hover, p.buttons .button.wc-forward:hover{
        background:'.$primary_buttons_bg_hover_color.'!important;
        color:'.$primary_buttons_text_hover_color.'!important;
     }
     .shop-produt-image .product-cart-button a:hover{
       background:'.$primary_buttons_bg_hover_color.'!important;
        color:'.$primary_buttons_text_hover_color.'!important;
     }
     .seconadry-button, #place_order, .single-product-tabs .active, .single-product-tabs li:hover, .woocommerce .quantity .minus, .woocommerce .quantity .plus, .woocommerce-page .quantity .minus, .woocommerce-page .quantity .plus{
        background:'.$secondary_buttons_bg_color.'!important;
        color:'.$secondary_buttons_text_color.'!important;
     }
     .woocommerce-tabs li.active:after , .woocommerce-tabs .single-product-tabs li:hover:after{
       border-color: '.$secondary_buttons_bg_color.' transparent transparent !important;
     }
     .seconadry-button:hover, #place_order:hover, .woocommerce .quantity .minus:hover, .woocommerce .quantity .plus:hover, .woocommerce-page .quantity .minus:hover, .woocommerce-page .quantity .plus:hover{
        background:'.$secondary_buttons_bg_hover_color.'!important;
        color:'.$secondary_buttons_text_hover_color.'!important;
     }
     .woocommerce a.wc-forward:after, .woocommerce-page a.wc-forward:after{
          color:'.$secondary_buttons_text_color.'!important;
     }
     .woocommerce a.wc-forward:hover:after, .woocommerce-page a.wc-forward:hover:after{
          color:'.$secondary_buttons_text_hover_color.'!important;
     }
 
    .product-remove a.remove:hover {
       border-color: '.$woo_elments_colors.'!important;
    }
    .product-remove a.remove:hover,.mid_container_wrapper_section .comment-form-rating .stars a:hover,.upsells-product-slider  ins span.amount, .related-product-slider .shop-products span .amount , .woocommerce ul.products li.product .price ins, .woocommerce-page ul.products li.product .price ins, p span.amount{
           color:'.$woo_elments_colors.'!important;
    }
    .owl-item span.amount{
        color:'.$woo_elments_colors.';
    }
    .onsales{
         background-color:'.$woo_elments_colors.'!important;
         color:'.$woo_elments_text_colors.';
    }
    .product_name a{
        color:'.$woo_product_title_color.'!important;
    }
     .product_name a:hover{
        color:'.$woo_product_title_hover_color.'!important;
    }
    .product_description{
        color:'.$woo_product_description_color.'!important;
    }
    .star-rating{
        color:'.$woo_product_rating_color.'!important;
    }
    .woocommerce ul.products li.product .price{
      color:'.$woo_product_price_color.'!important;
    }
    .amount{
      color:'.$woo_product_price_color.';  
    }
    .cart-sussess-message {
      background-color:'.$success_msg_bg_color.';
      color:'.$success_msg_text_color.';
    }
    .woocommerce-cart-info {
      background-color:'.$notification_msg_bg_color.';
      color: '.$notification_msg_text_color.';
    }
    .woocommerce-cart-info a{
          color: '.$notification_msg_text_color.'!important;
    }
    .woocommerce-cart-error {
      background-color: '.$warning_msg_bg_color.';
      color: '.$warning_msg_text_color.';
    }
    .shop-product-details {
    background-color:'.$woo_product_details_bg_color.';
    }
    .owl-carousel .owl-item .shop-products, ul.products .shop-products{
        border: 1px solid '.$woo_product_border_color.';
    }';    
	/* End */
    /* Blog */
    $css .='.single_post_meta, .entry-author-info, ol.commentlist div.parent{
        background-color:'.$author_meta_comment_bg_color.';
         color:'.$author_meta_comment_text_color.';
    }
    .single_post_meta{
         border-bottom:1px solid '.$author_meta_comment_border_color.';
    }
    .single_post_info{
         border-right:1px solid '.$author_meta_comment_border_color.';
    }
    .entry-author-info, ol.commentlist div.parent{
         border:1px solid '.$author_meta_comment_border_color.';
    }
    .comment-body p,  .comment-author cite a,  .comment-author cite, .comment-author cite a:hover{
        color:'.$author_meta_comment_text_color.'!important;
    }   
    .single_post_meta .single_post_info a, .entry-author-info #author-link a, #mid_container_wrapper .commentmetadata a{
        color:'.$author_meta_comment_link_color.'!important;
    }
    .single_post_meta .single_post_info a:hover, .entry-author-info #author-link a:hover, #mid_container_wrapper .commentmetadata a:hover{
        color:'.$author_meta_comment_link_hover_color.'!important;
    }';
	/* Footer Section
    if(  $select_footer_background_type == 'bg_type_color' ){
       $css .= 'footer{
            background-color:'.$footer_bg_color.';
     }';
    }else{
        if( $footerbg['footer'] ){ 
        $footer_bg_img_repeat = ( $footerbg_repeat == 'cover' ) ? 'cover' : 'inherit';
        $css .= 'footer{
            background: url('.$footerbg['footer'].')!important;
            background-attachment: fixed!important;
            background-position: center top!important;
            background-repeat : '.$footerbg_repeat.'!important;
            background-size : '.$footer_bg_img_repeat.'!important;
            background-attachment: scroll!important;
          } ';
      }
    }
    $css .= 'footer .footer_widgets h3{
        color:'.$footer_title_color.';
    }
    footer .footer_widgets p, footer .footer_widgets{
        color:'.$footer_text_color.';
    }
    footer .footer_widgets a, footer .footer_widgets .widget_container ul li a{
        color:'.$footer_link_color.';
    }
    footer .footer_widgets a:hover, footer .footer_widgets a:active,  footer .widget_container ul li a:hover{
        color:'.$footer_link_hover_color.';
    }';  */
    // Most Footer
    if(  $select_most_footer_background_type == 'bg_type_color' ){
       $css .= '#footer_bottom{
            background-color:'.$most_footer_bg_color.';
     }';
    }else{
        if( $most_footerbg['mostfooter'] ){ 
        $most_footer_bg_img_repeat = ( $most_footerbg_repeat == 'cover' ) ? 'cover' : 'inherit';
        $css .= '#footer_bottom{
            background: url('. $most_footerbg['mostfooter'].')!important;
            background-attachment: fixed!important;
            background-position: center top!important;
            background-repeat : '.$most_footerbg_repeat.'!important;
            background-size : '.$most_footer_bg_img_repeat.'!important;
            background-attachment: scroll!important;
          } ';
      }
    }
    $css .= '#footer_bottom p, #footer_bottom, #footer_bottom span{
        color:'.$most_footer_text_color.';
    }
    #footer_bottom a, #footer_bottom ul li a{
        color:'.$most_footer_link_color.';
    }
    #footer_bottom a:hover, #footer_bottom a:active, #menu-footer > li.current-menu-item > a{
        color:'.$most_footer_link_hover_color.';
    }';
  $css = preg_replace( '/\s+/', ' ', $css ); 
  $output = "<!-- Customizer Style -->\n<style type=\"text/css\">\n" . $css . "\n</style>";
  echo $output;
}
add_action('wp_head','kaya_custom_colors');
// Media IMage Styles
function media_imges_style(){
    $css ='.compat-attachment-fields th{
		vertical-align:top!important;
    }
    .compat-attachment-fields p{
		margin: 5px 0 0px!important;
    }
    .compat-attachment-fields tbody tr{
		margin-bottom: 10px!important;
		display:block;
    }
    .radio_buttons {
		margin-right: 10px;
    }
    td p.help {
		float: right;
		margin: 0 0 0 10px !important;
    }
    .metabox-holder .compat-attachment-fields tbody tr {
		display: block;
		float: left;
		margin-bottom: 10px !important;
		width: 50%;
    } .so-panels-dialog-wrapper span.widget-name a {
        position: relative!important;
        width: inherit!important;
        display: inline-block!important;
        border-bottom: 0!important;
        border-left: 0px!important;
        background:none!important;
        height:20px;
        box-shadow:none!important;
    }
    .title h4 a.widget_video_tutorials, .siteorigin-panels-builder .so-rows-container .so-row-container .so-cells .cell .widgets-container .so-widget:hover .title h4 a.widget_video_tutorials, .widget-type-wrapper a.widget_video_tutorials, .so-section ul li a.widget_video_tutorials{
        display:none!important;
    }';
    $css = preg_replace( '/\s+/', ' ', $css );
	$output = "<style type=\"text/css\">\n" . $css . "\n</style>";
	echo $output;
}
add_action( 'admin_head', 'media_imges_style' );
?>