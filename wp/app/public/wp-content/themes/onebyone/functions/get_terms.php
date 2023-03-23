<?php
function get_terms($taxonomy) {
    $post_id = get_the_ID();
    $terms = get_the_terms( $post_id, $taxonomy);
    return $terms;
}
?>
