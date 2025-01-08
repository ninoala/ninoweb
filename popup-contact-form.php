<div id="popup-contact-form" class="popup-overlay" role="dialog" aria-labelledby="popup-title" aria-hidden="true">
    <div class="popup-content">
      <a class="close-popup" aria-label="<?php esc_attr_e('Close popup', 'ninoweb'); ?>">×</a>
      <h2 id="popup-title" class="popup-title"><?php esc_html_e('Contact Us', 'ninoweb'); ?></h2>
      <?php echo do_shortcode('[wpforms id="72"]'); ?>
    </div>
</div>