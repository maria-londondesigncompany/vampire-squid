<?php get_header(); ?>


<?php
if($partial = get_field(sprintf('%s_archive_top_partial', get_post_type()), 'options'))
{
  echo do_shortcode(sprintf('[partial id="%d"]', $partial));
}
?>
<div id="loader-overlay">
    <div id="loader-container">
        <img src="<?php echo site_url() ?>/wp-content/uploads/2024/04/Loader-AJAX.svg" alt="Loading...">
    </div>
</div>

<section class="py-md-5 py-0 pt-4">
<div class="ajax-posts-load container" data-ajax="<?php echo esc_attr(site_url('wp-admin/admin-ajax.php?action=load_posts')) ?>" data-query="<?php echo esc_attr(json_encode($GLOBALS['wp_query']->query)) ?>">

<?php get_template_part('partials/posts', 'filter') ?>
<?php get_template_part('partials/posts') ?>

</div>
</section>

<?php
if($partial = get_field(sprintf('%s_archive_bottom_partial', get_post_type()), 'options'))
{
  echo do_shortcode(sprintf('[partial id="%d"]', $partial));
}
?>

<?php get_footer(); ?>
