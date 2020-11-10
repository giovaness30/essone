<?php

if( get_theme_mod( 'bgheader_content' ) != '') { // if there is a background img
	$theme_header_bg = get_theme_mod('bgheader_content'); // Assigning it to a variable to keep the markup clean
}
  
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php wp_head();?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Font-awesome -->
    <script src="https://kit.fontawesome.com/1a75781615.js" crossorigin="anonymous"></script>
</head>
    <body <?php body_class(); ?>>

        <header class="col-12" style="background-image:url('<?php echo $theme_header_bg ?>');">

            <div class="row justify-content-center align-items-center mx-5" style="color: #fff">

                <!-- Logo do site -->
                <div class="col-12 col-md-3 d-flex justify-content-center py-2"> 

                    <a class="text-muted" href="<?php echo esc_url( home_url( '/' ) ); ?>">

                        <?php 
                            $custom_logo_id = get_theme_mod('custom_logo');
                            $logo = wp_get_attachment_image_src( $custom_logo_id, 'full');

                            if ( has_custom_logo() ){
                                echo '<img src="'. esc_url($logo[0]) . '"class="logo-header img-fluid">';
                            } else {
                                echo '<h1>' . get_bloginfo('name'), '</h1>';
                                echo '<p class="lead">' . get_bloginfo('description') . '</p>';
                            }
                        ?>

                    </a>

                </div>

                <!-- widget central header -->
                <?php
 
                    if ( is_active_sidebar( 'center_header_sidebar' ) ) : ?>
                        <div class="col-md-6 col-12">
                            <?php dynamic_sidebar( 'center_header_sidebar' ); ?>
                        </div>
                    
                <?php endif; ?>
                
                <!-- widget direito header -->
                <?php
 
                    if ( is_active_sidebar( 'right_header_sidebar' ) ) : ?>
                        <div class="widget-right col-md-3 col-10 d-flex align-items-center">
                            <?php dynamic_sidebar( 'right_header_sidebar' ); ?>
                        </div>
                    
                <?php endif; ?>

            </div>

        </header>

        <div id="menuprincipal" class="border-top border-bottom justify-content-center">
		
			<?php wp_nav_menu (array ('theme_location' => 'header-menu')); ?>
            	
			
        </div>
        <div class="album pb-3">
            <div class="container">
                <div class="row">
                    <div class=" col-12">
