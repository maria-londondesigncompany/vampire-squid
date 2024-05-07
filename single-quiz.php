<?php get_header() ?>
<style>
</style>
<?php
    if (have_rows('quiz_screens')) {
        
        while (have_rows('quiz_screens')) {
            the_row();
            $row_index = 0;
            $row_index = get_row_index();
            $all_fields_count = count(get_field('quiz_screens'));
            ?>
<?php if (get_row_layout() == 'quiz_question') {
    $question = get_sub_field('question');
    ?>
<div class="step" id="step<?php echo get_row_index(); ?>">
    <section>
        <div class="container pt-4 pb-5">
            <div class="row">
                <div class="col-md-8">
                    <!-- Screen 1 HTML content -->
                    <div class="quiz-question">
                        <h3 class="fw-semi-bold black-color">
                            <?php echo $question ?>
                        </h3>
                    </div>
                    <div class="quiz-qna py-4">
                        <?php
                            if (have_rows('add_option')):
                                while (have_rows('add_option')):
                                    the_row();
                                    $choice_option = get_sub_field('choice_option');
                                    $correct_answer = get_sub_field('correct_answer');
                                    $is_correct_answer = get_sub_field('is_correct_answer');
                                    $is_correct_answer_var = $is_correct_answer[0];
                            
                                    if ($is_correct_answer_var == "Y") {
                                        $add_correct_answer_class = "correct-answer";
                                        $label_class = "correct";
                                        $add_answer_icon = "correct-icon fa-solid fa-check";
                                    } else {
                                        $add_correct_answer_class = "d-none";
                                        $label_class = "incorrect";
                                        $add_answer_icon = "fa-solid fa-xmark incorrect-icon";
                                    }
                                    ?>
                        <label for="" class="toggle-label br-4 p-3 mb-3 fw-400 <?php echo $label_class ?>"
                            onclick="toggleActiveClass(this)">
                            <?php echo $choice_option ?>
                            <input type="radio" class="">
                            <i class="<?php echo $add_answer_icon ?>"></i>
                            <p class="py-2 m-0 <?php echo $add_correct_answer_class ?>">
                                <?php echo $correct_answer ?>
                            </p>
                        </label>

                        <?php
                            endwhile;
                            endif;
                            ?>

                    </div>
                </div>
            </div>
    </section>
    <section class="w-100 next-previous-btn-section">
    <div class="container">
    <div class="row d-flex justify-content-start align-items-center mt-4 mb-mobile-30 progress-btns">
    <div class="link-text col-md-3">
    <?php
                if ($row_index == 1){
                  echo '<button onclick="redirectToQuizPage()" target="_self" class="fs-1 m-0 primary-color w-100 fw-bold text-center justify-content-center light-grey-bg primary-color-hover p-3 br-10 d-flex">Back to Quizzes</button>';
                } else {
                  echo '<button onclick="prevStep()" target="_self" class="fs-1 m-0 primary-color w-100 fw-bold text-center justify-content-center light-grey-bg primary-color-hover p-3 br-10 d-flex">Back </button>';
                }
                ?>
    </div>
    <div class="link-btn col-md-3 mt-2 mt-md-0 d-flex justify-content-end">
    <?php
        if ($row_index == $all_fields_count) {
            echo '<button onclick="redirectToResourcePage()"
            disabled class="fs-1 m-0 primary-color w-100 fw-bold text-center justify-content-center secondary-bg primary-color-hover p-3 br-10 d-flex nxt-btn">Next </button>';
        } else {
            echo '<button onclick="nextStep()" disabled class="fs-1 m-0 primary-color w-100 fw-bold text-center justify-content-center secondary-bg primary-color-hover p-3 br-10 d-flex nxt-btn">  Next </button>';
        }
        ?>    <!-- <button onclick="nextStep()" disabled
        class="fs-1 m-0 primary-color w-100 fw-bold text-center justify-content-center secondary-bg primary-color-hover p-3 br-10 d-flex nxt-btn">
        Next
        </button> -->
    </div>
    </div>
    </div>
    </section>
    </div>
</div>
<?php
    }
    }
    }
    ?>
<script>
    let currentStep = 1;
    
    function showStep(step) {
        const steps = document.querySelectorAll('.step');
        steps.forEach(s => s.classList.remove('active'));
        document.getElementById(`step${step}`).classList.add('active');
    }
    
    function nextStep() {
        if (currentStep < 50) {
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
    
    function toggleActiveClass(clickedLabel, radioId, isCorrect) {
        // Check if the label has the 'active' class
        const isActive = clickedLabel.classList.contains('active');
    
        // Remove 'active' class and 'wrong-answer' class from all labels
        document.querySelectorAll('.toggle-label').forEach(label => {
            label.classList.remove('active');
            label.classList.remove('wrong-answer');
        });
    
        // Add 'active' class to the clicked label
        clickedLabel.classList.add('active');
    
        // If the label was not active, show the correct answer for incorrect labels
        if (!isActive && !isCorrect) {
            const correctLabel = document.querySelector('.toggle-label.correct');
            if (correctLabel) {
                const correctAnswer = correctLabel.querySelector('.correct-answer');
                if (correctAnswer) {
                    // Assuming you have 'currentStep' representing the current step or slide
    
                    // Display 'correct-icon' elements within the current slide
                    var correctIconsInCurrentStep = document.getElementById('step' + currentStep).getElementsByClassName('correct-icon');
                    for (var i = 0; i < correctIconsInCurrentStep.length; i++) {
                        correctIconsInCurrentStep[i].style.display = 'block';
                    }
    
                    // Remove 'disabled' attribute from 'nxt-btn' elements within the current slide
                    var nextButtonsInCurrentStep = document.getElementById('step' + currentStep).getElementsByClassName('nxt-btn');
                    for (var j = 0; j < nextButtonsInCurrentStep.length; j++) {
                        nextButtonsInCurrentStep[j].removeAttribute('disabled');
                    }
    
                    // Display correct answer and change style
                    var correctLabelInCurrentStep = document.getElementById('step' + currentStep).querySelector('.toggle-label.correct');
                    var correctAnswerInCurrentStep = correctLabelInCurrentStep.querySelector('.correct-answer');
    
                    correctAnswerInCurrentStep.style.display = 'block';
                    correctLabelInCurrentStep.style.backgroundColor = '#E8FFD6';
    
    
    
    
                }
            }
        }
    
        // Toggle the radio button
        const radioInput = document.getElementById(radioId);
        if (radioInput) {
            radioInput.checked = !radioInput.checked;
        }
    }
    
    function redirectToResourcePage() {
        // Change the window location to a specific URL
        window.location.href = '<?php echo site_url() ?>/information-and-support/';
    }
    
    function redirectToQuizPage() {
        // Change the window location to a specific URL
        window.location.href = '<?php echo site_url() ?>/test-your-knowledge/';
    }
    
</script>
<?php get_footer(); ?>