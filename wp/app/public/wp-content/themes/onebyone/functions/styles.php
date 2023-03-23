<?php
function my_enqueue_style(){
    // wp_enqueue_style('vendors', get_template_directory_uri() . '/assets/css/vendors.89ea0ef456f5bf7efcbd.css');
    // wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.d052eca6a7ba55f4a9e9.css');
    wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/style.css');
    // wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.b89b57520fc7d8ab397d.css');
}
add_action('wp_enqueue_scripts', 'my_enqueue_style');