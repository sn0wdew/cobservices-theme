<?php

/*
*
* Custom Post Type: Featured Services
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
        'query_var'           => ture,
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

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

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
        'query_var'           => ture,
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
        'query_var'           => ture,
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

/*
 =========================== - - - - - - - =================
 Contact Custom Meta Field | cob_contacts | contact_location
 ========================== - - - - - - - ==================
*/

function COB_Services_Contacts_meta_box() {
  add_meta_box('contact_location', 'Office Location', 'cob_contact_location_callback', 'cob_contacts', 'side' );
}

add_action( 'add_meta_boxes', 'COB_Services_Contacts_meta_box');

// Callback Function
function cob_contact_location_callback( $post ){
  // Create nonce field
  wp_nonce_field('cob_save_contact_location_data', 'cob_contact_location_meta_box_nonce');
  $value = get_post_meta( $post->ID, '_cob_contact_location_value_key', true);

  // Print Input Box
  echo '<label for="cob_contact_location_field">Office Location of Contact</label>';
  echo '<input type="text" id="cob_contact_location_field" name="cob_contact_location_field" value="' . esc_attr($value) . '" size="15" />';
}

// Save function
function cob_save_contact_location_data( $post_id ){

  // Check if nonce was set when 'save button' is clicked - security
  if( ! isset( $_POST['cob_contact_location_meta_box_nonce'])){
    return; // hard stop to prevent malicious data
  }

  // Check if nonce was generated by wordpress, not manually
  if ( ! wp_verify_nonce( $_POST['cob_contact_location_meta_box_nonce'], 'cob_save_contact_location_data' )){
    return;
  }

  // Verify user has correct permission to write data
  if ( ! current_user_can('edit_post', $post_id)){
    return;
  }

  // Verify data is actually in the box
  if( ! isset( $_POST['cob_contact_location_field'])){
    return;
  }

  // Sanatize the data before saving it
  $custom_data = sanitize_text_field( $_POST['cob_contact_location_field'] );

  update_post_meta( $post_id, '_cob_contact_location_value_key', $custom_data);

}

add_action( 'save_post', 'cob_save_contact_location_data');
