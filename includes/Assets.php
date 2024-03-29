<?php

namespace Shamimipt\WpCrud;

class Assets {
	function __construct() {
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_assets' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_assets' ] );
	}

	function get_scripts() {
		return [
			'wpcrud-script' => [
				'src'     => WP_CRUD_ASSETS . '/js/frontend.js',
				'version' => filemtime( WP_CRUD_PATH . '/assets/js/frontend.js' ),
				'deps'    => [ 'jquery' ]
			],
			'wp-enquiry-js' => [
				'src'     => WP_CRUD_ASSETS . '/js/enquiry.js',
				'version' => filemtime( WP_CRUD_PATH . '/assets/js/enquiry.js' ),
				'deps'    => [ 'jquery' ]
			],
			'wp-crud-admin-js' => [
				'src'     => WP_CRUD_ASSETS . '/js/admin.js',
				'version' => filemtime( WP_CRUD_PATH . '/assets/js/admin.js' ),
				'deps'    => [ 'jquery', 'wp-util' ]
			],
		];
	}

	function get_styles() {
		return [
			'wpcrud-style' => [
				'src'     => WP_CRUD_ASSETS . '/css/frontend.css',
				'version' => filemtime( WP_CRUD_PATH . '/assets/css/frontend.css' ),
				'deps'    => []
			],
			'wp-enquiry-css' => [
				'src'     => WP_CRUD_ASSETS . '/css/enquiry.css',
				'version' => filemtime( WP_CRUD_PATH . '/assets/css/enquiry.css' ),
				'deps'    => []
			],

		];
	}

	function enqueue_assets() {

		$scripts = $this->get_scripts();

		foreach ( $scripts as $handle => $script ) {
			$deps = isset( $script['deps'] ) ? $script['deps'] : false;

			wp_register_script( $handle, $script['src'], $deps, $script['version'], true );
		}

		$styles = $this->get_styles();

		foreach ( $styles as $handle => $style ) {
			$deps = isset( $style['deps'] ) ? $style['deps'] : false;

			wp_register_style( $handle, $style['src'], $deps, $style['version']);
		}

		wp_localize_script('wp-enquiry-js', 'wpCrud', [
			'ajaxurl' => admin_url('admin-ajax.php'),
			'error'   => __('Something Went Wrong', 'wpcrud'),
		]);

		wp_localize_script('wp-crud-admin-js', 'wpCrud', [
			'nonce' => wp_create_nonce('ac_admin_nonce'),
			'confirm' => __('Are Your Sure', 'wpcrud'),
			'error' => __('Something went wrong', 'wpcrud'),
		]);
	}
}
