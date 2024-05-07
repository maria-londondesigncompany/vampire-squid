<?php

return [
  'key' => 'mega_layout_media_beside_content',
  'name' => 'media_beside_content',
  'label' => 'Media beside Content',
  'display' => 'block',

  'sub_fields' => [
    [
      'key' => 'mega_layout_media_beside_content_anchor',
      'type' => 'clone',
      'clone' => ['anchor', 'background_options'],
    ],

    [
      'key' => 'mega_layout_media_beside_content_side',
      'name' => 'content_side',
      'label'=> 'Content side?',
      'type' => 'radio',
      'layout' => 'horizontal',
      'choices' => [
        'right' => 'Right',
        'left' => 'Left',
      ],
      'wrapper' => [
        'width' => '50%',
      ]
    ],

    [
      'key' => 'mega_layout_media_beside_content_slides_media',
      'label' => 'Image / Video',
      'name' => 'media',
      'type' => 'file',
      'required' => true,
      'mime_types' => 'mp4,jpeg,jpg,png',

      'wrapper' => [
        'width' => '50%',
      ]
    ],

    [
      'key' => 'mega_layout_media_beside_content_video_placeholder',
      'label' => 'Video Placeholder',
      'name' => 'video_placeholder',
      'type' => 'image',
      'instructions' => 'If video is used this image will be used before the video loads',

      'wrapper' => [
        'width' => '50%',
      ],
    ],

    [
      'key' => 'mega_layout_media_beside_content_content',
      'label' => 'Content',
      'type' => 'wysiwyg',
      'name' => 'content',
    ],

    [
      'key' => 'mega_layout_media_beside_content_buttons',
      'type'  => 'clone',
      'clone' => ['buttons_group'],
    ],
  ],

  'min' => '',
  'max' => '',
];
