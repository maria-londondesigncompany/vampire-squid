<?php
/**
 * Hero Block
 */

return [
  'key' => 'mega_layout_partial',
  'name' => 'partial',
  'label' => 'Partial',
  'display' => 'block',

  'sub_fields' => [
    [
      'key' => 'mega_layout_partial_post_id',
      'name' => 'post_id',
      'type' => 'post_object',
      'post_type' => [
        'partial',
      ],

      'return_format' => 'id',
    ],
  ],
];
