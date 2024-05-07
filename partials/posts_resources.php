<?php if($args['show_filter'] ?? false): ?>

<?php get_template_part('partials/posts_resources', 'filter', $args) ?>
<?php endif; ?>

<?php if( have_posts() ): ?>
  <div class="row d-flex flex-wrap justify-content-center mt-md-3 mb-3-rem" id="filtered-posts-container" data-masonry='{"percentPosition": true }' >
    <?php while( have_posts() ): the_post(); ?>
     
      <?php get_template_part('partials/content-archive-resource', get_post_type());?>
      
    <?php endwhile; ?>
  </div>
<?php endif; ?>
