<?php
/**
 * Template Name: Map
 *
 * @package tikola
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
			$the_query = new WP_Query( array( 'cat' => 2 ) );
// The Loop
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		the_title();
		echo get_post_meta( get_the_id(), 'geo_latitude' )[0];
		echo get_post_meta( get_the_id(), 'geo_longitude' )[0];
	}
	/* Restore original Post Data */
	wp_reset_postdata();
} else {
	// no posts found
}

		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
