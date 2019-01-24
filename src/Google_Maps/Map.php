<?php
namespace Technosailor\Photogramappy\Google_Maps;

use Technosailor\Photogramappy\Object_Meta\Geo_Coordinate\Config\View;
use Technosailor\Photogramappy\Settings\Settings;
use WP_Post;

class Map {

	/**
	 * @param int $zoom
	 * @param int $height
	 * @param int $width
	 * @param WP_Post|null $post
	 *
	 * @return bool
	 */
	public function render( WP_Post $post, int $zoom = 13, int $height = 640, int $width = 640 ) {

		$key = get_option( Settings::GOOGLE_APIKEY );
		if( empty( $key ) ) {
			return false;
		}

		$marker = sprintf( 'color:blue|label:X|%s,%s',
			get_post_meta( $post->ID, View::FIELD_LAT, true ),
			get_post_meta( $post->ID, View::FIELD_LONG, true )
		);

		$url = 'https://maps.googleapis.com/maps/api/staticmap';
		$url = add_query_arg( [
			'zoom'  => $zoom,
			'size'  => $width . 'x' . $height,
			'markers' => urlencode( $marker ),
			'key' => get_option( Settings::GOOGLE_APIKEY )
		], $url );

		return $url;
	}
}