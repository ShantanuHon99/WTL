<?php

/**
 * Header Options
 *
 * @package movie_theatre
 */

// ---------------------------------------- GENERAL OPTIONBS ----------------------------------------------------


// ---------------------------------------- PRELOADER ----------------------------------------------------

$wp_customize->add_section(
	'movie_theatre_general_options',
	array(
		'panel' => 'movie_theatre_theme_options',
		'title' => esc_html__( 'General Options', 'movie-theatre' ),
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'movie_theatre_preloader_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Movie_Theatre_Separator_Custom_Control( $wp_customize, 'movie_theatre_preloader_separator', array(
	'label' => __( 'Enable / Disable Site Preloader Section', 'movie-theatre' ),
	'section' => 'movie_theatre_general_options',
	'settings' => 'movie_theatre_preloader_separator',
)));

// General Options - Enable Preloader.
$wp_customize->add_setting(
	'movie_theatre_enable_preloader',
	array(
		'sanitize_callback' => 'movie_theatre_sanitize_switch',
		'default'           => false,
	)
);

$wp_customize->add_control(
	new Movie_Theatre_Toggle_Switch_Custom_Control(
		$wp_customize,
		'movie_theatre_enable_preloader',
		array(
			'label'   => esc_html__( 'Enable Preloader', 'movie-theatre' ),
			'section' => 'movie_theatre_general_options',
		)
	)
);

// Preloader Style Setting
$wp_customize->add_setting(
    'movie_theatre_preloader_style',
    array(
        'default'           => 'style1',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    'movie_theatre_preloader_style',
    array(
        'type'     => 'select',
        'label'    => esc_html__('Select Preloader Styles', 'movie-theatre'),
		'active_callback' => 'movie_theatre_is_preloader_style',
        'section'  => 'movie_theatre_general_options',
        'choices'  => array(
            'style1' => esc_html__('Style 1', 'movie-theatre'),
            'style2' => esc_html__('Style 2', 'movie-theatre'),
            'style3' => esc_html__('Style 3', 'movie-theatre'),
        ),
    )
);


// ---------------------------------------- PAGINATION ----------------------------------------------------

// Add Separator Custom Control
$wp_customize->add_setting( 'movie_theatre_pagination_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Movie_Theatre_Separator_Custom_Control( $wp_customize, 'movie_theatre_pagination_separator', array(
	'label' => __( 'Enable / Disable Pagination Section', 'movie-theatre' ),
	'section' => 'movie_theatre_general_options',
	'settings' => 'movie_theatre_pagination_separator',
) ) );


// Pagination - Enable Pagination.
$wp_customize->add_setting(
	'movie_theatre_enable_pagination',
	array(
		'default'           => true,
		'sanitize_callback' => 'movie_theatre_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Movie_Theatre_Toggle_Switch_Custom_Control(
		$wp_customize,
		'movie_theatre_enable_pagination',
		array(
			'label'    => esc_html__( 'Enable Pagination', 'movie-theatre' ),
			'section'  => 'movie_theatre_general_options',
			'settings' => 'movie_theatre_enable_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Type.
$wp_customize->add_setting(
	'movie_theatre_pagination_type',
	array(
		'default'           => 'default',
		'sanitize_callback' => 'movie_theatre_sanitize_select',
	)
);

$wp_customize->add_control(
	'movie_theatre_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Type', 'movie-theatre' ),
		'section'         => 'movie_theatre_general_options',
		'settings'        => 'movie_theatre_pagination_type',
		'active_callback' => 'movie_theatre_is_pagination_enabled',
		'type'            => 'select',
		'choices'         => array(
			'default' => __( 'Default (Older/Newer)', 'movie-theatre' ),
			'numeric' => __( 'Numeric', 'movie-theatre' ),
		),
	)
);



// ---------------------------------------- BREADCRUMB ----------------------------------------------------


// Add Separator Custom Control
$wp_customize->add_setting( 'movie_theatre_breadcrumb_separators', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Movie_Theatre_Separator_Custom_Control( $wp_customize, 'movie_theatre_breadcrumb_separators', array(
	'label' => __( 'Enable / Disable Breadcrumb Section', 'movie-theatre' ),
	'section' => 'movie_theatre_general_options',
	'settings' => 'movie_theatre_breadcrumb_separators',
)));



// Breadcrumb - Enable Breadcrumb.
$wp_customize->add_setting(
	'movie_theatre_enable_breadcrumb',
	array(
		'sanitize_callback' => 'movie_theatre_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Movie_Theatre_Toggle_Switch_Custom_Control(
		$wp_customize,
		'movie_theatre_enable_breadcrumb',
		array(
			'label'   => esc_html__( 'Enable Breadcrumb', 'movie-theatre' ),
			'section' => 'movie_theatre_general_options',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'movie_theatre_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'movie_theatre_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'movie-theatre' ),
		'active_callback' => 'movie_theatre_is_breadcrumb_enabled',
		'section'         => 'movie_theatre_general_options',
	)
);



// ---------------------------------------- Website layout ----------------------------------------------------


// Add Separator Custom Control
$wp_customize->add_setting( 'movie_theatre_layuout_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Movie_Theatre_Separator_Custom_Control( $wp_customize, 'movie_theatre_layuout_separator', array(
	'label' => __( 'Website Layout Setting', 'movie-theatre' ),
	'section' => 'movie_theatre_general_options',
	'settings' => 'movie_theatre_layuout_separator',
)));


