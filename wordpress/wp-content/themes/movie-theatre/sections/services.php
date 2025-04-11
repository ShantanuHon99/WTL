<?php

if ( ! get_theme_mod( 'movie_theatre_enable_service_section', false ) ) {
  return;
}

$movie_theatre_content_ids  = array();
$movie_theatre_content_type = get_theme_mod( 'movie_theatre_service_content_type', 'post' );

for ( $movie_theatre_i = 1; $movie_theatre_i <= 4; $movie_theatre_i++ ) {
  $movie_theatre_content_ids[] = get_theme_mod( 'movie_theatre_service_content_' . $movie_theatre_content_type . '_' . $movie_theatre_i );
}

// Get the category for the services slider from theme mods or a default category
$movie_theatre_services_category = get_theme_mod('movie_theatre_services_category', 'services');

// Modify query to fetch posts from a specific category
$movie_theatre_services_args = array(
    'post_type'           => $movie_theatre_content_type,
    'post__in'            => array_filter( $movie_theatre_content_ids ),
    'orderby'             => 'post__in',
    'posts_per_page'      => absint(4),
    'ignore_sticky_posts' => true,
);

// Apply category filter only if content type is 'post'
if ( 'post' === $movie_theatre_content_type && ! empty( $movie_theatre_services_category ) ) {
    $movie_theatre_services_args['category_name'] = $movie_theatre_services_category;
}

$movie_theatre_services_args = apply_filters( 'movie_theatre_service_section_args', $movie_theatre_services_args );

movie_theatre_render_service_section( $movie_theatre_services_args );

/**
 * Render Services Section.
 */
function movie_theatre_render_service_section( $movie_theatre_services_args ) { ?>

  <section id="movie_theatre_service_section" class="asterthemes-frontpage-section service-section service-style-1">
    <?php
    if ( is_customize_preview() ) :
      movie_theatre_section_link( 'movie_theatre_service_section' );
    endif;

    $movie_theatre_trending_product_heading = get_theme_mod( 'movie_theatre_trending_product_heading');
    $movie_theatre_trending_product_content = get_theme_mod( 'movie_theatre_trending_product_content');
    $movie_theatre_default_image_url = get_template_directory_uri() . '/resource/img/default.png'; // Update this path to your default image
    ?>
    <div class="asterthemes-wrapper">
      <?php if ( ! empty( $movie_theatre_trending_product_heading ) ||  ! empty( $movie_theatre_trending_product_content ) ) { ?>
        <div class="product-contact-inner">
          <?php if ( ! empty( $movie_theatre_trending_product_heading ) ) { ?>
            <h3 class="heading"><?php echo esc_html( $movie_theatre_trending_product_heading ); ?></h3>
          <?php } ?>
          <?php if ( ! empty( $movie_theatre_trending_product_content ) ) { ?>
            <p class="conent-produt"><?php echo esc_html( $movie_theatre_trending_product_content ); ?></p>
          <?php } ?>
        </div>
      <?php } ?>
      
      <div class="video-main-box">
        <?php 
        $movie_theatre_query = new WP_Query( $movie_theatre_services_args );
        if ( $movie_theatre_query->have_posts() ) :
          ?>
          <div class="section-body">
            <div class="service-section-wrapper">
              <?php
              $movie_theatre_i = 1;
              while ( $movie_theatre_query->have_posts() ) :
                $movie_theatre_query->the_post();
                ?>
                <div class="service-single">
                  <div class="service-image-box">
                    <?php if ( has_post_thumbnail() ) { ?>
                        <div class="service-image">
                            <?php the_post_thumbnail( 'full' ); ?>
                        </div>
                    <?php } ?>
                    <div class="service-content">
                      <h3>
                        <a href="<?php the_permalink(); ?>">
                          <?php the_title(); ?>
                        </a>
                      </h3>
                      <div class="mag-post-excerpt">
                        <?php  $movie_theatre_excerpt = wp_trim_words(get_the_excerpt(), 6, '...');
                          echo $movie_theatre_excerpt;
                        ?>
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
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <?php
}