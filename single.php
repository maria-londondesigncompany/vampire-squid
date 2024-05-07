<?php get_header(); ?>
<?php while (have_posts()):
    the_post(); ?>
    <?php
    if (has_post_thumbnail()):
        ?>
        <section class="pagetitle-background d-flex justify-content-center align-items-center"
            style="background-image: url(<?php echo site_url() ?>/wp-content/uploads/2024/04/knowledgebase-bannerbg.svg); background-position: inherit; background-size: cover; background-repeat: no-repeat;">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-md-8">
                        <h1 class="fw-extra-bold text-white text-center">
                            <?php the_title(); ?>
                        </h1>

                    </div>
                </div>
        </section>
        <?php
        $posts_content_area = get_field('posts_content_area', false, false);
        ?>
        <section class="py-5" id="post-<?php the_ID(); ?>">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-md-12">
                        <?php
                        $categories = get_the_category();
                        if ($categories) {
                            foreach ($categories as $category) {
                                echo '<a class="fs-1 fw-bold primary-color text-start post_cat" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a> ';
                            }
                        } else {
                            echo "No Category Selected.";
                        }
                        ?>
                        <h2 class="text-white fw-bold post-title mt-3"> <?php the_title(); ?></h2>
                        <p class="fs-3 fw-300 text-white text-start mt-md-2 mt-3 mb-md-5 mb-4 post_date">
                            <?php vampire_squid_article_posted_on(); ?>
                        </p>
                        <p class="fs-1 fw-300 text-white text-start post_content mb-2">

                            <?php echo $posts_content_area ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-md-5 py-0"
            style="overflow: hidden; background-image: url(./assets/images/Insightsblock-bg.svg); background-position: top; background-size: cover; background-repeat: no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="fw-extra-bold primary-color text-start"><?php   the_field('ymal_heading', 'option');   ?></h3>
                        <p class="fs-3 fw-300 text-white text-start"><?php   the_field('ymal_description', 'option');   ?></p>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end align-items-center mobile-hidden">
                        <a href="<?php   the_field('vm_button_link', 'option');   ?>" class="primary-btn">View More </a>
                    </div>
                </div>
                <div class="row py-4">
                    <?php echo show_posts(); ?>
                </div>
                <div class="row py-3 mobile-visible">
                    <div class="col-md-12 d-flex justify-content-center align-items-center">
                        <a href="<?php   the_field('vm_button_link', 'option');   ?>" class="primary-btn">View More </a>
                    </div>
                </div>
            </div>
        </section>
        <?php
    endif; ?>
    <?php
    if ($partial = get_field(sprintf('%s_bottom_partial', get_post_type()), 'options')) {
        echo do_shortcode(sprintf('[partial id="%d"]', $partial));
    }
?>
<?php endwhile; ?>

<?php get_footer(); ?>