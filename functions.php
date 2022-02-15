<?php

//Title site
function essone_title_tag(){
  add_theme_support('title-tag');
}
add_action('after_setup_theme', 'essone_title_tag');

//Adiciona style
function load_stylesheets()
{
	wp_register_style('stylesheet', get_template_directory_uri() . '/style.css', '', 1, 'all');
  wp_enqueue_style('stylesheet');
  
  wp_register_style('stylesheet-cart', get_template_directory_uri() . '/inc/css/style-cart.css', '', 1, 'all');
  wp_enqueue_style('stylesheet-cart');
}
add_action('wp_enqueue_scripts', 'load_stylesheets');

//Adiciona custom arquivos
include( get_template_directory() . '/inc/cart.php' ) ;
require_once get_template_directory() . '/inc/custom-ess.php';

include( get_template_directory() . '/inc/customizer.php');
include( get_template_directory() . '/inc/css/customizer-css.php');

//Suporte para tema personalizado
function essone_theme_support(){

    add_theme_support('custom-logo');
    add_theme_support( 'post_thumbnails' );
  }
  add_action('after_setup_theme', 'essone_theme_support');

//Habilita Suporte Woocommerce ao Tema.
function essone_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

// Habilita Menus
function register_essone_menu () {
  register_nav_menu ('header-menu', __ ('Menu Cabeçalho'));
  register_nav_menu ('header-menu2', __ ('Menu Páginas'));
}

add_action ('init', 'register_essone_menu');

add_action( 'after_setup_theme', 'essone_add_woocommerce_support' );

//habilitar a galeria/zoom do woocommerce no tema.
add_theme_support ('wc-product-gallery-zoom');
add_theme_support ('wc-product-gallery-lightbox');
add_theme_support ('wc-product-gallery-slider');


//Adicionar Estrelas de avaliação nos produtos home
function essone_woocommerce_product_get_rating_html($html, $rating, $count){
    if($rating > 0 ){
      $html = '<div class="star-rating" data-toggle="tooltip" title="'.floatval($rating).'">' . wc_get_star_rating_html( $rating, $count ) . '</div>';
    }else{
      $html = '<div class="star-rating" data-toggle="tooltip" title="'.esc_attr__( 'No Review', 'newstore' ).'">' . wc_get_star_rating_html( $rating, $count ) . '</div>';
    }
    return $html;
  }
  add_filter( 'woocommerce_product_get_rating_html', 'essone_woocommerce_product_get_rating_html', 10, 3 );

//widget esquerdo top-bar
function left_top_bar() {
  register_sidebar(
   array (
       'name' => __( 'Barra do Topo - Widget Esquerdo', 'essone'),
       'id' => 'left_top_bar',
       'description' => __( 'Shortcodes = [topbar-horario] ,  | Sem Conteúdo, a barra não aparecerá.', 'essone' ),
       'before_widget' => '',
       'after_widget' => '',
       'before_title' => '',
       'after_title' => '',
   )
  );
 }
 add_action( 'widgets_init', 'left_top_bar' );

//widget central top-bar
function center_top_bar() {
  register_sidebar(
   array (
       'name' => __( 'Barra do Topo - Widget do meio', 'essone'),
       'id' => 'center_top_bar',
       'description' => __( 'Sem Conteúdo, a barra não aparecerá.', 'essone' ),
       'before_widget' => '',
       'after_widget' => '',
       'before_title' => '',
       'after_title' => '',
   )
  );
 }
 add_action( 'widgets_init', 'center_top_bar' );

//widget direito top-bar
 function right_top_bar() {
  register_sidebar(
   array (
       'name' => __( 'Barra do Topo - Widget Direito', 'essone'),
       'id' => 'right_top_bar',
       'description' => __( 'Utilizado quando o logo do site esta desabilitado em "Personalizar Tema" [logo-theme] = Mostra o logo', 'essone' ),
       'before_widget' => '',
       'after_widget' => '',
       'before_title' => '',
       'after_title' => '',
   )
  );
 }
 add_action( 'widgets_init', 'right_top_bar' );

//widget esquerdo header
function esquerdo_header_sidebar() {
  register_sidebar(
   array (
       'name' => __( 'Cabeçalho - Widget Esquerdo', 'essone'),
       'id' => 'left_header_sidebar',
       'description' => __( 'Utilizado quando o logo do site esta desabilitado em "Personalizar Tema" [logo-theme] = Mostra o logo', 'essone' ),
       'before_widget' => '',
       'after_widget' => '',
       'before_title' => '',
       'after_title' => '',
   )
  );
 }
 add_action( 'widgets_init', 'esquerdo_header_sidebar' );

