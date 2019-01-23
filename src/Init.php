<?php
namespace Technosailor\Photogramappy;

class Init {
	protected static $_instance;

	public function init() {
		$this->register_containers();
	}

	public function register_containers() {

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