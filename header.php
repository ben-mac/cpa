<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cpa
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<script defer src="https://use.fontawesome.com/releases/v5.0.12/js/all.js" integrity="sha384-Voup2lBiiyZYkRto2XWqbzxHXwzcm4A5RfdfG6466bu5LqjwwrjXCMBQBLMWh7qR" crossorigin="anonymous"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'cpa' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-header--content">
			<div class="site-branding">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$cpa_description = get_bloginfo( 'description', 'display' );
				if ( $cpa_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $cpa_description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->

			<nav class="header-nav">
				<span class="mobile-toggle"><i class="fas fa-bars"></i></span>
				<?php wp_nav_menu( array(
					'theme_location' => 'header-menu', 
					'container_class' => 'header-menu' 
				) ); ?>

				<?php global $woocommerce; ?>
					<div class="cart-wrap">
					<a class="cart-icon" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"
					title="<?php _e('Cart View', 'woothemes'); ?>"><i class="fas fa-shopping-cart"></i>
					</a>
					</div>
					<span class="search-toggle"><i class="fas fa-search"></i></span>
					<span class="search-close"><i class="fas fa-times"></i></span>
					<?php get_search_form(); ?>
			</nav>

			<div class="mobile-main-nav">
			<?php wp_nav_menu( array(
					'theme_location' => 'header-menu', 
					'container_class' => 'mobile-menu' 
				) ); ?>
			</div>

		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">

	<nav id="site-navigation" class="main-navigation">
		<div class="main-navigation--content">
				<span class="mobile-toggle__content"><i class="fas fa-bars"></i></span>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
				?>
			</div>
		</nav><!-- #site-navigation -->
