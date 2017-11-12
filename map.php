<?php
/**
 * Template Name: Map
 *
 * @package tikola
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css"
  integrity="sha512-M2wvCLH6DSRazYeZRIm1JnYyh22purTM+FDB5CsyxtQJYeKq83arPe5wgbNmcFXGqiSH2XR8dT/fJISVA1r/zQ=="
  crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"
  integrity="sha512-lInM/apFSqyy1o6s89K4iQUKg6ppXEgsVxT35HbzUupEVRh2Eu9Wdl4tHj7dZO0s1uvplcYGmt3498TtHq+log=="
  crossorigin=""></script>

<script src="https://unpkg.com/leaflet.markercluster@1.2.0/dist/leaflet.markercluster.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.2.0/dist/MarkerCluster.css"/>
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.2.0/dist/MarkerCluster.Default.css"/>

<script>
window.locations =
		<?php
			$the_query = new WP_Query( array( 'cat' => 2, 'posts_per_page' => -1 ) );
// The Loop
if ( $the_query->have_posts() ) {
	echo "[";
	while ( $the_query->have_posts() ) {
		echo "{";
		$the_query->the_post();
		echo "\"title\":\"" . get_the_title() . "\",";
		echo "\"latitude\":\"" . get_post_meta( get_the_id(), 'geo_latitude' )[0] . "\",";
		echo "\"longitude\":\"" . get_post_meta( get_the_id(), 'geo_longitude' )[0] . "\",";
		echo "\"url\":\"" . get_the_permalink() . "\",";
		echo "\"photo\":\"" . get_the_post_thumbnail_url()  . "\"";
		echo "},";
	}
	echo "];";
	/* Restore original Post Data */
	wp_reset_postdata();
} else {
	// no posts found
}

		?>
</script>

<div id="map"></div>
<?php
# TODO: There has to be a better way
wp_enqueue_script( 'map', '/wp-content/themes/tikola/js/map.js', ['jquery'], 0, true);
?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
