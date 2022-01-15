<?php
/**
Plugin Name: De Finance
Description: De Finance
Author:  Victor Lerner
Requires PHP: 7.1
Text Domain: de-finance
Domain Path: /lang
Version: 1.0.73
 */
/* Define Plugin Constants */
defined( 'ABSPATH' ) || exit;
define( 'DEFINANCE_TEMPLATE_DIR', __DIR__ . '/templates' );
define( 'DEFINANCE_BASE_DIR', __DIR__ );
define( 'DEFINANCE_BASE_FILE', __FILE__ );
define( 'DEFINANCE_VER', '1.0.73' );
define( 'DEFINANCE_URL', plugin_dir_url( __FILE__ ) );
/**
 * Plugin Init
 */
require __DIR__ . '/App/autoload.php';


function definance_shortcode( $attrs ) {
  ob_start();
  ?>
  <div class="definance_widget">
    <?php include DEFINANCE_TEMPLATE_DIR . DIRECTORY_SEPARATOR . "definance_main.php"; ?>
  </div>
  <?php
  return ob_get_clean();
}
add_shortcode( 'definance_widget', 'definance_shortcode' );

function definance_prepare_vendor() {
  $version = (DEFINANCE_VER) ? DEFINANCE_VER : 'no';
  $SEP = DIRECTORY_SEPARATOR;

  $cache_dir = DEFINANCE_BASE_DIR .  $SEP . 'vendor_cache' . $SEP . DEFINANCE_VER . $SEP;
  $vendor_source = DEFINANCE_BASE_DIR .  $SEP . 'vendor_source' . $SEP . 'static' . $SEP . 'js' . $SEP;

  if (!file_exists($cache_dir)) {
    $js_files = scandir($vendor_source);
    mkdir($cache_dir, 0777);
    foreach ($js_files as $k => $file) {
      if (is_file($vendor_source . $file)) {
        $filename = basename($file);
        $file_ext = explode(".", $filename);
        $file_ext = strtoupper($file_ext[count($file_ext)-1]);
        if ($file_ext === 'JS') {
          $source = file_get_contents($vendor_source . $filename);
          $count_replace = 0;
          $modified = str_replace(
            array(
              'static/js/',
              './images/',
              'images/',
              'n.p+"static/media/',
              '"./locales/'
            ),
            array(
              DEFINANCE_URL . 'vendor_cache/' . DEFINANCE_VER . '/static/js/',
              'images/',
              DEFINANCE_URL . 'vendor_source/images/',
              '"' . DEFINANCE_URL . 'vendor_source/static/media/',
              '"' . DEFINANCE_URL . 'vendor_source/locales/'
            ),
            $source,
            $count_replace
          );
          file_put_contents($cache_dir . $filename, $modified);
          chmod($cache_dir . $filename, 0777);
        }
      }
    }
  }
}
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


