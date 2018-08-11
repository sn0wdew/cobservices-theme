<?php
/**
 * Template Name: Single Form Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package COB_Services
 */

get_header();
?>
<div class="container">
  <div class="row"><h1><?php the_title(); ?> <i class="fa fas fa-file"></i></h1></div>
  <div class="row">
    <div class="col"><?php the_content(); ?></div>
  </div>
</div>
<?php
get_footer();
