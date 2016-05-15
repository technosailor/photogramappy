<?php
namespace Photogramappy\Core;

/**
 * Default setup routine
 *
 * @uses add_action()
 * @uses do_action()
 *
 * @return void
 */
function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'init', $n( 'i18n' ) );
	add_action( 'init', $n( 'init' ) );
	add_action( 'admin_enqueue_scripts', $n( 'admin_enqueue' ) );
	add_action( 'wp_enqueue_scripts', $n( 'enqueue' ) );
	add_filter( 'script_loader_tag', $n( 'add_async_attribute' ), 10, 2 );	

	do_action( 'pgm_loaded' );
}

/**
 * Registers the default textdomain.
 *
 * @uses apply_filters()
 * @uses get_locale()
 * @uses load_textdomain()
 * @uses load_plugin_textdomain()
 * @uses plugin_basename()
 *
 * @return void
 */
function i18n() {
	$locale = apply_filters( 'plugin_locale', get_locale(), 'pgm' );
	load_textdomain( 'pgm', WP_LANG_DIR . '/pgm/pgm-' . $locale . '.mo' );
	load_plugin_textdomain( 'pgm', false, plugin_basename( PGM_PATH ) . '/languages/' );
}

/**
 * Initializes the plugin and fires an action other plugins can hook into.
 *
 * @uses do_action()
 *
 * @return void
 */
function init() {
	do_action( 'pgm_init' );
}

/**
 * Activate the plugin
 *
 * @uses init()
 * @uses flush_rewrite_rules()
 *
 * @return void
 */
function activate() {
	// First load the init scripts in case any rewrite functionality is being loaded
	init();
	flush_rewrite_rules();
}

/**
 * Deactivate the plugin
 *
 * Uninstall routines should be in uninstall.php
 *
 * @return void
 */
function deactivate() {

}

function admin_enqueue() {
	wp_register_script( 'pgm-media', PGM_URL . 'assets/js/pgm-maps.js', [ 'jquery', 'media-upload' ] );
	wp_localize_script( 'pgm-media', 'pgm_media', [ 
		'ajaxurl' => admin_url( '/admin-ajax.php' ), 
		'nonce'	=> wp_create_nonce( 'get_exif' )
	] );
	wp_enqueue_script( 'pgm-media' );
}

function enqueue() {
	$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	// Google Maps
	wp_enqueue_script( 'gmaps', sprintf( 'https://maps.googleapis.com/maps/api/js?key=%s&callback=initMap', GMAP_APIKEY ), PGM_VERSION, true );

	// Gmaps 3 jQuery
	//wp_register_script( 'bmap', PGM_URL . "/assets/js/pgm-maps{$min}.js", [ 'jquery-gmaps', 'jquery' ], PGM_VERSION );
	//wp_localize_script( 'bmap', 'bmap', [
		//'kml_url'	=> esc_url( BMAP_TEMPLATE_URL . '/assets/baltimore.kmz' ),
	//	'key' => GMAP_APIKEY
	//] );

	// Render
	wp_enqueue_script( 'bmap' );
}

function add_async_attribute( $tag, $handle ) {
    if ( 'gmaps' !== $handle ) {
        return $tag;
    }

    return str_replace( ' src', ' async defer src', $tag );
}
