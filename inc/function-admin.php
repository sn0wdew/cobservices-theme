<?php
/**
 * COB Services Admin Page Functions
 *
 * @package COB_Services
 */

// Register admin scripts
function cob_admin_enque_scripts(){
  wp_register_script( 'cob-admin-script', get_template_directory_uri() . '/js/cob-admin.js', array('jquery'), '1.0.0', true);
  wp_enqueue_script('cob-admin-script' );
  wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'cob_admin_enque_scripts');

// Generate Admin Control Page
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
    // Activate custom settings on home page
    add_action( 'admin_init', 'cob_services_custom_home_settings' );

  // Genereate Contact Sub-Page
  add_submenu_page( $admin_menu_slug, 'Contact Page Options', 'Contact', 'manage_options', 'cob_options_contact', 'cob_theme_create_contact_page');
    // Activate custom settings on contact page
    add_action( 'admin_init', 'cob_services_custom_contact_settings' );

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


  // --------- Home Quick Tips ---------//
  $current_section = 'cob-services-home-tips-options'; // Section for Variables
    // Section
  add_settings_section( $current_section, 'Home Tips', 'cob_services_home_tips_options_callback', $current_page);
    // Fields
  add_settings_field( 'home-tips-enable', 'Enable Tips', 'cob_services_home_enable_callback', $current_page, $current_section ); // Field - Headline
  add_settings_field( 'home-tips-headline', 'Headline', 'cob_services_home_headline_callback', $current_page, $current_section ); // Field - Headline
  add_settings_field( 'home-tips-subline', 'Subline', 'cob_services_home_subline_callback', $current_page, $current_section ); // Field - Subline
  add_settings_field( 'home-tips-bk', 'Background Image', 'cob_services_home_bk_callback', $current_page, $current_section ); // Field - Subline
    // Register Settings for 'home-feature'
  register_setting( $current_group, 'home_tips');
  register_setting( $current_group, 'home_tips_activate');

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

  // --------- Home Form Section ---------//
  $current_section = 'cob-services-home-form-options'; // Section for Variables
    // Section
  add_settings_section( $current_section, 'Home Form', 'cob_services_home_form_options_callback', $current_page);
    // Fields
  add_settings_field( 'home-form-enable', 'Enable Form', 'cob_services_home_form_enable_callback', $current_page, $current_section ); // Field - Headline
  add_settings_field( 'home-form-headline', 'Headline', 'cob_services_home_form_headline_callback', $current_page, $current_section ); // Field - Headline
  add_settings_field( 'home-form-subline', 'Subline', 'cob_services_home_form_subline_callback', $current_page, $current_section ); // Field - Subline
  add_settings_field( 'home-form-shortcode', 'Shortcode', 'cob_services_home_form_code_callback', $current_page, $current_section ); // Field - Subline
    // Register Settings for 'home-feature'
  register_setting( $current_group, 'home_form');
  register_setting( $current_group, 'home_form_subline', 'cob_sanitize_wysiwyg');
}

 // Contact Page Settings
function cob_services_custom_contact_settings(){
  $current_page = 'cob_theme_create_contact_page'; // Current Page of all settings
  $current_group = 'cob-services-settings-contact-group'; // 1 group per page

  // --------- Contact Title Options ---------//
  $current_section = 'cob-services-contact-main-options'; // Section for Variables
    // Section
  add_settings_section( $current_section, 'Page Options', 'cob_services_contact_main_options', $current_page );
    // Fields
  add_settings_field( 'contact-title', 'Title', 'cob_services_contanct_title_callback', $current_page, $current_section );
  add_settings_field( 'contact-subtitle', 'Subtitle', 'cob_services_contanct_subtitle_callback', $current_page, $current_section );
    // Register Settings for 'home-feature'
  register_setting( $current_group, 'contact_main');
  register_setting( $current_group, 'contact_main_subtitle', 'cob_sanitize_wysiwyg' );

  // --------- Contact Banner Options ---------//
  $current_section = 'cob-services-contact-banner-options'; // Section for Variables
    // Section
  add_settings_section( $current_section, 'Banner Options', 'cob_services_contact_banner_options', $current_page );
    // Fields
  add_settings_field( 'contact-button-enable', 'Enable Banner', 'cob_services_contanct_banner_enable_callback', $current_page, $current_section );
  add_settings_field( 'contact-banner-text', 'Banner Text', 'cob_services_contanct_banner_text_callback', $current_page, $current_section );
  add_settings_field( 'contact-button-text', 'Button Text', 'cob_services_contanct_button_text_callback', $current_page, $current_section );
  add_settings_field( 'contact-button-link', 'Button Link', 'cob_services_contanct_button_link_callback', $current_page, $current_section );
    // Register Settings for 'home-feature'
  register_setting( $current_group, 'contact_banner_enable');
  register_setting( $current_group, 'contact_banner');

}


/****************************************************
 *                Section Functions                 *
 ****************************************************/

 // Home Quick Tips
function cob_services_home_tips_options_callback(){
echo "<p>These options are for the home tips section on the home page.</p>";
}

 // Home Banner Section
function cob_services_home_banner_options(){
  echo "<p>These options are for the Banner module on the home page.</p>";
}

function cob_services_home_form_options_callback(){
  echo "<p>These options are for the form module on the home page.</p>";
}

// Contact Main Section
function cob_services_contact_main_options(){
  echo "<p>These options are for the Contact page.</p>";
}

// Contact Banner Section
function cob_services_contact_banner_options(){

}

/****************************************************
 *                  Field Functions                 *
 ****************************************************/

