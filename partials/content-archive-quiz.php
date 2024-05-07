<?php
/**
 * Post Quiz
 */
?>
<?php
$enter_quiz_text = get_field('enter_quiz_text', false, false);
?>
<div class="col-md-6 d-flex align-items-stretch ">
    <div class="bg-white text-start p-4 br-10 mt-4 bsg-1">
        <h3 class="fw-semi-bold ls-1 m-0 primary-color">
            <?php the_title(); ?>
        </h3>
        <p class="fs-1 m-0 black-color fw-400 pt-3 pb-3">
            <?php echo $enter_quiz_text ?>

        <p class="m-0"><a class="primary-btn fw-500 fs-1 primary-color primary-color-hover br-10"
                href="<?php the_permalink(); ?>" role="button">Begin Quiz <i
                    class="fa-solid fa-angle-right fs-2 ms-1 primary-color-hover primary-color"></i>
            </a></p>
    </div>
</div>