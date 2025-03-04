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
 * @version 9.2.0
 */

if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

do_action('woocommerce_before_customer_login_form'); ?>

<?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>

	<div class="u-columns col2-set" id="customer_login">

		<div class="u-column1 col-1" id="woocommerce-form-login">

		<?php endif; ?>

		<h2><?php esc_html_e('Login', 'woocommerce'); ?></h2>

		<form class="woocommerce-form woocommerce-form-login login" method="post">

			<?php do_action('woocommerce_login_form_start'); ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="username"><?php esc_html_e('Username or email address', 'woocommerce'); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e('Required', 'woocommerce'); ?></span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo (! empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" required aria-required="true" /><?php // @codingStandardsIgnoreLine 
																																																																									?>
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e('Required', 'woocommerce'); ?></span></label>
				<div class="form-field-password">
					<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" required aria-required="true" />
					<button type="button" class="password-visibility link-button">
						<svg class="eye d-none" width="20" height="20" viewBox="0 0 20 20">
							<g transform="translate(-843 -487)">
								<rect width="20" height="20" transform="translate(843 487)" fill="none" />
								<path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z" transform="translate(841.003 485)" />
							</g>
						</svg>
						<svg class="eye-slash" width="20" height="20" viewBox="0 0 20 20">
							<g transform="translate(-839 -428)">
								<rect width="20" height="20" transform="translate(839 428)" fill="none" />
								<path d="M10.936,6.078A6.927,6.927,0,0,1,12,6c3.178,0,6.167,2.289,7.906,6a15.223,15.223,0,0,1-.9,1.639,1,1,0,1,0,1.7,1.049,15.762,15.762,0,0,0,1.209-2.3,1,1,0,0,0,0-.79C19.891,6.908,16.093,4,12,4a7.766,7.766,0,0,0-1.4.12,1.014,1.014,0,1,0,.34,2ZM3.709,2.29A1,1,0,0,0,2.29,3.709L5.388,6.8A14.613,14.613,0,0,0,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.083,7.9,19.991,12,19.991a9.255,9.255,0,0,0,5.048-1.539L20.281,21.7A1,1,0,1,0,21.7,20.281Zm6.357,9.185,2.449,2.449a1.809,1.809,0,0,1-.52.07,2,2,0,0,1-2-2,1.809,1.809,0,0,1,.07-.52ZM12,17.992c-3.178,0-6.167-2.289-7.9-6A12.084,12.084,0,0,1,6.8,8.207L8.567,10a4,4,0,0,0,5.427,5.427l1.589,1.569A7.236,7.236,0,0,1,12,17.992Z" transform="translate(837.004 426.004)" />
							</g>
						</svg>
					</button>
				</div>
			</p>

			<?php do_action('woocommerce_login_form'); ?>

			<p class="form-row">
				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e('Remember me', 'woocommerce'); ?></span>
				</label>
				<?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
				<button type="submit" class="woocommerce-button button-block button woocommerce-form-login__submit<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>" name="login" value="<?php esc_attr_e('Log in', 'woocommerce'); ?>"><?php esc_html_e('Log in', 'woocommerce'); ?></button>
			</p>

			<div class="switchs-container">
				<a href="#woocommerce-form-reset-password" class="switch-form button link-button">کلمه عبور را فراموش کرده اید ؟</a>
				<a href="#woocommerce-form-register" class="switch-form button link-button">هنوز ثبت نام نکرده اید؟</a>
			</div>

			<?php do_action('woocommerce_login_form_end'); ?>

		</form>

		<?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>

		</div>

		<div class="u-column2 col-2" id="woocommerce-form-register">

			<h2><?php esc_html_e('Register', 'woocommerce'); ?></h2>

			<form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action('woocommerce_register_form_tag'); ?>>

				<?php do_action('woocommerce_register_form_start'); ?>

				<?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>

					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<label for="reg_username"><?php esc_html_e('Username', 'woocommerce'); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e('Required', 'woocommerce'); ?></span></label>
						<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo (! empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" required aria-required="true" /><?php // @codingStandardsIgnoreLine 
																																																																												?>
					</p>

				<?php endif; ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_email"><?php esc_html_e('Email address', 'woocommerce'); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e('Required', 'woocommerce'); ?></span></label>
					<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo (! empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" required aria-required="true" /><?php // @codingStandardsIgnoreLine 
																																																																		?>
				</p>

				<?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>

					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<label for="reg_password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e('Required', 'woocommerce'); ?></span></label>
						<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" required aria-required="true" />
					</p>

				<?php else : ?>

					<p><?php esc_html_e('A link to set a new password will be sent to your email address.', 'woocommerce'); ?></p>

				<?php endif; ?>

				<?php do_action('woocommerce_register_form'); ?>

				<p class="woocommerce-form-row form-row">
					<?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
					<button type="submit" class="woocommerce-Button button-block woocommerce-button button<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?> woocommerce-form-register__submit" name="register" value="<?php esc_attr_e('Register', 'woocommerce'); ?>"><?php esc_html_e('Register', 'woocommerce'); ?></button>
				</p>

				<div class="switchs-container">
					<a href="#woocommerce-form-login" class="switch-form button link-button">حساب کاربری دارید؟</a>
				</div>

				<?php do_action('woocommerce_register_form_end'); ?>

			</form>

		</div>

		<div class="u-column3 col-3" id="woocommerce-form-reset-password">
			<?php
			/**
			 * fanpet custom hook for adding reset password template here
			 */
			do_action('fanpet_woocommerce_reset_password');
			?>
		</div>

	</div>
<?php endif; ?>

<?php do_action('woocommerce_after_customer_login_form'); ?>