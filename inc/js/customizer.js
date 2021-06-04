/* Arquivo para Vvisualização instantane das alterações no "PERSONALIZAR" */
( function( $ ) {

    wp.customize( 'header_color', function( value ) {
        value.bind( function( newval ) {
            $( '.header-class' ).css( 'background-color', newval );
        } );
    } );

    wp.customize( 'header_text_color', function( value ) {
        value.bind( function( newval ) {
            $( '.header-class a' ).css( 'color', newval );
        } );
    } );

    wp.customize( 'background_color', function( value ) {
          value.bind( function( newval ) {
              $( '.body' ).css( 'background-color', newval );
          } );
      } );

    wp.customize( 'primary_color', function( value ) {
          value.bind( function( newval ) {
              $( '.woocommerce button.button.alt, .woocommerce ul.products li.product .button' ).css( 'background-color', newval );
          } );
      } );
    
    wp.customize( 'primary_text_color', function( value ) {
          value.bind( function( newval ) {
              $( '.woocommerce button.button.alt, .woocommerce ul.products li.product .button' ).css( 'color', newval );
          } );
      } );
    
    wp.customize( 'primary_color_hover', function( value ) {
        value.bind( function( newval ) {
            $( '.woocommerce button.button.alt:hover, .woocommerce ul.products li.product .button:hover' ).css( 'background-color', newval );
        } );
    } );
    wp.customize( 'essone_widget_color', function( value ) {
        value.bind( function( newval ) {
            $( '.footer-widget' ).css( 'color', newval );
        } );
    } );
    wp.customize( 'footer_widget_bg', function( value ) {
        value.bind( function( newval ) {
            $( '.footer-widget' ).css( 'background-color', newval );
        } );
    } );


  } )( jQuery );