<?php
/**
 * Site header
 *
 * @package quotes
 */

?><!DOCTYPE html>
<html class="site" <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <?php wp_head(); ?>
  </head>

  <body <?php body_class('site__body'); ?>>
    <a class="skip-link screen-reader-text" href="#content">
      Skip to content
    </a>

    <header class="header" role="banner">
      <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
        <h1 class="screen-reader-text">
          <?php bloginfo('name'); ?>
        </h1>
        <img alt="" class="header__logo" src="<?= get_stylesheet_directory_uri().'/images/logo.svg'; ?>"/>
      </a>
    </header>

    <main id="content" class="site__main">
