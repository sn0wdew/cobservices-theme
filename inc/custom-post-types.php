<?php

/*

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
