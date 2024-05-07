<?php
    $background_image = get_sub_field('background_image');
    $heading = get_sub_field('heading');
    $description = get_sub_field('description');
    $button_url = get_sub_field('button_url');
    $link_url = $button_url['url'];
    $link_title = $button_url['title'];
    $link_target = $button_url['target'] ? $button_url['target'] : '_self';
?>
<?php if ($background_image): ?>
<section class="cta-banner d-flex justify-content-center align-items-center"
        style="background-image: url(<?php echo $background_image; ?>); background-position: inherit; background-size: cover; background-repeat: no-repeat;">
<?php else: ?>
<section class="cta-banner d-flex justify-content-center align-items-center"
        style="background-image: url(); background-position: inherit; background-size: cover; background-repeat: no-repeat;">
<?php endif; ?>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-6 d-flex justify-content-center align-items-center flex-column">
                <h2 class="fw-extra-bold text-white text-center m-0">
                    <?php echo $heading; ?>
                </h2>
                <p class="fs-3 fw-300 text-white text-center my-4">
                    <?php echo $description; ?></p>
                <?php 
                if( $button_url ):  ?>
                    <a class="primary-btn mobile-compressed-btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>