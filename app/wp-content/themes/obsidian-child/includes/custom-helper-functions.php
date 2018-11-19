<?php
/**
 * Count number of widgets in a sidebar
 * Used to add classes to widget areas so widgets can be displayed one, two, three or four per row
 * Original code found here (current code modified slightly to fit my situation): https://generatewp.com/snippet/2V0V0gy/
 */
function slbd_count_widgets( $sidebar_id ) {
  // If loading from front page, consult $_wp_sidebars_widgets rather than options
  // to see if wp_convert_widget_settings() has made manipulations in memory.
  global $_wp_sidebars_widgets;
  if ( empty( $_wp_sidebars_widgets ) ) :
    $_wp_sidebars_widgets = get_option( 'sidebars_widgets', array() );
  endif;
  
  $sidebars_widgets_count = $_wp_sidebars_widgets;
  
  if ( isset( $sidebars_widgets_count[ $sidebar_id ] ) ) :
    $widget_count = count( $sidebars_widgets_count[ $sidebar_id ] );
    $widget_classes = 'widget-count-' . count( $sidebars_widgets_count[ $sidebar_id ] );
    if ( $widget_count % 4 == 0 || $widget_count > 6 ) :
      // Four widgets er row if there are exactly four or more than six
      $widget_classes .= ' block-grid-4';
    elseif ( $widget_count >= 3 ) :
      // Three widgets per row if there's three or more widgets 
      $widget_classes .= ' block-grid-3';
    elseif ( 2 == $widget_count ) :
      // Otherwise show two widgets per row
      $widget_classes .= ' block-grid-2';
    endif; 
    return $widget_classes;
  endif;
}
