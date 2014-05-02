<?php get_header(); ?>

<div id="content">

	<div id="homepage">

        <div class="hometop">

            <div class="hometopleft">

                <?php echo do_shortcode("[ngg_images gallery_ids='1' display_type='photocrati-nextgen_basic_slideshow' show_slideshow_link='1']"); ?>

                <?php $recent = new WP_Query('page_id='.ot_option('home_top')); while($recent->have_posts()) : $recent->the_post();?>

            </div>

            <div class="hometopright">

                <!--<h2><a href="<?php /**the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>

                <?php the_content_limit(520, ""); **/?> -->

                <h1>Rachael Vollmer, LMT</h1>
                <h2>Deep Tissue, Swedish and Prenatal Massage in Portland, Oregon</h2>
				
                <p> Rachael Vollmer, LMT, massage therapist and owner of Nature of Body, specializes in pre- and perinatal massage therapy, as well as massage for general relaxation, preventative care and wellness and relief from acute and chronic pain.

                <p> We also welcome Imuya McDaniel, LMT, as well as Portland lactation consultant, Karla Nussbaum, IBCLC, RLC, and are happy to be adding donation-based lactation support to Nature of Body offerings.  Our cozy office is located in the Hollywood district of NE Portland.  We invite you to learn more about the services we offer and how we can support you and your family on your path to health and wellness. 

                </p>               

                <a rel="nofollow" class="more-link" href="<?php the_permalink() ?>"><?php _e("Read More", 'organicthemes'); ?></a>

                <?php endwhile; ?>

            </div>

		</div>


        <div class="clear"></div>

        

<!--        <div class="homemiddle">

        	<?php /** include(TEMPLATEPATH."/includes/slider.php"); **/?>

        </div> -->

        

        <div id="homebottom">

        	<div class="left">

				<?php $recent = new WP_Query('page_id='.ot_option('hp_bottom1')); while($recent->have_posts()) : $recent->the_post();?>

                <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail( 'home-bottom-thumbnail' ); ?></a>

                <h2><a class="bottomlink" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>

                <?php endwhile; ?>

            </div>

            <div class="leftmid">

				<?php $recent = new WP_Query('page_id='.ot_option('hp_bottom2')); while($recent->have_posts()) : $recent->the_post();?>

                <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail( 'home-bottom-thumbnail' ); ?></a>

                <h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>

                <?php endwhile; ?>

            </div>

            <div class="rightmid">

				<?php $recent = new WP_Query('page_id='.ot_option('hp_bottom3')); while($recent->have_posts()) : $recent->the_post();?>

                <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail( 'home-bottom-thumbnail' ); ?></a>

                <h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>

                <?php endwhile; ?>

            </div>

            <div class="right">

				<?php $recent = new WP_Query('page_id='.ot_option('hp_bottom4')); while($recent->have_posts()) : $recent->the_post();?>

                <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail( 'home-bottom-thumbnail' ); ?></a>

                <h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>

                <?php endwhile; ?>
            </div>
        </div>
	</div>
</div>


<?php // End main column  ?>


<?php get_footer(); ?>