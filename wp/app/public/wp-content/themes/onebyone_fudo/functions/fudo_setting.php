<?php
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