//widget center header
function center_header_sidebar() {
  register_sidebar(
   array (
       'name' => __( 'Cabeçalho - Widget Central', 'essone'),
       'id' => 'center_header_sidebar',
       'description' => __( 'Center Header essone theme', 'essone' ),
       'before_widget' => '',
       'after_widget' => '',
       'before_title' => '<h3 class="widget-title">',
       'after_title' => '</h3>',
   )
  );
 }
 add_action( 'widgets_init', 'center_header_sidebar' );

//widget right header
function right_header_sidebar() {
  register_sidebar(
   array (
       'name' => __( 'Cabeçalho - Widget Direito', 'essone'),
       'id' => 'right_header_sidebar',
       'description' => __( 'Shortcodes geralmente usados = [user-icon][whats-icon][cart-ess]', 'essone' ),
       'before_widget' => '<div class="py-3 pl-2 d-flex align-items-center">',
       'after_widget' => '</div>',
       'before_title' => '<span class="hidden">',
       'after_title' => '</span>',
   )
  );
 }
 add_action( 'widgets_init', 'right_header_sidebar' );

//widget central Cabeçalho do site
function header_center_sidebar() {
  register_sidebar(
   array (
       'name' => __( 'Cabeçalho - Widget Abaixo Central', 'essone'),
       'id' => 'header_center_sidebar',
       'description' => __( 'Espaço Geralmente Utilizado para Cetegorias e Pesquisas', 'essone' ),
       'before_widget' => '<div class="widget-content headercenter" style="">',
       'after_widget' => "</div>",
       'before_title' => '<h3 class="widget-title">',
       'after_title' => '</h3>',
   )
  );
 }
add_action( 'widgets_init', 'header_center_sidebar' );

//widget Menu Principal
function menu_principal_sidebar() {
  register_sidebar(
   array (
       'name' => __( 'Menu Principal', 'essone'),
       'id' => 'menu_principal_sidebar',
       'description' => __( 'Espaço Utilizado para Menus e MegaMenu', 'essone' ),
       'before_widget' => '<div class="widget-content" style="">',
       'after_widget' => "</div>",
       'before_title' => '<h3 class="widget-title">',
       'after_title' => '</h3>',
   )
  );
 }
add_action( 'widgets_init', 'menu_principal_sidebar' );

//widget Primeiro Widget do corpo so site
function firt_body_sidebar() {
  register_sidebar(
   array (
       'name' => __( 'Primeiro Espaço do corpo do site', 'essone'),
       'id' => 'firt_body_sidebar',
       'description' => __( 'Espaço Geralmente Utilizado para Menus', 'essone' ),
       'before_widget' => '<div class="widget-content" style="">',
       'after_widget' => "</div>",
       'before_title' => '<h3 class="widget-title">',
       'after_title' => '</h3>',
   )
  );
 }
add_action( 'widgets_init', 'firt_body_sidebar' );

//widget Slide Home Page
function slide_sidebar() {
  register_sidebar(
   array (
      'name' => __( 'Slide Home', 'essone'),
      'id' => 'slide_sidebar',
      'description' => __( 'Altere o Modelo de pagina da home para "Slider Home" e adiciona o Shortcode aqui!', 'essone' ),
      'before_widget' => '<div class="widget-content" style="margin:0">',
      'after_widget' => "</div>",
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
  )
);
}
add_action( 'widgets_init', 'slide_sidebar' );

//widget left Home Page
function left_sidebar() {
  register_sidebar(
   array (
      'name' => __( 'Widgets Lateral da pagina', 'essone'),
      'id' => 'left_sidebar',
      'description' => __( 'Altere o Modelo de pagina da home para "Slider Home" e adiciona o Shortcode aqui!', 'essone' ),
      'before_widget' => '<div class="widget-content" style="margin:0">',
      'after_widget' => "</div>",
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
  )
);
}
add_action( 'widgets_init', 'left_sidebar' );

//widget footer 1
function footer1_sidebar() {
  register_sidebar(
   array (
       'name' => __( 'Rodape 1 Esquerdo', 'essone'),
       'id' => 'footer1_sidebar',
       'description' => __( 'Shortcodes = [logo-theme] ,  | Sem Conteúdo, a barra não aparecerá.', 'essone' ),
       'before_widget' => '<div class="widget-content">',
       'after_widget' => "</div>",
       'before_title' => '<h4 class="widget-title">',
       'after_title' => '</h4>',
   )
  );
 }
add_action( 'widgets_init', 'footer1_sidebar' );

