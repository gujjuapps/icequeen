<?php

// Exit If Accessed Directly
if( !defined( 'ABSPATH' ) ) exit;

function demo_register_posttype(){
	// register Banner post type
	$banner_labels = array(
		'name'               => _x( 'Banners', 'demo_banner', 'demo' ),
		'singular_name'      => _x( 'Banners', 'demo_banner', 'demo' ),
		'menu_name'          => _x( 'Banners', 'demo_banner', 'demo' ),
		'name_admin_bar'     => _x( 'Banners', 'demo_banner', 'demo' ),
		'add_new'            => _x( 'Add New', 'demo_banner', 'demo' ),
		'add_new_item'       => __( 'Add New Banner', 'demo' ),
		'new_item'           => __( 'New Banner', 'demo' ),
		'edit_item'          => __( 'Edit Banner', 'demo' ),
		'view_item'          => __( 'View Banner', 'demo' ),
		'all_items'          => __( 'All Banner', 'demo' ),
		'search_items'       => __( 'Search Banner', 'demo' ),
		'parent_item_colon'  => __( 'Parent Banner:', 'demo' ),
		'not_found'          => __( 'No Banner found.', 'demo' ),
		'not_found_in_trash' => __( 'No Banner found in Trash.', 'demo' )
	);

	$banner_args = array(
		'labels'             => $banner_labels,
            'description'        => __( 'Description.', 'demo' ),
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'banner' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_icon'			 => 'dashicons-id',
		'menu_position'      => null,
		'supports'           => array( 'title')
	);

//	register_post_type( DEMO_BANNER_POST_TYPE, $banner_args );

        // Services post type

	$services_labels = array(
		'name'               => _x( 'Services', 'service', 'demo' ),
		'singular_name'      => _x( 'Services', 'service', 'demo' ),
		'menu_name'          => _x( 'Services', 'service', 'demo' ),
		'name_admin_bar'     => _x( 'Services', 'service', 'demo' ),
		'add_new'            => _x( 'Add New', 'service', 'demo' ),
		'add_new_item'       => __( 'Add New Service', 'demo' ),
		'new_item'           => __( 'New Service', 'demo' ),
		'edit_item'          => __( 'Edit Service', 'demo' ),
		'view_item'          => __( 'View Service', 'demo' ),
		'all_items'          => __( 'All Service', 'demo' ),
		'search_items'       => __( 'Search Service', 'demo' ),
		'parent_item_colon'  => __( 'Parent Service:', 'demo' ),
		'not_found'          => __( 'No Service found.', 'demo' ),
		'not_found_in_trash' => __( 'No Service found in Trash.', 'demo' )
	);

	$services_args = array(
		'labels'             => $services_labels,
        'description'        => __( 'Description.', 'demo' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_icon'	     => 'dashicons-admin-generic',
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor')
	);

	register_post_type( DEMO_SERVICE_POST_TYPE, $services_args );
	
	flush_rewrite_rules();

}

add_action( 'init', 'demo_register_posttype' );
?>
