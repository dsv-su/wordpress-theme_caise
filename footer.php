<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage caise
 * @since caise 1.0
 */
?>

		</div><!-- .site-content -->

		<div id="footer" class="site-footer" role="contentinfo">
			<span style="float:left;" class="left">All rights reserved &copy; 1989 - 2006 CAiSE</span>

			<span class="right">
				<?php if ( has_nav_menu( 'footer' ) ) : ?>
					<?php
						wp_nav_menu( array(
							'theme_location' => 'footer',
							'menu_class'     => 'footer-menu',
						 ) );
					?>
				<?php endif; ?>
			</span>
		</div><!-- .site-footer -->
	</div><!-- .site-inner -->
</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>
