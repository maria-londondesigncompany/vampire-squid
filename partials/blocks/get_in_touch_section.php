<?php
$git_backround_image = get_sub_field('git_backround_image');
$git_heading = get_sub_field('git_heading');
$git_description = get_sub_field('git_description');
$git_form_sc = get_sub_field('git_form_sc');
?>

<section class="d-flex justify-content-center align-items-center py-5"
    style="background-image: url(<?php echo $git_backround_image ?> ); background-position: center; background-size: cover; background-repeat: no-repeat;">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="git-column-size">
                <div class="mb-md-5 mb-4">
                    <h3 class="fw-extra-bold text-white">
                        <?php echo $git_heading ?>
                    </h3>
                    <p class="fs-2 fw-300 text-white"><?php echo $git_description ?> </p>
                </div>
                <div class="git-form">
                    <?php echo do_shortcode($git_form_sc); ?>
                </div>


            </div>
        </div>
</section>