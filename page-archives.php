<?php
/**
 * Custom archives page
 *
 * @package quotes
 */

get_header(); ?>

  <!-- TODO: handle empty lists -->

  <h2>
    <?= the_title(); ?>
  </h2>

  <section>
    <h3>Quote Authors</h3>

    <ul class="list list--inline list--inline-padded">
      <?php
        $posts = get_posts(array(
          'posts_per_page' => '-1'
        ));
        foreach ($posts as $post) : setup_postdata($post);
      ?>

        <li>
          <a href="<?= esc_url(get_permalink()); ?>">
            <?= the_title(); ?>
          </a>
        </li>

      <?php
        endforeach; wp_reset_postdata();
      ?>
    </ul>
  </section>

  <section>
    <h3>Categories</h3>

    <ul class="list list--inline list--inline-padded">
      <?=
        wp_list_categories(array(
          'title_li' => '',
        ));
      ?>
    </ul>
  </section>

  <?php $tags = get_tags(); if ($tags) : ?>
    <section>
      <h3>Tags</h3>

      <ul class="list list--inline list--inline-padded">
        <?php foreach ($tags as $tag) : ?>

          <li>
            <a href="<?= esc_url(get_tag_link($tag->term_id)); ?>">
              <?= $tag->name; ?>
            </a>
          </li>

        <?php endforeach; ?>
      </ul>
    </section>
  <?php endif; ?>

<?php get_footer(); ?>
