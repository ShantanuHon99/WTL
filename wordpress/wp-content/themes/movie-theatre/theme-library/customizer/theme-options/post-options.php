<?php

/**
 * Post Options
 *
 * @package movie_theatre
 */

$wp_customize->add_section(
	'movie_theatre_post_options',
	array(
		'title' => esc_html__( 'Post Options', 'movie-theatre' ),
		'panel' => 'movie_theatre_theme_options',
	)
);

// Post Options - Show / Hide Feature Image.
$wp_customize->add_setting(
	'movie_theatre_post_hide_feature_image',
	array(
		'default'           => true,
		'sanitize_callback' => 'movie_theatre_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Movie_Theatre_Toggle_Switch_Custom_Control(
		$wp_customize,
		'movie_theatre_post_hide_feature_image',
		array(
			'label'   => esc_html__( 'Show / Hide Featured Image', 'movie-theatre' ),
			'section' => 'movie_theatre_post_options',
		)
	)
);

// Post Options - Show / Hide Post Heading.
$wp_customize->add_setting(
	'movie_theatre_post_hide_post_heading',
	array(
		'default'           => true,
		'sanitize_callback' => 'movie_theatre_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Movie_Theatre_Toggle_Switch_Custom_Control(
		$wp_customize,
		'movie_theatre_post_hide_post_heading',
		array(
			'label'   => esc_html__( 'Show / Hide Post Heading', 'movie-theatre' ),
			'section' => 'movie_theatre_post_options',
		)
	)
);

// Post Options - Show / Hide Post Content.
$wp_customize->add_setting(
	'movie_theatre_post_hide_post_content',
	array(
		'default'           => true,
		'sanitize_callback' => 'movie_theatre_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Movie_Theatre_Toggle_Switch_Custom_Control(
		$wp_customize,
		'movie_theatre_post_hide_post_content',
		array(
			'label'   => esc_html__( 'Show / Hide Post Content', 'movie-theatre' ),
			'section' => 'movie_theatre_post_options',
		)
	)
);

// Post Options - Show / Hide Date.
$wp_customize->add_setting(
	'movie_theatre_post_hide_date',
	array(
		'default'           => true,
		'sanitize_callback' => 'movie_theatre_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Movie_Theatre_Toggle_Switch_Custom_Control(
		$wp_customize,
		'movie_theatre_post_hide_date',
		array(
			'label'   => esc_html__( 'Show / Hide Date', 'movie-theatre' ),
			'section' => 'movie_theatre_post_options',
		)
	)
);

// Post Options - Show / Hide Author.
$wp_customize->add_setting(
	'movie_theatre_post_hide_author',
	array(
		'default'           => true,
		'sanitize_callback' => 'movie_theatre_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Movie_Theatre_Toggle_Switch_Custom_Control(
		$wp_customize,
		'movie_theatre_post_hide_author',
		array(
			'label'   => esc_html__( 'Show / Hide Author', 'movie-theatre' ),
			'section' => 'movie_theatre_post_options',
		)
	)
);

// Post Options - Show / Hide Comments.
$wp_customize->add_setting(
	'movie_theatre_post_hide_comments',
	array(
		'default'           => true,
		'sanitize_callback' => 'movie_theatre_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Movie_Theatre_Toggle_Switch_Custom_Control(
		$wp_customize,
		'movie_theatre_post_hide_comments',
		array(
			'label'   => esc_html__( 'Show / Hide Comments', 'movie-theatre' ),
			'section' => 'movie_theatre_post_options',
		)
	)
);

// Post Options - Show / Hide Time.
$wp_customize->add_setting(
	'movie_theatre_post_hide_time',
	array(
		'default'           => true,
		'sanitize_callback' => 'movie_theatre_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Movie_Theatre_Toggle_Switch_Custom_Control(
		$wp_customize,
		'movie_theatre_post_hide_time',
		array(
			'label'   => esc_html__( 'Show / Hide Time', 'movie-theatre' ),
			'section' => 'movie_theatre_post_options',
		)
	)
);

// Post Options - Show / Hide Category.
$wp_customize->add_setting(
	'movie_theatre_post_hide_category',
	array(
		'default'           => true,
		'sanitize_callback' => 'movie_theatre_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Movie_Theatre_Toggle_Switch_Custom_Control(
		$wp_customize,
		'movie_theatre_post_hide_category',
		array(
			'label'   => esc_html__( 'Show / Hide Category', 'movie-theatre' ),
			'section' => 'movie_theatre_post_options',
		)
	)
);


// ---------------------------------------- Post layout ----------------------------------------------------

// Add Separator Custom Control
$wp_customize->add_setting( 'movie_theatre_archive_layuout_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Movie_Theatre_Separator_Custom_Control( $wp_customize, 'movie_theatre_archive_layuout_separator', array(
	'label' => __( 'Archive/Blogs Layout Setting', 'movie-theatre' ),
	'section' => 'movie_theatre_post_options',
	'settings' => 'movie_theatre_archive_layuout_separator',
)));

// Archive Layout - Column Layout.
$wp_customize->add_setting(
	'movie_theatre_archive_column_layout',
	array(
		'default'           => 'column-1',
		'sanitize_callback' => 'movie_theatre_sanitize_select',
	)
);

