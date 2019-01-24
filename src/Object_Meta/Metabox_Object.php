<?php
namespace Technosailor\Photogramappy\Object_Meta;

use MetaboxOrchestra\Boxes;

abstract class Metabox_Object {
	public function register_meta( Boxes $boxes ) {
		$boxes->add_box( new Box() );
	}
}