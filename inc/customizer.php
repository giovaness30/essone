<?php

 /* Function control slide */
 if( class_exists( 'WP_Customize_Control' ) ) {
    class WP_Customize_Range extends WP_Customize_Control {
        public $type = 'range';

        public function __construct( $manager, $id, $args = array() ) {
            parent::__construct( $manager, $id, $args );
            $defaults = array(
                'min' => 0,
                'max' => 10,
                'step' => 1
            );
            $args = wp_parse_args( $args, $defaults );

            $this->min = $args['min'];
            $this->max = $args['max'];
            $this->step = $args['step'];
        }

        public function render_content() {
        ?>
        <label>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <input class='range-slider' min="<?php echo $this->min ?>" max="<?php echo $this->max ?>" step="<?php echo $this->step ?>" type='range' <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" oninput="jQuery(this).next('input').val( jQuery(this).val() )">
            <input onKeyUp="jQuery(this).prev('input').val( jQuery(this).val() )" type='text' value='<?php echo esc_attr( $this->value() ); ?>'>

        </label>
        <?php
        }
    }
}

add_action( 'customize_register', 'cd_customizer_settings' );
function cd_customizer_settings( $wp_customize ) {

    /* -------------------PANEL do Personalizar
    ---------------------------------------------------------------- */

    $wp_customize->add_panel('woo_panel',array(
        'title'=>'Opções Tema Essystem',
        'description'=> 'This is panel Description',
        'priority'   => 40,
    ));
    $wp_customize->add_panel('woo_colors',array(
        'title'=>'Cores',
        'description'=> 'This is panel Description',
        'priority'   => 30,
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

        'title'    => __('Contatos e Informações', 'essystemstart2'),
        'description' => '',
        'priority' => 35,
    ));	

    $wp_customize->add_section( 'p-user', array(

        'title'    => __('Layout Painel do Usuario', 'essystemstart2'),
        'description' => '',
        'priority' => 38,
        ));	

    /* Seções do panel CUSTOM WOOCOMMERCE */
    $wp_customize->add_section( 'prod_section_catalog', array(

        'title'    => __('Catalogo de produtos'),
        'description' => 'Alterações do Woocommerce',
        'priority' => 40,
        'panel'=>'woo_panel',
    )); 

    $wp_customize->add_section( 'prod_section_pag', array(

        'title'    => __('Pagina do Produtos'),
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

    $wp_customize->add_section( 'layout', array(

        'title'    => __('Estilo da Página'),
        'description' => '',
        'priority' => 30,
        'panel'=>'woo_panel',
    )); 

    /* Seções do panel CORES */
    $wp_customize->add_section( 'header_section_colors', array(

        'title'    => __('Cabeçalho'),
        'description' => 'Alterações no Tema',
        'priority' => 40,
        'panel'=>'woo_colors',
    )); 

    $wp_customize->add_section( 'body_section_colors', array(

        'title'    => __('Corpo do Site'),
        'description' => 'Alterações no Tema',
        'priority' => 40,
        'panel'=>'woo_colors',
    )); 
    $wp_customize->add_section( 'widgets_rodape_section_colors', array(

        'title'    => __('Widgets Rodapé'),
        'description' => 'Alterações no Tema',
        'priority' => 40,
        'panel'=>'woo_colors',
    )); 
    $wp_customize->add_section( 'rodape_section_colors', array(

        'title'    => __('Rodapé'),
        'description' => 'Alterações no Tema',
        'priority' => 40,
        'panel'=>'woo_colors',
    )); 

    /* -------------------Cores
    ---------------------------------------------------------------- */

    /* Cor texto Barra Topo */
    $wp_customize->add_setting( 'essone_topbar_txt_color' , array(
        'default'     => '#000',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'essone_topbar_txt_color', array(
        'label'        => 'Cor Texto Barra do Topo',
        'section'    => 'header_section_colors',
        'settings'   => 'essone_topbar_txt_color',
    ) ) );

    /* Cor fundo Barra Topo */
    $wp_customize->add_setting( 'essone_topbar_bg_color' , array(
        'default'     => 'rgba(48,48,48,0.39)',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'essone_topbar_bg_color', array(
        'label'        => 'Cor de Fundo Barra do Topo',
        'section'    => 'header_section_colors',
        'settings'   => 'essone_topbar_bg_color',
    ) ) );
    
    /* Cor Cabeçalho */
    $wp_customize->add_setting( 'header_color' , array(
        'default'     => '#ffffff',
        'transport'   => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_color', array(
        'label'        => 'Cor de Fundo Cabeçalho',
        'section'    => 'header_section_colors',
        'settings'   => 'header_color',
    ) ) );

    /* Cor Texto Cabeçalho */
    $wp_customize->add_setting( 'header_text_color' , array(
        'default'     => '#000000',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_text_color', array(
        'label'        => 'Cor dos Texto Cabeçalho',
        'section'    => 'header_section_colors',
        'settings'   => 'header_text_color',
    ) ) );

    /* Cor Hover Texto Cabeçalho */
    $wp_customize->add_setting( 'header_text_color_hover' , array(
        'default'     => '#1e73be',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_text_color_hover', array(
        'label'        => 'Cor dos Texto Cabeçalho (Ao passar Mouse)',
        'section'    => 'header_section_colors',
        'settings'   => 'header_text_color_hover',
    ) ) );

    /* Cor Fundo */
    $wp_customize->add_setting( 'background_color' , array(
        'default'     => '#f7f7f7',
        'transport'   => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'background_color', array(
        'label'        => 'Cor de Fundo',
        'section'    => 'body_section_colors',
        'settings'   => 'background_color',
    ) ) );

    /* Cor Texto Primária*/
    $wp_customize->add_setting( 'primary_text_color' , array(
        'default'     => '#ffffff',
        'transport'   => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_text_color', array(
        'label'        => 'Cor de texto Primaria',
        'section'    => 'body_section_colors',
        'settings'   => 'primary_text_color',
    ) ) );

    /* Cor dos Links*/
    $wp_customize->add_setting( 'primary_link_color' , array(
        'default'     => '#4d932c',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_link_color', array(
        'label'        => 'Cor dos Links',
        'section'    => 'body_section_colors',
        'settings'   => 'primary_link_color',
    ) ) );

    /* Cor Primária*/
    $wp_customize->add_setting( 'primary_color' , array(
        'default'     => '#4d932c',
        'transport'   => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
        'label'        => 'Cor Primária',
        'section'    => 'body_section_colors',
        'settings'   => 'primary_color',
    ) ) );

    /* Cor Primária hover*/
    $wp_customize->add_setting( 'primary_color_hover' , array(
        'default'     => '#5ad602',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color_hover', array(
        'label'        => 'Cor Primária (ao passar cursor)',
        'section'    => 'body_section_colors',
        'settings'   => 'primary_color_hover',
    ) ) );

    //Background color widget
    $wp_customize->add_setting('footer_widget_bg', array(
        'default'		=> '#dddddd',
        'transport'   => 'postMessage',
    ));	

    $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize,'footer_widget_bg', array(
            'settings'  => 'footer_widget_bg',
            'label'    => 'Cor do Fundo Area Widgets',
            'section'  => 'widgets_rodape_section_colors',		
        )));

    /* Cor Texto widget*/
    $wp_customize->add_setting( 'essone_widget_color' , array(
        'default'     => '#000000',
        'transport'   => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'essone_widget_color', array(
        'label'        => 'Cor do texto Widget',
        'section'    => 'widgets_rodape_section_colors',
        'settings'   => 'essone_widget_color',
    ) ) );

    /* Cor Fundo Rodapé*/
    $wp_customize->add_setting( 'essone_background_color_footer' , array(
        'default'     => '#e8e8e8',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'essone_background_color_footer', array(
        'label'        => 'Cor do Fundo Rodapé',
        'section'    => 'rodape_section_colors',
        'settings'   => 'essone_background_color_footer',
    ) ) );

    /* Cor texto Rodapé*/
    $wp_customize->add_setting( 'essone_text_color_footer' , array(
        'default'     => '#999',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'essone_text_color_footer', array(
        'label'        => 'Cor do texto Rodapé',
        'section'    => 'rodape_section_colors',
        'settings'   => 'essone_text_color_footer',
    ) ) );

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


    // ---------- Cabeçalho

    // Habilita Cabeçalho Fixo no Topo
    $wp_customize->add_setting( 'essone_fixed_header' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( 'essone_fixed_header', array(
        'label' => 'Mantem Cabeçalho Fixo no topo da tela ao Rolar página.',
        'section' => 'header',
        'settings' => 'essone_fixed_header',
        'type' => 'checkbox',
        'std'  => '0'
        ) );

    /* Tamanho Logo  */
    $wp_customize->add_setting( 'essone_size_logo' , array(
        'default'     => 230,
        'transport'   => 'refresh',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Range( $wp_customize, 'essone_size_logo', array(
        'label'	=>  'Tamanho do Logo',
        'min' => 100,
        'max' => 500,
        'step' => 1,
        'section' => 'header',
    ) ) );

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

    // Estilo do Carrinho
    $wp_customize->add_setting( 'essone_cart_style' , array(
        'default'     => 'full',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( 'essone_cart_style', array(
        'label' => 'Estilo Icone do Carrinho',
        'section' => 'header',
        'settings' => 'essone_cart_style',
        'type' => 'radio',
        'choices' => array(
          'full' => 'Icone Carrinho Completo',
          'basic' => 'Icone Carrinho sem Total',
        ),
      ) );

    /* Fonte size barra do topo */
    $wp_customize->add_setting( 'essone_font_txt_topbar' , array(
        'default'     => 10,
        'transport'   => 'refresh',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Range( $wp_customize, 'essone_font_txt_topbar', array(
        'label'	=>  'Tamanho Fonte Barra Topo "pt"',
        'min' => 6,
        'max' => 25,
        'step' => 1,
        'section' => 'header',
    ) ) );

    // ---------- Wordpress

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

    // ---------- Página do Produto

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
      'section'  => 'prod_section_pag',
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
      'section'  => 'prod_section_pag',
      'priority' => 2,
      'description' => 'Quando sem conteudo = 23rem',
    )
    );

    // Imagem de produtos em grupo
    $wp_customize->add_setting( 'essone_thumbnail_grouped' , array(
        'default'     => '0',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( 'essone_thumbnail_grouped', array(
        'label' => 'Mostar Thumbnail(fotos) do Produtos em Grupo ?',
        'section' => 'prod_section_pag',
        'settings' => 'essone_thumbnail_grouped',
        'type' => 'checkbox',
        'std'  => '0'
        ) );

    /* Tamanho Fonte Preço de produtos */
    $wp_customize->add_setting( 'essone_font_price_prod_pag' , array(
        'default'     => 12,
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Range( $wp_customize, 'essone_font_price_prod_pag', array(
        'label'	=>  'Tamanho Fonte Preço dos produtos (pt)',
        'min' => 6,
        'max' => 25,
        'step' => 1,
        'section' => 'prod_section_pag',
    ) ) );

    /* Cor preço produtos*/
    $wp_customize->add_setting( 'essone_color_price_pag' , array(
        'default'     => '#77a464',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'essone_color_price_pag', array(
        'label'        => 'Cor do Preço',
        'section'    => 'prod_section_pag',
        'settings'   => 'essone_color_price_pag',
    ) ) );

    // negrito no preço
    $wp_customize->add_setting( 'essone_bold_price' , array(
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( 'essone_bold_price', array(
        'label' => 'Preço dos produto em NEGRITO ?',
        'section' => 'prod_section_pag',
        'settings' => 'essone_bold_price',
        'type' => 'checkbox',
        'std'  => '0'
        ) );

    // Botão Compartilhar
    $wp_customize->add_setting( 'essone_shared_prod_pag' , array(
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( 'essone_shared_prod_pag', array(
        'label' => 'Link para Compartilhar produto ?',
        'section' => 'prod_section_pag',
        'settings' => 'essone_shared_prod_pag',
        'type' => 'checkbox',
        'std'  => '0'
        ) );

    /* Texto ao lado preço promoção */
	$wp_customize->add_setting( 'essone_text_promo_single');

    $wp_customize->add_control('essone_text_promo_single', array(
      'type'      => 'text',
      'settings'  => 'essone_text_promo_single',
      'label'    => 'Texto ao lado do preço em Promoção',
      'section'  => 'prod_section_pag',
      'priority' => 2,
      'description' => 'Quando sem conteudo = Texto não é Mostrado.',
    )
    );

    // ---------- Catalogo de Produtos
    
    /* Altera padrão da div de cada produto no Catálogo */
      $wp_customize->add_setting( 'alt_prod_catalog');
  
    $wp_customize->add_control('alt_prod_catalog', array(
      'type'      => 'text',
      'settings'  => 'alt_prod_catalog',
      'label'    => 'Altura padrão da div de cada produtos no catálogo',
      'section'  => 'prod_section_catalog',
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
      'section'  => 'prod_section_catalog',
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
        'section' => 'prod_section_catalog',
        'settings' => 'shadowcatalog',
        'type' => 'radio',
        'choices' => array(
            'show' => 'Com sombras',
            'hide' => 'Sem Sombras',
        ),
        ) );

    /* Tamanho Titulo Produtos Catalogo de produtos */
    $wp_customize->add_setting( 'essone_letter_title_prod' , array(
        'default'     => 20,
        'transport'   => 'refresh',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Range( $wp_customize, 'essone_letter_title_prod', array(
        'label'	=>  'Quantidade de Caracteres Titulo dos Produtos',
        'min' => 1,
        'max' => 35,
        'step' => 1,
        'section' => 'prod_section_catalog',
    ) ) );

    /* Tamanho Fonte titulo dos itens */
    $wp_customize->add_setting( 'essone_font_title_prod' , array(
        'default'     => 12,
        'transport'   => 'refresh',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Range( $wp_customize, 'essone_font_title_prod', array(
        'label'	=>  'Tamanho Fonte dos Produtos (pt)',
        'min' => 6,
        'max' => 25,
        'step' => 1,
        'section' => 'prod_section_catalog',
    ) ) );

    /* Tamanho Fonte Preço de produtos */
    $wp_customize->add_setting( 'essone_font_price_prod' , array(
        'default'     => 12,
        'transport'   => 'refresh',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Range( $wp_customize, 'essone_font_price_prod', array(
        'label'	=>  'Tamanho Fonte Preço dos produtos (pt)',
        'min' => 6,
        'max' => 25,
        'step' => 1,
        'section' => 'prod_section_catalog',
    ) ) );

    /* Cor preço produtos*/
    $wp_customize->add_setting( 'essone_color_price_catalog' , array(
        'default'     => '#77a464',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'essone_color_price_catalog', array(
        'label'        => 'Cor do Preço',
        'section'    => 'prod_section_catalog',
        'settings'   => 'essone_color_price_catalog',
    ) ) );

    /* Tamanho Fonte ShortDescription dos itens */
    $wp_customize->add_setting( 'essone_font_description_catalog' , array(
        'default'     => 12,
        'transport'   => 'refresh',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Range( $wp_customize, 'essone_font_description_catalog', array(
        'label'	=>  'Tamanho Fonte Descrição dos Produtos. (pt)',
        'min' => 6,
        'max' => 25,
        'step' => 1,
        'section' => 'prod_section_catalog',
    ) ) );


    // Fixar Botão Comprar
    $wp_customize->add_setting( 'essone_button_fixed' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( 'essone_button_fixed', array(
        'label' => 'Fixar botão "Comprar" .',
        'section' => 'prod_section_catalog',
        'settings' => 'essone_button_fixed',
        'type' => 'checkbox',
        'std'  => '0'
        ) );

    // Habilitar Descrição Curta no Catalogo
    $wp_customize->add_setting( 'essone_description_short' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( 'essone_description_short', array(
        'label' => 'Habilitar Descrição Curta no Catálogo" .',
        'section' => 'prod_section_catalog',
        'settings' => 'essone_description_short',
        'type' => 'checkbox',
        'std'  => '0'
        ) );

    // ---------- Chekout

    /* Descrição Da Informação adicional */
    $wp_customize->add_setting( 'note_order' );

    $wp_customize->add_control('note_order', array(
    'type'      => 'text',
    'settings'  => 'note_order',
    'label'    => 'Notas que aparecem nos Checkout.',
    'section'  => 'checkout_section',
    'description' => 'Descrição que aparece na Página "Finalizar-compra" em Informação Adicional',
    )
    );

    // Habilita ou não Politica de compra
    $wp_customize->add_setting( 'politywoo' , array(
        'default'     => 'show',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( 'politywoo', array(
        'label' => 'Politica de compra antes do botão "Finalizar Compra"',
        'description' => 'Politica de compra padrão do Woocommerce que aparece no Checkout.',
        'section' => 'checkout_section',
        'settings' => 'politywoo',
        'type' => 'radio',
        'choices' => array(
            'show' => 'Habilitado',
            'hide' => 'Desabilitado',
        ),
        ) );

    $wp_customize->add_setting( 'no_default_method' , array(
        'default'     => 'hide',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( 'no_default_method', array(
        'label' => 'Forma de entrega Desmarcada',
        'description' => 'Cliente ao finalizar a compra, tem que selecionar manualmente a forma de entrega.(Essa opção força o cliente a selecionar e não finaliza a venda enquanto não marcar)',
        'section' => 'checkout_section',
        'settings' => 'no_default_method',
        'type' => 'radio',
        'choices' => array(
            'show' => 'Habilitado',
            'hide' => 'Desabilitado',
        ),
        ) );

    // ---------- Estilo da Página

        // Layout pagina
        $wp_customize->add_setting( 'essone_pag_layout' , array(
            'default'     => 'layout-wide',
            'transport'   => 'refresh',
        ) );
    
        $wp_customize->add_control( 'essone_pag_layout', array(
            'label' => 'Estilo da pagina inicial',
            'section' => 'layout',
            'settings' => 'essone_pag_layout',
            'type' => 'radio',
            'choices' => array(
                'layout-left' => 'Página com Sidebar Lateral',
                'layout-wide' => 'Página Inteira (Wide)',
            ),
            ) );
                // Layout pagina
        $wp_customize->add_setting( 'essone_pag_layout' , array(
            'default'     => 'layout-wide',
            'transport'   => 'refresh',
        ) );
    
        $wp_customize->add_control( 'essone_pag_layout', array(
            'label' => 'Estilo da pagina inicial',
            'section' => 'layout',
            'settings' => 'essone_pag_layout',
            'type' => 'radio',
            'choices' => array(
                'layout-left' => 'Página com Sidebar Lateral',
                'layout-wide' => 'Página Inteira (Wide)',
            ),
            ) );

        // Estilo dos widgets lateral
        $wp_customize->add_setting( 'essone_pag_layout_style' , array(
            'default'     => '',
            'transport'   => 'refresh',
        ) );
    
        $wp_customize->add_control( 'essone_pag_layout_style', array(
            'label' => 'Habilita separador Widgets lateral',
            'section' => 'layout',
            'settings' => 'essone_pag_layout_style',
            'type' => 'checkbox',
            'std'  => '0'
            ) );

        // Whatsapp Flutuante
        $wp_customize->add_setting( 'essone_whats_flut' , array(
            'transport'   => 'refresh',
        ) );
    
        $wp_customize->add_control( 'essone_whats_flut', array(
            'label' => 'Habilita Icone Whatsapp Flutuando na tela?',
            'section' => 'layout',
            'settings' => 'essone_whats_flut',
            'type' => 'checkbox',
            'std'  => '0'
            ) );

    /* -------------------Outros
    ---------------------------------------------------------------- */

  /* Nome Empresa */
  $wp_customize->add_setting('essone_name_shop', array(
	'default'		=> 'Empresa ME',

  ));

	$wp_customize->add_control( 'essone_name_shop', array(
        'type'     => 'text',
        'settings'  => 'essone_name_shop',
        'label'    => __( 'Texto da conversa inicial', 'essystemstart2' ),
        'section'  => 'top_section',
        'priority' => 1,
		'description' => __( 'Nome Completo da Empresa' ),		
    ));

  /* CNPJ */
  $wp_customize->add_setting('essone_cnpj_shop', array(
	'default'		=> '99.999.999/00001-99',

  ));

	$wp_customize->add_control( 'essone_cnpj_shop', array(
        'type'     => 'text',
        'settings'  => 'essone_cnpj_shop',
        'label'    => __( 'Texto da conversa inicial', 'essystemstart2' ),
        'section'  => 'top_section',
        'priority' => 1,
		'description' => __( 'CNPJ da Empresa' ),		
    ));

	/* TELEFONE */
	$wp_customize->add_setting('essone_contat_phone', array(
	'default'		=> '(DDD) 9-9999-9999',

	));

	$wp_customize->add_control( 'essone_contat_phone', array(

        'type'     => 'text',
        'settings'  => 'essone_contat_phone',
        'label'    => __( 'Numero de Telefone', 'essystemstart2' ),
        'section'  => 'top_section',	
        'priority' => 1,
		'description' => __( 'Telefone de Contato.', 'essystemstart2' ),

	));


	/* EMAIL */
	$wp_customize->add_setting('essone_contat_email', array(
	'default'		=> sanitize_email('email@email.com'),

	));

	$wp_customize->add_control( 'essone_contat_email', array(
        'type'     => 'text',
        'settings'  => 'essone_contat_email',
        'label'    => __( 'Email Address', 'essystemstart2' ),
        'section'  => 'top_section',
        'priority' => 1,
		'description' => __( 'Email para contato', 'essystemstart2' ),		
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

  /* Horario de funcionamento */
  $wp_customize->add_setting('essone_horario_func', array(
	'default'		=> 'Seg à Sex = 09hs as 18hs | Sáb = 09hs as 12hs',

  ));

	$wp_customize->add_control( 'essone_horario_func', array(
        'type'     => 'text',
        'settings'  => 'essone_horario_func',
        'label'    => __( 'Horário de Funcionamento'),
        'section'  => 'top_section',
        'priority' => 1,
		'description' => __( 'Informação aparecera em uma barra no topo do site.', 'essystemstart2' ),		
    ));

    /* Mini Mapa */

    $wp_customize->add_setting('essone_mini_map', array(
        'default'		=> '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3679.0260815083025!2d-47.33873958449034!3d-22.76441333853057!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c89971327a6129%3A0xfb614cdaa6bbe913!2sR.%20dos%20L%C3%ADrios%2C%20989%20-%20Cidade%20Jardim%2C%20Americana%20-%20SP%2C%2013467-160!5e0!3m2!1spt-BR!2sbr!4v1622512217132!5m2!1spt-BR!2sbr" width="300" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
    
        ));	
    
        $wp_customize->add_control( 'essone_mini_map', array(
              'type'     => 'textarea',
              'settings'  => 'essone_mini_map',
              'label'    => __( 'Iframe com Mini Mapa', 'essystemstart2' ),
              'section'  => 'top_section',
              'priority' => 1,
          'description' => __( 'Mapa do Google' ),		
          ));



    /* Texto do painel Usuarios */

    $wp_customize->add_setting('text_painel_login', array(
    'default'		=> 'Entrar',

    ));	

    $wp_customize->add_control( 'text_painel_login', array(
          'type'     => 'text',
          'settings'  => 'text_painel_login',
          'label'    => __( 'Texto do botão login no painel do cabeçalho do site', 'essystemstart2' ),
          'section'  => 'p-user',
          'priority' => 1,
      'description' => __( 'Normalmente utilizado  = "logar", "Entrar"', 'essystemstart2' ),		
      ));
  

        


}