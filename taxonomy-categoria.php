<?php get_header();?>

<?php the_post();


global $query_string; //the magic line
query_posts($query_string.'&posts_per_page=10');
?>
 
<div class="container">
	<div class="row">
		<div class="col-sm-9 col-md-8 col-lg-9">
			<h1 class="title-list-categoria"><?php echo single_cat_title(); ?></h1>
			<div class="listing">
				<?php if (have_posts()) :
					while ( have_posts() ) : the_post(); ?>
					    <article id="post-<?php echo get_the_ID(); ?>" class="post">	
					   	   <div id="poster">   							
							 <?php
						        if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
						    ?>     <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'full', array( 'class'  => 'img-responsive' ) ); ?></a>
						    <?php
						        } 
						    ?>
						   </div>
						   <?php $categories = get_the_terms( $id, 'category' );
						   echo $categories->name; 

						   foreach ($categories as $term) {?>
					           <a href="<?=get_term_link($term->term_id)?>" class="category"> <?=$term->name?> </a>
					     <?php
					       }
			      		 ?>
				       	   <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					   </article> 

					<?php endwhile; ?> 
				<?php endif; ?>  
			</div>
			<?php //wp_pagination();?>
		</div>
		

		<div class="col-sm-3 col-md-4 col-lg-3 list-sidebar" style="background-color: red;">
			<?php
				dynamic_sidebar( 'barra-lateral' );
			?>
		</div>

	</div>
</div><br>

<?php get_footer(); ?>