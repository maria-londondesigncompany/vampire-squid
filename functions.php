<?php
require_once __DIR__ . '/includes/setup.php';
require_once __DIR__ . '/includes/misc.php';
require_once __DIR__ . '/includes/post_types.php';
require_once __DIR__ . '/includes/taxonomies.php';
require_once __DIR__ . '/includes/acf.php';
require_once __DIR__ . '/includes/widgets.php';
require_once __DIR__ . '/includes/customizer.php';
require_once __DIR__ . '/includes/mega.php';
require_once __DIR__ . '/includes/login.php';
require_once __DIR__ . '/includes/bootstrap_helper.php';
require_once __DIR__ . '/includes/navwalker.php';

/*
  ==========================================
   Include scripts
  ==========================================
*/

function script_enqueue()
{
  $version = intval(@file_get_contents(dirname(__FILE__) . '/dist/version.txt'));

  wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap', [], '1', 'all');

  // wp_enqueue_style('stylesheets', get_template_directory_uri() . '/assets/css/main.css', ['google-fonts'], $version, 'all');
  wp_enqueue_style('stylesheets', get_template_directory_uri() . '/assets/css/customstyles.css', $version, 'all');

  wp_deregister_script('jquery');
  wp_register_script('jquery', get_template_directory_uri() . '/node_modules/jquery/dist/jquery.min.js', [], $version, true);

  wp_register_script('popperjs', get_template_directory_uri() . '/node_modules/@popperjs/core/dist/umd/popper.min.js', [], $version, true);
  wp_register_script('bootstrap', get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.min.js', ['jquery', 'popperjs'], $version, true);
  wp_register_script('slick-carousel', get_template_directory_uri() . '/node_modules/slick-carousel/slick/slick.min.js', ['jquery'], $version, true);

  wp_register_script('ajax-load-more', get_template_directory_uri() . '/assets/javascript/ajax-load-more.js', ['jquery'], $version, true);
  wp_enqueue_script('main', get_template_directory_uri() . '/assets/javascript/main.js', ['jquery', 'bootstrap', 'ajax-load-more', 'slick-carousel'], $version, true);
  wp_enqueue_script('customjs', get_template_directory_uri() . '/assets/javascript/customjs.js', $version, true);

}

function enqueue_swiper()
{
  wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', true); // Adjust the path and version as needed
}
add_action('wp_enqueue_scripts', 'enqueue_swiper');




add_action('wp_enqueue_scripts', 'script_enqueue');
remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');

/*
  ==========================================
   Activate menus
  ==========================================
*/
function theme_setup()
{
  add_theme_support('menus');
  register_nav_menu('primary', 'Primary Header Navigation');
  register_nav_menu('footer', 'Footer Navigation, right at the bottom');
}

add_action('init', 'theme_setup');

/*
  ==========================================
   Theme support function
  ==========================================
*/

add_theme_support('post-thumbnails');
add_theme_support('html5', array('search-form'));
add_theme_support('title-tag');


/*
  ==========================================
   Theme cleanup
  ==========================================
*/

function theme_cleanup()
{
  add_filter('the_generator', '__return_false');

  remove_action('wp_head', 'wp_generator');
  remove_action('wp_head', 'wlwmanifest_link');
  remove_action('wp_head', 'rsd_link');
  remove_action('wp_head', 'wp_shortlink_wp_head');
  remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('wp_head', 'feed_links_extra', 3);
  remove_action('wp_head', 'rest_output_link_wp_head');
  remove_action('wp_head', 'wp_resource_hints', 2);
  remove_action('wp_print_styles', 'print_emoji_styles');

  add_image_size('desktop', 2100, 1080, false);
  add_image_size('desktop-side', 1050, 1080, false);
  add_image_size('mobile-portrait', 470, 800, false);
}

add_action('after_setup_theme', 'theme_cleanup');


function use_bootstrap_navwalker($args)
{
  $args = array_merge($args, [
    'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
    'walker' => new WP_Bootstrap_Navwalker(),
  ]);

  $args['menu_class'] .= ' navbar-nav';

  return $args;
}

add_filter('wp_nav_menu_args', 'use_bootstrap_navwalker');

function load_posts()
{
  $query_vars = [
    'is_admin' => false,
    'post_type' => array_filter(explode(',', $_REQUEST['post_type'] ?? 'post'), function ($post_type) {
      $post_type = get_post_type_object($post_type);

      return $post_type->publicly_queryable;
    }),
    'posts_per_page' => $_REQUEST['posts_per_page'] ?? '',
  ];

  if ($_REQUEST['current_page'] ?? 0) {
    $query_vars['post__not_in'] = [$_REQUEST['current_page']];
  }

  $partial = 'partials/posts';

  if (($_REQUEST['partial'] ?? 0) && wp_hash(($_REQUEST['current_page'] ?? 0) . '|' . $_REQUEST['partial'], 'nonce') == ($_REQUEST['nonce'] ?? 0)) {
    $partial = $_REQUEST['partial'];
  }

  global $wp;

  $public_query_vars = apply_filters('query_vars', $wp->public_query_vars);

  foreach ($_REQUEST as $key => $value) {
    if ($key != 'action' && in_array($key, $public_query_vars)) {
      $query_vars[$key] = $value;
    }
  }

  query_posts($query_vars);

  get_template_part($partial);

  exit;
}


add_action('wp_ajax_load_posts', 'load_posts');
add_action('wp_ajax_nopriv_load_posts', 'load_posts');


function shortcode_posts($args)
{
  static $shortcode_index = 0;

  ob_start();

  $args = wp_parse_args($args, [
    'paged_query_var' => sprintf('posts_%d_paged', $shortcode_index++),
    'post_type' => 'post',
    'orderby' => 'post_date',
    'posts_per_page' => '',
    'show_filter' => false,
    'allow_load_more' => false,
    'partial' => 'partials/posts',
  ]);

  $query_vars = [
    'is_admin' => false,
    'post_type' => explode(',', $args['post_type']),
    'post__not_in' => [get_the_ID()],
    'paged' => $_GET[$args['paged_query_var']] ?? 1,
    'posts_per_page' => $args['posts_per_page'],
  ];

  global $wp;

  $query = [
    'current_page' => get_the_ID(),
    'post_type' => $query_vars['post_type'],
    'posts_per_page' => $query_vars['posts_per_page'],
  ];

  if ($args['partial'] != 'partials/posts') {
    $query['partial'] = $args['partial'];
    $query['nonce'] = wp_hash(get_the_ID() . '|' . $args['partial'], 'nonce');
  }

  foreach ($args as $key => $value) {
    if (!in_array($key, ['action', 'post_type']) && in_array($key, $wp->public_query_vars)) {
      $query[$key] = $value;
      $query_vars[$key] = $value;
    }
  }

  query_posts($query_vars);

  ?>

  <?php if ($args['show_filter'] || $args['allow_load_more']): ?>
    <div class="ajax-posts-load" data-ajax="<?php esc_attr_e(site_url('wp-admin/admin-ajax.php?action=load_posts')) ?>"
      data-query="<?php echo esc_attr(json_encode($query)) ?>">

      <?php get_template_part($args['partial'], null, $args); ?>
    </div>
  <?php else: ?>
    <?php get_template_part($args['partial'], null, $args); ?>
  <?php endif; ?>

  <?php

  $content = ob_get_clean();

  wp_reset_postdata();
  wp_reset_query();

  return $content;
}

add_shortcode('posts', 'shortcode_posts');

function seo_paginated_posts()
{
  if (empty($_GET) || !is_singular()) {
    return;
  }

  $content = get_the_content();

  $pattern = get_shortcode_regex(['posts']);

  $shortcode_index = 0;

  if (preg_match_all("/$pattern/", $content, $matches)) {
    foreach ($matches[0] as $index => $shortcode) {
      $varname = sprintf('posts_%d_paged', $shortcode_index++);

      $attr = shortcode_parse_atts($matches[3][$index]);

      if (!empty($attr['paged_query_var'])) {
        $varname = $attr['paged_query_var'];
      }

      $page = $_GET[$varname] ?? 1;

      if ($page > 1) {
        add_filter('wpseo_canonical', '__return_false');
        add_filter('wp_title', $title = function ($title) use ($page) {
          $separator = apply_filters('document_title_separator', '-');

          if (function_exists('YoastSEO')) {
            $seperator = YoastSEO()->helpers->options->get_title_separator();
          }

          return sprintf(__('Page %d'), $page) . " $separator " . $title;
        }, 20);

        add_filter('document_title', $title);
        add_filter('wpseo_title', $title, 20);
      }
    }
  }
}

add_action('template_redirect', 'seo_paginated_posts');

function adminstrator_mime_types($mimes)
{
  if (current_user_can('unfiltered_html')) {
    $mimes['svg'] = 'image/svg+xml';
  }

  return $mimes;
}

add_filter('upload_mimes', 'adminstrator_mime_types', 99, 1);

function adminstrator_svg_upload($data, $file, $filename, $mimes)
{
  $filetype = wp_check_filetype($filename, $mimes);

  if ($filetype['ext'] == 'svg' && current_user_can('unfiltered_html')) {
    return [
      'ext' => $filetype['ext'],
      'type' => $filetype['type'],
      'proper_filename' => $data['proper_filename']
    ];
  }

  return $data;
}

add_action('parse_query', function ($query) {
  if ($query->get('is_admin', 'nothing') !== 'nothing') {
    $query->is_admin = $query->get('is_admin');
  }
});

function shortcode_partial($args)
{

  $args = wp_parse_args($args, [
    'id' => '',
  ]);

  static $ids = [];

  if (in_array($args['id'] ?: -1, $ids)) {
    // Prevent Recursion
    return;
  }

  ob_start();

  $ids[] = $args['id'] ?: -1;

  $content = get_the_content(null, false, $args['id']);

  /**
   * Filters the post content.
   *
   * @since 0.71
   *
   * @param string $content Content of the current post.
   */
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]&gt;', $content);
  echo $content;

  array_pop($ids);

  return ob_get_clean();
}
add_shortcode('partial', 'shortcode_partial');


