<?php get_header();?>




<?php the_post(); ?>

<?php if ( is_day() ) : ?>
    <h1 class="page-title"><?php printf( __( 'Daily Archives: <span>%s</span>', 'seu-template' ), get_the_time(get_option('date_format')) ) ?></h1>
<?php elseif ( is_month() ) : ?>
    <h1 class="page-title"><?php printf( __( 'Monthly Archives: <span>%s</span>', 'seu-template' ), get_the_time('F Y') ) ?></h1>
<?php elseif ( is_year() ) : ?>
    <h1 class="page-title"><?php printf( __( 'Yearly Archives: <span>%s</span>', 'seu-template' ), get_the_time('Y') ) ?></h1>
<?php elseif ( isset($_GET['paged']) && !empty($_GET['paged']) ) : ?>
    <h1 class="page-title"><?php _e( 'Blog Archives', 'seu-template' ) ?></h1>
<?php endif; ?>
 
<?php rewind_posts(); ?>
 
<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
    <div id="nav-above" class="navigation">
     <div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">«</span> Older posts', 'seu-template' )) ?></div>
     <div class="nav-next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">»</span>', 'seu-template' )) ?></div>
    </div><!– #nav-above –>
<?php } ?>  

<div class="container">
	  <h1 class="title-list-categoria"><?php echo single_cat_title(); ?></h1>
	  <div class="list-films-categoria">
<?php while ( have_posts() ) : the_post(); ?>
 	
	    <div class="list-films-categoria-items" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	     <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	 	 <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail-list-taxonomy'); ?></a>
	     <div class="entry-meta">
	      <span class="meta-prep meta-prep-author"><?php _e('Autor ', 'seu-template'); ?></span>
	      <span class="author vcard"><a class="link-author" href="<?php echo get_author_link( false, $authordata->ID, $authordata->user_nicename ); ?>"><?php the_author(); ?></a></span>
	      <span class="meta-sep"> | </span>
	      <span class="meta-prep meta-prep-entry-date"><?php _e('Publicado em ', 'seu-template'); ?></span>
	      <span class="entry-date"><abbr class="published" ><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
	     </div><!– .entry-meta –>
<!--	 
	     <div class="entry-summary">
			<?php echo substr(strip_tags($post->post_content), 0, 100).' ... </a>';?>
	     </div><!– .entry-summary –>
-->	 

	<!--olhar esse codigo -->
	     <div class="entry-utility">
	      <?php if ( $cats_meow = cats_meow(', ') ) : // Retorna categorias que não aquela pesquisada ?>
	      <span class="cat-links"><?php printf( __( 'Also posted in %s', 'seu-template' ), $cats_meow ) ?></span>
	      <span class="meta-sep"> | </span>
	<?php endif ?>
	     </div><!– #entry-utility –>
	    </div><!– #post-<?php the_ID(); ?> –>
<?php endwhile; ?>  
		</div>

<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
    <div id="nav-below" class="navigation"> 
	<div class="nav-previous"><?php previous_posts_link(__( '<span class="meta-nav">«</span> Página Anterior', 'seu-template' )) ?></div>
    <div class="nav-next"><?php next_posts_link(__( 'Próxima Página  <span class="meta-nav">»</span>', 'seu-template' )) ?></div>

    </div><!– #nav-below –>
<?php } ?>
</div>

<?php get_footer(); ?>