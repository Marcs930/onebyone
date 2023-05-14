<?php

// カスタムフィールドを検索条件に含む
function custom_field_search($search, $query)
{
	// キーワードがなくても検索ページを表示させる
	if ( isset($wp_query->query['s']) )
		$wp_query->is_search = TRUE;

	// 検索ページ以外はカスタマイズしない
	if ( !$query->is_search )
		return;

	// 完全一致検索（nunmerかcodeが入力されたら検索）
	foreach ( ['number', 'item_code'] as $_key )
	{
		if ( !empty($_REQUEST[$_key]) )
		{
			$search .= " AND wp_postmeta.meta_key = '$_key'";
			$search .= " AND wp_postmeta.meta_value = '$_REQUEST[$_key]'";
		}
	}

	// 部分一致検索（item_nameが入力されたら検索）
	foreach ( ['item_name'] as $_key )
	{
		if ( !empty($_REQUEST[$_key]) )
		{
			$search .= " AND wp_postmeta.meta_key = '$_key'";
			$search .= " AND wp_postmeta.meta_value LIKE '%$_REQUEST[$_key]%'";
		}
	}

	return $search;
}
add_filter('posts_search','custom_field_search', 10, 2);

// フォームからカスタムフィールドが渡された場合、joinに wp_postmeta を追加
function custom_search_join($join)
{
	foreach ( ['number', 'item_code', 'item_name'] as $_key )
	{
		if ( !empty($_REQUEST[$_key]) )
		{
			$join .= 'INNER JOIN wp_postmeta ON (wp_posts.ID = wp_postmeta.post_id)';
			break;
		}
	}

	return $join;
}
add_filter('posts_join', 'custom_search_join');
?>