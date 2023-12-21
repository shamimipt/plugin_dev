<?php

namespace Shamimipt\WpCrud;

class Admin{
	public function __construct(){
		$this->dispatch_actions();
		new Admin\Menu();
	}

	public function dispatch_actions(){
		$addressbook = new Admin\Addressbook();
		add_action('admin_init',[$addressbook,'handle_form']);
	}
}