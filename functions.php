<?php

/* Limite de Un por lote envio API-Rest */
function to_large_api_variations( $limit ) {
  $limit = 400;

  return $limit;
}
add_filter( 'woocommerce_rest_batch_items_limit', 'to_large_api_variations' );

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


//widget esquerdo header
function esquerdo_header_sidebar() {
  register_sidebar(
   array (
       'name' => __( 'Espaço lado esquerdo do Cabeçalho', 'essone'),
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
       'name' => __( 'Espaço Central do Cabeçalho', 'essone'),
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
       'name' => __( 'Espaço Direito do Cabeçalho', 'essone'),
       'id' => 'right_header_sidebar',
       'description' => __( 'Shortcodes geralmente usados = [user-icon][whats-icon][cart-ess]', 'essone' ),
       'before_widget' => '<div class="py-3 pl-2">',
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
       'name' => __( 'Cabeçalho central do site', 'essone'),
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
       'description' => __( 'Footer 1 essone theme', 'essone' ),
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
       'description' => __( 'Footer 2 essone theme', 'essone' ),
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
       'description' => __( 'Footer 3 essone theme', 'essone' ),
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
 add_filter( 'woocommerce_loop_add_to_cart_link', 'essone_message_after_prices', 10, 3 );
function essone_message_after_prices( $add_to_cart_html, $product, $args ){
    if( !$product->is_in_stock() ){
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
    if ( ! is_singular( array( 'product' ) ) && get_post_type( $id ) === 'product' && strlen( $title ) > $title_prod ) {
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