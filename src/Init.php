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
	 * @param null|\ArrayAccess $container
	 *
	 * @return Init
	 * @throws \Exception
	 */
	public static function instance( $container = null ) {
		if ( ! isset( self::$_instance ) ) {
			if ( empty( $container ) ) {
				throw new \Exception( 'You need to provide a Pimple container' );
			}

			$className       = __CLASS__;
			self::$_instance = new $className( $container );
		}

		return self::$_instance;
	}
}