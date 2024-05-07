<?php
register_field_group([
  'key' => 'background_options_group',
  'title' => 'Link Options',
  'style' => 'seamless',

  'fields' => [
    [
      'key' => 'background_options',
      'label'=> __('Background Colour'),
      'name' => 'background_style',

      'type' => 'select',

      'choices' => [
        ''      => __('Default'),
        'light' => __('Off White'),
        'black' => __('Black'),
      ],

      'wrapper' => [
        'width' => '30%',
      ],
    ],
  ],
]);
