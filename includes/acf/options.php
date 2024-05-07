<?php

/*
  ==========================================
   ACF Options
  ==========================================
*/

if (function_exists('acf_add_options_page')) {
  acf_add_options_page();
}

register_field_group([
  'key' => 'options_general',
  'title' => 'General',
  'style' => 'seamless',

  'location' => [
[
    [
      'param' => 'options_page',
      'operator' => '==',
      'value' => 'acf-options',
    ],
    ],
  ],

  'fields' => [

    [
      'key' => 'options_general_posts',
      'label' => 'Posts',
      'type' => 'tab',
    ],

    [
      'key' => 'options_general_posts_header',
      'label' => 'Posts Archive Top Partial',
      'type' => 'post_object',
      'name' => 'post_archive_top_partial',
      'return_format' => 'ID',
      'post_type' => [
          'partial',
        ],
    ],

    [
      'key' => 'options_general_posts_footer',
      'label' => 'Posts Archive Bottom Partial',
      'type' => 'post_object',
      'name' => 'post_archive_bottom_partial',
      'return_format' => 'ID',
      'post_type' => [
          'partial',
        ],
    ],


    [
      'key' => 'options_general_post_footer',
      'label' => 'Post Single Bottom Partial',
      'type' => 'post_object',
      'name' => 'post_bottom_partial',
      'return_format' => 'ID',
      'post_type' => [
          'partial',
        ],
    ],

    [
      'key' => 'options_general_case_studies',
      'label' => 'Case Studies',
      'type' => 'tab',
    ],

    [
      'key' => 'options_general_case_studies_header',
      'label' => 'Case Studies Archive Top Partial',
      'type' => 'post_object',
      'name' => 'case_study_archive_top_partial',
      'return_format' => 'ID',
      'post_type' => [
          'partial',
        ],
    ],

    [
      'key' => 'options_general_case_studies_footer',
      'label' => 'Case Studies Archive Bottom Partial',
      'type' => 'post_object',
      'name' => 'case_study_archive_bottom_partial',
      'return_format' => 'ID',
      'post_type' => [
          'partial',
        ],
    ],


    [
      'key' => 'options_general_case_study_footer',
      'label' => 'Case Study Single Bottom Partial',
      'type' => 'post_object',
      'name' => 'case_study_bottom_partial',
      'return_format' => 'ID',
      'post_type' => [
          'partial',
        ],
    ],

  ],
]);




if (function_exists('acf_add_local_field_group')):
  acf_add_local_field_group(
      array(
          'key' => 'group_65dc4ca03487f',
          'title' => 'Body Background Image',
          'fields' => array(
              array(
                  'key' => 'field_65dc6926ca684',
                  'label' => 'BG Image',
                  'name' => 'body_background_image',
                  'aria-label' => '',
                  'type' => 'image',
                  'instructions' => '',
                  'required' => 0,
                  'conditional_logic' => 0,
                  'wrapper' => array(
                      'width' => '',
                      'class' => '',
                      'id' => '',
                  ),
              ),
          ),
          'location' => array(
              array(
                  array(
                      'param' => 'options_page',
                      'operator' => '==',
                      'value' => 'acf-options',
                  ),
              ),
          ),
          'menu_order' => 0,
          'position' => 'normal',
          'style' => 'default',
          'label_placement' => 'top',
          'instruction_placement' => 'label',
          'hide_on_screen' => '',
          'active' => true,
          'description' => '',
          'show_in_rest' => 0,
      )
  );
endif;





