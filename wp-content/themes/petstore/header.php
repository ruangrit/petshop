<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<?php 
 $responsive_mode = get_theme_mod( 'responsive_layout_mode' ) ? get_theme_mod( 'responsive_layout_mode' ) : 'on';
if($responsive_mode == "on"){ ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0" />
<?php } ?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<?php
 wp_head();
  ?>
 </head>
<body <?php body_class(); ?> >
	<?php 
	$theme_layout_mode = get_theme_mod('theme_layout_mode') ? get_theme_mod('theme_layout_mode'):'0';
	$kaya_layout_class = ( $theme_layout_mode == '1' ) ?  'box_layout' : 'fluid_layout';
	$boxed_container_class = ( $kaya_layout_class == 'boxed' ) ?  '' : 'container'; ?>
	<?php $boxed_header_class = ( $kaya_layout_class == 'boxed' ) ?  'boxed_header' : 'container'; 
	$header_logo_position = get_theme_mod('header_logo_position') ? get_theme_mod('header_logo_position'):'left';
	$enable_fluid_header = ( get_option('enable_fluid_header') == '1') ? 'fluid_header' : 'container';
	$disable_search_box = get_theme_mod('disable_search_box') ? get_theme_mod('disable_search_box') : '0';
	$header_menu_position = get_theme_mod('header_position') ? get_theme_mod('header_position') : 'top';
	$header_postion = ($header_menu_position == 'bottom') ? 'bottom_header' : 'top_header';
	if( $header_menu_position == 'bottom' ){
		$bottom_sticky = get_theme_mod('sticky_header_position') ? get_theme_mod('sticky_header_position') :'bottom_position';
		$bottom_header_sticky = ($bottom_sticky == 'bottom_position') ? 'bottom_sticky_header' : 'top_sticky_header';
	$bottom_sticky_activat1 = ($sticky_header_disable == '1') ? '' : $bottom_header_sticky;
	}else{ $bottom_sticky_activat1 = ''; }
	$main_layout_width = ( ($header_menu_position == 'bottom') || ($header_menu_position == 'top') ) ? $kaya_layout_class : 'fluid_layout';
	$header_bottom_shadow = get_theme_mod('header_bottom_shadow') ? get_theme_mod('header_bottom_shadow'):'0'; // header bottom shadow
	?>
	<!--Start header  section -->
	<section id="<?php echo $main_layout_width; ?>"><!-- Main Layout Section Start -->
	<div class="search_box_wrapper">
			<div class="container">
				<div class="search_close_button"><i class="fa fa-times"></i></div>
				<?php petstore_woo_product_search(); ?>
			</div>
			</div>
	<?php if( ($header_menu_position == 'bottom') || ($header_menu_position == 'top') ): ?>
	<div id="main_content_inner_section">			
		<?php header_top_section($boxed_header_class); ?>
	 <div id="header_container" class="<?php echo $header_postion.' '.$bottom_sticky_activat1; ?>" >
	 	<?php  page_top_bottom_header($header_logo_position,$enable_fluid_header, $disable_search_box); ?>
	</div> <!--end header section -->
	<?php if( $header_bottom_shadow == '1' ): ?>
		<div class="header_below"></div>
	<?php  endif; ?>
	<!--navigation start -->
	<?php  do_action('kaya_subheader_data'); ?>
   	</div>
   	<?php
   	elseif($header_menu_position == 'left'):
   		page_left_header($header_menu_position);
   	elseif($header_menu_position == 'right'):
   		page_right_header($header_menu_position);		
   	else:
   	
   	endif; ?>