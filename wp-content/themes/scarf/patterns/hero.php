<?php
/**
 * Title: Hero Section
 * Slug: scarf/hero
 * Categories: scarf
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"color":{"background":"var:preset|color|primary-soft"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:var(--scarf-color-primary-soft, #fff1f4);padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--40)">
    <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"2rem","left":"2rem"}}}} -->
    <div class="wp-block-columns alignwide">
        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center">
            <!-- wp:heading {"level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}}} -->
            <h1 class="wp-block-heading" style="font-style:normal;font-weight:700"><?php echo esc_html__( 'کالکشن جدید شال و روسری', 'scarf' ); ?></h1>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"typography":{"fontSize":"1.125rem"}}} -->
            <p style="font-size:1.125rem"><?php echo esc_html__( 'زیباترین شال‌ها و روسری‌ها برای استایل شما. همین حالا خرید کنید.', 'scarf' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons -->
            <div class="wp-block-buttons">
                <!-- wp:button {"style":{"color":{"background":"var:preset|color|primary"}}} -->
                <div class="wp-block-button"><a class="wp-block-button__link has-background wp-element-button" style="background-color:var(--scarf-color-primary, #d83f5f)"><?php echo esc_html__( 'مشاهده محصولات', 'scarf' ); ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center">
            <!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
            <figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/hero-placeholder.png' ); ?>" alt="<?php echo esc_attr__( 'تصویر کمپین شال و روسری', 'scarf' ); ?>"/></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->
