<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WooCommerce' ) ) {
	return;
}

if ( ! function_exists( 'scarf_woocommerce_archive_layout_start' ) ) {

	add_action( 'woocommerce_before_main_content', 'scarf_woocommerce_archive_layout_start', 5 );

	function scarf_woocommerce_archive_layout_start() {
		if ( ! is_shop() && ! is_product_taxonomy() ) {
			return;
		}
		echo '<div class="scarf-archive-layout"><div class="scarf-archive-content">';
	}
}

if ( ! function_exists( 'scarf_woocommerce_archive_layout_mid' ) ) {

	add_action( 'woocommerce_after_main_content', 'scarf_woocommerce_archive_layout_mid', 5 );

	function scarf_woocommerce_archive_layout_mid() {
		if ( ! is_shop() && ! is_product_taxonomy() ) {
			return;
		}
		echo '</div>';
	}
}

if ( ! function_exists( 'scarf_woocommerce_single_product_wrapper_start' ) ) {

	add_action( 'woocommerce_before_single_product', 'scarf_woocommerce_single_product_wrapper_start', 5 );

	function scarf_woocommerce_single_product_wrapper_start() {
		if ( ! is_product() ) {
			return;
		}
		echo '<div class="scarf-single-product">';
	}
}

if ( ! function_exists( 'scarf_woocommerce_single_product_wrapper_end' ) ) {

	add_action( 'woocommerce_after_single_product', 'scarf_woocommerce_single_product_wrapper_end', 5 );

	function scarf_woocommerce_single_product_wrapper_end() {
		if ( ! is_product() ) {
			return;
		}
		echo '</div>';
	}
}

if ( ! function_exists( 'scarf_woocommerce_single_sale_badge' ) ) {

	remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
	add_action( 'woocommerce_before_single_product_summary', 'scarf_woocommerce_single_sale_badge', 10 );

	function scarf_woocommerce_single_sale_badge() {
		global $product;

		if ( ! is_a( $product, 'WC_Product' ) ) {
			return;
		}

		if ( ! $product->is_on_sale() ) {
			return;
		}

		$percentage = '';

		if ( $product->is_type( 'simple' ) ) {
			$regular_price = $product->get_regular_price();
			$sale_price    = $product->get_sale_price();

			if ( is_numeric( $regular_price ) && is_numeric( $sale_price ) && (float) $regular_price > (float) $sale_price ) {
				$discount   = round( ( ( (float) $regular_price - (float) $sale_price ) / (float) $regular_price ) * 100 );
				$percentage = $discount . '%';
			}
		}

		if ( empty( $percentage ) ) {
			$percentage = esc_html__( 'تخفیف ویژه', 'scarf' );
		}

		echo '<span class="scarf-badge scarf-badge--discount scarf-badge--single">' . esc_html( $percentage ) . '</span>';
	}
}

if ( ! function_exists( 'scarf_woocommerce_variation_dropdown_class' ) ) {

	add_filter( 'woocommerce_dropdown_variation_attribute_options_html', 'scarf_woocommerce_variation_dropdown_class', 10, 2 );

	function scarf_woocommerce_variation_dropdown_class( $html, $args ) {
		if ( ! is_product() ) {
			return $html;
		}

		$html = str_replace( '<select', '<select class="scarf-variation-select"', $html );

		return $html;
	}
}

if ( ! function_exists( 'scarf_woocommerce_sale_badge' ) ) {

	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
	add_action( 'woocommerce_before_shop_loop_item_title', 'scarf_woocommerce_sale_badge', 10 );

	function scarf_woocommerce_sale_badge() {
		global $product;

		if ( ! is_a( $product, 'WC_Product' ) ) {
			return;
		}

		if ( ! $product->is_on_sale() ) {
			return;
		}

		$percentage = '';

		if ( $product->is_type( 'simple' ) ) {
			$regular_price = $product->get_regular_price();
			$sale_price    = $product->get_sale_price();

			if ( is_numeric( $regular_price ) && is_numeric( $sale_price ) && (float) $regular_price > (float) $sale_price ) {
				$discount   = round( ( ( (float) $regular_price - (float) $sale_price ) / (float) $regular_price ) * 100 );
				$percentage = $discount . '%';
			}
		}

		if ( empty( $percentage ) ) {
			return;
		}

		echo '<span class="scarf-badge scarf-badge--discount">' . esc_html( $percentage ) . '</span>';
	}
}

if ( ! function_exists( 'scarf_woocommerce_stock_badge' ) ) {

	add_action( 'woocommerce_after_shop_loop_item_title', 'scarf_woocommerce_stock_badge', 6 );

	function scarf_woocommerce_stock_badge() {
		global $product;

		if ( ! is_a( $product, 'WC_Product' ) ) {
			return;
		}

		if ( ! $product->is_in_stock() ) {
			echo '<span class="scarf-badge scarf-badge--danger">' . esc_html__( 'ناموجود', 'scarf' ) . '</span>';
		}
	}
}

