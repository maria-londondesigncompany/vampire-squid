<?php
/**
 * Quotes
 */

return [
  'key' => 'mega_layout_quotes',
  'name' => 'quotes',
  'label' => 'Quote Slider',
  'display' => 'block',

  'sub_fields' => [
    [
      'key' => 'mega_layout_quotes_options',
      'type' => 'clone',
      'clone' => ['anchor', 'background_options'],
    ],

    [
      'key' => 'mega_layout_quotes_title',
      'label' => 'Content',
      'name' => 'content',
      'type' => 'wysiwyg',
      'required' => true,
      'tabs' => 'all',
      'toolbar' => 'full',
      'media_upload' => false,
    ],    

    [
      'key' => 'mega_layout_quotes_rows',
      'label' => 'Quotes',
      'name' => 'quotes',
      'type' => 'repeater',
      'layout' => 'block',

      'min' => 1,

      'sub_fields' => [
        [
          'key' => 'mega_layout_quotes_content',
          'label' => 'Content',
          'name' => 'content',
          'type' => 'wysiwyg',
          'tabs' => 'all',
          'toolbar' => 'basic',
          'media_upload' => false,
        ],
      ],
    ],
  ],

  'min' => '',
  'max' => '',
];
