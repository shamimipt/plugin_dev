<?php

namespace Shamimipt\WpCrud\Admin;

use Shamimipt\WpCrud\Traits\Form_Error;

class Addressbook {

	use Form_Error;

	public function plugin_page() {

		$action = $_GET['action'] ?? 'list';
		$id     = isset( $_GET['id'] ) ? intval( $_GET['id'] ) : 0;

		switch ( $action ) {
			case 'new':
				$template = __DIR__ . '/views/address-new.php';
				break;
			case 'edit':
				$get_address = ac_has_address( $id );
				$template    = __DIR__ . '/views/address-edit.php';
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

	function handle_form() {
		if ( ! isset( $_POST['submit_address'] ) ) {
			return;
		}

		if ( ! wp_verify_nonce( $_POST['_wpnonce'], 'wpcrud-nonce' ) ) {
			wp_die( 'Are you Cheating?' );
		}

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( 'Are You Cheating?' );
		}

		$id      = isset( $_POST['id'] ) ? intval( $_POST['id'] ) : 0;
		$name    = isset( $_POST['name'] ) ? sanitize_text_field( $_POST['name'] ) : '';
		$address = isset( $_POST['address'] ) ? sanitize_text_field( $_POST['address'] ) : '';
		$phone   = isset( $_POST['phone'] ) ? sanitize_text_field( $_POST['phone'] ) : '';

		if ( empty( $name ) ) {
			$this->errors['name'] = __( 'Please provide a name', 'wpcrud' );
		}
		if ( empty( $address ) ) {
			$this->errors['address'] = __( 'Please provide Address', 'wpcrud' );
		}
		if ( empty( $phone ) ) {
			$this->errors['phone'] = __( 'Please provide phone number', 'wpcrud' );
		}
		if ( ! empty( $this->errors ) ) {
			return;
		}

		$args = [
			'name'    => $name,
			'address' => $address,
			'phone'   => $phone
		];

		if ( $id ) {
			$args['id'] = $id;
		}

		$insert_id = ac_insert_address( $args );

		if ( is_wp_error( $insert_id ) ) {
			wp_die( $insert_id->get_error_message() );
		}

		if ( $id ) {
			$redirected_to = admin_url( 'admin.php?page=wp-crud&action=edit&address-update=true&id=' . $id );
		} else {
			$redirected_to = admin_url( 'admin.php?page=wp-crud&inserted=true' );
		}
		wp_redirect( $redirected_to );
		exit;
	}

	function delete_address() {
		if ( ! wp_verify_nonce( $_REQUEST['_wpnonce'], 'ac-delete-address' ) ) {
			wp_die( 'Are you Cheating?' );
		}

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( 'Are You Cheating?' );
		}

		$id      = isset( $_REQUEST['id'] ) ? intval( $_REQUEST['id'] ) : 0;


		if ( ac_delete_address( $id ) ) {
			$redirected_to = admin_url( 'admin.php?page=wp-crud&address-deleted=true' );
		} else {
			$redirected_to = admin_url( 'admin.php?page=wp-crud&address-deleted=false' );
		}
		wp_redirect( $redirected_to );
		exit;
	}
}