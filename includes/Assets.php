<?php

namespace Shamimipt\WpCrud;

class Assets {
	function __construct() {
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_assets' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_assets' ] );
	}

	function enqueue_assets() {
		wp_enqueue_script( 'wpcrud-script', WP_CRUD_ASSETS . '/js/frontend.js', false, filemtime( WP_CRUD_PATH . '/assets/js/frontend.js' ), true );
		wp_enqueue_style( 'wpcrud-style', WP_CRUD_ASSETS . '/css/frontend.css', false, filemtime( WP_CRUD_PATH . '/assets/css/frontend.css' ) );
	}
}
