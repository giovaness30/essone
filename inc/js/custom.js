//Pega Caminhos que esta no navegador
var urlSite = window.location.pathname;

/* PAGINA FINALIZA COMPRA */
if(urlSite.indexOf('finalizar-compra') != -1){

    // Informações adicional
    var infAdic = document.querySelector('.woocommerce-additional-fields__field-wrapper p').children;
    infAdic[1].classList.add('col-12');

    document.querySelector('.woocommerce-additional-fields').classList.add('mt-3');


    // centralizando conteudos
    document.querySelector('.woocommerce-billing-fields').classList.add('container');

    var h3Title = document.querySelector('.woocommerce-billing-fields h3');
    h3Title.style.display = "none";
    
}

/* PAGINA CARRINHO */
if(urlSite.indexOf('carrinho') != -1){


//Tamanho campo Estado, onde calcula frete Pagina Carrinho.
document.querySelector('#calc_shipping_state_field span').style.width = "100%"

}