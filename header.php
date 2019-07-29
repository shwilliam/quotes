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
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <a class="skip-link screen-reader-text" href="#content">
      <?php echo esc_html('Skip to content'); ?>
    </a>

    <header class="header" role="banner">
      <h1 class="screen-reader-text">
        <?php bloginfo('name'); ?>
      </h1>
      <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
        <img class="header__logo" src="<?= get_stylesheet_directory_uri().'/images/logo.svg'; ?>"/>
      </a>
    </header>

    <main id="content">
