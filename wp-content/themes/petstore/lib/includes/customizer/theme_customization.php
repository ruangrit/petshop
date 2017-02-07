<?php
include_once('customize_settings.php');
include_once('customizer_controlls.php');
  //Layout Mode
function kaya_layout_mode( $wp_customize ){
	$wp_customize->add_section(
	// ID
	'background_image',
	// Arguments array
	array(
		'title' => __( 'Layout Section', 'petstore' ),
		'priority'       => 0,
		'capability' => 'edit_theme_options',
		//'description' => __( '', 'petstore' )
	));
	$wp_customize->add_setting( 'theme_layout_mode', array(
		'default'        => 0,
		'transport' => '',
		'sanitize_callback' => 'checkbox_field_sanitize',
		'capability'     => 'edit_theme_options'
	));
	$wp_customize->add_control('theme_layout_mode', array(
		'label' => __('Enable Boxed Layout','petstore'),
		'section'  => 'background_image',
		'type'     => 'checkbox',
		'priority' => 1

	));
$wp_customize->add_setting( 'select_body_background_type',  array(
        'default' => 'bg_type_color',
        'transport' => '',
        'sanitize_callback' => 'radio_buttons_sanitize'
    ));
    $wp_customize->add_control('select_body_background_type', array(
        'type' => 'select',
        'label' => __('Select Background Type','petstore'),
        'section' => 'background_image',
        'choices' => array(
        	 'bg_type_color' => __('Background Color','petstore'),
        	 'bg_type_image' => __('Background Image','petstore'),
        	),
		'priority' => 2,
    ));
	$wp_customize->add_setting( 'body_background_color',array( 
			'default' => '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'color_filed_sanitize',
		));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'body_background_color',
		array(			
			'label' => __('Background Color', 'petstore'),
			'section' => 'background_image',
			'priority' => 3,
			'type' => 'color',
	)));
	$wp_customize->add_setting('body_margin_top',
	    array( 
	    	'default' => '0',
	    	'transport' => 'postMessage',
	    	'sanitize_callback' => 'check_number'
	    ));
	$wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'body_margin_top', array(
		'label'   => __('Margin Top','petstore'),
		'section' => 'background_image',
		'settings'    => 'body_margin_top',
		'priority'    => 10,
		'choices'  => array(
			'min'  => 0,
			'max'  => 200,
			'step' => 1
		),
	)));
	$wp_customize->add_setting('body_margin_bottom',
	    array( 'default' => '0',
	    	'transport' => 'postMessage',
	    	'sanitize_callback' => 'check_number'
	    ));
	$wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'body_margin_bottom', array(
		'label'   => __('Body Margin Bottom','petstore'),
		'section' => 'background_image',
		'settings'    => 'body_margin_bottom',
		'priority'    => 20,
		'choices'  => array(
			'min'  => 0,
			'max'  => 200,
			'step' => 1
		),
	)));
	$wp_customize->add_setting('boxed_layout_position', array(
			'default' => 'center',
			'sanitize_callback' => 'radio_buttons_sanitize',
			'transport' => 'postMessage'
		));
	$wp_customize->add_control('boxed_layout_position',array(
		'label' => __('Boxed Layout Position','petstore'),
		'type' => 'radio',
		'section'  => 'background_image',
		'choices' => array(
			'center' => __('Center','petstore'),
			'left' => __('Left','petstore'),
			'Right' => __('Right','petstore')
			),
		'priority' => 30
	));
		$wp_customize->add_setting('boxed_layout_shadow',
	    array( 'default' => '0',
	    	'transport' => 'postMessage',
	    	'sanitize_callback' => 'check_number'
	    ));
	$wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'boxed_layout_shadow', array(
		'label'   => __('Boxed Layout Shadow','petstore'),
		'section' => 'background_image',
		'settings'    => 'boxed_layout_shadow',
		'priority'    => 40,
		'choices'  => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1
		),
	)));
}
add_action('customize_register','kaya_layout_mode');
//
// Header Top Section
// Menu Section
function top_box_section( $wp_customize ) {
		$wp_customize->add_section(
	// ID
	'header_top_bar_section',
	// Arguments array
	array(
		'title' => __( 'Header Topbar Section', 'petstore' ),
		'priority'       => 30,
		'capability' => 'edit_theme_options',
		'panel' => 'header_section_panel'
		//'description' => __( '', 'petstore' )
	));
	/*$wp_customize->add_setting( 'top_bar_settings',array(
  	  		'sanitize_callback' => 'text_filed_sanitize',
  	));
 	$wp_customize->add_control(
    new Kaya_Customize_Description_Control( $wp_customize, 'top_bar_settings', array(
       'html_tags' => true,
       'label'    => __( 'To know how to Modify top bar section','petstore') . '<a target="_blank" href="https://www.youtube.com/watch?v=Yb910SrfuZU&feature=youtu.be">Watch this Video</a>',
      'section'  => 'header_top_bar_section',
      'settings' => 'top_bar_settings',
      'priority' => 1
    	))
 	 ); */
	$wp_customize->add_setting( 'enable_top_header', array(
		'default'        => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'checkbox_field_sanitize',
		'capability'     => 'edit_theme_options',
	));
	$wp_customize->add_control('enable_top_header', array(
		'label'    => __( 'Disable Topbar Section','petstore' ),
		'section'  => 'header_top_bar_section',
		'type'     => 'checkbox',
		'priority' => 2
	));
	$wp_customize->add_setting( 'top_bar_left_navigation',array(
  	  		'sanitize_callback' => 'text_filed_sanitize',
  	));
 	$wp_customize->add_control(
    new Kaya_Customize_Description_Control( $wp_customize, 'top_bar_left_navigation', array(
       'html_tags' => true,
       'label'    => __( 'To Know how to create top menu in <strong>Top Header Left Section</strong>','petstore') . '&nbsp;<a target="_blank" href="https://www.youtube.com/watch?v=6-76Td7Xvy8&feature=youtu.be">Watch this Video</a>',
      'section'  => 'header_top_bar_section',
      'settings' => 'top_bar_left_navigation',
      'priority' => 3
    	))
 	 ); 
 		$wp_customize->add_setting( 'top_bar_right_content', array(
		'default' => '<a href="http://www.facebook.com"> <i class="fa fa-facebook"> </i> </a>     
		<a href="http://www.twitter.com"> <i class="fa fa-twitter"> </i> </a>',
		'transport' => '',
		'sanitize_callback' => 'text_filed_sanitize',
		));
  $wp_customize->add_control(
    new Kaya_Customize_Textarea_Control( $wp_customize, 'top_bar_right_content', array(
      'label'    => __( 'Right Section Content', 'petstore' ),
      'section'  => 'header_top_bar_section',
      'settings' => 'top_bar_right_content',
      'priority' => 30,
      'type' => 'text-area',
      ))  );
  	  $wp_customize->add_setting( 'top_bar_right_content_info',array(
  	  		'sanitize_callback' => 'text_filed_sanitize',
  	  	) );
 	$wp_customize->add_control(
    new Kaya_Customize_Description_Control( $wp_customize, 'top_bar_right_content_info', array(
      'label'    => __( 'Ex:<a href="http://www.facebook.com"> <i class="fa fa-facebook"> </i> </a>     
		<a href="http://www.twitter.com"> <i class="fa fa-twitter"> </i> </a>', 'petstore' ),
      'section'  => 'header_top_bar_section',
      'settings' => 'top_bar_right_content_info',
      'priority' => 31
    	))
 	 );
 	$wp_customize->add_setting( 'disable_top_header_user_login_info', array(
		'default'        => 0,
		'transport' => '',
		'sanitize_callback' => 'checkbox_field_sanitize',
		'capability'     => 'edit_theme_options',
	));
	$wp_customize->add_control('disable_top_header_user_login_info', array(
		'label'    => __( 'Disable User Login Info Right Section','petstore' ),
		'section'  => 'header_top_bar_section',
		'type'     => 'checkbox',
		'priority' => 40
	) );
 	$wp_customize->add_setting( 'select_top_header_background_type',  array(
        'default' => 'bg_type_color',
        'transport' => '',
        'sanitize_callback' => 'radio_buttons_sanitize'
    ));
    $wp_customize->add_control('select_top_header_background_type', array(
        'type' => 'select',
        'label' => __('Select Background Type','petstore'),
        'section' => 'header_top_bar_section',
        'choices' => array(
        	 'bg_type_color' => __('Background Color','petstore'),
        	 'bg_type_image' => __('Background Image','petstore'),
        	),
		'priority' => 41,
    ));
  $wp_customize->add_setting('upload_top_bar[top_bg_image]', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'upload_sanitize_id',
        'transport'			=> 'postMessage'
        //'type'           => 'option',

    ));
    $wp_customize->add_control( new Kaya_Customize_Imageupload_Control($wp_customize, 'top_bg_image', array(
        'label'    => __('Background Image', 'petstore'),
        'section'  => 'header_top_bar_section',
        'settings' => 'upload_top_bar[top_bg_image]',
		'priority' => 42
    )));
    $wp_customize->add_setting('top_bar_bg_repeat',
	array(
		'deafult' => 'repeat',
		'sanitize_callback' => 'radio_buttons_sanitize',
		'transport' => 'postMessage',
		));
$wp_customize->add_control('top_bar_bg_repeat',
	array(
		'label' => __('Background Repeat','petstore'),
		'capability' => 'edit_theme_options', 
		'section' => 'header_top_bar_section',
		'priority' => 43,
		'type' => 'radio',
		'choices' => array(
			'no-repeat' => 'No Repeat',
			'repeat' => 'Repeat',
			'cover' => 'Cover'
			)
		)); 	
  $colors[] = array(
		'slug'=>'top_bar_bg_color',
		'default' => '#2f2f2f',
		'label' => __('Top Bar Background Color', 'petstore'),
		'priority' => 50
	);
    $colors[] = array(
		'slug'=>'top_bar_text_color',
		'priority' =>60,
		'default' => '#333333',
		'label' => __('Text Color', 'petstore'),
	);
	$colors[] = array(
		'slug'=>'top_bar_icon_color',
		'priority' => 70,
		'default' => '#919191',
		'label' => __('Top Bar Icon Color', 'petstore'),
	);
	$colors[] = array(
		'slug'=>'top_bar_link_color',
		'priority' =>90,
		'default' => '#ffffff',
		'label' => __('Link Color', 'petstore'),
	);
	$colors[] = array(
		'slug'=>'top_bar_link_hover_color',
		'priority' => 100,
		'default' => '#F85204',
		'label' => __('Link Hover Color', 'petstore'),
	);
    foreach( $colors as $color ) {
	// SETTINGS
	$wp_customize->add_setting(
		$color['slug'], array(
			'default' => $color['default'],
			//'type' => 'option',
			'capability' =>	'edit_theme_options',
			'transport' => 'postMessage',
			'sanitize_callback' => 'color_filed_sanitize',
		)
	);
	// CONTROLS
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$color['slug'],
			array('label' => $color['label'],
			'section' => 'header_top_bar_section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])

		)
	);
}


}
add_action( 'customize_register', 'top_box_section'); // End
//End
function logo_section( $wp_customize ) {
	$wp_customize->add_panel( 'header_section_panel', array(
	    'priority'       => 40,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '',
	    'title'          => __( 'Header Section', 'petstore' ),
	    'description'    => '',
	) );
	$wp_customize->add_section(
	// ID
	'logo-section',
	// Arguments array
	array(
		'title' => __( 'Logo Settings', 'petstore' ),
		'priority'       => 40,
		'capability' => 'edit_theme_options',
		'panel' => 'header_section_panel',
		//'description' => __( '', 'petstore' )
	));
	$wp_customize->add_setting( 'select_header_logo_type',  array(
        'default' => 'image_logo',
        'transport' => '',
        'sanitize_callback' => 'radio_buttons_sanitize'
    ));
    $wp_customize->add_control('select_header_logo_type', array(
        'type' => 'select',
        'label' => __('Select Header Logo Type','petstore'),
        'section' => 'logo-section',
        'choices' => array(
        	 'image_logo' => 'Image Logo',
        	 'text_logo' => 'Text Logo',
        	 'none' => 'None'
        	),
		'priority' => 52,
    ));	
	$src=get_template_directory_uri() . '/images';
	$wp_customize->add_setting('kaya_logo[upload_logo]', array(
	    'default'           => $src.'/logo.png',
	    'capability'        => 'edit_theme_options',
	    'sanitize_callback' => 'upload_sanitize_id',
	    'type'           => 'option',
	    'transport' => ''
	));
    $wp_customize->add_control( new Kaya_Customize_Imageupload_Control($wp_customize, 'upload_logo', array(
        'label'    => __('Upload Logo Image', 'petstore'),
        'section'  => 'logo-section',
        'settings' => 'kaya_logo[upload_logo]',
		'priority' => 53
    )));
    // Retina logo
    $wp_customize->add_setting( 'header_retina_logo', array(
		'default'        => '',
		'transport' => '',
		'sanitize_callback' => 'checkbox_field_sanitize',
		'capability'     => 'edit_theme_options' )
	);
	$wp_customize->add_control('header_retina_logo', array(
		'label'    => __( 'Enable Retina Logo','petstore' ),
		'section'  => 'logo-section',
		'type'     => 'checkbox',
		'priority' => 54
	) );
    $wp_customize->add_setting('retina_logo[upload_retina_logo]', array(
	    'default'           => '',
	    'capability'        => 'edit_theme_options',
	    'sanitize_callback' => 'upload_sanitize_id',
	    'type'           => 'option',
    ));
    $wp_customize->add_control( new Kaya_Customize_Imageupload_Control($wp_customize, 'upload_retina_logo', array(
        'label'    => __('Upload Retina Logo Image', 'petstore'),
        'section'  => 'logo-section',
        'settings' => 'retina_logo[upload_retina_logo]',
		'priority' => 55
    )));

    //
    $wp_customize->add_setting( 'header_text_logo', array(
		'default'        => '',
		'sanitize_callback' => 'text_filed_sanitize',
		'transport' => ''
	) );

	$wp_customize->add_control( 'header_text_logo', array(
		'label'   => __('Text Logo','petstore'),
		'section' => 'logo-section',
		'type'    => 'text',
		'priority' => 61,

	) );
	$wp_customize->add_setting( 'text_logo_size', array(
        'default'        => '36',
        'transport' => '',
        'sanitize_callback' => 'check_number',
    ) );
	$wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'text_logo_size', array(
			 'label'   => __('Logo Font Size','petstore'),
        	'section' => 'logo-section',
			'settings'    => 'text_logo_size',
			'priority'    => 62,
			'choices'  => array(
				'min'  => 24,
				'max'  => 150,
				'step' => 1
			),
	)));
	$wp_customize->add_setting( 'header_logo_font_weight',  array(
        'default' => 'normal',
        'transport' => '',
        'sanitize_callback' => 'radio_buttons_sanitize'
    ));
    $wp_customize->add_control('header_logo_font_weight', array(
        'type' => 'select',
        'label' => __('Text Logo Font Weight','petstore'),
        'section' => 'logo-section',
        'choices' => array(
        	 'normal' => __('Normal','petstore'),
        	 'bold' => __('Bold','petstore'),
        	),
		'priority' => 62,
    ));	
    $wp_customize->add_setting( 'header_logo_font_style',  array(
        'default' => 'normal',
        'transport' => '',
        'sanitize_callback' => 'radio_buttons_sanitize'
    ));
    $wp_customize->add_control('header_logo_font_style', array(
        'type' => 'select',
        'label' => __('Text Logo Font Style','petstore'),
        'section' => 'logo-section',
        'choices' => array(
        	 'normal' => __('Normal','petstore'),
        	 'italic' => __('Italic','petstore'),
        	),
		'priority' => 63,
    ));	
	
	$wp_customize->add_setting( 'header_text_logo_font_family',
    array( 'default' => __('Select Fonts', 'petstore'),
    	'transport' => '',
    	'sanitize_callback' => 'text_filed_sanitize'
    ));
 	$wp_customize->add_control( new Kaya_Customize_google_fonts_Control( $wp_customize, 'header_text_logo_font_family', array(
		'label'   => __('Select Logo Font Family','petstore'),
		'section' => 'logo-section',
		'settings'    => 'header_text_logo_font_family',
		'priority'    => 64,
	)));

    $colors[] = array(
		'slug'=>'logo_text_font_color',
		'default' => '#333333',
		'label' => __('Text Logo Font Color', 'petstore'),
		'priority' => 65
	);
	$wp_customize->add_setting( 'customize_controll_divider_tagline', array(
        'sanitize_callback' => 'text_filed_sanitize'
    ));
    $wp_customize->add_control( new Kaya_Customize_Divider_Controll( $wp_customize, 'customize_controll_divider_tagline', array(
        'section' => 'logo-section',
		'priority' => 66,
    ))); 
	// Logo tag line
	$wp_customize->add_setting( 'header_tagline_title', array(
			'sanitize_callback' => 'text_filed_sanitize',
		) );
	$wp_customize->add_control(
    new Kaya_Customize_Subtitle_control( $wp_customize, 'header_tagline_title', array(
      'label'    => __( 'Logo Tagline Settings', 'petstore' ),
      'section'  => 'logo-section',
      'settings' => 'header_tagline_title',
      'priority' => 67
    ))); 
	 $wp_customize->add_setting( 'header_text_logo_tagline', array(
		'default'        => '',
		'sanitize_callback' => 'text_filed_sanitize',
		'transport' => 'refresh'
	));
	$wp_customize->add_control( 'header_text_logo_tagline', array(
		'label'   => __('Logo Tag Line','petstore'),
		'section' => 'logo-section',
		'type'    => 'text',
		'priority' => 68,

	));
	$wp_customize->add_setting( 'logo_tagline_size', array(
        'default'        => '12',
        'transport' => '',
        'sanitize_callback' => 'check_number',
    ) );
	$wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'logo_tagline_size', array(
			 'label'   => __('Logo Tag Line Font Size','petstore'),
        	'section' => 'logo-section',
			'settings'    => 'logo_tagline_size',
			'priority'    => 69,
			'choices'  => array(
				'min'  => 10,
				'max'  => 150,
				'step' => 1
			),
	)));
	$wp_customize->add_setting( 'logo_tagline_font_weight',  array(
        'default' => 'normal',
        'transport' => '',
        'sanitize_callback' => 'radio_buttons_sanitize'
    ));
    $wp_customize->add_control('logo_tagline_font_weight', array(
        'type' => 'select',
        'label' => __('Logo Tag Line Font Weight','petstore'),
        'section' => 'logo-section',
        'choices' => array(
        	 'normal' => __('Normal','petstore'),
        	 'bold' => __('Bold','petstore'),
        	),
		'priority' => 68,
    ));	
    $wp_customize->add_setting( 'logo_tagline_font_style',  array(
        'default' => 'normal',
        'transport' => '',
        'sanitize_callback' => 'radio_buttons_sanitize'
    ));
    $wp_customize->add_control('logo_tagline_font_style', array(
        'type' => 'select',
        'label' => __('Logo Tag Line Font Style','petstore'),
        'section' => 'logo-section',
        'choices' => array(
        	 'normal' => __('Normal','petstore'),
        	 'italic' => __('Italic','petstore'),
        	),
		'priority' => 69,
    ));	
    $wp_customize->add_setting( 'logo_tagline_letter_spacing', array(
        'default'        => '0',
        'transport' => '',
        'sanitize_callback' => 'check_number',
    ) );
	$wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'logo_tagline_letter_spacing', array(
			 'label'   => __('Logo Tag Line Font Letter Spacing','petstore'),
        	'section' => 'logo-section',
			'settings'    => 'logo_tagline_letter_spacing',
			'priority'    => 70,
			'choices'  => array(
				'min'  => 0,
				'max'  => 20,
				'step' => 1
			),
	)));

   	$wp_customize->add_setting( 'text_logo_tagline_font_family',
    array( 'default' => __('Select Fonts', 'petstore'),
    	'transport' => '',
    	'sanitize_callback' => 'text_filed_sanitize'
    ));
 	$wp_customize->add_control( new Kaya_Customize_google_fonts_Control( $wp_customize, 'text_logo_tagline_font_family', array(
		 'label'   => __('Select Tag Line Font Family','petstore'),
		'section' => 'logo-section',
		'settings'    => 'text_logo_tagline_font_family',
		'priority'    => 71,
	)));

	$colors[] = array(
		'slug'=>'logo_tagline_font_color',
		'default' => '#333333',
		'label' => __('Logo Tag Line Color', 'petstore'),
		'priority' => 72
	);
	// End
	foreach( $colors as $color ) {
	// SETTINGS
	$wp_customize->add_setting(
		$color['slug'], array(
			'default' => $color['default'],
			//'type' => 'option',
			'capability' =>	'edit_theme_options',
						'transport' => '',
			'sanitize_callback' => 'color_filed_sanitize',
		)
	);

	// CONTROLS
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$color['slug'],
			array('label' => $color['label'],
			'section' => 'logo-section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])

		)
	);
}


}
add_action( 'customize_register', 'logo_section' );
//end
// Header Styles
function header_styles($wp_customize){

$wp_customize->add_section(
	// ID
	'header-styles',
	// Arguments array
	array(
		'title' => __( 'Header Styles', 'petstore' ),
		'priority'       => 50,
		'capability' => 'edit_theme_options',
		'panel' => 'header_section_panel'
		//'description' => __( '', 'petstore' )
	));
 $wp_customize->add_setting('header_logo_position',
	array(
		'deafult' => 'left',
		'sanitize_callback' => 'radio_buttons_sanitize',
		'transport' => 'refresh'
		));
 	$src=get_template_directory_uri() . '/images';
	$wp_customize->add_control(new Kaya_Customize_Images_Radio_Control($wp_customize,'header_logo_position',
	array(
		'label' => 'Logo Position',
		'capability' => 'edit_theme_options', 
		 'section'  => 'header-styles',
		'priority' => 82,
		'type' => 'radio',
		'choices' => array(
			'left' => array( 'label' => __( 'Left Logo Right Menu', 'petstore' ),'img_src' => $src . '/header_styles/left-logo-right-menu.jpg' ),
			'right' => array( 'label' => __( 'Right Logo Left Menu', 'petstore' ),'img_src' => $src . '/header_styles/right-logo-left-menu.jpg' ),
			'center' => array( 'label' => __( 'Center Logo', 'petstore' ),'img_src' => $src . '/header_styles/left-right-content-center-logo.jpg' ),
			'logoleft_rightcontent' => array( 'label' => __( 'Logo Left Right Content', 'petstore' ),'img_src' => $src . '/header_styles/left-logo-right-content-bottom-mrenu.jpg' ),
			'logoright_leftcontent' => array( 'label' => __( 'Logo Right Left Content', 'petstore' ),'img_src' => $src . '/header_styles/right-contant-left-logo.jpg' ),
        	'centerlogo_leftright_menu' => array( 'label' => __( 'Center Logo Left & Right Menu', 'petstore' ),'img_src' => $src . '/header_styles/center-logo-left-right-menu.jpg' ),
			)
		)));
	$wp_customize->add_setting( 'header_logo_left_content',
 	array(
 		'default' => '<i class="fa fa-envelope-o"> </i> info@yourdoman.com<br/><i class="fa fa-phone"> </i> +85 (2356) - 5263',
 		'sanitize_callback' => 'text_filed_sanitize',
 		'transport' => ''
 		));
  	$wp_customize->add_control(
    new Kaya_Customize_Textarea_Control( $wp_customize, 'header_logo_left_content', array(
      'label'    => __( 'Logo Left Content', 'petstore' ),
      'section'  => 'header-styles',
      'settings' => 'header_logo_left_content',
      'priority' => 90,
      'type' => 'text-area',
      )));
  	$wp_customize->add_setting( 'header_logo_right_content',
 	array(
 		'default' => '<i class="fa fa-envelope-o"> </i> info@yourdoman.com<br/><i class="fa fa-phone"> </i> +85 (2356) - 5263',
 		'sanitize_callback' => 'text_filed_sanitize',
 		'transport' => ''
 		));
  	$wp_customize->add_control(
    new Kaya_Customize_Textarea_Control( $wp_customize, 'header_logo_right_content', array(
      'label'    => __( 'Logo Right Content', 'petstore' ),
      'section'  => 'header-styles',
      'settings' => 'header_logo_right_content',
      'priority' => 100,
      'type' => 'text-area',
      )));
  	$wp_customize->add_setting( 'header_left_right_content_color',array( 
			'default' => '#333333',
			'transport' => 'refresh',
			'sanitize_callback' => 'color_filed_sanitize',
		));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_left_right_content_color',
		array(			
			'label' => __('Header Content Color', 'petstore'),
			'section' => 'header-styles',
			'priority' => 110,
			'type' => 'color',
	)));

  	$wp_customize->add_setting( 'menu_bar_position', array(
        'default'        => 'left',
        'transport' => '',
        'sanitize_callback' => 'radio_buttons_sanitize'
    ));
 
    $wp_customize->add_control('menu_bar_position', array(
        'type' => 'select',
        'label' => __('Menu Alignment','petstore'),
        'section' => 'header-styles',
        'choices' => array(
        	 'left' => __('Left','petstore'),
        	 'right' => __('Right','petstore'),
        	 'center' => __('Center','petstore')
        	),
		'priority' => 120,
    ));
    $wp_customize->add_setting( 'menu_bar_position_top', array(
		'default'        => '',
		'transport' => '',
		'sanitize_callback' => 'checkbox_field_sanitize',
		'capability'     => 'edit_theme_options' )
	);
	$wp_customize->add_control('menu_bar_position_top', array(
		'label'    => __( 'menu Bar Position Top','petstore' ),
		'section'  => 'header-styles',
		'type'     => 'checkbox',
		'priority' => 130
	) );
}
//add_action( 'customize_register', 'header_styles' );
// Header Settings
function header_section_panel($wp_customize){
	$wp_customize->add_section(
	// ID
	'header-section',
	// Arguments array
	array(
		'title' => __( 'Header Settings', 'petstore' ),
		'priority'       => 50,
		'capability' => 'edit_theme_options',
		'panel' => 'header_section_panel'
		//'description' => __( '', 'petstore' )
	));
	$wp_customize->add_setting( 'select_header_background_type',  array(
        'default' => 'bg_type_image',
        'transport' => '',
        'sanitize_callback' => 'radio_buttons_sanitize'
    ));
    $wp_customize->add_control('select_header_background_type', array(
        'type' => 'select',
        'label' => __('Select Background Type','petstore'),
        'section' => 'header-section',
        'choices' => array(
        	 'bg_type_color' => __('Background Color','petstore'),
        	 'bg_type_image' => __('Background Image','petstore'),
        	),
		'priority' => 20,
    ));
  $url=get_template_directory_uri().'/images/';
  $wp_customize->add_setting('upload_header[bg_image]', array(
        'default'           => $url.'header-defaul-image.jpg',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'upload_sanitize_id',
        'transport' 		=> '',
        //'type'           => 'option',
    ));
    $wp_customize->add_control( new Kaya_Customize_Imageupload_Control($wp_customize, 'bg_image', array(
        'label'    => __('Header Background Image', 'petstore'),
        'section'  => 'header-section',
        'settings' => 'upload_header[bg_image]',
		'priority' => 30
    )));

 $wp_customize->add_setting('backgroundbg_repeat',
	array(
		'deafult' => 'repeat',
		'transport' => '',
		'sanitize_callback' => 'radio_buttons_sanitize',
		));
$wp_customize->add_control('backgroundbg_repeat',
	array(
		'label' => 'Background Repeat',
		'capability' => 'edit_theme_options', 
		'section' => 'header-section',
		'priority' => 40,
		'type' => 'radio',
		'choices' => array(
			'no-repeat' => 'No Repeat',
			'repeat' => 'Repeat',
			'cover' => 'Cover'
			)
	));
	$wp_customize->add_setting( 'header_bg_color',
	array( 
		'default' => '#F85204',
		'transport' => '',
		'sanitize_callback' => 'color_filed_sanitize',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_bg_color',
		array(			
			'label' => __('Background Color', 'petstore'),
			'section' => 'header-section',
			'priority' => 50,
			'type' => 'color',
	)));
	$wp_customize->add_setting( 'header_padding_top_bottom', array(
        'default'        => '35',
        'transport' => '',
        'sanitize_callback' => 'check_number'
    ) );
 	$wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'header_padding_top_bottom', array(
			 'label'   => __('Header Padding Top & Bottom','petstore'),
        	'section' => 'header-section',
			'settings'    => 'header_padding_top_bottom',
			'priority'    => 51,
			'choices'  => array(
				'min'  => 10,
				'max'  => 300,
				'step' => 1
			),
	)));
	$wp_customize->add_setting( 'header_bg_color',
	array( 
		'default' => '',
		'transport' => '',
		'sanitize_callback' => 'color_filed_sanitize',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_bg_color',
		array(			
			'label' => __('Background Color', 'petstore'),
			'section' => 'header-section',
			'priority' => 50,
			'type' => 'color',
	)));
  $wp_customize->add_setting( 'top_bar_left_content', array(
			'default' => '',
			'transport' => '',
			'sanitize_callback' => 'text_filed_sanitize',
		) );
  $wp_customize->add_control(
    new Kaya_Customize_Textarea_Control( $wp_customize, 'top_bar_left_content', array(
      'label'    => __( 'Right Section Content', 'petstore' ),
      'section'  => 'header-section',
      'settings' => 'top_bar_left_content',
      'priority' => 56,
      'type' => 'text-area',
      ))  );
   $wp_customize->add_setting( 'header_right_section_info',array(
  	  		'sanitize_callback' => 'text_filed_sanitize',
  	  	) );
 	$wp_customize->add_control(
    new Kaya_Customize_Description_Control( $wp_customize, 'header_right_section_info', array(
      'label'    => __( 'Ex:<h4 style="color: #2f2f2f;">Free phone:</h4><h2 style="color: #f85204;"><i class="fa fa-mobile"></i>800-2345-6789</h2>', 'petstore' ),
      'section'  => 'header-section',
      'settings' => 'header_right_section_info',
      'priority' => 57
    	))
 	 );
}
add_action('customize_register','header_section_panel');
// Sticky section
function sticky_header_section($wp_customize){
	$url=get_template_directory_uri().'/images/';
	$wp_customize->add_section(
	// ID
	'sticky-header-section',
	// Arguments array
	array(
		'title' => __( 'Sticky Menu Settings', 'petstore' ),
		'priority'       => 50,
		'capability' => 'edit_theme_options',
		//'description' => __( '', 'petstore' )
		'panel' => 'header_section_panel'
	));

	$wp_customize->add_setting( 'sticky_header_disable', array(
		'default'        => 0,
		'type'           => 'option',
		'sanitize_callback' => 'text_filed_sanitize',
		'capability'     => 'edit_theme_options' )
	);

	$wp_customize->add_control('sticky_header_disable', array(
		'label'    => __( 'Enable Sticky Menu','petstore' ),
		'section'  => 'sticky-header-section',
		'type'     => 'checkbox',
		'priority' => 30
	) );
	
	$colors[] = array(
		'slug'=>'sticky_header_link_color',
		'default' => '#333333',
		'label' => __('Links Color', 'petstore'),
		'priority' => 130
	);
	$colors[] = array(
		'slug'=>'sticky_header_link_hover_color',
		'default' => '#F85204',
		'label' => __('Links Hover Color', 'petstore'),
		'priority' => 140
	);
	$wp_customize->add_setting( 'sticky_retina_disable', array(
		'default'        => 0,
		'type'           => 'option',
		'sanitize_callback' => 'text_filed_sanitize',
		'capability'     => 'edit_theme_options' )
	);
	$wp_customize->add_setting( 'retina_logo_title', array(
			'sanitize_callback' => 'text_filed_sanitize',
		) );
	$wp_customize->add_control(
    new Kaya_Customize_Subtitle_control( $wp_customize, 'retina_logo_title', array(
      'label'    => __( 'Retina Logo', 'petstore' ),
      'section'  => 'sticky-header-section',
      'settings' => 'retina_logo_title',
      'priority' => 142
    ))); 
	$wp_customize->add_control('sticky_retina_disable', array(
		'label'    => __( 'Enable Retina Logo','petstore' ),
		'section'  => 'sticky-header-section',
		'type'     => 'checkbox',
		'priority' => 145
	) );
    $wp_customize->add_setting('sticky_retina_logo[upload_sticky_retina_logo]', array(
        'default'           => $url.'logo.png',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'upload_sanitize_id',
        'type'           => 'option',
        'transport' 	=> '',	
    ));
    $wp_customize->add_control( new Kaya_Customize_Imageupload_Control($wp_customize, 'upload_sticky_retina_logo', array(
        'label'    => __('Upload Sticky Retina Logo Image', 'petstore'),
        'section'  => 'sticky-header-section',
        'settings' => 'sticky_retina_logo[upload_sticky_retina_logo]',
		'priority' => 146
    )));
    foreach( $colors as $color ) {
	// SETTINGS
	$wp_customize->add_setting(
		$color['slug'], array(
			'default' => $color['default'],
			//'type' => 'option',
			'capability' =>	'edit_theme_options',
			'transport' => '',
			'sanitize_callback' => 'color_filed_sanitize',
		)
	);

	// CONTROLS
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$color['slug'],
			array('label' => $color['label'],
			'section' => 'sticky-header-section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])

		)
	);
}
}
add_action( 'customize_register', 'sticky_header_section' );
// Retina Logo 
function retina_logo_panel($wp_customize){
	$wp_customize->add_section(
	// ID
	'retina-logo-section',
	// Arguments array
	array(
		'title' => __( 'Retina Logo Settings', 'petstore' ),
		'priority'       => 50,
		'capability' => 'edit_theme_options',
		'panel' => 'header_section_panel'
		//'description' => __( '', 'petstore' )
	));
	$wp_customize->add_setting('retina_logo[upload_retina_logo]', array(
	    'default'           => '',
	    'capability'        => 'edit_theme_options',
	    'sanitize_callback' => 'upload_sanitize_id',
	    'type'           => 'option',
    ));
    $wp_customize->add_control( new Kaya_Customize_Imageupload_Control($wp_customize, 'upload_retina_logo', array(
        'label'    => __('Upload Retina Logo Image', 'petstore'),
        'section'  => 'retina-logo-section',
        'settings' => 'retina_logo[upload_retina_logo]',
		'priority' => 152
    )));

}
//add_action('customize_register','retina_logo_panel');
// Menu Section
function menu_section( $wp_customize ) {
	$wp_customize->add_section(
	// ID
	'menu-section',
	// Arguments array
	array(
		'title' => __( 'Menu Links Color Settings', 'petstore' ),
		'priority'       => 50,
		'capability' => 'edit_theme_options',
		'panel' => 'header_section_panel',
	));
 	$colors[] = array(
		'slug'=>'menu_background_color',
		'default' => '#2f2f2f',
		'label' => __('Menu bar Background Color', 'petstore'),
		'priority' => 10
	);
    $colors[] = array(
		'slug'=>'menu_link_color',
		'priority' => 20,
		'default' => '',
		'label' => __('Menu Links Color', 'petstore'),
	);
	
	$colors[] = array(
		'slug'=>'menu_link_hover_text_color',
		'default' => '#333333',
		'label' => __('Menu  Hover BG Links color', 'petstore'),
		'priority' => 40
	);
	$colors[] = array(
		'slug'=>'menu_link_bg_hover_color',
		'default' => '',
		'label' => __('Menu Links BG Hover color', 'petstore'),
		'priority' => 45
	);
	$colors[] = array(
		'slug'=>'menu_bg_active_color',
		'default' => '#c9c9c9',
		'label' => __('Menu Active BG Color', 'petstore'),
		'priority' => 50
	);
	$colors[] = array(
		'slug'=>'menu_link_active_color', 
		'priority' => 60,
		'default' => '#333333',
		'label' => __('Menu Active BG Links Color', 'petstore'),
	);
	$wp_customize->add_setting( 'submenu_title', array(
			'sanitize_callback' => 'text_filed_sanitize',
		) );
	$wp_customize->add_control(
    new Kaya_Customize_Subtitle_control( $wp_customize, 'submenu_title', array(
      'label'    => __( 'Child Menu Settings', 'petstore' ),
      'section'  => 'menu-section',
      'settings' => 'submenu_title',
      'priority' => 70
    ))); 
    $colors[] = array(
		'slug'=>'sub_menu_bg_color',
		'default' => '#2B2B2B',
		'label' => __('Background Color', 'petstore'),
		'priority' => 90
	);
    $colors[] = array(
		'slug'=>'sub_menu_bottom_border_color',
		'default' => '#1e1e1e',
		'label' => __('Menu Links Bottom Border Color', 'petstore'),
		'priority' => 100
	);
   	$colors[] = array(
		'slug'=>'sub_menu_link_color',
		'default' => '#eee',
		'label' => __('Links Color', 'petstore'),
		'priority' => 110
	);
	$colors[] = array(
		'slug'=>'sub_menu_link_hover_color',
		'default' => '#eee',
		'label' => __('Links Hover Color', 'petstore'),
		'priority' => 120
	);
	$colors[] = array(
		'slug'=>'sub_menu_link_active_color',
		'default' => '#fff',
		'label' => __('Link Active Color', 'petstore'),
		'priority' => 130
	);  
    foreach( $colors as $color ) {
	// SETTINGS
	$wp_customize->add_setting(
		$color['slug'], array(
			'default' => $color['default'],
			//'type' => 'option',
			'capability' =>	'edit_theme_options',
			'transport' => '',
			'sanitize_callback' => 'color_filed_sanitize',
		)
	);
	// CONTROLS
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$color['slug'],
			array('label' => $color['label'],
			'section' => 'menu-section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])

		)
	);
}
}
add_action( 'customize_register', 'menu_section'); // End
function different_menu_color_section( $wp_customize ) {
	$wp_customize->add_section(
	// ID
	'different-menu-color-section',
	// Arguments array
	array(
		'title' => __( 'Different Menu color Settings', 'petstore' ),
		'priority'       => 55,
		'capability' => 'edit_theme_options',
		'panel' => 'header_section_panel',
	));
	$wp_customize->add_setting( 'different_menu_colors',array(
  	  		'sanitize_callback' => 'text_filed_sanitize',
  	));
 	$wp_customize->add_control(
    new Kaya_Customize_Description_Control( $wp_customize, 'different_menu_colors', array(
       'html_tags' => true,
       'label'    => __( 'To Know How to Add different colors to menu.','petstore') . '&nbsp;<a target="_blank" href="https://youtu.be/sNu19R18dt4">Watch this Video</a>',
      'section'  => 'different-menu-color-section',
      'settings' => 'different_menu_colors',
      'priority' => 3
    	))
 	 ); 
    $colors[] = array(
		'slug'=>'menu1_color',
		'default' => '',
		'label' => __('Menu-1 BG Color', 'petstore'),
		'priority' => 10
	);
    $colors[] = array(
		'slug'=>'menu2_color',
		'default' => '',
		'label' => __('Menu-2 BG Color', 'petstore'),
		'priority' => 20
	);
   	$colors[] = array(
		'slug'=>'menu3_color',
		'default' => '',
		'label' => __('Menu-3 BG Color', 'petstore'),
		'priority' => 30
	);
	$colors[] = array(
		'slug'=>'menu4_color',
		'default' => '',
		'label' => __('Menu-4 BG Color', 'petstore'),
		'priority' => 40
	);
	$colors[] = array(
		'slug'=>'menu5_color',
		'default' => '',
		'label' => __('Menu-5 BG Color', 'petstore'),
		'priority' => 50
	);  

	$colors[] = array(
		'slug'=>'menu6_color',
		'default' => '',
		'label' => __('Menu-6 BG Color', 'petstore'),
		'priority' => 60
	);
	$colors[] = array(
		'slug'=>'menu7_color',
		'default' => '',
		'label' => __('Menu-7 BG Color', 'petstore'),
		'priority' => 70
	);
	$colors[] = array(
		'slug'=>'menu8_color',
		'default' => '',
		'label' => __('Menu-8 BG Color', 'petstore'),
		'priority' => 80
	);
	$colors[] = array(
		'slug'=>'menu9_color',
		'default' => '',
		'label' => __('Menu-9 BG Color', 'petstore'),
		'priority' => 90
	);
	$colors[] = array(
		'slug'=>'menu10_color',
		'default' => '',
		'label' => __('Menu-10 BG Color', 'petstore'),
		'priority' => 100
	);
    foreach( $colors as $color ) {
	// SETTINGS
	$wp_customize->add_setting(
		$color['slug'], array(
			'default' => $color['default'],
			//'type' => 'option',
			'capability' =>	'edit_theme_options',
			'sanitize_callback' => 'color_filed_sanitize',
		)
	);
	// CONTROLS
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$color['slug'],
			array('label' => $color['label'],
			'section' => 'different-menu-color-section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])

		)
	);
}


}
add_action( 'customize_register', 'different_menu_color_section'); // End

