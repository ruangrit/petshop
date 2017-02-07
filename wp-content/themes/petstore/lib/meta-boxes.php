<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/docs/define-meta-boxes
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = '';

$meta_boxes = array();

/* ----------------------------------------------------- 

$revolutionslider = array();
$revolutionslider[0] = 'Select Slider Type';

if(class_exists('RevSlider')){
    $slider = new RevSlider();
	$arrSliders = $slider->getArrSliders();
	foreach($arrSliders as $revSlider) { 
		$revolutionslider[$revSlider->getAlias()] = $revSlider->getTitle();
	}
}
*/ 
$kayaslider_array =get_terms('slider_category','hide_empty=1');
if( taxonomy_exists('slider_category') ){
	$kaya_slider = array();
	if(!empty($kayaslider_array)){
		foreach ($kayaslider_array as $sliders) {
		$kaya_slider[$sliders->slug] = $sliders->name;
		$sliders_ids[] = $sliders->slug;
		}
	}else{
		//$sliders_ids[] = 'no-categories';
	}	
	}else{
	$kaya_slider = '';
}		
/* ----------------------------------------------------- */
// Page Settings
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'pagesettings',
	'title' => __('Custom Options','petstore'),
	'pages' => array( 'page','post','portfolio' ),
	'context' => 'normal',
	'priority' => 'high',

	// List of meta fields
	'fields' => array(
		array(
			'name'		=> __('Choose Subheader Style','petstore'),
			'id'		=> $prefix . "select_page_options",
			'class'     => 'select_page_options',
			'type'		=> 'select',
			'options'	=> array(
				'page_title_setion'		=> __('Page Title bar','petstore'),
				"page_slider_setion"	=> __("Header Slider",'petstore'),
				'video_bg' => __('Video Background','petstore'),
				'none' => __('None','petstore'),			
			),
			'multiple'	=> false,
			'std'		=> array( 'title' ),
			'desc'		=> ''
		),
		array(
			'name'		=> __('Page Title','petstore'),
			'id'		=> $prefix . "select_page_title_option",
			'class'     => 'select_page_title_option',
			'type'		=> 'select',
			'options'	=> array(
				'default_page_title'		=> __('Default Page Title','petstore'),
				"custom_page_title"	=> __("Custom Page Title",'petstore'),
			),
			'multiple'	=> false,
			'std'		=> array( 'title' ),
			'desc'		=> ''
		),
		array(
				'name'		=> __('Custom Page Title','petstore'),
				'id'		=> $prefix . "kaya_custom_title",
				'class'     => 'kaya_custom_title',
				'type'		=> 'text',
				'std'		=> 'Enter page custom title',
				'std'		=> ''
		),
		array(
				'name'		=> __('Page Title Description','petstore'),
				'id'		=> $prefix . "kaya_custom_title_description",
				'class'     => 'kaya_custom_title_description',
				'type'		=> 'textarea',
				'std'		=> 'Enter page title description',
				'std'		=> '',
				'cols' => 20,
				'rows' => 1,
		),
		// Slider Section
		array(
			'type' => 'heading',
			'class' => 'header_slider_video',
			'name' => '',
			'id' => 'header_slider_video', // Not used but needed for plugin
			'desc' => __( 'To Know How to Create Header Slider &nbsp;<a target="_blank" href="https://youtu.be/WAUJxTPy3uo">Watch this video</a>', 'petstore' ),
		),
		array(
			'name'		=> __('Select Header Slider Type','petstore'),
			'id'		=> $prefix . "slider",
			'class'     => 'slider',
			'type'		=> 'select',
			'options'	=> array(
				'kaya_post_slider' => __('Kaya Post Slider','petstore'),
				"customslider"	=> __("Slider Plugin Shortcode",'petstore'),
			),
			'multiple'	=> false,
			'std'		=> array( 'title' ),
			'desc'		=> ''
		),

		array(
			'name'	=> __('Upload Images','petstore'),
			'desc'	=> '',
			'id'	=> $prefix . 'page_slider_images',
			'class'     => 'page_slider_images',
			'type'	=> 'image_advanced',
			'max_file_uploads' => 50,
		),
		/* array(
				'name'		=> 'Slide Image Opacity',
				'id'		=> $prefix . "slide_bg_image_opcaity",
				'type'		=> 'text',
				'desc'		=> 'Opacity values 0-1',
				'std'		=> '1'
		),

		array(
			'name' => 'Slide Background Color',
			'desc' => '',
			'id' => $prefix . 'slide_bg_color',
			'type' => 'color',
			'std' => '#333333'
		),  */
		array(
			'name'		=> __('Slide Transition','petstore'),
			'id'		=> $prefix . "Kaya_slider_transitions",
			'class'     => 'Kaya_slider_transitions',
			'type'		=> 'select',
			'options'	=> array(
				'slide'  	=> 'Slide',
				"fade" 	=> "Fade",	
			),
			'multiple'	=> false,
			'std'		=> array( 'title' ),
			'desc'		=> ''
		),
		
		array(
			'name'		=> __('Auto Play','petstore'),
			'id'		=> $prefix . "Kaya_slider_auto_play",
			'class'     => 'Kaya_slider_auto_play',
			'type'		=> 'select',
			'options'	=> array(
				'4000'  => 'True',
				"0" 	=> "False",	
			),
			'multiple'	=> false,
			'std'		=> array( 'title' ),
			'desc'		=> ''
		),
		array(
			'name'	=> __('Slide Transition','petstore'),
			'desc'	=> 'Slide trasition between two slides',
			'id'	=> "Kaya_slider_transitions_time",
			'class'     => 'Kaya_slider_transitions_time',
			'type'	=> 'text',
			'std' => '4000',
		),
		array(
			'name' => __('Slider Next & Prev Buttons Colors','petstore'),
			'desc' => '',
			'id' => $prefix . 'slide_button_color',
			'class'     => 'slide_button_color',
			'type' => 'color',
			'std' => '#ffffff'
		),
	
		/* array(
			'name'	=> 'Slider Height',
			'desc'	=> 'px',
			'id'	=> "kaya_slider_height",
			'type'	=> 'text',
			'std' => '',
		), */
		/* Kaya Post Slider */
		array(
			'name'		=> __('Select Kaya Post Slider Category','petstore'),
			'id'		=> $prefix . "kaya_post_category",
			'class'     => 'kaya_post_category',
			'type'		=> 'checkbox_list',
			'options'	=> $kaya_slider,
			'multiple'	=> false,
			'std'		=> array( 'title' ),
			'desc'		=> ''
		),
		array(
			'name'		=> __('Slide Transition','petstore'),
			'id'		=> $prefix . "Kaya_post_slider_transitions",
			'class'     => 'Kaya_post_slider_transitions',
			'type'		=> 'select',
			'options'	=> array(
				'slide'  	=> 'Slide',
				"fade" 	=> "Fade",	
			),
			'multiple'	=> false,
			'std'		=> array( 'title' ),
			'desc'		=> ''
		),
		array(
			'name' => __( 'Slide Text Animation', 'petstore' ),
			'desc' => __('animation effects','petstore').'<a target="_blank" href="http://daneden.github.io/animate.css/"> '.__(' click here','petstore').'</a>',
			'id' => $prefix . 'slide_text_animate',
			'class'     => 'slide_text_animate',
			'type' => 'select',
			'options' => array(
					'bounce' => 'Bounce',
					'bounceIn'=> 'BounceIn',
					'bounceInLeft' => 'BounceInLeft',
					'bounceInUp' => 'BounceInUp',
					'bounceInDown' => 'BounceInDown',
					'bounceInRight' => 'BounceInRight',
					'fadeIn'=> 'fadeIn',
					'fadeInDownBig' => 'fadeInDownBig',
					'fadeInLeftBig' => 'fadeInLeftBig',
					'fadeInRightBig' => 'fadeInRightBig',
					'fadeInUpBig' => 'fadeInUpBig',
					'fadeInDown'=> 'fadeInDown',
					'fadeInLeft' => 'fadeInLeft',
					'fadeInRight' => 'fadeInRight',
					'fadeInUp' => 'fadeInUp',
					'flip'=> 'flip',
					'flipInX' => 'flipInX',
					'flipInY' => 'flipInY',
					'flipOutX' => 'flipOutX',
					'flipOutY' => 'flipOutY',
					'lightSpeedIn'=> 'lightSpeedIn',
					'lightSpeedOut' => 'lightSpeedOut',
					'rotateIn'=> 'rotateIn',
					'rotateInDownLeft' => 'rotateInDownLeft',
					'rotateInDownRight' => 'rotateInDownRight',
					'rotateInUpLeft' => 'rotateInUpLeft',
					'slideInDown'=> 'slideInDown',
					'slideInUp'=> 'slideInUp',
					'slideInLeft' => 'slideInLeft',
					'slideInRight' => 'slideInRight',
					'slideOutLeft' => 'slideOutLeft',
					'slideOutRight' => 'slideOutRight',
					'hinge'=> 'hinge',
					'rollIn' => 'rollIn',
					'rollOut' => 'rollOut',
					'zoomIn'=> 'zoomIn',
					'zoomInDown' => 'zoomInDown',
					'zoomInLeft' => 'zoomInLeft',
					'zoomInUp'=> 'zoomInUp',
					'zoomInRight' => 'zoomInRight',
					'flash' => 'flash',
					'pulse' => 'Pulse',
					'shake' => 'Shake',
					'tada' => 'Tada',
					'rubberBand' => 'RubberBand',
					'swing' => 'Swing',
					'wobble' => 'Wobble',
        	),
			'std' => 'fadeInUp'
		),
		array(
			'name'		=> __('Auto Play','petstore'),
			'id'		=> $prefix . "Kaya_post_slider_auto_play",
			'class'     => 'Kaya_post_slider_auto_play',
			'type'		=> 'select',
			'options'	=> array(
				'4000'  => 'True',
				"0" 	=> "False",	
			),
			'multiple'	=> false,
			'std'		=> array( 'title' ),
			'desc'		=> ''
		),
		array(
			'name'		=> __('Loop','petstore'),
			'id'		=> $prefix . "post_slide_loop",
			'class'     => 'post_slide_loop',
			'type'		=> 'select',
			'options'	=> array(
				"true" 	=> __('True','petstore'),
				'false'  => __('False','petstore'),
			),
			'multiple'	=> false,
			'std'		=> array( 'title' ),
			'desc'		=> ''
		),
		array(
			'name'	=> __('Slide Transition','petstore'),
			'desc'	=> 'Slide trasition between two slides',
			'id'	=> "Kaya_post_slider_transitions_time",
			'class'     => 'Kaya_post_slider_transitions_time',
			'type'	=> 'text',
			'std' => '4000',
		),
		array(
			'name' => __('Slider Images Order by','petstore'),
			'desc' => '',
			'id' => $prefix . 'post_slide_images_order_by',
			'class'     => 'post_slide_images_order_by',
			'type' => 'select',
			'options' => array(
					'ID' => __('ID','petstore'),
					'menu_order' => __('Menu Order','petstore'),
					'title' => __('Title','petstore'),
				)
		),
		array(
			'name' => __('Slide Images Order','petstore'),
			'desc' => '',
			'id' => $prefix . 'post_slide_images_order',
			'class'     => 'post_slide_images_order',
			'type' => 'select',
			'options' => array(
					'DESC' => __('Descending Order','petstore'),
					'ASC' => __('Ascending Order','petstore'),
				)
		),
		
		array(
			'name' => __('Slider Next & Prev Buttons','petstore'),
			'desc' => '',
			'id' => $prefix . 'post_slide_button_disable',
			'class'     => 'post_slide_button_disable',
			'type' => 'select',
			'options' => array(
					'true' => __('Enable','petstore'),
					'false' => __('Disable','petstore'),
				)
		),
		
		array(
			'name' => __('Slider Nav Buttons BG Color','petstore'),
			'desc' => '',
			'id' => $prefix . 'post_slide_button_bg_color',
			'class'     => 'post_slide_button_bg_color',
			'type' => 'color',
			'std' => '#333333'
		),
		array(
			'name' => __('Slider Nav Buttons Color','petstore'),
			'desc' => '',
			'id' => $prefix . 'post_slide_button_text_color',
			'class'     => 'post_slide_button_text_color',
			'type' => 'color',
			'std' => '#ffffff'
		),
		array(
			'name' => __('Slider Nav Buttons Hover BG Color','petstore'),
			'desc' => '',
			'id' => $prefix . 'post_slides_button_hover_bg_color',
			'class'     => 'post_slides_button_hover_bg_color',
			'type' => 'color',
			'std' => '#333333'
		),
		array(
			'name' => __('Slider Nav Buttons Hover Color','petstore'),
			'desc' => '',
			'id' => $prefix . 'post_slide_button_hover_text_color',
			'class'     => 'post_slide_button_hover_text_color',
			'type' => 'color',
			'std' => '#ffffff'
		),
		array(
			'name' => __('Slider Dots Navigation Buttons','petstore'),
			'desc' => '',
			'id' => $prefix . 'post_slide_nav_disable',
			'class'     => 'post_slide_nav_disable',
			'type' => 'select',
			'options' => array(
					'true' => __('Enable','petstore'),
					'false' => __('Disable','petstore'),
				)
		),
		array(
			'name' => __('Slider Dot Nav Buttons Color','petstore'),
			'desc' => '',
			'id' => $prefix . 'post_slide_nav_button_bg_color',
			'class'     => 'post_slide_nav_button_bg_color',
			'type' => 'color',
			'std' => '#333333'
		),
		array(
			'name'		=> __('Boxed Slider','petstore'),
			'id'		=> $prefix . "enable_boxed_slider",
			'class'     => 'enable_boxed_slider',
			'type'		=> 'checkbox',
			'multiple'	=> false,
			'std'		=> '0',
			'desc'		=> ''
		),
		array(
			'name'		=> __('Boxed Slider Background Color','petstore'),
			'id'		=> $prefix . "boxed_slider_bg_color",
			'class'     => 'boxed_slider_bg_color',
			'type'		=> 'color',
			'multiple'	=> false,
			'std'		=> '',
			'desc'		=> ''
		),
		array(
			'name'	=> __('Boxed Slider padding Top','petstore'),
			'id'	=> "boxed_slider_padding_top",
			'class'     => 'boxed_slider_padding_top',
			'type' => 'slider',
			'suffix' => __( 'px', 'petstore' ),
			'js_options' => array(
				'min' => 0,
				'max' => 200,
				'step' => 1,
			),
			'std' => '0',
		),
		array(
			'name'	=> __('Boxed Slider padding Bottom','petstore'),
			'id'	=> "boxed_slider_padding_bottom",
			'class'     => 'boxed_slider_padding_bottom',
			'type' => 'slider',
			'suffix' => __( 'px', 'petstore' ),
			'js_options' => array(
				'min' => 0,
				'max' => 200,
				'step' => 1,
			),
			'std' => '0',
		),

		array(
			'name'	=> __('Slider Height','petstore'),
			'id'	=> "kaya_slider_height",
			'class'     => 'kaya_slider_height',
			'type' => 'slider',
			'suffix' => __( 'px', 'petstore' ),
			'js_options' => array(
				'min' => 400,
				'max' => 1000,
				'step' => 1,
			),
			'std' => '500',
		),
		array(
			'name'	=> __('Boxed Slider Border Size','petstore'),
			'id'	=> "boxed_slider_border_size",
			'class'     => 'boxed_slider_border_size',
			'type' => 'slider',
			'suffix' => __( 'px', 'petstore' ),
			'js_options' => array(
				'min' => 0,
				'max' => 100,
				'step' => 1,
			),
			'std' => '0',
		),
		array(
			'name'	=> __('Boxed Slider Border Color','petstore'),
			'desc' => '',
			'id' => $prefix . 'boxed_slider_border_color',
			'class'     => 'boxed_slider_border_color',
			'type' => 'color',
			'std' => '#ffffff'
		),
		array(
			'name'	=> __('Boxed Slider Border Radius','petstore'),
			'id'	=> "boxed_slider_border_radius",
			'class'     => 'boxed_slider_border_radius',
			'type' => 'slider',
			'suffix' => __( 'px', 'petstore' ),
			'js_options' => array(
				'min' => 0,
				'max' => 200,
				'step' => 1,
			),
			'std' => '0',
		),
		array(
			'name'		=> __('Slider Fullscreen Height','petstore'),
			'id'		=> $prefix . 'enable_slider_screen_height',
			'class'     => 'enable_slider_screen_height',
			'clone'		=> false,
			'type'		=> 'checkbox',
			'desc'		=> '',
			'std' 		=> '1' 
		),
		
	/* Custom Slider */
		array(
			'name'		=> __('Slider Shortcode','petstore'),
			'id'		=> $prefix . 'customslider_type',
			'class'     => 'customslider_type',
			'type'		=> 'text',
			'desc' => 'Ex: [customslider shortcode_name]'
			),
	/* Video Background */
		array(
			'name'		=> __('Select Video Type','petstore'),
			'id'		=> $prefix . 'select_video_bg_type',
			'class'     => 'select_video_bg_type',
			'type'		=> 'select',
			'options' => array(
				'youtube_video' => 'Youtube Video ID',
				'video_webm' => 'WEBM / MP4 Video Url'
				),
			'desc' => ''
			),
		array(
			'name'		=> __('Video Background ID','petstore'),
			'id'		=> $prefix . 'video_bg_id',
			'class'     => 'video_bg_id',
			'type'		=> 'text',
			'desc' => __('Ex: ','petstore').'kuceVNBTJio'
			),
		array(
			'name'		=> __('Video WEBM URL','petstore'),
			'id'		=> $prefix . 'video_bg_webm',
			'class'     => 'video_bg_webm',
			'type'		=> 'text',
			'desc' => ''
			),
		array(
			'name'	=> __('Video MP4 URL','petstore'),
			'id'	=> $prefix . 'video_bg_mp4',
			'class'     => 'video_bg_mp4',
			'type'	=> 'text',
			'desc'  => ''
			),
		array(
			'name'	=> __('Video OGG URL','petstore'),
			'id'	=> $prefix . 'video_bg_ogg',
			'class'     => 'video_bg_ogg',
			'type'	=> 'text',
			'desc' 	=> ''
			),
		array(
				'name'		=> __('Video Background Opacity','petstore'),
				'id'		=> $prefix . "bg_video_opcaity",
				'class'     => 'bg_video_opcaity',
				'type' 		=> 'slider',
				'js_options' => array(
					'min' 		=> 0,
					'max' 		=> 1,
					'step'		=> 0.1,
			),
			'std' => '1',
		),
		array(
			'name' => __('Video Background Color','petstore'),
			'desc' => '',
			'id' => $prefix . 'video_bg_color',
			'class'     => 'video_bg_color',
			'type' => 'color',
			'std' => '#333333'
		),
		array(
			'name'		=> __('Video Description','petstore'),
			'id'		=> $prefix . 'video_bg_description',
			'class'     => 'video_bg_description',
			'type'		=> 'textarea',
			'desc' => '&lt;h2 style=&quot;color:#fff; font-size:3.5em; line-height:100%; font-weight: bold;&quot;&gt;&lt;span class=&quot;accent&quot;&gt;&lt;/span&gt; VIDEO BACKGROUND&lt;/h2&gt;'
			),	
		array(
			'name'		=> __('Video Height','petstore'),
			'id'		=> $prefix . 'video_bg_height',
			'class'     => 'video_bg_height',
			'type' => 'slider',
			'suffix' => __( 'px', 'petstore' ),
			'js_options' => array(
				'min' => 250,
				'max' => 1000,
				'step' => 1,
			),
			'std' => '500',
			),
		array(
			'name'		=> __('Video Fullscreen Height','petstore'),
			'id'		=> $prefix . 'enable_video_screen_height',
			'class'     => 'enable_video_screen_height',
			'clone'		=> false,
			'type'		=> 'checkbox',
			'desc'		=> '',
			'std' 		=> '1' 
		),
	)
);
/* ----------------------------------------------------- */
// POrtfolio Info Metabox
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'portfolio_info',
	'title' => 'Portfolio General Options',
	'pages' => array( 'portfolio' ),
	'context' => 'normal',
		'fields' => array(
		/* array(
			'name' => 'Custom Portfolio Item Title',
			'desc' => '',
			'id' => $prefix . 'kaya_custom_title',
			'type' => 'text',
			
		),*/

		array(
			'name' => __('Portfolio Item External link to','petstore'),
			'desc' => 'Ex: http://www.google.com',
			'id' => $prefix . 'Porfolio_customlink',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name'		=> __('Open In New Window','petstore'),
			'id'		=> $prefix . 'pf_link_new_window',
			'clone'		=> false,
			'type'		=> 'checkbox',
			'desc'		=> ''
		),
		array(
			'name'		=> __('Related Posts','petstore'),
			'id'		=> $prefix . 'relatedpost',
			'clone'		=> false,
			'type'		=> 'checkbox',
			'desc'		=> 'Display Related posts at the bottom of this post in Portfolio single page'
		),
		
	)
);

