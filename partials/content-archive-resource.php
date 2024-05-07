<?php
/**
 * Post
 */
?>

<?php
$enter_text = get_field('enter_text', false, false);
$post_id = get_the_ID();
$view_resource = get_field('view_resource');
?>
<div class="col-md-4 d-flex align-items-stretch ">
    <div class="bg-white text-start p-4 br-10 mt-4 bsg-1">
        <h3 class="fw-semi-bold ls-1 m-0 primary-color">
            <?php the_title(); ?>
        </h3>

        <p class="fs-1 m-0 black-color fw-400 pt-3 pb-3">
            <?php echo $enter_text ?>
            <?php
            if ($view_resource) {
                echo '<p class="m-0"><a class="primary-btn fw-bold fs-1 primary-color primary-color-hover br-10" target="_blank" href="' . $view_resource . '" role="button">View Resource <img src="' . site_url() . '/wp-content/uploads/2024/02/Arrow-up-right.png" alt="" class="img-fluid fs-2 ms-1"></a></p>';
            }
            if (!$view_resource) {
                echo '<p class="m-0"><a class="primary-btn fw-bold fs-1 primary-color primary-color-hover br-10" href="' . get_the_permalink() . '" role="button">Read Resource <i class="fa-solid fa-arrow-right fs-2 ms-1 secondary-color-hover secondary-color"></i></a></p>';
            }
            ?>

    </div>
</div>