function year_shortcode()
{
  $year = date_i18n('Y');
  return $year;
}
add_shortcode('year', 'year_shortcode');


function filter_posts()
{
  $category = $_POST['category'];

  $args = array(
    'post_type' => 'post',
  );

  // Include tax_query only if a specific category is selected
  if (!empty($category)) {
    $args['tax_query'] = array(
      array(
        'taxonomy' => 'category',
        'field' => 'slug',
        'terms' => $category,
      ),
    );
  }

  $query = new WP_Query($args);

  while ($query->have_posts()):
    $query->the_post();
    get_template_part('partials/content-archive-post', get_post_type());
  endwhile;

  wp_reset_postdata();

  die();
}

add_action('wp_ajax_filter_posts', 'filter_posts');
add_action('wp_ajax_nopriv_filter_posts', 'filter_posts');


function show_posts()
{
  $args = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
  );

  $query = new WP_Query($args);

  while ($query->have_posts()):
    $query->the_post();
    get_template_part('partials/content-archive-post', get_post_type());
  endwhile;

  wp_reset_postdata();
}




if (!function_exists('vampire_squid_article_posted_on')) {
  /**
   * "Theme posted on" pattern.
   *
   * @since v1.0
   */
  function vampire_squid_article_posted_on()
  {
    printf(
      wp_kses_post(__('<span class="sep"></span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a><span> ', 'Vampire-Squid')),
      esc_url(get_the_permalink()),
      esc_attr(get_the_date('l, j F Y')),
      esc_attr(get_the_date('c')),
      esc_html(get_the_date('l, j F Y')),
      esc_url(get_author_posts_url((int) get_the_author_meta('ID'))),
      sprintf(esc_attr__('View all posts by %s', 'Vampire-Squid'), get_the_author()),
      get_the_author()
    );
  }
}



