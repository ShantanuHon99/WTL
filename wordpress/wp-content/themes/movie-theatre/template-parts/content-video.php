<?php

/**
 * Template part for displaying Video Format
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package movie_theatre
 */

?>
<?php $movie_theatre_readmore = get_theme_mod( 'movie_theatre_readmore_button_text','Read More');?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="mag-post-single">
        <?php
			// Get the post ID
			$movie_theatre_post_id = get_the_ID();

			// Check if there are videos embedded in the post content
			$movie_theatre_post = get_post($movie_theatre_post_id);
			$movie_theatre_content = do_shortcode(apply_filters('the_content', $movie_theatre_post->post_content));
			$movie_theatre_embeds = get_media_embedded_in_content($movie_theatre_content);

			if (!empty($movie_theatre_embeds)) {
			    // Loop through embedded media and display videos
			    foreach ($movie_theatre_embeds as $movie_theatre_embed) {
			        // Check if the embed code contains a video tag or specific video providers like YouTube or Vimeo
			        if (strpos($movie_theatre_embed, 'video') !== false || strpos($movie_theatre_embed, 'youtube') !== false || strpos($movie_theatre_embed, 'vimeo') !== false || strpos($movie_theatre_embed, 'dailymotion') !== false || strpos($movie_theatre_embed, 'vine') !== false || strpos($movie_theatre_embed, 'wordPress.tv') !== false || strpos($movie_theatre_embed, 'hulu') !== false) {
			            ?>
			            <div class="custom-embedded-video">
			                <div class="video-container">
			                    <?php echo $movie_theatre_embed; ?>
			                </div>
			                <div class="video-comments">
			                    <?php
			                    // Add your comments section here
			                    comments_template(); // This will include the default WordPress comments template
			                    ?>
			                </div>
			            </div>
			            <?php
			        }
			    }
			}
	    ?>
		<div class="mag-post-detail">
			<div class="mag-post-category">
				<?php movie_theatre_categories_list(); ?>
			</div>
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title mag-post-title">', '</h1>' );
			else :
				if ( get_theme_mod( 'movie_theatre_post_hide_post_heading', true ) ) { 
					the_title( '<h2 class="entry-title mag-post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			    }
			endif;
			?>
			<div class="mag-post-meta">
				<?php
				movie_theatre_posted_by();
				movie_theatre_posted_on();
				movie_theatre_posted_comments();
				movie_theatre_posted_time();
				?>
			</div>
			<?php if ( get_theme_mod( 'movie_theatre_post_hide_post_content', true ) ) { ?>
				<div class="mag-post-excerpt">
					<?php the_excerpt(); ?>
				</div>
		    <?php } ?>
			<?php if ( get_theme_mod( 'movie_theatre_post_readmore_button', true ) === true ) : ?>
				<div class="mag-post-read-more">
					<a href="<?php the_permalink(); ?>" class="read-more-button">
						<?php if ( ! empty( $movie_theatre_readmore ) ) { ?> <?php echo esc_html( $movie_theatre_readmore ); ?> <?php } ?>
						<i class="<?php echo esc_attr( get_theme_mod( 'movie_theatre_readmore_btn_icon', 'fas fa-chevron-right' ) ); ?>"></i>
					</a>
				</div>
			<?php endif; ?>
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->