<?php
function get_page_by_slug( $slug = '' ) {
        $pages = get_posts(
            array(
            'post_type'      => 'page',
            'name'           => $slug,
            'posts_per_page' => 1
            )
        );
        return $pages ? $pages[0] : false;
  }
