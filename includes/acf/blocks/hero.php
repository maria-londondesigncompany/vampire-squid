<?php
/**
 * Hero Block
 */

return [
  'key' => 'mega_layout_hero',
  'name' => 'hero',
  'label' => 'Hero',
  'display' => 'block',

  'sub_fields' => [
    [
      'key' => 'mega_layout_hero_anchor',
      'type' => 'clone',
      'clone' => ['anchor'],
    ],

    [
      'key' => 'mega_layout_hero_min_height',
      'name' => 'min_height',
      'label'=> 'Minimum Height',
      'type' => 'radio',
      'direction' => 'horizontal',
      'choices' => [
        ''            => 'None',
        'screen-half' => 'Half Screen',
        'screen'      => 'Screen',
      ],
      'wrapper' => [
        'width' => '33%',
      ]
    ],

    [
      'key' => 'mega_layout_hero_content_per_slide',
      'name' => 'content_per_slide',
      'label'=> 'Content Per Slide?',
      'type' => 'true_false',

      'wrapper' => [
        'width' => '33%',
      ],
    ],

    [
      'key' => 'mega_layout_hero_slides',
      'label' => 'Hero Slides',
      'name' => 'slides',
      'type' => 'repeater',
      'layout' => 'block',
      'min' => 1,

      'sub_fields' => [
        [
          'key' => 'mega_layout_hero_slides_media',
          'label' => 'Image / Video',
          'name' => 'media',
          'type' => 'file',
          'required' => true,
          'mime_types' => 'mp4,jpeg,jpg,png',

          'wrapper' => [
            'width' => '33%',
          ]
        ],

        [
          'key' => 'mega_layout_hero_video_placeholder',
          'label' => 'Video Placeholder',
          'name' => 'video_placeholder',
          'type' => 'image',
          'instructions' => 'If video is used this image will be used before the video loads',

          'wrapper' => [
            'width' => '33%',
          ],
        ],

        [
          'key' => 'mega_layout_hero_slides_align',
          'name' => 'align',
          'label'=> 'Align',
          'type' => 'radio',
          'layout' => 'horizontal',
          'choices' => [
            'left'   => __('Left'),
            'center' => __('Center'),
            'right'  => __('Right'),
          ],
          'wrapper' => [
            'width' => '33%',
          ],
          'conditional_logic' => [
            [
              [
                'field' => 'mega_layout_hero_content_per_slide',
                'operator' => '==',
                'value' => '1',
              ],
            ],
          ],
        ],

        [
          'key' => 'mega_layout_hero_slides_content',
          'label' => 'Content',
          'name' => 'content',
          'type' => 'wysiwyg',
          'media_upload' => false,
          'conditional_logic' => [
            [
              [
                'field' => 'mega_layout_hero_content_per_slide',
                'operator' => '==',
                'value' => '1',
              ],
            ],
          ],
        ],

        [
          'key' => 'mega_layout_hero_slides_buttons',
          'label' => 'Buttons',
          'name' => 'buttons',
          'type' => 'repeater',
          'conditional_logic' => [
            [
              [
                'field' => 'mega_layout_hero_content_per_slide',
                'operator' => '==',
                'value' => '1',
              ],
            ],
          ],

          'sub_fields' => [
            [
              'key' => 'mega_layout_hero_slides_buttons_button',
              'label' => 'Button',
              'name' => 'button',
              'type' => 'link',
              'required' => true
            ],

            [
              'key' => 'mega_layout_hero_slides_buttons_button_options',
              'type'  => 'clone',
              'clone' => ['button_options'],
            ],
          ],
        ],
      ],
    ],

    [
      'key' => 'mega_layout_hero_align',
      'name' => 'align',
      'label'=> 'Align',
      'type' => 'radio',
      'layout' => 'horizontal',
      'choices' => [
        'left'   => __('Left'),
        'center' => __('Center'),
        'right'  => __('Right'),
      ],
      'wrapper' => [
        'width' => '33%',
      ],
      'conditional_logic' => [
        [
          [
            'field' => 'mega_layout_hero_content_per_slide',
            'operator' => '!=',
            'value' => '1',
          ],
        ],
      ],
    ],


    [
      'key' => 'mega_layout_hero_content',
      'label' => 'Content',
      'name' => 'content',
      'type' => 'wysiwyg',

      'media_upload' => false,
      'conditional_logic' => [
        [
          [
            'field' => 'mega_layout_hero_content_per_slide',
            'operator' => '!=',
            'value' => '1',
          ],
        ],
      ],
    ],

    [
      'key' => 'mega_layout_hero_buttons',
      'label' => 'Buttons',
      'name' => 'buttons',
      'type' => 'repeater',
      'conditional_logic' => [
        [
          [
            'field' => 'mega_layout_hero_content_per_slide',
            'operator' => '!=',
            'value' => '1',
          ],
        ],
      ],

      'sub_fields' => [
        [
          'key' => 'mega_layout_hero_buttons_button',
          'label' => 'Button',
          'name' => 'button',
          'type' => 'link',
          'required' => true
        ],

        [
          'key' => 'mega_layout_hero_buttons_button_options',
          'type'  => 'clone',
          'clone' => ['button_options'],
        ],
      ],
    ],
  ],
  'min' => '',
  'max' => '',
];
