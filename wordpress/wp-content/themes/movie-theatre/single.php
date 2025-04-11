<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package movie_theatre
 */

get_header();
?>
<main id="primary" class="site-main">

	<?php
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content', 'single' );

		do_action( 'movie_theatre_post_navigation' );

		if ( is_singular( 'post' ) ) {
			$movie_theatre_related_posts_label = get_theme_mod( 'movie_theatre_post_related_post_label');
			$movie_theatre_cat_content_id      = get_the_category( $post->ID )[0]->term_id;
			$movie_theatre_related_posts_count = get_theme_mod( 'movie_theatre_related_posts_count');

			$movie_theatre_args                = array(
				'cat'            => $movie_theatre_cat_content_id,
				'posts_per_page' => $movie_theatre_related_posts_count, 
			);
			$movie_theatre_query = new WP_Query( $movie_theatre_args );

			if ( $movie_theatre_query->have_posts() ) :
				?>
				<div class="related-posts">
					<?php if ( get_theme_mod( 'movie_theatre_post_hide_related_posts', true ) === true ) : ?>
						<h2><?php echo esc_html( $movie_theatre_related_posts_label ); ?></h2>
						<div class="row">
							<?php
							while ( $movie_theatre_query->have_posts() ) :
								$movie_theatre_query->the_post();
								?>
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class="mag-post-single">
										<div class="mag-post-img">
											<?php movie_theatre_post_thumbnail(); ?>
										</div>
										<div class="mag-post-detail">
											<?php the_title( '<h5 class="entry-title mag-post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' ); ?>
											<div class="mag-post-excerpt">
												<?php the_excerpt(); ?>
											</div>
										</div>
									</div>
								</article>
								<?php
							endwhile;
							wp_reset_postdata();
							?>
						</div>
					<?php endif; ?>
				</div>
				<?php
			endif;
		}

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>

</main>
<?php
if ( movie_theatre_is_sidebar_enabled() ) {
	get_sidebar();
}
get_footer();