<?php



/*

Plugin Name: GABSVN Custom Post Types Register
Plugin URI: http://realise.com
Description: Plugin to register the GABSVN post type
Version: 10.0
Author: Gabriel_FDS
Author URI:http://realise.com
Textdomain: GABSVN
License: GPLv2

*/


// La vie est bella et toi ?

function GABSVN_register_post_type() {


    /*Définir les étiquettes pour votre type de message personnalisé*/


        $labels = array(
                        'name' => __( ‘Books’, ‘GABSVN’ ),
                        'singular_name' => __( 'Book', ‘GABSVN’ ),
                        'add_new' => __( 'New Book', ‘GABSVN’ ),
                        'add_new_item' => __( 'Add New Book', ‘GABSVN’ ),
                        'edit_item' => __( 'Edit Book', ‘GABSVN’ ),
                        'new_item' => __( 'New Book', ‘GABSVN’ ),
                        'view_item' => __( 'View Books', ‘GABSVN’ ),
                        'search_items' => __( 'Search Books', ‘GABSVN’ ),
                        'not_found' =>  __( 'No Books Found', ‘GABSVN’ ),
                        'not_found_in_trash' => __( 'No Books found in Trash', ‘GABSVN’ ),
                        );



    /*Définir les arguments pour votre type de message personnalisé*/

        $args = array(
                        'labels' => $labels,
                        'has_archive' => true,
                        'public' => true,
                        'hierarchical' => false,
                        
                        'supports' => array(
                        'title',
                        'editor',
                        'excerpt',
                        'custom-fields',
                        'thumbnail',
                        'page-attributes'
                        ),
                        
                        'taxonomies' => 'category',
                        'rewrite'   => array( 'slug' => 'GABSVN' ),
                        'show_in_rest’ => true,
                    );



        register_post_type( 'GABSVN_book', $args );



}
add_action( 'init', 'GABSVN_register_post_type' );








?>
