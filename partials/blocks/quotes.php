<?php $id = 'quotes-' . uniqid() ?>
<section class="n-gutter block-quotes py-4 py-lg-5 bg-<?php the_sub_field('background_style') ?>">
  <?php get_template_part('partials/anchor') ?>

  <div class="container">
    <div class="the-content text-center">
      <?php the_sub_field('content') ?>
    </div>

    <div class="slick-container-viewport ">
    <div class="quotes mx-auto slick" data-append-arrows="#<?php echo $id ?>" data-append-dots="false" data-slides-to-show="1" data-slick="{centerMode:true}">

      <?php while(have_rows('quotes')): the_row();  ?>
      <div class="quote">
        <div class="text-center card">
          <div class="card-body the-content large">
            <?php the_sub_field('content') ?>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
    </div>

    <div id="<?php echo $id ?>" class="slick-static-controls mt-4">

    </div>

    <?php get_template_part('partials/buttons') ?>
  </div>
</section>
