<?php get_header();?>

<div class="album py-2">
	<div class="container">
		<div class="row">
			<div class=" col-12">

				<?php if(have_posts()) : while(have_posts()) : the_post();?>

					<?php the_content();?>

				<?php endwhile; else: endif;?>
                
			</div>
		</div>
	</div>
</div>

<?php get_footer();?>