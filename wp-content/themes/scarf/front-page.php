<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
?>

<main id="main" class="site-main">

<?php
if ( 'yes' === get_theme_mod( 'scarf_show_hero', 'yes' ) ) {
	get_template_part( 'template-parts/hero-section' );
}

if ( 'yes' === get_theme_mod( 'scarf_show_categories', 'yes' ) ) {
	get_template_part( 'template-parts/section-categories' );
}

// Homepage widget: top
if ( is_active_sidebar( 'homepage-top' ) ) {
	dynamic_sidebar( 'homepage-top' );
}

if ( 'yes' === get_theme_mod( 'scarf_show_offers', 'yes' ) ) {
	get_template_part( 'template-parts/section-offers' );
}

if ( 'yes' === get_theme_mod( 'scarf_show_new_arrivals', 'yes' ) ) {
	get_template_part( 'template-parts/section-new-arrivals' );
}

if ( 'yes' === get_theme_mod( 'scarf_show_best_sellers', 'yes' ) ) {
	get_template_part( 'template-parts/section-best-sellers' );
}

if ( 'yes' === get_theme_mod( 'scarf_show_services', 'yes' ) ) {
	get_template_part( 'template-parts/section-services' );
}

// Homepage widget: bottom
if ( is_active_sidebar( 'homepage-bottom' ) ) {
	dynamic_sidebar( 'homepage-bottom' );
}
?>

</main>

<?php
get_footer();
