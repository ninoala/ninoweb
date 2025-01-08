<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'ninoweb' ); ?></a>
    <header id="masthead" class="site-header" aria-label="<?php esc_attr_e( 'Main Header', 'ninoweb' ); ?>">
      <div class="site-branding">
        <?php
          if ( function_exists( 'the_custom_logo' ) ) {
            the_custom_logo();
          }
          $ninoweb_description = get_bloginfo( 'description', 'display' );
          if ( $ninoweb_description || is_customize_preview() ) :
        ?>
        <p class="site-description"><?php echo esc_html( $ninoweb_description ); ?></p>
        <?php endif; ?>
      </div><!-- .site-branding -->

      <input type="checkbox" id="menu-toggle" class="menu-toggle-checkbox">
      <label for="menu-toggle" class="menu-toggle-label">
        <span></span>
        <span></span>
        <span></span>
      </label>

      <nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'ninoweb' ); ?>">
        <?php
          wp_nav_menu(
            array(
              'theme_location' => 'menu-1',
              'menu_id'        => 'primary-menu',
              'menu_class'     => 'primary-menu', // Added for styling
            )
          );
        ?>
      </nav><!-- #site-navigation -->
    </header><!-- #masthead -->
    <!-- Rest of your content -->
  </div><!-- #page -->
  <?php wp_footer(); ?>
</body>
</html>
