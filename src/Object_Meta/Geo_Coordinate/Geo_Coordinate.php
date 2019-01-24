<?php
namespace Technosailor\Photogramappy\Object_Meta\Geo_Coordinate;

use MetaboxOrchestra\Boxes;
use Technosailor\Photogramappy\Object_Meta\Geo_Coordinate\Config\Box;
use Technosailor\Photogramappy\Object_Meta\MetaBox;

class Geo_Coordinate implements MetaBox {
	const NAME = 'meta.geo-coordinates';

	public function register_meta( Boxes $boxes ) {
		$boxes->add_box( new Box() );
	}
}