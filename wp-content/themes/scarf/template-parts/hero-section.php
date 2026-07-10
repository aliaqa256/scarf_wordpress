<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$shop_url = home_url( '/' );
if ( class_exists( 'WooCommerce' ) && function_exists( 'wc_get_page_permalink' ) ) {
	$wc_shop_url = wc_get_page_permalink( 'shop' );
	if ( $wc_shop_url ) {
		$shop_url = $wc_shop_url;
	}
}
?>

<section class="scarf-hero scarf-container">
	<div class="scarf-hero__bg">
		<div class="scarf-hero__placeholder">
			<?php
			echo scarf_placeholder_image( 'hero', array(
				'width'  => 1200,
				'height' => 500,
				'class'  => 'scarf-hero__image',
			) );
			?>
		</div>
		<div class="scarf-hero__overlay">
			<div class="scarf-hero__content">
				<h1 class="scarf-hero__title"><?php esc_html_e( 'جدیدترین شال و روسری‌ها', 'scarf' ); ?></h1>
				<p class="scarf-hero__description"><?php esc_html_e( 'مجموعه‌ای از بهترین و شیک‌ترین شال و روسری‌های بازار با کیفیت عالی و قیمت مناسب', 'scarf' ); ?></p>
				<a class="scarf-button scarf-button--primary" href="<?php echo esc_url( $shop_url ); ?>">
					<?php esc_html_e( 'مشاهده محصولات', 'scarf' ); ?>
				</a>
			</div>
		</div>
	</div>
</section>
