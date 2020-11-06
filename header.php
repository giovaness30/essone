<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php wp_head();?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
    <body <?php body_class(); ?>>
        <header>

            <a class="text-muted" href="<?php echo esc_url( home_url( '/' ) ); ?>">

                <?php 
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo = wp_get_attachment_image_src( $custom_logo_id, 'full');

                    if ( has_custom_logo() ){
                        echo '<img src="'. esc_url($logo[0]) . '"class="img-fluid">';
                    } else {
                        echo '<h1>' . get_bloginfo('name'), '</h1>';
                        echo '<p class="lead">' . get_bloginfo('description') . '</p>';
                    }
                ?>

            </a>

        </header>
