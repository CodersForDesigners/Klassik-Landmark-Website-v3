
( function ( $ ) {









/* -/-/-/-/- CODE STARTS HERE -/-/-/-/- */

/*
 *
 * Mask away the URLs from the anchor elements until after the traps are "traversed"
 *
 */
var $trapSites = $( ".loginner_form_phone" ).closest( "[ data-loginner ]" );
$trapSites.find( "a" ).each( function ( _i, domAnchor ) {
	var $anchor = $( domAnchor );
	var url = $anchor.attr( "href" );
	$anchor.removeAttr( "href" );
	$anchor.data( "href", url );
} );

/*
 *
 * Wire in the phone country code UI
 *
 */
$( document ).on( "change", ".js_phone_country_code", function ( event ) {
	var $countryCode = $( event.target );
	var countryCode = "(" + $countryCode.val().replace( /[^+0-9]/g, "" ) + ")";
	$countryCode
		.closest( "form" )
		.find( ".js_phone_country_code_label" )
		.val( countryCode );
} );

/*
 *
 * Register all the phone traps
 *
 */
/* -- Enquiry form -- */
var $enquiryFormSite = $( "[ data-loginner = 'Brochure' ]" );
Loginner.registerLoginPrompt( "Brochure", {
	context: "Walk-in at Site",
	onTrigger: function ( event ) {
		$( ".js_brochure_form" ).addClass( "hidden" );
		$enquiryFormSite
			.find( ".loginner_form_phone" )
				.removeClass( "hidden" )
				.find( ".js_phone_number" )
					.get( 0 ).focus();
	},
	onPhoneValidationError: function ( message ) {
		__OMEGA.utils.notify( message, {
			level: "error",
			context: "Login Prompt"
		} );
		console.log( message )
	},
	onPhoneSend: function () {
		$( this ).find( "[ type = submit ] span" ).text( "Sending" );
	},
	onShowOTP: function ( domPhoneForm, domOTPForm ) {
		$( domPhoneForm ).addClass( "hidden" );
		$( domOTPForm ).removeClass( "hidden" );
	},
	onOTPSend: function () {
		$( this ).find( "[ type = submit ] span" ).text( "Sending" );
	},
	onPhoneError: function ( code, message ) {
		__OMEGA.utils.notify( message, {
			level: "error",
			context: "Login Prompt"
		} );
		console.log( message )
		$( this ).find( "[ type = submit ] span" ).text( "Send" );
		$( this ).find( "input, select, button" ).prop( "disabled", false );
	},
	onOTPError: function ( code, message ) {
		__OMEGA.utils.notify( message, {
			level: "error",
			context: "Login Prompt"
		} );
		$( this ).find( "[ type = submit ] span" ).text( "Send" );
		$( this ).find( "input, select, button" ).prop( "disabled", false );
	},
	onOTPVerified: function ( context, phoneNumber ) {
		var url = "track/brochure-request";
		__OMEGA.utils.trackPageVisit( url );
	},
	onLogin: function ( user, context ) {

		$( this )
			.find( "input, select, button" )
			.prop( "disabled", true )

		// Show and Submit the underlying Enquiry form
		$( this ).addClass( "hidden" );
		$( ".js_brochure_form" )
			.removeClass( "hidden js_user_required" )
			.trigger( "submit" );

	}
} );

/* -/-/-/-/- CODE ENDS HERE -/-/-/-/- */









}( jQuery ) );
