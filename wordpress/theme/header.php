<?php
/**
 * Theme header.
 *
 * @package EstateinAssessment
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main-content"><?php esc_html_e( 'Skip to content', 'estatein-assessment' ); ?></a>
<header class="site-header">
	<div class="announcement">
		<div class="site-shell announcement__inner">
			<p><span aria-hidden="true">✨</span> <?php esc_html_e( 'Discover Your Dream Property with Estatein', 'estatein-assessment' ); ?></p>
			<a href="<?php echo esc_url( estatein_route_url( 'properties' ) ); ?>" aria-label="<?php esc_attr_e( 'Learn more about Estatein properties', 'estatein-assessment' ); ?>"><?php esc_html_e( 'Learn More', 'estatein-assessment' ); ?><span class="screen-reader-text"> <?php esc_html_e( 'about Estatein properties', 'estatein-assessment' ); ?></span></a>
			<button class="announcement-close" type="button" aria-label="<?php esc_attr_e( 'Dismiss announcement', 'estatein-assessment' ); ?>">×</button>
		</div>
	</div>
	<div class="nav-bar">
		<div class="site-shell nav-bar__inner">
			<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'Estatein home', 'estatein-assessment' ); ?>">
				<?php estatein_logo(); ?>
			</a>
			<button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-navigation">
				<span class="screen-reader-text"><?php esc_html_e( 'Toggle navigation', 'estatein-assessment' ); ?></span>
				<span aria-hidden="true"></span><span aria-hidden="true"></span><span aria-hidden="true"></span>
			</button>
			<nav id="primary-navigation" class="primary-navigation" aria-label="<?php esc_attr_e( 'Primary navigation', 'estatein-assessment' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'menu_class'     => 'primary-menu',
						'fallback_cb'    => 'estatein_fallback_menu',
						'depth'          => 1,
					)
				);
				?>
			</nav>
			<a class="button button--secondary nav-contact" href="<?php echo esc_url( estatein_route_url( 'contact' ) ); ?>"><?php esc_html_e( 'Contact Us', 'estatein-assessment' ); ?></a>
		</div>
	</div>
</header>
