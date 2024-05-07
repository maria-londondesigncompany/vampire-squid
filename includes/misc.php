<?php
/*
  ==========================================
   Custom URL
  ==========================================
*/

function disable_admin_redirects()
{
  remove_action('template_redirect', 'wp_redirect_admin_locations', 1000);
}

add_action('init', 'disable_admin_redirects', 999);

/*
  ==========================================
   Custom Function
  ==========================================
*/

function exit404()
{
  global $wp_query;

  $wp_query->set_404();

  while(ob_get_level())
  {
    ob_end_clean();
  }

  status_header( 404 );
  nocache_headers();
  include( get_query_template( '404' ) );
  exit;
}


if(!function_exists('free_memory'))
{
  function free_memory ()
  {
    /**
     * @var $wpdb            \wpdb
     * @var $wp_object_cache \WP_Object_Cache
     */
    global $wpdb, $wp_object_cache;

    $wpdb->queries = array();

    if ( ! is_a( $wp_object_cache, 'WP_Object_Cache' ) ) {
      return;
    }

    $wp_object_cache->group_ops      = array();
    $wp_object_cache->stats          = array();
    $wp_object_cache->memcache_debug = array();
    $wp_object_cache->cache          = array();

    if ( is_callable( array( $wp_object_cache, '__remoteset' ) ) )
    {
      call_user_func( array( $wp_object_cache, '__remoteset' ) ); // important
    }
  }
}
