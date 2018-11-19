<?php
function obsidian_site_branding() {
  // Checks to see if its the sub metal website
  $url = $_SERVER["REQUEST_URI"];
  $isMetal = strpos($url, 'metal');
  if ( $isMetal ) {
    $root = '/metal';
  } else {
    $root = '/';
  }

  $output = '';

  // Site logo.
  $output .= obsidian_theme()->logo->html();

  // Replace the site logo on the front page.
  if ( is_front_page() && ( $logo_url = get_theme_mod( 'front_page_logo_url' ) ) ) {
    $output = sprintf(
      '<a href="%1$s" class="site-logo-link site-logo-anchor"><img src="%2$s" alt="" class="site-logo" data-size="full"></a>',
      esc_url( home_url( $root ) ),
      esc_url( $logo_url )
    );
  }

  // Site title.
  $output .= sprintf(
    '<h1 class="site-title"><a href="%1$s" rel="home">%2$s</a></h1>',
    esc_url( home_url( $root ) ),
    esc_html( get_bloginfo( 'name', 'display' ) )
  );

  // Site description.
  $output .= '<div class="site-description screen-reader-text">' . esc_html( get_bloginfo( 'description', 'display' ) ) . '</div>';

  echo '<div class="site-branding">' . $output . '</div>'; // XSS OK
}
