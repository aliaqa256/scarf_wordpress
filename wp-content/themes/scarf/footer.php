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
			<div class="scarf-footer__column">
				<h3 class="scarf-footer__column-title"><?php esc_html_e( 'راهنمای خرید', 'scarf' ); ?></h3>
				<ul class="scarf-footer__links">
					<li><a href="#"><?php esc_html_e( 'راهنمای انتخاب شال', 'scarf' ); ?></a></li>
					<li><a href="#"><?php esc_html_e( 'روش‌های ارسال', 'scarf' ); ?></a></li>
					<li><a href="#"><?php esc_html_e( 'روش‌های پرداخت', 'scarf' ); ?></a></li>
					<li><a href="#"><?php esc_html_e( 'ضمانت بازگشت کالا', 'scarf' ); ?></a></li>
				</ul>
			</div>

			<div class="scarf-footer__column">
				<h3 class="scarf-footer__column-title"><?php esc_html_e( 'خدمات مشتریان', 'scarf' ); ?></h3>
				<ul class="scarf-footer__links">
					<li><a href="#"><?php esc_html_e( 'تماس با ما', 'scarf' ); ?></a></li>
					<li><a href="#"><?php esc_html_e( 'سوالات متداول', 'scarf' ); ?></a></li>
					<li><a href="#"><?php esc_html_e( 'قوانین و مقررات', 'scarf' ); ?></a></li>
					<li><a href="#"><?php esc_html_e( 'حریم خصوصی', 'scarf' ); ?></a></li>
				</ul>
			</div>

			<div class="scarf-footer__column">
				<h3 class="scarf-footer__column-title"><?php esc_html_e( 'درباره فروشگاه', 'scarf' ); ?></h3>
				<p><?php esc_html_e( 'فروشگاه تخصصی شال و روسری با انواع مدل‌های روز و کلاسیک. تضمین اصالت و کیفیت محصولات.', 'scarf' ); ?></p>
				<div class="scarf-footer__social">
					<a href="<?php echo esc_url( $instagram ); ?>" aria-label="<?php esc_attr_e( 'اینستاگرام', 'scarf' ); ?>">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
					</a>
					<a href="<?php echo esc_url( $telegram ); ?>" aria-label="<?php esc_attr_e( 'تلگرام', 'scarf' ); ?>">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="4 11 9 13 14 9"/><path d="M22 4l-3 18-7-7-3 2-1-4L22 4z"/></svg>
					</a>
					<a href="<?php echo esc_url( $whatsapp ); ?>" aria-label="<?php esc_attr_e( 'واتساپ', 'scarf' ); ?>">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
					</a>
				</div>
			</div>

			<div class="scarf-footer__column">
				<h3 class="scarf-footer__column-title"><?php esc_html_e( 'ارتباط با ما', 'scarf' ); ?></h3>
				<?php if ( $phone ) : ?>
					<p><?php echo esc_html( 'تلفن: ' . $phone ); ?></p>
				<?php endif; ?>
				<?php if ( $email ) : ?>
					<p><?php echo esc_html( 'ایمیل: ' . $email ); ?></p>
				<?php endif; ?>
				<?php if ( $address ) : ?>
					<p><?php echo esc_html( 'آدرس: ' . $address ); ?></p>
				<?php endif; ?>
				<?php if ( $hours ) : ?>
					<p><?php echo esc_html( 'ساعات پاسخگویی: ' . $hours ); ?></p>
				<?php endif; ?>
			</div>
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
