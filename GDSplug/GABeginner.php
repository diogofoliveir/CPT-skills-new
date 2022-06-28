<?php


// Plugin Name: GABeginner Register Custom Post Types
// Plugin URI: http://realise.com
// Description: Plugin to register the GABSVN post type
// Version: 120.0
// Author: Gabriel_FDS
// Author URI:http://realise.com
// Textdomain: GABSVN
// License: GPLv2


// <!-- // Our custom post type function -->

function create_posttype() {
  
    register_post_type( 'movies',
    // <!-- // CPT Options -->
        array(
            'labels' => array(
                'name' => __( 'Movies' ),
                'singular_name' => __( 'Movie' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'movies'),
            'show_in_rest' => true,
  
        )
    );
}

// <!-- // Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );


// <!-- ------------------------------------------>











?>



