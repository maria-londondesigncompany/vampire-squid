<?php
  $post_background_image = get_sub_field('post_background_image');
    $post_main_heading = get_sub_field('post_main_heading');
    $post_desc = get_sub_field('post_desc');
    $view_all_button_link = get_sub_field('view_all_button_link');
?>
<section class="py-md-5 py-0"
        style="overflow: hidden; background-image: url(<?php echo $post_background_image ?>); background-position: center; background-size: contain; background-repeat: no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="fw-extra-bold text-white text-start"><?php echo $post_main_heading  ?></h3>
                    <p class="fs-3 fw-300 text-white text-start"><?php echo $post_desc  ?></p>
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center mobile-hidden">
                    <a href="<?php echo $view_all_button_link  ?>" class="primary-btn">View all</a>
                </div>
            </div>
            [posts post_type="post" posts_per_page="9" orderby="date" order="desc" partial="partials/posts"]
            <div class="row py-3 mobile-visible">
                <div class="col-md-12 d-flex justify-content-center align-items-center">
                    <a href="<?php echo $view_all_button_link  ?>" class="primary-btn">View All</a>
                </div>
            </div>
        </div>
    </section>