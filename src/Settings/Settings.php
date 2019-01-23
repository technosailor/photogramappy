<?php

namespace Technosailor\Photogramappy\Settings;

class Settings {

	const NAME = 'photogrammapy-settings';

	public function menu_item() {
		add_options_page( __( 'Photogrammapy', 'photogrammapy' ), __( 'Photogrammapy', 'photogrammapy' ), 'manage_options', 'photogrammapy', [ $this, 'settings' ] );
	}

	public function settings() {

	}
}