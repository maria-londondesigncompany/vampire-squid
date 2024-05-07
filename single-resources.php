<?php get_header(); ?>
<?php
if (have_rows('resources_screens')) {
  while (have_rows('resources_screens')) {
    the_row();
    $row_index = 0;
    $row_index = get_row_index();
    $all_fields_count = count(get_field('resources_screens'));

    ?>
    <?php if (get_row_layout() == 'resource_first_screen') {
      $first_screen_heading = get_sub_field('first_screen_heading');
      $first_screen_description = get_sub_field('first_screen_description');
      $first_screen_btr_button_text = get_sub_field('first_screen_btr_button_text');
      $first_screen_btr_button_link = get_sub_field('first_screen_btr_button_link');
      ?>

      <div class="step" id="step<?php echo get_row_index(); ?>">
        <!-- Screen 1 HTML content -->
        <section>
          <div class="container main-banner pt-4 mb-5">
            <div class="row">
              <div class="col-md-12 d-flex justify-content-between align-items-center">
                <div class="main-heading">
                  <h2 class="fw-bold ls-1 primary-color">
                    <?php echo $first_screen_heading; ?>
                  </h2>
                </div>
                <div class="progressbar">
                  <h4 class="fw-semi-bold black-color progress-value"></h4>
                </div>
              </div>
            </div>
            <div class="row d-flex justify-content-start mt-md-3 mt-2">
              <div class="col-md-12 d-flex justify-content-center ">

                <div class="d-flex align-items-center bg-top-1">
                  <div>
                    <p class="fs-1 black-color fw-400 m-0 pt-md-4 pt-3">
                      <?php echo $first_screen_description ?>
                    </p>
                  </div>


                </div>
              </div>
            </div>
        </section>

        <section class="w-100 next-previous-btn-section">
          <div class="container">
            <div class="row d-flex justify-content-between align-items-center mt-4 mb-mobile-30 progress-btns">
              <div class="link-text col-md-4">
                <?php
                if ($row_index == 1){
                  echo '<button onclick="redirectToResourcePage()" target="_self" class="fs-1 m-0 primary-color w-100 fw-bold text-center justify-content-center light-grey-bg primary-color-hover p-3 br-10 d-flex">Back to Resources</button>';
                } else {
                  echo '<button onclick="prevStep()" target="_self" class="fs-1 m-0 primary-color w-100 fw-bold text-center justify-content-center light-grey-bg primary-color-hover p-3 br-10 d-flex">Back </button>';
                }
                ?>





              </div>

              <div class="link-btn col-md-8 mt-2 mt-md-0 d-flex justify-content-end">
                <a target="_self" onclick="nextStep()"
                  class="fs-1 m-0 primary-color w-100 fw-bold text-center justify-content-center secondary-bg primary-color-hover p-3 br-10 d-flex">
                  Continue Reading
                </a>
              </div>
            </div>
          </div>
        </section>
      </div>


    <?php }
    if (get_row_layout() == 'resource_second_screen') {
      $second_screen_heading = get_sub_field('second_screen_heading');
      $second_screen_tba_description = get_sub_field('second_screen_tba_description');
      $second_screen_audio = get_sub_field('second_screen_audio');
      $second_screen_taa_description = get_sub_field('second_screen_taa_description');
      $all_screens_back_button_text = get_sub_field('all_screens_back_button_text');
      ?>

      <div class="step" id="step<?php echo get_row_index(); ?>">
        <!-- Screen 2 HTML content -->
        <section>
          <div class="container main-banner pt-4 mb-5">
            <div class="row">
              <div class="col-md-12 d-flex justify-content-between align-items-center">
                <div class="main-heading">
                  <h2 class="fw-bold ls-1 primary-color">
                    <?php echo $second_screen_heading; ?>
                  </h2>
                </div>
                <div class="progressbar">
                  <h4 class="fw-semi-bold black-color progress-value"></h4>
                </div>
              </div>
            </div>
            <div class="row d-flex justify-content-start mt-md-3 mt-2">
              <div class="col-md-12 d-flex justify-content-center">

                <div class="d-flex align-items-center bg-top-1">
                  <div>
                    <p class="fs-1 black-color fw-400 m-0 pt-md-4 pt-3 pb-3 pb-md-4">
                      <?php echo $second_screen_tba_description; ?>
                    </p>

                    <div
                      class="audioplay col-md-5 d-flex justify-content-center flex-md-row flex-column justify-content-md-between align-items-center br-10 secondary-bg ps-md-3 pt-2 pb-2 pe-md-3">

                      <p class="fs-1 black-color fw-400 m-0 text-center text-md-start">Listen</p>
                      <audio controls class="br-10 mt-2 mt-md-0">
                        <source src="<?php echo $second_screen_audio; ?>" type="audio/mp3" />

                        Audio not supported
                      </audio>

                    </div>


                    <p class="fs-1 black-color fw-400 m-0 pt-md-4 pt-3 pb-3 pb-md-4">
                      <?php echo $second_screen_taa_description; ?>
                    </p>
                  </div>


                </div>
              </div>
            </div>
        </section>

        <section class="w-100 next-previous-btn-section">
          <div class="container">
            <div class="row d-flex justify-content-between align-items-center mt-4 mb-mobile-30 progress-btns">
              <div class="link-text col-md-4">

              <?php
                if ($row_index == 1){
                  echo '<button onclick="redirectToResourcePage()" target="_self" class="fs-1 m-0 primary-color w-100 fw-bold text-center justify-content-center light-grey-bg primary-color-hover p-3 br-10 d-flex">Back to Resources</button>';
                } else {
                  echo '<button onclick="prevStep()" target="_self" class="fs-1 m-0 primary-color w-100 fw-bold text-center justify-content-center light-grey-bg primary-color-hover p-3 br-10 d-flex">Back </button>';
                }
                ?>


              </div>

              <div class="link-btn col-md-8 mt-2 mt-md-0 d-flex justify-content-end">
                <a onclick="nextStep()"
                  class="fs-1 m-0 primary-color w-100 fw-bold text-center justify-content-center secondary-bg primary-color-hover p-3 br-10 d-flex">
                  Continue Reading
                </a>
              </div>
            </div>
          </div>
        </section>
      </div>
      <?php
    }
    if (get_row_layout() == 'resource_third_screen') {
      $third_screen_heading = get_sub_field('third_screen_heading');
      $third_screen_description = get_sub_field('third_screen_description');
      $third_screen_video = get_sub_field('third_screen_video');
      $third_screen_video_poster = get_sub_field('third_screen_video_poster');
      ?>
      <div class="step" id="step<?php echo get_row_index(); ?>">
        <!-- Screen 3 HTML content -->
        <section>
          <div class="container main-banner pt-4 mb-5">
            <div class="row">
              <div class="col-md-12 d-flex justify-content-between align-items-center">
                <div class="main-heading">
                  <h2 class="fw-bold ls-1 primary-color">
                    <?php echo $third_screen_heading; ?>
                  </h2>
                </div>
                <div class="progressbar">
                  <h4 class="fw-semi-bold black-color progress-value"></h4>
                </div>
              </div>
            </div>
            <div class="row mt-md-3 mt-2">
              <div class="">
                <div class="d-md-flex bg-top-1 justify-content-between align-items-center">
                  <div class="col-md-6 pe-md-2">
                    <p class="fs-1 black-color fw-400 m-0 pt-md-4 pt-3 pb-3 pb-md-4">
                      <?php echo $third_screen_description; ?>
                    </p>
                  </div>

                  <div class="col-md-5 mt-md-3 info-video embed-responsive embed-responsive-4by3 ps-md-2">
                    <div class="video-container">
                      <!-- Replace 'your-video-url.mp4' with the actual video URL -->
                      <video class="responsive-video br-10" poster="<?php echo $third_screen_video_poster; ?>" controls>
                        <source src="<?php echo $third_screen_video; ?>" type="video/mp4">
                        Your browser does not support the video tag.
                      </video>
                      <div class="play-button"><i class="fa-solid fa-circle-play" style="font-size: 50px;"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>

        <section class="w-100 next-previous-btn-section">
          <div class="container">
            <div class="row d-flex justify-content-between align-items-center mt-4 mb-mobile-30 progress-btns">
              <div class="link-text col-md-4">

              <?php
                if ($row_index == 1){
                  echo '<button onclick="redirectToResourcePage()" target="_self" class="fs-1 m-0 primary-color w-100 fw-bold text-center justify-content-center light-grey-bg primary-color-hover p-3 br-10 d-flex">Back to Resources</button>';
                } else {
                  echo '<button onclick="prevStep()" target="_self" class="fs-1 m-0 primary-color w-100 fw-bold text-center justify-content-center light-grey-bg primary-color-hover p-3 br-10 d-flex">Back </button>';
                }
                ?>


              </div>

              <div class="link-btn col-md-8 mt-2 mt-md-0 d-flex justify-content-end">
                <a onclick="nextStep()"
                  class="fs-1 m-0 primary-color w-100 fw-bold text-center justify-content-center secondary-bg primary-color-hover p-3 br-10 d-flex">
                  Continue Reading
                </a>
              </div>
            </div>
          </div>
        </section>
      </div>
    <?php
    }
    if (get_row_layout() == 'resource_fourth_screen') {
      $fourth_screen_heading = get_sub_field('fourth_screen_heading');
      $fourth_screen_editor = get_sub_field('fourth_screen_editor');
      ?>
      <div class="step" id="step<?php echo get_row_index(); ?>">
        <!-- Screen 4 HTML content -->
        <section>
          <div class="container main-banner pt-4 mb-5">
            <div class="row">
              <div class="col-md-12 d-flex justify-content-between align-items-center">
                <div class="main-heading">
                  <h2 class="fw-bold ls-1 primary-color">
                    <?php echo $fourth_screen_heading; ?>
                  </h2>
                </div>
                <div class="progressbar">
                  <h4 class="fw-semi-bold black-color progress-value"></h4>
                </div>
              </div>
            </div>
            <div class="row mt-md-3 mt-2">
              <div class="d-md-flex  justify-content-start align-items-center">

                <div class="col-md-12 pe-md-2 bg-top-1">
                  <p class="fs-1 black-color fw-400 m-0 pt-md-4 pt-3 pb-3 pb-md-4">
                    <?php echo $fourth_screen_editor; ?>
                  </p>
                </div>
              </div>
            </div>
        </section>
        <section class="w-100 next-previous-btn-section">
          <div class="container">
            <div class="row d-flex justify-content-between align-items-center mt-4 mb-mobile-30 progress-btns">
              <div class="link-text col-md-4">
              <?php
                if ($row_index == 1){
                  echo '<button onclick="redirectToResourcePage()" target="_self" class="fs-1 m-0 primary-color w-100 fw-bold text-center justify-content-center light-grey-bg primary-color-hover p-3 br-10 d-flex">Back to Resources</button>';
                } else {
                  echo '<button onclick="prevStep()" target="_self" class="fs-1 m-0 primary-color w-100 fw-bold text-center justify-content-center light-grey-bg primary-color-hover p-3 br-10 d-flex">Back </button>';
                }
                ?>


              </div>

              <div class="link-btn col-md-8 mt-2 mt-md-0 d-flex justify-content-end">
                <a onclick="nextStep()"
                  class="fs-1 m-0 primary-color w-100 fw-bold text-center justify-content-center secondary-bg primary-color-hover p-3 br-10 d-flex">
                  Continue Reading
                </a>
              </div>
            </div>
          </div>
        </section>
      </div>
      <?php
    }
    if (get_row_layout() == 'resource_fifth_screen') {
      $fifth_screen_heading = get_sub_field('fifth_screen_heading');
      $fifth_screen_var_button_link = get_sub_field('fifth_screen_var_button_link');
      ?>
      <div class="step" id="step<?php echo get_row_index(); ?>">
        <!-- Screen 5 HTML content -->
        <section class="w-100">
          <div class="container main-banner pt-4 mb-5">
            <div class="row">
              <div class="col-md-12 d-flex justify-content-between align-items-center">
                <div class="main-heading">
                  <h2 class="fw-bold ls-1 black-color">
                    <?php echo $fifth_screen_heading; ?>
                  </h2>
                </div>
                <div class="progressbar var-btn-desktop">
                  <p class="fs-1 fw-bold"><a href="<?php echo $fifth_screen_var_button_link; ?>"
                      class="primary-color primary-color-hover">
                      View all Resources
                    </a><i class="fa-solid fa-arrow-right fs-2 ms-2 secondary-color-hover secondary-color"></i></p>
                </div>
              </div>
            </div>
            <div class="row d-flex justify-content-center mt-md-3 mb-6-rem">
              <?php echo show_posts(); ?>
              <div class="progressbar var-btn-mobile">
                  <p class="fs-1 mt-4 mb-2 white-color w-100 fw-bold d-flex align-items-center justify-content-center primary-bg white-color-hover p-2 br-10 d-flex"><a href="<?php echo $fifth_screen_var_button_link; ?>"
                      class="white-color">
                      View all Resources
                    </a><i class="fa-solid fa-arrow-right fs-2 ms-2 secondary-color-hover secondary-color"></i></p>
                </div>
            </div>
        </section>
      </div>
      <?php
    }
  }
}
?>
<script>
  let currentStep = 1;
  class ProgressTracker {
    constructor() {
      this.progressElements = document.getElementsByClassName('progress-value');
    }

    update(step, totalSteps) {
      for (const progressElement of this.progressElements) {
        progressElement.textContent = `Part ${step}/${totalSteps}`;
      }
    }
  }

  const progressTracker = new ProgressTracker();

  function showStep(step) {
    const steps = document.querySelectorAll('.step');
    steps.forEach(s => s.classList.remove('active'));
    document.getElementById(`step${step}`).classList.add('active');

    // Update progress tracker dynamically based on the number of steps
    const totalSteps = steps.length;
    progressTracker.update(step, totalSteps);
  }

  function nextStep() {
    const steps = document.querySelectorAll('.step');
    if (currentStep < steps.length) {
      currentStep++;
      showStep(currentStep);
    }
  }

  function prevStep() {
    if (currentStep > 1) {
      currentStep--;
      showStep(currentStep);
    }
  }

  showStep(currentStep);

  function redirectToResourcePage() {
        // Change the window location to a specific URL
        window.location.href = '<?php echo site_url() ?>/information-and-support/';
    }
    
</script>
<?php get_footer(); ?>