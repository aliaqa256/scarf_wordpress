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

	add_editor_style( 'assets/css/editor-style.css' );
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

/* ── Quick View: localized data for AJAX ──────────────────────── */
function scarf_localize_quick_view() {
if ( ! is_shop() && ! is_product_taxonomy() ) {
	return;
}
wp_localize_script( 'scarf-main', 'scarfQuickView', array(
	'ajaxUrl' => admin_url( 'admin-ajax.php' ),
	'nonce'   => wp_create_nonce( 'scarf_quick_view_nonce' ),
	'i18n'    => array(
		'addToCart' => esc_html__( 'افزودن به سبد خرید', 'scarf' ),
		'loading'   => esc_html__( 'در حال بارگذاری...', 'scarf' ),
		'close'     => esc_html__( 'بستن', 'scarf' ),
		'viewProduct' => esc_html__( 'مشاهده محصول', 'scarf' ),
	),
) );
}
add_action( 'wp_enqueue_scripts', 'scarf_localize_quick_view' );

/* ── Quick View: AJAX handler ─────────────────────────────────── */
function scarf_quick_view_handler() {
check_ajax_referer( 'scarf_quick_view_nonce', 'nonce' );

$product_id = isset( $_POST['product_id'] ) ? absint( $_POST['product_id'] ) : 0;

if ( ! $product_id ) {
	wp_send_json_error();
}

$product = wc_get_product( $product_id );
if ( ! $product ) {
	wp_send_json_error();
}

ob_start();
?>
<div class="scarf-qv">
	<div class="scarf-qv__image">
		<?php
		$image_id  = $product->get_image_id();
		$image_url = wp_get_attachment_image_url( $image_id, 'woocommerce_large_image' );
		$alt       = $product->get_name();
		?>
		<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" loading="lazy" />
	</div>
	<div class="scarf-qv__details">
		<h2 class="scarf-qv__title"><?php echo esc_html( $product->get_name() ); ?></h2>

		<div class="scarf-qv__price">
			<?php echo wp_kses_post( $product->get_price_html() ); ?>
		</div>

		<?php if ( $product->get_short_description() ) : ?>
			<div class="scarf-qv__description">
				<?php echo wp_kses_post( $product->get_short_description() ); ?>
			</div>
		<?php endif; ?>

		<?php if ( $product->is_in_stock() ) : ?>
			<form class="scarf-qv__cart-form cart" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
				<?php wp_nonce_field( 'woocommerce-add-to-cart', 'add-to-cart-nonce' ); ?>
				<input type="hidden" name="product_id" value="<?php echo esc_attr( $product_id ); ?>" />
				<input type="hidden" name="quantity" value="1" />
				<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product_id ); ?>" class="scarf-qv__add-to-cart button alt">
					<?php echo esc_html__( 'افزودن به سبد خرید', 'scarf' ); ?>
				</button>
			</form>
		<?php else : ?>
			<span class="scarf-qv__out-of-stock scarf-badge scarf-badge--danger">
				<?php echo esc_html__( 'ناموجود', 'scarf' ); ?>
			</span>
		<?php endif; ?>

		<a href="<?php echo esc_url( $product->get_permalink() ); ?>" class="scarf-qv__view-link">
			<?php echo esc_html__( 'مشاهده محصول', 'scarf' ); ?>
		</a>
	</div>
</div>
<?php
$html = ob_get_clean();

wp_send_json_success( array( 'html' => $html ) );
}
add_action( 'wp_ajax_scarf_quick_view', 'scarf_quick_view_handler' );
add_action( 'wp_ajax_nopriv_scarf_quick_view', 'scarf_quick_view_handler' );

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
