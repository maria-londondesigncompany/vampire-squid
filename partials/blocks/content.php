<section class="n-gutter block-content py-4 py-lg-5 bg-<?php the_sub_field('background_style') ?>">
  <?php get_template_part('partials/anchor') ?>

  <div class="container text-<?php the_sub_field('align') ?>">
    <div class="the-content"><?php the_sub_field('content') ?></div>

    <?php get_template_part('partials/buttons') ?>
  </div>
</section>