function skincolors( $wp_customize ) {
		$wp_customize->add_section(
	// ID
	'Custom_color_section',
	// Arguments array
	array(
		'title' => __( 'Accent Colors', 'petstore' ),
		'priority'       => 60,
		'capability' => 'edit_theme_options',
		'panel'  => 'general_section',
		'description' => __( '<strong class="customizer_note"> Note: </strong>Color applies for slider dot navigation background color, single page slider arrows BG hover, highlighted title colors, blog and portfolio next / preview button bg colors, blog meta post awesome icons color and etc.', 'petstore' )
	)
);	
	$colors = array();
	$colors[] = array(
		'slug'=>'accent_bg_color',
		'default' => '#F85204',
		 'transport'   => 'refresh',
		'label' => __('Accent BG Color', 'petstore')
	);

	$colors[] = array(
		'slug'=>'accent_text_color',
		'default' => '#ffffff',
		 'transport'   => 'refresh',
		'label' => __('Text Color for Accent BG Color', 'petstore')
	);

foreach( $colors as $color ) {
	// SETTINGS
	$wp_customize->add_setting(
		$color['slug'], array(
			'default' => $color['default'],
			//'type' => 'option', 
			'capability' => 'edit_theme_options',
			'transport' => 'postMessage',
			'sanitize_callback' => 'color_filed_sanitize',
		)
	);
	// CONTROLS
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$color['slug'], 
			array('label' => $color['label'], 
			'section' => 'Custom_color_section',
			'settings' => $color['slug'])
		)
	);
}
	
}
add_action( 'customize_register', 'skincolors' );
// End

