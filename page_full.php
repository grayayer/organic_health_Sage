<?php
/*
Template Name: Full Width
*/
?>

<?php get_header(); ?>

<div id="content">

	<div id="contentwide">
	
		<div class="postareawide">
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            
            <?php if( get_post_meta($post->ID, "banner", true) ): ?>
            <img class="banner" src="<?php echo get_post_meta($post->ID, "banner", $single = true); ?>" alt="<?php the_title(); ?>" />
            <?php else: ?>
            <?php endif; ?>
            
			<h1><?php the_title(); ?></h1>
		
			<?php the_content(__('Read more'));?><div class="clear"></div><?php edit_post_link(__('(Edit)'), '', ''); ?>
			<?php endwhile; else: ?>
			
			<p><?php _e("Sorry, no posts matched your criteria.",'organicthemes'); ?></p><?php endif; ?>
		
		</div>
		
	</div>
			
</div>

<?php // The main column ends  ?>

<?php get_footer(); ?>