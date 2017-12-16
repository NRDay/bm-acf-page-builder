<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Single_Malt
 */

$section_options = get_sub_field('section_styles');

if ($section_options['make_full_width'] === 'yes' ) {
	$inline_css .= '#pb-section-page-'.$acf_pb_styles_counter.' { ';
	$background_styles = background_styles($section_options);
	$inline_css .= $background_styles;
	$inline_css .= '}';
}

$max_width_mobile 	= $section_options['max_width_mobile'];
$max_width_tablet 	= $section_options['max_width_tablet'];
$max_width_desk 	= $section_options['max_width_desk'];

// element id
$inline_css .= '#pb-section-page-'.$acf_pb_styles_counter.' .section-content { ';

if ($section_options['make_full_width'] !== 'yes' ) {
	$background_styles = background_styles($section_options);
	$inline_css .= $background_styles;
}

$inline_css .= 'max-width: '.$max_width_mobile.'% ;';

$margin = margin_styles($section_options);

$inline_css .= $margin;

$padding = padding_styles($section_options);

$inline_css .= $padding;

$animation = animation_styles($section_options);

$inline_css .= $animation;

// end element id
$inline_css .= '}';

if ( $section_options['background_style'] === 'parallax') {
    $inline_css .= '#pb-section-page-'.$acf_pb_styles_counter.' > .parallax-overlay { background:'.$section_options['background_parallax'].';}';
}

//media queries
$inline_css .= 
'@media only screen and (min-width: 48em) {
    #pb-section-page-'.$acf_pb_styles_counter.' .section-content { 
        max-width: '.$max_width_tablet.'% ;
        margin-left: auto;
        margin-right: auto;
    }
}';
$inline_css .= 
'@media only screen and (min-width: 68.75em) {
    #pb-section-page-'.$acf_pb_styles_counter.' .section-content { 
        max-width: '.$max_width_desk.'% ;
        margin-left: auto;
        margin-right: auto;
    }
}';

$section_options = '';
