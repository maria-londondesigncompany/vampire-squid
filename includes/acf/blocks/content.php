<?php
/**
 * Content
 */

return [
  'key' => 'mega_layout_content',
  'name' => 'content',
  'label' => 'Content',
  'display' => 'block',

  'sub_fields' => [
    [
      'key' => 'mega_layout_content_options',
      'type' => 'clone',
      'clone' => ['anchor', 'background_options'],
    ],

    [
      'key' => 'mega_layout_content_value',
      'label' => 'Content',
      'name' => 'content',
      'type' => 'wysiwyg',
      'required' => 1,
      'tabs' => 'all',
      'toolbar' => 'full',
      'media_upload' => 1,
    ],

    [
      'key' => 'mega_layout_content_buttons',
      'type' => 'clone',
      'clone' => ['buttons_field'],
    ],

  ],

  'min' => '',
  'max' => '',
];

