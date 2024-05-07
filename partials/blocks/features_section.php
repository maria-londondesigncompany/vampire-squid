<?php
    $features_background_image = get_sub_field('features_background_image');
    $features_heading = get_sub_field('features_heading');
    $features_description = get_sub_field('features_description');
    $view_more_button_link = get_sub_field('view_more_button_link');
?>
<section class="py-md-5 py-0"
    style="background-image: url(<?php echo $features_background_image; ?>); background-position: center; background-size: contain; background-repeat: no-repeat;">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center py-3">
            <div class="col-md-6">
                <h3 class="fw-extra-bold text-white text-center"> <?php echo $features_heading; ?></h3>
                <p class="fs-3 fw-300 text-white text-center"> <?php echo $features_description; ?></p>
            </div>
        </div>
        <div class="row">
        <?php
        if (have_rows('feature_box')):
            while (have_rows('feature_box')):
                the_row();
                $feature_box_heading = get_sub_field('feature_box_heading');
                $feature_box_description = get_sub_field('feature_box_description');
                ?>
                <div class="col-md-4 my-3">
                    <div class="feature-card dark-grey-bg br-4 p-4">
                        <i class="fa-solid fa-circle-check secondary-color"></i>
                        <h4 class="fw-extra-bold text-white m-0 mt-3"> <?php echo $feature_box_heading; ?></h4>
                        <p class="fs-3 fw-300 text-white mt-3 mb-0"> <?php echo $feature_box_description; ?></p>
                    </div>
                </div>
                <?php
            endwhile;
        endif;
        ?>

        </div>
        <div class="row py-md-3 pt-3 pb-5 view-more-btn-row">
            <div class="col-md-12 d-flex justify-content-center align-items-center">
                <a href="<?php echo $view_more_button_link; ?>" class="secondary-btn">View More</a>
            </div>
        </div>
    </div>
</section>
<?php
