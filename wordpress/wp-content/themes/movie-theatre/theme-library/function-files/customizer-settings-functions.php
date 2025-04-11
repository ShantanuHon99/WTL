<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package movie_theatre
 */

 function movie_theatre_customize_css() {
    ?>
    <style type="text/css">
        :root {
            --primary-color: <?php echo esc_html( get_theme_mod( 'primary_color', '#000000' ) ); ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'movie_theatre_customize_css' );

function movie_theatre_customize_csss() {
    ?>
    <style type="text/css">
        :root {
            --secondary-color: <?php echo esc_html( get_theme_mod( 'movie_theatre_secondary_color', '#D20000' ) ); ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'movie_theatre_customize_csss' );

// Retrieve the slider visibility setting
$movie_theatre_slider = get_theme_mod('movie_theatre_enable_banner_section', false);

// Function to output custom CSS directly in the head section
function movie_theatre_custom_css() {
    global $movie_theatre_slider;
    if ($movie_theatre_slider == false) {
        echo '<style type="text/css">
            .home header.site-header {
                position: static;
                background: #000000;
            }
        </style>';
    }
}

// Hook the function into the wp_head action
add_action('wp_head', 'movie_theatre_custom_css');

function movie_theatre_enqueue_selected_fonts() {
    $movie_theatre_fonts_url = movie_theatre_get_fonts_url();
    if (!empty($movie_theatre_fonts_url)) {
        wp_enqueue_style('movie-theatre-google-fonts', $movie_theatre_fonts_url, array(), null);
    }
}
add_action('wp_enqueue_scripts', 'movie_theatre_enqueue_selected_fonts');

function movie_theatre_layout_customizer_css() {
    $movie_theatre_margin = get_theme_mod('movie_theatre_layout_width_margin', 50);
    ?>
    <style type="text/css">
        body.site-boxed--layout #page  {
            margin: 0 <?php echo esc_attr($movie_theatre_margin); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'movie_theatre_layout_customizer_css');

function movie_theatre_blog_layout_customizer_css() {
    // Retrieve the blog layout option
    $movie_theatre_blog_layout_option = get_theme_mod('movie_theatre_blog_layout_option_setting', 'Left');

    // Initialize custom CSS variable
    $movie_theatre_custom_css = '';

    // Generate custom CSS based on the layout option
    if ($movie_theatre_blog_layout_option === 'Default') {
        $movie_theatre_custom_css .= '.mag-post-detail { text-align: center; }';
    } elseif ($movie_theatre_blog_layout_option === 'Left') {
        $movie_theatre_custom_css .= '.mag-post-detail { text-align: left; }';
    } elseif ($movie_theatre_blog_layout_option === 'Right') {
        $movie_theatre_custom_css .= '.mag-post-detail { text-align: right; }';
    }

    // Output the combined CSS
    ?>
    <style type="text/css">
        <?php echo wp_kses($movie_theatre_custom_css, array( 'style' => array(), 'text-align' => array() )); ?>
    </style>
    <?php
}
add_action('wp_head', 'movie_theatre_blog_layout_customizer_css');

function movie_theatre_sidebar_width_customizer_css() {
    $movie_theatre_sidebar_width = get_theme_mod('movie_theatre_sidebar_width', '30');
    ?>
    <style type="text/css">
        .right-sidebar .asterthemes-wrapper .asterthemes-page {
            grid-template-columns: auto <?php echo esc_attr($movie_theatre_sidebar_width); ?>%;
        }
        .left-sidebar .asterthemes-wrapper .asterthemes-page {
            grid-template-columns: <?php echo esc_attr($movie_theatre_sidebar_width); ?>% auto;
        }
    </style>
    <?php
}
add_action('wp_head', 'movie_theatre_sidebar_width_customizer_css');

if ( ! function_exists( 'movie_theatre_get_page_title' ) ) {
    function movie_theatre_get_page_title() {
        $movie_theatre_title = '';

        if (is_404()) {
            $movie_theatre_title = esc_html__('Page Not Found', 'movie-theatre');
        } elseif (is_search()) {
            $movie_theatre_title = esc_html__('Search Results for: ', 'movie-theatre') . esc_html(get_search_query());
        } elseif (is_home() && !is_front_page()) {
            $movie_theatre_title = esc_html__('Blogs', 'movie-theatre');
        } elseif (function_exists('is_shop') && is_shop()) {
            $movie_theatre_title = esc_html__('Shop', 'movie-theatre');
        } elseif (is_page()) {
            $movie_theatre_title = get_the_title();
        } elseif (is_single()) {
            $movie_theatre_title = get_the_title();
        } elseif (is_archive()) {
            $movie_theatre_title = get_the_archive_title();
        } else {
            $movie_theatre_title = get_the_archive_title();
        }

        return apply_filters('movie_theatre_page_title', $movie_theatre_title);
    }
}

if ( ! function_exists( 'movie_theatre_has_page_header' ) ) {
    function movie_theatre_has_page_header() {
        // Default to true (display header)
        $movie_theatre_return = true;

        // Custom conditions for disabling the header
        if ('hide-all-devices' === get_theme_mod('movie_theatre_page_header_visibility', 'all-devices')) {
            $movie_theatre_return = false;
        }

        // Apply filters and return
        return apply_filters('movie_theatre_display_page_header', $movie_theatre_return);
    }
}

if ( ! function_exists( 'movie_theatre_page_header_style' ) ) {
    function movie_theatre_page_header_style() {
        $movie_theatre_style = get_theme_mod('movie_theatre_page_header_style', 'default');
        return apply_filters('movie_theatre_page_header_style', $movie_theatre_style);
    }
}

function movie_theatre_page_title_customizer_css() {
    $movie_theatre_layout_option = get_theme_mod('movie_theatre_page_header_layout', 'left');
    ?>
    <style type="text/css">
        .asterthemes-wrapper.page-header-inner {
            <?php if ($movie_theatre_layout_option === 'flex') : ?>
                display: flex;
                justify-content: space-between;
                align-items: center;
            <?php else : ?>
                text-align: <?php echo esc_attr($movie_theatre_layout_option); ?>;
            <?php endif; ?>
        }
    </style>
    <?php
}
add_action('wp_head', 'movie_theatre_page_title_customizer_css');

function movie_theatre_pagetitle_height_css() {
    $movie_theatre_height = get_theme_mod('movie_theatre_pagetitle_height', 50);
    ?>
    <style type="text/css">
        header.page-header {
            padding: <?php echo esc_attr($movie_theatre_height); ?>px 0;
        }
    </style>
    <?php
}
add_action('wp_head', 'movie_theatre_pagetitle_height_css');

function movie_theatre_site_logo_width() {
    $movie_theatre_site_logo_width = get_theme_mod('movie_theatre_site_logo_width', 200);
    ?>
    <style type="text/css">
        .site-logo img {
            max-width: <?php echo esc_attr($movie_theatre_site_logo_width); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'movie_theatre_site_logo_width');

function movie_theatre_menu_font_size_css() {
    $movie_theatre_menu_font_size = get_theme_mod('movie_theatre_menu_font_size', 16);
    ?>
    <style type="text/css">
        .main-navigation a {
            font-size: <?php echo esc_attr($movie_theatre_menu_font_size); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'movie_theatre_menu_font_size_css');

function movie_theatre_sidebar_widget_font_size_css() {
    $movie_theatre_sidebar_widget_font_size = get_theme_mod('movie_theatre_sidebar_widget_font_size', 21);
    ?>
    <style type="text/css">
        h2.wp-block-heading,aside#secondary .widgettitle,aside#secondary .widget-title {
            font-size: <?php echo esc_attr($movie_theatre_sidebar_widget_font_size); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'movie_theatre_sidebar_widget_font_size_css');

// Woocommerce Related Products Settings
function movie_theatre_related_product_css() {
    $movie_theatre_related_product_show_hide = get_theme_mod('movie_theatre_related_product_show_hide', true);

    if ( $movie_theatre_related_product_show_hide != true) {
        ?>
        <style type="text/css">
            .related.products {
                display: none;
            }
        </style>
        <?php
    }
}
add_action('wp_head', 'movie_theatre_related_product_css');

// Woocommerce Product Sale Position 
function movie_theatre_product_sale_position_customizer_css() {
    $movie_theatre_layout_option = get_theme_mod('movie_theatre_product_sale_position', 'left');
    ?>
    <style type="text/css">
        .woocommerce ul.products li.product .onsale{
            <?php if ($movie_theatre_layout_option === 'left') : ?>
                right: auto;
                left: 0px;
            <?php else : ?>
                left: auto;
                right: 0px;
            <?php endif; ?>
        }
    </style>
    <?php
}
add_action('wp_head', 'movie_theatre_product_sale_position_customizer_css');  

// Featured Image Dimension
function movie_theatre_custom_featured_image_css() {
    $movie_theatre_dimension = get_theme_mod('movie_theatre_blog_post_featured_image_dimension', 'default');
    $movie_theatre_width = get_theme_mod('movie_theatre_blog_post_featured_image_custom_width', '');
    $movie_theatre_height = get_theme_mod('movie_theatre_blog_post_featured_image_custom_height', '');
    
    if ($movie_theatre_dimension === 'custom' && $movie_theatre_width && $movie_theatre_height) {
        $movie_theatre_custom_css = "body:not(.single-post) .mag-post-single .mag-post-img img { width: {$movie_theatre_width}px !important; height: {$movie_theatre_height}px !important; }";
        wp_add_inline_style('movie-theatre-style', $movie_theatre_custom_css);
    }
}
add_action('wp_enqueue_scripts', 'movie_theatre_custom_featured_image_css');

//Copyright Alignment
function movie_theatre_footer_copyright_alignment_css() {
    $movie_theatre_footer_bottom_align = get_theme_mod( 'movie_theatre_footer_bottom_align', 'center' );   
    ?>
    <style type="text/css">
        .site-footer .site-footer-bottom .site-footer-bottom-wrapper {
            justify-content: <?php echo esc_attr( $movie_theatre_footer_bottom_align ); ?> 
        }

        /* Mobile Specific */
        @media screen and (max-width: 575px) {
            .site-footer .site-footer-bottom .site-footer-bottom-wrapper {
                justify-content: center;
                text-align:center;
            }
        }
    </style>
    <?php
}
add_action( 'wp_head', 'movie_theatre_footer_copyright_alignment_css' );