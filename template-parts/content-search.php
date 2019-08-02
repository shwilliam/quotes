<?php
/**
 * Search result
 *
 * @package quotes
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header>
    <h3>
      <a href="<?php esc_url(get_permalink()); ?>" rel="bookmark">
        <?php the_title(); ?>
      </a>
    </h3>

  </header>

  <div>
    <?php the_excerpt(); ?>
  </div>
</article>
