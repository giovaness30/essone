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

/* Alinhamento Foto pagina do produto */
@media (min-width: 768px) {
    #product-carousel{
        <?php echo get_theme_mod('img_size_single'); ?>;

    }
}

<!-- /*----------- FOOTER
----------------------------------------*/ -->

#footer-widget{
    background-color: <?php echo get_theme_mod('color_widgetsbg_content'); ?>;
}