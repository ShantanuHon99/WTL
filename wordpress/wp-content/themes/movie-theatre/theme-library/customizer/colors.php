<?php

/**
 * Color Option
 *
 * @package movie_theatre
 */

// Primary Color.
    // Add setting for primary color
    $wp_customize->add_setting(
        'primary_color',
        array(
            'default'           => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    // Add control for primary color
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'primary_color',
            array(
                'label'    => __( 'Primary Color', 'movie-theatre' ),
                'section'  => 'colors',
                'settings' => 'primary_color',
                'priority' => 5,
            )
        )
    );

    // Add setting for primary color
    $wp_customize->add_setting(
        'movie_theatre_secondary_color',
        array(
            'default'           => '#D20000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    // Add control for primary color
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'movie_theatre_secondary_color',
            array(
                'label'    => __( 'Primary Color', 'movie-theatre' ),
                'section'  => 'colors',
                'settings' => 'movie_theatre_secondary_color',
                'priority' => 5,
            )
        )
    );