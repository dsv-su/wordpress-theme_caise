<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage caise
 * @since caise 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php caise_excerpt(); ?>

	<?php caise_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'caise' ),
				get_the_title()
			) );

			if (empty(get_field('link'))) {
				echo '<span>' . get_field('year'). '</span> ' . get_field('place') . ' [' . get_field('country') . ']';
			} else {
				echo '<a href="' . get_field('link') . '" title="' . get_field('place') . '">' . '<span>' . get_field('year') . '</span> ' . get_field('place') . ' [' . get_field('country') . ']</a>';
			}
			echo '<br/>';

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'caise' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'caise' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //caise_entry_meta(); ?>
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit', 'caise' )
				),
				'<span class="edit-link">',
				'</span>'
			);
			echo '<br/><hr />';
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
