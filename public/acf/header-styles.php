<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Single_Malt
 */
function single_malt_scripts_inline_header() {
	$header_css = '';

	if( have_rows('header_elements') ):
		$acf_pb_styles_counter = 1;
	     // loop through the rows of data
	    while ( have_rows('header_elements') ) : the_row();

	    	if( get_row_layout() == 'page_builder_columns_1' ):

				include(locate_template('acf/acf-inline-header.php'));

			endif;

			if( get_row_layout() == 'page_builder_columns_2' ):

				include(locate_template('acf/acf-inline-header.php'));

			endif;

			if( get_row_layout() == 'page_builder_columns_3' ):

				include(locate_template('acf/acf-inline-header.php'));

			endif;

			if( get_row_layout() == 'page_builder_columns_4' ):

				include(locate_template('acf/acf-inline-header.php'));

			endif;

			if( get_row_layout() == 'page_builder_columns_6' ):

				include(locate_template('acf/acf-inline-header.php'));
			
			endif;

			$acf_pb_styles_counter++;
	    endwhile;

	else :

	    // no layouts found

	endif;
	wp_add_inline_style( 'single_malt-style', $header_css );
}
add_action( 'wp_enqueue_scripts', 'single_malt_scripts_inline_header' );