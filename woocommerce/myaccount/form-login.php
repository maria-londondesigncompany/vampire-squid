<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

do_action('woocommerce_before_customer_login_form'); ?>

<?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')): ?>







	<div class="" id="customer_login">

		<?php endif; ?>

		<section class="sign-in-up-banner d-flex justify-content-center align-items-center py-5"
			style="background-image: url(<?php echo site_url() ?>/wp-content/uploads/2024/04/banner-bg.svg); background-position: center; background-size: cover; background-repeat: no-repeat;">
			<div class="container">
				<div class="row d-flex justify-content-center align-items-center">
					<div class="signin-column-size">
						<div class="sign-in-box">
							<h3 class="fw-extra-bold text-white sign-in-heading">
								Sign In
							</h3>
							<p class="fs-3 fw-300 text-white mt-md-3 mt-2 mb-4 sign-in-cta">Don’t have an account? <span
									class="primary-color fw-bold">Sign Up</span>
							</p>
						</div>

						<form class="sign-in-form woocommerce-form woocommerce-form-login login" method="post">
							<?php do_action('woocommerce_login_form_start'); ?>
							<div class="row overflow-hidden my-3">
								<div class="col-12 my-2">
									<label for="username" class="form-label text-white fs-3 fw-bold mb-1"><?php esc_html_e('Username or
										Email', 'woocommerce'); ?></label>
									<input type="text"
										class="woocommerce-Input woocommerce-Input--text input-text form-control br-4"
										name="username" id="username" autocomplete="username"
										value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
								</div>
								<div class="col-12 my-2">
									<label for="password"
										class="form-label text-white fs-3 fw-bold mb-1 required"><?php esc_html_e('Password', 'woocommerce'); ?></label>
									<input
										class="woocommerce-Input woocommerce-Input--text input-text form-control br-4"
										type="password" name="password" id="password" autocomplete="current-password" />
								</div>
								<?php do_action('woocommerce_login_form'); ?>
								<div class="col-12 my-2">
										<a class="fs-3 fw-300 text-white text-decoration-underline forget_password m-0 d-inline"
					href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Forgot
										Password?', 'woocommerce'); ?></a>
								</div>
								<div class="col-12 my-2 my-md-3">

									<div class="form-check">
										<input class="form-check-input woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme"
						type="checkbox" id="rememberme" value="forever">
										<label class="form-check-label  text-white fs-3 fw-300 woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme" for="remember_me">
										<?php esc_html_e('Remember me', 'woocommerce'); ?>
										</label>
			
									</div>
								</div>
								<div class="col-12 my-2">
								<?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
				<button type="submit"
					class="primary-btn woocommerce-form-login__submit<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>"
					name="login"
					value="<?php esc_attr_e('Log in', 'woocommerce'); ?>"><?php esc_html_e('Sign In', 'woocommerce'); ?></button>
								</div>
							</div>
							<?php do_action('woocommerce_login_form_end'); ?>
						</form>
					</div>
					<div class="signup-column-size">
                     <div class="sign-in-box">
                    <h3 class="fw-extra-bold text-white sign-in-heading">
                        Sign Up
                    </h3>
                    <p class="fs-3 fw-300 text-white mt-md-3 mt-2 mb-4 sign-up-cta">Already have an account?  <span
                            class="primary-color fw-bold">Sign In</span></p>
                </div>
             
                <!-- <form action="" class="sign-up-form">
                    <div class="row overflow-hidden my-3">

                        <div class="col-md-6 my-2">
                            <label for="fullname" class="form-label text-white fs-3 fw-bold mb-1">Full Name *</label>
                            <input type="text" class="form-control br-4" name="fullname" id="fullname" placeholder="Chris Seal" required>
                        </div>

                        <div class="col-md-6 my-2">
                            <label for="email" class="form-label text-white fs-3 fw-bold mb-1">Email Address *</label>
                            <input type="email" class="form-control br-4" name="email" id="email" placeholder="chris.seal@staxogroup.com" required>
                        </div>
                        <div class="col-md-6 my-2">
                            <label for="companyname" class="form-label text-white fs-3 fw-bold mb-1">Company Name *</label>
                            <input type="text" class="form-control br-4" name="companyname" id="companyname" placeholder="chris.seal@staxogroup.com" required>
                        </div>

                        <div class="col-md-6 my-2">
                            <label for="jobrole" class="form-label text-white fs-3 fw-bold mb-1">Job Role</label>
                            <select class="form-select" aria-label="example" id="jobrole" >
                                <option value="" disabled selected>Choose...</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select>
                        </div>
                        <div class="col-md-12 my-2">
                            <label for="country" class="form-label text-white fs-3 fw-bold mb-1">Country*</label>
                            <select class="form-select" aria-label="example" id="country" required>
                                <option value="" disabled selected>Choose...</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select>
                        </div>
                       
                        <div class="col-md-6 my-2">
                            <label for="password" class="form-label text-white fs-3 fw-bold mb-1">Password *</label>
                            <input type="password" class="form-control br-4" name="password" id="password" value=""
                            placeholder="***********"  required>
                        </div>
                        <div class="col-md-6 my-2">
                            <label for="confirmpassword" class="form-label text-white fs-3 fw-bold mb-1">Confirm Password *</label>
                            <input type="password" class="form-control br-4" name="confirmpassword" id="confirmpassword" value=""
                            placeholder="***********"   required>
                        </div>
                        <div class="col-12 my-4">
                            <button class="primary-btn" type="submit">Continue</button>
                        </div>
                    </div>
                  
                </form> -->
			<?php echo custom_account_form() ; ?>
             
                    </div>

				</div>
			</div>
		</section>

		



		<?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')): ?>

	


	</div>


	
<?php endif; ?>

<?php do_action('woocommerce_after_customer_login_form'); ?>