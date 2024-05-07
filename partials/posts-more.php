  <?php
  global $wp_query;

  if(max( 1, $wp_query->get('paged') ) < $wp_query->max_num_pages): ?>


  <div class="text-center col-12 ajax-load-more-container">
    <a class="sr-only" href="<?php echo esc_attr(add_query_arg($args['paged_query_var'] ?? 'paged', max( 1, get_query_var('paged') ) + 1, $_SERVER['REQUEST_URI'] ?? '/')) ?>">
      Next Page
    </a>

    <a href="javascript:void(0)" data-query="<?php echo esc_attr(json_encode(['paged' => max( 1, $wp_query->get('paged') ) + 1])) ?>" class="text-center btn text-pink ajax-load-more"><?php _e('Load more') ?></a>
  </div>

  <?php endif; ?>
