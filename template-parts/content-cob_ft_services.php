<?php
/**
 * Template part for displaying Featured Services
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package COB_Services
 */

?>

    <div class="ft-service">
      <div class="ft-wrapper">
        <div class="table">
          <div class="table-cell">
            <?php cob_services_post_thumbnail(); ?>
            <h2><?php the_title( '<h2>', '</h2>' ); ?></h2>
            <?php the_content(); ?>
          </div><!--  .table-cell -->
        </div><!--  .table -->
      </div><!--  .ft-wrapper -->
    </div><!--  .ft-service -->
