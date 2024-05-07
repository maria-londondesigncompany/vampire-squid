<?php
/**
 * Logos
 */

return [
  'key' => 'mega_layout_logos',
  'name' => 'logos',
  'label' => 'Logos',
  'display' => 'block',

  'sub_fields' => [
    [
      'key' => 'mega_layout_logos_options',
      'type' => 'clone',
      'clone' => ['anchor', 'background_options'],
    ],

    [
      'key' => 'mega_layout_logos_title',
      'label' => 'Content',
      'name' => 'content',
      'type' => 'wysiwyg',
      'required' => true,
      'tabs' => 'all',
      'toolbar' => 'full',
      'media_upload' => false,
    ],    

    [
      'key' => 'mega_layout_logos_rows',
      'label' => 'Logos',
      'name' => 'logos',
      'type' => 'repeater',
      'layout' => 'block',

      'min' => 1,

      'sub_fields' => [

        [
          'key' => 'mega_layout_logos_media',
          'label' => 'Media',
          'name' => 'media',
          'type' => 'file',
          'required' => true,
        ],


        [
          'key' => 'mega_layout_logos_link',
          'label' => 'Link',
          'name' => 'link',
          'type' => 'text',
        ],

      ],
    ],

    [
      'key' => 'mega_layout_logos_buttons',
      'type' => 'clone',
      'clone' => ['buttons_field'],
    ],
  ],

  'min' => '',
  'max' => '',
];
