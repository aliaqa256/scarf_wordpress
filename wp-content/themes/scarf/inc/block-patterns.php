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
	register_block_pattern_category( 'scarf-products', array(
		'label' => esc_html__( 'محصولات', 'scarf' ),
	) );
	register_block_pattern_category( 'scarf-content', array(
		'label' => esc_html__( 'محتوا', 'scarf' ),
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

	/* =========================================================
	   Task 08 — Hero & Promo
	   ========================================================= */

	$hero_split = '<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"color":{"background":"#1a1a2e"}},"layout":{"type":"constrained"}} -->'
		. '<div class="wp-block-group has-background" style="background-color:#1a1a2e;padding:0">'
		. '<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"4rem","bottom":"4rem","left":"2rem","right":"2rem"}}}} -->'
		. '<div class="wp-block-columns are-vertically-aligned-center" style="padding:4rem 2rem">'
		. '<!-- wp:column {"verticalAlignment":"center","width":"55%"} -->'
		. '<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%">'
		. '<!-- wp:heading {"level":1,"style":{"typography":{"fontSize":"2.5rem","lineHeight":"1.2"},"spacing":{"margin":{"bottom":"1rem"}}},"textColor":"white","fontFamily":"vazirmatn"} -->'
		. '<h1 class="wp-block-heading has-white-color has-text-color has-vazirmatn-font-family" style="font-size:2.5rem;line-height:1.2;margin-bottom:1rem">'
		. esc_html__( 'جدیدترین مجموعه شال و روسری', 'scarf' ) . '</h1><!-- /wp:heading -->'
		. '<!-- wp:paragraph {"style":{"typography":{"fontSize":"1.125rem","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"1.5rem"}}},"textColor":"white","fontFamily":"vazirmatn"} -->'
		. '<p class="has-white-color has-text-color has-vazirmatn-font-family" style="font-size:1.125rem;line-height:1.6;margin-bottom:1.5rem">'
		. esc_html__( 'مجموعه‌ای بی‌نظیر از شیک‌ترین شال و روسری‌ها با طراحی اصیل و کیفیت تضمینی', 'scarf' ) . '</p><!-- /wp:paragraph -->'
		. '<!-- wp:buttons --><div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"primary","textColor":"white","style":{"typography":{"fontSize":"1rem"},"border":{"radius":"999px"}},"fontFamily":"vazirmatn"} -->'
		. '<div class="wp-block-button has-custom-font-size has-vazirmatn-font-family" style="font-size:1rem"><a class="wp-block-button__link has-white-color has-primary-background-color has-text-color has-background has-link-color wp-element-button" style="border-radius:999px">'
		. esc_html__( 'مشاهده مجموعه', 'scarf' ) . '</a></div><!-- /wp:button --></div><!-- /wp:buttons -->'
		. '</div><!-- /wp:column -->'
		. '<!-- wp:column {"verticalAlignment":"center","width":"45%","style":{"spacing":{"padding":{"left":"1rem"}}}} -->'
		. '<div class="wp-block-column is-vertically-aligned-center" style="padding-left:1rem;flex-basis:45%">'
		. '<!-- wp:image {"sizeSlug":"full","style":{"border":{"radius":"1rem"}}} --><figure class="wp-block-image size-full has-custom-border"><img src="" alt="' . esc_attr__( 'بنر هیرو فروشگاه شال و روسری', 'scarf' ) . '" style="border-radius:1rem"/></figure><!-- /wp:image -->'
		. '</div><!-- /wp:column --></div><!-- /wp:columns --></div><!-- /wp:group -->';

	register_block_pattern( 'scarf/hero-split', array(
		'title'       => esc_html__( 'بنر هیرو دو ستونه', 'scarf' ),
		'description' => esc_html__( 'بنر هیرو دو ستونه با ۵۵٪ متن و ۴۵٪ تصویر', 'scarf' ),
		'categories'  => array( 'scarf', 'scarf-hero' ),
		'content'     => $hero_split,
	) );

	$hero_full = '<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"color":{"background":"#1a1a2e"}},"layout":{"type":"constrained"}} -->'
		. '<div class="wp-block-group has-background" style="background-color:#1a1a2e;padding:0">'
		. '<!-- wp:cover {"dimRatio":50,"overlayColor":"black","minHeight":480,"minHeightUnit":"px","style":{"spacing":{"padding":{"top":"4rem","bottom":"4rem","left":"2rem","right":"2rem"}}}} -->'
		. '<div class="wp-block-cover" style="min-height:480px;padding:4rem 2rem"><span aria-hidden="true" class="wp-block-cover__background"></span><div class="wp-block-cover__inner-container">'
		. '<!-- wp:heading {"level":1,"align":"center","style":{"typography":{"fontSize":"3rem","lineHeight":"1.2"},"spacing":{"margin":{"bottom":"1rem"}}},"textColor":"white","fontFamily":"vazirmatn"} -->'
		. '<h1 class="wp-block-heading aligncenter has-white-color has-text-color has-vazirmatn-font-family" style="font-size:3rem;line-height:1.2;margin-bottom:1rem">'
		. esc_html__( 'فروش ویژه فصل', 'scarf' ) . '</h1><!-- /wp:heading -->'
		. '<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.25rem","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"2rem"}}},"textColor":"white","fontFamily":"vazirmatn"} -->'
		. '<p class="has-text-align-center has-white-color has-text-color has-vazirmatn-font-family" style="font-size:1.25rem;line-height:1.6;margin-bottom:2rem">'
		. esc_html__( 'تا ۴۰٪ تخفیف روی تمام محصولات — فرصت محدود', 'scarf' ) . '</p><!-- /wp:paragraph -->'
		. '<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} --><div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"primary","textColor":"white","style":{"typography":{"fontSize":"1rem"},"border":{"radius":"999px"}},"fontFamily":"vazirmatn"} -->'
		. '<div class="wp-block-button has-custom-font-size has-vazirmatn-font-family" style="font-size:1rem"><a class="wp-block-button__link has-white-color has-primary-background-color has-text-color has-background has-link-color wp-element-button" style="border-radius:999px">'
		. esc_html__( 'همین الان خرید کنید', 'scarf' ) . '</a></div><!-- /wp:button --></div><!-- /wp:buttons -->'
		. '</div></div><!-- /wp:cover --></div><!-- /wp:group -->';

	register_block_pattern( 'scarf/hero-fullwidth', array(
		'title'       => esc_html__( 'بنر هیرو تمام‌عرض', 'scarf' ),
		'description' => esc_html__( 'بنر هیرو تمام‌عرض با پس‌زمینه تصویر و متن مرکزی', 'scarf' ),
		'categories'  => array( 'scarf', 'scarf-hero' ),
		'content'     => $hero_full,
	) );

	$promo = '<!-- wp:group {"style":{"spacing":{"padding":{"top":"2.5rem","bottom":"2.5rem","left":"1.5rem","right":"1.5rem"}},"color":{"background":"#d83f5f"},"border":{"radius":"0.75rem"}},"layout":{"type":"constrained"}} -->'
		. '<div class="wp-block-group has-background" style="background-color:#d83f5f;border-radius:0.75rem;padding:2.5rem 1.5rem">'
		. '<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"2rem"}}}} --><div class="wp-block-columns are-vertically-aligned-center">'
		. '<!-- wp:column {"verticalAlignment":"center","width":"65%"} --><div class="wp-block-column is-vertically-aligned-center" style="flex-basis:65%">'
		. '<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"1.5rem","lineHeight":"1.3"},"spacing":{"margin":{"bottom":"0.5rem"}}},"textColor":"white","fontFamily":"vazirmatn"} -->'
		. '<h2 class="wp-block-heading has-white-color has-text-color has-vazirmatn-font-family" style="font-size:1.5rem;line-height:1.3;margin-bottom:0.5rem">'
		. esc_html__( 'تخفیف ویژه تا ۳۰٪ روی شال مجلسی', 'scarf' ) . '</h2><!-- /wp:heading -->'
		. '<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.95rem","lineHeight":"1.5"}},"textColor":"white","fontFamily":"vazirmatn"} -->'
		. '<p class="has-white-color has-text-color has-vazirmatn-font-family" style="font-size:0.95rem;line-height:1.5">'
		. esc_html__( 'فقط تا پایان هفته — از فرصت استفاده کنید', 'scarf' ) . '</p><!-- /wp:paragraph -->'
		. '</div><!-- /wp:column -->'
		. '<!-- wp:column {"verticalAlignment":"center","width":"35%"} --><div class="wp-block-column is-vertically-aligned-center" style="flex-basis:35%">'
		. '<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} --><div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"white","textColor":"primary","style":{"typography":{"fontSize":"0.95rem"},"border":{"radius":"999px"}},"fontFamily":"vazirmatn"} -->'
		. '<div class="wp-block-button has-custom-font-size has-vazirmatn-font-family" style="font-size:0.95rem"><a class="wp-block-button__link has-primary-color has-white-background-color has-text-color has-background has-link-color wp-element-button" style="border-radius:999px">'
		. esc_html__( 'مشاهده محصولات', 'scarf' ) . '</a></div><!-- /wp:button --></div><!-- /wp:buttons --></div><!-- /wp:column --></div><!-- /wp:columns --></div><!-- /wp:group -->';

	register_block_pattern( 'scarf/promo-banner', array(
		'title'       => esc_html__( 'بنر تبلیغاتی با دکمه', 'scarf' ),
		'description' => esc_html__( 'بنر تبلیغاتی با متن، توضیح و دکمه اقدام', 'scarf' ),
		'categories'  => array( 'scarf', 'scarf-hero', 'scarf-cta' ),
		'content'     => $promo,
	) );

	/* =========================================================
	   Task 09 — Products
	   ========================================================= */

	$pg3 = '<!-- wp:group {"style":{"spacing":{"padding":{"top":"2rem","bottom":"2rem"}}},"layout":{"type":"constrained"}} -->'
		. '<div class="wp-block-group" style="padding:2rem">'
		. '<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"margin":{"bottom":"1.5rem"}}}} --><div class="wp-block-columns are-vertically-aligned-center" style="margin-bottom:1.5rem">'
		. '<!-- wp:column {"verticalAlignment":"center","width":"70%"} --><div class="wp-block-column is-vertically-aligned-center" style="flex-basis:70%">'
		. '<!-- wp:heading {"level":2,"style":{"spacing":{"margin":{"bottom":"0"}}},"fontFamily":"vazirmatn"} --><h2 class="wp-block-heading has-vazirmatn-font-family" style="margin-bottom:0">'
		. esc_html__( 'جدیدترین محصولات', 'scarf' ) . '</h2><!-- /wp:heading --></div><!-- /wp:column -->'
		. '<!-- wp:column {"verticalAlignment":"center","width":"30%"} --><div class="wp-block-column is-vertically-aligned-center" style="flex-basis:30%">'
		. '<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem"}},"fontFamily":"vazirmatn"} --><p class="has-vazirmatn-font-family" style="font-size:0.875rem"><a href="#">'
		. esc_html__( 'مشاهده همه →', 'scarf' ) . '</a></p><!-- /wp:paragraph --></div><!-- /wp:column --></div><!-- /wp:columns -->'
		. '<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"1rem"}}}} --><div class="wp-block-columns">';

	for ( $i = 1; $i <= 3; $i++ ) {
		$pg3 .= '<!-- wp:column --><div class="wp-block-column"><!-- wp:group {"style":{"color":{"background":"#f8f9fa"},"spacing":{"padding":"1rem"},"border":{"radius":"0.75rem"}},"layout":{"type":"constrained"}} -->'
			. '<div class="wp-block-group has-background" style="background-color:#f8f9fa;border-radius:0.75rem;padding:1rem">'
			. '<!-- wp:image {"sizeSlug":"medium","style":{"border":{"radius":"0.5rem"}}} --><figure class="wp-block-image size-medium has-custom-border"><img src="" alt="' . esc_attr__( 'تصویر محصول', 'scarf' ) . '" style="border-radius:0.5rem"/></figure><!-- /wp:image -->'
			. '<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","lineHeight":"1.4"}},"fontFamily":"vazirmatn"} --><p class="has-vazirmatn-font-family" style="font-size:0.875rem;line-height:1.4">' . esc_html__( 'نام محصول', 'scarf' ) . '</p><!-- /wp:paragraph -->'
			. '<!-- wp:paragraph {"style":{"typography":{"fontSize":"1rem","fontWeight":"700"}},"fontFamily":"vazirmatn"} --><p class="has-vazirmatn-font-family" style="font-size:1rem;font-weight:700">۲۵۰,۰۰۰ تومان</p><!-- /wp:paragraph -->'
			. '</div><!-- /wp:group --></div><!-- /wp:column -->';
	}

	$pg3 .= '</div><!-- /wp:columns --></div><!-- /wp:group -->';

	register_block_pattern( 'scarf/product-grid-3', array(
		'title'       => esc_html__( 'گرید ۳ ستونه محصولات', 'scarf' ),
		'description' => esc_html__( 'گرید سه ستونه نمایش محصولات با عنوان و لینک مشاهده همه', 'scarf' ),
		'categories'  => array( 'scarf', 'scarf-products' ),
		'content'     => $pg3,
	) );

	$pg4 = '<!-- wp:group {"style":{"spacing":{"padding":{"top":"2rem","bottom":"2rem"}}},"layout":{"type":"constrained"}} -->'
		. '<div class="wp-block-group" style="padding:2rem">'
		. '<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"margin":{"bottom":"1.5rem"}}}} --><div class="wp-block-columns are-vertically-aligned-center" style="margin-bottom:1.5rem">'
		. '<!-- wp:column {"verticalAlignment":"center","width":"70%"} --><div class="wp-block-column is-vertically-aligned-center" style="flex-basis:70%">'
		. '<!-- wp:heading {"level":2,"style":{"spacing":{"margin":{"bottom":"0"}}},"fontFamily":"vazirmatn"} --><h2 class="wp-block-heading has-vazirmatn-font-family" style="margin-bottom:0">'
		. esc_html__( 'محصولات پرفروش', 'scarf' ) . '</h2><!-- /wp:heading --></div><!-- /wp:column -->'
		. '<!-- wp:column {"verticalAlignment":"center","width":"30%"} --><div class="wp-block-column is-vertically-aligned-center" style="flex-basis:30%">'
		. '<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem"}},"fontFamily":"vazirmatn"} --><p class="has-vazirmatn-font-family" style="font-size:0.875rem"><a href="#">'
		. esc_html__( 'مشاهده همه →', 'scarf' ) . '</a></p><!-- /wp:paragraph --></div><!-- /wp:column --></div><!-- /wp:columns -->'
		. '<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"1rem"}}}} --><div class="wp-block-columns">';

	for ( $i = 1; $i <= 4; $i++ ) {
		$pg4 .= '<!-- wp:column --><div class="wp-block-column"><!-- wp:group {"style":{"color":{"background":"#f8f9fa"},"spacing":{"padding":"1rem"},"border":{"radius":"0.75rem"}},"layout":{"type":"constrained"}} -->'
			. '<div class="wp-block-group has-background" style="background-color:#f8f9fa;border-radius:0.75rem;padding:1rem">'
			. '<!-- wp:image {"sizeSlug":"medium","style":{"border":{"radius":"0.5rem"}}} --><figure class="wp-block-image size-medium has-custom-border"><img src="" alt="' . esc_attr__( 'تصویر محصول', 'scarf' ) . '" style="border-radius:0.5rem"/></figure><!-- /wp:image -->'
			. '<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","lineHeight":"1.4"}},"fontFamily":"vazirmatn"} --><p class="has-vazirmatn-font-family" style="font-size:0.875rem;line-height:1.4">' . esc_html__( 'نام محصول', 'scarf' ) . '</p><!-- /wp:paragraph -->'
			. '<!-- wp:paragraph {"style":{"typography":{"fontSize":"1rem","fontWeight":"700"}},"fontFamily":"vazirmatn"} --><p class="has-vazirmatn-font-family" style="font-size:1rem;font-weight:700">۱۸۵,۰۰۰ تومان</p><!-- /wp:paragraph -->'
			. '</div><!-- /wp:group --></div><!-- /wp:column -->';
	}

	$pg4 .= '</div><!-- /wp:columns --></div><!-- /wp:group -->';

	register_block_pattern( 'scarf/product-grid-4', array(
		'title'       => esc_html__( 'گرید ۴ ستونه محصولات', 'scarf' ),
		'description' => esc_html__( 'گرید چهار ستونه نمایش محصولات', 'scarf' ),
		'categories'  => array( 'scarf', 'scarf-products' ),
		'content'     => $pg4,
	) );

	$pfeat = '<!-- wp:group {"style":{"spacing":{"padding":{"top":"2rem","bottom":"2rem"}}},"layout":{"type":"constrained"}} -->'
		. '<div class="wp-block-group" style="padding:2rem">'
		. '<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"margin":{"bottom":"1.5rem"}}}} --><div class="wp-block-columns are-vertically-aligned-center" style="margin-bottom:1.5rem">'
		. '<!-- wp:column {"verticalAlignment":"center","width":"70%"} --><div class="wp-block-column is-vertically-aligned-center" style="flex-basis:70%">'
		. '<!-- wp:heading {"level":2,"style":{"spacing":{"margin":{"bottom":"0"}}},"fontFamily":"vazirmatn"} --><h2 class="wp-block-heading has-vazirmatn-font-family" style="margin-bottom:0">'
		. esc_html__( 'محصولات ویژه', 'scarf' ) . '</h2><!-- /wp:heading --></div><!-- /wp:column -->'
		. '<!-- wp:column {"verticalAlignment":"center","width":"30%"} --><div class="wp-block-column is-vertically-aligned-center" style="flex-basis:30%">'
		. '<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem"}},"fontFamily":"vazirmatn"} --><p class="has-vazirmatn-font-family" style="font-size:0.875rem"><a href="#">'
		. esc_html__( 'مشاهده همه →', 'scarf' ) . '</a></p><!-- /wp:paragraph --></div><!-- /wp:column --></div><!-- /wp:columns -->'
		. '<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"1.5rem"}}}} --><div class="wp-block-columns">';

	for ( $i = 1; $i <= 3; $i++ ) {
		$pfeat .= '<!-- wp:column --><div class="wp-block-column"><!-- wp:group {"style":{"color":{"background":"#f8f9fa"},"spacing":{"padding":"1.25rem"},"border":{"radius":"0.75rem"}},"layout":{"type":"constrained"}} -->'
			. '<div class="wp-block-group has-background" style="background-color:#f8f9fa;border-radius:0.75rem;padding:1.25rem">'
			. '<!-- wp:image {"sizeSlug":"medium","style":{"border":{"radius":"0.5rem"}}} --><figure class="wp-block-image size-medium has-custom-border"><img src="" alt="' . esc_attr__( 'تصویر محصول ویژه', 'scarf' ) . '" style="border-radius:0.5rem"/></figure><!-- /wp:image -->'
			. '<!-- wp:group {"style":{"spacing":{"margin":{"top":"0.75rem","bottom":"0.5rem"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} --><div class="wp-block-group" style="margin-top:0.75rem;margin-bottom:0.5rem">'
			. '<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.75rem"},"color":{"background":"#d83f5f","text":"white"},"border":{"radius":"4px"}},"fontFamily":"vazirmatn"} --><p class="has-vazirmatn-font-family" style="background-color:#d83f5f;color:white;font-size:0.75rem;border-radius:4px;padding:0.2rem 0.5rem">'
			. esc_html__( 'ویژه', 'scarf' ) . '</p><!-- /wp:paragraph -->'
			. '</div><!-- /wp:group -->'
			. '<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","lineHeight":"1.4"}},"fontFamily":"vazirmatn"} --><p class="has-vazirmatn-font-family" style="font-size:0.875rem;line-height:1.4">' . esc_html__( 'نام محصول', 'scarf' ) . '</p><!-- /wp:paragraph -->'
			. '<!-- wp:paragraph {"style":{"typography":{"fontSize":"1.125rem","fontWeight":"700"}},"fontFamily":"vazirmatn"} --><p class="has-vazirmatn-font-family" style="font-size:1.125rem;font-weight:700">۳۲۰,۰۰۰ تومان</p><!-- /wp:paragraph -->'
			. '</div><!-- /wp:group --></div><!-- /wp:column -->';
	}

	$pfeat .= '</div><!-- /wp:columns --></div><!-- /wp:group -->';

	register_block_pattern( 'scarf/product-featured', array(
		'title'       => esc_html__( 'محصولات ویژه', 'scarf' ),
		'description' => esc_html__( 'سه محصول ویژه با نشان و قیمت برجسته', 'scarf' ),
		'categories'  => array( 'scarf', 'scarf-products' ),
		'content'     => $pfeat,
	) );

	/* =========================================================
	   Task 10 — Category / CTA / About
	   ========================================================= */

	$cs = '<!-- wp:group {"style":{"spacing":{"padding":{"top":"2.5rem","bottom":"2.5rem"}}},"layout":{"type":"constrained"}} -->'
		. '<div class="wp-block-group" style="padding:2.5rem">'
		. '<!-- wp:heading {"level":2,"align":"center","style":{"spacing":{"margin":{"bottom":"0.5rem"}}},"fontFamily":"vazirmatn"} -->'
		. '<h2 class="wp-block-heading aligncenter has-vazirmatn-font-family" style="margin-bottom:0.5rem">'
		. esc_html__( 'دسته‌بندی‌های محبوب', 'scarf' ) . '</h2><!-- /wp:heading -->'
		. '<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.95rem","lineHeight":"1.5"},"spacing":{"margin":{"bottom":"2rem"}}},"fontFamily":"vazirmatn"} -->'
		. '<p class="has-text-align-center has-vazirmatn-font-family" style="font-size:0.95rem;line-height:1.5;margin-bottom:2rem">'
		. esc_html__( 'دسته‌بندی مورد علاقه خود را پیدا کنید', 'scarf' ) . '</p><!-- /wp:paragraph -->'
		. '<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"1rem"}}}} --><div class="wp-block-columns">';

	$cs_cats = array(
		array( 'name' => 'شال', 'icon' => '🧣' ),
		array( 'name' => 'روسری', 'icon' => 'scarf' ),
		array( 'name' => 'شال مجلسی', 'icon' => '✨' ),
		array( 'name' => 'روسری نخی', 'icon' => '🌿' ),
	);

	foreach ( $cs_cats as $cat ) {
		$cs .= '<!-- wp:column --><div class="wp-block-column"><!-- wp:group {"style":{"color":{"background":"#f1f5f9"},"spacing":{"padding":{"top":"2rem","bottom":"2rem","left":"1rem","right":"1rem"}},"border":{"radius":"0.75rem"}},"layout":{"type":"constrained"}} -->'
			. '<div class="wp-block-group has-background" style="background-color:#f1f5f9;border-radius:0.75rem;padding:2rem 1rem;text-align:center">'
			. '<!-- wp:paragraph {"style":{"typography":{"fontSize":"2rem"}},"align":"center"} --><p style="font-size:2rem;text-align:center">' . esc_html( $cat['icon'] ) . '</p><!-- /wp:paragraph -->'
			. '<!-- wp:heading {"level":3,"align":"center","style":{"typography":{"fontSize":"1rem"},"spacing":{"margin":{"bottom":"0"}}},"fontFamily":"vazirmatn"} --><h3 class="wp-block-heading aligncenter has-vazirmatn-font-family" style="font-size:1rem;margin-bottom:0;text-align:center">'
			. esc_html( $cat['name'] ) . '</h3><!-- /wp:heading --></div><!-- /wp:group --></div><!-- /wp:column -->';
	}

	$cs .= '</div><!-- /wp:columns --></div><!-- /wp:group -->';

	register_block_pattern( 'scarf/category-showcase', array(
		'title'       => esc_html__( 'نمایش دسته‌بندی‌ها', 'scarf' ),
		'description' => esc_html__( 'نمایش دسته‌بندی‌ها با آیکون و عنوان', 'scarf' ),
		'categories'  => array( 'scarf', 'scarf-content' ),
		'content'     => $cs,
	) );

	$cta_c = '<!-- wp:group {"style":{"spacing":{"padding":{"top":"3rem","bottom":"3rem"}},"color":{"background":"#d83f5f"}},"layout":{"type":"constrained"}} -->'
		. '<div class="wp-block-group has-background" style="background-color:#d83f5f;padding:3rem">'
		. '<!-- wp:heading {"level":2,"align":"center","style":{"typography":{"fontSize":"1.75rem","lineHeight":"1.3"},"spacing":{"margin":{"bottom":"0.75rem"}}},"textColor":"white","fontFamily":"vazirmatn"} -->'
		. '<h2 class="wp-block-heading aligncenter has-white-color has-text-color has-vazirmatn-font-family" style="font-size:1.75rem;line-height:1.3;margin-bottom:0.75rem">'
		. esc_html__( 'آماده خرید هستید؟', 'scarf' ) . '</h2><!-- /wp:heading -->'
		. '<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1rem","lineHeight":"1.5"},"spacing":{"margin":{"bottom":"1.5rem"}}},"textColor":"white","fontFamily":"vazirmatn"} -->'
		. '<p class="has-text-align-center has-white-color has-text-color has-vazirmatn-font-family" style="font-size:1rem;line-height:1.5;margin-bottom:1.5rem">'
		. esc_html__( 'همین الان مجموعه ما را کاوش کنید و بهترین انتخاب را داشته باشید', 'scarf' ) . '</p><!-- /wp:paragraph -->'
		. '<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} --><div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"white","textColor":"primary","style":{"typography":{"fontSize":"1rem"},"border":{"radius":"999px"}},"fontFamily":"vazirmatn"} -->'
		. '<div class="wp-block-button has-custom-font-size has-vazirmatn-font-family" style="font-size:1rem"><a class="wp-block-button__link has-primary-color has-white-background-color has-text-color has-background has-link-color wp-element-button" style="border-radius:999px">'
		. esc_html__( 'مشاهده فروشگاه', 'scarf' ) . '</a></div><!-- /wp:button --></div><!-- /wp:buttons --></div><!-- /wp:group -->';

	register_block_pattern( 'scarf/cta-centered', array(
		'title'       => esc_html__( 'بنر اقدام مرکزی', 'scarf' ),
		'description' => esc_html__( 'بنر اقدام با متن مرکزی و دکمه', 'scarf' ),
		'categories'  => array( 'scarf', 'scarf-cta' ),
		'content'     => $cta_c,
	) );

	$about = '<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"2.5rem","bottom":"2.5rem"},"blockGap":{"left":"2.5rem"}}}} -->'
		. '<div class="wp-block-columns are-vertically-aligned-center" style="padding:2.5rem">'
		. '<!-- wp:column {"verticalAlignment":"center","width":"45%"} --><div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%">'
		. '<!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":"1rem"}}} --><figure class="wp-block-image size-large has-custom-border"><img src="" alt="' . esc_attr__( 'درباره فروشگاه شال و روسری', 'scarf' ) . '" style="border-radius:1rem"/></figure><!-- /wp:image -->'
		. '</div><!-- /wp:column -->'
		. '<!-- wp:column {"verticalAlignment":"center","width":"55%"} --><div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%">'
		. '<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","fontWeight":"600"},"color":{"text":"#d83f5f"}},"fontFamily":"vazirmatn"} -->'
		. '<p class="has-d83f5f-color has-text-color has-vazirmatn-font-family" style="font-size:0.875rem;font-weight:600">'
		. esc_html__( 'درباره ما', 'scarf' ) . '</p><!-- /wp:paragraph -->'
		. '<!-- wp:heading {"level":2,"style":{"spacing":{"margin":{"bottom":"1rem"}}},"fontFamily":"vazirmatn"} -->'
		. '<h2 class="wp-block-heading has-vazirmatn-font-family" style="margin-bottom:1rem">'
		. esc_html__( 'فروشگاه تخصصی شال و روسری', 'scarf' ) . '</h2><!-- /wp:heading -->'
		. '<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.8"},"spacing":{"margin":{"bottom":"1.5rem"}}},"fontFamily":"vazirmatn"} -->'
		. '<p class="has-vazirmatn-font-family" style="line-height:1.8;margin-bottom:1.5rem">'
		. esc_html__( 'ما با بیش از ده سال تجربه در ارائه بهترین شال و روسری‌ها، همواره کیفیت و اصالت را تضمین می‌کنیم. مجموعه ما با دقت و وسواس از بهترین برندها انتخاب شده است.', 'scarf' ) . '</p><!-- /wp:paragraph -->'
		. '<!-- wp:buttons --><div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"primary","textColor":"white","style":{"border":{"radius":"999px"}},"fontFamily":"vazirmatn"} -->'
		. '<div class="wp-block-button has-vazirmatn-font-family"><a class="wp-block-button__link has-white-color has-primary-background-color has-text-color has-background has-link-color wp-element-button" style="border-radius:999px">'
		. esc_html__( 'بیشتر درباره ما', 'scarf' ) . '</a></div><!-- /wp:button --></div><!-- /wp:buttons --></div><!-- /wp:column --></div><!-- /wp:columns -->';

	register_block_pattern( 'scarf/about-section', array(
		'title'       => esc_html__( 'درباره ما', 'scarf' ),
		'description' => esc_html__( 'بخش درباره ما با تصویر و متن معرفی', 'scarf' ),
		'categories'  => array( 'scarf', 'scarf-content' ),
		'content'     => $about,
	) );

	/* =========================================================
	   Task 11 — Testimonials / FAQ
	   ========================================================= */

	$test = '<!-- wp:group {"style":{"spacing":{"padding":{"top":"2.5rem","bottom":"2.5rem"}}},"layout":{"type":"constrained"}} -->'
		. '<div class="wp-block-group" style="padding:2.5rem">'
		. '<!-- wp:heading {"level":2,"align":"center","style":{"spacing":{"margin":{"bottom":"0.5rem"}}},"fontFamily":"vazirmatn"} -->'
		. '<h2 class="wp-block-heading aligncenter has-vazirmatn-font-family" style="margin-bottom:0.5rem">'
		. esc_html__( 'نظرات مشتریان ما', 'scarf' ) . '</h2><!-- /wp:heading -->'
		. '<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.95rem","lineHeight":"1.5"},"spacing":{"margin":{"bottom":"2rem"}}},"fontFamily":"vazirmatn"} -->'
		. '<p class="has-text-align-center has-vazirmatn-font-family" style="font-size:0.95rem;line-height:1.5;margin-bottom:2rem">'
		. esc_html__( 'مشتریان ما چه می‌گویند', 'scarf' ) . '</p><!-- /wp:paragraph -->'
		. '<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"1.5rem"}}}} --><div class="wp-block-columns">';

	$test_items = array(
		array( 'name' => 'سارا ر.', 'text' => 'کیفیت شال‌ها عالی بود و ارسال خیلی سریع انجام شد. حتماً دوباره خرید می‌کنم.' ),
		array( 'name' => 'مریم ح.', 'text' => 'طرح‌های خیلی شیک و متنوع بود. از خریدم کاملاً راضی هستم.' ),
		array( 'name' => 'زهرا ک.', 'text' => 'قیمت‌ها مناسب و کیفیت بالاست. بهترین فروشگاه آنلاین شال و روسری.' ),
	);

	foreach ( $test_items as $item ) {
		$test .= '<!-- wp:column --><div class="wp-block-column"><!-- wp:group {"style":{"color":{"background":"#f8f9fa"},"spacing":{"padding":"1.5rem"},"border":{"radius":"0.75rem"}},"layout":{"type":"constrained"}} -->'
			. '<div class="wp-block-group has-background" style="background-color:#f8f9fa;border-radius:0.75rem;padding:1.5rem">'
			. '<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.95rem","lineHeight":"1.7"}},"fontFamily":"vazirmatn"} -->'
			. '<p class="has-vazirmatn-font-family" style="font-size:0.95rem;line-height:1.7">'
			. '⭐⭐⭐⭐⭐</p><!-- /wp:paragraph -->'
			. '<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.95rem","lineHeight":"1.7"}},"fontFamily":"vazirmatn"} -->'
			. '<p class="has-vazirmatn-font-family" style="font-size:0.95rem;line-height:1.7">'
			. esc_html__( '"' . $item['text'] . '"', 'scarf' ) . '</p><!-- /wp:paragraph -->'
			. '<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","fontWeight":"600"}},"fontFamily":"vazirmatn"} -->'
			. '<p class="has-vazirmatn-font-family" style="font-size:0.875rem;font-weight:600">'
			. esc_html__( '— ' . $item['name'], 'scarf' ) . '</p><!-- /wp:paragraph -->'
			. '</div><!-- /wp:group --></div><!-- /wp:column -->';
	}

	$test .= '</div><!-- /wp:columns --></div><!-- /wp:group -->';

	register_block_pattern( 'scarf/testimonials', array(
		'title'       => esc_html__( 'نظرات مشتریان', 'scarf' ),
		'description' => esc_html__( 'بخش نظرات و بازخوردهای مشتریان', 'scarf' ),
		'categories'  => array( 'scarf', 'scarf-content' ),
		'content'     => $test,
	) );

	$faq = '<!-- wp:group {"style":{"spacing":{"padding":{"top":"2.5rem","bottom":"2.5rem"}}},"layout":{"type":"constrained"}} -->'
		. '<div class="wp-block-group" style="padding:2.5rem">'
		. '<!-- wp:heading {"level":2,"align":"center","style":{"spacing":{"margin":{"bottom":"0.5rem"}}},"fontFamily":"vazirmatn"} -->'
		. '<h2 class="wp-block-heading aligncenter has-vazirmatn-font-family" style="margin-bottom:0.5rem">'
		. esc_html__( 'سوالات متداول', 'scarf' ) . '</h2><!-- /wp:heading -->'
		. '<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.95rem","lineHeight":"1.5"},"spacing":{"margin":{"bottom":"2rem"}}},"fontFamily":"vazirmatn"} -->'
		. '<p class="has-text-align-center has-vazirmatn-font-family" style="font-size:0.95rem;line-height:1.5;margin-bottom:2rem">'
		. esc_html__( 'پاسخ سوالات پرتکرار شما', 'scarf' ) . '</p><!-- /wp:paragraph -->';

	$faq_items = array(
		array( 'q' => 'زمان ارسال سفارش چقدر است؟', 'a' => 'ارسال سفارشات در تهران ۱ تا ۲ روز کاری و در سایر شهرها ۳ تا ۵ روز کاری است.' ),
		array( 'q' => 'آیت امکان بازگشت کالا وجود دارد؟', 'a' => 'بله، تا ۷ روز پس از دریافت سفارش امکان بازگشت با شرایط ذکر شده وجود دارد.' ),
		array( 'q' => 'روش‌های پرداخت چیست؟', 'a' => 'پرداخت آنلاین، کارت به کارت و پرداخت درب منزل برای سفارشات تهران امکان‌پذیر است.' ),
	);

	foreach ( $faq_items as $item ) {
		$faq .= '<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"0.75rem"}},"border":{"radius":"0.5rem"}},"layout":{"type":"constrained"}} -->'
			. '<div class="wp-block-group" style="border-radius:0.5rem;margin-bottom:0.75rem">'
			. '<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1rem"},"border":{"bottom":{"color":"#e2e8f0","width":"1px"}},"spacing":{"padding":{"bottom":"0.75rem","top":"0.75rem","left":"1rem","right":"1rem"}}},"fontFamily":"vazirmatn"} -->'
			. '<h3 class="wp-block-heading has-vazirmatn-font-family" style="font-size:1rem;border-bottom:1px solid #e2e8f0;padding:0.75rem 1rem">'
			. esc_html( $item['q'] ) . '</h3><!-- /wp:heading -->'
			. '<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.95rem","lineHeight":"1.7"},"spacing":{"padding":{"top":"0.75rem","bottom":"0.75rem","left":"1rem","right":"1rem"}}},"fontFamily":"vazirmatn"} -->'
			. '<p class="has-vazirmatn-font-family" style="font-size:0.95rem;line-height:1.7;padding:0.75rem 1rem">'
			. esc_html( $item['a'] ) . '</p><!-- /wp:paragraph -->'
			. '</div><!-- /wp:group -->';
	}

	$faq .= '</div><!-- /wp:group -->';

	register_block_pattern( 'scarf/faq-section', array(
		'title'       => esc_html__( 'سوالات متداول', 'scarf' ),
		'description' => esc_html__( 'بخش سوالات متداول با پاسخ‌ها', 'scarf' ),
		'categories'  => array( 'scarf', 'scarf-content' ),
		'content'     => $faq,
	) );

	/* =========================================================
	   Task 12 — Sale / Countdown
	   ========================================================= */

	$sale = '<!-- wp:group {"style":{"spacing":{"padding":{"top":"2.5rem","bottom":"2.5rem"}},"color":{"background":"#1a1a2e"}},"layout":{"type":"constrained"}} -->'
		. '<div class="wp-block-group has-background" style="background-color:#1a1a2e;padding:2.5rem">'
		. '<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"2rem"}}}} --><div class="wp-block-columns are-vertically-aligned-center">'
		. '<!-- wp:column {"verticalAlignment":"center","width":"55%"} --><div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%">'
		. '<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"1rem"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} --><div class="wp-block-group" style="margin-bottom:1rem">'
		. '<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.75rem","fontWeight":"700"},"color":{"background":"#d83f5f","text":"white"},"border":{"radius":"4px"}},"fontFamily":"vazirmatn"} -->'
		. '<p class="has-vazirmatn-font-family" style="background-color:#d83f5f;color:white;font-size:0.75rem;font-weight:700;border-radius:4px;padding:0.25rem 0.75rem">'
		. esc_html__( 'فروش ویژه', 'scarf' ) . '</p><!-- /wp:paragraph -->'
		. '</div><!-- /wp:group -->'
		. '<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"2rem","lineHeight":"1.3"},"spacing":{"margin":{"bottom":"0.75rem"}}},"textColor":"white","fontFamily":"vazirmatn"} -->'
		. '<h2 class="wp-block-heading has-white-color has-text-color has-vazirmatn-font-family" style="font-size:2rem;line-height:1.3;margin-bottom:0.75rem">'
		. esc_html__( 'تخفیف‌های باورنکردنی روی شال و روسری', 'scarf' ) . '</h2><!-- /wp:heading -->'
		. '<!-- wp:paragraph {"style":{"typography":{"fontSize":"1rem","lineHeight":"1.6"}},"textColor":"white","fontFamily":"vazirmatn"} -->'
		. '<p class="has-white-color has-text-color has-vazirmatn-font-family" style="font-size:1rem;line-height:1.6">'
		. esc_html__( ' فرصت محدود است — تا ۵۰٪ تخفیف روی مجموعه انتخابی', 'scarf' ) . '</p><!-- /wp:paragraph -->'
		. '</div><!-- /wp:column -->'
		. '<!-- wp:column {"verticalAlignment":"center","width":"45%"} --><div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%">'
		. '<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} --><div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"primary","textColor":"white","style":{"typography":{"fontSize":"1rem"},"border":{"radius":"999px"}},"fontFamily":"vazirmatn"} -->'
		. '<div class="wp-block-button has-custom-font-size has-vazirmatn-font-family" style="font-size:1rem"><a class="wp-block-button__link has-white-color has-primary-background-color has-text-color has-background has-link-color wp-element-button" style="border-radius:999px">'
		. esc_html__( 'مشاهده محصولات تخفیف‌دار', 'scarf' ) . '</a></div><!-- /wp:button --></div><!-- /wp:buttons --></div><!-- /wp:column --></div><!-- /wp:columns --></div><!-- /wp:group -->';

	register_block_pattern( 'scarf/sale-banner', array(
		'title'       => esc_html__( 'بنر فروش ویژه', 'scarf' ),
		'description' => esc_html__( 'بنر فروش ویژه با برچسب، عنوان و دکمه', 'scarf' ),
		'categories'  => array( 'scarf', 'scarf-hero', 'scarf-cta' ),
		'content'     => $sale,
	) );

	$countdown = '<!-- wp:group {"style":{"spacing":{"padding":{"top":"2.5rem","bottom":"2.5rem"}},"color":{"background":"#d83f5f"}},"layout":{"type":"constrained"}} -->'
		. '<div class="wp-block-group has-background" style="background-color:#d83f5f;padding:2.5rem">'
		. '<!-- wp:heading {"level":2,"align":"center","style":{"typography":{"fontSize":"1.75rem","lineHeight":"1.3"},"spacing":{"margin":{"bottom":"0.5rem"}}},"textColor":"white","fontFamily":"vazirmatn"} -->'
		. '<h2 class="wp-block-heading aligncenter has-white-color has-text-color has-vazirmatn-font-family" style="font-size:1.75rem;line-height:1.3;margin-bottom:0.5rem">'
		. esc_html__( 'شمارنده فروش ویژه', 'scarf' ) . '</h2><!-- /wp:heading -->'
		. '<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1rem","lineHeight":"1.5"},"spacing":{"margin":{"bottom":"1.5rem"}}},"textColor":"white","fontFamily":"vazirmatn"} -->'
		. '<p class="has-text-align-center has-white-color has-text-color has-vazirmatn-font-family" style="font-size:1rem;line-height:1.5;margin-bottom:1.5rem">'
		. esc_html__( 'فرصت خرید با تخفیف ویژه رو به پایان است!', 'scarf' ) . '</p><!-- /wp:paragraph -->'
		. '<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"1rem"}}}} --><div class="wp-block-columns">';

	$count_units = array(
		array( 'label' => 'روز', 'value' => '۰۳' ),
		array( 'label' => 'ساعت', 'value' => '۱۲' ),
		array( 'label' => 'دقیقه', 'value' => '۴۵' ),
		array( 'label' => 'ثانیه', 'value' => '۲۰' ),
	);

	foreach ( $count_units as $unit ) {
		$countdown .= '<!-- wp:column --><div class="wp-block-column"><!-- wp:group {"style":{"color":{"background":"#ffffff22"},"spacing":{"padding":{"top":"1rem","bottom":"1rem","left":"0.5rem","right":"0.5rem"}},"border":{"radius":"0.5rem"}},"layout":{"type":"constrained"}} -->'
			. '<div class="wp-block-group has-background" style="background-color:rgba(255,255,255,0.13);border-radius:0.5rem;padding:1rem 0.5rem;text-align:center">'
			. '<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"2rem","fontWeight":"700"}},"textColor":"white","fontFamily":"vazirmatn"} -->'
			. '<p class="has-text-align-center has-white-color has-text-color has-vazirmatn-font-family" style="font-size:2rem;font-weight:700">'
			. esc_html( $unit['value'] ) . '</p><!-- /wp:paragraph -->'
			. '<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.75rem"}},"textColor":"white","fontFamily":"vazirmatn"} -->'
			. '<p class="has-text-align-center has-white-color has-text-color has-vazirmatn-font-family" style="font-size:0.75rem">'
			. esc_html( $unit['label'] ) . '</p><!-- /wp:paragraph -->'
			. '</div><!-- /wp:group --></div><!-- /wp:column -->';
	}

	$countdown .= '</div><!-- /wp:columns -->'
		. '<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"1.5rem"}}}} --><div class="wp-block-buttons" style="margin-top:1.5rem"><!-- wp:button {"backgroundColor":"white","textColor":"primary","style":{"typography":{"fontSize":"1rem"},"border":{"radius":"999px"}},"fontFamily":"vazirmatn"} -->'
		. '<div class="wp-block-button has-custom-font-size has-vazirmatn-font-family" style="font-size:1rem"><a class="wp-block-button__link has-primary-color has-white-background-color has-text-color has-background has-link-color wp-element-button" style="border-radius:999px">'
		. esc_html__( 'همین الان خرید کنید', 'scarf' ) . '</a></div><!-- /wp:button --></div><!-- /wp:buttons -->'
		. '</div><!-- /wp:group -->';

	register_block_pattern( 'scarf/countdown-promo', array(
		'title'       => esc_html__( 'شمارنده فروش ویژه', 'scarf' ),
		'description' => esc_html__( 'بنر فروش ویژه با شمارنده معکوس', 'scarf' ),
		'categories'  => array( 'scarf', 'scarf-hero', 'scarf-cta' ),
		'content'     => $countdown,
	) );
}
add_action( 'init', 'scarf_register_patterns' );
