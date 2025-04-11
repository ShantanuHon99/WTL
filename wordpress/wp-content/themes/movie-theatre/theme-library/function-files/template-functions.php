<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package movie_theatre
 */

function movie_theatre_body_classes( $movie_theatre_classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$movie_theatre_classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$movie_theatre_classes[] = 'no-sidebar';
	}

	$movie_theatre_classes[] = movie_theatre_sidebar_layout();

	return $movie_theatre_classes;
}
add_filter( 'body_class', 'movie_theatre_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function movie_theatre_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'movie_theatre_pingback_header' );


/**
 * Get all posts for customizer Post content type.
 */
function movie_theatre_get_post_choices() {
	$movie_theatre_choices = array( '' => esc_html__( '--Select--', 'movie-theatre' ) );
	$movie_theatre_args    = array( 'numberposts' => -1 );
	$movie_theatre_posts   = get_posts( $movie_theatre_args );

	foreach ( $movie_theatre_posts as $movie_theatre_post ) {
		$movie_theatre_id             = $movie_theatre_post->ID;
		$movie_theatre_title          = $movie_theatre_post->post_title;
		$movie_theatre_choices[ $movie_theatre_id ] = $movie_theatre_title;
	}

	return $movie_theatre_choices;
}

/**
 * Get all pages for customizer Page content type.
 */
function movie_theatre_get_page_choices() {
	$movie_theatre_choices = array( '' => esc_html__( '--Select--', 'movie-theatre' ) );
	$movie_theatre_pages   = get_pages();

	foreach ( $movie_theatre_pages as $movie_theatre_page ) {
		$movie_theatre_choices[ $movie_theatre_page->ID ] = $movie_theatre_page->post_title;
	}

	return $movie_theatre_choices;
}

/**
 * Get all categories for customizer Category content type.
 */
function movie_theatre_get_post_cat_choices() {
	$movie_theatre_choices = array( '' => esc_html__( '--Select--', 'movie-theatre' ) );
	$movie_theatre_cats    = get_categories();

	foreach ( $movie_theatre_cats as $movie_theatre_cat ) {
		$movie_theatre_choices[ $movie_theatre_cat->term_id ] = $movie_theatre_cat->name;
	}

	return $movie_theatre_choices;
}

/**
 * Get all donation forms for customizer form content type.
 */
function movie_theatre_get_post_donation_form_choices() {
	$movie_theatre_choices = array( '' => esc_html__( '--Select--', 'movie-theatre' ) );
	$movie_theatre_posts   = get_posts(
		array(
			'post_type'   => 'give_forms',
			'numberposts' => -1,
		)
	);
	foreach ( $movie_theatre_posts as $movie_theatre_post ) {
		$movie_theatre_choices[ $movie_theatre_post->ID ] = $movie_theatre_post->post_title;
	}
	return $movie_theatre_choices;
}

if ( ! function_exists( 'movie_theatre_excerpt_length' ) ) :
	/**
	 * Excerpt length.
	 */
	function movie_theatre_excerpt_length( $movie_theatre_length ) {
		if ( is_admin() ) {
			return $movie_theatre_length;
		}

		return get_theme_mod( 'movie_theatre_excerpt_length', 20 );
	}
endif;
add_filter( 'excerpt_length', 'movie_theatre_excerpt_length', 999 );

if ( ! function_exists( 'movie_theatre_excerpt_more' ) ) :
	/**
	 * Excerpt more.
	 */
	function movie_theatre_excerpt_more( $movie_theatre_more ) {
		if ( is_admin() ) {
			return $movie_theatre_more;
		}

		return '&hellip;';
	}
endif;
add_filter( 'excerpt_more', 'movie_theatre_excerpt_more' );

if ( ! function_exists( 'movie_theatre_sidebar_layout' ) ) {
	/**
	 * Get sidebar layout.
	 */
	function movie_theatre_sidebar_layout() {
		$movie_theatre_sidebar_position      = get_theme_mod( 'movie_theatre_sidebar_position', 'right-sidebar' );
		$movie_theatre_sidebar_position_post = get_theme_mod( 'movie_theatre_post_sidebar_position', 'right-sidebar' );
		$movie_theatre_sidebar_position_page = get_theme_mod( 'movie_theatre_page_sidebar_position', 'right-sidebar' );

		if ( is_single() ) {
			$movie_theatre_sidebar_position = $movie_theatre_sidebar_position_post;
		} elseif ( is_page() ) {
			$movie_theatre_sidebar_position = $movie_theatre_sidebar_position_page;
		}

		return $movie_theatre_sidebar_position;
	}
}

if ( ! function_exists( 'movie_theatre_is_sidebar_enabled' ) ) {
	/**
	 * Check if sidebar is enabled.
	 */
	function movie_theatre_is_sidebar_enabled() {
		$movie_theatre_sidebar_position      = get_theme_mod( 'movie_theatre_sidebar_position', 'right-sidebar' );
		$movie_theatre_sidebar_position_post = get_theme_mod( 'movie_theatre_post_sidebar_position', 'right-sidebar' );
		$movie_theatre_sidebar_position_page = get_theme_mod( 'movie_theatre_page_sidebar_position', 'right-sidebar' );

		$movie_theatre_sidebar_enabled = true;
		if ( is_home() || is_archive() || is_search() ) {
			if ( 'no-sidebar' === $movie_theatre_sidebar_position ) {
				$movie_theatre_sidebar_enabled = false;
			}
		} elseif ( is_single() ) {
			if ( 'no-sidebar' === $movie_theatre_sidebar_position || 'no-sidebar' === $movie_theatre_sidebar_position_post ) {
				$movie_theatre_sidebar_enabled = false;
			}
		} elseif ( is_page() ) {
			if ( 'no-sidebar' === $movie_theatre_sidebar_position || 'no-sidebar' === $movie_theatre_sidebar_position_page ) {
				$movie_theatre_sidebar_enabled = false;
			}
		}
		return $movie_theatre_sidebar_enabled;
	}
}

if ( ! function_exists( 'movie_theatre_get_homepage_sections ' ) ) {
	/**
	 * Returns homepage sections.
	 */
	function movie_theatre_get_homepage_sections() {
		$movie_theatre_sections = array(
			'banner'  => esc_html__( 'Banner Section', 'movie-theatre' ),
			'services' => esc_html__( 'Services Section', 'movie-theatre' ),
		);
		return $movie_theatre_sections;
	}
}

/**
 * Renders customizer section link
 */
function movie_theatre_section_link( $movie_theatre_section_id ) {
	$movie_theatre_section_name      = str_replace( 'movie_theatre_', ' ', $movie_theatre_section_id );
	$movie_theatre_section_name      = str_replace( '_', ' ', $movie_theatre_section_name );
	$movie_theatre_starting_notation = '#';
	?>
	<span class="section-link">
		<span class="section-link-title"><?php echo esc_html( $movie_theatre_section_name ); ?></span>
	</span>
	<style type="text/css">
		<?php echo $movie_theatre_starting_notation . $movie_theatre_section_id; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>:hover .section-link {
			visibility: visible;
		}
	</style>
	<?php
}

/**
 * Adds customizer section link css
 */
function movie_theatre_section_link_css() {
	if ( is_customize_preview() ) {
		?>
		<style type="text/css">
			.section-link {
				visibility: hidden;
				background-color: black;
				position: relative;
				top: 80px;
				z-index: 99;
				left: 40px;
				color: #fff;
				text-align: center;
				font-size: 20px;
				border-radius: 10px;
				padding: 20px 10px;
				text-transform: capitalize;
			}

			.section-link-title {
				padding: 0 10px;
			}

			.banner-section {
				position: relative;
			}

			.banner-section .section-link {
				position: absolute;
				top: 100px;
			}
		</style>
		<?php
	}
}
add_action( 'wp_head', 'movie_theatre_section_link_css' );

/**
 * Breadcrumb.
 */
function movie_theatre_breadcrumb( $movie_theatre_args = array() ) {
	if ( ! get_theme_mod( 'movie_theatre_enable_breadcrumb', true ) ) {
		return;
	}

	$movie_theatre_args = array(
		'show_on_front' => false,
		'show_title'    => true,
		'show_browse'   => false,
	);
	breadcrumb_trail( $movie_theatre_args );
}
add_action( 'movie_theatre_breadcrumb', 'movie_theatre_breadcrumb', 10 );

/**
 * Add separator for breadcrumb trail.
 */
function movie_theatre_breadcrumb_trail_print_styles() {
	$movie_theatre_breadcrumb_separator = get_theme_mod( 'movie_theatre_breadcrumb_separator', '/' );

	$movie_theatre_style = '
		.trail-items li::after {
			content: "' . $movie_theatre_breadcrumb_separator . '";
		}'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	$movie_theatre_style = apply_filters( 'movie_theatre_breadcrumb_trail_inline_style', trim( str_replace( array( "\r", "\n", "\t", '  ' ), '', $movie_theatre_style ) ) );

	if ( $movie_theatre_style ) {
		echo "\n" . '<style type="text/css" id="breadcrumb-trail-css">' . $movie_theatre_style . '</style>' . "\n"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
add_action( 'wp_head', 'movie_theatre_breadcrumb_trail_print_styles' );

/**
 * Pagination for archive.
 */
function movie_theatre_render_posts_pagination() {
	$movie_theatre_is_pagination_enabled = get_theme_mod( 'movie_theatre_enable_pagination', true );
	if ( $movie_theatre_is_pagination_enabled ) {
		$movie_theatre_pagination_type = get_theme_mod( 'movie_theatre_pagination_type', 'default' );
		if ( 'default' === $movie_theatre_pagination_type ) :
			the_posts_navigation();
		else :
			the_posts_pagination();
		endif;
	}
}
add_action( 'movie_theatre_posts_pagination', 'movie_theatre_render_posts_pagination', 10 );

/**
 * Pagination for single post.
 */
function movie_theatre_render_post_navigation() {
	the_post_navigation(
		array(
			'prev_text' => '<span>&#10229;</span> <span class="nav-title">%title</span>',
			'next_text' => '<span class="nav-title">%title</span> <span>&#10230;</span>',
		)
	);
}
add_action( 'movie_theatre_post_navigation', 'movie_theatre_render_post_navigation' );

/**
 * Adds footer copyright text.
 */
function movie_theatre_output_footer_copyright_content() {
    $movie_theatre_theme_data = wp_get_theme();
    $movie_theatre_copyright_text = get_theme_mod('movie_theatre_footer_copyright_text');

    if (!empty($movie_theatre_copyright_text)) {
        $movie_theatre_text = $movie_theatre_copyright_text;
    } else {
        $movie_theatre_default_text = '<a href="'. esc_url(__('https://asterthemes.com/products/free-movie-wordpress-theme','movie-theatre')) . '" target="_blank"> ' . esc_html($movie_theatre_theme_data->get('Name')) . '</a>' . '&nbsp;' . esc_html__('by', 'movie-theatre') . '&nbsp;<a target="_blank" href="' . esc_url($movie_theatre_theme_data->get('AuthorURI')) . '">' . esc_html(ucwords($movie_theatre_theme_data->get('Author'))) . '</a>';
		/* translators: %s: WordPress.org URL */
        $movie_theatre_default_text .= sprintf(esc_html__(' | Powered by %s', 'movie-theatre'), '<a href="' . esc_url(__('https://wordpress.org/', 'movie-theatre')) . '" target="_blank">WordPress</a>. ');

        $movie_theatre_text = $movie_theatre_default_text;
    }
    ?>
    <span><?php echo wp_kses_post($movie_theatre_text); ?></span>
    <?php
}
add_action('movie_theatre_footer_copyright', 'movie_theatre_output_footer_copyright_content');


if ( ! function_exists( 'movie_theatre_footer_widget' ) ) :
	function movie_theatre_footer_widget() {
		$movie_theatre_footer_widget_column = get_theme_mod('movie_theatre_footer_widget_column','4');

		$movie_theatre_column_class = '';
		if ($movie_theatre_footer_widget_column == '1') {
			$movie_theatre_column_class = 'one-column';
		} elseif ($movie_theatre_footer_widget_column == '2') {
			$movie_theatre_column_class = 'two-columns';
		} elseif ($movie_theatre_footer_widget_column == '3') {
			$movie_theatre_column_class = 'three-columns';
		} else {
			$movie_theatre_column_class = 'four-columns';
		}
	
		if($movie_theatre_footer_widget_column !== ''): 
		?>
		<div class="dt_footer-widgets <?php echo esc_attr($movie_theatre_column_class); ?>">
			<div class="footer-widgets-column">
				<?php
				$footer_widgets_active = false;

				// Loop to check if any footer widget is active
				for ($movie_theatre_i = 1; $movie_theatre_i <= $movie_theatre_footer_widget_column; $movie_theatre_i++) {
					if (is_active_sidebar('movie-theatre-footer-widget-' . $movie_theatre_i)) {
						$footer_widgets_active = true;
						break;
					}
				}

				if ($footer_widgets_active) {
					// Display active footer widgets
					for ($movie_theatre_i = 1; $movie_theatre_i <= $movie_theatre_footer_widget_column; $movie_theatre_i++) {
						if (is_active_sidebar('movie-theatre-footer-widget-' . $movie_theatre_i)) : ?>
							<div class="footer-one-column">
								<?php dynamic_sidebar('movie-theatre-footer-widget-' . $movie_theatre_i); ?>
							</div>
						<?php endif;
					}
				} else {
				?>
				<div class="footer-one-column default-widgets">
					<aside id="search-2" class="widget widget_search default_footer_search">
						<div class="widget-header">
							<h4 class="widget-title"><?php esc_html_e('Search Here', 'movie-theatre'); ?></h4>
						</div>
						<?php get_search_form(); ?>
					</aside>
				</div>
				<div class="footer-one-column default-widgets">
					<aside id="recent-posts-2" class="widget widget_recent_entries">
						<h2 class="widget-title"><?php esc_html_e('Recent Posts', 'movie-theatre'); ?></h2>
						<ul>
							<?php
							$recent_posts = wp_get_recent_posts(array(
								'numberposts' => 5,
								'post_status' => 'publish',
							));
							foreach ($recent_posts as $post) {
								echo '<li><a href="' . esc_url(get_permalink($post['ID'])) . '">' . esc_html($post['post_title']) . '</a></li>';
							}
							wp_reset_query();
							?>
						</ul>
					</aside>
				</div>
				<div class="footer-one-column default-widgets">
					<aside id="recent-comments-2" class="widget widget_recent_comments">
						<h2 class="widget-title"><?php esc_html_e('Recent Comments', 'movie-theatre'); ?></h2>
						<ul>
							<?php
							$recent_comments = get_comments(array(
								'number' => 5,
								'status' => 'approve',
							));
							foreach ($recent_comments as $comment) {
								echo '<li><a href="' . esc_url(get_comment_link($comment)) . '">' .
									/* translators: %s: details. */
									sprintf(esc_html__('Comment on %s', 'movie-theatre'), get_the_title($comment->comment_post_ID)) .
									'</a></li>';
							}
							?>
						</ul>
					</aside>
				</div>
				<div class="footer-one-column default-widgets">
					<aside id="calendar-2" class="widget widget_calendar">
						<h2 class="widget-title"><?php esc_html_e('Calendar', 'movie-theatre'); ?></h2>
						<?php get_calendar(); ?>
					</aside>
				</div>
			</div>
			<?php } ?>
		</div>
		<?php
		endif;
	}
	endif;
add_action( 'movie_theatre_footer_widget', 'movie_theatre_footer_widget' );


function movie_theatre_footer_text_transform_css() {
    $movie_theatre_footer_text_transform = get_theme_mod('footer_text_transform', 'none');
    ?>
    <style type="text/css">
        .site-footer h4,footer#colophon h2.wp-block-heading,footer#colophon .widgettitle,footer#colophon .widget-title {
            text-transform: <?php echo esc_html($movie_theatre_footer_text_transform); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'movie_theatre_footer_text_transform_css');


/**
 * GET START FUNCTION
*/

function movie_theatre_getpage_css($hook) {
	wp_enqueue_script( 'movie-theatre-admin-script', get_template_directory_uri() . '/resource/js/movie-theatre-admin-notice-script.js', array( 'jquery' ) );
    wp_localize_script( 'movie-theatre-admin-script', 'movie_theatre_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
    wp_enqueue_style( 'movie-theatre-notice-style', get_template_directory_uri() . '/resource/css/notice.css' );
}

add_action( 'admin_enqueue_scripts', 'movie_theatre_getpage_css' );


add_action('wp_ajax_movie_theatre_dismissable_notice', 'movie_theatre_dismissable_notice');
function movie_theatre_switch_theme() {
    delete_user_meta(get_current_user_id(), 'movie_theatre_dismissable_notice');
}
add_action('after_switch_theme', 'movie_theatre_switch_theme');
function movie_theatre_dismissable_notice() {
    update_user_meta(get_current_user_id(), 'movie_theatre_dismissable_notice', true);
    die();
}

function movie_theatre_deprecated_hook_admin_notice() {
    global $movie_theatre_pagenow;
    
    // Check if the current page is the one where you don't want the notice to appear
    if ( $movie_theatre_pagenow === 'themes.php' && isset( $_GET['page'] ) && $_GET['page'] === 'movie-theatre-getting-started' ) {
        return;
    }

    $movie_theatre_dismissed = get_user_meta( get_current_user_id(), 'movie_theatre_dismissable_notice', true );
    if ( !$movie_theatre_dismissed) { ?>
        <div class="getstrat updated notice notice-success is-dismissible notice-get-started-class">
            <div class="at-admin-content" >
                <h2><?php esc_html_e('Welcome to Movie Theatre', 'movie-theatre'); ?></h2>
                <p><?php _e('Explore the features of our Pro Theme and take your Movie Theatre journey to the next level.', 'movie-theatre'); ?></p>
                <p ><?php _e('Get Started With Theme By Clicking On Getting Started.', 'movie-theatre'); ?><p>
                <div style="display: flex; justify-content: center;">
                    <a class="admin-notice-btn button button-primary button-hero" href="<?php echo esc_url( admin_url( 'themes.php?page=movie-theatre-getting-started' )); ?>"><?php esc_html_e( 'Get started', 'movie-theatre' ) ?></a>
                    <a  class="admin-notice-btn button button-primary button-hero" target="_blank" href="https://demo.asterthemes.com/movie-theatre/"><?php esc_html_e('View Demo', 'movie-theatre') ?></a>
                    <a  class="admin-notice-btn button button-primary button-hero" target="_blank" href="https://asterthemes.com/products/movie-theatre-wordpress-theme"><?php esc_html_e('Buy Now', 'movie-theatre') ?></a>
                    <a  class="admin-notice-btn button button-primary button-hero" target="_blank" href="https://demo.asterthemes.com/docs/movie-theatre-free/"><?php esc_html_e('Free Doc', 'movie-theatre') ?></a>
                </div>
            </div>
            <div class="at-admin-image">
                <img style="width: 100%;max-width: 320px;line-height: 40px;display: inline-block;vertical-align: top;border: 2px solid #ddd;border-radius: 4px;" src="<?php echo esc_url(get_stylesheet_directory_uri()) .'/screenshot.png'; ?>" />
            </div>
        </div>
    <?php }
}

add_action( 'admin_notices', 'movie_theatre_deprecated_hook_admin_notice' );


//Admin Notice For Getstart
function movie_theatre_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}