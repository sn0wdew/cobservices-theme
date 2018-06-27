<?php
/**
 * COB Services Admin Page Functions
 *
 * @package COB_Services
 */


function COB_Services_admin_page() {

  /****************************************************
   *                  Generate  Pages                 *
   ****************************************************/

  // Genereate Main Page
  add_menu_page( 'COB Services Theme Options',
                 'Theme Opt', 'manage_options', 'cob_options',
                 'cob_theme_create_page',
                 get_template_directory_uri() . '/assets/admin-page-icon.png',
                 110 );

  // Genereate General Page
  add_submenu_page( 'cob_options', 'COB Services Theme Options', 'General', 'manage_options', 'cob_options', 'cob_theme_create_page');

  // Genereate Home Settings Page
  add_submenu_page( 'cob_options', 'Home Options', 'Home', 'manage_options', 'cob_options_home', 'cob_theme_create_home_page');

  // Genereate Services Settings Page
  add_submenu_page( 'cob_options', 'Services Options', 'Services', 'manage_options', 'cob_options_all_services', 'cob_theme_create_all_services_page');

}


// Main action to add admin menu
add_action('admin_menu', 'COB_Services_admin_page');


/****************************************************
 *                  Page Functions                  *
 ****************************************************/

function cob_theme_create_page() {
  // Page HTML
  require_once( get_template_directory() . '/inc/templates/cob-services-general.php' );
}

function cob_theme_create_home_page() {
  // Page HTMl
  require_once( get_template_directory() . '/inc/templates/cob-services-home.php' );
}

function cob_theme_create_all_services_page() {

}
