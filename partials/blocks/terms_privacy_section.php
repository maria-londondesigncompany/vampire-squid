<?php
// Case: terms_privacy_section
$privacy_policy_description = get_sub_field('privacy_policy_description', false, false);
?>
 <!-- html -->
<section class="py-5">
<div class="container">
    <div class="row d-flex justify-content-center align-items-center py-md-5 py-0">
        <div class="col-md-10">
            <p class="fs-1 fw-300 text-white text-start">

            <?php echo $privacy_policy_description; ?>

            </p>
        </div>

    </div>

</div>
</section>
<?php
// end: terms_privacy_section


