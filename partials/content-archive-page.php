<?php
/**
 * Page
 */
?>

<article class="post">
  <div class="card">
    <a href="<?php the_permalink(); ?>" class="d-block aspect-container">
      <?php the_post_thumbnail('full'); ?>
    </a>

    <div class="card-body">

      <a href="<?php the_permalink(); ?>">
        <h4 class="post_title"><?php the_title(); ?></h4>
      </a>

      <div>
      <?php $terms = get_the_terms( $post->ID , 'category' );
        if(! is_wp_error( $terms ) )
        foreach ( $terms ?: [] as $term ):
          $term_link = get_term_link( $term, 'category' );
          if( is_wp_error( $term_link ) )
          continue; ?>
          <span class="post-taxonomy-name"><?php echo esc_html($term->name) ?></span>
        <?php endforeach; ?>
      </div>

      <span class="post_date">
        <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date('d.m.Y'); ?></time>
      </span>
      <p><?php echo wp_trim_words( get_the_excerpt(), 15, '...' ); ?></p>
    </div>
  </div>
</article>

