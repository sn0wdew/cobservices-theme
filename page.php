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
    <div class="row">
        <div class="col-12 text-center">
            <h1><?php echo get_the_title(); ?></h1>
        </div>
    </div>
    <div class="row">
      <div class="col-12"><?php the_content(); ?></div>
    </div>

  </div><!-- .container .ft-service-container -->
</div><!-- .all-contacts -->

<?php
get_footer();
