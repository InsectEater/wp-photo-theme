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


setInterval( function() {
	let $banner = jQuery( '.wpt-page-banner' );
	let num = $banner.attr( 'data-num' );
	num = undefined === num ? 0 : num;
	if ( num >= site_data.background_photos.length )
		num = 0;

	if ( site_data.background_photos[num] && site_data.background_photos[num].sizes ) {
		$banner.css( 'background-image', 'url("' + site_data.background_photos[num].sizes.large + '")' );
		num++;
		$banner.attr( 'data-num', num );
	}
	
}, 5000 );

// console.log( site_data );