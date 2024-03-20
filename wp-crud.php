<?php
/**
 * Plugin Name: WP Crud
 * Plugin URI: https://example.com/
 * Description: An wp crud example.
 * Version: 1.0.0
 * Author: shamim
 * Author URI: https://example.com
 * Text Domain: wpcrud
 * Domain Path: /i18n/languages/
 * Requires at least: 6.3
 * Requires PHP: 7.4
 *
 * @package wpcrud
 */

use JetBrains\PhpStorm\Pure;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

//autload
require_once __DIR__ . "/vendor/autoload.php";

/**
 * Class wpCrud
 */
final class wpCrud {

	/**
	 * define version
	 */
	const version = '1.0';

	/**
	 * wpCrud constructor.
	 */
	private function __construct() {
		$this->define_constants();

		register_activation_hook( __FILE__, [ $this, 'active' ] );

		add_action( 'plugin_loaded', [ $this, 'init_plugins' ] );
	}

	/**
	 * @return false|wpCrud
	 */
	public static function init(): bool|wpCrud {
		static $instance = false;

		if ( ! $instance ) {
			$instance = new self();
		}

		return $instance;
	}

	/**
	 * define class constant
	 */
	public function define_constants() {
		// version constant
		define( 'WP_CRUD_VERSION', self::version );
		// file constant
		define( 'WP_CRUD_FILE', __FILE__ );
		// path constant
		define( 'WP_CRUD_PATH', __DIR__ );
		// url constant
		define( 'WP_CRUD_URL', plugins_url( '', WP_CRUD_FILE ) );
		//assets constant
		define( 'WP_CRUD_ASSETS', WP_CRUD_URL . '/assets' );
	}

	/**
	 *  do stuff at plugin install
	 */
	public function active() {
		$installer = new \Shamimipt\WpCrud\Installer();
		$installer->run();
	}

	public function init_plugins() {

		new \Shamimipt\WpCrud\Assets();

		if ( defined('DOING_AJAX') && DOING_AJAX ) {
			new \Shamimipt\WpCrud\Ajax();
		}

		if ( is_admin() ) {
			new \Shamimipt\WpCrud\Admin();
		} else {
			new \Shamimipt\WpCrud\Frontend();
		}

	}
}

/**
 * init the plugin
 *
 * @return false|wpCrud
 */
function wpcrud(): bool|wpCrud {
	return wpCrud::init();
}

// kick off the plugin
wpcrud();