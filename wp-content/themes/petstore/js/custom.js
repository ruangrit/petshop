(function($) {

  "use strict";

  $(function() {

//$('.mid_container_wrapper_section').css('min-height',$(window).height());

//lightbox

$("[rel^='prettyPhoto']").prettyPhoto();

$("a[data-gal^='prettyPhoto']").prettyPhoto({hook: 'data-gal'});

$('.more-link').addClass("readmore");

$('#mid_container').animate({opacity:1},0);

$('#main_slider').animate({opacity:1},0);

$('.Portfolio_gallery, .gallery, #main_content_inner_section, .right_nav_wrap, .left_nav_wrap, #slides').animate({opacity:1},0);

$('.panel-row-style-parent:last-child').parent().parent().parent().parent().parent('#mid_container').css('padding-bottom','0').addClass('panel-row-style-last');

$('.panel-row-style-parent:first-child').parent().parent().parent().parent().parent('#mid_container').css('padding-top','0').addClass('panel-row-style-first');

$(".widget_kaya-title").next('.panel.widget').prev('.widget_kaya-title').css('margin-bottom','30px');

$(".custom_title").parent('.widget_kaya-title.panel-first-child.panel-last-child').parent().parent('.no-panel-row-style').addClass('title_margin_bottom');

$('.widget_kaya-slider').animate({opacity:1},5000);


function checkWidth() {

    if ($(window).width() <= 1006) {

      $('#myslidemenu, #jqueryslidemenu').removeClass('menu');

      $('#myslidemenu, #left_header_section .left_menu, #right_header_section .right_menu').addClass('mobile_menu');

      $('#left_header_section .mobile_menu, #right_header_section, .mobile_menu').removeClass('left_menu right_menu');

      $('.header_menu_left_position, .header_menu_right_position, .header_menu_section').removeClass('toggle_menu');

      $('.header_menu_left_position, .header_menu_right_position, .header_menu_section').addClass('mobile_menu_nav');

      $('.mobile_menu').removeClass('menu');

      $('.with_out_header').hide();

      $('#header_container').addClass('mobile_header_section');

      $('.left_nav_wrap').removeClass('left_menu_toggle');

      $('.right_nav_wrap').removeClass('right_menu_toggle');

      $('.megamenu_wrapper, .left_nav_wrap .megamenu_wrapper, .right_nav_wrap .megamenu_wrapper').removeClass('menu_content_wrapper');

      $('.nav_wrap .megamenu_wrapper ul li ul, .left_nav_wrap .megamenu_wrapper ul li ul, .right_nav_wrap .megamenu_wrapper ul li ul').removeClass('sub_level_menu');

    // Mega Menu

      $('li.wide_menu').hover(function(){

        $('.megamenu_wrapper').removeClass('maga_menu_hover');

      }, function(){

        $('.megamenu_wrapper').removeClass('maga_menu_hover'); 

      });

      var wide_menu = '';

      var container_width = '';

      $('.wide_menu .megamenu_wrapper').css('left', '0');

    } else {

      $('.mobile_menu').addClass('menu');

      $('#left_header_section .mobile_menu').addClass('left_menu');

      $('#right_header_section .mobile_menu').addClass('right_menu');

      $('.left_menu, .right_menu').removeClass('mobile_menu');

      $('#myslidemenu').removeClass('mobile_menu');

      $('#myslidemenu, #jqueryslidemenu').addClass('menu');

      $('.header_menu_left_position, .header_menu_right_position,  .header_menu_section').addClass('toggle_menu');

      $('.with_out_header').show();

      $('.left_nav_wrap').addClass('left_menu_toggle');

      $('.right_nav_wrap').addClass('right_menu_toggle');

      $('#header_container').removeClass('mobile_header_section');

      $('.megamenu_wrapper, .left_nav_wrap .megamenu_wrapper , .right_nav_wrap .megamenu_wrapper').addClass('menu_content_wrapper');

      $('.nav_wrap .megamenu_wrapper ul li ul, .left_nav_wrap .megamenu_wrapper ul li ul, .right_nav_wrap .megamenu_wrapper ul li ul').addClass('sub_level_menu');

      $('.header_menu_section, .header_right_menu.menu, .header_left_menu.menu').each(function(){

        $(this).find('li.wide_menu').hover(function(){

           $(this).find('.megamenu_wrapper').addClass('maga_menu_hover');

        }, function(){

           $(this).find('.megamenu_wrapper').removeClass('maga_menu_hover'); 

        });

      });

      var wide_menu = $('.nav_wrap').width();

      var container_width = parseInt($('.container').css('width'));

      var box_layout_check = $('.nav_wrap').parents("#box_layout").length;

        if( $('.header_menu_section').hasClass('header_menu_right') ){

          if( box_layout_check ){

            var container_width = parseInt( $('#box_layout').css('width') );

            var menu_container_left = Math.ceil( ( -( container_width - wide_menu  ) ) + 30 );

            var mega_menu_width = Math.ceil(container_width - 30);

          }else{

            var container_width = parseInt($('.container').css('width'));

            var menu_container_left = Math.ceil( ( -( container_width - wide_menu  ) ) - 30 );

            var mega_menu_width = Math.ceil(container_width);

          }

        $('.wide_menu .megamenu_wrapper').css('left', menu_container_left);

      }else  if( $('.header_menu_section').hasClass('fullwidth') ){

        if( box_layout_check ){

            $('.wide_menu .megamenu_wrapper').css('left', 0);

          }else{

            $('.wide_menu .megamenu_wrapper').css('left', 0);

          }

      }

      else{

          if( box_layout_check ){

            var menu_container_left = '-30px';

          }else{

            var menu_container_left = '0px';

          }

       $('.wide_menu .megamenu_wrapper').css('left', menu_container_left);

      }

      if( box_layout_check ){

            var container_width1 = ( parseInt($('#box_layout').css('width')) - 30);

          }else{

            var container_width1 = parseInt($('.container').css('width'));

          }

      $('.wide_menu .megamenu_wrapper > ul').css('width', container_width1);

    }

}

checkWidth();

$(window).resize(checkWidth);

 $('.mobile_toggle_menu i').click(function(e){    

      $('.mobile_menu_nav').slideToggle(300);

  });

 $('.mobile_toggle_menu i').click(function(e){    

      $('.left_nav_wrap').slideToggle(300);

      $('.right_nav_wrap').slideToggle(300);

  });

 $('.megamenu_wrapper ul > li ').each(function(){

    $(this).delegate('strong, .mobile_drop_down_icons','click',function(e){  

      $(this).closest('.menu-item-has-children').find('ul').slideToggle(300, function(){

        if (!$(this).is(":visible")){

          $(this).prev('.mobile_drop_down_icons').find('.fa-angle-right').show();

          $(this).prev('.mobile_drop_down_icons').find('.fa-angle-down').hide();

        }else{

          $(this).prev('.mobile_drop_down_icons').find('.fa-angle-right').hide();

          $(this).prev('.mobile_drop_down_icons').find('.fa-angle-down').show();

        }

      });

});

      });

 $('.nav_wrap, .left_nav_wrap, .right_nav_wrap').each(function(){

  $(this).find('.narrow .megamenu_wrapper').hide();

  var menu_link = $(this).find('.menu-item-has-children a').attr('href');

  //alert(menu_link);

    $(this).delegate('.mobile_drop_down_icons, .menu-item-has-children a[href*=#], .menu-item-has-children strong','click',function(e){ 

    //alert($(this).closest('.menu-item-has-children').length); 

      $(this).closest('.menu-item-has-children').find('.megamenu_wrapper').slideToggle(300, function(){

        if (!$(this).is(":visible")){

          $(this).prev('.mobile_drop_down_icons').find('.fa-angle-right').show();

          $(this).prev('.mobile_drop_down_icons').find('.fa-angle-down').hide();

        }else{

          $(this).prev('.mobile_drop_down_icons').find('.fa-angle-right').hide();

          $(this).prev('.mobile_drop_down_icons').find('.fa-angle-down').show();

        }

      });

  });

 });

  $('.item_thumb_gallery, .meta_info, .gallery-item, .isotope_gallery li').hover(

  //Gallery

  function() {

  $(this).find('img').stop().animate({opacity:0.7},1200);

  $(this).find('.image, .meta_info .post_link').css({"left":"0px"}).stop().animate({"left":"50%",opacity:1},600); 



  },function() {

  $(this).find('.image, .post_link').stop().animate({opacity:0},400);

  $(this).find('img').stop().animate({opacity:1},1200);

  });

  // $ slide menu 

  $('.menu ul:first > li').addClass("main-links");

  $(".menu ul li.main-links:last-child").css("border-right","none");

// Owl Carousal Main Slider.

function owl_main_slider(){

  var slider_width = $(window).width();

  var slider_height = $(window).height();

  var top_header_height = $('.header_top_section').height();

  if( top_header_height != '0' ){

    var top_header_padding_top = $('.header_top_section').css('padding-top');

    var top_header_padding_bottom = $('.header_top_section').css('padding-bottom');

  }else{

    var top_header_padding_top = '0';

    var top_header_padding_bottom = '0';

  }

  var header_wrapper_color = $('#header_container').css('background-color');

  var title_opacity = $('.slides_description');

  var slides_description_height = $('.slides_description').height();

  $(window).on('scroll', function() {

    var title_op_top = $(this).scrollTop();
    if( title_op_top > 100  ){
      $('.slides_description').removeClass('fadeInLeft');
    }

    title_opacity.css({ 'opacity' : (1 - title_op_top/550)});

  }); 

  //alert(top_header_height);

  $('#main_slider').each(function(){

    var fullscreen_on = $(this).find('#main_slider_slides .slides-container').data('screen-height');

     var boxed_slider = $(this).find('#main_slider_slides .slides-container').data('boxed');

    if( boxed_slider != 'on' ){

        if( fullscreen_on == '1' ){

            $(this).find('#main_slider_slides, .slides-container').css({'width':slider_width, 'height':(slider_height-( top_header_height + parseInt(top_header_padding_bottom) + parseInt(top_header_padding_top) ))});

        }

        
        // Title Settings

        if( boxed_slider != 'off' ){

          if( header_wrapper_color != 'transparent' ){

              var heder_height = Math.ceil( $('#header_container').height() / 2);

          }else{

              var heder_height = '0';

          }

        }else{

          var heder_height = '0';

        }

    }else{

      var heder_height = '0';

      $('.slides-navigation').css('margin-top', '-30px');

    }

      $('.slides_description').css('margin-top', Math.ceil(-( slides_description_height -  ( heder_height ) ) / 2));

    })

    

}

owl_main_slider();

$(window).resize(function() {

  owl_main_slider();

});

/****************** masonry code **************/

if (jQuery().isotope){
  $(window).load(function(){
    $(function (){
    var isotopeContainer = $('.portfolio_gallery, .blog-isotope-container, .widget-isotope-container, .gallery-images');
    isotopeContainer.isotope({
    masonry:{
             columnWidth:    1,
              isAnimated:     true,
              isFitWidth:     true
          }
    });
    });
  });
}

if (jQuery().isotope){

var tempvar = "all";

jQuery(window).load(function(){

jQuery(function (){

  var isotopeContainer = jQuery('.isotope-container'),

  isotopeFilter = jQuery('#filter'),

  isotopeLink = isotopeFilter.find('a');

  isotopeContainer.isotope({

    itemSelector : '.isotope-item',

    //layoutMode : 'fitRows',

    filter : '.' +tempvar,

     masonry:  {

                   columnWidth:    1,

                    isAnimated:     true,

                    isFitWidth:     true

                },

          onLayout: function() {

        $('.isotope li, .blog-isotope-container .masonry_blog, .gallery-images li').addClass('isotope-ready');

    }

  });

  isotopeLink.click(function(){

    var selector = jQuery(this).attr('data-category');

    isotopeContainer.isotope({

      filter : '.' + selector,

      itemSelector : '.isotope-item',

      //layoutMode : 'fitRows',

      animationEngine : 'best-available'

    });

    isotopeLink.removeClass('active');

    jQuery(this).addClass('active');

    return false;

  });

});

    jQuery("#filter ul li a").removeClass('active');

    jQuery("#filter ul li."+tempvar+ " a").addClass('active');

});

}

/* Search Box */

  $('.search_box_icon, .search_close_button').click(function () {

    $('.search_box_wrapper').slideToggle(function() {

      var txt = $(this).is(':visible') ? "'top','50'" : '';

     $('.header_menu_section .sticky').toggleClass('hader_top_space', $(this).is(':visible'));

  });

  }); // end click

  $(window).scroll(function(){

    if ($(this).scrollTop() > 1) {

        $('.search_box_wrapper').css({'display':'none'});

        $('.search_box_wrapper').css({'position':'fixed','z-index':'99999'});

        $('.header_menu_section.sticky').removeClass('hader_top_space');



    }else{

      $('.search_box_wrapper').css({'position':'relative','z-index':'99999'});

    }

    })

  if( $('.header_menu_section').hasClass('sticky')){

  var header_container = $('#header_container');

  var menu_header_height = $('#header_container').height();

  var $header_container = $('#header_container').height();

  var sticky_navigation = function(){
  var scroll_top = $(window).scrollTop();
   if($('.header_menu_section').hasClass('sticky')){
     // if (scroll_top > $header_container) { 
      if ((scroll_top > $('#header_container').height()) && ($(window).width() > 1024)) { 
      $('.header_menu_section.sticky').css({'position':'fixed', 'top':'0'});
      $('.header_menu_section').addClass('sticky_menu');
      $('.header_top_section').fadeOut(0);
      //$('.menu ul ul').removeClass('sticky_sub_menu');
    } else {
      $('.header_menu_section').removeClass('sticky_menu');
      $('.header_top_section').fadeIn(0);
      $('.header_menu_section.sticky').css({'position':'relative', 'top':'inherit'});
      $('.header_menu_section.top_sticky_header .menu ul ul').css({'bottom' : '','top':''});
      //$('.menu ul ul').addClass('sticky_sub_menu');
    }
   }    
  };



  sticky_navigation();

  $(window).scroll(function() {

  sticky_navigation();

  });

}else{

   //alert('a');

   $('#main_slider').each(function(){

      var boxed_slider = $(this).find('#main_slider_slides .slides-container').data('boxed');

      if( boxed_slider == 'on' ){

          $('#header_container .sticky, #header_container.top_header').css('position','relative');

      }

    });

}

/* Logo height */

var logo_height = $('.sticky_logo').height()/2-12;

$('.sticky_menu .header_right_section').css({"margin-top":logo_height})

// Scroll Top

 $(window).scroll(function(){

    if ($(this).scrollTop() > 100) {

        $('.scroll_top').fadeIn();

    } else {

        $('.scroll_top').fadeOut();

    }

});

 $('.scroll_top').click(function(){

    $("html, body").animate({ scrollTop: 0 }, 600);

    return false;

});



// parallax Image

function window_resize_width(){

   /* Header Height */

  var header_padding_top = $('#header_container').css('padding-top');

  var header_padding_bottom = $('#header_container').css('padding-bottom');

  var with_out_header =  $('#header_container').height()+parseInt(header_padding_top)+parseInt(header_padding_bottom);

  $('.with_out_header').css('height',with_out_header);

  //alert(with_out_header);

  var $header_wrapper = jQuery("#header_wrapper").height()+100;

  var windowHeight = (Math.ceil($(window).height()) - $header_wrapper);

  $("#parallax_single_image").height(windowHeight);

  /* Slider Image Margin  top*/

  var top_header_height = $(".header_top_section").height();

  if( top_header_height > '0' ){

    var $padding_top = 0;

  }else{

      var $padding_top = 0;

  }

 var $header_height = Math.ceil($('#header_container').height());

 var $header_top_pading = $('#header_container').css('padding-top');

 var $header_bottom_pading = $('#header_container').css('padding-bottom');

 var $dynamic_header_height = $header_height+parseInt($header_top_pading)+parseInt($header_bottom_pading);

  var $main_header_bg = $("#header_container").css('background-color');

  if( $main_header_bg =='transparent' ){

      var main_header_height = $dynamic_header_height;

  }else{

        var main_header_height = $dynamic_header_height;

  }

  $('.header_below').css('top',$dynamic_header_height);

  $('#main_content_inner_section').each(function(){

    var fullscree_height = $(this).find('.page_title_bg_img').data('fullscreen');

    if( fullscree_height == 'on'){

      var img_height=$(this).find('.sub_header_wrapper').css('height',$(window).height()-$dynamic_header_height);

    }

  });

 /* Boxed header width */

 var container_width = parseInt($('#box_layout').css('width'));

 $('#header_container, .search_box_wrapper').css({'width':container_width, 'margin':'0px auto'});

  /* Bottom Header */

  if($('#header_container').hasClass('bottom_header')){

    $('.mid_container_wrapper_section').css('margin-top',0);

  }

  /* Window Scroll Slider title Hide */        

    var post_slider = $('.slide_content_wrapper');

  $(window).on('scroll', function() {

     var post_slide_op = $(this).scrollTop();

     post_slider.css({ 'opacity' : (1 - post_slide_op/240) , 'margin-top': -post_slide_op});

  }); 

  var nav_icons = $('#main_slider_slides .slides-navigation, #main_slider_slides .owl-dots');

  $(window).on('scroll', function() {

     var nav_scrol_icons = $(this).scrollTop();

     nav_icons.css({ 'opacity' : (1 - nav_scrol_icons/550)});

  }); 

  var boxed_nav = (Math.ceil($(window).width() - 17 - parseInt($('.container').css('width'))) / 2);

  var box_layout_check = $('#main_slider').parents("#box_layout").length;

  if($('#right_header_section').hasClass('kaya_right_position')){ }

  else if($('#left_header_section').hasClass('kaya_left_position')){ }

  else if(box_layout_check){

    $('#main_slider_slides').parent().parent('#main_content_inner_section').addClass('boxed_slider_wrapper');

   }  

  else{  

      $('#main_slider_slides').parent().parent('#main_content_inner_section').removeClass('boxed_slider_wrapper');

  }  

  // Page title Opacity

  if ($(window).width() <= 1006) {  

     var page_title_bar = $('.sub_header.container');

    $(window).on('scroll', function() {

        page_title_bar.css({ 'opacity' : 1 });

    });

  var image_width = parseInt($('.page_title_bg_img').css('background-size'));

    $(window).on('scroll', function() {

      var scroll = $(this).scrollTop();

      if( $('.page_title_bg_img').hasClass('parallax_image')){

        $('.parallax_image').css({'background-position':'center 0'});

      }  

      if( $('.page_title_bg_img').hasClass('parallax_with_zoom_image')){

        $('.parallax_with_zoom_image').css({'background-position':'center 0', 'background-size':parseInt(2500) + 'px auto'});

      }

       });

  }else{

    var page_title_bar = $('.sub_header.container');

    $(window).on('scroll', function() {

       var st = $(this).scrollTop();

       page_title_bar.css({ 'opacity' : (1 - st/240) });

    }); 

      var image_width = parseInt($('.page_title_bg_img').css('background-size'));

    $(window).on('scroll', function() {

      var scroll = $(this).scrollTop();

      if( $('.page_title_bg_img').hasClass('parallax_image')){

        $('.parallax_image').css({'background-position':'center ' + parseInt(-scroll / 2) + 'px'});

      }  

      if( $('.page_title_bg_img').hasClass('parallax_with_zoom_image')){

        $('.parallax_with_zoom_image').css({'background-position':'center ' + parseInt(-scroll / 2) + 'px', 'background-size':parseInt(2500-scroll) + 'px auto'});

      }

       });

  }  

   //video height

  var height = $(".panel-row-style").height()+160;

  var $container_width = Math.ceil( (( ($(window).width() )  - parseInt($('.container').css('width'))) / 2) );

  var $width = $(window).width();

  $('.video_wrapper').css({"width":$width,"height":height, "margin-left":-$container_width});

  if ( $(window).width() > 1004 ) {

      $('#bg_video_wrapper').css({"width":$width})

  }else{

      $('#bg_video_wrapper').css({"width":"1800"});

  }

  $('.single_img').next().next('.portfolio_fullwidth').prev().prev('.single_img').addClass('single_image_slider');

  $('#related_post_slider').each(function(){
      $(this).owlCarousel({
        navigation : false,
        autoPlay : true,
        stopOnHover : true,
        margin : 10,
        responsive: {
        0:{
            items:1,
            },
            480:{
                items:1,
            },
            768:{
                items:2,
            },
            1024:{
                items:4,
            },
      },    
   });
  });

  }

window_resize_width();

$(window).resize(function(){

  window_resize_width();

});

/* Slider Section */

var post_slider_height = $('#header_container').height()+150;

var header_bg_color = $('#header_container').css('background-color');

var header_border_width = $('#header_container').css('border-bottom-width');

if( ($('#header_container').hasClass('bottom_sticky_header')) ||  ($('#header_container').hasClass('bottom_header')) ){ 

  $('.slide_content_wrapper').css('top',50);

}else{

  if( ( parseInt( header_border_width ) == '1' ) || ( header_bg_color != 'transparent' ) ){

    $('.slide_content_wrapper').css('top',post_slider_height);

  }else{

    $('.slide_content_wrapper').css('top',post_slider_height/1.5);

  }

}

/* Shooping Cart */

$('.widget_shopping_cart_content .buttons a').removeClass('wc-forward');

$('.button, #review_form_wrapper .form-submit #submit').not('.wc-forward').addClass('primary-button');

$('.checkout-button, #place_order, .cart-sussess-message a').addClass('seconadry-button');

$('.related.products li, .upsells.products li, .cross-sells ul.products li').removeClass('first last');

$('.add_to_wishlist').removeClass('single_add_to_wishlist button alt primary-button');

$('i.icon-align-right').removeClass('icon-align-right').addClass('fa fa-heart');

$('.widget_shopping_cart_content .buttons a').addClass('primary-button');

$('.cart-sussess-message a').removeClass('seconadry-button');
/* Shooping Cart */
$('.shop-products').hover(function(){
    $(this).find('.product-cart-button').fadeIn();
},function(){
     $(this).find('.product-cart-button').stop(true, true).fadeOut();
})
// Remove P Tags

  $('p').each(function() {

    var $this = $(this);

    if($this.html().replace(/\s|&nbsp;/g, '').length == 0)

        $this.remove();

});
//boxed layout fullwidth settings
if($('#box_layout').length > 0){
  var boxed_layout_width = $('#box_layout').width();
  $('.siteorigin-panels-stretch').each(function(i){
      var panel_stretch_type = $(this).data('stretch-type');
      if( panel_stretch_type == 'full-stretched' ){
        var boxed_magin = Math.ceil(( boxed_layout_width - $('.container').width() ) / 2);
        $(this).css({'width':boxed_layout_width, 'display':'inline', 'margin-right':'0'}).addClass('panel_stretch_class');
      }
  });
}
// script end
//smartmenu code
$('#main-menu').smartmenus();
});
})(jQuery);