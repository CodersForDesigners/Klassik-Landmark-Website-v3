
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
var $enquiryFormSite = $( "[ data-loginner = 'Enquiry' ]" );
Loginner.registerLoginPrompt( "Enquiry", {
	onTrigger: function ( event ) {
		var $enquiryForm = $enquiryFormSite.find( ".js_enquiry_form" );
		var $phoneForm = $enquiryFormSite.find( ".loginner_form_phone" );

		// Copy over the phone number values from the Enquiry form
		var phoneCountryCode = $enquiryForm.find( ".js_phone_country_code_label" ).val();
		var phoneNumber = $enquiryForm.find( ".js_phone_number" ).val().replace( /\D/g, "" );
		$enquiryForm.find( ".js_phone_number" ).val( phoneNumber );
		// Paste them values over to the Phone form
		$phoneForm.find( ".js_phone_country_code" ).val( phoneCountryCode );
		$phoneForm.find( ".js_phone_number" ).val( phoneNumber );

		// Submit the Phone form under the hood
		$phoneForm.trigger( "submit" );
	},
	onPhoneValidationError: function ( message ) {
		__OMEGA.utils.notify( message, {
			level: "error",
			context: "Login Prompt"
		} );
		console.log( message )
	},
	onPhoneSend: function ( phoneNumber, project ) {
		$enquiryFormSite.find( ".js_enquiry_form" )
			.find( "[ type = submit ] span" ).text( "Sending" );
	},
	onShowOTP: function ( domPhoneForm, domOTPForm, phoneNumber, project ) {
		$enquiryFormSite.find( ".js_enquiry_form" ).addClass( "hidden" )
			.find( "[ type = submit ] span" ).text( "Send" );
		$( domOTPForm ).removeClass( "hidden" );
		__OMEGA.utils.addPotentialCustomer( phoneNumber, project );
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
	onOTPVerified: function ( context, phoneNumber, project ) {
		var url = "track/enquire-now";
		__OMEGA.utils.trackPageVisit( url );

		// For Facebook
		var fbUrl = window.location.pathname;
		if ( window.location.search )
			fbUrl += window.location.search + "&enquiry=true";
		else
			fbUrl += "?enquiry=true";
		fbUrl += window.location.hash;
		history.pushState( { }, "", fbUrl );

		__OMEGA.utils.verifyPotentialCustomer( phoneNumber, project );
	},
	onLogin: function ( user, context ) {

		$( this )
			.find( "input, select, button" )
			.prop( "disabled", true )

		// __OMEGA.utils.trackPageVisit( url );

		// Restore the URLs from the anchor elements
		var $trapSite = $( this ).closest( "[ data-loginner ]" );
		$trapSite.find( "a" ).each( function ( _i, domAnchor ) {
			var $anchor = $( domAnchor );
			var url = $anchor.data( "href" );
			$anchor.attr( "href", url );
		} );

		// Restore the URLs from the anchor elements
		var $trapSite = $( this ).closest( "[ data-loginner ]" );
		$trapSite.find( "a" ).each( function ( _i, domAnchor ) {
			var $anchor = $( domAnchor );
			var url = $anchor.data( "href" );
			$anchor.attr( "href", url );
		} );

		// Show and Submit the underlying Enquiry form
		$( this ).addClass( "hidden" );
		$( ".js_enquiry_form" )
			.removeClass( "hidden js_user_required" )
			.trigger( "submit" );

	}
} );


/* -- Brochure -- */
var $brochureFormSite = $( "[ data-loginner = 'Brochure' ]" );
Loginner.registerLoginPrompt( "Brochure", {
	onTrigger: function ( event ) {
		$brochureFormSite
			.find( ".js_get_brochure" )
			.addClass( "hidden" );
		$brochureFormSite
			.find( ".loginner_form_phone" )
				.removeClass( "hidden" );
	},
	onPhoneValidationError: function ( message ) {
		__OMEGA.utils.notify( message, {
			level: "error",
			context: "Login Prompt"
		} );
		console.log( message )
	},
	onPhoneSend: function ( phoneNumber, project ) {
		$( this ).find( "[ type = submit ] span" ).text( "Sending" );
	},
	onShowOTP: function ( domPhoneForm, domOTPForm, phoneNumber, project ) {
		$( domPhoneForm ).addClass( "hidden" );
		$( domOTPForm ).removeClass( "hidden" );
		__OMEGA.utils.addPotentialCustomer( phoneNumber, project );
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
	onOTPVerified: function ( context, phoneNumber, project ) {
		var url = "track/brochure";
		__OMEGA.utils.trackPageVisit( url );
		__OMEGA.utils.verifyPotentialCustomer( phoneNumber, project );

		// For Facebook
		var fbUrl = window.location.pathname;
		if ( window.location.search )
			fbUrl += window.location.search + "&enquiry=true";
		else
			fbUrl += "?enquiry=true";
		fbUrl += window.location.hash;
		history.pushState( { }, "", fbUrl );

	},
	onLogin: function ( user, context ) {

		$( this )
			.find( "input, select, button" )
			.prop( "disabled", true )

		// Restore the URLs from the anchor elements
		var $trapSite = $( this ).closest( "[ data-loginner ]" );
		$trapSite.find( "a" ).each( function ( _i, domAnchor ) {
			var $anchor = $( domAnchor );
			var url = $anchor.data( "href" );
			$anchor.attr( "href", url );
		} );

		// Show and Submit the underlying Brochure download button
		$( this ).addClass( "hidden" );
		$brochureFormSite
			.find( ".js_get_brochure" )
			.removeClass( "hidden" );

	}
} );


/* -- Air Quality Certificate -- */
var $airCertificateFormSite = $( "[ data-loginner = 'Air Certificate' ]" );
Loginner.registerLoginPrompt( "Air Certificate", {
	onTrigger: function ( event ) {
		$airCertificateFormSite
			.find( ".js_get_air_certificate" )
			.addClass( "hidden" );
		$airCertificateFormSite
			.find( ".loginner_form_phone" )
				.removeClass( "hidden" );
	},
	onPhoneValidationError: function ( message ) {
		__OMEGA.utils.notify( message, {
			level: "error",
			context: "Login Prompt"
		} );
		console.log( message )
	},
	onPhoneSend: function ( phoneNumber, project ) {
		$( this ).find( "[ type = submit ] span" ).text( "Sending" );
	},
	onShowOTP: function ( domPhoneForm, domOTPForm, phoneNumber, project ) {
		$( domPhoneForm ).addClass( "hidden" );
		$( domOTPForm ).removeClass( "hidden" );
		__OMEGA.utils.addPotentialCustomer( phoneNumber, project );
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
	onOTPVerified: function ( context, phoneNumber, project ) {
		var url = "track/aq-certificate";
		__OMEGA.utils.trackPageVisit( url );
		__OMEGA.utils.verifyPotentialCustomer( phoneNumber, project );

		// For Facebook
		var fbUrl = window.location.pathname;
		if ( window.location.search )
			fbUrl += window.location.search + "&enquiry=true";
		else
			fbUrl += "?enquiry=true";
		fbUrl += window.location.hash;
		history.pushState( { }, "", fbUrl );

	},
	onLogin: function ( user, context ) {

		$( this )
			.find( "input, select, button" )
			.prop( "disabled", true )

		// Restore the URLs from the anchor elements
		var $trapSite = $( this ).closest( "[ data-loginner ]" );
		$trapSite.find( "a" ).each( function ( _i, domAnchor ) {
			var $anchor = $( domAnchor );
			var url = $anchor.data( "href" );
			$anchor.attr( "href", url );
		} );

		// Show and Submit the underlying Brochure download button
		$( this ).addClass( "hidden" );
		$airCertificateFormSite
			.find( ".js_get_air_certificate" )
			.removeClass( "hidden" );

	}
} );

/* -/-/-/-/- CODE ENDS HERE -/-/-/-/- */









}( jQuery ) );
