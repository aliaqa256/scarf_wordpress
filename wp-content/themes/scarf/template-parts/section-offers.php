<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WooCommerce' ) ) {
	return;
}

$args = array(
	'post_type'      => 'product',
	'posts_per_page' => 4,
	'no_found_rows'  => true,
	'meta_query'     => array(
		'relation' => 'AND',
		array(
			'key'     => '_sale_price',
			'value'   => 0,
			'compare' => '>',
			'type'    => 'NUMERIC',
		),
	),
);

$query = new WP_Query( $args );

if ( ! $query->have_posts() ) {
	return;
}
?>

<section class="scarf-section scarf-container scarf-section--offers">
	<?php
	$shop_url = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/' );
	echo scarf_section_heading( __( 'پیشنهاد ویژه', 'scarf' ), array(
		'tag'        => 'h2',
		'link_url'   => $shop_url ? $shop_url : home_url( '/' ),
		'link_label' => __( 'مشاهده همه', 'scarf' ),
	) );
	?>

	<ul class="scarf-product-grid products">
		<?php
		while ( $query->have_posts() ) {
			$query->the_post();
			wc_get_template_part( 'content', 'product' );
		}
		wp_reset_postdata();
		?>
	</ul>
</section>
