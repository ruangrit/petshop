<?php
/**
 * Related Products
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;
 $related_product_columns = get_theme_mod('related_product_columns') ? get_theme_mod('related_product_columns') : '4';
$related = $product->get_related( $posts_per_page );

if ( sizeof( $related ) == 0 ) return;

$args = apply_filters( 'woocommerce_related_products_args', array(
	'post_type'            => 'product',
	'ignore_sticky_posts'  => 1,
	'no_found_rows'        => 1,
	'posts_per_page'       => -1,
	'orderby'              => $orderby,
	'post__in'             => $related,
	'post__not_in'         => array( $product->id )
) );

$products = new WP_Query( $args );

$woocommerce_loop['columns'] = $related_product_columns;

if ( $products->have_posts() ) : ?>
<script type="text/javascript">
(function($) {
  "use strict";
  $(function() {
  	var responsive2_column = ( ( <?php echo $related_product_columns; ?> == '4' ) || ( <?php echo $related_product_columns; ?> == '3' ) ) ? '2' : <?php echo $related_product_columns; ?>;
	$(".related-product-slider").owlCarousel({
                navigation : false,
                autoplay : true,
                stopOnHover : true,
                pagination  : false,
                margin:10,
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
                          items:<?php echo $related_product_columns; ?>,
                          loop : true,
                      },
                }, 
              });
	});
})(jQuery);
</script>
<div class="related products">
	<h2><?php _e( 'Related Products', 'woocommerce' ); ?></h2>
	<div class="related-product-slider">
			<?php //woocommerce_product_loop_start(); ?>
			<?php while ( $products->have_posts() ) : $products->the_post(); 
			global $post,$product, $woocommerce_loop; ?>
			<div class="shop-products">
				<div class="shop-produt-image">
							<?php if ( $product->is_on_sale() ) : ?>
							<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale-ribbon1"><span class="onsales">' . __( 'Sale!', 'woocommerce' ) . '</span></span>', $post, $product ); ?>
							<?php endif; ?>		
							<a href="<?php the_permalink(); ?>">
								<?php //display product thumbnail
								$image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'kaya-gallery' ); 
								if ( $image_src ) { 
									$params = array('width' => '500', 'height' => '500', 'crop' => true);
									$image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'kaya-gallery' ); 
									echo woocommerce_get_product_thumbnail();
									}
								else{
									echo '<img src="'.get_template_directory_uri().'/images/woocommerce.jpg" style="width:300px; height:300px;">';
								}
								?>
								<span class="opacity_bg_color"></span>
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
				<div class="shop-product-details">
						<?php if ( $price_html = $product->get_price_html() ) : ?>
						<h4 class="price"><?php echo $product->get_price_html(); ?></h4>	
							<?php endif;  ?>
						<h3 class="product_name"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
						<p class="product_description">
							<?php $post_excerpt = $post->post_excerpt; /* or you can use get_the_title() */
								echo $post_excerpt = substr($post_excerpt, 0, 50); ?></p>
							<?php if ($average = $product->get_average_rating()) : ?>			
						<div class="product-rating">
							<?php echo '<div class="star-rating" title="'.sprintf(__( 'Rated %s out of 5', 'woocommerce' ), $average).'"><span style="width:'.( ( $average / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">'.$average.'</strong> '.__( 'out of 5', 'woocommerce' ).'</span></div>'; ?>
						</div>
						<?php
						else:
						echo '<div class="star-rating" title="'.sprintf(__( 'Rated %s out of 5', 'woocommerce' ), $average).'"><span style="width:'.( ( $average / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">'.$average.'</strong> '.__( 'out of 5', 'woocommerce' ).'</span></div>';
						endif; ?>
				</div>
			</div>
			<?php endwhile; // end of the loop. ?>
	</div>
</div>
<?php endif;
wp_reset_postdata(); ?>
