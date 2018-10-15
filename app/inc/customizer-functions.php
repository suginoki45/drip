<?php
/**
 * Functions for theme customizer.
 *
 * @package Drip
 * @since   1.0.0
 */

/**
 * Get the sidebar position.
 *
 * @since 1.0.0
 */
function sidebar_position() {
	$sidebar_position = get_theme_mod( 'sidebar_position', 'right' );
	return apply_filters( 'sidebar_position', $sidebar_position );
}
