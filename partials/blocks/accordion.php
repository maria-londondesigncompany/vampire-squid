<section class="block-accordion py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2 class="text-white text-start fw-bold"><?php the_sub_field('faq_section_title') ?></h2>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <?php $accordion = 'accordion-' . uniqid();
        $index = 0; ?>
        <div class="accordion" id="<?php echo esc_attr($accordion) ?>">
          <?php while (have_rows('accordions')):
            the_row();
            $key = $accordion . '-' . (++$index) ?>
            <div class="accordion-item dark-grey-bg br-4 my-4">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed fs-1 fw-bold text-white dark-grey-bg" type="button"
                  data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($key) ?>" aria-expanded="false"
                  aria-controls="<?php echo esc_attr($key) ?>">
                  <?php the_sub_field('title') ?>
                </button>
              </h2>
              <div id="<?php echo esc_attr($key) ?>" class="accordion-collapse collapse"
                aria-labelledby="<?php echo esc_attr($key) ?>" data-bs-parent="#<?php echo esc_attr($accordion) ?>">
                <div class="accordion-body fs-3 fw-400 text-white pt-2 pb-4">
                  <?php the_sub_field('content') ?>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    </div>
  </div>
</section>