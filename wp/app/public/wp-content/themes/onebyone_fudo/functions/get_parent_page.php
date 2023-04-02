<?php

function get_parent_page() {
    $post_type = get_post_type();
    $page = get_page_by_slug($post_type);
    return $page;
}

function get_parent_page_id() {
    $post_type = get_post_type();
    $page = get_page_by_slug($post_type);
    $id = $page->ID;
    return $id;
}
