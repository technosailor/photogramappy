<?php
namespace Technosailor\Photogramappy\Object_Meta\Geo_Coordinate\Config;

use MetaboxOrchestra\AdminNotices;
use MetaboxOrchestra\BoxAction;
use WP_Post;

class Action implements BoxAction {
	 private  $post;

	 public function __construct( WP_Post $post ) {
	    $this->post = $post;
	 }

	 public function save( AdminNotices $notices ): bool {
		 // TODO: Implement save() method.
	 }
}