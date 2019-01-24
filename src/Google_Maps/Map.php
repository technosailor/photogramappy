<?php

namespace Technosailor\Photogramappy\Google_Maps;

use Technosailor\Photogramappy\Object_Meta\Geo_Coordinate\Config\View;
use Technosailor\Photogramappy\Settings\Settings;

class Map {

	const NAME = 'map';

	private $params;

	public function __construct( Defaults $defaults ) {
		$this->params = $defaults;
	}

	/**
	 * Conditionally appends a google maps to the bottom of the_content
	 *
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
	 * Constructs a Google Maps Static URL
	 *
	 * @param int $post_id
	 * @param array $args
	 *
	 * @return string
	 */
	public function render( int $post_id, array $args = [] ) : string {

		$key = get_option( Settings::GOOGLE_APIKEY );
		if ( empty( $key ) ) {
			return '';
		}

		if( ! empty( $args ) ) {
			$args = array_map( 'absint', $args );
		}

		foreach( $args as $key => $arg ) {
			switch( $key ) {
				case 'zoom' :
					$this->params->setZoom( $args['zoom'] );
					break;
				case 'height' :
					$this->params->setHeight( $args['height'] );
					break;
				case 'width' :
					$this->params->setWidth( $args['width'] );
					break;
				default :
					break;
			}
		}

		$marker = sprintf( 'color:blue|label:X|%s,%s',
			get_post_meta( $post_id, View::FIELD_LAT, true ),
			get_post_meta( $post_id, View::FIELD_LONG, true )
		);

		$url = 'https://maps.googleapis.com/maps/api/staticmap';
		$url = add_query_arg( [
			'zoom'    => $this->params->getZoom(),
			'size'    => $this->params->getWidth() . 'x' . $this->params->getHeight(),
			'markers' => urlencode( $marker ),
			'scale'   => 2,
			'key'     => get_option( Settings::GOOGLE_APIKEY ),
		], $url );

		return $url;
	}
}