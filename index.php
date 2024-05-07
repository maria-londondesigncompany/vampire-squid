<?php get_header(); ?>


<?php

if( have_posts() ):

  while( have_posts() ): the_post(); ?>
    <article>

      <h3><?php the_title(); ?></h3>

      <div class="the-content"><?php the_content(); ?></div>

      <hr>

    </article>
  <?php endwhile;

endif;

?>


<?php get_footer(); ?>
