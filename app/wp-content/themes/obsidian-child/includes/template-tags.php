<?php

/* OVERWRITES OBSIDIAN FUNCTION */
if ( ! function_exists( 'max_obsidian_site_branding' ) ) :
/**
 * Display the site logo, title, and description.
 *
 * @since 1.0.0
 */
function max_obsidian_site_branding( $additional_output = array() ) {
	$output = '';

	// Site logo.
	$output .= obsidian_theme()->logo->html();

	// Replace the site logo on the front page.
	if ( is_front_page() && ( $logo_url = get_theme_mod( 'front_page_logo_url' ) ) ) {
		$output = sprintf(
			'<a href="%1$s" class="site-logo-link site-logo-anchor"><img src="%2$s" alt="" class="site-logo" data-size="full"></a>',
			esc_url( home_url( '/' ) ),
			esc_url( $logo_url )
		);
	}

	// Site title.
	$output .= sprintf(
		'<h1 class="site-title"><a href="%1$s" rel="home">%2$s</a></h1>',
		esc_url( home_url( '/' ) ),
		esc_html( get_bloginfo( 'name', 'display' ) )
	);

	// Site description.
	$output .= '<div class="site-description screen-reader-text">' . esc_html( get_bloginfo( 'description', 'display' ) ) . '</div>';

  // Add additional HTML
  if ( isset( $additional_output['after_site_title'] ) ) {
    $output .= $additional_output['after_site_title'];
  }

	echo '<div class="site-branding">' . $output . '</div>'; // XSS OK
}
endif;
