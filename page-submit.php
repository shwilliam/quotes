<?php
/**
 * Submit page
 *
 * @package quotes
 */

get_header(); ?>

  <h2>
    <?= the_title(); ?>
  </h2>

  <form id="quote__form" action="">
    <label for="quote__author">
      Author of Quote
      <input name="quote__author" id="quote__author" type="text">
    </label>

    <label for="quote__content">
      Quote
      <textarea name="quote__content" id="quote__content"></textarea>
    </label>

    <label for="quote__source">
      Where did you find this quote? (e.g. book name) 
      <input name="quote__source" id="quote__source" type="text">
    </label>

    <label for="quote__url">
      Provide the URL of the quote source, if available
      <input name="quote__url" id="quote__url" type="url">
    </label>

    <button class="button" type="submit">WOO</input>
  </form>

<?php get_footer(); ?>
