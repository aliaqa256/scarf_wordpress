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

$categories = array(
	array(
		'label' => __( 'شال', 'scarf' ),
		'class' => 'scarf-category-card--scarf',
	),
	array(
		'label' => __( 'روسری', 'scarf' ),
		'class' => 'scarf-category-card--shawl',
	),
	array(
		'label' => __( 'شال مجلسی', 'scarf' ),
		'class' => 'scarf-category-card--formal',
	),
	array(
		'label' => __( 'روسری نخی', 'scarf' ),
		'class' => 'scarf-category-card--cotton',
	),
	array(
		'label' => __( 'تخفیف‌دار', 'scarf' ),
		'class' => 'scarf-category-card--sale',
	),
);
?>

<section class="scarf-section scarf-container scarf-section--categories">
	<?php echo scarf_section_heading( __( 'دسته‌بندی‌ها', 'scarf' ), array(
		'tag' => 'h2',
	) ); ?>

	<div class="scarf-category-grid">
		<?php foreach ( $categories as $category ) : ?>
			<a class="scarf-category-card <?php echo esc_attr( $category['class'] ); ?>" href="<?php echo esc_url( $shop_url ); ?>">
				<span class="scarf-category-card__image">
					<?php echo scarf_placeholder_image( 'category', array(
						'width'  => 300,
						'height' => 300,
						'class'  => 'scarf-category-card__img',
						'label'  => $category['label'],
					) ); ?>
				</span>
				<span class="scarf-category-card__label"><?php echo esc_html( $category['label'] ); ?></span>
			</a>
		<?php endforeach; ?>
	</div>
</section>
