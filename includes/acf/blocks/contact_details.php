<?php
/**
 * Contact Details
 */

return [
  'key' => 'mega_layout_contact_details',
  'name' => 'contact_details',
  'label' => 'Contact Details',
  'display' => 'block',

  'sub_fields' => [
    [
      'key' => 'mega_layout_contact_details_options',
      'type' => 'clone',
      'clone' => ['anchor', 'background_options'],
    ],

    [
      'key' => 'mega_layout_contact_details_title',
      'label' => 'Title',
      'name' => 'title',
      'type' => 'wysiwyg',
      'required' => 1,
      'tabs' => 'all',
      'media_upload' => false,
    ],    

    [
      'key' => 'mega_layout_contact_details_phone',
      'label' => 'Phone',
      'name' => 'phone',
      'type' => 'text',
    ],

    [
      'key' => 'mega_layout_contact_details_address',
      'label' => 'Address',
      'name' => 'address',
      'type' => 'textarea',
    ],

    [
      'key' => 'mega_layout_contact_details_latitude',
      'label' => 'Latitude',
      'name' => 'latitude',
      'type' => 'number',
      'step' => 0.0000001,

      'wrapper' => [
        'width' => '50%',
      ],
    ],

    [
      'key' => 'mega_layout_contact_details_longitude',
      'label' => 'Longitude',
      'name' => 'longitude',
      'type' => 'number',
      'step' => 0.0000001,

      'wrapper' => [
        'width' => '50%',
      ],
    ],

    [
      'key' => 'mega_layout_contact_details_content',
      'label' => 'Content',
      'name' => 'content',
      'type' => 'wysiwyg',
      'tabs' => 'all',
      'toolbar' => 'full',
      'media_upload' => 1,
    ],    

  ],

  'min' => '',
  'max' => '',
];
