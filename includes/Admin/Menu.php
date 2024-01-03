<?php

namespace Shamimipt\WpCrud\Admin;

class Menu{

	public $addressbook;

	public function __construct( $addressbook ){
		$this->addressbook = $addressbook;
		add_action('admin_menu',[$this, 'admin_menu']);
	}

	public function admin_menu(){
		$parent_slug = "wp-crud";
		$capability = "manage_options";

		add_menu_page(
			__('WP Crud', 'wpcrud'),
			__('Crud','wpcrud'),
			'manage_options',
			'wp-crud',
			[$this->addressbook, 'handle_form'],
			'',
			100,
		);

		add_submenu_page(
			$parent_slug,
			__('Address Book','wp-crud'),
			__('Address Book', 'wp-crud'),
			$capability,
			$parent_slug,
			[$this->addressbook, 'plugin_page'],
			100,
		);

		add_submenu_page(
			$parent_slug,
			__('Settings','wp-crud'),
			__('Settings','wp-crud'),
			$capability,
			'',
			[$this, 'settings_page'],
			100
		);
	}

	public function settings_page(){
		echo "Hello Settings Page";
	}

}