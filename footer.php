
                    </div>
                </div>
            </div>
        </div>
        <?php if(is_home() || is_front_page() || is_product()){
        include( get_template_directory() . '/footer-widget.php' );
        }?>

        <?php
        if( get_theme_mod( 'footer_img_bg' ) != '') { // if there is a background img
            $footer_img_bg = get_theme_mod('footer_img_bg'); // Assigning it to a variable to keep the markup clean
        }
        
        ?>
        
        <footer class="blog-footer" style="background-image:url('<?php echo $footer_img_bg ?>');">
            
            <p>&copy; <?php	echo get_bloginfo('name') ;?></p>
            <p class="footerdev">Desenvolvido por <a target="blank" href="https://essystem.com.br">ESSystem Sistemas</a></p>
            
            <a href="#"><img style="width:26px;" src="https://img.icons8.com/metro/26/000000/collapse-arrow.png"/></a>
            
        </footer>

        <?php if ( is_active_sidebar( 'shop_mobile_lf_sidebar' )) : ?>
            
            <div class="shop-mobile col-12 fixed-bottom">

                <div class="row py-2">

                    <div class="shop_mobile_lf_sidebar col-6 d-flex justify-content-center align-self-center">
                        <?php dynamic_sidebar( 'shop_mobile_lf_sidebar' ); ?>
                    </div>
                    
                    <div class="shop_mobile_rg_sidebar col-6 d-flex justify-content-center align-self-center">
                        <?php dynamic_sidebar( 'shop_mobile_rg_sidebar' ); ?>
                    </div>

                </div>

            </div>

        <?php endif; ?>

        <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="<?php bloginfo ('template_url');?>/inc/js/custom.js"></script>

        <?php wp_footer(); ?>
    </body>
</html>