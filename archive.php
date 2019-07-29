<?php
/**
 * Archive template
 *
 * @package quotes
 */

get_header(); ?>

  <h2><?php the_archive_title(); ?></h2>

  <?php if (have_posts()) :

    while ( have_posts() ) : the_post();

      get_template_part('template-parts/content', 'quote');

    endwhile;

    the_posts_navigation();

  else :

    get_template_part('template-parts/content', 'none');

  endif; ?>

<?php get_footer(); ?>
