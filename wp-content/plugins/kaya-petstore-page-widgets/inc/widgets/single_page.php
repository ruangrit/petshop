<?php
/**
* Single Page Menu Name
*/
class Petstore_Single_Page_Widget extends WP_Widget
{	
	function __construct()
	{
		global $petstore_plugin_name;
		parent::__construct(
			$petstore_plugin_name.'-single-page-menu-name',
			__('Petstore - One Page',$petstore_plugin_name),
			 array(  'description' => __('Parallax one page menu URL anchor ID',$petstore_plugin_name) ));
	}
	function widget($args, $instance){
		$instance = wp_parse_args($instance , array(
      		'menu_anchor_name' => '',
	    ));
      	echo $args['before_widget'];
      		echo '<div id="'.$instance['menu_anchor_name'].'" class="one_page_menu"> </div>';
		echo $args['after_widget'];
	}
	public function form( $instance ){
		global $petstore_plugin_name;
	    $instance = wp_parse_args($instance , array(
	    	'menu_anchor_name' => '',
	    ));
	  ?>
	<div class="input-elements-wrapper"> 
		<p>
		<label for="<?php echo $this->get_field_id('menu_anchor_name') ?>">  <?php _e('Menu URL Anchor ID',$petstore_plugin_name)?>  </label>
		<input type="text" name="<?php echo $this->get_field_name('menu_anchor_name') ?>" id="<?php echo $this->get_field_id('menu_anchor_name') ?>" class="" value="<?php echo $instance['menu_anchor_name'] ?>" />
		<small><?php _e('Ex:about-us',$petstore_plugin_name); ?><br /><?php _e('for more details click', $petstore_plugin_name) ?>
		 <a href="<?php echo constant(strtoupper($petstore_plugin_name).'_PLUGIN_URL').'images/onepage-menu-anchorID.png' ?>" target="_blank"><?php _e('here', $petstore_plugin_name) ?> </a></small>
		
		</p>
	</div>
	<?php 
	}
	}
petstore_kaya_register_widgets('single-page', __FILE__);
 ?>