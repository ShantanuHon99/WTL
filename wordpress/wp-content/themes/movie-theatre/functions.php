<?php
/**
 * Movie Theatre functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package movie_theatre
 */

$movie_theatre_theme_data = wp_get_theme();
if( ! defined( 'MOVIE_THEATRE_THEME_VERSION' ) ) define ( 'MOVIE_THEATRE_THEME_VERSION', $movie_theatre_theme_data->get( 'Version' ) );
if( ! defined( 'MOVIE_THEATRE_THEME_NAME' ) ) define( 'MOVIE_THEATRE_THEME_NAME', $movie_theatre_theme_data->get( 'Name' ) );
if( ! defined( 'MOVIE_THEATRE_THEME_TEXTDOMAIN' ) ) define( 'MOVIE_THEATRE_THEME_TEXTDOMAIN', $movie_theatre_theme_data->get( 'TextDomain' ) );

if ( ! defined( 'MOVIE_THEATRE_VERSION' ) ) {
	define( 'MOVIE_THEATRE_VERSION', '1.0.0' );
}

if ( ! function_exists( 'movie_theatre_setup' ) ) :
	
	function movie_theatre_setup() {
		
		load_theme_textdomain( 'movie-theatre', get_template_directory() . '/languages' );

		add_theme_support( 'woocommerce' );

		add_theme_support( 'automatic-feed-links' );
		
		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'movie-theatre' ),
				'social'  => esc_html__( 'Social', 'movie-theatre' ),
			)
		);

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
				'woocommerce',
			)
		);

		add_theme_support( 'post-formats', array(
			'image',
			'video',
			'gallery',
			'audio', 
		) );

		add_theme_support(
			'custom-background',
			apply_filters(
				'movie_theatre_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		add_theme_support( 'align-wide' );

		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'movie_theatre_setup' );

function movie_theatre_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'movie_theatre_content_width', 640 );
}
add_action( 'after_setup_theme', 'movie_theatre_content_width', 0 );

function movie_theatre_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'movie-theatre' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'movie-theatre' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title"><span>',
			'after_title'   => '</span></h2>',
		)
	);

	// Regsiter 4 footer widgets.
	// Regsiter 4 footer widgets.
	$movie_theatre_footer_widget_column = get_theme_mod('movie_theatre_footer_widget_column','4');
	for ($movie_theatre_i=1; $movie_theatre_i<=$movie_theatre_footer_widget_column; $movie_theatre_i++) {
		register_sidebar( array(
			'name' => __( 'Footer  ', 'movie-theatre' )  . $movie_theatre_i,
			'id' => 'movie-theatre-footer-widget-' . $movie_theatre_i,
			'description' => __( 'The Footer Widget Area', 'movie-theatre' )  . $movie_theatre_i,
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<div class="widget-header"><h4 class="widget-title">',
			'after_title' => '</h4></div>',
		) );
	}
}
add_action( 'widgets_init', 'movie_theatre_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function movie_theatre_scripts() {
	// Append .min if SCRIPT_DEBUG is false.
	$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	// Slick style.
	wp_enqueue_style( 'slick-style', get_template_directory_uri() . '/resource/css/slick' . $min . '.css', array(), '1.8.1' );

	// Fontawesome style.
	wp_enqueue_style( 'fontawesome-style', get_template_directory_uri() . '/resource/css/fontawesome' . $min . '.css', array(), '5.15.4' );

	// Main style.
	wp_enqueue_style( 'movie-theatre-style', get_template_directory_uri() . '/style.css', array(), MOVIE_THEATRE_VERSION );

	// RTL style.
	wp_style_add_data('movie-theatre-style', 'rtl', 'replace');

	// Navigation script.
	wp_enqueue_script( 'movie-theatre-navigation-script', get_template_directory_uri() . '/resource/js/navigation' . $min . '.js', array(), MOVIE_THEATRE_VERSION, true );

	// Slick script.
	wp_enqueue_script( 'slick-script', get_template_directory_uri() . '/resource/js/slick' . $min . '.js', array( 'jquery' ), '1.8.1', true );

	// Custom script
	wp_enqueue_script( 'movie-theatre-custom-script', get_template_directory_uri() . '/resource/js/custom.js', array( 'jquery' ), MOVIE_THEATRE_VERSION, true );

	// Localize the sticky header setting
	$movie_theatre_enable_sticky_header = get_theme_mod('movie_theatre_enable_sticky_header', false);
	wp_localize_script( 'movie-theatre-custom-script', 'stickyHeaderSettings', array(
		'isEnabled' => $movie_theatre_enable_sticky_header,
	));

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Include the file.
	require_once get_theme_file_path( 'theme-library/function-files/wptt-webfont-loader.php' );

	// Load the webfont.
	wp_enqueue_style(
		'jost',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap' ),
		array(),
		'1.0'
	);

	wp_enqueue_style(
		'six-caps',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Six+Caps&display=swap' ),
		array(),
		'1.0'
	);

	wp_enqueue_style(
		'rubik',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap' ),
		array(),
		'1.0'
	);

}
add_action( 'wp_enqueue_scripts', 'movie_theatre_scripts' );

//Change number of products per page 
add_filter( 'loop_shop_per_page', 'movie_theatre_products_per_page' );
function movie_theatre_products_per_page( $cols ) {
  	return  get_theme_mod( 'movie_theatre_products_per_page',9);
}

// Change number or products per row 
add_filter('loop_shop_columns', 'movie_theatre_loop_columns');
	if (!function_exists('movie_theatre_loop_columns')) {
	function movie_theatre_loop_columns() {
		return get_theme_mod( 'movie_theatre_products_per_row', 3 );
	}
}

// Featured Image Dimension
function movie_theatre_blog_post_featured_image_dimension(){
	if(get_theme_mod('movie_theatre_blog_post_featured_image_dimension') == 'custom' ) {
		return true;
	}
	return false;
}

/**
 * Include wptt webfont loader.
 */
require_once get_theme_file_path( 'theme-library/function-files/wptt-webfont-loader.php' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/theme-library/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/theme-library/function-files/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/theme-library/function-files/template-functions.php';

/**
 * Google Fonts
 */
require get_template_directory() . '/theme-library/function-files/google-fonts.php';

/**
 * Dynamic CSS
 */
require get_template_directory() . '/theme-library/dynamic-css.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/theme-library/customizer.php';

/**
 * Breadcrumb
 */
require get_template_directory() . '/theme-library/function-files/class-breadcrumb-trail.php';

/**
 * Getting Started
*/
require get_template_directory() . '/theme-library/getting-started/getting-started.php';

/**
 * Demo Import
*/
require get_parent_theme_file_path( '/theme-wizard/config.php' );

/**
 * Customizer Settings Functions
*/
require get_template_directory() . '/theme-library/function-files/customizer-settings-functions.php';