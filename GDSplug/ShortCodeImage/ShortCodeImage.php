<?php



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



