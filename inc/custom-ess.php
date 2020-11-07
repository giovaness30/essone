<?php

// # [cartEss]
function functionShortcode()
{
    $textContent = '<div id="site-header-cart" class="header-cart-container">' . newstore_woocommerce_header_cart() . '</div>';
    return $textContent;
}
add_shortcode('cartEss', 'functionShortcode'); 

// # [user-icon]
function shortcodeUserIcon()
{
    $text_painel_login = esc_attr(get_theme_mod('text_painel_login', 'Logar'));

    
    if ( is_user_logged_in() ) { /*Usuario Logado*/
        $link_conta = esc_url( home_url( '/minha-conta/' ) );
        $current_user = wp_get_current_user();
        echo '<a href="'.$link_conta.'"><i style=""  class="fa fa-user-circle" aria-hidden="true"></i>&nbsp'. $current_user->user_firstname .'</a>';
        }
    else {/*Usuario Deslogado*/
        $link_entrar = esc_url( home_url( '/minha-conta/' ) );
        echo '<a href="'.$link_entrar.'"><img src="https://img.icons8.com/carbon-copy/30/000000/enter-2.png">' . $text_painel_login . '</a>';
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

        <a style="" href="http://api.whatsapp.com/send?phone=+55' . $contact_number_whatss . '&text=' . $contact_text_whatss . '" target="_blank"><img src="https://img.icons8.com/carbon-copy/30/000000/whatsapp.png"/>Whatsapp</a>

    </div>
    ';
                    
}
add_shortcode('whats-icon', 'shortcodeWhatsapp'); 