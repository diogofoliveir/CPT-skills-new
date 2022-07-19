<?php 





/**
 * @package ctp
 * @version 1.7.2
 */
/*
Plugin Name: Ctp2
Plugin URI: www.wordpress.org
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: Matt Mullenweg
Version: 1.7.2
Author URI: http://ma.tt/
*/


// function wporg_callback() {
//     echo("Hello world");
// }

// add_action( 'init', 'wporg_callback' );


// function wporg_filter_title( $title ) {
//     return 'The ' . $title . ' olivier';
// }
// add_filter( 'the_title', 'wporg_filter_title' );

// require_once "fonction/shortcodegallery.php"; 



function wpc_cpt() {

	/* CTP */
	$labels = array(
		'name'                => _x('CTP', 'Post Type General Name', 'textdomain'),
		'singular_name'       => _x('CTP', 'Post Type Singular Name', 'textdomain'),
		'menu_name'           => __('Portfolio2', 'textdomain'),
		'name_admin_bar'      => __('Properties', 'textdomain'),
		'parent_item_colon'   => __('Parent Item:', 'textdomain'),
		'all_items'           => __('All Items', 'textdomain'),
		'add_new_item'        => __('Add New Item', 'textdomain'),
		'add_new'             => __('Add CTP', 'textdomain'),
		'new_item'            => __('New Item', 'textdomain' ),
		'edit_item'           => __('Edit Item', 'textdomain'),
		'update_item'         => __('Update Item', 'textdomain'),
		'view_item'           => __('View Item', 'textdomain'),
		'search_items'        => __('Search Item', 'textdomain'),
		'not_found'           => __('Not found', 'textdomain'),
		'not_found_in_trash'  => __('Not found in Trash', 'textdomain'),
	);
	
	
	$rewrite = array(
		'slug'                => _x('CTP', 'CTP', 'textdomain'),
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => false,
	);
	$args = array(
		'label'               => __('property', 'textdomain'),
		'description'         => __('Properties', 'textdomain'),
		'labels'              => $labels,
		'supports'            => array('thumbnail'),
		'taxonomies'          => array('Savoir','Savoir-faire', 'Savoir être'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-admin-home',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'query_var'           => 'property',
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type('CTP', $args);	
}
add_action('init', 'wpc_cpt', 10);



 
 
    /**
     *meta box
     */
    function add() {
        $screens = [ 'CTP', ];
        foreach ( $screens as $screen ) {
            add_meta_box(
                'wporg_box_id',          // Unique ID
                'cordonnes', // Box title
                 'html' ,  // Content callback, must be of type callable
                $screen                  // Post type
            );
        }
    }
 
 
    
 
 
    /**
     * Display the meta box HTML to the user.
     *
     * @param \WP_Post $post   Post object.
     */
     function html() {
       global $post;
        
       $custom = get_post_custom($post->ID);
    $nom = isset( $custom["nom"][0] ) ? $custom["nom"][0] : "";
    $prenom = isset( $custom["prenom"][0] ) ? $custom["prenom"][0] : "";
    $email = isset( $custom["email"][0] ) ? $custom["email"][0] : "";

    $aff='<p><label>Nom</label><br />';
    $aff.='<input type="text" id="nom" class="regular-text" name="nom" placeholder="';
    if(!isset( $custom["nom"][0] )){ $aff.="Nom";} 
    $aff.='" required minlength="4" maxlength="50" size="10" value="'.$nom.'">';

    $aff.='<p><label>Prénom</label><br />';
    $aff.='<input type="text" id="prenom" class="regular-text" name="prenom" placeholder="';
    if(!isset( $custom["prenom"][0] )){ $aff.="Prénom";} 
    $aff.='" required minlength="4" maxlength="50" size="10" value="'.$prenom.'">';

    $aff.='<p><label>email :</label><br />';
    $aff.='<input type="text" id="email" class="regular-text" name="email" placeholder="';
    if(!isset( $custom["email"][0] )){ $aff.="email";} 
    $aff.='" required minlength="4" maxlength="50" size="4" value="'.$email.'">';

    echo $aff;
    }



function save_details(){
    global $post;
    $title="";

    if ( isset( $_REQUEST['nom'] ) ) {
        update_post_meta($post->ID, "nom", sanitize_text_field($_POST["nom"]));
        $title=sanitize_text_field($_POST["nom"])." ";
    }
    if ( isset( $_REQUEST['prenom'] ) ) {
        update_post_meta($post->ID, "prenom", sanitize_text_field($_POST["prenom"]));
        $title.=sanitize_text_field($_POST["prenom"]);
    }
    if ( isset( $_REQUEST['email'] ) ) {
        update_post_meta($post->ID, "email", sanitize_text_field($_POST["email"]));
        
    }
    
    if ( isset($post)){
        $args = array(
            'ID'           => $post->ID,
            'post_title'   => $title,
        );
        remove_action('save_post', 'save_details');
        wp_update_post( $args );
        add_action('save_post', 'save_details');
    }
}

 
add_action( 'add_meta_boxes', 'add'  );
add_action( 'save_post',   'save_details'  );
 

//hook into the init action and call create_topics_nonhierarchical_taxonomy when it fires
 
add_action( 'init', 'create_topics_nonhierarchical_taxonomy', 0 );
 
function create_topics_nonhierarchical_taxonomy() {
 
// taxonomy savoir
 
  $labels = array(
    'name' => _x( 'Savoir', 'taxonomy general name' ),
    'singular_name' => _x( 'Savoir', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Topics' ),
    'popular_items' => __( 'Popular Topics' ),
    'all_items' => __( 'All Topics' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Topic' ), 
    'update_item' => __( 'Update Topic' ),
    'add_new_item' => __( 'Add New Topic' ),
    'new_item_name' => __( 'New Topic Name' ),
    'separate_items_with_commas' => __( 'Separate topics with commas' ),
    'add_or_remove_items' => __( 'Add or remove topics' ),
    'choose_from_most_used' => __( 'Choose from the most used topics' ),
    'menu_name' => __( 'Savoir', ),
  ); 
 
// Now register the non-hierarchical taxonomy like tag
 
register_taxonomy('Savoir','CTP',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'savoir' ),
  ));

//Taxonomy savoir-faire


  $labels = array(
    'name' => _x( 'Savoir-faire', 'taxonomy general name' ),
    'singular_name' => _x( 'Savoir-faire', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Topics' ),
    'popular_items' => __( 'Popular Topics' ),
    'all_items' => __( 'All Topics' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Topic' ), 
    'update_item' => __( 'Update Topic' ),
    'add_new_item' => __( 'Add New Topic' ),
    'new_item_name' => __( 'New Topic Name' ),
    'separate_items_with_commas' => __( 'Separate topics with commas' ),
    'add_or_remove_items' => __( 'Add or remove topics' ),
    'choose_from_most_used' => __( 'Choose from the most used topics' ),
    'menu_name' => __( 'Savoir-faire', ),
  ); 
 
// Now register the non-hierarchical taxonomy like tag
 
register_taxonomy('Savoir-faire','CTP',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'savoir-faire' ),
  ));


  //Taxonomy Savoir etre
 
  $labels = array(
    'name' => _x( 'Savoir être', 'taxonomy general name' ),
    'singular_name' => _x( 'Savoir être', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Topics' ),
    'popular_items' => __( 'Popular Topics' ),
    'all_items' => __( 'All Topics' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Topic' ), 
    'update_item' => __( 'Update Topic' ),
    'add_new_item' => __( 'Add New Topic' ),
    'new_item_name' => __( 'New Topic Name' ),
    'separate_items_with_commas' => __( 'Separate topics with commas' ),
    'add_or_remove_items' => __( 'Add or remove topics' ),
    'choose_from_most_used' => __( 'Choose from the most used topics' ),
    'menu_name' => __( 'Savoir être', ),
  ); 
 
// Now register the non-hierarchical taxonomy like tag
 
register_taxonomy('Savoir être','CTP',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'Savoir être' ),
  ));
}  




function display_custom_post($atts) {
	
	//Initialise le nombre de page
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;    
	
	//Attribut par défaut
	$atts = shortcode_atts    (
			array(
				'post_type' => 'post', // !!! Ca affiche tous les post !!!
				'posts_per_page' => 5,
				'orderby' 	=> 'post_title',
				'order' 	=> 'ASC',
				'paged'		=> $paged,
				'champs' => array(),
				 ),
				$atts
			);
	//Classique, on lance la requête
	$custom_post = new WP_Query( $atts );    
	//Initilisation de la variable de sortie
    $output = '';
	//On regarde si le WP_Query nous a renvoyé un résultat
	if ($custom_post->have_posts()) {
		//La loop qui se répète tant qu'il y a des posts - L'itération est intégrée (curseur)
		while ( $custom_post->have_posts() ) : $custom_post->the_post();
			//Construction de notre variable de sortie
			$output .= '<div class="custom-post-content">';
			if (count($atts['champs'])>0){
				foreach ($atts['champs'] as $c){
					$output .= '<p>';
					$output .= get_post_meta( get_the_ID(), $c, true );
					$output .= '</p>';
				}
			}
			//La photo du collaborateur
			$output .= '<div>'.get_the_post_thumbnail(get_the_ID(),'medium').'</div>';
            $output .= '</div>';
		endwhile;
		//Si il y a lieu de faire plusieurs page de navigation, alors on cré la navigation
		if($atts['paged']!=""){
			//Page maximimum nombre au pifomètre
			$big = 999999999; 
			//Intégration de la navigation dans la variable de sortie
			$output .= paginate_links( array(
								'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format' => '?paged=%#%',
								'current' => max( 1, get_query_var('paged') ),
								'total' => $custom_post->max_num_pages
								) );  
		}  
		//Réinitialisation de notre curseur
		wp_reset_postdata(); 

	}else{
		//En cas de retour vide de notre WP_Query
		$output .= '<div class="custom-post-content">';
		$output .= 'Aucun résultat pour les posts de type '.$atts['post_type'].'.';
		$output .= '</div>';
	} 
	 
	return $output;  
}

function display_donnes($atts) {
	$champs = array('nom','prenom');
	//Construction du paramètre pour afficher les collabo
	$atts = shortcode_atts(array('post_type' => 'CTP','champs'=>$champs),$atts); 
	//On envoie ce paramètre dans notre fonction principal et on retourne directement le résultat
	return display_custom_post($atts);
}
add_shortcode( 'donnes' , 'display_donnes' );
