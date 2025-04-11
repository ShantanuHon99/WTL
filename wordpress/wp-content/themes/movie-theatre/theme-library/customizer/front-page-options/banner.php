<?php

/**
 * Banner Section
 *
 * @package movie_theatre
 */

$wp_customize->add_section(
	'movie_theatre_banner_section',
	array(
		'panel'    => 'movie_theatre_front_page_options',
		'title'    => esc_html__( 'Banner Section', 'movie-theatre' ),
		'priority' => 10,
	)
);

// Banner Section - Enable Section.
$wp_customize->add_setting(
	'movie_theatre_enable_banner_section',
	array(
		'default'           => true,
		'sanitize_callback' => 'movie_theatre_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Movie_Theatre_Toggle_Switch_Custom_Control(
		$wp_customize,
		'movie_theatre_enable_banner_section',
		array(
			'label'    => esc_html__( 'Enable Banner Section', 'movie-theatre' ),
			'section'  => 'movie_theatre_banner_section',
			'settings' => 'movie_theatre_enable_banner_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'movie_theatre_enable_banner_section',
		array(
			'selector' => '#movie_theatre_banner_section .section-link',
			'settings' => 'movie_theatre_enable_banner_section',
		)
	);
}


// Banner Section - Banner Slider Content Type.
$wp_customize->add_setting(
	'movie_theatre_banner_slider_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'movie_theatre_sanitize_select',
	)
);

$wp_customize->add_control(
	'movie_theatre_banner_slider_content_type',
	array(
		'label'           => esc_html__( 'Select Banner Slider Content Type', 'movie-theatre' ),
		'section'         => 'movie_theatre_banner_section',
		'settings'        => 'movie_theatre_banner_slider_content_type',
		'type'            => 'select',
		'active_callback' => 'movie_theatre_is_banner_slider_section_enabled',
		'choices'         => array(
			'page' => esc_html__( 'Page', 'movie-theatre' ),
			'post' => esc_html__( 'Post', 'movie-theatre' ),
		),
	)
);

// Banner Slider Category Setting.
$wp_customize->add_setting('movie_theatre_banner_slider_category', array(
	'default'           => 'slider',
	'sanitize_callback' => 'sanitize_text_field',
));

// Add custom control for Banner Slider Category with conditional visibility.
$wp_customize->add_control(new Movie_Theatre_Customize_Category_Dropdown_Control($wp_customize, 'movie_theatre_banner_slider_category', array(
	'label'    => __('Select Banner Slider Category', 'movie-theatre'),
	'section'  => 'movie_theatre_banner_section',
	'settings' => 'movie_theatre_banner_slider_category',
	'active_callback' => function() use ($wp_customize) {
		return $wp_customize->get_setting('movie_theatre_banner_slider_content_type')->value() === 'post';
	},
)));

for ( $movie_theatre_i = 1; $movie_theatre_i <= 3; $movie_theatre_i++ ) {

	// Banner Section - Select Banner Post.
	$wp_customize->add_setting(
		'movie_theatre_banner_slider_content_post_' . $movie_theatre_i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'movie_theatre_banner_slider_content_post_' . $movie_theatre_i,
		array(
			/* translators: %d: Post Count. */
			'label'           => sprintf( esc_html__( 'Select Post %d', 'movie-theatre' ), $movie_theatre_i ),
			'description'     => sprintf( esc_html__( 'Kindly :- Select a Post based on the category selected in the upper settings', 'movie-theatre' ), $movie_theatre_i ),
			'section'         => 'movie_theatre_banner_section',
			'settings'        => 'movie_theatre_banner_slider_content_post_' . $movie_theatre_i,
			'active_callback' => 'movie_theatre_is_banner_slider_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => movie_theatre_get_post_choices(),
		)
	);

	// Banner Section - Select Banner Page.
	$wp_customize->add_setting(
		'movie_theatre_banner_slider_content_page_' . $movie_theatre_i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'movie_theatre_banner_slider_content_page_' . $movie_theatre_i,
		array(
			/* translators: %d: Page Count. */
			'label'           => sprintf( esc_html__( 'Select Page %d', 'movie-theatre' ), $movie_theatre_i ),
			'section'         => 'movie_theatre_banner_section',
			'settings'        => 'movie_theatre_banner_slider_content_page_' . $movie_theatre_i,
			'active_callback' => 'movie_theatre_is_banner_slider_section_and_content_type_page_enabled',
			'type'            => 'select',
			'choices'         => movie_theatre_get_page_choices(),
		)
	);

	// Banner Section - Short Label.
	$wp_customize->add_setting(
		'movie_theatre_banner_short_heading' . $movie_theatre_i,
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'movie_theatre_banner_short_heading' . $movie_theatre_i,
		array(
			'label'           => esc_html__( 'Banner Extra Heading', 'movie-theatre' ),
			'section'         => 'movie_theatre_banner_section',
			'settings'        => 'movie_theatre_banner_short_heading' . $movie_theatre_i,
			'active_callback' => 'movie_theatre_is_banner_slider_section_enabled',
			'type'            => 'text',
		)
	);

	// Banner Section - Button Label.
	$wp_customize->add_setting(
		'movie_theatre_banner_button_label_' . $movie_theatre_i,
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'movie_theatre_banner_button_label_' . $movie_theatre_i,
		array(
			/* translators: %d: Button Label Count. */
			'label'           => sprintf( esc_html__( 'Button Label %d', 'movie-theatre' ), $movie_theatre_i ),
			'section'         => 'movie_theatre_banner_section',
			'settings'        => 'movie_theatre_banner_button_label_' . $movie_theatre_i,
			'type'            => 'text',
			'active_callback' => 'movie_theatre_is_banner_slider_section_enabled',
		)
	);

	// Banner Section - Button Link.
	$wp_customize->add_setting(
		'movie_theatre_banner_button_link_' . $movie_theatre_i,
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'movie_theatre_banner_button_link_' . $movie_theatre_i,
		array(
			/* translators: %d: Button Link Count. */
			'label'           => sprintf( esc_html__( 'Button Link %d', 'movie-theatre' ), $movie_theatre_i ),
			'section'         => 'movie_theatre_banner_section',
			'settings'        => 'movie_theatre_banner_button_link_' . $movie_theatre_i,
			'type'            => 'url',
			'active_callback' => 'movie_theatre_is_banner_slider_section_enabled',
		)
	);
}