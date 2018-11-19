<?php

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

add_action( 'wp_enqueue_scripts', 'enqueue_custom_js' );

function enqueue_custom_js() {
  wp_enqueue_script( 'custom-scripts-js', get_bloginfo( 'stylesheet_directory' ) . '/js/scripts-bundled.js' );
}

// Misc Configuration
// define('WP_SCSS_ALWAYS_RECOMPILE', true);

// Includes
include_once get_stylesheet_directory() . '/includes/custom-helper-functions.php';
include_once get_stylesheet_directory() . '/includes/settings-register.php';
include_once get_stylesheet_directory() . '/includes/jetpack-gallery-customization.php';
include_once get_stylesheet_directory() . '/includes/rss-recent-posts-feed.php';
include_once get_stylesheet_directory() . '/includes/custom-widgets/rss-recent-feeds.php';
include_once get_stylesheet_directory() . '/includes/site-branding-overwrite.php';

// Body Classes

function custom_body_classes( $classes ) {
  if ( is_page( 243 ) ) {
      $classes[] = 'home layout-full full-screen-header';
  }

  $url = $_SERVER["REQUEST_URI"];
  $isMetal = strpos($url, 'metal');

  if ( $isMetal ) {
    $classes[] = 'metal';
  }
  return $classes;
}

add_filter( 'body_class', 'custom_body_classes' );
