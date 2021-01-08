<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters(
	'woocommerce_single_product_image_gallery_classes',
	array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . ( $product->get_image_id() ? 'with-images' : 'without-images' ),
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	)
);
?>
<?php
    global $product;

    $attachment_ids = $product->get_gallery_image_ids();
    $image_links[] = get_the_post_thumbnail_url();
    $product_inc = 1;

    foreach( $attachment_ids as $attachment_id ) {
        $image_links[] = wp_get_attachment_url( $attachment_id );
    }
?>

<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
	<!-- Product Carousel -->
	<div id="product-carousel" class="carousel slide carousel-fade container" data-ride="carousel">
		<div class="carousel-inner" role="listbox">
			<?php
			    foreach( $image_links as $image_link_url ) { ?>
			    	<div style="width:100%; height:30rem" class="carousel-item <?php echo ($product_inc==1)?'active':''; ?>">
			        	<?php echo '<img style="width:100%; height:100%" class="img-rounded zoom prod-car-img img-thumbnail" src="'.$image_link_url.'" alt="Responsive image" />' ; ?>
			        </div>
			        <?php $product_inc++;
			    }
			?>
		</div>	
		<a class="carousel-control-prev" href="#product-carousel" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" style="background-color:#000;" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next text-dark" href="#product-carousel" role="button" data-slide="next">
			<span class="carousel-control-next-icon" style="background-color:#000;" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>						
	</div><!-- #Product Carousel -->
</div>
