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
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-touch-icon.png?v=001">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/favicons/favicon-32x32.png?v=001">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/favicons/favicon-16x16.png?v=001">
	<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/favicons/site.webmanifest?v=001">
	<link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/favicons/safari-pinned-tab.svg?v=001" color="#00694e">
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicons/favicon.ico?v=001">
	<meta name="apple-mobile-web-app-title" content="CoB Services">
	<meta name="application-name" content="Business Services">
	<meta name="msapplication-TileColor" content="#ff0000">
	<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/favicons/mstile-144x144.png?v=001">
	<meta name="theme-color" content="#ffffff">
	<?php wp_head(); ?>
</head>

<?php

	$args = array(
		'post_type' => 'cob_updates',
		'post_per_page' => '1',
		'tax_query' => array(
			array(
				'taxonomy' => 'Display Locations',
				'field' => 'slug',
				'terms'    => 'Entire Website'
			)
		)
	);

$query = new WP_Query( $args ); // custom wp_query

if ( $query->have_posts() ) :?>

<div class="alert alert-warning alert-dismissible fade show" role="main-alert">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php
	          $query->the_post();
	          echo strip_tags(get_the_content());
	      ?>
			</div><!-- .col-12 -->
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div><!-- .row -->
	</div> <!-- .container -->
</div> <!-- [main-alert] -->

<?php
	endif; // End if statement for Entire Website Update type
	wp_reset_query(); // Reset wpquery
	?>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'cob-services' ); ?></a>

	<!-- Start Custom Header -->
  <header>
		<div class="container top-nav hidden-print">
	    <nav class="left-nav">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'top-left',
					'items_wrap' => '<ul>%3$s</ul>',
					'container' => false,
					'walker' => new Walker_Nav_Icons()
				) );
				?>
	    </nav>
	    <nav class="right-nav">
				<div id="main-search-form"><?php get_search_form(); ?></div>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'top-right',
					'items_wrap' => '<ul>%3$s</ul>',
					'container' => false,
					'walker' => new Walker_Nav_Icons()
				) );
				?>
	    </nav>
	  </div>

		<!-- Regular main-nav -->
		<div class="main-nav">
	    <div class="container">
					<h1 class="screen-reader-text"><?php bloginfo( 'name' ); ?></h1>
					<h2 class="screen-reader-text"><?php bloginfo( 'description' ); ?></h2>

				<?php
				the_custom_logo();
				?>
	      <nav class="hidden-print">
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
