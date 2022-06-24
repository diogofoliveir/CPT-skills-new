<!-- FONCTION WP_QUERY -->
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
