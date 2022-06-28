<?php


function reg_my_menu() {
  register_nav_menu('primary','Menu principal' );
}
add_action( 'after_setup_theme', 'reg_my_menu' );

add_theme_support('automatic-feed-links');
add_theme_support('title-tag');
add_theme_support('align-wide');
add_theme_support('disable-custom-colors');








function reg_custom_post_type() {

// On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
 
 $labels = array(
 'name'                => _x( 'Portfolio', 'Post Type General Name'),
 'singular_name'       => _x( 'Portfolio', 'Post Type Singular Name'),
 'menu_name'           => __( 'Portfolio'),
 'archives'            => __( 'Toutes les réalisations'),
 'all_items'           => __( 'Toutes les réalisations'),
 'view_item'           => __( 'Voir les réalisations'),
 'add_new_item'        => __( 'Ajouter une nouvelle réalisation'),
 'add_new'             => __( 'Ajouter'),
 'edit_item'           => __( 'Editer les réalisations'),
 'update_item'         => __( 'Modifier les réalisations'),
 'search_items'        => __( 'Rechercher une réalisation'),
 'not_found'           => __( 'Non trouvée'),
 'not_found_in_trash'  => __( 'Non trouvée dans la corbeille'),
 );

// https://generatewp.com/post-type/ -->

 $args = array(
 'label'               =>  'Réalisations',
 'description'         =>  'Toutes les réalisations',
 'labels'              => $labels,

// https://developer.wordpress.org/resource/dashicons/ -->

 'menu_icon'           => 'dashicons-nametag',

// Les champs disponibles dans l'éditeur : titre, auteur, résumé, révisions, image en une... -->

 'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'author', 'revisions'),

// Autres options -->

 'show_in_rest'    => true,
 'hierarchical'        => false,
 'public'              => true,

// Possède une page regroupant l'ensemble des CPT -->

 'has_archive'         => true,
 'rewrite'   => array( 'slug' => 'portfolio'),
 );

// On enregistre notre custom post type qu'on nomme ici "temoignages" et ses arguments -->

 register_post_type( 'portfolio', $args );
}
add_action( 'init', 'reg_custom_post_type', 0 );
add_theme_support( 'post-thumbnails', array( 'portfolio' ) );


function reg_ajouteCPT_a_query( $query ) {
    if ( is_home() && $query->is_main_query() )
        $query->set( 'post_type', array( 'post', 'portfolio' ) );
    return $query;
}
add_action( 'pre_get_posts', 'reg_ajouteCPT_a_query' );








function reg_display_portfolio() {
    $args = array(
    'post_type' => 'portfolio', // Nom du Custom Posty Type
    'post_status' => 'publish', // Status
    'posts_per_page' => 16, // Nombre maximum d'élément
    'order' => 'DESC', // Du plus grand au plus petit
    'orderby' => 'ID' // Ordonner par l'ID
    );
    $s = '';
    $query = new WP_Query( $args );
    if( $query->have_posts() ) {
    $nombreTemoignages = $query->found_posts;
    $s .= '<div class="realisations">';
    while( $query->have_posts() ) {
    $query->the_post();
    $s .= '<div class="realisation">';
    $s .= '<div class="wp-block-image">';
    $s .= '<figure class="aligncenter">';
    $s .= get_the_post_thumbnail();
    $s .= '</figure>';
    $s .= '</div>';
    $s .= '<p>';
    $s .= get_the_title();
    $s .= '</p>';
    // $s .= get_the_content();
    $s .= '</div>';
    }
    $s .= '</div>';
    }
    wp_reset_postdata();
    return $s;
   }
   add_shortcode( 'portfolio', 'reg_display_portfolio' );













   
