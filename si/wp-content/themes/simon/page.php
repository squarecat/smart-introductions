<?php
/**
 * The template for displaying Single Page.
 *
 * @package Simon WP Framework
 * @since Simon WP Framework 1.0
 */
 get_header(); ?>

<div class="u-container">
  <div class="u-content">
    <div class="c-box">
      <div class="c-box__column c-box__column--left">
        <div class="about-us-img-wrapper"></div>
      </div>
      <div class="c-box__column c-box__column--right">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1 class="c-box__title"><?php the_title(); ?></h1>
        <div class="c-box__content">
          <?php the_content(); ?>
        </div>
        <?php endwhile; endif; ?>
      </div>
    </div>

  </div>
</div>

<?php get_footer(); ?>
