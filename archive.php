<?php get_header(); 

$paged = ( get_query_var('page') ) ? get_query_var('page') : 1; $query = new WP_Query( array( 'paged' => $paged ) );

$post_type = get_post_type();
$args = array('post_type' => array($post_type), 'posts_per_page' => 10, 'paged' => $paged);
$the_query = new WP_Query( $args );

?>


<div class="container">
	<div class="row">
		<div class="col-sm-9 col-md-8 col-lg-9">
			<h1 class="title-list-categoria"><?php echo post_type_archive_title(); ?></h1>
			<div class="listing">
			<?php if ($the_query->have_posts()) :
					while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					    <article id="post-<?php echo get_the_ID(); ?>" class="post">	
					   	   <div id="poster">  					
							 <?php
						        if ( has_post_thumbnail() ) { ?>
						            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'full', array( 'class'  => 'img-responsive' ) ); ?></a>
						        <?php
						        } 
									?> 
						   </div>
							<div class="language-films">Dublado/Legendado</div>
							<div class="number-visits"><?php echo getPostViews(get_the_ID()); ?></div> 
				       	   <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					   </article> 
					<?php endwhile; wp_pagination(); ?> 

				<?php endif; ?>  
			</div>
		</div>
				
		<div class="col-sm-3 col-md-4 col-lg-3 list-sidebar">
			<?php
				dynamic_sidebar( 'barra-lateral' );
			?>
		</div>
	</div>
</div>
         
        <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>