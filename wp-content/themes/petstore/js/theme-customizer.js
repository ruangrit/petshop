(function($) {
  "use strict";
  $(function() {
  // On change
     $('.kaya-radio-img').click(function() {
    $('.kaya-radio-img-selected').removeClass('kaya-radio-img-selected');
    $(this).addClass('kaya-radio-img-selected').children('input[@type="radio"]').prop('checked', true);
   });
    $("input[name=test]").is(":checked");
// Header Image Upload 
$('#customize-control-select_header_background_type select').change(function(){
	$('#customize-control-bg_image').hide().addClass('customize-control-options-remove');
	$('#customize-control-backgroundbg_repeat').hide().addClass('customize-control-options-remove');
	$('#customize-control-header_bg_color').hide().addClass('customize-control-options-remove');
	var header_bg_type = $('#customize-control-select_header_background_type select option:selected').val();
	switch( header_bg_type ){
		case 'bg_type_color':
			$('#customize-control-header_bg_color').show().removeClass('customize-control-options-remove');
			break;
		case 'bg_type_image':
			$('#customize-control-bg_image').show().removeClass('customize-control-options-remove');
			$('#customize-control-backgroundbg_repeat').show().removeClass('customize-control-options-remove');
			break;
		case 'default':
			break;		
	}
}).change();
//bread crumb//
$('#customize-control-bread_crumb_remove input').change(function(){
		$('#customize-control-bread_crumb_text_color').show().removeClass('customize-control-options-remove');
		$('#customize-control-bread_crumb_link_color').show().removeClass('customize-control-options-remove');
		var select_top_header = $('#customize-control-bread_crumb_remove input').is(':checked');
		if( select_top_header ){
		$('#customize-control-bread_crumb_text_color').hide().addClass('customize-control-options-remove');
		$('#customize-control-bread_crumb_link_color').hide().addClass('customize-control-options-remove');
		}
}).change();
//search box settings
$('#customize-control-disable_search_box input').change(function(){
		$('#customize-control-search_box_bg_color').show().removeClass('customize-control-options-remove');
		$('#customize-control-Search_box_text_color').show().removeClass('customize-control-options-remove');
		var search_box = $('#customize-control-disable_search_box input').is(':checked');
		if( search_box ){
		$('#customize-control-search_box_bg_color').hide().addClass('customize-control-options-remove');
		$('#customize-control-Search_box_text_color').hide().addClass('customize-control-options-remove');
		}
}).change();
// Header Image Upload 
$('#customize-control-select_outer_header_background_type select').change(function(){
	$('#customize-control-outer_header_bg_color').hide().addClass('customize-control-options-remove');
	$('#customize-control-outer_bg_image').hide().addClass('customize-control-options-remove');
	$('#customize-control-outer_header_bg_repeat').hide().addClass('customize-control-options-remove');
	var outer_header_bg_type = $('#customize-control-select_outer_header_background_type select option:selected').val();
	switch( outer_header_bg_type ){
		case 'bg_type_color':
			$('#customize-control-outer_header_bg_color').show().removeClass('customize-control-options-remove');
			break;
		case 'bg_type_image':
			$('#customize-control-outer_bg_image').show().removeClass('customize-control-options-remove');
			$('#customize-control-outer_header_bg_repeat').show().removeClass('customize-control-options-remove');
			break;
		case 'default':
			break;		
	}
}).change();
//sticky header
function sticky_header_background_type(){
$('#customize-control-select_sticky_background_type select').change(function(){
	$('#customize-control-sticky_header_bg_color').hide().addClass('customize-control-options-remove');
	$('#customize-control-upload_sticky_bg_image').hide().addClass('customize-control-options-remove');
	$('#customize-control-sticky_background_repeat').hide().addClass('customize-control-options-remove');
	var sticky_header_bg_type = $('#customize-control-select_sticky_background_type select option:selected').val();
	switch( sticky_header_bg_type ){
		case 'bg_type_color':
			$('#customize-control-sticky_header_bg_color').show().removeClass('customize-control-options-remove');
			break;
		case 'bg_type_image':
			$('#customize-control-upload_sticky_bg_image').show().removeClass('customize-control-options-remove');
			$('#customize-control-sticky_background_repeat').show().removeClass('customize-control-options-remove');
			break;
		case 'default':
			break;		
	}
}).change();
}
// Most Footer
function most_footer_bg_type(){
$('#customize-control-select_most_footer_background_type select').change(function(){
	$('#customize-control-mostfooter').hide().addClass('customize-control-options-remove');
	$('#customize-control-most_footerbg_repeat').hide().addClass('customize-control-options-remove');
	$('#customize-control-most_footer_bg_color').hide().addClass('customize-control-options-remove');
	var footer_bg_type = $('#customize-control-select_most_footer_background_type select option:selected').val();
	switch( footer_bg_type ){
		case 'bg_type_color':
			$('#customize-control-most_footer_bg_color').show().removeClass('customize-control-options-remove');
			break;
		case 'bg_type_image':
			$('#customize-control-mostfooter').show().removeClass('customize-control-options-remove');
			$('#customize-control-most_footerbg_repeat').show().removeClass('customize-control-options-remove');
			break;
		case 'default':
			break;		
	}
}).change();
}
// product category sidebar
$('#customize-control-product_tag_page_sidebar input').change(function(){
		$('#customize-control-Woocommerce_custom_sidebar').hide().addClass('customize-control-options-remove');
	var select_val = $('#customize-control-product_tag_page_sidebar input:checked').val();
	if( select_val == 'two_third'){
		$('#customize-control-Woocommerce_custom_sidebar').show().removeClass('customize-control-options-remove');
			}
	if( select_val == 'two_third_last'){
		$('#customize-control-Woocommerce_custom_sidebar').show().removeClass('customize-control-options-remove');
			}
	}).change();
// page
$('#customize-control-select_page_mid_background_type select').change(function(){
	$('#customize-control-page_content_bg').hide().addClass('customize-control-options-remove');
	$('#customize-control-page_content_bg_repeat').hide().addClass('customize-control-options-remove');
	$('#customize-control-page_bg_color').hide().addClass('customize-control-options-remove');
	var footer_bg_type = $('#customize-control-select_page_mid_background_type select option:selected').val();
	switch( footer_bg_type ){
		case 'bg_type_color':
			$('#customize-control-page_bg_color').show().removeClass('customize-control-options-remove');
			break;
		case 'bg_type_image':
			$('#customize-control-page_content_bg_repeat').show().removeClass('customize-control-options-remove');
			$('#customize-control-page_content_bg').show().removeClass('customize-control-options-remove');
			break;
		case 'default':
			break;		
	}
}).change();
// Page title Image Upload 
$('#customize-control-select_page_title_background_type select').change(function(){
	$('#customize-control-page_title_bar').hide().addClass('customize-control-options-remove');
	$('#customize-control-page_title_bar_bg_repeat').hide().addClass('customize-control-options-remove');
	$('#customize-control-page_title_img_position').hide().addClass('customize-control-options-remove');
	$('#customize-control-parallax_zoom_note_description').hide().addClass('customize-control-options-remove');
	$('#customize-control-page_title_bg_color').hide().addClass('customize-control-options-remove');
	var outer_header_bg_type = $('#customize-control-select_page_title_background_type select option:selected').val();
	switch( outer_header_bg_type ){
		case 'bg_type_color':
			$('#customize-control-page_title_bg_color').show().removeClass('customize-control-options-remove');
			break;
		case 'bg_type_image':
			$('#customize-control-page_title_bar').show().removeClass('customize-control-options-remove');
			$('#customize-control-page_title_bar_bg_repeat').show().removeClass('customize-control-options-remove');
			$('#customize-control-page_title_img_position').show().removeClass('customize-control-options-remove');
			$('#customize-control-parallax_zoom_note_description').show().removeClass('customize-control-options-remove');
			break;
		case 'default':
			break;		
	}
}).change();
// Top Header
// Top Header
$('#customize-control-enable_top_header input').change(function(){
		$('#customize-control-top_bar_right_content').show().removeClass('customize-control-options-remove');
		$('#customize-control-top_bar_right_content_info').show().removeClass('customize-control-options-remove');
		$('#customize-control-disable_top_header_user_login_info').show().removeClass('customize-control-options-remove');
		$('#customize-control-top_header_padding_t_b').show().removeClass('customize-control-options-remove');
		$('#customize-control-select_top_header_background_type').show().removeClass('customize-control-options-remove');
		$('#customize-control-top_bg_image').show().removeClass('customize-control-options-remove');
		$('#customize-control-top_bar_bg_repeat').show().removeClass('customize-control-options-remove');
		$('#customize-control-top_bar_bg_color').show().removeClass('customize-control-options-remove');
		$('#customize-control-top_bar_text_color').show().removeClass('customize-control-options-remove');
		$('#customize-control-top_bar_link_color').show().removeClass('customize-control-options-remove');
		$('#customize-control-top_bar_link_hover_color').show().removeClass('customize-control-options-remove');
		$('#customize-control-top_bar_left_navigation').show().removeClass('customize-control-options-remove');
		top_header_bg_type();
		var top_header = $('#customize-control-enable_top_header input').is(':checked');
		if( top_header ){
		$('#customize-control-top_bar_right_content').hide().addClass('customize-control-options-remove');
		$('#customize-control-top_bar_right_content_info').hide().addClass('customize-control-options-remove');
		$('#customize-control-disable_top_header_user_login_info').hide().addClass('customize-control-options-remove');
		$('#customize-control-top_header_padding_t_b').hide().addClass('customize-control-options-remove');
		$('#customize-control-select_top_header_background_type').hide().addClass('customize-control-options-remove');
		$('#customize-control-top_bg_image').hide().addClass('customize-control-options-remove');
		$('#customize-control-top_bar_bg_repeat').hide().addClass('customize-control-options-remove');
		$('#customize-control-top_bar_bg_color').hide().addClass('customize-control-options-remove');
		$('#customize-control-top_bar_text_color').hide().addClass('customize-control-options-remove');
		$('#customize-control-top_bar_link_color').hide().addClass('customize-control-options-remove');
		$('#customize-control-top_bar_link_hover_color').hide().addClass('customize-control-options-remove');
		$('#customize-control-top_bar_left_navigation').hide().addClass('customize-control-options-remove');
		}
}).change();
function top_header_bg_type(){
	$('#customize-control-select_top_header_background_type select').change(function(){
		$('#customize-control-top_bg_image').hide().addClass('customize-control-options-remove');
		$('#customize-control-top_bar_bg_repeat').hide().addClass('customize-control-options-remove');
		$('#customize-control-top_bar_bg_color').hide().addClass('customize-control-options-remove');
		var footer_bg_type = $('#customize-control-select_top_header_background_type select option:selected').val();
		switch( footer_bg_type ){
			case 'bg_type_color':
				$('#customize-control-top_bar_bg_color').show().removeClass('customize-control-options-remove');
				break;
			case 'bg_type_image':
				$('#customize-control-top_bg_image').show().removeClass('customize-control-options-remove');
				$('#customize-control-top_bar_bg_repeat').show().removeClass('customize-control-options-remove');
				break;
			case 'default':
				break;		
		}
	}).change();
}
// Sticky Logo
function sticky_logo_change(){
	$('#customize-control-select_header_logo_type select').change(function(){
	$('#customize-control-upload_sticky_logo').hide().addClass('customize-control-options-remove');
	$('#customize-control-sticky_logo_color').hide().addClass('customize-control-options-remove');
	$('#customize-control-sticky_text_logo_size').hide().addClass('customize-control-options-remove');
	$('#customize-control-sticky_logo_tagline_color').hide().addClass('customize-control-options-remove');
	var header_bg_type = $('#customize-control-select_header_logo_type select option:selected').val();
	switch( header_bg_type ){
		case 'image_logo':
			$('#customize-control-upload_sticky_logo').show().removeClass('customize-control-options-remove');
			break;
		case 'text_logo':
			$('#customize-control-sticky_logo_color').show().removeClass('customize-control-options-remove');
			$('#customize-control-sticky_text_logo_size').show().removeClass('customize-control-options-remove');
			$('#customize-control-sticky_logo_tagline_color').show().removeClass('customize-control-options-remove');
			break;
		case 'none':

		case 'default':
			break;		
	}
	}).change();
}	
//top_header_bg_type();
// Logo Change
$('#customize-control-select_header_logo_type select').change(function(){
	$('#customize-control-upload_logo').hide().addClass('customize-control-options-remove');
	$('#customize-control-header_text_logo').hide().addClass('customize-control-options-remove');
	$('#customize-control-logo_text_font_color').hide().addClass('customize-control-options-remove');
	$('#customize-control-text_logo_size').hide().addClass('customize-control-options-remove');
	$('#customize-control-header_logo_font_style').hide().addClass('customize-control-options-remove');
	$('#customize-control-header_logo_font_weight').hide().addClass('customize-control-options-remove');
	$('#customize-control-header_text_logo_font_family').hide().addClass('customize-control-options-remove');
	$('#customize-control-logo_margin_top').show().removeClass('customize-control-options-remove');
	$('#customize-control-logo_margin_bottom').show().removeClass('customize-control-options-remove');
	$('#customize-control-header_text_logo_tagline').hide().addClass('customize-control-options-remove');
	$('#customize-control-customize_controll_divider_tagline').hide().addClass('customize-control-options-remove');
	$('#customize-control-logo_tagline_size').hide().addClass('customize-control-options-remove');
	$('#customize-control-logo_tagline_font_weight').hide().addClass('customize-control-options-remove');
	$('#customize-control-logo_tagline_font_style').hide().addClass('customize-control-options-remove');
	$('#customize-control-logo_tagline_letter_spacing').hide().addClass('customize-control-options-remove');
	$('#customize-control-text_logo_tagline_font_family').hide().addClass('customize-control-options-remove');
	$('#customize-control-logo_tagline_font_color').hide().addClass('customize-control-options-remove');
	$('#customize-control-header_retina_logo').hide().addClass('customize-control-options-remove');
	$('#customize-control-upload_retina_logo').hide().addClass('customize-control-options-remove');
	$('#customize-control-sticky_retina_disable').hide().addClass('customize-control-options-remove');
	$('#customize-control-upload_sticky_retina_logo').hide().addClass('customize-control-options-remove');
	$('#customize-control-header_tagline_title').hide().addClass('customize-control-options-remove');
	var header_bg_type = $('#customize-control-select_header_logo_type select option:selected').val();
	switch( header_bg_type ){
		case 'image_logo':
			$('#customize-control-upload_logo').show().removeClass('customize-control-options-remove');
			$('#customize-control-header_retina_logo').show().removeClass('customize-control-options-remove');
			$('#customize-control-upload_retina_logo').show().removeClass('customize-control-options-remove');
			$('#customize-control-sticky_retina_disable').show().removeClass('customize-control-options-remove');
			$('#customize-control-upload_sticky_retina_logo').show().removeClass('customize-control-options-remove');
			header_retina_logo();
			sticky_retina_logo();
			break;
		case 'text_logo':
			$('#customize-control-header_text_logo').show().removeClass('customize-control-options-remove');
			$('#customize-control-logo_text_font_color').show().removeClass('customize-control-options-remove');
			$('#customize-control-text_logo_size').show().removeClass('customize-control-options-remove');
			$('#customize-control-header_logo_font_style').show().removeClass('customize-control-options-remove');
			$('#customize-control-header_logo_font_weight').show().removeClass('customize-control-options-remove');
			$('#customize-control-header_text_logo_font_family').show().removeClass('customize-control-options-remove');
			$('#customize-control-header_text_logo_tagline').show().removeClass('customize-control-options-remove');
			$('#customize-control-customize_controll_divider_tagline').show().removeClass('customize-control-options-remove');
			$('#customize-control-logo_tagline_size').show().removeClass('customize-control-options-remove');
			$('#customize-control-logo_tagline_font_weight').show().removeClass('customize-control-options-remove');
			$('#customize-control-logo_tagline_font_style').show().removeClass('customize-control-options-remove');
			$('#customize-control-header_tagline_title').show().removeClass('customize-control-options-remove');
			$('#customize-control-logo_tagline_letter_spacing').show().removeClass('customize-control-options-remove');
			$('#customize-control-text_logo_tagline_font_family').show().removeClass('customize-control-options-remove');
			$('#customize-control-logo_tagline_font_color').show().removeClass('customize-control-options-remove');
			break;
		case 'none':
			$('#customize-control-logo_margin_top').hide().addClass('customize-control-options-remove');
			$('#customize-control-logo_margin_bottom').hide().addClass('customize-control-options-remove');
		case 'default':
			break;		
	}
}).change();
// Sticky Logo
$('#customize-control-sticky_header_disable input').change(function(){
		$('#customize-control-upload_sticky_bg_image').hide().addClass('customize-control-options-remove');
		$('#customize-control-sticky_background_repeat').hide().addClass('customize-control-options-remove');
		$('#customize-control-select_sticky_background_type').hide().addClass('customize-control-options-remove');
		$('#customize-control-upload_sticky_logo').hide().addClass('customize-control-options-remove');
		$('#customize-control-sticky_header_bg_color').hide().addClass('customize-control-options-remove');
		$('#customize-control-sticky_header_link_color').hide().addClass('customize-control-options-remove');
		$('#customize-control-sticky_header_link_hover_color').hide().addClass('customize-control-options-remove');
		$('#customize-control-sticky_logo_color').hide().addClass('customize-control-options-remove');
		$('#customize-control-sticky_text_logo_size').hide().addClass('customize-control-options-remove');
		$('#customize-control-sticky_logo_tagline_color').hide().addClass('customize-control-options-remove');
		var select_val = $('#customize-control-sticky_header_disable input').is(':checked');
		if( select_val){
		$('#customize-control-upload_sticky_bg_image').show().removeClass('customize-control-options-remove');
		$('#customize-control-sticky_background_repeat').show().removeClass('customize-control-options-remove');	
		$('#customize-control-select_sticky_background_type').show().removeClass('customize-control-options-remove');
		$('#customize-control-upload_sticky_logo').show().removeClass('customize-control-options-remove');
		$('#customize-control-select_header_logo_type').show().removeClass('customize-control-options-remove');
		$('#customize-control-sticky_header_bg_color').show().removeClass('customize-control-options-remove');
		$('#customize-control-sticky_header_link_color').show().removeClass('customize-control-options-remove');
		$('#customize-control-sticky_header_link_hover_color').show().removeClass('customize-control-options-remove');
		$('#customize-control-sticky_logo_color').show().removeClass('customize-control-options-remove');
		$('#customize-control-sticky_text_logo_size').show().removeClass('customize-control-options-remove');
		$('#customize-control-sticky_logo_tagline_color').show().removeClass('customize-control-options-remove');
		sticky_header_background_type();
		sticky_logo_change();
		}else{			
		}
}).change();
// Most bottom Footer
$('#customize-control-most_footer_disable input').change(function(){
		$('#customize-control-most_footer_left_section').show().removeClass('customize-control-options-remove');
		$('#customize-control-most_footer_right_section').show().removeClass('customize-control-options-remove');
		$('#customize-control-select_most_footer_background_type').show().removeClass('customize-control-options-remove');
		$('#customize-control-most_footer_bg_color').show().removeClass('customize-control-options-remove');
		$('#customize-control-most_footer_text_color').show().removeClass('customize-control-options-remove');
		$('#customize-control-most_footer_link_color').show().removeClass('customize-control-options-remove');
		$('#customize-control-most_footer_link_hover_color').show().removeClass('customize-control-options-remove');
		$('#customize-control-mostfooter').show().removeClass('customize-control-options-remove');
		$('#customize-control-most_footerbg_repeat').show().removeClass('customize-control-options-remove');
		most_footer_bg_type();
		var most_footer = $('#customize-control-most_footer_disable input').is(':checked');
		if( most_footer ){
		$('#customize-control-most_footer_left_section').hide().addClass('customize-control-options-remove');
		$('#customize-control-most_footer_right_section').hide().addClass('customize-control-options-remove');
		$('#customize-control-select_most_footer_background_type').hide().addClass('customize-control-options-remove');
		$('#customize-control-most_footer_bg_color').hide().addClass('customize-control-options-remove');
		$('#customize-control-most_footer_text_color').hide().addClass('customize-control-options-remove');
		$('#customize-control-most_footer_link_color').hide().addClass('customize-control-options-remove');
		$('#customize-control-most_footer_link_hover_color').hide().addClass('customize-control-options-remove');
		$('#customize-control-mostfooter').hide().addClass('customize-control-options-remove');
		$('#customize-control-most_footerbg_repeat').hide().addClass('customize-control-options-remove');
		//top_header_bg_type();
		}
}).change();
// Retina logo
function header_retina_logo(){
	$('#customize-control-header_retina_logo input').change(function(){
			$('#customize-control-upload_retina_logo').hide().addClass('customize-control-options-remove');
				var retina_show = $('#customize-control-header_retina_logo input').is(':checked');
			if( retina_show ){
				$('#customize-control-upload_retina_logo').show().removeClass('customize-control-options-remove');
			}else{
				$('#customize-control-upload_retina_logo').hide().addClass('customize-control-options-remove');
			}
	}).change();
}
// Sticky Retina logo
function sticky_retina_logo(){
	$('#customize-control-sticky_retina_disable input').change(function(){
			$('#customize-control-upload_sticky_retina_logo').hide().addClass('customize-control-options-remove');
				var retina_show = $('#customize-control-sticky_retina_disable input').is(':checked');
			if( retina_show ){
				$('#customize-control-upload_sticky_retina_logo').show().removeClass('customize-control-options-remove');
			}else{
				$('#customize-control-upload_sticky_retina_logo').hide().addClass('customize-control-options-remove');
			}
	}).change();
}
// Boxed Header
$('#customize-control-theme_layout_mode input').change(function(){
		$('#customize-control-select_body_background_type').hide().addClass('customize-control-options-remove');
		$('#customize-control-body_background_color').hide().addClass('customize-control-options-remove');
		$('#customize-control-background_image').hide().addClass('customize-control-options-remove');
		$('#customize-control-body_margin_top').hide().addClass('customize-control-options-remove');
		$('#customize-control-body_margin_bottom').hide().addClass('customize-control-options-remove');
		$('#customize-control-boxed_layout_position').hide().addClass('customize-control-options-remove');
		$('#customize-control-boxed_layout_shadow').hide().addClass('customize-control-options-remove');
		var select_sahdow = $('#customize-control-theme_layout_mode input').is(':checked');
		if( select_sahdow == true){
			$('#customize-control-select_body_background_type').show().removeClass('customize-control-options-remove');
			$('#customize-control-body_margin_top').show().removeClass('customize-control-options-remove');
		$('#customize-control-body_margin_bottom').show().removeClass('customize-control-options-remove');
		$('#customize-control-boxed_layout_position').show().removeClass('customize-control-options-remove');
		$('#customize-control-boxed_layout_shadow').show().removeClass('customize-control-options-remove');
			body_bg_settings();
		}
}).change();
function body_bg_settings(){
	$('#customize-control-select_body_background_type select').change(function(){
		$('#customize-control-background_image').hide().addClass('customize-control-options-remove');
		$('#customize-control-background_repeat').hide().addClass('customize-control-options-remove');
		$('#customize-control-background_position_x').hide().addClass('customize-control-options-remove');
		$('#customize-control-background_attachment').hide().addClass('customize-control-options-remove');
		$('#customize-control-body_background_color').hide().addClass('customize-control-options-remove');
	var header_bg_type = $('#customize-control-select_body_background_type select option:selected').val();
	switch( header_bg_type ){
		case 'bg_type_color':
			$('#customize-control-body_background_color').show().removeClass('customize-control-options-remove');
			$('body.custom-background').removeClass('custom-background');
			break;
		case 'bg_type_image':
			$('#customize-control-background_image').show().removeClass('customize-control-options-remove');
			$('#customize-control-background_repeat').show().removeClass('customize-control-options-remove');
			$('#customize-control-background_position_x').show().removeClass('customize-control-options-remove');
			$('#customize-control-background_attachment').show().removeClass('customize-control-options-remove');
			$('body').addClass('custom-background');
			break;
		case 'default':
			break;		
	}
	}).change();
}
});
})(jQuery);
(function($){
    var api = wp.customize;
    api.CustomizerImage = api.Control.extend({ 
        ready: function() {
            var control = this,
                customize_upload = this.container.find('.customize_img_upload');
			$(customize_upload).each(function(){
				$(this).find(".remove_media_image").bind("click", function(){
			 		var parent = $(this).parents('.customize_img_upload');
			 		var preview = $(parent).find('.customizer_media_image > img');
			 		control.setting.set('');
			 		$(preview).attr('src', '');
				});
				$(this).find('.upload_media_image').bind('click', function(e){
			 		var title = $(this).val();
			 		var parent = $(this).parents('.customize_img_upload');
			 		var preview = $(parent).find('.customizer_media_image > img');
					e.preventDefault();
			        custom_uploader = wp.media.frames.file_frame = wp.media({
			            title: 'Upload Customizer Media Library Image',
			            button: {
			                text: 'Upload Customizer Image'
			            },
			            multiple: false
			        });
			        custom_uploader.on('select', function() {
			            attachment = custom_uploader.state().get('selection').first().toJSON();
			            control.setting.set(attachment.url);
			            $(preview).attr('src', attachment.sizes.full.url);
			        });
			        custom_uploader.open();	
				});
			});			
        }
    });

    api.controlConstructor['customize_upload'] = api.CustomizerImage;   
})(jQuery);