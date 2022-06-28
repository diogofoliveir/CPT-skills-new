<?php 





/**
 * @package ctp
 * @version 1.7.2
 */
/*
Plugin Name: Ctp
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

add_action('init', 'wpc_cpt', 10);

function wpc_cpt() {

	/* CTP */
	$labels = array(
		'name'                => _x('CTP', 'Post Type General Name', 'textdomain'),
		'singular_name'       => _x('CTP', 'Post Type Singular Name', 'textdomain'),
		'menu_name'           => __('CTP', 'textdomain'),
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
		'supports'            => array('title', 'thumbnail','editor','excerpt'),
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


//abstract class WPOrg_Meta_Box {
 
 
    /**
     * Set up and add the meta box.
     */
	function wporg_add_custom_box() {
			$screen = 'CTP';
			add_meta_box(
				'wporg_box_id',                 // Unique ID
				'Custom Meta Box Title',      // Box title
				'wporg_custom_box_html',          // Post type
				$screen,
			);
      
      add_meta_box(
				'wporg_box_id_2',                 // Unique ID
				'Custom Meta Box Title',      // Box title
				'wporg_custom_box_html_2',          // Post type
				$screen,
			);
  
        
      add_meta_box(
				'wporg_box_id_3',                 // Unique ID
				'Custom Meta Box Title',      // Box title
				'wporg_custom_box_html_3',          // Post type
				$screen,
			);


    }
	add_action( 'add_meta_boxes', 'wporg_add_custom_box' );
	
	function wporg_custom_box_html( $post ) {
		?>
    
			<input type="text" name="Nom" value="" placeholder="Nom" required="required"/>
			<input type="text" name="Prenom" value="" placeholder="Prénom" required="required"/>
			
     <?php
	

}


function wporg_custom_box_html_2( $post ) {
  ?>
   <label for="email">Enter your  email:</label>

<input type="email" id="email"
       pattern=".+@globex\.com" size="30" required>
    
       <label for="phone">Enter your phone number:</label>

<input type="tel" id="phone" name="phone"
       pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
       required>
 <?php


} 

function wporg_custom_box_html_3( $post ) {
  ?>
  
  <label for="name">Adresse</label>

<input type="text" id="name" name="name" required
       minlength="4" maxlength="8" size="10">
  <?php


} 



    /**
     * Save the meta box selections.
     *
     * @param int $post_id  The post ID.
     */
    // function save( int $post_id ) {
    //     if ( array_key_exists( 'wporg_field', $_POST ) ) {
    //         update_post_meta(
    //             $post_id,
    //             '_wporg_meta_key',
    //             $_POST['wporg_field']
    //         );
    //     }
    // }
	// add_action( 'save_post', 'save');
 
//}
 

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


// On créer une nouvelle requête
$query = new WP_Query(array(
  'name' => 'gallery',
  
));

// On affiche le contenu sur la même logique que la boucle principale
if ( $query->have_posts() ) {
  echo '<ul>';
  while ( $query->have_posts() ) {
      $query->the_post();
      echo '<li>' . get_the_title() . '</li>';
  }
  echo '</ul>';
} else {
  // no posts found
}
/* On utilise la fonction wp_reset_postdata pour restaurer la requête principale (pour éviter des bugs) */
wp_reset_postdata();


// function have_posts() {
//   global $wp_query;
//   return $wp_query->have_posts();
// }





// function get_post_meta( $post_id, $key = '', $single = false ) {
//   return get_metadata( 'post', $post_id, $key, $single );
// }




// function get_the_ID() { // phpcs:ignore WordPress.NamingConventions.ValidFunctionName.FunctionNameInvalid
//   $post = get_post();
//   return ! empty( $post ) ? $post->ID : false;
// }

 
 
  function rpthem_enqueue(){
    wp_enqueue_style( 'bootstrapcss',"https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css", false, null );
  
    wp_enqueue_script( 'bootstapjs', "https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js", false, null );
  }
  
  add_action( 'wp_enqueue_scripts', 'rpthem_enqueue', 1);

  define ('DIRECTORIES_IMG',"wp-content/plugins/portfolio/shortcodes/gallery/images/");

  function shortcode_bienvenue($atts){
  $atts = shortcode_atts(array(
    'id'=> '',
    'height'=> 350
  ),$atts);
  extract($atts);
  return 
  '<div class="row row-cols-1 row-cols-md-4 g-4" style="width: 80rem; ;">
  <div class="col">
    <div class="card border border-light">
      <img src="'.DIRECTORIES_IMG.'zlatan.webp" class="card-img-top rounded-5" style="height: 250px ;" alt="...">
      <div class="card-body">
        <h5 class="card-title ">zlatan</h5>
        <p class="card-text"></p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card border border-light">
      <img src="'.DIRECTORIES_IMG.'messi.jpg" class="card-img-top rounded-5" alt="..."/>
      <div class="card-body">
        <h5 class="card-title">Messi</h5>
        <p class="card-text"> </p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card border border-light">
      <img src="'.DIRECTORIES_IMG.'neymar.jpeg" class="card-img-top rounded-5" alt="...">
      <div class="card-body">
        <h5 class="card-title">Neymar</h5>
        <p class="card-text"></p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card border border-light">
      <img src="'.DIRECTORIES_IMG.'ronaldo.jpg" class="card-img-top rounded-5" alt="...">
      <div class="card-body">
        <h5 class="card-title">Ronaldo</h5>
        <p class="card-text"></p>
      </div>
    </div>
  </div>
  <div class="col">
      <div class="card border border-light">
        <img src="'.DIRECTORIES_IMG.'ramos.jpg" class="card-img-top rounded-5" alt="...">
        <div class="card-body">
          <h5 class="card-title">S. Ramos</h5>
          <p class="card-text"></p>
        </div>
      </div>
    </div><div class="col">
      <div class="card border border-light">
        <img src="'.DIRECTORIES_IMG.'Mbappe.jpg" class="card-img-top rounded-5" alt="...">
        <div class="card-body">
          <h5 class="card-title">Mbappe</h5>
          <p class="card-text"></p>
        </div>
      </div>
    </div><div class="col">
      <div class="card border border-light">
        <img src="'.DIRECTORIES_IMG.'zidane.jpeg" class="card-img-top rounded-5"  style=" height:250px" alt="...">
        <div class="card-body">
          <h5 class="card-title">Zidane</h5>
          <p class="card-text"></p>
        </div>
      </div>
    </div><div class="col">
      <div class="card border border-light">
        <img src="'.DIRECTORIES_IMG.'guardiola.jpg" class="card-img-top rounded-5 alt="...">
        <div class="card-body">
          <h5 class="card-title">P. Gardiola</h5>
          <p class="card-text"></p>
        </div>
      </div>
    </div>
</div>';
}
add_shortcode('zlatan', 'shortcode_bienvenue');

?>

<h3>Derniers articles</h3>
<ul>
<?php
    $recentPosts = new WP_Query();
    $recentPosts->query('showposts=5');
?>
<?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
    <li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
<?php endwhile; ?>
</ul>

<!-- FONCTION QUERY POSTS -->
<ul>
<?php
$args = array( 'numberposts' => 5, 'order'=> 'ASC', 'orderby' => 'title' );
$postslist = get_posts( $args );
foreach ($postslist as $post) :  setup_postdata($post); ?> 

		<li><?php the_title(); ?></li>
<?php endforeach; ?>
</ul>

<!-- test -->
<div class="news">
    <h3>Derniers articles</h3>
    <div class="last-article">
        <ul>
            <?php
                $recentPosts = new WP_Query();
                $recentPosts->query('showposts=3');//value to modify to choose the number of articles
            ?>
            <?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
                <li class="item_list">
                    <h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                        <?php if ( has_post_thumbnail() ) { ?><div class="img-article accueil"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'noviseofriendly' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"> <?php { // in the loop
                             the_post_thumbnail('thumbnail');
                             } ?></a><?php } ?>
                        <?php
                            global $more;    // Declare global $more (before the loop).
                            $more = 0;       // Set (inside the loop) to display content above the more tag.
                            the_content("Lire la suite...");
                        ?>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>  <!-- end last-article -->
</div> <!-- end news -->