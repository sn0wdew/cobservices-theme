<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package COB_Services
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'cob-services' ); ?></a>

	<!-- Start Custom Header -->
  <header>
		<div class="container top-nav">
	    <nav class="left-nav">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'top-left',
					'items_wrap' => '<ul><i class="fas fa-shopping-cart fa-fw"></i><li>%3$s</li></ul>',
				) );
				?>
				<!--
	      <ul>
	        <li><i class="fas fa-user fa-fw"></i> Login</li>
	      </ul>
			-->
	    </nav>
	    <nav class="right-nav">
	      <ul>
	        <li><i class="fas fa-shopping-cart fa-fw"></i> Cart</li>
	        <li><i class="fas fa-search fa-fw"></i> Search</li>
	      </ul>
	    </nav>
	  </div>
	  <div class="main-nav">
	    <div class="container">
				<?php
				the_custom_logo();
				?>
	      <nav>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'main-navigation',
						'menu_id'        => 'menu',
					) );
					?>
	      </nav>
	    </div>
	  </div>
	</header>

  <!-- End Custom Header -->

	<div id="content" class="site-content">
