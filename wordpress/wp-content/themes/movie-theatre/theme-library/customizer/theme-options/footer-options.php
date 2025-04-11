<?php

/**
 * Footer Options
 *
 * @package movie_theatre
 */

$wp_customize->add_section(
	'movie_theatre_footer_options',
	array(
		'panel' => 'movie_theatre_theme_options',
		'title' => esc_html__( 'Footer Options', 'movie-theatre' ),
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'movie_theatre_footer_separators', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Movie_Theatre_Separator_Custom_Control( $wp_customize, 'movie_theatre_footer_separators', array(
	'label' => __( 'Footer Settings', 'movie-theatre' ),
	'section' => 'movie_theatre_footer_options',
	'settings' => 'movie_theatre_footer_separators',
)));

// column // 
$wp_customize->add_setting(
	'movie_theatre_footer_widget_column',
	array(
        'default'			=> '4',
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'movie_theatre_sanitize_select',
		
	)
);	

$wp_customize->add_control(
	'movie_theatre_footer_widget_column',
	array(
	    'label'   		=> __('Select Widget Column','movie-theatre'),
	    'section' 		=> 'movie_theatre_footer_options',
		'type'			=> 'select',
		'choices'        => 
		array(
			'' => __( 'None', 'movie-theatre' ),
			'1' => __( '1 Column', 'movie-theatre' ),
			'2' => __( '2 Column', 'movie-theatre' ),
			'3' => __( '3 Column', 'movie-theatre' ),
			'4' => __( '4 Column', 'movie-theatre' )
		) 
	) 
);

//  Image // 
$wp_customize->add_setting('movie_theatre_footer_background_color_setting', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'movie_theatre_footer_background_color_setting', array(
    'label' => __('Footer Background Color', 'movie-theatre'),
    'section' => 'movie_theatre_footer_options',
)));

// Footer Background Image Setting
$wp_customize->add_setting('movie_theatre_footer_background_image_setting', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'movie_theatre_footer_background_image_setting', array(
    'label' => __('Footer Background Image', 'movie-theatre'),
    'section' => 'movie_theatre_footer_options',
)));


$wp_customize->add_setting('footer_text_transform', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field',
));

// Add Footer Heading Text Transform Control
$wp_customize->add_control('footer_text_transform', array(
    'label' => __('Footer Heading Text Transform', 'movie-theatre'),
    'section' => 'movie_theatre_footer_options',
    'settings' => 'footer_text_transform',
    'type' => 'select',
    'choices' => array(
        'none' => __('None', 'movie-theatre'),
        'capitalize' => __('Capitalize', 'movie-theatre'),
        'uppercase' => __('Uppercase', 'movie-theatre'),
        'lowercase' => __('Lowercase', 'movie-theatre'),
    ),
));

$wp_customize->add_setting(
	'movie_theatre_footer_copyright_text',
	array(
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'movie_theatre_footer_copyright_text',
	array(
		'label'    => esc_html__( 'Copyright Text', 'movie-theatre' ),
		'section'  => 'movie_theatre_footer_options',
		'settings' => 'movie_theatre_footer_copyright_text',
		'type'     => 'textarea',
	)
);

//Copyright Alignment
$wp_customize->add_setting(
	'movie_theatre_footer_bottom_align',
	array(
		'default' 			=> 'center',
		'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control(
	'movie_theatre_footer_bottom_align',
	array(
		'label' => __('Copyright Alignment ','movie-theatre'),
		'section' => 'movie_theatre_footer_options',
		'type'			=> 'select',
		'choices' => 
		array(
			'left' => __('Left','movie-theatre'),
			'right' => __('Right','movie-theatre'),
			'center' => __('Center','movie-theatre'),
		),
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'movie_theatre_scroll_separators', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Movie_Theatre_Separator_Custom_Control( $wp_customize, 'movie_theatre_scroll_separators', array(
	'label' => __( 'Scroll Top Settings', 'movie-theatre' ),
	'section' => 'movie_theatre_footer_options',
	'settings' => 'movie_theatre_scroll_separators',
)));

// Footer Options - Scroll Top.
$wp_customize->add_setting(
	'movie_theatre_scroll_top',
	array(
		'sanitize_callback' => 'movie_theatre_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Movie_Theatre_Toggle_Switch_Custom_Control(
		$wp_customize,
		'movie_theatre_scroll_top',
		array(
			'label'   => esc_html__( 'Enable Scroll Top Button', 'movie-theatre' ),
			'section' => 'movie_theatre_footer_options',
		)
	)
);

// icon // 
$wp_customize->add_setting(
	'movie_theatre_scroll_btn_icon',
	array(
        'default' => 'fas fa-chevron-up',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
		
	)
);	

$wp_customize->add_control(new Movie_Theatre_Icon_Control($wp_customize, 
	'movie_theatre_scroll_btn_icon',
	array(
	    'label'   		=> __('Scroll Top Icon','movie-theatre'),
	    'section' 		=> 'movie_theatre_footer_options',
		'iconset' => 'fa',
	))  
);
$wp_customize->add_setting( 'movie_theatre_scroll_top_position', array(
    'default'           => 'bottom-right',
    'sanitize_callback' => 'movie_theatre_sanitize_scroll_top_position',
) );

// Add control for Scroll Top Button Position
$wp_customize->add_control( 'movie_theatre_scroll_top_position', array(
    'label'    => __( 'Scroll Top Button Position', 'movie-theatre' ),
    'section'  => 'movie_theatre_footer_options',
    'settings' => 'movie_theatre_scroll_top_position',
    'type'     => 'select',
    'choices'  => array(
        'bottom-right' => __( 'Bottom Right', 'movie-theatre' ),
        'bottom-left'  => __( 'Bottom Left', 'movie-theatre' ),
        'bottom-center'=> __( 'Bottom Center', 'movie-theatre' ),
    ),
) );

$wp_customize->add_setting( 'movie_theatre_scroll_top_shape', array(
    'default'           => 'box',
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'movie_theatre_scroll_top_shape', array(
    'label'    => __( 'Scroll to Top Button Shape', 'movie-theatre' ),
    'section'  => 'movie_theatre_footer_options',
    'settings' => 'movie_theatre_scroll_top_shape',
    'type'     => 'radio',
    'choices'  => array(
        'box'        => __( 'Box', 'movie-theatre' ),
        'curved-box' => __( 'Curved Box', 'movie-theatre' ),
        'circle'     => __( 'Circle', 'movie-theatre' ),
    ),
) );