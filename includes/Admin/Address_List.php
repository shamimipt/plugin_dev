<?php

namespace Shamimipt\WpCrud\Admin;

if ( ! class_exists( 'WP_List_Table' ) ) {
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
			'address'    => __( 'Address', 'wpcrud' ),
			'phone'      => __( 'Phone', 'wpcrud' ),
			'created_at' => __( 'Date', 'wpcrud' ),
		];
	}

	function get_sortable_columns() {
		return [
			'name'       => ['name', true],
			'created_at' => ['created_at',true]
		];
	}

	protected function column_default( $item, $column_name ) {
		switch ( $column_name ) {
			case 'value' :
				break;

			default:
				return isset( $item->$column_name ) ? $item->$column_name : '';
		}
	}

	public function column_name( $item ) {
		$action         = [];
		$action['edit'] = sprintf(
			'<a href="%s" title="%s">%s</a>',
			admin_url( 'admin.php?page=wp-crud&action=edit&id=' . $item->id ),
			__( 'Edit', 'wpcrud' ),
			__( 'Edit', 'wpcrud' ),
		);

		$action['delete'] = sprintf(
			'<a href="%s" class="submitdelete" onclick="return confirm(\'Are You Sure?\');" title="%s">%s</a>',
			wp_nonce_url( admin_url( 'admin.php?page=wp-crud&action=view&id=' . $item->id ), 'ac-delete-address' ),
			__( 'Delete', 'wpcrud' ),
			__( 'Delete', 'wpcrud' ),
		);

		return sprintf(
			'<a href="%1$s"><strong>%2$s</strong></a> %3$s',
			admin_url( 'admin.php?page=wp-crud&action=view&id=' . $item->id ),
			$item->name,
			$this->row_actions( $action )
		);
	}

	protected function column_cb( $item ) {
		return sprintf( '<input type="checkbox" name="address_id[]" value="%d"/>', $item->id );
	}

	public function prepare_items() {
		$column   = $this->get_columns();
		$hidden   = [];
		$sortable = $this->get_sortable_columns();

		$this->_column_headers = [ $column, $hidden, $sortable ];

		$per_page     = 20;
		$current_page = $this->get_pagenum();
		$offset       = ( $current_page - 1 ) * $per_page;

		$args = [
			'number' => $per_page,
			'offset' => $offset,
		];

		if ( isset( $_REQUEST['orderby'] ) && isset( $_REQUEST['order'] ) ) {
			$args['orderby'] = $_REQUEST['orderby'];
			$args['order']   = $_REQUEST['order'];
		}

		$this->items = ac_get_address( $args );
		$this->set_pagination_args( [
			'total_items' => ac_address_count(),
			'per_page'    => $per_page
		] );
	}

}