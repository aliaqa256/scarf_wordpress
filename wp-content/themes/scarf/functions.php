<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SCARF_VERSION', '1.0.0' );
define( 'SCARF_DIR', get_template_directory() );
define( 'SCARF_URI', get_template_directory_uri() );

require_once SCARF_DIR . '/inc/template-helpers.php';
require_once SCARF_DIR . '/inc/woocommerce.php';
require_once SCARF_DIR . '/inc/customizer.php';
require_once SCARF_DIR . '/inc/block-patterns.php';

function scarf_setup() {
	load_theme_textdomain( 'scarf', SCARF_DIR . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array(
		'height'      => 60,
		'width'       => 200,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	) );

	register_nav_menus( array(
		'menu-primary' => esc_html__( 'منوی اصلی', 'scarf' ),
	) );
}
add_action( 'after_setup_theme', 'scarf_setup' );

/* scarf_register_sidebars removed — sidebar-shop is registered in scarf_widgets_init(). */

function scarf_enqueue_assets() {
	wp_enqueue_style( 'scarf-style', get_stylesheet_uri(), array(), SCARF_VERSION );
	wp_enqueue_style( 'scarf-main', SCARF_URI . '/assets/css/main.css', array( 'scarf-style' ), SCARF_VERSION );

	if ( class_exists( 'WooCommerce' ) ) {
		wp_enqueue_style( 'scarf-woocommerce', SCARF_URI . '/assets/css/woocommerce.css', array( 'scarf-main' ), SCARF_VERSION );
	}

	wp_enqueue_script( 'scarf-main', SCARF_URI . '/assets/js/main.js', array(), SCARF_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'scarf_enqueue_assets' );

if ( ! function_exists( 'scarf_enqueue_um_assets' ) ) {
	function scarf_enqueue_um_assets() {
		if ( ! function_exists( 'is_ultimatemember' ) || ! is_ultimatemember() ) {
			return;
		}
		wp_enqueue_style( 'scarf-ultimate-member', SCARF_URI . '/assets/css/ultimate-member.css', array( 'scarf-main' ), SCARF_VERSION );
	}
}
add_action( 'wp_enqueue_scripts', 'scarf_enqueue_um_assets' );

function scarf_get_account_url() {
	if ( is_user_logged_in() ) {
		$account_page = get_page_by_path( 'account' );
		if ( $account_page ) {
			return get_permalink( $account_page->ID );
		}
		return admin_url( 'profile.php' );
	}

	$login_page = get_page_by_path( 'login' );
	if ( $login_page ) {
		return get_permalink( $login_page->ID );
	}
	return wp_login_url();
}

function scarf_fallback_menu() {
	$fallback_items = array(
		'<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'خانه', 'scarf' ) . '</a>',
	);

	if ( class_exists( 'WooCommerce' ) && wc_get_page_id( 'shop' ) > 0 ) {
		$shop_url = get_permalink( wc_get_page_id( 'shop' ) );
		if ( $shop_url ) {
			$fallback_items[] = '<a href="' . esc_url( $shop_url ) . '">' . esc_html__( 'فروشگاه', 'scarf' ) . '</a>';
		}
	}

	$account_url = scarf_get_account_url();
	if ( $account_url ) {
		$label = is_user_logged_in() ? esc_html__( 'حساب کاربری', 'scarf' ) : esc_html__( 'ورود | ثبت‌نام', 'scarf' );
		$fallback_items[] = '<a href="' . esc_url( $account_url ) . '">' . $label . '</a>';
	}

	echo '<ul id="scarf-primary-menu" class="scarf-primary-menu">';
	foreach ( $fallback_items as $item ) {
		echo '<li class="menu-item">' . $item . '</li>';
	}
	echo '</ul>';
}

function scarf_cart_fragment( $fragments ) {
	ob_start();
	?>
	<span class="scarf-header__cart-count"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
	<?php
	$fragments['.scarf-header__cart-count'] = ob_get_clean();
	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'scarf_cart_fragment' );

function scarf_widgets_init() {
	// Footer columns (4)
	register_sidebar( array(
		'name'          => esc_html__( 'فوتر — ستون ۱', 'scarf' ),
		'id'            => 'footer-col-1',
		'description'   => esc_html__( 'ستون اول فوتر', 'scarf' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="scarf-footer__column-title widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'فوتر — ستون ۲', 'scarf' ),
		'id'            => 'footer-col-2',
		'description'   => esc_html__( 'ستون دوم فوتر', 'scarf' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="scarf-footer__column-title widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'فوتر — ستون ۳', 'scarf' ),
		'id'            => 'footer-col-3',
		'description'   => esc_html__( 'ستون سوم فوتر', 'scarf' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="scarf-footer__column-title widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'فوتر — ستون ۴', 'scarf' ),
		'id'            => 'footer-col-4',
		'description'   => esc_html__( 'ستون چهارم فوتر', 'scarf' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="scarf-footer__column-title widget-title">',
		'after_title'   => '</h3>',
	) );

	// Shop sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'سایدبار فروشگاه', 'scarf' ),
		'id'            => 'sidebar-shop',
		'description'   => esc_html__( 'سایدبار صفحه آرشیو فروشگاه', 'scarf' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	// Homepage widget areas
	register_sidebar( array(
		'name'          => esc_html__( 'صفحه اصلی — بالای محصولات', 'scarf' ),
		'id'            => 'homepage-top',
		'description'   => esc_html__( 'بالای بخش محصولات صفحه اصلی', 'scarf' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s scarf-homepage-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title scarf-section-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'صفحه اصلی — پایین محصولات', 'scarf' ),
		'id'            => 'homepage-bottom',
		'description'   => esc_html__( 'پایین بخش محصولات صفحه اصلی', 'scarf' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s scarf-homepage-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title scarf-section-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'scarf_widgets_init' );
