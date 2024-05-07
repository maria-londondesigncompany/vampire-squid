<?php
/**
 * Template Name: Not found
 * Description: Page template 404 Not found.
 *
 */
get_header();
?>



<section class="banner-404 d-flex justify-content-center align-items-center"
        style="background-image: url(<?php echo get_site_url(); ?>/wp-content/uploads/2024/04/knowledgebase-bannerbg.svg); background-position: inherit; background-size: cover; background-repeat: no-repeat;">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-8 d-flex justify-content-center align-items-center flex-column">
                <h1 class="fw-extra-bold text-white text-center">
                    404
                </h1>
                <p class="fs-1 fw-300 text-white text-center">
                    Sorry. Page not found.
                    </p>
                    <a href="<?php  echo site_url() ?>" class="primary-btn mt-3">Get in Touch</a>
            </div>
        </div>
</section>
<?php


get_footer();
