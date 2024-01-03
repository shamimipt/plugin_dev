<?php

function ac_insert_address( $args = [] ) {
	global $wpdb;

	if ( empty($args['name']) ) {
		return new \WP_Error('invalid-name', __( 'you must provide a valid name' ), 'wpcrud' );
	}

	$defaults = [
		'name'       => '',
		'address'    => '',
		'phone'      => '',
		'created_by' => get_current_user_id(),
		'created_at' => current_time( 'mysql' ),
	];

	$i_data = wp_parse_args($args, $defaults);

	$inserted = $wpdb->insert(
		"{$wpdb->prefix}ac_adddress",
		$i_data,
		[
			'%s',
			'%s',
			'%s',
			'%d',
			'%s'
		],
	);

	if (! $inserted) {
		return new \WP_Error('failed-to-insert', __('Failed to insert','wpcrud'));
	}

	return $wpdb->insert_id;
}