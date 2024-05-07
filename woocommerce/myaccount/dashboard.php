<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

$allowed_html = array(
	'a' => array(
		'href' => array(),
	),
);
?>
<section class="primary-bg paymentmethod-btnclickhidden-section">
	<div class="container">
		<div class="row py-4 pb-md-4 pb-2">
			<div class="col-md-12">
				<h4 class="fw-extra-bold black-color m-0">Profile</h4>
			</div>
		</div>
	</div>
</section>
<!-- Profile Tab Internal tabs  -->
<section class="primary-bg paymentmethod-btnclickhidden-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="nav flex-row nav-pills" id="v-pi-tab" role="tablist" aria-orientation="horizontal">
					<button class="nav-link fs-3 fw-500 text-start px-4 active" id="v-pills-personalinfo-tab"
						data-bs-toggle="pill" data-bs-target="#personalinfo-tab" type="button" role="tab"
						aria-controls="personalinfo-tab" aria-selected="false">
						Personal Information</button>
					<button class="nav-link fs-3 fw-500 text-start px-4" id="v-pills-payment-tab" data-bs-toggle="pill"
						data-bs-target="#paymentdetails-tab" type="button" role="tab" aria-controls="paymentdetails-tab"
						aria-selected="false">
						Payment Details</button>
				</div>

			</div>
		</div>
	</div>
</section>



<!-- Profile Tab Internal tabs content  -->

