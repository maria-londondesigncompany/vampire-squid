<?php
$knowledge_base_heading = get_sub_field('knowledge_base_heading');
$knowledge_base_description = get_sub_field('knowledge_base_description');
$knowledge_base_view_all_button_link = get_sub_field('knowledge_base_view_all_button_link');
$testimonial_heading = get_sub_field('testimonial_heading');
$testimonial_description = get_sub_field('testimonial_description');
?>

<section class="py-md-5 py-0"
    style="overflow: hidden; background-image: url(<?php echo get_site_url(); ?>/wp-content/uploads/2024/04/Insightsblock-bg.svg); background-position: center; background-size: contain; background-repeat: no-repeat;">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3 class="fw-extra-bold text-white text-start"><?php echo $knowledge_base_heading; ?></h3>
                <p class="fs-3 fw-300 text-white text-start m-0"><?php echo $knowledge_base_description; ?></p>
            </div>
            <div class="col-md-6 d-flex justify-content-end align-items-center mobile-hidden">
                <a href="<?php echo $knowledge_base_view_all_button_link; ?>" class="primary-btn">View All</a>
            </div>
        </div>
        [posts post_type="post" posts_per_page="3" orderby="date" order="desc" partial="partials/posts"]
        <div class="row py-3 mobile-visible">
            <div class="col-md-12 d-flex justify-content-center align-items-center">
                <a href="<?php echo $knowledge_base_view_all_button_link; ?>" class="primary-btn">View All</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center align-items-center pt-5 pb-4">
            <div class="col-md-6">
                <h3 class="fw-extra-bold text-white text-center"><?php echo $testimonial_heading; ?></h3>
                <p class="fs-3 fw-300 text-white text-center"><?php echo $testimonial_description; ?></p>
            </div>
        </div>
    </div>


    <div class="row pb-5">
        <div class="col-md-12">


            <!-- Swiper -->
            <div class="swiper mySwiper testimonial-carousel">
                <div class="swiper-wrapper">
                    <?php
                    if (have_rows('user_testimonial')):
                        while (have_rows('user_testimonial')):
                            the_row();
                            $testimonial_username = get_sub_field('testimonial_username');
                            $testimonial_text = get_sub_field('testimonial_text');
                            ?>

                            <div class="swiper-slide dark-grey-bg-7o p-4 ">

                                <img src="<?php echo get_site_url(); ?>/wp-content/uploads/2024/04/quote-icon.svg" alt=""
                                    class="img-fluid">
                                <p class="fs-2 fw-bold text-white text-center mt-5 mb-4"><?php echo $testimonial_text; ?></p>

                                <p class="fs-3 fw-400 text-white"><?php echo $testimonial_username; ?></p>

                            </div>
                            <?php
                        endwhile;
                    endif;
                    ?>


                </div>
                <div class="mobile-visible-pagination">

                    <div class="swiper-button swiper-button-before"><i
                            class="fa-solid fa-circle-arrow-left primary-color"></i></div>
                    <div class="swiper-button swiper-button-after"><i
                            class="fa-solid fa-circle-arrow-right primary-color"></i></div>
                </div>

            </div>
        </div>
    </div>

</section>