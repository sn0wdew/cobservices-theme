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

<div class="all-contacts forms-pg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-8 text-center">
                <h1><?php echo get_the_title(); ?></h1>
                <h2><?php //echo get_the_content(); ?></h2>
            </div>
        </div>

        <div class="all-service-wrapper">
          <?php
          $args = array(
            'post_type' => 'cob_forms',
            'post_per_page' => '-1',
          );

          $query = new WP_Query( $args ); // custom wp_query

          if ( $query->have_posts() ) :
            while( $query->have_posts() ):
              $query->the_post();
              // *note* get_post_type == 'cob_ft_services.php'
              get_template_part( 'template-parts/content', get_post_type() );

            endwhile;
          endif;
          wp_reset_postdata();
          ?>
          </div><!-- .all-service-wrapper -->

          <?php the_content(); ?>

        </div><!-- .container .ft-service-container -->
      </div><!-- .all-contacts -->
<?php
get_footer();
