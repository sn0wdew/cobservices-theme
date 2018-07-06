<?php

/*
*
* Custom Post Type: Featured Services
* Displayed on:     Home Page
*
 */

function COB_Services_Featured_Services() {

// Set UI labels for Custom Post Type
    $labels = array(
        'name'                =>  'Featured Services',
        'singular_name'       =>  'Featured Service',
        'menu_name'           =>  'Featured Services',
        'all_items'           =>  'All Ft. Services',
        'view_item'           =>  'View Ft. Services',
        'add_new_item'        =>  'Add New Ft. Service',
        'add_new'             =>  'Add New',
        'edit_item'           =>  'Edit Ft. Service',
        'update_item'         =>  'Update  Ft. Service',
        'search_items'        =>  'Search  Ft. Service',
        'not_found'           =>  'No Ft. Service Found',
        'not_found_in_trash'  =>  'No Ft. Service Found in Trash'
    );

// Set other options for Custom Post Type

    $args = array(
        'label'               =>  'featured services',
        'description'         =>  'These featured services are visable only on the home page',
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
        'exclude_from_search' => true,
        'publicly_queryable'  => true,
        'capability_type'     => 'post'
    );

    // Registering your Custom Post Type
    register_post_type( 'cob_ft_services', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action( 'init', 'COB_Services_Featured_Services' );


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

// Custom Taxonomy for COB Updates
function COB_Services_Site_Updates_Taxonomy(){
  $labels = array(
    'name' => 'Display Locations',
    'singular_name' => 'Display Location',
    'search_items' => 'Search Displays',
    'all_items' => 'All Displays',
    'edit_item' => 'Edit Location',
    'update_item' => 'Update Location',
    'add_new_item' => 'Add New Location',
    'new_item_name' => 'Name of New Location',
    'menu_name' => 'Display Locations'
  );

  $args = array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'locations_of_updates')
  );

register_taxonomy( 'Display Locations', 'cob_updates', $args );
}

add_action( 'init', 'COB_Services_Site_Updates_Taxonomy' ); // Create custom taxonomy

// Custom Column Display
add_filter( 'manage_cob_updates_posts_columns', 'cob_services_set_cob_updates_columns'); // Create custom $columns
add_action( 'manage_cob_updates_posts_custom_column', 'cob_services_customize_cob_updates_columns', 10, 2); // Change how custom columns are displayed. The reason there is a 2 is because two arguments are being passed

function cob_services_set_cob_updates_columns( $columns ){
  unset( $columns['title']);
  $newColumns = array();
  $newColumns['editor'] = 'Update';
  $newColumns['category'] = 'Displayed On';
  $newColumns['author'] = 'Created By';
  $newColumns['date'] = 'Date';
  return $newColumns;
}

function cob_services_customize_cob_updates_columns( $column, $post_id ){
  switch( $column ){
    case 'editor':
      echo get_the_content();
      break;
    case 'category':
      $terms_list = wp_get_post_terms($post_id, 'Display Locations');
      $i = 0;
      foreach ($terms_list as $term ) {
        $i++;
        if ($i > 1){ echo ", ";}
        echo $term->name;
      }
      break;

  }
}