if (function_exists('acf_add_local_field_group')):

  acf_add_local_field_group(
    array(
      'key' => 'group_65dc4ca03483b',
      'title' => 'You Might Also Like Content (Single Posts)',
      'fields' => array(
        array(
          'key' => 'field_65dc6926ca6f8',
          'label' => 'View More Button Link',
          'name' => 'vm_button_link',
          'aria-label' => '',
          'type' => 'page_link',
          'instructions' => '',
          'required' => false,
          'conditional_logic' => 0,
          'wrapper' => [
            'width' => '',
            'class' => '',
            'id' => '',
          ],
          'post_type' => [
            0 => 'page',
          ],
          'taxonomy' => '',
          'allow_archives' => 1,
          'multiple' => 0,
          'allow_null' => 0,
        ),
        array(
          'key' => 'field_65dc4ca03652a',
          'label' => 'You Might Also Like Heading',
          'name' => 'ymal_heading',
          'aria-label' => '',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '50',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'maxlength' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
        ),
        array(
          'key' => 'field_65dc4ca036563',
          'label' => 'You Might Also Like Description',
          'name' => 'ymal_description',
          'aria-label' => '',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '50',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'maxlength' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
        ),
      ),
      'location' => array(
        array(
          array(
            'param' => 'options_page',
            'operator' => '==',
            'value' => 'acf-options',
          ),
        ),
      ),
      'menu_order' => 0,
      'position' => 'normal',
      'style' => 'default',
      'label_placement' => 'top',
      'instruction_placement' => 'label',
      'hide_on_screen' => '',
      'active' => true,
      'description' => '',
      'show_in_rest' => 0,
    )
  );

endif;






if (function_exists('acf_add_local_field_group')) {

  acf_add_local_field_group(array(
      'key' => 'group_662b84830b88e',
      'title' => 'Footer Area',
      'fields' => array(
        array(
          'key' => 'field_662b84830b88f',
          'label' => 'Footer Logo',
          'name' => 'footer_logo',
          'aria-label' => '',
          'type' => 'image',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
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
        ),
        array(
          'key' => 'field_662b84830b890',
          'label' => 'Quick Links Text',
          'name' => 'quick_links_text',
          'aria-label' => '',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => 'Quick Links',
          'maxlength' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
        ),
        array(
          'key' => 'field_662b84830b891',
          'label' => 'Footer Nav Menu',
          'name' => 'footer_nav_menu',
          'aria-label' => '',
          'type' => 'nav_menu',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'save_format' => 'menu',
          'container' => 'nav',
          'allow_null' => 0,
        ),
        array(
          'key' => 'field_662b84830b892',
          'label' => 'Join Our Newsletter Text',
          'name' => 'join_our_newsletter_text',
          'aria-label' => '',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'maxlength' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
        ),
        array(
          'key' => 'field_662b85bc02cb0',
          'label' => 'Join Our Newsletter Description',
          'name' => 'join_our_newsletter_description',
          'aria-label' => '',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'maxlength' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
        ),
        array(
          'key' => 'field_662b85d102cb1',
          'label' => 'Join Our Newsletter Form Shortcode',
          'name' => 'join_our_newsletter_form_shortcode',
          'aria-label' => '',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'maxlength' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
        ),
        array(
          'key' => 'field_662b84830b825',
          'label' => 'T/Cs Menu',
          'name' => 'terms_menu',
          'aria-label' => '',
          'type' => 'nav_menu',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'save_format' => 'menu',
          'container' => 'nav',
          'allow_null' => 0,
        ),
        array(
          'key' => 'field_662b85bc02cd3',
          'label' => 'Enter Linkedin Link',
          'name' => 'linkedin_link',
          'aria-label' => '',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '50%',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'maxlength' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
        ),
        array(
          'key' => 'field_662b85bc02cd8',
          'label' => 'Enter Instagram Link',
          'name' => 'insta_link',
          'aria-label' => '',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '50%',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'maxlength' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
        ),
        array(
          'key' => 'field_662b85bc02dj0',
          'label' => 'Enter Twitter Link',
          'name' => 'x_link',
          'aria-label' => '',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '50%',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'maxlength' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
        ),
        array(
          'key' => 'field_662b85bc02lt0',
          'label' => 'Enter Facebook Link',
          'name' => 'fb_link',
          'aria-label' => '',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '50%',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'maxlength' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
        ),
      ),
      'location' => array(
          array(
              array(
                  'param' => 'options_page',
                  'operator' => '==',
                  'value' => 'acf-options',
              ),
          ),
      ),
      'menu_order' => 0,
      'position' => 'normal',
      'style' => 'default',
      'label_placement' => 'top',
      'instruction_placement' => 'label',
      'hide_on_screen' => '',
      'active' => true,
      'description' => '',
  ));
}



