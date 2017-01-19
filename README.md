# site-bruno

<h4>Filmes</h4>

				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post();  ?>
					   
						   <article id="post-<?php echo get_the_ID(); ?>" class="post">	
						   	   <div id="poster" style="background-color: yellow">   							
								 <?php
							        if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
							    ?>     <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'full', array( 'class'  => 'img-responsive' ) ); ?></a>
							    <?php
							        } 
							    ?>
							   </div>
							   <?php $categories = get_the_terms( $id, 'categoria' );
							   echo $categories->name; 

							   foreach ($categories as $term) {?>
						           <a href="<?=get_term_link($term->term_id)?>" class="category"> <?=$term->name?> </a>
						     <?php
						       }
				      		 ?>
					       	   <h2 id="title-films"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
						   </article>

					<?php endwhile; ?>
				<?php else : ?>
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				<?php endif; ?>
			</div>
			
		<!--ul#menu>ul.item$*4>a{Teste $}-->

		</div>
		<div class="col-sm-3 col-md-4 col-lg-3 list-sidebar" style="background-color: red;">
			<?php
				dynamic_sidebar( 'barra-lateral' );
			?>
		</div>