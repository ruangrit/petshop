<?php
/**
* Shop Product Slider
*/
class Petstore_Shop_Product_List_Widget extends WP_Widget
{
	function __construct()
	{
		global $petstore_plugin_name;
		parent::__construct('shop-products-slider',
			__('Petstore - Shop Products List', $petstore_plugin_name),
			array('description' => __('Display list of products as a list view', $petstore_plugin_name))
		);
	}
	public function widget($args, $instance){
		global $post, $petstore_plugin_name,$woocommerce, $product;
		$instance=wp_parse_args($instance, array(
		 	'product_category_ids' => '',
		 	'select_products_type' => 'products',
		 	'products_order' => 'desc',
		 	'products_order_by' => 'date',
		 	'display_no_of_products' => '',
		 	'title_color' => '#333333',
		 	'title_hover_color' => '#de4a4a',
		 	'price_color' => '#555555',
		 	'rating_color' => '#de4a4a',
		 	'image_align' => 'left',
		 	'img_border_color' => '#e5e5e5',
		 	'img_border_radius' => '0',
		 	'image_width' => '100',
		 	'image_height' => '100',
		 	'disable_rating' => '',
		 	'animation_names' => '',
		 ));
		echo $args['before_widget'];
		$animation = trim( $instance['animation_names']  ) ? 'wow '.$instance['animation_names'] : '';
		$border_width = trim($instance['img_border_color'] != '') ? '1' : '0';
		$no_of_products = ( $instance['display_no_of_products'] == '' ) ? '-1' : $instance['display_no_of_products'];
		echo '<div class="shop_product_list_wrapper woocommerce '.$animation.'">';
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
				<div class="shop-products">
					<div class="shop-produt-image align<?php echo $instance['image_align']; ?>" style="border:<?php echo $border_width.'px solid ' .$instance['img_border_color'] ?>; border-radius:<?php echo $instance['img_border_radius'] ?>px;">
						<a href="<?php the_permalink(); ?>">
							<?php 
							//if (has_post_thumbnail()) {
							$image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'' ); 
							if($image_src){
								echo '<img src="'.kaya_image_resize($image_src[0], $instance['image_width'], $instance['image_height'], 't').'" class="" alt="'.get_the_title().'"  />';
							}
							else{
              echo '<img src="'.constant(strtoupper($petstore_plugin_name).'_PLUGIN_URL').'images/product_list.jpg" >';
          }
							?>
						</a>
					</div>			
					<div class="shop-product-details description" style="text-align:<?php echo $instance['image_align']; ?>;" data-hover-color="<?php echo $instance['title_hover_color']; ?>">
						<h5><a style="color:<?php echo $instance['title_color']; ?>" href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>
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
						<?php if ( $price_html = $product->get_price_html() ) : ?>
							<span class="price" style="color:<?php echo $instance['price_color']; ?>!important;"><?php echo $product->get_price_html(); ?></span>	
						<?php endif;  ?>
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
		 	'display_no_of_products' => '',
		 	'title_color' => '#333333',
		 	'title_hover_color' => '#de4a4a',
		 	'price_color' => '#555555',
		 	'rating_color' => '#de4a4a',
		 	'image_align' => 'left',
		 	'img_border_color' => '#e5e5e5',
		 	'img_border_radius' => '0',
		 	'image_width' => '100',
		 	'image_height' => '100',
		 	'disable_rating' => '',
		 	'animation_names' => '',
		 ));
	 ?>
	<script type='text/javascript'>
	jQuery(document).ready(function($) {
		jQuery('.product_list_color_pickr').each(function(){
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
  	</div>
  	<div class="input-elements-wrapper">
		<p class="one_fourth img_radio_select">
			<label for="<?php echo $this->get_field_id('image_align') ?>"> <?php _e('Product Image Position',$petstore_plugin_name) ?>  </label>
			<label>
				<input type="radio" id="<?php echo $this->get_field_id( 'image_align' ); ?>" name="<?php echo $this->get_field_name( 'image_align' ); ?>" value="center" <?php checked( $instance['image_align'], 'center' ); ?>>  <img alt="Align Center" alt="Align Center" src="<?php echo  constant(strtoupper($petstore_plugin_name).'_PLUGIN_URL').'images/align_center.png' ?>">
			</label>
			<label>
				<input type="radio" id="<?php echo $this->get_field_id( 'image_align' ); ?>" name="<?php echo $this->get_field_name( 'image_align' ); ?>" value="left" <?php checked( $instance['image_align'], 'left' ); ?>> <img alt="Align Left" alt="Align Left" src="<?php echo  constant(strtoupper($petstore_plugin_name).'_PLUGIN_URL').'images/align_left.png' ?>">
			</label>
			<label> 
				<input type="radio" id="<?php echo $this->get_field_id( 'image_align' ); ?>" name="<?php echo $this->get_field_name( 'image_align' ); ?>" value="right" <?php checked( $instance['image_align'], 'right' ); ?>>  <img alt="Align Right"  src="<?php echo  constant(strtoupper($petstore_plugin_name).'_PLUGIN_URL').'images/align_right.png' ?>">
			</label>
		</p>
		<p class="one_fourth">
			<label for="<?php echo $this->get_field_id('image_width'); ?>"> <?php _e('Image Width & Height',$petstore_plugin_name) ?>  </label>
			<input type="text" name="<?php echo $this->get_field_name('image_width') ?>" id="<?php echo $this->get_field_id('image_width') ?>" class="small-text" value="<?php echo $instance['image_width'] ?>" /> X
			<input type="text" name="<?php echo $this->get_field_name('image_height') ?>" id="<?php echo $this->get_field_id('image_height') ?>" class="small-text" value="<?php echo $instance['image_height'] ?>" />
			<small><?php _e('PX',$petstore_plugin_name); ?></small>
		</p>
		<p class="one_fourth">
		  <label for="<?php echo $this->get_field_id('img_border_color') ?>">  <?php _e('Image Border Color',$petstore_plugin_name) ?>  </label>
		  <input type="text" class="widefat product_list_color_pickr" id="<?php echo $this->get_field_id('img_border_color') ?>" name="<?php echo $this->get_field_name('img_border_color') ?>" value="<?php echo esc_attr($instance['img_border_color']) ?>" />
		</p>
		<p class="one_fourth_last">
		  <label for="<?php echo $this->get_field_id('img_border_radius') ?>">  <?php _e('Image Radius',$petstore_plugin_name) ?>  </label>
		  <input type="text" class="small-text" id="<?php echo $this->get_field_id('img_border_radius') ?>" name="<?php echo $this->get_field_name('img_border_radius') ?>" value="<?php echo esc_attr($instance['img_border_radius']) ?>" />
		  <small><?php _e('px', $petstore_plugin_name) ?></small>
		</p>
		<p class="one_fourth" style="clear:both;">
		  <label for="<?php echo $this->get_field_id('title_color') ?>">  <?php _e('Title Color',$petstore_plugin_name) ?>  </label>
		  <input type="text" class="widefat product_list_color_pickr" id="<?php echo $this->get_field_id('title_color') ?>" name="<?php echo $this->get_field_name('title_color') ?>" value="<?php echo esc_attr($instance['title_color']) ?>" />
		</p>
		<p class="one_fourth">
		  <label for="<?php echo $this->get_field_id('title_hover_color') ?>">  <?php _e('Title Hover Color',$petstore_plugin_name) ?>  </label>
		  <input type="text" class="widefat product_list_color_pickr" id="<?php echo $this->get_field_id('title_hover_color') ?>" name="<?php echo $this->get_field_name('title_hover_color') ?>" value="<?php echo esc_attr($instance['title_hover_color']) ?>" />
		</p>
		<p class="one_fourth">
		  <label for="<?php echo $this->get_field_id('price_color') ?>">  <?php _e('Price Color',$petstore_plugin_name) ?>  </label>
		  <input type="text" class="widefat product_list_color_pickr" id="<?php echo $this->get_field_id('price_color') ?>" name="<?php echo $this->get_field_name('price_color') ?>" value="<?php echo esc_attr($instance['price_color']) ?>" />
		</p>
		<p class="one_fourth_last">
		  <label for="<?php echo $this->get_field_id('rating_color') ?>">  <?php _e('Rating Color',$petstore_plugin_name) ?>  </label>
		  <input type="text" class="widefat product_list_color_pickr" id="<?php echo $this->get_field_id('rating_color') ?>" name="<?php echo $this->get_field_name('rating_color') ?>" value="<?php echo esc_attr($instance['rating_color']) ?>" />
		</p>
		<p class="one_fourth" style="clear:both;">
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
petstore_kaya_register_widgets('shop-product-list', __FILE__);
?>