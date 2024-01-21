<?php

namespace Shamimipt\WpCrud;

class Installer{

	/**
	 * Installer constructor.
	 */
	public function run() {
		$this->add_version();
		$this->create_tables();
	}

	public function add_version() {
		$installed = get_option( 'wp_crud_installed_time' );
		if ( ! $installed ) {
			update_option( 'wp_crud_installed_time', time() );
		}
		update_option( 'wp_crud_version', WP_CRUD_VERSION );
	}

	public function create_tables() {
		global $wpdb;

		$charset_collate = $wpdb->get_charset_collate();

		$db_schema = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}ac_address` (`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT , 
						`name` VARCHAR(100) NULL , 
						`address` VARCHAR(255) NULL , 
						`phone` VARCHAR(30) NOT NULL , 
						`created_by` BIGINT(20) UNSIGNED NOT NULL , 
						`created_at` DATETIME NOT NULL , 
						PRIMARY KEY (`id`) ) $charset_collate ";

		if ( !function_exists( 'dbDelta' ) ) {
			require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		}

		dbDelta( $db_schema );

	}


}