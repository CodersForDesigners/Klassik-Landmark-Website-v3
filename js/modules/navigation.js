
var adaptMenuToScroll = function () {

	var lastScrollTopPosition = window.scrollY || document.body.scrollTop
	var $navigationMenu = $( ".js_navigation_section" )

	return function adaptMenuToScroll () {

		var currentScrollTopPosition = window.scrollY || document.body.scrollTop;

		// When scrolling down, push the menu down a bit
		if ( currentScrollTopPosition > lastScrollTopPosition )
			$navigationMenu.removeClass( "show" );
		// When scrolling up, pull the menu up a bit
		else if ( currentScrollTopPosition < lastScrollTopPosition )
			$navigationMenu.addClass( "show" );

		lastScrollTopPosition = currentScrollTopPosition;

	};

}();

window.onscroll = adaptMenuToScroll;
