<?php

/**
 * Custom template tags for this theme
 *
 * @package movie_theatre
 */

if ( ! function_exists( 'movie_theatre_posted_on_single' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time on single posts.
     */
    function movie_theatre_posted_on_single() {
            if ( get_theme_mod( 'movie_theatre_single_post_hide_date', true ) ) {
                $movie_theatre_time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
            if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
                $movie_theatre_time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
            }

            $movie_theatre_time_string = sprintf(
                $movie_theatre_time_string,
                esc_attr( get_the_date( DATE_W3C ) ),
                esc_html( get_the_date() ),
                esc_attr( get_the_modified_date( DATE_W3C ) ),
                esc_html( get_the_modified_date() )
            );

            $movie_theatre_posted_on = '<span class="post-date"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><i class="far fa-clock"></i>' . $movie_theatre_time_string . '</a></span>';

            echo $movie_theatre_posted_on; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            return;
        }
    }
endif;

if ( ! function_exists( 'movie_theatre_posted_on' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function movie_theatre_posted_on() {
            if ( get_theme_mod( 'movie_theatre_post_hide_date', true ) ) {
                $movie_theatre_time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
            if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
                $movie_theatre_time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
            }

            $movie_theatre_time_string = sprintf(
                $movie_theatre_time_string,
                esc_attr( get_the_date( DATE_W3C ) ),
                esc_html( get_the_date() ),
                esc_attr( get_the_modified_date( DATE_W3C ) ),
                esc_html( get_the_modified_date() )
            );

            $movie_theatre_posted_on = '<span class="post-date"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><i class="far fa-clock"></i>' . $movie_theatre_time_string . '</a></span>';

            echo $movie_theatre_posted_on; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            return;
        }
    }
endif;


if ( ! function_exists( 'movie_theatre_posted_by_single' ) ) :
    /**
     * Prints HTML with meta information for the current author on single posts.
     */
    function movie_theatre_posted_by_single() {
        if ( get_theme_mod( 'movie_theatre_single_post_hide_author', true ) ) {
            $movie_theatre_byline = '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fas fa-user"></i>' . esc_html( get_the_author() ) . '</a>';

            echo '<span class="post-author"> ' . $movie_theatre_byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            return;
        }
    }
endif;

if ( ! function_exists( 'movie_theatre_posted_by' ) ) :
    /**
     * Prints HTML with meta information for the current author.
     */
    function movie_theatre_posted_by() {
        if ( get_theme_mod( 'movie_theatre_post_hide_author', true ) ) {
            $movie_theatre_byline = '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fas fa-user"></i>' . esc_html( get_the_author() ) . '</a>';

            echo '<span class="post-author"> ' . $movie_theatre_byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            return;
        }
    }
endif;

if ( ! function_exists( 'movie_theatre_posted_comments_single' ) ) :
    /**
     * Prints HTML with meta information for the current comment count on single posts.
     */
    function movie_theatre_posted_comments_single() {
        if ( get_theme_mod( 'movie_theatre_single_post_hide_comments', true ) ) {
            $movie_theatre_comment_count = get_comments_number();
            $movie_theatre_comment_text  = sprintf(
                /* translators: %s: comment count */
                _n( '%s Comment', '%s Comments', $movie_theatre_comment_count, 'movie-theatre' ),
                number_format_i18n( $movie_theatre_comment_count )
            );

            echo '<span class="post-comments"><i class="fas fa-comments"></i> ' . esc_html( $movie_theatre_comment_text ) . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            return;
        }
    }
endif;

if ( ! function_exists( 'movie_theatre_posted_comments' ) ) :
    /**
     * Prints HTML with meta information for the current comment count.
     */
    function movie_theatre_posted_comments() {
        if ( get_theme_mod( 'movie_theatre_post_hide_comments', true ) ) {
            $movie_theatre_comment_count = get_comments_number();
            $movie_theatre_comment_text  = sprintf(
                /* translators: %s: comment count */
                _n( '%s Comment', '%s Comments', $movie_theatre_comment_count, 'movie-theatre' ),
                number_format_i18n( $movie_theatre_comment_count )
            );

            echo '<span class="post-comments"><i class="fas fa-comments"></i> ' . esc_html( $movie_theatre_comment_text ) . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            return;
        }
    }
endif;

if ( ! function_exists( 'movie_theatre_posted_time_single' ) ) :
    /**
     * Prints HTML with meta information for the current post time on single posts.
     */
    function movie_theatre_posted_time_single() {
        if ( get_theme_mod( 'movie_theatre_single_post_hide_time', true ) ) {
            $movie_theatre_posted_on = sprintf(
                /* translators: %s: post time */
                esc_html__( 'Posted at %s', 'movie-theatre' ),
                '<a href="' . esc_url( get_permalink() ) . '"><time datetime="' . esc_attr( get_the_time( 'c' ) ) . '">' . esc_html( get_the_time() ) . '</time></a>'
            );

            echo '<span class="post-time"><i class="fas fa-clock"></i> ' . $movie_theatre_posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            return;
        }
    }
endif;

if ( ! function_exists( 'movie_theatre_posted_time' ) ) :
    /**
     * Prints HTML with meta information for the current post time.
     */
    function movie_theatre_posted_time() {
        if ( get_theme_mod( 'movie_theatre_post_hide_time', true ) ) {
            $movie_theatre_posted_on = sprintf(
                /* translators: %s: post time */
                esc_html__( 'Posted at %s', 'movie-theatre' ),
                '<a href="' . esc_url( get_permalink() ) . '"><time datetime="' . esc_attr( get_the_time( 'c' ) ) . '">' . esc_html( get_the_time() ) . '</time></a>'
            );

            echo '<span class="post-time"><i class="fas fa-clock"></i> ' . $movie_theatre_posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            return;
        }
    }
endif;

if ( ! function_exists( 'movie_theatre_categories_single_list' ) ) :
    function movie_theatre_categories_single_list( $movie_theatre_with_background = false ) {
        if ( is_singular( 'post' ) ) {
            $movie_theatre_hide_category = get_theme_mod( 'movie_theatre_single_post_hide_category', true );

            if ( $movie_theatre_hide_category ) {
                $movie_theatre_categories = get_the_category();
                $movie_theatre_separator  = '';
                $movie_theatre_output     = '';
                if ( ! empty( $movie_theatre_categories ) ) {
                    foreach ( $movie_theatre_categories as $movie_theatre_category ) {
                        $movie_theatre_output .= '<a href="' . esc_url( get_category_link( $movie_theatre_category->term_id ) ) . '">' . esc_html( $movie_theatre_category->name ) . '</a>' . $movie_theatre_separator;
                    }
                    echo trim( $movie_theatre_output, $movie_theatre_separator );
                }
            }
        }
    }
endif;

if ( ! function_exists( 'movie_theatre_categories_list' ) ) :
    function movie_theatre_categories_list( $movie_theatre_with_background = false ) {
        $movie_theatre_hide_category = get_theme_mod( 'movie_theatre_post_hide_category', true );

        if ( $movie_theatre_hide_category ) {
            $movie_theatre_categories = get_the_category();
            $movie_theatre_separator  = '';
            $movie_theatre_output     = '';
            if ( ! empty( $movie_theatre_categories ) ) {
                foreach ( $movie_theatre_categories as $movie_theatre_category ) {
                    $movie_theatre_output .= '<a href="' . esc_url( get_category_link( $movie_theatre_category->term_id ) ) . '">' . esc_html( $movie_theatre_category->name ) . '</a>' . $movie_theatre_separator;
                }
                echo trim( $movie_theatre_output, $movie_theatre_separator );
            }
        }
    }
endif;

if ( ! function_exists( 'movie_theatre_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the tags and comments.
	 */
	function movie_theatre_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() && is_singular() ) {
			$movie_theatre_hide_tag = get_theme_mod( 'movie_theatre_post_hide_tags', true );

			if ( $movie_theatre_hide_tag ) {
				/* translators: used between list items, there is a space after the comma */
				$movie_theatre_tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item movie_theatre_separator', 'movie-theatre' ) );
				if ( $movie_theatre_tags_list ) {
					/* translators: 1: list of tags. */
					printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'movie-theatre' ) . '</span>', $movie_theatre_tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
			}
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'movie-theatre' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'movie_theatre_post_thumbnail' ) ) :
    /**
     * Display the post thumbnail.
     */
    function movie_theatre_post_thumbnail() {
        // Return early if the post is password protected, an attachment, or does not have a post thumbnail.
        if ( post_password_required() || is_attachment() ) {
            return;
        }

        // Display post thumbnail for singular views.
        if ( is_singular() ) :
            // Check theme setting to hide the featured image in single posts.
            if ( get_theme_mod( 'movie_theatre_single_post_hide_feature_image', false ) ) {
                return;
            }
            ?>
            <div class="post-thumbnail">
                <?php 
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail(); 
                } else {
                    // URL of the default image
                    $movie_theatre_default_image_url = get_template_directory_uri() . '/resource/img/default.png';
                    echo '<img src="' . esc_url( $movie_theatre_default_image_url ) . '" alt="' . esc_attr( get_the_title() ) . '">';
                }
                ?>
            </div><!-- .post-thumbnail -->
        <?php else :
            // Check theme setting to hide the featured image in non-singular posts.
            if ( !get_theme_mod( 'movie_theatre_post_hide_feature_image', true ) ) {
                return;
            }
            ?>
            <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
                <?php
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail(
                        'post-thumbnail',
                        array(
                            'alt' => the_title_attribute(
                                array(
                                    'echo' => false,
                                )
                            ),
                        )
                    );
                } else {
                    // URL of the default image
                    $movie_theatre_default_image_url = get_template_directory_uri() . '/resource/img/default.png';
                    echo '<img src="' . esc_url( $movie_theatre_default_image_url ) . '" alt="' . esc_attr( get_the_title() ) . '">';
                }
                ?>
            </a>
        <?php endif; // End is_singular().
    }
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;