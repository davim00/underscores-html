<?php
/**
 * Underscores HTML functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Underscores_HTML
 */

if ( ! function_exists( 'underscores_html_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function underscores_html_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Underscores HTML, use a find and replace
	 * to change 'underscores-html' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'underscores-html', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'underscores-html' ),
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

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	function underscores_html_custom_logo() {
		if ( function_exists( 'the_custom_logo' ) ) {
			the_custom_logo();
		}
	}

	// Change custom logo classes to play nice with Bootstrap
	add_filter('get_custom_logo','change_logo_class');
	function change_logo_class($html) {
		$html = str_replace('class="custom-logo-link"', 'class="navbar-brand"', $html);
		return $html;
	}

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 644, 400, true ); // default Featured Image dimensions (cropped)

    // additional image sizes
    // delete the next line if you do not need additional image sizes
    // add_image_size( 'category-thumb', 300, 9999 ); // 300 pixels wide (and unlimited height)

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'underscores_html_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'underscores_html_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function underscores_html_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'underscores_html_content_width', 640 );
}
add_action( 'after_setup_theme', 'underscores_html_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function underscores_html_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'underscores-html' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'underscores-html' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s panel panel-default">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="panel-heading">',
		'after_title'   => '</div>',
	) );
}
add_action( 'widgets_init', 'underscores_html_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function underscores_html_scripts() {
	wp_enqueue_style( 'underscores-html-style', get_stylesheet_uri() );

	// Uncomment this line if you prefer Fontawesome to Glyphicons. Remember to remove "glyphicons.scss" from "style.scss" before compiling css.
	// wp_enqueue_style( 'underscores-html-fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );

	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'underscores-html-functions-js', get_template_directory_uri() . '/js/functions.js', array() );

	wp_enqueue_script( 'underscores-html-botstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array(), '337', true );

	wp_enqueue_script( 'underscores-html-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'underscores-html-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'underscores_html_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Register Custom Navigation Walker
 */
require_once('wp_bootstrap_navwalker.php');
