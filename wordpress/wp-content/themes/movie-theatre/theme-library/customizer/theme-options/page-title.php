<?php

/**
 * Pige Title Options
 *
 * @package movie_theatre
 */

$wp_customize->add_section(
	'movie_theatre_page_title_options',
	array(
		'panel' => 'movie_theatre_theme_options',
		'title' => esc_html__( 'Page Title', 'movie-theatre' ),
	)
);

$wp_customize->add_setting(
    'movie_theatre_page_header_visibility',
    array(
        'default'           => 'all-devices',
        'sanitize_callback' => 'movie_theatre_sanitize_select',
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'movie_theatre_page_header_visibility',
        array(
            'label'    => esc_html__( 'Page Header Visibility', 'movie-theatre' ),
            'type'     => 'select',
            'section'  => 'movie_theatre_page_title_options',
            'settings' => 'movie_theatre_page_header_visibility',
            'priority' => 10,
            'choices'  => array(
                'all-devices'        => esc_html__( 'Show on all devices', 'movie-theatre' ),
                'hide-tablet'        => esc_html__( 'Hide on Tablet', 'movie-theatre' ),
                'hide-mobile'        => esc_html__( 'Hide on Mobile', 'movie-theatre' ),
                'hide-tablet-mobile' => esc_html__( 'Hide on Tablet & Mobile', 'movie-theatre' ),
                'hide-all-devices'   => esc_html__( 'Hide on all devices', 'movie-theatre' ),
            ),
        )
    )
);


$wp_customize->add_setting( 'movie_theatre_page_title_background_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Movie_Theatre_Separator_Custom_Control( $wp_customize, 'movie_theatre_page_title_background_separator', array(
	'label' => __( 'Page Title BG Image & Color Setting', 'movie-theatre' ),
	'section' => 'movie_theatre_page_title_options',
	'settings' => 'movie_theatre_page_title_background_separator',
)));


$wp_customize->add_setting(
	'movie_theatre_page_header_style',
	array(
		'sanitize_callback' => 'movie_theatre_sanitize_switch',
		'default'           => False,
	)
);

$wp_customize->add_control(
	new Movie_Theatre_Toggle_Switch_Custom_Control(
		$wp_customize,
		'movie_theatre_page_header_style',
		array(
			'label'   => esc_html__('Page Title Background Image', 'movie-theatre'),
			'section' => 'movie_theatre_page_title_options',
		)
	)
);

$wp_customize->add_setting( 'movie_theatre_page_header_background_image', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'movie_theatre_page_header_background_image', array(
    'label'    => __( 'Background Image', 'movie-theatre' ),
    'section'  => 'movie_theatre_page_title_options',
	'description' => __('Choose either a background image or a color. If a background image is selected, the background color will not be visible.', 'movie-theatre'),
    'settings' => 'movie_theatre_page_header_background_image',
	'active_callback' => 'movie_theatre_is_pagetitle_bcakground_image_enabled',
)));


$wp_customize->add_setting('movie_theatre_page_header_image_height', array(
	'default'           => 200,
	'sanitize_callback' => 'movie_theatre_sanitize_range_value',
));

$wp_customize->add_control(new Movie_Theatre_Customize_Range_Control($wp_customize, 'movie_theatre_page_header_image_height', array(
		'label'       => __('Image Height', 'movie-theatre'),
		'section'     => 'movie_theatre_page_title_options',
		'settings'    => 'movie_theatre_page_header_image_height',
		'active_callback' => 'movie_theatre_is_pagetitle_bcakground_image_enabled',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 1000,
			'step' => 5,
		),
)));


$wp_customize->add_setting('movie_theatre_page_title_background_color_setting', array(
    'default' => '#f5f5f5',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'movie_theatre_page_title_background_color_setting', array(
    'label' => __('Page Title Background Color', 'movie-theatre'),
    'section' => 'movie_theatre_page_title_options',
)));

$wp_customize->add_setting('movie_theatre_pagetitle_height', array(
    'default'           => 50,
    'sanitize_callback' => 'movie_theatre_sanitize_range_value',
));

$wp_customize->add_control(new Movie_Theatre_Customize_Range_Control($wp_customize, 'movie_theatre_pagetitle_height', array(
    'label'       => __('Set Height', 'movie-theatre'),
    'description' => __('This setting controls the page title height when no background image is set. If a background image is set, this setting will not apply.', 'movie-theatre'),
    'section'     => 'movie_theatre_page_title_options',
    'settings'    => 'movie_theatre_pagetitle_height',
    'input_attrs' => array(
        'min'  => 0,
        'max'  => 300,
        'step' => 5,
    ),
)));


$wp_customize->add_setting( 'movie_theatre_page_title_style_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Movie_Theatre_Separator_Custom_Control( $wp_customize, 'movie_theatre_page_title_style_separator', array(
	'label' => __( 'Page Title Styling Setting', 'movie-theatre' ),
	'section' => 'movie_theatre_page_title_options',
	'settings' => 'movie_theatre_page_title_style_separator',
)));


$wp_customize->add_setting( 'movie_theatre_page_header_heading_tag', array(
	'default'   => 'h1',
	'sanitize_callback' => 'movie_theatre_sanitize_select',
) );

$wp_customize->add_control( 'movie_theatre_page_header_heading_tag', array(
	'label'   => __( 'Page Title Heading Tag', 'movie-theatre' ),
	'section' => 'movie_theatre_page_title_options',
	'type'    => 'select',
	'choices' => array(
		'h1' => __( 'H1', 'movie-theatre' ),
		'h2' => __( 'H2', 'movie-theatre' ),
		'h3' => __( 'H3', 'movie-theatre' ),
		'h4' => __( 'H4', 'movie-theatre' ),
		'h5' => __( 'H5', 'movie-theatre' ),
		'h6' => __( 'H6', 'movie-theatre' ),
		'p' => __( 'p', 'movie-theatre' ),
		'a' => __( 'a', 'movie-theatre' ),
		'div' => __( 'div', 'movie-theatre' ),
		'span' => __( 'span', 'movie-theatre' ),
	),
) );



$wp_customize->add_setting('movie_theatre_page_header_layout', array(
	'default' => 'left',
	'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_control('movie_theatre_page_header_layout', array(
	'label' => __('Style', 'movie-theatre'),
	'section' => 'movie_theatre_page_title_options',
	'description' => __('"Flex Layout Style" wont work below 600px (mobile media)', 'movie-theatre'),
	'settings' => 'movie_theatre_page_header_layout',
	'type' => 'radio',
	'choices' => array(
		'left' => __('Classic', 'movie-theatre'),
		'right' => __('Aligned Right', 'movie-theatre'),
		'center' => __('Centered Focus', 'movie-theatre'),
		'flex' => __('Flex Layout', 'movie-theatre'),
	),
));