<?php

function movie_theatre_sanitize_select( $movie_theatre_input, $movie_theatre_setting ) {
	$movie_theatre_input = sanitize_key( $movie_theatre_input );
	$movie_theatre_choices = $movie_theatre_setting->manager->get_control( $movie_theatre_setting->id )->choices;
	return ( array_key_exists( $movie_theatre_input, $movie_theatre_choices ) ? $movie_theatre_input : $movie_theatre_setting->default );
}

function movie_theatre_sanitize_switch( $movie_theatre_input ) {
	if ( true === $movie_theatre_input ) {
		return true;
	} else {
		return false;
	}
}

function movie_theatre_sanitize_google_fonts( $movie_theatre_input, $movie_theatre_setting ) {
	$movie_theatre_choices = $movie_theatre_setting->manager->get_control( $movie_theatre_setting->id )->choices;
	return ( array_key_exists( $movie_theatre_input, $movie_theatre_choices ) ? $movie_theatre_input : $movie_theatre_setting->default );
}

/**
 * Sanitize URL input.
 *
 * @param string $movie_theatre_input URL input to sanitize.
 * @return string Sanitized URL.
 */
function movie_theatre_sanitize_url( $movie_theatre_input ) {
    return esc_url_raw( $movie_theatre_input );
}

// Sanitize Scroll Top Position
function movie_theatre_sanitize_scroll_top_position( $movie_theatre_input ) {
    $movie_theatre_valid_positions = array( 'bottom-right', 'bottom-left', 'bottom-center' );
    if ( in_array( $movie_theatre_input, $movie_theatre_valid_positions ) ) {
        return $movie_theatre_input;
    } else {
        return 'bottom-right'; // Default to bottom-right if invalid value
    }
}

function movie_theatre_sanitize_image( $movie_theatre_image, $movie_theatre_setting ) {
	/*
	* Array of valid image file types.
	*
	* The array includes image mime types that are included in wp_get_mime_types()
	*/
	$mimes = array(
		'jpg|jpeg|jpe' => 'image/jpeg',
		'gif'          => 'image/gif',
		'png'          => 'image/png',
		'bmp'          => 'image/bmp',
		'tif|tiff'     => 'image/tiff',
		'ico'          => 'image/x-icon',
		'svg'          => 'image/svg+xml',
	);
	// Return an array with file extension and mime_type.
	$movie_theatre_file = wp_check_filetype( $movie_theatre_image, $mimes );
	// If $movie_theatre_image has a valid mime_type, return it; otherwise, return the default.
	return ( $movie_theatre_file['ext'] ? $movie_theatre_image : $movie_theatre_setting->default );
}

function movie_theatre_sanitize_choices( $movie_theatre_input, $movie_theatre_setting ) {
    global $wp_customize; 
    $movie_theatre_control = $wp_customize->get_control( $movie_theatre_setting->id ); 
    if ( array_key_exists( $movie_theatre_input, $movie_theatre_control->choices ) ) {
        return $movie_theatre_input;
    } else {
        return $movie_theatre_setting->default;
    }
}

function movie_theatre_sanitize_range_value( $movie_theatre_number, $movie_theatre_setting ) {

	// Ensure input is an absolute integer.
	$movie_theatre_number = absint( $movie_theatre_number );

	// Get the input attributes associated with the setting.
	$movie_theatre_atts = $movie_theatre_setting->manager->get_control( $movie_theatre_setting->id )->input_attrs;

	// Get minimum number in the range.
	$movie_theatre_min = ( isset( $movie_theatre_atts['min'] ) ? $movie_theatre_atts['min'] : $movie_theatre_number );

	// Get maximum number in the range.
	$movie_theatre_max = ( isset( $movie_theatre_atts['max'] ) ? $movie_theatre_atts['max'] : $movie_theatre_number );

	// Get step.
	$movie_theatre_step = ( isset( $movie_theatre_atts['step'] ) ? $movie_theatre_atts['step'] : 1 );

	// If the number is within the valid range, return it; otherwise, return the default.
	return ( $movie_theatre_min <= $movie_theatre_number && $movie_theatre_number <= $movie_theatre_max && is_int( $movie_theatre_number / $movie_theatre_step ) ? $movie_theatre_number : $movie_theatre_setting->default );
}