// Page Title color Settings

function page_color_section( $wp_customize ) {
	$wp_customize->add_panel( 'page_color_panel', array(
	    'priority' => 70,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __('Page Section','petstore'),
	) );	
	$wp_customize->add_section(
	// ID
	'page-color-section',
	// Arguments array
	array(
		'title' => __( 'Page Title bar Settings', 'petstore' ),
		'priority'       => 70,
		'capability' => 'edit_theme_options',
		'panel' => 'page_color_panel'
		//'description' => __( '', 'petstore' )
	));
	$wp_customize->add_setting( 'select_page_title_background_type',  array(
        'default' => 'bg_type_color',
        'transport' => '',
        'sanitize_callback' => 'radio_buttons_sanitize'
    ));
    $wp_customize->add_control('select_page_title_background_type', array(
        'type' => 'select',
        'label' => __('Select Background Type','petstore'),
        'section' => 'page-color-section',
        'choices' => array(
			'bg_type_image' => __('Background Image','petstore'),
			'bg_type_color' => __('Background Color','petstore'),
        	),
		'priority' => 1,
    ));
	$url=get_template_directory_uri().'/images/';	
    $wp_customize->add_setting('page_title_bar[bg_img]',array(
    	'default' => '',
    	'capability' => 'edit_theme_options',
    	'type' => 'option',
    	'sanitize_callback' => 'upload_sanitize_id',
    	'transport' => 'postMessage',
    	));
     $wp_customize->add_control(
    	new Kaya_Customize_Imageupload_Control($wp_customize,'page_title_bar',array(
    		'label' =>  __('Upload Background Image','petstore'),
    		'section' => 'page-color-section',
    		'settings' => 'page_title_bar[bg_img]',
    		'priority' => 10
    	 	)));

    $wp_customize->add_setting('page_title_bar_bg_repeat',
	array(
		'deafult' => 'repeat',
		'transport' => 'postMessage',
		'sanitize_callback' => 'radio_buttons_sanitize',
		));
	$wp_customize->add_control('page_title_bar_bg_repeat',
	array(
		'label' => 'Background Repeat',
		'capability' => 'edit_theme_options', 
		'section' => 'page-color-section',
		'priority' => 20,
		'type' => 'radio',
		'choices' => array(
			'no-repeat' => 'No Repeat',
			'repeat' => 'Repeat',
			'cover'	=> 'Cover',
			)
		));
	$wp_customize->add_setting('page_title_img_position',
	array(
		'deafult' => 'yes',
		'sanitize_callback' => 'radio_buttons_sanitize',
		));   
	$wp_customize->add_control('page_title_img_position',
	array(
		'label' => __('Background Attachment','petstore'),
		'capability' => 'edit_theme_options', 
		'section' => 'page-color-section',
		'priority' => 30,
		'type' => 'radio',
		'choices' => array(
			'no' => __('Scroll','petstore'),
			'yes' => __('Fixed ','petstore'),
			'with_zoom' => __('Zoom While Scrolling','petstore'),
			)
		));

	$wp_customize->add_setting( 'parallax_zoom_note_description', array(
		'sanitize_callback' => 'text_filed_sanitize',
		) );
	$wp_customize->add_control(
	new Kaya_Customize_Description_Control( 
	  $wp_customize, 'parallax_zoom_note_description', array(
	  'label'    => __( 'Note: When using "Zoom While Scrolling" option, set background image size must be more then the screen width', 'petstore' ),
	 'section' => 'page-color-section',
	  'settings' => 'parallax_zoom_note_description',
	  'priority' => 31
	)));
	$wp_customize->add_setting( 'page_title_bg_color',
		array( 
			'default' => '#e8e8e8',
			'transport' => 'postMessage',
			'sanitize_callback' => 'color_filed_sanitize',
		));
	$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize, 'page_title_bg_color',
		array(
			'label' => 'Background Color',
			'section' => 'page-color-section',
			'priority' => 50,
			'type' => 'color',
		)));
	$wp_customize->add_setting( 'page_titlebar_title_color',
		array( 
			'default' => '#333333',
			'transport' => 'postMessage',
			'sanitize_callback' => 'color_filed_sanitize',
		));
	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize, 'page_titlebar_title_color',
		array(
			'label' => 'Title Color',
			'section' => 'page-color-section',
			'priority' =>60,
			'type' => 'color',
		)));

	$wp_customize->add_setting( 'page_title_font_size', array(
        'default'        => '25',
        'transport' => 'postMessage',
    	'sanitize_callback'    => 'check_number',
    ) );
    $wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'page_title_font_size', array(
			 'label'   => __('Page Title Font Size (px)','petstore'),
        	'section' => 'page-color-section',
			'settings'    => 'page_title_font_size',
			'priority'    => 70,
			'choices'  => array(
				'min'  => 12,
				'max'  => 100,
				'step' => 1
			),
		)));

     $wp_customize->add_setting( 'page_title_font_weight',  array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'radio_buttons_sanitize'
    ));
    $wp_customize->add_control('page_title_font_weight', array(
        'type' => 'select',
        'label' => __('Title Font Weight','petstore'),
        'section' => 'page-color-section',
        'choices' => array(
        	 'normal' => 'Normal',
        	 'bold' => 'Bold',
        	),
		'priority' => 80,
    ));
    $wp_customize->add_setting( 'page_title_font_style',  array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'radio_buttons_sanitize'
    ));
    $wp_customize->add_control('page_title_font_style', array(
        'type' => 'select',
        'label' => __('Title Font Style','petstore'),
        'section' => 'page-color-section',
        'choices' => array(
        	 'normal' => 'Normal',
        	 'italic' => 'Italic',
        	),
		'priority' =>90,
    ));

	$wp_customize->add_setting( 'title_description_color',
		array( 
			'default' => '#454545',
			'transport' => 'postMessage',
			'sanitize_callback' => 'color_filed_sanitize',
		));
	$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize, 'title_description_color',
		array(
			'label' => 'Title Description Color',
			'section' => 'page-color-section',
			'priority' => 100,
			'type' => 'color',
		)));
	$wp_customize->add_setting( 'page_description_font_size', array(
        'default'   => '16',
        'transport' => 'postMessage',
    	'sanitize_callback'    => 'check_number',
    ) );
    $wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'page_description_font_size', array(
			 'label'   => __('Title Description Font Size (px)','petstore'),
        	'section' => 'page-color-section',
			'settings'    => 'page_description_font_size',
			'priority'    => 110,
			'choices'  => array(
				'min'  => 10,
				'max'  => 100,
				'step' => 1
			),
		)));

    $wp_customize->add_setting( 'page_description_font_weight',  array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'radio_buttons_sanitize'
    ));
    $wp_customize->add_control('page_description_font_weight', array(
        'type' => 'select',
        'label' => __('Description Font Weight','petstore'),
        'section' => 'page-color-section',
        'choices' => array(
        	 'normal' => 'Normal',
        	 'bold' => 'Bold',
        	),
		'priority' => 110,
    ));
      $wp_customize->add_setting( 'page_description_font_style',  array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'radio_buttons_sanitize'
    ));
    $wp_customize->add_control('page_description_font_style', array(
        'type' => 'select',
        'label' => __('Description Font Style','petstore'),
        'section' => 'page-color-section',
        'choices' => array(
        	 'normal' => 'Normal',
        	 'italic' => 'Italic',
        	),
		'priority' => 120,
    ));
      $wp_customize->add_setting( 'page_title_des_position',  array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'radio_buttons_sanitize'
    ));
    $wp_customize->add_control('page_title_des_position', array(
        'type' => 'select',
        'label' => __('Title & Description position','petstore'),
        'section' => 'page-color-section',
        'choices' => array(
        	 'left' => 'Left',
        	 'right' => 'Right',
        	 'center' => 'Center',
        	),
		'priority' => 121,
    ));
	/* Breadcrumb Color */
	$wp_customize->add_setting( 'bread_crumb_remove', array(
		'default'        => 0,
		'transport' => '',
		'sanitize_callback' => 'checkbox_field_sanitize',
		'capability'     => 'edit_theme_options' )
	);

	$wp_customize->add_control('bread_crumb_remove', array(
		'label'    => __( 'Disable Breadcrumb','petstore' ),
		'section'  => 'page-color-section',
		'type'     => 'checkbox',
		'priority' => 125
	) );
		$wp_customize->add_setting( 'bread_crumb_text_color',
		array( 
			'default' => '#ffffff',
			'transport' => 'postMessage',
			'sanitize_callback' => 'color_filed_sanitize',
		));
	$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize, 'bread_crumb_text_color',
		array(
			'label' => 'Breadcrumb Text Color',
			'section' => 'page-color-section',
			'priority' => 130,
			'type' => 'color',
		)));
	$wp_customize->add_setting( 'bread_crumb_link_color',
		array( 
			'default' => '#ffffff',
			'transport' => 'postMessage',
			'sanitize_callback' => 'color_filed_sanitize',
		));
	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize, 'bread_crumb_link_color',
		array(
			'label' => 'Breadcrumb Link Color',
			'section' => 'page-color-section',
			'priority' => 140,
			'type' => 'color',
		)));
		 $wp_customize->add_setting( 'page_title_bar_padding_t_b', array(
        'default'        => '50',
        'transport' => 'postMessage',
    	'sanitize_callback'    => 'check_number',
    ) );
 
   $wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'page_title_bar_padding_t_b', array(
			 'label'   => __('Page Title Bar Padding Top & Bottom (px)','petstore'),
        	'section' => 'page-color-section',
			'settings'    => 'page_title_bar_padding_t_b',
			'priority'    => 160,
			'choices'  => array(
				'min'  => 15,
				'max'  => 200,
				'step' => 1
			),
		)));
  	$wp_customize->add_setting( 'page_titlebar_border_bottom', array(
        'default'        => '0',
        'transport' => 'postMessage',
        'sanitize_callback' => 'check_number'
    ));
 	$wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'page_titlebar_border_bottom', array(
			 'label'   => __('Page Titlebar Bottom Border','petstore'),
        	'section' => 'page-color-section',
			'settings'    => 'page_titlebar_border_bottom',
			'priority'    => 161,
			'choices'  => array(
				'min'  => 0,
				'max'  => 30,
				'step' => 1
			),
	)));
	$wp_customize->add_setting( 'page_titlebar_border_bottom_color',array( 
			'default' => '#454545',
			'transport' => 'postMessage',
			'sanitize_callback' => 'color_filed_sanitize',
		));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'page_titlebar_border_bottom_color',
		array(			
			'label' => __('Page Titlebar Bottom Border Color', 'petstore'),
			'section' => 'page-color-section',
			'priority' => 162,
			'type' => 'color',
	)));
	$colors = array();
    foreach( $colors as $color ) {
	// SETTINGS
	$wp_customize->add_setting(
		$color['slug'], array(
			'default' => $color['default'],
			//'type' => 'option',
			'capability' =>	'edit_theme_options',
			'transport' => 'postMessage',
			'sanitize_callback' => 'color_filed_sanitize',
		)
	);
	// CONTROLS
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$color['slug'],
			array('label' => $color['label'],
			'section' => 'page-color-section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])

		));
}
}
add_action( 'customize_register', 'page_color_section' );
// Page middle content color
function page_middle_color_panel($wp_customize){
	$wp_customize->add_section(
	// ID
	'page_middle_color_section',
	// Arguments array
	array(
		'title' => __( 'Page Middle Content Settings', 'petstore' ),
		'priority'       => 80,
		'capability' => 'edit_theme_options',
		'panel' => 'page_color_panel'
		//'description' => __( '', 'petstore' )
	));

	$wp_customize->add_setting( 'select_page_mid_background_type',  array(
        'default' => 'bg_type_color',
        'transport' => '',
        'sanitize_callback' => 'radio_buttons_sanitize'
    ));
    $wp_customize->add_control('select_page_mid_background_type', array(
        'type' => 'select',
        'label' => __('Select Background Type','petstore'),
        'section' => 'page_middle_color_section',
        'choices' => array(
        	 'bg_type_color' => __('Background Color','petstore'),
        	 'bg_type_image' => __('Background Image','petstore'),
        	),
		'priority' => 50,
    ));

	$wp_customize->add_setting('page_content_bg[bg_img]',array(
    	'default' =>  '',
    	'capability' => 'edit_theme_options',
    	'sanitize_callback' => 'upload_sanitize_id',
    	'transport' => 'postMessage',
    	//'type' => 'option'
    	));
     $wp_customize->add_control(
    	new Kaya_Customize_Imageupload_Control($wp_customize,'page_content_bg',array(
    		'label' =>  __('Upload Background Image','petstore'),
    		'section' => 'page_middle_color_section',
    		'settings' => 'page_content_bg[bg_img]',
    		'priority' => 60
    	 	)));

    $wp_customize->add_setting('page_content_bg_repeat',
	array(
		'deafult' => 'repeat',
		'transport' => 'postMessage',
		'sanitize_callback' => 'radio_buttons_sanitize',
		));
	$wp_customize->add_control('page_content_bg_repeat',
	array(
		'label' => 'Background Repeat',
		'capability' => 'edit_theme_options', 
		'section' => 'page_middle_color_section',
		'priority' => 70,
		'type' => 'radio',
		'choices' => array(
			'no-repeat' => 'No Repeat',
			'repeat' => 'Repeat',
			'cover' => 'Cover'
			)
		));
		$colors[] = array(
			'slug'=>'page_bg_color',
			'default' => '',
			'label' => __('Background Color', 'petstore'),
			'priority' => 80
		);

		$colors[] = array(
			'slug'=>'page_titles_color',
			'default' => '#333',
			'label' => __('Title Color', 'petstore'),
			'priority' => 90
		);
		$colors[] = array(
			'slug'=>'page_description_color',
			'default' => '#787878',
			'label' => __('Content Color', 'petstore'),
			'priority' => 100
		);
		$colors[] = array(
			'slug'=>'page_link_color',
			'default' => '#333333',
			'label' => __('Link Color', 'petstore'),
			'priority' => 110
		);
		$colors[] = array(
			'slug'=>'page_link_hover_color',
			'default' => '#F85204',
			'label' => __('Link Hover Color', 'petstore'),
			'priority' => 120
		);
	 foreach( $colors as $color ) {
	// SETTINGS
	$wp_customize->add_setting(
		$color['slug'], array(
			'default' => $color['default'],
			//'type' => 'option',
			'capability' =>	'edit_theme_options',
			'transport' => 'postMessage',
			'sanitize_callback' => 'color_filed_sanitize',
		)
	);
	// CONTROLS
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$color['slug'],
			array('label' => $color['label'],
			'section' => 'page_middle_color_section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])

		));	
}
}
add_action('customize_register','page_middle_color_panel');
// Page Sidebar color section
function page_sidebar_color_panel($wp_customize)
{
	$wp_customize->add_section(
	// ID
	'page-sidbar-color-section',
	// Arguments array
	array(
		'title' => __( 'Page Sidebar Color Settings', 'petstore' ),
		'priority'       => 80,
		'capability' => 'edit_theme_options',
		'panel' => 'page_color_panel'
		//'description' => __( '', 'petstore' )
	));
	$colors[] = array(
		'label' => 'Title Color',
		'default' => '#333',
		'priority' => 1,
		'slug' => 'sidebar_title_color',
		'capability' => 'edit_theme_options'
		);
	$colors[] = array(
			'label' => __('Content Color','petstore'),
			'slug' => 'sidebar_content_color',
			'priority' => 2,
			'default' => '#787878',
			'capability' => 'edit_theme_options'
		);
	$colors[] = array(
			'label' => __('Link Color','petstore'),
			'slug' => 'sidebar_link_color',
			'priority' => 3,
			'capability' => 'edit_theme_options',
			'default' => '#454545'
		);
	$colors[] = array(
			'label' => __('Link Hover Color','petstore'),
			'slug' => 'sidebar_link_hover_color',
			'default' => '#F85204',
			'priority' => 4,
			'capability' => 'edit_theme_options'
		);   
    foreach( $colors as $color ) {
	// SETTINGS
	$wp_customize->add_setting(
		$color['slug'], array(
			'default' => $color['default'],
			//'type' => 'option',
			'capability' =>	'edit_theme_options',
			'transport' => '',
			'sanitize_callback' => 'color_filed_sanitize',
		)
	);
	// CONTROLS
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$color['slug'],
			array('label' => $color['label'],
			'section' => 'page-sidbar-color-section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])

		));
}
}
add_action( 'customize_register', 'page_sidebar_color_panel' );
//end 
/*-----------------------------------------------------------------------------------*/
// Blog Single Page
/*-----------------------------------------------------------------------------------*/ 
function blog_single_page_section( $wp_customize ){
  // Blog Page Categories
  $wp_customize->add_section('blog_page_section',array(
      'title' => __('Blog Page Section','petstore'),
      'priority' => '100'
    ));

$wp_customize->add_setting( 'blog_post_date_bg_color',
		array( 
			'default' => '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'color_filed_sanitize',
		));
	
$wp_customize->add_setting('kaya_readmore_blog', 
    array(
        'default' => __('Read More','petstore'),
        'transport' => 'postMessage',
        'sanitize_callback' => 'text_filed_sanitize',
    ));				
$wp_customize->add_control(
    'kaya_readmore_blog',
    array(
        'label' => __('Readmore Button Text', 'petstore' ),
        'section' => 'blog_page_section',
        'type' => 'text',
        'priority' => 0,    
    ));
 $wp_customize->add_setting( 'kaya_readmore_blog_note', array(
    	'sanitize_callback' => 'text_filed_sanitize',
    	) );
    $wp_customize->add_control(
    new Kaya_Customize_Description_Control( 
      $wp_customize, 'kaya_readmore_blog_note', array(
      'label'    => __( 'Note: It works only for blog category, archives and tag pages', 'petstore' ),
      'section'  => 'blog_page_section',
      'settings' => 'kaya_readmore_blog_note',
      'priority' => 1
    ))
  );
  $wp_customize->add_setting('blog_single_page_sidebar', array(
      'default' => 'two_third',
      'sanitize_callback' => 'radio_buttons_sanitize',
    ));
  $wp_customize->add_control('blog_single_page_sidebar',array(
    'label' => __('Blog Single Page Sidebar','petstore'),
    'type' => 'radio',
    'section' => 'blog_page_section',
    'choices' => array(
      'fullwidth' => __('No Sidebar','petstore'),
      'two_third' => __('Right','petstore'),
      'two_third_last' => __('Left','petstore')
      ),
    'priority' => 2
  ));
 $wp_customize->add_setting( 'author_meta_comment_bg_color', array( 
      'default' => '#ffffff',
      'transport' => 'postMessage',
      'sanitize_callback' => 'color_filed_sanitize',
    ));
  $wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'author_meta_comment_bg_color',
    array(
      'label' => 'Single Page Post Meta, Comments & Author Info BG Color ',
      'section' => 'blog_page_section',
      'priority' => 3,
      'type' => 'color',
    )));
  $wp_customize->add_setting( 'author_meta_comment_border_color', array( 
      'default' => '#dfdfdf',
      'transport' => 'postMessage',
      'sanitize_callback' => 'color_filed_sanitize',
    ));
  $wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'author_meta_comment_border_color',
    array(
      'label' => 'Single Page Post Meta, Comments & Author Info Border Color ',
      'section' => 'blog_page_section',
      'priority' => 10,
      'type' => 'color',
    )));
