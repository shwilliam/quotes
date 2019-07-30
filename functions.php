<?php
/**
 * Quotes theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package quotes
 */

if ( ! function_exists( 'qod_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function qod_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html( 'Primary Menu' ),
	) );

	// Switch search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array( 'search-form' ) );

}
endif; // qod_setup
add_action( 'after_setup_theme', 'qod_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * @global int $content_width
 */
function qod_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'qod_content_width', 640 );
}
add_action( 'after_setup_theme', 'qod_content_width', 0 );

/**
 * Filter the stylesheet_uri to output the minified CSS file.
 */
function qod_minified_css( $stylesheet_uri, $stylesheet_dir_uri ) {
	if ( file_exists( get_template_directory() . '/build/css/style.min.css' ) ) {
		$stylesheet_uri = $stylesheet_dir_uri . '/build/css/style.min.css';
	}

	return $stylesheet_uri;
}
add_filter( 'stylesheet_uri', 'qod_minified_css', 10, 2 );

/**
 * Enqueue scripts and styles.
 */
function qod_scripts() {
	wp_enqueue_script( 'qod-starter-skip-link-focus-fix', get_template_directory_uri() . '/build/js/skip-link-focus-fix.min.js', array(), '20151215', true );
}
add_action( 'wp_enqueue_scripts', 'qod_scripts' );

function qod_styles() {
	wp_enqueue_style( 'qod-style', get_stylesheet_uri() );
  wp_enqueue_style( 'font-awesome', 'https://unpkg.com/browse/font-awesome@4.7.0/css/font-awesome.min.css' );
}
add_action( 'wp_enqueue_scripts', 'qod_styles' );


/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom metaboxes generated using the CMB2 library.
 */
require get_template_directory() . '/inc/metaboxes.php';

 /**
 * Custom WP API modifications.
 */
require get_template_directory() . '/inc/api.php';


function update_post_per_page( $args, $request ) {
    $max = max( (int) $request->get_param( 'custom_per_page' ), 9999 );
    $args['posts_per_page'] = $max;    
    return $args;
}

add_filter( 'rest_post_query', 'update_post_per_page', 10, 2 );

function quotes_scripts() {
  $script_url = get_template_directory_uri().'/scripts.js';
  wp_enqueue_script('jquery');
  wp_enqueue_script('quotes_vars', $script_url, array('jquery'), false, true);
  wp_localize_script('quotes_vars', 'wp_vars', array(
    'wpapi_nonce' => wp_create_nonce('wp_rest'),
    'rest_url' => esc_url_raw(rest_url()).'wp/v2/',
    'post_id' => get_the_ID(),
    'posts_amount' => wp_count_posts()->publish 
  ));
}

add_action( 'wp_enqueue_scripts', 'quotes_scripts' );

