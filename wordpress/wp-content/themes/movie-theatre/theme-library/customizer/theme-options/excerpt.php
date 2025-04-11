<?php

/**
 * Excerpt
 *
 * @package movie_theatre
 */

$wp_customize->add_section(
	'movie_theatre_excerpt_options',
	array(
		'panel' => 'movie_theatre_theme_options',
		'title' => esc_html__( 'Excerpt', 'movie-theatre' ),
	)
);

// Excerpt - Excerpt Length.
$wp_customize->add_setting(
	'movie_theatre_excerpt_length',
	array(
		'default'           => 20,
		'sanitize_callback' => 'absint',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'movie_theatre_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'movie-theatre' ),
		'section'     => 'movie_theatre_excerpt_options',
		'settings'    => 'movie_theatre_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 10,
			'max'  => 200,
			'step' => 1,
		),
	)
);