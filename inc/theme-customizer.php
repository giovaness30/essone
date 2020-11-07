<?php 

function essone_register ($wp_customize) {

//PERSONALIZAR TEMA
	$wp_customize->add_section( 'top_section', array(

        'title'    => __('Contatos', 'essystemstart2'),
        'description' => '',
        'priority' => 35,
	));	

	//TELEFONE
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


	//EMAIL
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

		//WHATSAPP
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
  
  //Texto
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

// Menu do painel

$wp_customize->add_section( 'p-user', array(

  'title'    => __('Layout Painel do Usuario', 'essystemstart2'),
  'description' => '',
  'priority' => 35,
));	

// Texto do painel Usuarios

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
  

//SLIDE

    //PERSONALIZAR TEMA
    $wp_customize->add_section( 'slide_section', array(

      'title'    => __('Slide Home', 'essystemstart2'),
      'description' => '',
      'priority' => 40,
  )); 

  $wp_customize->add_setting('slide_content', array(
    'default'		=> 'login',

    ));	

    $wp_customize->add_control( 'slide', array(
          'type'     => 'text',
          'settings'  => 'slide_content',
          'label'    => __( 'Texto do botão login no painel do cabeçalho do site', 'essystemstart2' ),
          'section'  => 'slide_section',
          'priority' => 1,
      'description' => __( 'Normalmente utilizado  = "logar", "Entrar"', 'essystemstart2' ),		
      ));

  //Slide 1
  // $wp_customize->add_setting('slide1', array(
  //     'transport'     => 'refresh',

  // ));


  // $wp_customize->add_control( new WP_Customize_Media_Control($wp_customize, 'slide1', array(

  //     'label'         => __('Slide1', 'essystemstart2'),
  //     'section'       => 'slide_section',
  //     'mime_type'     => 'image',
  //     'settings'      => 'slide1',

  // )));
  // //Slide 2
  // $wp_customize->add_setting('slide2', array(
  //     'transport'     => 'refresh',

  // ));


  // $wp_customize->add_control( new WP_Customize_Media_Control($wp_customize, 'slide2', array(

  //     'label'         => __('Slide2', 'essystemstart2'),
  //     'section'       => 'slide_section',
  //     'mime_type'     => 'image',
  //     'settings'      => 'slide2',

  // )));

    //Background Header
    $wp_customize->add_section( 'bgheader_section', array(

      'title'    => __('Fundos'),
      'description' => '',
      'priority' => 40,
  )); 

  $wp_customize->add_setting('bgheader_content', array(
    'default'		=> '',

    ));	

    $wp_customize->add_control( new WP_Customize_Image_Control(
      $wp_customize,'bgheader', array(
          'settings'  => 'bgheader_content',
          'label'    => 'Imagem do Fundo Cabeçalho',
          'section'  => 'bgheader_section',
          'priority' => 2,		
      )));

      //Colors
    $wp_customize->add_section( 'colors_section', array(

      'title'    => __('Cores'),
      'description' => '',
      'priority' => 40,
  )); 

  $wp_customize->add_setting('color_text_header_content', array(
    'default'		=> '',

    ));	

    $wp_customize->add_control( new WP_Customize_Color_Control(
      $wp_customize,'color_text_header', array(
          'settings'  => 'color_text_header_content',
          'label'    => 'Cor do texto Cabeçalho',
          'section'  => 'colors_section',
          'priority' => 2,		
      )));
  
} ?>