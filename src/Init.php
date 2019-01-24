<?php
namespace Technosailor\Photogramappy;

use MetaboxOrchestra\Bootstrap;
use MetaboxOrchestra\Boxes;
use Technosailor\Photogramappy\Object_Meta\Geo_Coordinate\Geo_Coordinate;
use Technosailor\Photogramappy\Post_Types\Photographs;
use Technosailor\Photogramappy\Settings\Settings;

class Init {
	protected static $_instance;


	protected $providers = [];

	public function __construct() {
		Bootstrap::bootstrap();
	}

	public function init() {
		$this->register_providers();
	}

	public function register_providers() {
		$this->providers[ Photographs::NAME ] = new Photographs();
		$this->providers[ Settings::NAME ] = new Settings();

		$this->register_meta();

		$this->photographs_cpt();
		$this->admin_settings();
		$this->meta();
	}

	protected function register_meta() {
		$this->providers[ Geo_Coordinate::NAME ] = new Geo_Coordinate();
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

	protected function meta() {
		add_action( Boxes::REGISTER_BOXES, function ( Boxes $boxes ) {
			$this->providers[ Geo_Coordinate::NAME ]->register_meta( $boxes );
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