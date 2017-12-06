<?php
if( have_rows('elements') ):
	$acf_pb_counter = 1;
     // loop through the rows of data
    while ( have_rows('elements') ) : the_row();

		if( get_row_layout() == 'page_builder_columns_1' ):
			
			$acf_pb_prefix = 'builder_cols_1_column_';
			$acf_pb_layouts = array(1);

			include(dirname(dirname(__FILE__)) . '/acf/content-cols.php');

			$acf_pb_counter++;

		endif;

		if( get_row_layout() == 'page_builder_columns_2' ):

			$acf_pb_prefix = 'builder_cols_2_column_';
			$acf_pb_layouts = array(1,2);

			include(dirname(dirname(__FILE__)) . '/acf/content-cols.php');
			$acf_pb_counter++;

		endif;
			
		if( get_row_layout() == 'page_builder_columns_3' ): 
			
			$acf_pb_prefix = 'builder_cols_3_column_';
			$acf_pb_layouts = array(1,2,3);

			include(dirname(dirname(__FILE__)) . '/acf/content-cols.php');

			$acf_pb_counter++;

		endif;

		if( get_row_layout() == 'page_builder_columns_4' ):
			
			$acf_pb_prefix = 'builder_cols_4_column_';
			$acf_pb_layouts = array(1,2,3,4);

			include(dirname(dirname(__FILE__)) . '/acf/content-cols.php');

			$acf_pb_counter++;

		endif;

		if( get_row_layout() == 'page_builder_columns_6' ):
			
			$acf_pb_prefix = 'builder_cols_6_column_';
			$acf_pb_layouts = array(1,2,3,4,5,6);

			include(dirname(dirname(__FILE__)) . '/acf/content-cols.php');

			$acf_pb_counter++;

		endif;

    endwhile;

else :

    // no layouts found

endif;
?>