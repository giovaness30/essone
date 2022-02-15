<?php 
/*
Template Name: Tester Home
*/

get_header();?>
<body <?php body_class('body-woocommerce'); ?>>
<div id="menuprincipal" class="col-12">
    <?php dynamic_sidebar( 'menu_principal_sidebar' );?>
</div>
<div class="pb-3">
    <?php if ( is_active_sidebar( 'slide_sidebar' )) : ?>
        <?php dynamic_sidebar( 'slide_sidebar' ); ?>
    <?php endif; ?>
</div>


<?php if(have_posts()) : while(have_posts()) : the_post();?>

    <?php the_content();?>

<?php endwhile; else: endif;?>
</body>
<?php get_footer();?>