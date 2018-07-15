<?php
/**
 * COB Services Customize Theme
 *
 * Any front-end editing section appears here!
 *
 * @package COB_Services
 */

function COB_Services_Footer_Customize($wp_customize){

  // Creates Section in Customize menu called 'Home Feature'
  $wp_customize->add_section('cob-services-footer-section', array(
    'title'       => 'Footer Text',
    'priority'    => 111,
    'description' => 'This section only appears in the Footer.'
  ));

  // Create Footer Text, this is what you reference in your pages
  $footer_text = "CoB Services " . date("Y");

  $wp_customize->add_setting('cob-services-footer-text', array(
    'default' => $footer_text
  ));

  // Create Control for Title field
  $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'cob-services-footer-ctrl', array(
    'label'    => 'Footer Text',
    'section'  => 'cob-services-footer-section',
    'settings' => 'cob-services-footer-text'
  )));

  // // Create Subline field
  // $wp_customize->add_setting('cob-services-hf-subline', array(
  //   'default' => 'Example Subline Text!'
  // ));
  //
  // // Create Control for Subline field
  // $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'cob-services-hf-subline-ctrl', array(
  //   'label'    => 'Subline Text',
  //   'section'  => 'cob-services-hf-section',
  //   'settings' => 'cob-services-hf-subline',
  //   'type'     => 'textarea'
  // )));
  //
  // // Create Button Text field
  // $wp_customize->add_setting('cob-services-hf-button', array(
  //   'default' => 'Go!'
  // ));
  //
  // // Create Control for Subline field
  // $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'cob-services-hf-button-ctrl', array(
  //   'label'    => 'Button Text',
  //   'section'  => 'cob-services-hf-section',
  //   'settings' => 'cob-services-hf-button'
  // )));
  //
  // // Create Button Link field
  // $wp_customize->add_setting('cob-services-hf-link');
  //
  // // Create Control for Button Link field
  // $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'cob-services-hf-link-ctrl', array(
  //   'label'    => 'Button Link',
  //   'section'  => 'cob-services-hf-section',
  //   'settings' => 'cob-services-hf-link',
  //   'type'     => 'dropdown-pages'
  // )));
  //
  // // Create Feature Image field
  // $wp_customize->add_setting('cob-services-hf-image');
  //
  // // Create Control for Image field
  // $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'cob-services-hf-image-ctrl', array(
  //   'label'    => 'Featured Image',
  //   'section'  => 'cob-services-hf-section',
  //   'settings' => 'cob-services-hf-image'
  // )));

}

add_action('customize_register', 'COB_Services_Footer_Customize');
