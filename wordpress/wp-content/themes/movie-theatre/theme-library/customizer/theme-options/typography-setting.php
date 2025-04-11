<?php

/**
 * Typography Settings
 *
 * @package movie_theatre
 */

// Typography Settings
$wp_customize->add_section(
    'movie_theatre_typography_setting',
    array(
        'panel' => 'movie_theatre_theme_options',
        'title' => esc_html__( 'Typography Settings', 'movie-theatre' ),
    )
);

$wp_customize->add_setting(
    'movie_theatre_site_title_font',
    array(
        'default'           => 'Raleway',
        'sanitize_callback' => 'movie_theatre_sanitize_google_fonts',
    )
);

$wp_customize->add_control(
    'movie_theatre_site_title_font',
    array(
        'label'    => esc_html__( 'Site Title Font Family', 'movie-theatre' ),
        'section'  => 'movie_theatre_typography_setting',
        'settings' => 'movie_theatre_site_title_font',
        'type'     => 'select',
        'choices'  => movie_theatre_get_all_google_font_families(),
    )
);

// Typography - Site Description Font.
$wp_customize->add_setting(
	'movie_theatre_site_description_font',
	array(
		'default'           => 'Raleway',
		'sanitize_callback' => 'movie_theatre_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'movie_theatre_site_description_font',
	array(
		'label'    => esc_html__( 'Site Description Font Family', 'movie-theatre' ),
		'section'  => 'movie_theatre_typography_setting',
		'settings' => 'movie_theatre_site_description_font',
		'type'     => 'select',
		'choices'  => movie_theatre_get_all_google_font_families(),
	)
);

// Typography - Header Font.
$wp_customize->add_setting(
	'movie_theatre_header_font',
	array(
		'default'           => 'Rubik',
		'sanitize_callback' => 'movie_theatre_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'movie_theatre_header_font',
	array(
		'label'    => esc_html__( 'Heading Font Family', 'movie-theatre' ),
		'section'  => 'movie_theatre_typography_setting',
		'settings' => 'movie_theatre_header_font',
		'type'     => 'select',
		'choices'  => movie_theatre_get_all_google_font_families(),
	)
);

// Typography - Body Font.
$wp_customize->add_setting(
	'movie_theatre_content_font',
	array(
		'default'           => 'Raleway',
		'sanitize_callback' => 'movie_theatre_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'movie_theatre_content_font',
	array(
		'label'    => esc_html__( 'Content Font Family', 'movie-theatre' ),
		'section'  => 'movie_theatre_typography_setting',
		'settings' => 'movie_theatre_content_font',
		'type'     => 'select',
		'choices'  => movie_theatre_get_all_google_font_families(),
	)
);
