<?php

if ( is_active_sidebar( 'footer1_sidebar' ) || is_active_sidebar( 'footer2_sidebar' ) || is_active_sidebar( 'footer3_sidebar' ) ) {?>
        <div id="footer-widget" class="footer-widget py-4 border-top">
            <div class="container">
                <div class="row col-12">
                    
                        <div id="footer1" class="col-12 col-md-4 col-lg-4"><?php dynamic_sidebar( 'footer1_sidebar' ); ?></div>
                    
                        <div id="footer2" class="col-12 col-md-4 col-lg-4"><?php dynamic_sidebar( 'footer2_sidebar' ); ?></div>
                    
                        <div id="footer3" class="col-12 col-md-4 col-lg-4 float-right"><?php dynamic_sidebar( 'footer3_sidebar' ); ?></div>
                    
                </div>
            </div>
        </div>

<?php }?>