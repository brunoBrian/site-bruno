<?php
get_header();
?>
<div class="container search">
	<div class="row">
	<div class="col-sm-9 col-md-8 col-lg-9 listagem">
		<div class="content">
		<?php
			$args_search = array(
				's' => $_GET["s"],
				'posts_per_page' => 5
			);
			echo "<input type='hidden' id='hideSearch' value='".$_GET["s"]."'>";
			if( $_GET["posttype"] ){
				$args_search["post_type"] = $_GET["posttype"];
				echo "<input type='hidden' id='hidePostType' value='".$_GET["posttype"]."'>";
			}
		?> 
			<h2>Resultados da Pesquisa</h2>
			<?php $the_query_post = new WP_Query( $args_search );
			if ( $the_query_post->have_posts() ) {
				while ( $the_query_post->have_posts() ) {
					$the_query_post->the_post();
					
					?>
					<div class="result-item">
						<article id="post-<?php echo get_the_ID(); ?>">
							<div class="image">
								<div class="thumbnail animation-2">
									<?php
							        if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
							    	?> <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'full', array( 'class'  => 'img-responsive' ) ); ?></a>
							    	<?php
							        } 
							    	?>
								</div>
							</div>
							<div class="details">
								<div class="title">
									<h4><a href="<?php echo get_the_permalink(); ?>"> <?php echo get_the_title(); ?></a></h4>
								</div>
								<div class="conteudo">
								<p><?php echo the_excerpt();?></p>
								</div>
							</div>
						</article>
					</div>
					<?php
				}
			}
			?>
		</div>
		<button class="btn btn-primary btn-lg center-block" id="btnsearch">Carregar mais</button>
	</div>

	<div class="col-sm-3 col-md-4 col-lg-3 list-sidebar">
			<?php
				dynamic_sidebar( 'barra-lateral' );
			?>
		</div>
	</div>
</div>
<?php
get_footer();
?>