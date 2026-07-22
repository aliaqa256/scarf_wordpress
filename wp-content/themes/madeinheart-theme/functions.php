<?php
/**
 * Made In Heart functions and definitions
 *
 * @package madeinheart
 */

if ( ! function_exists( 'madeinheart_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function madeinheart_setup() {
		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );
	}
endif;
add_action( 'after_setup_theme', 'madeinheart_setup' );
