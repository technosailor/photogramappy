<?php

namespace Technosailor\Photogramappy\Google_Maps;

use Technosailor\Photogramappy\Object_Meta\Geo_Coordinate\Config\View;
use Technosailor\Photogramappy\Settings\Settings;
use WP_Post;

class Map {

	const NAME = 'map';

	/**
	 * @param string $content
	 *
	 * @filter the_content
	 *
	 * @return string
	 */
	public function maybe_add_map_to_post_content( string $content ): string {

		$map_url = $this->render( get_the_ID() );
		if( ! empty( $map_url ) ) {
			$map = sprintf( '<img src="%s">', esc_url( $map_url ) );
			$content .= $map;
		}

		return $content;
	}

	/**
	 * Constructs Google Maps Static URL
	 *
	 * @param int $post_id
	 * @param int $zoom
	 * @param int $height
	 * @param int $width
	 *
	 * @return bool
	 */
	public function render( int $post_id, int $zoom = 13, int $height = 640, int $width = 640 ) {

		$key = get_option( Settings::GOOGLE_APIKEY );
		if ( empty( $key ) ) {
			return false;
		}

		$marker = sprintf( 'color:blue|label:X|%s,%s',
			get_post_meta( $post_id, View::FIELD_LAT, true ),
			get_post_meta( $post_id, View::FIELD_LONG, true )
		);

		$url = 'https://maps.googleapis.com/maps/api/staticmap';
		$url = add_query_arg( [
			'zoom'    => $zoom,
			'size'    => $width . 'x' . $height,
			'markers' => urlencode( $marker ),
			'key'     => get_option( Settings::GOOGLE_APIKEY ),
			'scale'   => 2,
		], $url );

		return $url;
	}
}