$wp_customize->add_setting( 'author_meta_comment_text_color', array( 
      'default' => '#737373',
      'transport' => 'postMessage',
      'sanitize_callback' => 'color_filed_sanitize',
    ));
  $wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'author_meta_comment_text_color',
    array(
      'label' => 'Single Page Post Meta, Comments & Author Info Text Color',
      'section' => 'blog_page_section',
      'priority' => 20,
      'type' => 'color',
    ))); 
  $wp_customize->add_setting( 'author_meta_comment_link_color', array( 
      'default' => '#737373',
      'transport' => 'postMessage',
      'sanitize_callback' => 'color_filed_sanitize',
    ));
  $wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'author_meta_comment_link_color',
    array(
      'label' => 'Single Page Post Meta, Comments & Author Info Link Color',
      'section' => 'blog_page_section',
      'priority' => 30,
      'type' => 'color',
    )));
    $wp_customize->add_setting( 'author_meta_comment_link_hover_color', array( 
      'default' => '#737373',
      'transport' => 'postMessage',
      'sanitize_callback' => 'color_filed_sanitize',
    ));
  $wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'author_meta_comment_link_hover_color',
    array(
      'label' => 'Single Page Post Meta, Comments & Author Info Link Hover Color',
      'section' => 'blog_page_section',
      'priority' => 40,
      'type' => 'color',
    )));  
}
add_action('customize_register','blog_single_page_section');
// Contact Us Page
function contact_page_section( $wp_customize ){
	$wp_customize->add_section('contact_page_section',array(
			'title' => 'Contact Us Page Section',
			'priority' => '110'
		));
	$wp_customize->add_setting('contact_email_id', array(
			'default' => 'info@gmail.com',
			'sanitize_callback' => 'text_filed_sanitize',
		));
	$wp_customize->add_control('contact_email_id',array(
		'label' => __('Email ID','petstore'),
		'type' => 'text',
		'section' => 'contact_page_section',
		'priority' => 1
	));
	$wp_customize->add_setting('submit_button_text', array(
			'default' => 'Email!',
			'sanitize_callback' => 'text_filed_sanitize',
		));
	$wp_customize->add_control('submit_button_text',array(
		'label' => __('Submit Button Text','petstore'),
		'type' => 'text',
		'section' => 'contact_page_section',
		'priority' => 2
	));
}
//add_action('customize_register','contact_page_section');
// footer Page Section
function page_content_footer( $wp_customize ){
	$wp_customize->add_panel( 'footer_section', array(
	    'priority' => 130,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Footer Section', 'petstore' ),
	    //'description' => __( 'Description of what this panel does.', 'textdomain' ),
	));
	$wp_customize->add_section('footer_page_section',array(
			'title' => __('Page Based Footer','petstore'),
			'priority' => '1',
			'panel' => 'footer_section'
		));
	$wp_customize->add_setting( 'page_based_footer', array(
      'sanitize_callback' => 'text_filed_sanitize',
    ));
    $wp_customize->add_control(
    new Kaya_Customize_Description_Control( 
      $wp_customize, 'page_based_footer', array(
      	'html_tags' => true,
      'label'    => __( 'To know how to add page based footer Please ','petstore') . '<a target="_blank" href="https://www.youtube.com/watch?v=Yb910SrfuZU&feature=youtu.be">Watch this Video</a>',
      'section'  => 'footer_page_section',
      'settings' => 'page_based_footer',
      'priority' => 0
    )));
	$wp_customize->add_setting( 'footer_page_id', array(
    	'sanitize_callback' => 'text_filed_sanitize',
    	'default' => '',
    	) );
    $wp_customize->add_control(  new Kaya_Customize_Page_Control( 
      $wp_customize, 'footer_page_id', array(
      'label'    => __( 'Select Page Footer', 'petstore' ),
      'section'  => 'footer_page_section',
      'settings' => 'footer_page_id',
      'priority' => 1,
    )));
}

