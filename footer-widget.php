<?php

if ( is_active_sidebar( 'footer1_sidebar' ) || is_active_sidebar( 'footer2_sidebar' ) || is_active_sidebar( 'footer3_sidebar' ) ) {?>
        <div id="footer-widget" class="row py-4 border-top">
            <div class="container">
                <div class="row">
                    <?php if ( is_active_sidebar( 'footer1_sidebar' )) : ?>
                        <div class="col-12 col-md-4"><?php dynamic_sidebar( 'footer1_sidebar' ); ?></div>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( 'footer2_sidebar' )) : ?>
                        <div class="col-12 col-md-4"><?php dynamic_sidebar( 'footer2_sidebar' ); ?></div>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( 'footer3_sidebar' )) : ?>
                        <div class="col-12 col-md-4"><?php dynamic_sidebar( 'footer3_sidebar' ); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

<?php }?>