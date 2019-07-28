<?php
/**
 * Site header
 *
 * @package quotes
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
    <a class="skip-link screen-reader-text" href="#content">
      <?php echo esc_html('Skip to content'); ?>
    </a>

    <header role="banner">
      <h1 class="screen-reader-text">
        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
          <?php bloginfo('name'); ?>
        </a>
      </h1>
      <p>
        <?php bloginfo('description'); ?>
      </p>
    </header>

    <main>
