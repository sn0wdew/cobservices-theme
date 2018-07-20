<?php
/**
 * Template part for displaying Featured Services
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package COB_Services
 */

?>

<div class="card">
  <div class="card-body text-center">
    <p class="h1 text-muted"><?php echo esc_attr(get_post_field( 'menu_order' )); ?></p>
    <p class="h2"><?php echo get_the_content(); ?></p>
  </div>
</div>
