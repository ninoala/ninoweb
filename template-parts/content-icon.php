<div class="icon">
  <div class="icon__image-box">
    <?php if (has_post_thumbnail()) : ?>
      <?php the_post_thumbnail('icon-thumb', array('alt' => esc_attr(get_the_title()))); ?>
    <?php else : ?>
      <img src="<?php echo esc_url(get_template_directory_uri() . '/images/default-icon.jpg'); ?>" alt="<?php esc_attr_e('Default Icon', 'ninoweb'); ?>" />
    <?php endif; ?>
  </div>
  <h3 class="icon__heading"><?php echo esc_html(get_the_title()); ?></h3>
</div>