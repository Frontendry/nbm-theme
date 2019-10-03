<?php
/**
 * Nairobi Business Monthly functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Nairobi_Business_Monthly
 */

if ( ! function_exists( 'nbm_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function nbm_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Nairobi Business Monthly, use a find and replace
		 * to change 'nbm-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'nbm-theme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'nbm-theme' ),
			'menu-2' => esc_html__( 'Footer Menu', 'nbm-theme' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );	

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		// Add theme support for WooCommerce.
		add_theme_support( 'woocommerce' );
	}
endif;
add_action( 'after_setup_theme', 'nbm_theme_setup' );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nbm_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'nbm-theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'nbm-theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget', 'nbm-theme' ),
		'id'            => 'footer-widget-1',
		'description'   => esc_html__( 'Add widgets here.', 'nbm-theme' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h4 class="footer-misc-titles widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'nbm_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function nbm_theme_scripts() {
	wp_enqueue_style( 'nbm-theme-font', 'https://fonts.googleapis.com/css?family=Ubuntu:400,400i,500,500i,700&display=swap', array(), null, 'all' );

	wp_enqueue_style( 'nbm-theme-style', get_stylesheet_uri() );

	wp_enqueue_style( 'nbm-theme-main-style', get_template_directory_uri() . '/assets/css/app.css', array(), filemtime(get_template_directory() . '/assets/css/app.css'), 'all' );

	wp_enqueue_script('jquery');

	wp_enqueue_script( 'nbm-theme-bundle', get_template_directory_uri() . '/assets/js/bundle.js', array(), filemtime(get_template_directory() . '/assets/js/bundle.js'), true );	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}


}
add_action( 'wp_enqueue_scripts', 'nbm_theme_scripts' );

/**
 * Enqueue Backend scripts and styles.
 */
function nbm_theme_adminscripts($hook) {
    /* if ( 'post.php' != $hook ) {
        return;
	} */

	wp_enqueue_style( 'nbm-theme-custom-admin-css', get_template_directory_uri() . '/inc/custom-admin.css', false, '1.0.0' );

	wp_enqueue_script( 'jquery-ui-sortable' );
	
	wp_enqueue_script( 'nbm-theme-custom-admin', get_template_directory_uri() . '/inc/custom-admin.js', array( 'jquery','jquery-ui-sortable' ), filemtime(get_template_directory() . '/inc/custom-admin.js'), true );

	wp_localize_script( 'nbm-theme-custom-admin', 'collection_b_ajax', array( 'ajax_url' => admin_url('admin-ajax.php')) );
}
add_action( 'admin_enqueue_scripts', 'nbm_theme_adminscripts' );


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

