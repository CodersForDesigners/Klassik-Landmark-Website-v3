<?php

/*
 * Get all the links on the site
 */
$defaultLinks = require __DIR__ . '/default-nav-links.php';
$links = getContent( $defaultLinks, 'pages' );

/*
 * Figure out the base URL
 */
$urlPath = strstr( $_SERVER[ 'REQUEST_URI' ], '?', true );
if ( ! $urlPath )
	$urlPath = $_SERVER[ 'REQUEST_URI' ];
$urlFragments = preg_split( '/\//', $urlPath );
	// Pull out the first non-empty fragment
$calculatedBaseSlug = '';
$inferredBaseSlug = $_GET[ '_slug' ] ?? '';
foreach ( $urlFragments as $fragment ) {
	if ( ! empty( $fragment ) ) {
		$calculatedBaseSlug = $fragment;
		break;
	}
}
if ( $inferredBaseSlug == $calculatedBaseSlug )
	$baseURL = '';
else
	$baseURL = '/' . $calculatedBaseSlug . '/';

/*
 * Get the title and URL of the website and current page
 */
// $siteUrl = getSiteUrl();
$siteTitle = getContent( 'OFFICIAL Klassik | Landmark | 3BHK Flats & Apartments for Sale | Sarjapur Road', 'site_title' );
$pageUrl = $siteUrl . $urlPath;
$pageTitle = getCurrentPageTitle( $links, $baseURL, $siteTitle );

?>

