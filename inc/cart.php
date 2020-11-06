<?php
//CARRINHO

if ( ! function_exists( 'newstore_woocommerce_cart_link_fragment' ) ) {
  /**
   * Cart Fragments.
   *
   * Ensure cart contents update when products are added to the cart via AJAX.
   *
   * @param array $fragments Fragments to refresh via AJAX.
   * @return array Fragments to refresh via AJAX.
   */
  function newstore_woocommerce_cart_link_fragment( $fragments ) {
    ob_start();
    newstore_woocommerce_header_cart();
    $fragments['#site-header-cart'] = ob_get_clean();
    return $fragments;
  }
}
add_filter( 'woocommerce_add_to_cart_fragments', 'newstore_woocommerce_cart_link_fragment' );

function newstore_tfwctool_wishlist_link(){
  if (class_exists('TFWC_TOOL') && class_exists('TFWC_TOOL_Wishilst')) {
    
    ?>
    <a class="wishlist-link-contents" href="<?php echo esc_url(tfwctool_get_wishlist_url()); ?>">
      <div class="wishlist-link-contents-inner">
        <span class="icon"><i class="fa fa-heart"></i></span>
        <span class="count"><?php echo absint( TFWC_TOOL()->wishlist->get_user_wishlist_products_count() ); ?></span>
      </div>
    </a>
    <?php
  }
}
function newstore_tfwctool_wishlist_link_fragment($fragments){
  
  ob_start();
  newstore_tfwctool_wishlist_link();
  $fragments['.wishlist-link-contents'] = ob_get_clean();
  return $fragments;
}
add_filter( 'tfwctool_add_to_wishlist_fragments', 'newstore_tfwctool_wishlist_link_fragment' );

if ( ! function_exists( 'newstore_woocommerce_cart_link' ) ) {
  /**
   * Cart Link.
   *
   * Displayed a link to the cart including the number of items present and the cart total.
   *
   * @return void
   */
  function newstore_woocommerce_cart_link() {
    ?>
    <a class="cart-link-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
      <div class="header-cart-top-link-left">
      <span class="icon"><i class="fa fa-shopping-basket"></i></span>
      <span class="count"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
      </div>
      <div class="header-cart-top-link-right">
        <div class="label"><?php esc_html_e( 'Total', 'newstore' ); ?></div>
        <div class="amount"><?php echo WC()->cart->get_cart_subtotal();  ?></div>
      </div>
    </a>
    <?php
  }
}

if ( ! function_exists( 'newstore_woocommerce_header_cart' ) ) {
  /**
   * Display Header Cart.
   *
   * @return void
   */
  function newstore_woocommerce_header_cart() {
    ?>
    <div id="site-header-cart" class="site-header-cart woocommerce">
      <div class="site-header-cart-inner">
        <?php newstore_woocommerce_cart_link(); ?>
        <div class="header-cart-conetnts">
          <div class="header-cart-top">
          <?php
            $item_count_text = sprintf(
              /* translators: number of items in the mini cart. */
              _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'newstore' ),
              WC()->cart->get_cart_contents_count()
            );
          ?>
          <div class="header-cart-top-left"><?php echo esc_html($item_count_text); ?></div>
          <div class="header-cart-top-right"><a class="header-cart-top-link" href="<?php echo esc_url( wc_get_cart_url() ); ?>"><?php esc_html_e( 'Carrinho', 'newstore' ); ?></a></div>
          </div>
          <div class="header-cart-products">
            <?php 
              $instance = array(
                'title' => '',
              );
              wc_get_template_part('cart/mini-cart');
             ?>
          </div>
        </div>
      </div>
    </div>
    <?php
  }
}

function newstore_product_view_style(){
  ?>
  <div class="product-view-change-container">
    <span class="product-view-type-item view-type-grid active" data-item="grid"><i class="fa fa-th"></i></span>
    <span class="product-view-type-item view-type-list" data-item="list"><i class="fa fa-bars"></i></span>
    <!-- <span class="product-view-type-item view-type-block" data-item="block"><i class="fa fa-stop"></i></span> -->
  </div>
  <?php
}
if (get_theme_mod( 'themefarmer_show_product_view_style', true )) {
  add_action( 'woocommerce_before_shop_loop', 'newstore_product_view_style', 30);
}


function newstore_woocommerce_loop_porduct_start(){
  ?>
  <div class="product-inner">
    <div class="tf-loop-product-img-container">
      <div class="tf-loop-product-thumbs">
        <a class="tf-loop-product-thumbs-link" href="<?php the_permalink(); ?>">
  <?php
}

function newstore_woocommerce_loop_porduct_image_end(){
  ?>
        </a>
      </div><!-- .tf-loop-product-thumbs -->
      <?php do_action('newstore_action_before_image_end'); ?>
    </div><!-- .tf-loop-product-img-container -->
  <?php
}

function newstore_woocommerce_loop_porduct_info_start(){
  ?>
  <div class="tf-loop-product-info-container">
  <?php
}

function newstore_woocommerce_loop_porduct_end(){
  ?>
    </div><!-- .tf-loop-product-info-container -->
  </div><!-- .porduct-inner -->
  <?php
}


// remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
// add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 7);
// add_action( 'woocommerce_before_shop_loop_item', 'newstore_woocommerce_loop_porduct_start', 0);
// add_action( 'woocommerce_after_shop_loop_item', 'newstore_woocommerce_loop_porduct_end', 9999);

// // add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 100);
// // remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 3);

// add_action( 'woocommerce_before_shop_loop_item_title', 'newstore_woocommerce_loop_porduct_image_end', 120);
// add_action( 'woocommerce_shop_loop_item_title', 'newstore_woocommerce_loop_porduct_info_start', 1);



// add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_single_excerpt', 30);
