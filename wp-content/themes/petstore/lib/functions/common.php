<?php
add_theme_support('automatic-feed-links');
global $post;
 /* Resize Images Width Fullwisth/Sidebar 
 ----------------------------------------- */
if( !function_exists('kaya_image_width') ){
	function kaya_image_width( $postid ){
		$sidebar_layout = get_post_meta($postid,'kaya_pagesidebar',true); 
		$kaya_width = ($sidebar_layout == "full" ) ? '1250' : '719';
		return $kaya_width;
	 }
}	 
 // Site Title and Desc
if( !function_exists('kaya_wp_title') ){
	function kaya_wp_title( $title ) {
		global $page, $paged;
		if ( is_feed() )
			return $title;
		$title .= get_bloginfo( 'name' );
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title .= " | $site_description";
		return $title;
	}
}	
add_filter( 'wp_title', 'kaya_wp_title', 10, 1 ); // End
/*-----------------------
Logo Display Function
-------------------------*/
if(!function_exists('kaya_logo_image')): // Logo
	function kaya_logo_image() {
		echo '';
		$select_header_logo_type = get_theme_mod('select_header_logo_type') ? get_theme_mod('select_header_logo_type') : 'image_logo';
		$header_text_logo = get_theme_mod('header_text_logo') ? get_theme_mod('header_text_logo') : 'Petstore';
		$logo_text_font_color = get_theme_mod('logo_text_font_color') ? get_theme_mod('logo_text_font_color') : '#333333';
		$text_logo_size = get_theme_mod('text_logo_size') ? get_theme_mod('text_logo_size') : '36';
		$logo_text_font_color = get_theme_mod('logo_text_font_color') ? get_theme_mod('logo_text_font_color') : '#333333';
		$sticky_logo_color = get_theme_mod('sticky_logo_color') ? get_theme_mod('sticky_logo_color') : '#333333';		
		$sticky_text_logo_size = get_theme_mod('sticky_text_logo_size') ? get_theme_mod('sticky_text_logo_size') : '28';
		$logo_text_font_weight = get_theme_mod('header_logo_font_weight') ? get_theme_mod('header_logo_font_weight') : 'normal';
		$logo_text_font_style = get_theme_mod('header_logo_font_style') ? get_theme_mod('header_logo_font_style') : 'normal';
		$header_text_logo_tagline = get_theme_mod('header_text_logo_tagline') ? get_theme_mod('header_text_logo_tagline') : '';
		$logo_tagline_font_color = get_theme_mod('logo_tagline_font_color') ? get_theme_mod('logo_tagline_font_color') : '#333';
		$logo_tagline_font_style = get_theme_mod('logo_tagline_font_style') ? get_theme_mod('logo_tagline_font_style') : 'normal';
		$logo_tagline_font_weight = get_theme_mod('logo_tagline_font_weight') ? get_theme_mod('logo_tagline_font_weight') : 'normal';
		$logo_tagline_size = get_theme_mod('logo_tagline_size') ? get_theme_mod('logo_tagline_size') : '12';
		$logo_tagline_letter_spacing = get_theme_mod('logo_tagline_letter_spacing') ? get_theme_mod('logo_tagline_letter_spacing') : '0';
		$sticky_logo_tagline_color = get_theme_mod('sticky_logo_tagline_color') ? get_theme_mod('sticky_logo_tagline_color') : '#333';

		$retina_logo = get_option('retina_logo');
		$retina_logo_img = $retina_logo['upload_retina_logo'];
		$sticky_retina = get_option('sticky_retina_logo');
		$sticky_retina_logo = $sticky_retina['upload_sticky_retina_logo'];

		$kaya_default_logo = esc_attr( get_template_directory_uri().'/images/logo.png' );
		$kaya_logo_img_src = get_option('kaya_logo');
		$logo = $kaya_logo_img_src['upload_logo'] ? $kaya_logo_img_src['upload_logo'] : $kaya_default_logo;
		if( $logo ){
			$upload_image_id = get_attachment_id_from_src($logo);
			$array_values = logo_customizer_media_upload( $upload_image_id );
			$logo_width = $array_values['width'];
			$logo_height = $array_values['height'];
		}else{
			$logo_width = '';
			$logo_height = '';
		}
		$sticky_logo = get_option('sticky_logo');
		//$array_values = $kaya_logo_img_src['upload_logo'];	
		$sticky_logo_img = $sticky_logo['upload_sticky_logo'] ?  $sticky_logo['upload_sticky_logo'] : $kaya_default_logo; 
		if( !empty($sticky_logo_img) ){
			$sticky_logo_src = '<img src="'.$sticky_logo_img.'" class="sticky_logo" alt="'.get_bloginfo( 'name' ).'" />';
		}else{
			$sticky_logo_src = '<img src="'.$logo.'" class="sticky_logo" alt="'.get_bloginfo( 'name' ).'" />';
		} 
		if( !empty($retina_logo_img) ){
			$retina_logo_src = '<img src="'.$retina_logo_img.'" style="width:'.$logo_width.'px; min-height:'.$logo_height.'px;" class="header_retina_logo retina_logo" alt="'.get_bloginfo( 'name' ).'" />';
		}else{
			$retina_logo_src = '<img src="'.$logo.'" style="width:'.$logo_width.'px; min-height:'.$logo_height.'px;" class="header_retina_logo retina_logo" alt="'.get_bloginfo( 'name' ).'" />';
		}
		// Sticky retina
		if( !empty($sticky_retina_logo) ){
			$sticky_retina_logo = '<img src="'.$sticky_retina_logo.'" style="width:'.$logo_width.'px; min-height:'.$logo_height.'px;" class="sticky_retina_logo  retina_logo" alt="'.get_bloginfo( 'name' ).'" />';
		}else{
			$sticky_retina_logo = '<img src="'.$sticky_logo_img.'" style="width:'.$logo_width.'px; min-height:'.$logo_height.'px;" class="sticky_retina_logo  retina_logo" alt="'.get_bloginfo( 'name' ).'" />';
		}
		echo '<div class="header_logo_wrapper">';
		if( $select_header_logo_type == 'image_logo' ){
				if( $logo ) {
					$kaya_logo_src = esc_attr( $logo ) ? esc_attr( $logo ) : esc_attr( $kaya_default_logo );
				}else{
					$kaya_logo_src = esc_attr( get_template_directory_uri().'/images/logo.png' );
				}
				$kaya_logo_img = 'class="logo" src="'.esc_attr($kaya_logo_src).'" alt="'.get_bloginfo( 'name' ).'"';
				$kaya_logo = apply_filters('kaya_image_logo', '<img '.$kaya_logo_img .' />'.$sticky_logo_src.$retina_logo_src.$sticky_retina_logo);
				echo '<a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'">'.apply_filters('kaya_logo_html', $kaya_logo).'</a>';
			//}
		}elseif( $select_header_logo_type == 'text_logo' ){
			$kaya_logo = apply_filters('kaya_image_logo', $header_text_logo);
			echo '<h1 class="logo" style="font-size:'.$text_logo_size.'px; color:'.$logo_text_font_color.'; font-weight:'.$logo_text_font_weight.'; font-style:'.$logo_text_font_style.'"><a  href="'.esc_url( home_url( '/' ) ).'" style="font-size:'.$text_logo_size.'px; color:'.$logo_text_font_color.'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'">'.apply_filters('kaya_logo_html', $kaya_logo).'';
			echo '</a></h1>';
			if( !empty($header_text_logo_tagline) ){
				echo '<p class="logo_tag_line logo" style="color:'.$logo_tagline_font_color.'; font-size:'.$logo_tagline_size.'px; font-weight:'.$logo_tagline_font_weight.'; font-style:'.$logo_tagline_font_style.'; letter-spacing:'.$logo_tagline_letter_spacing.'px;">'.$header_text_logo_tagline.'</p>';
			}	
			//echo '<a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'">'.$sticky_logo_src.$retina_logo_src.'</a>';			
			echo '<h1 class="sticky_logo" style="font-size:'.$sticky_text_logo_size.'px; color:'.$sticky_logo_color.'; font-weight:'.$logo_text_font_weight.'; font-style:'.$logo_text_font_style.'"><a  href="'.esc_url( home_url( '/' ) ).'" style="font-size:'.$sticky_text_logo_size.'px; color:'.$sticky_logo_color.'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'">'.apply_filters('kaya_logo_html', $kaya_logo).'';
			echo '</a></h1>';
			if( !empty($header_text_logo_tagline) ){
				echo '<p class="logo_tag_line sticky_logo" style="color:'.$sticky_logo_tagline_color.'; font-size:'.$logo_tagline_size.'px; font-weight:'.$logo_tagline_font_weight.'; font-style:'.$logo_tagline_font_style.'; letter-spacing:'.$logo_tagline_letter_spacing.'px;">'.$header_text_logo_tagline.'</p>';
			}
			
		}else{

		}
		echo '</div>';
	}	
