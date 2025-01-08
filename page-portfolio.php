<?php
/*
Template Name: Portfolio Page
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

<section class="section-projects">
  <h2 class="heading-secondary u-margin-bottom-medium"><?php esc_html_e('Our Projects', 'ninoweb'); ?></h2>
  <?php 
  $homepageProjects = new WP_Query(array(
    'posts_per_page' => -1,
    'post_type' => 'project',
    'orderby' => 'ID',
    'order' => 'ASC',
  ));

  if ($homepageProjects->have_posts()) {
    while ($homepageProjects->have_posts()) {
      $homepageProjects->the_post();
      get_template_part('template-parts/content', 'project');
    } 
  } else {
    echo '<p>' . esc_html__('No projects found.', 'ninoweb') . '</p>';
  }
  wp_reset_postdata();
  ?>
</section>

<?php get_template_part('popup-contact-form'); ?>

<?php get_footer(); ?>
