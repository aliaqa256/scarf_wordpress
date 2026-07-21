<?php
/**
 * Scarf theme functions and definitions
 *
 * @package Scarf
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'scarf_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function scarf_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		load_theme_textdomain( 'scarf', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'scarf' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
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
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for core custom logo.
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

        // Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

        // Add support for full and wide align images.
		add_theme_support( 'align-wide' );

        // Editor styles
        add_theme_support('editor-styles');

        // WooCommerce support
        add_theme_support('woocommerce');
	}
endif;
add_action( 'after_setup_theme', 'scarf_setup' );

/**
 * Register custom shortcodes.
 */
function scarf_dynamic_categories_shortcode( $atts ) {
    if ( ! class_exists( 'WooCommerce' ) ) {
        return '<p>' . esc_html__( 'WooCommerce is not active.', 'scarf' ) . '</p>';
    }

    $atts = shortcode_atts( array(
        'count' => 6,
        'columns' => 6,
        'hide_empty' => false,
    ), $atts, 'scarf_dynamic_categories' );

    $terms = get_terms( array(
        'taxonomy'   => 'product_cat',
        'hide_empty' => filter_var( $atts['hide_empty'], FILTER_VALIDATE_BOOLEAN ),
        'number'     => intval( $atts['count'] ),
    ) );

    if ( is_wp_error( $terms ) || empty( $terms ) ) {
        return '<p>' . esc_html__( 'No categories found.', 'scarf' ) . '</p>';
    }

    $output = '<div class="scarf-categories-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 1rem; margin-top: 2rem;">';

    foreach ( $terms as $term ) {
        $thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
        $image_url    = wp_get_attachment_url( $thumbnail_id );

        if ( ! $image_url ) {
            $image_url = get_template_directory_uri() . '/assets/images/category-placeholder.png';
        }

        $term_link = get_term_link( $term );

        $output .= '<a href="' . esc_url( $term_link ) . '" class="scarf-category-card" style="text-align: center; display: block; text-decoration: none; color: inherit;">';
        $output .= '<div class="scarf-category-image-wrap" style="width: 100px; height: 100px; margin: 0 auto 10px; border-radius: 50%; overflow: hidden; background: #eee;">';
        $output .= '<img src="' . esc_url( $image_url ) . '" alt="' . esc_attr( $term->name ) . '" style="width: 100%; height: 100%; object-fit: cover;" />';
        $output .= '</div>';
        $output .= '<h3 class="scarf-category-title" style="font-size: 1rem; margin: 0;">' . esc_html( $term->name ) . '</h3>';
        $output .= '</a>';
    }

    $output .= '</div>';

    return $output;
}
add_shortcode( 'scarf_dynamic_categories', 'scarf_dynamic_categories_shortcode' );

/**
 * Register block patterns.
 */
function scarf_register_block_patterns() {
    register_block_pattern_category(
        'scarf',
        array( 'label' => __( 'Scarf Patterns', 'scarf' ) )
    );
}
add_action( 'init', 'scarf_register_block_patterns' );

/**
 * Enqueue scripts and styles.
 */
function scarf_scripts() {
	wp_enqueue_style( 'scarf-style', get_stylesheet_uri(), array(), '1.0.0' );
    wp_enqueue_style( 'scarf-carousel', get_template_directory_uri() . '/assets/css/carousel.css', array(), '1.0.0' );
    wp_enqueue_script( 'scarf-carousel', get_template_directory_uri() . '/assets/js/carousel.js', array(), '1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'scarf_scripts' );

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
