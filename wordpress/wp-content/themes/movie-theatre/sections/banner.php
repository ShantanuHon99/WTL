<?php
if ( ! get_theme_mod( 'movie_theatre_enable_banner_section', true ) ) {
	return;
}

$movie_theatre_slider_content_ids  = array();
$movie_theatre_slider_content_type = get_theme_mod( 'movie_theatre_banner_slider_content_type', 'post' );

for ( $movie_theatre_i = 1; $movie_theatre_i <= 3; $movie_theatre_i++ ) {
	$movie_theatre_slider_content_ids[] = get_theme_mod( 'movie_theatre_banner_slider_content_' . $movie_theatre_slider_content_type . '_' . $movie_theatre_i );
}

// Get the category for the banner slider from theme mods or a default category
$movie_theatre_banner_slider_category = get_theme_mod('movie_theatre_banner_slider_category', 'slider');

// Modify query to fetch posts from a specific category
$movie_theatre_banner_slider_args = array(
    'post_type'           => $movie_theatre_slider_content_type,
    'post__in'            => array_filter( $movie_theatre_slider_content_ids ),
    'orderby'             => 'post__in',
    'posts_per_page'      => absint(3),
    'ignore_sticky_posts' => true,
);

// Apply category filter only if content type is 'post'
if ( 'post' === $movie_theatre_slider_content_type && ! empty( $movie_theatre_banner_slider_category ) ) {
    $movie_theatre_banner_slider_args['category_name'] = $movie_theatre_banner_slider_category;
}

$movie_theatre_banner_slider_args = apply_filters( 'movie_theatre_banner_section_args', $movie_theatre_banner_slider_args );

movie_theatre_render_banner_section( $movie_theatre_banner_slider_args );

/**
 * Render Banner Section.
 */
function movie_theatre_render_banner_section( $movie_theatre_banner_slider_args ) {     ?>

	<section id="movie_theatre_banner_section" class="banner-section banner-style-1">
		<?php
		if ( is_customize_preview() ) :
			movie_theatre_section_link( 'movie_theatre_banner_section' );
		endif;
		?>
		<div class="banner-section-wrapper">
			<?php
			$query = new WP_Query( $movie_theatre_banner_slider_args );
			if ( $query->have_posts() ) :
				?>
				<div class="asterthemes-banner-wrapper banner-slider movie-theatre-carousel-navigation" data-slick='{"autoplay": false }'>
					<?php 
					$movie_theatre_i = 1;
					while ( $query->have_posts() ) :
						$query->the_post();
						$movie_theatre_button_label = get_theme_mod( 'movie_theatre_banner_button_label_' . $movie_theatre_i);
						$movie_theatre_button_link  = get_theme_mod( 'movie_theatre_banner_button_link_' . $movie_theatre_i);
						$movie_theatre_banner_short_heading = get_theme_mod( 'movie_theatre_banner_short_heading' . $movie_theatre_i);
						$movie_theatre_button_link  = ! empty( $movie_theatre_button_link ) ? $movie_theatre_button_link : get_the_permalink();
						?>
						<div class="banner-single-outer">
							<div class="banner-single">
								<div class="banner-main-image">
									<div class="banner-img">
										<?php 
							                if ( has_post_thumbnail() ) {
							                    the_post_thumbnail(); 
							                } else {
							                    // URL of the default image
							                    $movie_theatre_default_image_url = get_template_directory_uri() . '/resource/img/default.png';
							                    echo '<img src="' . esc_url( $movie_theatre_default_image_url ) . '" alt="' . esc_attr( get_the_title() ) . '">';
							                }
							            ?>
									</div>								
								</div>
								<div class="banner-caption">
									<div class="banner-catption-wrapper">
										<?php if ( ! empty( $movie_theatre_banner_short_heading ) ) { ?>
											<h4><?php echo esc_html( $movie_theatre_banner_short_heading ); ?></h4>
										<?php } ?>
										<h1 class="banner-caption-title">
											<a href="<?php the_permalink(); ?>">
						                        <?php the_title(); ?>
						                    </a>
										</h1>
										<?php if ( ! empty( $movie_theatre_button_label ) ) { ?>
											<div class="banner-slider-btn">
												<a href="<?php echo esc_url( $movie_theatre_button_link ); ?>" class="asterthemes-button"><?php echo esc_html( $movie_theatre_button_label ); ?></a>
											</div>
										<?php } ?>
										<div class="socail-search">
			                                <div class="social-icons">
			                                    <?php
			                                    if ( has_nav_menu( 'social' ) ) {
			                                        wp_nav_menu(
			                                            array(
			                                                'menu_class'     => 'menu social-links',
			                                                'link_before'    => '<span class="screen-reader-text">',
			                                                'link_after'     => '</span>',
			                                                'theme_location' => 'social',
			                                            )
			                                        );
			                                    }
			                                    ?>
			                                </div>
			                            </div>
									</div>
								</div>
							</div>
						</div>
						<?php
						$movie_theatre_i++;
					endwhile;
					wp_reset_postdata();
					?>
				</div>
				<?php
			endif;
			?>
		</div>
	</section>

	<?php
}