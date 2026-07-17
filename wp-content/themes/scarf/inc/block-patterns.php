<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register block pattern categories.
 */
function scarf_register_pattern_categories() {
	register_block_pattern_category( 'scarf', array(
		'label' => esc_html__( 'قالب شال', 'scarf' ),
	) );
	register_block_pattern_category( 'scarf-hero', array(
		'label' => esc_html__( 'بنر هیرو', 'scarf' ),
	) );
	register_block_pattern_category( 'scarf-cta', array(
		'label' => esc_html__( 'دکمه اقدام', 'scarf' ),
	) );
}
add_action( 'init', 'scarf_register_pattern_categories' );

/**
 * Register block patterns.
 */
function scarf_register_patterns() {
	if ( ! function_exists( 'register_block_pattern' ) ) {
		return;
	}

	$hero = '<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"color":{"background":"#1a1a2e"}},"layout":{"type":"constrained"}} -->'
		. '<div class="wp-block-group has-background" style="background-color:#1a1a2e;padding:0">'
		. '<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"4rem","bottom":"4rem","left":"2rem","right":"2rem"}}}} -->'
		. '<div class="wp-block-columns are-vertically-aligned-center" style="padding:4rem 2rem">'
		. '<!-- wp:column {"verticalAlignment":"center","width":"55%"} -->'
		. '<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%">'
		. '<!-- wp:heading {"level":1,"style":{"typography":{"fontSize":"2.5rem","lineHeight":"1.2"},"spacing":{"margin":{"bottom":"1rem"}}},"textColor":"white","fontFamily":"vazirmatn"} -->'
		. '<h1 class="wp-block-heading has-white-color has-text-color has-vazirmatn-font-family" style="font-size:2.5rem;line-height:1.2;margin-bottom:1rem">'
		. esc_html__( 'جدیدترین شال و روسری‌ها', 'scarf' ) . '</h1><!-- /wp:heading -->'
		. '<!-- wp:paragraph {"style":{"typography":{"fontSize":"1.125rem","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"1.5rem"}}},"textColor":"white","fontFamily":"vazirmatn"} -->'
		. '<p class="has-white-color has-text-color has-vazirmatn-font-family" style="font-size:1.125rem;line-height:1.6;margin-bottom:1.5rem">'
		. esc_html__( 'مجموعه‌ای از بهترین و شیک‌ترین شال و روسری‌های بازار با کیفیت عالی و قیمت مناسب', 'scarf' ) . '</p><!-- /wp:paragraph -->'
		. '<!-- wp:buttons --><div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"primary","textColor":"white","style":{"typography":{"fontSize":"1rem"},"border":{"radius":"999px"}},"fontFamily":"vazirmatn"} -->'
		. '<div class="wp-block-button has-custom-font-size has-vazirmatn-font-family" style="font-size:1rem"><a class="wp-block-button__link has-white-color has-primary-background-color has-text-color has-background has-link-color wp-element-button" style="border-radius:999px">'
		. esc_html__( 'مشاهده محصولات', 'scarf' ) . '</a></div><!-- /wp:button --></div><!-- /wp:buttons -->'
		. '</div><!-- /wp:column -->'
		. '<!-- wp:column {"verticalAlignment":"center","width":"45%","style":{"spacing":{"padding":{"left":"1rem"}}}} -->'
		. '<div class="wp-block-column is-vertically-aligned-center" style="padding-left:1rem;flex-basis:45%">'
		. '<!-- wp:image {"sizeSlug":"full","style":{"border":{"radius":"1rem"}}} -->'
		. '<figure class="wp-block-image size-full has-custom-border"><img src="" alt="" style="border-radius:1rem"/></figure><!-- /wp:image -->'
		. '</div><!-- /wp:column --></div><!-- /wp:columns --></div><!-- /wp:group -->';

	register_block_pattern( 'scarf/hero-banner', array(
		'title'      => esc_html__( 'بنر هیرو', 'scarf' ),
		'categories' => array( 'scarf', 'scarf-hero' ),
		'content'    => $hero,
	) );

	$cta = '<!-- wp:group {"style":{"spacing":{"padding":{"top":"3rem","bottom":"3rem"}},"color":{"background":"#d83f5f"}},"layout":{"type":"constrained"}} -->'
		. '<div class="wp-block-group has-background" style="background-color:#d83f5f;padding:3rem">'
		. '<!-- wp:heading {"level":2,"align":"center","style":{"typography":{"fontSize":"1.75rem","lineHeight":"1.3"},"spacing":{"margin":{"bottom":"0.75rem"}}},"textColor":"white","fontFamily":"vazirmatn"} -->'
		. '<h2 class="wp-block-heading aligncenter has-white-color has-text-color has-vazirmatn-font-family" style="font-size:1.75rem;line-height:1.3;margin-bottom:0.75rem">'
		. esc_html__( 'تخفیف ویژه تا ۳۰٪', 'scarf' ) . '</h2><!-- /wp:heading -->'
		. '<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1rem","lineHeight":"1.5"},"spacing":{"margin":{"bottom":"1.5rem"}}},"textColor":"white","fontFamily":"vazirmatn"} -->'
		. '<p class="has-text-align-center has-white-color has-text-color has-vazirmatn-font-family" style="font-size:1rem;line-height:1.5;margin-bottom:1.5rem">'
		. esc_html__( 'فرصت محدود — همین الان خرید کنید', 'scarf' ) . '</p><!-- /wp:paragraph -->'
		. '<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} --><div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"white","textColor":"primary","style":{"typography":{"fontSize":"1rem"},"border":{"radius":"999px"}},"fontFamily":"vazirmatn"} -->'
		. '<div class="wp-block-button has-custom-font-size has-vazirmatn-font-family" style="font-size:1rem"><a class="wp-block-button__link has-primary-color has-white-background-color has-text-color has-background has-link-color wp-element-button" style="border-radius:999px">'
		. esc_html__( 'مشاهده محصولات تخفیف‌دار', 'scarf' ) . '</a></div><!-- /wp:button --></div><!-- /wp:buttons --></div><!-- /wp:group -->';

	register_block_pattern( 'scarf/cta-banner', array(
		'title'      => esc_html__( 'بنر اقدام', 'scarf' ),
		'categories' => array( 'scarf', 'scarf-cta' ),
		'content'    => $cta,
	) );

	$trust = '<!-- wp:group {"style":{"spacing":{"padding":{"top":"1.5rem","bottom":"1.5rem"}},"color":{"background":"#f8f9fa"},"border":{"radius":"0.75rem"}},"layout":{"type":"constrained"}} -->'
		. '<div class="wp-block-group has-background" style="background-color:#f8f9fa;border-radius:0.75rem;padding:1.5rem">'
		. '<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"1.5rem"}}}} --><div class="wp-block-columns">'
		. '<!-- wp:column --><div class="wp-block-column"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} --><div class="wp-block-group">'
		. '<!-- wp:paragraph {"style":{"typography":{"fontSize":"1.5rem"}}} --><p style="font-size:1.5rem">🚚</p><!-- /wp:paragraph -->'
		. '<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","lineHeight":"1.4"}},"fontFamily":"vazirmatn"} --><p class="has-vazirmatn-font-family" style="font-size:0.875rem;line-height:1.4">' . esc_html__( 'ارسال سریع', 'scarf' ) . '</p><!-- /wp:paragraph -->'
		. '</div><!-- /wp:group --></div><!-- /wp:column -->'
		. '<!-- wp:column --><div class="wp-block-column"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} --><div class="wp-block-group">'
		. '<!-- wp:paragraph {"style":{"typography":{"fontSize":"1.5rem"}}} --><p style="font-size:1.5rem">🛡️</p><!-- /wp:paragraph -->'
		. '<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","lineHeight":"1.4"}},"fontFamily":"vazirmatn"} --><p class="has-vazirmatn-font-family" style="font-size:0.875rem;line-height:1.4">' . esc_html__( 'ضمانت بازگشت', 'scarf' ) . '</p><!-- /wp:paragraph -->'
		. '</div><!-- /wp:group --></div><!-- /wp:column -->'
		. '<!-- wp:column --><div class="wp-block-column"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} --><div class="wp-block-group">'
		. '<!-- wp:paragraph {"style":{"typography":{"fontSize":"1.5rem"}}} --><p style="font-size:1.5rem">🔒</p><!-- /wp:paragraph -->'
		. '<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","lineHeight":"1.4"}},"fontFamily":"vazirmatn"} --><p class="has-vazirmatn-font-family" style="font-size:0.875rem;line-height:1.4">' . esc_html__( 'پرداخت امن', 'scarf' ) . '</p><!-- /wp:paragraph -->'
		. '</div><!-- /wp:group --></div><!-- /wp:column -->'
		. '<!-- wp:column --><div class="wp-block-column"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} --><div class="wp-block-group">'
		. '<!-- wp:paragraph {"style":{"typography":{"fontSize":"1.5rem"}}} --><p style="font-size:1.5rem">💬</p><!-- /wp:paragraph -->'
		. '<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","lineHeight":"1.4"}},"fontFamily":"vazirmatn"} --><p class="has-vazirmatn-font-family" style="font-size:0.875rem;line-height:1.4">' . esc_html__( 'پشتیبانی خرید', 'scarf' ) . '</p><!-- /wp:paragraph -->'
		. '</div><!-- /wp:group --></div><!-- /wp:column -->'
		. '</div><!-- /wp:columns --></div><!-- /wp:group -->';

	register_block_pattern( 'scarf/trust-badges', array(
		'title'      => esc_html__( 'نمادهای اعتماد', 'scarf' ),
		'categories' => array( 'scarf' ),
		'content'    => $trust,
	) );

	$catgrid = '<!-- wp:group {"style":{"spacing":{"padding":{"top":"2rem","bottom":"2rem"}}},"layout":{"type":"constrained"}} -->'
		. '<div class="wp-block-group" style="padding:2rem">'
		. '<!-- wp:heading {"level":2,"style":{"spacing":{"margin":{"bottom":"1.5rem"}}},"fontFamily":"vazirmatn"} --><h2 class="wp-block-heading has-vazirmatn-font-family" style="margin-bottom:1.5rem">'
		. esc_html__( 'دسته‌بندی‌ها', 'scarf' ) . '</h2><!-- /wp:heading -->'
		. '<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"1rem"}}}} --><div class="wp-block-columns">';

	$cat_labels = array( 'شال', 'روسری', 'شال مجلسی', 'روسری نخی' );
	foreach ( $cat_labels as $label ) {
		$catgrid .= '<!-- wp:column --><div class="wp-block-column"><!-- wp:group {"style":{"color":{"background":"#f1f5f9"},"spacing":{"padding":{"top":"2rem","bottom":"2rem","left":"1rem","right":"1rem"}},"border":{"radius":"0.75rem"}},"layout":{"type":"constrained"}} -->'
			. '<div class="wp-block-group has-background" style="background-color:#f1f5f9;border-radius:0.75rem;padding:2rem 1rem">'
			. '<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.125rem"}},"fontFamily":"vazirmatn"} --><h3 class="wp-block-heading has-vazirmatn-font-family" style="font-size:1.125rem">'
			. esc_html( $label ) . '</h3><!-- /wp:heading --></div><!-- /wp:group --></div><!-- /wp:column -->';
	}

	$catgrid .= '</div><!-- /wp:columns --></div><!-- /wp:group -->';

	register_block_pattern( 'scarf/category-grid', array(
		'title'      => esc_html__( 'گرید دسته‌بندی', 'scarf' ),
		'categories' => array( 'scarf' ),
		'content'    => $catgrid,
	) );

	$products = '<!-- wp:group {"style":{"spacing":{"padding":{"top":"2rem","bottom":"2rem"}}},"layout":{"type":"constrained"}} -->'
		. '<div class="wp-block-group" style="padding:2rem">'
		. '<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"margin":{"bottom":"1.5rem"}}}} --><div class="wp-block-columns are-vertically-aligned-center" style="margin-bottom:1.5rem">'
		. '<!-- wp:column {"verticalAlignment":"center","width":"70%"} --><div class="wp-block-column is-vertically-aligned-center" style="flex-basis:70%">'
		. '<!-- wp:heading {"level":2,"style":{"spacing":{"margin":{"bottom":"0"}}},"fontFamily":"vazirmatn"} --><h2 class="wp-block-heading has-vazirmatn-font-family" style="margin-bottom:0">'
		. esc_html__( 'محصولات ویژه', 'scarf' ) . '</h2><!-- /wp:heading --></div><!-- /wp:column -->'
		. '<!-- wp:column {"verticalAlignment":"center","width":"30%"} --><div class="wp-block-column is-vertically-aligned-center" style="flex-basis:30%">'
		. '<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem"}},"fontFamily":"vazirmatn"} --><p class="has-vazirmatn-font-family" style="font-size:0.875rem"><a href="#">'
		. esc_html__( 'مشاهده همه →', 'scarf' ) . '</a></p><!-- /wp:paragraph --></div><!-- /wp:column --></div><!-- /wp:columns -->'
		. '<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"1rem"}}}} --><div class="wp-block-columns">';

	for ( $i = 1; $i <= 4; $i++ ) {
		$products .= '<!-- wp:column --><div class="wp-block-column"><!-- wp:group {"style":{"color":{"background":"#f8f9fa"},"spacing":{"padding":"1rem"},"border":{"radius":"0.75rem"}},"layout":{"type":"constrained"}} -->'
			. '<div class="wp-block-group has-background" style="background-color:#f8f9fa;border-radius:0.75rem;padding:1rem">'
			. '<!-- wp:image {"sizeSlug":"medium","style":{"border":{"radius":"0.5rem"}}} --><figure class="wp-block-image size-medium has-custom-border"><img src="" alt="" style="border-radius:0.5rem"/></figure><!-- /wp:image -->'
			. '<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","lineHeight":"1.4"}},"fontFamily":"vazirmatn"} --><p class="has-vazirmatn-font-family" style="font-size:0.875rem;line-height:1.4">' . esc_html__( 'نام محصول', 'scarf' ) . '</p><!-- /wp:paragraph -->'
			. '<!-- wp:paragraph {"style":{"typography":{"fontSize":"1rem","fontWeight":"700"}},"fontFamily":"vazirmatn"} --><p class="has-vazirmatn-font-family" style="font-size:1rem;font-weight:700">۲۵۰,۰۰۰ تومان</p><!-- /wp:paragraph -->'
			. '</div><!-- /wp:group --></div><!-- /wp:column -->';
	}

	$products .= '</div><!-- /wp:columns --></div><!-- /wp:group -->';

	register_block_pattern( 'scarf/product-showcase', array(
		'title'      => esc_html__( 'گرید محصولات', 'scarf' ),
		'categories' => array( 'scarf' ),
		'content'    => $products,
	) );

	$split = '<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"2rem","bottom":"2rem"},"blockGap":{"left":"2rem"}}}} -->'
		. '<div class="wp-block-columns are-vertically-aligned-center" style="padding:2rem">'
		. '<!-- wp:column {"verticalAlignment":"center","width":"50%"} --><div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">'
		. '<!-- wp:heading {"level":2,"style":{"spacing":{"margin":{"bottom":"1rem"}}},"fontFamily":"vazirmatn"} --><h2 class="wp-block-heading has-vazirmatn-font-family" style="margin-bottom:1rem">'
		. esc_html__( 'عنوان بخش', 'scarf' ) . '</h2><!-- /wp:heading -->'
		. '<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.8"},"spacing":{"margin":{"bottom":"1.5rem"}}},"fontFamily":"vazirmatn"} --><p class="has-vazirmatn-font-family" style="line-height:1.8;margin-bottom:1.5rem">'
		. esc_html__( 'متن توضیحی خود را اینجا بنویسید.', 'scarf' ) . '</p><!-- /wp:paragraph -->'
		. '<!-- wp:buttons --><div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"primary","textColor":"white","style":{"border":{"radius":"999px"}},"fontFamily":"vazirmatn"} -->'
		. '<div class="wp-block-button has-vazirmatn-font-family"><a class="wp-block-button__link has-white-color has-primary-background-color has-text-color has-background has-link-color wp-element-button" style="border-radius:999px">'
		. esc_html__( 'بیشتر بخوانید', 'scarf' ) . '</a></div><!-- /wp:button --></div><!-- /wp:buttons --></div><!-- /wp:column -->'
		. '<!-- wp:column {"verticalAlignment":"center","width":"50%"} --><div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">'
		. '<!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":"1rem"}}} --><figure class="wp-block-image size-large has-custom-border"><img src="" alt="" style="border-radius:1rem"/></figure><!-- /wp:image -->'
		. '</div><!-- /wp:column --></div><!-- /wp:columns -->';

	register_block_pattern( 'scarf/two-column-split', array(
		'title'      => esc_html__( 'دو ستون — متن + تصویر', 'scarf' ),
		'categories' => array( 'scarf' ),
		'content'    => $split,
	) );

	$nl = '<!-- wp:group {"style":{"spacing":{"padding":{"top":"3rem","bottom":"3rem"}},"color":{"background":"#f8f9fa"},"border":{"radius":"0.75rem"}},"layout":{"type":"constrained"}} -->'
		. '<div class="wp-block-group has-background" style="background-color:#f8f9fa;border-radius:0.75rem;padding:3rem">'
		. '<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"2rem"}}}} --><div class="wp-block-columns are-vertically-aligned-center">'
		. '<!-- wp:column {"verticalAlignment":"center","width":"60%"} --><div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%">'
		. '<!-- wp:heading {"level":2,"style":{"spacing":{"margin":{"bottom":"0.5rem"}}},"fontFamily":"vazirmatn"} --><h2 class="wp-block-heading has-vazirmatn-font-family" style="margin-bottom:0.5rem">'
		. esc_html__( 'عضویت در خبرنامه', 'scarf' ) . '</h2><!-- /wp:heading -->'
		. '<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.6"}},"fontFamily":"vazirmatn"} --><p class="has-vazirmatn-font-family" style="line-height:1.6">'
		. esc_html__( 'از جدیدترین محصولات و تخفیف‌ها باخبر شوید.', 'scarf' ) . '</p><!-- /wp:paragraph --></div><!-- /wp:column -->'
		. '<!-- wp:column {"verticalAlignment":"center","width":"40%"} --><div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%">'
		. '<!-- wp:buttons --><div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"primary","textColor":"white","style":{"border":{"radius":"999px"}},"fontFamily":"vazirmatn"} -->'
		. '<div class="wp-block-button has-vazirmatn-font-family"><a class="wp-block-button__link has-white-color has-primary-background-color has-text-color has-background has-link-color wp-element-button" style="border-radius:999px">'
		. esc_html__( 'عضویت', 'scarf' ) . '</a></div><!-- /wp:button --></div><!-- /wp:buttons --></div><!-- /wp:column -->'
		. '</div><!-- /wp:columns --></div><!-- /wp:group -->';

	register_block_pattern( 'scarf/newsletter', array(
		'title'      => esc_html__( 'خبرنامه', 'scarf' ),
		'categories' => array( 'scarf' ),
		'content'    => $nl,
	) );
}
add_action( 'init', 'scarf_register_patterns' );
