<?php
namespace Photogramappy\Custom_Post_Types;

class Custom_Post_Types {

	public function __construct() {
		add_action( 'init', [ $this, 'register_post_types' ], 0 );
	}

	public function register_post_types() {
		// Register Custom Post Types

		$labels = array(
			'name'                  => _x( 'Photographs', 'Post Type General Name', 'pgm' ),
			'singular_name'         => _x( 'Photograph', 'Post Type Singular Name', 'pgm' ),
			'menu_name'             => __( 'Photographs', 'pgm' ),
			'name_admin_bar'        => __( 'Photograph', 'pgm' ),
			'archives'              => __( 'Photograph Archives', 'pgm' ),
			'parent_item_colon'     => __( 'Parent Photograph:', 'pgm' ),
			'all_items'             => __( 'All Photographs', 'pgm' ),
			'add_new_item'          => __( 'Add New Photograph', 'pgm' ),
			'add_new'               => __( 'Add New', 'pgm' ),
			'new_item'              => __( 'New Photograph', 'pgm' ),
			'edit_item'             => __( 'Edit Photograph', 'pgm' ),
			'update_item'           => __( 'Update Photograph', 'pgm' ),
			'view_item'             => __( 'View Photograph', 'pgm' ),
			'search_items'          => __( 'Search Photograph', 'pgm' ),
			'not_found'             => __( 'Not found', 'pgm' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'pgm' ),
			'featured_image'        => __( 'Featured Image', 'pgm' ),
			'set_featured_image'    => __( 'Set featured image', 'pgm' ),
			'remove_featured_image' => __( 'Remove featured image', 'pgm' ),
			'use_featured_image'    => __( 'Use as featured image', 'pgm' ),
			'insert_into_item'      => __( 'Insert into Photograph', 'pgm' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Photograph', 'pgm' ),
			'items_list'            => __( 'Photographs list', 'pgm' ),
			'items_list_navigation' => __( 'Photographs list navigation', 'pgm' ),
			'filter_items_list'     => __( 'Filter Photographs list', 'pgm' ),
		);
		$args = array(
			'label'                 => __( 'Photograph', 'pgm' ),
			'description'           => __( 'Photograph', 'pgm' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
			'taxonomies'            => array( 'category', 'post_tag' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-format-image',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,		
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'photographs', $args );

	}
}

new Custom_Post_Types;
