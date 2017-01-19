<?php get_header();


$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array('post_type' => 'filmes', 'posts_per_page' => 15, 'paged' => $paged );
query_posts($args); 

?> 
<div class="container">
	<div class="row">
    	<div class="col-sm-9 col-md-8 col-lg-9">
			<div class="listing">   							
			  <?php
				 $terms = get_terms(array(
					'taxonomy' => 'categoria',
					'hide-empty' => false,
				));
				foreach ($terms as $term) {?>
					<article id="post-<?php echo get_the_ID(); ?>" class="post list-home">	
		   	   			<div id="poster">
			   	   		<?php
			   	   			echo "<div class='title-category-home'>";
							echo '<h2>' .$term->name. '</h2>';echo "</div>";
							echo '<a href='.get_term_link($term->term_id, "categoria").' ><img class="img-responsive" src="' . get_template_directory_uri() . '/cat-images/'. $term->slug . '.jpg"/>';
							echo  '</a>';
						?>
						</div>
					</article>
			<?php
				}					
			?>
			</div>
		<!--ul#menu>ul.item$*4>a{Teste $}-->

		</div>
		<div class="col-sm-3 col-md-4 col-lg-3 list-sidebar" style="background-color: red;">
			<?php
				dynamic_sidebar( 'barra-lateral' );
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>