<?php 

/**
 * Template Functions
 *
 *
 * @link       http://bang-media.com
 * @since      1.0.1
 *
 * @package    Bm_Acf_Page_Builder
 * @subpackage Bm_Acf_Page_Builder/public/includes
 */


function get_page_builder_template(){
	include(dirname(dirname(__FILE__)) . '/acf/content-page-builder.php');
}

include(dirname(dirname(__FILE__)) . '/acf/style-functions.php');

include(dirname(dirname(__FILE__)) . '/acf/page-styles.php');
