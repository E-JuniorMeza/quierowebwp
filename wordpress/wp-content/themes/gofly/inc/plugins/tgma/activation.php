<?php

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http:   //tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme TourX for publication on ThemeForest
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http :   //opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https:   //github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call: 
 *
 * Parent Theme: 
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme: 
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin: 
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/inc/plugins/tgma/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'egns_register_required_plugins');

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins: 
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be: 
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function egns_register_required_plugins()
{
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'               => esc_html('Gofly Core'),
			'slug'               => 'gofly-core',
			'source'             => esc_url('https://demo.egenslab.com/wp/plugins/gofly-wp/gofly-core.zip?v=1.5.5'),
			'required'           => true,
			'version'            => '1.5.5',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
			'is_callable'        => '',
		),
		array(
			'name'               => esc_html('Review Rating'),
			'slug'               => 'review-rating',
			'source'             => esc_url('https://demo.egenslab.com/wp/plugins/review-rating.zip?v=1.0.0'),
			'required'           => true,
			'version'            => '',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
			'is_callable'        => '',
		),
		array(
			'name'               => esc_html('Envato Market'),
			'slug'               => 'envato-market',
			'source'             => esc_url('https://demo.egenslab.com/wp/plugins/envato-market.zip'),
			'required'           => false,
			'version'            => '',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
			'is_callable'        => '',
		),
		array(
			'name'         => esc_html('Elementor Page Builder'),
			'slug'         => 'elementor',
			'required'     => true,
			'external_url' => esc_url('https://wordpress.org/plugins/elementor/'),
		),
		array(
			'name'         => esc_html('Woo-Commerce'),
			'slug'         => 'woocommerce',
			'required'     => true,
			'external_url' => esc_url('https://wordpress.org/plugins/woocommerce/'),
		),
		array(
			'name'         => esc_html('Contact Form 7'),
			'slug'         => 'contact-form-7',
			'required'     => true,
			'external_url' => esc_url('http://wordpress.org/plugins/contact-form-7'),
		),
		array(
			'name'         => esc_html('Flamingo'),
			'slug'         => 'flamingo',
			'required'     => false,
			'external_url' => esc_url('https://wordpress.org/plugins/flamingo/'),
		),
		array(
			'name'         => esc_html('MC4WP: Mailchimp for WordPress'),
			'slug'         => 'mailchimp-for-wp',
			'required'     => false,
			'external_url' => esc_url('https://wordpress.org/plugins/mailchimp-for-wp/'),
		),
		array(
			'name'         => esc_html('One Click Demo Import'),
			'slug'         => 'one-click-demo-import',
			'required'     => true,
			'external_url' => esc_url('https://wordpress.org/plugins/one-click-demo-import'),
		),
		array(
			'name'         => esc_html('SVG Support'),
			'slug'         => 'svg-support',
			'required'     => true,
			'external_url' => esc_url('https://wordpress.org/plugins/svg-support'),
		),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'gofly-plugins-installer',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',

	);

	tgmpa($plugins, $config);
}
