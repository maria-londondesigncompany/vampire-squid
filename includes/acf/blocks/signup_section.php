<?php
return [
  'key' => 'mega_layout_signup',
  'name' => 'signup_section',
  'label' => 'Signup Section',
  'display' => 'block',
  'sub_fields' => [
    [
        'key' => 'mega_layout_signup_background_image',
        'label' => 'Background Image',
        'name' => 'background_image',
        'aria-label' => '',
        'type' => 'image',
        'instructions' => '',
        'required' => false,
        'conditional_logic' => 0,
        'wrapper' => [
            'width' => '',
            'class' => '',
            'id' => '',
        ],
        'return_format' => 'url',
        'library' => 'all',
        'min_width' => '',
        'min_height' => '',
        'min_size' => '',
        'max_width' => '',
        'max_height' => '',
        'max_size' => '',
        'mime_types' => '',
        'preview_size' => 'medium',
    ],
    [
      'key' => 'mega_layout_signup_header',
      'label' => 'Heading',
      'name' => 'heading',
      'aria-label' => '',
      'type' => 'text',
      'instructions' => '',
      'required' => false,
      'conditional_logic' => 0,
      'wrapper' => [
        'width' => '',
        'class' => '',
        'id' => '',
      ],
      'default_value' => '',
      'maxlength' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
    ],
    [
      'key' => 'mega_layout_signup_description',
      'label' => 'Description',
      'name' => 'description',
      'aria-label' => '',
      'type' => 'text',
      'instructions' => '',
      'required' => false,
      'conditional_logic' => 0,
      'wrapper' => [
          'width' => '',
          'class' => '',
          'id' => '',
      ],
      'default_value' => '',
      'maxlength' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
    ],
    [
      'key' => 'mega_layout_signup_button',
      'label' => 'Button Url',
      'name' => 'button_url',
      'aria-label' => '',
      'type' => 'link',
      'instructions' => '',
      'required' => false,
      'conditional_logic' => 0,
      'wrapper' => [
        'width' => '',
        'class' => '',
        'id' => '',
      ],
      'return_format' => 'array',
    ],
  ],
  'min' => '',
  'max' => '',
];