if ( ! function_exists( 'scarf_woocommerce_shop_sidebar' ) ) {

	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
	add_action( 'woocommerce_sidebar', 'scarf_woocommerce_shop_sidebar', 10 );

	function scarf_woocommerce_shop_sidebar() {
		if ( ! is_shop() && ! is_product_taxonomy() ) {
			return;
		}
		?>
		<aside id="scarf-shop-filters" class="scarf-shop-filters" aria-label="<?php esc_attr_e( 'فیلتر محصولات', 'scarf' ); ?>">
			<?php
			if ( is_active_sidebar( 'sidebar-shop' ) ) {
				dynamic_sidebar( 'sidebar-shop' );
			} else {
				echo '<div class="scarf-widget scarf-widget--empty">';
				echo '<p class="scarf-widget__empty-text">' . esc_html__( 'برای فیلتر محصولات از بخش نمایش > ویجت‌ها استفاده کنید.', 'scarf' ) . '</p>';
				echo '</div>';
			}
			?>
		</aside>
		</div>
		<?php
	}
}

if ( ! function_exists( 'scarf_woocommerce_filter_toggle' ) ) {

	add_action( 'woocommerce_before_shop_loop', 'scarf_woocommerce_filter_toggle', 5 );

	function scarf_woocommerce_filter_toggle() {
		if ( ! is_shop() && ! is_product_taxonomy() ) {
			return;
		}
		?>
		<button class="scarf-filter-toggle" type="button" aria-controls="scarf-shop-filters" aria-expanded="false">
			<?php esc_html_e( 'فیلتر محصولات', 'scarf' ); ?>
		</button>
		<?php
	}
}

if ( ! function_exists( 'scarf_woocommerce_loop_add_to_cart_link' ) ) {

	add_filter( 'woocommerce_loop_add_to_cart_link', 'scarf_woocommerce_loop_add_to_cart_link', 10, 3 );

	function scarf_woocommerce_loop_add_to_cart_link( $link, $product, $args ) {
		$classes   = isset( $args['class'] ) ? $args['class'] : '';
		$classes  .= ' scarf-button scarf-button--primary scarf-product-card__button';
		$args['class'] = trim( $classes );

		return sprintf(
			'<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
			esc_url( $product->add_to_cart_url() ),
			esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
			esc_attr( $args['class'] ),
			isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
			esc_html( $product->add_to_cart_text() )
		);
	}
}

if ( ! function_exists( 'scarf_woocommerce_placeholder_img' ) ) {

	add_filter( 'woocommerce_placeholder_img', 'scarf_woocommerce_placeholder_img', 10, 3 );

	function scarf_woocommerce_placeholder_img( $image_html, $size, $dimensions ) {
		$width  = isset( $dimensions['width'] ) ? $dimensions['width'] : 600;
		$height = isset( $dimensions['height'] ) ? $dimensions['height'] : 600;

		return scarf_placeholder_image( 'product', array(
			'width'  => $width,
			'height' => $height,
		) );
	}
}

if ( ! function_exists( 'scarf_no_products_found' ) ) {

	remove_action( 'woocommerce_no_products_found', 'wc_no_products_found', 10 );
	add_action( 'woocommerce_no_products_found', 'scarf_no_products_found', 10 );

	function scarf_no_products_found() {
		$shop_url = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/' );
		?>
		<div class="scarf-empty-state">
			<p><?php esc_html_e( 'محصولی با این فیلترها یافت نشد', 'scarf' ); ?></p>
			<a class="scarf-button scarf-button--primary" href="<?php echo esc_url( $shop_url ); ?>">
				<?php esc_html_e( 'حذف فیلترها', 'scarf' ); ?>
			</a>
		</div>
		<?php
	}
}

if ( ! function_exists( 'scarf_woocommerce_shop_page_title' ) ) {

	add_filter( 'woocommerce_page_title', 'scarf_woocommerce_shop_page_title' );

	function scarf_woocommerce_shop_page_title( $page_title ) {
		if ( is_shop() ) {
			return esc_html__( 'فروشگاه', 'scarf' );
		}
		return $page_title;
	}
}

if ( ! function_exists( 'scarf_woocommerce_breadcrumb_shop_text' ) ) {

	add_filter( 'woocommerce_breadcrumb_defaults', 'scarf_woocommerce_breadcrumb_shop_text' );

	function scarf_woocommerce_breadcrumb_shop_text( $defaults ) {
		$defaults['home'] = esc_html__( 'خانه', 'scarf' );
		return $defaults;
	}
}
