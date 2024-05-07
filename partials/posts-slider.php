<?php if($args['show_filter'] ?? false): ?>

<?php get_template_part('partials/posts', 'filter', $args) ?>

<?php endif; ?>

<?php if( have_posts() ): ?>
  <div class="ajax-posts slick">
    <?php while( have_posts() ): the_post(); ?>
      <div class="p-3">

      <?php get_template_part('partials/content-archive', get_post_type());?>
      </div>
      <?php endwhile; ?>

    <?php if(!isset($args['allow_load_more']) || $args['allow_load_more']): ?>
    <?php get_template_part('partials/posts', 'more', $args) ?>
    <?php endif; ?>
  </div>

<?php endif; ?>
