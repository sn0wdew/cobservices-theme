<?php
// New function for home page Feature

function COB_Services_Home_Feature($wp_customize){

  // Creates Section in Customize menu called 'Home Feature'
  $wp_customize->add_section('cob-services-hf-section', array(
    'title'       => 'Home Feature',
    'priority'    => 111,
    'description' => 'This section only appears on the home page.'
  ));

  // Create Title field, this is what you reference in your pages
  $wp_customize->add_setting('cob-services-hf-headline', array(
    'default' => 'Example Headline Text!'
  ));

  // Create Control for Title field
  $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'cob-services-hf-headline-ctrl', array(
    'label'    => 'Headline',
    'section'  => 'cob-services-hf-section',
    'settings' => 'cob-services-hf-headline'
  )));

  // Create Subline field
  $wp_customize->add_setting('cob-services-hf-subline', array(
    'default' => 'Example Subline Text!'
  ));

  // Create Control for Subline field
  $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'cob-services-hf-subline-ctrl', array(
    'label'    => 'Subline Text',
    'section'  => 'cob-services-hf-section',
    'settings' => 'cob-services-hf-subline',
    'type'     => 'textarea'
  )));

  // Create Button Text field
  $wp_customize->add_setting('cob-services-hf-button', array(
    'default' => 'Go!'
  ));

  // Create Control for Subline field
  $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'cob-services-hf-button-ctrl', array(
    'label'    => 'Button Text',
    'section'  => 'cob-services-hf-section',
    'settings' => 'cob-services-hf-button'
  )));

  // Create Button Link field
  $wp_customize->add_setting('cob-services-hf-link');

  // Create Control for Button Link field
  $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'cob-services-hf-link-ctrl', array(
    'label'    => 'Button Link',
    'section'  => 'cob-services-hf-section',
    'settings' => 'cob-services-hf-link',
    'type'     => 'dropdown-pages'
  )));

  // Create Feature Image field
  $wp_customize->add_setting('cob-services-hf-image');

  // Create Control for Image field
  $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'cob-services-hf-image-ctrl', array(
    'label'    => 'Featured Image',
    'section'  => 'cob-services-hf-section',
    'settings' => 'cob-services-hf-image'
  )));

}

add_action('customize_register', 'COB_Services_Home_Feature');
