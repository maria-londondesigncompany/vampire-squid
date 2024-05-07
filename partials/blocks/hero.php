<?php

$carousel = 'hero' . uniqid();
$slide_num = -1;

$content_per_slide = get_sub_field('content_per_slide');

?>

<section class="row block-hero">
  <?php get_template_part('partials/anchor') ?>

  <div class="hero px-0 <?php echo $content_per_slide ? 'content-per-slide' : '' ?> hero-<?php the_sub_field('min_height') ?>">

 <!-- if not CPS -->

<?php if (!$content_per_slide) : ?>
  <?php get_template_part('partials/hero-content'); ?>
<?php endif ; ?>

<!-- unique id on both  -->
  <div id="<?php echo $carousel ?>" class="carousel slide" data-bs-ride="false">


    <div class="carousel-inner">
      <?php while ( have_rows('slides') ) : the_row(); $slide_num++; ?>
        <?php if($media = get_sub_field('media')) : ?>

        <div class="carousel-item <?php echo $slide_num == 0 ? 'active' : ''; ?>">
          <?php if($media ['type'] == 'video'): ?>
            <?php $video_placeholder = get_sub_field('video_placeholder') ?>

            <video loop muted <?php echo $video_placeholder ? 'preload="none" class="d-none"' : 'autoplay' ?> playsinline>
              <source src="<?php echo esc_attr($media['url']) ?>" type="<?php echo esc_attr($media['mime_type']) ?>">
            </video>

            <?php if($video_placeholder) $media = $video_placeholder ?>
          <?php endif; ?>

          <?php if($media ['type'] == 'image'): ?>
            <?php echo BootstrapHelper::picture($media, ['xs' => 'medium', 'md' => 'large', 'xl' => 'desktop'], ['class' => 'carousel-image']) ?>
          <?php endif; ?>

          <?php if ($content_per_slide) : ?>
            <?php get_template_part('partials/hero-content'); ?>
          <?php endif; ?>
        </div>
        <?php endif; ?>

      <?php endwhile; ?>



    </div>

    <?php if($slide_num > 0): ?>


    <button class="carousel-control-prev" type="button" data-bs-target="#<?php echo $carousel ?>" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#<?php echo $carousel ?>" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>

    <div class="carousel-indicators">
      <?php for ( $index = 0; $index <= $slide_num; $index++ ): ?>
        <button type="button" data-bs-target="#<?php echo $carousel ?>" data-bs-slide-to="<?php echo $index ?>" class="<?php echo $index === 0 ? 'active' : '' ?>"></button>
      <?php endfor; ?>
    </div>
    <?php endif; ?>
  </div>
  </div>
</section>
