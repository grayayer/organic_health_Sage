<?php get_header(); ?>

<div id="content">

	<div id="contentleft">
	
		<div class="postarea">
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<h1><?php the_title(); ?></h1>
			
			<div class="clear"></div>

			<?php the_content(__('Read more'));?><div class="clear"></div>
            
            <div class="postdate">
				<p><span class="time"><?php the_time('F j, Y'); ?></span> &middot; <?php _e("by",'organicthemes'); ?>&nbsp;<?php the_author_posts_link(); ?> &middot; <?php _e("in",'organicthemes'); ?> <?php the_category(', ') ?> &middot; <?php _e("Tags",'organicthemes'); ?>: <?php the_tags('') ?></p>	
			</div>
		 			
			<!--
			<?php trackback_rdf(); ?>
			-->
			
			<?php endwhile; else: ?>
			
			<p><?php _e("Sorry, no posts matched your criteria.",'organicthemes'); ?></p><?php endif; ?>
			
		</div>
			
		<div class="comments">
			<?php comments_template('',true); ?>
		</div>
		
	</div>
	
<?php include(TEMPLATEPATH."/sidebar.php");?>
		
</div>

<?php // End main column  ?>

<?php get_footer(); ?>