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
		<div class="container top-nav">
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
				<?php
				wp_nav_menu( array(
					'theme_location' => 'top-right',
					'items_wrap' => '<ul>%3$s</ul>',
					'container' => false,
					'walker' => new Walker_Nav_Icons()
				) );
				?>
				<!--
	      <ul>
	        <li><i class="fas fa-shopping-cart fa-fw"></i> Cart</li>
	        <li><i class="fas fa-search fa-fw"></i> Search</li>
	      </ul> -->
	    </nav>
	  </div>

		<?php
		// Change background color to transparent if page is Home
		if ( is_front_page() ) :
		?>

		<!-- Modifed main-nav -->
		<div class="main-nav" style="background-color: transparent">

		<?php
		// Change background color to regular if page is not Home
		else :
			?>

		<!-- Regular main-nav -->
		<div class="main-nav">

    <?php
		// End If Statements
	  endif;
			?>
	    <div class="container">
					<h1 class="screen-reader-text"><?php bloginfo( 'name' ); ?></h1>
					<h2 class="screen-reader-text"><?php bloginfo( 'description' ); ?></h2>

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
