<?php
/**
 * Search results
 *
 * @package quotes
 */

get_header(); ?>

  <?php if (have_posts()) : ?>

    <header>
      <h2>
        <?php printf(esc_html('Search Results for: %s'), '<span>'.get_search_query().'</span>'); ?>
      </h1>
    </header>

    <?php while (have_posts()) : the_post(); ?>

      <?php get_template_part('template-parts/content', 'search'); ?>

    <?php endwhile; ?>

    <?php qod_numbered_pagination(); ?>

  <?php else : ?>

    <?php get_template_part('template-parts/content', 'none'); ?>

  <?php endif; ?>

<?php get_footer(); ?>
