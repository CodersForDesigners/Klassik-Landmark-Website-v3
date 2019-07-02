
$( function () {









/*
 *
 * Enquiry form submission
 *
 */
$( document ).on( "submit", ".js_brochure_form", function ( event ) {

	/* -----
	 * Prevent the default form submission behaviour
	 * 	which triggers the loading of a new page
	 ----- */
	event.preventDefault();

	var $form = $( event.target );


	/* -----
	 * Disable the form
	 ----- */
	$form.find( "input, select, textarea, button" ).prop( "disabled", true );
	$form.find( "[ type = 'submit' ] span" ).text( "Sending" );


	/* -----
	 * Pull the data from the form
	 ----- */
	// name
	$name = $form.find( "[ name = 'name' ]" );
	// address
	$address = $form.find( "[ name = 'address' ]" );


	/* -----
	 * Sanitize and Validate the data
	 ----- */
	// Remove any prior "error"s
	$form.find( ".form-error" ).removeClass( "form-error" );
	// name
	if ( ! $name.val().trim() ) {
		$name.addClass( "form-error" );
		alert( "Please provide your name." );
	}
	// address
	if ( ! $address.val().trim() ) {
		$address.addClass( "form-error" );
		alert( "Please provide your address." );
	}
	// If the form has even one error ( i.e. validation issue )
	// do not proceed
	if ( $form.find( ".form-error" ).length ) {
		$form.find( "input, select, textarea, button" ).prop( "disabled", false );
		$form.show();
		return;
	}


	/* -----
	 * Process and Assemble the data
	 ----- */
	var name = $name.val().trim();
	var address = $address.val().trim();


	/* -----
	 * Submit the data
	 ----- */
	var subject = "Brochure Request";
	var description = `
		${ name } ( UID ${ __OMEGA.user.uid } ) has requested for a brochure.
		This is the address:
		${ address }
	`.trim();
	// First, make a note
	__OMEGA.utils.addNoteToUser( subject, description )
		.then( function () {
			// Then, create an activity
			__OMEGA.utils.createActivityForCustomer( subject, description, __OMEGA.user._id );
			/* -----
			 * Provide some feedback
			 ----- */
			$form.find( "[ type = submit ] span" ).text( "We'll call you shortly." );
		} );

} );









} );
