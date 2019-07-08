
( function ( $ ) {









/* -/-/-/-/- CODE STARTS HERE -/-/-/-/- */

// Export to global state
window.__OMEGA = window.__OMEGA || { };
var utils = { };
window.__OMEGA.utils = utils;



/*
 *
 * Wait for the specified number of seconds.
 * This facilitates a Promise or syncrhonous (i.e., using async/await ) style
 * 	of programming
 *
 */
utils.waitFor = function waitFor ( seconds ) {
	return new Promise( function ( resolve, reject ) {
		setTimeout( function () {
			resolve();
		}, seconds * 1000 );
	} );
}



/*
 *
 *
 * Get the current time and date stamp
 *	in Indian Standard Time
 *
 *	reference
 *		https://stackoverflow.com/questions/22134726/get-ist-time-in-javascript
 *
 */
utils.getDateAndTimeStamp = function getDateAndTimeStamp ( options ) {

	options = options || { };
	var ISTOffset = 330 * 60 * 1000;
	var dateObject = new Date( ( new Date() ).getTime() + ISTOffset );

	// Date components
		// Year
	var year = dateObject.getUTCFullYear();
		// Month
	var month = ( dateObject.getUTCMonth() + 1 );
	if ( month < 10 ) month = "0" + month;
		// Day
	var day = dateObject.getUTCDate();
	if ( day < 10 ) day = "0" + day;

	// Time components
		// Hours
	var hours = dateObject.getUTCHours();
	if ( hours < 10 ) hours = "0" + hours;
		// Minutes
	var minutes = dateObject.getUTCMinutes();
	if ( minutes < 10 ) minutes = "0" + minutes;
		// Seconds
	var seconds = dateObject.getUTCSeconds();
	if ( seconds < 10 ) seconds = "0" + seconds;
		// Milli-seconds
	var milliseconds = dateObject.getUTCMilliseconds();
	if ( milliseconds < 10 ) milliseconds = "00" + milliseconds;
	else if ( milliseconds < 100 ) milliseconds = "0" + milliseconds;

	// Assembling all the parts
	var datetimestamp = year
				+ "/" + month
				+ "/" + day

				+ " " + hours
				+ ":" + minutes
				+ ":" + seconds
				+ "." + milliseconds

	if ( options.separator )
		datetimestamp = datetimestamp.replace( /[\/:\.]/g, options.separator );

	return datetimestamp;

}



/*
 *
 * This opens a new page in an iframe and closes it once it has loaded
 *
 */
utils.openPageInIframe = function openPageInIframe ( url, name, options ) {

	options = options || { };
	var closeOnLoad = options.closeOnLoad || false;

	var $iframe = $( "<iframe>" );
	$iframe.attr( {
		width: 0,
		height: 0,
		title: name,
		src: url,
		style: "display:none;",
		class: "js_iframe_trac"
	} );

	$( "body" ).append( $iframe );

	if ( closeOnLoad ) {
		$( window ).one( "message", function ( event ) {
			if ( location.origin != event.originalEvent.origin )
				return;
			var message = event.originalEvent.data;
			if ( message.status == "ready" )
				setTimeout( function () { $iframe.remove() }, 27 * 1000 );
		} );
	}
	else {
		return $iframe.get( 0 );
	}

}



/*
 *
 * Set a cookie asynchronously
 *
 * @params
 * 	name -> the name of the cookie
 * 	data -> it's either an object with data that is to be encoded into the cookie, or a string that is simply to be the cookie's value with no processing whatsoever
 * 	duration -> how long before the cookie expires ( in seconds )
 *
 */
utils.setCookie = function setCookie ( name, data, duration ) {

	var url = location.origin;
	if ( __envProduction ) {
		var domBase = document.getElementsByTagName( "base" );
		if ( domBase.length )
			url += "/" + domBase[ 0 ].getAttribute( "href" ).replace( /\//g, "" );
	}
	url += "/inc/set-cookie-async.php";
	var queryString = "?" + "_cookie=" + encodeURIComponent( name );
	queryString += "&_duration=" + encodeURIComponent( duration );
	if ( typeof data == "string" )
		queryString += "&value=" + encodeURIComponent( data );
	else
		queryString += "&data=" + encodeURIComponent( JSON.stringify( data ) );

	var $iframe = $( "<iframe>" );
	$iframe.attr( {
		width: 0,
		height: 0,
		title: "Set cookie",
		src: url + queryString,
		style: "display:none;",
		class: "js_iframe_cookie_setter"
	} );
	$( "body" ).append( $iframe );

	// Remove the iframe afterwards,
	// when we can safely that the page has been loaded and the cookie set
	setTimeout( function () {
		$iframe.remove()
	}, 5000 );

}



/*
 *
 * "Track" a page visit
 *
 * @params
 * 	name -> the url of the page
 *
 */
utils.trackPageVisit = function trackPageVisit ( name ) {

	/*
	 *
	 * Open a blank page and add the tracking code to it
	 *
	 */
	// Build the URL
	var projectBaseURL = __OMEGA.settings.projectBaseURL;
	var baseURL = location.origin.replace( /\/$/, "" ) + "/" + projectBaseURL;
	name = name.replace( /^[/]*/, "" );
	var url = baseURL + "/" + name;

	// Build the iframe
	var domIframe = utils.openPageInIframe( url, "Tracking and Analytics" );

	setTimeout( function () {

		// Inject the tracking code
		var domDocument = domIframe.contentWindow.document;
		$( domDocument.head ).find( "title" ).text( "Tracking" );
		$( domDocument.head ).append( __OMEGA.settings.beforeClosingHeadTag );
		$( domDocument.body ).prepend( __OMEGA.settings.afterOpeningBodyTag );
		$( domDocument.body ).append( __OMEGA.settings.beforeClosingBodyTag );

		// Remove the iframe after a while
		setTimeout( function () { $( domIframe ).remove() }, 27 * 1000 );

	}, 1500 );

}



/*
 *
 * "Post" a mail
 *
 * @params
 * 	subject -> the subject of the mail
 * 	body -> the body of the mail
 * 	to -> the email-address to send this to
 *
 */
utils.postMail = function postMail ( subject, body, to ) {

	var data = {
		subject,
		body,
		to
	};

	var apiEndpoint = __OMEGA.settings.apiEndpoint;
	var url = apiEndpoint + "/mail";

	var ajaxRequest = $.ajax( {
		url: url,
		method: "POST",
		data: data,
		dataType: "json"
	} );

	return new Promise( function ( resolve, reject ) {
		ajaxRequest.done( function ( response ) {
			resolve( response );
		} );
		ajaxRequest.fail( function ( jqXHR, textStatus, e ) {
			var errorResponse = getErrorResponse( jqXHR, textStatus, e );
			reject( errorResponse );
		} );
	} );

}



/*
 *
 * Add potential customer
 *
 * @params
 * 	phoneNumber -> the phone number of the potential customer
 * 	project -> the client's project
 *
 */
utils.addPotentialCustomer = function addPotentialCustomer ( phoneNumber, project ) {

	var data = {
		phoneNumber,
		project
	};

	var apiEndpoint = __OMEGA.settings.centralApiEndpoint + "/n";
	var url = apiEndpoint + "/potentials";

	var ajaxRequest = $.ajax( {
		url: url,
		method: "POST",
		data: JSON.stringify( data ),
		contentType: "application/json",
		dataType: "json",
		// xhrFields: {
		// 	withCredentials: true
		// }
	} );

	return new Promise( function ( resolve, reject ) {
		ajaxRequest.done( function ( response ) {
			resolve( response );
		} );
		ajaxRequest.fail( function ( jqXHR, textStatus, e ) {
			var errorResponse = getErrorResponse( jqXHR, textStatus, e );
			reject( errorResponse );
		} );
	} );

}



/*
 *
 * "Verify" a potential customer
 *
 * @params
 * 	phoneNumber -> the phone number of the potential customer
 * 	project -> the client's project
 *
 */
utils.verifyPotentialCustomer = function verifyPotentialCustomer ( phoneNumber, project ) {

	var apiEndpoint = __OMEGA.settings.centralApiEndpoint + "/n";
	var url = apiEndpoint + "/potentials/" + phoneNumber + "/" + project;
	var data = { verifiedByOTP: true };

	var ajaxRequest = $.ajax( {
		url: url,
		method: "POST",
		data: JSON.stringify( data ),
		contentType: "application/json",
		dataType: "json",
		// xhrFields: {
		// 	withCredentials: true
		// }
	} );

	return new Promise( function ( resolve, reject ) {
		ajaxRequest.done( function ( response ) {
			resolve( response );
		} );
		ajaxRequest.fail( function ( jqXHR, textStatus, e ) {
			var errorResponse = getErrorResponse( jqXHR, textStatus, e );
			reject( errorResponse );
		} );
	} );

}



/*
 *
 * Show a notification
 *
 * This shows a notification toast with the provided message.
 *
 */
utils.notify = function notify ( message, options ) {
	alert( message );
}
// utils.notify = function notify ( message, options ) {

// 	options = options || { };
// 	var level = options.level || "info";
// 	var context = options.context || "";
// 	var escape = options.escape || false;

// 	if ( ! message ) {
// 		if ( level == "error" )
// 			message = "Something went wrong.";
// 		else
// 			return;
// 	}

// 	// If other notifications exist in the same in the same context, clear those out
// 	if ( context ) {
// 		var $existingNotificationInTheSameContext = __UI.$notificationSection.find( "[ data-context = '" + context + "' ]" );
// 		$existingNotificationInTheSameContext.remove();
// 	}

// 	// An object that maps notification levels to class names
// 	var levelToClassNameMap = {
// 		info: "fill-blue",
// 		success: "fill-green",
// 		error: "fill-red",
// 		alert: "fill-yellow"
// 	};
// 	// Get the corresponding class name for the notification level
// 	var levelClassName = levelToClassNameMap[ level ] || "";
// 	// Get the mark for the notification
// 	var notificationMarkup = __UI.templates.notification( {
// 		message: message,
// 		escape: escape,
// 		context: context,
// 		level: levelClassName
// 	} );
// 	var $notification = $( notificationMarkup );

// 	// Append the notification
// 	__UI.$notificationSection.append( $notification );
// 	// Animate it in
// 	$notification.get( 0 ).offsetTop;
// 	$notification.addClass( "show" );

// 	// "Attempt" to remove the notification after a while
// 	// If the notification has already been removed by hitting the close button,
// 	// 	this will throw up, hence the try/catch block
// 	setTimeout( function () {
// 		try {
// 			$notification.remove();
// 		} catch ( e ) {}
// 	}, 9000 );

// }

/* -/-/-/-/- CODE ENDS HERE -/-/-/-/- */









}( jQuery ) );
