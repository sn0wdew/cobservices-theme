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
<!-- Home Tips Section -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-8 text-center">
            <h1><?php echo esc_attr(get_option('home_tips')['headline']); ?></h1>
            <h2 class="mb-4"><?php echo esc_attr(get_option('home_tips')['subline']); ?></h2>
        </div>
    </div>
</div

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

<!-- Home Service Section -->

<div class="all-services">
    <div class="container ft-service-container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1>All Services</h1>
            </div>
        </div>

        <div class="all-service-wrapper">
          <?php

          $args = array('post_type' => 'cob_services', 'post_per_page' => '-1');
          $query = new WP_Query( $args ); // custom wp_query

          if ( $query->have_posts() ) :

            while( $query->have_posts() ):
              $query->the_post();

              // *note* get_post_type == 'cob_ft_services.php'
              get_template_part( 'template-parts/content', get_post_type() );

            endwhile;
          endif;
          ?>
        </div>
    </div>
</div><!-- .all-services -->

<?php wp_reset_query(); ?>

<!-- Home Updates & Contact form Section -->

<div class="container">
  <div class="row">
    <div class="col-12 col-md-6">
      <?php
      the_title( '<h2 class="text-center text-md-left h1">', '</h2>' );
      the_content();
      ?>
    </div>
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

<?php wp_reset_postdata(); ?>

<?php
get_footer();
