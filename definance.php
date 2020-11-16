<?php
/**
Plugin Name: De Finance
Description: De Finance
Author:  Victor Lerner
Requires PHP: 7.1
Text Domain: de-finance
Domain Path: /lang
Version: 1.0.2
*/
/* Define Plugin Constants */
defined( 'ABSPATH' ) || exit;
define( 'DEFINANCE_TEMPLATE_DIR', __DIR__ . '/templates' );
define( 'DEFINANCE_BASE_DIR', __DIR__ );
define( 'DEFINANCE_BASE_FILE', __FILE__ );
define( 'DEFINANCE_VER', '1.0.0' );
/**
 * Plugin Init
 */
require __DIR__ . '/App/autoload.php';





/**
 * Style Scripts
 */
function definance_style_scripts() {

    wp_enqueue_media();
	wp_enqueue_script( "definance-admin",
        esc_url( plugins_url( '/assets/js/admin.js', DEFINANCE_BASE_FILE )),array("jquery" ), false,true );

}
add_action( 'admin_enqueue_scripts', 'DEFINANCE_style_scripts', 500 );

/**
 * Load the plugin text domain for translation.
 */
function definance_load_plugin_textdomain() {
    load_plugin_textdomain( 'definance', false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );
}
add_action( 'plugins_loaded', 'definance_load_plugin_textdomain' );


