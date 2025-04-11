<?php

/**
 * WooCommerce Settings
 *
 * @package movie_theatre
 */

$wp_customize->add_section(
	'movie_theatre_woocommerce_settings',
	array(
		'panel' => 'movie_theatre_theme_options',
		'title' => esc_html__( 'WooCommerce Settings', 'movie-theatre' ),
	)
);

//WooCommerce - Products per page.
$wp_customize->add_setting( 'movie_theatre_products_per_page', array(
    'default'           => 9,
    'sanitize_callback' => 'absint',
));

$wp_customize->add_control( 'movie_theatre_products_per_page', array(
    'type'        => 'number',
    'section'     => 'movie_theatre_woocommerce_settings',
    'label'       => __( 'Products Per Page', 'movie-theatre' ),
    'input_attrs' => array(
        'min'  => 0,
        'max'  => 50,
        'step' => 1,
    ),
));

//WooCommerce - Products per row.
$wp_customize->add_setting( 'movie_theatre_products_per_row', array(
    'default'           => '3',
    'sanitize_callback' => 'movie_theatre_sanitize_choices',
) );

$wp_customize->add_control( 'movie_theatre_products_per_row', array(
    'label'    => __( 'Products Per Row', 'movie-theatre' ),
    'section'  => 'movie_theatre_woocommerce_settings',
    'settings' => 'movie_theatre_products_per_row',
    'type'     => 'select',
    'choices'  => array(
        '2' => '2',
		'3' => '3',
		'4' => '4',
    ),
) );

//WooCommerce - Show / Hide Related Product.
$wp_customize->add_setting(
	'movie_theatre_related_product_show_hide',
	array(
		'default'           => true,
		'sanitize_callback' => 'movie_theatre_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Movie_Theatre_Toggle_Switch_Custom_Control(
		$wp_customize,
		'movie_theatre_related_product_show_hide',
		array(
			'label'   => esc_html__( 'Show / Hide Related product', 'movie-theatre' ),
			'section' => 'movie_theatre_woocommerce_settings',
		)
	)
);

//WooCommerce - Product Sale Position.
$wp_customize->add_setting(
	'movie_theatre_product_sale_position', 
	array(
		'default' => 'left',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'movie_theatre_product_sale_position', 
	array(
		'label' => __('Product Sale Position', 'movie-theatre'),
		'section' => 'movie_theatre_woocommerce_settings',
		'settings' => 'movie_theatre_product_sale_position',
		'type' => 'radio',
		'choices' => 
	array(
		'left' => __('Left', 'movie-theatre'),
		'right' => __('Right', 'movie-theatre'),
	),
));