add_action('customize_register','page_content_footer');

function footer_section( $wp_customize ) {
	$wp_customize->add_panel( 'footer_section', array(
	    'priority' => 130,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Footer Section', 'petstore' ),
	    //'description' => __( 'Description of what this panel does.', 'textdomain' ),
	));
	$wp_customize->add_section(
	// ID
	'footer-section',
	// Arguments array
	array(
		'title' => __( 'Widget Based Footer', 'petstore' ),
		'priority'       => 130,
		'capability' => 'edit_theme_options',
		'panel' => 'footer_section'
		//'description' => __( '', 'petstore' )
	));	
$wp_customize->add_setting( 'main_footer_disable', array(
	'default' => '',
	'sanitize_callback' => 'checkbox_field_sanitize',

  	) );
	$wp_customize->add_control( 'main_footer_disable', array(
	      'label'    => __( 'Main Footer Settings', 'petstore' ),
	      'section'  => 'footer-section',
	      'settings' => 'main_footer_disable',
	      'type' => 'checkbox',
	      'priority' => 10
    ));

  	$wp_customize->add_setting( 'main_footer_disable', array(
   		'transport' => 'postMessage',
   		'sanitize_callback' => 'checkbox_field_sanitize',
   	));
	$wp_customize->add_control( 'main_footer_disable', array(
	      'label'    => __( 'Disable Main Footer', 'petstore' ),
	      'section'  => 'footer-section',
	      'settings' => 'main_footer_disable',
	      'type' => 'checkbox',
	      'priority' => 20
    ));

     $wp_customize->add_setting('main_footer_columns',
	array(
		'deafult' => '3',
		'sanitize_callback' => 'radio_buttons_sanitize',
		));
     $src = get_template_directory_uri() . '/images/footer_columns/';
$wp_customize->add_control(
new Kaya_Customize_Images_Radio_Control(
$wp_customize,'main_footer_columns',
	array(
		'label' => 'Display Columns',
		'section' => 'footer-section',
		'priority' => 30,
			'type' => 'img_radio', // Image radio replacement
			'choices' => array(
				'1' => array( 'label' => __( 'Col-1', 'petstore' ),'img_src' => $src . 'fc1.png' ),
				'2' => array( 'label' => __( 'Col-2', 'petstore' ),'img_src' => $src . 'fc2.png' ),
				'3' => array( 'label' => __( 'Col-1', 'petstore' ),'img_src' => $src . 'fc3.png' ),
				'4' => array( 'label' => __( 'Col-2', 'petstore' ),'img_src' => $src . 'fc4.png' ),
				'5' => array( 'label' => __( 'Col-1', 'petstore' ),'img_src' => $src . 'fc5.png' ),
				'twothird' => array( 'label' => __( 'Col-2', 'petstore' ),'img_src' => $src . 'two_third_one_third.png' ),
				'onethird' => array( 'label' => __( 'Col-1', 'petstore' ),'img_src' => $src . 'one_third_two_third.png' ),
				'threefourth' => array( 'label' => __( 'Col-2', 'petstore' ),'img_src' => $src . 'three_fourth_one_fourth.png' ),
				'onefourth' => array( 'label' => __( 'Col-1', 'petstore' ),'img_src' => $src . 'one_fourth_three_fourth.png' ),
				'halffourth' => array( 'label' => __( 'Col-2', 'petstore' ),'img_src' => $src . 'two_fourth_fourth_fourth.png' ),
				'twofourth' => array( 'label' => __( 'Col-1', 'petstore' ),'img_src' => $src . 'fourth_fourth_two_fourth.png' ),
				'fifth_fifth' => array( 'label' => __( 'Col-2', 'petstore' ),'img_src' => $src . 'fifth_fifth_three_fifth.png' ),
				'three_fifth' => array( 'label' => __( 'Col-1', 'petstore' ),'img_src' => $src . 'three_fifth_fifth_fifth.png' ),
				'fifth_fifth_fifth' => array( 'label' => __( 'Col-2', 'petstore' ),'img_src' => $src . 'fifth_fifth_fifth_two_fifth.png' ),
				'two_fifth' => array( 'label' => __( 'Col-1', 'petstore' ),'img_src' => $src . 'two_fifth_fifth_fifth_fifth.png' ),
			),	
		)));
	$wp_customize->add_setting( 'select_footer_background_type',  array(
        'default' => 'bg_type_color',
        'transport' => '',
        'sanitize_callback' => 'radio_buttons_sanitize'
    ));
    $wp_customize->add_control('select_footer_background_type', array(
        'type' => 'select',
        'label' => __('Select Background Type','petstore'),
        'section' => 'footer-section',
        'choices' => array(
        	 'bg_type_color' => __('Background Color','petstore'),
        	 'bg_type_image' => __('Background Image','petstore'),
        	),
		'priority' => 40,
    ));
    $wp_customize->add_setting('footerbg[footer]',array(
    	'default' => '',
    	'capability' => 'edit_theme_options',
    	'sanitize_callback' => 'upload_sanitize_id',
    	'transport' => 'postMessage',
    	//'type' => 'option'
    	));
    $wp_customize->add_control(
    	new Kaya_Customize_Imageupload_Control($wp_customize,'footer',array(
    		'label' =>  __('Upload Footer Background Image','petstore'),
    		'section' => 'footer-section',
    		'settings' => 'footerbg[footer]',
    		'priority' => 50 
    	 	)));
    $wp_customize->add_setting('footerbg_repeat',
	array(
		'deafult' => 'no-repeat',
		'transport' => 'postMessage',
		'sanitize_callback' => 'radio_buttons_sanitize',
		));
	$wp_customize->add_control('footerbg_repeat',
	array(
		'label' => __('Background Repeat','petstore'),
		'capability' => 'edit_theme_options', 
		'section' => 'footer-section',
		'priority' => 60,
		'type' => 'radio',
		'choices' => array(
			'no-repeat' => 'No Repeat',
			'repeat' => 'Repeat',
			'cover' => 'Cover'
			)
		));
   // Footer BG Color
/*  $colors[] = array(
	'slug'=>'footer_bg_color',
	'default' => '',
	'label' => __('Footer Background Color', 'petstore'),
	'priority' => 70
	); */

    $wp_customize->add_setting( 'footer_bg_color',array( 
			'default' => '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'color_filed_sanitize',
		));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_bg_color',
		array(			
			'label' => __('Footer Background Color', 'petstore'),
			'section' => 'footer-section',
			'priority' => 70,
			'type' => 'color',
		)));


    $colors[] = array(
	'slug'=>'footer_title_color',
	'default' => '#ffffff',
	'label' => __('Titles Color', 'petstore'),
	'priority' => 80
);
    $colors[] = array(
	'slug'=>'footer_text_color',
	'default' => '#787878',
	'label' => __('Content Color', 'petstore'),
	'priority' => 90
);
    $colors[] = array(
	'slug'=>'footer_link_color',
	'default' => '#F85204',
	'label' => __('Hyper Link Color', 'petstore'),
	'priority' => 100
);
    $colors[] = array(
	'slug'=>'footer_link_hover_color',
	'default' => '#FFACAF',
	'label' => __('Hyper Link Hover Color', 'petstore'),
	'priority' => 110
);
     $wp_customize->add_setting( 'sticky_footer_enable', array(
     		'default' => '',
     		'sanitize_callback' => 'checkbox_field_sanitize',
     	));
	$wp_customize->add_control( 'sticky_footer_enable', array(
	      'label'    => __( 'Enable Sticky Footer', 'petstore' ),
	      'section'  => 'footer-section',
	      'settings' => 'sticky_footer_enable',
	      'type' => 'checkbox',
	      'priority' => 111
    ));
     foreach( $colors as $color ) {
	// SETTINGS
	$wp_customize->add_setting(
		$color['slug'], array(
			'default' => $color['default'],
			//'type' => 'option',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'color_filed_sanitize',
		)
	);
	// CONTROLS
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$color['slug'],
			array('label' => $color['label'],
			'section' => 'footer-section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])

		)
	);
}


}
//add_action( 'customize_register', 'footer_section' );
// Most Footer

function most_footer_section( $wp_customize ) {
		$wp_customize->add_section(
	// ID
	'most-footer-section',
	// Arguments array
	array(
		'title' => __( 'Most Footer Bottom Section', 'petstore' ),
		'priority'       => 140,
		'capability' => 'edit_theme_options',
		'panel' => 'footer_section',

		//'description' => __( '', 'petstore' )
	));

   $wp_customize->add_setting( 'most_footer_disable', array(
   		'transport' => '',
   		'sanitize_callback' => 'checkbox_field_sanitize',
   	));
	$wp_customize->add_control( 'most_footer_disable', array(
	      'label'    => __( 'Disable Most Footer Bottom', 'petstore' ),
	      'section'  => 'most-footer-section',
	      'settings' => 'most_footer_disable',
	      'type' => 'checkbox',
	      'priority' => 10
    ));

  $wp_customize->add_setting( 'most_footer_left_section', array(
  		'deafult' => '',
  		'transport' => 'postMessage',
  		'sanitize_callback' => 'text_filed_sanitize',
  	));
  $wp_customize->add_control(
    new Kaya_Customize_Textarea_Control( $wp_customize, 'most_footer_left_section', array(
      'label'    => __( 'Left Section', 'petstore' ),
      'section'  => 'most-footer-section',
      'settings' => 'most_footer_left_section',
      'priority' => 20,
      'type' => 'text-area',
      ))  );
    $wp_customize->add_setting( 'most_footer_right_section', array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'text_filed_sanitize',
    ));
  $wp_customize->add_control(
    new Kaya_Customize_Textarea_Control( $wp_customize, 'most_footer_right_section', array(
      'label'    => __( 'Right Section', 'petstore' ),
      'section'  => 'most-footer-section',
      'settings' => 'most_footer_right_section',
      'priority' => 30,
      'type' => 'text-area',
      ))  );
    $wp_customize->add_setting( 'select_most_footer_background_type',  array(
        'default' => 'bg_type_color',
        'transport' => '',
        'sanitize_callback' => 'radio_buttons_sanitize'
    ));
    $wp_customize->add_control('select_most_footer_background_type', array(
        'type' => 'select',
        'label' => __('Select Background Type','petstore'),
        'section' => 'most-footer-section',
        'choices' => array(
        	 'bg_type_color' => __('Background Color','petstore'),
        	 'bg_type_image' => __('Background Image','petstore'),
        	),
		'priority' => 40,
    ));
    $wp_customize->add_setting('mostfooterbg[mostfooter]',array(
    	'default' => '',
    	'capability' => 'edit_theme_options',
    	'sanitize_callback' => 'upload_sanitize_id',
    	'transport' => 'postMessage',  
    	//'type' => 'option'
    	));
    $wp_customize->add_control(
    	new Kaya_Customize_Imageupload_Control($wp_customize,'mostfooter',array(
    		'label' =>  __('Upload Most Footer Background Image','petstore'),
    		'section' => 'most-footer-section',
    		'settings' => 'mostfooterbg[mostfooter]',
    		'priority' => 50 
    	 	)));
    $wp_customize->add_setting('most_footerbg_repeat',
	array(
		'deafult' => 'no-repeat',
		'transport' => 'postMessage',
		'sanitize_callback' => 'radio_buttons_sanitize',
		));
$wp_customize->add_control('most_footerbg_repeat',
	array(
		'label' => __('Background Repeat','petstore'),
		'capability' => 'edit_theme_options', 
		'section' => 'most-footer-section',
		'priority' => 60,
		'type' => 'radio',
		'choices' => array(
			'no-repeat' => 'No Repeat',
			'repeat' => 'Repeat',
			'cover' => 'Cover'
			)
		));
   // Footer BG Color
    $colors[] = array(
	'slug'=>'most_footer_bg_color',
	'default' => '',
	'label' => __('Footer Background Color', 'petstore'),
	'priority' => 70
	);
    $colors[] = array(
		'slug'=>'most_footer_text_color',
		'default' => '#787878',
		'label' => __('Content Color', 'petstore'),
		'priority' => 80
	);
    $colors[] = array(
		'slug'=>'most_footer_link_color',
		'default' => '#F85204',
		'label' => __('Hyper Link Color', 'petstore'),
		'priority' => 90
	);
    $colors[] = array(
		'slug'=>'most_footer_link_hover_color',
		'default' => '#FFACAF',
		'label' => __('Hyper Link Hover Color', 'petstore'),
		'priority' => 100
	);
    foreach( $colors as $color ) {
	// SETTINGS
	$wp_customize->add_setting(
		$color['slug'], array(
			'default' => $color['default'],
			//'type' => 'option',
			'transport' => 'postMessage',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'color_filed_sanitize',
		)
	);
	// CONTROLS
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$color['slug'],
			array('label' => $color['label'],
			'section' => 'most-footer-section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])

		)
	);
}
}
add_action( 'customize_register', 'most_footer_section' );

//end

// Typography
function typography( $wp_customize ){

	$wp_customize->add_panel( 'typography_panel_section', array(
	    'priority'       => 140,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '',
	  	'title' => __( 'Typography Section', 'petstore' ),
	) );

	$wp_customize->add_section(
	// ID
	'typography_section',
	// Arguments array
	array(
		'title' => __( 'Google Font Family', 'petstore' ),
		'priority'       => 140,
		'capability' => 'edit_theme_options',
		'panel' => 'typography_panel_section',
		'description' => __( 'Search Google Fonts', 'petstore' )."<a href='http://www.google.com/fonts' target='_blank' > here </a>"
	)
);	
$wp_customize->add_setting( 'google_body_font',
    array( 'default' => '2',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'text_filed_sanitize'
    ));
$wp_customize->add_control( new Kaya_Customize_google_fonts_Control( $wp_customize, 'google_body_font', array(
		'label'   => __('Select font for Body','petstore'),
		'section' => 'typography_section',
		'settings'    => 'google_body_font',
		'priority'    => 0,
	)));
 $wp_customize->add_setting( 'google_heading_font',
    array( 'default' => '2',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'text_filed_sanitize'
    ));
 $wp_customize->add_control( new Kaya_Customize_google_fonts_Control( $wp_customize, 'google_heading_font', array(
		 'label'   => __('Select font for Headings','petstore'),
		'section' => 'typography_section',
		'settings'    => 'google_heading_font',
		'priority'    =>1,
		)));

$wp_customize->add_setting( 'google_menu_font',
    array( 'default' => '2',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'text_filed_sanitize'
    ));
$wp_customize->add_control( new Kaya_Customize_google_fonts_Control( $wp_customize, 'google_menu_font', array(
		 'label'   => __('Select font for Top Menu','petstore'),
		'section' => 'typography_section',
		'settings'    => 'google_menu_font',
		'priority'    => 2,
))); 

}
add_action( 'customize_register', 'typography' );