endif; // End Logo
	get_template_part('slider/kaya','slider');
/*-----------------------
Upload Image URL
-------------------------*/
function get_attachment_id_from_src($image_src) {
     global $wpdb;
     $query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
     $id = $wpdb->get_var($query);
     return $id;
}

if(!function_exists('logo_customizer_media_upload')){
function logo_customizer_media_upload($upload_image_id)
	{
	  $upload_img_url = wp_get_attachment_image_src($upload_image_id, "full");
		$array['url']= $upload_img_url[0];
		$array['width']= $upload_img_url[1];
		$array['height']= $upload_img_url[2];
		return $array;
	}
}
if( !function_exists('customizer_media_upload') ){
	function customizer_media_upload($uploadimageid)
	{
	  $upload_img_url = wp_get_attachment_image_src($uploadimageid, "full");
	  return $upload_img_url[0];
	}
}	
/*-----------------------
Page title bar Background options section
-------------------------*/
if(!function_exists('page_title_background_image')){
	function page_title_background_image($post_id){
		global $post_item_id, $post;
		echo  kaya_post_item_id();
		 $theme_img_url = get_template_directory_uri().'/images/';
		$select_page_title_customization=get_post_meta($post_item_id,'select_page_title_customization',true);
		if(  $select_page_title_customization == 'custom_page_title_options' ){
		if( class_exists('RW_Meta_Box') ){
			$title_bar_bg_images=rwmb_meta( 'title_bar_bg_image', 'type=image&size=full', $post_item_id );
		}else{
			$title_bar_bg_images ='';
		}
			$page_title_bar_bg_color=get_post_meta($post_item_id,'page_title_bar_bg_color',true);
			$page_title_img_position=get_post_meta($post_item_id,'page_title_img_position',true) ? get_post_meta($post_item_id,'page_title_img_position',true) :'fixed';
			$page_title_img_repeat=get_post_meta($post_item_id,'page_title_img_repeat',true) ? get_post_meta($post_item_id,'page_title_img_repeat',true) :'no-repeat';
			$page_title_bar_padding_t_b=get_post_meta($post_item_id,'page_title_bar_padding_t_b',true) ? get_post_meta($post_item_id,'page_title_bar_padding_t_b',true) :'50';
			$bg_image_opcaity=get_post_meta($post_item_id,'bg_image_opcaity',true);
			$enable_fullscreen_height=get_post_meta($post_item_id,'enable_fullscreen_height',true);
			$fullscreen_height = ($enable_fullscreen_height == '1') ? 'on' : 'off';
			if( !empty( $title_bar_bg_images ) ):	
			 	foreach ( $title_bar_bg_images as $image ){ 	
			 		$title_bar_bg_image =$image['url'];
			 	}else:
			 		$title_bar_bg_image ='';
		 	endif;
		 	$bg_size_cover = ( $page_title_img_repeat == 'cover' ) ? 'cover' : 'inherit';
		}else{
			$select_page_title_background_type = get_theme_mod('select_page_title_background_type') ? get_theme_mod('select_page_title_background_type') : 'bg_type_image' ;
			$page_title_img_repeat = get_theme_mod('page_title_bar_bg_repeat') ? get_theme_mod('page_title_bar_bg_repeat') : 'repeat' ;
			$bg_size_cover = ( $page_title_img_repeat == 'cover' ) ? 'cover' : 'inherit';
			$page_title_bar = get_option('page_title_bar');
			$page_title_img_position = get_theme_mod('page_title_img_position') ? get_theme_mod('page_title_img_position') : 'yes';
			$title_bar_bg_image = $page_title_bar['bg_img'] ? $page_title_bar['bg_img'] : '';
			$bg_image_opcaity =  get_theme_mod( 'bg_image_opacity' ) ? get_theme_mod( 'bg_image_opacity' ) : '1';
			$page_title_bar_padding_t_b = get_theme_mod('page_title_bar_padding_t_b') ? get_theme_mod('page_title_bar_padding_t_b') : '50';
			$fullscreen_height = '';
		}
		switch ($page_title_img_position) {
			case 'yes':
				$parallax_class="parallax_image";
				break;
			case 'with_zoom':
				$parallax_class="parallax_with_zoom_image";
				break;	
			case 'no':
				$parallax_class="no_parallax_image";
				break;
			case 'image_animation':
				$parallax_class="bg_image_animation";
				break;				
			default:
				$parallax_class="parallax_image";
				break;
		}
        if( $select_page_title_background_type == 'bg_type_image' ){
	        echo '<div class="page_title_bg_img '.$parallax_class.'" data-fullscreen="'.$fullscreen_height.'" style="opacity:'.$bg_image_opcaity.'; background-image:url('.$title_bar_bg_image.'); background-attachment:'.$page_title_img_position.'; background-repeat:'.$page_title_img_repeat.'; background-size:'.$bg_size_cover.';  background-position:center 0;">';	
			echo '</div>';        
   		}
		
	}
}
if( !function_exists('page_title_background_color') ){
	function page_title_background_color($post_id){
		global $post_item_id, $post;
		echo  kaya_post_item_id();
		$select_page_title_customization=get_post_meta($post_item_id,'select_page_title_customization',true);
		if(  $select_page_title_customization == 'custom_page_title_options' ){
			$page_title_color = get_post_meta($post_item_id,'page_title_color',true) ? get_post_meta($post_item_id,'page_title_color',true) : '#ffffff';
			$page_title_bar_bg_color=get_post_meta($post_item_id,'page_title_bar_bg_color',true) ? get_post_meta($post_item_id,'page_title_bar_bg_color',true) : '#e8e8e8';
			$bread_crumb_link_color=get_post_meta($post_item_id,'bread_crumb_link_color',true) ? get_post_meta($post_item_id,'bread_crumb_link_color',true) :'#ffffff';
			$bread_crumb_text_color=get_post_meta($post_item_id,'bread_crumb_text_color',true) ? get_post_meta($post_item_id,'bread_crumb_text_color',true) :'#ffffff';
			$title_font_weight = get_post_meta($post_item_id,'title_font_weight',true);
			$title_font_style = get_post_meta($post_item_id,'title_font_style',true);
			$description_font_weight = get_post_meta($post_item_id,'description_font_weight',true);
			$description_font_style = get_post_meta($post_item_id,'description_font_style',true);
			$paget_title_position=get_post_meta($post_item_id,'paget_title_position',true) ? get_post_meta($post_item_id,'paget_title_position',true) :'center';
			$title_bottom_border=get_post_meta($post_item_id,'title_left_right_border',true) ? get_post_meta($post_item_id,'title_left_right_border',true) :'off';
   			$border_bottom = ($title_bottom_border != 'on') ? 'content:inherit; height:0px;' :'padding-bottom:0; margin-bottom:0;';
   			$title_border_bottom = ($title_bottom_border != 'on') ? 'margin-bottom:0' :'margin-bottom:0!important; padding-bottom:15px!important;';
   			$page_bread_crumb=get_post_meta($post_item_id,'page_bread_crumb',true) ? get_post_meta($post_item_id,'page_bread_crumb',true) : '0';
		}else{
			$select_page_title_background_type = get_theme_mod('select_page_title_background_type') ? get_theme_mod('select_page_title_background_type') : 'bg_type_image' ;
			$page_title_bar_bg_color = get_theme_mod( 'page_title_bg_color' ) ? get_theme_mod( 'page_title_bg_color' ) : '#e8e8e8';
			$page_title_color = get_theme_mod('page_titlebar_title_color') ? get_theme_mod('page_titlebar_title_color') : '#ffffff';
			$bread_crumb_link_color = get_theme_mod('bread_crumb_link_color') ? get_theme_mod('bread_crumb_link_color') : '#ffffff';
			$bread_crumb_text_color = get_theme_mod( 'bread_crumb_text_color' ) ? get_theme_mod( 'bread_crumb_text_color' ) : '#fff';
			$title_font_weight = get_theme_mod( 'page_title_font_weight' ) ? get_theme_mod( 'page_title_font_weight' ) : 'normal';
			$title_font_style = get_theme_mod( 'page_title_font_style' ) ? get_theme_mod( 'page_title_font_style' ) : 'normal';
			$description_font_style = get_theme_mod( 'page_description_font_style' ) ? get_theme_mod( 'page_description_font_style' ) : 'normal';
			$description_font_weight = get_theme_mod( 'page_description_font_weight' ) ? get_theme_mod( 'page_description_font_weight' ) : 'normal';
			$paget_title_position=get_theme_mod('page_title_des_position') ? get_theme_mod('page_title_des_position') : 'left';
			$title_bottom_border = get_theme_mod('title_border_remove') ? get_theme_mod('title_border_remove') : '0';
			$border_bottom = ($title_bottom_border != '1') ? 'content:inherit; height:0;' :'padding-bottom:0; margin-bottom:0px;';
			$title_border_bottom = ($title_bottom_border != '1') ? 'margin-bottom:0!important;' :'margin-bottom:0!important; padding-bottom:20px!important;';
			$page_bread_crumb = get_theme_mod('bread_crumb_remove') ? get_theme_mod('bread_crumb_remove') : '0' ;
		}
		if( $paget_title_position == 'left' ) {
			$titleposition = 'left:0; background-color:'.$page_title_color.';';
			if( $page_bread_crumb == 'on' || $page_bread_crumb == '0' ){  $width = '70%';  }else{ $width =''; }
		}elseif( $paget_title_position == 'right' ){
			$titleposition = 'right:0; background-color:'.$page_title_color.';';
			if( $page_bread_crumb == 'on' || $page_bread_crumb == '0' ){  $width = '70%'; }else{ $width =''; }
		}elseif( $paget_title_position == 'center' ){
			$titleposition = 'margin:0px auto; left:0; right:0; background-color:'.$page_title_color.';';
			if( $page_bread_crumb == 'on' || $page_bread_crumb == '0' ){  $width = ''; }else{ $width =''; }
		}else{
			$titleposition = '';
			$width = '';
		}
		$kaya_custom_title_description=get_post_meta($post_item_id,'kaya_custom_title_description',true);
		$select_page_title_option=get_post_meta($post_item_id,'select_page_title_option',true);
		$page_description_enable = ( $select_page_title_option == 'custom_page_title' ) ? $kaya_custom_title_description :'';
		$css = '';
		if( $select_page_title_background_type == 'bg_type_color' ){
			$css .= '.sub_header_wrapper{ background-color:'.$page_title_bar_bg_color.' }';
		}
		$css .= '#crumbs a{ color:'.$bread_crumb_link_color.'} ';
		$css .= '#crumbs{ color:'.$bread_crumb_text_color.'} ';

		$css .='.sub_header_wrapper h2{font-weight:'.$title_font_weight.'; font-style:'.$title_font_style.'; }';
		$css .='.sub_header_wrapper p{	font-weight:'.$description_font_weight.';font-style:'.$description_font_style.'; }';

		$css .= '.sub_header h2:after{'.$titleposition.' }';
		$css .= '.sub_header h2:after{'.$border_bottom.' }';
		$css .='.sub_header h2{	'.$title_border_bottom.';	}';
		if(!empty( $page_description_enable )) {
			$css .='.sub_header p{ margin-top:15px!important;	}';
		}
		if( $page_bread_crumb == 'on' || $page_bread_crumb == '0' ){
			$css .='.page_title_wrapper{ width:'.$width.';}';
		}
		 echo "<style type=\"text/css\">\n" . $css . "\n</style>";
	}
}	
add_action('wp_head','page_title_background_color');
/*-------------------------------------------------------------------------------------------
Page title bar display 
--------------------------------------------------------------------------------------------*/
if(!function_exists('kaya_custom_pagetitle')){
	function kaya_custom_pagetitle( $post_id )
	{
		global $post_item_id, $post;
		echo  kaya_post_item_id();
		//if( is_front_page() ){ } else{
		$select_page_title_customization=get_post_meta($post_item_id,'select_page_title_customization',true);
		$page_bread_crumb = get_theme_mod('bread_crumb_remove') ? get_theme_mod('bread_crumb_remove') : '0' ;
		$page_title_color = get_theme_mod('page_titlebar_title_color') ? get_theme_mod('page_titlebar_title_color') : '#333333';
		$page_description_color = get_theme_mod('title_description_color') ? get_theme_mod('title_description_color') : '#454545';
		$page_title_bar_padding_t_b = get_theme_mod('page_title_bar_padding_t_b') ? get_theme_mod('page_title_bar_padding_t_b') : '50';
		$title_left_right_border='';
		$paget_title_position=get_theme_mod('page_title_des_position') ? get_theme_mod('page_title_des_position') : 'left';
		$enable_fullscreen_height='';
		$page_title_font_size = get_theme_mod('page_title_font_size') ? get_theme_mod('page_title_font_size') : '25';
		$page_description_font_size = get_theme_mod('page_description_font_size') ? get_theme_mod('page_description_font_size') : '16';
		$subheader_titleoptions=get_post_meta($post_item_id,'subheader_titleoptions',true);
		if( $paget_title_position == 'left' ) {
			$titleposition = 'float:left; text-align:left;';
			$bread_crumb = 'float:right';
			$desc_margin = '';
		}elseif( $paget_title_position == 'right' ){
			$titleposition = 'float:right; text-align:right;';
			$desc_margin = '';
			$bread_crumb = 'float:left';
		}elseif( $paget_title_position == 'center' ){
			$titleposition = 'margin:0px auto 0; text-align:center;';
			$bread_crumb = 'margin:10px auto 0';
			$desc_margin = '';
		}else{ 
			$titleposition = 'float:left; text-align:left;';
			$bread_crumb = 'float:right';
			$desc_margin = '';
		}
		echo '<section class="sub_header_wrapper">';
		page_title_background_image($post_id);
			echo '<div class="sub_header container" style="padding:'.$page_title_bar_padding_t_b.'px 0;">';
			echo '<div class="page_title_wrapper" style="'.$titleposition.'">';
			//$css = '#crumbs > a{ color:'.$bread_crumb_link_color.'; }';
			$kaya_custom_title=get_post_meta($post_item_id,'kaya_custom_title',true);
			$kaya_custom_title_description=get_post_meta($post_item_id,'kaya_custom_title_description',true);
			$select_page_title_option=get_post_meta($post_item_id,'select_page_title_option',true);
			$page_description_enable = ( $select_page_title_option == 'custom_page_title' ) ? $kaya_custom_title_description :'';
			$page_title_enable = ( $select_page_title_option == 'custom_page_title' ) ? $kaya_custom_title :get_the_title($post_id);
			if(is_page()){
				echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';"> '.$page_title_enable.'</h2>';			
				if(!empty( $page_description_enable )) {		
					echo '<P style="font-size:'.$page_description_font_size.'px; color:'.$page_description_color.';">'.$page_description_enable.'</P>';
				} 
			}elseif(is_home()){
				echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';">'.get_the_title( get_option('page_for_posts', true) ).'</h2>';

			}elseif( is_single()){ 
				echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';"> '.$page_title_enable.'</h2>';
				if(!empty( $page_description_enable )) {		
					echo '<P style="font-size:'.$page_description_font_size.'px; color:'.$page_description_color.';">'.$page_description_enable.'</P>';
				}  ?>
			<?php	} elseif(is_tag()){ ?>
			<?php echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';">';
				 printf( __( 'Tag Archives: %s', 'petstore' ), single_cat_title( '', false ) ); ?>
			</h2>
		<?php }
		elseif ( is_author() ) {
			the_post();
			echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';">'.sprintf( __( 'Author Archives: %s', 'petstore' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ).'</h2>';
			rewind_posts();

		} elseif (is_category()) { ?>
			<?php echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';">'; ?>
				<?php printf( __( 'Category Archives: %s', 'petstore' ), single_cat_title( '', false ) ); ?>
			</h2>
		<?php }  elseif( is_tax() ){
		global $post;
			$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
			 echo '<h2 style="'.$titleposition.'; font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';">' .$term->name.'</h2>';

		}elseif (is_search()) { ?>
				<?php echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';">'; ?><?php printf( __( 'Search Results for: %s', 'petstore' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
		<?php }elseif (is_404()) { ?>
				<?php echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';">'; ?> <?php _e( 'Error 404 - Not Found', 'petstore' ); ?> </h2>
			<?php }
			elseif ( is_day() ){ ?>
			<?php echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';">'; ?>
				<?php  printf( __( 'Daily Archives: %s', 'petstore' ), '<span>' . get_the_date() . '</span>' ); ?>
			</h2>
			<?php }			 
			 elseif ( is_month() ) { ?>
			 <?php echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';">'; ?>
			<?php 	printf( __( 'Monthly Archives: %s', 'petstore' ), '<span>' . get_the_date( 'F Y' ) . '</span>' ); ?>
			</h2>
			<?php } elseif ( is_year() ){ ?>
				<h2>	<?php printf( __( 'Yearly Archives: %s', 'petstore' ), '<span>' . get_the_date( 'Y' ) . '</span>' ); ?> </h2>
			<?php }elseif ( class_exists('woocommerce') ){
				if( is_shop() ) { 
					if($kaya_custom_title=get_post_meta(woocommerce_get_page_id('shop'),'kaya_custom_title',true)) {		
						echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';">'.$kaya_custom_title.'</h2>';			
					} 
					else{
						echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';">'; ?> <?php _e('Shop','petstore'); ?></h2>
					<?php }
					if($kaya_custom_title_description=get_post_meta(woocommerce_get_page_id('shop'),'kaya_custom_title_description',true)) {		
						echo '<P style="font-size:'.$page_description_font_size.'px; color:'.$page_description_color.';">'.$kaya_custom_title_description.'</P>';
					} ?>
			<?php }else { ?>
			<?php echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';">'; ?>	<?php _e( 'Blog Archives', 'petstore' ); ?> </h2> 
			<?php }
			}
		echo '</div>';
		$select_page_title_customization=get_post_meta($post_item_id,'select_page_title_customization',true);
		if(  $select_page_title_customization == 'custom_page_title_options' ){	
			if( $page_bread_crumb == 'on' || $page_bread_crumb == '0' ):
				echo '<div id="crumbs" style="'.$bread_crumb.'">';
					kaya_breadcrumbs(); 
				echo '</div>';
			endif;
		}else{
			if( $page_bread_crumb == '0' ){
				echo '<div id="crumbs" style="'.$bread_crumb.'">';
					kaya_breadcrumbs(); 
				echo '</div>';
			}
		}	
		echo'</div>';
		echo'</section>';
		//}
	}
}
/* ----------------------------------------------------------------------------------
// Header Top Section
-----------------------------------------------------------------------------------*/
function header_top_section( $boxed_header_class){ ?>
  <?php 
  	$top_bar_right_content = get_theme_mod('top_bar_right_content') ?  get_theme_mod('top_bar_right_content') : ""; 
  	$disable_top_header_user_login_info = get_theme_mod('disable_top_header_user_login_info') ?  get_theme_mod('disable_top_header_user_login_info') : "0";
  	$cart_icon = get_theme_mod('menu_bar_cart_icon') ? get_theme_mod('menu_bar_cart_icon') : '0'; ?>
        <!-- Header Right Section / Woocommerce section -->  
          <?php
          	
	          	if ( class_exists( 'WooCommerce' ) ) { ?>
	          		 <div class="header_top_section" style="padding:10px 0;">
      <div class="<?php echo $boxed_header_class; ?>">
      	<div class="top_left_section one_half">
      	 <?php if( has_nav_menu( 'topmenu' ) ){
				   wp_nav_menu( array( 'container_class' => 'top-menu', 'theme_location' => 'topmenu' , 'menu_class' => '') );
                   } ?> 
               </div>
	          		<?php echo '<div class="top_right_section one_half_last">';
	          		echo do_shortcode($top_bar_right_content);
	          		if( $disable_top_header_user_login_info !='1' ){
				  	if ( is_user_logged_in() ) { ?>
						<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','petstore'); ?>"><i class="fa fa-user"> </i><?php _e('My Account','petstore'); ?></a>&nbsp;<i class"top_header_seperator" style="font-size:15px; font-weight:bold;">&#47;</i>
						<a href="<?php echo wp_logout_url( get_permalink( woocommerce_get_page_id( 'myaccount' ) ) ); ?>"><i class="fa fa-power-off"> </i><?php _e('Logout','petstore'); ?></a>
					<?php }
					else { ?>
						<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','petstore'); ?>"><i class="fa fa-lock"> </i><?php _e('Login / Register','petstore'); ?></a>
					<?php } 
				}
			}
			if( $cart_icon != '1' ){
				if( class_exists('woocommerce')){
					global $woocommerce;
					$url =  $woocommerce->cart->get_cart_url(); ?>
					<li class="menu_shop_cart_icon"><a href="<?php echo $url; ?>" class="cart-contents"><i class="fa fa-shopping-cart"></i>&nbsp;<span><?php echo sprintf(_n('%d ', '%d', $woocommerce->cart->cart_contents_count, 'petstore' ), $woocommerce->cart->cart_contents_count); ?> </span></a></li>
				<?php } 
			} ?>
        </div>
      </div>
    </div>
	<?php }
function kaya_header_menu( $disable_search_box ){ ?>	
	<div class="nav_wrap">
		<?php 
		if (has_nav_menu('primary')) {
			wp_nav_menu(array('echo' => true, 'container_id' => 'myslidemenu','menu_id'=> 'main-menu', 'container_class' => 'menu','theme_location' => 'primary', 'menu_class'=> 'sm sm-blue'));
		}else{
		wp_nav_menu(array('echo' => true, 'container_id' => 'myslidemenu','menu_id'=> 'main-menu', 'container_class' => 'menu','theme_location' => '', 'menu_class'=> 'sm sm-blue'));
		}
		if( $disable_search_box == '0' ):	?>
			<div class="main_search_wrapper">
				<div class="search_box_icon"><i class="fa fa-search"> </i></div>
			</div>
		<?php endif; ?>
	</div>				
<?php }
/* --------------------------------------
Page Header Section 
----------------------------------------*/
function mobile_menu_icons( $disable_search_box ){ ?>
	<div class="mobile_icons">
		<div class="mobile_toggle_menu"><i class="fa fa-bars"> </i></div>
		<?php if( $disable_search_box == '0' ):	?>
			<div class="mobile_search_icon">
				<div class="search_box_icon"><i class="fa fa-search"> </i></div>
			</div>
		<?php endif; ?>
	</div>
<?php }
function header_logo_left($enable_fluid_header, $disable_search_box){
	$top_bar_left_content = get_theme_mod('top_bar_left_content') ? get_theme_mod('top_bar_left_content') : "<h3>Free phone:</h3><h2>800-2345-6789</h2>";
	$sticky_header_disable = ( get_option( 'sticky_header_disable' )  != '1' ) ? '' : 'sticky';
		echo '<header id="header_wrapper">';
		echo '<div class="container">';
			echo '<div class="logo_left">';	
				kaya_logo_image(); 
			echo '</div>';
			echo '<div class="conatact_details">'; 
           echo do_shortcode($top_bar_left_content);
       echo '</div>';
        mobile_menu_icons( $disable_search_box );		
       echo '</div>';
	echo '</header>';
	echo '<nav class="header_menu_section header_menu_right '.$sticky_header_disable.'" >';
	echo '<div class="container">';
	 				kaya_header_menu($disable_search_box);
	 				echo '</div>';
				echo '</nav>';
}
if( !function_exists('page_top_bottom_header') ){
	function page_top_bottom_header($header_logo_position,$enable_fluid_header, $disable_search_box){
		header_logo_left($enable_fluid_header, $disable_search_box);
		?>
	<?php }
}
/*-----------------------
Page left section
-------------------------*/

if( !function_exists('page_left_header') ){
	function page_left_header($header_menu_position){
		$upload_header = get_option('upload_header');
		$backgroundbg_repeat = get_theme_mod('backgroundbg_repeat') ? get_theme_mod('backgroundbg_repeat') : 'repeat';
		$backgroundbg_image_repeat = ( $backgroundbg_repeat == 'repeat' ) ? 'inherit' : 'cover';
		echo '<div id="left_header_section" class="kaya_'.$header_menu_position.'_position">';
			if( $upload_header['bg_image'] ){ 
				echo '<div class="side_header_bg_image" style="background-image:url('.$upload_header['bg_image'].'); background-repeat:'.$backgroundbg_repeat.'"> </div>';
			}	
	   			 kaya_logo_image(); ?>
	   			<div class="mobile_icons">
				<div class="mobile_toggle_menu"><i class="fa fa-bars"> </i></div>
				<?php //if( $disable_search_box == '0' ):	?>
								<div class="mobile_search_icon">
										<div class="search_box_icon"><i class="fa fa-search"> </i></div>
									</div>
								<?php //endif; ?>
				</div>		
	   			<?php echo '<div class="left_nav_wrap">';
				if (has_nav_menu('primary')) {
					wp_nav_menu(array('echo' => true, 'container_id' => '','menu_id'=> 'jqueryslidemenu', 'container_class' => 'left_menu menu','theme_location' => 'primary', 'menu_class'=> 'menu'));
				}else{
				wp_nav_menu(array('echo' => true, 'container_id' => 'myslidemenu','menu_id'=> 'jqueryslidemenu', 'container_class' => 'left_menu menu','theme_location' => '', 'menu_class'=> 'menu'));
				}
				echo '</div>';
				$header_description_section = get_theme_mod('header_description_section') ? get_theme_mod('header_description_section') : '';
				if(!empty($header_description_section)){
					echo '<div class="sidebar_bottom_content">';
			   			echo do_shortcode($header_description_section);
			   		echo '</div>';
		   		}
	   		echo '</div>';
	   		echo '<div class="kaya_mid_content_right_section">';
	   		echo '<div class="page_title_content_wrapper">';
	     			do_action('kaya_subheader_data');
	     	echo '</div>';		
	}
}	
/*-----------------------
Page Right Section
-------------------------*/
if( !function_exists('page_right_header') ){
	function page_right_header($header_menu_position){
		$upload_header = get_option('upload_header');
		$backgroundbg_repeat = get_theme_mod('backgroundbg_repeat') ? get_theme_mod('backgroundbg_repeat') : 'repeat';
		$backgroundbg_image_repeat = ( $backgroundbg_repeat == 'repeat' ) ? 'inherit' : 'cover';
		echo '<div id="right_header_section" class="kaya_'.$header_menu_position.'_position">';
			if( $upload_header['bg_image'] ){ 
				echo '<div class="side_header_bg_image" style="background-image:url('.$upload_header['bg_image'].'); background-repeat:'.$backgroundbg_repeat.'"> </div>';
			}	
	   			 kaya_logo_image(); ?> 
				<div class="mobile_icons">
				<div class="mobile_toggle_menu"><i class="fa fa-bars"> </i></div>
				<?php //if( $disable_search_box == '0' ):	?>
						<div class="mobile_search_icon">
							<div class="search_box_icon"><i class="fa fa-search"> </i></div>
						</div>
					<?php //endif; ?>
				</div>	
	   			<?php echo '<div class="right_nav_wrap">';
				if (has_nav_menu('primary')) {
					wp_nav_menu(array('echo' => true, 'container_id' => '','menu_id'=> 'jqueryslidemenu', 'container_class' => 'right_menu menu','theme_location' => 'primary', 'menu_class'=> 'menu'));
				}else{
				wp_nav_menu(array('echo' => true, 'container_id' => 'myslidemenu','menu_id'=> 'jqueryslidemenu', 'container_class' => 'right_menu menu','theme_location' => 'primary', 'menu_class'=> 'menu'));
				}
				echo '</div>';
				$header_description_section = get_theme_mod('header_description_section') ? get_theme_mod('header_description_section') : '';
		   		if(!empty($header_description_section)){
					echo '<div class="sidebar_bottom_content">';
			   			echo do_shortcode($header_description_section);
			   		echo '</div>';
		   		}
	   		echo '</div>';
	   		echo '<div class="kaya_mid_content_left_section">';
	  		echo '<div class="page_title_content_wrapper">';
	     			do_action('kaya_subheader_data');
	     	echo '</div>';
	}
}	
/*-----------------------
Include Related Post Section
-------------------------*/
	get_template_part('lib/includes/relatedpost');

/*-----------------------
Post View Count
-------------------------*/
if( !function_exists('observePostViews') ){
	function observePostViews($postID) {
		$count_key = 'post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if($count==''){
			$count = 0;
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
		}else{
			$count++;
			update_post_meta($postID, $count_key, $count);
		}
	}
}
if( !function_exists('fetchPostViews') ){
	function fetchPostViews($postID){
		$count_key = 'post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if($count==''){
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
			return "0 View";
		}
		return $count.' Views';
	}	
}
/*-----------------------
Footer Columns Load
-------------------------*/
if( !function_exists('kaya_footercolumn') ){
	function kaya_footercolumn( $column )
	{
		// column wise  footer widget
		if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar('footer_column_'.$column.'') ) : ?>
			<div class="widget_container">
	        <span class="widget_title">
	        	<h3> <?php _e( ' Footer Column ', 'kaya_admin' ); echo $column; ?> </h3>
	        </span>	
	            <p>
	                <?php _e( 'Wesce sit amet porttitor leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque interdum, nulla sit amet varius dignissim Vestibulum pretium risus', 'petstore' ); ?>
	            </p>	
		 	</div>
		<?php endif; 
	}
}
/*-----------------------
Menu Customization
-------------------------*/
/*include_once('menu_edit.php');
if( !class_exists('Kaya_Description_Walker') ){
	class Kaya_Description_Walker extends Walker_Nav_Menu
	{

		function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat("\t", $depth);
			if($depth == 0){
				$out_div = '<div class="megamenu_wrapper">';
			}else{
				$out_div = '';
			}
			$output .= "\n" . $indent . $out_div  .'<ul>' . "\n";
		}
		function end_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat("\t", $depth);
			if($depth == 0){
				$out_div_close = '</div>';
			}else{
				$out_div_close = '';
			}
			$output .= "$indent</ul>". $out_div_close ."\n";
		}

		function start_el(&$output, $item, $depth = 0, $args = Array(), $current_object_id = 0)
		{
		   global $wp_query;
			$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
		   $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		   $class_names = $value = '';
		   $classes = empty( $item->classes ) ? array() : (array) $item->classes;
		   $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		   $menu_display_type = '';
		   if( $depth == 0 ){
		       	if( $item->display_menu == 'wide_menu' ){
		       		$menu_display_type = 'wide_menu wide_menu_columns_'.$item->display_menu_columns.'';
		       	}else{
		       		$menu_display_type = 'narrow_menu';
		       	}
				}
			$class_names = ' class="'. esc_attr( $class_names ) . ' ' .$menu_display_type . '"';
		   $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names . '>';
		   $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		   $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		   $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		   $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		   $prepend = '<strong>';
		   $append = '</strong>';
		   $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';
		   if($depth != 0)
		   {
		      $description = $append = $prepend = "";
		  }
		  $item_desc='';
		   if($item->awsome_icon){
		  $item_desc='<i class="fa '.esc_attr( $item->awsome_icon ).'"> </i>&nbsp;';
		  }
		  //$args = (object) $args;
		    $item_output = $args->before;
		    if( empty($attributes) ){
		    	$item_output .= '<strong>'.$item_desc.'';
		        $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
		        $item_output .= $description.$args->link_after;
		        $item_output .= '</strong>';
		    }else{
		    	$item_output .= '<a'. $attributes .'>'.$item_desc.'';
		        $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
		        $item_output .= $description.$args->link_after;
		        $item_output .= '</a>';
		    }
		    $item_output .= $args->after;
		    if($item->nolink == ""){
		    	 //if ( is_object( $args[0]->has_children ) ) {
					$item_output .= '<span class="mobile_drop_down_icons"><i class="fa fa-angle-right"></i><i class="fa fa-angle-down"></i></span>';
			//	}else{
				//	$item_output .= '<span class="mobile_drop_down_icons"><i class="fa fa-angle-right"></i><i class="fa fa-angle-down"></i></span>';
				//}
			}	
		    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
}*/
/*-----------------------
Page Post ID Display
-------------------------*/
if( !function_exists('kaya_post_item_id') ){
	function kaya_post_item_id(){
		 global $post_item_id, $post;
		if( class_exists('woocommerce')){	
			if( is_shop() ){
				$post_item_id = woocommerce_get_page_id( 'shop' );
			}
			else{
				if( get_post()){ $post_item_id = $post->ID;}
			}
		}
		elseif(get_post()){
			$post_item_id = $post->ID;
		}else{

		}
	}
}
function petstore_woo_product_search(){
 $form = '<form role="search" method="get" class="searchbox-wrapper search_form" id="searchform" action="' . esc_url( home_url( '/'  ) ) . '">
			<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __( 'Search Here...', 'petshop' ) . '" />
		<input type="hidden" name="post_type" value="product" />
	</form>';

echo $form; 
}

