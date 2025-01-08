<div class="project">
  <div class="project__text">
    <h3 class="project__heading"><?php echo esc_html(get_the_title()); ?></h3>
    <div class="project__paragraph"><?php echo wp_kses_post(get_the_content()); ?></div>
    <a href="<?php echo esc_url(get_field('project_link')); ?>" class="project__btn"><?php esc_html_e('Live Site', 'ninoweb'); ?></a>
  </div>
  
  <div class="project__img-box">
    <?php if (has_post_thumbnail()) : ?>
      <?php the_post_thumbnail('project-thumb', array('alt' => esc_attr(get_the_title()))); ?>
    <?php else : ?>
      <img src="<?php echo esc_url(get_template_directory_uri() . '/images/default-project.jpg'); ?>" alt="<?php esc_attr_e('Default Project Image', 'ninoweb'); ?>" />
    <?php endif; ?>
  </div>
</div>
