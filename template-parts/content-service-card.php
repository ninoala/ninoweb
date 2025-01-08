<div class="service-card" data-id="<?php echo esc_attr(get_the_ID()); ?>">
  <div class="service-card__image-box">
    <?php if (has_post_thumbnail()) : ?>
      <?php the_post_thumbnail('service-card-thumb', array('alt' => esc_attr(get_the_title()))); ?>
    <?php else : ?>
      <img src="<?php echo esc_url(get_template_directory_uri() . '/images/default-service.jpg'); ?>" alt="<?php esc_attr_e('Default Service Image', 'ninoweb'); ?>" />
    <?php endif; ?>
  </div>
  <h3 class="service-card__heading"><?php echo esc_html(get_the_title()); ?></h3>
</div>