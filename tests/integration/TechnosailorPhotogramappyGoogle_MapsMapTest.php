<?php

use Technosailor\Photogramappy\Google_Maps\Map;
use Technosailor\Photogramappy\Object_Meta\Geo_Coordinate\Config\View;
use Technosailor\Photogramappy\Post_Types\Photographs;
use Technosailor\Photogramappy\Settings\Settings;

class TechnosailorPhotogramappyGoogle_MapsMapTest extends \Codeception\TestCase\WPTestCase {

	public function setUp() {
		// before
		parent::setUp();

		// your set up methods here
	}

	public function tearDown() {
		// your tear down methods here

		// then
		parent::tearDown();
	}

	public function test_google_maps_url_is_constructed_correctly() {
		$map = new Map();

		$apikey = 'abcdef';
		update_option( Settings::GOOGLE_APIKEY, $apikey );

		$post_id = wp_insert_post( [
			'post_type'    => Photographs::NAME,
			'post_status'  => 'publish',
			'post_title'   => 'Foo',
			'post_content' => 'Bar',
			'meta_input'   => [
				View::FIELD_LAT  => '39.2891071',
				View::FIELD_LONG => '-76.599602',
			],
		] );

		$expected = 'https://maps.googleapis.com/maps/api/staticmap?zoom=13&size=640x640&markers=color%3Ablue%7Clabel%3AX%7C39.2891071%2C-76.599602&scale=2&key=abcdef';

		$url      = $map->render( $post_id );
		$this->assertEquals( $expected, $url );
	}

}