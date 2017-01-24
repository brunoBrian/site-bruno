<?php get_header();

?> 

<div <?php echo body_class('container'); ?> >
	<?php if(have_posts()): ?>
		<?php while(have_posts()):the_post() ?>	
			<?php setPostViews(get_the_ID());?>			
				<section class="single-content">
					<div class="" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
				
				 	 <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail-list-taxonomy'); ?></a>
				 	 <p class=""><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></p>
				     <div class="entry-meta">

				      <span class="meta-prep meta-prep-entry-date"><?php _e('Publicado em ', 'seu-template'); ?></span>
				      <span class="entry-date"><abbr class="published" ><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
				    </div><!– .entry-meta –>
				    <p><?php the_content();?></p>
<?php 
					$tempo = esc_html( get_post_meta( $post->ID, 'tempo',true ) );
					if(!empty($tempo)){
						echo '<h3>Tempo</h3>';
						echo wpautop(do_shortcode( $tempo ));
					}
					$ano_lancamento = esc_html( get_post_meta( $post->ID, 'ano_lancamento',true ) );
					if(!empty($ano_lancamento)){
						echo '<h3Data de Lançamento</h3>';
						echo wpautop(do_shortcode( $ano_lancamento ));
					}
					$pais = esc_html( get_post_meta( $post->ID, 'pais_origem',true ) );
					if(!empty($pais_origem)){
						echo '<h3>País de Origem</h3>';
						echo wpautop(do_shortcode( $pais_origem ));
					}
					$classificacao = esc_html( get_post_meta( $post->ID, 'classificacao',true ) );
					if(!empty($classificacao)){
						echo '<h3>Classificacao</h3>';
						echo wpautop(do_shortcode( $classificacao ));
					}
					$direcao = esc_html( get_post_meta( $post->ID, 'direcao',true ) );
					if(!empty($direcao)){
						echo '<h3>Direcao</h3>';
						echo wpautop(do_shortcode( $direcao ));
					}
					$atores = esc_html( get_post_meta( $post->ID, 'atores',true ) );
					if(!empty($atores)){
						echo '<h3>Atores</h3>';
						echo wpautop(do_shortcode( $atores ));
					}
					$classificacao_etaria = esc_html( get_post_meta( $post->ID, 'classificacao_etaria',true ) );
					if(!empty($classificacao_etaria)){
						echo '<h3>Classificação Etária</h3>';
						echo wpautop(do_shortcode( $classificacao_etaria ));
					}
					$idioma = esc_html( get_post_meta( $post->ID, 'idioma',true ) );
					if(!empty($idioma)){
						echo '<h3>Idioma</h3>';
						echo wpautop(do_shortcode( $idioma ));
					}
					$legenda = esc_html( get_post_meta( $post->ID, 'legendas',true ) );
					if(!empty($legenda)){
						echo '<h3>Legenda</h3>';
						echo wpautop(do_shortcode( $legenda ));
					}

					echo '<h3>Visualizações</h3>';
					echo getPostViews(get_the_ID());
?>
				</section>
		<?php endwhile ?>
	<?php endif ?>

</div>


<?php get_footer(); ?>