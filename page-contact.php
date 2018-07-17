<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package COB_Services
 */

get_header();
?>

<div class="all-contacts">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-8 text-center">
                <h1><?php echo esc_attr(get_option('contact_main')['title']); ?></h1>
                <h2><?php echo get_option('contact_main_subtitle'); ?></h2>
            </div>
        </div>

        <div class="all-service-wrapper">

        <?php
        $terms = get_terms( array(
            'taxonomy' => 'Service Departments',
            'hide_empty' => true,
        	)
        );

        if (is_wp_error($terms)){
        	echo "No Service Categories Declared";
        } else {
          //print_r($terms);

          // Start foreach loop to cycle through every category possible
        	foreach ($terms as $term) {
            $service_category = $term->name;
            ?>

            <div class="ft-service service-clicked">
              <div class="ft-wrapper">
                  <div class="table">
                      <div class="table-cell">
                          <h2><?php echo esc_attr($service_category) ?></h2>
                      </div>
                  </div>
              </div><!-- .ft-wrapper -->
              <div class="service-info">
                <div class="contacts">

                  <?php

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

                  $query = new WP_Query( $args ); // custom wp_query

                  if ( $query->have_posts() ) :

                  	while( $query->have_posts() ):
                  		$query->the_post();

                  		// *note* get_post_type == 'cob_ft_services.php'
                  		get_template_part( 'template-parts/content', get_post_type() );

                  	endwhile;
                  endif;

                  wp_reset_query();
                  ?>

                </div><!-- .contacts -->
              </div><!-- .service-info -->
            </div><!-- .ft-service -->

            <?php

            	}; // Foreach
            } //else
            ?>

</div><!-- .all-service-wrapper -->
</div><!-- .container .ft-service-container -->
</div><!-- .all-contacts -->

<?php
// Check if enabled option is selected
if (esc_attr(get_option('contact_banner_enable')) == 1):
?>

<div class="contact-banner">
  <div class="container">
    <div class="table">
      <div class="col-sm-12 table-cell">
        <div class="h2"><?php echo( get_option('contact_banner')['banner_text'] ); ?></div>
        <form class="home-feature-form" action="#">
            <input class="btn btn-outline-dark" type="button"
                   value="<?php echo esc_attr(get_option('contact_banner')['button_text']); ?>"
                   onclick="window.location.href='<?php echo esc_attr(get_option('contact_banner')['button_link'], '#'); ?>'" />
        </form>
      </div><!-- .col-sm-12 -->
    </div><!-- .table -->
  </div><!-- .container -->
</div><!-- .home-banner -->

<?php endif; // End's Enabled verification for home banner

get_footer();
