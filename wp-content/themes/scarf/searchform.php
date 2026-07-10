<?php
$placeholder = esc_attr__( 'جست‌وجوی شال، روسری، رنگ یا طرح', 'scarf' );
$button_text = esc_html__( 'جست‌وجو', 'scarf' );
?>
<form role="search" method="get" class="scarf-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text"><?php echo esc_html__( 'جست‌وجو در فروشگاه', 'scarf' ); ?></label>
	<span class="scarf-search-form__field">
		<input type="search" class="scarf-search-form__input" placeholder="<?php echo $placeholder; ?>" value="<?php echo get_search_query(); ?>" name="s" />
		<button type="submit" class="scarf-search-form__submit"><?php echo $button_text; ?></button>
	</span>
	<?php if ( class_exists( 'WooCommerce' ) ) : ?>
		<input type="hidden" name="post_type" value="product" />
	<?php endif; ?>
</form>
