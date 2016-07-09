<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package estate
 * @since estate 1.0
 * @license GPL 2.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link href="/img/favicon.ico" rel="icon" type="image/x-icon" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
	<link href="/img/favicon.ico" rel="icon" type="image/x-icon" />
		<div class="hgroup">
			<h1 class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php estate_display_logo(); ?>
				</a>
			</h1>
			<?php if(siteorigin_setting('general_site_description')) : ?>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			<?php endif ?>
		</div>

		<nav role="navigation" class="site-navigation main-navigation primary"><div class="noise">

				<div class="container">
					<h1 class="assistive-text"><?php _e( 'Menu', 'estate' ); ?></h1>
					<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'estate' ); ?>"><?php _e( 'Skip to content', 'estate' ); ?></a></div>

					<?php if( siteorigin_setting( 'general_menu_search' ) ) get_search_form() ?>

					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</div>
		</div></nav><!-- .site-navigation .main-navigation -->
	</header><!-- #masthead .site-header -->

	<?php estate_display_top_slider() ?>

	<div id="main" class="site-main">
		<img id="main-shadow" src="<?php echo get_template_directory_uri() ?>/images/decoration/footer-shadow.png" width="820" height="19" />