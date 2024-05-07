<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );
?>

<!-- Removed class woocommerce-MyAccount-navigation  -->
<div class="container">
<div class="row">
<nav class="col-md-2">
	<ul class="p-0 mt-4 mb-4">
		<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
			<li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?> fs-3 fw-500 text-start my-4 mx-2 mx-md-0">
				<?php if ($endpoint === 'dashboard') : ?>
					<i class="fa-solid fa-user fs-3 me-3 primary-color"></i>
				<?php elseif ($endpoint === 'orders') : ?>
					<i class="fa-solid fa-file-invoice fs-3 me-3 primary-color"></i>
				<?php elseif ($endpoint === 'downloads') : ?>
					<i class="fa-solid fa-download fs-3 me-3 primary-color"></i>
					<?php elseif ($endpoint === 'payment-methods') : ?>
					<i class="fa-solid fa-credit-card fs-3 me-3 primary-color"></i>
				<?php elseif ($endpoint === 'customer-logout') : ?>
					<i class="fa-solid fa-sign-out fs-3 me-3 primary-color"></i>
				<?php else : ?>
					<i class="fa-solid fa-shop fs-3 me-3 primary-color"></i>
				<?php endif; ?>
				<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>" class="text-white"><?php echo esc_html( $label ); ?></a>
			</li>
		<?php endforeach; ?>
	</ul>
</nav>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>