//widget footer 2
function footer2_sidebar() {
  register_sidebar(
   array (
       'name' => __( 'Rodape 2 Centro', 'essone'),
       'id' => 'footer2_sidebar',
       'description' => __( 'Shortcodes = [end-loja] ,  | Sem Conteúdo, a barra não aparecerá.', 'essone' ),
       'before_widget' => '<div class="widget-content">',
       'after_widget' => "</div>",
       'before_title' => '<h4 class="widget-title">',
       'after_title' => '</h4>',
   )
  );
 }
add_action( 'widgets_init', 'footer2_sidebar' );

//widget footer 3
function footer3_sidebar() {
  register_sidebar(
   array (
       'name' => __( 'Rodape 3 Direito', 'essone'),
       'id' => 'footer3_sidebar',
       'description' => __( 'Shortcodes = [contato-loja] ,  | Sem Conteúdo, a barra não aparecerá.', 'essone' ),
       'before_widget' => '<div class="widget-content">',
       'after_widget' => "</div>",
       'before_title' => '<h4 class="widget-title">',
       'after_title' => '</h4>',
   )
  );
 }
add_action( 'widgets_init', 'footer3_sidebar' );

//widget shop-mobile
function shop_mobile_lf_sidebar() {
  register_sidebar(
   array (
       'name' => __( 'Div Flutuante Rodape Esquerdo', 'essone'),
       'id' => 'shop_mobile_lf_sidebar',
       'description' => __( 'Barra Rodapé Flutuante Esquerdo essone theme', 'essone' ),
       'before_widget' => '<div class="">',
       'after_widget' => "</div>",
       'before_title' => '',
       'after_title' => '',
   )
  );
 }
add_action( 'widgets_init', 'shop_mobile_lf_sidebar' );

function shop_mobile_rg_sidebar() {
  register_sidebar(
   array (
       'name' => __( 'Div Flutuante Rodape Direito', 'essone'),
       'id' => 'shop_mobile_rg_sidebar',
       'description' => __( 'Barra Rodapé Flutuante Direito essone theme', 'essone' ),
       'before_widget' => '<div class="">',
       'after_widget' => "</div>",
       'before_title' => '',
       'after_title' => '',
   )
  );
 }
add_action( 'widgets_init', 'shop_mobile_rg_sidebar' );

// Adiciona CSS dimanico ao tema
function theme_enqueue_styles() {
  wp_enqueue_style('dynamic-css', admin_url('admin-ajax.php') . '?action=dynamic_css', null, null);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

//######################### ALTERAÇÔES WOOCOMMERCE #########################//

//Texto Fora de estoque

// Faz verificação do estoque vaiações.
function is_variable_product_out_of_stock($product) {
  $variation_ids = $product->get_visible_children();
  foreach($variation_ids as $variation_id) {
      $variation = wc_get_product($variation_id);
      if ($variation->is_in_stock())
          return false;
  }
  return true;
}

// Aplica o filtro.
 add_filter( 'woocommerce_loop_add_to_cart_link', 'essone_message_after_prices', 10, 3 );
function essone_message_after_prices( $add_to_cart_html, $product, $args ){
    if( !$product->is_in_stock() or ($product->is_type('variable') and is_variable_product_out_of_stock($product)) ){
      global $woocommerce;
        $add_to_cart_html = '<div class="essone-out-of-stock">Fora de Estoque</div>' . $add_to_cart_html;
    }
    return $add_to_cart_html;
}


//Remove senha dificil
function wc_ninja_remove_password_strength() {
  if ( wp_script_is( 'wc-password-strength-meter', 'enqueued' ) ) {
    wp_dequeue_script( 'wc-password-strength-meter' );
  }
}
add_action( 'wp_print_scripts', 'wc_ninja_remove_password_strength', 100 );

//Rediciona apos o logout
add_action('wp_logout','auto_redirect_after_logout');
function auto_redirect_after_logout(){
  wp_redirect( home_url() );
  exit();
}

//Adiciona Estilo Bootstrap no input.
add_filter('woocommerce_form_field_args',  'wc_form_field_args',10,3);
  function wc_form_field_args($args, $key, $value) {
  $args['input_class'] = array( 'form-control' );
  return $args;
}

// Adicionar Nome e Sobrenome ao Cadastro pelo ENTRAR
// 1. Adiciona campos
add_action( 'woocommerce_register_form_start', 'bbloomer_add_name_woo_account_registration' );
 
function bbloomer_add_name_woo_account_registration() {
    ?>
 
    <p class="form-row form-row-first">
    <label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?> <span class="required">*</span></label>
    <input type="text" class="form-control input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
    </p>
 
    <p class="form-row form-row-last">
    <label for="reg_billing_last_name"><?php _e( 'Last name', 'woocommerce' ); ?> <span class="required">*</span></label>
    <input type="text" class="form-control input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
    </p>
 
    <div class="clear"></div>
 
    <?php
}
// 2. Valida campos
add_filter( 'woocommerce_registration_errors', 'bbloomer_validate_name_fields', 10, 3 );
 
function bbloomer_validate_name_fields( $errors, $username, $email ) {
    if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
        $errors->add( 'billing_first_name_error', __( '<strong>Error</strong>: First name is required!', 'woocommerce' ) );
    }
    if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {
        $errors->add( 'billing_last_name_error', __( '<strong>Error</strong>: Last name is required!.', 'woocommerce' ) );
    }
    return $errors;
}
// 3. Salva campos
add_action( 'woocommerce_created_customer', 'bbloomer_save_name_fields' );
 
