<?php
/**
 * Register widget areas.
 */

function obsidian_child_register_widget_areas() {
  register_sidebar( array(
    'id'            => 'featured-posts',
    'name'          => esc_html__( 'Featured Posts Sidebar', 'obsidian' ),
    'description'   => esc_html__( 'Sidebar to display featured posts.', 'obsidian' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'obsidian_child_register_widget_areas' );

register_nav_menus( array(
  'metal' => 'Nav Menu for metal website'
) );
