<?php

namespace Shamimipt\WpCrud\Admin;

class Addressbook {
	public function plugin_page() {

		$action = $_GET['action'] ?? 'list';

		switch ( $action ) {
			case 'new':
				$template = __DIR__ . '/views/address-new.php';
				break;
			case 'edit':
				$template = __DIR__ . '/views/address-edit.php';
				break;
			case 'view':
				$template = __DIR__ . '/views/address-view.php';
				break;

			default:
				$template = __DIR__ . '/views/address-list.php';
				break;
		}

		if ( file_exists( $template ) ) {
			include $template;
		}
	}

	function handle_form(){
		if ( ! isset( $_POST['submit_address'] ) ) {
			return;
		}

		if( !wp_verify_nonce($_POST['_wpnonce'], 'wpcrud-nonce') ){
			wp_die('Are you Cheating?');
		}

		if(!current_user_can('manage_options')){
			wp_die('Are You Cheating?');
		}

		var_dump($_POST);
		exit;
	}
}