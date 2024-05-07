<?php if($args['show_filter'] ?? false): ?>

  <?php get_template_part('partials/posts', 'filter', $args) ?>
<?php endif; ?>

<?php if( have_posts() ): ?>
  <div class="row py-4"  data-masonry='{"percentPosition": true }' id="filtered-posts-container" >
    <?php while( have_posts() ): the_post(); ?>
     
      <?php get_template_part('partials/content-archive-post', get_post_type());?>
      
    <?php endwhile; ?>
  </div>
<?php endif; ?>