<?php

/**
 * Insert Data into table
 *
 * @param array $args
 *
 * @return int|WP_Error
 */
function ac_insert_address( $args = [] ) {
	global $wpdb;

	if ( empty( $args['name'] ) ) {
		return new \WP_Error( 'invalid-name', __( 'you must provide a valid name' ), 'wpcrud' );
	}

	$defaults = [
		'name'       => '',
		'address'    => '',
		'phone'      => '',
		'created_by' => get_current_user_id(),
		'created_at' => current_time( 'mysql' ),
	];

	$i_data = wp_parse_args( $args, $defaults );

	$inserted = $wpdb->insert(
		"{$wpdb->prefix}ac_address",
		$i_data,
		[
			'%s',
			'%s',
			'%s',
			'%d',
			'%s'
		],
	);

	if ( ! $inserted ) {
		return new \WP_Error( 'failed-to-insert', __( 'Failed to insert', 'wpcrud' ) );
	}

	return $wpdb->insert_id;
}

function ac_get_address( $args = [] ) {
	global $wpdb;

	$defaults = [
		'number'  => 20,
		'offset'  => 0,
		'orderby' => 'id',
		'order'   => 'ASC',
	];

	$args = wp_parse_args( $args, $defaults );

	$items = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM {$wpdb->prefix}ac_address 
			ORDER BY {$args['orderby']} {$args['order']}
			LIMIT %d, %d",
			$args['offset'], $args['number']
		)
	);

	return $items;

}

function ac_address_count() {
	global $wpdb;

	return (int) $wpdb->get_var("SELECT count(id) FROM {$wpdb->prefix}ac_address" );
}