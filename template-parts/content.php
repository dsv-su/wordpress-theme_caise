<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage caise
 * @since caise 1.0
 */
?>

<fieldset id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<legend class="entry-header">
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<span class="sticky-post"><?php _e( 'Featured', 'caise' ); ?></span>
		<?php endif; ?>

		<?php the_title( sprintf( '<legend class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></legend>' ); ?>
	</legend><!-- .entry-header -->

	<?php caise_excerpt(); ?>

	<?php caise_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'caise' ),
				get_the_title()
			) );

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
		<?php caise_entry_meta(); ?>
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'caise' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</fieldset><!-- #post-## -->
