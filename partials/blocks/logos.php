<?php $id = 'logos-' . uniqid() ?>
<section class="n-gutter block-logos py-4 py-lg-5 bg-<?php the_sub_field('background_style') ?>">
  <?php get_template_part('partials/anchor') ?>

  <div class="container">
    <div class="the-content text-center"><?php the_sub_field('content') ?></div>
  </div>

  <div class="slick-container-viewport">

  <div class="logos slick container" data-append-arrows="#<?php echo $id ?>" data-append-dots="false" data-slides-to-show="7">

    <?php while(have_rows('logos')): the_row(); $link = get_sub_field('link'); ?>
    <<?php echo $link ? sprintf('a href="%s"', esc_attr($link)) : 'div' ?> class="logo-item">

      <?php if($media = get_sub_field('media')) : ?>
      <?php if($media ['type'] == 'video'): ?>

        <video class="card-img-top" playsinline>
          <source src="<?php echo esc_attr($media['url']) ?>" type="<?php echo esc_attr($media['mime_type']) ?>">
        </video>

      <?php elseif($media ['type'] == 'image'): ?>
        <?php echo BootstrapHelper::picture($media, ['xs' => 'medium', 'md' => 'large', 'xl' => 'desktop'], ['class' => 'card-img-top']) ?>
      <?php endif; ?>
      <?php endif; ?>

    </<?php echo $link ? 'a' : 'div' ?>>
    <?php endwhile; ?>
  </div>

  <div id="<?php echo $id ?>" class="slick-static-controls">

  </div>
  </div>

  <div class="container">
    <?php get_template_part('partials/buttons') ?>
  </div>
</section>
