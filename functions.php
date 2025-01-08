<?php
/**
 * ninoweb functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ninoweb
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ninoweb_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on ninoweb, use a find and replace
		* to change 'ninoweb' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'ninoweb', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'ninoweb' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'ninoweb_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'ninoweb_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ninoweb_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ninoweb_content_width', 640 );
}
add_action( 'after_setup_theme', 'ninoweb_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ninoweb_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'ninoweb' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ninoweb' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'ninoweb_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ninoweb_scripts() {
	wp_enqueue_style( 'ninoweb-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'ninoweb-style', 'rtl', 'replace' );
	wp_enqueue_script( 'ninoweb-popup', get_template_directory_uri() . '/js/popup.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'ninoweb-email-btn', get_template_directory_uri() . '/js/copy-email-btn.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'ninoweb-mobile-menu', get_template_directory_uri() . '/js/mobile-menu.js', array(), _S_VERSION, true );
	wp_enqueue_script('ninoweb-popup-services', get_template_directory_uri() . '/js/popup-services.js', array(), _S_VERSION, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_localize_script('ninoweb-popup', 'themeParams', array(
		'imagesPath' => get_template_directory_uri() . '/images/'
	));
	
	wp_localize_script('ninoweb-popup-services', 'custom_data', array(
		'ajaxurl' => admin_url('admin-ajax.php'),
		'nonce'   => wp_create_nonce('fetch_service_nonce')
	));
}
add_action( 'wp_enqueue_scripts', 'ninoweb_scripts' );

function fetch_service_post() {
	// Verify nonce
	if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'fetch_service_nonce')) {
		wp_send_json_error('Invalid nonce');
		return;
	}

	$post_id = intval($_POST['post_id']);
	$post = get_post($post_id);

	if ($post) {
		$thumbnail_url = get_the_post_thumbnail_url($post, 'service-thumb');

		$response = array(
			'title' => get_the_title($post),
			'content' => apply_filters('the_content', $post->post_content),
			'featured_image_url' => $thumbnail_url,
			'link' => get_permalink($post),
		);

		wp_send_json_success($response);
	} else {
		wp_send_json_error('Post not found');
	}
}
add_action('wp_ajax_fetch_service_post', 'fetch_service_post');
add_action('wp_ajax_nopriv_fetch_service_post', 'fetch_service_post');

function enqueue_google_fonts() {
    wp_enqueue_style('font-lato', '//fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap', array(), null);
    wp_enqueue_style('font-merriweather-sans', '//fonts.googleapis.com/css2?family=Merriweather+Sans:ital,wght@0,300..800;1,300..800&display=swap', array(), null);
}
add_action('wp_enqueue_scripts', 'enqueue_google_fonts');

// Add custom image sizes
function ninoweb_custom_image_sizes() {
  add_image_size('service-card-thumb', 400, 400, true); 
	add_image_size('icon-thumb', 125, 125, true);
	add_image_size('project-thumb', 600, 400, true);
	add_image_size('feature-card-thumb', 200, 200, true);
}
add_action('after_setup_theme', 'ninoweb_custom_image_sizes');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

