<?php
/**
 * Functions for sanitize.
 *
 * @since 1.0.0
 * @package drip
 */

/**
 * Sanitization function for checkboxes.
 *
 * @param bool $checked The strings that will be checked.
 * @return bool
 */
function drip_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true === $checked ) ? true : false );
}

/**
 * Sanitization function for radio buttons.
 *
 * @param string $input   The strings that will be checked.
 * @param string $setting The possible choices.
 * @return string
 */
function drip_sanitize_radio( $input, $setting ) {
	$input   = sanitize_key( $input );
	$choices = $setting->manager->get_control( $setting->id )->choices;
	return array_key_exists( $input, $choices ) ? $input : $setting->default;
}
