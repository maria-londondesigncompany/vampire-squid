<?php
    $banner_background_image = get_sub_field('banner_background_image');
    $banner_side_image = get_sub_field('banner_side_image');
    $banner_heading = get_sub_field('banner_heading');
    $banner_description = get_sub_field('banner_description');
    ?>
   <section class="hero-banner d-flex justify-content-center align-items-center"
        style="background-image: url(<?php echo $banner_background_image; ?>); background-position: inherit; background-size: cover; background-repeat: no-repeat;">
        <div class="container">
            <div class="row d-flex justify-content-between align-items-center flex-md-row flex-column-reverse">
                <div class="col-md-5 mt-md-0 mt-5">
                    <h1 class="fw-extra-bold text-white text-md-start text-center">
                    <?php echo $banner_heading; ?>
                    </h1>
                    <p class="fs-1 fw-300 mt-4 mb-0 text-white text-md-start text-center"><?php echo $banner_description; ?>
                    </p>
                </div>
                <div class="col-md-6">
                    <img class="img-fluid" src="<?php echo $banner_side_image; ?>" alt="">
                </div>
            </div>
        </div>
    </section>