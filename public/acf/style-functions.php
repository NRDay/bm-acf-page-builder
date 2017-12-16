<?php 

function background_styles($row_name) {
	$background = '';
	if ( $row_name['background_style'] !== 'parallax' && !empty($row_name['background_actual']) ) {
		$background .= 'background: '.$row_name['background_actual'].';';
	}

	return $background;
}

function margin_styles($row_name) {

	if ($row_name['show_margin'] === 'yes') {

		$unit = $row_name['margin_unit'];

		$margin = '';

		if ( strlen($row_name['margin_top']) > 0 ) {$margin .= 'margin-top: '.$row_name['margin_top'].$unit.';'; }

			if ( strlen($row_name['margin_bottom']) > 0 ) {$margin .= 'margin-bottom: '.$row_name['margin_bottom'].$unit.';'; }

		return $margin;

	}
}

function padding_styles($row_name) {

	if ($row_name['show_padding'] === 'yes') {

		$unit = $row_name['padding_unit'];

		$padding = '';
		if ( strlen($row_name['padding_top']) > 0 ) {
			$padding .= 'padding-top: '.$row_name['padding_top'].$unit.';'; 
		} 

		if ( strlen($row_name['padding_right']) > 0 ) {
			$padding .= 'padding-right: '.$row_name['padding_right'].$unit.';'; 
		}

		if ( strlen($row_name['padding_bottom']) > 0 ) {
			$padding .= 'padding-bottom: '.$row_name['padding_bottom'].$unit.';'; 
		}

		if ( strlen($row_name['padding_left']) > 0 ) {
			$padding .= 'padding-left: '.$row_name['padding_left'].$unit.';'; 
		}

		return $padding;

	}

}

function typography_styles($prefix,$row_name) {

	$typo = '';

	/*if ($row_name['h1_use_default'] === 'no') {
		$h1 = $prefix.' h1 { color: '.$row_name['h1_font_color'].'; font-family: '.$row_name['h1_font_family'].'; font-weight: '.$row_name['h1_font_weight'].'; font-size: '.$row_name['h1_font_size'].' ; text-shadow: '.$row_name['h1_text_shadow_actual'].';}';
		$typo .= $h1;
	}

	if ($row_name['h2_use_default'] === 'no') {
		$h2 = $prefix.' h2 { color: '.$row_name['h2_font_color'].'; font-family: '.$row_name['h2_font_family'].'; font-weight: '.$row_name['h2_font_weight'].'; font-size: '.$row_name['h2_font_size'].' ; text-shadow: '.$row_name['h2_text_shadow_actual'].';}';
		$typo .= $h2;
	}

	if ($row_name['h3_use_default'] === 'no') {
		$h3 = $prefix.' h3 { color: '.$row_name['h3_font_color'].'; font-family: '.$row_name['h3_font_family'].'; font-weight: '.$row_name['h3_font_weight'].'; font-size: '.$row_name['h3_font_size'].' ; text-shadow: '.$row_name['h3_text_shadow_actual'].';}';
		$typo .= $h3;
	}

	if ($row_name['h4_6_use_default'] === 'no') {
		$h4 = $prefix.' h4 { color: '.$row_name['h4_6_font_color'].'; font-family: '.$row_name['h4_6_font_family'].'; font-weight: '.$row_name['h4_6_font_weight'].'; font-size: '.$row_name['h4_6_font_size'].' ; text-shadow: '.$row_name['h4_6_text_shadow_actual'].';}';
		$typo .= $h4;
	}

	if ($row_name['h4_6_use_default'] === 'no') {
		$h5 = $prefix.' h5 { color: '.$row_name['h4_6_font_color'].'; font-family: '.$row_name['h4_6_font_family'].'; font-weight: '.$row_name['h4_6_font_weight'].'; font-size: '.$row_name['h4_6_font_size'].' ; text-shadow: '.$row_name['h4_6_text_shadow_actual'].';}';
		$typo .= $h5;
	}

	if ($row_name['h4_6_use_default'] === 'no') {
		$h6 = $prefix.' h6 { color: '.$row_name['h4_6_font_color'].'; font-family: '.$row_name['h4_6_font_family'].'; font-weight: '.$row_name['h4_6_font_weight'].'; font-size: '.$row_name['h4_6_font_size'].' ; text-shadow: '.$row_name['h4_6_text_shadow_actual'].';}';
		$typo .= $h6;
	}

	if ($row_name['p_use_default'] === 'no') {
		$p = $prefix.' p { color: '.$row_name['p_font_color'].'; font-family: '.$row_name['p_font_family'].'; font-weight: '.$row_name['p_font_weight'].'; font-size: '.$row_name['p_font_size'].' ; text-shadow: '.$row_name['p_text_shadow_actual'].';}';
		$typo .= $p;
	}

	if ($row_name['links_use_default'] === 'no') {
		$links = $prefix.' a { color: '.$row_name['links_font_color'].'; font-family: '.$row_name['links_font_family'].'; font-weight: '.$row_name['links_font_weight'].'; font-size: '.$row_name['links_font_size'].' ; text-shadow: '.$row_name['links_text_shadow_actual'].';}';
		$typo .= $links;
	}*/

	return $typo;

}

/*function border_styles($row_name) {

	if ($row_name['show_border'] === 'yes') {

		$border_top 	= '0px';
		$border_right 	= '0px';
		$border_bottom 	= '0px';
		$border_left 	= '0px';

		$border = '';

		if (!empty($row_name['border_top'])) {
			$border_top = $row_name['border_top'];
			$border .= 'border-top-width: '.$border_top.';';
		}

		if (!empty($row_name['border_right'])) {
			$border_right = $row_name['border_right'];
			$border .= 'border-right-width: '.$border_right.';';
		}

		if (!empty($row_name['border_bottom'])) {
			$border_bottom = $row_name['border_bottom'];
			$border .= 'border-bottom-width: '.$border_bottom.';';
		}

		if (!empty($row_name['border_left'])) {
			$border_left = $row_name['border_left'];
			$border .= 'border-left-width: '.$border_left.';';
		}

		if (!empty($row_name['border_style'])) {
			$border_style = $row_name['border_style'];
			$border .= 'border-style: '.$border_style.';';
		}

		if (!empty($row_name['border_color'])) {
			$border_color = $row_name['border_color'];
			$border .= 'border-color: '.$border_color.';';
		}

		if (!empty($row_name['border_radius'])) {
			$border_radius = $row_name['border_radius'];
			$border .= 'border-radius: '.$border_radius.';';
		}

		if ( !$border === '' ){

			return $border;

		}

	}
}*/

function animation_styles($row_name) {
	$animation_duration = '1000ms';
	$animation_delay = '500ms';

	$animation_styles = '';

	if (!empty($row_name['animation_duration'])) {
		$animation_duration = $row_name['animation_duration'].'ms';
	}

	if (!empty($row_name['animation_delay'])) {
		$animation_delay = $row_name['animation_delay'].'ms';
	}

	$animation_styles .= '-webkit-animation-duration: '.$animation_duration.'; -moz-animation-duration: '.$animation_duration.'; animation-duration: '.$animation_duration.';';
	$animation_styles .= '-webkit-animation-delay: '.$animation_delay.'; -moz-animation-delay: '.$animation_delay.'; animation-delay: '.$animation_delay.';';

	return $animation_styles;
}



