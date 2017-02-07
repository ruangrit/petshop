( function( $ ) {
//alert('load');
//body
wp.customize('body_background_color',function( value ){
	value.bind(function( to ){
		var body_background_color =  'body{background:'+to+'!important}';
		if( $(document).find('#body_background_color').length ){
			$(document).find('#body_background_color').remove();
		}
		$(document).find('head').append($('<style id="body_background_color">'+ body_background_color +'</style>'));
	}); 
});
wp.customize('body_margin_top',function( value ){
	value.bind(function( to ){
		var body_margin_top =  '#box_layout{margin-top:'+to+'px!important}';
		if( $(document).find('#body_margin_top').length ){
			$(document).find('#body_margin_top').remove();
		}
		$(document).find('head').append($('<style id="body_margin_top">'+ body_margin_top +'</style>'));
	}); 
});
wp.customize('body_margin_bottom',function( value ){
	value.bind(function( to ){
		var body_margin_bottom =  '#box_layout{margin-bottom:'+to+'px!important}';
		if( $(document).find('#body_margin_bottom').length ){
			$(document).find('#body_margin_bottom').remove();
		}
		$(document).find('head').append($('<style id="body_margin_bottom">'+ body_margin_bottom +'</style>'));
	}); 
});
wp.customize('boxed_layout_shadow',function( value ){
	value.bind(function( to ){
		var boxed_layout_shadow =  '#box_layout{box-shadow: 0 0 '+to+'px rgba(0, 0, 0, 0.5)!important}';
		if( $(document).find('#boxed_layout_shadow').length ){
			$(document).find('#boxed_layout_shadow').remove();
		}
		$(document).find('head').append($('<style id="boxed_layout_shadow">'+ boxed_layout_shadow +'</style>'));
	}); 
});

wp.customize('boxed_layout_position',function( value ){
	value.bind(function( to ){
		if( to == 'center' ){
			var boxed_layout = 'margin:0px auto;'
		}else if( to == 'left' ){
			var boxed_layout = 'float:left;';
		}else{
			var boxed_layout = 'float:right;';
		}
		var boxed_layout_position =  '#box_layout{'+boxed_layout+'}';
		if( $(document).find('#boxed_layout_position').length ){
			$(document).find('#boxed_layout_position').remove();
		}
		$(document).find('head').append($('<style id="boxed_layout_position">'+ boxed_layout_position +'</style>'));
	});
});
//end
	wp.customize( 'layout_panel_row_bottom', function( value ) {
	value.bind( function( to ) {
		var row_panel_margin_bottom = '.mid_container_wrapper_section #mid_container .no-panel-row-style, #mid_content_right_section .panel-row-style, #mid_content_left_section #mid_container .no-panel-row-style, .mid_container_wrapper_section .panel-row-style{ margin-bottom:'+ to +'px!important; }';
		if( $(document).find('#row_panel_margin_bottom').length ){
			$(document).find('#row_panel_margin_bottom').remove();
		}
		$(document).find('head').append($('<style id="row_panel_margin_bottom">'+ row_panel_margin_bottom +'</style>'));
	});
	});
	//top section
	wp.customize( 'search_box_bg_color', function( value ) {
		value.bind( function( to ) {
			$( '.search_box_wrapper, .search_box_wrapper .search_form input' ).css( {
					'background': to
				} );
		} );
	});
wp.customize('Search_box_text_color',function( value ){
	value.bind(function( to ){
		$('.search_box_wrapper, .search_box_wrapper .search_form input, .search_close_button').css('color',to);
	}); 
});
// Header Shadow
wp.customize('sidebar_text_link_color', function(value){
	value.bind(function( to ){
		var sidebar_text_link_color = '.sidebar_bottom_content a{ color:'+ to +' }';
		if( $(document).find('#sidebar_text_link_color').length ){
			$(document).find('#sidebar_text_link_color').remove();
		}
		$(document).find('head').append($('<style id=sidebar_text_link_color>' + sidebar_text_link_color + '</style>'));
	});
});
// Menu Colors
wp.customize('menu_background_color', function( value ){
	value.bind(function(to){
		$('.header_menu_section').css('background', to ? to : 'inherit');
	});
}); 
wp.customize('menu_links_border_left_color', function( value ){
	value.bind(function(to){
		var border_color_left = ( to == false ) ? '0' : '1';
		var menu_links_border_left_color = '.menu > ul > li > a{ border-right:'+border_color_left+'px solid '+ to +' }';
		if( $(document).find('#menu_links_border_left_color').length ){
			$(document).find('#menu_links_border_left_color').remove();
		}
		$(document).find('head').append($('<style id=menu_links_border_left_color>' + menu_links_border_left_color + '</style>'));
	});
});
wp.customize('menu_links_border_right_color', function( value ){
	value.bind(function(to){
		var border_color_right = ( to == false ) ? '0' : '1';
		var menu_links_border_right_color = '.menu > ul > li > a{ border-right:'+border_color_right+'px solid '+ to +' }';
		if( $(document).find('#menu_links_border_right_color').length ){
			$(document).find('#menu_links_border_right_color').remove();
		}
		$(document).find('head').append($('<style id=menu_links_border_right_color>' + menu_links_border_right_color + '</style>'));
	});
});

wp.customize('menu_bar_top_border_color', function( value ){
	value.bind(function(to){
		var border_color_top = ( to == false ) ? '0' : '1';
		var menu_bar_top_border_color = '.header_menu_section{ border-top:'+border_color_top+'px solid '+ to +' }';
		if( $(document).find('#menu_bar_top_border_color').length ){
			$(document).find('#menu_bar_top_border_color').remove();
		}
		$(document).find('head').append($('<style id=menu_bar_top_border_color>' + menu_bar_top_border_color + '</style>'));
	});
});
wp.customize('menu_link_color', function( value ){
	value.bind(function(to){
		$('.menu > ul > li > a, .shop_cart_icon a, .search_box_icon, #jqueryslidemenu i').css('color', to ? to : '');
	});
});
wp.customize('menu_bg_active_color', function( value ){
	value.bind( function( to ){
		$('.menu > li.current-menu-item > a, .menu > li.current_page_item > a').css('background', to ? to : '');
	});
});
wp.customize('menu_link_active_color', function( value ){
	value.bind( function( to ){
		$('.menu > li.current-menu-item > a, .menu > li.current_page_item > a').css('color', to ? to : '');
	});
});
wp.customize('menu_link_hover_bg_color', function(value){
	value.bind(function( to ){
		var menu_link_hover_bg_color = '.menu > ul > li > a:hover{ background-color:'+ ( to ? to : 'inherit') +'!important; }';
		if( $(document).find('#menu_link_hover_bg_color').length ){
			$(document).find('#menu_link_hover_bg_color').remove();
		}
		$(document).find('head').append($('<style id=menu_link_hover_bg_color>' + menu_link_hover_bg_color + '</style>'));
	});
});
wp.customize('menu_link_hover_text_color', function(value){
	value.bind(function( to ){
		var menu_link_hover_text_color = '.menu > ul > li > a:hover, .menu > ul > li > a:hover i{ color:'+ to +'!important; }';
		if( $(document).find('#menu_link_hover_text_color').length ){
			$(document).find('#menu_link_hover_text_color').remove();
		}
		$(document).find('head').append($('<style id=menu_link_hover_text_color>' + menu_link_hover_text_color + '</style>'));
	});
});
// Child Menu
wp.customize('sub_menu_bg_color', function( value ){
	value.bind( function( to ){
		$('.menu ul ul li a, .menu ul ul').css('background', to ? to : '');
	});
});
wp.customize('sub_menu_top_border_color', function( value ){
	value.bind( function( to ){
		var border_width = to ? '3' : '0';
		var border_color = ( to == false ) ? '#333' : to;
		var sub_menu_top_border_color = '.megamenu_wrapper.menu_content_wrapper > ul, .nav_wrap .wide_menu > .megamenu_wrapper > ul{ border-top:'+ border_width+'px solid '+ border_color +'; }';
		if( $(document).find('#sub_menu_top_border_color').length ){
			$(document).find('#sub_menu_top_border_color').remove();
		}
		$(document).find('head').append($('<style id=sub_menu_top_border_color>' + sub_menu_top_border_color + '</style>'));
	});
});
wp.customize('sub_menu_bottom_border_color', function( value ){
	value.bind( function(to){
		$('.menu ul ul li').css('border-bottom-color', to);
	});
});
wp.customize('sub_menu_link_color', function( value ){
	value.bind( function(to){
		$('.menu ul ul li a').css('color', to);
	});
});
wp.customize('sub_menu_link_hover_bg_color', function( value ){
	value.bind( function(to){
		$('.menu ul ul li a:hover').css('background', to);
	});
});

wp.customize('sub_menu_link_hover_color', function(value){
	value.bind(function( to ){
		var sub_menu_link_hover_color = '.menu ul ul li a:hover{ color:'+ to +'!important; }';
		if( $(document).find('#sub_menu_link_hover_color').length ){
			$(document).find('#sub_menu_link_hover_color').remove();
		}
		$(document).find('head').append($('<style id=sub_menu_link_hover_color>' + sub_menu_link_hover_color + '</style>'));
	});
});
wp.customize('sub_menu_active_bg_color', function( value ){
	value.bind( function(to){
		$('.menu .sub-menu .current-menu-item > a').css('background', to);
	});
});
wp.customize('sub_menu_link_active_color', function( value ){
	value.bind( function(to){
		$('.menu .sub-menu .current-menu-item > a').css('color', to);
	});
});
wp.customize('child_menu_uppercase', function( value ){
	value.bind( function(to){
		if( to == '1' ){
			$('.menu ul ul li a').css('text-transform', 'uppercase');
		}else{
			$('.menu ul ul li a').css('text-transform', 'inherit');
		}
	});
});
wp.customize('main_menu_uppercase', function( value ){
	value.bind( function(to){
		if( to == '1' ){
			$('.menu > ul > li > a').css('text-transform', 'uppercase');
		}else{
			$('.menu > ul > li > a').css('text-transform', 'inherit');
		}
	});
});

wp.customize('menu_margin_top', function(value){
	value.bind(function( to ){
		var menu_margin_top = '#header_wrapper .header_menu_section{ margin-top:'+ to +'px!important; }';
		if( $(document).find('#menu_margin_top').length ){
			$(document).find('#menu_margin_top').remove();
		}
		$(document).find('head').append($('<style id=menu_margin_top>' + menu_margin_top + '</style>'));
	});
});
wp.customize('menu_margin_bottom', function(value){
	value.bind(function( to ){
		var menu_margin_bottom = '#header_wrapper .header_menu_section{ margin-bottom:'+ to +'px!important; }';
		if( $(document).find('#menu_margin_bottom').length ){
			$(document).find('#menu_margin_bottom').remove();
		}
		$(document).find('head').append($('<style id="menu_margin_bottom">' + menu_margin_bottom + '</style>'));	
	});
});
//menu top
wp.customize('accent_bg_color', function( value ){
	value.bind( function( to ){
	var hover_val='.testimonial_wrapper strong span, .video_inner_text h2 span,.video_inner_text p span, .single_img_parallex_inner_text span, #entry-author-info h4 , .custom_title i, .widget_title i, .page_sidebar:before, .dropcap span, .custom_title span, .image-boxes span, #ei-slider h2 span, .post_description, #crumbs li:last-child, .meta-nav-prev, .meta-nav-next, .blog_single_img .isotope_gallery li, #main_slider .prevBtn, #main_slider .nextBtn, .widget_container .tagcloud a:hover , #sidebar .widget_calendar table caption, .cal-blog, .pagination span a.current, ul.page-numbers .current, .single_img .isotope_gallery li, a.social-icons:hover, .slides-pagination a.current,  .post_share, .portfolio_gallery li:hover, .owl_slider_img, .ei-slider-thumbs li, .ei-slider-thumbs li a:hover, .blog_post_icons > a, .blog_post_format_icon{ background:'+to+'!important;}';
		if($(document).find('#accent_bg_colors').length) {
			$(document).find('#accent_bg_colors').remove();
		}
	$(document).find('head').append($('<style id="accent_bg_colors">' + hover_val + '</style>'));
	$('.post_description, #crumbs li:last-child, .meta-nav-prev, .meta-nav-next, .blog_single_img .isotope_gallery li, #main_slider .prevBtn, #main_slider .nextBtn, .widget_container .tagcloud a:hover, #sidebar .widget_calendar table caption, .cal-blog,  .single_img .isotope_gallery li, a.social-icons:hover, .slides-pagination a.current, .post_share, .portfolio_gallery li:hover, .owl_slider_img, .ei-slider-thumbs li, .ei-slider-thumbs li a:hover, .blog_post_icons > a').css('background', to);

	$('.post_description, #crumbs li:last-child, .meta-nav-prev, .meta-nav-next, .blog_single_img .isotope_gallery li, #main_slider .prevBtn, #main_slider .nextBtn, .widget_container .tagcloud a:hover, #sidebar .widget_calendar table caption, .cal-blog,  .single_img .isotope_gallery li, a.social-icons:hover, .slides-pagination a.current, .post_share, .portfolio_gallery li:hover, .owl_slider_img, .ei-slider-thumbs li, .ei-slider-thumbs li a:hover, .blog_post_icons > a').css('background', to);

	$('.testimonial_wrapper strong span, .video_inner_text h2 span, .video_inner_text p span, .single_img_parallex_inner_text span, #entry-author-info h4, .custom_title i, .widget_title i, .page_sidebar:before, .dropcap span, .custom_title span, .image-boxes span, #ei-slider h2 span, .accent, .mid_container_wrapper_section .pagination a:hover, .pagination .current, .pagination span a.current, ul.page-numbers .current, #mid_content_right_section .pagination a:hover').css('color', to);
	});
});
wp.customize('accent_text_color', function( value ){
	value.bind( function( to ){
	var hover_val='.mid_container_wrapper_section  #mid_container .widget_container .tagcloud a:hover, #sidebar .widget_calendar table caption, #sidebar .widget_calendar table td a, #sidebar .widget_calendar table td a:visited, ul.page-numbers .current, a.social-icons:hover, .slider_items h4, .post_share, .search_box_icon, .bx-prev:hover:before, .bx-next:hover:before, #singlepage_nav span, .blog_post_icons > a, .blog_post_format_icon i{ color:'+to+'!important;}';
		if($(document).find('#accent_text_colors').length) {
			$(document).find('#accent_text_colors').remove();
		}
	$(document).find('head').append($('<style id="accent_text_colors">' + hover_val + '</style>'));
	});
});
//page bg
wp.customize('page_bg_color', function( value ){
	value.bind(function(to){
		$('.mid_container_wrapper_section, #mid_content_right_section, #mid_content_left_section').css('background', to ? to :'inherit');
	});
});
wp.customize('page_titles_color', function( value ){
	value.bind(function( to ){
		var page_titles_color = '.mid_container_wrapper_section h1, #mid_content_left_section h1, #mid_content_right_section h1, .mid_container_wrapper_section h2, #mid_content_left_section h2, #mid_content_right_section h2, .mid_container_wrapper_section h3, #mid_content_left_section h3, #mid_content_right_section h3, .mid_container_wrapper_section h4, #mid_content_left_section h4, #mid_content_right_section h4, .mid_container_wrapper_section h5, #mid_content_left_section h5, #mid_content_right_section h5, .mid_container_wrapper_section h6, #mid_content_left_section h6, #mid_content_right_section h6{color:'+ to +'}';
		if($(document).find('#page_titles_color').length) {
		$(document).find('#page_titles_color').remove();
		}
		$(document).find('head').append($('<style id="page_titles_color">' + page_titles_color + '</style>'));
	});
});
wp.customize('page_description_color', function( value ){
	value.bind(function( to ){
	var page_description_color = '.mid_container_wrapper_section p, .mid_container_wrapper_section, .mid_container_wrapper_section #mid_content_left_section, #mid_content_right_section{color:'+ to +'}';
		if($(document).find('#page_description_color').length) {
		$(document).find('#page_description_color').remove();
		}	
		$(document).find('head').append($('<style id="page_description_color">' + page_description_color + '</style>'));
	});
});
wp.customize('page_link_color', function( value ){
	value.bind(function( to ){
		//$('.mid_container_wrapper_section a:not(.add_to_cart_button)').css('color',to)	
		var page_link_color = '.mid_container_wrapper_section a:not(.add_to_cart_button){color:'+ to +'}';
		if($(document).find('#page_link_color').length) {
		$(document).find('#page_link_color').remove();
		}	
		$(document).find('head').append($('<style id="page_link_color">' + page_link_color + '</style>'));
	});
});
wp.customize('page_link_hover_color', function( value ){
	value.bind(function( to ){
		var page_link_hover = '.mid_container_wrapper_section a:hover:not(.add_to_cart_button){color:'+ to +'}';
		if($(document).find('#page_link_hover').length) {
			$(document).find('#page_link_hover').remove();
		}
	$(document).find('head').append($('<style id="page_link_hover">' + page_link_hover + '</style>'));
	});
});
// Sidebar
wp.customize('sidebar_title_color', function( value ){
	value.bind(function( to ){
		$('.mid_container_wrapper_section #sidebar h3, #mid_content_left_section #sidebar h3, #mid_content_right_section #sidebar h3').css('color',to);
	});
});
wp.customize('sidebar_content_color', function( value ){
	value.bind(function( to ){
		$('#sidebar, #sidebar p').css('color',to);
	});
});
wp.customize('sidebar_link_color', function( value ){
	value.bind(function( to ){
		$('#sidebar a').css('color',to);
	});
});
wp.customize('sidebar_link_hover_color', function( value ){
	value.bind(function( to ){
		var sidebar_link_hover_color = '#sidebar a:hover:not(.tagcloud a){color:'+ to +'!important}';
		if($(document).find('#sidebar_link_hover_color').length) {
			$(document).find('#sidebar_link_hover_color').remove();
		}
	$(document).find('head').append($('<style id="sidebar_link_hover_color">' + sidebar_link_hover_color + '</style>'));
	});
});
//page title colors
wp.customize('page_title_bg_color', function( value ){
	value.bind(function( to ){
		var page_title_bg_color = '.sub_header_wrapper{ background-color:'+ ( to ? to : 'inherit') +'!important; }';
		if($(document).find('#page_title_bg_color').length) {
			$(document).find('#page_title_bg_color').remove();
		}
	$(document).find('head').append($('<style id="page_title_bg_color">' + page_title_bg_color + '</style>'));
	});
});
wp.customize('page_titlebar_title_color', function( value ){
	value.bind(function( to ){
		$('.sub_header_wrapper h2').css('color',to);
	});
});
wp.customize('title_description_color', function( value ){
	value.bind(function( to ){
		$('.sub_header_wrapper p').css('color',to);
	});
});
// Font weight
wp.customize('page_title_font_weight', function(  value ){
	value.bind(function(to){
		var page_title_font_weight = '.sub_header_wrapper h2{ font-weight:'+ to +';}';
		if($(document).find('#page_title_font_weight').length) {
			$(document).find('#page_title_font_weight').remove();
		}
	$(document).find('head').append($('<style id="page_title_font_weight">' + page_title_font_weight + '</style>'));
	});
});
wp.customize('page_title_font_style', function(  value ){
	value.bind(function(to){
		var page_title_font_style = '.sub_header_wrapper h2{ font-style:'+ to +';}';
		if($(document).find('#page_title_font_style').length) {
			$(document).find('#page_title_font_style').remove();
		}
	$(document).find('head').append($('<style id="page_title_font_style">' + page_title_font_style + '</style>'));
	});
});
wp.customize('page_description_font_weight', function(  value ){
	value.bind(function(to){
		var page_description_font_weight = '.sub_header_wrapper p{ font-weight:'+ to +';}';
		if($(document).find('#page_description_font_weight').length) {
			$(document).find('#page_description_font_weight').remove();
		}
	$(document).find('head').append($('<style id="page_description_font_weight">' + page_description_font_weight + '</style>'));
	});
});
wp.customize('page_description_font_style', function(  value ){
	value.bind(function(to){
		var page_description_font_style = '.sub_header_wrapper p{ font-style:'+ to +';}';
		if($(document).find('#page_description_font_style').length) {
			$(document).find('#page_description_font_style').remove();
		}
	$(document).find('head').append($('<style id="page_description_font_style">' + page_description_font_style + '</style>'));
	});
});
// Position
wp.customize('page_title_des_position', function(value){		
	value.bind(function(to){
		switch(to){
			case 'left':
				var page_title_des_position = '.sub_header h2:after{ left:0px!important; right:inherit!important; }';
				var titleposition = '.page_title_wrapper{ float:left!important; text-align:left!important; }';
				var bread_crumb = '#crumbs{ float:right!important;  }';
				var margin_bottom = '';
				break;
			case 'right':
				var page_title_des_position = '.sub_header h2:after{ right:0px!important; left:inherit!important; }';
				var titleposition = '.page_title_wrapper{ float:right!important; text-align:right!important; }';
				var bread_crumb = '#crumbs{ float:left!important; }';
				var margin_bottom = '';
				break;
			case 'center':
				var page_title_des_position = '.sub_header h2:after{ margin:0px auto; left:0!important;; right:0!important; }';
				var titleposition = '.page_title_wrapper{ margin:0px auto!important; float:none!important; text-align:center!important; }';
				var bread_crumb = '#crumbs{ margin:10px auto 0!important; float:none!important; }';
				var margin_bottom = '.sub_header.container h2{ margin-bottom:10px!important; }';
				break;
			}	
		if($(document).find('#page_title_des_position').length) {
			$(document).find('#page_title_des_position').remove();
		}
		if($(document).find('#titleposition').length) {
			$(document).find('#titleposition').remove();
		}
		if($(document).find('#bread_crumb').length) {
			$(document).find('#bread_crumb').remove();
		}
		if($(document).find('#margin_bottom').length) {
			$(document).find('#margin_bottom').remove();
		}
		$(document).find('head').append($('<style id="page_title_des_position">' + page_title_des_position + '</style>'));
		$(document).find('head').append($('<style id="titleposition">' + titleposition + '</style>'));
		$(document).find('head').append($('<style id="bread_crumb">' + bread_crumb + '</style>'));
		$(document).find('head').append($('<style id="margin_bottom">' + margin_bottom + '</style>'));
	});
});	

wp.customize('bread_crumb_text_color', function( value ){
	value.bind(function( to ){
		$('#crumbs').css('color',to);
	});
});
wp.customize('bread_crumb_link_color', function( value ){
	value.bind(function( to ){
		$('#crumbs > a').css('color',to);
	});
});

wp.customize('page_title_font_size', function( value ){
	value.bind(function( to ){
		$('.sub_header h2').css('font-size',to +'px');
	});
});

wp.customize('page_description_font_size', function( value ){
	value.bind(function( to ){
		$('.sub_header p').css('font-size',to +'px');
	});
});
wp.customize('page_title_bar_padding_t_b', function(value){
	value.bind(function( to ){
		var page_title_bar_padding_t_b = '.sub_header_wrapper{ padding:'+ to +'px 0!important; }';
		if( $(document).find('#page_title_bar_padding_t_b').length ){
			$(document).find('#page_title_bar_padding_t_b').remove();
		}
		$(document).find('head').append($('<style id=page_title_bar_padding_t_b>' + page_title_bar_padding_t_b + '</style>'));
	});
});

wp.customize('page_titlebar_title_color', function(value){
	value.bind(function( to ){
		var page_titlebar_title_color = '.sub_header_wrapper{ height:'+ to +'px!important; }';
		if( $(document).find('#page_titlebar_title_color').length ){
			$(document).find('#page_titlebar_title_color').remove();
		}
		$(document).find('head').append($('<style id=page_titlebar_title_color>' + page_titlebar_title_color + '</style>'));
	});
});

wp.customize('page_titlebar_border_bottom', function(value){
	value.bind(function( to ){
		var page_titlebar_border_bottom = '.sub_header_wrapper{ border-bottom-width:'+ to +'px!important; }';
		if( $(document).find('#page_titlebar_border_bottom').length ){
			$(document).find('#page_titlebar_border_bottom').remove();
		}
		$(document).find('head').append($('<style id=page_titlebar_border_bottom>' + page_titlebar_border_bottom + '</style>'));
	});
});
wp.customize('page_titlebar_border_bottom_color', function(value){
	value.bind(function( to ){
		var page_titlebar_border_bottom_color = '.sub_header_wrapper{ border-bottom-color:'+ to +'!important; }';
		if( $(document).find('#page_titlebar_border_bottom_color').length ){
			$(document).find('#page_titlebar_border_bottom_color').remove();
		}
		$(document).find('head').append($('<style id=page_titlebar_border_bottom_color>' + page_titlebar_border_bottom_color + '</style>'));
	});
});
wp.customize('bg_image_opacity', function(value){
	value.bind(function( to ){
		var bg_image_opacity = '.page_title_bg_img{ opacity:'+ to +'!important; }';
		if( $(document).find('#bg_image_opacity').length ){
			$(document).find('#bg_image_opacity').remove();
		}
		$(document).find('head').append($('<style id=bg_image_opacity>' + bg_image_opacity + '</style>'));
	});
});
// Page title bg Image
wp.customize('page_title_bar[bg_img]', function(value){
	value.bind(function( to ){
		var page_title_bar = '.page_title_bg_img{ background:url('+ to +')!important; }';
		if( $(document).find('#page_title_bar').length ){
			$(document).find('#page_title_bar').remove();
		}
		$(document).find('head').append($('<style id=page_title_bar>' + page_title_bar + '</style>'));
	});
});
wp.customize('page_title_bar_bg_repeat', function(value){		
	value.bind(function(to){
		switch(to){
			case 'no-repeat':
				var page_title_bar_bg_repeat = '.page_title_bg_img{ background-repeat: no-repeat!important;}';
				break;
			case 'repeat':
				var page_title_bar_bg_repeat = '.page_title_bg_img{ background-repeat: repeat!important; background-size:inherit!important;}';
				break;
			case 'cover':
				var page_title_bar_bg_repeat = '.page_title_bg_img{ background-repeat: no-repeat!important; background-size:cover!important;}';
				break;
			}	
		if($(document).find('#page_title_bar_bg_repeat').length) {
			$(document).find('#page_title_bar_bg_repeat').remove();
		}
		$(document).find('head').append($('<style id="page_title_bar_bg_repeat">' + page_title_bar_bg_repeat + '</style>'));		
	});
});	
// Page mid content bg
wp.customize('page_content_bg[bg_img]', function(value){
	value.bind(function( to ){
		var page_content_bg = '.mid_container_wrapper_section, .blog .mid_container_wrapper_section, #mid_content_right_section, #mid_content_left_section{ background:url('+ to +')!important; }';
		if( $(document).find('#page_content_bg').length ){
			$(document).find('#page_content_bg').remove();
		}
		$(document).find('head').append($('<style id=page_content_bg>' + page_content_bg + '</style>'));
	});
});
wp.customize('page_content_bg_repeat', function(value){		
	value.bind(function(to){
		switch(to){
			case 'no-repeat':
				var page_content_bg_repeat = '.mid_container_wrapper_section, .blog .mid_container_wrapper_section, #mid_content_right_section, #mid_content_left_section{ background-repeat: no-repeat!important;}';
				break;
			case 'repeat':
				var page_content_bg_repeat = '.mid_container_wrapper_section, .blog .mid_container_wrapper_section, #mid_content_right_section, #mid_content_left_section{ background-repeat: repeat!important; background-size:inherit!important;}';
				break;
			case 'cover':
				var page_content_bg_repeat = '.mid_container_wrapper_section, .blog .mid_container_wrapper_section, #mid_content_right_section, #mid_content_left_section{ background-repeat: no-repeat!important; background-size:cover!important;}';
				break;
			}	
		if($(document).find('#page_content_bg_repeat').length) {
			$(document).find('#page_content_bg_repeat').remove();
		}
		$(document).find('head').append($('<style id="page_content_bg_repeat">' + page_content_bg_repeat + '</style>'));		
	});
});	
// Most footer bottom
wp.customize('most_footer_text_color', function( value ){
	value.bind(function( to ){
		$('#footer_bottom p, #footer_bottom, #footer_bottom span').css('color', to);
	});
});
wp.customize('most_footer_link_color', function( value ){
	value.bind(function( to ){
		$('#footer_bottom a, #footer_bottom ul li a').css('color', to);
	});
});
wp.customize('most_footer_link_hover_color', function( value ){
	value.bind(function( to ){
	var footer_link_hover_color = '#footer_bottom a:hover, #footer_bottom a:active, #menu-footer > li.current-menu-item > a{color:'+ to +'!important}';
		if($(document).find('#most_footer_link_hover_color').length) {
			$(document).find('#most_footer_link_hover_color').remove();
		}
	$(document).find('head').append($('<style id="most_footer_link_hover_color">' + footer_link_hover_color + '</style>'));
	});
});
wp.customize('most_footer_bg_color', function( value ){
	value.bind(function( to ){
		//$('footer').css('background', to ? to : 'inherit');
		var most_footer_bg_color = '#footer_bottom{background: '+to +'!important}';
		if($(document).find('#most_footer_bg_color').length) {
			$(document).find('#most_footer_bg_color').remove();
		}
		$(document).find('head').append($('<style id="most_footer_bg_color">' + most_footer_bg_color + '</style>'));
	});
});
wp.customize('mostfooterbg[mostfooter]', function( value ){
	value.bind(function( to ){
		//alert(to);
		var mostfooterbg = '#footer_bottom{background:url('+ to +')!important}';
		if($(document).find('#mostfooterbg').length) {
			$(document).find('#mostfooterbg').remove();
		}
		$(document).find('head').append($('<style id="mostfooterbg">' + mostfooterbg + '</style>'));
	});
});
wp.customize( 'most_footer_left_section', function( value ) {
		value.bind( function( to ) {
			$( '#footer_bottom .copyrights' ).html( to );
		} );
	} );
wp.customize( 'most_footer_right_section', function( value ) {
		value.bind( function( to ) {
			$( '#footer_bottom .footer_right' ).html( to );
		} );
	} );

wp.customize('most_footerbg_repeat', function(value){		
	value.bind(function(to){
		switch(to){
			case 'no-repeat':
				var most_footerbg_repeat = '#footer_bottom{ background-repeat: no-repeat!important;}';
				break;
			case 'repeat':
				var most_footerbg_repeat = '#footer_bottom{ background-repeat: repeat!important; background-size:inherit!important;}';
				break;
			case 'cover':
				var most_footerbg_repeat = '#footer_bottom{ background-repeat: no-repeat!important; background-size:cover!important;}';
				break;
			}	
		if($(document).find('#most_footerbg_repeat').length) {
			$(document).find('#most_footerbg_repeat').remove();
		}
		$(document).find('head').append($('<style id="most_footerbg_repeat">' + most_footerbg_repeat + '</style>'));		
	});
});
// Header Section 
wp.customize('header_bg_color', function( value ){
	value.bind(function( to ){
		if( to == false){
			var header_bg_color = '#header_wrapper{background:inherit!important}';
		}else{
			var header_bg_color = '#header_wrapper{background:'+ to +'!important}';
		}
		if($(document).find('#header_bg_color').length) {
			$(document).find('#header_bg_color').remove();
		}
		$(document).find('head').append($('<style id="header_bg_color">' + header_bg_color + '</style>'));
	});
});
wp.customize('upload_header[bg_image]', function( value ){
	value.bind(function( to ){
		//alert(to);
		var upload_header = '#header_wrapper{background-image:url('+ to +')!important}';
		if($(document).find('#upload_header').length) {
			$(document).find('#upload_header').remove();
		}
		$(document).find('head').append($('<style id="upload_header">' + upload_header + '</style>'));
	});
});
wp.customize('header_padding_top_bottom', function( value ){
	value.bind(function( to ){
		var header_padding_top_bottom = '#header_wrapper{padding-top:'+ to +'px!important; padding-bottom:'+ to +'px!important;}';
		if($(document).find('#header_padding_top_bottom').length) {
			$(document).find('#header_padding_top_bottom').remove();
		}
		$(document).find('head').append($('<style id="header_padding_top_bottom">' + header_padding_top_bottom + '</style>'));
	});
});
wp.customize('header_border_top', function( value ){
	value.bind(function( to ){
		var header_border_top = '#header_wrapper{padding-top:'+ to +'px!important; padding-bottom:'+ to +'px!important;}';
		if($(document).find('#header_border_top').length) {
			$(document).find('#header_border_top').remove();
		}
		$(document).find('head').append($('<style id="header_border_top">' + header_border_top + '</style>'));
	});
});
// Outer Header
wp.customize('upload_outer_header[outer_bg_image]', function( value ){
	value.bind(function( to ){
		var upload_outer_header = '#header_container{background-image:url('+ to +')!important}';
		if($(document).find('#upload_outer_header').length) {
			$(document).find('#upload_outer_header').remove();
		}
		$(document).find('head').append($('<style id="upload_outer_header">' + upload_outer_header + '</style>'));
	});
});
wp.customize('outer_header_bg_color', function( value ){
	value.bind(function( to ){
		if( to == false){
			var outer_header_bg_color = '#header_container{background:inherit!important}';
		}else{
			var outer_header_bg_color = '#header_container{background:'+ to+'!important}';
		}
		if($(document).find('#outer_header_bg_color').length) {
			$(document).find('#outer_header_bg_color').remove();
		}
		$(document).find('head').append($('<style id="outer_header_bg_color">' + outer_header_bg_color + '</style>'));
	});
});
wp.customize('outer_header_padding_top', function( value ){
	value.bind(function( to ){
		var outer_header_padding_top = '#header_container{padding-top:'+ to +'px!important}';
		if($(document).find('#outer_header_padding_top').length) {
			$(document).find('#outer_header_padding_top').remove();
		}
		$(document).find('head').append($('<style id="outer_header_padding_top">' + outer_header_padding_top + '</style>'));
	});
});
wp.customize('outer_header_padding_bottom', function( value ){
	value.bind(function( to ){
		var outer_header_padding_bottom = '#header_container{padding-bottom:'+ to +'px	!important}';
		if($(document).find('#outer_header_padding_bottom').length) {
			$(document).find('#outer_header_padding_bottom').remove();
		}
		$(document).find('head').append($('<style id="outer_header_padding_bottom">' + outer_header_padding_bottom + '</style>'));
	});
});
// Sticky Header
wp.customize('sticky_header_bg_color', function( value ){
	value.bind(function( to ){
		var sticky_header_bg_color = '#header_container.sticky.sticky_menu{background:'+ to +'!important}';
		if($(document).find('#sticky_header_bg_color').length) {
			$(document).find('#sticky_header_bg_color').remove();
		}
	$(document).find('head').append($('<style id="sticky_header_bg_color">' + sticky_header_bg_color + '</style>'));
	});
});
wp.customize('sticky_header_link_color', function( value ){
	value.bind(function( to ){
		$('.sticky_menu .menu > ul > li > a, .sticky_menu #jqueryslidemenu i, .sticky_menu .search_box_icon').css('color', to ? to :'inherit');
	});
});
wp.customize('sticky_header_link_hover_color', function( value ){
	value.bind(function( to ){
		var header_link_hover_color = '.sticky_menu .menu > ul > li > a:hover, .sticky_menu  .menu > li.current-menu-item > a, .sticky_menu .nav_wrap > ul > li:hover > a, .sticky_menu .current-menu-ancestor{color:'+ to +'!important}';
		if($(document).find('#header_link_hover_color').length) {
			$(document).find('#header_link_hover_color').remove();
		}
	$(document).find('head').append($('<style id="header_link_hover_color">' + header_link_hover_color + '</style>'));
	});
});
// Logo
wp.customize('kaya_logo[upload_logo]', function( value ){
	value.bind(function( to ){
		if( to ){
			$('#header_wrapper img.logo').attr('src', to);
		}else{
			$('#header_wrapper img.logo').attr('src', wppath.template_path+'/images/logo.png');
		}
	});
});
wp.customize('header_text_logo', function( value ){
	value.bind(function( to ){
		$('.header_logo_section h1.logo a, .header_logo_section h1.sticky_logo a, .kaya_right_position h1.sticky_logo a, .kaya_left_position h1.sticky_logo a, .kaya_right_position h1.logo a, .kaya_left_position h1.logo a').html(to);
	});
});
wp.customize('text_logo_size', function( value ){
	value.bind(function( to ){
		$('.header_logo_section h1.logo a, .kaya_right_position h1.logo a, .kaya_left_position h1.logo a').css('font-size',to +'px');
	});
});

wp.customize('sticky_text_logo_size', function( value ){
	value.bind(function( to ){
		$('.header_logo_section h1.sticky_logo a, .kaya_right_position h1.sticky_logo a, .kaya_left_position h1.sticky_logo a').css('font-size',to +'px');
	});
});

wp.customize('header_logo_font_weight', function( value ){
	value.bind(function( to ){
		$('.header_logo_section h1.logo a, .header_logo_section h1.sticky_logo a, .kaya_right_position h1.sticky_logo a, .kaya_left_position h1.sticky_logo a, .kaya_right_position h1.logo a, .kaya_left_position h1.logo a').css('font-weight',to);
	});
});
wp.customize('header_logo_font_style', function( value ){
	value.bind(function( to ){
		$('.header_logo_section h1.logo a, .header_logo_section h1.sticky_logo a, .kaya_right_position h1.sticky_logo a, .kaya_left_position h1.sticky_logo a, .kaya_right_position h1.logo a, .kaya_left_position h1.logo a').css('font-style',to);
	});
});
wp.customize('logo_text_font_color', function( value ){
	value.bind(function( to ){
		$('.header_logo_section h1.logo a, .kaya_right_position h1.logo a, .kaya_left_position h1.logo a').css('color',to ? to : '#333333');
	});
});
//Sticky logo color
wp.customize('sticky_logo_color', function( value ){
	value.bind(function( to ){
		$('.header_logo_section h1.sticky_logo a, .kaya_right_position h1.sticky_logo a, .kaya_left_position h1.sticky_logo a').css('color',to ? to : '#333333');
	});
});
// Tagline
wp.customize('header_text_logo_tagline', function( value ){
	value.bind(function( to ){
		$('.header_logo_section .logo_tag_line, .kaya_right_position .logo_tag_line, .kaya_left_position .logo_tag_line').html(to);
	});
});
wp.customize('logo_tagline_size', function( value ){
	value.bind(function( to ){
		$('.header_logo_section .logo_tag_line, .kaya_right_position .logo_tag_line, .kaya_left_position .logo_tag_line').css('font-size',to +'px');
	});
});
wp.customize('logo_tagline_letter_spacing', function( value ){
	value.bind(function( to ){
		$('.header_logo_section .logo_tag_line, .kaya_right_position .logo_tag_line, .kaya_left_position .logo_tag_line').css('letter-spacing',to +'px');
	});
});

wp.customize('logo_tagline_font_weight', function( value ){
	value.bind(function( to ){
		$('.header_logo_section .logo_tag_line, .kaya_right_position .logo_tag_line, .kaya_left_position .logo_tag_line').css('font-weight',to);
	});
});
wp.customize('logo_tagline_font_style', function( value ){
	value.bind(function( to ){
		$('.header_logo_section .logo_tag_line, .kaya_right_position .logo_tag_line, .kaya_left_position .logo_tag_line').css('font-style',to);
	});
});
wp.customize('logo_tagline_font_color', function( value ){
	value.bind(function( to ){
		$('.header_logo_section .logo.logo_tag_line, .kaya_right_position .logo.logo_tag_line, .kaya_left_position .logo.logo_tag_line').css('color',to ? to : '#333333');
	});
});

wp.customize('sticky_logo_tagline_color', function( value ){
	value.bind(function( to ){
		$('.header_logo_section .sticky_logo.logo_tag_line').css('color',to ? to : '#333333');
	});
});
// Sticky logo
wp.customize('sticky_logo[upload_sticky_logo]', function( value ){
	value.bind(function( to ){
		if( to ){
			$('#header_wrapper img.sticky_logo').attr('src', to);
		}else{
			$('#header_wrapper img.sticky_logo').attr('src', wppath.template_path+'/images/logo.png');
		}
	});
});
wp.customize('header_logo_position1', function(value){
	value.bind(function(to){
		var wide_menu = $('.nav_wrap').width();
      	var container_width = parseInt($('.container').css('width'));
		switch(to){
			case 'left':
				$('.wide_menu .megamenu_wrapper').css('left', Math.ceil( ( -( container_width - wide_menu  ) ) - 30 ));
				$('#header_wrapper').children().eq(0).addClass('header_left_section').removeClass('header_no_section header_right_section logo_margin');
				$('#header_wrapper').children().eq(2).addClass('header_right_section').removeClass('header_no_section header_left_section');
				break;
			case 'right':
				$('.wide_menu .megamenu_wrapper').css('left', 0);
				$('#header_wrapper').children().eq(0).addClass('header_right_section').removeClass('header_left_section header_no_section logo_margin');
				$('#header_wrapper').children().eq(2).addClass('header_left_section').removeClass('header_right_section header_no_section');
				break;
			case 'center':
				$('.wide_menu .megamenu_wrapper').css('left', Math.ceil( ( -( container_width - wide_menu  ) / 2 ) - 15 ));
				$('#header_wrapper').children().eq(0).addClass('header_no_section logo_margin').removeClass('header_left_section header_right_section toggle_menu');
				$('#header_wrapper').children().eq(2).addClass('header_no_section').removeClass('header_right_section header_left_section');
				break;		
		}
	});
});
wp.customize('enable_fluid_header', function( value ){
	value.bind(function( to ){
		var header_fluid = ( true == to ) ? 'fluid_header' : 'container';
		$('#header_container .header_logo_section').removeClass('fluid_header container').addClass(header_fluid);
	});
	});

wp.customize('logo_margin_top', function(value){
	value.bind(function( to ){
		var logo_margin_top = '.logo, .sticky_logo{ margin-top:'+ to +'px; }';
		if( $(document).find('#logo_margin_top').length ){
			$(document).find('#logo_margin_top').remove();
		}
		$(document).find('head').append($('<style id=logo_margin_top>' + logo_margin_top + '</style>'));
	});
});
wp.customize('logo_margin_bottom', function(value){
	value.bind(function( to ){
		var logo_margin_bottom = '.logo, .sticky_logo{ margin-bottom:'+ to +'px; }';
		if( $(document).find('#logo_margin_bottom').length ){
			$(document).find('#logo_margin_bottom').remove();
		}
		$(document).find('head').append($('<style id="logo_margin_bottom">' + logo_margin_bottom + '</style>'));	
	});
});
wp.customize('backgroundbg_repeat', function(value){		
	value.bind(function(to){
		switch(to){
			case 'no-repeat':
				var backgroundbg_repeat = '#header_container, .side_header_bg_image{ background-repeat: no-repeat!important; }';
				break;
			case 'repeat':
				var backgroundbg_repeat = '#header_container, .side_header_bg_image{ background-repeat: repeat!important; background-size:inherit!important;}';
				break;
			case 'cover':
				var backgroundbg_repeat = '#header_container, .side_header_bg_image{ background-repeat: no-repeat!important; background-size:cover!important;}';
				break;
			}	
		if($(document).find('#backgroundbg_repeat').length) {
			$(document).find('#backgroundbg_repeat').remove();
		}
		$(document).find('head').append($('<style id="backgroundbg_repeat">' + backgroundbg_repeat + '</style>'));		
	});
});	

wp.customize('mobile_header_bg_color', function( value ){
	value.bind(function( to ){
		var mobile_header_bg_color = '#header_container.mobile_header_section{background:'+ to +'!important}';
		if($(document).find('#mobile_header_bg_color').length) {
			$(document).find('#mobile_header_bg_color').remove();
		}
	$(document).find('head').append($('<style id="mobile_header_bg_color">' + mobile_header_bg_color + '</style>'));
	});
});
/* Custom Css */
wp.customize('kaya_custom_css', function( value ){
	value.bind(function( to ){
		if($(document).find('#kaya_custom_css').length) {
			$(document).find('#kaya_custom_css').remove();
		}
	$(document).find('head').append($('<style id="kaya_custom_css">' + to + '</style>'));
	});
	});
// Top Header
wp.customize('top_bar_bg_color', function( value ){
	value.bind(function( to ){
		$('.header_top_section').css('background', to ? to :'inherit');
	});
});
// Bg Image
wp.customize('upload_top_bar[top_bg_image]', function( value ){
	value.bind(function( to ){
		$('.header_top_section').css('background', 'url('+ to +')');
	});
});
wp.customize('top_bar_bg_repeat', function(value){
	value.bind(function(to){
		switch(to){
			case 'no-repeat':
				var top_bar_bg_repeat = '.header_top_section{ background-repeat: no-repeat!important;}';
				break;
			case 'repeat':
				var top_bar_bg_repeat = '.header_top_section{ background-repeat: repeat!important;}';
				break;
			case 'cover':
				var top_bar_bg_repeat = '.header_top_section{ background-repeat: no-repeat!important; background-size:cover!important;}';
				break;
			}	
		if($(document).find('#top_bar_bg_repeat').length) {
			$(document).find('#top_bar_bg_repeat').remove();
		}
		$(document).find('head').append($('<style id="top_bar_bg_repeat">' + top_bar_bg_repeat + '</style>'));		
	});
});
wp.customize('top_bar_text_color', function( value ){
	value.bind(function( to ){
		$('.header_top_section').css('color', to ? to :'');
	});
});
wp.customize('top_bar_icon_color', function( value ){
	value.bind(function( to ){
		var top_bar_icon_color = '.top_right_section i{color:'+ to +'!important}';
		if($(document).find('#top_bar_icon_color').length) {
			$(document).find('#top_bar_icon_color').remove();
		}
	$(document).find('head').append($('<style id="top_bar_icon_color">' + top_bar_icon_color + '</style>'));
	});
});
wp.customize('top_bar_text_color', function( value ){
	value.bind(function( to ){
		$('.header_top_section').css('color', to ? to :'');
	});
});
wp.customize('top_bar_link_color', function( value ){
	value.bind(function( to ){
		$('.header_top_section a').css('color', to ? to :'inherit');
	});
});
wp.customize('top_bar_link_hover_color', function( value ){
	value.bind(function( to ){
		var top_bar_link_hover_color = '#main_content_inner_section .top_right_section a:hover i{color:'+ to +'!important}';
		if($(document).find('#top_bar_link_hover_color').length) {
			$(document).find('#top_bar_link_hover_color').remove();
		}
	$(document).find('head').append($('<style id="top_bar_link_hover_color">' + top_bar_link_hover_color + '</style>'));
	});
});
wp.customize( 'top_bar_left_content', function( value ) {
		value.bind( function( to ) {
			$( '.top_left_section' ).html( to );
		} );
	} );
wp.customize( 'top_bar_right_content', function( value ) {
		value.bind( function( to ) {
			$( '.top_right_section' ).html( to );
		} );
	} );


//General Settings
// Button
wp.customize('button_bg_color', function( value ){
	value.bind(function( to ){
	var button_bg_color = '.mid_container_wrapper_section a.readmore, input#submit, #contact-form p #contact_submit, #commentform #submit, #contact-form #reset, .mid_container_wrapper_section .blog_read_more, #main_slider a.readmore, input#reset{background:'+ (to ? to : 'inherit')  +'!important}';
		if($(document).find('#button_bg_color').length) {
			$(document).find('#button_bg_color').remove();
		}
	$(document).find('head').append($('<style id="button_bg_color">' + button_bg_color + '</style>'));
	});
});
wp.customize('button_border_color', function( value ){
	value.bind(function( to ){
		$('.mid_container_wrapper_section a.readmore, input#submit, #contact-form p #contact_submit, #commentform #submit, #contact-form #reset, .mid_container_wrapper_section .blog_read_more, #main_slider a.readmore, input#reset').css('border-color', to ? to :'inherit');
	});
});  
wp.customize('button_hover_border_color', function( value ){
	value.bind(function( to ){
		var button_hover_border_color = '.mid_container_wrapper_section a.readmore:hover, input#submit:hover, #contact-form p #contact_submit:hover, #commentform #submit:hover, #contact-form #reset:hover, .mid_container_wrapper_section .blog_read_more:hover, #main_slider a.readmore:hover, input#reset:hover{border-color:'+ (to ? to : 'inherit') + '}';
		if($(document).find('#button_hover_border_color').length) {
			$(document).find('#button_hover_border_color').remove();
		}
	$(document).find('head').append($('<style id="button_hover_border_color">' + button_hover_border_color + '</style>'));
	});
});
wp.customize('button_bg_text_color', function( value ){
	value.bind(function( to ){
		$('.mid_container_wrapper_section a.readmore, input#submit, #contact-form p #contact_submit, #commentform #submit, #contact-form #reset, .mid_container_wrapper_section .blog_read_more, #main_slider a.readmore, input#reset').css('color', to ? to :'inherit');
	});
});

wp.customize('button_bg_hover_color', function( value ){
	value.bind(function( to ){
		var button_bg_hover_color = '.mid_container_wrapper_section a.readmore:hover, input#submit:hover, #contact-form p #contact_submit:hover, #commentform #submit:hover, #contact-form #reset:hover, .mid_container_wrapper_section .blog_read_more:hover, #main_slider a.readmore:hover, input#reset:hover{background:'+ to +'!important}';
		if($(document).find('#button_bg_hover_color').length) {
			$(document).find('#button_bg_hover_color').remove();
		}
	$(document).find('head').append($('<style id="button_bg_hover_color">' + button_bg_hover_color + '</style>'));
	});
});
wp.customize('button_hover_text_color', function( value ){
	value.bind(function( to ){
		var button_hover_text_color = '.mid_container_wrapper_section a.readmore:hover, input#submit:hover, #contact-form p #contact_submit:hover, #commentform #submit:hover, #contact-form #reset:hover, .mid_container_wrapper_section .blog_read_more:hover, #main_slider a.readmore:hover, input#reset:hover{color:'+ to +'!important}';
		if($(document).find('#button_hover_text_color').length) {
			$(document).find('#button_hover_text_color').remove();
		}
	$(document).find('head').append($('<style id="button_hover_text_color">' + button_hover_text_color + '</style>'));
	});
});

wp.customize('button_font_size', function( value ){
	value.bind(function( to ){
		var button_font_size = '.mid_container_wrapper_section a.readmore, input#submit, #contact-form p #contact_submit, #commentform #submit, #contact-form #reset, .mid_container_wrapper_section .blog_read_more, #main_slider a.readmore, input#reset{font-size:'+ to +'px!important}';
		if($(document).find('#button_font_size').length) {
			$(document).find('#button_font_size').remove();
		}
	$(document).find('head').append($('<style id="button_font_size">' + button_font_size + '</style>'));
	});
});

wp.customize('button_font_weight', function( value ){
	value.bind(function( to ){
		var button_font_weight = '.mid_container_wrapper_section a.readmore, input#submit, #contact-form p #contact_submit, #commentform #submit, #contact-form #reset, .mid_container_wrapper_section .blog_read_more, #main_slider a.readmore, input#reset{font-weight:'+ to +'px!important}';
		if($(document).find('#button_font_weight').length) {
			$(document).find('#button_font_weight').remove();
		}
	$(document).find('head').append($('<style id="button_font_weight">' + button_font_weight + '</style>'));
	});
});

wp.customize('button_font_style', function( value ){
	value.bind(function( to ){
		var button_font_style = '.mid_container_wrapper_section a.readmore, input#submit, #contact-form p #contact_submit, #commentform #submit, #contact-form #reset, .mid_container_wrapper_section .blog_read_more, #main_slider a.readmore, input#reset{font-weight:'+ to +'px!important}';
		if($(document).find('#button_font_style').length) {
			$(document).find('#button_font_style').remove();
		}
	$(document).find('head').append($('<style id="button_font_style">' + button_font_style + '</style>'));
	});
});
wp.customize('button_border_radius', function( value ){
	value.bind(function( to ){
		var button_border_radius = '.mid_container_wrapper_section a.readmore, input#submit, #contact-form p #contact_submit, #commentform #submit, #contact-form #reset, .mid_container_wrapper_section .blog_read_more, #main_slider a.readmore, input#reset{border-radius:'+ to +'px!important}';
		if($(document).find('#button_border_radius').length) {
			$(document).find('#button_border_radius').remove();
		}
	$(document).find('head').append($('<style id="button_border_radius">' + button_border_radius + '</style>'));
	});
});
wp.customize('button_padding_top_bottom', function( value ){
	value.bind(function( to ){
		var button_padding_top_bottom = '.mid_container_wrapper_section a.readmore, input#submit, #contact-form p #contact_submit, #commentform #submit, #contact-form #reset, .mid_container_wrapper_section .blog_read_more, #main_slider a.readmore, input#reset{padding-top:'+ to +'px!important; padding-bottom:'+ to +'px!important}';
		if($(document).find('#button_padding_top_bottom').length) {
			$(document).find('#button_padding_top_bottom').remove();
		}
	$(document).find('head').append($('<style id="button_padding_top_bottom">' + button_padding_top_bottom + '</style>'));
	});
});
wp.customize('button_padding_left_right', function( value ){
	value.bind(function( to ){
		var button_padding_left_right = '.mid_container_wrapper_section a.readmore, input#submit, #contact-form p #contact_submit, #commentform #submit, #contact-form #reset, .mid_container_wrapper_section .blog_read_more, #main_slider a.readmore, input#reset{padding-left:'+ to +'px!important; padding-right:'+ to +'px!important;}';
		if($(document).find('#button_padding_left_right').length) {
			$(document).find('#button_padding_left_right').remove();
		}
	$(document).find('head').append($('<style id="button_padding_left_right">' + button_padding_left_right + '</style>'));
	});
});

wp.customize('disable_search_box', function( value ){
	value.bind(function( to ){
		if( true == to ){
			$('.main_search_wrapper').hide();
		}else{
			$('.main_search_wrapper').show();
		}
	});
});
// input field
wp.customize('input_background_color', function( value ){
	value.bind(function( to ){
		$('.search_form input, #contact-form input:not(.readmore), #contact-form textarea, #commentform input:not(#reset), #commentform textarea, #reservation-form input:not(#contact_submit), #reservation-form textarea').css('background', to ? to :'inherit');
	});
});
wp.customize('input_text_color', function( value ){
	value.bind(function( to ){
		$('.search_form input, #contact-form input:not(.readmore), #contact-form input:not(#reset), #contact-form textarea, #commentform input:not(#submit), #commentform textarea, #reservation-form input:not(#contact_submit), #reservation-form textarea').css('color', to ? to :'inherit');
	});
});
wp.customize('input_border_color', function( value ){
	value.bind(function( to ){
		$('.search_form input, #contact-form input:not(.readmore), #contact-form textarea, #commentform input:not(#submit), #commentform textarea, #reservation-form input:not(#contact_submit), #reservation-form textarea').css('border-color', to ? to :'initial');
	});
});
wp.customize('input_error_border_color', function( value ){
	value.bind(function( to ){
		//$('.vaidate_error').css('border-color', to ? to :'#de4a4a');
	var input_error_border_color = '.vaidate_error{ border-color:'+ to +'!important }';
		if($(document).find('#input_error_border_color').length) {
			$(document).find('#input_error_border_color').remove();
		}
	$(document).find('head').append($('<style id="input_error_border_color">' + input_error_border_color + '</style>'));
	});
});
// Portfolio thumbnail Colors
wp.customize('pf_posts_img_bg_color', function( value ){
	value.bind(function( to ){
		$('.pf_taxonomy_gallery div.pf_image_wrapper, #related_post_slider div.pf_image_wrapper').css('background', to ? to :'initial');
	});
});

wp.customize('pf_border_color', function( value ){
	value.bind(function( to ){
		//$('').css('border-color', to ? to :'initial');
		var pf_border_color = '.pf_taxonomy_gallery div.pf_image_wrapper .figcaption:before, .pf_taxonomy_gallery div.pf_image_wrapper .figcaption:after, #related_post_slider div.pf_image_wrapper .figcaption:before, #related_post_slider div.pf_image_wrapper .figcaption:after{border-color:'+ to +'!important}';
		if($(document).find('#pf_border_color').length) {
			$(document).find('#pf_border_color').remove();
		}
	$(document).find('head').append($('<style id="pf_border_color">' + pf_border_color + '</style>'));

	});
});
wp.customize('pf_posts_title_color', function( value ){
	value.bind(function( to ){
		$('.pf_taxonomy_gallery .pf_image_wrapper h2, #related_post_slider .pf_image_wrapper h2').css('color', to ? to :'');
	});
});
wp.customize('pf_posts_category_color', function( value ){
	value.bind(function( to ){
		$('.pf_taxonomy_gallery .pf_image_wrapper p, #related_post_slider .pf_image_wrapper p').css('color', to ? to :'');
	});
});
wp.customize('pf_related_title_border_color', function( value ){
	value.bind(function( to ){
		//$('#relatedposts').css('background', to ? to :'');
	});
});
wp.customize('pf_related_title_color', function( value ){
	value.bind(function( to ){
		$('#relatedposts h3').css('color', to ? to :'');
	});
});
wp.customize( 'pf_related_post_title', function( value ) {
		value.bind( function( to ) {
			$( '#relatedposts h3' ).text( to );
		} );
	} );
// Woocommerce
wp.customize('primary_buttons_bg_color', function( value ){
	value.bind(function( to ){
		var primary_buttons_bg_color = '.primary-button, #mid_container input#submit.primary-button, p.buttons .button.wc-forward{background:'+ to +'!important}';
		if($(document).find('#primary_buttons_bg_color').length) {
			$(document).find('#primary_buttons_bg_color').remove();
		}
	$(document).find('head').append($('<style id="primary_buttons_bg_color">' + primary_buttons_bg_color + '</style>'));

	});
});
wp.customize('primary_buttons_text_color', function( value ){
	value.bind(function( to ){
		var primary_buttons_text_color = '.primary-button, #mid_container input#submit.primary-button, p.buttons .button.wc-forward{color:'+ to +'!important}';
		if($(document).find('#primary_buttons_text_color').length) {
			$(document).find('#primary_buttons_text_color').remove();
		}
	$(document).find('head').append($('<style id="primary_buttons_text_color">' + primary_buttons_text_color + '</style>'));
	});
});
wp.customize('primary_buttons_bg_hover_color', function( value ){
	value.bind(function( to ){
		var primary_buttons_bg_hover_color = '.primary-button:hover, #mid_container input#submit.primary-button:hover, p.buttons .button.wc-forward:hover{background:'+ to +'!important}';
		if($(document).find('#primary_buttons_bg_hover_color').length) {
			$(document).find('#primary_buttons_bg_hover_color').remove();
		}
	$(document).find('head').append($('<style id="primary_buttons_bg_hover_color">' + primary_buttons_bg_hover_color + '</style>'));
	});
});
wp.customize('primary_buttons_text_hover_color', function( value ){
	value.bind(function( to ){
		var primary_buttons_text_hover_color = '.primary-button:hover, #mid_container input#submit.primary-button:hover, p.buttons .button.wc-forward:hover{color:'+ to +'!important}';
		if($(document).find('#primary_buttons_text_hover_color').length) {
			$(document).find('#primary_buttons_text_hover_color').remove();
		}
	$(document).find('head').append($('<style id="primary_buttons_text_hover_color">' + primary_buttons_text_hover_color + '</style>'));
	});
});
//
wp.customize('secondary_buttons_bg_color', function( value ){
	value.bind(function( to ){
		var secondary_buttons_bg_color = '.seconadry-button, #place_order, .single-product-tabs .active, .single-product-tabs li:hover, .woocommerce .quantity .minus, .woocommerce .quantity .plus, .woocommerce-page .quantity .minus, .woocommerce-page .quantity .plus{background:'+ to +'!important}';
		var primary_buttons_bg_color1 ='.woocommerce-tabs li.active:after , .woocommerce-tabs .single-product-tabs li:hover:after{ border-color:'+ to +' transparent transparent !important; }';
		if($(document).find('#secondary_buttons_bg_color').length) {
			$(document).find('#secondary_buttons_bg_color').remove();
		}
	$(document).find('head').append($('<style id="secondary_buttons_bg_color">' + secondary_buttons_bg_color + primary_buttons_bg_color1 +'</style>'));

	});
});
wp.customize('secondary_buttons_text_color', function( value ){
	value.bind(function( to ){
		var secondary_buttons_text_color = '.seconadry-button, #place_order, .single-product-tabs .active, .single-product-tabs li:hover, .woocommerce .quantity .minus, .woocommerce .quantity .plus, .woocommerce-page .quantity .minus, .woocommerce-page .quantity .plus, .single-product-tabs .active a, .single-product-tabs li:hover a{color:'+ to +'!important}';
		if($(document).find('#secondary_buttons_text_color').length) {
			$(document).find('#secondary_buttons_text_color').remove();
		}
	$(document).find('head').append($('<style id="secondary_buttons_text_color">' + secondary_buttons_text_color + '</style>'));
	});
});
wp.customize('secondary_buttons_bg_hover_color', function( value ){
	value.bind(function( to ){
		var secondary_buttons_bg_hover_color = '.seconadry-button:hover, #place_order:hover, .woocommerce .quantity .minus:hover, .woocommerce .quantity .plus:hover, .woocommerce-page .quantity .minus:hover, .woocommerce-page .quantity .plus:hover{background:'+ to +'!important}';
		if($(document).find('#secondary_buttons_bg_hover_color').length) {
			$(document).find('#secondary_buttons_bg_hover_color').remove();
		}
	$(document).find('head').append($('<style id="secondary_buttons_bg_hover_color">' + secondary_buttons_bg_hover_color + '</style>'));
	});
});
wp.customize('secondary_buttons_text_hover_color', function( value ){
	value.bind(function( to ){
		var secondary_buttons_text_hover_color = '.seconadry-button:hover, #place_order:hover, .woocommerce .quantity .minus:hover, .woocommerce .quantity .plus:hover, .woocommerce-page .quantity .minus:hover, .woocommerce-page .quantity .plus:hover{color:'+ to +'!important}';
		if($(document).find('#secondary_buttons_text_hover_color').length) {
			$(document).find('#secondary_buttons_text_hover_color').remove();
		}
	$(document).find('head').append($('<style id="secondary_buttons_text_hover_color">' + secondary_buttons_text_hover_color + '</style>'));
	});
});
//
wp.customize('woo_elments_colors', function( value ){
	value.bind(function( to ){
		var woo_elments_colors = '.product-remove a.remove:hover, .star-rating, .mid_container_wrapper_section .comment-form-rating .stars a:hover, .woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price, .upsells-product-slider ins span.amount, .related-product-slider .shop-products span .amount, .woocommerce ul.products li.product .price ins, .woocommerce-page ul.products li.product .price ins, .owl-item span.amount{color:'+ to +'!important}';
		var woo_elments_colors1 = '.woocommerce span.onsale, .woocommerce-page span.onsale { background-color:' + to + '!important; }';
		var woo_elments_colors2 ='.product-remove a.remove:hover, p span.amount { border-color: '+ to +' !important; }'
		if($(document).find('#woo_elments_colors').length) {
			$(document).find('#woo_elments_colors').remove();
		}
	$(document).find('head').append($('<style id="woo_elments_colors">' + woo_elments_colors + woo_elments_colors1 + woo_elments_colors2 +'</style>'));
	});
});
// Fields
wp.customize('success_msg_bg_color', function( value ){
	value.bind(function( to ){
		var success_msg_bg_color ='.cart-sussess-message{ background: '+ to +' !important; }'
		if($(document).find('#success_msg_bg_color').length) {
			$(document).find('#success_msg_bg_color').remove();
		}
	$(document).find('head').append($('<style id="success_msg_bg_color">' + success_msg_bg_color + '</style>'));
	});
});
wp.customize('success_msg_text_color', function( value ){
	value.bind(function( to ){
		var success_msg_text_color ='.cart-sussess-message{ color: '+ to +' !important; }'
		if($(document).find('#success_msg_text_color').length) {
			$(document).find('#success_msg_text_color').remove();
		}
	$(document).find('head').append($('<style id="success_msg_text_color">' + success_msg_text_color + '</style>'));
	});
});
wp.customize('notification_msg_bg_color', function( value ){
	value.bind(function( to ){
		var notification_msg_bg_color ='.woocommerce-cart-info{ background: '+ to +' !important; }'
		if($(document).find('#notification_msg_bg_color').length) {
			$(document).find('#notification_msg_bg_color').remove();
		}
	$(document).find('head').append($('<style id="notification_msg_bg_color">' + notification_msg_bg_color + '</style>'));
	});
});
wp.customize('notification_msg_text_color', function( value ){
	value.bind(function( to ){
		var notification_msg_text_color ='.woocommerce-cart-info, .woocommerce-cart-info a{ color: '+ to +' !important; }';
		if($(document).find('#notification_msg_text_color').length) {
			$(document).find('#notification_msg_text_color').remove();
		}
	$(document).find('head').append($('<style id="notification_msg_text_color">' + notification_msg_text_color + '</style>'));
	});
});
wp.customize('warning_msg_bg_color', function( value ){
	value.bind(function( to ){
		var warning_msg_bg_color ='.woocommerce-cart-error{ background: '+ to +' !important; }'
		if($(document).find('#warning_msg_bg_color').length) {
			$(document).find('#warning_msg_bg_color').remove();
		}
	$(document).find('head').append($('<style id="warning_msg_bg_color">' + warning_msg_bg_color + '</style>'));
	});
});
wp.customize('warning_msg_text_color', function( value ){
	value.bind(function( to ){
		var warning_msg_text_color ='.woocommerce-cart-error{ color: '+ to +' !important; }'
		if($(document).find('#warning_msg_text_color').length) {
			$(document).find('#warning_msg_text_color').remove();
		}
	$(document).find('head').append($('<style id="warning_msg_text_color">' + warning_msg_text_color + '</style>'));
	});
});
/* Blog */
wp.customize('blog_post_date_bg_color', function( value ){
	value.bind(function( to ){
		$('.blog_post_date').css('background', to ? to :'');
	});
});
wp.customize('blog_post_date_title_color', function( value ){
	value.bind(function( to ){
		$('.blog_post_date h4, .blog_post_date h5').css('color', to ? to :'');
	});
});

wp.customize( 'kaya_readmore_blog', function( value ) {
		value.bind( function( to ) {
			$( '.blog_post_wrapper .description .readmore' ).text( to );
		} );
	} );

wp.customize('author_meta_comment_bg_color', function( value ){
	value.bind(function( to ){
		var author_meta_comment_bg_color ='.single_post_meta, .entry-author-info, ol.commentlist div.parent{ background-color: '+ to +' !important; }'
		if($(document).find('#author_meta_comment_bg_color').length) {
			$(document).find('#author_meta_comment_bg_color').remove();
		}
	$(document).find('head').append($('<style id="author_meta_comment_bg_color">' + author_meta_comment_bg_color + '</style>'));
	});
	});
wp.customize('author_meta_comment_border_color', function( value ){
	value.bind(function( to ){
		var author_meta_comment_border_color ='.entry-author-info, ol.commentlist div.parent, .single_post_info, .single_post_meta{ border-color: '+ to +' !important; }';
		//var meta_info_border_bottom ='.single_post_meta{ border-color: '+ to +' !important; }'
		if($(document).find('#author_meta_comment_border_color').length) {
			$(document).find('#author_meta_comment_border_color').remove();
		}
	$(document).find('head').append($('<style id="author_meta_comment_border_color">' + author_meta_comment_border_color + '</style>'));
	});
});
wp.customize('author_meta_comment_text_color', function( value ){
	value.bind(function( to ){
		var author_meta_comment_text_color ='.single_post_meta, .entry-author-info, ol.commentlist div.parent{ color: '+ to +' !important; }'
		if($(document).find('#author_meta_comment_text_color').length) {
			$(document).find('#author_meta_comment_text_color').remove();
		}
	$(document).find('head').append($('<style id="author_meta_comment_text_color">' + author_meta_comment_text_color + '</style>'));
	});
	});
wp.customize('author_meta_comment_link_color', function( value ){
	value.bind(function( to ){
		var author_meta_comment_link_color ='.single_post_meta .single_post_info a, .entry-author-info #author-link a, #mid_container_wrapper .commentmetadata a{ color: '+ to +' !important; }'
		if($(document).find('#author_meta_comment_link_color').length) {
			$(document).find('#author_meta_comment_link_color').remove();
		}
	$(document).find('head').append($('<style id="author_meta_comment_link_color">' + author_meta_comment_link_color + '</style>'));
	});
	});
wp.customize('author_meta_comment_link_hover_color', function( value ){
	value.bind(function( to ){
		var author_meta_comment_link_hover_color =' .single_post_meta .single_post_info a:hover, .entry-author-info #author-link a:hover, #mid_container_wrapper .commentmetadata a:hover{ color: '+ to +' !important; }'
		if($(document).find('#author_meta_comment_link_hover_color').length) {
			$(document).find('#author_meta_comment_link_hover_color').remove();
		}
	$(document).find('head').append($('<style id="author_meta_comment_link_hover_color">' + author_meta_comment_link_hover_color + '</style>'));
	});
});
// Heading Fonts Sizes
wp.customize('body_font_size', function(  value ){
	value.bind(function(to){
		var body_font_line_height = Math.round(1.6 * to);
		var body_font_size = 'body, p{ font-size:'+ to +'px!important; line-height:'+ body_font_line_height +'px;}';
		if($(document).find('#body_font_size').length) {
			$(document).find('#body_font_size').remove();
		}
	$(document).find('head').append($('<style id="body_font_size">' + body_font_size + '</style>'));
	});
});
wp.customize('body_line_height', function(  value ){
	value.bind(function(to){
		var body_font_line_height = Math.round(1.6 * to);
		var body_line_height = 'body, p{line-height:'+ body_font_line_height +'px!important;}';
		if($(document).find('#body_line_height').length) {
			$(document).find('#body_line_height').remove();
		}
	$(document).find('head').append($('<style id="body_line_height">' + body_line_height + '</style>'));
	});
});

wp.customize('menu_font_size', function(  value ){
	value.bind(function(to){
		var menu_font_size = '.menu ul li a{ font-size:'+ to +'px!important;}';
		if($(document).find('#menu_font_size').length) {
			$(document).find('#menu_font_size').remove();
		}
	$(document).find('head').append($('<style id="menu_font_size">' + menu_font_size + '</style>'));
	});
});
wp.customize('child_menu_font_size', function(  value ){
	value.bind(function(to){
		var child_menu_font_size = '.menu ul ul li a{ font-size:'+ to +'px!important;}';
		if($(document).find('#child_menu_font_size').length) {
			$(document).find('#child_menu_font_size').remove();
		}
	$(document).find('head').append($('<style id="child_menu_font_size">' + child_menu_font_size + '</style>'));
	});
});
wp.customize('h1_title_fontsize', function(  value ){
	value.bind(function(to){
		var line_height_h1 = Math.round(1.1 * to);
		var h1_title_fontsize = 'h1{ font-size:'+ to +'px!important; line-height:'+ line_height_h1 +'px;}';
		if($(document).find('#h1_title_fontsize').length) {
			$(document).find('#h1_title_fontsize').remove();
		}
	$(document).find('head').append($('<style id="h1_title_fontsize">' + h1_title_fontsize + '</style>'));
	});
});

wp.customize('h2_title_fontsize', function(  value ){
	value.bind(function(to){
		var line_height_h2 = Math.round(1.1 * to);
		var h2_title_fontsize = 'h2{ font-size:'+ to +'px!important; line-height:'+ line_height_h2 +'px;}';
		if($(document).find('#h2_title_fontsize').length) {
			$(document).find('#h2_title_fontsize').remove();
		}
	$(document).find('head').append($('<style id="h2_title_fontsize">' + h2_title_fontsize + '</style>'));
	});
});

wp.customize('h3_title_fontsize', function(  value ){
	value.bind(function(to){
		var line_height_h3 = Math.round(1.1 * to);
		var h3_title_fontsize = 'h3{ font-size:'+ to +'px!important; line-height:'+ line_height_h3 +'px;}';
		if($(document).find('#h3_title_fontsize').length) {
			$(document).find('#h3_title_fontsize').remove();
		}
	$(document).find('head').append($('<style id="h3_title_fontsize">' + h3_title_fontsize + '</style>'));
	});
});
wp.customize('h4_title_fontsize', function(  value ){
	value.bind(function(to){
		var line_height_h4 = Math.round(1.1 * to);
		var h4_title_fontsize = 'h4{ font-size:'+ to +'px!important; line-height:'+ line_height_h4 +'px;}';
		if($(document).find('#h4_title_fontsize').length) {
			$(document).find('#h4_title_fontsize').remove();
		}
	$(document).find('head').append($('<style id="h4_title_fontsize">' + h4_title_fontsize + '</style>'));
	});
});

wp.customize('h5_title_fontsize', function(  value ){
	value.bind(function(to){
		var line_height_h5 = Math.round(1.1 * to);
		var h5_title_fontsize = 'h5{ font-size:'+ to +'px!important; line-height:'+ line_height_h5 +'px;}';
		if($(document).find('#h5_title_fontsize').length) {
			$(document).find('#h5_title_fontsize').remove();
		}
	$(document).find('head').append($('<style id="h5_title_fontsize">' + h5_title_fontsize + '</style>'));
	});
});
wp.customize('h6_title_fontsize', function(  value ){
	value.bind(function(to){
		var line_height_h6 = Math.round(1.1 * to);
		var h6_title_fontsize = 'h6{ font-size:'+ to +'px!important; line-height:'+ line_height_h6 +'px;}';
		if($(document).find('#h6_title_fontsize').length) {
			$(document).find('#h6_title_fontsize').remove();
		}
	$(document).find('head').append($('<style id="h6_title_fontsize">' + h6_title_fontsize + '</style>'));
	});
});

// Fonts
var subset = ['latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese'];
var font_weights = ['100', '100italic', '200', '200italic', '300', '300italic', '400', '400italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'];
// Logo
wp.customize('header_text_logo_font_family', function(  value ){
	value.bind(function(to){
	if( '0' != to){
		var replacestring = to.split(' ').join('+');
		var google_logo_font ='http://fonts.googleapis.com/css?family='+replacestring;
		var logo_font_family = '.header_logo_section h1.logo a,  .header_logo_section h1.sticky_logo a, #right_header_section  h1.logo a, #left_header_section  h1.logo a{ font-family:'+ to +'!important}';
		if($(document).find('#google_logo_font').length) {
				$(document).find('#google_logo_font').remove();
			}
		if($(document).find('#logo_font_family').length) {
				$(document).find('#logo_font_family').remove();
			}	
		$(document).find('head').append($("<link id='google_logo_font' href='"+ google_logo_font +":"+font_weights+"&subset="+subset+"' rel='stylesheet' type='text/css'><style id='logo_font_family'>" + logo_font_family + "</style>"));
	}else{
		$(document).find('#logo_font_family').remove();
		$(document).find('#google_logo_font').remove();
		var logo_font_family = '.header_logo_section h1.logo a, .header_logo_section h1.sticky_logo a{ font-family:arial!important}';
		$(document).find('head').append($("<style>" + logo_font_family + "</style>"));
	}
	});
});
// Tag Line
// Logo
wp.customize('text_logo_tagline_font_family', function(  value ){
	value.bind(function(to){
	if( '0' != to){
		var replacestring = to.split(' ').join('+');
		var text_logo_tagline_font_family ='http://fonts.googleapis.com/css?family='+replacestring;
		var tagline_font_family = '.header_logo_section .logo_tag_line{ font-family:'+ to +'!important}';
		if($(document).find('#text_logo_tagline_font_family').length) {
				$(document).find('#text_logo_tagline_font_family').remove();
			}
		if($(document).find('#tagline_font_family').length) {
				$(document).find('#tagline_font_family').remove();
			}	
		$(document).find('head').append($("<link id='text_logo_tagline_font_family' href='"+ text_logo_tagline_font_family +":"+font_weights+"&subset="+subset+"' rel='stylesheet' type='text/css'><style id='tagline_font_family'>" + tagline_font_family + "</style>"));
	}else{
		$(document).find('#tagline_font_family').remove();
		$(document).find('#text_logo_tagline_font_family').remove();
		var tagline_font_family = '.header_logo_section .logo_tag_line, #right_header_section .logo_tag_line, #left_header_section .logo_tag_line{ font-family:arial!important}';
		$(document).find('head').append($("<style>" + tagline_font_family + "</style>"));
	}
	});
});

wp.customize('google_body_font', function(  value ){
	value.bind(function(to){
	if( '0' != to){
		var replacestring = to.split(' ').join('+');
		var google_body_font ='http://fonts.googleapis.com/css?family='+replacestring;
		var body_font_family = 'body ,p, a{ font-family:'+ to +'!important}';
		if($(document).find('#google_body_font').length) {
				$(document).find('#google_body_font').remove();
			}
		if($(document).find('#body_font_family').length) {
				$(document).find('#body_font_family').remove();
			}	
		$(document).find('head').append($("<link id='google_body_font' href='"+ google_body_font +":"+font_weights+"&subset="+subset+"' rel='stylesheet' type='text/css'><style id='body_font_family'>" + body_font_family + "</style>"));
	}else{
		$(document).find('#body_font_family').remove();
		$(document).find('#google_body_font').remove();
		var body_font_family = 'body ,p, a{ font-family:arial!important}';
		$(document).find('head').append($("<style>" + body_font_family + "</style>"));
	}
	});
});

wp.customize('google_heading_font', function(  value ){
	value.bind(function(to){
	if( '0' != to){	
		var replacestring = to.split(' ').join('+');
		var google_heading_font ='http://fonts.googleapis.com/css?family='+replacestring;
		var heading_font_family = 'h1,h2,h3,h4,h5,h6{ font-family:'+ to +'!important}';
		if($(document).find('#google_heading_font').length) {
				$(document).find('#google_heading_font').remove();
			}
		if($(document).find('#heading_font_family').length) {
				$(document).find('#heading_font_family').remove();
			}	
		$(document).find('head').append($("<link id='google_heading_font' href='"+ google_heading_font +":"+font_weights+"&subset="+subset+"' rel='stylesheet' type='text/css'><style id='heading_font_family'>" + heading_font_family + "</style>"));
	}else{
		$(document).find('#google_heading_font').remove();
		$(document).find('#heading_font_family').remove();
		var heading_font_family = 'h1,h2,h3,h4,h5,h6{ font-family:arial!important}';
		$(document).find('head').append($("<style" + heading_font_family + "</style>"));
	}	
	});
});

wp.customize('google_menu_font', function(  value ){
	value.bind(function(to){
	if( '0' != to){	
		var replacestring = to.split(' ').join('+');
		var google_menu_font ='http://fonts.googleapis.com/css?family='+replacestring;
		var menu_font_family = '.menu ul li a{ font-family:'+ to +'!important}';
		if($(document).find('#google_menu_font').length) {
				$(document).find('#google_menu_font').remove();
			}
		if($(document).find('#menu_font_family').length) {
				$(document).find('#menu_font_family').remove();
			}	
		$(document).find('head').append($("<link id='google_menu_font' href='"+ google_menu_font +":"+font_weights+"&subset="+subset+"' rel='stylesheet' type='text/css'><style id='menu_font_family'>" + menu_font_family + "</style>"));

	}else{
		$(document).find('#google_menu_font').remove();
		$(document).find('#menu_font_family').remove();
		var menu_font_family = '.menu ul li a{ font-family:arial!important}';
		$(document).find('head').append($("<style>" + menu_font_family + "</style>"));
	}	
});
});
// Letter Spacing
wp.customize('h1_font_letter_space', function(  value ){
	value.bind(function(to){
		var h1_font_letter_space = 'h1{ letter-spacing:'+ to +'px;}';
		if($(document).find('#h1_font_letter_space').length) {
			$(document).find('#h1_font_letter_space').remove();
		}
	$(document).find('head').append($('<style id="h1_font_letter_space">' + h1_font_letter_space + '</style>'));
	});
});

wp.customize('h2_font_letter_space', function(  value ){
	value.bind(function(to){
		var h2_font_letter_space = 'h2{ letter-spacing:'+ to +'px;}';
		if($(document).find('#h2_font_letter_space').length) {
			$(document).find('#h2_font_letter_space').remove();
		}
	$(document).find('head').append($('<style id="h2_font_letter_space">' + h2_font_letter_space + '</style>'));
	});
});

wp.customize('h3_font_letter_space', function(  value ){
	value.bind(function(to){
		var h3_font_letter_space = 'h3{ letter-spacing:'+ to +'px;}';
		if($(document).find('#h3_font_letter_space').length) {
			$(document).find('#h3_font_letter_space').remove();
		}
	$(document).find('head').append($('<style id="h3_font_letter_space">' + h3_font_letter_space + '</style>'));
	});
});

wp.customize('h4_font_letter_space', function(  value ){
	value.bind(function(to){
		var h4_font_letter_space = 'h4{ letter-spacing:'+ to +'px;}';
		if($(document).find('#h4_font_letter_space').length) {
			$(document).find('#h4_font_letter_space').remove();
		}
	$(document).find('head').append($('<style id="h4_font_letter_space">' + h4_font_letter_space + '</style>'));
	});
});

wp.customize('h5_font_letter_space', function(  value ){
	value.bind(function(to){
		var h5_font_letter_space = 'h5{ letter-spacing:'+ to +'px;}';
		if($(document).find('#h5_font_letter_space').length) {
			$(document).find('#h5_font_letter_space').remove();
		}
	$(document).find('head').append($('<style id="h5_font_letter_space">' + h5_font_letter_space + '</style>'));
	});
});
wp.customize('h6_font_letter_space', function(  value ){
	value.bind(function(to){
		var h6_font_letter_space = 'h6{ letter-spacing:'+ to +'px;}';
		if($(document).find('#h6_font_letter_space').length) {
			$(document).find('#h6_font_letter_space').remove();
		}
	$(document).find('head').append($('<style id="h6_font_letter_space">' + h6_font_letter_space + '</style>'));
	});
});


wp.customize('body_font_letter_space', function(  value ){
	value.bind(function(to){
		var body_font_letter_space = 'body,p{ letter-spacing:'+ to +'px;}';
		if($(document).find('#body_font_letter_space').length) {
			$(document).find('#body_font_letter_space').remove();
		}
	$(document).find('head').append($('<style id="body_font_letter_space">' + body_font_letter_space + '</style>'));
	});
});

wp.customize('menu_font_letter_space', function(  value ){
	value.bind(function(to){
		var menu_font_letter_space = '.menu ul li a{ letter-spacing:'+ to +'px;}';
		if($(document).find('#menu_font_letter_space').length) {
			$(document).find('#menu_font_letter_space').remove();
		}
	$(document).find('head').append($('<style id="menu_font_letter_space">' + menu_font_letter_space + '</style>'));
	});
});

wp.customize('child_menu_font_letter_space', function(  value ){
	value.bind(function(to){
		var child_menu_font_letter_space = '.menu ul ul li a, .wide_menu strong{ letter-spacing:'+ to +'px;}';
		if($(document).find('#child_menu_font_letter_space').length) {
			$(document).find('#child_menu_font_letter_space').remove();
		}
	$(document).find('head').append($('<style id="child_menu_font_letter_space">' + child_menu_font_letter_space + '</style>'));
	});
});
wp.customize('child_menu_font_size', function(  value ){
	value.bind(function(to){
		var child_menu_font_size = '.menu ul ul li a, .wide_menu strong{ font-size:'+ to +'px;}';
		if($(document).find('#child_menu_font_size').length) {
			$(document).find('#child_menu_font_size').remove();
		}
	$(document).find('head').append($('<style id="child_menu_font_size">' + child_menu_font_size + '</style>'));
	});
});

// Typography
// Body
wp.customize('body_font_weight_bold', function(  value ){
	value.bind(function(to){
		var body_font_weight_bold = 'body, p{ font-weight:'+ to +';}';
		if($(document).find('#body_font_weight_bold').length) {
			$(document).find('#body_font_weight_bold').remove();
		}
	$(document).find('head').append($('<style id="body_font_weight_bold">' + body_font_weight_bold + '</style>'));
	});
});
// Menu
wp.customize('menu_font_weight', function(  value ){
	value.bind(function(to){
		var menu_font_weight = '.menu ul li a{ font-weight:'+ to +';}';
		if($(document).find('#menu_font_weight').length) {
			$(document).find('#menu_font_weight').remove();
		}
	$(document).find('head').append($('<style id="menu_font_weight">' + menu_font_weight + '</style>'));
	});
});
wp.customize('child_menu_font_weight', function(  value ){
	value.bind(function(to){
		var child_menu_font_weight = '.menu ul ul li a{ font-weight:'+ to +';}';
		if($(document).find('#child_menu_font_weight').length) {
			$(document).find('#child_menu_font_weight').remove();
		}
	$(document).find('head').append($('<style id="child_menu_font_weight">' + child_menu_font_weight + '</style>'));
	});
});
//titles
wp.customize('h1_font_weight_bold', function(  value ){
	value.bind(function(to){
		var h1_font_weight_bold = 'h1{ font-weight:'+ to +';}';
		if($(document).find('#h1_font_weight_bold').length) {
			$(document).find('#h1_font_weight_bold').remove();
		}
	$(document).find('head').append($('<style id="h1_font_weight_bold">' + h1_font_weight_bold + '</style>'));
	});
});

wp.customize('h2_font_weight_bold', function(  value ){
	value.bind(function(to){
		var h2_font_weight_bold = 'h2{ font-weight:'+ to +';}';
		if($(document).find('#h2_font_weight_bold').length) {
			$(document).find('#h2_font_weight_bold').remove();
		}
	$(document).find('head').append($('<style id="h2_font_weight_bold">' + h2_font_weight_bold + '</style>'));
	});
});

wp.customize('h3_font_weight_bold', function(  value ){
	value.bind(function(to){
		var h3_font_weight_bold = 'h3, .woocommerce ul.products li.product h3, .woocommerce-page ul.products li.product h3{ font-weight:'+ to +';}';
		if($(document).find('#h3_font_weight_bold').length) {
			$(document).find('#h3_font_weight_bold').remove();
		}
	$(document).find('head').append($('<style id="h3_font_weight_bold">' + h3_font_weight_bold + '</style>'));
	});
});

wp.customize('h4_font_weight_bold', function(  value ){
	value.bind(function(to){
		var h1_font_weight_bold = 'h4{ font-weight:'+ to +';}';
		if($(document).find('#h4_font_weight_bold').length) {
			$(document).find('#h4_font_weight_bold').remove();
		}
	$(document).find('head').append($('<style id="h4_font_weight_bold">' + h4_font_weight_bold + '</style>'));
	});
});

wp.customize('h5_font_weight_bold', function(  value ){
	value.bind(function(to){
		var h5_font_weight_bold = 'h5{ font-weight:'+ to +';}';
		if($(document).find('#h5_font_weight_bold').length) {
			$(document).find('#h5_font_weight_bold').remove();
		}
	$(document).find('head').append($('<style id="h5_font_weight_bold">' + h5_font_weight_bold + '</style>'));
	});
});

wp.customize('h6_font_weight_bold', function(  value ){
	value.bind(function(to){
		var h3_font_weight_bold = 'h6{ font-weight:'+ to +';}';
		if($(document).find('#h6_font_weight_bold').length) {
			$(document).find('#h6_font_weight_bold').remove();
		}
	$(document).find('head').append($('<style id="h6_font_weight_bold">' + h6_font_weight_bold + '</style>'));
	});
});
} )( jQuery );