// Home Quick Tips - Enable
function cob_services_home_enable_callback(){
  $options = get_option('home_tips_activate');
  echo '<input id="home_tips_activate" type="checkbox" name="home_tips_activate" value="1" ';
  if ( $options == 1 ) {
    echo 'checked';
  }
  echo ' />';
  echo '<label for="home_tips_activate">Display Home Tips? (default is checked)</label>';
}

// Home Quick Tips - Headline
function cob_services_home_headline_callback(){
  $options = get_option('home_tips'); // Get value
  echo '<input type="text" name="home_tips[headline]" value="' . esc_attr($options['headline']) . '" placeholder="Headline Text" />';
}

// Home Quick Tips - Subline
function cob_services_home_subline_callback(){
  $options = get_option('home_tips'); // Get value
  echo '<textarea name="home_tips[subline]" placeholder="Subline Text" rows="4" cols="50" >' . esc_attr($options['subline']) . '</textarea>';
}

// Home Quick Tips - BK Image
function cob_services_home_bk_callback(){
  $options = get_option('home_tips'); // Get value
  echo '<input id="tips-upload-button" class="button button-secondary" type="button" value="Upload BK Image" />';
  echo '<input id="tips-upload-button-rm" class="button button-secondary" type="button" value="Remove BK Image" />';
  echo '<input id="tips-bk-image" type="hidden" name="home_tips[bk]" value="' . esc_attr($options['bk']) . '" />';
}

// // Home Feature - Button Text
// function cob_services_home_button_text_callback(){
//   $options = get_option('home_feature'); // Get value
//   echo '<input type="text" name="home_feature[button_text]" value="' . esc_attr($options['button_text']) . '" placeholder="Button Text" />';
// }
//
// // Home Feature - Button Link
// function cob_services_home_button_link_callback(){
//   $options = get_option('home_feature'); // Get value
//   wp_dropdown_pages(
//         array(
//              'name' => 'home_feature[button_link]',
//              'echo' => 1,
//              'show_option_none' => __( '&mdash; Select &mdash;' ),
//              'option_none_value' => '0',
//              'selected' => $options['button_link']
//         )
//     );
// }

 // Home Banner - Activate
function cob_services_home_banner_activate_callback(){
  $options = esc_attr(get_option('home_banner_activate'));
  echo '<input id="checkbox_banner_activate" type="checkbox" name="home_banner_activate" value="1"';
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

// Home Form - Enable
function cob_services_home_form_enable_callback(){
  $options = get_option('home_form');
  echo '<input id="home_form[enable]" type="checkbox" name="home_form[enable]" value="1"';
  if ( $options['enable'] == 1 ) {
    echo ' checked';
  }
  echo ' />';
  echo '<label for="home_form[enable]">Display Home Form Section? (default is checked)</label>';
}

// Home Form - Headline
function cob_services_home_form_headline_callback(){
  $options = get_option('home_form');
  echo '<input type="text" name="home_form[headline]" value="' . esc_attr($options['headline']) . '" placeholder="Headline Text" />';
}

// Home Form - Subline
function cob_services_home_form_subline_callback(){
  $options = get_option('home_form_subline');
  $args = array(
    'textarea_name' => 'home_form_subline',
    'textarea_rows' => '5',
    'media_buttons' => false,
    'teeny' => true
  );

  echo wp_editor( $options, 'homeformsubline', $args );
}

// Home Form - Short Code
function cob_services_home_form_code_callback(){
  $options = get_option('home_form');
  echo '<input type="text" name="home_form[code]" value="' . esc_attr($options['code']) . '" placeholder="[shortcode]" />';
  echo '<label for="home_form[code]">To find the shortcode, open any page, insert a form using the tool, and copy the [code] including brackets</label>';
}

// Contact Page Options - Title
function cob_services_contanct_title_callback(){
  $options = get_option('contact_main'); // Get value
  echo '<input type="text" name="contact_main[title]" value="' . esc_attr($options['title']) . '" placeholder="Contact" />';
}

// Contact Page Options - Subtitle
function cob_services_contanct_subtitle_callback(){
  $options = get_option('contact_main_subtitle'); // Get value

  $args = array(
    'textarea_name' => 'contact_main_subtitle',
    'textarea_rows' => '5',
    'media_buttons' => false,
    'teeny' => true
  );

  echo wp_editor( $options, 'cobcontactsub', $args );
}

// Contact Banner Options - Enable
function cob_services_contanct_banner_enable_callback(){
  $options = esc_attr(get_option('contact_banner_enable'));
  echo '<input id ="contact_banner_enable" type="checkbox" name="contact_banner_enable" value="1"';
  if ( $options == 1 ) {
    echo ' checked';
  }
  echo ' />';
  echo '<label for="contact_banner_enable">Display this banner? (default is checked)</label>';
}

// Contact Banner Options - Banner Text
function cob_services_contanct_banner_text_callback(){
  $options = get_option('contact_banner'); // Get value
  echo '<input type="text" name="contact_banner[banner_text]" value="' . esc_attr($options['banner_text']) . '" placeholder="Banner Text" size="30" />';
}

// Contact Banner Options - Button Text
function cob_services_contanct_button_text_callback(){
  $options = get_option('contact_banner'); // Get value
  echo '<input type="text" name="contact_banner[button_text]" value="' . esc_attr($options['button_text']) . '" placeholder="Button Text" />';
}

// Contact Banner Options - Button Link
function cob_services_contanct_button_link_callback(){
  $options = get_option('contact_banner'); // Get value
  echo '<input type="text" name="contact_banner[button_link]" value="' . esc_attr($options['button_link']) . '" placeholder="Button Link" />';
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

function cob_theme_create_contact_page() {
  // Page HTMl
  require_once( get_template_directory() . '/inc/templates/cob-services-contact.php' );
}
