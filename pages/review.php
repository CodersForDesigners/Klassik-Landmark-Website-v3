<?php
/*
 *
 * Review your Experience
 * This is a page where people can review their experience on the (physical) site.
 *
 */

// Page-specific preparatory code goes here.

?>

<?php require_once __DIR__ . '/../inc/above.php'; ?>





	<style type="text/css">

		input[ disabled ],
		textarea[ disabled ] {
			opacity: 0.5;
			cursor: not-allowed;
		}
		button[ type = "submit" ][ disabled ] {
			background-color: var(--neutral-2);
			cursor: not-allowed;
		}
		input.phone-country-code[ disabled ] {
			opacity: 1;
		}

		/* Hide the landing section; it got included from the above.php */
		.landing-section {
			display: none;
		}

		.review-section .container {
			margin-top: 10px;
			margin-bottom: 10px;
		}
		@media( min-width: 640px ) {
			.review-section .container {
				margin-top: 60px;
				margin-bottom: 60px;
			}
		}
		/*@media( min-width: 1040px ) {
			.review-section .container {
				margin-top: 60px;
			}
		}
		@media( min-width: 1480px ) {
			.review-section .container {
				margin-top: 60px;
			}
		}*/

		/*
		 * -----
		 * Star Rating Widget
		 * -----
		 */
		.rating-container {
			position: relative;
			unicode-bidi: bidi-override;
			direction: rtl;
			text-align: center;
			font-size: 0;
		}
		.rating-container .stars-container {
			display: inline-block;
		}
		.rating-container .stars-container .stars {
			background-image: linear-gradient( to right, var(--neutral-2), var(--red-2), var(--red-0) );
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
		}
		.rating-container .stars-container .stars-bg {
			position: absolute;
			top: 0;
			pointer-events: none;
		}
		.rating-container .stars-container label {
			display: inline;
			padding: 0 0.5rem;
			font-size: 3rem;
			font-weight: 900;
		}
		.rating-container .stars-container label {
			background-color: transparent;
		}
		.rating-container .stars-container .stars-fg label {
			background-color: var(--light-1);
		}

		/* When hovering and selecting stars, fill them in  */
		.rating-container .stars-container label:hover,
		.rating-container .stars-container label:hover ~ label {
			background-color: transparent;
		}
		.rating-container .stars-container .star:checked ~ label {
			background-color: transparent;
		}

	</style>

	<section class="review-section section-height">
		<div class="row">
			<div class="container">
				<div class="columns small-12 large-6 large-offset-3 fill-light-1">
					<div class="columns small-3 small-offset-1 medium-offset-3 large-4 large-offset-2 fill-light-0">
						<img class="block" src="https://res.cloudinary.com/klassik/image/upload/Website/klassik-logo-color-light.svg<?php echo $ver ?>">
					</div>
					<div class="row section-height block-space-top-bottom flex-center">
						<div class="columns small-10 small-offset-1 medium-6 medium-offset-3 large-8 large-offset-2" data-loginner="Review" data-context="Experience Review Page">
							<div class="h4 text-dark-1">Your feedback is valuable to us. Please describe your experience</div>
							<hr class="underline">
							<form class="js_review_form js_user_required">
								<div class="form-row hidden">
									<label>
										<span class="hidden">Rating</span><br>
									</label>
									<div class="rating-container">
										<div class="stars-container">
											<div class="stars-bg">
												<div class="stars">
													<label>☆</label>
													<label>☆</label>
													<label>☆</label>
													<label>☆</label>
													<label>☆</label>
												</div>
											</div>
											<div class="stars stars-fg">
												<input class="hidden star" id="5-star" type="radio" name="rating" value="5">
												<label for="5-star">★<span class="visuallyhidden">5</span></label>
												<input class="hidden star" id="4-star" type="radio" name="rating" value="4">
												<label for="4-star">★<span class="visuallyhidden">4</span></label>
												<input class="hidden star" id="3-star" type="radio" name="rating" value="3">
												<label for="3-star">★<span class="visuallyhidden">3</span></label>
												<input class="hidden star" id="2-star" type="radio" name="rating" value="2">
												<label for="2-star">★<span class="visuallyhidden">2</span></label>
												<input class="hidden star" id="1-star" type="radio" name="rating" value="1">
												<label for="1-star">★<span class="visuallyhidden">1</span></label>
											</div>
										</div>
									</div>
								</div>
								<div class="form-row">
									<label>
										<span class="hidden">Please describe your experience</span><br>
										<textarea class="block" name="notes" rows="6" required></textarea>
									</label>
								</div>
								<div class="form-row">
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
								<div class="form-row phone-field">
									<label for="enquire-form-phone-field">
										<span>Please provide your phone number</span>
									</label>
									<div class="phone-country-code">
										<select class="js_phone_country_code">
											<?php require __DIR__ . '/../inc/phone-country-codes.php'; ?>
										</select>
										<!-- Concise phone country code label -->
										<!-- managed in JavaScript -->
										<input type="text" class="phone-country-code js_phone_country_code_label" value="(+91)">
									</div>
									<div class="phone-number">
										<input id="enquire-form-phone-field" class="block js_phone_number" type="text">
										<img class="icon" src="/media/icons/phone.svg<?php echo $ver ?>">
									</div>
								</div>
								<div class="form-row">
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
								<div class="form-row">
									<label>
										<span class="">We've sent you an OTP</span><br>
										<input class="block" type="text" name="otp">
									</label>
								</div>
								<div class="form-row">
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
				<div class="columns small-12 large-6 fill-neutral-2 hidden">
					<div class="row section-height flex-center">
						<div class="columns small-10 small-offset-1 medium-6 medium-offset-3 large-8 large-offset-2">
							<div class="h4 text-light-0">Your feedback is important,<br>to us.</div>
							<hr class="underline">
							<div class="p block-space-bottom text-neutral-0">
								We strive to give you a pleasant and comfortable experience. Any feedback, big or small, helps us a long way!
							</div>

							<div class="p text-light-1 fill-dark-0 hidden" style="padding: 15px;">
								BROCHURE /ˈ brəʊʃə,brɒˈʃʊə/
								Noun - a small book or magazine containing pictures and information about a product or service.
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</div> <!-- END : Page Content -->

</div><!-- END : Page Wrapper -->

<script type="text/javascript" src="/js/modules/omega/utils.js<?= $ver ?>"></script>
<script type="text/javascript" src="/js/modules/omega/user.js<?= $ver ?>"></script>
<script type="text/javascript" src="/js/pages/review/forms.js<?= $ver ?>"></script>
<script type="text/javascript" src="/js/pages/review/form-traps.js<?= $ver ?>"></script>


</body>

</html>
