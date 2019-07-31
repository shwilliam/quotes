<?php
/**
 * Single quote
 *
 * @package quotes
 */

get_header();

  while (have_posts()) : the_post();

    get_template_part('template-parts/content', 'quote--single');

  endwhile; ?>

  <button id="quote__fetch-btn" class="button">
    Show me another!
  </button>

<?php get_footer(); ?>
