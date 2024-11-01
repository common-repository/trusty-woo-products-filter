<?php
/*
Plugin Name: Shop Products Filter
Description: Filter woocommerce shop products with price slider, categories, tags and specific attributes.
Version: 1.2
Author: Trusty Plugins
Author URI: https://trustyplugins.com
License: GPL3
License URI: http://www.gnu.org/licenses/gpl.html
Text Domain: trusty-woo-products-filter
Domain Path: /languages
*/
// Block direct access to the main plugin file.
defined( 'ABSPATH' ) or die( 'No tircks please!' );
/*---- CONFIGURATION >>>> DEFINE CURRENT VARSION ----*/
if (!defined('TRUSTY_WOO_FILTER_CURRENT_VERSION')){
    define('TRUSTY_WOO_FILTER_CURRENT_VERSION', '1.2');
}
if (!defined('TRUSTY_WOO_FILTER_OPTIONS')){
    define('TRUSTY_WOO_FILTER_OPTIONS', 'Trusty Woo Filter');
}
if ( ! defined( 'TRUSTY_WOO_FILTER_PATH' ) ) {
define( 'TRUSTY_WOO_FILTER_PATH', plugin_dir_path( __FILE__ ) );
}
class TRUSTY_WOO_FILTER_Plugin {
	public function __construct(){
	add_action( 'plugins_loaded', array( $this, 'trusty_woo_filter_load_plugin_textdomain' ) );
	$this->trusty_woo_filter_plugin_constants();
	/*---- UPDATE THE CURRENT ACTIVE VERSION OF THE PLUGIN ----*/ 	
	if(!get_option('trusty_woo_filter_plugin_version'))
	{
update_option('trusty_woo_filter_plugin_version',TRUSTY_WOO_FILTER_PLUGIN_VERSION);
	}
	}
	/*---- LOAD PLUGIN TEXTDOMAIN ----*/
	public function trusty_woo_filter_load_plugin_textdomain () {
  if(class_exists('woocommerce')) { 
   require_once TRUSTY_WOO_FILTER_PATH . 'admin/admin.php'; 
  } else { 
   return false;
  }
	load_plugin_textdomain( 'trusty-woo-products-filter', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
    }
    /*---- set plugin constants ----*/
	public function trusty_woo_filter_plugin_constants(){
		if ( ! defined( 'TRUSTY_WOO_FILTER_URL' ) ) {
			define( 'TRUSTY_WOO_FILTER_URL', plugin_dir_url( __FILE__ ) );
		}
		if ( ! defined( 'TRUSTY_WOO_FILTER_PATH' ) ) {
			define( 'TRUSTY_WOO_FILTER_PATH', plugin_dir_path( __FILE__ ) );
		}
		if ( ! defined( 'TRUSTY_WOO_FILTER_PLUGIN_VERSION' ) ) {
			define( 'TRUSTY_WOO_FILTER_PLUGIN_VERSION','1.2' );
		}
	}
}
// Instantiate the plugin class.
$trusty_woo_plugin = new TRUSTY_WOO_FILTER_Plugin();
register_activation_hook( __FILE__, 'trusty_woo_filter_activate' );
register_deactivation_hook( __FILE__, 'trusty_woo_filter_deactivate' );
function trusty_woo_filter_activate() {	
}
function trusty_woo_filter_deactivate() {
}
?>