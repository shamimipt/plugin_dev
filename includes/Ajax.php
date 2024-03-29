<?php

namespace Shamimipt\WpCrud;

class Ajax {

	function __construct(){
		add_action('wp_ajax_wp_crud_enquiry', [ $this, 'submit_enquiry'] );
		add_action('wp_ajax_nopriv_wp_crud_enquiry', [ $this, 'submit_enquiry'] );
		add_action('wp_ajax_wpcrud-delete-contact', [ $this, 'delete_contact'] );
	}

	public function submit_enquiry() {

		//check_ajax_referer('wd-ac-enquiry-form-1');

		if ( ! wp_verify_nonce( $_REQUEST['_wpnonce'], 'wd-ac-enquiry-form-2' ) ) {
			wp_send_json_error([
				'message' => 'Nonce Verification failed'
			]);
		}

		wp_send_json_success([
			'message' => 'Enquiry has been sent successfully'
		]);

		//wp_send_json_error();
	}

	public function delete_contact() {
		wp_send_json_success();
	}
}