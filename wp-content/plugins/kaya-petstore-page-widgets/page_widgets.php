<?php
/*  Plugin Name: Kaya Petstore Page Widgets
    Plugin URI: http://themeforest.net/user/kayapati/portfolio
    Description: The easy way to create page layouts using Widgets in Pages or post with the help of Widget based page builder like   "SiteOrigin" Page Builder, always note these works better in pages only, 
                 not rcomended for sidebars. 
    Author: Ram
    Author URI: http://themeforest.net/user/kayapati/portfolio
    Version: 2.1.1
	*/
if (!defined('ABSPATH')){ exit; }
if ( ! class_exists( 'Petstore_Page_Widgets' ) ) :
class Petstore_Page_Widgets { 
 public function __construct()
    {  
        global $petstore_plugin_name;
        $petstore_plugin_name = 'petstore';
        add_action( 'wp_enqueue_scripts', array( &$this, 'kaya_enqueue_styles' ) );
        add_action( 'init', array( &$this, 'kaya_register_scripts' ) );
        add_action( 'init', array( &$this, 'kaya_register_styles' ) );
        add_action( 'wp_enqueue_scripts', array( &$this, 'kaya_enqueue_scripts' ), 100,100 );
        add_action('plugins_loaded', array(&$this,'kaya_plugin_textdomain'));
        add_action('admin_enqueue_scripts', array(&$this,'kaya_admin_styles')); //style files
        $this->kaya_plugin_constant();
        $this->kaya_plugin_function();
        $this->kaya_include_widgets();
        $this->kaya_cpts_include();
    }
    public function kaya_plugin_constant(){
        global $petstore_plugin_name;
        define( strtoupper($petstore_plugin_name).'_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
        define( strtoupper($petstore_plugin_name).'_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
        define( strtoupper($petstore_plugin_name).'_VERSION', '1.0' );
    }
    public function kaya_plugin_function(){
        include_once plugin_dir_path( __FILE__ ).'/inc/mr-image-resize.php';
        include_once plugin_dir_path( __FILE__ ).'/inc/post-format.php';
        include_once plugin_dir_path( __FILE__ ).'/inc/social-icons.php';
        include_once plugin_dir_path( __FILE__ ).'/inc/functions.php';
        include_once plugin_dir_path( __FILE__ ).'/inc/animation_names.php';
        include_once plugin_dir_path( __FILE__ ).'/inc/icon_box_icons.php';
        include_once plugin_dir_path( __FILE__ ).'/inc/media_image_attachments.php';
    }
      public function kaya_cpts_include(){
         foreach ( glob( plugin_dir_path( __FILE__ )."/inc/custom_posts/*.php" ) as $cpt )
        include_once $cpt;
    }
    public function kaya_include_widgets(){
        foreach ( glob( plugin_dir_path( __FILE__ )."/inc/widgets/*.php" ) as $widget_file )
        include_once $widget_file;
    }
    /* Styles Register */
    public function kaya_enqueue_styles() {
        global $petstore_plugin_name;
        wp_enqueue_style($petstore_plugin_name.'_css_page_widgets', plugins_url('css/page_widgets.css', __FILE__));
        wp_enqueue_style('css_widgets_animation', plugins_url('css/animate.min.css', __FILE__));
    }
    /* Scripts Register */
    public function kaya_register_scripts(){
        wp_register_script('owl-js', plugins_url('js/owl.carousel.js', __FILE__),array( 'jquery' ),'1.29', true);
        wp_register_script('jquery.isotope', plugins_url('js/jquery.isotope.min.js', __FILE__),array( 'jquery' ),'1.29', true);
        wp_register_script('jquery.easy-pie-chart', plugins_url('js/jquery.easy-pie-chart.js', __FILE__),array( 'jquery' ),'1.29', true);
    }
    public function kaya_register_styles(){
        wp_register_style('css_owl.carousel', plugins_url('css/owl.carousel.css', __FILE__));
    }
    public function kaya_enqueue_scripts(){
        global $petstore_plugin_name;
        wp_enqueue_script('jquery_wow.min', plugins_url('js/wow.min.js', __FILE__),array( 'jquery' ),'', true);
        wp_localize_script( 'jquery', 'cpath', array('plugin_dir' => plugins_url('',__FILE__)));
         wp_enqueue_script($petstore_plugin_name.'_js_scripts', plugins_url('js/scripts.js', __FILE__),array( 'jquery' ),'', true);
         //wp_enqueue_script('jquery-ui-accordion');
    }
    /* Admin Scripts Here */
    function kaya_admin_styles(){
        wp_enqueue_style('admin_widgets', plugins_url('css/admin_widgets.css', __FILE__));
        wp_enqueue_style('genericons', plugins_url('icons/genericons/style.css', __FILE__));
        wp_enqueue_style('fontawesome', plugins_url('icons/fontawesome/style.css', __FILE__));
        wp_enqueue_style('elegantline', plugins_url('icons/elegantline/style.css', __FILE__));
        wp_enqueue_style('icomoon', plugins_url('icons/icomoon/style.css', __FILE__));
        wp_enqueue_script( 'wp-color-picker' );          
        //wp_enqueue_media();
    }
    /* Text Domain */
    public  function kaya_plugin_textdomain() {
        global $petstore_plugin_name;
        $locale = apply_filters( 'plugin_locale', get_locale(), $petstore_plugin_name );
        load_textdomain( $petstore_plugin_name, trailingslashit( WP_LANG_DIR ) . '/' . $locale . '.mo' );
        load_plugin_textdomain( $petstore_plugin_name, FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
    }
} 
endif;
$Petstore_Page_Widgets = new Petstore_Page_Widgets();
?>