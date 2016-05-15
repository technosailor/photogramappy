<?php
namespace Photogramappy\Custom_Taxonomies;

class Custom_Taxonomies {
	public function __construct() {
		add_action( 'init', [ $this, 'register_taxonomies' ] );
	}

	public function register_Taxonomies() {
		// Register Custom Taxonomy

		$labels = array(
			'name'                       => _x( 'Locations', 'Taxonomy General Name', 'pgm' ),
			'singular_name'              => _x( 'Location', 'Taxonomy Singular Name', 'pgm' ),
			'menu_name'                  => __( 'Locations', 'pgm' ),
			'all_items'                  => __( 'All Locations', 'pgm' ),
			'parent_item'                => __( 'Parent Location', 'pgm' ),
			'parent_item_colon'          => __( 'Parent Location:', 'pgm' ),
			'new_item_name'              => __( 'New Location Name', 'pgm' ),
			'add_new_item'               => __( 'Add New Location', 'pgm' ),
			'edit_item'                  => __( 'Edit Location', 'pgm' ),
			'update_item'                => __( 'Update Location', 'pgm' ),
			'view_item'                  => __( 'View Location', 'pgm' ),
			'separate_items_with_commas' => __( 'Separate locations with commas', 'pgm' ),
			'add_or_remove_items'        => __( 'Add or remove locations', 'pgm' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'pgm' ),
			'popular_items'              => __( 'Popular Locations', 'pgm' ),
			'search_items'               => __( 'Search Locations', 'pgm' ),
			'not_found'                  => __( 'Not Found', 'pgm' ),
			'no_terms'                   => __( 'No locations', 'pgm' ),
			'items_list'                 => __( 'Locations list', 'pgm' ),
			'items_list_navigation'      => __( 'Locations list navigation', 'pgm' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
		register_taxonomy( 'locations', array( 'photographs' ), $args );
		add_image_size( 'rectangle-645', 645, 350, true );
	}
}

new Custom_Taxonomies;