<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://bang-media.com
 * @since      1.0.1
 *
 * @package    Bm_Acf_Page_Builder
 * @subpackage Bm_Acf_Page_Builder/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Bm_Acf_Page_Builder
 * @subpackage Bm_Acf_Page_Builder/public
 * @author     Neil Day <neil@bang-media.com>
 */
class Bm_Acf_Page_Builder_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.1
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.1
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.1
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.1
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/bm-acf-page-builder-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name.'vendor', plugin_dir_url( __FILE__ ) . 'css/vendor.min.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.1
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/bm-acf-page-builder-public.min.js', array( 'jquery' ), $this->version, true );
		wp_enqueue_script( 'vendor', plugin_dir_url( __FILE__ ) . 'js/vendor.min.js', array(), $this->version, false );

	}

	/**
	 * Register Template Functions
	 * 
	 *  @since 1.0.1
	 */

	public function load_template_functions() {
		require plugin_dir_path( __FILE__ ) . 'includes/template-functions.php';
	}

}