<head>

	<!-- Do NOT place anything above this -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover">

	<title><?php echo $pageTitle ?></title>


	<?php if ( ! empty( $baseURL ) ) : ?>
		<base href="<?php echo $baseURL ?>">
	<?php endif; ?>

	<!--
	*
	*	Metadata
	*
	- -->
	<!-- Short description of the document (limit to 150 characters) -->
	<!-- This content *may* be used as a part of search engine results. -->
	<meta name="description" content="<?php echo getContent( '', 'description' ); ?>">
	<!-- Short description of your document's subject -->
	<meta name="subject" content="<?php echo getContent( '', 'subject' ); ?>">


	<!--
	*
	*	Authors
	*
	- -->
	<!-- Links to information about the author(s) of the document -->
	<meta name="author" content="Lazaro Advertising">
	<link rel="author" href="humans.txt">


	<!--
	*
	*	SEO
	*
	- -->
	<!-- Control the behavior of search engine crawling and indexing -->
	<meta name="robots" content="index,follow"><!-- All Search Engines -->
	<meta name="googlebot" content="index,follow"><!-- Google Specific -->
	<!-- Verify website ownership -->
	<meta name="google-site-verification" content="<?php echo getContent( 't7GNpYvaLs47z-LwTtF2Lxwmt9BOzxiPl3b-u3MdDhM', 'google_site_verification_token' ); ?>"><!-- Google Search Console -->


	<!--
	*
	*	UI / Chrome
	*
	- -->
	<!-- Theme Color for Chrome, Firefox OS and Opera -->
	<meta name="theme-color" content="<?php echo getContent( '#f9f9f9', 'theme_color' ); ?>">

	<!-- Favicons -->
	<link rel="apple-touch-icon" sizes="57x57" href="media/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="media/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="media/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="media/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="media/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="media/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="media/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="media/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="media/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="media/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="media/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="media/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="media/favicon/favicon-16x16.png">
	<link rel="manifest" href="media/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#444444">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">


	<!-- ~ iOS ~ -->
	<!-- Disable automatic detection and formatting of possible phone numbers -->
	<meta name="format-detection" content="telephone=no">
	<!-- Launch Screen Image -->
	<!-- <link rel="apple-touch-startup-image" href="/path/to/launch.png"> -->
	<!-- Launch Icon Title -->
	<meta name="apple-mobile-web-app-title" content="<?php echo getContent( 'Brown.ie', 'apple -> ios_app_title' ); ?>">
	<!-- Enable standalone (full-screen) mode -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<!-- Status bar appearance (has no effect unless standalone mode is enabled) -->
	<meta name="apple-mobile-web-app-status-bar-style" content="<?php echo getContent( 'default', 'apple -> ios_status_bar_style' ); ?>">

	<!-- ~ Android ~ -->
	<!-- Add to home screen -->
	<meta name="mobile-web-app-capable" content="yes">
	<!-- More info: https://developer.chrome.com/multidevice/android/installtohomescreen -->


	<!--
	*
	*	Social
	*
	- -->
	<!-- Facebook Open Graph -->
	<meta property="og:url" content="<?php echo $pageUrl ?>">
	<meta property="og:type" content="website">
	<meta property="og:title" content="<?php echo $pageTitle ?>">
	<meta property="og:image" content="<?php echo getContent( '', 'og -> image' ) ?>">
	<meta property="og:description" content="<?php echo getContent( '', 'og -> description' ) ?>">
	<meta property="og:site_name" content="<?php echo getContent( '', 'site_title' ) ?>">


	<!-- Schema.org / Google+ -->
	<meta itemprop="name" content="<?php echo $pageTitle ?>">
	<meta itemprop="description" content="<?php echo getContent( 'This is a website', 'schema -> description' ) ?>">
	<meta itemprop="image" content="<?php echo getContent( '', 'schema -> image' ) ?>">


	<!--
	*
	*	Enqueue Files
	*
	- -->
	<!-- Stylesheet -->
	<?php require __DIR__ . '/../style.php'; ?>
	<!-- jQuery 3 -->
	<script type="text/javascript" src="plugins/jquery/jquery-3.0.0.min.js<?php echo $ver ?>"></script>
	<!-- Slick Carousel -->
	<link rel="stylesheet" type="text/css" href="plugins/slick/slick.css<?php echo $ver ?>"/>
	<link rel="stylesheet" type="text/css" href="plugins/slick/slick-theme.css<?php echo $ver ?>"/>

	<!--
	*
	*	Fonts and Icons
	*
	- -->
	<?php echo getContent( <<<ARB
	<!-- Fonts -->
	<link rel="stylesheet" href="https://use.typekit.net/ymp2kru.css">
	<!-- Icons -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
ARB
, 'fonts_and_icons' ) ?>


	<?php
		/*
		 * Arbitrary Code ( Bottom of Head )
		 */
		echo getContent( '', 'arbitrary_code_head_bottom' );
	?>

	<!-- Google Tag Manager -->
		<script>
			(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
				new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
				j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
				'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
			})(window,document,'script','dataLayer','GTM-TKCJ5FN');
		</script>
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

	<!-- The Omega instance Setup -->
	<!-- Establish what environment this is being run in for Omega to operate -->
	<script type="text/javascript">

		// Establish the environment
		var __envProduction = <?php echo empty( $productionEnv ) ? 'false' : 'true' ?>;
		var __envProduction = true;

		// Establish global state
		window.__OMEGA = window.__OMEGA || { };

		( function ( __OMEGA ) {

			var settings = __OMEGA.settings || { };

				// Project
			settings.Project = "Klassik Landmark";
				// OTP Template
			settings.OTPTemplate = "Klassik";
				// API endpoint
			settings.apiEndpoint = settings.apiEndpoint || location.origin.replace( /\/+$/, "" ) + "/omega";
			if ( ! __envProduction ) {
				settings.apiEndpoint = "http://omega.api.192.168.0.207.xip.io";
			}
			settings.apiEndpoint = "https://klassikbuild.com/omega";
			settings.centralApiEndpoint = "https://api.omega.seyonii.com";
				// Base URL
			settings.baseURL = "";
			if ( __envProduction ) {
				if ( document.getElementsByTagName( "base" ).length ) {
					settings.baseURL = document.getElementsByTagName( "base" )[ 0 ].getAttribute( "href" ).replace( /\//g, "" );
				}
				else {
					var urlParts = location.pathname.match( /[^/?]+/ );
					if ( urlParts )
						settings.baseURL = urlParts[ 0 ]
				}
			}
				// Implicit prefix that an auto-generated user gets
			settings.userImplicitNamePrefix = "AG";
				// project base URL
			settings.projectBaseURL = "landmark";
				// Zoho Assignment Rule ID
			settings.assignmentRuleId = "3261944000000278029";
				// Before Closing Head Tag
	    	settings.beforeClosingHeadTag = `
	    		<!-- Google Tag Manager -->
					<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
					new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
					j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
					'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
					})(window,document,'script','dataLayer','GTM-TKCJ5FN');<\/script>
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
					<\/script>
			`;
				// After Opening Body Tag
			settings.afterOpeningBodyTag = `
				<!-- Google Tag Manager (noscript) -->
				<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TKCJ5FN"
					height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
				<!-- End Google Tag Manager (noscript) -->
			`;
				// Before Closing Body Tag
			settings.beforeClosingBodyTag = `
				<!-- LivProp Chat -->
					<script src="https://cwc.livserv.in/chat.js?lid=8623"><\/script>
					<script src="https://cw1.livserv.in?did=8623&pid=1"><\/script>
			`;

			__OMEGA.settings = settings;

		}( window.__OMEGA ) );

	</script>

	<script>
		window._izq = window._izq || [ ];
		window._izq.push( [ "init" ] );
	</script>
	<script src="https://cdn.izooto.com/scripts/4ebdc97f62f118f5e64f584e2526e8a4d2a002d1.js"></script>

</head>
