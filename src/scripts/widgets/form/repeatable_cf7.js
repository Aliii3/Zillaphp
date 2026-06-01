
jQuery( function( $ ) {
	$( '.wpcf7-field-groups' ).on( 'wpcf7-field-groups/change', function() {
		var $groups = $( this ).find( '.group-index' );
		$groups.each( function() {
			$( this ).text( $groups.index( this ) + 1 );
		} );
	} ).trigger( 'wpcf7-field-groups/change' );
} );
