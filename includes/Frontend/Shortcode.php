<?php

namespace Shamimipt\WpCrud\Frontend;

class Shortcode{
	public function __construct(){
		add_shortcode('wp_crud',[$this, 'render_shortcode']);
	}

	public function render_shortcode( $atts, $content="" ){
		wp_enqueue_style( 'wpcrud-style' );
		wp_enqueue_script( 'wpcrud-script' );
		return "<div class='wp-shortcode'>Hello From Shortcode</div>";
	}
}