<?php
/*
  ==========================================
   Sidebar function
  ==========================================
*/
function widget_footer()
{
  add_theme_support('widget');

  register_sidebar(
    [
      'name'  => 'Footer',
      'id'    => 'footer',
      'description' => 'Footer widgets for navigation',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h6 class="widget-title">',
      'after_title'   => '</h6>',
    ]
  );
}

widget_footer();
add_action('init', 'widget_footer');
