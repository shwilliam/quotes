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

  <?php if (is_user_logged_in()) : ?>

    <form id="quote__form" action="">
      <label for="quote__author">
        Author of Quote
        <input
          name="quote__author"
          id="quote__author"
          class="input"
          type="text"
          required
        >
      </label>

      <label for="quote__content">
        Quote
        <textarea
          name="quote__content"
          id="quote__content"
          class="input input--textarea"
          rows="3"
          required
        ></textarea>
      </label>

      <label for="quote__source">
        Where did you find this quote? (e.g. book name) 
        <input
          name="quote__source"
          id="quote__source"
          class="input"
          type="text"
        >
      </label>

      <label for="quote__url">
        Provide the URL of the quote source, if available
        <input
          name="quote__url"
          id="quote__url"
          class="input"
          type="url"
        >
      </label>

      <button class="button" type="submit">Submit quote</button>

      <div
        id="quote__form-success-msg"
        class="quote__message"
        hidden
      >
        Thanks for making a submission! Your quote will be public after it has
        been approved by our moderators.
      </div>

      <div
        id="quote__form-error-msg"
        class="quote__message"
        hidden
      >
        Woops... Something went wrong. Try to reload the page and try again.
      </div>

    </form>

  <?php else : ?>

    <p>Sorry, you must be logged in to submit a quote!</p>
    <a href="<?= esc_url(admin_url()); ?>">Click here to login.</a>

  <?php endif; ?>

<?php get_footer(); ?>
