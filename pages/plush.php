<?php
/*
 *
 * This is a sample page you can copy and use as boilerplate for any new page.
 *
 */

// Page-specific preparatory code goes here.

$isUserLoggedIn = false;
if ( ! empty( $_COOKIE[ 'omega-user' ] ) )
	$isUserLoggedIn = true;


?>

<?php require_once __DIR__ . '/../inc/above.php'; ?>


<!-- Sample Section -->
<section class="sample-section">
</section>
<!-- END: Sample Section -->

<!-- Apartment Section -->
<!-- Apartment Section: Form -->
<section class="fill-neutral-0 <?php if ( $isUserLoggedIn ) : ?> hidden <?php endif; ?>">
	<div class="row">
		<div class="container">
			<div class="columns small-12 fill-light-2 block-space-top-bottom">
				<div class="row block-space-top-bottom" >
					<div class="form-row columns small-10 small-offset-1 medium-6 medium-offset-3 large-5 large-offset-1">
						<div class="h4 text-dark-1">Call us Directly</div>
					</div>
					<br>
					<div class="form-row columns small-10 small-offset-1 medium-6 medium-offset-3 large-5 large-offset-1 block-space-bottom">
						<a class="callback button block fill-dark-1" href="tel:+919663396887">
							<span>+91-96633-96887</span>
							<img class="icon" src="/media/icons/talk.svg<?php echo $ver ?>">
						</a>
					</div>
					<div class="h4 text-red-1 block-space-top-bottom columns small-10 small-offset-1 medium-6 medium-offset-3 large-10 large-offset-1">Enquire Now</div>
					<div data-loginner="Enquiry" data-context="Plush Page">
						<form class="js_enquiry_form js_user_required">
							<div class="form-row columns small-10 small-offset-1 medium-6 medium-offset-3 large-5 large-offset-1">
								<label>
									<span class="">Name</span><br>
									<input class="block" type="text" name="name" required>
									<img class="icon" src="/media/icons/name.svg<?php echo $ver ?>">
								</label>
							</div>
							<div class="form-row columns small-10 small-offset-1 medium-6 medium-offset-3 large-5 large-offset-0">
								<label>
									<span class="">Email</span><br>
									<input class="block" type="email" name="email" required>
									<img class="icon" src="/media/icons/email.svg<?php echo $ver ?>">
								</label>
							</div>
							<div class="form-row columns small-10 small-offset-1 medium-6 medium-offset-3 large-5 large-offset-1">
								<div class="nested-phone-field">
									<label for="enquire-form-phone-field">
										<span>Please provide your phone number</span>
									</label>
									<div class="phone-country-code">
										<select class="js_phone_country_code">
											<?php require __DIR__ . '/../inc/phone-country-codes.php'; ?>
										</select>
										<!-- Concise phone country code label -->
										<!-- managed in JavaScript -->
										<input type="text" class="js_phone_country_code_label" value="(+91)" disabled>
									</div>
									<div class="phone-number">
										<input id="enquire-form-phone-field" class="block js_phone_number" type="text" required>
										<img class="icon" src="/media/icons/phone.svg<?php echo $ver ?>">
									</div>
								</div>
							</div>
							<div class="form-row columns small-10 small-offset-1 medium-6 medium-offset-3 large-5 large-offset-0">
								<label>
									<span class="invisible">Submit</span><br>
									<button type="submit" class="button block fill-red-1" style="position: relative;">
										<span>Submit</span>
										<img class="icon" src="/media/icons/send.svg<?php echo $ver ?>">
									</button>
								</label>
							</div>
						</form>
						<!-- Phone Trap -->
						<!-- Phone form -->
						<form class="loginner_form_phone hidden">
							<div class="form-row columns small-10 small-offset-1 medium-6 medium-offset-3 large-5 large-offset-0">
								<input type="text" class="js_phone_country_code">
								<input id="enquire-form-phone-field" class="block js_phone_number" type="text">
								<label>
									<span class="invisible">Submit</span><br>
									<button type="submit" class="button block fill-red-0" style="position: relative;">
										<span>Submit</span>
										<img class="icon" src="/media/icons/send.svg<?php echo $ver ?>">
									</button>
								</label>
							</div>
						</form>
						<form class="loginner_form_otp hidden">
							<div class="form-row columns small-10 small-offset-1 medium-6 medium-offset-3 large-5 large-offset-1">
								<label>
									<span class="">We've sent you an OTP</span><br>
									<input class="block" type="text" name="otp">
								</label>
							</div>
							<div class="form-row columns small-10 small-offset-1 medium-6 medium-offset-3 large-5 large-offset-0">
								<label>
									<span class="invisible">Verify with OTP</span><br>
									<button type="submit" class="button block fill-red-0" style="position: relative;">
										<span>Verify with OTP</span>
										<img class="icon" src="/media/icons/send.svg<?php echo $ver ?>">
									</button>
								</label>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Apartment Section: Floorplan 1 -->
