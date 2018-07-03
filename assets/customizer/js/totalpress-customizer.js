( function( $ ) {
// Header
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		});
	});
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		});
	});
	wp.customize( 'totalpress_hide_sitetitle', function( value ) {
		value.bind( function( to ) {
			if ( to ) {
				$( 'body' ).addClass( 'no-site-title' ).removeClass('has-site-title');
			} else {
				$( 'body' ).removeClass( 'no-site-title' ).addClass('has-site-title');
			}
		});
	});
	wp.customize( 'totalpress_hide_tagline', function( value ) {
		value.bind( function( to ) {
			if ( to ) {
				$( 'body' ).addClass( 'no-site-tagline' ).removeClass('has-site-tagline');
			} else {
				$( 'body' ).removeClass( 'no-site-tagline' ).addClass('has-site-tagline');
			}
		});
	});
} )( jQuery );