function custom_wc_account_menu_items($items)
{
  // Modify menu item labels here
  $items['dashboard'] = __('Profile', 'bespoke-theme');
  $items['subscriptions'] = __('Shop', 'bespoke-theme');
  $items['downloads'] = __('Product Downloads', 'bespoke-theme');
  $items['customer-logout'] = __('Sign Out', 'bespoke-theme');
  $items['orders'] = __('Licenses', 'bespoke-theme');
  $items['payment-methods'] = __('Payment', 'bespoke-theme');
  


  return $items;
}
add_filter('woocommerce_account_menu_items', 'custom_wc_account_menu_items');





// Add the custom form to the My Account page
function custom_account_form()
{
  ob_start(); // Start output buffering
  ?>

  <form class="woocommerce-form woocommerce-form-register register" method="post">

    <?php do_action('woocommerce_register_form_start'); ?>

    <div class="row overflow-hidden my-3">
      <div class="col-md-6 my-2">
        <label for="reg_billing_first_name" class="form-label text-white fs-3 fw-bold mb-1">First Name *</label>
        <input type="text" class="input-text form-control br-4" name="billing_first_name" id="reg_billing_first_name"
          placeholder="Chris" required>
      </div>
      <div class="col-md-6 my-2">
        <label for="reg_billing_last_name" class="form-label text-white fs-3 fw-bold mb-1">Last Name *</label>
        <input type="text" class="input-text form-control br-4" name="billing_last_name" id="reg_billing_last_name"
          placeholder="Seal" required>
      </div>


      <div class="col-md-6 my-2">
        <label for="reg_email" class="form-label text-white fs-3 fw-bold mb-1">Email Address *</label>
        <input type="email" class="input-text form-control br-4" name="email" id="reg_email"
          placeholder="chris.seal@staxogroup.com" required>
      </div>

      <div class="col-md-6 my-2">
        <label for="reg_username"
          class="form-label text-white fs-3 fw-bold mb-1 required"><?php esc_html_e('Display Name', 'woocommerce'); ?></label>
        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control br-4"
          name="username" id="reg_username" required>
      </div>

      <div class="col-md-6 my-2">
        <label for="reg_billing_company" class="form-label text-white fs-3 fw-bold mb-1">Company Name *</label>
        <input type="text" class="input-text form-control br-4" name="billing_company" id="reg_billing_company"
          placeholder="Staxo Group" required>
      </div>

      <div class="col-md-6 my-2">
        <label for="reg_job_role" class="form-label text-white fs-3 fw-bold mb-1">Job Role</label>
        <input type="text" class="input-text form-control br-4" name="job_role" id="reg_job_role"
          placeholder="Enter your job role">
      </div>

      <div class="col-md-12 my-2">
        <label for="reg_billing_country" class="form-label text-white fs-3 fw-bold mb-1">Country*</label>
        <?php
        $countries = WC()->countries->get_countries();
        $default_country = WC()->countries->get_base_country();
        ?>
        <select name="billing_country" id="reg_billing_country" class="country_to_state country_select form-select"
          autocomplete="country">
          <?php foreach ($countries as $key => $value): ?>
            <option value="<?php echo esc_attr($key); ?>" <?php selected($default_country, $key); ?>>
              <?php echo esc_html($value); ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="col-md-6 my-2">
        <label for="reg_password" class="form-label text-white fs-3 fw-bold mb-1">Password *</label>
        <input type="password" class="input-text form-control br-4" name="password" id="reg_password" required>
      </div>

      <div class="col-md-6 my-2">
        <label for="reg_confirm_password" class="form-label text-white fs-3 fw-bold mb-1">Confirm Password *</label>
        <input type="password" class="input-text form-control br-4" name="reg_confirm_password" id="reg_confirm_password"
          required>
      </div>

      <?php do_action('woocommerce_register_form'); ?>

      <div class="col-12 my-4">
        <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
        <button type="submit" class="primary-btn" name="register"
          value="<?php esc_attr_e('Register', 'woocommerce'); ?>"><?php esc_html_e('Register', 'woocommerce'); ?></button>
      </div>

    </div>

    <?php do_action('woocommerce_register_form_end'); ?>

  </form>

  <?php
  return ob_get_clean(); // Return the buffered content
}
add_action('woocommerce_before_customer_login_form', 'custom_account_form');



