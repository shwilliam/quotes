<?php
/**
 * Post template
 *
 * @package quotes
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header>
    <?php if (has_post_thumbnail()) : ?>
      <?php the_post_thumbnail( 'large' ); ?>
    <?php endif; ?>

    <h2>
      <?php the_title(); ?>
    </h2>
  </header>

  <div>
    <?php the_content(); ?>
  </div>
</article>
