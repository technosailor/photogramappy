<?php

namespace Technosailor\Photogramappy\Object_Meta\Geo_Coordinate\Config;

use MetaboxOrchestra\AdminNotices;
use MetaboxOrchestra\BoxAction;
use WP_Post;

class Action implements BoxAction {
	private $post;

	public function __construct( WP_Post $post ) {
		$this->post = $post;
	}

	public function save( AdminNotices $notices ): bool {

		if ( ! isset( $_POST[ View::NONCE ] ) ) {
			return false;
		}

		if ( ! wp_verify_nonce( $_POST[ View::NONCE ], View::NONCE ) ) {
			return false;
		}

		$lat = sanitize_text_field( $_POST[ View::FIELD_LAT ] ) ?? '';
		$lon = sanitize_text_field( $_POST[ View::FIELD_LONG ] ) ?? '';

		if( ! empty( $lat ) ) {
			update_post_meta( $this->post->ID, View::FIELD_LAT, $lat );
		}

		if( ! empty( $lon ) ) {
			update_post_meta( $this->post->ID, View::FIELD_LONG, $lon );
		}

		return true;
	}
}