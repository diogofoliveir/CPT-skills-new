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


function kinsta_register_post_type() {


    $labels = array(
        'name' => __( ‘Books’, ‘kinsta’ ),
        'singular_name' => __( 'Book', ‘kinsta’ ),
        'add_new' => __( 'New Book', ‘kinsta’ ),
        'add_new_item' => __( 'Add New Book', ‘kinsta’ ),
        'edit_item' => __( 'Edit Book', ‘kinsta’ ),
        'new_item' => __( 'New Book', ‘kinsta’ ),
        'view_item' => __( 'View Books', ‘kinsta’ ),
        'search_items' => __( 'Search Books', ‘kinsta’ ),
        'not_found' =>  __( 'No Books Found', ‘kinsta’ ),
        'not_found_in_trash' => __( 'No Books found in Trash', ‘kinsta’ ),
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
add_action( 'init', 'kinsta_register_post_type' );