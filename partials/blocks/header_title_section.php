<?php
$header_bg_image = get_sub_field('header_bg_image');
?>
<section class="pagetitle-background d-flex justify-content-center align-items-center"
        style="background-image: url(<?php echo $header_bg_image  ?>); background-position: inherit; background-size: cover; background-repeat: no-repeat;">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-8">
                <h1 class="fw-extra-bold text-white text-center">
                    <?php echo get_the_title(); ?>
                </h1>
            </div>
        </div>
</section>