function bbloomer_save_name_fields( $customer_id ) {
    if ( isset( $_POST['billing_first_name'] ) ) {
        update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
        update_user_meta( $customer_id, 'first_name', sanitize_text_field($_POST['billing_first_name']) );
    }
    if ( isset( $_POST['billing_last_name'] ) ) {
        update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
        update_user_meta( $customer_id, 'last_name', sanitize_text_field($_POST['billing_last_name']) );
    }
 
}

// // Remove País dos campos de Checkout
// add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
// function custom_override_checkout_fields( $fields ) {
// unset($fields['billing']['billing_country']); //remover país
// return $fields;
// }

/* Remove Painel e downloads do menu da conta de Usuarios */
add_filter ( 'woocommerce_account_menu_items', 'remove_my_account_items' );
function remove_my_account_items( $menu_links ){
unset( $menu_links['dashboard'] );
unset($menu_links['downloads']);
return $menu_links;
}

// Trabalha com Personalizar
add_action( 'customize_preview_init', 'cd_customizer' );
function cd_customizer() {
	wp_enqueue_script(
		  'cd_customizer',
		  get_template_directory_uri() . '/inc/js/customizer.js',
		  array( 'jquery','customize-preview' ),
		  '',
		  true
	);
}

/* Edição Notas */
if( get_theme_mod( 'note_order' ) != '' ){

function md_custom_woocommerce_checkout_fields( $fields ) 
{
    $note_order = get_theme_mod('note_order');
    $fields['order']['order_comments']['placeholder'] = $note_order;
    // $fields['order']['order_comments']['label'] = 'Add your special note';

    return $fields;
}
add_filter( 'woocommerce_checkout_fields', 'md_custom_woocommerce_checkout_fields' );

}

/* Adiciona nova função de usuário */
function essone_custom_roles(){
  remove_role('contributor_essone_lv');
  add_role('contributor_essone_lv','Colaborador Loja Virtual', array(
    'read_shop_order'         => true,
    'read_shop_orders'        => true,
    'edit_shop_orders'        => true,
    'edit_shop_order'         => true,
    'edit_others_shop_orders' => true,
    'read'                    => true,
    'edit_posts'              => true
));
}
add_action('init','essone_custom_roles');


/* Tamanho titulo de produtos */
add_filter( 'the_title', 'shorten_woo_product_title', 10, 2 );
function shorten_woo_product_title( $title, $id ) {
  if (get_theme_mod('essone_letter_title_prod') != ''){$title_prod = get_theme_mod('essone_letter_title_prod');}else{ $title_prod = 20;};
    if ( ! is_singular( array( 'product' ) ) && get_post_type( $id ) === 'product' && strlen( $title ) > $title_prod && in_the_loop() )  {
        return substr( $title, 0, $title_prod) . '…'; // change last number to the number of characters you want
    } else {
        return $title;
    }
}

// Customizar texto rodapé dos e-mails enviados
add_action( 'woocommerce_email_footer_text', 'essone_custom_email_footer_text', 10, 1 );
function essone_custom_email_footer_text( $get_option ){
         $get_option = bloginfo ('name');
    return $get_option;
}

// Altera Leia Mais dos produtos sem estoque
add_filter( 'gettext', 'ds_change_readmore_text', 20, 3 );

function ds_change_readmore_text( $translated_text, $text, $domain ) {
if ( ! is_admin() && $domain === 'woocommerce' && $translated_text === 'Leia mais') {
$translated_text = 'Ver mais';
}
return $translated_text;
}

/**
 * Validação se foi selecionado opção de entrega antes de fechar venda.
 */
if (get_theme_mod('no_default_method','hide') == 'show'){
  add_action( 'woocommerce_checkout_process', 'shipping_method_validation', 20 );
}

