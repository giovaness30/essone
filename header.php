<?php

if( get_theme_mod( 'header_img_bg' ) != '') { // if there is a background img
	$header_img_bg = get_theme_mod('header_img_bg'); // Assigning it to a variable to keep the markup clean
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

        <header class="header-class col-12" style="background-image:url('<?php if(get_theme_mod('header_img_bg') !=''){echo $header_img_bg ;}?>');">

        <?php if (get_theme_mod('three_header','show') == 'show') : ?><!-- Pergunta se está habilitado 3 colunas no Personalizar tema -->
            <div class="row  mx-lg-3">

                <!-- widget esquerdo header -->
                <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center py-2"> 

                    <?php if (get_theme_mod('logo_header','show') == 'show') : ?>
                        <!-- Logo do site -->
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

                    <?php else:  
                        if ( is_active_sidebar( 'left_header_sidebar' ) ) : ?>
                        <div class="head-widget-left">
                            <?php dynamic_sidebar( 'left_header_sidebar' ); ?>
                        </div>
                        <?php endif; ?>

                    <?php endif?>

                </div>

                <!-- widget central header -->
                <div class="head-widget-center col-lg-4 col-12 d-flex justify-content-center py-2">
                    <?php if ( is_active_sidebar( 'center_header_sidebar' ) ) : ?>
                        <?php dynamic_sidebar( 'center_header_sidebar' ); ?>
                    <?php endif; ?>
                </div>

                <!-- widget direito header -->
                <div class="head-widget-right content col-md-8 col-lg-4 col-12 py-2 d-flex align-items-center justify-content-center">
                    <?php if ( is_active_sidebar( 'right_header_sidebar' ) ) : ?>
                        <?php dynamic_sidebar( 'right_header_sidebar' ); ?>
                    <?php endif; ?>
                </div>
                    
                <!-- widget central after header -->
                <div class="head-widget-center justify-content-center container">
                    <?php if(is_active_sidebar( 'header_center_sidebar' )){
                        dynamic_sidebar( 'header_center_sidebar' );
                    } 
                    ?>
                        
                </div>

            </div>
        <?php endif?>

        </header>
        
        <div id="menuprincipal" class="justify-content-center">
		
            <?php if(is_home() || is_front_page() || is_product() && is_active_sidebar( 'firt_body_sidebar' )){

                dynamic_sidebar( 'firt_body_sidebar' );
            } 
            ?>
            	
        </div>

        <div class="body album pb-3">
            <div class="container geral">
                <div class="row">
                    <div class="col-12">