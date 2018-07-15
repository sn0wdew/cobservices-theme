<?php
/**
 * Template part for displaying Featured Services
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package COB_Services
 */

?>

<?php
// Main Service Post ID. Important as we use multiple WP query loops
$main_post_id = $post->ID; 
?>

<div class="ft-service">
  <div class="ft-wrapper">
      <div class="table">
          <div class="table-cell">
            <?php the_post_thumbnail(); ?>
            <?php the_title( '<h2>', '</h2>' ); ?>
          </div>
      </div>
  </div><!-- .ft-wrapper -->
  <div class="service-info">
    <div class="contacts">

      <?php
        $post_terms = wp_get_post_terms($post->ID, 'Service Departments');

        // Start foreach loop to cycle through every category possible
        foreach ($post_terms as $term) {
          $service_category = $term->name;

        if (has_term( $service_category, 'Service Departments', $main_post_id)){
        $args = array(
          'post_type' => 'cob_contacts',
          'post_per_page' => '-1',
          'tax_query' => array(
            array(
              'taxonomy' => 'Service Departments',
              'field' => 'slug',
              'terms'    => $service_category
            ))
          );

        $second_query = new WP_Query( $args ); // custom wp_query

        if ( $second_query->have_posts() ) :

          while( $second_query->have_posts() ):
            $second_query->the_post();

            // *note* get_post_type == 'cob_ft_services.php'
            get_template_part( 'template-parts/content', get_post_type() );

          endwhile;
        endif;
        wp_reset_postdata();
      }
    }; //for each
      ?>

    </div><!-- .contacts -->
    <div class="service-links">
      <?php echo get_post_field('post_content', $main_post_id); ?>
    </div>
  </div><!-- .service-info -->
</div><!-- .ft-service -->
