<?php get_header(); ?>

<div id="content">

	<div id="contentleft">
	
		<div class="postarea">
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<h1><?php the_title(); ?></h1>
		
			<?php the_content(__('Read More'));?><div class="clear"></div><?php edit_post_link(__('(Edit)'), '', ''); ?>
			<?php endwhile; else: ?>
			
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
		
		</div>
		
	</div>
	
<?php include(TEMPLATEPATH."/sidebar.php");?>
		
</div>

<?php // End main column  ?>

<?php get_footer(); ?>