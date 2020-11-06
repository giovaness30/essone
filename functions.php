<?php

//Adiciona style
function load_stylesheets()
{
	wp_register_style('stylesheet', get_template_directory_uri() . '/style.css', '', 1, 'all');
	wp_enqueue_style('stylesheet');

}
add_action('wp_enqueue_scripts', 'load_stylesheets');

//Suporte para tema personalizado
function essone_theme_support(){

    add_theme_support('custom-logo');
    add_theme_support( 'post_thumbnails' );
    set_post_thumbnail_size( 200 , 150, true);
  }
  add_action('after_setup_theme', 'essone_theme_support');

//Habilita Suporte Woocommerce ao Tema.
function essone_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'essone_add_woocommerce_support' );

//habilitar a galeria/zoom do woocommerce no tema.
add_theme_support ('wc-product-gallery-zoom');
add_theme_support ('wc-product-gallery-lightbox');
add_theme_support ('wc-product-gallery-slider');

//Adicionar Estrelas de avaliação nos produtos home
// function essone_woocommerce_product_get_rating_html($html, $rating, $count){
//     if($rating > 0 ){
//       $html = '<div class="star-rating" data-toggle="tooltip" title="'.floatval($rating).'">' . wc_get_star_rating_html( $rating, $count ) . '</div>';
//     }else{
//       $html = '<div class="star-rating" data-toggle="tooltip" title="'.esc_attr__( 'No Review', 'newstore' ).'">' . wc_get_star_rating_html( $rating, $count ) . '</div>';
//     }
//     return $html;
//   }
//   add_filter( 'woocommerce_product_get_rating_html', 'essone_woocommerce_product_get_rating_html', 10, 3 );