function shipping_method_validation() {
    if (! isset( $_POST['shipping_method'] ) ){
        wc_add_notice( __( "-->Por Favor Selecione a Forma de Entrega!", "woocommerce" ), 'error' );
    }
    if (! isset( $_POST['payment_method'] ) ){
      wc_add_notice( __( "-->Por Favor Selecione a forma de Pagamento!", "woocommerce" ), 'error' );

  }
}

/**
 * Excluir e ocultar categoria de produtos da página loja
 */
function custom_pre_get_posts_query( $q ) {
  $tax_query = (array) $q->get( 'tax_query' );
  $tax_query[] = array(
         'taxonomy' => 'product_cat',
         'field' => 'slug',
         'terms' => array( 'inativos' ), // Defina aqui qual categoria não mostrar.
         'operator' => 'NOT IN'
  );
  $q->set( 'tax_query', $tax_query );
}
add_action( 'woocommerce_product_query', 'custom_pre_get_posts_query' );

/* Limite de Unidades por lote envio API-Rest */
function to_large_api_variations( $limit ) {
  $limit = 400;

  return $limit;
}
add_filter( 'woocommerce_rest_batch_items_limit', 'to_large_api_variations' );

// Adiciona Botão na página do carrinho para limpar todos produtos.
add_action( 'woocommerce_cart_coupon', 'custom_woocommerce_empty_cart_button' );
function custom_woocommerce_empty_cart_button() {
	echo '<a href="' . esc_url( add_query_arg( 'empty_cart', 'yes' ) ) . '" class="button ml-4" title="' . esc_attr( 'Empty Cart', 'woocommerce' ) . '">' . esc_html( 'Limpar Carrinho', 'woocommerce' ) . '</a>';
}

add_action( 'wp_loaded', 'custom_woocommerce_empty_cart_action', 20 );
function custom_woocommerce_empty_cart_action() {
	if ( isset( $_GET['empty_cart'] ) && 'yes' === esc_html( $_GET['empty_cart'] ) ) {
		WC()->cart->empty_cart();

		$referer  = wp_get_referer() ? esc_url( remove_query_arg( 'empty_cart' ) ) : wc_get_cart_url();
		wp_safe_redirect( $referer );
	}
}

/*
 * Adicionar Ação em massa nas Opções para editar Pedidos Woocommerce
 * 
 */
add_filter( 'bulk_actions-edit-shop_order', 'my_register_bulk_action' ); // edit-shop_order is the screen ID of the orders page

function my_register_bulk_action( $bulk_actions ) {

$bulk_actions['mark_change_status_to_cancelled'] = 'Mudar status para cancelado'; // <option value="mark_awaiting_shipment">Order Cancel</option>
return $bulk_actions;

}

add_action( 'admin_action_mark_change_status_to_cancelled', 'my_bulk_process_custom_status' ); // admin_action_{action name}

function my_bulk_process_custom_status() {


// if an array with order IDs is not presented, exit the function
if( !isset( $_REQUEST['post'] ) && !is_array( $_REQUEST['post'] ) )
    return;

foreach( $_REQUEST['post'] as $order_id ) {

    $order = new WC_Order( $order_id );
    $order_note = 'Alteração em Massa:';
    $order->update_status( 'cancelled', $order_note, true ); // "my-shipment" is the order status name 
}

// of course using add_query_arg() is not required, you can build your URL inline
$location = add_query_arg( array(
        'post_type' => 'shop_order',
    'mark_change_status_to_cancelled' => 1, // mark_change_status_to_cancelled=1 is just the $_GET variable for notices
    'changed' => count( $_REQUEST['post'] ), // number of changed orders
    'ids' => join( $_REQUEST['post'], ',' ),
    'post_status' => 'all'
), 'edit.php' );

wp_redirect( admin_url( $location ) );
exit;

}
/*
 * Notices
 */
add_action('admin_notices', 'my_custom_order_status_notices');

function my_custom_order_status_notices() {

  global $pagenow, $typenow;

  if( $typenow == 'shop_order' 
  && $pagenow == 'edit.php'
  && isset( $_REQUEST['mark_change_status_to_cancelled'] )
  && $_REQUEST['mark_change_status_to_cancelled'] == 1
  && isset( $_REQUEST['changed'] ) ) {

      $message = sprintf( _n( 'Status do Pedidos Alterado', '%s order statuses changed.', $_REQUEST['changed'] ), number_format_i18n( $_REQUEST['changed'] ) );
      echo "<div class=\"updated\"><p>{$message}</p></div>";

  }
}
