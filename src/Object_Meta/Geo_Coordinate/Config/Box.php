<?php

namespace Technosailor\Photogramappy\Object_Meta\Geo_Coordinate\Config;

use MetaboxOrchestra\BoxAction;
use MetaboxOrchestra\BoxInfo;
use MetaboxOrchestra\BoxView;
use MetaboxOrchestra\Entity;
use MetaboxOrchestra\PostMetabox;

class Box implements PostMetabox {

	const NAME = 'meta-coordinates';

	const CONTEXT  = 'side';
	const PRIORITY = 'high';

	public function create_info( string $show_or_save, Entity $entity ): BoxInfo {
		return new BoxInfo( __( 'Coordinates', 'photograppy' ), self::NAME, self::CONTEXT, self::PRIORITY );
	}

	public function action_for_post( \WP_Post $post ): BoxAction {
		return new Action( $post );
	}

	public function view_for_post( \WP_Post $post ): BoxView {
		return new View( $post );
	}

	public function accept_post( \WP_Post $post, string $save_or_show ): bool {
		return true;
	}
}