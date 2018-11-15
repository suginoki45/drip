<?php
/**
 * Functions for copyright.
 *
 * @package Drip
 * @since   1.0.0
 */

/**
 * Get the contents of the theme copyright text.
 *
 * @since 1.0.0
 * @return string
 */
function drip_copy() {
	$copyright = '<p>&copy;' . esc_html( date( 'Y' ) ) . ' <a href="' . esc_url( home_url() ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a></p>';

	return apply_filters( 'drip_copy', $copyright );
}

/**
 * Get the contents of the theme credit text.
 *
 * @since 1.0.0
 * @return string
 */
function drip_credit() {
	$credit = '<p>drip WordPress theme by <a href="https://glatchdesign.com" target="_blank">Glatch</a></p>';

	return apply_filters( 'drip_credit', $credit );
}
