<?php
/**
 * Template part for displaying Featured Services
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package COB_Services
 */

?>

<?php if(is_search()){echo '<div class="col">'; } ?>

<div class="single-contact clearfix">

  <div class="contact-left">
      <?php the_post_thumbnail(); ?>
      <p><?php echo (get_post_meta( $post->ID, '_cob_contact_location_value_key', true )); ?></p>
  </div><!-- .contact-left -->

  <div class="contact-right">
      <h3><?php echo esc_attr(get_the_title()); ?></h3>
      <?php echo esc_attr(the_content()); ?>
  </div><!-- .contact-right -->

</div><!-- .single-contact .clearfix -->

<?php if(is_search()){echo '</div>'; } ?>
