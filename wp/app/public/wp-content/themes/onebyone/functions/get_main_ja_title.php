<?php
// メイン画像上にテンプレート毎の英語タイトルを表示
function get_main_ja_title()
{
    // marcs用
   if (is_archive() && is_tax() ):
        $term_obj = get_queried_object();
        $cat_name = $term_obj->name;
    return $cat_name;
    elseif (is_archive() || is_singular() ):
    $id = get_parent_page_id();
    return get_post_meta($id, 'title-ja', true);
    // marcs用

    endif;
}
