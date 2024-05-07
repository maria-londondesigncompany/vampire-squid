<footer class="footer pt-3 pb-1 black-bg">
    <div class="container">
        <div class="row py-md-5 py-4 bb4px justify-content-between">
            <div class="col-md-4">
                <div class="footer-logo">
                    <a href="<?php echo site_url() ?>">
                        <img src="<?php the_field('footer_logo', 'option'); ?>" alt="Footer Logo" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <p class="fs-1 fw-bold text-white mb-md-4 mb-3 mt-md-0 mt-4">
                    <?php the_field('quick_links_text', 'option'); ?>
                </p>
                <ul
                    class="footer-navigation-menu d-flex flex-column justify-content-center align-items-start m-0 me-4 ps-0 pe-5">
                    <li class="pb-md-3 pb-2"><a href="<?php echo site_url() ?>"
                            class="fs-3 fw-300 text-white"><?php the_field('footer_nav_menu', 'option'); ?></a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h4 class="fw-extra-bold text-white mb-md-4 mb-3 mt-md-0 mt-4">
                    <?php the_field('join_our_newsletter_text', 'option'); ?>
                </h4>
                <p class="fs-3 fw-300 text-white">
                    <?php the_field('join_our_newsletter_description', 'option'); ?>
                </p>
                <?php
                $join_our_newsletter_form_shortcode = get_field('join_our_newsletter_form_shortcode', 'option');
                echo do_shortcode($join_our_newsletter_form_shortcode);
                ?>
            </div>
        </div>
        <div class="row d-flex pre-footer align-items-baseline py-4">
            <div class="col-md-3 copyright-text">
                <a class="fs-3 fw-300 text-white" href="<?php echo site_url() ?>">© Vampire Squid
                    <?php echo date('Y'); ?> </a>
            </div>
            <div class="col-md-4 mt-md-0 mt-3 terms-privacy-menu">
                <?php the_field('terms_menu', 'option'); ?>
            </div>
            <div class="col-md-2 mt-md-0 mt-3 d-flex justify-content-md-end justify-content-start social-links">
                <a href="<?php the_field('linkedin_link', 'option'); ?>"><i class="fa-brands fa-linkedin"></i></a>
                <a href="<?php the_field('insta_link', 'option'); ?>"><i class="fa-brands fa-instagram"></i></a>
                <a href="<?php the_field('x_link', 'option'); ?>"><i class="fa-brands  fa-x-twitter"></i></a>
                <a href="<?php the_field('fb_link', 'option'); ?>"><i class="fa-brands fa-square-facebook"></i></a>
            </div>
            <div
                class="col-md-3 mt-md-0 mt-3 dev-agency d-flex justify-content-md-end justify-content-start align-items-center">
                <p class="fs-3 fw-300 text-white">SITE BY <a href="https://staxogroup.com/">STAXO</a> </p>
            </div>
        </div>
    </div>
</footer>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    // <!-- Testimonial Swiper -->

    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        freeMode: true,
        navigation: {
            nextEl: ".swiper-button-before",
            prevEl: ".swiper-button-after",
        },

        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        breakpoints: {
            // When window width is <= 1024px (typical desktop size)
            1024: {
                slidesPerView: 3,
                spaceBetween: 30, // Adjust as needed
            },
            // When window width is <= 768px (tablet size)
            768: {
                slidesPerView: 2,
                spaceBetween: 20, // Adjust as needed
            },
            // When window width is <= 480px (mobile size)
            300: {
                slidesPerView: 1,
                spaceBetween: 10, // Adjust as needed
            }
        }
    });


    // // Header Code

    // jQuery(document).ready(function () {
    //     var header = jQuery(".header-navigation");
    //     var sticky = header.offset().top;

    //     function setHeaderPosition() {
    //         if (window.innerWidth <= 767) {
    //             header.css({
    //                 'position': 'relative'
    //             });
    //         } else {
    //             if (window.pageYOffset > sticky) {
    //                 header.css({
    //                     'position': 'fixed',
    //                     'top': '0',
    //                     'width': '100%',
    //                     'z-index': '1000'
    //                 });
    //             } else {
    //                 header.css({
    //                     'position': 'absolute'
    //                 });
    //             }
    //         }
    //     }

    //     setHeaderPosition(); // Call on document ready

    //     jQuery(window).resize(function () {
    //         setHeaderPosition(); // Call on window resize
    //     });

    //     jQuery(window).scroll(function () {
    //         if (window.innerWidth > 767) {
    //             if (window.pageYOffset > sticky) {
    //                 header.css({
    //                     'position': 'fixed',
    //                     'top': '0',
    //                     'width': '100%',
    //                     'z-index': '1000'
    //                 });
    //             } else {
    //                 header.css({
    //                     'position': 'absolute'
    //                 });
    //             }
    //         }
    //     });
    // });

    jQuery(document).ready(function ($) {
        // Add classes to menu items with class .terms-privacy-menu
        $('.terms-privacy-menu .menu-item').addClass('px-md-2 pe-3');
    });

    jQuery(document).ready(function () {
        // Initialize DataTable
        var table = jQuery('#orderTable').DataTable({
            // Enable pagination and rows per page dropdown
            "paging": true,
            "lengthMenu": [10, 25, 50, 100],
            // Define initial sorting
            "order": [[0, 'asc']]
        });

        // Apply filter functionality
        jQuery('#fromDate, #toDate, #sort, #search').on('change keyup', function () {
            applyFilters();
        });

        // Apply search when search icon is clicked
        jQuery('#searchIcon').on('click', function () {
            applyFilters();
        });

        function applyFilters() {
            var fromDate = jQuery('#fromDate').val();
            var toDate = jQuery('#toDate').val();
            var sort = jQuery('#sort').val();
            var search = jQuery('#search').val();

            // Implement your filtering logic here

            // Redraw table with filtered data
            table.draw();
        }
    });
</script>