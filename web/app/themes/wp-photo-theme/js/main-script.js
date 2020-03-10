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
