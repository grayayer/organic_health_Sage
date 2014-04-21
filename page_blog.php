<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>

<div id="content">

	<div id="contentleft">
	
		<div class="postarea">
				
			<?php $page = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("cat=".ot_option('blog_cat')."&showposts=".ot_option('blog_cat_num')."&paged=$page"); while ( have_posts() ) : the_post() ?>
            
			<h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
            
            <?php the_excerpt(__('Read More'));?><div class="clear"></div>
				
			<div class="postdate">
					<p><span class="time"><?php the_time('F j, Y'); ?></span> &middot; <?php _e("by",'organicthemes'); ?>&nbsp;<?php the_author_posts_link(); ?> &middot; <?php _e("in",'organicthemes'); ?> <?php the_category(', ') ?> &middot; <?php _e("Tags",'organicthemes'); ?>: <?php the_tags('') ?></p> 
			</div>
							
			<?php endwhile; ?>
			
			<p><?php posts_nav_link(); ?></p>
		
		</div>
		
	</div>
	
<?php include(TEMPLATEPATH."/sidebar.php");?>
		
</div>

<?php // End main column  ?>

<?php get_footer(); ?>