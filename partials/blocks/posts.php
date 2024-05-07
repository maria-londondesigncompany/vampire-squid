<section class="n-gutter block-posts py-4 py-lg-5 bg-<?php the_sub_field('background_style') ?>">
  <?php get_template_part('partials/anchor') ?>


  <div class="container <?php echo get_sub_field('style') == 'slider' ? 'd-lg-flex justify-content-between' : 'text-center' ?>">
    <div class="the-content">
      <?php the_sub_field('content') ?>
    </div>

    <?php if(get_sub_field('style') == 'slider'): ?>
      <?php get_template_part('partials/buttons') ?>
    <?php endif; ?>
  </div>

  <?php
  $attributes = [
    'post_type' => implode(',', get_sub_field('post_type')),
    'posts_per_page' => get_sub_field('posts_per_page'),
    'orderby' => get_sub_field('orderby'),
    'order' => get_sub_field('order'),
    'allow_load_more' => get_sub_field('allow_load_more'),
  ];

  $taxonomies = get_taxonomies([ 'public' => true ], 'objects');

  foreach($taxonomies as $taxonomy_name => $taxonomy)
  {
    $values = get_sub_field($taxonomy_name);

    $query_var = $taxonomy_name;

    if($taxonomy_name == 'category')
    {
      $query_var = 'category_name';
    }

    if(!empty($values))
    {
      $attributes [$query_var] = implode(',', array_map(function ($term) { return $term->slug; }, $values));
    }
  }

  if(get_sub_field('style') == 'slider')
  {
    $attributes['partial'] = 'partials/posts-slider';
  }

  $attributes_string = "";

  foreach($attributes as $query_var => $value)
  {
    $attributes_string .= sprintf(' %s="%s"', esc_attr($query_var), esc_attr($value));
  }
  ?>
  <div class="container">
    [posts <?php echo $attributes_string ?>]

    <?php if(get_sub_field('style') != 'slider'): ?>
      <?php get_template_part('partials/buttons') ?>
    <?php endif; ?>
  </div>
</section>
