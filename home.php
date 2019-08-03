<?php
/**
 * Home 
 *
 * @package quotes
 */

get_header(); ?>

  <div id="quote__error-msg" class="quote__message" hidden>
    Woops... Something went wrong. Try to reload the page and try again.
  </div>

  <?php
    global $post;

    $post = get_posts(array(
      'posts_per_page' => 1,
      'orderby'        => 'rand',
    ))[0];

    setup_postdata($post);

      get_template_part('template-parts/content', 'quote--single');

    wp_reset_postdata();
  ?>

  <button id="quote__fetch-btn" class="button quote__button">
    Show me another!
  </button>

<?php get_footer(); ?>
