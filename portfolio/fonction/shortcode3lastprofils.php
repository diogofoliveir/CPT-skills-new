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
