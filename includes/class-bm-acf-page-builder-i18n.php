<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://bang-media.com
 * @since      1.0.1
 *
 * @package    Bm_Acf_Page_Builder
 * @subpackage Bm_Acf_Page_Builder/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.1
 * @package    Bm_Acf_Page_Builder
 * @subpackage Bm_Acf_Page_Builder/includes
 * @author     Neil Day <neil@bang-media.com>
 */
class Bm_Acf_Page_Builder_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.1
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'bm-acf-page-builder',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
