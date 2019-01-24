<?php
namespace Technosailor\Photogramappy\Object_Meta\Geo_Coordinate\Config;

use MetaboxOrchestra\BoxInfo;
use MetaboxOrchestra\BoxView;

class View implements BoxView {

	const FIELD_LAT = 'latitude';
	const FIELD_LONG = 'longitude';

	const NONCE = 'geo-coord-nonce';

	private $post;

	public function __construct( \WP_Post $post ) {
		$this->post = $post;
	}

	public function render( BoxInfo $info ): string {

		$input = wp_nonce_field( self::NONCE, self::NONCE );

		$input .= sprintf( '<div class="photogramappy-post-meta">%s <input type="text" name="%s" value="%s"></div>',
			'<strong>' . esc_html__( 'Latitude', 'photogramappy' ) . ':</strong>',
			esc_attr( self::FIELD_LAT ),
			esc_attr( get_post_meta( $this->post->ID, self::FIELD_LAT, true ) )
		);

		$input .= sprintf( '<div class="photogramappy-post-meta">%s <input type="text" name="%s" value="%s"></div>',
			'<strong>' . esc_html__( 'Longitude', 'photogramappy' ) . ':</strong>',
			esc_attr( self::FIELD_LONG ),
			esc_attr( get_post_meta( $this->post->ID, self::FIELD_LONG, true ) )
		);

		return $input;
	}
}