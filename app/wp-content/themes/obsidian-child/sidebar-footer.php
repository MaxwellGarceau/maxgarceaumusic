<?php
/**
 * The template containing the footer widget area.
 *
 * @package Obsidian
 * @since 1.0.0
 */
?>

<div id="tertiary" class="footer-widgets widget-area" role="complementary">

  <?php do_action( 'obsidian_footer_widgets_top' ); ?>

  <div class="block-grid block-grid--gutters <?php echo slbd_count_widgets('footer-widgets'); ?>">
    <?php dynamic_sidebar( 'footer-widgets' ); ?>
  </div>

  <?php do_action( 'obsidian_footer_widgets_bottom' ); ?>

</div>
