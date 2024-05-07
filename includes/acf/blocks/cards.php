<?php
/**
 * Cards
 */

return [
  'key' => 'mega_layout_cards',
  'name' => 'cards',
  'label' => 'Cards',
  'display' => 'block',

  'sub_fields' => [
    [
      'key' => 'mega_layout_cards_options',
      'type' => 'clone',
      'clone' => ['anchor', 'background_options'],
    ],

    [
      'key' => 'mega_layout_cards_style',
      'label' => 'Style',
      'name' => 'style',
      'type' => 'radio',
      'layout' => 'horizontal',

      'choices' => [
        'content' => __('Content'),
        'team'    => __('Team'),
      ],
    ],

    [
      'key' => 'mega_layout_cards_title',
      'label' => 'Content',
      'name' => 'content',
      'type' => 'wysiwyg',
      'required' => true,
      'tabs' => 'all',
      'toolbar' => 'full',
      'media_upload' => false,
    ],    

    [
      'key' => 'mega_layout_cards_buttons',
      'type' => 'clone',
      'clone' => ['buttons_field'],
    ],

    [
      'key' => 'mega_layout_cards_rows',
      'label' => 'Cards',
      'name' => 'cards',
      'type' => 'repeater',
      'layout' => 'block',

      'min' => 1,

      'sub_fields' => [

        [
          'key' => 'mega_layout_cards_media',
          'label' => 'Media',
          'name' => 'media',
          'type' => 'file',
          'required' => true,
        ],

        [
          'key' => 'mega_layout_cards_content',
          'label' => 'Content',
          'name' => 'content',
          'type' => 'wysiwyg',
          'tabs' => 'all',
          'toolbar' => 'full',
          'media_upload' => false,
        ],

        [
          'key' => 'mega_layout_cards_linkedin',
          'label' => 'LinkedIn',
          'name' => 'linkedin',
          'type' => 'url',

          'conditional_logic' => [
            [
              [
                'field' => 'mega_layout_cards_style',
                'operator' => '==',
                'value' => 'team',
              ]
            ]
          ]
        ],

        [
          'key' => 'mega_layout_cards_link',
          'label' => 'Link',
          'name' => 'link',
          'type' => 'link',
        ],

      ],
    ],
  ],

  'min' => '',
  'max' => '',
];
