<?php
// 固定ページのエディタ右パネルから抜粋文を入力可能にする
add_post_type_support( 'page', 'excerpt' );

function cms_excerpt_more() {
    return '...';
}

// 'excerpt_more'フィルター：抜粋文最後に付く文字列
add_filter( 'excerpt_more', 'cms_excerpt_more' );

function cms_excerpt_length() {
    return 80;
}

// 'excerpt_mblength WP Multbyte Patch 標準の110文字から80文字に変更
add_filter( 'excerpt_mblength', 'cms_excerpt_length' );

function get_flexible_excerpt( $number ) {
    $value = get_the_excerpt();
    $value = wp_trim_words( $value, $number, '...');
    return $value;
}

function apply_excerpt_br( $value ) {
    return nl2br( $value );
}
add_filter( 'get_the_excerpt', 'apply_excerpt_br' );
