<?php
function chiilog_breadcrumb_title_swapper($title, $type, $id)
{
    if( is_page() ) {
        $custom = get_post_meta($id, 'title-ja', true);
        $title = $custom;
    }

    $title = mb_str( $title, 13, '...' );
    return $title;
}
add_filter('bcn_breadcrumb_title', 'chiilog_breadcrumb_title_swapper', 3, 10);
