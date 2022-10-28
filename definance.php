<?php
/**
Plugin Name: De Finance
Description: De Finance
Author:  Victor Lerner
Requires PHP: 7.1
Text Domain: de-finance
Domain Path: /lang
Version: 2.4.7
 */
/* Define Plugin Constants */
defined( 'ABSPATH' ) || exit;
define( 'DEFINANCE_TEMPLATE_DIR', __DIR__ . '/templates' );
define( 'DEFINANCE_BASE_DIR', __DIR__ );
define( 'DEFINANCE_BASE_FILE', __FILE__ );
define( 'DEFINANCE_VER', '2.4.7' );
define( 'DEFINANCE_URL', plugin_dir_url( __FILE__ ) );
/**
 * Plugin Init
 */
require __DIR__ . '/App/autoload.php';

// Perma link
function definance_default_slug(){
	return 'definance';
}

function definance_page_slug(){
	$slug = definance_default_slug();
	if( get_option('definance_slug') ) {
		$slug = get_option('definance_slug');
	}
	return esc_html( $slug );
}

function definance_page_url(){
	$page_url = home_url('/' . definance_page_slug() . '/');
	return esc_url( trailingslashit( $page_url ) );
}


add_filter( 'query_vars', function( $vars ){
	$vars[] = 'definance_page';

  return $vars;
} );

function definance_add_rewrite_rules() {
	$slug = 'definance';
	if ( get_option('definance_slug') ) {
		$slug = get_option('definance_slug');
	}
  global $wp_rewrite; 
  $wp_rewrite->flush_rules(); 
	add_rewrite_rule( $slug . '/?$', 'index.php?definance_page=1','top' );

}
add_action('init', 'definance_add_rewrite_rules');


function definance_include_template( $template ) {
	if ( get_query_var( 'definance_page' ) ) {
		$template = DEFINANCE_TEMPLATE_DIR . DIRECTORY_SEPARATOR . "home_new.php";
	}
	return $template;
}
add_filter( 'template_include', 'definance_include_template');
/// < Perma link

function definance_shortcode( $attrs ) {
  ob_start();
  ?>
  <div class="definance_widget">
    <?php include DEFINANCE_TEMPLATE_DIR . DIRECTORY_SEPARATOR . "definance_main.php"; ?>
  </div>
  <?php
  return ob_get_clean();
}
// add_shortcode( 'definance_widget', 'definance_shortcode' );

// tempate as de finance page
function definance_page_template( $page_template ){
    if ( get_page_template_slug() == 'definance_pagetemplate' ) {
      $page_template = DEFINANCE_TEMPLATE_DIR . DIRECTORY_SEPARATOR . "home_new.php";
    }
    return $page_template;
}
add_filter( 'page_template', 'definance_page_template' );

function definance_custom_template($single) {

  global $post;
  $meta = get_post_meta($post->ID);
  if (isset($meta['_wp_page_template']) and isset($meta['_wp_page_template'][0]) and ($meta['_wp_page_template'][0] == 'definance_pagetemplate')) {
    $single = DEFINANCE_TEMPLATE_DIR . DIRECTORY_SEPARATOR . "home_new.php";
  }

  return $single;
}

add_filter('single_template', 'definance_custom_template');

function definance_add_template_to_select( $post_templates, $wp_theme, $post, $post_type ) {
    $post_templates['definance_pagetemplate'] = __('De Finance');
    return $post_templates;
}
add_filter( 'theme_page_templates', 'definance_add_template_to_select', 10, 4 );
add_filter( 'theme_post_templates', 'definance_add_template_to_select', 10, 4 );

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

function definance_get_blockchains() {
  $networks_json = file_get_contents( DEFINANCE_BASE_DIR . DIRECTORY_SEPARATOR . "vendor_source" . DIRECTORY_SEPARATOR . "networks.json");
  $networks = json_decode($networks_json, true);

  return $networks;
}

definance_get_blockchains();

