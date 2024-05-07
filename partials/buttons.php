<?php if(have_rows('buttons')): ?>
<div class="buttons-container <?php echo esc_attr($args['class'] ?? '') ?>">
  <?php $n = 0; while( have_rows('buttons') ) : the_row(); $n ++ ?>

    <?php if( $button = get_sub_field('button') ): ?>
      <a class="btn btn-<?php echo esc_attr( get_sub_field('button_style') ?: ($n % 2 > 0 ? 'outline-light' : 'light') ) ?>"  href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ?: '_self' ); ?>"><?php echo esc_html( $button['title'] ); ?></a>
    <?php endif; ?>

  <?php  endwhile; ?>
</div>
<?php endif; ?>
