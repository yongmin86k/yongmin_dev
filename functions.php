<?php
/**
 * Yongmin's Portfolio WordPress Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ymk_dev_Theme
 */

if ( ! function_exists( 'ymk_dev_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function ymk_dev_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html( 'Primary Menu' ),
	) );

	// Switch search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

}
endif; // ymk_dev_setup
add_action( 'after_setup_theme', 'ymk_dev_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * @global int $content_width
 */
function ymk_dev_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ymk_dev_content_width', 640 );
}
add_action( 'after_setup_theme', 'ymk_dev_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ymk_dev_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html( 'Sidebar' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ymk_dev_widgets_init' );

/**
 * Filter the stylesheet_uri to output the minified CSS file.
 */
function ymk_dev_minified_css( $stylesheet_uri, $stylesheet_dir_uri ) {
	if ( file_exists( get_template_directory() . '/build/css/style.min.css' ) ) {
		$stylesheet_uri = $stylesheet_dir_uri . '/build/css/style.min.css';
	}

	return $stylesheet_uri;
}
add_filter( 'stylesheet_uri', 'ymk_dev_minified_css', 10, 2 );

/**
 * Enqueue scripts and styles.
 */
function ymk_dev_scripts() {
	wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Cormorant+Unicase:600|Lato:100,100i,300,300i,400,400i,700,700i,900,900i&display=swap');
	wp_enqueue_style( 'ymk-dev-style', get_stylesheet_uri() );

	// wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/8ddc296b1b.js', '', '20190923', false);

	wp_enqueue_script( 'ymk-dev-navigation', get_template_directory_uri() . '/build/js/navigation.min.js', array(), '20151215', true );
	wp_enqueue_script( 'ymk-dev-skip-link-focus-fix', get_template_directory_uri() . '/build/js/skip-link-focus-fix.min.js', array(), '20151215', true );

	// Bind scripts with Front-page
	if ( is_front_page() ){
		wp_enqueue_script( 'ymk-dev-scroll-front-nav', get_template_directory_uri() . '/build/js/scroll-front-nav.min.js', array('jquery'), '', true );
		wp_enqueue_script( 'ymk-dev-script-front-filter', get_template_directory_uri() . '/build/js/filter-front-works.min.js', array('jquery'), '', true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Localize wordpress api with ajax
	wp_localize_script('ymk-dev-script-front-filter', 'ymk_api_works', array(
		'rest_url' => esc_url_raw( rest_url() ),
		'home_url' => esc_url_raw( home_url() )
	));

}
add_action( 'wp_enqueue_scripts', 'ymk_dev_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';
