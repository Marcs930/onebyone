<?php
function get_main_title()
{
    if (is_singular('post')):
        $category_obj = get_the_category();
    return $category_obj[0] -> name; elseif (is_front_page()):
        return get_field('main_title');
    ; elseif (is_page()):
        return get_the_title();
    // marcs用
    elseif (is_archive() && is_tax()):
            $term_obj = get_queried_object();
            $taxonomy = $term_obj->taxonomy;
            $term_id = $term_obj->term_id;
            $cat_title_en = get_field( 'category_title_en', $taxonomy . '_' . $term_id);
    return $cat_title_en;
    elseif (is_archive() || is_singular()):
            $page = get_parent_page();
    return $page->post_title;
    // marcs用
    elseif (is_category()):
            return single_cat_title('', false);
    // marcs用
    elseif (is_search()):
        return 'サイト内検索結果';
    endif;
}
