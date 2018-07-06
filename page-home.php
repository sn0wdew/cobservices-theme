<?php
/**
 * The home page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package COB_Services
 */

get_header();
?>

<!-- Home Feature Section -->

<div class="home-feature" style="background-image: url( <?php echo get_theme_mod('cob-services-hf-image') ?> ) ">
    <div class="home-feature-wrapper container">
        <div class="row no-gutters table">
          <div class="table-cell">
            <div class="col-sm-12 col-md-9 col-lg-6">
                <h1><?php echo esc_attr(get_option('home_feature')['headline']) ?></h1>
                <h2><?php echo esc_attr(get_option('home_feature')['subline']) ?></h2>
                <form class="home-feature-form" action="#">
                    <input class="btn btn-outline-dark" type="button"
                           value="<?php echo esc_attr(get_option('home_feature')['button_text']) ?>"
                           onclick="window.location.href='<?php echo get_permalink(esc_attr(get_option('home_feature')['button_link'])) ?>'" />
                </form>
            </div>
          </div>
        </div>
    </div>
</div>

<!-- Home Banner Section -->

<?php
// Check if enabled option is selected
if (esc_attr(get_option('home_banner_activate')) == 1):
?>

<div class="home-banner">
  <div class="container">
    <div class="table">
      <div class="col-sm-12 table-cell">
        <marquee><?php echo( get_option('home_banner_text') ) ?></marquee>

      </div><!-- .col-sm-12 -->
    </div><!-- .table -->
  </div><!-- .container -->
</div><!-- .home-banner -->

<?php endif; // End's Enabled verification for home banner ?>

<!-- Home Featured Service Section -->

<div class="container ft-service-container">
  <div class="row">
    <div class="col-sm-12 text-sm-center text-md-left">
      <h2 class="h1">Featured Services</h2>
    </div>
  </div>
  <div class="ft-service-wrapper">

    <?php

    $args = array('post_type' => 'cob_ft_services', 'post_per_page' => '-1');
    $query = new WP_Query( $args ); // custom wp_query

    if ( $query->have_posts() ) :

      while( $query->have_posts() ):
        $query->the_post();

        // *note* get_post_type == 'cob_ft_services.php'
        get_template_part( 'template-parts/content', get_post_type() );

      endwhile;
    endif;
    ?>

  </div><!-- .ft-service-wrapper -->
</div><!-- .ft-service-container -->

<?php wp_reset_query(); ?>

<!-- Home Updates & Contact form Section -->

<div class="container">
  <div class="row">
    <div class="col-12 col-md-6">Test</div>
    <div class="col-12 col-md-6 home-updates">
        <h2 class="text-center h1">Site Updates</h2>

        <?php

        $args = array(
          'post_type' => 'cob_updates',
          'post_per_page' => '3',
          'tax_query' => array(
            array(
              'taxonomy' => 'Display Locations',
              'field' => 'slug',
              'terms'    => 'home-display-page'
            )
          ) // tax_query
        ); // $args

        $query = new WP_Query( $args ); // custom wp_query

        if ( $query->have_posts() ) :

          while( $query->have_posts() ):
            $query->the_post();

            // *note* get_post_type == 'cob_ft_services.php'
            get_template_part( 'template-parts/content', get_post_type() );

          endwhile;
        endif;
        ?>
    </div><!-- .col-12 .col-md-6 .home-updates-->

  </div><!-- .row -->
</div><!-- .container -->

<?php wp_reset_query(); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
