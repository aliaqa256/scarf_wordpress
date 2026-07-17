<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$instagram = get_theme_mod( 'scarf_instagram', '#' );
$telegram  = get_theme_mod( 'scarf_telegram', '#' );
$whatsapp  = get_theme_mod( 'scarf_whatsapp', '#' );

$phone   = get_theme_mod( 'scarf_phone', '۰۲۱-۱۲۳۴۵۶۷۸' );
$email   = get_theme_mod( 'scarf_email', 'info@scarfstore.ir' );
$address = get_theme_mod( 'scarf_address', '' );
$hours   = get_theme_mod( 'scarf_hours', '۹ صبح تا ۱۸' );
?>

<footer class="scarf-footer">

	<div class="scarf-container">
		<div class="scarf-footer__trust">
			<?php get_template_part( 'template-parts/section-trust' ); ?>
		</div>

		<div class="scarf-footer__main">
			<?php for ( $i = 1; $i <= 4; $i++ ) : ?>
				<div class="scarf-footer__column">
					<?php if ( is_active_sidebar( 'footer-col-' . $i ) ) : ?>
						<?php dynamic_sidebar( 'footer-col-' . $i ); ?>
					<?php endif; ?>
				</div>
			<?php endfor; ?>
		</div>

		<div class="scarf-footer__bottom">
			<p class="scarf-footer__copyright">
				<?php
				$copyright = get_theme_mod( 'scarf_copyright_text', '' );
				if ( $copyright ) {
					echo esc_html( $copyright );
				} else {
					printf(
						esc_html__( 'تمام حقوق محفوظ است %s', 'scarf' ),
						'&copy; ' . date_i18n( 'Y' )
					);
				}
				?>
			</p>
		</div>
	</div>
</footer>

</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
