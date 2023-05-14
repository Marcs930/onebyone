<?php

//カスタム投稿タイプの検索
add_filter('template_include','custom_search_template');
function custom_search_template($template){
  if ( is_search() ){
    $post_types = get_query_var('post_type');
    foreach ( (array) $post_types as $post_type )
      $templates[] = "search-{$post_type}.php";
      $templates[] = 'search.php';
      $template = get_query_template('search',$templates);
     }
  return $template;
}



function get_meta_values( $key = '', $type = 'post', $status = 'publish' ) {
global $wpdb;
if( empty( $key ) )
return;
$r = $wpdb->get_col( $wpdb->prepare( "
SELECT pm.meta_value FROM {$wpdb->postmeta} pm
LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
WHERE pm.meta_key = '%s'
AND p.post_status = '%s'
AND p.post_type = '%s'
", $key, $status, $type ) );
return $r;
}

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
	foreach ( ['layout', 'price'] as $_key )
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