// Body, Menu, Title Font Sizes
// Typography
function font_panel_section( $wp_customize ){

	$wp_customize->add_section(
	// ID
	'font-panel-section',
	// Arguments array
	array(
		'title' => __( 'Font Settings', 'petstore' ),
		'priority'       => 140,
		'capability' => 'edit_theme_options',
		'panel' => 'typography_panel_section'
	));	
$font_weight_names = array('normal' => 'Normal', 'bold' => 'Bold', 'lighter' => 'Lighter');	
// Body Font Size
$wp_customize->add_setting('body_font_size',
    array( 'default' => '15',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'check_number'
    ));

 $wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'body_font_size', array(
		 'label'   => __('Body Font Size','petstore'),
		'section' => 'font-panel-section',
		'settings'    => 'body_font_size',
		'priority'    => 3,
		'choices'  => array(
			'min'  => 10,
			'max'  => 30,
			'step' => 1
		),
		)));
 $wp_customize->add_setting('body_line_height',
    array( 'default' => '30',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'check_number'
    ));

 $wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'body_line_height', array(
		 'label'   => __('Body Line Height','petstore'),
		'section' => 'font-panel-section',
		'settings'    => 'body_line_height',
		'priority'    => 4,
		'choices'  => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1
		),
		)));
$wp_customize->add_setting('body_font_letter_space',
    array( 'default' => '0',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'check_number'
    ));
 $wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'body_font_letter_space', array(
		 'label'   => __('Body Font Letter Spacing','petstore'),
		'section' => 'font-panel-section',
		'settings'    => 'body_font_letter_space',
		'priority'    => 5,
		'choices'  => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		),
		)));
 $wp_customize->add_setting( 'body_font_weight_bold', array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'radio_buttons_sanitize'

    ));
    $wp_customize->add_control('body_font_weight_bold', array(
        'type' => 'select',
        'label' => __('Select Body Font Weight','petstore'),
        'section' => 'font-panel-section',
        'choices' => $font_weight_names,
		'priority' => 9,
    ));	
// Menu Font Size
 $wp_customize->add_setting( 'menu_font_title', array(
    	'sanitize_callback' => 'text_filed_sanitize',
    	) );
    $wp_customize->add_control(
     new Kaya_Customize_Subtitle_control( $wp_customize, 'menu_font_title', array(
        'label'    => __( 'Menu Font Settings', 'petstore' ),
      'section' => 'font-panel-section',
      'settings' => 'menu_font_title',
      'priority' =>10
    )));
$wp_customize->add_setting('menu_font_size',
    array( 'default' => '15',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'check_number'
    ));
 $wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'menu_font_size', array(
		 'label'   => __('Menu Font Size','petstore'),
		'section' => 'font-panel-section',
		'settings'    => 'menu_font_size',
		'priority'    => 11,
		'choices'  => array(
			'min'  => 10,
			'max'  => 30,
			'step' => 1
		),
		)));
 $wp_customize->add_setting('menu_font_letter_space',
    array( 'default' => '0',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'check_number'
    ));
 $wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'menu_font_letter_space', array(
		 'label'   => __('Menu Font Letter Spacing','petstore'),
		'section' => 'font-panel-section',
		'settings'    => 'menu_font_letter_space',
		'priority'    => 20,
		'choices'  => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		),
		)));
$wp_customize->add_setting( 'menu_font_weight', array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'radio_buttons_sanitize'
    ));
    $wp_customize->add_control('menu_font_weight', array(
        'type' => 'select',
        'label' => __('Select Menu Font Weight','petstore'),
        'section' => 'font-panel-section',
        'choices' => $font_weight_names,
		'priority' => 21,
    ));
    $wp_customize->add_setting( 'main_menu_uppercase', array(
		'default'        => 0,
		//'type'           => 'option',
		'transport' => 'postMessage',
		'sanitize_callback' => 'checkbox_field_sanitize',
		'capability'     => 'edit_theme_options' )
	);
	$wp_customize->add_control('main_menu_uppercase', array(
		'label'    => __( 'Enable Uppercase Letters ','petstore' ),
		'section'  => 'font-panel-section',
		'type'     => 'checkbox',
		'priority' => 22
	));
// Menu Font Size
$wp_customize->add_setting( 'child_menu_subtitle', array(
    	'sanitize_callback' => 'text_filed_sanitize',
    	) );
    $wp_customize->add_control(
     new Kaya_Customize_Subtitle_control( $wp_customize, 'child_menu_subtitle', array(
      'label'    => __( 'Child Menu Font Settings', 'petstore' ),
      'section' => 'font-panel-section',
      'settings' => 'child_menu_subtitle',
      'priority' => 23
    )));
$wp_customize->add_setting('child_menu_font_size',
    array( 'default' => '13',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'check_number'
    ));
 $wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'child_menu_font_size', array(
		 'label'   => __('Child Menu Font Size','petstore'),
		'section' => 'font-panel-section',
		'settings'    => 'child_menu_font_size',
		'priority'    => 30,
		'choices'  => array(
			'min'  => 10,
			'max'  => 30,
			'step' => 1
		),
		)));
  $wp_customize->add_setting('child_menu_font_letter_space',
    array( 'default' => '0',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'check_number'
    ));
 $wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'child_menu_font_letter_space', array(
		 'label'   => __('Child Menu Font Letter Spacing','petstore'),
		'section' => 'font-panel-section',
		'settings'    => 'child_menu_font_letter_space',
		'priority'    => 40,
		'choices'  => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		),
		)));
 $wp_customize->add_setting( 'child_menu_font_weight', array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'radio_buttons_sanitize'
    ));
    $wp_customize->add_control('child_menu_font_weight', array(
        'type' => 'select',
        'label' => __('Select Child Menu Font Weight','petstore'),
        'section' => 'font-panel-section',
        'choices' => $font_weight_names,
		'priority' => 41,
    ));
    $wp_customize->add_setting( 'child_menu_uppercase', array(
		'default'        => 0,
		//'type'           => 'option',
		'transport' => 'postMessage',
		'sanitize_callback' => 'checkbox_field_sanitize',
		'capability'     => 'edit_theme_options' )
	);
	$wp_customize->add_control('child_menu_uppercase', array(
		'label'    => __( 'Enable Uppercase Letters ','petstore' ),
		'section'  => 'font-panel-section',
		'type'     => 'checkbox',
		'priority' => 42
	) );
// Title Font Sizes
 $wp_customize->add_setting( 'h1_titles_font_title', array(
    	'sanitize_callback' => 'text_filed_sanitize',
    	) );
    $wp_customize->add_control(
     new Kaya_Customize_Subtitle_control( $wp_customize, 'h1_titles_font_title', array(
        'label'    => __( 'H1 Font Settings', 'petstore' ),
      'section' => 'font-panel-section',
      'settings' => 'h1_titles_font_title',
      'priority' => 50
    )));
// H1
$wp_customize->add_setting('h1_title_fontsize',
    array( 'default' => '30',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'check_number'
    ));
 $wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'h1_title_fontsize', array(
		 'label'   => __('Font size for heading - H1','petstore'),
		'section' => 'font-panel-section',
		'settings'    => 'h1_title_fontsize',
		'priority'    => 60,
		'choices'  => array(
			'min'  => 10,
			'max'  => 80,
			'step' => 1
		),
		)));
  $wp_customize->add_setting('h1_line_height',
    array( 'default' => '42',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'check_number'
    ));

 $wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'h1_line_height', array(
		 'label'   => __('Line Height for heading - H1','petstore'),
		'section' => 'font-panel-section',
		'settings'    => 'h1_line_height',
		'priority'    => 65,
		'choices'  => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1
		),
		)));
  $wp_customize->add_setting('h1_font_letter_space',
    array( 'default' => '0',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'check_number'
    ));
 $wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'h1_font_letter_space', array(
		 'label'   => __('Font Letter Spacing - H1','petstore'),
		'section' => 'font-panel-section',
		'settings'    => 'h1_font_letter_space',
		'priority'    => 70,
		'choices'  => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		),
		)));
	$wp_customize->add_setting( 'h1_font_weight_bold', array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'radio_buttons_sanitize'

    ));
    $wp_customize->add_control('h1_font_weight_bold', array(
        'type' => 'select',
        'label' => __('Select Font Weight - H1','petstore'),
        'section' => 'font-panel-section',
        'choices' => $font_weight_names,
		'priority' => 71,
    ));
   $wp_customize->add_setting( 'h2_titles_font_title', array(
    	'sanitize_callback' => 'text_filed_sanitize',
    	) );
    $wp_customize->add_control(
     new Kaya_Customize_Subtitle_control( $wp_customize, 'h2_titles_font_title', array(
        'label'    => __( 'H2 Font Settings', 'petstore' ),
      'section' => 'font-panel-section',
      'settings' => 'h2_titles_font_title',
      'priority' => 72
    )));
// H2
$wp_customize->add_setting('h2_title_fontsize',
    array(
    	 'default' => '24',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'check_number'
    ));
 $wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'h2_title_fontsize', array(
		 'label'   => __('Font size for heading - H2','petstore'),
		'section' => 'font-panel-section',
		'settings'    => 'h2_title_fontsize',
		'priority'    => 80,
		'choices'  => array(
			'min'  => 10,
			'max'  => 80,
			'step' => 1
		),
		)));
  $wp_customize->add_setting('h2_line_height',
    array( 'default' => '38',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'check_number'
    ));

 $wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'h2_line_height', array(
		 'label'   => __('Line Height for heading - H2','petstore'),
		'section' => 'font-panel-section',
		'settings'    => 'h2_line_height',
		'priority'    => 85,
		'choices'  => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1
		),
		)));
  $wp_customize->add_setting('h2_font_letter_space',
    array( 'default' => '0',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'check_number'
    ));
 $wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'h2_font_letter_space', array(
		 'label'   => __('Font Letter Spacing - H2','petstore'),
		'section' => 'font-panel-section',
		'settings'    => 'h2_font_letter_space',
		'priority'    => 90,
		'choices'  => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		),
		)));
	$wp_customize->add_setting( 'h2_font_weight_bold', array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'radio_buttons_sanitize'

    ));
    $wp_customize->add_control('h2_font_weight_bold', array(
        'type' => 'select',
        'label' => __('Select Font Weight - H2','petstore'),
        'section' => 'font-panel-section',
        'choices' => $font_weight_names,
		'priority' => 91,
    ));
     $wp_customize->add_setting( 'h3_titles_font_title', array(
    	'sanitize_callback' => 'text_filed_sanitize',
    	) );
    $wp_customize->add_control(
     new Kaya_Customize_Subtitle_control( $wp_customize, 'h3_titles_font_title', array(
      'label'    => __( 'H3 Font Settings', 'petstore' ),
      'section' => 'font-panel-section',
      'settings' => 'h3_titles_font_title',
      'priority' => 92
    )));
// H3
$wp_customize->add_setting('h3_title_fontsize',
    array( 'default' => '20',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'check_number',
    ));
 $wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'h3_title_fontsize', array(
		 'label'   => __('Font size for heading - H3','petstore'),
		'section' => 'font-panel-section',
		'settings'    => 'h3_title_fontsize',
		'priority'    => 93,
		'choices'  => array(
			'min'  => 10,
			'max'  => 80,
			'step' => 1
		),
		)));
   $wp_customize->add_setting('h3_line_height',
    array( 'default' => '27',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'check_number'
    ));

 $wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'h3_line_height', array(
		 'label'   => __('Line Height for heading - H3','petstore'),
		'section' => 'font-panel-section',
		'settings'    => 'h3_line_height',
		'priority'    => 94,
		'choices'  => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1
		),
		)));
  $wp_customize->add_setting('h3_font_letter_space',
    array( 'default' => '0',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'check_number'
    ));
 $wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'h3_font_letter_space', array(
		 'label'   => __('Font Letter Spacing - H3','petstore'),
		'section' => 'font-panel-section',
		'settings'    => 'h3_font_letter_space',
		'priority'    => 110,
		'choices'  => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		),
		)));  
$wp_customize->add_setting( 'h3_font_weight_bold', array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'radio_buttons_sanitize'

    ));
    $wp_customize->add_control('h3_font_weight_bold', array(
        'type' => 'select',
        'label' => __('Select Font Weight - H3','petstore'),
        'section' => 'font-panel-section',
        'choices' => $font_weight_names,
		'priority' => 111,
    ));
// H4
    $wp_customize->add_setting( 'h4_titles_font_title', array(
    	'sanitize_callback' => 'text_filed_sanitize',
    	) );
    $wp_customize->add_control(
     new Kaya_Customize_Subtitle_control( $wp_customize, 'h4_titles_font_title', array(
      'label'    => __( 'H4 Font Settings', 'petstore' ),
      'section' => 'font-panel-section',
      'settings' => 'h4_titles_font_title',
      'priority' => 112
    )));
$wp_customize->add_setting( 'h4_title_fontsize',
    array( 'default' => '18',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'check_number'
    ));
 $wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'h4_title_fontsize', array(
		 'label'   => __('Font size for heading - H4','petstore'),
		'section' => 'font-panel-section',
		'settings'    => 'h4_title_fontsize',
		'priority'    => 120,
		'choices'  => array(
			'min'  => 10,
			'max'  => 80,
			'step' => 1
		),
		)));
 $wp_customize->add_setting('h4_line_height',
    array( 'default' => '25',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'check_number'
    ));

 $wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'h4_line_height', array(
		 'label'   => __('Line Height for heading - H4','petstore'),
		'section' => 'font-panel-section',
		'settings'    => 'h4_line_height',
		'priority'    => 125,
		'choices'  => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1
		),
		)));
  $wp_customize->add_setting('h4_font_letter_space',
    array( 'default' => '0',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'check_number'
    ));
 $wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'h4_font_letter_space', array(
		 'label'   => __('Font Letter Spacing - H4','petstore'),
		'section' => 'font-panel-section',
		'settings'    => 'h4_font_letter_space',
		'priority'    => 130,
		'choices'  => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		),
		))); 
	$wp_customize->add_setting( 'h4_font_weight_bold', array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'radio_buttons_sanitize'

    ));
    $wp_customize->add_control('h4_font_weight_bold', array(
        'type' => 'select',
        'label' => __('Select Font Weight - H4','petstore'),
        'section' => 'font-panel-section',
        'choices' => $font_weight_names,
		'priority' => 131,
    ));
     $wp_customize->add_setting( 'h5_titles_font_title', array(
    	'sanitize_callback' => 'text_filed_sanitize',
    	) );
    $wp_customize->add_control(
     new Kaya_Customize_Subtitle_control( $wp_customize, 'h5_titles_font_title', array(
      'label'    => __( 'H5 Font Settings', 'petstore' ),
      'section' => 'font-panel-section',
      'settings' => 'h5_titles_font_title',
      'priority' => 132
    )));
// H5
$wp_customize->add_setting('h5_title_fontsize',
    array( 'default' => '16',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'check_number'
    ));
 $wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'h5_title_fontsize', array(
		 'label'   => __('Font size for heading - H5','petstore'),
		'section' => 'font-panel-section',
		'settings'    => 'h5_title_fontsize',
		'priority'    => 140,
		'choices'  => array(
			'min'  => 10,
			'max'  => 80,
			'step' => 1
		),
	)));
 $wp_customize->add_setting('h5_line_height',
    array( 'default' => '25',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'check_number'
    ));

 $wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'h5_line_height', array(
		 'label'   => __('Line Height for heading - H5','petstore'),
		'section' => 'font-panel-section',
		'settings'    => 'h5_line_height',
		'priority'    => 145,
		'choices'  => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1
		),
		)));
   $wp_customize->add_setting('h5_font_letter_space',
    array( 'default' => '0',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'check_number'
    ));
 $wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'h5_font_letter_space', array(
		 'label'   => __('Font Letter Spacing - H5','petstore'),
		'section' => 'font-panel-section',
		'settings'    => 'h5_font_letter_space',
		'priority'    => 150,
		'choices'  => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		),
		)));
	$wp_customize->add_setting( 'h5_font_weight_bold', array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'radio_buttons_sanitize'

    ));
    $wp_customize->add_control('h5_font_weight_bold', array(
        'type' => 'select',
        'label' => __('Select Font Weight - H5','petstore'),
        'section' => 'font-panel-section',
        'choices' => $font_weight_names,
		'priority' => 151
    ));	 
     $wp_customize->add_setting( 'h6_titles_font_title', array(
    	'sanitize_callback' => 'text_filed_sanitize',
    	) );
    $wp_customize->add_control(
     new Kaya_Customize_Subtitle_control( $wp_customize, 'h6_titles_font_title', array(
      'label'    => __( 'H6 Font Settings', 'petstore' ),
      'section' => 'font-panel-section',
      'settings' => 'h6_titles_font_title',
      'priority' => 152
    )));
