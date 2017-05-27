<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package tikola
 */

get_header(); ?>

	<div id="primary" class="content-area container">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();
			if ( in_category( 'collection' ) ) {
				get_template_part( 'template-parts/content-collection', get_post_format() );
			} else {
				get_template_part( 'template-parts/content', get_post_format() );
			}
		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
