<?php
namespace Technosailor\Photogramappy;

use Technosailor\Photogramappy\Post_Types\Photographs;
use Technosailor\Photogramappy\Settings\Settings;

class Init {
	protected static $_instance;


	protected $providers = [];

	public function init() {
		$this->register_providers();
	}

	public function register_providers() {
		$this->providers[ Photographs::NAME ] = new Photographs();
		$this->providers[ Settings::NAME ] = new Settings();

		$this->photographs_cpt();
		$this->admin_settings();
	}

	protected function photographs_cpt() {
		add_action( 'init', function() {
			$this->providers[ Photographs::NAME ]->register();
		} );
	}

	protected function admin_settings() {
		add_action( 'admin_menu', function() {
			$this->providers[ Settings::NAME ]->menu_item();
		} );

		add_action( 'admin_init', function() {
			$this->providers[ Settings::NAME ]->save_settings();
		} );
	}

	/**
	 * Singleton only allows the loading of the namespace once.
	 *
	 * @return Init
	 * @throws \Exception
	 */
	public static function instance() {
		if ( ! isset( self::$_instance ) ) {

			$className       = __CLASS__;
			self::$_instance = new $className();
		}

		return self::$_instance;
	}
}