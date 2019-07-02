
$( document ).on( "click", ".js_track", function ( event ) {
	var url = $( event.target ).closest( ".js_track" ).data( "url" );
	__OMEGA.utils.trackPageVisit( url );
} );
