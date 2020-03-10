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

function wpt_register_scripts() {
    $theme_version = wp_get_theme()->get( 'Version' );
    wp_enqueue_script( 'main-script', get_template_directory_uri() . '/js/main-script.js', ['jquery'], $theme_version, true );

    $background_photos = [];
	$frontpage_id = get_option( 'page_on_front' );
	for ( $i = 1; $i <= 3; $i++ ) {
		$field = get_field( "background_photo_$i", $frontpage_id ) ;
		if ( $field ) {
			$background_photos[] = $field;
		}
	}
	$translation_array = array(
	    'some_string' => __( 'Some string to translate', 'plugin-domain' ),
	    'background_photos' => $background_photos
	);
	wp_localize_script( 'main-script', 'site_data', $translation_array );

}
add_action( 'wp_enqueue_scripts', 'wpt_register_scripts' );



// Enqueued script with localized data.
// wp_enqueue_script( 'some_handle' );