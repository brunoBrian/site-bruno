<?php get_header();

?> 

<div <?php echo body_class('container'); ?> >
	<?php if(have_posts()): ?>
		<?php while(have_posts()):the_post() ?>				
				<section class="single-content">
					<div class="" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
				
				 	 <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail-list-taxonomy'); ?></a>
				 	 <p class=""><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></p>
				     <div class="entry-meta">

				      <span class="meta-prep meta-prep-entry-date"><?php _e('Publicado em ', 'seu-template'); ?></span>
				      <span class="entry-date"><abbr class="published" ><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
				    </div><!– .entry-meta –>
				    <p><?php the_content();?></p>
<?php the_meta(); ?>
					

				</section>
		<?php endwhile ?>
	<?php endif ?>

</div>


<?php get_footer(); ?>