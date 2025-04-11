<?php

/**
 * Dynamic CSS
 */
function movie_theatre_dynamic_css() {
	$movie_theatre_primary_color = get_theme_mod( 'primary_color', '#000000' );

	$movie_theatre_site_title_font       = get_theme_mod( 'movie_theatre_site_title_font', 'Raleway' );
	$movie_theatre_site_description_font = get_theme_mod( 'movie_theatre_site_description_font', 'Raleway' );
	$movie_theatre_header_font           = get_theme_mod( 'movie_theatre_header_font', 'Rubik' );
	$movie_theatre_content_font             = get_theme_mod( 'movie_theatre_content_font', 'Raleway' );

	// Enqueue Google Fonts
	$movie_theatre_fonts_url = movie_theatre_get_fonts_url();
	if ( ! empty( $movie_theatre_fonts_url ) ) {
		wp_enqueue_style( 'movie-theatre-google-fonts', esc_url( $movie_theatre_fonts_url ), array(), null );
	}

	$movie_theatre_custom_css  = '';
	$movie_theatre_custom_css .= '
    /* Color */
    :root {
        --primary-color: ' . esc_attr( $movie_theatre_primary_color ) . ';
        --header-text-color: ' . esc_attr( '#' . get_header_textcolor() ) . ';
    }
    ';

	$movie_theatre_custom_css .= '
    /* Typography */
    :root {
        --font-heading: "' . esc_attr( $movie_theatre_header_font ) . '", serif;
        --font-main: -apple-system, BlinkMacSystemFont, "' . esc_attr( $movie_theatre_content_font ) . '", "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
    }

    body,
	button, input, select, optgroup, textarea, p {
        font-family: "' . esc_attr( $movie_theatre_content_font ) . '", serif;
	}

	.site-identity p.site-title, h1.site-title a, h1.site-title, p.site-title a, .site-branding h1.site-title a {
        font-family: "' . esc_attr( $movie_theatre_site_title_font ) . '", serif;
	}
    
	p.site-description {
        font-family: "' . esc_attr( $movie_theatre_site_description_font ) . '", serif !important;
	}
    ';

	wp_add_inline_style( 'movie-theatre-style', $movie_theatre_custom_css );
}
add_action( 'wp_enqueue_scripts', 'movie_theatre_dynamic_css', 99 );