<?php

/**
 * Single Post Options
 *
 * @package movie_theatre
 */

$wp_customize->add_section(
	'movie_theatre_single_post_options',
	array(
		'title' => esc_html__( 'Single Post Options', 'movie-theatre' ),
		'panel' => 'movie_theatre_theme_options',
	)
);


// Post Options - Show / Hide Date.
$wp_customize->add_setting(
	'movie_theatre_single_post_hide_date',
	array(
		'default'           => true,
		'sanitize_callback' => 'movie_theatre_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Movie_Theatre_Toggle_Switch_Custom_Control(
		$wp_customize,
		'movie_theatre_single_post_hide_date',
		array(
			'label'   => esc_html__( 'Show / Hide Date', 'movie-theatre' ),
			'section' => 'movie_theatre_single_post_options',
		)
	)
);

// Post Options - Show / Hide Author.
$wp_customize->add_setting(
	'movie_theatre_single_post_hide_author',
	array(
		'default'           => true,
		'sanitize_callback' => 'movie_theatre_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Movie_Theatre_Toggle_Switch_Custom_Control(
		$wp_customize,
		'movie_theatre_single_post_hide_author',
		array(
			'label'   => esc_html__( 'Show / Hide Author', 'movie-theatre' ),
			'section' => 'movie_theatre_single_post_options',
		)
	)
);

// Post Options - Show / Hide Comments.
$wp_customize->add_setting(
	'movie_theatre_single_post_hide_comments',
	array(
		'default'           => true,
		'sanitize_callback' => 'movie_theatre_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Movie_Theatre_Toggle_Switch_Custom_Control(
		$wp_customize,
		'movie_theatre_single_post_hide_comments',
		array(
			'label'   => esc_html__( 'Show / Hide Comments', 'movie-theatre' ),
			'section' => 'movie_theatre_single_post_options',
		)
	)
);

// Post Options - Show / Hide Time.
$wp_customize->add_setting(
	'movie_theatre_single_post_hide_time',
	array(
		'default'           => true,
		'sanitize_callback' => 'movie_theatre_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Movie_Theatre_Toggle_Switch_Custom_Control(
		$wp_customize,
		'movie_theatre_single_post_hide_time',
		array(
			'label'   => esc_html__( 'Show / Hide Time', 'movie-theatre' ),
			'section' => 'movie_theatre_single_post_options',
		)
	)
);

// Post Options - Show / Hide Category.
$wp_customize->add_setting(
	'movie_theatre_single_post_hide_category',
	array(
		'default'           => true,
		'sanitize_callback' => 'movie_theatre_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Movie_Theatre_Toggle_Switch_Custom_Control(
		$wp_customize,
		'movie_theatre_single_post_hide_category',
		array(
			'label'   => esc_html__( 'Show / Hide Category', 'movie-theatre' ),
			'section' => 'movie_theatre_single_post_options',
		)
	)
);


// Post Options - Show / Hide Tag.
$wp_customize->add_setting(
	'movie_theatre_post_hide_tags',
	array(
		'default'           => true,
		'sanitize_callback' => 'movie_theatre_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Movie_Theatre_Toggle_Switch_Custom_Control(
		$wp_customize,
		'movie_theatre_post_hide_tags',
		array(
			'label'   => esc_html__( 'Show / Hide Tag', 'movie-theatre' ),
			'section' => 'movie_theatre_single_post_options',
		)
	)
);


// Add Separator Custom Control
$wp_customize->add_setting( 'movie_theatre_related_post_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Movie_Theatre_Separator_Custom_Control( $wp_customize, 'movie_theatre_related_post_separator', array(
	'label' => __( 'Enable / Disable Related Post Section', 'movie-theatre' ),
	'section' => 'movie_theatre_single_post_options',
	'settings' => 'movie_theatre_related_post_separator',
) ) );


// Post Options - Show / Hide Related Posts.
$wp_customize->add_setting(
	'movie_theatre_post_hide_related_posts',
	array(
		'default'           => true,
		'sanitize_callback' => 'movie_theatre_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Movie_Theatre_Toggle_Switch_Custom_Control(
		$wp_customize,
		'movie_theatre_post_hide_related_posts',
		array(
			'label'   => esc_html__( 'Show / Hide Related Posts', 'movie-theatre' ),
			'section' => 'movie_theatre_single_post_options',
		)
	)
);

// Register setting for number of related posts
$wp_customize->add_setting(
    'movie_theatre_related_posts_count',
    array(
        'default'           => '',
        'sanitize_callback' => 'absint', // Ensure it's an integer
    )
);

// Add control for number of related posts
$wp_customize->add_control(
    'movie_theatre_related_posts_count',
    array(
        'type'        => 'number',
        'label'       => esc_html__( 'Number of Related Posts to Display', 'movie-theatre' ),
        'section'     => 'movie_theatre_single_post_options',
        'input_attrs' => array(
            'min'  => 1,
            'max'  => 5, // Adjust maximum based on your preference
            'step' => 1,
        ),
    )
);

// Post Options - Related Post Label.
$wp_customize->add_setting(
	'movie_theatre_post_related_post_label',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'movie_theatre_post_related_post_label',
	array(
		'label'    => esc_html__( 'Related Posts Label', 'movie-theatre' ),
		'section'  => 'movie_theatre_single_post_options',
		'settings' => 'movie_theatre_post_related_post_label',
		'type'     => 'text',
	)
);