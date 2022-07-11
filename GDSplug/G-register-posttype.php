<?php
/*
Plugin Name:    GABSVN Register Custom Post Types
Plugin URI:     https://www.realise.ch/
Description:    Plugin to register the book post type
Version:        30.0
Author:         Gab McCollin
Author URI:     https://www.realise.ch/
Textdomain:     GABSVN
License: GPLv2
*/


function GABSVN_register_post_type() {


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
        'rewrite'   => array( 'slug' => 'book' ),
        'show_in_rest’ => true
       );




    register_post_type( 'book', $args );







}
add_action( 'init', 'GABSVN_register_post_type' );