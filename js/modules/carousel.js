
/*
 *
 * This handles the interaction of the arrow buttons on either side of the
 * 	carousel.
 *
 */
$( document ).on( "click", ".js_carousel_container .js_pager", function ( event ) {

	/*
	 * 1. Get references to all the relevant elements
	 */
	var $carouselArrowButton = $( event.target ).closest( ".js_pager" );
	var domCarouselContent = $carouselArrowButton
				.closest( ".js_carousel_container" )
				.find( ".js_carousel_content" )
				.get( 0 );

	/*
	 * 2. Figure out the "current" carousel item, i.e. the one that's in the center
	 */
	var { top, left, width, height } = domCarouselContent.getBoundingClientRect();
	// We get the bottom padding of the carousel because we want it to be
	//  	carousable even when the carousel is just about off the screen.
	var carouselPaddingBottom = parseInt( getComputedStyle( domCarouselContent ).paddingBottom, 10 );
	var contentXMidpoint = left + width / 2;
	var contentYPoint = top + ( height - carouselPaddingBottom - 1 );
	var domCurrentItem = document.elementFromPoint( contentXMidpoint, contentYPoint );
	var $currentItem = $( domCurrentItem ).closest( ".js_carousel_item" );

	/*
	 * 3. Get the "next" carousel item in the sequence
	 * 	This could be either the preceeding or the following item,
	 * 	depending on the arrow's direction.
	 */
	var $nextItem;
	var scrollDirection = $carouselArrowButton.data( "dir" );
	if ( scrollDirection == "left" )
		$nextItem = $currentItem.prev( ".js_carousel_item" );
	else
		$nextItem = $currentItem.next( ".js_carousel_item" );

	/*
	 * 4. Get the amount of scroll that has to be done to center the next item
	 */
	var scrollOffset;
	if ( $nextItem.length )
		scrollOffset = ( $nextItem.get( 0 ).offsetLeft + $nextItem.innerWidth() / 2 )
						- ( width / 2 );
	else	// there is no "next" item because the current one is at the boundary
		return;

	/*
	 * 5. Finally, scroll the carousel.
	 */
	try {
		domCarouselContent.scrollTo( { left: scrollOffset, behavior: "smooth" } );
	}
	catch ( e ) {
		domCarouselContent.scrollTo( scrollOffset, 0 );
	}

} );



/*
 *
 * Type 2: No native scroll
 * This handles the interaction of the arrow buttons on either side of the
 * 	carousel.
 *
 */
$( document ).on( "video/initialize/carousel", function ( event, data ) {

	var $carouselContainer = $( ".js_carousel_preview_container" );
	$carouselContainer.find( ".js_pager" ).removeClass( "no-pointer" )
	$carouselContainer.find( ".js_carousel_content" ).removeClass( "no-pointer" )

} );

$( document ).on( "click", ".js_carousel_preview_container .js_pager", function ( event ) {

	/*
	 * 1. Get references to all the relevant elements
	 */
	var $carouselArrowButton = $( event.target ).closest( ".js_pager" );
	var $carouselContainer = $carouselArrowButton.closest( ".js_carousel_preview_container" );
	var $carouselContent = $carouselContainer.find( ".js_carousel_content" )
	var $currentItem = $carouselContent.find( ".js_carousel_item.active" );

	/*
	 * 2. Get the "next" carousel item in the sequence
	 * 	This could be either the preceeding or the following item,
	 * 	depending on the arrow's direction.
	 */
	var $nextItem;
	var scrollDirection = $carouselArrowButton.data( "dir" );
	if ( scrollDirection == "left" )
		$nextItem = $currentItem.prev( ".js_carousel_item" );
	else
		$nextItem = $currentItem.next( ".js_carousel_item" );

	/*
	 * 3. Mark the new carousel item
	 */
	if ( ! $nextItem.length )
		if ( scrollDirection == "left" )
			$nextItem = $carouselContent.find( ".js_carousel_item" ).last()
		else
			$nextItem = $carouselContent.find( ".js_carousel_item" ).first()

	$currentItem.removeClass( "active" );
	$nextItem.addClass( "active" );

	/*
	 * ?. Set the video on the carousel player
	 */
	var $video = $carouselContainer.find( ".js_video_embed iframe" );
	var videoURL = $video.attr( "src" ).replace(
		/embed\/.+\?/,
		"embed/" + $nextItem.data( "src" ) + "?"
	);
	// $video.data( "src", $nextItem.data( "src" ) );
	$video.attr( "src", videoURL );

} );

// If the carousel item is directly clicked
$( document ).on( "click", ".js_carousel_preview_container .js_carousel_item", function ( event ) {

	/*
	 * 1. Get references to all the relevant elements
	 */
	var $carouselItem = $( event.target ).closest( ".js_carousel_item" );
	if ( $carouselItem.hasClass( "active" ) )
		return;

	var $carouselContainer = $carouselItem.closest( ".js_carousel_preview_container" );
	$carouselContainer.find( ".js_carousel_item" ).removeClass( "active" );
	$carouselItem.addClass( "active" );

	/*
	 * ?. Set the video on the carousel player
	 */
	var $video = $carouselContainer.find( ".js_video_embed iframe" );
	var videoURL = $video.attr( "src" ).replace(
		/embed\/.+\?/,
		"embed/" + $carouselItem.data( "src" ) + "?"
	);
	// $video.data( "src", $carouselItem.data( "src" ) );
	$video.attr( "src", videoURL );

} );
