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
          'theme_location' => 'primary', 'menu_id' => 'menu--primary'
        )); ?>

      </nav>
    </footer>

		<?php wp_footer(); ?>

	</body>
</html>
