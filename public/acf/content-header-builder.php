<?php 

// check if the flexible content field has rows of data

if( have_rows('header_elements','option') ):
	$acf_header_counter = 1;
	$styles_sub = 'styles';
     // loop through the rows of data
    while ( have_rows('header_elements','option') ) : the_row();

				if( get_row_layout() == 'page_builder_columns_1' ):

			$acf_pb_prefix = 'builder_cols_1_column_';
			$acf_pb_layouts = array(1);

			include(locate_template('acf/content-1-cols.php'));
			$acf_pb_counter++;

		endif;

		if( get_row_layout() == 'page_builder_columns_2' ):

			$acf_pb_prefix = 'builder_cols_2_column_';
			$acf_pb_layouts = array(1,2);

			include(locate_template('acf/content-1-cols.php'));
			$acf_pb_counter++;

		endif;

		if( get_row_layout() == 'page_builder_columns_3' ): 
			
			$acf_pb_prefix = 'builder_cols_3_column_';
			$acf_pb_layouts = array(1,2,3);

			include(locate_template('acf/content-1-cols.php'));
			$acf_pb_counter++;

		endif;

		if( get_row_layout() == 'page_builder_columns_4' ):
			
			$acf_pb_prefix = 'builder_cols_4_column_';
			$acf_pb_layouts = array(1,2,3,4);

			include(locate_template('acf/content-1-cols.php'));
			$acf_pb_counter++;

		endif;

		if( get_row_layout() == 'page_builder_columns_6' ):
			
			$acf_pb_prefix = 'builder_cols_6_column_';
			$acf_pb_layouts = array(1,2,3,4,6);

			include(locate_template('acf/content-1-cols.php'));
			$acf_pb_counter++;

		endif;

    endwhile;

else :

    // no layouts found

endif;

?>