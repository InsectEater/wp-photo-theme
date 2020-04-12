<?php
function wpt_enqueue_styles() {

    wp_enqueue_style( 'font-comfortaa', 'https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap', [], wp_get_theme()->get('Version') );
    wp_enqueue_style( 'main-style', get_stylesheet_directory_uri() . '/style.css', ['font-comfortaa'], wp_get_theme()->get('Version') );
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

function wpt_register_scripts() {
    $theme_version = wp_get_theme()->get( 'Version' );
    wp_enqueue_script( 'main-script', get_template_directory_uri() . '/js/main-script.js', ['jquery'], $theme_version, true );

    $wpt_js_data = [
        'some_string' => __( 'Some string to translate', 'plugin-domain' ),
    ];
    $wpt_js_data = apply_filters( 'wpt_js_data', $wpt_js_data );
	wp_localize_script( 'main-script', 'wpt_js_data', $wpt_js_data );

}
add_action( 'wp_enqueue_scripts', 'wpt_register_scripts' );

/**
 * Get background photos fields from the home page (ACF based) and add them to the javascript data, if there is any
 * and the ACF plugin is installed
 *
 * @param array $wpt_js_data Javascript array data which will be injected
 *
 * @return array $wpt_js_data Javascript array with injected data
 */

function wpt_inject_background_photos( $wpt_js_data ) {
    if ( ! function_exists("get_field" ) ) return $wpt_js_data;
    $background_photos = [];
   	$frontpage_id = get_option( 'page_on_front' );

   	$i = 1;
    $field = get_field( "background_photo_$i", $frontpage_id );
   	while( ! is_null( $field ) ) {
   	    if ( $field ) $background_photos[] = $field;
   	    $i++;
        $field = get_field( "background_photo_$i", $frontpage_id ) ;
    }
    $wpt_js_data[ 'background_photos' ] = $background_photos;

    $background_photos_interval = get_field( 'background_photos_interval', $frontpage_id );
    $wpt_js_data[ 'background_photos_interval' ] = $background_photos_interval;
    $transition_time = get_field( 'transition_time', $frontpage_id );
    $wpt_js_data[ 'transition_time' ] = $transition_time;
    return ( $wpt_js_data );
}
add_filter( 'wpt_js_data', 'wpt_inject_background_photos' );