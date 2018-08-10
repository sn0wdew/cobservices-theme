<?php

/*
*
* Custom Post Type: Quick Tips
* Displayed on:     Home Page
*
 */

function COB_Services_Quick_Tips() {

// Set UI labels for Custom Post Type
    $labels = array(
        'name'                =>  'Quick Tips',
        'singular_name'       =>  'Quick Tip',
        'menu_name'           =>  'Quick Tips',
        'all_items'           =>  'All Quick Tips',
        'view_item'           =>  'View Quick Tip',
        'add_new_item'        =>  'Add New Quick Tip',
        'add_new'             =>  'Add New',
        'edit_item'           =>  'Edit Quick Tip',
        'update_item'         =>  'Update Quick Tip',
        'search_items'        =>  'Search Quick Tips',
        'not_found'           =>  'No Quick Tips Found',
        'not_found_in_trash'  =>  'No Quick Tips Found in Trash'
    );

// Set other options for Custom Post Type

    $args = array(
        'label'               =>  'quick tips',
        'description'         =>  'These tips are visable on the home page',
        'labels'              =>  $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'editor', 'revisions', 'page-attributes'),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        //'taxonomies'          => false,
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical'        => true,
        'query_var'           => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_icon'           => 'dashicons-megaphone',
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        // 'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => true,
        'publicly_queryable'  => true,
        'capability_type'     => 'post'
    );

    // Registering your Custom Post Type
    register_post_type( 'cob_tips', $args );

}
// Check if home tips was enabled before registering post type
if (esc_attr(get_option('home_tips_activate')) == 1){
  add_action( 'init', 'COB_Services_Quick_Tips' );
}

// Custom Column Display
add_filter( 'manage_cob_tips_posts_columns', 'cob_services_set_cob_tips_columns'); // Create custom $columns
add_action( 'manage_cob_tips_posts_custom_column', 'cob_services_customize_cob_tips_columns', 10, 2); // Change how custom columns are displayed. The reason there is a 2 is because two arguments are being passed

function cob_services_set_cob_tips_columns( $columns ){
  $newColumns = array();
  $newColumns['tip'] = 'Tip';
  $newColumns['order'] = 'Display Order';
  $newColumns['date'] = 'Date';
  return $newColumns;
}

function cob_services_customize_cob_tips_columns( $column, $post_id ){
  switch( $column ){
    case 'tip':
      echo get_the_content();
      break;
    case 'order':
      echo get_post_field( 'menu_order', $post_id);
      break;
  }
}

/*
*
* Custom Post Type: All Services
* Displayed on:     Home Page
*
 */

function COB_Services_All_Services() {

// Set UI labels for Custom Post Type
    $labels = array(
        'name'                =>  'All Services',
        'singular_name'       =>  'Service',
        'menu_name'           =>  'Services Offered',
        'all_items'           =>  'All Services',
        'view_item'           =>  'View Service',
        'add_new_item'        =>  'Add New Service',
        'add_new'             =>  'Add New',
        'edit_item'           =>  'Edit Service',
        'update_item'         =>  'Update Service',
        'search_items'        =>  'Search Services',
        'not_found'           =>  'No Service Found',
        'not_found_in_trash'  =>  'No Service Found in Trash'
    );

// Set other options for Custom Post Type

    $args = array(
        'label'               =>  'all services',
        'description'         =>  'These services are visable on the home page',
        'labels'              =>  $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions'),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        //'taxonomies'          => false,
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical'        => false,
        'query_var'           => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_icon'           => 'dashicons-universal-access-alt',
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        // 'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post'
    );

    // Registering your Custom Post Type
    register_post_type( 'cob_services', $args );

}

add_action( 'init', 'COB_Services_All_Services' );


/*
*
* Custom Post Type: cob_updates
* Displayed on:     Home Page, Whole Site
*
 */

function COB_Services_Site_Updates() {

// Set UI labels for Custom Post Type
    $labels = array(
        'name'                =>  'COB Services Updates',
        'singular_name'       =>  'Update',
        'menu_name'           =>  'Our Updates',
        'all_items'           =>  'All Updates',
        'view_item'           =>  'View Updates',
        'add_new_item'        =>  'Create New Update',
        'add_new'             =>  'Create',
        'edit_item'           =>  'Edit Update',
        'update_item'         =>  'Modify Update',
        'search_items'        =>  'Search Update',
        'not_found'           =>  'No such update found.',
        'not_found_in_trash'  =>  'No such update is in trash'
    );

// Set other options for Custom Post Type

    $args = array(
        'label'               =>  'updates',
        'description'         =>  'These updates are visable on a variety of pages',
        'labels'              =>  $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'editor', 'author', 'revisions'),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        //'taxonomies'          => false,
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical'        => false,
        'query_var'           => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_icon'           => 'dashicons-warning',
        'menu_position'       => 6,
        // 'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => true,
        'publicly_queryable'  => true,
        'capability_type'     => 'post'
    );

    // Registering your Custom Post Type
    register_post_type( 'cob_updates', $args );

}

add_action( 'init', 'COB_Services_Site_Updates' ); // Create custom post type

/*
*
* Custom Post Type: Forms Page
* Displayed on:     Forms Page
*
 */

function COB_Services_Form_Groups() {

// Set UI labels for Custom Post Type
    $labels = array(
        'name'                =>  'Form Groups',
        'singular_name'       =>  'Form Group',
        'menu_name'           =>  'Form Groups',
        'all_items'           =>  'All Form Groups',
        'view_item'           =>  'View Group',
        'add_new_item'        =>  'Add New Group',
        'add_new'             =>  'Add New',
        'edit_item'           =>  'Edit Group',
        'update_item'         =>  'Update Group',
        'search_items'        =>  'Search Groups',
        'not_found'           =>  'No Group Found',
        'not_found_in_trash'  =>  'No Group Found in Trash'
    );

// Set other options for Custom Post Type

    $args = array(
        'label'               =>  'all form groups',
        'description'         =>  'These groups are visable on the forms page',
        'labels'              =>  $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'revisions'),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        //'taxonomies'          => false,
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical'        => false,
        'query_var'           => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_icon'           => 'dashicons-portfolio',
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        // 'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post'
    );

    // Registering your Custom Post Type
    register_post_type( 'cob_forms', $args );

}

add_action( 'init', 'COB_Services_Form_Groups' );

/*
*
* Custom Post Type: cob_contacts
* Displayed on:     Contact Us, Services
*
 */

function COB_Services_Site_Contacts() {

// Set UI labels for Custom Post Type
    $labels = array(
        'name'                =>  'Contacts',
        'singular_name'       =>  'Contact',
        'menu_name'           =>  'Contacts',
        'all_items'           =>  'All Contacts',
        'view_item'           =>  'View Contacts',
        'add_new_item'        =>  'Create New Contact',
        'add_new'             =>  'Create',
        'edit_item'           =>  'Edit Contact',
        'update_item'         =>  'Modify Contact',
        'search_items'        =>  'Search Contact',
        'not_found'           =>  'No such contact found.',
        'not_found_in_trash'  =>  'No such contacts is in trash'
    );

// Set other options for Custom Post Type

    $args = array(
        'label'               =>  'contacts',
        'description'         =>  'People who faculty can reach out to.',
        'labels'              =>  $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions'),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        //'taxonomies'          => false,
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical'        => false,
        'query_var'           => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_icon'           => 'dashicons-id-alt',
        'menu_position'       => 6,
        // 'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post'
    );

    // Registering your Custom Post Type
    register_post_type( 'cob_contacts', $args );

}

add_action( 'init', 'COB_Services_Site_Contacts' ); // Create custom post type
