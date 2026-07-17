<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
?>

<main id="main" class="site-main">

<?php
get_template_part( 'template-parts/hero-section' );
get_template_part( 'template-parts/section-categories' );

// Homepage widget: top
if ( is_active_sidebar( 'homepage-top' ) ) {
	dynamic_sidebar( 'homepage-top' );
}

get_template_part( 'template-parts/section-offers' );
get_template_part( 'template-parts/section-new-arrivals' );
get_template_part( 'template-parts/section-best-sellers' );
get_template_part( 'template-parts/section-services' );

// Homepage widget: bottom
if ( is_active_sidebar( 'homepage-bottom' ) ) {
	dynamic_sidebar( 'homepage-bottom' );
}
?>

</main>

<?php
get_footer();
