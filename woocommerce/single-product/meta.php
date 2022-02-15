<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>
<div class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<span class="sku_wrapper"><?php esc_html_e( 'SKU:', 'woocommerce' ); ?> <span class="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span></span>

	<?php endif; ?>

	<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</span>' ); ?>

	<?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'woocommerce' ) . ' ', '</span>' ); ?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>

<?php
$current_user = wp_get_current_user();

function add_afiliates_button(){
  if( in_array( 'contributor', (array) $current_user->roles  ) || in_array( 'shop_manager', (array) $current_user->roles  ) || in_array( 'administrator', (array) $current_user->roles  ) && is_plugin_active( '/pw-woocommerce-affiliates/pw-affiliates.php' )) {
    
    /* Chama conteudo do plugin wp-afiliate */
    $affiliate_code = pwwa_current_user_affiliate_code();
    global $pw_affiliates;
    $affiliate = new PW_Affiliate( $affiliate_code );

    /* Criação do link com caminho do produto atual */
    global $wp;
    $current_url = home_url(add_query_arg(array(), $wp->request));
    $urlCompleto = $current_url.'/?afili='.$affiliate->get_code().'';
    
    echo '<br><input type="text" id="link" name="link" value="'. $urlCompleto .'" readonly> <button class="btn-success" onClick="copiarTexto()">Link do Vendedor</button>';

  }
}
add_action('admin_init', 'add_afiliates_button');

global $wp;
$current_url = home_url(add_query_arg(array(), $wp->request));

if(get_theme_mod('essone_shared_prod_pag') !=''){
  echo'<br>Compartilhar:<a href="#" class="share ml-2"><img src="https://img.icons8.com/ios-glyphs/25/000000/share--v1.png"/></a><a class="ml-2" href="whatsapp://send?text='. $current_url .'" data-action="share/whatsapp/share"><img src="https://img.icons8.com/plasticine/35/000000/whatsapp.png"/></a>';
}
?>

