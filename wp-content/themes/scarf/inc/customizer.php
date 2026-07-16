<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Scarf Theme Customizer.
 *
 * @package Scarf
 */

function scarf_customize_register( $wp_customize ) {

	// ── Panel ──
	$wp_customize->add_panel( 'scarf_panel', array(
		'title'    => esc_html__( 'تنظیمات قالب شال', 'scarf' ),
		'priority' => 30,
	) );

	// ── Section: Colors ──
	$wp_customize->add_section( 'scarf_colors', array(
		'title' => esc_html__( 'رنگ‌ها', 'scarf' ),
		'panel' => 'scarf_panel',
	) );

	$scarf_colors = array(
		'scarf_color_primary'        => array( 'label' => 'رنگ اصلی',            'default' => '#d83f5f' ),
		'scarf_color_primary_hover'  => array( 'label' => 'رنگ اصلی (هاور)',      'default' => '#c93452' ),
		'scarf_color_primary_soft'   => array( 'label' => 'رنگ اصلی (نرم)',       'default' => '#fff1f4' ),
		'scarf_color_secondary'      => array( 'label' => 'رنگ فرعی',            'default' => '#19bfd3' ),
		'scarf_color_secondary_soft' => array( 'label' => 'رنگ فرعی (نرم)',      'default' => '#e9fbfd' ),
		'scarf_color_accent'         => array( 'label' => 'رنگ لهجه',            'default' => '#b76e79' ),
		'scarf_color_text'           => array( 'label' => 'رنگ متن',             'default' => '#232933' ),
		'scarf_color_text_soft'      => array( 'label' => 'رنگ متن نرم',         'default' => '#5f6773' ),
		'scarf_color_background'     => array( 'label' => 'رنگ پس‌زمینه',        'default' => '#f6f7f9' ),
		'scarf_color_surface'        => array( 'label' => 'رنگ سطح',             'default' => '#ffffff' ),
		'scarf_color_border'         => array( 'label' => 'رنگ حاشیه',           'default' => '#e6e8ec' ),
		'scarf_color_discount'       => array( 'label' => 'رنگ تخفیف',           'default' => '#d83f5f' ),
	);

	foreach ( $scarf_colors as $id => $args ) {
		$wp_customize->add_setting( $id, array(
			'default'           => $args['default'],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $id, array(
			'label'   => esc_html( $args['label'] ),
			'section' => 'scarf_colors',
		) ) );
	}

	// ── Section: Typography ──
	$wp_customize->add_section( 'scarf_typography', array(
		'title' => esc_html__( 'تایپوگرافی', 'scarf' ),
		'panel' => 'scarf_panel',
	) );

	$wp_customize->add_setting( 'scarf_font_family', array(
		'default'           => 'Vazirmatn, IRANSans, Tahoma, Arial, sans-serif',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'scarf_font_family', array(
		'label'   => esc_html__( 'فونت خانواده', 'scarf' ),
		'section' => 'scarf_typography',
		'type'    => 'select',
		'choices' => array(
			'Vazirmatn, IRANSans, Tahoma, Arial, sans-serif' => 'Vazirmatn',
			'IRANSans, Vazirmatn, Tahoma, Arial, sans-serif' => 'IRANSans',
			'Tahoma, Vazirmatn, IRANSans, Arial, sans-serif' => 'Tahoma',
		),
	) );

	$wp_customize->add_setting( 'scarf_heading_scale', array(
		'default'           => '1',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'scarf_heading_scale', array(
		'label'   => esc_html__( 'اندازه عناوین', 'scarf' ),
		'section' => 'scarf_typography',
		'type'    => 'select',
		'choices' => array(
			'0.9' => 'کوچک‌تر',
			'1'   => 'عادی',
			'1.1' => 'بزرگ‌تر',
			'1.2' => 'خیلی بزرگ',
		),
	) );

	// ── Section: Header ──
	$wp_customize->add_section( 'scarf_header_settings', array(
		'title' => esc_html__( 'هدر', 'scarf' ),
		'panel' => 'scarf_panel',
	) );

	$wp_customize->add_setting( 'scarf_sticky_header', array(
		'default'           => 'yes',
		'sanitize_callback' => 'esc_attr',
	) );
	$wp_customize->add_control( 'scarf_sticky_header', array(
		'label'   => esc_html__( 'هدر چسبنده', 'scarf' ),
		'section' => 'scarf_header_settings',
		'type'    => 'radio',
		'choices' => array(
			'yes' => esc_html__( 'فعال', 'scarf' ),
			'no'  => esc_html__( 'غیرفعال', 'scarf' ),
		),
	) );

	$wp_customize->add_setting( 'scarf_show_search', array(
		'default'           => 'yes',
		'sanitize_callback' => 'esc_attr',
	) );
	$wp_customize->add_control( 'scarf_show_search', array(
		'label'   => esc_html__( 'نمایش جستجو', 'scarf' ),
		'section' => 'scarf_header_settings',
		'type'    => 'checkbox',
	) );

	$wp_customize->add_setting( 'scarf_show_account', array(
		'default'           => 'yes',
		'sanitize_callback' => 'esc_attr',
	) );
	$wp_customize->add_control( 'scarf_show_account', array(
		'label'   => esc_html__( 'نمایش حساب کاربری', 'scarf' ),
		'section' => 'scarf_header_settings',
		'type'    => 'checkbox',
	) );

	// ── Section: Footer ──
	$wp_customize->add_section( 'scarf_footer_settings', array(
		'title' => esc_html__( 'فوتر', 'scarf' ),
		'panel' => 'scarf_panel',
	) );

	$wp_customize->add_setting( 'scarf_copyright_text', array(
		'default'           => '',
		'sanitize_callback' => 'esc_attr',
	) );
	$wp_customize->add_control( 'scarf_copyright_text', array(
		'label'   => esc_html__( 'متن کپی‌رایت', 'scarf' ),
		'section' => 'scarf_footer_settings',
		'type'    => 'text',
	) );

	$scarf_socials = array(
		'scarf_instagram' => 'لینک اینستاگرام',
		'scarf_telegram'  => 'لینک تلگرام',
		'scarf_whatsapp'  => 'لینک واتساپ',
	);
	foreach ( $scarf_socials as $id => $label ) {
		$wp_customize->add_setting( $id, array(
			'default'           => '#',
			'sanitize_callback' => 'esc_url_raw',
		) );
		$wp_customize->add_control( $id, array(
			'label'   => esc_html( $label ),
			'section' => 'scarf_footer_settings',
			'type'    => 'url',
		) );
	}

	// ── Section: Hero ──
	$wp_customize->add_section( 'scarf_hero_settings', array(
		'title' => esc_html__( 'بنر اصلی', 'scarf' ),
		'panel' => 'scarf_panel',
	) );

	$hero_fields = array(
		'scarf_hero_title'       => array( 'label' => 'عنوان بنر',    'default' => 'جدیدترین شال و روسری‌ها',    'type' => 'text' ),
		'scarf_hero_description' => array( 'label' => 'توضیحات بنر',  'default' => 'مجموعه‌ای از بهترین و شیک‌ترین شال و روسری‌های بازار با کیفیت عالی و قیمت مناسب', 'type' => 'textarea' ),
		'scarf_hero_cta_text'    => array( 'label' => 'متن دکمه',    'default' => 'مشاهده محصولات',            'type' => 'text' ),
		'scarf_hero_cta_url'     => array( 'label' => 'لینک دکمه',   'default' => '',                          'type' => 'url' ),
		'scarf_hero_bg_color'    => array( 'label' => 'رنگ پس‌زمینه', 'default' => '#1a1a2e',                   'type' => 'color' ),
	);

	foreach ( $hero_fields as $id => $args ) {
		$sanitize = ( 'scarf_hero_bg_color' === $id ) ? 'sanitize_hex_color' : 'esc_attr';
		$wp_customize->add_setting( $id, array(
			'default'           => $args['default'],
			'sanitize_callback' => $sanitize,
			'transport'         => 'postMessage',
		) );
		$wp_customize->add_control( $id, array(
			'label'   => esc_html( $args['label'] ),
			'section' => 'scarf_hero_settings',
			'type'    => $args['type'],
		) );
	}

	// ── Section: Contact ──
	$wp_customize->add_section( 'scarf_contact', array(
		'title' => esc_html__( 'اطلاعات تماس', 'scarf' ),
		'panel' => 'scarf_panel',
	) );

	$contact_fields = array(
		'scarf_phone'   => array( 'label' => 'تلفن',           'default' => '۰۲۱-۱۲۳۴۵۶۷۸' ),
		'scarf_email'   => array( 'label' => 'ایمیل',          'default' => 'info@scarfstore.ir' ),
		'scarf_address' => array( 'label' => 'آدرس',           'default' => '' ),
		'scarf_hours'   => array( 'label' => 'ساعات پاسخگویی', 'default' => '۹ صبح تا ۱۸' ),
	);

	foreach ( $contact_fields as $id => $args ) {
		$wp_customize->add_setting( $id, array(
			'default'           => $args['default'],
			'sanitize_callback' => 'esc_attr',
		) );
		$wp_customize->add_control( $id, array(
			'label'   => esc_html( $args['label'] ),
			'section' => 'scarf_contact',
			'type'    => 'text',
		) );
	}
}
add_action( 'customize_register', 'scarf_customize_register' );

/**
 * Output inline CSS from Customizer values.
 */
function scarf_customizer_css() {
	$primary        = get_theme_mod( 'scarf_color_primary', '#d83f5f' );
	$primary_hover  = get_theme_mod( 'scarf_color_primary_hover', '#c93452' );
	$primary_soft   = get_theme_mod( 'scarf_color_primary_soft', '#fff1f4' );
	$secondary      = get_theme_mod( 'scarf_color_secondary', '#19bfd3' );
	$secondary_soft = get_theme_mod( 'scarf_color_secondary_soft', '#e9fbfd' );
	$accent         = get_theme_mod( 'scarf_color_accent', '#b76e79' );
	$text           = get_theme_mod( 'scarf_color_text', '#232933' );
	$text_soft      = get_theme_mod( 'scarf_color_text_soft', '#5f6773' );
	$background     = get_theme_mod( 'scarf_color_background', '#f6f7f9' );
	$surface        = get_theme_mod( 'scarf_color_surface', '#ffffff' );
	$border         = get_theme_mod( 'scarf_color_border', '#e6e8ec' );
	$discount       = get_theme_mod( 'scarf_color_discount', '#d83f5f' );

	$font_family   = get_theme_mod( 'scarf_font_family', 'Vazirmatn, IRANSans, Tahoma, Arial, sans-serif' );
	$heading_scale = floatval( get_theme_mod( 'scarf_heading_scale', '1' ) );

	$hero_bg = get_theme_mod( 'scarf_hero_bg_color', '#1a1a2e' );
	$sticky  = get_theme_mod( 'scarf_sticky_header', 'yes' );

	$css = ':root{';
	$css .= '--scarf-color-primary:' . esc_attr( $primary ) . ';';
	$css .= '--scarf-color-primary-hover:' . esc_attr( $primary_hover ) . ';';
	$css .= '--scarf-color-primary-soft:' . esc_attr( $primary_soft ) . ';';
	$css .= '--scarf-color-secondary:' . esc_attr( $secondary ) . ';';
	$css .= '--scarf-color-secondary-soft:' . esc_attr( $secondary_soft ) . ';';
	$css .= '--scarf-color-accent:' . esc_attr( $accent ) . ';';
	$css .= '--scarf-color-text:' . esc_attr( $text ) . ';';
	$css .= '--scarf-color-text-soft:' . esc_attr( $text_soft ) . ';';
	$css .= '--scarf-color-background:' . esc_attr( $background ) . ';';
	$css .= '--scarf-color-surface:' . esc_attr( $surface ) . ';';
	$css .= '--scarf-color-border:' . esc_attr( $border ) . ';';
	$css .= '--scarf-color-discount:' . esc_attr( $discount ) . ';';
	$css .= '--scarf-font-family:' . esc_attr( $font_family ) . ';';
	$css .= '--scarf-font-2xl:' . ( 1.75 * $heading_scale ) . 'rem;';
	$css .= '--scarf-font-xl:' . ( 1.375 * $heading_scale ) . 'rem;';
	$css .= '--scarf-font-lg:' . ( 1.125 * $heading_scale ) . 'rem;';
	$css .= '}';

	// Hero background
	$css .= '.scarf-hero__bg{background-color:' . esc_attr( $hero_bg ) . ';}';

	// Sticky header
	if ( 'no' === $sticky ) {
		$css .= '.scarf-header{position:relative;}';
	}

	wp_add_inline_style( 'scarf-main', $css );
}
add_action( 'wp_enqueue_scripts', 'scarf_customizer_css' );

/**
 * Enqueue Customizer preview JS.
 */
function scarf_customize_preview_js() {
	wp_enqueue_script( 'scarf-customizer-preview', SCARF_URI . '/assets/js/customizer-preview.js', array( 'customize-preview' ), SCARF_VERSION, true );
}
add_action( 'customize_preview_init', 'scarf_customize_preview_js' );
