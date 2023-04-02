<?php
function get_main_image() {
    if( is_page()):
        $attachment_id = get_field( 'cover_img' );
        if(is_front_page()):
            return wp_get_attachment_image( $attachment_id, 'top');
        else:
            return wp_get_attachment_image( $attachment_id, 'cover');
        endif;
        // return null;
    elseif( is_archive() && is_tax() ):
        return '<img src="'. get_template_directory_uri() . '/assets/images/5d0c174adf21bce4ac1c.jpg" alt="" />';
    elseif( is_archive() || is_singular() ):
        $id = get_parent_page_id();
        $attachment_id = get_post_meta($id, 'cover_img', true);
        return wp_get_attachment_image( $attachment_id, 'cover');
    elseif( is_404() ):
        return '<img src="'. get_template_directory_uri() . '/assets/images/404.jpg" alt="" />';
    else:
        return '<img src="'. get_template_directory_uri() . '/assets/images/dummy.png" alt="" />';
    endif;
}
