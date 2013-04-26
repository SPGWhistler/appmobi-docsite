<?php
/*
Plugin Name: appMobi Customization Plugin
Description: appMobi customizations
*/

add_action( 'admin_init', 'appmobi_init_custom_fields' );
function appmobi_init_custom_fields() {
	// check that the metadata manager plugin is active by checking if the two functions we need exist
	if( function_exists( 'x_add_metadata_group' ) && function_exists( 'x_add_metadata_field' ) ) {
		x_add_metadata_field('appmobi_page_description', 'page', array(
			//'group' => 'x_metaBox1', // the group name
			'description' => 'Page Description', // description for the field
			'label' => 'Description', // field label
			'display_column' => true // show this field in the column listings
		));
	}
}
?>
