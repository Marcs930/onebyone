<?php

function custom_search($search, $wp_query) {
  // query['s']があったら検索ページ表示
  // なくても現行verだと動くかも
  if (isset($wp_query->query['s'])) {
    $wp_query->is_search = true;
    return $search;
  }
}

function search_no_keywords() {
  if (isset($_GET['s']) && empty($_GET['s'])) {
    include TEMPLATEPATH . '/search.php';
    exit;
  }
}
add_action('template_redirect', 'search_no_keywords');