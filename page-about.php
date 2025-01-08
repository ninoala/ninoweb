<?php
/*
Template Name: About Page
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

<section class="section-intro-about">
  <h2 class="heading-secondary u-margin-bottom-medium"><?php esc_html_e('About Us', 'ninoweb'); ?></h2>
  <div class="section-intro-about__img-box">
    <img class="section-intro-about__img" src="<?php echo esc_url(get_theme_file_uri('/images/about.jpg')); ?>" alt="<?php esc_attr_e('Skyscrapers and sky', 'ninoweb'); ?>">
  </div>
  <div class="section-intro-about__text">
    <h3 class="section-intro-about__heading"><?php esc_html_e('Creating in Ottawa since', 'ninoweb'); ?> <span class="u-orange">2023.</span></h3>
    <p class="section-intro-about__paragraph"><?php esc_html_e('Welcome to', 'ninoweb'); ?> <span class="u-orange"><?php esc_html_e('NinoWeb', 'ninoweb'); ?></span>! <?php esc_html_e('We are dedicated to crafting visually stunning, user-friendly websites. Working closely with you, we will create a site that perfectly aligns with your needs and brand identity. We’re not just any web agency – we’re here to help you make a bold online statement. Let’s join forces and build a website you’ll be proud to showcase to the world!', 'ninoweb'); ?></p>
  </div>
</section>

<section class="section-features">
  <p class="section-features__paragraph"><?php esc_html_e('We are a passionate web design agency with hands-on project experience. We strive to build functional, user-friendly, and visually appealing websites and apps. Our approach is focused on delivering the', 'ninoweb'); ?> <span class="u-orange"><?php esc_html_e('best experience', 'ninoweb'); ?></span> <?php esc_html_e('for users through these four aspects:', 'ninoweb'); ?></p>

  <div class="section-features__cards-container">
  <?php 
  $featureCards = new WP_Query(array(
    'posts_per_page' => -1,
    'post_type' => 'feature-card',
    'orderby' => 'ID',
    'order' => 'ASC',
  ));
  
  if ($featureCards->have_posts()) {
    while ($featureCards->have_posts()) {
      $featureCards->the_post();
      get_template_part('template-parts/content', 'feature-card');
    } 
  }
  wp_reset_postdata();
  ?>
  </div>

  <a class="section-intro__btn" href="<?php echo esc_url(home_url('/portfolio')); ?>"><?php esc_html_e('Our Projects', 'ninoweb'); ?> &rarr;</a>
</section>

<section class="section-process">
  <h2 class="heading-secondary u-margin-bottom-medium"><?php esc_html_e('Our Process', 'ninoweb'); ?></h2>

  <div class="section-process__step">
  <span class="section-process__number">00</span>
  <div class="section-process__text">
    <h3 class="section-process__heading"><?php esc_html_e('Understand the Client\'s Needs', 'ninoweb'); ?></h3>
    <p class="section-process__paragraph"><?php esc_html_e('Gather requirements, understand the client\'s goals, target audience, and desired functionalities.', 'ninoweb'); ?></p>
  </div>
</div>

<div class="section-process__step">
  <span class="section-process__number">01</span>
  <div class="section-process__text">
    <h3 class="section-process__heading"><?php esc_html_e('Research and Analysis', 'ninoweb'); ?></h3>
    <p class="section-process__paragraph"><?php esc_html_e('Analyze competitors, market trends, and user expectations to create a strategic plan.', 'ninoweb'); ?></p>
  </div>
</div>

<div class="section-process__step">
  <span class="section-process__number">02</span>
  <div class="section-process__text">
    <h3 class="section-process__heading"><?php esc_html_e('Define Scope and Timeline', 'ninoweb'); ?></h3>
    <p class="section-process__paragraph"><?php esc_html_e('Establish the project\'s scope, deliverables, and a realistic timeline for completion.', 'ninoweb'); ?></p>
  </div>
</div>

<div class="section-process__step">
  <span class="section-process__number">03</span>
  <div class="section-process__text">
    <h3 class="section-process__heading"><?php esc_html_e('Wireframing and Prototyping', 'ninoweb'); ?></h3>
    <p class="section-process__paragraph"><?php esc_html_e('Create wireframes and prototypes to visualize the site’s layout and user flow.', 'ninoweb'); ?></p>
  </div>
</div>

<div class="section-process__step">
  <span class="section-process__number">04</span>
  <div class="section-process__text">
    <h3 class="section-process__heading"><?php esc_html_e('User Experience (UX) and Visual Design', 'ninoweb'); ?></h3>
    <p class="section-process__paragraph"><?php esc_html_e('Focus on creating an intuitive and engaging user experience, develop the site’s visual elements, including color schemes, typography, and imagery, ensuring alignment with the client\'s brand identity.', 'ninoweb'); ?></p>
  </div>
</div>

<div class="section-process__step">
  <span class="section-process__number">05</span>
  <div class="section-process__text">
    <h3 class="section-process__heading"><?php esc_html_e('Development', 'ninoweb'); ?></h3>
    <p class="section-process__paragraph"><?php esc_html_e('Convert design into a functional website, set up server-side functionalities, databases, and any required integrations; add and format all website content, including text, images, videos, and other media.', 'ninoweb'); ?></p>
  </div>
</div>

<div class="section-process__step">
  <span class="section-process__number">06</span>
  <div class="section-process__text">
    <h3 class="section-process__heading"><?php esc_html_e('Quality Assurance and Review', 'ninoweb'); ?></h3>
    <p class="section-process__paragraph"><?php esc_html_e('Test the website for functionality, usability, compatibility, and performance across different devices and browsers. Present the website to the client for review and make any necessary adjustments based on their feedback.', 'ninoweb'); ?></p>
  </div>
</div>

<div class="section-process__step">
  <span class="section-process__number">07</span>
  <div class="section-process__text">
    <h3 class="section-process__heading"><?php esc_html_e('Launch and Deployment', 'ninoweb'); ?></h3>
    <p class="section-process__paragraph"><?php esc_html_e('Once approved, deploy the website to the live server and perform a final check to ensure everything is working correctly.', 'ninoweb'); ?></p>
  </div>
</div>
</section>

<?php get_template_part('popup-contact-form'); ?>

<?php get_footer(); ?>
