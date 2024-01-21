<?php

namespace Shamimipt\WpCrud\Admin;

if( ! class_exists('WP_List_Table') ){
	require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

class Address_List extends \WP_List_Table {
	function __construct() {
		parent::__construct( [
			'plural'   => 'contact',
			'singular' => 'contacts',
			'ajax'     => false,
		] );
	}

	public function get_columns() {
		return [
			'cb'         => '<input type="checkbox" />',
			'name'       => __( 'Name', 'wpcrud' ),
			'address'    => __( 'Address','wpcrud' ),
			'phone'      => __( 'Phone', 'wpcrud' ),
			'created_at' => __('Date', 'wpcrud'),
		];
	}

	public function prepare_items() {
		$column = $this->get_columns();
		$hidden = [];
		$sortable = $this->get_sortable_columns();

		$this->_column_headers = [ $column, $hidden, $sortable ];
	}

}