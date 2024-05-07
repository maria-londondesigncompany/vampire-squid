<?php
$imt_background_image = get_sub_field('imt_background_image');
$imt_text = get_sub_field('imt_text');
$imt_description = get_sub_field('imt_description');
$imt_thumb_image = get_sub_field('imt_thumb_image');
?>
<section
    style="background-image: url(<?php echo $imt_background_image; ?>);background-position: inherit;background-size: cover;background-repeat: no-repeat;">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center flex-md-row flex-column-reverse py-5">
            <div class="col-md-6  mt-md-0 mt-4">
                <h2 class="text-white fw-bold"><?php echo $imt_text; ?></h2>
                <p class="fs-1 fw-300 mt-4 mb-0 text-white text-start"><?php echo $imt_description; ?>
                </p>
            </div>
            <div class="col-md-6">
                <img src="<?php echo $imt_thumb_image; ?>" alt=""
                    class="img-fluid">
            </div>
        </div>
    </div>
</section>