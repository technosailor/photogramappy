<?php
namespace Technosailor\Photogramappy\Object_Meta;

use MetaboxOrchestra\Boxes;

interface MetaBox {
	public function register_meta( Boxes $boxes);
}