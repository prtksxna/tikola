<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package tikola
 */

?>

<?php
if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
else: ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-3'); ?>>
	<div class="entry-meta">
		<a
			class="thumbnail-link"
			title="<?php the_title(); ?>"
			style="background-image:url(<?php the_post_thumbnail_url(); ?>)"
			href="<?php the_permalink();  ?>"
		></a>
	</div><!-- .entry-meta -->
</article><!-- #post-## -->

<?php
endif; ?>
