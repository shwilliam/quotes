<?php
/**
 * Quote template
 *
 * @package quotes
 */

?>

<blockquote <?php post_class('quote quote--bordered'); ?>>

  <p><?php the_content(); ?><p>
  <footer class="quote__footer">
    — <?php the_title(); ?>
  </footer>

</blockquote>
