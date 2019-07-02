
$( function () {









/*
 *
 * Review form submission
 *
 */
$( document ).on( "submit", ".js_review_form", function ( event ) {

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
	// notes
	$notes = $form.find( "[ name = 'notes' ]" );


	/* -----
	 * Sanitize and Validate the data
	 ----- */
	// Remove any prior "error"s
	$form.find( ".form-error" ).removeClass( "form-error" );
	// notes
	if ( ! $notes.val().trim() ) {
		$notes.addClass( "form-error" );
		alert( "Please provide feedback." );
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
	var notes = $notes.val().trim();


	/* -----
	 * Submit the data
	 ----- */
	var heading = "Experience Review";
	var content = `
		Has this to say:
		"${ notes }"
	`.trim();
	// Add this review as a notes to customer's record
	__OMEGA.utils.addNoteToUser( heading, content )
		.then( function () {
			/* -----
			 * Provide some feedback
			 ----- */
			$form.find( "[ type = submit ] span" ).text( "Thanks for the feedback." );
			$form.find( "[ type = submit ] img" ).remove();
		} );

} );









} );
