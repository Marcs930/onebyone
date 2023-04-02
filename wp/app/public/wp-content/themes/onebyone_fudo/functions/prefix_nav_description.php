<?php
function prefix_nav_description($item_output, $item, $depth, $args)
{
    if (!empty($item->description)) {
        $item_output = str_replace(
            '">' . $args->link_before . $item->title, //これを書き換える
            '">' .$item->title . '<span>' . $item->description . '</span>', //これに書き換える
            $item_output//これの中の文字列が検索対象
        );
    }
    return $item_output;
}
   add_filter('walker_nav_menu_start_el', 'prefix_nav_description', 10, 4);