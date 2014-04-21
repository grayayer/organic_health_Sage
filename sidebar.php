<?php // Begin sidebar  ?>

<div id="sidebar">
    
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) : ?>
	
		<div class="widget">
            <h4>Widget Area</h4>
            <p>This section is widgetized. To add widgets here, go to the <a href="<?php echo admin_url(); ?>widgets.php">Widgets</a> panel in your WordPress admin, and add the widgets you would like to <strong>Sidebar</strong>.</p>
            <p><small>*This message will be overwritten after widgets have been added</small></p>
        </div>
		
	<?php endif; ?>
	
</div>

<?php // End sidebar  ?>