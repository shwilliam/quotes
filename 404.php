<?php
/**
 * 404 template
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package quotes
 */

get_header(); ?>

  <section>
    <header>
      <h2>Oops!</h2>
    </header>

    <div>
      <p>It looks like nothing was found at this location. Maybe try a search?<p>

      <?php get_search_form(); ?>
    </div>
  </section>

<?php get_footer(); ?>