<div class="tab-content" id="v-pills-tabContent-profile">
	<!-- Personal Info tab content  -->
	<div class="tab-pane fade show active text-white" id="personalinfo-tab" role="tabpanel"
		aria-labelledby="v-pills-personalinfo-tab">

		<section>
			<div class="container">
				<div class="row py-5">
					<div class="changepersonal-form-box">
						<h5 class="fw-extra-bold mb-4">Personal Information</h5>
						<form action="" class="change-personal-info-form my-4 woocommerce-EditAccountForm edit-account"
							method="post" <?php do_action('woocommerce_edit_account_form_tag'); ?>>
							<div class="row overflow-hidden ">
								<?php do_action('woocommerce_edit_account_form_start'); ?>
								<div class="col-md-6 my-2">
									<label for="account_first_name"
										class="form-label text-white fs-3 fw-bold mb-1 required"><?php esc_html_e('First name', 'woocommerce'); ?></label>
									<input type="text"
										class="woocommerce-Input woocommerce-Input--text input-text form-control br-4"
										name="account_first_name" id="account_first_name" autocomplete="given-name"
										value="<?php echo esc_attr($user->first_name); ?>" />
								</div>
								<div class="col-md-6 my-2">
									<label for="account_last_name"
										class="form-label text-white fs-3 fw-bold mb-1 required"><?php esc_html_e('Last name', 'woocommerce'); ?>
									</label>
									<input type="text"
										class="woocommerce-Input woocommerce-Input--text input-text form-control br-4"
										name="account_last_name" id="account_last_name" autocomplete="family-name"
										value="<?php echo esc_attr($user->last_name); ?>" />

								</div>

								<div class="col-md-6 my-2">
									<label for="account_email"
										class="form-label text-white fs-3 fw-bold mb-1 required"><?php esc_html_e('Email address', 'woocommerce'); ?></label>
									<input type="email"
										class="woocommerce-Input woocommerce-Input--email input-text form-control br-4"
										name="account_email" id="account_email" autocomplete="email"
										value="<?php echo esc_attr($user->user_email); ?>" />
								</div>
								<div class="col-md-6 my-2">
									<label for="account_display_name"
										class="form-label text-white fs-3 fw-bold mb-1 required"><?php esc_html_e('Display Name', 'woocommerce'); ?></label>
									<input type="text"
										class="woocommerce-Input woocommerce-Input--text input-text form-control br-4"
										name="account_display_name" id="account_display_name"
										value="<?php echo esc_attr($user->display_name); ?>" />
								</div>
								<div class="col-md-12 my-2">
									<?php
									/**
									 * Hook where additional fields should be rendered.
									 *
									 * @since 8.7.0
									 */
									do_action('woocommerce_edit_account_form_fields');
									?>
								</div>
								<div class="col-md-6 my-2">
									<label for="companyname" class="form-label text-white fs-3 fw-bold mb-1">Company
										Name </label>
									<input type="text" class="form-control br-4" name="companyname" id="companyname-db"
										placeholder="Staxo Group">
								</div>

								<div class="col-md-6 my-2">
									<label for="jobrole" class="form-label text-white fs-3 fw-bold mb-1">Job
										Role</label>
									<select class="form-select" aria-label="example" id="jobrole-db">
										<option value="" disabled selected>Choose...
										</option>
										<option value="1">One</option>
										<option value="2">Two</option>
										<option value="3">Three</option>
									</select>
								</div>
								<div class="col-md-12 my-2">
									<label for="reg_billing_country"
										class="form-label text-white fs-3 fw-bold mb-1">Country*</label>
									<?php
									$countries = WC()->countries->get_countries();
									$default_country = WC()->countries->get_base_country();
									?>
									<select name="billing_country" id="reg_billing_country"
										class="country_to_state country_select form-select" autocomplete="country">
										<?php foreach ($countries as $key => $value): ?>
											<option value="<?php echo esc_attr($key); ?>" <?php selected($default_country, $key); ?>>
												<?php echo esc_html($value); ?>
											</option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="col-md-12 my-2">
									<label for="password_current"
										class="form-label text-white fs-3 fw-bold mb-1"><?php esc_html_e('Current Password', 'woocommerce'); ?></label>
									<input type="password"
										class="woocommerce-Input woocommerce-Input--password input-text form-control br-4"
										name="password_current" id="password_current" autocomplete="off"
										placeholder="***********" />
								</div>
								<div class="col-md-12 my-2">
									<label for="password_1"
										class="form-label text-white fs-3 fw-bold mb-1"><?php esc_html_e('New password', 'woocommerce'); ?></label>
									<input type="password"
										class="woocommerce-Input woocommerce-Input--password input-text form-control br-4"
										name="password_1" id="password_1" autocomplete="off" />
								</div>
								<div class="col-md-12 my-2">
									<label for="password_2"
										class="form-label text-white fs-3 fw-bold mb-1"><?php esc_html_e('Confirm Password', 'woocommerce'); ?></label>
									<input type="password"
										class="woocommerce-Input woocommerce-Input--password input-text form-control br-4"
										name="password_2" id="password_2" autocomplete="off" />
								</div>
								<div class="col-12 my-4">
									<?php
									/**
									 * My Account edit account form.
									 *
									 * @since 2.6.0
									 */
									do_action('woocommerce_edit_account_form');
									?>
									<?php wp_nonce_field('save_account_details', 'save-account-details-nonce'); ?>
									<button class="primary-btn" type="submit" name="save_account_details"
										value="<?php esc_attr_e('Save changes', 'woocommerce'); ?>"><?php esc_html_e('Save Changes', 'woocommerce'); ?></button>
									<input type="hidden" name="action" value="save_account_details" />
									<button class="danger-btn savechanges-btn p-4" type="submit">Cancel</button>
								</div>
								<?php do_action('woocommerce_edit_account_form_end'); ?>

							</div>
						</form>
					</div>
				</div>
		</section>

	</div>
	<!-- Payment Details tab content  -->
	<div class="tab-pane fade show text-white" id="paymentdetails-tab" role="tabpanel"
		aria-labelledby="v-pills-paymentdetails-tab">

		<section class="paymentmethod-btnclickhidden-section">
			<div class="container">
				<div
					class="row py-5 pe-md-0 pb-0 pb-md-3 payment-method-row d-flex justify-content-between align-items-center">
					<div class="col-md-6">
						<h3 class="fw-extra-bold">Payment Details</h3>
					</div>
					<div class="col-md-6 text-md-end d-flex d-md-block justify-content-center mt-2 mt-md-0">
						<button class="primary-btn add-payment-method-btn">Add Payment
							Method</button>
					</div>

				</div>
				<div class="row pt-md-0 pe-md-0 py-md-5 py-3 d-flex justify-content-start align-items-center">
					<div class="col-md-4 my-2">
						<div class="payment-method-box dark-grey-bg-100 br-14 p-4">
							<img src="https://mywebsitedeveloper.co.uk/staging-websites/17110-vampire-squid-wp/wp-content/uploads/2024/04/stripe-icon.svg"
								alt="" class="img-fluid">
							<p class="fs-1 fw-bold text-white mt-4 mb-2 card-holder-name">
								Chris Seal</p>
							<p class="fs-3 fw-300 text-white">Debit Card ending in <span
									class="debit-card-hidden-number">**** 1234</span></p>

							<div
								class="defaultmethod-remove-box d-flex justify-content-between align-items-center mt-4">
								<p class="fs-4 fw-300 text-white m-0 make-default-payment-method-btn">
									Default this Payment
									Method</p>
								<a class="fs-4 fw-300 text-white remove-payment-method-button m-0 ">Remove</a>
							</div>
						</div>
					</div>
					<div class="col-md-4 my-2">
						<div class="payment-method-box dark-grey-bg-100 br-14 p-4">
							<img src="https://mywebsitedeveloper.co.uk/staging-websites/17110-vampire-squid-wp/wp-content/uploads/2024/04/stripe-icon.svg"
								alt="" class="img-fluid">
							<p class="fs-1 fw-bold text-white mt-4 mb-2 card-holder-name">
								Chris Seal</p>
							<p class="fs-3 fw-300 text-white">Debit Card ending in <span
									class="debit-card-hidden-number">**** 1234</span></p>

							<div
								class="defaultmethod-remove-box d-flex justify-content-between align-items-center mt-4">
								<p class="fs-4 fw-300 text-white m-0 make-default-payment-method-btn">
									Default this Payment
									Method</p>
								<a class="fs-4 fw-300 text-white remove-payment-method-button m-0">Remove</a>
							</div>
						</div>
					</div>
					<div class="col-md-4 my-2">
						<div class="payment-method-box dark-grey-bg-100 br-14 p-4">
							<img src="https://mywebsitedeveloper.co.uk/staging-websites/17110-vampire-squid-wp/wp-content/uploads/2024/04/stripe-icon.svg"
								alt="" class="img-fluid">
							<p class="fs-1 fw-bold text-white mt-4 mb-2 card-holder-name">
								Chris Seal</p>
							<p class="fs-3 fw-300 text-white">Debit Card ending in <span
									class="debit-card-hidden-number">**** 1234</span></p>

							<div
								class="defaultmethod-remove-box d-flex justify-content-between align-items-center mt-4">
								<p class="fs-4 fw-300 text-white m-0 make-default-payment-method-btn">
									Default this Payment
									Method</p>
								<a class="fs-4 fw-300 text-white remove-payment-method-button m-0">Remove</a>
							</div>
						</div>
					</div>


				</div>
			</div>
		</section>


		<section class="primary-bg add-payment-method-section">
			<div class="container">
				<div class="row py-4 pb-md-4 pb-2 px-3">
					<div class="col-md-12">
						<h4 class="fw-extra-bold black-color m-0">Add Payment Details</h4>
					</div>
				</div>
			</div>
		</section>
		<section class="add-payment-method-section">
			<div class="container">
				<div class="row px-3 pb-0 py-5">
					<div class="changepersonal-form-box">
						<p class="fs-2 fw-bold mb-0 back-btn"><i
								class="fa-solid fa-arrow-left fs-2 text-white me-2"></i>
							Back </p>
					</div>
				</div>
			</div>
		</section>
		<section class="add-payment-method-section">
			<div class="container">
				<div class="row py-5 d-flex justify-content-center align-items-center">
					<div class="add-payment-method-form-box ">
						<img src="./assets/images/stripe-icon.svg" alt="" class="img-fluid">

						<form action="#!" class="add-payment-method-form my-4">
							<div class="row overflow-hidden ">
								<div class="col-md-12 my-3">
									<label for="name-on-card-db" class="form-label text-white fs-3 fw-bold mb-1">Name
										on Card</label>
									<input type="text" class="form-control br-4" name="name-on-card"
										id="name-on-card-db" required>
								</div>
								<div class="col-md-12 my-3">
									<label for="card-number-db" class="form-label text-white fs-3 fw-bold mb-1">Card
										Number</label>
									<input type="text" class="form-control br-4" name="card-number" id="card-number-db"
										required>
								</div>

								<div class="col-md-6 my-2">
									<label for="card-expiry-db"
										class="form-label text-white fs-3 fw-bold mb-1">Expiration
										Date</label>
									<input type="text" class="form-control br-4" name="card-expiry" id="card-expiry-db"
										required>
								</div>
								<div class="col-md-6 my-2">
									<label for="cvv-db" class="form-label text-white fs-3 fw-bold mb-1">Security
										Code (CVV)</label>
									<input type="text" class="form-control br-4" name="text-cvv" id="cvv-db" required>
								</div>
							</div>

							<div class="col-12 my-4">
								<button class="primary-btn save-payment-method-btn" type="submit">Save Payment
									Method</button>
							</div>

						</form>

					</div>

				</div>

		</section>
	</div>
</div>


<?php
/**
 * My Account dashboard.
 *
 * @since 2.6.0
 */
do_action('woocommerce_account_dashboard');

/**
 * Deprecated woocommerce_before_my_account action.
 *
 * @deprecated 2.6.0
 */
do_action('woocommerce_before_my_account');

/**
 * Deprecated woocommerce_after_my_account action.
 *
 * @deprecated 2.6.0
 */
do_action('woocommerce_after_my_account');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
