<?php
/*
Plugin Name: Add Meta Boxes
Plugin URI: http://www.nathanrice.net/
Description: Allows you to add boxes and fields to the Write Post panel, and store the value as a custom field.
Version: 1.0
Author: Nathan Rice
Author URI: http://www.nathanrice.net/
*/

//A simple function to get data stored in a custom field
if(!function_exists('get_custom_field')) {
function get_custom_field($field) {
	global $post;
	$custom_field = get_post_meta($post->ID, $field, true);
	echo $custom_field;
}
}

// Adds a custom section to the "advanced" Post and Page edit screens
function ot_add_custom_box() {
	if( function_exists( 'add_meta_box' )) {
		add_meta_box( 'ot_custom_box_1', __( 'Video Code', 'organicthemes' ), 'ot_inner_custom_box_1', 'page', 'normal', 'high' );	}
}
   
/* Prints the inner fields for the custom post/page section */
function ot_inner_custom_box_1() {
	global $post;
	
	// Use nonce for verification ... ONLY USE ONCE!
	echo '<input type="hidden" name="ot_noncename" id="ot_noncename" value="' . 
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	
	// The actual fields for data entry
	echo '<p><label for="_seo_title">' . __("<strong>Enter the embedded video code below:<br /></strong> (This is used if you choose to replace the photo on the homepage from the theme options menu.)", 'organicthemes' ) . '</label></p>';
	echo '<textarea style="width: 95%;height: 100px;" name="_video_code">' . get_post_meta($post->ID, '_video_code', true) . '</textarea><br /><br />';
}

/* When the post is saved, saves our custom data */
function ot_save_postdata($post_id, $post) {
	
	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times
	if ( !wp_verify_nonce( $_POST['ot_noncename'], plugin_basename(__FILE__) )) {
	return $post->ID;
	}

	// Is the user allowed to edit the post or page?
	if ( 'page' == $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post->ID ))
		return $post->ID;
	} else {
		if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;
	}

	// OK, we're authenticated: we need to find and save the data
	// We'll put it into an array to make it easier to loop though.
	
	$mydata['_video_code'] = $_POST['_video_code'];
	
	// Add values of $mydata as custom fields
	
	foreach ($mydata as $key => $value) { //Let's cycle through the $mydata array!
		if( $post->post_type == 'revision' ) return; //don't store custom data twice
		$value = implode(',', (array)$value); //if $value is an array, make it a CSV (unlikely)
		if(get_post_meta($post->ID, $key, FALSE)) { //if the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { //if the custom field doesn't have a value
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key); //delete if blank
	}

}

/* Use the admin_menu action to define the custom boxes */
add_action('admin_menu', 'ot_add_custom_box');

/* Use the save_post action to do something with the data entered */
add_action('save_post', 'ot_save_postdata', 1, 2); // save the custom fields
?>