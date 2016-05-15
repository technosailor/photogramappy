<?php
namespace TenUp\Baltimore\Core;

/**
 * Set up theme defaults and register supported WordPress features.
 *
 * @since 0.1.0
 *
 * @uses add_action()
 *
 * @return void
 */
function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'after_setup_theme',  	$n( 'i18n' )        				);
	add_action( 'wp_enqueue_scripts', 	$n( 'scripts' )     				);
	add_action( 'wp_enqueue_scripts', 	$n( 'styles' )      				);
	add_action( 'wp_head',            	$n( 'header_meta' ) 				);
	add_action( 'init',					$n( 'theme_supports' ) 				);
}

/**
 * Makes WP Theme available for translation.
 *
 * Translations can be added to the /lang directory.
 * If you're building a theme based on WP Theme, use a find and replace
 * to change 'wptheme' to the name of your theme in all template files.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 *
 * @since 0.1.0
 *
 * @return void
 */
function i18n() {
	load_theme_textdomain( 'bmap', BMAP_PATH . '/languages' );
 }

/**
 * Enqueue scripts for front-end.
 *
 * @uses wp_enqueue_script() to load front end scripts.
 *
 * @since 0.1.0
 *
 * @return void
 */
function scripts() {
	/**
	 * Flag whether to enable loading uncompressed/debugging assets. Default false.
	 * 
	 * @param bool bmap_script_debug
	 */
	$debug = apply_filters( 'bmap_script_debug', false );
	$min = ( $debug || defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
}

/**
 * Enqueue styles for front-end.
 *
 * @uses wp_enqueue_style() to load front end styles.
 *
 * @since 0.1.0
 *
 * @return void
 */
function styles() {
	/**
	 * Flag whether to enable loading uncompressed/debugging assets. Default false.
	 *
	 * @param bool bmap_style_debug
	 */
	$debug = apply_filters( 'bmap_style_debug', false );
	$min = ( $debug || defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_style(
		'bmap',
		BMAP_URL . "/assets/css/baltimore{$min}.css",
		array(),
		BMAP_VERSION
	);
}

/**
 * Add humans.txt to the <head> element.
 *
 * @uses apply_filters()
 *
 * @since 0.1.0
 *
 * @return void
 */
function header_meta() {
	/**
	 * Filter the path used for the site's humans.txt attribution file
	 *
	 * @param string $humanstxt
	 */
	$humanstxt = apply_filters( 'bmap_humans', BMAP_TEMPLATE_URL . '/humans.txt' );

	echo '<link type="text/plain" rel="author" href="' . esc_url( $humanstxt ) . '" />';
}

function theme_supports() {
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5' );
}
