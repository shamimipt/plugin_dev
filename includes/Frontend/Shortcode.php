<?php

namespace Shamimipt\WpCrud\Frontend;

class Shortcode{
	public function __construct(){
		add_shortcode('wp_crud',[$this, 'render_shortcode']);
	}

	public function render_shortcode( $atts, $content="" ){
		return "Hello From Shortcode";
	}
}