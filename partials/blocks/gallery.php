<section class="n-gutter block-gallery py-4 py-lg-5 bg-<?php the_sub_field('background_style') ?> card-style-<?php the_sub_field('style') ?>">
  <?php get_template_part('partials/anchor') ?>

  <div class="container">
    <div class="row gallery-items g-3 g-lg-4">
      <?php foreach(get_sub_field('items') as $media):  ?>

      <div class="col-xl-4">

        <div class="card">
          <div class="aspect-container">
          <?php if($media ['type'] == 'video'): ?>

            <video class="card-img-top" playsinline>
              <source src="<?php echo esc_attr($media['url']) ?>" type="<?php echo esc_attr($media['mime_type']) ?>">
            </video>

          <?php elseif($media ['type'] == 'image'): ?>
            <?php echo BootstrapHelper::picture($media, ['xs' => 'medium', 'md' => 'large', 'xl' => 'desktop'], ['class' => 'card-img-top']) ?>
          <?php endif; ?>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
