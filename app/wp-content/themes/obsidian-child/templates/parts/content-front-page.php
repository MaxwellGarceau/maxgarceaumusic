<?php
/**
 * The template used for displaying content in page.php.
 *
 * @package Obsidian
 * @since 1.0.0
 */
$video_page_id = 29;
$songwriting_page_id = 23;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/CreativeWork">
  <header class="entry-header page-header">
    <?php obsidian_entry_title(); ?>
  </header>

  <?php if ( has_post_thumbnail() ) : ?>
    <figure class="entry-media">
      <?php the_post_thumbnail( 'full' ); ?>
    </figure>
  <?php endif; ?>

  <div class="entry-content" itemprop="text">
    <?php do_action( 'obsidian_entry_content_top' ); ?>

    <!-- Put homepage custom content here -->

<!-- Featured Message -->
<?php
/*
  if ( get_field( 'featured_message' ) ) { ?>
  <div class="site-content featured-message">
    <h2>Latest News From Max</h2>
    <blockquote>
      <?php echo get_field( 'featured_message' ); ?>
    </blockquote>
  </div>

<?php
  }
*/
?>

<!-- Social Media Feed -->
  <div id="lately">
    <h2 class="home__subtitle">What I've Been Doing Lately</h2>
    <?php echo do_shortcode('[insta-gallery id="0"]'); ?>
  </div>

<!-- Featured Video -->

<!-- Videos -->
<div class="featured">

  <div id="videos" class="featured__videos featured__col">

    <section class="widget widget_recent_posts block-grid-item widget-1">
      <div class="home__subtitle-container recent-posts-wrapper">
        <h2 class="home__subtitle widget-title">Recent Videos</h2>
        <span class="recent-posts-links"><a class="recent-posts-archive-link" target="_blank" href="<?php echo get_permalink( $video_page_id ); ?>">All Videos</a></span>
      </div>
    </section>

    <div class="youtube__container">
      <div class="youtube__video"><?php echo do_shortcode( '[embedyt]' . get_field('regular_featured_video_1') . '[/embedyt]' ); ?></div>
      <div class="youtube__video"><?php echo do_shortcode( '[embedyt]' . get_field('regular_featured_video_2') . '[/embedyt]' ); ?></div>
      <div class="youtube__video"><?php echo do_shortcode( '[embedyt]' . get_field('regular_featured_video_3') . '[/embedyt]' ); ?></div>
    </div>
  </div>

  <div class="featured__songs featured__col">

    <section id="songs" class="widget widget_recent_posts block-grid-item widget-1">
      <div class="home__subtitle-container recent-posts-wrapper">
        <h2 class="home__subtitle widget-title">Recent Songs</h2>
        <!-- <span class="recent-posts-links"><a class="recent-posts-archive-link" target="_blank" href="<?php echo get_permalink( $songwriting_page_id ); ?>">All Songs</a></span> -->
      </div>
    </section>

    <!-- Embed Cue Player here -->
    <?php echo do_shortcode('[cue id="307"]'); ?>
    <a class="recent-posts-archive-link info-message info-message__info brighter" target="_blank" href="https://songwritershelterstudios.com/">Click Here To Visit My Music Production Website</a>

  </div>

</div>

    <?php the_content(); ?>
    <?php obsidian_page_links(); ?>
    <?php do_action( 'obsidian_entry_content_bottom' ); ?>
  </div>
</article>
