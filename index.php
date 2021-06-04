<?php get_header();?>


<div class="pt-2">
	<?php if(have_posts()) : while(have_posts()) : the_post();?>

		<?php the_content();?>

	<?php endwhile; else: endif;?>
</div>               

<?php get_footer();?>