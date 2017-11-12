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
	<div class="entry">
		<a
			title="<?php the_title(); ?>"
			href="<?php the_permalink();  ?>">
			<img src="<?php the_post_thumbnail_url(); ?>" class="img-responsive"/>
		</a>
		<div class="row">
			<div class="entry-heading col-md-8 col-md-offset-4">
				<h1><?php the_title(); ?></h1>
			</div>
			<div class="entry-meta col-md-4">
				<p><?php tikola_posted_on(); ?></p>
				<p><?php the_tags(); ?></p>
			</div>
			<div class="entry-content col-md-8">
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
		</div>
	</div><!-- .entry -->

</article><!-- #post-## -->

<?php else: ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-12'); ?>>
	<div class="entry">
		<a
			title="<?php the_title(); ?>"
			href="<?php the_permalink();  ?>">
			<img src="<?php the_post_thumbnail_url(); ?>" class="img-responsive"/>
		</a>
		<div class="row">
			<div class="entry-heading col-md-8 col-md-offset-4">
				<a title="<?php the_title(); ?>" href="<?php the_permalink();  ?>">
					<h1><?php the_title(); ?></h1>
				</a>
			</div>
			<div class="entry-meta col-md-4">
				<p><?php tikola_posted_on(); ?></p>
				<p><?php the_tags(); ?></p>
			</div>
			<div class="entry-content col-md-8">
				<p><?php the_excerpt(); ?></p>
			</div>
		</div>
	</div><!-- .entry-meta -->
</article><!-- #post-## -->

<?php
endif; ?>
