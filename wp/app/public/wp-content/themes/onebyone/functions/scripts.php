<?php
function my_enqueue_script() {
    // wp_enqueue_script( 'jquery' );
    // wp_enqueue_script('test', get_template_directory_uri() . '/assets/js/test.js', array(), '', true);
    wp_enqueue_script('icon', 'https://kit.fontawesome.com/df12ee1b26.js', array(), '', true);
    // wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array(), '', true);
    wp_enqueue_script('accordion', get_template_directory_uri() . '/assets/js/utils/accordion.js', array(), '', true);
    wp_enqueue_script('side', get_template_directory_uri() . '/assets/js/utils/side.js', array(), '', true);
    wp_enqueue_script('spnav', get_template_directory_uri() . '/assets/js/utils/spnav.js', array(), '', true);
    wp_enqueue_script('header_fixed', get_template_directory_uri() . '/assets/js/utils/header_fixed.js', array(), '', true);
    wp_enqueue_script('scroll', get_template_directory_uri() . '/assets/js/utils/scroll.js', array(), '', true);
    wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/js/utils/swiper.js', array(), '', true);
    wp_enqueue_script('common', get_template_directory_uri() . '/assets/js/common.js', array(), '', true);
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array(), '', true);
    // wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.95228265f04b9f1a9349.js', array(), '', true);
    // wp_enqueue_script('utils', get_template_directory_uri() . '/assets/js/utils.8aa79dd1cbd39628c355.js', array(), '', true);
    // wp_enqueue_script('vendors', get_template_directory_uri() . '/assets/js/vendors.89ea0ef456f5bf7efcbd.js', array('utils'), '', true);
    // wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.644932481380e730e0f6.js', array('vendors'), '', true);
}
add_action('wp_enqueue_scripts', 'my_enqueue_script');