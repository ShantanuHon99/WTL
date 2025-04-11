<?php

/**
 * Render homepage sections.
 */
function movie_theatre_homepage_sections() {
	$homepage_sections = array_keys( movie_theatre_get_homepage_sections() );

	foreach ( $homepage_sections as $movie_theatre_section ) {
		require get_template_directory() . '/sections/' . $movie_theatre_section . '.php';
	}
}