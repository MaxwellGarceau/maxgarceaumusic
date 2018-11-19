<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default. Please note that
 * this is the WordPress construct of pages and that other 'pages' on your
 * WordPress site will use a different template.
 *
 * @package Obsidian
 * @since 1.0.0
 */

// Variables
$blog_page_id = 31;
$blog_page_metal_id = 254;
$gear_page_id = 68;
$gear_page_metal_id = 269;

get_header();

// No sidebar
if ( is_page( $gear_page_id ) || is_page( $gear_page_metal_id ) ) {
  get_template_part( 'templates/full', 'width' );
} 

// Has a sidebar
else {

  ?>

  <main id="primary" class="content-area" role="main" itemprop="mainContentOfPage">

    <?php do_action( 'obsidian_main_top' ); ?>

    <?php while ( have_posts() ) : the_post(); ?>

      <?php get_template_part( 'templates/parts/content', 'page' ); ?>

      <?php comments_template( '', true ); ?>

    <?php endwhile; ?>

    <?php do_action( 'obsidian_main_bottom' ); ?>

  </main>

  <?php
  if ( is_page( $blog_page_id ) || is_page( $blog_page_metal_id ) ) {
    get_sidebar( 'featured-posts' );
  } else {
    get_sidebar();
  }

  get_footer();
}