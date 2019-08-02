<?php
/**
 * Single quote
 *
 * @package quotes
 */

?>

<blockquote id="quote-active" <?php post_class('quote'); ?>>

  <p><?php the_content(); ?><p>
  <footer class="quote__footer">— <?php the_title(); ?></footer>

</blockquote>
