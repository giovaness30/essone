<?php
 header('Pragma: public');
 header('Content-Type: text/css; charset=UTF-8');
?>

<!-- /*----------- HEADER 
----------------------------------------*/ -->
.widget-right a{
    color: <?php echo get_theme_mod('color_text_header_content'); ?>;
}
.widget-right {<?php echo get_theme_mod('css_header_right_settings'); ?>}

.header-class{
    background-color: <?php echo get_theme_mod('color_headerbg_content'); ?>;
}

<!-- /*----------- BODY
----------------------------------------*/ -->
.body{
    background-color: <?php echo get_theme_mod('color_bodybg_content'); ?>;
}


<!-- /*----------- WOOCOMMERCE
----------------------------------------*/ -->
.woocommerce button.button.alt{
    background-color: <?php echo get_theme_mod('color_primary'); ?>;
}
.woocommerce button.button.alt:hover{
    background-color: <?php echo get_theme_mod('color_primary_hover'); ?>;
}

<!-- /* Alinhamento Foto pagina do produto */ -->
.woocommerce-product-gallery__image {
    height: <?php if( get_theme_mod( 'alt_img_single' ) != ''){echo get_theme_mod('alt_img_single'); }else{echo '30rem';}?>;
    border-radius: 10px 10px 0 0;
}
.woocommerce div.product div.images.woocommerce-product-gallery{
    width: <?php if( get_theme_mod( 'larg_img_single' ) != ''){echo get_theme_mod('alt_img_single'); }else{echo '23rem';}?>;
}

<!-- /*----------- FOOTER
----------------------------------------*/ -->

#footer-widget{
    background-color: <?php echo get_theme_mod('color_widgetsbg_content'); ?>;
}