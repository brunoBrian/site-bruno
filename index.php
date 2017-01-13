<?php get_header();

$args = array( 'post_type' => 'filmes', 'posts_per_page' => 6); 
$args_page = array('post_type' => 'page', 'posts_per_page' => 3);

?> 
<div class="container">
	<div class="row-fluid">
		<div class="span10">
			<div class="listing">
			<h1>Posts</h1>
				<?php $the_query = new WP_Query( $args );
				if ($the_query->have_posts()) :
			       while ($the_query->have_posts()) : 
			       	   $the_query->the_post();?>   
					   
					   <div id="post-<?php echo get_the_ID(); ?>" class="post">		   	
						   <?php the_post_thumbnail(); 
						   $categories = get_the_terms( $id, 'category' );
						   echo $categories->name; 

						   foreach ($categories as $term) {?>
					           <a href="<?=get_term_link($term->term_id)?>" class="category"> <?=$term->name?> </a>
					     <?php
					       }
			      		 ?>
				       	   <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					   </div>
					   
			       <?php endwhile; ?>
			     <?php endif; ?>
			</div>

			<div class="listing">
				<h1>Páginas</h1>
				<?php $the_query_page = new WP_Query( $args_page );

				if ($the_query_page->have_posts()) :
			       while ($the_query_page->have_posts()) : 
			       	   $the_query_page->the_post();?>   

			       	  <div id="page-<?php echo get_the_ID(); ?>" class="page">
				       	   <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					   </div>
			       <?php endwhile; ?>
			     <?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>