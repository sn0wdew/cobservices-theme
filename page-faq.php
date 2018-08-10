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

<div class="faq-search-container" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/emeriti-park.jpg')">
  <div class="container">
    <div class="row text-center justify-content-center">
      <div class="col">
        <h1>Search the website for answers</h1>
        <div id="faq-search-form"><?php get_search_form(); ?></div>
      </div>
    </div>
  </div>
</div>

<div class="container mb-5">
  <div class="mb-5 row justify-content-center">
    <div class="col-sm-12 col-md-6 text-center">
      <p class="h2">
        Need help with something that's not listed? Call <a href="#">(740) 566-7029</a> or email <a href="#">cobhelp@ohio.edu</a> today!
      </p>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12 col-md-6 col-lg-8">
      <?php the_content(); ?>
    </div>
    <div style="padding: 1rem 2rem; box-shadow: 0 3px 6px 1px rgba(0, 0, 0, 0.16)" class="col-sm-12 col-md-6 col-lg-4">
      <h1 class="text-center">FAQs</h1>
      <h2>Index:</h2>
      <?php echo do_shortcode("[faqs]"); ?>
    </div>
  </div>
</div>

<?php
get_footer();
