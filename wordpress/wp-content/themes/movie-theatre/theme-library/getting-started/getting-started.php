<?php
/**
 * Getting Started Page.
 *
 * @package movie_theatre
 */


if( ! function_exists( 'movie_theatre_getting_started_menu' ) ) :
/**
 * Adding Getting Started Page in admin menu
 */
function movie_theatre_getting_started_menu(){	
	add_theme_page(
		__( 'Getting Started', 'movie-theatre' ),
		__( 'Getting Started', 'movie-theatre' ),
		'manage_options',
		'movie-theatre-getting-started',
		'movie_theatre_getting_started_page'
	);
}
endif;
add_action( 'admin_menu', 'movie_theatre_getting_started_menu' );

if( ! function_exists( 'movie_theatre_getting_started_admin_scripts' ) ) :
/**
 * Load Getting Started styles in the admin
 */
function movie_theatre_getting_started_admin_scripts( $hook ){
	// Load styles only on our page
	if( 'appearance_page_movie-theatre-getting-started' != $hook ) return;

    wp_enqueue_style( 'movie-theatre-getting-started', get_template_directory_uri() . '/resource/css/getting-started.css', false, MOVIE_THEATRE_THEME_VERSION );

    wp_enqueue_script( 'movie-theatre-getting-started', get_template_directory_uri() . '/resource/js/getting-started.js', array( 'jquery' ), MOVIE_THEATRE_THEME_VERSION, true );
}
endif;
add_action( 'admin_enqueue_scripts', 'movie_theatre_getting_started_admin_scripts' );

if( ! function_exists( 'movie_theatre_getting_started_page' ) ) :
/**
 * Callback function for admin page.
*/
function movie_theatre_getting_started_page(){ 
	$movie_theatre_theme = wp_get_theme();?>
	<div class="wrap getting-started">
		<div class="intro-wrap">
			<div class="intro cointaner">
				<div class="intro-content">
					<h3><?php echo esc_html( 'Welcome to', 'movie-theatre' );?> <span class="theme-name"><?php echo esc_html( MOVIE_THEATRE_THEME_NAME ); ?></span></h3>
					<p class="about-text">
						<?php
						// Remove last sentence of description.
						$movie_theatre_description = explode( '. ', $movie_theatre_theme->get( 'Description' ) );

						$movie_theatre_description = implode( '. ', $movie_theatre_description );

						echo esc_html( $movie_theatre_description . '' );
					?></p>
					<div class="btns-getstart">
						<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>"target="_blank" class="button button-primary"><?php esc_html_e( 'Customize', 'movie-theatre' ); ?></a>
						<a class="button button-primary" href="<?php echo esc_url( 'https://wordpress.org/support/theme/movie-theatre/reviews/#new-post' ); ?>" title="<?php esc_attr_e( 'Visit the Review', 'movie-theatre' ); ?>" target="_blank">
							<?php esc_html_e( 'Review', 'movie-theatre' ); ?>
						</a>
						<a class="button button-primary" href="<?php echo esc_url( 'https://wordpress.org/support/theme/movie-theatre/' ); ?>" title="<?php esc_attr_e( 'Visit the Support', 'movie-theatre' ); ?>" target="_blank">
							<?php esc_html_e( 'Contact Support', 'movie-theatre' ); ?>
						</a>
					</div>
					<div class="btns-wizard">
						<a class="wizard" href="<?php echo esc_url( admin_url( 'themes.php?page=movietheatre-wizard' ) ); ?>"target="_blank" class="button button-primary"><?php esc_html_e( 'One Click Demo Setup', 'movie-theatre' ); ?></a>
					</div>
				</div>
				<div class="intro-img">
					<img src="<?php echo esc_url(get_template_directory_uri()) .'/screenshot.png'; ?>" />
				</div>
				
			</div>
		</div>

		<div class="cointaner panels">
			<ul class="inline-list">
				<li class="current">
                    <a id="help" href="javascript:void(0);">
                        <?php esc_html_e( 'Getting Started', 'movie-theatre' ); ?>
                    </a>
                </li>
				<li>
                    <a id="free-pro-panel" href="javascript:void(0);">
                        <?php esc_html_e( 'Free Vs Pro', 'movie-theatre' ); ?>
                    </a>
                </li>
			</ul>
			<div id="panel" class="panel">
				<?php require get_template_directory() . '/theme-library/getting-started/tabs/help-panel.php'; ?>
				<?php require get_template_directory() . '/theme-library/getting-started/tabs/free-vs-pro-panel.php'; ?>
				<?php require get_template_directory() . '/theme-library/getting-started/tabs/link-panel.php'; ?>
			</div>
		</div>
	</div>
	<?php
}
endif;