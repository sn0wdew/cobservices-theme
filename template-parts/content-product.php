<?php
/**
 * Template part for displaying Featured Services
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package COB_Services
 */

?>
<?php global $product; ?>

<div class="col-12 cob-product">
  <?php the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', ' <i class="fas fa-shopping-bag"></i></a></h2>' ); ?>
  <p class="text-muted"><?php echo $product->get_price_html(); ?></p>
  <div class="cob-product-image"><?php cob_services_post_thumbnail(); ?></div>
</div>
