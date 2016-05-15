<?php

/**
 * Baltimore functions and definitions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * @package Baltimore
 * @since 0.1.0
 */

// Useful global constants
define( 'BMAP_VERSION',      '0.1.0' );
define( 'BMAP_URL',          get_stylesheet_directory_uri() );
define( 'BMAP_TEMPLATE_URL', get_template_directory_uri() );
define( 'BMAP_PATH',         get_template_directory() . '/' );
define( 'BMAP_INC',          BMAP_PATH . 'includes/' );

// Include compartmentalized functions
require_once BMAP_INC . 'functions/core.php';

// Include lib classes

// Run the setup functions
TenUp\Baltimore\Core\setup();

add_action( 'after_setup_theme', 'bm_theme_supports' );
function bm_theme_supports() {
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5' );
}