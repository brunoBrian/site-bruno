<?php get_header();

?> 

<div <?php echo body_class('container'); ?> >
	<?php if(have_posts()): ?>
		<?php while(have_posts()):the_post() ?>				
				<section class="single-content">
					<h1><?php echo the_title();?></h1>
					<?php 
						$hide_featured_image = get_post_meta($post->ID, 'hide_featured_image', true);
						if(($hide_featured_image === '0') || $hide_featured_image === '') {
							the_post_thumbnail('thumbnail-single');
						}
					?>
					<p><?php the_content();?></p>
					

				</section>
		<?php endwhile ?>
	<?php endif ?>

</div>


<?php get_footer(); ?>