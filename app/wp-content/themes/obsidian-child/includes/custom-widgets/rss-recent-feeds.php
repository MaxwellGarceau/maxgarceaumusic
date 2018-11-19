<?php

class RSS_Recent_Posts_Feed extends WP_Widget {

  /**
   * Sets up the widgets name etc
   */
  public function __construct() {
    $widget_ops = array( 
      'classname' => 'RSS_Recent_Posts_Feed',
      'description' => 'Displays recent posts from RSS feed.',
    );
    parent::__construct( 'rss_recent_posts_feed', 'RSS Recent Posts Feed', $widget_ops );
  }

  /**
   * Outputs the content of the widget
   *
   * @param array $args
   * @param array $instance
   */
  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );
     
    // before and after widget arguments are defined by themes
    echo $args['before_widget'];
    if ( ! empty( $title ) )
    echo $args['before_title'] . $title . $args['after_title'];

    // This is where you run the code and display the output
    // START CORE FUNCTIONALITY

    $query_array = convert_shortcode_string_argument_to_array( $instance['query'] );

    // Combines different queries
    $blog_info = [];
    foreach ($query_array as $query) {
      $url_query = $instance['website'] . 'feed/?' . 'post_type=' . $query;
      $xml = file_get_contents( $url_query );
      $json_array = convert_XML_to_JSON( $xml );

      $blog_info = array_merge($blog_info, $json_array['channel']['item']);
    }

    // Sorts array by date
    foreach ($blog_info as $key => $value) {
         $sort[$key] = strtotime($value['pubDate']);
    }
    array_multisort($sort, SORT_DESC, $blog_info);


    // Display posts
    $blog_display = '<div>';

    $counter = 0;
    foreach ($blog_info as $post) {
      // Limit to 5 posts
      if ($counter >= 5) {
        break;
      }

      $blog_display .= display_post_sidebar( $post );

      $counter++;
    }

    $blog_display .= '</div>';

    echo $blog_display;

    // END CORE FUNCTIONALITY

    echo $args['after_widget'];
  }

  /**
   * Outputs the options form on admin
   *
   * @param array $instance The widget options
   */
  public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
      $title = $instance[ 'title' ];
    } else {
      $title = __( 'New title', 'rss_widget_domain' );
    }

    if ( isset( $instance[ 'website' ] ) ) {
      $website = $instance[ 'website' ];
    } else {
      $website = __( 'https://www.rsswebsite.com/', 'rss_widget_domain' );
    }

    if ( isset( $instance[ 'query' ] ) ) {
      $query = $instance[ 'query' ];
    } else {
      $query = __( 'custom-post-type-1, custom-post-type-2, etc', 'rss_widget_domain' );
    }

    // Widget admin form
    ?>
      <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />

        <label for="<?php echo $this->get_field_id( 'website' ); ?>"><?php _e( 'Website Feed Endpoint:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'website' ); ?>" name="<?php echo $this->get_field_name( 'website' ); ?>" type="text" value="<?php echo esc_attr( $website ); ?>" />

        <label for="<?php echo $this->get_field_id( 'query' ); ?>"><?php _e( 'Query' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'query' ); ?>" name="<?php echo $this->get_field_name( 'query' ); ?>" type="text" value="<?php echo esc_attr( $query ); ?>" />
      </p>
    <?php
  }

  /**
   * Processing widget options on save
   *
   * @param array $new_instance The new options
   * @param array $old_instance The previous options
   *
   * @return array
   */
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['website'] = ( ! empty( $new_instance['website'] ) ) ? strip_tags( $new_instance['website'] ) : '';
    $instance['query'] = ( ! empty( $new_instance['query'] ) ) ? strip_tags( $new_instance['query'] ) : '';

    return $instance;
  }
}

// Register and load the widget
function load_rss_recent_posts_feed_widget() {
    register_widget( 'RSS_Recent_Posts_Feed' );
}
add_action( 'widgets_init', 'load_RSS_Recent_Posts_Feed_widget' );
