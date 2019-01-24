<?php
namespace Technosailor\Photogramappy\Object_Meta\Geo_Coordinate\Config;

use MetaboxOrchestra\BoxInfo;
use MetaboxOrchestra\BoxView;

class View implements BoxView {
	private $post;

	public function __construct( \WP_Post $post ) {
		$this->post = $post;
	}

	public function render( BoxInfo $info ): string {
		return 'foo';
	}
}