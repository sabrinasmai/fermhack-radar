<?php
	/*
	* Plugin Name: locations
	* Description: A Custom Post Type for Locations
	* Author: Sab
	* Version: 2.0
	*/
	
	function custom_post_type() 
	{

		// Set User Interface labels for Custom Post Type that appear in WP dashboard 
		$labels = array(
			'name'                => __( 'Locations', 'Post Type General Name' ),
			'singular_name'       => __( 'Location', 'Post Type Singular Name', 'sabrina-theme' ),
			'menu_name'           => __( 'Locations', 'sabrina-theme' ),
			'all_items'           => __( 'All Locations', 'sabrina-theme' ),
			'view_item'           => __( 'View Location', 'sabrina-theme' ),
			'add_new_item'        => __( 'Add New Location', 'sabrina-theme' ),
			'add_new'             => __( 'Add New Location', 'sabrina-theme' ),
			'edit_item'           => __( 'Edit Location', 'sabrina-theme' ),
			'update_item'         => __( 'Update Location', 'sabrina-theme' ),
			'search_items'        => __( 'Search Location', 'sabrina-theme' ),
			'not_found'           => __( 'Not Found', 'sabrina-theme' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'sabrina-theme' ),
		);
		
		// Set other options for Custom Post Type
		$args = array(
			'label'               => __( 'locations', 'sabrina-theme' ),
			'description'         => __( 'Interesting Locations in the GTA', 'sabrina-theme' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', ), // Features of the CPT supports in Post Editor 
			'taxonomies'          => array( 'category', 'post_tag'), // uses the regular WP categories and tags as taxonomy CPT 
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		);
		register_post_type( 'locations', $args ); // Registering your Custom Post Type as defined above
	}
	add_action( 'init', 'custom_post_type', 0 );	// Hook into the 'init' action to generate the custom post 
	
?>