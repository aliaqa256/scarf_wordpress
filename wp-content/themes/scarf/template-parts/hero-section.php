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

$title       = get_theme_mod( 'scarf_hero_title', 'جدیدترین شال و روسری‌ها' );
$description = get_theme_mod( 'scarf_hero_description', 'مجموعه‌ای از بهترین و شیک‌ترین شال و روسری‌های بازار با کیفیت عالی و قیمت مناسب' );
$cta_text    = get_theme_mod( 'scarf_hero_cta_text', 'مشاهده محصولات' );
$cta_url     = get_theme_mod( 'scarf_hero_cta_url', '' );
$hero_bg     = get_theme_mod( 'scarf_hero_bg_color', '#1a1a2e' );
$hero_image  = get_theme_mod( 'scarf_hero_image', '' );

if ( empty( $cta_url ) ) {
	$cta_url = $shop_url;
}

$has_hero_image = ! empty( $hero_image );
?>
<section class="scarf-hero scarf-container">
	<div class="scarf-hero__bg<?php echo $has_hero_image ? ' scarf-hero__bg--image' : ''; ?>"<?php if ( ! $has_hero_image ) : ?> style="background-color: <?php echo esc_attr( $hero_bg ); ?>;"<?php endif; ?>>
		<?php if ( $has_hero_image ) : ?>
			<img
				class="scarf-hero__image"
				src="<?php echo esc_url( $hero_image ); ?>"
				alt="<?php echo esc_attr( $title ); ?>"
				loading="eager"
				width="1200"
				height="500"
			>
		<?php else : ?>
			<div class="scarf-hero__placeholder">
				<?php
				echo scarf_placeholder_image( 'hero', array(
					'width'  => 1200,
					'height' => 500,
					'class'  => 'scarf-hero__image',
				) );
				?>
			</div>
		<?php endif; ?>
		<div class="scarf-hero__overlay">
			<div class="scarf-hero__content">
				<h1 class="scarf-hero__title"><?php echo esc_html( $title ); ?></h1>
				<p class="scarf-hero__description"><?php echo esc_html( $description ); ?></p>
				<a class="scarf-button scarf-button--primary" href="<?php echo esc_url( $cta_url ); ?>">
					<?php echo esc_html( $cta_text ); ?>
				</a>
			</div>
		</div>
	</div>
</section>
