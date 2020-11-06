<?php get_header();?>
<div class="album py-5 bg-light">
	<div class="container">
		<div class="row">
			<div class="altcont col-lg-12">
				<?php if(have_posts()) : while(have_posts()) : the_post();?>

					<?php the_content();?>

				<?php endwhile; else: endif;?>
			</div>
		</div>
	</div>
</div>

<?php get_footer();?>