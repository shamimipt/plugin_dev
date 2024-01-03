<?php

function ac_insert_address( $args = [] ) {
	global $wpdb;

	$defaults = [
		'name'       => '',
		'address'    => '',
		'phone'      => '',
		'created_by' => get_current_user_id(),
		'created_at' => current_time( 'mysql' ),
	];

	$data = wp_parse_args($args, $defaults);

	$wpdb->insert(
		"{$wpdb->prefix}ac_adddress",
		$data,
		[
			'%s', '%s', '%s', '%d', '%s'
		],
	);
}