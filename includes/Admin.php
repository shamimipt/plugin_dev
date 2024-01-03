<?php

namespace Shamimipt\WpCrud;

class Admin{
	public function __construct(){

		$addressbook = new Admin\Addressbook();

		$this->dispatch_actions( $addressbook );
		new Admin\Menu( $addressbook );
	}

	public function dispatch_actions( $addressbook ){
		add_action('admin_init',[$addressbook,'handle_form']);
	}
}