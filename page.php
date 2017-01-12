<?php get_header();

?> 

<div class="container">
	<?php if(have_posts()): ?>
		<?php
			$terms_area = get_the_terms( get_the_ID(), 'page');
				foreach ( $terms_area as $term ) {
					$nome_area = $term->name;
					$link = get_bloginfo( 'url' ) . '/page/' . $term->slug . '/';
				}

			$terms_areas = get_the_terms( get_the_ID(), 'gato');
			foreach ( $terms_areas as $term ) {
					$nome_area = $term->name;
					$link = get_bloginfo( 'url' ) . '/gato/' . $term->slug . '/';
				}
		?>
		<?php while(have_posts()):the_post() ?>
			<article id="post-<?php the_ID() ?>" class="article">
				<header class="article-header">
					<p class="article-category"><a href="<?php echo esc_html( $link ); ?>"><?php echo esc_html( $nome_area ); ?></a></p>
					<h1 class="article-title"><?php the_title() ?></h1>
					<?php if(has_excerpt()): ?>
						<h2 class="article-subtitle"><?php echo esc_html( get_the_excerpt() ) ?></h2>
					<?php endif ?>
					
					<div class="article-author">
						Por 
						<?php if(get_post_meta($post->ID,'author',true)): ?>
							<span><strong><?php echo esc_html( get_post_meta($post->ID,'author',true) ) ?></strong></span>
						<?php elseif(function_exists('get_coauthors')): ?>
							<?php foreach(array_slice(get_coauthors(),0,3) as $coauthor): ?>
								<span><?php echo esc_html($coauthor->display_name) ?></span>
							<?php endforeach ?>
						<?php endif ?>
					</div>
					
					<div class="article-date">
						<i class="material-icons">access_time</i>
						<span>
							<?php the_time('j M Y\, H\hi') ?>
							<?php if(get_the_modified_time()!=get_the_time()): ?>
								<?php the_modified_time('\- \A\t\u\a\l\i\z\a\d\o\ \e\m j M Y\, H\hi') ?>
							<?php endif ?>
						</span>
					</div>
				</header>
				
				<section class="share">
					<?php include(get_template_directory().'/inc/share.php') ?>
				</section>
				
				<section class="article-content profissoes">
					<?php
						$hide_featured_image = get_post_meta($post->ID, 'hide_featured_image', true);
						if(($hide_featured_image === '0') || $hide_featured_image === '') {
							the_post_thumbnail('featured-image');
						}
					?>

					<div class="row">
						<div class="col-md-6">

					<?php 
						$nome = esc_html( get_post_meta( $post->ID, 'nome',true ) );
						if(!empty($nome)){
							echo '<h3>Nome</h3>';
							echo wpautop(do_shortcode( $nome ));
						}


						$idade = esc_html( get_post_meta( $post->ID, 'idade',true ) );
						if(!empty($idade)){
							echo '<h3>Idade</h3>';
							echo wpautop(do_shortcode( $idade ));
						}

						$raca = esc_html( get_post_meta( $post->ID, 'raca',true ) );
						if(!empty($raca )){
							echo '<h3>Raça</h3>';
							echo wpautop(do_shortcode( $raca  ));
						}

						$sexo = esc_html( get_post_meta( $post->ID, 'sexo',true ) );
							echo '<h3>Sexo</h3>';
							echo wpautop(do_shortcode( $sexo  ));
					?>
						</div>
						<div class="col-md-6">
					<?php 

						$pais = get_post_meta( get_the_ID(), 'pais',true );
						if(!empty($pais )){
							echo '<h3>País</h3>';
							echo wpautop(do_shortcode( $pais  ));
						}

				    	$cidade = get_post_meta( get_the_ID(), 'cidade',true );
				    	if(!empty($cidade)){
							echo '<h3>Cidade</h3>';
							echo wpautop(do_shortcode( $cidade  ));
						}

				    	$estado = get_post_meta( get_the_ID(), 'estado',true );
				    	if(!empty($estado )){
							echo '<h3>Estado</h3>';
							echo wpautop(do_shortcode( $estado  ));
						}
					?>
					</div>
						</div>
					<?php 
						the_content();
					?>

				</section>
				
				<?php if(has_tag()): ?>
					<section class="article-tags">
						<span>Notícias sobre</span>
						<?php the_tags('','') ?>
					</section>
				<?php endif ?>
				
				<section class="share hidden-md hidden-lg">
					<?php include('inc/share.php') ?>
				</section>
				
				<div class="OUTBRAIN" data-src="<?php esc_attr(the_permalink()) ?>" data-widget-id="AR_4" data-ob-template="<?php echo esc_attr( abril_get_outbrain_ob_template() ); ?>"></div>
				
				<script async="async" src="http://widgets.outbrain.com/outbrain.js"></script> 
				
				<section class="comments">
					<?php if(comments_open()||get_comments_number()): ?>
						<?php comments_template() ?>
					<?php endif ?>
				</section>

				<?php get_template_part( 'inc/ad-sense', 'ad-sense' ); ?>
			</article>
		<?php endwhile ?>
	<?php endif ?>

</div>


<?php get_footer(); ?>