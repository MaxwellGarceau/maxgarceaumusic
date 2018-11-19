<?php

// Helper Functions
function generate_url_query( $website, $key_values = [] ) {
  $query_url = $website . 'feed/';

  $counter = 0;
  foreach ($key_values as $key => $value) {
    $query_operator = $counter === 0 ? '?' : '&';

    $query_url .= $query_operator . $key . '=' . $value;

    $counter++;
  }

  return $query_url;
}

function convert_XML_to_JSON( $xml_string ) {
  $xml = simplexml_load_string( $xml_string );
  $json = json_encode( $xml );
  $array = json_decode( $json,TRUE );

  return $array;
}

function convert_shortcode_string_argument_to_array( $shortcode_string ) {
  $no_whitespaces = preg_replace( '/\s*,\s*/', ',', filter_var( $shortcode_string, FILTER_SANITIZE_STRING ) );
  $shortcode_array = explode( ',', $no_whitespaces );

  return $shortcode_array;
}

function combine_key_value_arrays( $key_array, $value_array ) {
  $combined_array = [];

  // Warning: Count is not zero indexed
  for ( $i = 0; $i < count( $key_array ); $i++ ) {
      $combined_array[$key_array[$i]] = $value_array[$i];
  }
  return $combined_array;
}

// Puts everything together
// STILL NEED TO WRITE FALLBACKS FOR ERROR HANDLING
function generate_blog_feed( $atts ) {

  // Generate Blog Info
  $atts = shortcode_atts(
      array(
          'key' => '',
          'value' => '',
          'website' => 'http://songwritershelterstudios.com/',
          'display' => 'default-blog'
      ), $atts, 'generate_blog_feed' );

  $key_array = convert_shortcode_string_argument_to_array( $atts['key'] );
  $value_array = convert_shortcode_string_argument_to_array( $atts['value'] );

  $query_params = combine_key_value_arrays( $key_array, $value_array );

  $url_query = generate_url_query( $atts['website'], $query_params );

  $xml = file_get_contents( $url_query );
  $json_array = convert_XML_to_JSON( $xml );

  $blog_info = $json_array['channel'];
  
  // Display Blog Info
  switch( $atts['display'] ) {
    case 'default-blog':
      return display_default_blog_feed( $blog_info );
  }

}
add_shortcode( 'generate_blog_feed', 'generate_blog_feed' );

function display_blog_posts( $blog_info ) {
  $blog_display;
  foreach ( $blog_info['item'] as $post ) {
    $string_to_date = strtotime( $post['pubDate'] );
    $format_date = date( 'M jS, Y', $string_to_date );

    $blog_display .= 
    '<div class="rss-blog__post">
        <h5 class="rss-blog__post-title"><a target="_blank" href="' . $post['link'] .'">' . $post['title'] .'</a><span class="rss-blog__post-date"> - ' . $format_date .'</span></h5>
      </div>';
  }
  return $blog_display;
}

function display_blog_title( $blog_info ) {
  $blog_display = 
    '<div>
      <h2 class="rss-blog__title"><a target="_blank" href="' . $blog_info['link'] .'">' . $blog_info['title'] .'</a></h2>
    </div>';

  return $blog_display;
}

function display_post_sidebar( $post ) {
  $string_to_date = strtotime( $post['pubDate'] );
  $format_date = date( 'M jS, Y', $string_to_date );

  $blog_display .= '<h5 class="rss-blog__post-title"><a target="_blank" href="' . $post['link'] .'">' . $post['title'] .'</a><span class="rss-blog__post-date"> - ' . $format_date .'</span></h5>';

  return $blog_display;
}

function display_default_blog_feed( $blog_info ) {
  $blog_display = '<div class="rss-blog">';

  $blog_display .= display_blog_title( $blog_info );

  $blog_display .= display_blog_posts( $blog_info );

  $blog_display .= '</div>';

  return $blog_display;
}

function get_most_recent_rss_posts( $atts ) {
  $atts = shortcode_atts(
      array(
          'query' => '',
          'website' => 'http://songwritershelterstudios.com/',
          'display' => 'blog-title'
      ), $atts, 'get_most_recent_rss_posts' );

  $query_array = convert_shortcode_string_argument_to_array( $atts['query'] );

  // Combines different queries
  $blog_info = [];
  foreach ($query_array as $query) {
    $url_query = $atts['website'] . 'feed/?' . 'post_type=' . $query;
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

  return $blog_display;

}
add_shortcode( 'get_most_recent_rss_posts', 'get_most_recent_rss_posts' );
