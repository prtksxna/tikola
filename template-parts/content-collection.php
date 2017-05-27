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
<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-12'); ?>>
	<div class="entry-meta">
		<a
			title="<?php the_title(); ?>"
			href="<?php the_permalink();  ?>">
			<img src="<?php the_post_thumbnail_url(); ?>" class="img-responsive"/>
		</a>
		<h1><?php the_title(); ?></h1>
		<div class="entry-meta">
			<?php tikola_posted_on(); ?>
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
	</div><!-- .entry-meta -->
</article><!-- #post-## -->

<?php else: ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-12'); ?>>
	<div class="entry-meta">
		<a
			title="<?php the_title(); ?>"
			href="<?php the_permalink();  ?>">
			<img src="<?php the_post_thumbnail_url(); ?>" class="img-responsive"/>
		</a>
		<h1><?php the_title(); ?></h1>
		<p><?php the_excerpt(); ?></p>
	</div><!-- .entry-meta -->
</article><!-- #post-## -->

<?php
endif; ?>
