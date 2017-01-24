<?php get_header();?>

<?php the_post();?>

<?php rewind_posts(); 

?>

<div class="container">
	<div class="row">
		<div class="col-sm-9 col-md-8 col-lg-9">
			<h1 class="title-list-categoria"><?php echo single_cat_title(); ?></h1>
			<div class="listing">
				<?php 
				if (have_posts()) :
					while (have_posts() ) : the_post(); ?>
						<?php $post_type = get_post_type();?>
					    <article id="post-<?php echo get_the_ID(); ?>" class="post">	
					   	   <div id="poster">   							
							 <?php
							  if( $post_type == 'filmes') :
						        if ( has_post_thumbnail() ) { ?>
						            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'full', array( 'class'  => 'img-responsive' ) ); ?></a>
						        <?php
						        } 
						      endif; ?> 
						      <?php
							  if( $post_type == 'series') :
						        if ( has_post_thumbnail() ) { ?>
						    		<div class="title-serie">Série</div>
						            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'full', array( 'class'  => 'img-responsive' ) ); ?></a>
						        <?php
						        } 
						      endif; ?> 
						   </div>
							<div class="language-films">Dublado/Legendado</div>
							<div class="number-visits"><?php echo getPostViews(get_the_ID()); ?></div> 
				       	   <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					   </article> 

					<?php endwhile; wp_pagination();  
				endif;?>
				
			</div>
		</div>
		

		<div class="col-sm-3 col-md-4 col-lg-3 list-sidebar">
			<?php
				dynamic_sidebar( 'barra-lateral' );
			?>
		</div>
	</div>
</div>

<?php get_footer(); ?>