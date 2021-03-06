<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Obsidian
 * @since 1.0.0
 */

if ( is_active_sidebar( 'sidebar-1' ) && obsidian_has_main_sidebar() ) :
?>

  <div id="secondary" class="main-sidebar widget-area" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">

    <?php do_action( 'obsidian_sidebar_top' ); ?>

    <?php dynamic_sidebar( 'featured-posts' ); ?>
    
    <h2 class="widget-title">Max's Recent Thoughts on Music</h2>

    <?php echo do_shortcode('[get_most_recent_rss_posts website="https://songwritershelterstudios.com/" query="songwriter-salon, songwriter-advice, production-tutorials"]'); ?>

    <?php do_action( 'obsidian_sidebar_bottom' ); ?>

  </div>

<?php
endif;