/* -----------------------------------------------------
// Light box video url
-----------------------------------------------------  */
$meta_boxes[] = array(
	'id'		=> 'lightbox_video_url',
	'title'		=> 'Light Box Video Url',
	'pages'		=> array( 'portfolio' ),
	'context' => 'side',
	'priority' => 'low',
	'fields'	=> array(
		array(
			'name'		=> '',
			'id'		=> $prefix . 'video_url',
			'type'		=> 'text',
			'desc' => 'http://www.youtube.com/watch?v=SZEflIVnhH8 <br> Note: It support only for youtube & vimeo videos'
			),
		
		)
);
/* ----------------------------------------------------- */
// Project Slides Metabox
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id'		=> 'portfolio_sidebars',
	'title'		=> __('Template','petstore'),
	'pages'		=> array( 'portfolio' ),
	'context' => 'side',
	'priority' => 'default',
	'fields'	=> array(
		array(
			'name' => '',
			'desc' => '',
			'id' => $prefix . 'kaya_pagesidebar',
			'type' => 'select',
			'std'	=> '',
			'options' => array( "full" => __("Fullwidth",'petstore'), "rightsidebar" => __("Right Sidebar",'petstore'), "leftsidebar" => __("Left Sidebar",'petstore') ),
		),


		)
);
/* ----------------------------------------------------- */
// Team Layout Options
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'my-team-settings',
	'title' => 'Team Page Section',
	'pages' => array( 'team' ),
	'context' => 'normal',
		'fields' => array(
		array(
			'name' => __('Team Designation','petstore'),
			'desc' => '',
			'id' => $prefix . 'team_designation',
			'type' => 'text',
			'std'	=> 'Managing Director',
			),
		array(
			'name' => __('Description','petstore'),
			'desc' => '',
			'id' => $prefix . 'team_description',
			'type' => 'textarea',
			'std'	=> '',
			),
		array(
			'name' => __('External Link','petstore'),
			'desc' => __('Ex:http://www.google.com','petstore'),
			'id' => $prefix . 'team_link',
			'type' => 'text',
			'std'	=> '',
			),
		array(
			'name' => __('Open New Window','petstore'),
			'desc' => '',
			'id' => $prefix . 'team_target_link',
			'type' => 'checkbox',
			'std'	=> '',
			),			
	)

);
/* ----------------------------------------------------- */
// Portfolio page Layout Options
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'my-team--social-icons-settings',
	'title' => 'Social Media Icons Section',
	'pages' => array( 'team' ),
	'context' => 'normal',
		'fields' => array(


		array(
			'name'	=> __('Select Icon Type','petstore'),
			'desc'	=> '',
			'id'	=> $prefix . 'select_icon_type',
			'type'	=> 'select',
			'options' => array(
				'awesome_icon' => __('Awesome Icon', 'petstore'),
				'image_icon'  => __('Image Icon','petstore'),
				)
		),
		// Awesome Icons
		// Icon Images
		array(
			'name' => __('Awesome Icon - 1','petstore'), // Awesome Icon
			'desc' => __('Ex:fa-facebook','petstore'),
			'id' => $prefix . 'social_awesome_icon_1',
			'type' => 'text',
			'std'	=> '',
		),
		array(
			'name'	=> __('Social Media Icon - 1','petstore'),
			'desc'	=> '',
			'id'	=> $prefix . 'social_media_icon_1',
			'type'	=> 'image_advanced',
			'max_file_uploads' => 1,
		),
		array(
			'name' => 'Icon Link - 1',
			'desc' => __('Ex:http://www.facebook.com/yourfacebookid','petstore'),
			'id' => $prefix . 'social_media_link_1',
			'type' => 'text',
			'std'	=> '',
		),
		array(
			'type' => 'divider',
			'id' => 'icon_divider', 
		),
		array(
			'name' => __('Awesome Icon - 2','petstore'),   // Awesom Icon 
			'desc' => __('Ex:fa-twitter','petstore'),
			'id' => $prefix . 'social_awesome_icon_2',
			'type' => 'text',
			'std'	=> '',
		),
		array(
			'name'	=> __('Social Media Icon - 2','petstore'),
			'desc'	=> '',
			'id'	=> $prefix . 'social_media_icon_2',
			'type'	=> 'image_advanced',
			'max_file_uploads' => 1,
		),
		array(
			'name' => 'Icon Link - 2',
			'desc' => __('Ex:http://www.twitter.com/yourtwitterid','petstore'),
			'id' => $prefix . 'social_media_link_2',
			'type' => 'text',
			'std'	=> '',
		),
		array(
			'type' => 'divider',
			'id' => 'icon_divider', 
		),
		array(
			'name' => __('Awesome Icon - 3','petstore'),   // Awesom Icon 
			'desc' => __('Ex:fa-google-plus','petstore'),
			'id' => $prefix . 'social_awesome_icon_3',
			'type' => 'text',
			'std'	=> '',
		),
		array(
			'name'	=> __('Social Media Icon - 3','petstore'),
			'desc'	=> '',
			'id'	=> $prefix . 'social_media_icon_3',
			'type'	=> 'image_advanced',
			'max_file_uploads' => 1,
		),
		array(
			'name' => 'Icon Link - 3',
			'desc' => __('Ex:https://plus.google.com/Yourid','petstore'),
			'id' => $prefix . 'social_media_link_3',
			'type' => 'text',
			'std'	=> '',
		),
		array(
			'type' => 'divider',
			'id' => 'icon_divider', 
		),
		array(
			'name' => __('Awesome Icon - 4','petstore'),   // Awesom Icon 
			'desc' => __('Ex:fa-linkedin','petstore'),
			'id' => $prefix . 'social_awesome_icon_4',
			'type' => 'text',
			'std'	=> '',
		),
		array(
			'name'	=> __('Social Media Icon - 4','petstore'),
			'desc'	=> '',
			'id'	=> $prefix . 'social_media_icon_4',
			'type'	=> 'image_advanced',
			'max_file_uploads' => 1,
		),
		array(
			'name' => 'Icon Link - 4',
			'desc' => __('Ex:http://www.linkedin.com/profile/qa?id=yourid','petstore'),
			'id' => $prefix . 'social_media_link_4',
			'type' => 'text',
			'std'	=> '',
		),
		array(
			'type' => 'divider',
			'id' => 'icon_divider', 
		),
		array(
			'name' => __('Awesome Icon - 5','petstore'),   // Awesom Icon 
			'desc' => __('Ex:fa-pinterest','petstore'),
			'id' => $prefix . 'social_awesome_icon_5',
			'type' => 'text',
			'std'	=> '',
		),
		array(
			'name'	=> __('Social Media Icon - 5','petstore'),
			'desc'	=> '',
			'id'	=> $prefix . 'social_media_icon_5',
			'type'	=> 'image_advanced',
			'max_file_uploads' => 1,
		),
		array(
			'name' => 'Icon Link - 5',
			'desc' => __('Ex:http://www.pinterest.com/yourid','petstore'),
			'id' => $prefix . 'social_media_link_5',
			'type' => 'text',
			'std'	=> '',
		),

	)

);
/* ----------------------------------------------------- */
// Video Format
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'kaya_post_format_video',
	'title' => __('Video','petstore'),
	'pages' => array( 'post' ),
	'context' => 'normal',
	'fields'	=> array(

		array(
			'name' 	=> 	__('Add Iframe Video','petstore'),
			'id' 	=> 	$prefix . 'post_video',
			'type'	=> 	'textarea',
			'desc' 	=> 	'&lt;iframe width=&quot;100%&quot; height=&quot;315&quot; src=&quot;//www.youtube.com/embed/keDneypw3HY&quot; frameborder=&quot;0&quot; allowfullscreen&gt;&lt;/iframe&gt;',
			'std' 	=> 	''	
		),	
		
	)
);
/* ----------------------------------------------------- */
// Gallery
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id'		=> 'kaya_post_format_gallery',
	'title'		=> __('Gallery Format','petstore'),
	'pages'		=> array( 'post' ),
	'context' => 'normal',

	'fields'	=> array(
		array(
			'name'	=> __('Post Format Gallery','petstore'),
			'desc'	=> '',
			'id'	=> $prefix . 'post_gallery',
			'type'	=> 'image_advanced',
			'max_file_uploads' => 500,
		),
		)
);
/* ----------------------------------------------------- */
// Quote Format
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'kaya_quote_format_quote',
	'title' => 'Quote Format',
	'pages' => array( 'post' ),
	'context' => 'normal',
	'fields'	=> array(
		
		array(
			'name' 	=> 	__('Quote','petstore'),
			'id' 	=> 	$prefix . 'kaya_quote_desc',
			'type'	=> 	'textarea',
			'desc' 	=> 	'',
			'std' 	=> 	''	
		),
	)
);
/* ----------------------------------------------------- */
// Audio Format
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'kaya_audio_format',
	'title' => 'Audio Format',
	'pages' => array( 'post' ),
	'context' => 'normal',
	'fields'	=> array(
		
		array(
			'name' 	=> 	'Audio URL(mp3)',
			'id' 	=> 	$prefix . 'kaya_audio',
			'type'	=> 	'textarea',
			//'desc' 	=> 	__('','petstore'),
			'std' 	=> 	''	
		),	
		
	)
);
/* ----------------------------------------------------- */
// Link Format
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'kaya_link_format',
	'title' => 'Link Format',
	'pages' => array( 'post' ),
	'context' => 'normal',
	'fields'	=> array(
		
		array(
			'name' 	=> 	'Link',
			'id' 	=> 	$prefix . 'kaya_link',
			'type'	=> 	'text',
			'desc' 	=> 	__('http://www.google.com','petstore'),
			'std' 	=> 	''	
		),	
		
	)
);