$wp_customize->add_control(
	'movie_theatre_archive_column_layout',
	array(
		'label'   => esc_html__( 'Select Posts Layout', 'movie-theatre' ),
		'section' => 'movie_theatre_post_options',
		'type'    => 'select',
		'choices' => array(
			'column-1' => __( 'Column 1', 'movie-theatre' ),
			'column-2' => __( 'Column 2', 'movie-theatre' ),
			'column-3' => __( 'Column 3', 'movie-theatre' ),
		),
	)
);

$wp_customize->add_setting('movie_theatre_blog_layout_option_setting',array(
	'default' => 'Left',
	'sanitize_callback' => 'movie_theatre_sanitize_choices'
  ));
  $wp_customize->add_control(new Movie_Theatre_Image_Radio_Control($wp_customize, 'movie_theatre_blog_layout_option_setting', array(
	'type' => 'select',
	'label' => __('Blog Content Alignment','movie-theatre'),
	'section' => 'movie_theatre_post_options',
	'choices' => array(
		'Left' => esc_url(get_template_directory_uri()).'/resource/img/layout-2.png',
		'Default' => esc_url(get_template_directory_uri()).'/resource/img/layout-1.png',
		'Right' => esc_url(get_template_directory_uri()).'/resource/img/layout-3.png',
))));


// ---------------------------------------- Read More ----------------------------------------------------

// Add Separator Custom Control
$wp_customize->add_setting( 'movie_theatre_readmore_separators', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Movie_Theatre_Separator_Custom_Control( $wp_customize, 'movie_theatre_readmore_separators', array(
	'label' => __( 'Read More Button Settings', 'movie-theatre' ),
	'section' => 'movie_theatre_post_options',
	'settings' => 'movie_theatre_readmore_separators',
)));


// Post Options - Show / Hide Read More Button.
$wp_customize->add_setting(
	'movie_theatre_post_readmore_button',
	array(
		'default'           => true,
		'sanitize_callback' => 'movie_theatre_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Movie_Theatre_Toggle_Switch_Custom_Control(
		$wp_customize,
		'movie_theatre_post_readmore_button',
		array(
			'label'   => esc_html__( 'Show / Hide Read More Button', 'movie-theatre' ),
			'section' => 'movie_theatre_post_options',
		)
	)
);

$wp_customize->add_setting(
    'movie_theatre_readmore_btn_icon',
    array(
        'default' => 'fas fa-chevron-right', // Set default icon here
        'sanitize_callback' => 'sanitize_text_field',
        'capability' => 'edit_theme_options',
    )
);

$wp_customize->add_control(new Movie_Theatre_Icon_Control(
    $wp_customize, 
    'movie_theatre_readmore_btn_icon',
    array(
        'label'    => __('Read More Icon','movie-theatre'),
        'section'  => 'movie_theatre_post_options',
        'iconset'  => 'fa',
    )
));

$wp_customize->add_setting(
	'movie_theatre_readmore_button_text',
	array(
		'default'           => 'Read More',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'movie_theatre_readmore_button_text',
	array(
		'label'           => esc_html__( 'Read More Button Text', 'movie-theatre' ),
		'section'         => 'movie_theatre_post_options',
		'settings'        => 'movie_theatre_readmore_button_text',
		'type'            => 'text',
	)
);

// Featured Image Dimension
$wp_customize->add_setting(
	'movie_theatre_blog_post_featured_image_dimension',
	array(
		'default' => 'default',
		'sanitize_callback' => 'movie_theatre_sanitize_choices'
	)
);

$wp_customize->add_control(
	'movie_theatre_blog_post_featured_image_dimension', 
	array(
		'type' => 'select',
		'label' => __('Featured Image Dimension','movie-theatre'),
		'section' => 'movie_theatre_post_options',
		'choices' => array(
			'default' => __('Default','movie-theatre'),
			'custom' => __('Custom Image Size','movie-theatre'),
		),
		'description' => __('Note: If you select "Custom Image Size", you can set a custom width and height up to 950px.', 'movie-theatre')
	)
);
 
// Featured Image Custom Width
$wp_customize->add_setting(
	'movie_theatre_blog_post_featured_image_custom_width',
	array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	)
);

$wp_customize->add_control(
	'movie_theatre_blog_post_featured_image_custom_width',
	array(
		'label'	=> __('Featured Image Custom Width','movie-theatre'),
		'section'=> 'movie_theatre_post_options',
		'type'=> 'text',
		'input_attrs' => array(
			'placeholder' => __( '300', 'movie-theatre' ),
		),
		'active_callback' => 'movie_theatre_blog_post_featured_image_dimension'
	)
);

// Featured Image Custom Height
$wp_customize->add_setting(
	'movie_theatre_blog_post_featured_image_custom_height',
	array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	)
);

$wp_customize->add_control(
	'movie_theatre_blog_post_featured_image_custom_height',
	array(
		'label'	=> __('Featured Image Custom Height','movie-theatre'),
		'section'=> 'movie_theatre_post_options',
		'type'=> 'text',
		'input_attrs' => array(
			'placeholder' => __( '300', 'movie-theatre' ),
		),
		'active_callback' => 'movie_theatre_blog_post_featured_image_dimension'
	)
);