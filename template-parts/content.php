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
if ( is_single() ) : ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?> >
	<div class="col-md-6">
		<img
			class="post-grid-image"
			alt="<?php the_title(); ?>"
			src="<?php the_post_thumbnail_url(); ?>"
		></a>
	</div>
	<div class="entry-content col-md-6">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<div class="entry-meta">
			<?php tikola_posted_on(); ?>
			<?php the_tags(); ?>
		</div>
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'tikola' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tikola' ),
				'after'  => '</div>',
			) );
		?>
	</div>
</article><!-- #post-## -->
<?php else: ?>

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
