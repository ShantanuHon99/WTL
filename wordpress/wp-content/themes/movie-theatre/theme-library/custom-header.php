<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package movie_theatre
 */

function movie_theatre_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'movie_theatre_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1360,
		'height'                 => 110,
		'flex-width'         	=> true,
        'flex-height'        	=> true,
		'wp-head-callback'       => 'movie_theatre_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'movie_theatre_custom_header_setup' );

if ( ! function_exists( 'movie_theatre_header_style' ) ) :

add_action( 'wp_enqueue_scripts', 'movie_theatre_header_style' );
function movie_theatre_header_style() {
	if ( get_header_image() ) :
	$movie_theatre_custom_css = "
        header.site-header .header-main-wrapper .bottom-header-outer-wrapper .bottom-header-part{
			background-image:url('".esc_url(get_header_image())."') !important;
			background-size: 100% 100%;
			background-position: center top;
		}";
	   	wp_add_inline_style( 'movie-theatre-style', $movie_theatre_custom_css );
	endif;
}
endif;