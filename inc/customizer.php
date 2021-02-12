<?php
add_action( 'customize_register', 'cd_customizer_settings' );
function cd_customizer_settings( $wp_customize ) {

    /* -------------------PANEL do Personalizar
    ---------------------------------------------------------------- */

    $wp_customize->add_panel('woo_panel',array(
        'title'=>'Custom Woocommerce',
        'description'=> 'This is panel Description',
        'priority'   => 40,
    ));

    /* -------------------Seções do Personalizar
    ---------------------------------------------------------------- */

    $wp_customize->add_section( 'gs_colors' , array(
        'title'      => 'Cores',
        'priority'   => 30,
    ) );
    $wp_customize->add_section( 'gs_background' , array(
        'title'      => 'Fundos',
        'priority'   => 33,
    ) );

	$wp_customize->add_section( 'top_section', array(

        'title'    => __('Contatos', 'essystemstart2'),
        'description' => '',
        'priority' => 35,
    ));	

    $wp_customize->add_section( 'p-user', array(

        'title'    => __('Layout Painel do Usuario', 'essystemstart2'),
        'description' => '',
        'priority' => 38,
        ));	

    /* Seções do panel CUSTOM WOOCOMMERCE */
    $wp_customize->add_section( 'prod_section', array(

        'title'    => __('Produtos'),
        'description' => 'Alterações do Woocommerce',
        'priority' => 40,
        'panel'=>'woo_panel',
    )); 

    $wp_customize->add_section( 'checkout_section', array(

        'title'    => __('Checkout'),
        'description' => 'Alterações do Woocommerce',
        'priority' => 40,
        'panel'=>'woo_panel',
    )); 

    $wp_customize->add_section( 'painel_wp_section', array(

        'title'    => __('Wordpress'),
        'description' => '',
        'priority' => 40,
        'panel'=>'woo_panel',
    )); 

    $wp_customize->add_section( 'header', array(

        'title'    => __('Header'),
        'description' => '',
        'priority' => 30,
        'panel'=>'woo_panel',
    )); 

    /* -------------------Cores
    ---------------------------------------------------------------- */

    /* Cor Cabeçalho */
    $wp_customize->add_setting( 'header_color' , array(
        'default'     => '#43C6E4',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_color', array(
        'label'        => 'Cor de Fundo Cabeçalho',
        'section'    => 'gs_colors',
        'settings'   => 'header_color',
    ) ) );

    /* Cor Texto Cabeçalho */
    $wp_customize->add_setting( 'header_text_color' , array(
        'default'     => '#43C6E4',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_text_color', array(
        'label'        => 'Cor dos Texto Cabeçalho',
        'section'    => 'gs_colors',
        'settings'   => 'header_text_color',
    ) ) );

    /* Cor Fundo */
    $wp_customize->add_setting( 'background_color' , array(
        'default'     => '#43C6E4',
        'transport'   => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'background_color', array(
        'label'        => 'Cor de Fundo',
        'section'    => 'gs_colors',
        'settings'   => 'background_color',
    ) ) );

    /* Cor Texto Primária*/
    $wp_customize->add_setting( 'primary_text_color' , array(
        'default'     => '#43C6E4',
        'transport'   => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_text_color', array(
        'label'        => 'Cor de texto Primaria',
        'section'    => 'gs_colors',
        'settings'   => 'primary_text_color',
    ) ) );

    /* Cor Primária*/
    $wp_customize->add_setting( 'primary_color' , array(
        'default'     => '#43C6E4',
        'transport'   => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
        'label'        => 'Cor Primária',
        'section'    => 'gs_colors',
        'settings'   => 'primary_color',
    ) ) );

    /* Cor Primária hover*/
    $wp_customize->add_setting( 'primary_color_hover' , array(
        'default'     => '#43C6E4',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color_hover', array(
        'label'        => 'Cor hover Primária',
        'section'    => 'gs_colors',
        'settings'   => 'primary_color_hover',
    ) ) );

    //Background color widget
    $wp_customize->add_setting('footer_widget_bg', array(
        'default'		=> '#43C6E4',
        'transport'   => 'refresh',

    ));	

    $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize,'footer_widget_bg', array(
            'settings'  => 'footer_widget_bg',
            'label'    => 'Cor do Fundo Area Widgets',
            'section'  => 'gs_colors',		
        )));

    /* -------------------Fundos
    ---------------------------------------------------------------- */

    /* Fundos Header*/
    $wp_customize->add_setting('header_img_bg', array(
        'default'		=> '',

    ));	

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'header_img_bg', array(

            'label'    => 'Imagem do Fundo Cabeçalho',
            'section'  => 'gs_background',
            'settings'  => 'header_img_bg',		
        )));

    /* Fundos Footer*/
    $wp_customize->add_setting('footer_img_bg', array(
        'default'		=> '',

    ));	

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'footer_img_bg', array(

            'label'    => 'Imagem do Fundo Rodapé',
            'section'  => 'gs_background',
            'settings'  => 'footer_img_bg',		
        )));

    /* -------------------Wocoommerce
    ---------------------------------------------------------------- */

    // Habilita ou não Logo Cabeçalho
    $wp_customize->add_setting( 'logo_header' , array(
        'default'     => 'show',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( 'logo_header', array(
        'label' => 'Mostrar Logo do Site',
        'section' => 'header',
        'settings' => 'logo_header',
        'type' => 'radio',
        'choices' => array(
          'show' => 'Mostrar Logo',
          'hide' => 'Esconder logo',
        ),
      ) );

    // Habilita Cabeçalho com 3 linhas Widget
    $wp_customize->add_setting( 'three_header' , array(
        'default'     => 'show',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( 'three_header', array(
        'label' => 'Header com 3 Colunas de Widget',
        'section' => 'header',
        'settings' => 'three_header',
        'type' => 'radio',
        'choices' => array(
          'show' => 'Habilitado',
          'hide' => 'Esconder',
        ),
      ) );

    /* Imagem do logo login wordpress */
    $wp_customize->add_setting('login_img_wp', array(
        'default'		=> '',

    ));	

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'login_img_wp', array(

            'label'    => 'Logo Login Wordpress',
            'section'  => 'painel_wp_section',
            'settings'  => 'login_img_wp',		
        )));

    /* Estilo Painel Wordpress */
    $wp_customize->add_setting('style_wp_painel', array(
        'default'		=> '',
        'transport'   => 'refresh',

    ));
    $wp_customize->add_control('style_wp_painel', array(
        'label'     => 'Estilo do painel adm Wordpress',
        'type'      => 'textarea',
        'section'   => 'painel_wp_section',
        'settings'  => 'style_wp_painel',
    ));

    /* Altura da imagem pagina do produto */
	$wp_customize->add_setting( 'alt_img_single');

    $wp_customize->add_control('alt_img_single', array(
      'type'      => 'text',
      'settings'  => 'alt_img_single',
      'label'    => 'Altura da imagem pagina do produto "height"',
      'section'  => 'prod_section',
      'priority' => 2,
    )
    );

    /* Altura da imagem pagina do produto */
	$wp_customize->add_setting( 'alt_img_single');

    $wp_customize->add_control('alt_img_single', array(
      'type'      => 'text',
      'settings'  => 'alt_img_single',
      'label'    => 'Altura da imagem pagina do produto "height"',
      'section'  => 'prod_section',
      'priority' => 2,
      'description' => 'Quando sem conteudo = 30rem',
    )
    );
  
    /* Largura da imagem pagina do produto */
      $wp_customize->add_setting( 'larg_img_single');
  
    $wp_customize->add_control('larg_img_single', array(
      'type'      => 'text',
      'settings'  => 'larg_img_single',
      'label'    => 'Largura da imagem pagina do produto "width"',
      'section'  => 'prod_section',
      'priority' => 2,
      'description' => 'Quando sem conteudo = 23rem',
    )
    );
    
    /* Altera padrão da div de cada produto no Catálogo */
      $wp_customize->add_setting( 'alt_prod_catalog');
  
    $wp_customize->add_control('alt_prod_catalog', array(
      'type'      => 'text',
      'settings'  => 'alt_prod_catalog',
      'label'    => 'Altura padrão da div de cada produtos no catálogo',
      'section'  => 'prod_section',
      'priority' => 2,
      'description' => 'Quando sem conteudo = 100%; "conforme mais conteúdo , maior"',
    )
    );

    /* Altura da imagem produto no Catálogo */
      $wp_customize->add_setting( 'alt_img_catalog');
  
    $wp_customize->add_control('alt_img_catalog', array(
      'type'      => 'text',
      'settings'  => 'alt_img_catalog',
      'label'    => 'Altura padrão de cada imagem de produtos no catálogo',
      'section'  => 'prod_section',
      'priority' => 2,
      'description' => 'Quando sem conteudo = 230px;',
    )
    );

    // Habilita ou não Sombra nos produtos do catálogo
    $wp_customize->add_setting( 'shadowcatalog' , array(
        'default'     => 'show',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( 'shadowcatalog', array(
        'label' => 'Produtos do catálogo com sombras',
        'section' => 'prod_section',
        'settings' => 'shadowcatalog',
        'type' => 'radio',
        'choices' => array(
            'show' => 'Com sombras',
            'hide' => 'Sem Sombras',
        ),
        ) );

    /* Descrição Da Informação adicional */
    $wp_customize->add_setting( 'note_order');

    $wp_customize->add_control('note_order', array(
    'type'      => 'text',
    'settings'  => 'note_order',
    'label'    => 'Notas que aparecem nos Checkout.',
    'section'  => 'checkout_section',
    'description' => 'Descrição que aparece na Página "Finalizar-compra" em Informação Adicional',
    )
    );

    /* -------------------Outros
    ---------------------------------------------------------------- */

	/* TELEFONE */
	$wp_customize->add_setting('contact_top', array(
	'default'		=> '(DDD) 9-9999-9999',

	));

	$wp_customize->add_control( 'topbar', array(

        'type'     => 'text',
        'settings'  => 'contact_top',
        'label'    => __( 'Numero de Telefone', 'essystemstart2' ),
        'section'  => 'top_section',	
        'priority' => 1,
		'description' => __( 'Telefone de Contato.', 'essystemstart2' ),

	));


	/* EMAIL */
	$wp_customize->add_setting('contact_top_email', array(
	'default'		=> sanitize_email('email@i-create.com'),

	));

	$wp_customize->add_control( 'topbar_email', array(
        'type'     => 'text',
        'settings'  => 'contact_top_email',
        'label'    => __( 'Email Address', 'essystemstart2' ),
        'section'  => 'top_section',
        'priority' => 1,
		'description' => __( 'Email Id that appears on top bar.', 'essystemstart2' ),		
    ));

	/* WHATSAPP */
	$wp_customize->add_setting('contact_number_whatss', array(
	'default'		=> '19984259600',

	));

	$wp_customize->add_control( 'whatss_number', array(
        'type'     => 'text',
        'settings'  => 'contact_number_whatss',
        'label'    => __( 'Numero de WhatsApp', 'essystemstart2' ),
        'section'  => 'top_section',
        'priority' => 1,
		'description' => __( 'Numero real que recebera as mensagens', 'essystemstart2' ),		
    ));
  
  /* Texto */
	$wp_customize->add_setting('contact_text_whatss', array(
	'default'		=> 'Olá, Tenho uma duvida.',

  ));

	$wp_customize->add_control( 'whatss_text', array(
        'type'     => 'text',
        'settings'  => 'contact_text_whatss',
        'label'    => __( 'Texto da conversa inicial', 'essystemstart2' ),
        'section'  => 'top_section',
        'priority' => 1,
		'description' => __( 'Texto padrão que aparece no campo da conversa Whatsapp', 'essystemstart2' ),		
    ));

    /* Texto do painel Usuarios */

    $wp_customize->add_setting('text_painel_login', array(
    'default'		=> 'login',

    ));	

    $wp_customize->add_control( 'topbar_whatss', array(
          'type'     => 'code',
          'settings'  => 'text_painel_login',
          'label'    => __( 'Texto do botão login no painel do cabeçalho do site', 'essystemstart2' ),
          'section'  => 'p-user',
          'priority' => 1,
      'description' => __( 'Normalmente utilizado  = "logar", "Entrar"', 'essystemstart2' ),		
      ));
  

        


}