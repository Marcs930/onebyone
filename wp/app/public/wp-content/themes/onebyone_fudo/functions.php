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

// require_once get_theme_file_path('/functions/ogp.php');
// OGP設定

require_once get_theme_file_path('/functions/mb_str.php');
// 文字列の長さを丸める

require_once get_theme_file_path('/functions/remove_menus.php');
// 管理画面の不要なメニューを非表示

// require_once get_theme_file_path( '/functions/get_terms.php' );
// タクソノミー名投稿に紐づくタームを全て取得

// require_once get_theme_file_path('/functions/fudo_setting.php');
// 管理画面の不要なメニューを非表示





/*
 * トップテンプレート切替キャンセル
 * この記述で、オリジナルテーマ内home.phpを読みます。
 *
 * 不動産プラグイン v1.4.0 ～
 */

//標準切替キャンセル (不動産プラグイン v1.4.0 ～)
remove_filter( 'template_include', 'get_post_type_top_template_fudou' );

/*
 * 物件詳細テンプレート切替キャンセル
 * 標準切替キャンセルするだけで、オリジナルテーマ内single-fudo.phpを読みます。
 *
 * 不動産プラグイン v1.4.0 ～
 */

//標準切替キャンセル (不動産プラグイン v1.4.0 ～)
remove_filter( 'template_include', 'get_post_type_single_template_fudou' );

/*
 * 物件リストテンプレート切替
 *
 * 不動産プラグイン v1.5.3 ～
 */

//標準切替キャンセル (不動産プラグイン v1.5.3 ～)
remove_filter( 'template_include', 'get_post_type_archive_template_fudou' , 11);


//オリジナルテーマ内 archive-fudo.php を読み込むように再設定。
function fudo_body_org_class( $class ) {
   $class[0] = 'archive archive-fudo';
   return $class;
}
function get_post_type_archive_org_template( $template = '' ) {
   global $wp_query;
   $cat = $wp_query->get_queried_object();
   $cat_name = isset( $cat->taxonomy ) ? $cat->taxonomy : '';

   if ( isset( $_GET['bukken'] ) || isset( $_GET['bukken_tag'] )
         || $cat_name == 'bukken' || $cat_name =='bukken_tag' ) {
      status_header( 200 );
      $template = locate_template( array('archive-fudo.php', 'archive.php') );
      add_filter( 'body_class', 'fudo_body_org_class' );
    }
   return $template;
}
add_filter( 'template_include', 'get_post_type_archive_org_template' , 11 );