<?php get_header();

?> 
<div class="container">
	<div class="row-fluid">
		<div class="span10">
			<div class="listing">
			<h1><?php echo single_cat_title(); ?></h1>
			<?php if (have_posts()) : the_post();?>   
					   
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

			     <?php endif; ?>
			</div>

			
		</div>
	</div>
</div>
<?php get_footer(); ?>