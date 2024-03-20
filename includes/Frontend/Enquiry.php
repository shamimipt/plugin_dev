<?php

namespace Shamimipt\WpCrud\Frontend;

class Enquiry{
	public function __construct(){
		add_shortcode('wp_enquiry',[$this, 'render_shortcode']);
	}

	public function render_shortcode( $atts, $content="" ){
		wp_enqueue_style( 'wp-enquiry-css' );
		wp_enqueue_script( 'wp-enquiry-js' );

		ob_start();
		include  __DIR__ . "/views/enquiry.php";
		return ob_get_clean();
	}
}