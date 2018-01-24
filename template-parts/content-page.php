<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage caise
 * @since caise 1.0
 */
?>

<?php if (!is_front_page()) { echo "<fieldset"; } else { echo "<article"; }?> id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<legend class="entry-header">
		<?php if (!is_front_page()) {the_title(); } ?>
	</legend><!-- .entry-header -->

	<?php caise_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

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

	<?php
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'caise' ),
				get_the_title()
			),
			'<footer class="entry-footer"><span class="edit-link">',
			'</span></footer><!-- .entry-footer -->'
		);
	?>

<?php if (!is_front_page()) { echo "</fieldset>"; } else { echo "</article>"; }?><!-- #post-## -->
