<?php 
add_action( 'wp_head', 'cd_customizer_css');
add_action( 'login_head', 'cd_customizer_css');
function cd_customizer_css()
{
    ?>
        <style type="text/css">
            
            /* Painel Administrador Wordpress */
            <?php if (get_theme_mod('login_img_wp') !=''){?>
            .login h1 a {
            background-image: url('<?php echo get_theme_mod('login_img_wp') ?>') !important;
            background-size: 200px 100px;
            width: 200px;
            height: 100px;
            }
            <?php 
            
            function loginpage_custom_link() {
                return esc_url( home_url( '/' ) );
                }
            add_filter('login_headerurl','loginpage_custom_link');
            
            }else{echo'
                .login h1 a {
                    background-image: url( '.get_bloginfo('template_directory').'/images/custom-login-logo.png);
                    background-size: 200px 100px;
                    width: 200px;
                    height: 100px;
                    }';
                function loginpage_custom_link() {
                return 'https://essystem.com.br';
                }
                add_filter('login_headerurl','loginpage_custom_link');
            };?>

            <?php echo get_theme_mod('style_wp_painel') ?>

            /* Tema */
            .header-class{ background-color:<?php echo get_theme_mod('header_color', '#43C6E4'); ?>;}

            .header-class a, .text-muted{ color:<?php echo get_theme_mod('header_text_color', '#43C6E4'); ?>;}
            
            .body { background-color:#<?php echo get_theme_mod('background_color', '#43C6E4'); ?>;}

            .woocommerce button.button.alt, .woocommerce ul.products li.product .button{
            color:<?php echo get_theme_mod('primary_text_color', '#43C6E4'); ?>;}

            .woocommerce button.button.alt, .woocommerce ul.products li.product .button{
            background-color:<?php echo get_theme_mod('primary_color', '#43C6E4'); ?>;}

            .woocommerce button.button.alt:hover, .woocommerce ul.products li.product .button:hover{
            background-color: <?php echo get_theme_mod('primary_color_hover'); ?>;}

            .footer-widget{ background-color:<?php echo get_theme_mod('footer_widget_bg'); ?>;}

            .widget-right a{color: <?php echo get_theme_mod('color_text_header_content'); ?>;
            }
            .widget-right {<?php echo get_theme_mod('css_header_right_settings'); ?>}

            /* Alinhamento Foto pagina do produto */
            .woocommerce-product-gallery__image {
                height: <?php if( get_theme_mod( 'alt_img_single' ) != ''){echo get_theme_mod('alt_img_single'); }else{echo '30rem';}?>;
                border-radius: 10px 10px 0 0;
            }
            .woocommerce div.product div.images.woocommerce-product-gallery{
                width: <?php if( get_theme_mod( 'larg_img_single' ) != ''){echo get_theme_mod('alt_img_single'); }else{echo '23rem';}?>;
            }
            <!-- /* Alinhamento produto no Catálogo*/ -->
            .woocommerce ul.products li.product, .woocommerce-page ul.products li.product{
                height: <?php if( get_theme_mod( 'alt_prod_catalog' ) != ''){echo get_theme_mod('alt_prod_catalog'); }else{echo '100%';}?>;
            }
            .woocommerce ul.products li.product a img {/* Dimensão Imagem do produto */
                height: <?php if( get_theme_mod( 'alt_img_catalog' ) != ''){echo get_theme_mod('alt_img_catalog'); }else{echo '230px';}?>;


         </style>
    <?php
}