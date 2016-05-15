<?php
namespace Photogramappy\Ajax;

class Ajax {
	public function __construct() {
		add_action( 'wp_ajax_check_thumbail_meta', [ $this, 'check_thumbail_meta' ] );
	}

	public function check_thumbail_meta() {

		$post_id = (int) $_POST['post_id'];
		$min_width = (int) $_POST['min_width'];

		\wp_send_json_success( $_POST );

	}


}

new Ajax;