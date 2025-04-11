<?php
function movie_theatre_get_all_google_fonts() {
    $movie_theatre_webfonts_json = get_template_directory() . '/theme-library/google-webfonts.json';
    if ( ! file_exists( $movie_theatre_webfonts_json ) ) {
        return array();
    }

    $movie_theatre_fonts_json_data = file_get_contents( $movie_theatre_webfonts_json );
    if ( false === $movie_theatre_fonts_json_data ) {
        return array();
    }

    $movie_theatre_all_fonts = json_decode( $movie_theatre_fonts_json_data, true );
    if ( json_last_error() !== JSON_ERROR_NONE ) {
        return array();
    }

    $movie_theatre_google_fonts = array();
    foreach ( $movie_theatre_all_fonts as $movie_theatre_font ) {
        $movie_theatre_google_fonts[ $movie_theatre_font['family'] ] = array(
            'family'   => $movie_theatre_font['family'],
            'variants' => $movie_theatre_font['variants'],
        );
    }
    return $movie_theatre_google_fonts;
}


function movie_theatre_get_all_google_font_families() {
    $movie_theatre_google_fonts  = movie_theatre_get_all_google_fonts();
    $movie_theatre_font_families = array();
    foreach ( $movie_theatre_google_fonts as $movie_theatre_font ) {
        $movie_theatre_font_families[ $movie_theatre_font['family'] ] = $movie_theatre_font['family'];
    }
    return $movie_theatre_font_families;
}

function movie_theatre_get_fonts_url() {
    $movie_theatre_fonts_url = '';
    $movie_theatre_fonts     = array();

    $movie_theatre_all_fonts = movie_theatre_get_all_google_fonts();

    if ( ! empty( get_theme_mod( 'movie_theatre_site_title_font', 'Raleway' ) ) ) {
        $movie_theatre_fonts[] = get_theme_mod( 'movie_theatre_site_title_font', 'Raleway' );
    }

    if ( ! empty( get_theme_mod( 'movie_theatre_site_description_font', 'Raleway' ) ) ) {
        $movie_theatre_fonts[] = get_theme_mod( 'movie_theatre_site_description_font', 'Raleway' );
    }

    if ( ! empty( get_theme_mod( 'movie_theatre_header_font', 'Rubik' ) ) ) {
        $movie_theatre_fonts[] = get_theme_mod( 'movie_theatre_header_font', 'Rubik' );
    }

    if ( ! empty( get_theme_mod( 'movie_theatre_content_font', 'Raleway' ) ) ) {
        $movie_theatre_fonts[] = get_theme_mod( 'movie_theatre_content_font', 'Raleway' );
    }

    $movie_theatre_fonts = array_unique( $movie_theatre_fonts );

    foreach ( $movie_theatre_fonts as $movie_theatre_font ) {
        $movie_theatre_variants      = $movie_theatre_all_fonts[ $movie_theatre_font ]['variants'];
        $movie_theatre_font_family[] = $movie_theatre_font . ':' . implode( ',', $movie_theatre_variants );
    }

    $movie_theatre_query_args = array(
        'family' => urlencode( implode( '|', $movie_theatre_font_family ) ),
    );

    if ( ! empty( $movie_theatre_font_family ) ) {
        $movie_theatre_fonts_url = add_query_arg( $movie_theatre_query_args, 'https://fonts.googleapis.com/css' );
    }

    return $movie_theatre_fonts_url;
}