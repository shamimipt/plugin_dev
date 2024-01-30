<?php

namespace Shamimipt\WpCrud\Traits;

trait Form_Error {

	/**
	 * @var array
	 */
	public $errors = [];

	/**
	 * @param $key
	 *
	 * @return bool
	 */
	public function has_errors( $key ) {
		return isset( $this->errors[ $key ] ) ? true : false;
	}

	/**
	 * @param $key
	 *
	 * @return false|mixed
	 */
	public function get_errors( $key ) {
		if ( isset( $this->errors[ $key ] ) ) {
			return $this->errors[ $key ];
		}
		return false;
	}
}