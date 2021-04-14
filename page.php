<?php get_header();?>
<div class="pb-3">
	<?php if ( is_home() || is_front_page() && is_active_sidebar( 'slide_sidebar' ) ) : ?>
		<?php dynamic_sidebar( 'slide_sidebar' ); ?>
	<?php endif; ?>
</div>
<div class="album pt-3">

	<div class="container">
		<div class="row">
			<div class="altcont col-lg-12">
				<?php if(have_posts()) : while(have_posts()) : the_post();?>

					<?php if (get_theme_mod('essone_pag_layout') == 'layout-left'){?>

					<div class="row">
					<div class="col-12 col-md-3 mb-1">
						<?php if ( is_active_sidebar( 'left_sidebar' )) : ?>
							<?php dynamic_sidebar( 'left_sidebar' ); ?>
						<?php endif; ?>
					</div>
					<div class="col-12 col-md-9"><?php the_content();?></div>
					</div>
					<?php }else{?>

					<?php the_content();?>

					<?php }?>

				<?php endwhile; else: endif;?>
			</div>
		</div>
	</div>
</div>

<?php get_footer();?>