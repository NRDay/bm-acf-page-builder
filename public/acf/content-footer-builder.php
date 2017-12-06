<?php 

// check if the flexible content field has rows of data

if( have_rows('footer_elements','option') ):
	$acf_footer_counter = 1;
     // loop through the rows of data
    while ( have_rows('footer_elements','option') ) : the_row();

		if( get_row_layout() == 'page_builder_columns_6' ):
			
			include(locate_template('acf/content-6-cols.php'));
			$acf_footer_counter++;
		endif;

		if( get_row_layout() == 'page_builder_columns_4' ):
			
			include(locate_template('acf/content-4-cols.php'));
			$acf_footer_counter++;
		endif;

		if( get_row_layout() == 'page_builder_columns_3' ): 
			
			include(locate_template('acf/content-3-cols.php'));
			$acf_footer_counter++;
		endif;

		if( get_row_layout() == 'page_builder_columns_2' ):

			include(locate_template('acf/content-2-cols.php'));
			$acf_footer_counter++;
		endif;

    endwhile;

else :

    // no layouts found

endif;

?>