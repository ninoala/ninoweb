<?php 
  get_header(); 
?>

<section class="page-banner">
  <div 
    class="page-banner__bg-image" 
    style="background-image:
    linear-gradient(
    to right bottom, 
    rgba(23, 73, 142, 0.7), 
    rgba(23, 73, 142, 0.7)),
    url(<?php echo esc_url(get_theme_file_uri('/images/hero.jpg')); ?>)">
  </div>

  <div class="page-banner__content">
    <img src="<?php echo esc_url(get_theme_file_uri('/images/logo-pyramide.svg')); ?>" alt="" class="page-banner__img">
    <h1 class="heading-primary"><?php esc_html_e('We Are Your Best Guide to Digital Success', 'ninoweb'); ?></h1>
  </div>
</section>

<section class="section-intro">
  <h2 class="heading-secondary">
    <?php esc_html_e('How We Can Help', 'ninoweb'); ?>
  </h2>

  <p class="section-intro__paragraph">
    <?php esc_html_e('Our goal is to create', 'ninoweb'); ?> <a href="<?php echo esc_url(home_url('/portfolio')); ?>" class="section-intro__link"><?php esc_html_e('digital excellence.', 'ninoweb'); ?></a> <?php esc_html_e('Let`s build a website that truly impresses you!', 'ninoweb'); ?>
  </p>

  <div class="section-intro__cards-container">
  <?php 
  $homepageCards = new WP_Query(array(
    'posts_per_page' => -1,
    'post_type' => 'card',
    'orderby' => 'ID',
    'order' => 'ASC',
  ));
  
  if ($homepageCards->have_posts()) {
    while ($homepageCards->have_posts()) {
      $homepageCards->the_post();
      get_template_part('template-parts/content', 'service-card');
    } 
  }
  wp_reset_postdata();
  ?>
  </div>

  <div class="popup" id="popup">
    <div class="popup__content">
      <div class="popup__left">
        <img src="" alt="" class="popup__thumbnail" />
      </div>
      <div class="popup__right">
        <a href="#" class="popup__close">&times;</a>
        <h3 class="heading-tertiary u-margin-bottom-small popup__title"></h3>
        <div class="popup__text"></div>
        <a href="#" class="btn popup__link">LINEで予約</a>
      </div>
    </div>
  </div>

  <a class="section-intro__btn" 
    href="<?php echo esc_url(home_url('/about')); ?>">
    <?php esc_html_e('Learn More', 'ninoweb'); ?> &rarr;
  </a>
</section>

<section class="section-description">
  <div class="section-description__text">
    <h2 class="heading-secondary">
      <?php esc_html_e('We help companies build the online presence of their dreams.', 'ninoweb'); ?>
    </h2>
    
    <p class="section-description__paragraph"><?php esc_html_e('At', 'ninoweb'); ?> <a href="<?php echo esc_url(home_url('/about')); ?>" class="section-description__link"><?php esc_html_e('NinoWeb', 'ninoweb'); ?></a>, <?php esc_html_e('we understand the importance of getting your business online. That\'s why we offer a range of services to elevate your digital presence. From designing sleek, user-friendly websites to developing custom software solutions, our team of experts will work closely with you to bring your vision to life. Whether you\'re a small startup or an established business, we have the skills and experience to help you achieve your goals and take your business to the next level. Let\'s create a digital presence that stands out.', 'ninoweb'); ?></p>
  </div>
  <div class="section-description__img-box">
    <img class="section-description__img" src="<?php echo esc_url(get_theme_file_uri('/images/lights.jpg')); ?>" alt="<?php esc_attr_e('Bright lights', 'ninoweb'); ?>" alt="Bright lights">
  </div>
</section>

<section 
  class="section-icons"
  style="background: linear-gradient(
    to right bottom, 
    rgba(23, 73, 142, 0.6), 
    rgba(23, 73, 142, 0.6)), url(<?php echo esc_url(get_theme_file_uri('/images/icons-bg.jpg')); ?>) center/cover no-repeat;">
>
  <?php 
  $homepageIcons = new WP_Query(array(
    'posts_per_page' => -1,
    'post_type' => 'icon',
    'orderby' => 'ID',
    'order' => 'ASC',
  ));
  
  if ($homepageIcons->have_posts()) {
    while ($homepageIcons->have_posts()) {
      $homepageIcons->the_post();
      get_template_part('template-parts/content', 'icon');
    } 
  }
  wp_reset_postdata();
  ?>
</section>

<section class="section-featured-projects">
  <h2 class="heading-secondary u-margin-top-large u-margin-bottom-medium"><?php esc_html_e('Featured Projects', 'ninoweb'); ?></h2>
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
  }
  wp_reset_postdata();
  ?>
</section>

<?php get_template_part('popup-contact-form'); ?>

<?php 
  get_footer(); 
?>

