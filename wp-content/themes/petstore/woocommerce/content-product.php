<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product,$petshop_plugin_name;
// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php post_class(); ?>>
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
					echo '<img src="'.get_template_directory_uri().'/images/woocommerce.jpg" style="width:100%; height:auto!important;">';
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
						//esc_html( $product->add_to_cart_text())
					),
					$product );	?>
			</div>
		</div>			
		<div class="shop-product-details">
			<?php if ( $price_html = $product->get_price_html() ) : ?>
				<h4 class="price"><?php echo $product->get_price_html(); ?></h4>	
			<?php endif; 
			$disable_shop_page_content = get_theme_mod('disable_shop_page_content') ? get_theme_mod('disable_shop_page_content') : '0';  ?>
			<h3 class="product_name"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
			<?php if($disable_shop_page_content != 1) { ?>
			<p class="product_description">
				<?php $post_excerpt = $post->post_excerpt; /* or you can use get_the_title() */
				echo $post_excerpt = substr($post_excerpt, 0, 50); ?>
			</p>
				<?php } ?>
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
</li>