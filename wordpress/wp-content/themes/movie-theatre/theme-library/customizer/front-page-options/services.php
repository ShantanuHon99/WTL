<?php

/**
 * Services Section
 *
 * @package movie_theatre
 */

$wp_customize->add_section(
	'movie_theatre_services_section',
	array(
		'panel'    => 'movie_theatre_front_page_options',
		'title'    => esc_html__( 'Services Section', 'movie-theatre' ),
		'priority' => 10,
	)
);

// Services Section - Enable Section.
$wp_customize->add_setting(
	'movie_theatre_enable_service_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'movie_theatre_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Movie_Theatre_Toggle_Switch_Custom_Control(
		$wp_customize,
		'movie_theatre_enable_service_section',
		array(
			'label'    => esc_html__( 'Enable Services Section', 'movie-theatre' ),
			'section'  => 'movie_theatre_services_section',
			'settings' => 'movie_theatre_enable_service_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'movie_theatre_enable_service_section',
		array(
			'selector' => '#movie_theatre_service_section .section-link',
			'settings' => 'movie_theatre_enable_service_section',
		)
	);
}

// Services Section - Button Label.
$wp_customize->add_setting(
	'movie_theatre_trending_product_heading',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'movie_theatre_trending_product_heading',
	array(
		'label'           => esc_html__( 'Heading', 'movie-theatre' ),
		'section'         => 'movie_theatre_services_section',
		'settings'        => 'movie_theatre_trending_product_heading',
		'type'            => 'text',
		'active_callback' => 'movie_theatre_is_service_section_enabled',
	)
);

// Services Section - Button Label.
$wp_customize->add_setting(
	'movie_theatre_trending_product_content',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'movie_theatre_trending_product_content',
	array(
		'label'           => esc_html__( 'Content', 'movie-theatre' ),
		'section'         => 'movie_theatre_services_section',
		'settings'        => 'movie_theatre_trending_product_content',
		'type'            => 'text',
		'active_callback' => 'movie_theatre_is_service_section_enabled',
	)
);

// Services Section - Content Type.
$wp_customize->add_setting(
	'movie_theatre_service_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'movie_theatre_sanitize_select',
	)
);

$wp_customize->add_control(
	'movie_theatre_service_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'movie-theatre' ),
		'section'         => 'movie_theatre_services_section',
		'settings'        => 'movie_theatre_service_content_type',
		'type'            => 'select',
		'active_callback' => 'movie_theatre_is_service_section_enabled',
		'choices'         => array(
			'page' => esc_html__( 'Page', 'movie-theatre' ),
			'post' => esc_html__( 'Post', 'movie-theatre' ),
		),
	)
);

// Services Category Setting.
$wp_customize->add_setting('movie_theatre_services_category', array(
	'default'           => 'services',
	'sanitize_callback' => 'sanitize_text_field',
));

// Add custom control for Services Category with conditional visibility.
$wp_customize->add_control(new Movie_Theatre_Customize_Category_Dropdown_Control($wp_customize, 'movie_theatre_services_category', array(
	'label'    => __('Select Services Category', 'movie-theatre'),
	'section'  => 'movie_theatre_service_section',
	'settings' => 'movie_theatre_services_category',
	'active_callback' => function() use ($wp_customize) {
		return $wp_customize->get_setting('movie_theatre_service_content_type')->value() === 'post';
	},
)));


for ( $movie_theatre_i = 1; $movie_theatre_i <= 4; $movie_theatre_i++ ) {

	// Services Section - Select Post.
	$wp_customize->add_setting(
		'movie_theatre_service_content_post_' . $movie_theatre_i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'movie_theatre_service_content_post_' . $movie_theatre_i,
		array(
			'label'           => esc_html__( 'Select Post ', 'movie-theatre' ) . $movie_theatre_i,
			'section'         => 'movie_theatre_services_section',
			'settings'        => 'movie_theatre_service_content_post_' . $movie_theatre_i,
			'active_callback' => 'movie_theatre_is_service_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => movie_theatre_get_post_choices(),
		)
	);

	// Services Section - Select Page.
	$wp_customize->add_setting(
		'movie_theatre_service_content_page_' . $movie_theatre_i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'movie_theatre_service_content_page_' . $movie_theatre_i,
		array(
			'label'           => esc_html__( 'Select Page ', 'movie-theatre' ) . $movie_theatre_i,
			'section'         => 'movie_theatre_services_section',
			'settings'        => 'movie_theatre_service_content_page_' . $movie_theatre_i,
			'active_callback' => 'movie_theatre_is_service_section_and_content_type_page_enabled',
			'type'            => 'select',
			'choices'         => movie_theatre_get_page_choices(),
		)
	);
}