<section id="type" class="apartment-section-floorplan section-height fill-light-0">
	<div class="row">
		<div class="container">
			<div class="layer-2 columns small-12 large-6 section-height block-space-top-bottom">
				<div class="floorplan plush-b" style="background-image: url('/media/diagrams/floorplan/plush-b.png<?php echo $ver ?>');"></div>
				<div class="h2 text-neutral-2"><span class="h2 strong">Plush 3BHK</span> - Type E</div>
				<div class="label text-dark-1">1920sft of Lavishness</div>
			</div>
			<div class="layer-1 columns small-12 large-6 fill-neutral-0 section-height block-space-top-bottom">
				<div class="row">
					<div class="points-roman">
						<div class="point h4 text-dark-1 columns small-8 small-offset-2 medium-6 medium-offset-3 large-8 large-offset-2">Aerodynamic Tower Boosts Ventilation</div>
						<div class="point h4 text-dark-1 columns small-8 small-offset-2 medium-6 medium-offset-3 large-8 large-offset-2">Bright, Airy Kitchen & Utility</div>
						<div class="point h4 text-dark-1 columns small-8 small-offset-2 medium-6 medium-offset-3 large-7 large-offset-3">50% more air and natural light in bedrooms</div>
						<div class="point h4 text-dark-1 columns small-8 small-offset-2 medium-6 medium-offset-3 large-6 large-offset-4">Thermal Resistant & Noise Resistant POROTHERM Blocks</div>
						<div class="point h4 strong text-dark-1 columns small-8 small-offset-2 medium-6 medium-offset-3 large-6 large-offset-4">Only 3 Flats Per Floor</div>
						<div class="point h4 text-dark-1 columns small-8 small-offset-2 medium-6 medium-offset-3 large-6 large-offset-4">Tall 8 Feet Entry Door</div>
						<div class="point h4 text-dark-1 columns small-8 small-offset-2 medium-6 medium-offset-3 large-5 large-offset-5">Larger Balconies</div>
						<div class="point h4 text-dark-1 columns small-8 small-offset-2 medium-6 medium-offset-3 large-5 large-offset-5">No Visible Beams</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Apartment Section: Floorplan 2 -->
