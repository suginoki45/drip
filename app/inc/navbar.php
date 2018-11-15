<?php
/**
 * Sets up options of Navbar and functions for navbar.
 *
 * @package Drip
 * @since   1.0.0
 */

register_nav_menus(
	array(
		'global-nav' => __( 'Global Navigation (For PC)', 'drip' ),
		'drawer-nav' => __( 'Drawer Navigation (For Mobile)', 'drip' ),
	)
);

/**
 * Adds class name for nav menus.
 *
 * @param array    $classes class name.
 * @param stdClass $item the current menu item.
 * @param WP_Post  $args An object of wp_nav_menu() arguments.
 * @param int      $depth depth of menu item.
 */
function drip_navbar_menu_class( $classes, $item, $args, $depth ) {
	$classes = array();
	if ( ! $depth ) {
		$classes[] = 'c-navbar__item';
	} else {
		$classes[] = 'c-navbar__submenu__item';
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'drip_navbar_menu_class', 10, 4 );

/**
 * Add class name for nav submenus.
 *
 * @param array $classes class name.
 */
function drip_navbar_submenu_class( $classes ) {
	$classes[] = 'c-navbar__submenu';
	return $classes;
}
add_filter( 'nav_menu_submenu_css_class', 'drip_navbar_submenu_class' );
