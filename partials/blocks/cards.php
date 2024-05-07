<section class="n-gutter block-cards py-4 py-lg-5 bg-<?php the_sub_field('background_style') ?> card-style-<?php the_sub_field('style') ?>">
  <?php get_template_part('partials/anchor') ?>

  <div class="container">
    <div class="the-content pb-lg-4 text-center">
      <?php the_sub_field('content') ?>
    </div>

    <div class="row cards">

      <?php while(have_rows('cards')): the_row(); ?>

      <div class="col-xl-4">

        <div class="card">
          <div class="p-3 media-container">
          <?php if($media = get_sub_field('media')) : ?>
          <?php if($media ['type'] == 'video'): ?>

            <video class="card-img-top" playsinline>
              <source src="<?php echo esc_attr($media['url']) ?>" type="<?php echo esc_attr($media['mime_type']) ?>">
            </video>

          <?php elseif($media ['type'] == 'image'): ?>
            <?php echo BootstrapHelper::picture($media, ['xs' => 'medium', 'md' => 'large', 'xl' => 'desktop'], ['class' => 'card-img-top']) ?>
          <?php endif; ?>
          <?php endif; ?>
          </div>

          <div class="card-body">
            <div class="the-content pb-3"><?php the_sub_field('content') ?></div>

            <?php if( $linkedin = get_sub_field('linkedin') ): ?>
              <a href="<?php echo esc_url( $linkedin ); ?>" class="social-link">
                <i class="fab fa-linkedin-in"></i>
              </a>
            <?php endif; ?>

            <?php if( $link = get_sub_field('link') ): ?>
              <a class="arrow-link small" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ?: '_self' ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
            <?php endif; ?>

          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>

    <?php get_template_part('partials/buttons', null, ['class' => 'text-center']) ?>
  </div>
</section>
