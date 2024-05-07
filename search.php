<?php get_header(); ?>
  <div class="container my-5">
    <?php get_search_form() ?>

    <?php if( have_posts() ): ?>
      <div class="row py-4">
        <?php while( have_posts() ): the_post(); ?>
         
          <?php get_template_part('partials/content-archive-post', get_post_type());?>
       

        <?php endwhile; ?>
      </div>
    <?php else: ?>
      <h3 class="mt-4"><?php _e('No results found') ?></h3>
    <?php endif; ?>
  </div>


<?php get_footer(); ?>
