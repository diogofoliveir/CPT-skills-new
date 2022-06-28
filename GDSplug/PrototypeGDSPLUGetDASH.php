<?php


/*

Plugin Name: PrototypeGDS_PLUG_et_DASH CPT Register
Plugin URI: http://realise.com
Description: Plugin to register the GABSVN post type
Version: 300.0
Author: Gabriel_FDS
Author URI:http://realise.ch
Textdomain: GABSVN
License: GPLv2

*/




function register_cpt_produit() {

    $labels = array( 
        'name' => _x('GABSVN', 'produit'),
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
        'menu_name' => _x('CLEOPATRA', 'produit'),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'description' => 'Les produits de ma boutique.',
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields', 'revisions'),
        'taxonomies' => array('category', 'post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 3,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type('produit', $args);
}
add_action('init', 'register_cpt_produit', 10);



//==============================================================
// GABSVN in WP - Shortcode For Image
//==============================================================
 
function GABSVN_image_shortcode($attr){
 
    $args = shortcode_atts(
 
            array(
                'src'   => '#',
                'title' => 'GABSVN-image',
                'alt'   => '',
                'class' => 'center',   
                       
             ), $attr);
    
   $image = '<img src="wp-content/assets/images/realise+logo+banniere-A.png"'.$args['src'].'" title="'.$args['title'].'" alt="'.$args['alt'].'" class="'.$args['class'].'" />';
 
   return $image;
 
}
 
add_shortcode('GABSVN-image', 'GABSVN_image_shortcode');



//==============================================================
// GABSVN in WP - Shortcode For Button
//==============================================================
 
function GABSVN_button_shortcode($attr){
 
    $args = shortcode_atts(
 
                array(
                        'link'   => '#',
                        'bgcolor' => '#1a73e8',
                        'textcolor' => '#FFF',
                        'text' => 'Button',
                       
                      ), $attr);
 
    $button = '<a href="'.$args['link'].'" style="background:'.$args['bgcolor'].'; color:'.$args['textcolor'].'; padding: 8px 20px; display: inline-block; border-radius: 4px; font-size: inherit;margin: 15px 0px;">'.$args['text'].'</a>';
 
    return $button;
}
 
add_shortcode('GABSVN-button', 'GABSVN_button_shortcode');





//==============================================================
// CLEOPATRA in WP - Shortcode For Button
//==============================================================




function ma_fonction(){     

//le code de ma fonction    

  return 'je suis la fonction ma_fonction'; 

 }
  


 function mon_image(){
    return '<img src="wp-content/assets/images/realise+logo+banniere-A.png" alt="mon image" />';
  }





?>