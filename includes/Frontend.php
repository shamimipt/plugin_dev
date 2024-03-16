<?php

namespace Shamimipt\WpCrud;

class Frontend {

	public function __construct() {
		new Frontend\Shortcode();
		new Frontend\Enquiry();
	}
}