// Add custom text to My Account downloads tab
add_action('woocommerce_account_downloads_endpoint', 'add_custom_text_to_downloads_tab', 10);

function add_custom_text_to_downloads_tab()
{
  ?>
  <section class="primary-bg">
    <div class="container">
      <div class="row py-4">
        <div class="col-md-12">
          <h4 class="fw-extra-bold black-color m-0">Products Download</h4>
        </div>
      </div>
    </div>
  </section>
  <div class="container">
    <div class="row my-4">
      <div class="col-md-12">
        <p>
          <?php the_field('products_downloads_text', 'option'); ?>
        </p>
      </div>
    </div>
    <div class="row my-4">
      <?php if (have_rows('product_box', 'option')): ?>
        <?php while (have_rows('product_box', 'option')):
          the_row(); ?>
          <?php
          $product_image = get_sub_field('product_image');
          $product_title = get_sub_field('product_title');
          $product_description = get_sub_field('product_description');
          $product_link_playstore = get_sub_field('product_link_playstore');
          $product_link_apple = get_sub_field('product_link_apple');
          $product_download_link = get_sub_field('product_download_link');
          ?>

          <div class="col-md-4 my-3 db_product">
            <div class="dark-grey-bg br-4 p-3">
              <img src="<?php echo $product_image; ?>" class="card-img-top rounded" alt="...">
              <h5 class="fw-extra-bold text-white m-0 mt-3"><?php echo $product_title; ?></h5>
              <p class="fs-3 fw-300 text-white mt-3 mb-3"><?php echo $product_description; ?></p>
              <div class="row my-2 download-img-box">
                <?php if ($product_link_playstore && $product_link_apple): ?>
                  <div class="col-md-6">
                    <a href="<?php echo $product_link_playstore; ?>"><img class="img-fluid"
                        src="<?php echo site_url(); ?>/wp-content/uploads/2024/04/Group-1.png"></a>
                  </div>
                  <div class="col-md-6">
                    <a href="<?php echo $product_link_apple; ?>"><img class="img-fluid"
                        src="<?php echo site_url(); ?>/wp-content/uploads/2024/04/Group.png"></a>
                  </div>
                <?php elseif ($product_link_playstore): ?>
                  <a href="<?php echo $product_link_playstore; ?>"><img class="img-fluid"
                      src="<?php echo site_url(); ?>/wp-content/uploads/2024/04/Group-1.png"></a>
                <?php elseif ($product_link_apple): ?>
                  <a href="<?php echo $product_link_apple; ?>"><img class="img-fluid"
                      src="<?php echo site_url(); ?>/wp-content/uploads/2024/04/Group.png"></a>
                <?php endif; ?>

                <?php if ($product_download_link): ?>
                  <div class="col-md-12"> <a href="<?php echo $product_download_link; ?>"
                      class="btn text-dark bg-light mobile-compressed-btn my-2 w-100 fw-bold d-btn"><i
                        class="fa fa-download secondary-color fs-2 pe-2"></i>Download</a></div>
                <?php endif; ?>
              </div>
            </div>
          </div>

        <?php endwhile; ?>
      <?php endif; ?>
    </div>

  </div>
  <?php
}

