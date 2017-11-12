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
	<div class="col-md-4" style="overflow:hidden;">
		<div class="entry-h">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</div>
		<div class="entry-meta">
			<p><?php tikola_posted_on(); ?></p>
		</div>
		<div class="entry-content">
			<?Php
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
		<div class="entry-meta">
			<p><?php the_tags( '' ); ?></p>
		</div>
	</div>
	<div class="col-md-8">
		<img
			class="post-grid-image"
			alt="<?php the_title(); ?>"
			src="<?php the_post_thumbnail_url(); ?>"
		></a>
	</div>
</article><!-- #post-## -->
<?php else: ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-3 col-xs-6 col-sm-4'); ?>>
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
