<?php
 header('Pragma: public');
 header('Content-Type: text/css; charset=UTF-8');
?>

.widget-right a{
    color: <?php echo get_theme_mod('color_text_header_content'); ?>;
}
.widget-right {<?php echo get_theme_mod('css_header_right_settings'); ?>}