// Add custom text to My Account Subscriptions tab
add_action('woocommerce_account_subscriptions_endpoint', 'add_custom_text_to_subscriptions_tab', 10);


function add_custom_text_to_subscriptions_tab()
{ ?>
  <section class="primary-bg">
    <div class="container">
      <div class="row py-4">
        <div class="col-md-12">
          <h4 class="fw-extra-bold black-color m-0">Shop</h4>
        </div>
      </div>
    </div>
  </section>
  <section class="features-section-db"
    style="background-image: url('<?php echo esc_url(get_field('body_background_image', 'option')['url']); ?>'); background-position: center; background-repeat: no-repeat; background-size: cover;">
    <div class="container">
      <div class="row pt-5">
        <h2 class="fw-extra-bold text-white">
          <?php
          the_field('product_features_text', 'option');
          ?>
        </h2>
      </div>
      <div class="row pb-5">

        <div class="col-md-5">
          <p class="fs-3 fw-400 text-white mt-2">
            <?php
            the_field('product_features_description', 'option');

            ?>
          </p>
        </div>


        <?php
        // Query to retrieve specific product IDs
        $product_ids = array(334, 333, 335); // Replace with the IDs of the products you want to display
      
        $args = array(
          'post_type' => 'product',
          'post__in' => $product_ids,
          'posts_per_page' => -1,
          'orderby' => 'post__in', // Order by the IDs provided
        );

        $products_query = new WP_Query($args);
        ?>

        <div class="col-md-7 d-flex align-items-end justify-content-md-end justify-content-around">
          <?php if ($products_query->have_posts()): ?>
            <?php while ($products_query->have_posts()):
              $products_query->the_post(); ?>
              <?php $product = wc_get_product(get_the_ID()); ?> <!-- Initialize $product object -->
              <div class="product-box d-flex align-items-center flex-column m-1  m-md-2">
                <p class="fs-1 fw-bold text-white product_title m-0"><?php the_title(); ?></p>
                <h3 class="fw-bold text-white product_price mt-3 mb-3">
                  <?php
                  $currency_symbol = get_woocommerce_currency_symbol();
                  if ($product) {
                    echo $currency_symbol . $product->get_price();
                  } else {
                    echo 'Price not available';
                  }
                  ?><span class="product_validity">/mth</span>
                </h3>


                <?php
global $product;

// Check if WooCommerce is active
if ( class_exists( 'WooCommerce' ) ) {
    // Get the product ID
    $product_id = get_the_ID();

    // Get the product add to cart URL
    $add_to_cart_url = esc_url( $product->add_to_cart_url() );

    // Output the WooCommerce Add to Cart button
    echo '<a href="' . $add_to_cart_url . '" class="button add_to_cart_button">Subscribe</a>';
}
?>

              </div>
            <?php endwhile; ?>
          <?php else: ?>
            <p>No products found.</p>
          <?php endif; ?>
        </div>

        <?php wp_reset_postdata(); ?>



        <!-- 
        <div class="col-md-7 d-flex align-items-end justify-content-md-end justify-content-around">
          <div class="product_box d-flex align-items-center flex-column m-1  m-md-2">
            <p class="fs-1 fw-bold text-white product_title m-0">Free Trial</p>
            <h3 class="fw-bold text-white product_price mt-3 mb-3">£0<span class="product_validity">/mth</span></h3>
            <a href="#" class="primary-btn">Subscribe</a>

          </div>
          <div class="product_box d-flex align-items-center flex-column  m-1  m-md-2">
            <p class="fs-1 fw-bold text-white product_title m-0">Standard</p>
            <h3 class="fw-bold text-white product_price mt-3 mb-3">£34<span class="product_validity">/mth</span></h3>
            <a href="#" class="primary-btn">Subscribe</a>

          </div>
          <div class="product_box d-flex align-items-center flex-column  m-1 m-md-2">
            <p class="fs-1 fw-bold text-white product_title m-0">Premium</p>
            <h3 class="fw-bold text-white product_price mt-3 mb-3">£99<span class="product_validity">/mth</span></h3>
            <a href="#" class="primary-btn">Subscribe</a>

          </div>
        </div> -->


      </div>
    </div>
    <div class="container py-2 py-md-5 feature-container">
      <?php if (have_rows('product_features_row', 'option')): ?>
        <?php while (have_rows('product_features_row', 'option')):
          the_row(); ?>
          <?php
          $product_feature = get_sub_field('product_feature');
          $for_free = get_sub_field('for_free');
          $for_standard = get_sub_field('for_standard');
          $for_premium = get_sub_field('for_premium');
          $select_content_type_for_free = get_sub_field('select_content_type_for_free');
          $select_content_type_for_standard = get_sub_field('select_content_type_for_standard');
          $select_content_type_for_premium = get_sub_field('select_content_type_for_premium');
          ?>

          <?php

          if ($select_content_type_for_free == "Check Mark") {
            $for_free = "<i class=\"fa-solid fa-check fs-2\"></i>";
          } elseif ($select_content_type_for_free == "Cross Mark") {
            $for_free = "<i class=\"fa-solid  fa-xmark fs-2\"></i>";
          }

          if ($select_content_type_for_standard == "Check Mark") {
            $for_standard = "<i class=\"fa-solid fa-check fs-2\"></i>";
          } elseif ($select_content_type_for_standard == "Cross Mark") {
            $for_standard = "<i class=\"fa-solid  fa-xmark fs-2\"></i>";
          }

          if ($select_content_type_for_premium == "Check Mark") {
            $for_premium = "<i class=\"fa-solid fa-check fs-2\"></i>";
          } elseif ($select_content_type_for_premium == "Cross Mark") {
            $for_premium = "<i class=\"fa-solid  fa-xmark fs-2\"></i>";
          }
          ?>


          <div class="row px-3 py-3 py-md-0 d-flex align-items-stretch justify-content-center black-bg">
            <div class="col-md-6 d-flex align-items-center justify-content-start">
              <p class="fs-4 fw-400 text-white m-0"><?php echo $product_feature; ?></p>
            </div>

            <div class="col-md-2 py-3 d-flex align-items-center justify-content-center features_data_box-column">
              <p class="fs-4 fw-400 text-white text-center m-0"> <?php echo $for_free; ?></p>
            </div>

            <div class="col-md-2 py-3  d-flex align-items-center justify-content-center features_data_box-column">
              <p class="fs-4 fw-400 text-white text-center m-0"><?php echo $for_standard; ?></p>
            </div>

            <div class="col-md-2 py-3  d-flex align-items-center justify-content-center features_data_box-column">
              <p class="fs-4 fw-400 text-white text-center m-0"><?php echo $for_premium; ?></p>
            </div>
          </div>

        <?php endwhile; ?>
      <?php endif; ?>
    </div>

  </section>
  <?php
}

