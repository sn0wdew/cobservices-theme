<?php

/*
 =========================================
 Home Page Shortcode | [cobservices_home]
 =========================================
*/

function cobservices_home_shortcode(){
  ob_start();
  ?>

  <!-- Home Tips Section -->

  <?php

  $args = array(
    'post_type' => 'cob_tips',
    'post_per_page' => '-1',
    'orderby' => 'menu_order',
    'order'   => 'ASC',
  );

  $query = new WP_Query( $args ); // custom wp_query

  if ( $query->have_posts() && esc_attr(get_option('home_tips_activate')) == 1 ) :

  ?>
  <div class="home-quick-tips" style="background-image: url('<?php echo esc_attr(get_option('home_tips')['bk'], ''); ?> ')">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-8 text-center">
                <h1><?php echo esc_attr(get_option('home_tips')['headline']); ?></h1>
                <h2 class="mb-4"><?php echo esc_attr(get_option('home_tips')['subline']); ?></h2>
            </div>
        </div>

        <div class="card-deck">
          <?php
            $tip_count = 0;

            while( $query->have_posts() ):
              $query->the_post();

              $tip_count++;

              // *note* get_post_type == 'cob_ft_services.php'
              get_template_part( 'template-parts/content', get_post_type() );

              if($tip_count % 2 == 0){
                echo '<div class="w-100 d-none d-sm-block d-md-none"><!-- wrap every 2 on sm--></div>';
              }

              if($tip_count % 3 == 0){
                echo '<div class="w-100 d-none d-md-block"><!-- wrap every 3 on md--></div>';
              }

            endwhile;
          ?>
        </div><!-- .card-deck -->
    </div><!-- .container -->
  </div><!-- .home-quick-tips -->
  <?php

    // Home Banner Section 1
    if (esc_attr(get_option('home_banner_activate')) == 1 ):
    ?>

    <div class="home-banner">
      <div class="container">
        <div class="table">
          <div class="col-sm-12 table-cell">
            <marquee><?php echo( get_option('home_banner_text') ) ?></marquee>

          </div><!-- .col-sm-12 -->
        </div><!-- .table -->
      </div><!-- .container -->
    </div><!-- .home-banner -->

    <?php endif; // End's Enabled verification for home banner

  endif; // ends check for quick tips
  wp_reset_postdata();
   ?>

  <!-- Home Service Section -->

  <div class="all-services">
      <div class="container ft-service-container">
          <div class="row">
              <div class="col-sm-12 text-center">
                  <h1>All Services</h1>
              </div>
          </div>

          <div class="all-service-wrapper">
            <?php

            $args = array('post_type' => 'cob_services', 'post_per_page' => '-1');
            $query = new WP_Query( $args ); // custom wp_query

            if ( $query->have_posts() ) :

              while( $query->have_posts() ):
                $query->the_post();

                // *note* get_post_type == 'cob_ft_services.php'
                get_template_part( 'template-parts/content', get_post_type() );

              endwhile;
            endif;
            ?>
          </div>
      </div>
  </div><!-- .all-services -->

  <?php wp_reset_postdata(); ?>

  <!-- Home Banner Section 2 -->

  <?php
  // Check if cob_tips has any posts. If it has posts, then banner has already been displayed
  $hasposts = get_posts('post_type=cob_tips');

  // Check if enabled option is selected
  if ( (esc_attr(get_option('home_banner_activate')) == 1 && (empty( $hasposts )))
    || (esc_attr(get_option('home_tips_activate')) == 0 && esc_attr(get_option('home_banner_activate')))):
  ?>

  <div class="home-banner" style="margin-bottom: 28px; margin-bottom: 2.8rem">
    <div class="container">
      <div class="table">
        <div class="col-sm-12 table-cell">
          <marquee><?php echo( get_option('home_banner_text') ) ?></marquee>

        </div><!-- .col-sm-12 -->
      </div><!-- .table -->
    </div><!-- .container -->
  </div><!-- .home-banner -->

  <?php endif; // End's Enabled verification for home banner ?>

  <!-- Home Updates & Contact form Section -->

  <div class="container home-lower-mixed">
    <div class="row">
      <div class="col-12 col-md-6">
        <?php
          if (esc_attr(get_option('home_form')['enable']) == 1):
            echo '<h2 class="text-center text-md-left h1">' . esc_attr(get_option('home_form')['headline']) . '</h2>';
            echo '<h2 class="text-center text-md-left">' . get_option('home_form_subline') . '</h2>' ;
            echo do_shortcode(get_option('home_form')['code']);


          endif;


            ?>
      </div>
      <div class="col-12 col-md-6 home-updates">
          <h2 class="text-center h1">Site Updates</h2>

          <?php

          $args = array(
            'post_type' => 'cob_updates',
            'post_per_page' => '3',
            'tax_query' => array(
              array(
                'taxonomy' => 'Display Locations',
                'field' => 'slug',
                'terms'    => 'home-display-page'
              )
            ) // tax_query
          ); // $args

          $query = new WP_Query( $args ); // custom wp_query

          if ( $query->have_posts() ) :

            while( $query->have_posts() ):
              $query->the_post();

              // *note* get_post_type == 'cob_ft_services.php'
              get_template_part( 'template-parts/content', get_post_type() );

            endwhile;
          endif;
          ?>
      </div><!-- .col-12 .col-md-6 .home-updates-->

    </div><!-- .row -->
  </div><!-- .container -->

  <?php wp_reset_postdata();

  return ob_get_clean();

}
add_shortcode('cobservices_home', 'cobservices_home_shortcode');

/*
 =========================================
 Home Page Shortcode | [cobservices_contact]
 =========================================
*/

function cobservices_contact_shortcode(){
  ob_start();
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

                    wp_reset_postdata();
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

  <?php
  endif; // Ends enabled verification for contact banner

  if(esc_attr(get_option('contact_form_enable')) == 1): ?>

  <div style="background-image:url('<?php echo get_template_directory_uri(); ?>/assets/contact-bk2.jpg'); background-size:cover; color:white">
    <div class="container">
      <div class="row justify-content-center">
        <h1><?php echo esc_attr(get_option('contact_form')['title']); ?></h1>
        <h2 style="text-align: center; width:100%"><?php echo esc_attr(get_option('contact_form')['subtitle']); ?></h2>
        <div class="col-sm-10 col-md-8 col-lg-5">
          <?php echo do_shortcode(get_option('contact_form')['code']); ?>
        </div>
      </div>
    </div>

  </div>

  <?php
  endif; // Ends enabled verification for contact form

  return ob_get_clean();

}
add_shortcode('cobservices_contact', 'cobservices_contact_shortcode');
