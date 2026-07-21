<?php
/**
 * The main template file
 *
 * @package Scarf
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				the_content();

			endwhile;

			the_posts_navigation();

		else :
            echo '<p>' . esc_html__('No posts found.', 'scarf') . '</p>';
		endif;
		?>

	</main><!-- #primary -->

<?php
get_footer();