// Add custom text to My Account Subscriptions tab
add_action('woocommerce_account_orders_endpoint', 'add_custom_text_to_orders_tab', 10);


function add_custom_text_to_orders_tab()
{ ?>
  <section class="primary-bg">
    <div class="container">
      <div class="row py-4">
        <div class="col-md-12">
          <h4 class="fw-extra-bold black-color m-0">Licenses</h4>
        </div>
      </div>
    </div>
  </section>

  <!-- Licenses Tab Internal tabs  -->
  <section class="primary-bg">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="nav flex-row nav-pills" id="v-pi-tab-license" role="tablist" aria-orientation="horizontal">
            <button class="nav-link fs-3 fw-500 text-start px-4 active" id="v-pills-subscriptions-tab"
              data-bs-toggle="pill" data-bs-target="#subscriptions-tab" type="button" role="tab"
              aria-controls="subscriptions-tab" aria-selected="false">
              Subscriptions</button>

          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- Profile Tab Internal tabs content  -->

  <div class="tab-content" id="v-pills-tabContent-subscriptions">
    <div class="tab-pane fade show active text-white" id="subscriptions-tab" role="tabpanel"
      aria-labelledby="v-pills-subscriptions-tab">

      <section>
        <div class="container">
          <div class="row pt-5">
            <h5 class="fw-extra-bold m-0">Subscriptions</h5>
          </div>
        </div>
      </section>
      <section>
        <div class="container">
          <div class="filters row d-flex px-2 py-4">

            <div class="date-box-from ms-0">
              <label for="fromDate">From:</label>
              <input type="date" id="fromDate">
            </div>

            <div class="date-box-to ">
              <label for="toDate">To:</label>
              <input type="date" id="toDate">
            </div>

            <div class="sort-box">

              <select id="sort">
                <option disabled selected>Sort</option>
                <option value="asc">Ascending</option>
                <option value="desc">Descending</option>
              </select>
            </div>

            <div class="search-box">
              <!-- Search functionality -->
              <input type="text" id="search" placeholder="Search...">
              <i class="fas fa-search search-icon fs-2" id="searchIcon"></i>
            </div>
          </div>
          <div class="filters row d-flex px-2 py-4">
          <table id="orderTable" class="display" style="width:100%">
            <thead>
              <tr>
                <th>Type</th>
                <th>Time Remaining</th>
                <th>Activation Key</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Product A</td>
                <td>30 days</td>
                <td>
                  <span class="text">ABC123</span>
                  <i class="fa-solid fa-copy icon"></i>
                </td>
                <td>Completed</td>
                <td><a href="#">Download Receipt</a></td>
              </tr>
              <tr>
                <td>Product B</td>
                <td>15 days</td>
                <td>
                  <span class="text">DEF321</span>
                  <i class="fa-solid fa-copy icon"></i>
                </td>
                <td>Pending</td>
                <td><a href="#">Download Receipt</a></td>
              </tr>
              <!-- Add more rows as needed -->
            </tbody>
          </table> 
          </div>
        </div>

      </section>
    </div>
  </div>


  <?php
}

function redirect_woocommerce_shop_page() {
  if (is_shop()) {
      wp_redirect(get_permalink(get_option('woocommerce_myaccount_page_id')) . 'shop/');
      exit;
  }
}
add_action('template_redirect', 'redirect_woocommerce_shop_page');



add_filter('woocommerce_login_redirect', 'custom_login_redirect');

function custom_login_redirect($redirect_to) {
    $redirect_to = wc_get_page_permalink('myaccount') . 'edit-account/';
    return $redirect_to;
}
function custom_redirect() {
  // Check if the user is logged in
  if (is_user_logged_in()) {
      global $wp;
      
      if( $wp->request == 'my-account' ) {
          wp_redirect( site_url( 'my-account/edit-account/' ) );
          exit;
      }
  }
}

add_action ('template_redirect', 'custom_redirect');





