<?php
/**
 * Functions for head element.
 *
 * @package Drip
 * @since   1.0.0
 */

if ( ! function_exists( 'drip_head_tag' ) ) {
	/**
	 * Sets up content of the head element.
	 *
	 * @since  1.0.0
	 */
	function drip_head_tag() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, viewport-fit=cover">
		<meta name="description" content="">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif; ?>
		<?php
	}
}
add_action( 'wp_head', 'drip_head_tag', 1 );
