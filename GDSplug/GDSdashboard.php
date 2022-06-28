<?php


/*

Plugin Name: CELINEdashboard Register Custom Post Types
Plugin URI: http://realise.com
Description: Plugin to register the GABSVN post type
Version: 600.0
Author: Gabriel_FDS
Author URI:http://realise.ch
Textdomain: GABSVN
License: GPLv2

*/




function register_cpt_produit() {

    $labels = array( 
        'name' => _x('Produits', 'produit'),
        'singular_name' => _x('Produit', 'produit'),
        'add_new' => _x('Ajouter', 'produit'),
        'add_new_item' => _x('Ajouter un produit', 'produit'),
        'edit_item' => _x('Editer un produit', 'produit'),
        'new_item' => _x('Nouveau produit', 'produit'),
        'view_item' => _x('Voir le produit', 'produit'),
        'search_items' => _x('Rechercher un produit', 'produit'),
        'not_found' => _x('Aucun produit trouvé', 'produit'),
        'not_found_in_trash' => _x('Aucun produit dans la corbeille', 'produit'),
        'parent_item_colon' => _x('Produit parent :', 'produit'),
        'menu_name' => _x('CELINE', 'produit'),
        'menu_position' => 3,
        
    );


    register_post_type( 'tax_lien',$args);

    
}






    ?>