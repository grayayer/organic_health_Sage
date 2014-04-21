<div class="jFlow"> 

    <div id="slides">
        <?php $recent = new WP_Query("cat=" .ot_option('slider_cat'). "&showposts=" .ot_option('slider_num') ); while($recent->have_posts()) : $recent->the_post();?>
        <div>
            <span class="jFlowControl"></span>
            <h2><?php the_title(); ?></h2>
        </div>
        <?php endwhile; ?>
    </div>
    
</div>