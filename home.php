<?php
/**
 * Home 
 *
 * @package quotes
 */

get_header(); ?>

  <main> 

    <?php
      global $post;

      $post = get_posts(array(
        'posts_per_page' => 1,
        'orderby'        => 'rand',
      ))[0];

      setup_postdata($post);

        get_template_part('template-parts/content', 'quote');

      wp_reset_postdata();
    ?>

    <button id="btn-fetch-quote" class="button">
      Show me another!
    </button>

  </main>

<?php get_footer(); ?>
