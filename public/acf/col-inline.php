<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Single_Malt
 */
			
foreach ($acf_pb_layouts as $key => $value) {
	$col_styles_prefix = $acf_pb_prefix.$value.'_column_options';
	$row_name = get_sub_field($col_styles_prefix);
	// element id
	$inline_css .= "#pb-section-page-{$acf_pb_styles_counter} .grid__item.column-{$acf_pb_styles_counter}-{$value} .grid__item-content { ";

	$margin = margin_styles($row_name);

	$inline_css .= $margin;

	// end element id
	$inline_css .= "}";

	
	$inline_css .= "#pb-section-page-{$acf_pb_styles_counter} .grid__item.column-{$acf_pb_styles_counter}-{$value} .grid__item-content > .column-inner { ";
	if ( !empty($row_name['background_actual']) ) {
		$background_styles = background_styles($row_name);
		$inline_css .= $background_styles;
	}
	$padding = padding_styles($row_name);
	$inline_css .= $padding;
	// end element id
	$inline_css .= "}";
	

	if ( $row_name['background_style'] === 'parallax') {
		$inline_css .= '#pb-section-page-'.$acf_pb_styles_counter.' .grid__item.column-'.$acf_pb_styles_counter.'-'.$value.' .grid__item-content .parallax-overlay { background:'.$row_name['background_parallax'].';}';
	}

	//Element Styles.
	if( have_rows($acf_pb_prefix.$value.'_elements_elements') ): 
		$element_count = 0; //Counter so we can give each element in the column a unique class
			
		while ( have_rows($acf_pb_prefix.$value.'_elements_elements') ) : the_row();
			
			$element_count++;

			if (locate_template('bm-acf-pb-layouts/acf-'. get_row_layout() .'-inline-css.php') != '') {
				include(locate_template('bm-acf-pb-layouts/acf-'. get_row_layout() .'-inline-css.php'));
			}

	    endwhile; 

	endif;

}



