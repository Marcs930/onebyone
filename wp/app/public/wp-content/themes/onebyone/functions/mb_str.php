<?php
function mb_str( $text, $length, $add){
    $strLength = mb_strlen( $text, "UTF-8");
    if( $strLength > $length ) {
        $text = mb_substr( $text, 0, $length, 'UTF-8' );
        return $text.$add;
    } else {
        return $text;
    }
}