// H6
$wp_customize->add_setting('h6_title_fontsize',
    array( 'default' => '14',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'check_number'
    ));
 $wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'h6_title_fontsize', array(
		 'label'   => __('Font size for heading - H6','petstore'),
		'section' => 'font-panel-section',
		'settings'    => 'h6_title_fontsize',
		'priority'    => 160,
		'choices'  => array(
			'min'  => 10,
			'max'  => 80,
			'step' => 1
		),
	)));
 $wp_customize->add_setting('h6_line_height',
    array( 'default' => '17',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'check_number'
    ));

 $wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'h6_line_height', array(
		 'label'   => __('Line Height for Heading - H6','petstore'),
		'section' => 'font-panel-section',
		'settings'    => 'h6_line_height',
		'priority'    => 170,
		'choices'  => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1
		),
		)));
    $wp_customize->add_setting('h6_font_letter_space',
    array( 'default' => '0',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'check_number'
    ));
 	$wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'h6_font_letter_space', array(
		 'label'   => __('Font Letter Spacing - H6','petstore'),
		'section' => 'font-panel-section',
		'settings'    => 'h6_font_letter_space',
		'priority'    => 170,
		'choices'  => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		),
		)));
	$wp_customize->add_setting( 'h6_font_weight_bold', array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'radio_buttons_sanitize'

    ));
    $wp_customize->add_control('h6_font_weight_bold', array(
        'type' => 'select',
        'label' => __('Select Font Weight - H6','petstore'),
        'section' => 'font-panel-section',
        'choices' => $font_weight_names,
		'priority' => 180,
    ));	 
}
add_action( 'customize_register', 'font_panel_section' );
// Global Section
function global_section( $wp_customize ) {
	$wp_customize->add_panel( 'general_section', array(
	    'priority' => 150,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Global Settings', 'petstore' ),
	    //'description' => __( 'Description of what this panel does.', 'textdomain' ),
	) );
	$wp_customize->add_section(
	// ID
	'global-section',
	// Arguments array
	array(
		'title' => __( 'General Settings', 'petstore' ),
		'priority'       => 10,
		'capability' => 'edit_theme_options',
		//'description' => __( '', 'petstore' )
		'panel'  => 'general_section',
	));
	$wp_customize->add_setting('favicon[favi_img]',array(
    	'default' => '',
    	 'capability'   => 'edit_theme_options',
    	 'sanitize_callback' => 'upload_sanitize_id',
        'type'       => 'option',
    	));
    $wp_customize->add_control(
    	new Kaya_Customize_Imageupload_Control($wp_customize,'favicon',array(
    		'label' => __('Upload Favicon Image','petstore'),
    		//'default' =>  
    		'section' => 'global-section',
    		'settings' => 'favicon[favi_img]',
    		'priority' => 10
    	 	)));		
  $wp_customize->add_setting( 'google_tracking_code', array(
  		'default' => '',
  		'sanitize_callback' => 'text_filed_sanitize',
  	));
  $wp_customize->add_control('google_tracking_code',array(
      'label'    => __( 'Google Analytics Tracking ID', 'petstore' ),
      'type' => 'text',
      'section'  => 'global-section',
      'settings' => 'google_tracking_code',
      'priority' => 20,
  ));
	$wp_customize->add_setting( 'google_tracking_code_link', array(
  		'sanitize_callback' => 'text_filed_sanitize',
  	));
    $wp_customize->add_control(
    new Kaya_Customize_Description_Control( 
      $wp_customize, 'google_tracking_code_link', array(
      'html_tags' => true,
    'label'    => __( 'Ex:<strong>UA-XXXXX-X</strong>,For more information ', 'petstore' ) . '<a target="_blank" href="http://kayapati.com/demos/petcare/wp-content/uploads/sites/71/2015/12/trackingcode.jpg">Click Here</a>',
      'section'  => 'global-section',
      'settings' => 'google_tracking_code_link',
      'priority' => 21
    )));
  $wp_customize->add_setting( 'kaya_custom_css', array(
  		'transport' => 'postMessage',
  		'sanitize_callback' => 'text_filed_sanitize',
  	));
  $wp_customize->add_control(
    new Kaya_Customize_Textarea_Control( $wp_customize, 'kaya_custom_css', array(
      'label'    => __( 'Custom CSS', 'petstore' ),
      'section'  => 'global-section',
      'settings' => 'kaya_custom_css',
      'priority' => 30,
      'type' => 'text-area',
      ))  );

  $wp_customize->add_setting( 'kaya_custom_jquery', array(
  		'default' => '',
  		'sanitize_callback' => 'text_filed_sanitize',
  	));
  $wp_customize->add_control(
    new Kaya_Customize_Textarea_Control( $wp_customize, 'kaya_custom_jquery', array(
      'label'    => __( 'Custom JQUERY', 'petstore' ),
      'section'  => 'global-section',
      'settings' => 'kaya_custom_jquery',
      'priority' => 39,
      'type' => 'text-area',
      ))  );
$wp_customize->add_setting( 'jquery_sample_info', array(
  	  	'sanitize_callback' => 'text_filed_sanitize',  	  	
  	  	) );
 	$wp_customize->add_control(
    new Kaya_Customize_Description_Control( $wp_customize, 'jquery_sample_info', array(
      'label'    => __( "Ex: alert('hai');", 'petstore' ),
      'section'  => 'global-section',
      'settings' => 'jquery_sample_info',
      'priority' => 40
    	))
 	 );
 	  	$wp_customize->add_setting( 'responsive_layout_mode',
		array( 'default' => 'on',
				'sanitize_callback' => 'radio_buttons_sanitize',
		 ));
	$wp_customize->add_control( 'responsive_layout_mode',
		array(
		'label' => 'Responsive Mode',
		'section' => 'global-section',
		'priority' => 41,
		'type' => 'radio',
		'choices' => array(
			'on' => 'On',
			'off' => 'Off'	
			)
		)
		);
 	  $wp_customize->add_setting( 'pretty_photo_settings', array(
    	'sanitize_callback' => 'text_filed_sanitize',
    	) );
    $wp_customize->add_control(
     new Kaya_Customize_Subtitle_control( $wp_customize, 'pretty_photo_settings', array(
      'label'    => __( 'Prettyphoto Lightbox Settings', 'petstore' ),
      'section'  => 'global-section',
      'settings' => 'pretty_photo_settings',
      'priority' => 42
    )));
 	 $wp_customize->add_setting('enable_prettyphoto_socialicons', array(
      'default' => '',
      
    ));
  $wp_customize->add_control('enable_prettyphoto_socialicons',array(
    'label' => __('Disable Pretty Photo Social Icons','petstore'),
    'type' => 'checkbox',
    'section' => 'global-section',
    'priority' => 43
  ));
      $wp_customize->add_setting('disable_prettyphoto_thumbnails', array(
      'default' => '',
      
    ));
  $wp_customize->add_control('disable_prettyphoto_thumbnails',array(
    'label' => __('Disable Pretty Photo Thumbnails','petstore'),
    'type' => 'checkbox',
    'section' => 'global-section',
    'priority' => 44
  ));
   $wp_customize->add_setting('disable_prettyphoto_post_title', array(
      'default' => '',
      
    ));
  $wp_customize->add_control('disable_prettyphoto_post_title',array(
    'label' => __('Disable Pretty Photo Title','petstore'),
    'type' => 'checkbox',
    'section' => 'global-section',
    'priority' => 45
  )); 
 }
add_action( 'customize_register', 'global_section' );
// Button Color Panel Section
function button_panel_section($wp_customize){
	$wp_customize->add_section('button-panel-section',
		array(
			'title' => __('Button Color Settings','petstore'),
			'priority' => 20,
			'capability' => 'edit_theme_options',
			'panel' => 'general_section'
		));
    $colors[] = array(
		'slug'=>'button_bg_color',
		'default' => '',
		'label' => __('Background Color', 'petstore'),
		'priority' => 60
	);
	$colors[] = array(
		'slug'=>'button_border_color',
		'default' => '#F85204',
		'label' => __('Border Color', 'petstore'),
		'priority' => 70
	);
    $colors[] = array(
		'slug'=>'button_bg_text_color',
		'default' => '#333333',
		'label' => __('Text Color', 'petstore'),
		'priority' => 80
	);
    $colors[] = array(
		'slug'=>'button_bg_hover_color',
		'default' => '',
		'label' => __('Hover Background Color', 'petstore'),
		'priority' => 90
	);
    $colors[] = array(
		'slug'=>'button_hover_text_color',
		'default' => '#F85204',
		'label' => __('Hover Text Color', 'petstore'),
		'priority' => 100
	);
	$colors[] = array(
		'slug'=>'button_hover_border_color',
		'default' => '',
		'label' => __('Hover Border Color', 'petstore'),
		'priority' => 110
	);
	$wp_customize->add_setting('button_font_size', array( 
		'default' => '14',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'check_number'
    ));
	$wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'button_font_size', array(
		 'label'   => __('Button Font Size','petstore'),
		'section' => 'button-panel-section',
		'settings'    => 'button_font_size',
		'priority'    => 111,
		'choices'  => array(
			'min'  => 10,
			'max'  => 150,
			'step' => 1
	),
	)));
	$wp_customize->add_setting('button_font_style', array( 
		'default' => 'normal',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'radio_buttons_sanitize'
    ));
	$wp_customize->add_control('button_font_style', array(
		 'label'   => __('Button Font Style','petstore'),
		'section' => 'button-panel-section',
		'settings'    => 'button_font_style',
		'type' => 'select',
		'priority'    => 112,
		'choices'  => array(
			'normal' => __('Normal','petstore'),
			'italic' => __('Italic','petstore'),
		),
	));
	$wp_customize->add_setting('button_font_weight', array( 
		'default' => 'normal',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'radio_buttons_sanitize'
    ));
	$wp_customize->add_control( 'button_font_weight', array(
		 'label'   => __('Button Font Weight','petstore'),
		'section' => 'button-panel-section',
		'settings'    => 'button_font_weight',
		'type' => 'select',
		'priority'    => 113,
		'choices'  => array(
			'normal' => __('Normal','petstore'),
			'bold' => __('Bold','petstore'),
		),
	));
	$wp_customize->add_setting('button_border_radius',
    array( 'default' => '2',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'check_number'
    ));
 	$wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'button_border_radius', array(
		 'label'   => __('Button Border Radius','petstore'),
		'section' => 'button-panel-section',
		'settings'    => 'button_border_radius',
		'priority'    => 120,
		'choices'  => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		),
		)));
	$wp_customize->add_setting( 'button_padding_top_bottom', array(
  		'default' => '10',
  		'transport' => 'postMessage',
  		'sanitize_callback' => 'check_number',
  	));
  	$wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'button_padding_top_bottom', array(
		 'label'   => __('Button Padding Top & Bottom','petstore'),
		'section' => 'button-panel-section',
		'settings'    => 'button_padding_top_bottom',
		'priority'    => 130,
		'choices'  => array(
			'min'  => 5,
			'max'  => 150,
			'step' => 1
		),
		)));
  	$wp_customize->add_setting( 'button_padding_left_right', array(
  		'default' => '15',
  		'transport' => 'postMessage',
  		'sanitize_callback' => 'check_number',
  	));
  	$wp_customize->add_control( new Kaya_Customize_Sliderui_Control( $wp_customize, 'button_padding_left_right', array(
		 'label'   => __('Button Padding Left Right','petstore'),
		'section' => 'button-panel-section',
		'settings'    => 'button_padding_left_right',
		'priority'    => 140,
		'choices'  => array(
			'min'  => 5,
			'max'  => 150,
			'step' => 1
		),
		)));
 foreach( $colors as $color ) {
	// SETTINGS
	$wp_customize->add_setting(
		$color['slug'], array(
			'default' => $color['default'],
			//'type' => 'option',
			'capability' => 'edit_theme_options',
			'transport' => 'postMessage',
			'sanitize_callback' => 'color_filed_sanitize',
		)
	);
	// CONTROLS
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$color['slug'],
			array('label' => $color['label'],
			'section' => 'button-panel-section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])
		));
}
}
add_action('customize_register','button_panel_section');
//input fields panel row styles