<section class="apartment-section-floorplan flip section-height fill-light-0">
	<div class="row">
		<div class="container">
			<div class="layer-2 columns small-12 large-6 section-height block-space-top-bottom">
				<div class="floorplan plush-e" style="background-image: url('/media/diagrams/floorplan/plush-e.png<?php echo $ver ?>');"></div>
				<div class="h2 text-neutral-2 large-offset-1"><span class="h2 strong">Plush 3BHK</span> - Type B</div>
				<div class="label text-dark-1 large-offset-1">1800sft of Luxury</div>
			</div>
			<div class="layer-1 columns small-12 large-6 fill-neutral-0 section-height block-space-top-bottom">
				<div class="row">
					<div class="points-roman">
						<div class="point h4 text-dark-1 columns small-8 small-offset-2 medium-6 medium-offset-3 large-8 large-offset-2">Aerodynamic Tower Boosts Ventilation</div>
						<div class="point h4 text-dark-1 columns small-8 small-offset-2 medium-6 medium-offset-3 large-8 large-offset-2">Bright, Airy Kitchen & Utility</div>
						<div class="point h4 text-dark-1 columns small-8 small-offset-2 medium-6 medium-offset-3 large-7 large-offset-2">Dedicated Pooja space</div>
						<div class="point h4 text-dark-1 columns small-8 small-offset-2 medium-6 medium-offset-3 large-6 large-offset-2">Only 3 Flats Per Floor</div>
						<div class="point h4 strong text-dark-1 columns small-8 small-offset-2 medium-6 medium-offset-3 large-6 large-offset-2">50% more air and natural light in bedrooms</div>
						<div class="point h4 strong text-dark-1 columns small-8 small-offset-2 medium-6 medium-offset-3 large-6 large-offset-2">Thermal Resistant & Noise Resistant POROTHERM Blocks</div>
						<div class="point h4 text-dark-1 columns small-8 small-offset-2 medium-6 medium-offset-3 large-6 large-offset-2">Tall 8 Feet Entry Door</div>
						<div class="point h4 text-dark-1 columns small-8 small-offset-2 medium-6 medium-offset-3 large-5 large-offset-2">Larger Balconies</div>
						<div class="point h4 text-dark-1 columns small-8 small-offset-2 medium-6 medium-offset-3 large-5 large-offset-2">No Visible Beams</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Apartment Section: Collage -->
<section class="section-height collage-section">
	<div class="row layer-1">
		<div class="columns small-12 large-6">
			<div class="row">
				<div class="photo quarter columns small-6 large-12" style="background-image: url('https://res.cloudinary.com/klassik/image/upload/Website/landmark-graded-photos/Klassik_Podium_01_retouched.jpg<?php echo $ver ?>');"></div>
				<div class="photo quarter columns small-6 large-12" style="background-image: url('https://res.cloudinary.com/klassik/image/upload/Website/landmark-graded-photos/Klassik_Landmark_014_retouched.jpg<?php echo $ver ?>');"></div>
			</div>
		</div>
		<div class="photo half columns small-12 large-6" style="background-image: url('https://res.cloudinary.com/klassik/image/upload/Website/landmark-graded-photos/Klassik_Landmark_012_retouched.jpg<?php echo $ver ?>');"></div>
	</div>
	<div class="row layer-2">
		<div class="container">
			<div class="card columns small-9 medium-6 large-4 large-offset-6 fill-dark-2-75 flex-center">
				<div>
					<div class="h2 strong text-light-0">Best Value for Money</div>
					<div class="h4 text-red-1">The perfect blend <br>of features</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Type Description -->
<section class="type-description fill-neutral-0">
	<div class="row">
		<div class="container">
			<div class="columns small-12 fill-neutral-2 block-space-top-bottom">
				<div class="row block-space-top-bottom">
					<div class="columns small-10 small-offset-1 medium-6 medium-offset-3 large-10 large-offset-1">
						<div class="h4 text-light-0">Perfectly Balanced Value <br>and Luxury</div>
						<hr class="underline">
					</div>
					<div class="columns small-10 small-offset-1 medium-6 medium-offset-3 large-5 large-offset-1">
						<div class="p block-space-bottom text-neutral-0">The Plush series is our best selling range of apartments. The ideal 3BHK apartment falls in the range of 1600sft and 2000sft. With 50% more air and natural light in the bedrooms. 9'6" clear ceiling height and larger balconies. It is the best value for money you can get when your need is 3 bedrooms.</div>
					</div>
					<div class="columns small-10 small-offset-1 medium-6 medium-offset-3 large-5 large-offset-0 xlarge-4">
						<div class="definition p text-light-1 fill-dark-0">
							PLUSH /plʌʃ/
							Adjective - richly luxurious and expensive.
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<?php require_once __DIR__ . '/../inc/below.php'; ?>
