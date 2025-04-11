<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! movie_theatre_has_page_header() ) {
    return;
}

$movie_theatre_classes = array( 'page-header' );
$movie_theatre_style = movie_theatre_page_header_style();

if ( $movie_theatre_style ) {
    $movie_theatre_classes[] = $movie_theatre_style . '-page-header';
}

$movie_theatre_visibility = get_theme_mod( 'movie_theatre_page_header_visibility', 'all-devices' );

if ( 'hide-all-devices' === $movie_theatre_visibility ) {
    // Don't show the header at all
    return;
}

if ( 'hide-tablet' === $movie_theatre_visibility ) {
    $movie_theatre_classes[] = 'hide-on-tablet';
} elseif ( 'hide-mobile' === $movie_theatre_visibility ) {
    $movie_theatre_classes[] = 'hide-on-mobile';
} elseif ( 'hide-tablet-mobile' === $movie_theatre_visibility ) {
    $movie_theatre_classes[] = 'hide-on-tablet-mobile';
}

$movie_theatre_PAGE_TITLE_background_color = get_theme_mod('movie_theatre_page_title_background_color_setting', '');

// Get the toggle switch value
$movie_theatre_background_image_enabled = get_theme_mod('movie_theatre_page_header_style', true);

// Add background image to the header if enabled
$movie_theatre_background_image = get_theme_mod( 'movie_theatre_page_header_background_image', '' );
$movie_theatre_background_height = get_theme_mod( 'movie_theatre_page_header_image_height', '200' );
$movie_theatre_inline_style = '';

if ( $movie_theatre_background_image_enabled && ! empty( $movie_theatre_background_image ) ) {
    $movie_theatre_inline_style .= 'background-image: url(' . esc_url( $movie_theatre_background_image ) . '); ';
    $movie_theatre_inline_style .= 'height: ' . esc_attr( $movie_theatre_background_height ) . 'px; ';
    $movie_theatre_inline_style .= 'background-size: cover; ';
    $movie_theatre_inline_style .= 'background-position: center center; ';

    // Add the unique class if the background image is set
    $movie_theatre_classes[] = 'has-background-image';
}

$movie_theatre_classes = implode( ' ', $movie_theatre_classes );
$movie_theatre_heading = get_theme_mod( 'movie_theatre_page_header_heading_tag', 'h1' );
$movie_theatre_heading = apply_filters( 'movie_theatre_page_header_heading', $movie_theatre_heading );

?>

<?php do_action( 'movie_theatre_before_page_header' ); ?>

<header class="<?php echo esc_attr( $movie_theatre_classes ); ?>" style="<?php echo esc_attr( $movie_theatre_inline_style ); ?> background-color: <?php echo esc_attr($movie_theatre_PAGE_TITLE_background_color); ?>;">

    <?php do_action( 'movie_theatre_before_page_header_inner' ); ?>

    <div class="asterthemes-wrapper page-header-inner">

        <?php if ( movie_theatre_has_page_header() ) : ?>

            <<?php echo esc_attr( $movie_theatre_heading ); ?> class="page-header-title">
                <?php echo wp_kses_post( movie_theatre_get_page_title() ); ?>
            </<?php echo esc_attr( $movie_theatre_heading ); ?>>

        <?php endif; ?>

        <?php if ( function_exists( 'movie_theatre_breadcrumb' ) ) : ?>
            <?php movie_theatre_breadcrumb(); ?>
        <?php endif; ?>

    </div><!-- .page-header-inner -->

    <?php do_action( 'movie_theatre_after_page_header_inner' ); ?>

</header><!-- .page-header -->

<?php do_action( 'movie_theatre_after_page_header' ); ?>