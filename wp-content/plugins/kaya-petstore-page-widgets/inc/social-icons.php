<?php 
if( !function_exists('social_icons') ){
function social_icons($atts, $content=null){
      global $social_icons;
      extract(shortcode_atts( array(
        'name' => 'fa-facebook',
        'link' => '',
        'font_size' => '16',
        ), $atts));
        $html ='';            
        $padding = ceil($font_size/2);
        $margin = ceil($font_size/4);
        $html .='<li><a href="'.$link.'" style="line-height:'.$font_size.'px; font-size:'.$font_size.'px; width:'.$font_size.'px; height:'.$font_size.'px; padding:'.$padding.'px; margin-right:'.$margin.'px;" target="_blank"><i class="fa '.$name.'"></i></a></li>';
        $social_icons .= $html;
      return $html;
}
add_shortcode('icon', 'social_icons');
function social_icons1($atts, $content = null){
        global $social_icons;
      extract(shortcode_atts( array(
        'class' => 'left',
        'icon_color' => '#333',
        'icon_bg_color' => '',
        'icon_hover_color' => '#de4a4a',
        'icon_bg_hover_color' => '',
        ), $atts));
  switch ($class) {
    case 'left':
      $class="float:left;";
      break;
    case 'right':
      $class="float:right;";
      break;
    case 'center':
      $class="margin:0px auto; display:table;";
      break;
    default:
      break;
  }
  $rand=rand(1,100);
      $social_icons='';
    return $output = '<div class="social_media_icons social_media_icons'.$rand.'" data-bgcolor="'.$icon_bg_color.'" data-bg-hovercolor="'.$icon_bg_hover_color.'" data-color="'.$icon_color.'" data-hovercolor="'.$icon_hover_color.'" style="'.$class.'"><ul>'.do_shortcode($content).'</ul></div>';
}
add_shortcode('social_icon', 'social_icons1');
}
 ?>