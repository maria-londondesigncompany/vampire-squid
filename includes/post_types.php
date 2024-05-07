<?php
/*
  ==========================================
   Custom Post Type
   ==========================================
*/

function register_theme_post_types() {

  $labels = array(
    'name'                  => _x( 'Partials', 'Post Type General Name', 'bespoke-theme' ),
    'singular_name'         => _x( 'Partial', 'Post Type Singular Name', 'bespoke-theme' ),
    'menu_name'             => __( 'Partials', 'bespoke-theme' ),
    'name_admin_bar'        => __( 'partial', 'bespoke-theme' ),
    'archives'              => __( 'Partial Archives', 'bespoke-theme' ),
    'parent_item_colon'     => __( 'Parent Partial:', 'bespoke-theme' ),
    'all_items'             => __( 'All Partials', 'bespoke-theme' ),
    'add_new_item'          => __( 'Add New Partial', 'bespoke-theme' ),
    'add_new'               => __( 'Add New', 'bespoke-theme' ),
    'new_item'              => __( 'New Partial', 'bespoke-theme' ),
    'edit_item'             => __( 'Edit Partial', 'bespoke-theme' ),
    'update_item'           => __( 'Update Partial', 'bespoke-theme' ),
    'view_item'             => __( 'View Partial', 'bespoke-theme' ),
    'search_items'          => __( 'Search Partial', 'bespoke-theme' ),
    'not_found'             => __( 'Not found', 'bespoke-theme' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'bespoke-theme' ),
    'featured_image'        => __( 'Featured Image', 'bespoke-theme' ),
    'set_featured_image'    => __( 'Set featured image', 'bespoke-theme' ),
    'remove_featured_image' => __( 'Remove featured image', 'bespoke-theme' ),
    'use_featured_image'    => __( 'Use as featured image', 'bespoke-theme' ),
    'insert_into_item'      => __( 'Insert into partial', 'bespoke-theme' ),
    'uploaded_to_this_item' => __( 'Uploaded to this partial', 'bespoke-theme' ),
    'items_list'            => __( 'Partials list', 'bespoke-theme' ),
    'items_list_navigation' => __( 'Partials list navigation', 'bespoke-theme' ),
    'filter_items_list'     => __( 'Filter partials list', 'bespoke-theme' ),
  );

  $args = array(
    'label'                 => __( 'partial', 'bespoke-theme' ),
    'description'           => __( 'Reusable Partial to be used on pages', 'bespoke-theme' ),
    'labels'                => $labels,
    'supports'              => array( 'title' ),
    'hierarchical'          => false,
    'public'                => false,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 15,
    'menu_icon'             => 'dashicons-align-center',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => false,
    'can_export'            => true,
    'has_archive'           => false,
    'exclude_from_search'   => false,
    'publicly_queryable'    => false,
    'capability_type'       => 'page',
  );

  register_post_type( 'partial', $args );

  $labels = array(
    'name'                  => _x( 'Case Studies', 'Post Type General Name', 'bespoke-theme' ),
    'singular_name'         => _x( 'Case Study', 'Post Type Singular Name', 'bespoke-theme' ),
    'menu_name'             => __( 'Case Studies', 'bespoke-theme' ),
    'name_admin_bar'        => __( 'Case Study', 'bespoke-theme' ),
    'archives'              => __( 'Study Archives', 'bespoke-theme' ),
    'parent_item_colon'     => __( 'Parent Study:', 'bespoke-theme' ),
    'all_items'             => __( 'All Studies', 'bespoke-theme' ),
    'add_new_item'          => __( 'Add New Study', 'bespoke-theme' ),
    'add_new'               => __( 'Add New', 'bespoke-theme' ),
    'new_item'              => __( 'New Study', 'bespoke-theme' ),
    'edit_item'             => __( 'Edit Study', 'bespoke-theme' ),
    'update_item'           => __( 'Update Study', 'bespoke-theme' ),
    'view_item'             => __( 'View Study', 'bespoke-theme' ),
    'search_items'          => __( 'Search Study', 'bespoke-theme' ),
    'not_found'             => __( 'Not found', 'bespoke-theme' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'bespoke-theme' ),
    'featured_image'        => __( 'Featured Image', 'bespoke-theme' ),
    'set_featured_image'    => __( 'Set featured image', 'bespoke-theme' ),
    'remove_featured_image' => __( 'Remove featured image', 'bespoke-theme' ),
    'use_featured_image'    => __( 'Use as featured image', 'bespoke-theme' ),
    'insert_into_item'      => __( 'Insert into study', 'bespoke-theme' ),
    'uploaded_to_this_item' => __( 'Uploaded to this study', 'bespoke-theme' ),
    'items_list'            => __( 'Studies list', 'bespoke-theme' ),
    'items_list_navigation' => __( 'Studies list navigation', 'bespoke-theme' ),
    'filter_items_list'     => __( 'Filter studies list', 'bespoke-theme' ),
  );

  $args = array(
    'label'                 => __( 'case_study', 'bespoke-theme' ),
    'description'           => __( 'Case Studies', 'bespoke-theme' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'thumbnail', ),
    'taxonomies'            => array( 'case_study_cat' ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-archive',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
  );

  register_post_type( 'case_study', $args );

  $labels = array(
    'name'                  => _x( 'Resources', 'Post Type General Name', 'bespoke-theme' ),
    'singular_name'         => _x( 'Resources', 'Post Type Singular Name', 'bespoke-theme' ),
    'menu_name'             => __( 'Resources', 'bespoke-theme' ),
    'name_admin_bar'        => __( 'Resources', 'bespoke-theme' ),
    'archives'              => __( 'Resources Archives', 'bespoke-theme' ),
    'parent_item_colon'     => __( 'Parent Resources:', 'bespoke-theme' ),
    'all_items'             => __( 'All Resources', 'bespoke-theme' ),
    'add_new_item'          => __( 'Add New Resources', 'bespoke-theme' ),
    'add_new'               => __( 'Add New', 'bespoke-theme' ),
    'new_item'              => __( 'New Resource', 'bespoke-theme' ),
    'edit_item'             => __( 'Edit Resource', 'bespoke-theme' ),
    'update_item'           => __( 'Update Resource', 'bespoke-theme' ),
    'view_item'             => __( 'View Resource', 'bespoke-theme' ),
    'search_items'          => __( 'Search Resource', 'bespoke-theme' ),
    'not_found'             => __( 'Not found', 'bespoke-theme' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'bespoke-theme' ),
    'featured_image'        => __( 'Featured Image', 'bespoke-theme' ),
    'set_featured_image'    => __( 'Set featured image', 'bespoke-theme' ),
    'remove_featured_image' => __( 'Remove featured image', 'bespoke-theme' ),
    'use_featured_image'    => __( 'Use as featured image', 'bespoke-theme' ),
    'insert_into_item'      => __( 'Insert into Resource', 'bespoke-theme' ),
    'uploaded_to_this_item' => __( 'Uploaded to this Resource', 'bespoke-theme' ),
    'items_list'            => __( 'Resources list', 'bespoke-theme' ),
    'items_list_navigation' => __( 'Resources list navigation', 'bespoke-theme' ),
    'filter_items_list'     => __( 'Filter Resources list', 'bespoke-theme' ),
  );

  $args = array(
    'label'                 => __( 'resources', 'bespoke-theme' ),
    'description'           => __( 'Resources', 'bespoke-theme' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'thumbnail', ),
    'taxonomies'            => array( 'resources_cat' ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-archive',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
  );

  register_post_type( 'resources', $args );
}

$labels = array(
  'name'                  => _x( 'Quiz', 'Post Type General Name', 'bespoke-theme' ),
  'singular_name'         => _x( 'Quiz', 'Post Type Singular Name', 'bespoke-theme' ),
  'menu_name'             => __( 'Quiz', 'bespoke-theme' ),
  'name_admin_bar'        => __( 'Quiz', 'bespoke-theme' ),
  'archives'              => __( 'Quiz Archives', 'bespoke-theme' ),
  'parent_item_colon'     => __( 'Parent Quiz:', 'bespoke-theme' ),
  'all_items'             => __( 'All Quiz', 'bespoke-theme' ),
  'add_new_item'          => __( 'Add New Quiz', 'bespoke-theme' ),
  'add_new'               => __( 'Add New', 'bespoke-theme' ),
  'new_item'              => __( 'New Quiz', 'bespoke-theme' ),
  'edit_item'             => __( 'Edit Quiz', 'bespoke-theme' ),
  'update_item'           => __( 'Update Quiz', 'bespoke-theme' ),
  'view_item'             => __( 'View Quiz', 'bespoke-theme' ),
  'search_items'          => __( 'Search Quiz', 'bespoke-theme' ),
  'not_found'             => __( 'Not found', 'bespoke-theme' ),
  'not_found_in_trash'    => __( 'Not found in Trash', 'bespoke-theme' ),
  'featured_image'        => __( 'Featured Image', 'bespoke-theme' ),
  'set_featured_image'    => __( 'Set featured image', 'bespoke-theme' ),
  'remove_featured_image' => __( 'Remove featured image', 'bespoke-theme' ),
  'use_featured_image'    => __( 'Use as featured image', 'bespoke-theme' ),
  'insert_into_item'      => __( 'Insert into Quiz', 'bespoke-theme' ),
  'uploaded_to_this_item' => __( 'Uploaded to this Quiz', 'bespoke-theme' ),
  'items_list'            => __( 'Quiz list', 'bespoke-theme' ),
  'items_list_navigation' => __( 'Quiz list navigation', 'bespoke-theme' ),
  'filter_items_list'     => __( 'Filter Quiz list', 'bespoke-theme' ),
);

$args = array(
  'label'                 => __( 'quiz', 'bespoke-theme' ),
  'description'           => __( 'Quiz', 'bespoke-theme' ),
  'labels'                => $labels,
  'supports'              => array( 'title', 'thumbnail', ),
  'taxonomies'            => array( 'quiz_cat' ),
  'hierarchical'          => false,
  'public'                => true,
  'show_ui'               => true,
  'show_in_menu'          => true,
  'menu_position'         => 5,
  'menu_icon'             => 'dashicons-email',
  'show_in_admin_bar'     => true,
  'show_in_nav_menus'     => true,
  'can_export'            => true,
  'has_archive'           => true,
  'exclude_from_search'   => false,
  'publicly_queryable'    => true,
  'capability_type'       => 'page',
);

register_post_type( 'quiz', $args );

add_action( 'init', 'register_theme_post_types', 0 );

