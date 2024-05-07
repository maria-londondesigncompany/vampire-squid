<?php
/**
 * Lost password reset form.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-reset-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_reset_password_form' );
?>

<section class="sign-in-up-banner d-flex justify-content-center align-items-center py-5"
	style="background-image: url(<?php echo site_url() ?>/wp-content/uploads/2024/04/banner-bg.svg); background-position: center; background-size: cover; background-repeat: no-repeat;">
	<div class="container">
		<div class="row d-flex justify-content-center align-items-center">

			<div class="signin-column-size">
				<form method="post" class="sign-in-form woocommerce-ResetPassword lost_reset_password">
					<div class="row overflow-hidden my-3">
						<div class="col-12 forget_password_form">
							<h3 class="fw-extra-bold text-white">
								Password Reset
							</h3>
							<p class="fs-3 fw-300 text-white mt-md-3 mt-2 mb-4">Provide the email address associated
								with your account to recover your password.</p>

							<label for="user_login"
								class="text-white fs-3 fw-bold mb-1"><?php esc_html_e('Email', 'woocommerce'); ?></label>
							<input class="form-control woocommerce-Input woocommerce-Input--text input-text" type="text"
								name="user_login" id="user_login" autocomplete="username" />
							<?php do_action('woocommerce_lostpassword_form'); ?>

							<div class="col-12 my-4">
								<input type="hidden" name="wc_reset_password" value="true" />
								<button type="submit" class="primary-btn"
									value="<?php esc_attr_e('Reset password', 'woocommerce'); ?>"><?php esc_html_e('Reset Password', 'woocommerce'); ?></button>
							</div>

							<?php wp_nonce_field('lost_password', 'woocommerce-lost-password-nonce'); ?>
							<div class="col-12 my-4">
								<p class="fs-3 fw-300 text-white mt-md-3 mt-2 mb-4 go-back-sign-in-cta">Or go back to
									<a href="<?php echo site_url() ?>/my-account/" class="primary-color fw-bold">Sign In</a>
								</p>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<?php
do_action( 'woocommerce_after_reset_password_form' );

