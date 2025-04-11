<?php

/**
 * Active Callbacks
 *
 * @package movie_theatre
 */

// Theme Options.
function movie_theatre_is_pagination_enabled( $movie_theatre_control ) {
	return ( $movie_theatre_control->manager->get_setting( 'movie_theatre_enable_pagination' )->value() );
}
function movie_theatre_is_breadcrumb_enabled( $movie_theatre_control ) {
	return ( $movie_theatre_control->manager->get_setting( 'movie_theatre_enable_breadcrumb' )->value() );
}
function movie_theatre_is_layout_enabled( $movie_theatre_control ) {
	return ( $movie_theatre_control->manager->get_setting( 'movie_theatre_website_layout' )->value() );
}
function movie_theatre_is_pagetitle_bcakground_image_enabled( $movie_theatre_control ) {
	return ( $movie_theatre_control->manager->get_setting( 'movie_theatre_page_header_style' )->value() );
}
function movie_theatre_is_preloader_style( $movie_theatre_control ) {
	return ( $movie_theatre_control->manager->get_setting( 'movie_theatre_enable_preloader' )->value() );
}

// Header Options.
function movie_theatre_is_topbar_enabled( $movie_theatre_control ) {
	return ( $movie_theatre_control->manager->get_Setting( 'movie_theatre_enable_topbar' )->value() );
}
// Banner Slider Section.
function movie_theatre_is_banner_slider_section_enabled( $movie_theatre_control ) {
	return ( $movie_theatre_control->manager->get_setting( 'movie_theatre_enable_banner_section' )->value() );
}
function movie_theatre_is_banner_slider_section_and_content_type_post_enabled( $movie_theatre_control ) {
	$movie_theatre_content_type = $movie_theatre_control->manager->get_setting( 'movie_theatre_banner_slider_content_type' )->value();
	return ( movie_theatre_is_banner_slider_section_enabled( $movie_theatre_control ) && ( 'post' === $movie_theatre_content_type ) );
}
function movie_theatre_is_banner_slider_section_and_content_type_page_enabled( $movie_theatre_control ) {
	$movie_theatre_content_type = $movie_theatre_control->manager->get_setting( 'movie_theatre_banner_slider_content_type' )->value();
	return ( movie_theatre_is_banner_slider_section_enabled( $movie_theatre_control ) && ( 'page' === $movie_theatre_content_type ) );
}
//Services Section.
function movie_theatre_is_service_section_enabled( $movie_theatre_control ) {
	return ( $movie_theatre_control->manager->get_setting( 'movie_theatre_enable_service_section' )->value() );
}
function movie_theatre_is_service_section_and_content_type_post_enabled( $movie_theatre_control ) {
	$movie_theatre_content_type = $movie_theatre_control->manager->get_setting( 'movie_theatre_service_content_type' )->value();
	return ( movie_theatre_is_service_section_enabled( $movie_theatre_control ) && ( 'post' === $movie_theatre_content_type ) );
}
function movie_theatre_is_service_section_and_content_type_page_enabled( $movie_theatre_control ) {
	$movie_theatre_content_type = $movie_theatre_control->manager->get_setting( 'movie_theatre_service_content_type' )->value();
	return ( movie_theatre_is_service_section_enabled( $movie_theatre_control ) && ( 'page' === $movie_theatre_content_type ) );
}