/* ----------------------------------------------------- */
// Slider
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id'		=> 'slider-customlink',
	'title'		=> 'SLIDER SETTINGS',
	'pages'		=> array( 'slider' ),
	'context' => 'normal',
	'fields'	=> array(
		array(
			'name'	=> __('Slide Image','petstore'),
			'desc'	=> '',
			'id'	=> $prefix . 'post_slide_image',
			'class' => 'post_slide_image',
			'type'	=> 'image_advanced',
			'max_file_uploads' => 1,
		),
		array(
			'name' => __('Slide Text','petstore'),
			'desc' => '',
			'id' => $prefix . 'slider_description',
			'type' => 'textarea',
			'std' => ''
		),
		array(
			'name'		=> __('Slide Text Position','petstore'),
			'id'		=> $prefix . "slide_title_desc_align",
			'class' => 'slide_title_desc_align',
			'type'		=> 'select',
			'options'	=> array(
				'center' => __('Center','petstore'),
				'left' => __('Left','petstore'),
				"right"	=> __('Right','petstore'),
												
			),
			'multiple'	=> false,
			'std'		=> 'center',
			'desc'		=> ''
		),
		)
	);
/* ----------------------------------------------------- */
// Slider
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id'		=> 'testimonial-settngs',
	'title'		=> __('Testimonial Settings','petstore'),
	'pages'		=> array( 'testimonial' ),
	'context' => 'normal',
	'fields'	=> array(
	array(
			'name' => __('Description','petstore'),
			'desc' => '',
			'id' => $prefix . 'testimonial_description',
			'type' => 'textarea',
			'std' => ''
		),
		
	/*	array(
			'name' => 'Designation',
			'desc' => '',
			'id' => $prefix . 't_client_designation',
			'type' => 'text',
			'std' => ''
		), */
		array(
			'name' => __('Link','petstore'),
			'desc' => 'Ex: http://www.google.com',
			'id' => $prefix . 't_client_link',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => __('Open New Window','petstore'),
			'id' => $prefix . 'testimonial_target_link',
			'type'		=> 'checkbox',
			'desc'		=> ''
		),
		)
	);
