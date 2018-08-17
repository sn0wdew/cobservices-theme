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

<div class="all-contacts forms-pg mb-5 ">
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-8 text-center">
            <h1><?php echo get_the_title(); ?></h1>
            <h2><?php //echo get_the_content(); ?></h2>
        </div>
    </div>
      <?php the_content(); ?>
  </div><!-- .container .ft-service-container -->
</div><!-- .all-contacts -->

<?php
get_footer();
