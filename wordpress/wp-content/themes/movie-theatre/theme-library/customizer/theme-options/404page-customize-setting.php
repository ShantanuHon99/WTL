<?php
/**
 * 404 page Customizer settings
 *
 * @package movie_theatre
 */

/*=========================================
404 Page Section
=========================================*/
$wp_customize->add_section(
    '404_pg_options', array(
        'title' => esc_html__('404 Page', 'movie-theatre'),
        'panel' => 'movie_theatre_theme_options',
    )
);

// Title
$wp_customize->add_setting(
    'movie_theatre_pg_404_ttl', array(
        'default'           => __('404 Page Not Found', 'movie-theatre'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    'movie_theatre_pg_404_ttl', array(
        'label'   => __('404 Page Title', 'movie-theatre'),
        'section' => '404_pg_options',
        'type'    => 'text',
    )
);

// Image
$wp_customize->add_setting(
    'movie_theatre_pg_404_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    )
);

$wp_customize->add_control(new WP_Customize_Image_Control(
    $wp_customize, 'movie_theatre_pg_404_image', array(
        'label'    => __('404 Page Image', 'movie-theatre'),
        'section'  => '404_pg_options',
        'settings' => 'movie_theatre_pg_404_image',
    )
));

// Text
$wp_customize->add_setting(
    'movie_theatre_pg_404_text', array(
        'default'           => __('Apologies, but the page you are seeking cannot be found.', 'movie-theatre'),
        'sanitize_callback' => 'sanitize_textarea_field',
    )
);

$wp_customize->add_control(
    'movie_theatre_pg_404_text', array(
        'label'    => __('404 Page Text', 'movie-theatre'),
        'section' => '404_pg_options',
        'settings' => 'movie_theatre_pg_404_text',
        'type'     => 'textarea',
    )
);

// Button Label
$wp_customize->add_setting(
    'movie_theatre_pg_404_btn_lbl', array(
        'default'           => __('Go Back Home', 'movie-theatre'),
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    'movie_theatre_pg_404_btn_lbl', array(
        'label'    => __('404 Button Label', 'movie-theatre'),
        'section' => '404_pg_options',
        'settings' => 'movie_theatre_pg_404_btn_lbl',
    )
);

// Button Link
$wp_customize->add_setting(
    'movie_theatre_pg_404_btn_link', array(
        'default'           => esc_url(home_url('/')),
        'sanitize_callback' => 'esc_url_raw',
    )
);

$wp_customize->add_control(
    'movie_theatre_pg_404_btn_link', array(
        'label'    => __('404 Button Link', 'movie-theatre'),
        'section' => '404_pg_options',
        'settings' => 'movie_theatre_pg_404_btn_link',
    )
);
?>
