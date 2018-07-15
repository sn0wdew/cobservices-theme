<?php
/**
 * The template for displaying custom taxonomys
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package COB_Services
 */

 /*
 *
 * Custom Post Type: cob_updates
 * Taxonomy:				 Display Locations
 *
*/

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

 /*
 *
 * Custom Post Type: cob_contacts
 * Taxonomy:				 Service Departments
 *
*/

function COB_Services_Site_Contacts_Taxonomy(){
   $labels = array(
     'name' => 'Service Departments',
     'singular_name' => 'Service Department',
     'search_items' => 'Search Department',
     'all_items' => 'All Departments',
     'edit_item' => 'Edit Department',
     'update_item' => 'Update Department',
     'add_new_item' => 'Add New Department',
     'new_item_name' => 'Name of New Service Department',
     'menu_name' => 'Service Departments'
   );

   $args = array(
     'hierarchical' => true,
     'labels' => $labels,
     'show_ui' => true,
     'show_admin_column' => true,
     'query_var' => true,
     'rewrite' => array('slug' => 'service_departments')
   );

 register_taxonomy( 'Service Departments', 'cob_contacts', $args );
 }

 add_action( 'init', 'COB_Services_Site_Contacts_Taxonomy' ); // Create custom taxonomy

 // Custom Column Display
 add_filter( 'manage_cob_contacts_posts_columns', 'cob_services_set_cob_contacts_columns'); // Create custom $columns
 add_action( 'manage_cob_contacts_posts_custom_column', 'cob_services_customize_cob_contacts_columns', 10, 2); // Change how custom columns are displayed. The reason there is a 2 is because two arguments are being passed

 function cob_services_set_cob_contacts_columns( $columns ){
   $newColumns = array();
   $newColumns['title'] = 'Name';
   $newColumns['category'] = 'Service Departments';
   $newColumns['image'] = 'Profile Image';
   $newColumns['date'] = 'Date';
   return $newColumns;
 }

 function cob_services_customize_cob_contacts_columns( $column, $post_id ){
   switch( $column ){
     case 'editor':
       echo get_the_content();
       break;
     case 'category':
       $terms_list = wp_get_post_terms($post_id, 'Service Departments');
       $i = 0;
       foreach ($terms_list as $term ) {
         $i++;
         if ($i > 1){ echo ", ";}
         echo $term->name;
       }
       break;
      case 'image':

        if (has_post_thumbnail()){
          $url = get_the_post_thumbnail_url();
          echo '<img src="' . $url .'" height="56px" width="auto" >';
        }

        break;

   }
 }
