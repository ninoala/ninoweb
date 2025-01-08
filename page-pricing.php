<?php
/*
Template Name: Pricing Page
*/
get_header();
?>

<section class="page-banner--about">
  <div 
    class="page-banner__bg-image" 
    style="background-image:
    linear-gradient(
    to right bottom, 
    rgba(23, 73, 142, 0.7), 
    rgba(23, 73, 142, 0.7)),
    url(<?php echo esc_url(get_theme_file_uri('/images/hero.jpg')); ?>)">
  </div>
</section>

<section class="section-pricing">
  <h2 class="heading-secondary u-margin-bottom-medium"><?php esc_html_e('Pricing and What to Expect', 'ninoweb'); ?></h2>
  <p class="section-pricing__paragraph"><?php esc_html_e('Since every website is a unique and custom tailored solution for every business that we work with, we offer different price levels depending on what you’re looking for:', 'ninoweb'); ?></p>

  <?php 
  $pricingDetails = new WP_Query(array(
    'posts_per_page' => -1,
    'post_type' => 'pricing-level',
    'orderby' => 'ID',
    'order' => 'ASC',
  ));

  if ($pricingDetails->have_posts()) {
    while ($pricingDetails->have_posts()) {
      $pricingDetails->the_post();
      get_template_part('template-parts/content', 'pricing');
    } 
  } else {
    echo '<p>' . esc_html__('No pricing details found.', 'ninoweb') . '</p>';
  }
  wp_reset_postdata();
  ?>
</section>

<?php get_template_part('popup-contact-form'); ?>

<?php
get_footer();
?>
