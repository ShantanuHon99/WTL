<?php

/**
 * Sidebar Position
 *
 * @package movie_theatre
 */

$wp_customize->add_section(
	'movie_theatre_sidebar_position',
	array(
		'title' => esc_html__( 'Sidebar Position', 'movie-theatre' ),
		'panel' => 'movie_theatre_theme_options',
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'movie_theatre_global_sidebar_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Movie_Theatre_Separator_Custom_Control( $wp_customize, 'movie_theatre_global_sidebar_separator', array(
	'label' => __( 'Global Sidebar Position', 'movie-theatre' ),
	'section' => 'movie_theatre_sidebar_position',
	'settings' => 'movie_theatre_global_sidebar_separator',
)));


// Sidebar Position - Global Sidebar Position.
$wp_customize->add_setting(
	'movie_theatre_sidebar_position',
	array(
		'sanitize_callback' => 'movie_theatre_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'movie_theatre_sidebar_position',
	array(
		'label'   => esc_html__( 'Select Sidebar Position', 'movie-theatre' ),
		'section' => 'movie_theatre_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'movie-theatre' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'movie-theatre' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'movie-theatre' ),
		),
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'movie_theatre_post_sidebar_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Movie_Theatre_Separator_Custom_Control( $wp_customize, 'movie_theatre_post_sidebar_separator', array(
	'label' => __( 'Post Sidebar Position', 'movie-theatre' ),
	'section' => 'movie_theatre_sidebar_position',
	'settings' => 'movie_theatre_post_sidebar_separator',
)));


// Sidebar Position - Post Sidebar Position.
$wp_customize->add_setting(
	'movie_theatre_post_sidebar_position',
	array(
		'sanitize_callback' => 'movie_theatre_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'movie_theatre_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Select Sidebar Position', 'movie-theatre' ),
		'section' => 'movie_theatre_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'movie-theatre' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'movie-theatre' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'movie-theatre' ),
		),
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'movie_theatre_page_sidebar_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Movie_Theatre_Separator_Custom_Control( $wp_customize, 'movie_theatre_page_sidebar_separator', array(
	'label' => __( 'Page Sidebar Position', 'movie-theatre' ),
	'section' => 'movie_theatre_sidebar_position',
	'settings' => 'movie_theatre_page_sidebar_separator',
)));


// Sidebar Position - Page Sidebar Position.
$wp_customize->add_setting(
	'movie_theatre_page_sidebar_position',
	array(
		'sanitize_callback' => 'movie_theatre_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'movie_theatre_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Select Sidebar Position', 'movie-theatre' ),
		'section' => 'movie_theatre_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'movie-theatre' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'movie-theatre' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'movie-theatre' ),
		),
	)
);


// Add Separator Custom Control
$wp_customize->add_setting( 'movie_theatre_sidebar_width_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Movie_Theatre_Separator_Custom_Control( $wp_customize, 'movie_theatre_sidebar_width_separator', array(
	'label' => __( 'Sidebar Width Setting', 'movie-theatre' ),
	'section' => 'movie_theatre_sidebar_position',
	'settings' => 'movie_theatre_sidebar_width_separator',
)));


$wp_customize->add_setting( 'movie_theatre_sidebar_width', array(
	'default'           => '30',
	'sanitize_callback' => 'movie_theatre_sanitize_range_value',
) );

$wp_customize->add_control(new Movie_Theatre_Customize_Range_Control($wp_customize, 'movie_theatre_sidebar_width', array(
	'section'     => 'movie_theatre_sidebar_position',
	'label'       => __( 'Adjust Sidebar Width', 'movie-theatre' ),
	'description' => __( 'Adjust the width of the sidebar.', 'movie-theatre' ),
	'input_attrs' => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
)));

$wp_customize->add_setting( 'movie_theatre_sidebar_widget_font_size', array(
    'default'           => 21,
    'sanitize_callback' => 'absint',
) );

// Add control for site title size
$wp_customize->add_control( 'movie_theatre_sidebar_widget_font_size', array(
    'type'        => 'number',
    'section'     => 'movie_theatre_sidebar_position',
    'label'       => __( 'Sidebar Widgets Heading Font Size ', 'movie-theatre' ),
    'input_attrs' => array(
        'min'  => 10,
        'max'  => 100,
        'step' => 1,
    ),
));