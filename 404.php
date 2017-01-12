<?php get_header();

?> 
<div id="primary" class="content-area">
	<main id="main" class="site-main " role="main">
		<div class="row">
			<section class="error-404 not-found col-md-12">
				<header>
					<h1 class="page-title">Não encontramos <span class="nowrap">a página :-(</span></h1>
				</header>

				<div class="page-content">
					<p class="headline">Ops! Parece que o link que você tentou acessar não existe mais ou mudou de endereço.</p>
					<p class="bg-theme"><a href="<?php echo esc_attr(get_bloginfo('url')); ?>" class="btn-home">Ir para a home</a></p>
				</div>
			</section>
		</div>
	</main>
</div><br>
<?php get_footer(); ?>