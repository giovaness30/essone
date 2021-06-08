<?php 
/*
Template Name: Slider Home
*/

get_header();?>
<div class="pb-3">
    <?php if ( is_active_sidebar( 'slide_sidebar' )) : ?>
        <?php dynamic_sidebar( 'slide_sidebar' ); ?>
    <?php endif; ?>
</div>


<?php if(have_posts()) : while(have_posts()) : the_post();?>

    <?php the_content();?>

<?php endwhile; else: endif;?>

<?php get_footer();?>