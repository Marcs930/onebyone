<?php
/**
 * my_error_message
 * @param string $error
 * @param string $key
 * @param string $rule（半角小文字）
 */
function my_error_message($error, $key, $rule)
{
    // if ($key === 'お名前' && $rule === 'noempty') {
    //     return 'お名前は必須項目です';
    // }
    $target = "";
    if ( $key === "company" ) {
        $target = "会社名";
    }
    elseif( $key === "name" ) {
        $target = "お名前";
    }
    elseif( $key === "email" ) {
        $target = "メールアドレス";
    }
    elseif( $key === "inquiry" ) {
        $target = "お問い合わせ内容";
    }
    else {
        $target = "";
    }
    return "${target}は必須項目です";
}
add_filter('mwform_error_message_mw-wp-form-211', 'my_error_message', 10, 3);

function custom_mwform_error_message_html( $tag, $error ) {
    $start_tag = '<p class="form_error">';
    $end_tag = '</p>';
    return $start_tag . esc_html( $error ) . $end_tag;
}
add_filter( 'mwform_error_message_html', 'custom_mwform_error_message_html', 10, 2 );

// pタグの自動挿入を無効にする
remove_filter('the_content', 'wpautop');
