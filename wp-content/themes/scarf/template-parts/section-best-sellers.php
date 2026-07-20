<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WooCommerce' ) ) {
	return;
}

$args = array(
	'post_type'      => 'product',
	'posts_per_page' => 8,
	'no_found_rows'  => true,
	'meta_key'       => 'total_sales',
	'orderby'        => 'meta_value_num',
	'order'          => 'DESC',
);

$query = new WP_Query( $args );
?>

<section class="scarf-section scarf-container scarf-section--best-sellers">
	<?php
	$shop_url = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/' );
	echo scarf_section_heading( __( 'پرفروش‌ترین‌ها', 'scarf' ), array(
		'tag'        => 'h2',
		'link_url'   => $shop_url ? $shop_url : home_url( '/' ),
		'link_label' => __( 'مشاهده همه', 'scarf' ),
	) );
	?>

	<?php if ( $query->have_posts() ) : ?>
		<ul class="scarf-product-grid products">
			<?php
			while ( $query->have_posts() ) {
				$query->the_post();
				wc_get_template_part( 'content', 'product' );
			}
			wp_reset_postdata();
			?>
		</ul>
	<?php else : ?>
		<div class="scarf-empty-state">
			<p><?php esc_html_e( 'هنوز محصولی موجود نیست', 'scarf' ); ?></p>
			<a class="scarf-button scarf-button--primary" href="<?php echo esc_url( $shop_url ? $shop_url : home_url( '/' ) ); ?>">
				<?php esc_html_e( 'مشاهده فروشگاه', 'scarf' ); ?>
			</a>
		</div>
	<?php endif; ?>
</section>
