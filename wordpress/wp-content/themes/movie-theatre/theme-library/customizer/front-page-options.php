<?php

/**
 * Front Page Options
 *
 * @package Movie Theatre
 */

$wp_customize->add_panel(
	'movie_theatre_front_page_options',
	array(
		'title'    => esc_html__( 'Front Page Options', 'movie-theatre' ),
		'priority' => 20,
	)
);

// Banner Section.
require get_template_directory() . '/theme-library/customizer/front-page-options/banner.php';

// Tranding Services Section.
require get_template_directory() . '/theme-library/customizer/front-page-options/services.php';