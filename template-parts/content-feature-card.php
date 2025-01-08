<div class="feature-card">
  <div class="feature-card__img-box u-margin-top-small">
    <?php if (has_post_thumbnail()) : ?>
      <?php the_post_thumbnail('feature-card-thumb', array('alt' => esc_attr(get_the_title()))); ?>
    <?php else : ?>
      <img src="<?php echo esc_url(get_template_directory_uri() . '/images/default-image.jpg'); ?>" alt="<?php esc_attr_e('Default Image', 'ninoweb'); ?>" />
    <?php endif; ?>
  </div>
  <h3 class="feature-card__heading u-margin-bottom-small"><?php echo esc_html(get_the_title()); ?></h3>
  <div class="feature-card__content"><?php the_content(); ?></div>
</div>
