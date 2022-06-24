
<?php 



function shortcode_bienvenue(){
    $mess = "Bienvenue chez moi";
    return $mess;
    
}
add_shortcode('bienvenue', 'shortcode_bienvenue');

?>