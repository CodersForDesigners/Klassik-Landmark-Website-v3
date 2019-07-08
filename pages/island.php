<?php
/*
 *
 * This is a sample page you can copy and use as boilerplate for any new page.
 *
 */

// Page-specific preparatory code goes here.

?>

<?php require_once __DIR__ . '/../inc/above.php'; ?>


<!-- Sample Section -->
<section class="sample-section">
</section>
<!-- END: Sample Section -->

<!-- Apartment Section -->
<!-- Apartment Section: Form -->
<section class="fill-neutral-0">
	<div class="row">
		<div class="container">
			<div class="columns small-12 fill-light-2 block-space-top-bottom" data-loginner="Enquiry" data-context="Landing Page">
				<div class="row block-space-top-bottom" >
					<div class="h4 text-red-1 block-space-bottom columns small-10 small-offset-1 medium-6 medium-offset-3 large-10 large-offset-1">Enquire Now</div>
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
						<div class="form-row columns small-10 small-offset-1 medium-6 medium-offset-3 large-10 large-offset-1">
							<label>
								<span class="invisible">Submit</span><br>
								<button type="submit" class="button block fill-red-1" style="position: relative;">
									<span>Send</span>
									<img class="icon" src="/media/icons/send.svg<?php echo $ver ?>">
								</button>
							</label>
						</div>
					</form>
					<!-- Phone Trap -->
					<!-- Phone form -->
					<form class="loginner_form_phone hidden">
						<div class="form-row columns small-10 small-offset-1 medium-6 medium-offset-3 large-5 large-offset-1">
							<div class="phone-field">
								<label for="enquire-form-phone-field">
									<span>Please provide your phone number</span>
								</label>
								<div class="phone-country-code">
									<select class="js_phone_country_code">
										<?php require __DIR__ . '/../inc/phone-country-codes.php'; ?>
									</select>
									<!-- Concise phone country code label -->
									<!-- managed in JavaScript -->
									<input type="text" class="js_phone_country_code_label" value="(+91)">
								</div>
								<div class="phone-number">
									<input id="enquire-form-phone-field" class="block js_phone_number" type="text">
									<img class="icon" src="/media/icons/phone.svg<?php echo $ver ?>">
								</div>
							</div>
						</div>
						<div class="form-row columns small-10 small-offset-1 medium-6 medium-offset-3 large-5 large-offset-0">
							<label>
								<span class="invisible">Submit</span><br>
								<button type="submit" class="button block fill-red-0" style="position: relative;">
									<span>Send</span>
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
</section>

<!-- Apartment Section: Floorplan -->
<section id="type" class="apartment-section-floorplan section-height fill-light-0">
	<div class="row">
		<div class="container">
			<div class="layer-2 columns small-12 large-6 section-height block-space-top-bottom">
				<div class="floorplan island-f" style="background-image: url('/media/diagrams/floorplan/island-f.png<?php echo $ver ?>');"></div>
				<div class="h2 strong text-red-1">Island 3BHK</div>
				<div class="label text-dark-1">2035sft of Privacy</div>
			</div>
			<div class="layer-1 columns small-12 large-6 fill-red-1 section-height block-space-top-bottom">
				<div class="row">
					<div class="points-roman">
						<div class="point h4 text-light-1 columns small-8 small-offset-2 medium-6 medium-offset-3 large-8 large-offset-2">Aerodynamic Tower Boosts Ventilation</div>
						<div class="point h4 text-light-1 columns small-8 small-offset-2 medium-6 medium-offset-3 large-8 large-offset-2">Bright, Airy Kitchen & Utility</div>
						<div class="point h4 text-light-1 columns small-8 small-offset-2 medium-6 medium-offset-3 large-7 large-offset-3">9'6" Clear Ceiling-Height</div>
						<div class="point h4 strong text-light-1 columns small-8 small-offset-2 medium-6 medium-offset-3 large-7 large-offset-3">20% More Room Volume</div>
						<div class="point h4 text-light-1 columns small-8 small-offset-2 medium-6 medium-offset-3 large-6 large-offset-4">Only 3 Flats Per Floor</div>
						<div class="point h4 text-light-1 columns small-8 small-offset-2 medium-6 medium-offset-3 large-6 large-offset-4">Tall 8 Feet Entry Door</div>
						<div class="point h4 strong text-light-1 columns small-8 small-offset-2 medium-6 medium-offset-3 large-6 large-offset-4">No Common Walls</div>
						<div class="point h4 text-light-1 columns small-8 small-offset-2 medium-6 medium-offset-3 large-5 large-offset-5">Larger Balconies</div>
						<div class="point h4 text-light-1 columns small-8 small-offset-2 medium-6 medium-offset-3 large-5 large-offset-5">No Visible Beams</div>
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
					<div class="h2 strong text-light-0">Private and Detached</div>
					<div class="h4 text-red-1">Your privacy is a <br>necessity</div>
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
						<div class="h4 text-light-0">No common walls, <br>only 3 flats per floor</div>
						<hr class="underline">
					</div>
					<div class="columns small-10 small-offset-1 medium-6 medium-offset-3 large-5 large-offset-1">
						<div class="p block-space-bottom text-neutral-0">The 2035sft to 2170sft ‘Island 3BHK’ does not share any common walls with any other apartment. It is the only apartment in the vicinity that opens to the East and the West. Every lift lobby only serves 3 apartments per floor. Each lift lobby has 2 lifts, one 13 person lift and one 6 person lift.</div>
					</div>
					<div class="columns small-10 small-offset-1 medium-6 medium-offset-3 large-5 large-offset-0 xlarge-4">
						<div class="definition p text-light-1 fill-dark-0">
							ISLAND /ˈ ʌɪlənd/
							Noun - a thing regarded as resembling an island, especially in being isolated or detached.
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<?php require_once __DIR__ . '/../inc/below.php'; ?>