$wp_customize->add_setting(
	'movie_theatre_website_layout',
	array(
		'sanitize_callback' => 'movie_theatre_sanitize_switch',
		'default'           => false,
	)
);

$wp_customize->add_control(
	new Movie_Theatre_Toggle_Switch_Custom_Control(
		$wp_customize,
		'movie_theatre_website_layout',
		array(
			'label'   => esc_html__('Boxed Layout', 'movie-theatre'),
			'section' => 'movie_theatre_general_options',
		)
	)
);


$wp_customize->add_setting('movie_theatre_layout_width_margin', array(
	'default'           => 50,
	'sanitize_callback' => 'movie_theatre_sanitize_range_value',
));

$wp_customize->add_control(new Movie_Theatre_Customize_Range_Control($wp_customize, 'movie_theatre_layout_width_margin', array(
		'label'       => __('Set Width', 'movie-theatre'),
		'description' => __('Adjust the width around the website layout by moving the slider. Use this setting to customize the appearance of your site to fit your design preferences.', 'movie-theatre'),
		'section'     => 'movie_theatre_general_options',
		'settings'    => 'movie_theatre_layout_width_margin',
		'active_callback' => 'movie_theatre_is_layout_enabled',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 130,
			'step' => 1,
		),
)));




// ---------------------------------------- HEADER OPTIONS ----------------------------------------------------


// Header Options
$wp_customize->add_section(
	'movie_theatre_header_options',
	array(
		'panel' => 'movie_theatre_theme_options',
		'title' => esc_html__( 'Header Options', 'movie-theatre' ),
	)
);


// Add setting for sticky header
$wp_customize->add_setting(
	'movie_theatre_enable_sticky_header',
	array(
		'sanitize_callback' => 'movie_theatre_sanitize_switch',
		'default'           => false,
	)
);

// Add control for sticky header setting
$wp_customize->add_control(
	new Movie_Theatre_Toggle_Switch_Custom_Control(
		$wp_customize,
		'movie_theatre_enable_sticky_header',
		array(
			'label'   => esc_html__( 'Enable Sticky Header', 'movie-theatre' ),
			'section' => 'movie_theatre_header_options',
		)
	)
);

// Banner Section - Button Label.
$wp_customize->add_setting(
	'movie_theatre_header_button_label_',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'movie_theatre_header_button_label_',
	array(
		'label'           => esc_html__( 'Button Label', 'movie-theatre'  ),
		'section'         => 'movie_theatre_header_options',
		'settings'        => 'movie_theatre_header_button_label_',
		'type'            => 'text',
	)
);

// Banner Section - Button Link.
$wp_customize->add_setting(
	'movie_theatre_banner_button_link_',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'movie_theatre_banner_button_link_',
	array(
		'label'           => esc_html__( 'Button Link', 'movie-theatre' ),
		'section'         => 'movie_theatre_header_options',
		'settings'        => 'movie_theatre_banner_button_link_',
		'type'            => 'url',
	)
);


// Add Separator Custom Control
$wp_customize->add_setting( 'movie_theatre_menu_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Movie_Theatre_Separator_Custom_Control( $wp_customize, 'movie_theatre_menu_separator', array(
	'label' => __( 'Menu Settings', 'movie-theatre' ),
	'section' => 'movie_theatre_header_options',
	'settings' => 'movie_theatre_menu_separator',
)));

$wp_customize->add_setting( 'movie_theatre_menu_font_size', array(
    'default'           => 16,
    'sanitize_callback' => 'absint',
) );

// Add control for site title size
$wp_customize->add_control( 'movie_theatre_menu_font_size', array(
    'type'        => 'number',
    'section'     => 'movie_theatre_header_options',
    'label'       => __( 'Menu Font Size ', 'movie-theatre' ),
    'input_attrs' => array(
        'min'  => 10,
        'max'  => 100,
        'step' => 1,
    ),
));

