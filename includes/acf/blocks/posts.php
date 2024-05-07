<?php
/**
 * Posts
 */

$post_types = get_post_types([ 'publicly_queryable' => true, ], 'objects');


$fields  =  [

];

$taxonomies = get_taxonomies([ 'public' => true ], 'objects');

foreach($taxonomies as $taxonomy_name => $taxonomy)
{
  $fields [] = [
    'key' => 'mega_layout_posts_' . $taxonomy_name,
    'name' => $taxonomy_name,
    'label' => $taxonomy->label,
    'type' => 'taxonomy',
    'taxonomy' => $taxonomy_name,
    'return_format' => 'object',
  ];
}

return [
  'key' => 'mega_layout_posts',
  'name' => 'posts',
  'label' => 'Posts',
  'display' => 'block',

  'sub_fields' => array_merge([
    [
      'key' => 'mega_layout_posts_options',
      'type' => 'clone',
      'clone' => ['anchor', 'background_options'],
    ],

    [
      'key' => 'mega_layout_posts_style',
      'label' => 'Style',
      'name' => 'style',
      'type' => 'radio',
      'layout' => 'horizontal',

      'choices' => [
        'cards' => __('Cards'),
        'slider'    => __('Slider'),
      ],
    ],

    [
      'key' => 'mega_layout_posts_title',
      'label' => 'Content',
      'name' => 'content',
      'type' => 'wysiwyg',
      'required' => true,
      'tabs' => 'all',
      'toolbar' => 'full',
      'media_upload' => false,
    ],    

    [
      'key' => 'mega_layout_posts_types',
      'label' => 'Types',
      'name' => 'post_type',
      'type' => 'checkbox',

      'choices' => array_map(function ($post_type) {
        return $post_type->label;
      }, $post_types),
    ],

  ], $fields, [

    [
      'key' => 'mega_layout_posts_per_page',
      'name' => 'posts_per_page',
      'label' => 'Post Count',
      'type' => 'number',
      'default' => 3,

      'wrapper' => [
        'width' => '50%',
      ],
    ],

    [
      'key' => 'mega_layout_posts_load_more',
      'name' => 'allow_load_more',
      'label' => 'Allow Load More',
      'type' => 'true_false',

      'wrapper' => [
        'width' => '50%',
      ],
    ],

    [
      'key' => 'mega_layout_posts_orderby',
      'name' => 'orderby',
      'label' => 'Sort By',
      'type' => 'select',
      'choices' => [
        'date' => __('Date'),
        'post_title' => __('Name'),
      ],

      'wrapper' => [
        'width' => '50%',
      ],
    ],

    [
      'key' => 'mega_layout_posts_order',
      'name' => 'order',
      'label' => 'Order',
      'type' => 'select',
      'choices' => [
        'desc' => __('Descending'),
        'asc' => __('Ascending'),
      ],

      'wrapper' => [
        'width' => '50%',
      ],
    ],

    [
      'key' => 'mega_layout_posts_buttons',
      'type' => 'clone',
      'clone' => ['buttons_field'],
    ],
  ]),

  'min' => '',
  'max' => '',
];
