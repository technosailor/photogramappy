<?php
namespace Technosailor\Photogramappy;

use Technosailor\Photogramappy\Post_Types\Photographs;

class Init {
	protected static $_instance;


	protected $providers = [];

	public function init() {
		$this->register_providers();
	}

	public function register_providers() {
		$this->providers[ Photographs::NAME ] = new Photographs();

		add_action( 'init', function() {
			$this->providers[ Photographs::NAME ]->register();
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