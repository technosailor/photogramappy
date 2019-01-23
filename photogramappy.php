<?php
/*
Plugin Name: Photogramappy
Description: WordPress plugin to allow location tagging of photographs. Requires PHP 7.2 and WordPress 4.9.9+
Author:      Aaron Brazell
Version:     2.0
Author URI:  http://github.com/technosailor
*/

use Technosailor\Photogramappy\Init;

define('BASE_PATH', plugin_dir_path(__FILE__));

require_once BASE_PATH . 'vendor/autoload.php';

add_action( 'plugins_loaded', function() {
	Init::instance()->init();
} );