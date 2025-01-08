<div class="pricing">
  <div class="pricing__img-box">
    <?php if ( has_post_thumbnail() ) : ?>
      <?php the_post_thumbnail('full', array('alt' => esc_attr(get_the_title()))); ?>
    <?php else : ?>
      <img src="<?php echo esc_url(get_template_directory_uri() . '/images/default-pricing.jpg'); ?>" alt="<?php esc_attr_e('Default Pricing Image', 'ninoweb'); ?>" />
    <?php endif; ?>
  </div>
  <h3 class="pricing__heading"><?php echo esc_html(get_the_title()); ?></h3>
  <div class="pricing__intro-paragraph"><?php echo wp_kses_post(get_field('pricing_intro_paragraph')); ?></div>
  <div class="pricing__details"><?php echo wp_kses_post(get_field('pricing_details')); ?></div>
</div>
