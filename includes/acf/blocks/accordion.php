<?php
/**
 * Accordion
 */

return [
  'key' => 'mega_layout_accordion',
  'name' => 'accordion',
  'label' => 'Accordion',
  'display' => 'block',

  'sub_fields' => [

    [
      'key' => 'mega_faq_section_title',
      'label' => 'FAQ Section Title',
      'name' => 'faq_section_title',
      'type' => 'text',
      'required' => true,
    ],

  
    [
      'key' => 'mega_layout_accordion_rows',
      'label' => 'Accordions',
      'name' => 'accordions',
      'type' => 'repeater',
      'layout' => 'block',

      'min' => 1,

      'sub_fields' => [

        [
          'key' => 'mega_layout_accordion_rows_title',
          'label' => 'Title',
          'name' => 'title',
          'type' => 'text',
          'required' => true,
        ],

        [
          'key' => 'mega_layout_accordion_rows_content',
          'label' => 'Content',
          'name' => 'content',
          'type' => 'wysiwyg',
          'required' => true,
          'tabs' => 'all',
          'toolbar' => 'full',
          'media_upload' => false,
        ],

      ],
    ],


  ],

  'min' => '',
  'max' => '',
];
