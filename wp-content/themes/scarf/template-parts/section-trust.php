<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$services = array(
	array(
		'label' => __( 'ارسال سریع سفارش‌ها', 'scarf' ),
		'icon'  => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>',
	),
	array(
		'label' => __( 'ضمانت بازگشت کالا', 'scarf' ),
		'icon'  => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>',
	),
	array(
		'label' => __( 'پرداخت امن', 'scarf' ),
		'icon'  => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="6" width="22" height="12" rx="2" ry="2"/><line x1="1" y1="12" x2="23" y2="12"/><line x1="7" y1="6" x2="7" y2="3"/><line x1="17" y1="6" x2="17" y2="3"/></svg>',
	),
	array(
		'label' => __( 'پشتیبانی خرید', 'scarf' ),
		'icon'  => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/><line x1="9" y1="10" x2="15" y2="10"/></svg>',
	),
);
?>

<div class="scarf-services scarf-footer__trust-inner">
	<?php foreach ( $services as $service ) : ?>
		<div class="scarf-service-card">
			<span class="scarf-service-card__icon" aria-hidden="true"><?php echo $service['icon']; ?></span>
			<span class="scarf-service-card__label"><?php echo esc_html( $service['label'] ); ?></span>
		</div>
	<?php endforeach; ?>
</div>
