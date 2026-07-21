<?php
/**
 * Title: Dynamic Categories Section
 * Slug: scarf/dynamic-categories
 * Categories: featured
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--40)">
    <!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"700"}}} -->
    <h2 class="wp-block-heading has-text-align-center" style="font-style:normal;font-weight:700"><?php echo esc_html__( 'دسته‌بندی‌های محبوب', 'scarf' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:shortcode -->
    [scarf_dynamic_categories]
    <!-- /wp:shortcode -->
</div>
<!-- /wp:group -->
