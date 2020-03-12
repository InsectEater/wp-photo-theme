jQuery( '.wpt-page-banner' ).on( 'click', function( e ) {
	if ( jQuery( e.target ).closest( '.menu-item-has-children' ).length === 0 )
		jQuery( '.active' ).removeClass( 'active' );
} );
jQuery( '.menu-item-has-children' ).on( 'click', function( e ) {
	jQuery( '.active' ).addClass( 'toggling' );
	jQuery(this).toggleClass( 'active' );
	jQuery( '.toggling' ).removeClass( 'active' );
	jQuery( '.toggling' ).removeClass( 'toggling' );
});

jQuery( '.mobile-menu-button' ).on( 'click', function() {
	jQuery('.mobile-menu-wrapper').toggleClass( 'm-active' )
} );

function wpt_preload_background_photos () {
	let loaded_images = new Array();
	if ( wpt_js_data.background_photos ) {
		for( let i = 0; i < wpt_js_data.background_photos.length; i++ ) {
			let img_url = wpt_js_data.background_photos[i].sizes.large;
			if ( ! img_url ) continue;
			var img = new Image();
			img.onload = function() {
				var index = loaded_images.indexOf( this );
				if ( index !== -1 ) {
					// remove image from the array once it's loaded
					// for memory consumption reasons
					loaded_images.splice( index, 1 );
				}
			}
			loaded_images.push( img );
			img.src = img_url;
		}
	}
}

function wpt_rotate_photos() {
	wpt_preload_background_photos();
	jQuery( '.wpt-page-banner' ).css( {'background-color': 'transparent', 'background-image' : 'none'} );
	if ( ! wpt_js_data.background_photos &&  ! wpt_js_data.background_photos.length ) return;
	wpt_set_background_photo();
	let transition_time =  wpt_js_data.transition_time ?  wpt_js_data.transition_time * 1 : 2000;


	let background_photos_interval = wpt_js_data.background_photos_interval ? wpt_js_data.background_photos_interval : 5000;
		setInterval( wpt_set_background_photo, background_photos_interval * 1 + transition_time * 2 );
}
wpt_rotate_photos();

function wpt_set_background_photo( ) {
	//Because firefox do not support background-image transitions, we have to do it the hard way
	//We create two containers. The top container fades in then is removed.
	let $banner_container = jQuery('.wpt-page-banner');
	let num = $banner_container.attr( 'data-num' );
	if ( undefined === num ) {
		$banner_container.attr( 'data-num', 0 );
		let bgr_url =  wpt_js_data.background_photos[0].sizes.large;
		$banner_container.prepend('<div id="banner" style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; background-image: url('+bgr_url+'); z-index: -1"></div>');
		return;
	}
	num1 = num * 1 + 1;
	num1 = wpt_js_data.background_photos[num1] ? num1 : 0;
	if ( ! wpt_js_data.background_photos[num1].sizes  || ! wpt_js_data.background_photos[num1].sizes.large ) {
		$banner_container.attr( 'data-num', num1 );
		return;
	}
	let new_bgr_url = wpt_js_data.background_photos[num1].sizes.large;

	let $banner = jQuery('#banner');
	let transition_time =  wpt_js_data.transition_time ?  wpt_js_data.transition_time * 1 : 2000;
// debugger;
	$banner.after( '<div id="banner1" style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; background-color: blue; z-index: -1; opacity: 0; background-image: url('+ new_bgr_url +')"></div>' );
	let $banner1 = jQuery( '#banner1' );
	$banner1.animate( {opacity: '1'}, transition_time * 1, 'swing', function() {
		$banner.css( 'background-image', 'url(' + new_bgr_url + ')' ).animate( { opacity: '1' }, 100, 'swing', function() {
			$banner1.remove();
		} );
	});
	$banner_container.attr( 'data-num', num1 );
}
