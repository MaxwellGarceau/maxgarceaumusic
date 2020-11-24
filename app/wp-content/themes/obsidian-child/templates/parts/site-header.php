<?php
/**
 * The template for displaying the site header.
 *
 * @package Obsidian
 * @since 1.0.0
 */
?>

<header id="masthead" class="site-header" role="banner" itemscope itemtype="http://schema.org/WPHeader">

  <?php do_action( 'obsidian_header_top' ); ?>

  <?php
    if ( is_front_page() ) {
      $additional_output = array(
        'after_site_title' => '<div class="featured-message">' . get_field( 'featured_message' ) . '</div>'
      );
      max_obsidian_site_branding( $additional_output );
    } else {
      obsidian_site_branding();
    }
  ?>

  <nav id="site-navigation" class="site-navigation" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
    <?php if ( has_nav_menu( 'primary' ) ) : ?>
      <button class="site-navigation-toggle"><?php esc_html_e( 'Menu', 'obsidian' ); ?></button>
    <?php endif; ?>

    <?php
    $url = $_SERVER["REQUEST_URI"];
    $isMetal = strpos($url, 'metal');

    if ( $isMetal ) {
      wp_nav_menu( array(
        'theme_location' => 'metal',
        'container'      => false,
        'menu_class'     => 'menu',
        'fallback_cb'    => false,
        'depth'          => 3,
      ) );
    } else {
      wp_nav_menu( array(
        'theme_location' => 'primary',
        'container'      => false,
        'menu_class'     => 'menu',
        'fallback_cb'    => false,
        'depth'          => 3,
      ) );
    }
    ?>
  </nav>

  <?php do_action( 'obsidian_header_bottom' ); ?>

</header>

<?php red_display_return_to_top_arrow(); ?>
