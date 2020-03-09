<?php
function wpt_enqueue_styles() {
    wp_enqueue_style( 'main-style',get_stylesheet_directory_uri() . '/style.css', [], wp_get_theme()->get('Version') );
}
add_action( 'wp_enqueue_scripts', 'wpt_enqueue_styles' );


add_theme_support( 'menus' );
function wpt_menus() {
    $locations = array(
        'primary'   => __( 'Desktop Horizontal Menu', 'wpt' ),
        'social'    => __( 'Social Menu', 'wpt' ),
    );
    register_nav_menus( $locations );
}

add_action( 'init', 'wpt_menus' );
