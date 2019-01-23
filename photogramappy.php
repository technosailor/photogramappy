<?php
/*
Plugin Name: Photogramappy
Description: WordPress plugin to allow location tagging of photographs. Requires PHP 7.2 and WordPress 4.9.9+
Author:      Aaron Brazell
Version:     2.0
Author URI:  http://github.com/technosailor
*/

use Technosailor\Photogramappy\Init;

require_once ABSPATH . '../vendor/autoload.php';

add_action( 'plugins_loaded', function() {
	Init::instance()->init();
} );