<?php

function theme_customizer_register($wp_customize)
{
  $wp_customize->add_section('social_links', [
    'title'             => __('Social Links', 'blowup-media-admin'),
    'priority'          => 70,
  ]);


  $wp_customize->add_setting(
    'facebook',
    [
      'default' => '',
      'transport'     => 'postMessage',
    ]
  );


  $wp_customize->add_control(
    'facebook',
    [
      'type'     => 'url',
      'label'    => __('Facebook', 'blowup-media-admin'),
      'section'  => 'social_links',
      'settings' => 'facebook',
    ]
  );

  $wp_customize->add_setting(
    'linkedin',
    [
      'default' => '',
      'transport'     => 'postMessage',
    ]
  );


  $wp_customize->add_control(
    'linkedin',
    [
      'type'     => 'url',
      'label'    => __('LinkedIn', 'blowup-media-admin'),
      'section'  => 'social_links',
      'settings' => 'linkedin',
    ]
  );

  $wp_customize->add_setting(
    'twitter',
    [
      'default' => '',
      'transport'     => 'postMessage',
    ]
  );


  $wp_customize->add_control(
    'twitter',
    [
      'type'     => 'url',
      'label'    => __('Twitter', 'blowup-media-admin'),
      'section'  => 'social_links',
      'settings' => 'twitter',
    ]
  );

  $wp_customize->add_setting(
    'instagram',
    [
      'default' => '',
      'transport'     => 'postMessage',
    ]
  );


  $wp_customize->add_control(
    'instagram',
    [
      'type'     => 'url',
      'label'    => __('Instagram', 'blowup-media-admin'),
      'section'  => 'social_links',
      'settings' => 'instagram',
    ]
  );

  $wp_customize->add_setting(
    'youtube',
    [
      'default' => '',
      'transport'     => 'postMessage',
    ]
  );


  $wp_customize->add_control(
    'youtube',
    [
      'type'     => 'url',
      'label'    => __('Youtube', 'blowup-media-admin'),
      'section'  => 'social_links',
      'settings' => 'youtube',
    ]
  );
}

add_action('customize_register', 'theme_customizer_register');


add_shortcode('social_link_youtube', 'social_link_youtube');
add_shortcode('social_link_twitter', 'social_link_twitter');
add_shortcode('social_link_instagram', 'social_link_instagram');
add_shortcode('social_link_facebook', 'social_link_facebook');
add_shortcode('social_link_linkedin', 'social_link_linkedin');

function social_link_linkedin()
{
  return esc_html(get_theme_mod( 'linkedin' ));
}

function social_link_facebook()
{
  return esc_html(get_theme_mod( 'facebook' ));
}

function social_link_instagram()
{
  return esc_html(get_theme_mod( 'instagram' ));
}

function social_link_twitter()
{
  return esc_html(get_theme_mod( 'twitter' ));
}

function social_link_youtube()
{
  return esc_html(get_theme_mod( 'youtube' ));
}

// Add Logo

function london_black_woman_project( $wp_customize ) {
  /**
   * Initialize sections
   */
  $wp_customize->add_section(
    'theme_header_section',
    array(
      'title'    => __( 'Header', 'London Black Woman Project' ),
      'priority' => 1000,
    )
  );

  /**
   * Section: Page Layout
   */
  // Header Logo.
  $wp_customize->add_setting(
    'header_logo',
    array(
      'default'           => '',
      'sanitize_callback' => 'esc_url_raw',
    )
  );
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'header_logo',
      array(
        'label'       => __( 'Upload Header Logo', 'london-blackwoman-project' ),
        'section'     => 'theme_header_section',
        'settings'    => 'header_logo',
        'priority'    => 1,
      )
    )
  );
}

add_action( 'customize_register', 'london_black_woman_project' );

/**
 * Bind JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @return void
 */
function london_black_woman_project_preview_js() {
  wp_enqueue_script( 'customizer', get_template_directory_uri() . '/inc/customizer.js', array( 'jquery' ), null, true );
}
add_action( 'customize_preview_init', 'london_black_woman_project_preview_js' );