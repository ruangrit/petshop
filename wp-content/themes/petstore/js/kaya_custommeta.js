(function($) {
  "use strict";
	$(function() {

	$("#video_type").change(function () {
	$("#youtube_video").parent().parent().hide();
	$("#vimeo_video").parent().parent().hide();
	var selectlayout = $("#video_type option:selected").val(); 
	$("#video_embed").parent().parent().hide();
	switch(selectlayout)
	{
		case 'vimeo':
			$("#vimeo_video").parent().parent().show();
		break;
		case 'youtube':
			$("#youtube_video").parent().parent().show();
		break;
		case 'videoembed':
			$("#video_embed").parent().parent().show();
		break;
		
	}
}).change();
//
$('.rwmb-select').each(function(){
		 $(this).find('option:empty').remove();
	});
//Meta Page Optons

$(".select_page_options").change(function() {
	var select_options = $(".select_page_options option:selected").val();
	$(".select_page_title_option").hide();
	$(".kaya_custom_title").hide();
	$(".kaya_custom_title_description").hide();
	$(".title_bar_bg_image").hide();
	$(".page_title_img_position").hide();
	$('.page_title_img_repeat').hide();
	$('.title_bar_bg_pattern').hide();
	$('.bg_image_opcaity').hide();
	$('.page_title_bar_bg_color').hide();
	$(".page_title_color").hide();
	$(".page_description_color").hide();
	$(".page_title_font_size").hide();
	$(".page_description_font_size").hide();
	$(".paget_title_position").hide();
	$(".title_left_right_border").hide();
	$(".page_bread_crumb").hide();
	$(".bread_crumb_text_color").hide();
	$(".bread_crumb_link_color").hide();
	$(".page_title_bar_padding_t_b").hide();
	$(".enable_fullscreen_height").hide();
	$(".title_font_weight").hide();
	$(".title_font_style").hide();
	$(".description_font_weight").hide();
	$(".description_font_style").hide();
	$('.customizer_note').hide();
	// custom slider
	$(".customslider_type").hide();

	$(".slider").hide();
	$(".page_slider_images").hide();
	$(".slide_text_color").hide();
	$(".Kaya_slider_mode").hide();
	$(".kaya_slider_height").hide();
	$(".Kaya_slider_auto_play").hide();
	$(".slide_description_color").hide();
	$(".slide_button_color").hide();
	$(".Kaya_slider_transitions").hide();
	$(".Kaya_slider_transitions_time").hide();
	$(".slide_title_font_size").hide();
	$(".slide_title_font_weight").hide();
	$(".slide_title_font_style").hide();
	$(".slide_description_font_size").hide();
	$(".slide_description_font_weight").hide();
	$(".slide_description_font_style").hide();
	$(".slide_bg_image_opcaity").hide();
	$(".slide_bg_color").hide();
	$(".post_slide_images_order_by").hide();
	$(".post_slide_images_order").hide();
	$(".enable_slider_screen_height").hide();
	$("#select_page_title_customization").hide();
	$('.boxed_slider_padding_top').hide();
	$('.boxed_slider_padding_bottom').hide();
	$('.enable_slider_screen_height').hide();
	$('.boxed_slider_border_color').hide();
	$('.boxed_slider_border_size').hide();
	$('.boxed_slider_border_radius').hide();
	$('.slider_over_lap_menu').hide();
	$('.boxed_slider_bg_color').hide();

	// Video
	$(".video_bg_id").hide();
	$(".video_bg_webm").hide();
	$(".video_bg_mp4").hide();
	$(".video_bg_ogg").hide();
	$(".video_bg_description").hide();
	$(".video_bg_height").hide();
	$(".video_bg_color").hide();
	$(".bg_video_opcaity").hide();
	$(".enable_video_screen_height").hide();
	$(".select_video_bg_type").hide();


	// POst Slider
	$(".Kaya_post_slider_transitions").hide();
	$(".Kaya_post_slider_auto_play").hide();
	$(".post_slide_loop").hide();
	$(".Kaya_post_slider_transitions_time").hide();
	$(".post_slide_button_color").hide();
	$(".header_slider_video").hide();
	$(".post_slide_button_bg_color").hide();
	$(".post_slide_button_text_color").hide();
	$(".post_slides_button_hover_bg_color").hide();
	$(".post_slide_button_hover_text_color").hide();
	$(".post_slide_nav_button_bg_color").hide();
	$(".post_slide_button_disable").hide();
	$(".post_slide_nav_disable").hide();
	$(".kaya_post_category").hide();
	$(".slide_text_animate").hide();
	$('.enable_boxed_slider').hide();
	//$(".post_slide_img_opacity_bg_color").parent().parent().hide();
	//$(".post_slide_img_opacity").parent().parent().hide();
	$(".page_footer_container").hide();
	$(".page_middle_content").show();
	$(".page_footer_container").show();

	switch(select_options){
		case 'page_title_setion':
			$(".select_page_title_option").show();
			select_page_title_option();
			select_page_title_customize_options();
			$("#select_page_title_customization").show();
			break;
		case 'page_slider_setion' :
			$(".slider").show();
			//$(".page_slider_images").show();
			$(".slide_text_color").show();
			$(".Kaya_slider_mode").show();
			$(".slide_title_font_size").show();
			$(".slide_title_font_weight").show();
			$(".slide_title_font_style").show();
			$(".slide_description_font_size").show();
			$(".slide_description_font_weight").show();
			$(".slide_description_font_style").show();
			$(".slide_bg_image_opcaity").show();
			$(".slide_bg_color").show();
			$(".enable_slider_screen_height").show();
			$(".slide_text_animate").show();
			$(".enable_boxed_slider").show();
			page_slider_options();
			break;
		case 'video_bg':
			//$(".video_bg_id").parent().parent().show();
			$(".select_video_bg_type").show();
			$(".video_bg_description").show();
			$(".video_bg_height").show();
			//$(".bg_video_opcaity").show();
			//$(".video_bg_color").show();
			$(".page_middle_content").show();
			$(".page_footer_container").show();
			$(".enable_video_screen_height").show();
			bg_video_option();
			break;	
	}	

}).change();

// Meta BOxes
function page_slider_options(){

	$(".slider").change(function () {	
	var selectlayout = $(".slider option:selected").val(); 
	
	$(".customslider_type").hide();
	$(".page_slider_images").hide();
	$(".slide_text_color").hide();
	$(".Kaya_slider_mode").hide();
	$(".kaya_slider_height").hide();
	$(".Kaya_slider_auto_play").hide();
	$(".slide_description_color").hide();
	$(".slide_button_color").hide();
	$(".Kaya_slider_transitions").hide();
	$(".Kaya_slider_transitions_time").hide();
	$(".slide_title_font_size").hide();
	$(".slide_title_font_weight").hide();
	$(".slide_title_font_style").hide();
	$(".slide_description_font_size").hide();
	$(".slide_description_font_weight").hide();
	$(".slide_description_font_style").hide();
	$(".slide_bg_image_opcaity").hide();
	$(".slide_bg_color").hide();
	$(".page_middle_content").hide();
	$(".page_footer_container").hide();

	// POst Slider
	$(".Kaya_post_slider_transitions").hide();
	$(".Kaya_post_slider_auto_play").hide();
	$(".post_slide_loop").hide();
	$(".Kaya_post_slider_transitions_time").hide();
	$(".header_slider_video").hide();
	$(".post_slide_button_color").hide();
	$(".post_slide_button_bg_color").hide();
	$(".post_slide_button_text_color").hide();
	$(".post_slide_button_disable").hide();
	$(".post_slide_nav_disable").hide();	
	$(".kaya_post_category").hide();
	$(".slide_text_animate").hide();
	$(".post_slide_button_hover_text_color").hide();
	$(".enable_boxed_slider").hide();
	$(".post_slides_button_hover_bg_color").hide();
	$(".post_slide_images_order_by").hide();
	$(".post_slide_images_order").hide();
	$(".enable_slider_screen_height").hide();
	$('.boxed_slider_padding_top').hide();
	$('.boxed_slider_padding_bottom').hide();
	$('.enable_slider_screen_height').hide();
	$('.boxed_slider_border_color').hide();
	$('.boxed_slider_border_size').hide();
	$('.boxed_slider_border_radius').hide();
	$('.boxed_slider_bg_color').hide();
	//$(".post_slide_img_opacity_bg_color").parent().parent().hide();
	//$(".post_slide_img_opacity").parent().parent().hide();
	switch(selectlayout)
	{
	case 'customslider':
		$(".customslider_type").show();
		$(".header_slider_video").hide();
		$(".Kaya_post_slider_transitions").hide();
		$(".Kaya_post_slider_auto_play").hide();
		$(".post_slide_loop").hide();
		$(".Kaya_post_slider_transitions_time").hide();
		$(".post_slide_button_color").hide();
		$(".post_slide_button_bg_color").hide();
		$(".post_slide_button_text_color").hide();
		$(".post_slide_button_disable").hide();
		$(".post_slide_nav_disable").hide();	
		$(".kaya_post_category").hide();
		$(".slide_text_animate").hide();
		$(".post_slide_button_hover_text_color").hide();
		$(".enable_boxed_slider").hide();
		$(".post_slides_button_hover_bg_color").hide();
		$(".post_slide_images_order_by").hide();
		$(".post_slide_images_order").hide();
		$(".enable_slider_screen_height").hide();
		$('.boxed_slider_padding_top').hide();
		$('.boxed_slider_padding_bottom').hide();
		$('.enable_slider_screen_height').hide();
		$('.boxed_slider_border_color').hide();
		$('.boxed_slider_border_size').hide();
		$('.boxed_slider_border_radius').hide();
		$('.boxed_slider_bg_color').hide();
		break;
	case 'kaya_post_slider':
		$(".Kaya_post_slider_transitions").show();
		$(".Kaya_post_slider_auto_play").show();
		$(".post_slide_loop").show();
		$(".Kaya_post_slider_transitions_time").show();
		$(".header_slider_video").show();
		$(".post_slide_button_color").show();
		$(".post_slide_button_bg_color").show();
		$(".post_slide_button_text_color").show();
		$(".post_slide_button_disable").show();
		$(".post_slide_nav_disable").show();
		$(".page_middle_content").show();
		$(".page_footer_container").show();
		$(".kaya_post_category").show();
		$(".slide_text_animate").show();
		$(".post_slide_button_hover_text_color").show();
		$(".enable_boxed_slider").show();
		$(".post_slides_button_hover_bg_color").show();
		$(".post_slide_images_order_by").show();
		$(".post_slide_images_order").show();
		$(".kaya_slider_height").show();
		$(".enable_slider_screen_height").show();
		post_slide_animation_time();
		slider_nav_buttons();
		slider_buttons();
		slider_boxed_layout();
		break;		
	}
}).change();
}
function select_page_title_option(){
	$('#select_page_title_option').change(function(){
		$('#kaya_custom_title').parent().parent().hide();
		$('#kaya_custom_title_description').parent().parent().hide();
		var title_option = $('#select_page_title_option option:selected').val();
		switch( title_option ){
			case 'default_page_title':
				$('#kaya_custom_title').parent().parent().hide();
				$('#kaya_custom_title_description').parent().parent().hide();
				break;
			case 'custom_page_title':
				$('#kaya_custom_title').parent().parent().show();
				$('#kaya_custom_title_description').parent().parent().show();
				break;
			case 'default':
				break;		
		}
	}).change();
}
function select_page_title_customize_options(){
	$('#select_page_title_customization').change(function(){
		$(".title_bar_bg_image").parent().parent().hide();
		$(".page_title_img_position").parent().parent().hide();
		$('.page_title_img_repeat').parent().parent().hide();
		$('.title_bar_bg_pattern').parent().parent().hide();
		$('.bg_image_opcaity').parent().parent().hide();
		$('.page_title_bar_bg_color').parent().parent().hide();
		$(".page_title_color").parent().parent().hide();
		$(".page_description_color").parent().parent().hide();
		$(".page_title_font_size").parent().parent().hide();
		$(".page_description_font_size").parent().parent().hide();
		$(".paget_title_position").parent().parent().hide();
		$(".title_left_right_border").parent().parent().hide();
		$(".page_bread_crumb").parent().parent().hide();
		$(".bread_crumb_text_color").parent().parent().hide();
		$(".bread_crumb_link_color").parent().parent().hide();
		$(".page_title_bar_padding_t_b").parent().parent().hide();
		$(".enable_fullscreen_height").parent().parent().hide();
		$(".title_font_weight").parent().parent().hide();
		$(".title_font_style").parent().parent().hide();
		$(".description_font_weight").parent().parent().hide();
		$(".description_font_style").parent().parent().hide();
		$('.customizer_note').parent().parent().hide();
		var title_option = $('#select_page_title_customization option:selected').val();
		switch( title_option ){
			case 'custom_page_title_options':
				$(".title_bar_bg_image").parent().parent().show();
				$(".page_title_img_position").parent().parent().show();
				$('.page_title_img_repeat').parent().parent().show();
				$('.title_bar_bg_pattern').parent().parent().show();
				$('.bg_image_opcaity').parent().parent().show();
				$('.page_title_bar_bg_color').parent().parent().show();
				$(".page_title_color").parent().parent().show();
				$(".page_description_color").parent().parent().show();
				$(".page_title_font_size").parent().parent().show();
				$(".page_description_font_size").parent().parent().show();
				$(".paget_title_position").parent().parent().show();
				$(".title_left_right_border").parent().parent().show();
				$(".page_bread_crumb").parent().parent().show();
				$(".bread_crumb_text_color").parent().parent().show();
				$(".bread_crumb_link_color").parent().parent().show();
				$(".page_title_bar_padding_t_b").parent().parent().show();
				$(".title_font_weight").parent().parent().show();
				$(".title_font_style").parent().parent().show();
				$(".description_font_weight").parent().parent().show();
				$(".description_font_style").parent().parent().show();
				$(".enable_fullscreen_height").parent().parent().show();
				bread_crumb_fields();
				break;
			case 'customizer_page_title_options':
				$('.customizer_note').parent().parent().show();
				break;
			case 'default':
				break;		
		}
	}).change();
}
function slide_animation_time(){
	$('#Kaya_slider_auto_play').change(function(){
		var option_value = $("#Kaya_slider_auto_play option:selected").val();
		$(".Kaya_slider_transitions_time").parent().parent().show();
		switch(option_value){
			case '0':
				$(".Kaya_slider_transitions_time").parent().parent().hide();
				break;
			case 'default':
				break;		
		}

	}).change();
}
function post_slide_animation_time(){
	$('#Kaya_post_slider_auto_play').change(function(){
		var option_value = $("#Kaya_post_slider_auto_play option:selected").val();
		$(".Kaya_post_slider_transitions_time").parent().parent().show();
		switch(option_value){
			case '0':
				$(".Kaya_post_slider_transitions_time").parent().parent().hide();
				break;
			case 'default':
				break;		
		}

	}).change();
}
function bread_crumb_fields(){
	$("input[name$='page_bread_crumb']").on('change',function() {
		$(".bread_crumb_text_color").parent().parent().hide();
		$(".bread_crumb_link_color").parent().parent().hide();
		var checkedValue = $("input[name='page_bread_crumb']:checked").val();
	    if(checkedValue=="on"){
	        $(".bread_crumb_text_color").parent().parent().show();
			$(".bread_crumb_link_color").parent().parent().show();
	    }
	    if(checkedValue=="off"){
			$(".bread_crumb_text_color").parent().parent().hide();
			$(".bread_crumb_link_color").parent().parent().hide();

	    }
	}).change();
}
function bg_video_option(){
	$('#select_video_bg_type').change(function(){
		var option_value = $("#select_video_bg_type option:selected").val();
		$(".video_bg_id").hide();
		$(".video_bg_webm").hide();
		$(".video_bg_mp4").hide();
		$(".video_bg_ogg").hide();
		switch(option_value){
			case 'youtube_video':
				$(".video_bg_id").show();
				break;
			case 'video_webm':
				$(".video_bg_webm").show();
				$(".video_bg_mp4").show();
				$(".video_bg_ogg").show();
				break;	
			case 'default':
				break;		
		}

	}).change();
}
//Buttons
function slider_buttons(){
	$('#post_slide_button_disable').change(function(){
		$(".post_slide_button_bg_color").hide();
		$(".post_slide_button_text_color").hide();
		$(".post_slides_button_hover_bg_color").hide();
		$(".post_slide_button_hover_text_color").hide();
		var option_value = $("#post_slide_button_disable option:selected").val();
		switch(option_value){
			case 'true':
				$(".post_slide_button_bg_color").show();
				$(".post_slide_button_text_color").show();
				$(".post_slides_button_hover_bg_color").show();
				$(".post_slide_button_hover_text_color").show();
				break;		
		}

	}).change();
}
function slider_nav_buttons(){
	$('#post_slide_nav_disable').change(function(){
		$(".post_slide_nav_button_bg_color").hide();
		var option_value1 = $("#post_slide_nav_disable option:selected").val();
		switch(option_value1){
			case 'true':
				$(".post_slide_nav_button_bg_color").parent().parent().show();
				break;		
		}

	}).change();
}
// Boxed Layout
function slider_boxed_layout(){
	$('#enable_boxed_slider').change(function(){
			$('.boxed_slider_padding_top').hide();
			$('.boxed_slider_padding_bottom').hide();
			$('.enable_slider_screen_height').hide();
			$('.boxed_slider_border_color').hide();
			$('.boxed_slider_border_size').hide();
			$('.boxed_slider_border_radius').hide();
			$('.boxed_slider_bg_color').hide();
			//$('.boxed_slider_padding_top').parent().hide();
			var boxed_slider_on = $('#enable_boxed_slider').is(':checked');
			if( boxed_slider_on ){
				$('.boxed_slider_padding_top').show();
				$('.boxed_slider_padding_bottom').show();
				$('.enable_slider_screen_height').hide();
				$('.boxed_slider_border_color').show();
				$('.boxed_slider_border_size').show();
				$('.boxed_slider_border_radius').show();
				$('.boxed_slider_bg_color').show();

			}else{
				//$('#customize-control-upload_retina_logo').hide();
				$('.enable_slider_screen_height').show();
			}
	}).change();
}
// portfolio single page on change
$('select#list_images').change(function(){
	$('#gallery_with_space').parent().parent().hide();
	var list_images_val = $('#list_images option:selected').val();
	switch(list_images_val){
		case 'isotope_gallery':
			$('#gallery_with_space').parent().parent().show();
			break;
		case 'grid_gallery':
			$('#gallery_with_space').parent().parent().show();
			break;	
		default:
		 	break;	
	}	
}).change();

$('input#disable_slide_title').change(function(){
	$('.slide_text_color').parent().parent().hide();
	$('.slide_title_font_size').parent().parent().hide();
	$('.slide_title_font_weight').parent().parent().hide();
	$('.slide_title_font_style').parent().parent().hide();
	$('.slide_title_shadow').parent().parent().hide();
	$('.slide_title_letter_spacing').parent().parent().hide();
	var check_val = $('input#disable_slide_title').is(':checked');
	if( check_val == true ){
		$('.slide_text_color').parent().parent().hide();
		$('.slide_title_font_size').parent().parent().hide();
		$('.slide_title_font_weight').parent().parent().hide();
		$('.slide_title_font_style').parent().parent().hide();
		$('.slide_title_shadow').parent().parent().hide();
		$('.slide_title_letter_spacing').parent().parent().hide();
	}else{
		$('.slide_text_color').parent().parent().show();
		$('.slide_title_font_size').parent().parent().show();
		$('.slide_title_font_weight').parent().parent().show();
		$('.slide_title_font_style').parent().parent().show();	
		$('.slide_title_shadow').parent().parent().show();
		$('.slide_title_letter_spacing').parent().parent().show();
	}

}).change();
// Team Social Media Icon Change
$('#select_icon_type').change(function(){
	var icon_type = $('#select_icon_type option:selected').val();
	var i='1';
	for( i=1; i<=6; i++ ){
		$('.social_media_icon_'+i).parent().parent().hide();
		$('.social_awesome_icon_'+i).parent().parent().hide();
	}
	switch(icon_type){
		case 'awesome_icon':
			for( i=1; i<=6; i++ ){
				$('.social_awesome_icon_'+i).parent().parent().show();
			}
			break;
		case 'image_icon':
			for( i=1; i<=6; i++ ){
				$('.social_media_icon_'+i).parent().parent().show();
			}
			break;
		default:
		break;	
	}
}).change();
//page_slider_options();
    // Display only needed post meta boxes
    var Kaya_post_options = $('#post-formats-select input'),
        kaya_meta_link = $('#kaya_link_format'),
        kaya_pf_link = $('#post-format-link'),
        kaya_meta_gallery = $('#kaya_post_format_gallery'),
        kaya_pf_gallery = $('#post-format-gallery'),
        kaya_meta_video = $('#kaya_post_format_video'),
        kaya_pf_video = $('#post-format-video'),
        kaya_meta_audio = $('#kaya_audio_format'),
        kaya_pf_audio = $('#post-format-audio'),
        kaya_meta_quote = $('#kaya_quote_format_quote'),
        kaya_pf_quote = $('#post-format-quote');

    function kaya_hide_post_formates(){
        kaya_meta_link.css('display', 'none');
        kaya_meta_gallery.css('display', 'none');
        kaya_meta_video.css('display', 'none');
        kaya_meta_audio.css('display', 'none');
        kaya_meta_quote.css('display', 'none');
    }

    kaya_hide_post_formates();

    Kaya_post_options.on('change', function(){
        var that = $(this);
        kaya_hide_post_formates();
        if(that.val() === 'link'){
            kaya_meta_link.css('display', 'block');
        }else if(that.val() === 'gallery'){
            kaya_meta_gallery.css('display', 'block');
        }else if(that.val() === 'video'){
            kaya_meta_video.css('display', 'block');
        }else if(that.val() === 'audio'){
            kaya_meta_audio.css('display', 'block');
        }else if(that.val() === 'quote'){
            kaya_meta_quote.css('display', 'block');
        }
    });

    if(kaya_pf_link.is(':checked')) kaya_meta_link.css('display', 'block');
    if(kaya_pf_gallery.is(':checked')) kaya_meta_gallery.css('display', 'block');
    if(kaya_pf_video.is(':checked')) kaya_meta_video.css('display', 'block');
    if(kaya_pf_audio.is(':checked')) kaya_meta_audio.css('display', 'block');
    if(kaya_pf_quote.is(':checked')) kaya_meta_quote.css('display', 'block');
});
})(jQuery);