$wp_customize->add_setting( 'movie_theatre_menu_text_transform', array(
    'default'           => 'capitalize', // Default value for text transform
    'sanitize_callback' => 'sanitize_text_field',
) );

// Add control for menu text transform
$wp_customize->add_control( 'movie_theatre_menu_text_transform', array(
    'type'     => 'select',
    'section'  => 'movie_theatre_header_options', 
    'label'    => __( 'Menu Text Transform', 'movie-theatre' ),
    'choices'  => array(
        'none'       => __( 'None', 'movie-theatre' ),
        'capitalize' => __( 'Capitalize', 'movie-theatre' ),
        'uppercase'  => __( 'Uppercase', 'movie-theatre' ),
        'lowercase'  => __( 'Lowercase', 'movie-theatre' ),
    ),
) );

// Menu Text Color 
$wp_customize->add_setting(
	'movie_theatre_menu_text_color', 
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 
		'movie_theatre_menu_text_color', 
		array(
			'label' => __('Menu Color', 'movie-theatre'),
			'section' => 'movie_theatre_header_options',
		)
	)
);

// Sub Menu Text Color 
$wp_customize->add_setting(
	'movie_theatre_sub_menu_text_color', 
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 
		'movie_theatre_sub_menu_text_color', 
		array(
			'label' => __('Sub Menu Color', 'movie-theatre'),
			'section' => 'movie_theatre_header_options',
		)
	)
);

// ----------------------------------------SITE IDENTITY----------------------------------------------------

// Site Logo - Enable Setting.
$wp_customize->add_setting(
	'movie_theatre_enable_site_logo',
	array(
		'default'           => true, // Default is to display the logo.
		'sanitize_callback' => 'movie_theatre_sanitize_switch', // Sanitize using a custom switch function.
	)
);

$wp_customize->add_control(
	new Movie_Theatre_Toggle_Switch_Custom_Control(
		$wp_customize,
		'movie_theatre_enable_site_logo',
		array(
			'label'    => esc_html__( 'Enable Site Logo', 'movie-theatre' ),
			'section'  => 'title_tagline', // Section to add this control.
			'settings' => 'movie_theatre_enable_site_logo',
		)
	)
);

// Site Title - Enable Setting.
$wp_customize->add_setting(
	'movie_theatre_enable_site_title_setting',
	array(
		'default'           => false,
		'sanitize_callback' => 'movie_theatre_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Movie_Theatre_Toggle_Switch_Custom_Control(
		$wp_customize,
		'movie_theatre_enable_site_title_setting',
		array(
			'label'    => esc_html__( 'Enable Site Title', 'movie-theatre' ),
			'section'  => 'title_tagline',
			'settings' => 'movie_theatre_enable_site_title_setting',
		)
	)
);
// Tagline - Enable Setting.
$wp_customize->add_setting(
	'movie_theatre_enable_tagline_setting',
	array(
		'default'           => false,
		'sanitize_callback' => 'movie_theatre_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Movie_Theatre_Toggle_Switch_Custom_Control(
		$wp_customize,
		'movie_theatre_enable_tagline_setting',
		array(
			'label'    => esc_html__( 'Enable Tagline', 'movie-theatre' ),
			'section'  => 'title_tagline',
			'settings' => 'movie_theatre_enable_tagline_setting',
		)
	)
);

$wp_customize->add_setting( 'movie_theatre_site_title_size', array(
    'default'           => 30, // Default font size in pixels
    'sanitize_callback' => 'absint', // Sanitize the input as a positive integer
) );

// Add control for site title size
$wp_customize->add_control( 'movie_theatre_site_title_size', array(
    'type'        => 'number',
    'section'     => 'title_tagline', // You can change this section to your preferred section
    'label'       => __( 'Site Title Font Size ', 'movie-theatre' ),
    'input_attrs' => array(
        'min'  => 10,
        'max'  => 100,
        'step' => 1,
    ),
) );

$wp_customize->add_setting('movie_theatre_site_logo_width', array(
    'default'           => 200,
    'sanitize_callback' => 'movie_theatre_sanitize_range_value',
));

$wp_customize->add_control(new Movie_Theatre_Customize_Range_Control($wp_customize, 'movie_theatre_site_logo_width', array(
    'label'       => __('Adjust Site Logo Width', 'movie-theatre'),
    'description' => __('This setting controls the Width of Site Logo', 'movie-theatre'),
    'section'     => 'title_tagline',
    'settings'    => 'movie_theatre_site_logo_width',
    'input_attrs' => array(
        'min'  => 0,
        'max'  => 400,
        'step' => 5,
    ),
)));