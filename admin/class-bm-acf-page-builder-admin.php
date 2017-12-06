<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://bang-media.com
 * @since      1.0.1
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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}
	
    public function admin_typekit( ) {
    	global $pagenow;
    	$arg = array( 'post.php', 'post-new.php', 'page-new.php', 'page.php' );
    	if ( ! in_array( $pagenow, $arg ))
    		return; ?>

    	<script type="text/javascript">
    		(function(d) {
    			var tkTimeout=3000;
    			if(window.sessionStorage){if(sessionStorage.getItem('useTypekit')==='false'){tkTimeout=0;}}
    			var config = {
    				kitId: 'jdn3yxv',
    				scriptTimeout: tkTimeout
    			},
    			h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+"wf-inactive";if(window.sessionStorage){sessionStorage.setItem("useTypekit","false")}},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='//use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
    		})(document);
    	</script>
   	<?php }

	/**
	 * Register the stylesheets for the Page Builder.
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
		wp_enqueue_style( 'bm-acf-pb-admin-styles', plugin_dir_url( __FILE__ ) . 'assets/css/input.min.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( 'bm-acf-pb-admin-js', plugin_dir_url( __FILE__ ) . 'assets/js/input.min.js', array('acf-input'), $this->version, false );

	}

	/**
	 * Register the new ACF Fields
	 *
	 * @since    1.0.1
	 */
	public function include_field_types() {
		
		// include
		//include_once('acf/fields/acf-section_styles-v5.php');

		// post type selector - https://github.com/TimPerry/acf-post-type-selector
		//include_once('acf/fields/post-type-selector-v5.php');
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.1
	 */
	public function enqueue_global_scripts() {

		// Alpha color picker - https://github.com/kallookoo/wp-color-picker-alpha
		wp_enqueue_style('wp-color-picker' );
		wp_register_script('bm-pb-acf-alpha-color-picker-js', plugin_dir_url( __FILE__ ) . 'assets/js/wp-color-picker-alpha.min.js', array('wp-color-picker'), $this->version, true );
		//wp_enqueue_script('bm-pb-acf-alpha-color-picker-js');
		wp_enqueue_media();

		// Tabslet - https://github.com/vdw/Tabslet
		wp_register_script('acf-pb-tabslet', plugin_dir_url( __FILE__ ) . 'assets/js/jquery.tabslet.min.js', array('jquery'), $this->version, false );
		wp_enqueue_script('acf-pb-tabslet');

	}


	/**
	 * Register Page Builder Options Page
	 *
	 * @since    1.0.1
	 */
	public function register_page_builder_options() {
		
		if( function_exists('acf_add_options_page') ) {
 
			$option_page = acf_add_options_page(array(
				'page_title' 	=> 'Page Builder Options',
				'menu_title' 	=> 'Page Builder',
				'menu_slug' 	=> 'page-builder-options',
				'capability' 	=> 'edit_posts',
				'redirect' 	=> false
			));
		 
		}

	}
	/**
	 * Adds client custom colors as JS variable to top of edit screen.
	 *
	 * @since    1.0.1
	 */
	public function change_acf_color_picker() {
		if( have_rows('default_colors','option') ):
			$client_colors = array();
		 	// loop through the rows of data
		    while ( have_rows('default_colors','option') ) : the_row();

		        // display a sub field value
		        array_push( $client_colors,get_sub_field('colour') );

		    endwhile;

			$pickerInit = '<script>$palettes= '.json_encode($client_colors).'</script>';

			echo $pickerInit;

		else :

		    // no rows found

		endif;
		
	}

}
