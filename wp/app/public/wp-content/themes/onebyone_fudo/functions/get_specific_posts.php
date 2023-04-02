<?php
// 投稿タイプ、タクソノミー、タームから投稿を取得する
// post,category,news等
function get_specific_posts ( $post_type, $taxonomy, $term, $number = -1 ) {
    if( ! $term):
        $terms_obj = get_terms( $taxonomy );
        $term = wp_list_pluck( $terms_obj, 'slug' );
    endif;
    $args = array(
        'posts_per_page' => $number,
        'post_type' => $post_type,
        'tax_query' => array(
                                    array(
                                        'taxonomy' =>$taxonomy,
                                        'field'    => 'slug',
                                        'terms'    => $term,
                                    ),
                                ),
        'orderby' => 'date',
        'order' => 'DESC',
    );
    $specific_posts = new WP_Query( $args );
    return $specific_posts;
}
