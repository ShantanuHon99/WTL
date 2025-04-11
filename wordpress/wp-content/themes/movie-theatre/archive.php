<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package movie_theatre
 */

get_header();

$movie_theatre_column = get_theme_mod( 'movie_theatre_archive_column_layout', 'column-1' );
?>
<main id="primary" class="site-main">
	<?php if ( have_posts() ) : ?>
		<div class="movie_theatre-archive-layout grid-layout <?php echo esc_attr( $movie_theatre_column ); ?>">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content',  get_post_format() );

			endwhile;
			?>
		</div>
		<?php
		do_action( 'movie_theatre_posts_pagination' );
	else :
		get_template_part( 'template-parts/content', 'none' );
	endif;
	?>
</main><!-- #main -->
<?php
if ( movie_theatre_is_sidebar_enabled() ) {
	get_sidebar();
}
get_footer();