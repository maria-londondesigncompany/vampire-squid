<?php
/**
 * Gallery
 */

return [
  'key' => 'mega_layout_gallery',
  'name' => 'gallery',
  'label' => 'Gallery',
  'display' => 'block',

  'sub_fields' => [
    [
      'key' => 'mega_layout_gallery_options',
      'type' => 'clone',
      'clone' => ['anchor', 'background_options'],
    ],

    [
      'key' => 'mega_layout_gallery_items',
      'label' => 'Items',
      'name' => 'items',
      'type' => 'gallery',
    ],
  ],

  'min' => '',
  'max' => '',
];
