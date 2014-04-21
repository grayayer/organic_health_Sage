<?php get_header(); ?>

<div id="content">

	<div id="contentleft">
	
		<div class="postarea">
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		
			<?php the_excerpt(__('Read More'));?><div class="clear"></div>
			
			<div class="postdate">
					<p><span class="time"><?php the_time('F j, Y'); ?></span> &middot; <?php _e("by",'organicthemes'); ?>&nbsp;<?php the_author_posts_link(); ?> &middot; <?php _e("in",'organicthemes'); ?> <?php the_category(', ') ?> &middot; <?php _e("Tags",'organicthemes'); ?>: <?php the_tags('') ?></p> 
			</div>
			
			<?php endwhile; else: ?>
			
			<p><?php _e("Sorry, no posts matched your criteria.",'organicthemes'); ?></p><?php endif; ?>
			<p><?php posts_nav_link(' &#8212; ', __('&laquo; Previous Page'), __('Next Page &raquo;')); ?></p>
			
		</div>
				
	</div>
	
<?php include(TEMPLATEPATH."/sidebar.php");?>
		
</div>

<?php // End main column  ?>

<?php get_footer(); ?>