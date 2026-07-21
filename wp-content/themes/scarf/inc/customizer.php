<?php
/**
 * Scarf Theme Customizer
 *
 * @package Scarf
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function scarf_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'scarf_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'scarf_customize_partial_blogdescription',
			)
		);
	}

    // Add Scarf Colors Section
    $wp_customize->add_section( 'scarf_colors_section', array(
        'title'      => __( 'Scarf Theme Colors', 'scarf' ),
        'priority'   => 30,
    ) );

    // Primary Color
    $wp_customize->add_setting( 'scarf_primary_color', array(
        'default'           => '#d83f5f',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'scarf_primary_color', array(
        'label'    => __( 'Primary Color', 'scarf' ),
        'section'  => 'scarf_colors_section',
        'settings' => 'scarf_primary_color',
    ) ) );

    // Secondary Color
    $wp_customize->add_setting( 'scarf_secondary_color', array(
        'default'           => '#19bfd3',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'scarf_secondary_color', array(
        'label'    => __( 'Secondary Color', 'scarf' ),
        'section'  => 'scarf_colors_section',
        'settings' => 'scarf_secondary_color',
    ) ) );

    // Background Color
    $wp_customize->add_setting( 'scarf_bg_color', array(
        'default'           => '#f6f7f9',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'scarf_bg_color', array(
        'label'    => __( 'Background Color', 'scarf' ),
        'section'  => 'scarf_colors_section',
        'settings' => 'scarf_bg_color',
    ) ) );

    // Text Color
    $wp_customize->add_setting( 'scarf_text_color', array(
        'default'           => '#232933',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'scarf_text_color', array(
        'label'    => __( 'Text Color', 'scarf' ),
        'section'  => 'scarf_colors_section',
        'settings' => 'scarf_text_color',
    ) ) );

}
add_action( 'customize_register', 'scarf_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function scarf_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function scarf_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Generate CSS variables for the front end based on customizer choices.
 */
function scarf_customizer_css() {
    $primary_color = get_theme_mod( 'scarf_primary_color', '#d83f5f' );
    $secondary_color = get_theme_mod( 'scarf_secondary_color', '#19bfd3' );
    $bg_color = get_theme_mod( 'scarf_bg_color', '#f6f7f9' );
    $text_color = get_theme_mod( 'scarf_text_color', '#232933' );

    $css = "
        :root {
            --scarf-color-primary: " . esc_attr( $primary_color ) . ";
            --scarf-color-secondary: " . esc_attr( $secondary_color ) . ";
            --scarf-color-background: " . esc_attr( $bg_color ) . ";
            --scarf-color-text: " . esc_attr( $text_color ) . ";
        }
    ";

    wp_add_inline_style( 'scarf-style', $css );
}
add_action( 'wp_enqueue_scripts', 'scarf_customizer_css' );
