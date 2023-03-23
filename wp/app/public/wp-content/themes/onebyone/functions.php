<?php
require_once get_theme_file_path('/functions/scripts.php');
//JavaScriptの読み込み系

require_once get_theme_file_path('/functions/styles.php');
//styleシートの読み込み系

// require_once get_theme_file_path( '/functions/delete_default_jquery.php' ); //デフォルトで読み込まれるjQueryを削除
require_once get_theme_file_path('/functions/nav-menu.php');
// ナビメニューを有効化

require_once get_theme_file_path('/functions/nav_menu_customize.php');
// ナビメニューでli,aにクラスを付与可能にする

require_once get_theme_file_path('/functions/image-size.php');
//画像サイズの設定

require_once get_theme_file_path('/functions/get_main_title.php');
// page-headでのメインタイトル（英語タイトル）の取得

require_once get_theme_file_path('/functions/get_main_ja_title.php');
// page-headでのサブタイトル（日本語タイトル）の取得

require_once get_theme_file_path('/functions/excerpt.php');
// // 抜粋文を使用可能にする

require_once get_theme_file_path('/functions/get_specific_posts.php');
// // 投稿タイプ、タクソノミー、タームから投稿を取得する

require_once get_theme_file_path('/functions/thumbnail.php');
// // サムネイルを使用可能にする

require_once get_theme_file_path('/functions/prefix_nav_description.php');
// ナビメニューに説明文を追加で出力させる

require_once get_theme_file_path('/functions/get-main-image.php');
// page-headでのカバー画像の取得

require_once get_theme_file_path('/functions/get_page_by_slug.php');
// 特定のスラッグの固定ページを取得

require_once get_theme_file_path('/functions/get_parent_page.php');
// 固定ページ、アーカイブページのpage-head内容編集用の固定ページを取得

require_once get_theme_file_path('/functions/mwform_setting.php');
// MW WP FORMの未入力エラーメッセージ変更・pタグ自動挿入削除

require_once get_theme_file_path('/functions/call_breadcrumb.php');
// パンくずのプラグインを呼び出す

require_once get_theme_file_path('/functions/breadcrumb_setting.php');
// パンくずナビ設定

require_once get_theme_file_path('/functions/ogp.php');
// OGP設定

require_once get_theme_file_path('/functions/mb_str.php');
// 文字列の長さを丸める

require_once get_theme_file_path('/functions/remove_menus.php');
// 管理画面の不要なメニューを非表示

// require_once get_theme_file_path( '/functions/get_terms.php' );
// タクソノミー名投稿に紐づくタームを全て取得