<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$services = array(
	array(
		'label' => __( 'ارسال سریع سفارش‌ها', 'scarf' ),
		'icon'  => '🚚',
	),
	array(
		'label' => __( 'ضمانت بازگشت کالا', 'scarf' ),
		'icon'  => '🔄',
	),
	array(
		'label' => __( 'پرداخت امن', 'scarf' ),
		'icon'  => '🔒',
	),
	array(
		'label' => __( 'پشتیبانی خرید', 'scarf' ),
		'icon'  => '💬',
	),
);
?>

<section class="scarf-section scarf-container scarf-section--services">
	<div class="scarf-services">
		<?php foreach ( $services as $service ) : ?>
			<div class="scarf-service-card">
				<span class="scarf-service-card__icon" aria-hidden="true"><?php echo esc_html( $service['icon'] ); ?></span>
				<span class="scarf-service-card__label"><?php echo esc_html( $service['label'] ); ?></span>
			</div>
		<?php endforeach; ?>
	</div>
</section>
