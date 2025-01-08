<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ninoweb
 */
?>

<footer id="colophon" class="footer">	
    <div 
        class="footer__text"
        style="background: linear-gradient(
        to right bottom, 
        rgba(23, 73, 142, 0.5), 
        rgba(23, 73, 142, 0.5)), url(<?php echo esc_url(get_theme_file_uri('/images/footer-bg.jpg')); ?>) center/cover no-repeat;"
    >
        <h2 class="footer__heading"><?php esc_html_e('Get in touch today!', 'ninoweb'); ?></h2>
        <button id="copyEmailBtn" class="footer__btn" data-email="yegor.nino@gmail.com"><?php esc_html_e('CONTACT US', 'ninoweb'); ?></button>
    </div>

    <p class="footer__paragraph">&copy;<?php echo date('Y'); ?> | <?php esc_html_e('NinoWeb', 'ninoweb'); ?> |&nbsp;<a href="<?php echo esc_url('https://ynino.dev'); ?>" class="footer__link"><?php esc_html_e('ynino.dev', 'ninoweb'); ?></a></p>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
