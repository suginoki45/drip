<?php
/**
 * Functions for body classes.
 *
 * @package Drip
 * @since   1.0.0
 */

if ( ! function_exists( 'drip_body_class' ) ) {
	/**
	 * Adds class name for body.
	 *
	 * @param  string $classes The classes add to the body class.
	 * @return array  custom body classes.
	 * @since  1.0.0
	 */
	function drip_body_class( $classes ) {
		if ( sidebar_position() === 'right' ) {
			$classes[] = 'right-sidebar';
		} elseif ( sidebar_position() === 'left' ) {
			$classes[] = 'left-sidebar';
		} elseif ( sidebar_position() === 'bottom' ) {
			$classes[] = 'bottom-sidebar';
		}

		return $classes;
	}
}
add_filter( 'body_class', 'drip_body_class' );
