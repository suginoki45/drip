<?php
/**
 * Functions for widgets.
 *
 * @package   Drip
 * @since     1.0.0
 */

/**
 * Init widget.
 *
 * @since 1.0.0
 * @return void
 */
function drip_custom_widget_init() {
	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'drip' ),
			'id'            => 'widget_sidebar',
			'before_widget' => '<div class="c-widget c-category">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="c-widget__title">',
			'after_title'   => '</h3>',
		)
	);
}

add_action( 'widgets_init', 'drip_custom_widget_init' );
