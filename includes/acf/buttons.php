<?php
register_field_group([
  'key' => 'buttons_group',
  'title' => 'Buttons',
  'style' => 'seamless',

  'fields' => [
    [
      'key' => 'buttons_field',
      'label' => 'Buttons',
      'name' => 'buttons',
      'type' => 'repeater',

      'sub_fields' => [
        [
          'key' => 'button_field',
          'label' => 'Button',
          'name' => 'button',
          'type' => 'link',
          'required' => true
        ],

        [
          'key' => 'button_options',
          'label'=> __('Button Colour'),
          'name' => 'button_style',

          'type' => 'select',

          'choices' => [
            'primary' => __('Blue'),
            'dark' => __('Black'),
            'secondary' => __('Grey'),
            'light' => __('White'),

            'outline-primary' => __('Outline Blue'),
            'outline-dark' => __('Outline Black'),
            'outline-secondary' => __('Outline Grey'),
            'outline-light' => __('Outline White'),

            'button' => __('Link'),
          ],

          'wrapper' => [
            'width' => '30%',
          ],
        ],
      ],
    ],
  ],
]);
