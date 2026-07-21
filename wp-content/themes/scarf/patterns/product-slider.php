<?php
/**
 * Title: Product Slider (Incredible Offers)
 * Slug: scarf/product-slider
 * Categories: featured
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"color":{"background":"var:preset|color|primary"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:var(--scarf-color-primary, #d83f5f);padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--40)">
    <!-- wp:heading {"textAlign":"right","style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"textColor":"white"} -->
    <h2 class="wp-block-heading has-white-color has-text-color has-text-align-right" style="font-style:normal;font-weight:700"><?php echo esc_html__( 'پیشنهاد شگفت‌انگیز', 'scarf' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:query {"queryId":1,"query":{"perPage":8,"pages":0,"offset":0,"postType":"product","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"className":"scarf-horizontal-scroll"} -->
    <div class="wp-block-query scarf-horizontal-scroll">
        <!-- wp:post-template {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
        <!-- wp:group {"style":{"spacing":{"padding":{"top":"1rem","right":"1rem","bottom":"1rem","left":"1rem"}},"border":{"radius":"10px"}},"backgroundColor":"white","className":"scarf-product-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
        <div class="wp-block-group scarf-product-card has-white-background-color has-background" style="border-radius:10px;padding-top:1rem;padding-right:1rem;padding-bottom:1rem;padding-left:1rem">
            <!-- wp:post-featured-image {"isLink":true,"aspectRatio":"1/1","style":{"border":{"radius":"8px"}}} /-->
            <!-- wp:post-title {"isLink":true,"level":3,"style":{"typography":{"fontSize":"1rem","fontWeight":"500"}}} /-->
            <!-- wp:post-excerpt {"moreText":"","showMoreOnNewLine":false,"excerptLength":10,"style":{"typography":{"fontSize":"0.875rem"}}} /-->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->
