
$( function () {









/*
 *
 * Enquiry form submission
 *
 */
$( document ).on( "submit", ".js_enquiry_form", function ( event ) {
// $( ".js_enquiry_form" ).on( "submit", function ( event ) {

	/* -----
	 * Prevent the default form submission behaviour
	 * 	which triggers the loading of a new page
	 ----- */
	event.preventDefault();

	var $form = $( event.target );


	/* -----
	 * Disable the form
	 ----- */
	$form.find( "input, select, button" ).prop( "disabled", true );
	$form.find( "[ type = 'submit' ] span" ).text( "Sending" );


	/* -----
	 * Pull the data from the form
	 ----- */
	// name
	$name = $form.find( "[ name = 'name' ]" );
	// email address
	$emailAddress = $form.find( "[ name = 'email' ]" );


	/* -----
	 * Sanitize and Validate the data
	 ----- */
	// Remove any prior "error"s
	$form.find( ".js_error" ).removeClass( "js_error" );
	// name
	if ( ! $name.val().trim() ) {
		$name.addClass( "js_error" );
		alert( "Please provide your name." );
	}
	if ( $emailAddress.val().indexOf( "@" ) == -1 ) {
		$emailAddress.addClass( "js_error" );
		alert( "Please provide a valid email address." );
	}
	// If the form has even one error ( i.e. validation issue )
	// do not proceed
	if ( $form.find( ".js_error" ).length ) {
		$form.find( "input, select, button" ).prop( "disabled", false );
		$form.show();
		return;
	}

	/* -----
	 * Process and Assemble the data
	 ----- */
	var names = $name.val().split( /\s+/ );
	var firstName = names[ 0 ];
	var lastName = names.slice( 1 ).join( " " );
	var emailAddress = $emailAddress.val();

	var _id = __OMEGA.user._id;
	var project = "Klassik Landmark";
	var userData = {
		"First Name": firstName,
		"Last Name": lastName,
		"Email": emailAddress
	}

	/* -----
	 * Store the data on the side
	 ----- */
	__OMEGA.user = Object.assign( __OMEGA.user, {
		firstName: firstName,
		lastName: lastName,
		email: emailAddress
	} );
	__OMEGA.user.name = firstName;
	if ( lastName )
		__OMEGA.user.name += " " + lastName;



	/* -----
	 * Submit the data
	 ----- */
	// Update the user
	__OMEGA.utils.updateUser( _id, project, userData )
		.then( function () {
			// Show a feedback message
			$form.find( "[ type = 'submit' ] span" ).text( "We'll call you shortly." );
			// Hide the form
			// $form.fadeOut();
		} )
		.catch( function ( e ) {
			alert( e.message )
			/* -----
			 * Re-enable the form
			 ----- */
			// $form.find( "[ type = submit ]" ).val( function () {
			// 	return $( this ).data( "initial" );
			// } );
			$form.find( "[ type = submit ] span" ).text( "Send" );
			$form.find( "input, select, button" ).prop( "disabled", false );
			// Show the form
			$form.show();
		} )

} );









} );
