(function( $ ) {
    "use strict";
    var $window_width = $(window).width();
    var $container_width = Math.ceil( (( ($(window).width() - 0)  - parseInt($('.container').css('width'))) / 2) );
    var single_page = $('.one_page_menu').length;
    if( single_page ){
		$('.nav_wrap a').on('click',function (e) {
		e.preventDefault();
		if( $('#header_wrapper').parent('.top_header').length ){
		var $sticky_menu = 56;
		}else{
		var $sticky_menu = 0;
		};
		var target = $(this).attr('href'); 
		var hash = $(this).prop("hash");
		if((hash !== "" && $(this).attr('href').split('#')[0] === "") || (hash !== "" && $(this).attr('href').split('#')[0] !== "" && hash === window.location.hash) || ($(this).attr('href').split('#')[0] == window.location.href.split('#')[0])){					
		var $target = $(hash);
		$('html, body').stop().animate({
		scrollTop: $target.offset().top - $sticky_menu
		}, 1000, 'swing', function () {
		});
		}
		else{
		window.location.href = target;
		}
		if(history.pushState) {
		history.pushState('', '', target);
		}
		return false;
		});
	}	
/* ----------------------------------
	Tolltip Client Images
-----------------------------------*/   
	$(".image_tooltip").css("opacity","0");
	$('.client_slider_wrapper').each(function(){
		$(".clients_image_wrapper").hover(function() {
			$(".image_tooltip", this).stop(true, true).css('display','block').animate({"opacity": 1}, 200);
		}, function() {
			$(".image_tooltip", this).stop(true, true).css('display','none').animate({"opacity": 0}, 200);
		});
	})
/* ----------------------------------
	Flipping Boxes
-----------------------------------*/ 
function flipping_boxes(){
	$('.flipping_box_wrapper').each(function(){
		var flip_box_animation = $(this).find('.flip_content').data('flip-animation');
		var flip_box_height = $(this).height();
		var flip_front_height = $(this).find('.flip_container .front').height();
		var flip_top_height = Math.floor((flip_box_height-flip_front_height)/2);
		$(this).find('.flip_container .front').css('top',flip_top_height);
		$(this).hover(function(){
			if( flip_box_animation == 'on' ){
				$(this).find('.flip_container').addClass('flip_box' );
			}
		},function(){
			if( flip_box_animation == 'on' ){
				$(this).find('.flip_container').removeClass('flip_box');
			}
		});
	});

}   
 $('.hover12').hover(function(){
            $(this).addClass('flip');
        },function(){
            $(this).removeClass('flip');
        }); 	
/* ----------------------------------
	Skill set
-----------------------------------*/
	    $('.skillbar').each(function(){
		    var width = $(this).find('.skillbar-bar').data('percent');
		   //alert(width);
		    $(this).find('.skillbar-bar').css({ width: width });
		    $(this).find('.skillbar_width, .skill-bar-percent').css({ left: width });
		    //var width=$(this).find('.skillbar-bar').data('percent');
		    //$(this).find('.skillbar-bar').animate({ width: width }, 1500);
		    //$(this).find('.skillbar_width, .skill-bar-percent').animate({ left: width }, 1500);
		});

/* ----------------------------------
Info Boxes
-----------------------------------*/
	$( ".info_box .delete" ).click(function() {
	    $(this).parent('.info_box').parent().animate({ opacity: 'hide' }, "slow");
	});
	$(".toggle_content").hide();
	     $("strong.trigger").click(function(){
	     $(this).toggleClass("active").next().slideToggle("slow");
	     if( $(this).parent().find('strong.active').length ){
	     	$(this).find('.arrow_buttons').addClass('fa-angle-down').removeClass('fa-angle-left');
	     }else{
	     	$(this).find('.arrow_buttons').removeClass('fa-angle-down').addClass('fa-angle-left');	
	     }
  
	});
/* ----------------------------------
Promo Box
-----------------------------------*/
  function fluid_script(){
   var $content_width= $('#fluid_layout .widget_kaya-promobox, #fluid_layout .promobox-video > div').width($(window).width());
		var $container_fluid = Math.ceil( (($(window).width()  - parseInt($('.container').css('width'))) / 2) );
		$(' #fluid_layout .widget_kaya-promobox').css({
		   'margin-left' : -$container_fluid,
		   //width : $content_width+'25',
		});
		var $promo_content_height = $('.promobox_content').height() / 2;
		$('.promobox_content').css({'margin-top': -$promo_content_height, 'top':'50%'});
		var $vals = $('#box_layout').css('width');
		$('#box_layout .widget_kaya-promobox, #box_layout .promobox-video > div').css({
		   'width' : $vals,
		});
		$('#box_layout .widget_kaya-promobox').css({
		   'margin-left' : -30,
		   		});
		//alert();
		$('.widget_kaya-promobox').css({
		   'position' : 'absolute',
		   'top' : 0,
		   'overflow' : 'hidden',
		   'height' : '100%',
		  });
        }
/* ----------------------------------
Custo title fullwiudth
-----------------------------------*/
function page_title_container_fluid(){
	$('.widget_kaya-title').each(function() {
		var $window_width = $(window).width()+5;
	    var $container_width = Math.ceil( (( ($(window).width() - 1)  - parseInt($('.container').css('width'))) / 2) );
		var $fluid_width = $(this).find('.custom_title').data('fluid_width');
		if( $fluid_width == 'on' ){
			$(this).find('.custom_title').width($window_width);
			$(this).parent().parent().addClass('fullwidth_title');
			$(this).find('.custom_title').css({ 'margin-left' : -$container_width  });
		}else{ }	
     });
}
$('.widget_kaya-title').each(function() {
    var $data_margin_bottom = $(this).find('.custom_title').data('margin');
    if ($data_margin_bottom == 'on') { 
        $(this).parent().parent().attr('style','margin-bottom:0!important;');
		$(this).find('.custom_title').addClass('remove_margin_bottom');
    }
});
/* ----------------------------------
Client Image Wrapper
-----------------------------------*/
$('.widget_kaya-client-images-boxes').each(function(){
	var i = $(this).find('.client_image_wrapper').data('columns');
	var dataclass = $(this).find('.client_image_wrapper').data('class');
	//$( ".client_image_wrapper li:gt("+i+")" ).css( "border-bottom", "0" );
	 $(this).find("."+dataclass+" li:lt("+i+")").addClass("remove_border");
		$(this).find('.'+dataclass+' li').hover(function() {
		   $(".image_tooltip", this).stop(true, true).css('display','block').animate({"opacity": 1}, 200);
		}, function() {
		$(".image_tooltip", this).stop(true, true).css('display','none').animate({"opacity": 0}, 100);
	});
});
$('.client_image_wrapper ul li').each(function(){
		var tooltip_width =  $(this).find('.image_tooltip').width();
		$(this).find('.image_tooltip').css('margin-left',-(Math.ceil(tooltip_width / 2)));
});
/* ----------------------------------
Counters
-----------------------------------*/
$.fn.countTo = function(options) {
// merge the default plugin settings with the custom options
options = $.extend({}, $.fn.countTo.defaults, options || {});
// how many times to update the value, and how much to increment the value on each update
var loops = Math.ceil(options.speed / options.refreshInterval),
    increment = (options.to - options.from) / loops;

return $(this).each(function() {
    var _this = this,
        loopCount = 0,
        value = options.from,
        interval = setInterval(updateTimer, options.refreshInterval);
    function updateTimer() {
        value += increment;
        loopCount++;
        $(_this).html(value.toFixed(options.decimals));

        if (typeof(options.onUpdate) == 'function') {
            options.onUpdate.call(_this, value);
        }
        if (loopCount >= loops) {
            clearInterval(interval);
            value = options.to;

            if (typeof(options.onComplete) == 'function') {
                options.onComplete.call(_this, value);
            }
        }
    }
});
};
function counters(){
	$('.counters .counter').each(function(){
		var $counter_start = $(this).data('start');
		var $counter_end = $(this).data('end');
		$(this).countTo({
		    from: $counter_start,
		    to:  $counter_end,
		    speed:2200,
		    refreshInterval: 50,
		  });
	});
}
/* ----------------------------------
Portfolio Screen Fullwidth
-----------------------------------*/
function portfolio_fullwidth(){
	if(($('#right_header_section').hasClass('kaya_right_position'))){
		$('.portfolio_gallery_wrapper').each(function(){

			if ($(window).width() <= 1006) {
				//alert('aaaaa');
		    	var $left_container_width = ( ($(window).width() + 5));
				var $container_width = Math.ceil( (( ($(window).width() - 2)  - parseInt($('.container').css('width'))) / 2) );
			}else{
				//alert('bbbb');
				var $left_container_width = ( ($(window).width() + 5)  - 260);
		    	var $container_width = Math.ceil( (( ($(window).width() - 2)  - parseInt($('.container').css('width'))) / 2) - 130);
				
			}
			//alert($('.container').css('width'));
			//console.log($('.container').css('width'));
			//var $left_container_width = ( ($(window).width() + 5)  - 260);
			//var $container_width = Math.ceil( (( ($(window).width() - 2)  - parseInt($('.container').css('width'))) / 2) - 130);
			var $fullwidth_data = $(this).data('pffluid');
			if( $fullwidth_data =='on' ){
				$(this).width($left_container_width);
				$(this).css('margin-left',-$container_width);
			}
		});
	}
	else if( (!$('#left_header_section').hasClass('kaya_left_position')) ){
		$('#fluid_layout .portfolio_gallery_wrapper').each(function(){
			
			var find_container = $(this).parent().parent().parent('.panel-row-style').length;

			//alert(find_container);
			if( find_container ){
				var $window_width = $(window).width()+2;
				var $container_width = Math.ceil( (( ($(window).width() ) + 0 - parseInt($('.container').css('width'))) / 2) );
			}else{
				var $window_width = $(window).width()+5;
				var $container_width = Math.ceil( (( ($(window).width() ) + 10  - parseInt($('.container').css('width'))) / 2) );
			}
		    
			var $fullwidth_data = $(this).data('pffluid');
			if( $fullwidth_data =='on' ){
				$(this).width($window_width);
				$(this).css('margin-left',-$container_width);
			}
		});
		$('#box_layout .portfolio_gallery_wrapper').each(function(){
		    var $box_container_width = parseInt( $('#box_layout').css('width') );
			var $fullwidth_data = $(this).data('pffluid');
			if( $fullwidth_data =='on' ){
				$(this).width($box_container_width);
				$(this).css('margin-left',-30);
			}
		});
	}else{
		$('.portfolio_gallery_wrapper').each(function(){
			if ($(window).width() <= 1006) {
				//alert('aaaaa');
		    	var $left_container_width = ( ($(window).width() + 5));
				var $container_width = Math.ceil( (( ($(window).width() - 2)  - parseInt($('.container').css('width'))) / 2) );
			}else{
				//alert('bbbb');
				var $left_container_width = ( ($(window).width() + 5)  - 260);
		    	var $container_width = Math.ceil( (( ($(window).width() - 2)  - parseInt($('.container').css('width'))) / 2) - 130);
				
			}
			var $fullwidth_data = $(this).data('pffluid');
			if( $fullwidth_data =='on' ){
					$(this).width($left_container_width);
				$(this).css('margin-left',-$container_width);
			}
		});	
	}

}
// Gray scale Images
$('.Portfolio_gallery').each(function(){
	var gray_scale = $(this).data('grayscale');
	if( gray_scale =='on' ){
		$(this).find('.pf_image_wrapper').addClass('gray_scale_img');
		$(this).find('ul.grid li').hover(function(){
			$(".pf_image_wrapper", this).removeClass('gray_scale_img');
			//alert('enter');
		},function(){
			$(".pf_image_wrapper", this).addClass('gray_scale_img');
		});
	}
	var image_hover_opacity = $(this).find('.pf_image_wrapper').data('opacity');
	if( image_hover_opacity =='off' ){
		$(this).find('ul.grid li .pf_image_wrapper').hover(function(){
			$("img", this).css('opacity','0.3');
			//alert('enter');
		},function(){
			$("img", this).css('opacity','1');
		});
	}	
		
});
/*----------------------------------
Draggable Slider
---------------------------------*/
function draggableslider(){
$('#kaya_portfolio_widget_slider').each(function(){
	var $window_width = $(window).width();
	    var $container_width = Math.ceil( (( ($(window).width() + 0)  - parseInt($('.container').css('width'))) / 2) );
	    var $box_container_width = parseInt( $('#box_layout').css('width') );
		var $fullwidth_data = $(this).data('fullwidth');
		var box_layout_check = $(this).parents("#box_layout").length;
		var $left_container_width = parseInt( $('.container').css('width') )+60;
		var $left_slider_width = ( ($(window).width() + 5)  - 260);
		if( $fullwidth_data =='on' ){
			if( box_layout_check ){
				$(this).parent('.Portfolio_gallery').width($box_container_width);
				$(this).parent('.Portfolio_gallery').css('margin-left',-46);
			}
			else if(($('#left_header_section').hasClass('kaya_left_position')) || ($('#right_header_section').hasClass('kaya_right_position'))){
				var $left_container_width = ( ($(window).width() + 5)  - 260);
				var $left_container_margin = Math.ceil( (( ($(window).width() - 2)  - parseInt($('.container').css('width'))) / 2) - 130);
				$(this).parent('.Portfolio_gallery').width($left_slider_width);
				$(this).parent('.Portfolio_gallery').css('margin-left',-$left_container_margin);
			}else{
				$(this).parent('.Portfolio_gallery').width($window_width);
				$(this).parent('.Portfolio_gallery').css('margin-left',-$container_width);
			}
			
		}  
	var gray_scale = $(this).data('grayscale');
	if( gray_scale =='on' ){
		$(this).find('.pf_image_wrapper').addClass('gray_scale_img');
		$(this).find('.owl-item').hover(function(){
			$(".pf_image_wrapper", this).removeClass('gray_scale_img');
			//alert('enter');
		},function(){
			$(".pf_image_wrapper", this).addClass('gray_scale_img');
		});
	}
	var pf_img_opacity_over = $(this).find('.pf_image_wrapper').data('opacity');

		if( pf_img_opacity_over !='on' ){
			$(this).find('.pf_image_wrapper').hover(function(){
				$("img", this).css('opacity','0.3');
				//alert('enter');
			},function(){
				$("img", this).css('opacity','1');
			});
		}	
});
}
function draggable_owl_slider(){
$('#kaya_portfolio_widget_slider').each(function(){
	var auto_play = $(this).data('autoplay');
	var items = $(this).data('items');
	var margin = $(this).data('margin');
	var responsive2_column = ( ( items == '4' ) || ( items == '3' ) ) ? '2' :items;
   $(this).owlCarousel({
		navigation : false,
		autoplay : auto_play,
		autoplayHoverPause : true,
		items :items,
		margin:margin,
		responsive: {
				0:{
		        items:1,
		        },
		        480:{
		            items:1,
		        },
		        768:{
		            items:responsive2_column,
		            loop : false,
		        },
		        1024:{
		            items:items,
		            loop : true,
		        },
			},
   });	
});
}

/*----------------------------------
Icon Box 
---------------------------------*/
function iconbox_widget(){
	$('.widget_iconbox-widget').each(function(){
		var iconbox_rotate = $(this).find('.iconbox').data('rotate');
		var hover_rotate = Math.ceil(360-iconbox_rotate);
		var iconbox_icon_rotate_hover =$(this).find('.iconbox').data('rotate-hover');
		//alert(hover_rotate);
		$(this).find('.iconbox_bg').css({
			transform: 'rotate('+iconbox_rotate+'deg)',
			MozTransform: 'rotate('+iconbox_rotate+'deg)',
			WebkitTransform: 'trotate('+iconbox_rotate+'deg)',
			msTransform: 'rotate('+iconbox_rotate+'deg)'
		});

		$(this).find('.iconbox_bg .iconbox_iconbg_conatiner > div, .iconbox_iconbg_conatiner img').css({
			transform: 'rotate(-'+iconbox_rotate+'deg)',
			MozTransform: 'rotate(-'+iconbox_rotate+'deg)',
			WebkitTransform: 'trotate(-'+iconbox_rotate+'deg)',
			msTransform: 'rotate(-'+iconbox_rotate+'deg)'
		});
			var iconbox_bg_color =$(this).find('.iconbox').data('bgcolor');
			var iconbox_color =$(this).find('.iconbox').data('icon');
			var iconbox_hoverbg =$(this).find('.iconbox').data('hoverbg');
			var iconbox_hovericon =$(this).find('.iconbox').data('hovericon');
			var iconbox_hovericon_color =  iconbox_hovericon ? iconbox_hovericon :iconbox_color;
			var iconbox_bg_hover_color =  iconbox_hoverbg ? iconbox_hoverbg :iconbox_bg_color;

			var iconboxs_border_hover_color = $(this).find('.iconbox').data('border-hover');
			var iconboxs_border_color = $(this).find('.iconbox').data('border-color');
			var iconbox_border_color = iconboxs_border_color ? '1px solid '+iconboxs_border_color:'';
			var iconbox_border_hover_color = iconboxs_border_hover_color ? '1px solid '+iconboxs_border_hover_color : iconbox_border_color;

	 $(this).mouseover(function(){
			$(this).find('.iconbox_bg').css({'border':iconbox_border_hover_color });
			$(this).find('.iconbox_bg .iconbox_iconbg_conatiner').css({'color':iconbox_hovericon_color, 'background-color':iconbox_bg_hover_color });
			if( iconbox_icon_rotate_hover == 'on' ){
				$(this).find('.iconbox_bg .iconbox_iconbg_conatiner > div, .iconbox_iconbg_conatiner img').css({
				transform: 'rotate('+hover_rotate+'deg)',
				MozTransform: 'rotate('+hover_rotate+'deg)',
				WebkitTransform: 'rotate('+hover_rotate+'deg)',
				msTransform: 'rotate('+hover_rotate+'deg)',
				});				
			}
		});
		$(this).mouseout(function(){
			$(this).find('.iconbox_bg').css({'border':iconbox_border_color});
			$(this).find('.iconbox_bg .iconbox_iconbg_conatiner').css({'background-color':iconbox_bg_color, 'color':iconbox_color});
			if( iconbox_icon_rotate_hover == 'on' ){
					$(this).find('.iconbox_bg .iconbox_iconbg_conatiner > div, .iconbox_iconbg_conatiner img').css({
					transform: 'rotate(-'+iconbox_rotate+'deg)',
					MozTransform: 'rotate(-'+iconbox_rotate+'deg)',
					WebkitTransform: 'rotate(-'+iconbox_rotate+'deg)',
					msTransform: 'rotate(-'+iconbox_rotate+'deg)'
				});
			}
		}); 

		/* $(this).hover(function(){
		$(this).find('.iconbox_bg').css({'color':iconbox_hovericon_color, 'background-color':iconbox_bg_hover_color, 'border':iconbox_border_hover_color });
			if( iconbox_icon_rotate_hover == 'on' ){
				$(this).find('.iconbox_bg > div').css({
				transform: 'rotate('+hover_rotate+'deg)',
				MozTransform: 'rotate('+hover_rotate+'deg)',
				WebkitTransform: 'rotate('+hover_rotate+'deg)',
				msTransform: 'rotate('+hover_rotate+'deg)',
				});				
			}
	},function(){
		$(this).find('.iconbox_bg').css({'background-color':iconbox_bg_color, 'color':iconbox_color, 'border':iconbox_border_color});
			if( iconbox_icon_rotate_hover == 'on' ){
					$(this).find('.iconbox_bg > div').css({
					transform: 'rotate(-'+iconbox_rotate+'deg)',
					MozTransform: 'rotate(-'+iconbox_rotate+'deg)',
					WebkitTransform: 'trotate(-'+iconbox_rotate+'deg)',
					msTransform: 'rotate(-'+iconbox_rotate+'deg)'
				});
			}
	});
*/

	});
}
/* ----------------------------------
Clinet Slider 
-----------------------------------*/
function clinet_images_slider(){
	$('.client_slider_wrapper').each(function(){
		var autoplay = $(this).find('.client_slider').data('autoplay');
		var columns = $(this).find('.client_slider').data('columns');
		var responsive2_column = ( ( columns == '4' ) || ( columns == '3' ) ) ? '2' :columns;
		$(this).find(".client_slider").owlCarousel({
		  navigation : false,
		  navigationText : false,
		  autoplay : autoplay,
		  autoplayHoverPause : true,
		  items : columns,
		  loop:true,
		  onInitialized: function() {
                $('.client_slider').show();
                $('.slider_bg_loading_img').hide();
            },  
		  responsive: {
				0:{
		        items:1,
		        },
		        480:{
		            items:1,
		        },
		        768:{
		            items:2,
		            loop : false,
		        },
		        1024:{
		            items:columns,
		            loop : true,
		        },
			},

		});
	})
}
$('.client_slider_wrapper .clients_image_wrapper').each(function(){
		var tooltip_width =  $(this).find('.image_tooltip').width();
		$(this).find('.image_tooltip').css('margin-left',-(Math.ceil(tooltip_width / 2)));
});
/*  ----------------------------------
Team Widget
-----------------------------------*/
//var jq = $.noConflict();
function team_slider_widget(){
	$('.team_wrapper_container').each(function(){
		var columns = $(this).data('columns');
		var slide_autoplay = $(this).data('autoplay');
		var responsive2_column = ( ( columns == '4' ) || ( columns == '3' ) ) ? '2' :columns;
		$(this).owlCarousel({
			navigation : true,
			loop : true,
			navigationText : false,
			autoplay : slide_autoplay,
			autoplayHoverPause : true,
			items : columns,
			margin : 20,
			responsive: {
				0:{
	            	items:1,
		        },
		        480:{
		            items:1,
		        },
		        768:{
		            items:responsive2_column,
		            loop :false
		        },
		        1024:{
		            items:columns,
		        },
			} 
		});	
	});
}
// Background hover
$('.team_wrapper_container').each(function(){
	var icon_bg_color = $(this).find('.team_social_icons').data('bg-color');
	var icon_bg_hover_color = $(this).find('.team_social_icons').data('bghover-color');
	var icon_color = $(this).find('.team_social_icons').data('color');
	var icon_hover_color = $(this).find('.team_social_icons').data('hover-color');
	var icon_bg_hover_color_false = icon_bg_hover_color ? icon_bg_hover_color : icon_bg_color;
	var icon_hover_color_false = icon_hover_color ? icon_hover_color : icon_color
	$(this).find('.team_social_icons a i').hover(function(){
		$(this).css({'background-color':icon_bg_hover_color_false, 'color':icon_hover_color_false });
	},function(){
		$(this).css({'background-color':icon_bg_color, 'color':icon_color })
	});

});
/* -----------------------------------
Testimonial Slider 
------------------------------------ */
function testimonial_slider_widget(){
	$('.widget_kaya-testimonials_slider').each(function(){
		var autoplay = $(this).find('.testimonial_wrapper').data('autoplay');
		var columns = $(this).find('.testimonial_wrapper').data('columns');
		var responsive2_column = ( (columns == '4') || (columns == '3') ) ? '2' :columns;
		$(this).find(".testimonial_wrapper").owlCarousel({
			items       : columns,
			margin 		: 10, 
			autoplay 	: autoplay,
			autoplayHoverPause : true,
			pagination  : true,
			autoHeight  : false,
			loop:true,
			onInitialized: function() {
                $('.testimonial_wrapper').show();
                $('.slider_bg_loading_img').hide();
            }, 
		 	responsive: {
				0:{
		        items:1,
		        },
		        480:{
		            items:1,
		        },
		        768:{
		            items:responsive2_column,
		            loop : false,
		        },
		        1024:{
		            items:columns,
		            loop : true,
		        },
			},   
			});
	});
}
/* -----------------------------------
Callout Box Slider 
------------------------------------ */
$('.widget_kaya-calloutbox-widget').each(function(){
	var margin_bottom_remove = $(this).find('.callout_box_wrapper').data('bottom');
	if( margin_bottom_remove == 'on' ){
		$(this).parent().parent().attr('style','margin-bottom:0!important;');
	}
	var button_hover_bg = $(this).find('.callout_button').data('hoverbg');
	var button_hover_text = $(this).find('.callout_button').data('hovertext');
	var button1_hover_bg = $(this).find('.callout_button_1').data('hoverbg');
	var button1_hover_text = $(this).find('.callout_button_1').data('hovertext');
	var button2_hover_bg = $(this).find('.callout_button_2').data('hoverbg');
	var button2_hover_text = $(this).find('.callout_button_2').data('hovertext');
	var bg_color =  $(this).find('.callout_button').css("background-color");
	var text_color =  $(this).find('.callout_button').css("color");
	var bg1_color =  $(this).find('.callout_button_1').css("background-color");
	var text1_color =  $(this).find('.callout_button_1').css("color");
	var bg2_color =  $(this).find('.callout_button_2').css("background-color");
	var text2_color =  $(this).find('.callout_button_2').css("color");
	var bg_color2 =  $(this).find('.callout_button').css("background-color");
	var text_color2 =  $(this).find('.callout_button').css("color");
	var padding_top =  parseInt($(this).find('.callout_box_style_1').css("padding-top"));
	var padding_bottom =  parseInt($(this).find('.callout_box_style_1').css("padding-top"));

	$(this).find('.callout_box_wrapper .callout_button').hover(function(){
		$(this).css({'background-color':button_hover_bg, 'color':button_hover_text});
	},function(){
		$(this).css({'background-color':bg_color, 'color':text_color})
	});
	$(this).find('.callout_box_wrapper .callout_button_1').hover(function(){
		$(this).css({'background-color':button1_hover_bg, 'color':button1_hover_text});
	},function(){
		$(this).css({'background-color':bg1_color, 'color':text1_color})
	});
	$(this).find('.callout_box_wrapper .callout_button_2').hover(function(){
		$(this).css({'background-color':button2_hover_bg, 'color':button2_hover_text});
	},function(){
		$(this).css({'background-color':bg2_color, 'color':text2_color})
	});
	var height = $(this).find('.callout_box_style_1 .callout_box_content').height()/3.6;
	$(this).find('.callout_box_content').css('margin-top',height);
});
/* -----------------------------------
Blog Gallery Slider
--------------------------------------*/
$('.format-gallery').each(function(){
	$(this).find('.gllery_slider').owlCarousel({
		nav:false,
	    loop : true,
	    navText: [ '', '' ],
	    autoplay : true,
	    autoplayHoverPause : true,
	    items :1,
		autoHeight : true,
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
	});
	$(this).find('.bx-wrapper .bx-controls-direction').fadeOut();
	$(this).hover(function(){
		$('.bx-wrapper .bx-controls-direction').stop(true,true).fadeIn();
	},function(){
		$('.bx-wrapper .bx-controls-direction').stop(true,true).fadeOut();
	}); 
});
 $('.single .single_body .single_img').hover(function(){
	$('.bx-wrapper .bx-controls-direction').stop(true,true).fadeIn();
},function(){
	$('.bx-wrapper .bx-controls-direction').stop(true,true).fadeOut();
});
 /*----------------------------------
Circular Chart
-----------------------------------*/
 function circular_skill_set(){
		$('.chart_percentage').each(function(){
			var $data_tack_color = $(this).data('trackcolor');
			var $data_bar_color = $(this).data('barcolor');
			var $trackColor = $data_tack_color ? $data_tack_color :'#eeeeee';
			var $barColor = $data_bar_color ? $data_bar_color :'#F85204';
			$(this).easyPieChart({
		      barColor:$barColor,
		      trackColor:$trackColor ,
		      scaleColor: false,
			  lineCap: '',
		      lineWidth: 14,
		      animate: 1000,
		      size: 160    
		    });
		}) 
	}
/*----------------------------------
Button  Widget 
-----------------------------------*/
$('.button_wrapper_section').each(function () {
	var button_bg_color = $(this).find('a').css('background-color');
	var button_border_color = $(this).find('a').css('border-left-color');
	var button_link_color = $(this).find('a').css('color');
	var button_link_icon_color = $(this).find('a i').css('color');
	var button_bg_hover_color = $(this).find('a').data('hover-bg-color') ? $(this).find('a').data('hover-bg-color') : button_bg_color;
	var button_border_hover_color = $(this).find('a').data('hover-border-color') ? $(this).find('a').data('hover-border-color') : button_border_color ;
	var button_link_hover_color = $(this).find('a').data('hover-link-color') ? $(this).find('a').data('hover-link-color') : button_link_color;
	$(this).find('.widget_button').hover(function(){
		$(this).css({ 'background':button_bg_hover_color, 'border-top-color':button_border_hover_color, 'border-left-color':button_border_hover_color, 'border-right-color':button_border_hover_color, 'border-bottom-color':button_border_hover_color, 'color':button_link_hover_color });
		$(this).find('i').css({ 'color':button_link_hover_color });
	},function(){
		$(this).css({ 'background':button_bg_color, 'border-left-color':button_border_color, 'border-right-color':button_border_color,  'border-top-color':button_border_color, 'border-bottom-color':button_border_color, 'color':button_link_color });
		$(this).find('i').css({ 'color':button_link_icon_color });
	});
});	
/* ----------------------------------
Gallery Widget
------------------------------------*/
$('.gallery_image_wrapper').each(function(){
	var grayscale = $(this).data('grayscale');
	if( grayscale == 'on' ){
		$(this).find('ul li, .image_gallery_slider').addClass('gray_scale_img');
		$(this).find('ul li, .image_gallery_slider').hover(function(){
			$(this).removeClass('gray_scale_img');
		},function(){
			$(this).addClass('gray_scale_img');
		});
	}
	$(this).find('ul li, .image_gallery_slider').hover(function(){
		$(this).find('.image_hover_bg_color').stop(true,true).fadeIn('slow');
		$(this).find('.mouse_over_on_image').stop(true,true).css('bottom', "0px");
	},function(){
		$(this).find('.image_hover_bg_color').stop(true,true).fadeOut('slow');
		$(this).find('.mouse_over_on_image').stop(true,true).css('bottom', "-100%");
	});	
	var bg_color =$(this).find('.image_hover_bg_color').css('background-color');
	if( bg_color != 'transparent'){
		$(this).find('ul li, .image_gallery_slider').hover(function(){
			$(this).find('img').css('opacity',1);
		},function(){
			$(this).find('img').css('opacity',1);
		});	
	}
});

function gallery_widget_slider(){
$('.gallery_image_wrapper').each(function(){
	var columns = $(this).data('columns');
	var autoplay = $(this).data('autoplay');
	var margin = $(this).data('margin');
	var colum = $(this).find('#gallery_widget_slider').data('colum');
	var buttons = $(this).find('#gallery_widget_slider').data('buttons');
	var animationin = $(this).find('#gallery_widget_slider').data('animationin');
	var animationout = $(this).find('#gallery_widget_slider').data('animationout');
	var responsive2_column = ( (columns == '4') || (columns == '3')) ? '2' :columns;
	var responsive1_column = (columns == '1') ? '1':responsive2_column;
   $(this).find('#gallery_widget_slider').owlCarousel({
	    nav:buttons,	   
	    navText: [ '', '' ],
	    autoplay : autoplay,
	    autoplayHoverPause : true,
		autoHeight : false,
		animateOut: animationout,
		animateIn: animationin,
		navigation:false,
		loop : true,
		margin:margin,
		onInitialized: function() {  
        $('.image_gallery_slider_wrapper').css('height','');     
        $('#gallery_widget_slider').css('visibility','visible');
        $('.gallery_image_wrapper .owl-carousel.owl-loaded').css('visibility', 'visible');   
        $('.slider_bg_loading_img').hide();
        }, 
		responsive: {
			0:{
            items:1,
	        },
	        480:{
	            items:1,
	        },
	        768:{
	            items:responsive1_column,
	            loop : false,
	        },
	        1024:{
                items:responsive2_column,
	            loop : false,
	        },
	        1100:{
	            items:columns,
	            loop : true,
	        },
		}, 
   });
});
}
/* Image Text Boxes */
$('.widget_kaya-image-text-boxes').each(function(){
	$(this).next(this).prev(this).css('margin-bottom','30px');
	var content_height = $(this).find('.overlay_content').height();
	$(this).find('.overlay_content.vertical_align_middle').css('margin-top',-(Math.ceil((content_height/2))+30));
});
/* ----------------------------------
Custom Title Color 
-------------------------------------*/
	$('.panel-row-style').each(function(){
		var padding = $(this).find('.widget_kaya-title').parent().parent('.panel-row-style').css('padding-top');
		var background_color = $(this).find('.widget_kaya-title').parent().parent('.panel-row-style').css('background-color');
		$(this).find('.title_container_border_top').css({'top': (-parseInt(padding)-43), 'border-bottom-color':background_color});
		$(this).find('.title_container_border_bottom').css({'bottom': (-parseInt(padding)-43), 'border-top-color':background_color});
	});
/* Portfolio tool tip */
$('.filter_portfolio').each(function(){
	$(this).find('.filter ul li').hover(function(){
		$(this).find('.pf_tool_tip').stop(true,true).show().animate({ "top": "-30px" }, 300);
	}, function(){
		$(this).find('.pf_tool_tip').stop(true,true).hide().animate({ "top": "0" }, 300);
	});
})
// Social ICon Color
$('.social_media_icons').each(function(){
	var icon_hover_bg = $(this).data('bg-hovercolor');
	var icon_hover_color = $(this).data('hovercolor');
	var icon_bg_color = $(this).data('bgcolor');
	var icon_color = $(this).data('color');
	var icon_hover_bg_colors = icon_hover_bg ? icon_hover_bg : icon_bg_color;
	var icon_hover_colors = icon_hover_color ? icon_hover_color : icon_color;
	$(this).find('ul li a').css({'background-color':icon_bg_color, 'color':icon_color});
	$(this).find('ul li a').hover(function(){
		$(this).css({'background-color':icon_hover_bg_colors, 'color':icon_hover_colors});
	},function(){
		$(this).css({'background-color':icon_bg_color, 'color':icon_color});
	});
	
});
// ie9 custom list box
var browserName=navigator.appName; 
if (browserName=="Microsoft Internet Explorer"){
	$('.custom_list_box').each(function(){
		var image_uri = $(this).find('ul li').css('background-image');
		if( image_uri ){
			$(this).find('ul li').css('padding','0 0 18px 28px');
		}
	});			
}
//Woocommerce Slider
function shop_product_slider(){
$('.shop_product_slider_wrapper').each(function(){
	var auto_play = $(this).data('auto-play');
	var disable_arrows = $(this).data('disable-arrow');
	var loop = $(this).data('loop');
	var items = $(this).data('items');
 	$(this).owlCarousel({
		nav:disable_arrows,	   
	    navText: [ '', '' ],
		autoplay : auto_play,
		autoplayHoverPause : true,
		items :items,
		margin:12,
		loop : loop,
		onInitialized: function() {
                $('.shop_product_slider_wrapper').show();
                 $('.slider_bg_loading_img').hide();
            },  
		responsive: {
				0:{
		        items:1,
		        },
		        480:{
		            items:1,
		        },
		        768:{
		            items:2,
		            loop : false,
		        },
		        1024:{
		            items:3,
		            loop : false,
		        },
		        1200:{
		            items:items
		        },
			},
	});	
	var arrow_bg_color = $(this).data('slider-arrow-bg-color');
	var arrow_color = $(this).data('slider-arrow-color');
	$(this).find('.owl-prev, .owl-next').css({'background':arrow_bg_color, 'color':arrow_color});
	});
}
$('.shop_product_slider_wrapper').each(function(){
	var price_color = $(this).find('.shop-product-details .price').css('color');
	var link_color = $(this).find('.shop-product-details h3 a').css('color');
	var title_hover_color =  $(this).find('.shop-product-details').data('hover-color');
	
	$(this).find('.shop-product-details .price span').attr('style','color:'+price_color+'!important');
	$(this).find('.shop-product-details h3 a').hover(function(){
		$(this).css({'color':title_hover_color});
	}, function(){
		$(this).css({'color':link_color});
	});
});
/* List Product hover style */
$('.shop_product_list_wrapper').each(function(){
	var link_hover_color = $(this).find('.shop-product-details').data('hover-color');
	var link_color = $(this).find('.shop-product-details h5 a').css('color');
	$(this).find('.woocommerce-Price-amount').css('color', $(this).find('.price').css('color'));
	$(this).find('.shop-product-details h5 a').hover(function(){
		$(this).css({'color':link_hover_color});
	}, function(){
		$(this).css({'color':link_color});
	});
})
//end
/* ----------------------------------
 All Jquery Functions
-----------------------------------*/
	portfolio_fullwidth();
	fluid_script();
	page_title_container_fluid();
	circular_skill_set();
	counters();
	draggableslider();
	iconbox_widget();
	flipping_boxes();
	gallery_widget_slider();
	$(window).load(function(){
      clinet_images_slider();
      testimonial_slider_widget();
      team_slider_widget();
      draggable_owl_slider();
      shop_product_slider();
      $('.gallery_image_wrapper').each(function(){
      	var radius = $(this).data('radius');
      	$(this).find('.owl-item').css('border-radius', radius+'px');
      });
	});
	
/* ----------------------------------
Window Resize
------------------------------------*/
 $(window).resize(function(){
 	 var $window_width = $(window).width();
	  fluid_script();
	  page_title_container_fluid();
	  portfolio_fullwidth();
	  draggableslider();
	 flipping_boxes()
	 //clinet_images_slider();
	 circular_skill_set();
	});
})(jQuery);