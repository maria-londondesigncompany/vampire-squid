<?php

/* Mega */

if(!class_exists('ACF'))
{
  return;
}


function mega_post_types() : array
{
  return ['page', 'partial', 'post', 'case_study'];
}

function mega_content($post_content = null, $ID = null, &$build = false)
{
  global $wp_embed;

  $post = get_post($ID);

  if($post && in_array($post->post_type, mega_post_types()) && empty(get_page_template_slug($ID)) && have_rows('flexible_content', $ID))
  {
    ob_start();


    // wp-includes/class-wp-embed.php
    if( !empty($wp_embed) )
    {

      remove_filter( 'acf_the_content', [ $wp_embed, 'run_shortcode' ], 8);
      remove_filter( 'acf_the_content', [ $wp_embed, 'autoembed' ], 8);

    }

    remove_filter( 'acf_the_content', 'do_shortcode', 11);

    // Cache Values
    get_field('flexible_content', $ID);

    add_action('pre_get_posts', 'mega_dynamic_query_warning');

    ?>
    <!-- wp:html -->
    <div class="mega">
    <?php

    while(have_rows('flexible_content', $ID))
    {
      the_row();
      get_template_part('partials/blocks/' . get_row_layout());
    }

    ?>
    </div>
    <!-- /wp:html -->
    <?php
    remove_action('pre_get_posts', 'mega_dynamic_query_warning');

    // wp-includes/class-wp-embed.php
    if( !empty($wp_embed) )
    {

      add_filter( 'acf_the_content', [ $wp_embed, 'run_shortcode' ], 8);
      add_filter( 'acf_the_content', [ $wp_embed, 'autoembed' ], 8);

    }

    add_filter( 'acf_the_content', 'do_shortcode', 11);


    $build = true;

    return ob_get_clean();
  }

  return $post_content;
}

function mega_set_preview($post)
{
  add_filter('content_pagination', 'meta_preview_content_pagination', 10, 2);

  return $post;
}

add_filter('the_preview', 'mega_set_preview');

function mega_dynamic_query_warning()
{
throw new Exception('You must not add WP_Query/query_posts directly to a blocks html, you must put within a shortcode');
}

function mega_fallback_featured_image($thumbnail_id, $post_id, $meta_key, $single, $meta_type)
{
  if(!is_admin() && $meta_type == 'post' && $meta_key == '_thumbnail_id')
  {
    $post = get_post($post_id);

    $maybe_set_featured = function ($value, $post_id, $field) use($post, &$thumbnail_id) {
      if($post->ID != $post_id || $thumbnail_id)
      {
        return $value;
      }


      if($value && $value['type'] == 'image')
      {
        $thumbnail_id = $value['ID'];
        update_post_meta($post_id, '_thumbnail_id', $value['ID']);
      }

      return $value;
    };

    add_filter('acf/format_value/type=file', $maybe_set_featured, 20, 3);
    add_filter('acf/format_value/type=image', $maybe_set_featured, 20, 3);

    mega_content(null, $post->ID);

    remove_filter('acf/format_value/type=file', $maybe_set_featured, 20);
    remove_filter('acf/format_value/type=image', $maybe_set_featured, 20);

  }

  return $thumbnail_id;
}

add_filter('default_post_metadata', 'mega_fallback_featured_image', 10, 6);

function mega_content_as_content($ID)
{
  global $post, $wpdb;

  $post = get_post($ID);

  if(!$post || !in_array($post->post_type, mega_post_types()))
  {
    return;
  }

  $post_content = $post->post_content;

  $maybe_set_featured = function ($value, $post_id, $field) use($post) {
    if($post->ID != $post_id || get_post_thumbnail_id($post))
    {
      return $value;
    }

    if($value && $value['type'] == 'image')
    {
      update_post_meta($post_id, '_thumbnail_id', $value['ID']);
    }

    return $value;
  };

  remove_filter('default_post_metadata', 'mega_fallback_featured_image', 10, 6);
  add_filter('acf/format_value/type=file', $maybe_set_featured, 20, 3);
  add_filter('acf/format_value/type=image', $maybe_set_featured, 20, 3);

  $post_content = mega_content($post_content, $ID, $built);

  remove_filter('acf/format_value/type=file', $maybe_set_featured, 20);
  remove_filter('acf/format_value/type=image', $maybe_set_featured, 20);
  add_filter('default_post_metadata', 'mega_fallback_featured_image', 10, 6);

  if( $built )
  {
    $wpdb->query($wpdb->prepare("UPDATE {$wpdb->posts} SET post_content = %s WHERE ID = %d", $post_content, $ID));
    clean_post_cache($ID);
  }
}

add_action('save_post', 'mega_content_as_content');

function mega_refresh_content_cache()
{
  if(defined('MULTISITE') && MULTISITE)
  {
    foreach(get_sites() as $site)
    {
      switch_to_blog($site->blog_id);
      switch_to_locale(get_option( 'WPLANG' ) ?: get_site_option( 'WPLANG' ));

      mega_rebuild_posts();

      restore_current_locale();
      restore_current_blog();
    }
  }
  else
  {
    mega_rebuild_posts();
  }
}

function mega_rebuild_posts()
{
  $pages = new WP_Query([
    'post_type' => mega_post_types(),
    'post_status' => 'any',
    'posts_per_page' => 50,
  ]);

  do
  {
    $more = false;

    while($pages->have_posts())
    {
      $pages->the_post();

      mega_content_as_content(get_the_ID());
    }

    $page = $pages->get('paged') ?: 1;

    if($page < $pages->max_num_pages)
    {
      free_memory ();

      $pages->set('paged', $page + 1);
      $pages->get_posts();
      $more = true;
    }
  } while($more);

}

function admin_mega_rebuild()
{
  ?>
  <div class="wrap">

    <h1>Rebuild</h1>

    <form method="post">
      <table>
        <tr>
          <td><button type="submit" name="rebuild" value="true">Rebuild</button></td>
        </tr>
      </table>
    </form>

    <?php
    if(filter_input(INPUT_POST, 'rebuild'))
    {
      mega_refresh_content_cache();
      echo "Done";
    }
    ?>
  </div>

  <?php
}

function admin_mega_rebuild_menu()
{
  add_submenu_page(
    'edit.php?post_type=page',
    'Rebuild Mega Pages',
    'Rebuild Mega Pages',
    'edit_posts',
    'mega-rebuild',
    'admin_mega_rebuild'
  );
}

add_action( 'admin_menu', 'admin_mega_rebuild_menu', 99);


function meta_preview_content_pagination($pages, $post) {
  if(!is_singular())
  {
    return $pages;
  }

  $content = mega_content($post->post_content, $post->ID, $built);

  if($content)
  {
    return [ $content ];
  }

  return $pages;
}

function mega_override_revisions_for_acf_preview($num, $post)
{
  return $num ?: 1;
}

add_action('init', function () {
  if(isset($_GET['preview']))
  {
    add_action('wp_revisions_to_keep', 'mega_override_revisions_for_acf_preview', 10, 2);
  }

  if(defined('WP_ENV') && WP_ENV == 'development')
  {
    add_filter('content_pagination', 'meta_preview_content_pagination', 10, 2);
  }
});


if(class_exists(WP_CLI::class))
{
  function cli_mega_refresh_content_cache($args)
  {
    mega_refresh_content_cache();

    WP_CLI::success('Pages Rebuilt');
  }

  add_action('init', function () {
    WP_CLI::add_command( 'theme rebuild-pages', 'cli_mega_refresh_content_cache' );
  });
}

