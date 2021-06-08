<?php get_header();?>
<div class="div-conteudo album pt-3">
	<div class="container">
		<div class="row">
			<div class="altcont col-lg-12">
				<div class="row">
                    <div class="col-12 d-flex justify-content-center"><img class="img-fluid" src="<?php echo get_template_directory_uri()?>/images/404.png" alt="404error"></div>
                    <div class="col-12 d-flex justify-content-center"><a href="<?php esc_url( home_url('/'));?>"><button class="btn btn-outline-info">Voltar para Página inicial</button></a></div>
                </div>
			</div>
		</div>
	</div>
</div>
<?php get_footer();?>