if( function_exists('acf_add_local_field_group') ):

  acf_add_local_field_group(array(
    'key' => 'group_65dc453dcabde',
    'title' => 'Products Downloads Section',
    'fields' => array(
          array(
            'key' => 'field_663369b4f919c',
            'label' => 'Products Downloads Text',
            'name' => 'products_downloads_text',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
  
            'default_value' => '',
            'maxlength' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
          ),
          array(
            'key' => 'field_66336a37f919d',
            'label' => 'Product Box',
            'name' => 'product_box',
            'type' => 'repeater',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'layout' => 'block',
            'min' => 0,
            'max' => 0,
            'collapsed' => '',
            'button_label' => 'Add Row',
            'rows_per_page' => 20,
            'sub_fields' => array(
              array(
                'key' => 'field_66336a55f919e',
                'label' => 'Product Image',
                'name' => 'product_image',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                  'width' => '',
                  'class' => '',
                  'id' => '',
                ),
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
                'parent_repeater' => 'field_66336a37f919d',
              ),
              array(
                'key' => 'field_66336a69f919f',
                'label' => 'Product Title',
                'name' => 'product_title',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                  'width' => '',
                  'class' => '',
                  'id' => '',
                ),
                'default_value' => '',
                'maxlength' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'parent_repeater' => 'field_66336a37f919d',
              ),
              array(
                'key' => 'field_66336a85f91a0',
                'label' => 'Product Description',
                'name' => 'product_description',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                  'width' => '',
                  'class' => '',
                  'id' => '',
                ),
                'default_value' => '',
                'maxlength' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'parent_repeater' => 'field_66336a37f919d',
              ),
              array(
                'key' => 'field_66336abcf91a1',
                'label' => 'Product Playstore Link',
                'name' => 'product_link_playstore',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                  'width' => '',
                  'class' => '',
                  'id' => '',
                ),
                'default_value' => '',
                'maxlength' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'parent_repeater' => 'field_66336a37f919d',
              ),
              array(
                'key' => 'field_66336acdf91a2',
                'label' => 'Product Apple Link',
                'name' => 'product_link_apple',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                  'width' => '',
                  'class' => '',
                  'id' => '',
                ),
                'default_value' => '',
                'maxlength' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'parent_repeater' => 'field_66336a37f919d',
              ),
              array(
                'key' => 'field_66336ae6f91a3',
                'label' => 'Product Download Link',
                'name' => 'product_download_link',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                  'width' => '',
                  'class' => '',
                  'id' => '',
                ),
                'default_value' => '',
                'maxlength' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'parent_repeater' => 'field_66336a37f919d',
              ),
            ),
          ),
        ),
 
    'location' => array(
      array(
        array(
          'param' => 'options_page',
          'operator' => '==',
          'value' => 'acf-options',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
    'show_in_rest' => 0,
  ));
  
  endif;




// if( function_exists('acf_add_local_field_group') ):

//   acf_add_local_field_group(array(
//     'key' => 'group_65dc453dcablk',
//     'title' => 'Shop Subscriptions Section',
//     'fields' => array(
//           array(
//             'key' => 'field_663369b4f91ej',
//             'label' => 'Features Text',
//             'name' => 'features_text',
//             'type' => 'text',
//             'instructions' => '',
//             'required' => 0,
//             'conditional_logic' => 0,
//             'wrapper' => array(
//               'width' => '',
//               'class' => '',
//               'id' => '',
//             ),
  
//             'default_value' => '',
//             'maxlength' => '',
//             'placeholder' => '',
//             'prepend' => '',
//             'append' => '',
//           ),
//           array(
//             'key' => 'field_663369b4f91mn',
//             'label' => 'Features Description',
//             'name' => 'features_desc',
//             'type' => 'text',
//             'instructions' => '',
//             'required' => 0,
//             'conditional_logic' => 0,
//             'wrapper' => array(
//               'width' => '',
//               'class' => '',
//               'id' => '',
//             ),
  
//             'default_value' => '',
//             'maxlength' => '',
//             'placeholder' => '',
//             'prepend' => '',
//             'append' => '',
//           ),
//           array(
//             'key' => 'field_66336a37f99ol',
//             'label' => 'Features Row',
//             'name' => 'features_box',
//             'type' => 'repeater',
//             'instructions' => '',
//             'required' => 0,
//             'conditional_logic' => 0,
//             'wrapper' => array(
//               'width' => '',
//               'class' => '',
//               'id' => '',
//             ),
//             'layout' => 'block',
//             'min' => 0,
//             'max' => 0,
//             'collapsed' => '',
//             'button_label' => 'Add Row',
//             'rows_per_page' => 20,
//             'sub_fields' => array(
//               array(
//                 'key' => 'field_66336a69f91vg',
//                 'label' => 'Product Feature',
//                 'name' => 'product_feature',
//                 'type' => 'text',
//                 'instructions' => '',
//                 'required' => 0,
//                 'conditional_logic' => 0,
//                 'wrapper' => array(
//                   'width' => '',
//                   'class' => '',
//                   'id' => '',
//                 ),
//                 'default_value' => '',
//                 'maxlength' => '',
//                 'placeholder' => '',
//                 'prepend' => '',
//                 'append' => '',
//                 'parent_repeater' => 'field_66336a37f99ol',
//               ),
//               array(
//                 'key' => 'field_66336a85f915g',
//                 'label' => 'Feature for free',
//                 'name' => 'feature_for_free',
//                 'type' => 'text',
//                 'instructions' => '',
//                 'required' => 0,
//                 'conditional_logic' => 0,
//                 'wrapper' => array(
//                   'width' => '',
//                   'class' => '',
//                   'id' => '',
//                 ),
//                 'default_value' => '',
//                 'maxlength' => '',
//                 'placeholder' => '',
//                 'prepend' => '',
//                 'append' => '',
//                 'parent_repeater' => 'field_66336a37f99ol',
//               ),
//               array(
//                 'key' => 'field_66336abcf91vg',
//                 'label' => 'Feature for Standard',
//                 'name' => 'feature_for_standard',
//                 'type' => 'text',
//                 'instructions' => '',
//                 'required' => 0,
//                 'conditional_logic' => 0,
//                 'wrapper' => array(
//                   'width' => '',
//                   'class' => '',
//                   'id' => '',
//                 ),
//                 'default_value' => '',
//                 'maxlength' => '',
//                 'placeholder' => '',
//                 'prepend' => '',
//                 'append' => '',
//                 'parent_repeater' => 'field_66336a37f99ol',
//               ),
//               array(
//                 'key' => 'field_66336acdf91vf',
//                 'label' => 'Feature for Premium',
//                 'name' => 'feature_for_premium',
//                 'type' => 'text',
//                 'instructions' => '',
//                 'required' => 0,
//                 'conditional_logic' => 0,
//                 'wrapper' => array(
//                   'width' => '',
//                   'class' => '',
//                   'id' => '',
//                 ),
//                 'default_value' => '',
//                 'maxlength' => '',
//                 'placeholder' => '',
//                 'prepend' => '',
//                 'append' => '',
//                 'parent_repeater' => 'field_66336a37f919d',
//               ),

//             ),
//           ),
//         ),
 
//     'location' => array(
//       array(
//         array(
//           'param' => 'options_page',
//           'operator' => '==',
//           'value' => 'acf-options',
//         ),
//       ),
//     ),
//     'menu_order' => 0,
//     'position' => 'normal',
//     'style' => 'default',
//     'label_placement' => 'top',
//     'instruction_placement' => 'label',
//     'hide_on_screen' => '',
//     'active' => true,
//     'description' => '',
//     'show_in_rest' => 0,
//   ));
  
//   endif;


if( function_exists('acf_add_local_field_group') ):

  acf_add_local_field_group(array(
    'key' => 'group_66337f5d4fbb8',
    'title' => 'Shop Features Section',
    'fields' => array(
          array(
            'key' => 'field_66337fadf6767',
            'label' => 'Product Features Text',
            'name' => 'product_features_text',
            'aria-label' => '',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => 'Features',
            'maxlength' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
          ),
          array(
            'key' => 'field_66337fc4f6768',
            'label' => 'Product Features Description',
            'name' => 'product_features_description',
            'aria-label' => '',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor',
            'maxlength' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
          ),
          array(
            'key' => 'field_66337fdff6769',
            'label' => 'Product Features Row',
            'name' => 'product_features_row',
            'aria-label' => '',
            'type' => 'repeater',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'layout' => 'block',
            'pagination' => 0,
            'min' => 0,
            'max' => 0,
            'collapsed' => '',
            'button_label' => 'Add Row',
            'rows_per_page' => 20,
            'sub_fields' => array(
              array(
                'key' => 'field_66337ff6f676a',
                'label' => 'Product Feature',
                'name' => 'product_feature',
                'aria-label' => '',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                  'width' => '',
                  'class' => '',
                  'id' => '',
                ),
                'default_value' => '',
                'maxlength' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'parent_repeater' => 'field_66337fdff6769',
              ),
              array(
                'key' => 'field_66338186e44e0',
                'label' => 'Select content type for Free',
                'name' => 'select_content_type_for_free',
                'aria-label' => '',
                'type' => 'radio',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                  'width' => '',
                  'class' => '',
                  'id' => '',
                ),
                'choices' => array(
                  'Check Mark' => 'Check Mark',
                  'Cross Mark' => 'Cross Mark',
                  'Text for Free' => 'Text for Free',
                ),
                'default_value' => '',
                'return_format' => 'value',
                'allow_null' => 0,
                'other_choice' => 0,
                'layout' => 'vertical',
                'save_other_choice' => 0,
                'parent_repeater' => 'field_66337fdff6769',
              ),
              array(
                'key' => 'field_66338011f676b',
                'label' => 'For free',
                'name' => 'for_free',
                'aria-label' => '',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                  array(
                    array(
                      'field' => 'field_66338186e44e0',
                      'operator' => '==',
                      'value' => 'Text for Free',
                    ),
                  ),
                ),
                'wrapper' => array(
                  'width' => '',
                  'class' => '',
                  'id' => '',
                ),
                'default_value' => '',
                'maxlength' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'parent_repeater' => 'field_66337fdff6769',
              ),
              array(
                'key' => 'field_6633821ae44e1',
                'label' => 'Select content type for Standard',
                'name' => 'select_content_type_for_standard',
                'aria-label' => '',
                'type' => 'radio',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                  'width' => '',
                  'class' => '',
                  'id' => '',
                ),
                'choices' => array(
                  'Check Mark' => 'Check Mark',
                  'Cross Mark' => 'Cross Mark',
                  'Text for Standard' => 'Text for Standard',
                ),
                'default_value' => '',
                'return_format' => 'value',
                'allow_null' => 0,
                'other_choice' => 0,
                'layout' => 'vertical',
                'save_other_choice' => 0,
                'parent_repeater' => 'field_66337fdff6769',
              ),
              array(
                'key' => 'field_6633802df676c',
                'label' => 'For Standard',
                'name' => 'for_standard',
                'aria-label' => '',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                  array(
                    array(
                      'field' => 'field_6633821ae44e1',
                      'operator' => '==',
                      'value' => 'Text for Standard',
                    ),
                  ),
                ),
                'wrapper' => array(
                  'width' => '',
                  'class' => '',
                  'id' => '',
                ),
                'default_value' => '',
                'maxlength' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'parent_repeater' => 'field_66337fdff6769',
              ),
              array(
                'key' => 'field_66338239e44e2',
                'label' => 'Select content type for Premium',
                'name' => 'select_content_type_for_premium',
                'aria-label' => '',
                'type' => 'radio',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                  'width' => '',
                  'class' => '',
                  'id' => '',
                ),
                'choices' => array(
                  'Check Mark' => 'Check Mark',
                  'Cross Mark' => 'Cross Mark',
                  'Text for Premium' => 'Text for Premium',
                ),
                'default_value' => '',
                'return_format' => 'value',
                'allow_null' => 0,
                'other_choice' => 0,
                'save_other_choice' => 0,
                'layout' => 'vertical',
                'parent_repeater' => 'field_66337fdff6769',
              ),
              array(
                'key' => 'field_66338036f676d',
                'label' => 'For Premium',
                'name' => 'for_premium',
                'aria-label' => '',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                  array(
                    array(
                      'field' => 'field_66338239e44e2',
                      'operator' => '==',
                      'value' => 'Text for Premium',
                    ),
                  ),
                ),
                'wrapper' => array(
                  'width' => '',
                  'class' => '',
                  'id' => '',
                ),
                'default_value' => '',
                'maxlength' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'parent_repeater' => 'field_66337fdff6769',
              ),
            ),
          ),
        ),
    
    'location' => array(
      array(
        array(
          'param' => 'options_page',
          'operator' => '==',
          'value' => 'acf-options',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
    'show_in_rest' => 0,
  ));
  
  endif;		