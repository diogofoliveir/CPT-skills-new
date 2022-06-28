<?php




/**
* Define a constant path to our single template folder
*/
define(SINGLE_PATH, TEMPLATEPATH . '/single');
  
/**
* Filter the single_template with our custom function
*/
add_filter('single_template', 'my_single_author_template');
  
/**
* Single template function which will choose our template
*/
function my_single_author_template($single) {
global $wp_query, $post;
  
/**
* Checks for single template by author
* Check by user nicename and ID
*/
$curauth = get_userdata($wp_query->post->post_author);
  
if(file_exists(SINGLE_PATH . '/single-author-' . $curauth->user_nicename . '.php'))
return SINGLE_PATH . '/single-author-' . $curauth->user_nicename . '.php';
  
elseif(file_exists(SINGLE_PATH . '/single-author-' . $curauth->ID . '.php'))
return SINGLE_PATH . '/single-author-' . $curauth->ID . '.php';
  
}







// ---------------------------------------------



?>


