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
get_template_part( 'template-parts/section-offers' );
get_template_part( 'template-parts/section-new-arrivals' );
get_template_part( 'template-parts/section-best-sellers' );
get_template_part( 'template-parts/section-services' );
?>

</main>

<?php
get_footer();