// Button Color Panel Section
function input_fields_panel_section($wp_customize){
	$wp_customize->add_section('input-fields-panel-section',
		array(
			'title' => __('Input Fields Color Settings','petstore'),
			'priority' => 20,
			'capability' => 'edit_theme_options',
			'panel' => 'general_section'
		));
   $colors[] = array(
		'slug'=>'input_background_color',
		'default' => '#ffffff',
		'label' => __('Background Color', 'petstore'),
		'priority' => 150
	);
    $colors[] = array(
		'slug'=>'input_text_color',
		'default' => '#333',
		'label' => __('Text Color', 'petstore'),
		'priority' => 160
	);
     $colors[] = array(
		'slug'=>'input_border_color',
		'default' => '#d8d8d8',
		'label' => __('Border Color', 'petstore'),
		'priority' => 170
	);
      $colors[] = array(
		'slug'=>'input_error_border_color',
		'default' => '#F85204',
		'label' => __('Error Field Border Color', 'petstore'),
		'priority' => 180
	);

	foreach( $colors as $color ) {
	// SETTINGS
	$wp_customize->add_setting(
		$color['slug'], array(
			'default' => $color['default'],
			//'type' => 'option',
			'capability' => 'edit_theme_options',
			'transport' => 'postMessage',
			'sanitize_callback' => 'color_filed_sanitize',
		)
	);
	// CONTROLS
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$color['slug'],
			array('label' => $color['label'],
			'section' => 'input-fields-panel-section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])

		)
	);
}
}
add_action('customize_register','input_fields_panel_section');
//Search Box
// Button Color Panel Section
function search_box_panel_section($wp_customize){
	$wp_customize->add_section('searchbox-fields-panel-section',
		array(
			'title' => __('Search Box Settings','petstore'),
			'priority' => 20,
			'capability' => 'edit_theme_options',
			'panel' => 'general_section'
		));
   $wp_customize->add_setting( 'disable_search_box', array(
		'default'        => 0,
		'transport' => '',
		'sanitize_callback' => 'checkbox_field_sanitize',
		'capability'     => 'edit_theme_options' )
	);

	$wp_customize->add_control('disable_search_box', array(
		'label'    => __( 'Disable Search Box','petstore' ),
		'section'  => 'searchbox-fields-panel-section',
		'type'     => 'checkbox',
		'priority' =>1
		
	) );
    $colors[] = array(
		'slug'=>'search_box_bg_color',
		'default' => '#151515',
		'label' => __('Background Color', 'petstore'),
		'priority' => 2
	);
        $colors[] = array(
		'slug'=>'Search_box_text_color',
		'default' => '#ffffff',
		'label' => __('Text Color', 'petstore'),
		'priority' => 3
	);

	foreach( $colors as $color ) {
	// SETTINGS
	$wp_customize->add_setting(
		$color['slug'], array(
			'default' => $color['default'],
			//'type' => 'option',
			'capability' => 'edit_theme_options',
			'transport' => '',
			'sanitize_callback' => 'color_filed_sanitize',
		)
	);
	// CONTROLS
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$color['slug'],
			array('label' => $color['label'],
			'section' => 'searchbox-fields-panel-section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])

		)
	);
}
}
add_action('customize_register','search_box_panel_section');
/*-----------------------------------------------------------------------------------*/
// Woo Commerce Page
/*-----------------------------------------------------------------------------------*/ 
function woocommerce_page_section( $wp_customize ){

	$wp_customize->add_panel( 'woo_panel_section', array(
	    'priority'       => 160,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '',
	  	'title' => __( 'Woocommerce Section', 'petstore' ),
	) );
	$wp_customize->add_section('woocommerce_page_section',array(
			'title' => 'Woocommerce General Section',
			'priority' => '150',
			'panel' => 'woo_panel_section'
		));
      $wp_customize->add_setting('menu_bar_cart_icon', array(
	  'default' => 'refresh',
	  'sanitize_callback' => 'opacity_number_validate',
  ));
  $wp_customize->add_control('menu_bar_cart_icon',array(
  'label' => __('Disable Menu Bar Cart Icon','petstore'),
  'type' => 'checkbox',
  'section' => 'woocommerce_page_section',
  'priority' => 0
  ));
  $wp_customize->add_setting('shop_page_columns', array(
			'default' => '4',
			'sanitize_callback' => 'radio_buttons_sanitize',
		));
	$wp_customize->add_control('shop_page_columns',array(
		'label' => __('Shop Page Columns','petstore'),
		'type' => 'radio',
		'section' => 'woocommerce_page_section',
		'choices' => array(
			'4' => __('4 Columns','petstore'),
			'3' => __('3 Columns','petstore'),
			'2' => __('2 Columns','petstore')
			),
		'priority' => 1
	));
	$wp_customize->add_setting( 'disable_shop_page_content', array(
		'default'        => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'checkbox_field_sanitize',
		'capability'     => 'edit_theme_options',
	));
	$wp_customize->add_control('disable_shop_page_content', array(
		'label'    => __( 'Disable Shop Page Content','petstore' ),
		'section'  => 'woocommerce_page_section',
		'type'     => 'checkbox',
		'priority' =>2
	) );
	$wp_customize->add_setting('shop_page_sidebar', array(
			'default' => 'fullwidth',
			'sanitize_callback' => 'radio_buttons_sanitize',
		));
	$wp_customize->add_control('shop_page_sidebar',array(
		'label' => __('Shop Page Sidebar','petstore'),
		'type' => 'radio',
		'section' => 'woocommerce_page_section',
		'choices' => array(
			'fullwidth' => __('No Sidebar','petstore'),
			'two_third' => __('Right','petstore'),
			'two_third_last' => __('Left','petstore')
			),
		'priority' =>3
	));
	$wp_customize->add_setting('product_tag_page_sidebar', array(
		'default' => 'fullwidth',
		'sanitize_callback' => 'radio_buttons_sanitize',
	));
	$wp_customize->add_control('product_tag_page_sidebar',array(
		'label' => __('Product Categories / Tags  Page Sidebar','petstore'),
		'type' => 'radio',
		'section' => 'woocommerce_page_section',
		'choices' => array(
			'fullwidth' => __('No Sidebar','petstore'),
			'two_third' => __('Right','petstore'),
			'two_third_last' => __('Left','petstore')
			),
		'priority' => 4
	));
	$wp_customize->add_setting( 'Woocommerce_custom_sidebar', 
		array('default' => __('Select Sidebar', 'petstore'),
    	'sanitize_callback' => 'text_filed_sanitize',
    	'default' => '',
    	) );
    $wp_customize->add_control(  new Kaya_Customize_Sidebar_Control( 
      $wp_customize, 'Woocommerce_custom_sidebar', array(
      'label'    => __( 'Select Sidebar', 'petstore' ),
      'section'  => 'woocommerce_page_section',
      'settings' => 'Woocommerce_custom_sidebar',
      'priority' => 5,
    )));
	$wp_customize->add_setting('shop_single_page_sidebar', array(
			'default' => 'two_third',
			'sanitize_callback' => 'radio_buttons_sanitize',
		));
	$wp_customize->add_control('shop_single_page_sidebar',array(
		'label' => __('Shop Single Page Sidebar','petstore'),
		'type' => 'radio',
		'section' => 'woocommerce_page_section',
		'choices' => array(
			'fullwidth' => __('No Sidebar','petstore'),
			'two_third' => __('Right','petstore'),
			'two_third_last' => __('Left','petstore')
			),
		'priority' => 6
	));
  $wp_customize->add_setting('related_product_columns', array(
			'default' => '4',
			'sanitize_callback' => 'radio_buttons_sanitize',
		));
	$wp_customize->add_control('related_product_columns',array(
		'label' => __('Related Products Columns','petstore'),
		'type' => 'radio',
		'section' => 'woocommerce_page_section',
		'choices' => array(
			'4' => __('4 Columns','petstore'),
			'3' => __('3 Columns','petstore'),
			'2' => __('2 Columns','petstore')
			),
		'priority' => 7
	));
// Price tag Hover Color 
  $wp_customize->add_setting( 'woo-elements-colors', array(
  		'sanitize_callback' => 'text_filed_sanitize',
  	) );
    $wp_customize->add_control(
     new Kaya_Customize_Subtitle_control( $wp_customize, 'woo-elements-colors', array(
        'label'    => __( 'Elements Color Section', 'petstore' ),
      'section'  => 'woocommerce_page_section',
      'settings' => 'woo-elements-colors',
      'priority' => 51
    )));
  $colors[] = array(
  'slug'=>'woo_elments_colors',
  'default' => '#F85204',
   'transport'   => '',
   'priority' => 52,
  'label' => __('Product Onsale tag  Bg color', 'petstore')
);
  $colors[] = array(
  'slug'=>'woo_elments_text_colors',
  'default' => '#F85204',
   'transport'   => '',
   'priority' => 52,
  'label' => __('Product Onsale tag Text color', 'petstore')
);
    $wp_customize->add_setting( 'Product_detail_colors', array(
  		'sanitize_callback' => 'text_filed_sanitize',
  	) );
    $wp_customize->add_control(
     new Kaya_Customize_Subtitle_control( $wp_customize, 'Product_detail_colors', array(
        'label'    => __( 'Product Details color Section', 'petstore' ),
      'section'  => 'woocommerce_page_section',
      'settings' => 'woo-elements-colors',
      'priority' => 55
    )));
   $colors[] = array(
  'slug'=>'woo_product_details_bg_color',
  'default' => '',
   'transport'   => '',
   'priority' => 60,
  'label' => __('Product details BG color', 'petstore')
);
   $colors[] = array(
  'slug'=>'woo_product_border_color',
  'default' => '',
   'transport'   => '',
   'priority' => 60,
  'label' => __('Product details Border color', 'petstore')
);
   $colors[] = array(
  'slug'=>'woo_product_title_color',
  'default' => '',
   'transport'   => '',
   'priority' => 60,
  'label' => __('Product Title color', 'petstore')
);
   $colors[] = array(
  'slug'=>'woo_product_title_hover_color',
  'default' => '',
   'transport'   => '',
   'priority' => 60,
  'label' => __('Product Title Hover color', 'petstore')
);
   $colors[] = array(
  'slug'=>'woo_product_description_color',
  'default' => '',
   'transport'   => '',
   'priority' => 60,
  'label' => __('Product Description color', 'petstore')
);
   $colors[] = array(
  'slug'=>'woo_product_rating_color',
  'default' => '',
   'transport'   => '',
   'priority' => 60,
  'label' => __('Product Rating color', 'petstore')
);
   $colors[] = array(
  'slug'=>'woo_product_price_color',
  'default' => '',
   'transport'   => '',
   'priority' => 60,
  'label' => __('Product Price color', 'petstore')
);
foreach( $colors as $color ) {
  // SETTINGS
  $wp_customize->add_setting(
    $color['slug'], array(
      'default' => $color['default'],
      //'type' => 'option', 
      'capability' =>  'edit_theme_options',
      'transport'   => '',
      'sanitize_callback' => 'color_filed_sanitize',
    )
  );
  // CONTROLS
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      $color['slug'], 
      array('label' => $color['label'], 
      'section' => 'woocommerce_page_section',
      'priority' => $color['priority'],
      'settings' => $color['slug'])
    )
  );
}
}
add_action('customize_register','woocommerce_page_section');
// Primary Buttons
function woo_primary_button_colors($wp_customize){
	$wp_customize->add_section('woo_button1_section',array(
				'title' => __('Primary Buttons Color Settings','petstore'),
				'priority' => '150',
				'panel' => 'woo_panel_section'
		));	
	$wp_customize->add_setting( 'woo-buttons-note', array(
		'sanitize_callback' => 'text_filed_sanitize',
		) );

	$wp_customize->add_setting( 'woo-buttons-note_description', array(
		'sanitize_callback' => 'text_filed_sanitize',
		) );
	$wp_customize->add_control(
	new Kaya_Customize_Description_Control( 
	  $wp_customize, 'woo-buttons-note_description', array(
	  'label'    => __( 'Note: Color applies for Add to cart, Update Cart , mini cart items and  Apply Coupon buttons', 'petstore' ),
	  'section'  => 'woo_button1_section',
	  'settings' => 'woo-buttons-note',
	  'priority' => 5
	)));
	 $color = array();   
	$colors[] = array(
	  'slug'=>'primary_buttons_bg_color',
	  'default' => '#434a54',
	   'transport'   => 'postMessage',
	   'priority' => 6,
	  'label' => __('Primary Buttons BG Color', 'petstore')
	);
	$colors[] = array(
	  'slug'=>'primary_buttons_text_color',
	  'default' => '#ffffff',
	   'transport'   => 'postMessage',
	  'label' => __('Primary  Buttons Text Color', 'petstore'),
	  'priority' => 7
	);
	$colors[] = array(
	  'slug'=>'primary_buttons_bg_hover_color',
	  'default' => '#F85204',
	   'transport'   => 'postMessage',
	   'priority' => 8,
	  'label' => __('Primary  Buttons BG Hover Color', 'petstore')
	);
	$colors[] = array(
	  'slug'=>'primary_buttons_text_hover_color',
	  'default' => '#ffffff',
	   'transport'   => 'postMessage',
	   'priority' => 9,
	  'label' => __('Primary  Buttons Text Hover Color', 'petstore')
	);
	foreach( $colors as $color ) {
	  // SETTINGS
	  $wp_customize->add_setting(
	    $color['slug'], array(
	      'default' => $color['default'],
	      //'type' => 'option', 
	      'capability' =>  'edit_theme_options',
	      'transport'   => 'postMessage',
	      'sanitize_callback' => 'color_filed_sanitize',
	    )
	  );
	  // CONTROLS
	  $wp_customize->add_control(
	    new WP_Customize_Color_Control(
	      $wp_customize,
	      $color['slug'], 
	      array('label' => $color['label'], 
	      'section' => 'woo_button1_section',
	      'priority' => $color['priority'],
	      'settings' => $color['slug'])
	    )
	  );
	}
}
add_action('customize_register','woo_primary_button_colors');
// Secondary Button
function woo_secondary_button_colors($wp_customize){
	$wp_customize->add_section('woo_button2_section',array(
				'title' => __('Secondary Buttons Color Settings','petstore'),
				'priority' => '150',
				'panel' => 'woo_panel_section'
		));	
	$wp_customize->add_setting( 'woo-secondary-buttons-note_description', array(
	'sanitize_callback' => 'text_filed_sanitize',
	));
	$wp_customize->add_control(
	new Kaya_Customize_Description_Control( 
	  $wp_customize, 'woo-secondary-buttons-note_description', array(
	  'label'    => __( 'Note: Color applies for Tabs active color, tab hover color, quantity(plus, minus), view Cart, proceed to checkout and place order buttons', 'petstore' ),
	  'section'  => 'woo_button2_section',
	  'settings' => 'woo-secondary-buttons-note_description',
	  'priority' => 11
	)));
	 $color = array();   
	$colors[] = array(
	  'slug'=>'secondary_buttons_bg_color',
	  'default' => '#F85204',
	   'transport'   => 'postMessage',
	   'priority' => 20,
	  'label' => __('Secondary Buttons BG Color', 'petstore')
	);
	$colors[] = array(
	  'slug'=>'secondary_buttons_text_color',
	  'default' => '#ffffff',
	   'transport'   => 'postMessage',
	  'label' => __('Secondary Buttons Text Color', 'petstore'),
	  'priority' => 30
	);
	$colors[] = array(
	  'slug'=>'secondary_buttons_bg_hover_color',
	  'default' => '#434a54',
	   'transport'   => 'postMessage',
	   'priority' => 40,
	  'label' => __('Secondary Buttons BG Hover Color', 'petstore')
	);
	$colors[] = array(
	  'slug'=>'secondary_buttons_text_hover_color',
	  'default' => '#ffffff',
	   'transport'   => 'postMessage',
	   'priority' => 50,
	  'label' => __('Secondary Buttons Text Hover Color', 'petstore')
	);
	foreach( $colors as $color ) {
	  // SETTINGS
	  $wp_customize->add_setting(
	    $color['slug'], array(
	      'default' => $color['default'],
	      //'type' => 'option', 
	      'capability' =>  'edit_theme_options',
	      'transport'   => 'postMessage',
	      'sanitize_callback' => 'color_filed_sanitize',
	    )
	  );
	  // CONTROLS
	  $wp_customize->add_control(
	    new WP_Customize_Color_Control(
	      $wp_customize,
	      $color['slug'], 
	      array('label' => $color['label'], 
	      'section' => 'woo_button2_section',
	      'priority' => $color['priority'],
	      'settings' => $color['slug'])
	    )
	  );
	}
}
add_action('customize_register','woo_secondary_button_colors');

// Alert Boxes
function woo_alert_button_colors($wp_customize){
	$wp_customize->add_section('woo_alertbox_section',array(
				'title' => __('Alert Boxes Color Settings','petstore'),
				'priority' => '150',
				'panel' => 'woo_panel_section'
		));	
	$colors[] = array(
	  'slug'=>'success_msg_bg_color',
	  'default' => '#dff0d8',
	   'transport'   => 'refresh',
	   'priority' => 90,
	  'label' => __('Success Alert Box BG Color', 'petstore')
	);
	$colors[] = array(
	  'slug'=>'success_msg_text_color',
	  'default' => '#468847',
	   'transport'   => 'refresh',
	   'priority' => 100,
	  'label' => __('Success Alert Box Text Color', 'petstore')
	);

	$colors[] = array(
	  'slug'=>'notification_msg_bg_color',
	  'default' => '#b8deff',
	   'transport'   => 'refresh',
	   'priority' => 110,
	  'label' => __('Notification Alert Box BG Color', 'petstore')
	);
	$colors[] = array(
	  'slug'=>'notification_msg_text_color',
	  'default' => '#333',
	   'transport'   => 'refresh',
	   'priority' => 120,
	  'label' => __('Notification Alert Box Text Color', 'petstore')
	);

	$colors[] = array(
	  'slug'=>'warning_msg_bg_color',
	  'default' => '#f2dede',
	   'transport'   => 'refresh',
	   'priority' => 130,
	  'label' => __('Warning Alert Box BG Color', 'petstore')
	); 
	$colors[] = array(
	  'slug'=>'warning_msg_text_color',
	  'default' => '#a94442',
	   'transport'   => 'refresh',
	   'priority' => 140,
	  'label' => __('Warning Alert Box Text Color', 'petstore')
	);  
	foreach( $colors as $color ) {
	  // SETTINGS
	  $wp_customize->add_setting(
	    $color['slug'], array(
	      'default' => $color['default'],
	      //'type' => 'option', 
	      'capability' =>  'edit_theme_options',
	      'transport'   => 'postMessage',
	      'sanitize_callback' => 'color_filed_sanitize',
	    )
	  );
	  // CONTROLS
	  $wp_customize->add_control(
	    new WP_Customize_Color_Control(
	      $wp_customize,
	      $color['slug'], 
	      array('label' => $color['label'], 
	      'section' => 'woo_alertbox_section',
	      'priority' => $color['priority'],
	      'settings' => $color['slug'])
	    )
	  );
	}
}
add_action('customize_register','woo_alert_button_colors');
?>