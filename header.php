<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vampire Squid</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Include necessary CSS libraries -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>
    style="background-image: url('<?php echo esc_url(get_field('body_background_image', 'option')['url']); ?>');">
    <?php wp_body_open(); ?>
    <header>
        <section class="px-md-5 px-3 py-md-2 py-3 header-navigation">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-md-3 col-5">
                    <a class="nav-logo logo d-flex justify-content-md-between justify-content-center align-items-center"
                        href="<?php echo site_url() ?>">
                        <?php $header_logo = get_theme_mod('header_logo'); // Get custom meta-value.
                        if (!empty($header_logo)): ?>
                            <?php
                        else:
                            echo esc_attr(get_bloginfo('name', 'display'));
                        endif;
                        ?>
                        <img src="<?php echo esc_url($header_logo); ?>"
                            alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" class="img-fluid">
                    </a>
                </div>
                <div class="col-md-9 col-7 menu-col">
                    <nav
                        class="navbar navbar-expand-lg flex-sm-row-reverse flex-row-reverse align-items-md-center align-items-end justify-content-start">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"><i class="fa-solid fa-bars text-white"></i></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                            <?php
                            // Loading WordPress Custom Menu (theme_location).
                            wp_nav_menu(
                                array(
                                    'menu_class' => 'navbar-nav main-navigation-menu d-flex justify-content-end align-items-center m-0 me-md-5 ps-md-0 pe-md-5 br1px',
                                    'container' => '',
                                    'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                                    'walker' => new WP_Bootstrap_Navwalker(),
                                    'theme_location' => 'primary',
                                )
                            );
                            ?>
                        </div>
                        <div class="user-login-box d-flex justify-content-end align-items-center">
                            <a href="<?php echo site_url() ?>/my-account/" class="primary-btn sign-up-btn">Sign Up</a>
                            <a href="<?php echo site_url() ?>/my-account/"
                                class="fs-2 fw-bold text-white sign-in-btn px-5">Sign In</a>
                        </div>
                        <div class="user-signout-box d-flex justify-content-end align-items-center">
                            <a href="<?php echo site_url() ?>/my-account/" class="primary-btn sign-up-btn">My
                                Account</a>
                            <?php
                            // Generate a nonce
                            $nonce = wp_create_nonce('my-sign-out-nonce');

                            // Construct the URL with the nonce
                            $sign_out_url = site_url('/my-account/sign-out/') . '?_wpnonce=' . $nonce;
                            ?>

                            <a href="<?php echo esc_url($sign_out_url); ?>"
                                class="fs-2 fw-bold text-white sign-in-btn px-5">Sign Out</a>

                        </div>
                    </nav>
                </div>
            </div>
        </section>
    </header>