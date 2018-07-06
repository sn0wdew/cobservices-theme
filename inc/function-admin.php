<?php
/**
 * COB Services Admin Page Functions
 *
 * @package COB_Services
 */


function COB_Services_admin_page() {
  $admin_page_title = 'COB Services Theme Options';
  $admin_menu_title = 'Theme Opt';
  $admin_menu_slug = 'cob_options';
  $custom_icon_url = get_template_directory_uri() . '/assets/admin-page-icon.png';

  // Genereate Main Page
  add_menu_page( $admin_page_title, $admin_menu_title, 'manage_options', $admin_menu_slug,
                 'cob_theme_create_page_callback', $custom_icon_url, 110 );

  // Genereate General Page
  add_submenu_page( $admin_menu_slug, 'COB Services Theme Options', 'General', 'manage_options', $admin_menu_slug, 'cob_theme_create_page_callback');

  // Genereate Home Settings Sub-Page
  add_submenu_page( $admin_menu_slug, 'Home Options', 'Home', 'manage_options', 'cob_options_home', 'cob_theme_create_home_page');

  // Genereate Services Settings Sub-Page
  add_submenu_page( $admin_menu_slug, 'Services Options', 'Services', 'manage_options', 'cob_options_all_services', 'cob_theme_create_all_services_page');

  // Activate custom settings on home page
  add_action( 'admin_init', 'cob_services_custom_home_settings' );
}

// Main action to add admin menu
add_action('admin_menu', 'COB_Services_admin_page');


/****************************************************
 *                   All Settings                   *
 ****************************************************/

 // Home Page Settings
function cob_services_custom_home_settings(){
  $current_page = 'cob_theme_create_home_page'; // Current Page of all settings
  $current_group = 'cob-services-settings-home-group'; // 1 group per page


  // --------- Home Page Feature ---------//
  $current_section = 'cob-services-home-feature-options'; // Section for Variables
    // Section
  add_settings_section( $current_section, 'Home Feature Options', 'cob_services_home_feature_options_callback', $current_page);
    // Fields
  add_settings_field( 'home-feature-headline', 'Headline', 'cob_services_home_headline_callback', $current_page, $current_section ); // Field - Headline
  add_settings_field( 'home-feature-subline', 'Subline', 'cob_services_home_subline_callback', $current_page, $current_section ); // Field - Subline
  add_settings_field( 'home-feature-button-text', 'Button Text', 'cob_services_home_button_text_callback', $current_page, $current_section ); // Field - Button Text
  add_settings_field( 'home-feature-button-link', 'Button Link To', 'cob_services_home_button_link_callback', $current_page, $current_section ); // Field - Button Link
    // Register Settings for 'home-feature'
  register_setting( $current_group, 'home_feature');


  // --------- Banner Options ---------//
  $current_section = 'cob-services-home-banner-options'; // Section for Variables
    // Section
  add_settings_section( $current_section, 'Banner Options', 'cob_services_home_banner_options', $current_page );
    // Setting - Activate Module
  add_settings_field('home-banner-activate', 'Show Banner', 'cob_services_home_banner_activate_callback', $current_page, $current_section );
  register_setting( $current_group, 'home_banner_activate' );
    // Setting - Text to display in Module
  add_settings_field( 'home-banner-text', 'Banner Text', 'cob_services_home_banner_text', $current_page, $current_section );
  register_setting( $current_group, 'home_banner_text', 'cob_sanitize_wysiwyg' );

  // --------- Featured Updates ---------//
  
}


/****************************************************
 *                Section Functions                 *
 ****************************************************/

 // Home Feature Section
function cob_services_home_feature_options_callback(){
echo "<p>These options are for the Feature module on the home page.</p>";
}

 // Home Banner Section
function cob_services_home_banner_options(){
  echo "<p>These options are for the Banner module on the home page.</p>";
}


/****************************************************
 *                  Field Functions                 *
 ****************************************************/

// Home Feature - Headline
function cob_services_home_headline_callback(){
  $options = get_option('home_feature'); // Get value
  echo '<input type="text" name="home_feature[headline]" value="' . esc_attr($options['headline']) . '" placeholder="Headline Text" />';
}

// Home Feature - Subline
function cob_services_home_subline_callback(){
  $options = get_option('home_feature'); // Get value
  echo '<textarea name="home_feature[subline]" placeholder="Subline Text" rows="4" cols="50" >' . esc_attr($options['subline']) . '</textarea>';
}

// Home Feature - Button Text
function cob_services_home_button_text_callback(){
  $options = get_option('home_feature'); // Get value
  echo '<input type="text" name="home_feature[button_text]" value="' . esc_attr($options['button_text']) . '" placeholder="Button Text" />';
}

function cob_services_home_button_link_callback(){
  $options = get_option('home_feature'); // Get value
  wp_dropdown_pages(
        array(
             'name' => 'home_feature[button_link]',
             'echo' => 1,
             'show_option_none' => __( '&mdash; Select &mdash;' ),
             'option_none_value' => '0',
             'selected' => $options['button_link']
        )
    );
}

 // Home Banner - Activate
function cob_services_home_banner_activate_callback(){
  $options = esc_attr(get_option('home_banner_activate'));
  echo '<input id ="checkbox_banner_activate" type="checkbox" name="home_banner_activate" value="1"';
  if ( $options == 1 ) {
    echo ' checked';
  }
  echo ' />';
  echo '<label for="checkbox_banner_activate">Display this banner? (default is checked)</label>';
}

// Home Banner - Text
function cob_services_home_banner_text(){
  $options = get_option('home_banner_text');

  $args = array(
    'textarea_name' => 'home_banner_text',
    'textarea_rows' => '5',
    'media_buttons' => false,
    'teeny' => true
  );

  echo wp_editor( $options, 'cobbannertext', $args );
}


/****************************************************
 *                Sanatize Functions                *
 ****************************************************/

function cob_sanitize_wysiwyg( $input ) {
  $input = strip_tags($input, '<a>');
  return $input;
}

/****************************************************
 *                  Page Functions                  *
 ****************************************************/

function cob_theme_create_page_callback() {
  // Page HTML
  require_once( get_template_directory() . '/inc/templates/cob-services-general.php' );
}

function cob_theme_create_home_page() {
  // Page HTMl
  require_once( get_template_directory() . '/inc/templates/cob-services-home.php' );
}

function cob_theme_create_all_services_page() {

}
