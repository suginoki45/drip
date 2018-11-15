<?php
/**
 * Drip functions and definitions.
 *
 * @package   Drip
 * @copyright Copyright (c) 2018 Glatch
 * @license   GNU General Public License v2.0
 * @since     1.0.0
 */

if ( ! function_exists( 'drip_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function drip_setup() {
		/**
		 * Loading language file.
		 */
		load_theme_textdomain( 'drip', get_template_directory() . '/languages' );

		/**
		 * Support automatic-feed-links.
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Support editor-style.
		 */
		add_editor_style( get_stylesheet_uri() );

		/**
		 * Support custom-header.
		 */
		add_theme_support( 'custom-header' );

		/**
		 * Support custom-background.
		 */
		$custom_background_defaults = array();
		add_theme_support( 'custom-background', apply_filters( 'drip_custom_background_defaults', $custom_background_defaults ) );

		/**
		 * Support title-tag.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Support custom-logo.
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 160,
				'width'       => 320,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);

		/**
		 * Support post-thumbnails.
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Switch default core markup for search form, comment form, and galleries
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);
	}
}
add_action( 'after_setup_theme', 'drip_setup' );

if ( ! function_exists( 'drip_content_width' ) ) {
	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * @global int $content_width
	 */
	function drip_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'drip_content_width', 730 );
	}
}
add_action( 'after_setup_theme', 'drip_content_width', 0 );

if ( ! function_exists( 'drip_styles' ) ) {
	/**
	 *  Enqueue styles.
	 */
	function drip_styles() {
		wp_enqueue_style( 'bootstrap-style', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css', array(), DRIP_VER );
		wp_enqueue_style( 'fontawesome-style', 'https://use.fontawesome.com/releases/v5.0.13/css/all.css', array(), DRIP_VER );
		wp_enqueue_style( 'drip-style', get_theme_file_uri() . '/dist/css/style.css', array(), DRIP_VER );
	}
}
add_action( 'wp_enqueue_scripts', 'drip_styles' );

if ( ! function_exists( 'drip_scripts' ) ) {
	/**
	 *  Enqueue scripts.
	 */
	function drip_scripts() {
		wp_deregister_script( 'jquery' );
		wp_enqueue_script( 'jquery', 'https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js', array(), '3.3.1', true );
		wp_enqueue_script( 'popper-scripts', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array(), DRIP_VER, true );
		wp_enqueue_script( 'bootstrap-scripts', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array(), DRIP_VER, true );
		wp_enqueue_script( 'drip-scripts', get_theme_file_uri() . '/dist/js/app.js', array( 'jquery' ), DRIP_VER, true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'drip_scripts' );

/**
 *  Include files.
 */
$includes = array(
	'/app/inc',
);
foreach ( $includes as $include ) {
	foreach ( glob( __DIR__ . $include . '/*.php' ) as $file ) {
		$template_name = str_replace( array( trailingslashit( __DIR__ ), '.php' ), '', $file );
		get_template_part( $template_name );
	}
}

/**
 *  Theme definitions.
 */
define( 'DRIP_VER', '0.0.0' );
