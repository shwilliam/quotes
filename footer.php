<?php
/**
 * Site footer
 *
 * @package quotes
 */

?>

    </main>

    <footer role="contentinfo">
      <nav role="navigation">

        <?php wp_nav_menu(array(
          'theme_location' => 'primary', 
          'menu_id' => 'menu--primary',
          'container_class' => 'footer__nav-wrapper',
          'menu_class' => 'footer__nav',
        )); ?>

      </nav>

      <p>
        Made with
          <span role="img" aria-label="Heart">💚</span>
        by
        <a
          href="https://github.com/shwilliam"
          target="_blank"
          rel="noopener noreferrer"
        >
          @shwilliam
        </a>
      </p>
    </footer>

    <?php wp_footer(); ?>

  </body>
</html>
