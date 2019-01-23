<?php

namespace Technosailor\Photogramappy\Post_Types;

class Photographs {
	const NAME = 'photographs';

	function register() {

		register_post_type( self::NAME, [
			'label'               => __( 'Photograph', 'text_domain' ),
			'description'         => __( 'Photographs', 'text_domain' ),
			'labels'              => [
				'name'                  => _x( 'Photographs', 'Post Type General Name', 'text_domain' ),
				'singular_name'         => _x( 'Photograph', 'Post Type Singular Name', 'text_domain' ),
				'menu_name'             => __( 'Photographs', 'text_domain' ),
				'name_admin_bar'        => __( 'Photographs', 'text_domain' ),
				'archives'              => __( 'Photograph Archive', 'text_domain' ),
				'attributes'            => __( 'Photograph Attributes', 'text_domain' ),
				'parent_item_colon'     => __( '', 'text_domain' ),
				'all_items'             => __( 'All Photographs', 'text_domain' ),
				'add_new_item'          => __( 'Add New Photograph', 'text_domain' ),
				'add_new'               => __( 'Add New', 'text_domain' ),
				'new_item'              => __( 'New Photograph', 'text_domain' ),
				'edit_item'             => __( 'Edit Photograph', 'text_domain' ),
				'update_item'           => __( 'Update Photograph', 'text_domain' ),
				'view_item'             => __( 'View Photograph', 'text_domain' ),
				'view_items'            => __( 'View Photographs', 'text_domain' ),
				'search_items'          => __( 'Search Photograph', 'text_domain' ),
				'not_found'             => __( 'Not found', 'text_domain' ),
				'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
				'featured_image'        => __( 'Featured Image', 'text_domain' ),
				'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
				'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
				'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
				'insert_into_item'      => __( 'Insert into photograph', 'text_domain' ),
				'uploaded_to_this_item' => __( 'Uploaded to this photograph', 'text_domain' ),
				'items_list'            => __( 'Photographs list', 'text_domain' ),
				'items_list_navigation' => __( 'Photographs list navigation', 'text_domain' ),
				'filter_items_list'     => __( 'Filter photographs list', 'text_domain' ),
			],
			'supports'            => [ 'title', 'editor', 'thumbnail' ],
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-format-image',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		] );
	}
}