<?php
/**
 * Search result
 *
 * @package quotes
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header>
    <h2>
      <a href="<?php esc_url(get_permalink()); ?>" rel="bookmark">
        <?php the_title(); ?>
      </a>
    </h2>

  </header>

  <div>
    <?php if ('post' === get_post_type()) :
      the_excerpt();
    endif; ?>
  </div>
</article>
