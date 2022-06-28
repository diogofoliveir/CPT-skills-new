<?php


/*

Plugin Name: Dashboard Register Custom Post Types
Plugin URI: http://realise.com
Description: Plugin to register the GABSVN post type
Version: 350.0
Author: Gabriel_FDS
Author URI:http://realise.ch
Textdomain: GABSVN
License: GPLv2

*/



add_action( 'init', 'create_custom_post_type' );

function create_custom_post_type() {

	$étiquettes = tableau(
		'nom' => __( 'Privilèges fiscaux' ),
		'singular_name' => __( 'Privilège fiscal' ),
		'all_items' => __('Tous les privilèges fiscaux'),
		'add_new' => _x('Ajouter un nouveau privilège fiscal', 'Privilèges fiscaux'),
		'add_new_item' => __('Ajouter un nouveau privilège fiscal'),
		'edit_item' => __('Modifier le privilège fiscal'),
		'new_item' => __('Nouveau privilège fiscal'),
		'view_item' => __('Afficher le privilège fiscal'),
		'search_items' => __('Rechercher dans les privilèges fiscaux'),
		'not_found' => __('Aucun privilège fiscal trouvé'),
		'not_found_in_trash' => __('Aucun privilège fiscal trouvé dans la corbeille'),
		'parent_item_colon' => ''
	);

	$args = tableau (
		'étiquettes' => $étiquettes,
		'public' => vrai,
		'has_archive' => vrai,
		'menu_icon' => '',
		'rewrite' => array('slug' => 'taxlien'),
		'taxonomies' => array( 'category', 'post_tag' ),
		'query_var' => vrai,
		'supports' => array( 'genesis-cpt-archives-settings', 'thumbnail' , 'custom-fields', 'excerpt', 'comments', 'title', 'editor' ),
		'menu_position' => 5

	);

	register_post_type( 'tax_lien',$args);
}






    ?>


