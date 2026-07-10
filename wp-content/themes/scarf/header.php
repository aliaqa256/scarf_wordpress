<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'پرش به محتوای اصلی', 'scarf' ); ?></a>

<header class="scarf-header">
	<div class="scarf-header__main">
		<div class="scarf-header__inner scarf-container">
			<div class="scarf-header__brand">
				<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
					<div class="scarf-header__logo"><?php the_custom_logo(); ?></div>
				<?php else : ?>
					<a class="scarf-header__site-name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				<?php endif; ?>
			</div>

			<div class="scarf-header__search">
				<?php get_search_form(); ?>
			</div>

			<div class="scarf-header__actions">
				<a class="scarf-header__account" href="<?php echo esc_url( scarf_get_account_url() ); ?>">
					<?php esc_html_e( 'حساب کاربری', 'scarf' ); ?>
				</a>

				<?php if ( class_exists( 'WooCommerce' ) && function_exists( 'wc_get_cart_url' ) && function_exists( 'WC' ) ) : ?>
					<a class="scarf-header__cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
						<?php esc_html_e( 'سبد خرید', 'scarf' ); ?>
						<?php
						$cart_count = 0;
						if ( WC()->cart ) {
							$cart_count = WC()->cart->get_cart_contents_count();
						}
						if ( $cart_count > 0 ) :
						?>
							<span class="scarf-header__cart-count"><?php echo esc_html( $cart_count ); ?></span>
						<?php endif; ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="scarf-header__nav">
		<div class="scarf-container">
			<button class="scarf-mobile-menu-toggle" type="button" aria-controls="scarf-site-navigation" aria-expanded="false">
				<span class="screen-reader-text"><?php esc_html_e( 'باز کردن منو', 'scarf' ); ?></span>
				<span class="scarf-mobile-menu-toggle__icon"></span>
			</button>
			<nav id="scarf-site-navigation" class="scarf-site-navigation" aria-label="<?php esc_attr_e( 'منوی اصلی', 'scarf' ); ?>">
				<?php
				if ( has_nav_menu( 'menu-primary' ) ) {
					wp_nav_menu( array(
						'theme_location' => 'menu-primary',
						'menu_id'        => 'scarf-primary-menu',
						'container'      => false,
						'fallback_cb'    => '__return_false',
					) );
				} else {
					scarf_fallback_menu();
				}
				?>
			</nav>
		</div>
	</div>
</header>
