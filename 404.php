<?php get_header(); ?>

<div id="content">

	<div id="contentleft">
	
		<div class="postarea">
			
			<h1><?php _e("Error 404 - That means the page was not found",'organicthemes'); ?></h1>
			<p>&nbsp;</p>
			<p>
				<strong><?php _e("Here are a few ways to help you find what you are looking for... ",'organicthemes'); ?></strong>
			</p>
			<ol>
				<li>
					<strong><?php _e("Use this box to search",'organicthemes'); ?>:</strong><br/>
					<form action="<?php bloginfo('siteurl');?>">
						<input type="text" name="s" id="searchbox"/> <input type="submit" id="searchbutton" value="<?php _e("Search"); ?>"/>
					</form>
				</li>
				<li>
					<p><?php _e("Try looking back through the site archives",'organicthemes'); ?></p>
					<strong><?php _e("Pages:"); ?></strong>
						<ul>
							<?php wp_list_pages('title_li='); ?>
						</ul>

					<strong><?php _e("Posts by Month:",'organicthemes'); ?></strong>
						<ul>
							<?php wp_get_archives('type=monthly'); ?>
						</ul>

					<strong><?php _e("Posts by Category:",'organicthemes'); ?></strong>
						<ul>
							<?php wp_list_cats('sort_column=name'); ?>
						</ul>
				</li>
                <li>
					<strong><?php _e("Check your spelling and case",'organicthemes'); ?>:  </strong> <?php _e("Be sure you didn't misspell a word of Capitalize the wrong letter."); ?>
				</li>
				<li>
					<strong><?php _e("If all else fails, try going back to the",'organicthemes'); ?></strong> <a href="<?php bloginfo('siteurl');?>"><?php _e("Homepage",'organicthemes'); ?></a>
				</li>
			</ol>
		</div>
		
	</div>
	
<?php include(TEMPLATEPATH."/sidebar.php");?>
		
</div>

<?php // End main column  ?>

<?php get_footer(); ?>