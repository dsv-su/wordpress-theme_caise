<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage caise
 * @since caise 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<div class="site-inner">

		<div id="header" class="site-header" role="banner">

			<?php if ( get_header_image() ) : ?>
				<?php
					/**
					 * Filter the default caise custom header sizes attribute.
					 *
					 * @since caise 1.0
					 *
					 * @param string $custom_header_sizes sizes attribute
					 * for Custom Header. Default '(max-width: 709px) 85vw,
					 * (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px'.
					 */
					$custom_header_sizes = apply_filters( 'caise_custom_header_sizes', '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px' );
				?>
				<div class="header-image">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ); ?>" sizes="<?php echo esc_attr( $custom_header_sizes ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
					</a>
				</div><!-- .header-image -->
			<?php endif; // End header image check. ?>
			<div class="site-header-main">

				<?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) ) : ?>

					<div id="site-header-menu" class="site-header-menu">
						<?php if ( has_nav_menu( 'primary' ) ) : ?>
							<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'caise' ); ?>">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'primary',
										'menu_class'     => 'primary-menu',
									 ) );
								?>
							</nav><!-- .main-navigation -->
						<?php endif; ?>

					</div><!-- .site-header-menu -->
				<?php endif; ?>
			</div><!-- .site-header-main -->


		</div><!-- .site-header -->
		<div id="right-menu">

<?php
    $category_id = get_cat_ID( 'News' );
    $category_link = get_category_link( $category_id );

	$args = array(
		'posts_per_page' 	=> -1,
		'category' 			=> $category_id
	);

	$myposts = get_posts( $args );
	if ($myposts) {
		echo "<h1>Last news</h1>";
		foreach ( array_slice($myposts, 0, 2) as $post ) : setup_postdata( $post ); ?>
			<p>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</p>
		<?php endforeach;
		wp_reset_postdata();
		if (count($myposts) > 2) {?>
			<p><a href="<?php echo esc_url( $category_link ); ?>" title="More news">More news</a></p>
<?php
		}
	}
?>


<?php
if (is_user_logged_in()) {
    $category_id = get_cat_ID( 'Assemblies' );
    $category_link = get_category_link( $category_id );

	$args = array(
		'posts_per_page' 	=> -1,
		'category' 	=> $category_id
	);

	$myposts = get_posts( $args );
	if ($myposts) {
		echo "<h1>Last assemblies</h1>";
		foreach ( array_slice($myposts, 0, 2) as $post ) : setup_postdata( $post ); ?>
			<p>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</p>
		<?php endforeach;
		wp_reset_postdata();
		if (count($myposts) > 2) {?>
			<p><a href="<?php echo esc_url( $category_link ); ?>" title="More conferences">More summaries</a></p>
<?php
		}
	}
}
?>

<?php
    $category_id = get_cat_ID( 'Conferences' );
    $category_link = get_category_link( $category_id );

	$args = array(
		'meta_key'	=> 'year',
		'orderby' 	=> 'meta_value',
		'order'		=> 'DESC',
		'posts_per_page' 	=> -1,
		'category' 	=> $category_id
	);

	$myposts = get_posts( $args );
	if ($myposts) {
		$str_coming 	= "<h1>Coming conferences</h1>";
		$str_prev 		= "<h1>Previous conferences</h1>";
		foreach ( array_slice($myposts, 0, 5) as $post ) {
			setup_postdata( $post );
			if ((get_field('year') == date("Y")) && (date("m") < 7)) {
				if (!empty(get_field('link'))) {
					$str_coming .= '<p><a href=' . get_field('link') . ' ' . get_field('place') . '>' .
						'<span>' . get_field('year') . '</span> ' . get_field('place') . ' [' . get_field('country') . ']</a></p>';
				} else {
					$str_coming .= '<p>' .
						'<span>' . get_field('year') . '</span> ' . get_field('place') . ' [' . get_field('country') . ']</p>';
				}
			} else {
				if (!empty(get_field('link'))) {
					$str_prev .= '<p><a href=' . get_field('link') . ' ' . get_field('place') . '>' .
						'<span>' . get_field('year') . '</span> ' . get_field('place') . ' [' . get_field('country') . ']</a></p>';
				} else {
					$str_prev .= '<p>' .
						'<span>' . get_field('year') . '</span> ' . get_field('place') . ' [' . get_field('country') . ']</p>';
				}
			}
		}
		wp_reset_postdata();
		echo $str_coming . $str_prev;
		if (count($myposts) > 5) {?>
			<p><a href="<?php echo esc_url( $category_link ); ?>" title="More conferences">More conferences</a></p>
<?php
		}
	}
?>

		</div>
		<div id="content" class="site-content">
