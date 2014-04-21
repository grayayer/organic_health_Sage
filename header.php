<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes('xhtml'); ?>>
	<head profile="http://gmpg.org/xfn/11">

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="language" content="en" />

	<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
	<link rel="shortcut icon" href="<?php echo bloginfo('template_url'); ?>/images/favicon.ico" type="image/x-icon" />

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> <?php _e("RSS Feed", 'organicthemes'); ?>" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> <?php _e("Atom Feed",'organicthemes'); ?>" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_enqueue_script("jquery"); ?>
	<?php wp_head(); ?>

	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/superfish/superfish.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/superfish/hoverIntent.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.flow.1.1.js" ></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/iepngfix_tilebg.js"></script>
    
    <script type="text/javascript">
        var $j = jQuery.noConflict();
        $j(function() {
            $j("div#controller").jFlow({
                slides: "#slides",
                width: "928px",
                height: "30px",
                timer: <?php echo ot_option('slider_interval'); ?>,
                duration: 800
            });
        });
    
    </script>
    
    <script type="text/javascript"> 
     
        $j(document).ready(function() { 
            $j('.menu').superfish(); 
        }); 
     
    </script>
    
    <!--IE6 Fix-->
    <style type="text/css">
        img, div, a, input, body, blockquote, li { 
            behavior: url(<?php bloginfo('template_url'); ?>/images/iepngfix.htc);
        }
    </style>

</head>

<body <?php if(function_exists('body_class')) body_class(); ?>>

<div id="wrap">

    <div id="header">
        <div id="title">
        <a href="<?php echo get_option('home'); ?>"></a>
    </div>
        
    <div id="navbar">
        <?php if ( function_exists('wp_nav_menu') ) { // Check for 3.0+ menus
		wp_nav_menu( array( 'title_li' => '', 'depth' => 4, 'container_class' => 'menu' ) ); }
		else {?>
		<ul class="menu"><?php wp_list_pages('title_li=&depth=4'); ?></ul>
		<?php } ?>
    </div>
    
</div>
            
<div class="clear"></div>