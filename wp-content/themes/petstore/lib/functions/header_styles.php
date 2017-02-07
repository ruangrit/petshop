<?php
//
function header_logo_right($enable_fluid_header, $disable_search_box){
	echo '<header id="header_wrapper" class="header_left_menu_right_logo">';
		echo '<div class="header_logo_section '.$enable_fluid_header.'">';
			echo '<div class="one_third_last  logo_right">';	
				kaya_logo_image(); 
			echo '</div>';
			mobile_menu_icons( $disable_search_box );
			echo '<div class="two_third left_menu">';
				echo '<div class="header_menu_section" >';
	 				kaya_header_menu($disable_search_box);
				echo '</div>';
			echo '</div>';	
		echo '</div>';
	echo '</header>';	
}
//
function header_logo_center($enable_fluid_header, $disable_search_box){
	$header_logo_right_content = get_theme_mod('header_logo_right_content') ? get_theme_mod('header_logo_right_content') : '';
	$header_logo_left_content = get_theme_mod('header_logo_left_content') ? get_theme_mod('header_logo_left_content') : '';
	$menu_bar_position_top = get_theme_mod('menu_bar_position_top') ? get_theme_mod('menu_bar_position_top') : '0';
	if( $menu_bar_position_top == '1' ){
		echo '<div class="header_menu_section fullwidth" >';
			echo '<nav class="container">';
		 		kaya_header_menu($disable_search_box);
		 	echo '</nav>';
		echo '</div>';
	}
	echo '<header id="header_wrapper" class="">';
		echo '<div class="header_logo_section container">';
			echo '<div class="one_third left_content">&nbsp;'; // Text Left
				echo do_shortcode($header_logo_left_content);
			echo '</div>';
			echo '<div class="one_third  logo_center">'; // Logo Center	
				kaya_logo_image(); 
			echo '</div>';
			echo '<div class="one_third_last right_content">&nbsp;'; // Text Right Content
				echo do_shortcode($header_logo_right_content);
			echo '</div>';	
		echo '</div>';
		mobile_menu_icons( $disable_search_box );
	echo '</header>';
	if( $menu_bar_position_top != '1' ){
		echo '<div class="header_menu_section fullwidth" >';
			echo '<nav class="container">';
		 		kaya_header_menu($disable_search_box);
		 	echo '</nav>';
		echo '</div>';
	}	
}
//
function header_logo_left_content_right($enable_fluid_header, $disable_search_box){
	$header_logo_right_content = get_theme_mod('header_logo_right_content') ? get_theme_mod('header_logo_right_content') : '';
	$menu_bar_position_top = get_theme_mod('menu_bar_position_top') ? get_theme_mod('menu_bar_position_top') : '0';
	if( $menu_bar_position_top == '1' ){
		echo '<div class="header_menu_center_position header_menu_section fullwidth" >';
			echo '<nav class="container">';
		 		kaya_header_menu($disable_search_box);
		 	echo '</nav>';
		echo '</div>';		
	}
	echo '<header id="header_wrapper" class="header_left_logo_menu_center">';
		echo '<div class="header_logo_section container">';
			echo '<div class="one_third  logo_left">';	
				kaya_logo_image(); 
			echo '</div>';
			echo '<div class="two_third_last right_content">';
				echo do_shortcode($header_logo_right_content);
			echo '</div>';	
		echo '</div>';	
		mobile_menu_icons( $disable_search_box );
	echo '</header>';
	if( $menu_bar_position_top != '1' ){
		echo '<div class="header_menu_center_position header_menu_section fullwidth" >';
			echo '<nav class="container">';
		 		kaya_header_menu($disable_search_box);
		 	echo '</nav>';
		echo '</div>';		
	}	

}
//
function header_logo_right_content_left($enable_fluid_header, $disable_search_box){
	$header_logo_left_content = get_theme_mod('header_logo_left_content') ? get_theme_mod('header_logo_left_content') : '';
	$menu_bar_position_top = get_theme_mod('menu_bar_position_top') ? get_theme_mod('menu_bar_position_top') : '0';
	if( $menu_bar_position_top == '1' ){
		echo '<div class="header_menu_section fullwidth" >';
			echo '<nav class="container">';
		 		kaya_header_menu($disable_search_box);
		 	echo '</nav>';
		echo '</div>';
	}
	echo '<header id="header_wrapper" class="">';
		echo '<div class="header_logo_section container">';
			echo '<div class="one_third_last  logo_right">';	
				kaya_logo_image(); 
			echo '</div>';
			echo '<div class="two_third left_content">';
			echo do_shortcode($header_logo_left_content);
			echo '</div>';	
		echo '</div>';
		mobile_menu_icons( $disable_search_box );
	echo '</header>';
	if( $menu_bar_position_top != '1' ){
		echo '<div class="header_menu_section fullwidth" >';
			echo '<nav class="container">';
		 		kaya_header_menu($disable_search_box);
		 	echo '</nav>';
		echo '</div>';
	}
}
//
function header_logo_center_left_right_menu($disable_search_box){
	$header_logo_left_content = get_theme_mod('header_logo_left_content') ? get_theme_mod('header_logo_left_content') : '';
	echo '<header id="header_wrapper" class="">';
		echo '<div class="header_logo_section container header_left_right_menu">';
			echo '<nav class="center_logo_left_menu">';
				//kaya_header_menu($disable_search_box);
				wp_nav_menu(array('echo' => true, 'container_id' => '','menu_id'=> '', 'container_class' => 'header_left_menu menu','theme_location' => 'left_menu', 'menu_class'=> '', 'walker' => new Kaya_Description_Walker()));
			echo '</nav>';
			echo '<div class="inner_logo_center">';	
				kaya_logo_image(); 
			echo '</div>';
			echo '<nav class="center_logo_right_menu">';
				//kaya_header_menu($disable_search_box);
			wp_nav_menu(array('echo' => true, 'container_id' => '','menu_id'=> 'jqueryslidemenu', 'container_class' => 'header_right_menu menu','theme_location' => 'right_menu', 'menu_class'=> '', 'walker' => new Kaya_Description_Walker()));
			echo '</nav>';
			mobile_menu_icons( $disable_search_box );
		echo '</div>';
	
	echo '<div class="mobile_menu header_menu_section fullwidth" >';
		echo '<nav class="container">';
	 		kaya_header_menu($disable_search_box);
	 	echo '</nav>';
	echo '</div>';
echo '</header>';
}
?>