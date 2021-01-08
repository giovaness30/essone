//Pega Caminhos que esta no navegador
var urlSite = window.location.pathname;

//Filtra se vai executar ou nao os comandos
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
