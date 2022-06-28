<?php



/*

Plugin Name: Register Custom Post Types GABSVN
Plugin URI: http://realise.com
Description: Plugin to register the GABSVN post type
Version: 10.0
Author: Gabriel_FDS
Author URI:http://realise.com
Textdomain: GABSVN
License: GPLv2

*/



// * Creating a function to create our CPT
// */
  
function custom_post_type() {
  
    // Set UI labels for Custom Post Type -->
    
        $labels = array(
            'name'                => _x( 'Movies', 'Post Type General Name', 'twentytwentyone' ),
            'singular_name'       => _x( 'Movie', 'Post Type Singular Name', 'twentytwentyone' ),
            'menu_name'           => __( 'Movies', 'twentytwentyone' ),
            'parent_item_colon'   => __( 'Parent Movie', 'twentytwentyone' ),
            'all_items'           => __( 'All Movies', 'twentytwentyone' ),
            'view_item'           => __( 'View Movie', 'twentytwentyone' ),
            'add_new_item'        => __( 'Add New Movie', 'twentytwentyone' ),
            'add_new'             => __( 'Add New', 'twentytwentyone' ),
            'edit_item'           => __( 'Edit Movie', 'twentytwentyone' ),
            'update_item'         => __( 'Update Movie', 'twentytwentyone' ),
            'search_items'        => __( 'Search Movie', 'twentytwentyone' ),
            'not_found'           => __( 'Not Found', 'twentytwentyone' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'twentytwentyone' ),
        );
          
    // Set other options for Custom Post Type -->
          
        $args = array(
            'label'               => __( 'movies', 'twentytwentyone' ),
            'description'         => __( 'Movie news and reviews', 'twentytwentyone' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor -->
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            // You can associate this CPT with a taxonomy or custom taxonomy.  -->
            'taxonomies'          => array( 'genres' ),
            /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */ 
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            'show_in_rest' => true,
      
        );
          
        // Registering your Custom Post Type
        register_post_type( 'movies', $args );



  // Déclaration de la Taxonomie
  $labels = array(
    'name' => 'Type de projets',
    'new_item_name' => 'Nom du nouveau Projet',
    'parent_item' => 'Type de projet parent',
);

$args = array( 
    'labels' => $labels,
    'public' => true, 
    'show_in_rest' => true,
    'hierarchical' => true, 
);

register_taxonomy( 'type-projet', 'portfolio', $args );


      
    }
      
    // //  /* Hook into the 'init' action so that the function
    // * Containing our post type registration is not 
    // * unnecessarily executed. 
    // */ -->
      
    add_action( 'init', 'custom_post_type', 0 );








    ?>

    