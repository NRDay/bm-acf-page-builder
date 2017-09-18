<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://bang-media.com
 * @since      1.0.0
 *
 * @package    Bm_Acf_Page_Builder
 * @subpackage Bm_Acf_Page_Builder/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Bm_Acf_Page_Builder
 * @subpackage Bm_Acf_Page_Builder/admin
 * @author     Neil Day <neil@bang-media.com>
 */
class Bm_Acf_Page_Builder_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Bm_Acf_Page_Builder_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Bm_Acf_Page_Builder_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_media();
		wp_enqueue_style( 'bm-pb-acf-input-css', plugin_dir_url( __FILE__ ) . 'assets/css/input.min.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Bm_Acf_Page_Builder_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Bm_Acf_Page_Builder_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( 'bm-pb-acf-input-js', plugin_dir_url( __FILE__ ) . 'assets/js/input.min.js', array('acf-input'), $this->version, false );

	}

	/**
	 * Register the new ACF Fields
	 *
	 * @since    1.0.0
	 */
	public function include_field_types() {
		
		// include
		include_once('acf/fields/acf-responsive_options-v5.php');
		include_once('acf/fields/acf-section_options-v5.php');
		include_once('acf/fields/acf-section_styles-v5.php');

	}

}
