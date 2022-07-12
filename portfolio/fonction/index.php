<?php get_header() ?>
<?php if (have_posts()): ?>

<ul>
<?php while (have_posts()): the_post(); ?>
        <li><?php the_title(); ?></li>
        <li><?php the_content() ?></li>
<?php endwhile ?>
        </ul>
<?php else: ?>
        <p>Aucun article </p>
 <?php endif; ?>

 <?php get_footer() ?>