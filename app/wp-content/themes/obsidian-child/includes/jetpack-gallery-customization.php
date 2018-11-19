<?php
function custom_tiled_gallery_width() {
    return '900';
}
add_filter( 'tiled_gallery_content_width', 'custom_tiled_gallery_width' );
