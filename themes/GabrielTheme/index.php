<?php
get_header();
?>
<section id="primary">
 <?php
 if ( have_posts() ) {
 while ( have_posts() ) {
 the_post();
 ?>
 <h2><?php the_title(); ?></h2>
 <?php
 if ( has_post_thumbnail() ) {
 the_post_thumbnail('thumbnail');
 }
 ?>
 <?php the_excerpt(); ?>
 <a href="<?php the_permalink(); ?>">Lire la suite</a>
 <?php
 }
 } else {
 ?>
 <p>Aucun article</p>
 <?php
 }
 ?>
</section>
<?php
get_footer();
?>