/* ----------------------------------------------------- */
// Client Slider
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id'		=> 'client-settngs',
	'title'		=> __('Client Settings','petstore'),
	'pages'		=> array( 'client' ),
	'context' => 'normal',
	'fields'	=> array(
		array(
			'name' => __('Description','petstore'),
			'desc' => '',
			'id' => $prefix . 'client_description',
			'type' => 'textarea',
			'std' => ''
		),
		array(
			'name' => __('Custom Link','petstore'),
			'desc' => 'Ex: http://www.google.com',
			'id' => $prefix . 'client_link',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => __('Open New Window','petstore'),
			'id' => $prefix . 'client_target_link',
			'type'		=> 'checkbox',
			'desc'		=> ''
		),
		)
	);
/* ----------------------------------------------------- */
//  Tabs Icon
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id'		=> 'tab_icon_settings',
	'title'		=> __('Tabs Section','petstore'),
	'pages'		=> array( 'toogletabs' ),
	'context' => 'normal',
	'fields'	=> array(
		array(
			'name' => __('Tab Icon Name','petstore'),
			'desc'		=> __('for more awesome icons ','petstore')."<a href='http://fortawesome.github.io/Font-Awesome/icons' target='_blank'>".__(' click here','petstore')."</a>",
			'id' => $prefix . 'tab_awesome_icon_name',
			'type' => 'text',
			'std' => ''
		),
		
		)
	);

/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function kaya_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'kaya_register_meta_boxes' );