/*-----------------------
Bread Crumb Disaply
-------------------------*/
if( !function_exists('kaya_breadcrumbs') ){
	function kaya_breadcrumbs() { 
  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = '<span class="delimiter fa fa-angle-right"> </span>'; // delimiter between crumbs
  $home = 'Home'; // text for the 'Home' link
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $before = ''; // tag before the current crumb
  $after = ''; // tag after the current crumb 
  global $post;
  $homeLink = esc_url( home_url() ); 
  if (is_home() || is_front_page()) { 
    if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
 
  } else {
 
    echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
      echo $before . 'Archive by category';
 
    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
        //if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ' . '' . ' ');
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
        echo $cats;
        //if ($showCurrent == 1) echo $before . get_the_title() . $after;
      } 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
      }
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page', 'petstore') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
  }
} 
}
if(!function_exists('kaya_hex_rgba_color')){
	function kaya_hex_rgba_color($hex) {
	   $hex = str_replace("#", "", $hex);
	   if(strlen($hex) == 3) {
	      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
	      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
	      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
	   } else {
	      $r = hexdec(substr($hex,0,2));
	      $g = hexdec(substr($hex,2,2));
	      $b = hexdec(substr($hex,4,2));
	   }
	  // $rgb = array($r, $g, $b);
	   $rgb = $r.', '.$g.', '.$b;
	   return $rgb; 
	}
}
?>