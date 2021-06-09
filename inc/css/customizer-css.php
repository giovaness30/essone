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

            .top-bar{   
                background-color:<?php echo get_theme_mod('essone_topbar_bg_color'); ?> ; 
                color:<?php echo get_theme_mod('essone_topbar_txt_color'); ?> ;
                font-size:<?php echo get_theme_mod('essone_font_txt_topbar', '10'); ?>pt ;
            }

            /* Tema */
            .header-class{ background-color:<?php echo get_theme_mod('header_color'); ?>;}

            .header-class a, .text-muted{ color:<?php echo get_theme_mod('header_text_color', '#000000'); ?>;}
            .header-class a:hover, .text-muted{ color:<?php echo get_theme_mod('header_text_color_hover', '#1e73be'); ?>;}


            .cart-link-contents{
                color:<?php echo get_theme_mod('header_text_color'); ?> !important;
            }

            body a:hover{
                color:<?php echo get_theme_mod('primary_color_hover'); ?>
            }
            .body-woocommerce{
                background-color:#<?php echo get_theme_mod('background_color', '#f7f7f7'); ?>;

            }
            
            .body { background-color:#<?php echo get_theme_mod('background_color'); ?>;}

            .woocommerce button.button.alt, .woocommerce ul.products li.product .button{
            color:<?php echo get_theme_mod('primary_text_color', '#ffffff'); ?>;}

            .woocommerce button.button.alt, .woocommerce ul.products li.product .button{
            background-color:<?php echo get_theme_mod('primary_color'); ?>;}

            .woocommerce button.button.alt:hover, .woocommerce ul.products li.product .button:hover{
            background-color: <?php echo get_theme_mod('primary_color_hover'); ?>;}

            .woocommerce button.button{
                background-color: <?php echo get_theme_mod('primary_color'); ?> !important;
                color:<?php echo get_theme_mod('primary_text_color'); ?> !important;
            }
            .woocommerce button.button:hover{
                background-color: <?php echo get_theme_mod('primary_color_hover'); ?> !important;
            }

            p.woocommerce-mini-cart__buttons.buttons .button.checkout{
                background-color: <?php echo get_theme_mod('primary_color'); ?> !important;
                color:<?php echo get_theme_mod('primary_text_color'); ?> !important;
            }
            p.woocommerce-mini-cart__buttons.buttons .button.checkout:hover{
                background-color: <?php echo get_theme_mod('primary_color_hover'); ?> !important;
            }

            /* Botão concluir compra pagina do carrinho  */
            .woocommerce-cart .wc-proceed-to-checkout a.checkout-button{
                background-color: <?php echo get_theme_mod('primary_color'); ?>;
            }
            .woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover{
                background-color: <?php echo get_theme_mod('primary_color_hover'); ?>;
            }

            /* Widgets Footer */
            .footer-widget{ 
                background-color:<?php echo get_theme_mod('footer_widget_bg', '#dddddd'); ?>;
                color:<?php echo get_theme_mod('essone_widget_color', '#000000'); ?>;
            }

            .widget-right a{color: <?php echo get_theme_mod('color_text_header_content'); ?>;
            }
            .widget-right {<?php echo get_theme_mod('css_header_right_settings'); ?>}

            /* Footer */

            .blog-footer {
                background-color:<?php echo get_theme_mod('essone_background_color_footer'); ?>;
                color:<?php echo get_theme_mod('essone_text_color_footer'); ?>;
            }

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

            }
            /* Sombra no Catalogo de produtos */
            <?php if (get_theme_mod('shadowcatalog','show') == 'show') : ?>
                .woocommerce ul.products li.product, .woocommerce-page ul.products li.product{
                    border: 1px solid rgb(219, 219, 219);
                    border-radius: 5px 5px 3px 3px;
                    /* height: em style-options */
                }
                .woocommerce ul.products li.product, .woocommerce-page ul.products li.product{
                    box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 6px;
                    background-color: #fff;
                }   
                .woocommerce ul.products li.product:hover{/* Seleção Mouse */
                    box-shadow: rgba(0, 0, 0, 0.5) 0px 2px 6px;
                    transform:scale(1.02);

                }
            <?php endif ?>

            /* Fixar botão comprar */
            <?php if (get_theme_mod('essone_button_fixed','0') == '1') : ?>
            .woocommerce ul.products li.product .button {
                bottom: 3px;
                position: absolute;
                left: 0;
                right: 0;
                margin: 0 auto;
                width: 7em;
            }
            .woocommerce ul.products li.product .button:hover{
                bottom: 3px;
                position: absolute;
                left: 0;
                right: 0;
                margin: 0 auto;
                width: 7em;
            }
            <?php endif ?>

            .woocommerce ul.products li.product .woocommerce-loop-product__title{
                font-size: <?php echo get_theme_mod('essone_font_title_prod');?>pt !important;
            }
            .description-catalog{
                font-size:<?php echo get_theme_mod('essone_font_description_catalog', '12');?>pt !important;
            }

            /* Politica woocommerce */
            <?php if (get_theme_mod('politywoo','show') == 'hide') : ?>
                .woocommerce-terms-and-conditions-wrapper{
                    display: none;
                }

            <?php endif ?>

            /* Estilo da barra lateral */
            <?php if (get_theme_mod('essone_pag_layout_style')  == '1'):?>
            .widget-left{
                border-right: 1px solid #d6d6d6;
                padding: 20px;
            }
            <?php endif ?>

            /* Header Fixo */
            <?php if (get_theme_mod('essone_fixed_header')  == '1'):?>
            
            .header-class{
                position: sticky!important;
                top: 0!important;
                z-index: 1020!important;
            }
            <?php endif ?>

            /* Estilo Carrinho */
            <?php if (get_theme_mod('essone_cart_style','full') == 'basic') : ?>
                .header-cart-top-link-right{
                    display: none;
                }
            <?php endif ?>

            .logo-header {
                width: <?php echo get_theme_mod('essone_size_logo');?>px ;
            }
            td #header_wrapper{
                background-color: #000 !important;
            }

         </style>
    <?php

    // Descrição produtos
    if (get_theme_mod('essone_description_short','0') == '1'){
        add_action('woocommerce_after_shop_loop_item', 'gs_description_catalog', 3);
        
        function gs_description_catalog() {
            echo '<div class="description-catalog">'. get_the_excerpt() .'</div>';
        };

    }
}


