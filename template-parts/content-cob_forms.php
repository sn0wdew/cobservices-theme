<?php
/**
 * Template part for displaying Featured Services
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package COB_Services
 */

?>

<?php if(is_search()): ?>
  <div style="margin-left:15px; margin-bottom: 28px;" class="ft-service service-clicked">
    <div class="ft-wrapper">
        <div class="table">
            <div class="table-cell">
                <h2><?php echo get_the_title(); ?></h2>
            </div>
        </div>
    </div><!-- .ft-wrapper -->
    <div class="service-info">
      <div class="service-links">
        <?php echo get_post_field('post_content'); ?>
      </div>
    </div><!-- .service-info -->
  </div><!-- .ft-service -->

<?php else: ?>
<div class="ft-service service-clicked">
  <div class="ft-wrapper">
      <div class="table">
          <div class="table-cell">
              <h2><?php echo get_the_title(); ?></h2>
          </div>
      </div>
  </div><!-- .ft-wrapper -->
  <div class="service-info">
    <div style="padding: 20px 28px 10px; padding: 2rem 2.8rem 1rem;">
      <div class="text-left clearfix">
        <p><?php echo get_the_excerpt(); ?></p>
      </div><!-- .text-left .clearfix -->
    </div><!-- div -->
    <div class="service-links">
      <?php echo get_post_field('post_content'); ?>
    </div>
  </div><!-- .service-info -->
</div><!-- .ft-service -->
<?php endif;
