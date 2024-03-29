<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Tracking</title>

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-TKCJ5FN');</script>
	<!-- End Google Tag Manager -->

	<!-- Hotjar Tracking Code for http://klassikbuild.com -->
	<script>
		(function(h,o,t,j,a,r){
			h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
			h._hjSettings={hjid:995458,hjsv:6};
			a=o.getElementsByTagName('head')[0];
			r=o.createElement('script');r.async=1;
			r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
			a.appendChild(r);
		})(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
	</script>

</head>



<body>

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TKCJ5FN"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<!-- This is just for the page to have some dimensions -->
	<div style="height: 2500px; background-color: ghostwhite"></div>

	<script type="text/javascript">

		// Simply log to the console when scrolling
		window.onscroll = function () {
			console.log( "scrolling." )
		}

		/*
		 * Send a message to the parent page, telling it your "ready"
		 */
		window.onload = function () {
			setTimeout( function () {
				window.parent.postMessage( {
					status: "ready"
				}, location.origin );
				simulateScrolling();
			}, 1000 );
		};


		/*
		 * Wait for a bit and then run a given function
		 */
		function waitFor ( seconds ) {
			seconds = seconds || 1;
			return new Promise( function ( resolve, reject ) {
				setTimeout( function () {
					resolve();
				}, seconds * 1000 );
			} );
		}

		/*
		 * Simulate a scroll up and down the page
		 */
		function simulateScrolling () {

			var pageHeight = document.body.scrollHeight;

			waitFor()
				.then( function () {
					window.scrollTo( 0, pageHeight );
					return waitFor();
				} )
				.then( function () {
					window.scrollTo( 0, 0 );
					return waitFor();
				} )
				.then( function () {
					window.scrollTo( 0, pageHeight );
					return waitFor();
				} )
				.then( function () {
					window.scrollTo( 0, 0 );
					return waitFor();
				} )
				.then( function () {
					window.scrollTo( 0, pageHeight );
					return waitFor();
				} )

		}

	</script>





</body>

</html>
