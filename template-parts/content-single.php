<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage caise
 * @since caise 1.0
 */
?>

<fieldset id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<legend class="entry-header">
		<?php the_title(); ?>
	</legend><!-- .entry-header -->

	<?php caise_excerpt(); ?>

	<?php caise_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
			the_content();

			foreach (get_the_category() as $category) {
				if ($category->name == 'Conferences') {
					$fields = get_field_objects();
					if( $fields ) {
						foreach( $fields as $field_name => $field ) {
							echo '<div>';
								echo '<h3>' . $field['label'] . '</h3>';
								echo $field['value'];
							echo '</div>';
						}
						echo '<br/>';
					}
				}
			}

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'caise' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'caise' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

			if ( '' !== get_the_author_meta( 'description' ) ) {
				get_template_part( 'template-parts/biography' );
			}
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
