<?php

// Get utility functions
require_once __DIR__ . '/utils.php';
// Include WordPress for Content Management
initWordPress();

/* -- Lazaro disclaimer and footer -- */
require_once __DIR__ . '/lazaro.php';

/*
 * A version number for versioning assets to invalidate the browser cache
 */
$ver = '?v=20181126';

// #fornow
// Just so that when some social media service (WhatsApp) try to ping URL,
//  	it should not get a 404. This because is setting the response header.
http_response_code( 200 );

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml"
	prefix="og: http://ogp.me/ns# fb: http://www.facebook.com/2008/fbml">

	<?php require_once 'head.php'; ?>

	<body id="body" class="body">

		<?php
			/*
			 * Arbitrary Code ( Top of Body )
			 */
			echo getContent( <<<ARB
				<!-- Google Tag Manager (noscript) -->
				<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TKCJ5FN"
					height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
				<!-- End Google Tag Manager (noscript) -->
ARB
, 'arbitrary_code_body_top' );
		?>

	<!--  ★  MARKUP GOES HERE  ★  -->

	<div id="page-wrapper"><!-- Page Wrapper -->

		<?php //require_once 'navigation.php'; ?>

		<!-- Page Content -->
		<div id="page-content">

			<!-- Navigation Section -->
			<section class="navigation-section js_navigation_section"><!-- Add Show Class Here -->
				<div class="row">
					<div class="scrollee">
						<div class="container">
							<a href="pricing" target="_blank" class="link pricing fill-red-2 columns small-3">
								<div class="title label text-light-0">Download Price</div>
								<div class="sub-title small text-neutral-0">Real-time Availability</div>
								<!-- <hr class="dash"> -->
								<!-- <div class="description small text-light-0"></div> -->
								<div class="icon" style="background-image: url('/media/icons/download.svg<?php echo $ver ?>');"></div>
							</a>
							<a href="island#type" target="_blank" class="link variant fill-red-1 columns small-3 active">
								<div class="title label text-light-0">Island 3BHK</div>
								<div class="sub-title small text-neutral-0">2035sft to 2170sft</div>
								<hr class="dash">
								<div class="description small text-light-0">READY TO MOVE IN</div>
							</a>
							<a href="plush#type" target="_blank" class="link variant fill-neutral-0 columns small-3">
								<div class="flag">
									<div class="icon" style="background-image: url('/media/icons/new-tower.svg<?php echo $ver ?>');"></div>
									<div class="label strong">New Tower</div>
								</div>
								<div class="title label text-dark-1">Plush 3BHK</div>
								<div class="sub-title small text-neutral-2">1691sft to 1920sft</div>
								<hr class="dash" style="border-color: var(--neutral-1);">
								<div class="description small text-dark-1">READY IN MAR 2021</div>
							</a>
							<a href="elevate#type" target="_blank" class="link variant fill-dark-1 columns small-3">
								<div class="title label text-light-0">Elevate 3BHK</div>
								<div class="sub-title small text-neutral-0">1445sft to 1505sft</div>
								<hr class="dash">
								<div class="description small text-light-0">READY IN DEC 2019</div>
							</a>
						</div>
					</div>
				</div>
			</section>


			<!-- Landing Section -->
			<section class="landing-section section-height" style="background-image: url('https://res.cloudinary.com/klassik/image/upload/Website/landmark-graded-photos/Klassik_Landmark_048_retouched_extendedsky.jpg<?php echo $ver ?>');">
				<div class="container">
					<div class="row">
						<div class="card-0 columns small-3 fill-light-0 large-2 large-offset-4">
							<img class="block" src="https://res.cloudinary.com/klassik/image/upload/Website/klassik-logo-color-light.svg<?php echo $ver ?>">
						</div>
					</div>
					<div class="row">
						<a href="#aerodynamics" class="card card-1 columns small-9 small-offset-3 large-6 large-offset-6 fill-light-0">
							<div class="h2 strong text-dark-1">The only <span class="text-red-1">all 3BHK</span> apartment development</div>
							<div class="h3 text-red-1">in the Sarjapur Road vicinity</div>
						</a>
					</div>
					<div class="row">
						<a href="#type" class="card card-2 columns small-12 medium-9 large-6 fill-red-1">
							<div class="h1 strong text-light-0">Rich, Comfy and Better Engineered</div>
						</a>
					</div>
					<div class="row">
						<div class="card card-3 columns small-12 medium-9 medium-offset-3 large-6 large-offset-6 fill-dark-1">
							<div class="h2 strong text-light-0">Klassik <span class="text-red-1">Landmark</span></div>
							<div class="h3 text-light-0">You <span class="h3 strong">don’t</span> have to be a big builder to do things better</div>
						</div>
					</div>
				</div>
			</section>
