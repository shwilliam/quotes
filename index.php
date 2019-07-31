<?php
/**
 * Fallback template
 *
 * @package quotes
 */

get_header();

  if (have_posts()) :

    if (is_home() && ! is_front_page()) : ?>
      <header>
        <h2 class="screen-reader-text"><?php single_post_title(); ?></h2>
      </header>
    <?php endif;

    while (have_posts()) : the_post();

      get_template_part('template-parts/content');

    endwhile;

    the_posts_navigation();

  else :

    get_template_part('template-parts/content', 'none');

  endif;

get_footer(); ?>
