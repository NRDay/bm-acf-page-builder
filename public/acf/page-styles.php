<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Single_Malt
 */
function pm_pb_inline() {
	
	$inline_css = '';


	if( have_rows('elements') ):

		$acf_pb_styles_counter = 1;

	    // loop through the rows of data
	    while ( have_rows('elements') ) : the_row();

	    	if( get_row_layout() == 'page_builder_columns_1' ):

				include(dirname(dirname(__FILE__)) . '/acf/acf-pb-row-inline.php');

				$acf_pb_prefix = 'builder_cols_1_column_';
				$acf_pb_layouts = array(1);

				include(dirname(dirname(__FILE__)) . '/acf/col-inline.php');

			endif;

			if( get_row_layout() == 'page_builder_columns_2' ):

				include(dirname(dirname(__FILE__)) . '/acf/acf-pb-row-inline.php');

				$acf_pb_prefix = 'builder_cols_2_column_';
				$acf_pb_layouts = array(1,2);

				include(dirname(dirname(__FILE__)) . '/acf/col-inline.php');

			endif;

			if( get_row_layout() == 'page_builder_columns_3' ):

				include(dirname(dirname(__FILE__)) . '/acf/acf-pb-row-inline.php');

				$acf_pb_prefix = 'builder_cols_3_column_';
				$acf_pb_layouts = array(1,2,3);

				include(dirname(dirname(__FILE__)) . '/acf/col-inline.php');

			endif;

			if( get_row_layout() == 'page_builder_columns_4' ):

				include(dirname(dirname(__FILE__)) . '/acf/acf-pb-row-inline.php');

				$acf_pb_prefix = 'builder_cols_4_column_';
				$acf_pb_layouts = array(1,2,3,4);
				
				include(dirname(dirname(__FILE__)) . '/acf/col-inline.php');

			endif;

			if( get_row_layout() == 'page_builder_columns_6' ):

				include(dirname(dirname(__FILE__)) . '/acf/acf-pb-row-inline.php');

				$acf_pb_prefix = 'builder_cols_6_column_';
				$acf_pb_layouts = array(1,2,3,4,5,6);
				
				include(dirname(dirname(__FILE__)) . '/acf/col-inline.php');
			
			endif;

			$acf_pb_styles_counter++;

	    endwhile;

	else :

	    // no layouts found

	endif;

	wp_add_inline_style( 'bm-acf-page-builder', $inline_css );
}
add_action( 'wp_enqueue_scripts', 'pm_pb_inline' );