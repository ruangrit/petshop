<?php
/**
* Shop Product Slider
*/
class Petstore_Shop_Product_Slider_Widget extends WP_Widget
{
	function __construct()
	{
		global $petstore_plugin_name;
		parent::__construct('shop-products-slider',
			__('Petstore - Shop Products Slider', $petstore_plugin_name).'&nbsp; <a class="widget_video_tutorials" target="_blank" href="https://www.youtube.com/watch?v=Jjt534xGX6g&feature=youtu.be">'.__('Watch this video', $petstore_plugin_name).'</a>',
			array('description' => __('Display list of products as a slider', $petstore_plugin_name))
		);
	}
	public function widget($args, $instance){
		global $petstore_plugin_name;
		wp_enqueue_script('jquery_owlcarousel');
     	wp_enqueue_style('css_owl.carousel');
		global $post, $woocommerce, $product;
		$instance=wp_parse_args($instance, array(
		 	'product_category_ids' =>  '',
		 	'select_products_type' => 'products',
		 	'products_order' => 'desc',
		 	'products_order_by' => 'date',
		 	'display_no_of_products' => '',
		 	'produt_slider_auto_play' => 'true',
		 	'produt_slider_loop' => 'true',
		 	'products_slide_items' => '4',
		 	'product_desc_bg_color' => '',
		 	'title_color' => '#333333',
		 	'description_color' =>'',
		 	'title_hover_color' => '#de4a4a',
		 	'price_color' => '#555555',
		 	'rating_color' => '#de4a4a',
		 	'product_box_border_color' => '',
		 	'disable_rating' => '',
		 	'slider_arrows_bg_color' => '#333333',
	        'slider_arrows_color' => '#ffffff',
	        'enable_slider_arrow_buttons' => '',
		 	'animation_names' => '',
		 ));
		echo $args['before_widget'];
		$product_border = ( $instance['product_box_border_color'] != '' ) ? 'border:1px solid '.$instance['product_box_border_color'].'' : 'border:0px;';
		$product_desc_bg = ( $instance['product_desc_bg_color'] != '') ? 'background-color:'.$instance['product_desc_bg_color'].'' : 'background:none';
		$animation = trim( $instance['animation_names']  ) ? 'wow '.$instance['animation_names'] : '';
		$no_of_products = ( $instance['display_no_of_products'] == '' ) ? '-1' : $instance['display_no_of_products'];
		$enable_slider_arrow_buttons = ($instance['enable_slider_arrow_buttons'] == 'on' ) ? 'true' :'false';
		 echo '<span class="slider_bg_loading_img" style="position:relative;height:300px; background:url('.constant(strtoupper($petstore_plugin_name).'_PLUGIN_URL').'images/bx_loader.GIF)"></span>';
			echo '<div class="shop_product_slider_wrapper woocommerce '.$animation.'" data-auto-play="'.$instance['produt_slider_auto_play'].'" data-loop="'.$instance['produt_slider_loop'].'" data-items="'.$instance['products_slide_items'].'" data-slider-arrow-bg-color="'.$instance['slider_arrows_bg_color'].'" data-slider-arrow-color="'.$instance['slider_arrows_color'].'" data-disable-arrow="'.$enable_slider_arrow_buttons.'">';
			$array_val = ( !empty( $instance['product_category_ids'] )) ? explode(',',  $instance['product_category_ids']) : '';
			if( $instance['select_products_type'] == 'featured_products' ){
				$key = '_featured';
				$data = array(
				                'key' => '_featured',
				                'value' =>  'yes',
				            );
				$orderby = $instance['products_order_by'];
			}elseif( $instance['select_products_type'] == 'onsale_products' ){
				$key = '_sale_price';
				$orderby = $instance['products_order_by'];
				$data = array(
		                'key' => '_sale_price',
		                'value' =>  '0',
		                'compare'   => '>',
		                'type'      => 'NUMERIC',
		            );
			}elseif( $instance['select_products_type'] == 'top_rated_products' ){
				$orderby = $instance['products_order_by'];
				$key = '_featured';
				$data = array(
			            'key' => '_featured',
			            'value' =>  'yes',
			        );
				add_filter( 'posts_clauses',  array( $woocommerce->query, 'order_by_rating_post_clauses' ) );
			}elseif( $instance['select_products_type'] == 'best_selling_products' ){
		 		$orderby = 'meta_value_num';
		 		$key = 'total_sales';
				$data = array(
	                'key' => 'total_sales',
	                'value' =>  '0',
	                'compare'   => '>',
	            );
			}else{
				$key = '';
				$orderby = $instance['products_order_by'];
				$data = '';
			}
           	if( is_array($array_val ) ){
          		$loop = new WP_Query(array( 'post_type' => 'product', 'meta_key' => $key, 'orderby' => $orderby,  'posts_per_page' =>$no_of_products,'order' => $instance['products_order'], 'tax_query' => array('relation' => 'AND', array( 'taxonomy' => 'product_cat',   'field' => 'id', 'terms' => $array_val  ) ),
          			 'meta_query' => array(
							            array(
							                'key' => '_visibility',
							                'value' => array('catalog', 'visible'),
							                'compare' => 'IN'
							            ),
							             $data,
							             )));
         	}else{
				$loop = new WP_Query(array('post_type' => 'product', 'taxonomy' => 'product_cat','term' => '', 'meta_key' => $key, 'orderby' => $orderby, 'posts_per_page' =>$no_of_products,'order' => $instance['products_order'], 'stock' => 1, 'meta_query' => array(
							            array(
							                'key' => '_visibility',
							                'value' => array('catalog', 'visible'),
							                'compare' => 'IN'
							            ),
							            $data,
							            )));
          	}	          	
			if( $loop->have_posts() ) : while( $loop->have_posts()) : $loop->the_post(); 
				global $product; ?>
				<div class="shop-products" style="<?php echo $product_border; ?>">
		<div class="shop-produt-image">
			<?php if ( $product->is_on_sale() ) : ?>
				<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale-ribbon1"><span class="onsales">' . __( 'Sale!', 'woocommerce' ) . '</span></span>', $post, $product ); ?>
			<?php endif; ?>		
			<a href="<?php the_permalink(); ?>">
							<?php 
							//if (has_post_thumbnail()) {
							$image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'' );
							if( $image_src ){
								echo woocommerce_get_product_thumbnail();
							}
							 else{
              echo '<img src="'.constant(strtoupper($petstore_plugin_name).'_PLUGIN_URL').'images/product_slider.jpg" >';
          }
						?>
						</a>
			<div class="product-cart-button">
				<?php
				echo apply_filters( 'woocommerce_loop_add_to_cart_link',
					sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button %s product_type_%s"><i class="fa fa-cart-plus"> </i></a>',
						esc_url( $product->add_to_cart_url() ),
						esc_attr( $product->id ),
						esc_attr( $product->get_sku() ),
						esc_attr( isset( $quantity ) ? $quantity : 1 ),
						$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
						esc_attr( $product->product_type )
					
					),
					$product );	?>
			</div>
		</div>			
		<div class="shop-product-details" data-hover-color="<?php echo $instance['title_hover_color']; ?>" style="<?php echo $product_desc_bg; ?>">
			<?php if ( $price_html = $product->get_price_html() ) : ?>
				<h4 class="price"><?php echo $product->get_price_html(); ?></h4>	
			<?php endif;  ?>
			<h3><a style="color:<?php echo $instance['title_color']; ?>" href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
			<p class="product_description" style="color:<?php echo $instance['description_color']; ?>"><?php 
					$post_excerpt = $post->post_excerpt; /* or you can use get_the_title() */
					echo $post_excerpt = substr($post_excerpt, 0, 50); ?></p>
			<?php if( $instance['disable_rating'] !='on' ){ ?>
							<div class="product-rating">
								<?php if ($average = $product->get_average_rating()) : ?>	
								<?php echo '<div class="star-rating" title="'.sprintf(__( 'Rated %s out of 5', 'woocommerce' ), $average).'"><span style="width:'.( ( $average / 5 ) * 100 ) . '%; color:'.$instance['rating_color'].'" ><strong itemprop="ratingValue" class="rating">'.$average.'</strong> '.__( 'out of 5', 'woocommerce' ).'</span></div>'; ?>
								<?php 
								else:
									echo '<div class="star-rating" title="'.sprintf(__( 'Rated %s out of 5', 'woocommerce' ), $average).'"><span style="width:'.( ( $average / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">'.$average.'</strong> '.__( 'out of 5', 'woocommerce' ).'</span></div>';
								endif; ?>
							</div>
						<?php } ?>
			</div>
	</div>
	<?php		endwhile;          
			endif;
			wp_reset_query();
			if( $instance['select_products_type'] == 'top_rated_products' ){
				remove_filter( 'posts_clauses', array( $woocommerce->query, 'order_by_rating_post_clauses' ) );
			}	
		echo '</div>';
	echo $args['after_widget'];
	}
	function form( $instance ){
		global $petstore_plugin_name;
		 $product_cats =  get_terms('product_cat','');
	    if( $product_cats ){
	      foreach ($product_cats as $product_cat) { 
	        $product_cat_ids[] = $product_cat->term_id;
	         $product_cat_name[] = $product_cat->name.' - '.$product_cat->term_id;
	      }
	    }else{ $product_cat_name[] = ''; $product_cat_ids[] =''; }
		 $instance=wp_parse_args($instance, array(
		 	'product_category_ids' =>  implode(',', $product_cat_ids),
		 	'select_products_type' => 'products',
		 	'products_order' => 'desc',
		 	'products_order_by' => 'date',
		 	'description_color' =>'',
		 	'display_no_of_products' => '',
		 	'produt_slider_auto_play' => 'true',
		 	'produt_slider_loop' => 'true',
		 	'products_slide_items' => '4',
		 	'product_desc_bg_color' => '#f5f5f5',
		 	'title_color' => '#333333',
		 	'title_hover_color' => '#de4a4a',
		 	'price_color' => '#555555',
		 	'rating_color' => '#de4a4a',
		 	'product_box_border_color' => '#f5f5f5',
		 	'disable_rating' => '',
		 	'slider_arrows_bg_color' => '#333333',
	        'slider_arrows_color' => '#ffffff',
	        'enable_slider_arrow_buttons' => '',
		 	'animation_names' => '',
		 ));
	 ?>
	 <script type='text/javascript'>
	jQuery(document).ready(function($) {
		jQuery('.product_slider_color_pickr').each(function(){
			jQuery(this).wpColorPicker();
		});
	});
  </script>
	<div class="input-elements-wrapper">
		<p>
			<label for="<?php echo $this->get_field_id('product_category_ids') ?>"> <?php _e('Enter Product Category IDs : ',$petstore_plugin_name) ?> </label>
			<input type="text" name="<?php echo $this->get_field_name('product_category_ids') ?>" id="<?php echo $this->get_field_id('product_category_ids') ?>" class="widefat" value="<?php echo $instance['product_category_ids'] ?>" />
			<em><strong style="color:green;"><?php _e('Available Categories and IDs : ',$petstore_plugin_name); ?> </strong> <?php echo implode(', ', $product_cat_name); ?></em><br />
			<stong><?php _e('Note:',$petstore_plugin_name); ?></strong><?php _e('Separate IDs with commas only',$petstore_plugin_name); ?>
		</p>
	</div>
	<div class="input-elements-wrapper">
  		<p class="one_fourth">
			<label for="<?php echo $this->get_field_id('products_slide_items') ?>">  <?php _e('Product Slide Items',$petstore_plugin_name); ?> </label>
		    <select id="<?php echo $this->get_field_id('products_slide_items') ?>" name="<?php echo $this->get_field_name('products_slide_items') ?>">
		      <option value="1" <?php selected('1', $instance['products_slide_items']) ?>>   <?php esc_html_e('1 Item', $petstore_plugin_name) ?>   </option>
		      <option value="2" <?php selected('2', $instance['products_slide_items']) ?>>  <?php esc_html_e('2 Items', $petstore_plugin_name) ?>  </option>
		      <option value="3" <?php selected('3', $instance['products_slide_items']) ?>>   <?php esc_html_e('3 Items', $petstore_plugin_name) ?>  </option>
		      <option value="4" <?php selected('4', $instance['products_slide_items']) ?>>   <?php esc_html_e('4 Items', $petstore_plugin_name) ?>  </option>
		      <option value="5" <?php selected('5', $instance['products_slide_items']) ?>>  <?php esc_html_e('5 Items', $petstore_plugin_name) ?>    </option>
		    </select>
		</p>
		<p class="one_fourth">
			<label for="<?php echo $this->get_field_id('produt_slider_auto_play') ?>"> <?php _e('Auto Play',$petstore_plugin_name) ?> </label>
			<select id="<?php echo $this->get_field_id('produt_slider_auto_play') ?>" name="<?php echo $this->get_field_name('produt_slider_auto_play') ?>">
				<option value="true" <?php selected('true', $instance['produt_slider_auto_play']) ?>>   <?php esc_html_e('True', $petstore_plugin_name) ?>  </option>
				<option value="false" <?php selected('false', $instance['produt_slider_auto_play']) ?>>   <?php esc_html_e('False', $petstore_plugin_name) ?>  </option>
			</select>
		</p>
		<p class="one_fourth">
			<label for="<?php echo $this->get_field_id('produt_slider_loop') ?>"> <?php _e('Loop',$petstore_plugin_name) ?> </label>
			<select id="<?php echo $this->get_field_id('produt_slider_loop') ?>" name="<?php echo $this->get_field_name('produt_slider_loop') ?>">
				<option value="true" <?php selected('true', $instance['produt_slider_loop']) ?>>   <?php esc_html_e('True', $petstore_plugin_name) ?>  </option>
				<option value="false" <?php selected('false', $instance['produt_slider_loop']) ?>>   <?php esc_html_e('False', $petstore_plugin_name) ?>  </option>
			</select>
		</p>
  	</div>
	<div class="input-elements-wrapper">
		<p class="one_fourth">
			<label for="<?php echo $this->get_field_id('select_products_type') ?>"> <?php _e('Products Display',$petstore_plugin_name) ?> </label>
			<select id="<?php echo $this->get_field_id('select_products_type') ?>" name="<?php echo $this->get_field_name('select_products_type') ?>">
				<option value="products" <?php selected('normal', $instance['select_products_type']) ?>>  <?php esc_html_e('All Products ', $petstore_plugin_name) ?>   </option>
				<option value="featured_products" <?php selected('featured_products', $instance['select_products_type']) ?>>   <?php esc_html_e('Featured Products', $petstore_plugin_name) ?>  </option>
				<option value="onsale_products" <?php selected('onsale_products', $instance['select_products_type']) ?>>   <?php esc_html_e('On Sale Products', $petstore_plugin_name) ?>  </option>
				<option value="top_rated_products" <?php selected('top_rated_products', $instance['select_products_type']) ?>>   <?php esc_html_e('Top Rated Products', $petstore_plugin_name) ?>  </option>
				<option value="best_selling_products" <?php selected('best_selling_products', $instance['select_products_type']) ?>>   <?php esc_html_e('Best Selling Products', $petstore_plugin_name) ?>  </option>
			</select>
		</p>
		<p class="one_fourth">
			<label for="<?php echo $this->get_field_id('products_order_by') ?>"> <?php _e('Order By',$petstore_plugin_name) ?> </label>
			<select id="<?php echo $this->get_field_id('products_order_by') ?>" name="<?php echo $this->get_field_name('products_order_by') ?>">
				<option value="date" <?php selected('date', $instance['products_order_by']) ?>>   <?php esc_html_e('Date', $petstore_plugin_name) ?>  </option>
				<option value="title" <?php selected('title', $instance['products_order_by']) ?>>   <?php esc_html_e('Title', $petstore_plugin_name) ?>  </option>
			</select>
		</p>
		<p class="one_fourth">
			<label for="<?php echo $this->get_field_id('products_order') ?>"> <?php _e('Order By',$petstore_plugin_name) ?> </label>
			<select id="<?php echo $this->get_field_id('products_order') ?>" name="<?php echo $this->get_field_name('products_order') ?>">
				<option value="desc" <?php selected('desc', $instance['products_order']) ?>>   <?php esc_html_e('Descending Order', $petstore_plugin_name) ?>  </option>
				<option value="asc" <?php selected('asc', $instance['products_order']) ?>>   <?php esc_html_e('Ascending Order', $petstore_plugin_name) ?>  </option>
			</select>
		</p>
		<p class="one_fourth_last">
			<label for="<?php echo $this->get_field_id('display_no_of_products') ?>">  <?php _e('Display Number Of Products',$petstore_plugin_name) ?>  </label>
			<input type="text" class="small-text" id="<?php echo $this->get_field_id('display_no_of_products') ?>" value="<?php echo esc_attr($instance['display_no_of_products']) ?>" name="<?php echo $this->get_field_name('display_no_of_products') ?>" />
		</p>
		 <p class="one_fourth" style="clear:both;">
		    <label for="<?php echo $this->get_field_id('enable_slider_arrow_buttons') ?>">  <?php _e('Slider Arrow Buttons',$petstore_plugin_name) ?>  </label>
		      <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("enable_slider_arrow_buttons"); ?>" name="<?php echo $this->get_field_name("enable_slider_arrow_buttons"); ?>"<?php checked( (bool) $instance["enable_slider_arrow_buttons"], true ); ?> />
		</p>
		<p class="one_fourth">
		    <label for="<?php echo $this->get_field_id('slider_arrows_bg_color') ?>">  <?php _e('Slider Navigation Background Color',$petstore_plugin_name)?>  </label>
		    <input type="text" name="<?php echo $this->get_field_name('slider_arrows_bg_color') ?>" id="<?php echo $this->get_field_id('slider_arrows_bg_color') ?>" class="product_slider_color_pickr" value="<?php echo $instance['slider_arrows_bg_color'] ?>" />
		</p>
		<p class="one_fourth">
		    <label for="<?php echo $this->get_field_id('slider_arrows_color') ?>">  <?php _e('Slider Navigation Color',$petstore_plugin_name)?>  </label>
		   <input type="text" name="<?php echo $this->get_field_name('slider_arrows_color') ?>" id="<?php echo $this->get_field_id('slider_arrows_color') ?>" class="product_slider_color_pickr" value="<?php echo $instance['slider_arrows_color'] ?>" />
		</p>
  	</div>
  	<div class="input-elements-wrapper">
  		<p class="one_fourth">
		  <label for="<?php echo $this->get_field_id('product_box_border_color') ?>">  <?php _e('Product Box Border Color',$petstore_plugin_name) ?>  </label>
		  <input type="text" class="widefat product_slider_color_pickr" id="<?php echo $this->get_field_id('product_box_border_color') ?>" name="<?php echo $this->get_field_name('product_box_border_color') ?>" value="<?php echo esc_attr($instance['product_box_border_color']) ?>" />
		</p>
  		<p class="one_fourth">
		  <label for="<?php echo $this->get_field_id('product_desc_bg_color') ?>">  <?php _e('Product Description BG Color',$petstore_plugin_name) ?>  </label>
		  <input type="text" class="widefat product_slider_color_pickr" id="<?php echo $this->get_field_id('product_desc_bg_color') ?>" name="<?php echo $this->get_field_name('product_desc_bg_color') ?>" value="<?php echo esc_attr($instance['product_desc_bg_color']) ?>" />
		</p>
		<p class="one_fourth">
		  <label for="<?php echo $this->get_field_id('title_color') ?>">  <?php _e('Title Color',$petstore_plugin_name) ?>  </label>
		  <input type="text" class="widefat product_slider_color_pickr" id="<?php echo $this->get_field_id('title_color') ?>" name="<?php echo $this->get_field_name('title_color') ?>" value="<?php echo esc_attr($instance['title_color']) ?>" />
		</p>
		<p class="one_fourth_last">
		  <label for="<?php echo $this->get_field_id('title_hover_color') ?>">  <?php _e('Title Hover Color',$petstore_plugin_name) ?>  </label>
		  <input type="text" class="widefat product_slider_color_pickr" id="<?php echo $this->get_field_id('title_hover_color') ?>" name="<?php echo $this->get_field_name('title_hover_color') ?>" value="<?php echo esc_attr($instance['title_hover_color']) ?>" />
		</p>
	</div>
		<div class="input-elements-wrapper">
		<p class="one_fourth" style="clear:both;">
		  <label for="<?php echo $this->get_field_id('price_color') ?>">  <?php _e('Price Color',$petstore_plugin_name) ?>  </label>
		  <input type="text" class="widefat product_slider_color_pickr" id="<?php echo $this->get_field_id('price_color') ?>" name="<?php echo $this->get_field_name('price_color') ?>" value="<?php echo esc_attr($instance['price_color']) ?>" />
		</p>
		<p class="one_fourth">
		  <label for="<?php echo $this->get_field_id('rating_color') ?>">  <?php _e('Rating Color',$petstore_plugin_name) ?>  </label>
		  <input type="text" class="widefat product_slider_color_pickr" id="<?php echo $this->get_field_id('rating_color') ?>" name="<?php echo $this->get_field_name('rating_color') ?>" value="<?php echo esc_attr($instance['rating_color']) ?>" />
		</p>
		<p class="one_fourth">
		  <label for="<?php echo $this->get_field_id('description_color') ?>">  <?php _e('Description Color',$petstore_plugin_name) ?>  </label>
		  <input type="text" class="widefat product_slider_color_pickr" id="<?php echo $this->get_field_id('description_color') ?>" name="<?php echo $this->get_field_name('description_color') ?>" value="<?php echo esc_attr($instance['description_color']) ?>" />
		</p>
		<p class="one_fourth_last">
			<label for="<?php echo $this->get_field_id('disable_rating') ?>">  <?php _e('Disable Rating',$petstore_plugin_name) ?>  </label>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("disable_rating"); ?>" name="<?php echo $this->get_field_name("disable_rating"); ?>"<?php checked( (bool) $instance["disable_rating"], true ); ?> />
		</p>
  	</div>
  	<p>
    <label for="<?php echo $this->get_field_id('animation_names') ?>">  <?php _e('Select Animation Effect',$petstore_plugin_name) ?>  </label>
      <?php animation_effects($this->get_field_name('animation_names'), $instance['animation_names'] ); ?>
    </p> 
<?php }
}
petstore_kaya_register_widgets('shop-product-slider', __FILE__);
?>