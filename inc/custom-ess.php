<?php

// # [logo-theme]
function shortcodeLogoTheme()
{?>

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

<?php
}
add_shortcode('logo-theme', 'shortcodeLogoTheme'); 

// # [cart-ess]
function functionShortcode()
{
    $textContent = '<div id="site-header-cart" class="header-cart-container m-2">' . newstore_woocommerce_header_cart() . '</div>';
    return $textContent;
}
add_shortcode('cart-ess', 'functionShortcode'); 

// # [user-icon]
function shortcodeUserIcon()
{
    $text_painel_login = esc_attr(get_theme_mod('text_painel_login', 'Logar'));

    
    if ( is_user_logged_in() ) { /*Usuario Logado*/
        $link_conta = esc_url( home_url( '/minha-conta/orders' ) );
        $current_user = wp_get_current_user();
        echo '<a href="'.$link_conta.'" class="m-2"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp'. $current_user->user_firstname .'</a>';
        }
    else {/*Usuario Deslogado*/
        $link_entrar = esc_url( home_url( '/minha-conta/' ) );
        if( $text_painel_login !== ''){
            echo '<a href="'.$link_entrar.'"><img src="https://img.icons8.com/carbon-copy/30/000000/enter-2.png"><button class="btn btn-outline-success btn-sm m-2">' . $text_painel_login . '</button></a>';
            }
        }
                    
}
add_shortcode('user-icon', 'shortcodeUserIcon'); 


// # [whats-icon]
function shortcodeWhatsapp()
{
    $contact_number_whatss = esc_attr(get_theme_mod('contact_number_whatss', '19984259600'));
    $contact_text_whatss = esc_attr(get_theme_mod('contact_text_whatss', 'Olá, Tenho uma duvida.'));
    echo 
    '
    <div class="whatsappheader text-center d-flex py-1">

        <a style="" href="http://api.whatsapp.com/send?phone=+55' . $contact_number_whatss . '&text=' . $contact_text_whatss . '" target="_blank"><img src="https://img.icons8.com/color/25/000000/whatsapp--v6.png"/>Whatsapp</a>

    </div>
    ';
                    
}
add_shortcode('whats-icon', 'shortcodeWhatsapp'); 







