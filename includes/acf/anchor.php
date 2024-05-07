<?php
register_field_group([
  'key' => 'anchor_group',
  'title' => 'Anchor',
  'style' => 'seamless',

  'fields' => [
    [
      'key' => 'anchor',
      'type' => 'text',
      'name' => 'anchor',
      'label'=>'Anchor',
      'instructions' => __('Can be used to jump to this content on the page, place \'#anchor\' in the url of a link, no spaces allowed, id must be unique on the page'),
      'wrapper' => [
        'width' => '50%',
      ],
      'placeholder' => 'anchor',
    ],
  ],
]);
