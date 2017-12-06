<?php

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// check if class already exists
if ( !class_exists('acf_field_section_styles') ) :

	class acf_field_section_styles extends acf_field {

		/*
		*  __construct
		* 
		*  This function will setup the field type data
		*
		*  @type	function
		*  @date	5/03/2014
		*  @since	5.0.0
		*
		*  @param	n/a
		*  @return	n/a
		*/

		function __construct( $settings ) {

			$this->name = 'section_styles';
			$this->label = __( 'Section Styles', 'acf-section_styles' );
			$this->category = apply_filters( 'acf_section_styles_category', 'Appearance' );

			$this->l10n = array(
				'file_select_title'	=> __( 'Select background image', 'acf-section_styles' ),
				'file_select_text'	=> __( 'Select image', 'acf-section_styles' ),
			);

			$this->defaults = array(

				'show_responsive'				=> 'yes',
				'show_full_width'				=> 'yes',
				'show_margin'					=> 'yes',
				'show_padding'					=> 'yes',
				'show_alignment'				=> 'yes',
				'show_background'				=> 'yes',	

				'make_full_width'				=> 'no',		

				//desktop
				'desktop_margin_top'			=> '0',
				'desktop_margin_right'			=> '0',
				'desktop_margin_bottom'			=> '0',
				'desktop_margin_left'			=> '0',
				'desktop_padding_top'			=> '0',
				'desktop_padding_right'			=> '0',
				'desktop_padding_bottom'		=> '0',
				'desktop_padding_left'			=> '0',

				//tablet
				'tablet_margin_top'				=> '0',
				'tablet_margin_right'			=> '0',
				'tablet_margin_bottom'			=> '0',
				'tablet_margin_left'			=> '0',
				'tablet_padding_top'			=> '0',
				'tablet_padding_right'			=> '0',
				'tablet_padding_bottom'			=> '0',
				'tablet_padding_left'			=> '0',

				//tablet
				'mobile_margin_top'				=> '0',
				'mobile_margin_right'			=> '0',
				'mobile_margin_bottom'			=> '0',
				'mobile_margin_left'			=> '0',
				'mobile_padding_top'			=> '0',
				'mobile_padding_right'			=> '0',
				'mobile_padding_bottom'			=> '0',
				'mobile_padding_left'			=> '0',

				//ALignment
				'desktop_h_align'				=> 'left',
				'desktop_v_align'				=> 'top',

				'tablet_h_align'				=> 'left',
				'tablet_v_align'				=> 'top',

				'mobile_h_align'				=> 'left',
				'mobile_v_align'				=> 'top',

				//BORDER
				'border_top'					=> '0',
				'border_right'					=> '0',
				'border_bottom'					=> '0',
				'border_left'					=> '0',
				'border_style'					=> 'solid',
				
				//BACKGROUND
				'gradient_type'					=> 'linear',
				'gradient_direction'			=> 'top',
				'background_style'				=> 'cover',

				//ANIMATION

				// Type
				'animation_type'				=> 'none',

				// Duration
				'animation_duration'			=> '1000',

				// Delay
				'animation_delay'				=> '0',

				'use_default_fonts'				=> 'yes',

				'base_font_family'				=> 'futura-pt',
				'base_heading_family'			=> 'clarendon-urw',
				'base_font_size'				=> '16px',
				'base_font_weight'				=> '400',
				'base_font_color'				=> '#404040',
				'base_text_shadow'				=> '',
				'base_text_shadow_size'			=> '0px',
				'base_text_shadow_color'		=> '',
				'base_link_color'				=> '#4169e1',
				
				'h1_font_size'					=> '36px',
				'h2_font_size'					=> '32px',
				'h3_font_size'					=> '28px',
				'h4_6_font_size'				=> '24px',

			);

			$this->show_responsive_options = apply_filters('acf-section_styles', array(
				'yes'			=> __( 'Show', 'acf-section_styles' ),
				'no'			=> __( 'Hide', 'acf-section_styles' ),
			) );

			$this->show_full_width_options = apply_filters('acf-section_styles', array(
				'yes'			=> __( 'Show', 'acf-section_styles' ),
				'no'			=> __( 'Hide', 'acf-section_styles' ),
			) );

			$this->full_width_options = apply_filters('acf-section_styles', array(
				'yes'			=> __( 'Yes', 'acf-section_styles' ),
				'no'			=> __( 'No', 'acf-section_styles' ),
			) );

			$this->show_margin_options = apply_filters('acf-section_styles', array(
				'yes'			=> __( 'Show', 'acf-section_styles' ),
				'no'			=> __( 'Hide', 'acf-section_styles' ),
			) );

			$this->show_padding_options = apply_filters('acf-section_styles', array(
				'yes'			=> __( 'Show', 'acf-section_styles' ),
				'no'			=> __( 'Hide', 'acf-section_styles' ),
			) );

			$this->show_alignment_options = apply_filters('acf-section_styles', array(
				'yes'			=> __( 'Show', 'acf-section_styles' ),
				'no'			=> __( 'Hide', 'acf-section_styles' ),
			) );

			$this->show_background_options = apply_filters('acf-section_styles', array(
				'yes'			=> __( 'Show', 'acf-section_styles' ),
				'no'			=> __( 'Hide', 'acf-section_styles' ),
			) );


			$this->mobile_options = apply_filters( 'acf-section_styles', array(
				'col-mobile-1'			=> __( '1', 'acf-section_styles' ),
				'col-mobile-2'			=> __( '2', 'acf-section_styles' ),
				'col-mobile-3'			=> __( '3', 'acf-section_styles' ),
				'col-mobile-4'			=> __( '4', 'acf-section_styles' ),
				'col-mobile-5'			=> __( '5', 'acf-section_styles' ),
				'col-mobile-6'			=> __( '6', 'acf-section_styles' ),
				'col-mobile-7'			=> __( '7', 'acf-section_styles' ),
				'col-mobile-8'			=> __( '8', 'acf-section_styles' ),
				'col-mobile-9'			=> __( '9', 'acf-section_styles' ),
				'col-mobile-10'			=> __( '10', 'acf-section_styles' ),
				'col-mobile-11'			=> __( '11', 'acf-section_styles' ),
				'col-mobile-12'			=> __( '12', 'acf-section_styles' ),
			) );

			$this->tablet_options = apply_filters( 'acf-section_styles', array(
				'col-tablet-1'			=> __( '1', 'acf-section_styles' ),
				'col-tablet-2'			=> __( '2', 'acf-section_styles' ),
				'col-tablet-3'			=> __( '3', 'acf-section_styles' ),
				'col-tablet-4'			=> __( '4', 'acf-section_styles' ),
				'col-tablet-5'			=> __( '5', 'acf-section_styles' ),
				'col-tablet-6'			=> __( '6', 'acf-section_styles' ),
				'col-tablet-7'			=> __( '7', 'acf-section_styles' ),
				'col-tablet-8'			=> __( '8', 'acf-section_styles' ),
				'col-tablet-9'			=> __( '9', 'acf-section_styles' ),
				'col-tablet-10'			=> __( '10', 'acf-section_styles' ),
				'col-tablet-11'			=> __( '11', 'acf-section_styles' ),
				'col-tablet-12'			=> __( '12', 'acf-section_styles' ),
			) );

			$this->desk_options = apply_filters( 'acf-section_styles', array(
				'col-desk-1'			=> __( '1', 'acf-section_styles' ),
				'col-desk-2'			=> __( '2', 'acf-section_styles' ),
				'col-desk-3'			=> __( '3', 'acf-section_styles' ),
				'col-desk-4'			=> __( '4', 'acf-section_styles' ),
				'col-desk-5'			=> __( '5', 'acf-section_styles' ),
				'col-desk-6'			=> __( '6', 'acf-section_styles' ),
				'col-desk-7'			=> __( '7', 'acf-section_styles' ),
				'col-desk-8'			=> __( '8', 'acf-section_styles' ),
				'col-desk-9'			=> __( '9', 'acf-section_styles' ),
				'col-desk-10'			=> __( '10', 'acf-section_styles' ),
				'col-desk-11'			=> __( '11', 'acf-section_styles' ),
				'col-desk-12'			=> __( '12', 'acf-section_styles' ),
			) );

			//ALIGNMENT

			//Text Align
			$this->horizontal_alignment_options = apply_filters( 'acf-section_styles', array(
				'left'					=> __( 'Left', 'acf-section_styles' ),
				'center'				=> __( 'Center', 'acf-section_styles' ),
				'right'					=> __( 'Right', 'acf-section_styles' ),
			) );

			//Vertical Align
			$this->vertical_alignment_options = apply_filters( 'acf-section_styles', array(
				'top'					=> __( 'Top', 'acf-section_styles' ),
				'center'				=> __( 'Center', 'acf-section_styles' ),
				'bottom'				=> __( 'Bottom', 'acf-section_styles' ),
			) );

			//BACKGROUND

			//Gradient Type
			$this->gradient_style_options = apply_filters( 'acf-section_styles', array(
				'linear'				=> __( 'Linear', 'acf-section_styles' ),
				'radial'				=> __( 'Radial', 'acf-section_styles' ),
			) );

			//Gradient Direction
			$this->gradient_direction_options = apply_filters( 'acf-section_styles', array(
				'to bottom'				=> __( 'Top Down', 'acf-section_styles' ),
				'to top'				=> __( 'Bottom Up', 'acf-section_styles' ),
				'to left'				=> __( 'Right to Left', 'acf-section_styles' ),
				'to right'				=> __( 'Left to Right', 'acf-section_styles' ),
			) );

			$this->background_size_options = apply_filters( 'acf-section_styles', array(
				'cover'					=> __( 'Cover', 'acf-section_styles' ),
				'contain'				=> __( 'Contain', 'acf-section_styles' ),
			) );

			$this->background_style_options = apply_filters( 'acf-section_styles', array(
				'scroll'				=> __( 'Scroll', 'acf-section_styles' ),
				'fixed'					=> __( 'Fixed', 'acf-section_styles' ),
				'parallax'				=> __( 'Parallax', 'acf-section_styles' ),
			) );

			$this->background_repeat_options = apply_filters( 'acf-section_styles', array(
				'no-repeat'				=> __( 'No Repeat', 'acf-section_styles' ),
				'repeat'				=> __( 'Repeat', 'acf-section_styles' ),
				'repeat-x'				=> __( 'Repeat Horizontally', 'acf-section_styles' ),
				'repeat-y'				=> __( 'Repeat Vertically', 'acf-section_styles' ),
				
			) );

			$this->background_position_options_1 = apply_filters( 'acf-section_styles', array(
				'center'				=> __( 'Center', 'acf-section_styles' ),
				'top'					=> __( 'Top', 'acf-section_styles' ),
				'bottom'				=> __( 'Bottom', 'acf-section_styles' )
			) );

			$this->background_position_options_2 = apply_filters( 'acf-section_styles', array(
				'center'				=> __( 'Center', 'acf-section_styles' ),
				'left'					=> __( 'Left', 'acf-section_styles' ),
				'right'					=> __( 'Right', 'acf-section_styles' )
			) );

			$this->animation_type_options = apply_filters( 'acf_section_styles', array(
				'none' 					=> __( '-none-', 'acf-section_styles' ),
				'bounce' 				=> __( 'bounce', 'acf-section_styles' ),
				'flash' 				=> __( 'flash', 'acf-section_styles' ),
				'pulse' 				=> __( 'pulse', 'acf-section_styles' ),
				'rubberBand' 			=> __( 'rubberBand', 'acf-section_styles' ),
				'shake' 				=> __( 'shake', 'acf-section_styles' ),
				'swing' 				=> __( 'swing', 'acf-section_styles' ),
				'tada' 					=> __( 'tada', 'acf-section_styles' ),
				'wobble'				=> __( 'wobble', 'acf-section_styles' ),
				'bounceIn' 				=> __( 'bounceIn', 'acf-section_styles' ),
				'bounceInDown' 			=> __( 'bounceInDown', 'acf-section_styles' ),
				'bounceInLeft' 			=> __( 'bounceInLeft', 'acf-section_styles' ),
				'bounceInRight' 		=> __( 'bounceInRight', 'acf-section_styles' ),
				'bounceInUp' 			=> __( 'bounceInUp', 'acf-section_styles' ),
				'fadeIn' 				=> __( 'fadeIn', 'acf-section_styles' ),
				'fadeInDown' 			=> __( 'fadeInDown', 'acf-section_styles' ),
				'fadeInDownBig' 		=> __( 'fadeInDownBig', 'acf-section_styles' ),
				'fadeInLeft' 			=> __( 'fadeInLeft', 'acf-section_styles' ),
				'fadeInLeftBig' 		=> __( 'fadeInLeftBig', 'acf-section_styles' ),
				'fadeInRight' 			=> __( 'fadeInRight', 'acf-section_styles' ),
				'fadeInRightBig' 		=> __( 'fadeInRightBig', 'acf-section_styles' ),
				'fadeInUp' 				=> __( 'fadeInUp', 'acf-section_styles' ),
				'fadeInUpBig' 			=> __( 'fadeInUpBig', 'acf-section_styles' ),
				'flip' 					=> __( 'flip', 'acf-section_styles' ),
				'flipInX' 				=> __( 'flipInX', 'acf-section_styles' ),
				'flipInY' 				=> __( 'flipInY', 'acf-section_styles' ),
				'lightSpeedIn' 			=> __( 'lightSpeedIn', 'acf-section_styles' ),
				'rotateIn' 				=> __( 'rotateIn', 'acf-section_styles' ),
				'rotateInDownLeft' 		=> __( 'rotateInDownLeft', 'acf-section_styles' ),
				'rotateInDownRight' 	=> __( 'rotateInDownRight', 'acf-section_styles' ),
				'rotateInUpLeft' 		=> __( 'rotateInUpLeft', 'acf-section_styles' ),
				'rotateInUpRight' 		=> __( 'rotateInUpRight', 'acf-section_styles' ),
				'rollIn' 				=> __( 'rollIn', 'acf-section_styles' ),
				'zoomIn' 				=> __( 'zoomIn', 'acf-section_styles' ),
				'zoomInDown' 			=> __( 'zoomInDown', 'acf-section_styles' ),
				'zoomInLeft' 			=> __( 'zoomInLeft', 'acf-section_styles' ),
				'zoomInRight' 			=> __( 'zoomInRight', 'acf-section_styles' ),
				'zoomInUp' 				=> __( 'zoomInUp', 'acf-section_styles' ),
				'slideInDown' 			=> __( 'slideInDown', 'acf-section_styles' ),
				'slideInLeft' 			=> __( 'slideInLeft', 'acf-section_styles' ),
				'slideInRight' 			=> __( 'slideInRight', 'acf-section_styles' ),
				'slideInUp' 			=> __( 'slideInUp', 'acf-section_styles' ),
			) );

			$this->use_default_font_options = apply_filters('acf-section_styles', array(
				'yes'			=> __( 'Use Default/Parent', 'acf-section_styles' ),
				'no'			=> __( 'Customise', 'acf-section_styles' ),
			) );

			$this->font_family_options = apply_filters( 'acf_section_styles', array(
				'futura-pt'				=> __( 'Futura PT', 'acf-section_styles' ),
				'clarendon-urw' 		=> __( 'Clarendon URW', 'acf-section_styles' ),
			) );

			$this->font_weight_options = apply_filters( 'acf_section_styles', array(
				'400'					=> __( 'normal', 'acf-section_styles' ),
				'300' 					=> __( 'light', 'acf-section_styles' ),
				'700' 					=> __( 'bold', 'acf-section_styles' ),
			) );

			$this->settings = $settings;

			// do not delete!
			parent::__construct();

		}


		/*
		*  render_field_settings()
		*
		*  Create extra settings for your field. These are visible when editing a field
		*
		*  @type	action
		*  @since	3.6
		*  @date	23/01/13
		*
		*  @param	$field (array) the $field being edited
		*  @return	n/a
		*/

		function render_field_settings( $field ) {


			// Custom Name
			acf_render_field_wrap(array(
				'label'					=> __( 'Custom Name', 'acf-section_styles' ),
				'type'					=> 'text',
				'name'					=> 'custom_name',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['custom_name'],
				'wrapper'				=> array(
					'data-name' => 'custom-name'
				)
			), 'tr');

			// Custom Wrapper
			acf_render_field_wrap(array(
				'label'					=> __( 'Custom Wrapper', 'acf-section_styles' ),
				'type'					=> 'text',
				'name'					=> 'custom_wrapper',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['custom_wrapper'],
				'wrapper'				=> array(
					'data-name' => 'custom-wrapper'
				)
			), 'tr');

			// Show Full Width Options
			acf_render_field_wrap(array(
				'label'					=> __( 'Show Responsive Options', 'acf-section_styles' ),
				'type'					=> 'select',
				'choices'				=> $this->show_responsive_options,
				'name'					=> 'show_responsive',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['show_responsive'],
				'wrapper'				=> array(
					'data-name' => 'responsive-display-wrapper'
				)
			), 'tr');

			// Show Full Width Options
			acf_render_field_wrap(array(
				'label'					=> __( 'Show Full Width', 'acf-section_styles' ),
				'type'					=> 'select',
				'choices'				=> $this->show_full_width_options,
				'name'					=> 'show_full_width',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['show_full_width'],
				'wrapper'				=> array(
					'data-name' => 'full-width-wrapper'
				)
			), 'tr');

			//COLUMNS 

			// Default Mobile
			acf_render_field_wrap(array(
				'label'					=> __( 'Default Mobile Columns', 'acf-responsive_options' ),
				'type'					=> 'select',
				'name'					=> 'size_on_mobile',
				'choices'				=> $this->mobile_options,
				'prefix'				=> $field['prefix'],
				'value'					=> $field['size_on_mobile'],
				'wrapper'				=> array(
					'data-name' 	=> 'responsive-options-wrapper'
				)
			), 'tr');

			// Default tablet
			acf_render_field_wrap(array(
				'label'					=> __( 'Default Tablet Columns', 'acf-responsive_options' ),
				'type'					=> 'select',
				'name'					=> 'size_on_tablet',
				'choices'				=> $this->tablet_options,
				'prefix'				=> $field['prefix'],
				'value'					=> $field['size_on_tablet'],
				'wrapper'				=> array(
					'data-name' 	=> 'responsive-options-wrapper'
				)
			), 'tr');

			// Default desk
			acf_render_field_wrap(array(
				'label'					=> __( 'Default Desk Columns', 'acf-responsive_options' ),
				'type'					=> 'select',
				'name'					=> 'size_on_desk',
				'choices'				=> $this->desk_options,
				'prefix'				=> $field['prefix'],
				'value'					=> $field['size_on_desk'],
				'wrapper'				=> array(
					'data-name' 	=> 'responsive-options-wrapper'
				)
			), 'tr');

			//MARGIN

			// Show/Hide margins
			acf_render_field_wrap(array(
				'label'					=> __( 'Show Margins', 'acf-section_styles' ),
				'type'					=> 'select',
				'choices'				=> $this->show_margin_options,
				'name'					=> 'show_margin',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['show_margin'],
				'prepend'				=> __( 'top', 'acf-section_styles' ),
				'wrapper'				=> array(
					'data-name' => 'display-margin-wrapper'
				)
			), 'tr');

			// Default margins
			acf_render_field_wrap(array(
				'label'					=> __( 'Default Margins', 'acf-section_styles' ),
				'type'					=> 'number',
				'name'					=> 'margin_top',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['desktop_margin_top'],
				'prepend'				=> __( 'top', 'acf-section_styles' ),
				'wrapper'				=> array(
					'data-name' => 'margin-wrapper'
				)
			), 'tr');

			acf_render_field_wrap(array(
				'type'					=> 'number',
				'name'					=> 'margin_right',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['desktop_margin_right'],
				'prepend'				=> __( 'right', 'acf'),
				'wrapper'				=> array(
					'data-append' => 'margin-wrapper'
				)
			), 'tr');

			acf_render_field_wrap(array(
				'type'					=> 'number',
				'name'					=> 'margin_bottom',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['desktop_margin_bottom'],
				'prepend'				=> __( 'bottom', 'acf' ),
				'wrapper'				=> array(
					'data-append' => 'margin-wrapper'
				)
			), 'tr');

			acf_render_field_wrap(array(
				'type'					=> 'number',
				'name'					=> 'margin_left',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['desktop_margin_left'],
				'prepend'				=> __( 'left', 'acf' ),
				'wrapper'				=> array(
					'data-append' => 'margin-wrapper'
				)
			), 'tr');

			//PADDING

			// Show/Hide padding
			acf_render_field_wrap(array(
				'label'					=> __( 'Show Padding', 'acf-section_styles' ),
				'type'					=> 'select',
				'choices'				=> $this->show_padding_options,
				'name'					=> 'show_padding',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['show_padding'],
				'prepend'				=> __( 'top', 'acf-section_styles' ),
				'wrapper'				=> array(
					'data-name' => 'display-padding-wrapper'
				)
			), 'tr');

			// Default padding
			acf_render_field_wrap(array(
				'label'					=> __( 'Default Padding', 'acf-section_styles' ),
				'type'					=> 'number',
				'name'					=> 'padding_top',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['desktop_padding_top'],
				'prepend'				=> __( 'top', 'acf-section_styles' ),
				'wrapper'				=> array(
					'data-name' => 'padding-wrapper'
				)
			), 'tr');

			acf_render_field_wrap(array(
				'type'					=> 'number',
				'name'					=> 'padding_right',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['desktop_padding_right'],
				'prepend'				=> __( 'right', 'acf'),
				'wrapper'				=> array(
					'data-append' => 'padding-wrapper'
				)
			), 'tr');

			acf_render_field_wrap(array(
				'type'					=> 'number',
				'name'					=> 'padding_bottom',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['desktop_padding_bottom'],
				'prepend'				=> __( 'bottom', 'acf' ),
				'wrapper'				=> array(
					'data-append' => 'padding-wrapper'
				)
			), 'tr');

			acf_render_field_wrap(array(
				'type'					=> 'number',
				'name'					=> 'padding_left',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['desktop_padding_left'],
				'prepend'				=> __( 'left', 'acf' ),
				'wrapper'				=> array(
					'data-append' => 'padding-wrapper'
				)
			), 'tr');

			// Show/Hide Alignment

			acf_render_field_wrap(array(
				'label'					=> __( 'Show Alignment', 'acf-section_styles' ),
				'type'					=> 'select',
				'choices'				=> $this->show_alignment_options,
				'name'					=> 'show_alignment',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['show_alignment'],
				'prepend'				=> __( 'top', 'acf-section_styles' ),
				'wrapper'				=> array(
					'data-name' => 'display-alignment-wrapper'
				)
			), 'tr');

			// Show/Hide Background

			acf_render_field_wrap(array(
				'label'					=> __( 'Show Background', 'acf-section_styles' ),
				'type'					=> 'select',
				'choices'				=> $this->show_padding_options,
				'name'					=> 'show_background',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['show_background'],
				'prepend'				=> __( 'top', 'acf-section_styles' ),
				'wrapper'				=> array(
					'data-name' => 'display-background-wrapper'
				)
			), 'tr');
			acf_render_field_wrap(array(
				'label'					=> __( 'Default Background Position', 'acf-section_styles' ),
				'type'					=> 'select',
				'name'					=> 'background_position_1',
				'choices'				=> $this->background_position_options_1,
				'prefix'				=> $field['prefix'],
				'value'					=> $field['background_position_1'],
				'wrapper'				=> array(
					'data-name' => 'background-position-wrapper'
				)
			), 'tr');

			acf_render_field_wrap(array(
				'type'					=> 'select',
				'name'					=> 'background_position_2',
				'choices'				=> $this->background_position_options_2,
				'prefix'				=> $field['prefix'],
				'value'					=> $field['background_position_2'],
				'wrapper'				=> array(
					'data-append' => 'background-position-wrapper'
				)
			), 'tr');
			

		}

		/*
		*  render_field()
		*
		*  Create the HTML interface for your field
		*
		*  @param	$field (array) the $field being rendered
		*
		*  @type	action
		*  @since	3.6
		*  @date	23/01/13
		*
		*  @param	$field (array) the $field being edited
		*  @return	n/a
		*/

		function render_field( $field ) {

			/*echo '<pre>';
			print_r( $field );
			echo '</pre>';*/

			// if values are empty fetch defaults
			if ( empty( $field['value'] ) ) {

				//set up hidden fields for styles queries.

				$field['value']['show_responsive'] 			= $field['show_responsive'];
				$field['value']['show_full_width'] 			= $field['show_full_width'];
				$field['value']['show_margin'] 				= $field['show_margin'];
				$field['value']['show_padding'] 			= $field['show_padding'];
				$field['value']['show_alignment'] 			= $field['show_alignment'];
				$field['value']['show_background'] 			= $field['show_background'];

				$field['value']['size_on_mobile'] 			= $field['size_on_mobile'];
				$field['value']['size_on_tablet'] 			= $field['size_on_tablet'];
				$field['value']['size_on_desk'] 			= $field['size_on_desk'];

				//BOX MODEL

				$field['value']['make_full_width'] 			= $field['make_full_width'];
				//Desktop
				

				$field['value']['desktop_margin_top'] 		= $field['desktop_margin_top'];
				$field['value']['desktop_margin_right'] 	= $field['desktop_margin_right'];
				$field['value']['desktop_margin_bottom'] 	= $field['desktop_margin_bottom'];
				$field['value']['desktop_margin_left'] 		= $field['desktop_margin_left'];

				$field['value']['desktop_padding_top'] 		= $field['desktop_padding_top'];
				$field['value']['desktop_padding_right'] 	= $field['desktop_padding_right'];
				$field['value']['desktop_padding_bottom'] 	= $field['desktop_padding_bottom'];
				$field['value']['desktop_padding_left'] 	= $field['desktop_padding_left'];

				//Desktop
				$field['value']['tablet_margin_top'] 		= $field['tablet_margin_top'];
				$field['value']['tablet_margin_right'] 		= $field['tablet_margin_right'];
				$field['value']['tablet_margin_bottom'] 	= $field['tablet_margin_bottom'];
				$field['value']['tablet_margin_left'] 		= $field['tablet_margin_left'];

				$field['value']['tablet_padding_top'] 		= $field['tablet_padding_top'];
				$field['value']['tablet_padding_right'] 	= $field['tablet_padding_right'];
				$field['value']['tablet_padding_bottom'] 	= $field['tablet_padding_bottom'];
				$field['value']['tablet_padding_left'] 		= $field['tablet_padding_left'];

				//Desktop
				$field['value']['mobile_margin_top'] 		= $field['mobile_margin_top'];
				$field['value']['mobile_margin_right'] 		= $field['mobile_margin_right'];
				$field['value']['mobile_margin_bottom'] 	= $field['mobile_margin_bottom'];
				$field['value']['mobile_margin_left'] 		= $field['mobile_margin_left'];

				$field['value']['mobile_padding_top'] 		= $field['mobile_padding_top'];
				$field['value']['mobile_padding_right'] 	= $field['mobile_padding_right'];
				$field['value']['mobile_padding_bottom'] 	= $field['mobile_padding_bottom'];
				$field['value']['mobile_padding_left'] 		= $field['mobile_padding_left'];

				//ALIGNMENT

				//Desktop
				$field['value']['desktop_v_align'] 			= $field['desktop_v_align'];
				$field['value']['desktop_h_align'] 			= $field['desktop_h_align'];

				//Tablet
				$field['value']['tablet_v_align'] 			= $field['tablet_v_align'];
				$field['value']['tablet_h_align'] 			= $field['tablet_h_align'];

				//Desktop
				$field['value']['mobile_v_align'] 			= $field['mobile_v_align'];
				$field['value']['mobile_h_align'] 			= $field['mobile_h_align'];

				//BACKGROUND

				//Background Color
				$field['value']['background_color_1'] 		= $field['background_color_1'];
				$field['value']['background_color_2'] 		= $field['background_color_2'];

				//Gradient
				$field['value']['gradient_type'] 			= $field['gradient_type'];
				$field['value']['gradient_direction'] 		= $field['gradient_direction'];
				$field['value']['background_actual'] 		= $field['background_actual'];
				$field['value']['background_paralax'] 		= $field['background_paralax'];
				$field['value']['background_size'] 			= $field['background_size'];

				$field['value']['background_repeat'] 		= $field['background_repeat'];
				$field['value']['background_style'] 		= $field['background_style'];

				//TYPOGRAPHY

				// H1
				$field['value']['h1_use_default'] 			= $field['use_default_fonts'];
				$field['value']['h1_font_family'] 			= $field['base_heading_family'];
				$field['value']['h1_font_weight'] 			= $field['base_font_weight'];
				$field['value']['h1_font_size'] 			= $field['h1_font_size'];
				$field['value']['h1_font_color'] 			= $field['base_font_color'];

				$field['value']['h1_text_shadow_actual'] 	= $field['base_text_shadow'];
				$field['value']['h1_text_shadow_color'] 	= $field['base_text_shadow_color'];
				$field['value']['h1_text_shadow_h'] 		= $field['base_text_shadow_size'];
				$field['value']['h1_text_shadow_v'] 		= $field['base_text_shadow_size'];
				$field['value']['h1_text_shadow_blur'] 			= $field['base_text_shadow_size'];

				// H2
				$field['value']['h2_use_default'] 			= $field['use_default_fonts'];
				$field['value']['h2_font_family'] 			= $field['base_heading_family'];
				$field['value']['h2_font_weight'] 			= $field['base_font_weight'];
				$field['value']['h2_font_size'] 			= $field['h2_font_size'];
				$field['value']['h2_font_color'] 			= $field['base_font_color'];

				$field['value']['h2_text_shadow_actual'] 	= $field['base_text_shadow'];
				$field['value']['h2_text_shadow_color'] 	= $field['base_text_shadow_color'];
				$field['value']['h2_text_shadow_h'] 		= $field['base_text_shadow_size'];
				$field['value']['h2_text_shadow_v'] 		= $field['base_text_shadow_size'];
				$field['value']['h2_text_shadow_blur'] 			= $field['base_text_shadow_size'];

				// H3
				$field['value']['h3_use_default'] 			= $field['use_default_fonts'];
				$field['value']['h3_font_family'] 			= $field['base_heading_family'];
				$field['value']['h3_font_weight'] 			= $field['base_font_weight'];
				$field['value']['h3_font_size'] 			= $field['h3_font_size'];
				$field['value']['h3_font_color'] 			= $field['base_font_color'];

				$field['value']['h3_text_shadow_actual'] 	= $field['base_text_shadow'];
				$field['value']['h3_text_shadow_color'] 	= $field['base_text_shadow_color'];
				$field['value']['h3_text_shadow_h'] 		= $field['base_text_shadow_size'];
				$field['value']['h3_text_shadow_v'] 		= $field['base_text_shadow_size'];
				$field['value']['h3_text_shadow_blur'] 		= $field['base_text_shadow_size'];

				// H4-6
				$field['value']['h4_6_use_default'] 		= $field['use_default_fonts'];
				$field['value']['h4_6_font_family'] 		= $field['base_heading_family'];
				$field['value']['h4_6_font_weight'] 		= $field['base_font_weight'];
				$field['value']['h4_6_font_size'] 			= $field['h4_6_font_size'];
				$field['value']['h4_6_font_color'] 			= $field['base_font_color'];

				$field['value']['h4_6_text_shadow_actual'] 	= $field['base_text_shadow'];
				$field['value']['h4_6_text_shadow_color'] 	= $field['base_text_shadow_color'];
				$field['value']['h4_6_text_shadow_h'] 		= $field['base_text_shadow_size'];
				$field['value']['h4_6_text_shadow_v'] 		= $field['base_text_shadow_size'];
				$field['value']['h4_6_text_shadow_blur'] 	= $field['base_text_shadow_size'];

				// P
				$field['value']['p_use_default'] 			= $field['use_default_fonts'];
				$field['value']['p_font_family'] 			= $field['base_font_family'];
				$field['value']['p_font_weight'] 			= $field['base_font_weight'];
				$field['value']['p_font_size'] 				= $field['base_font_size'];
				$field['value']['p_font_color'] 			= $field['base_font_color'];

				$field['value']['p_text_shadow_actual'] 	= $field['base_text_shadow'];
				$field['value']['p_text_shadow_color'] 		= $field['base_text_shadow_color'];
				$field['value']['p_text_shadow_h'] 			= $field['base_text_shadow_size'];
				$field['value']['p_text_shadow_v'] 			= $field['base_text_shadow_size'];
				$field['value']['p_text_shadow_blur'] 		= $field['base_text_shadow_size'];

				// Links
				$field['value']['links_use_default'] 		= $field['use_default_fonts'];
				$field['value']['links_font_family'] 		= $field['base_font_family'];
				$field['value']['links_font_weight'] 		= $field['base_font_weight'];
				$field['value']['links_font_size'] 			= $field['base_font_size'];
				$field['value']['links_font_color'] 		= $field['base_font_color'];

				$field['value']['links_text_shadow_actual'] = $field['base_text_shadow'];
				$field['value']['links_text_shadow_color'] 	= $field['base_text_shadow_color'];
				$field['value']['links_text_shadow_h'] 		= $field['base_text_shadow_size'];
				$field['value']['links_text_shadow_v'] 		= $field['base_text_shadow_size'];
				$field['value']['links_text_shadow_blur'] 	= $field['base_text_shadow_size'];

				//ANIMATION

				// Animation Type
				$field['value']['animation_type'] 			= $field['animation_type'];

				// Animation Duration
				$field['value']['animation_duration'] 		= $field['animation_duration'];

				// Animation Delay
				$field['value']['animation_delay'] 			= $field['animation_delay'];
			}

			/*echo '<pre>';
			print_r( $field );
			echo '</pre>';*/
			?>
			<input style="display:none;" class="top" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[show_responsive]" value="<?php if ( !empty( $field['value']['show_responsive'] ) ) echo $field['value']['show_responsive']; ?>" />
			<input style="display:none;" class="top" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[show_full_width]" value="<?php if ( !empty( $field['value']['show_full_width'] ) ) echo $field['value']['show_full_width']; ?>" />
			<input style="display:none;" class="top" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[show_margin]" value="<?php if ( !empty( $field['value']['show_margin'] ) ) echo $field['value']['show_margin']; ?>" />
			<input style="display:none;" class="top" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[show_padding]" value="<?php if ( !empty( $field['value']['show_padding'] ) ) echo $field['value']['show_padding']; ?>" />
			<input style="display:none;" class="top" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[show_alignment]" value="<?php if ( !empty( $field['value']['show_alignment'] ) ) echo $field['value']['show_alignment']; ?>" />
			<input style="display:none;" class="top" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[show_background]" value="<?php if ( !empty( $field['value']['show_background'] ) ) echo $field['value']['show_background']; ?>" />
			<!-- Modal Button -->
			<div class="acf-pb-options-modal-triggers">
				<div class="box-model-trigger"><a class="acf-button button button-primary" href="#response-modal"><?php echo $field['custom_name'];?><span class="acf-icon -pencil small"</span></a></div>
				</div>
				<!-- End Modal Button -->
				<!-- End .acf-section-styles-container -->
				<div class="acf-section-styles-container" tabindex="-1">
					<!-- Modal Wrappper -->
					<div id="response-modal" class="acf-pb-options-modal">
						<!-- Modal Header -->
						<div class="modal-header">
							<span class="modal-label"><?php echo $field['custom_name'];?></span>
							<div class="modal-close">
								<span class="screen-reader-text">Close</span>
								<span class="tb-close-icon"></span>
							</div>
						</div>
						<!-- End Modal Header -->
						<!-- Modal Inner -->
						<div class="modal-inner">
							<div class="acf-pb-tabs modal-tabs">
							<!-- Start tabs -->

							<ul class="wp-tab-bar">
								<li class="wp-tab-active"><a href="#tabs-1">Layout</a></li>
								<li><a href="#tabs-2">Design</a></li>
								<li><a href="#tabs-3">Extras</a></li>
							</ul>
							<!-- End tabs -->
							<!-- Layout -->
							<div id="tabs-1" class="wp-tab-panel section-wrapper">
								<!-- Responsive Options -->
								<?php if ($field['show_responsive'] == 'yes') { ?>
								<div class="acf-pb-section acf-section-responsive-options">
									<h2 class="acf-pb-section-header">Column Sizes</h2>
									<div class="acf-pb-section-inner">
										<div class="acf-responsive-options-input-row">
											<div class="acf-responsive-options-input col-desk-6">
												<!-- Mobile Options -->
												<div class="acf-responsive-options-mobile-size-container">
													<div class="acf-label">
														<label for= ""><?php _e( 'Mobile Size', 'acf-responsive_options' ); ?></label>
													</div>

													<select id="<?php echo $field['id']; ?>_size_on_mobile" name="<?php echo esc_attr($field['name']) ?>[size_on_mobile]">
														<?php foreach ( $this->mobile_options as $v => $label ): ?>
															<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['size_on_mobile'] ) && $field['value']['size_on_mobile'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
														<?php endforeach; ?>
													</select>
												</div>
												<!-- End Mobile Options -->
											</div>
											<div class="acf-responsive-options-input col-desk-6">
												<!-- tablet Options -->
												<div class="acf-responsive-options-tablet-size-container">
													<div class="acf-label">
														<label for= ""><?php _e( 'Tablet Size', 'acf-responsive_options' ); ?></label>
													</div>

													<select id="<?php echo $field['id']; ?>_size_on_tablet" name="<?php echo esc_attr($field['name']) ?>[size_on_tablet]">
														<?php foreach ( $this->tablet_options as $v => $label ): ?>
															<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['size_on_tablet'] ) && $field['value']['size_on_tablet'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
														<?php endforeach; ?>
													</select>
												</div>
												<!-- End tablet Options -->
											</div>
											<div class="acf-responsive-options-input col-desk-6">
												<!-- desk Options -->
												<div class="acf-responsive-options-desk-size-container">
													<div class="acf-label">
														<label for= ""><?php _e( 'Desk Size', 'acf-responsive_options' ); ?></label>
													</div>

													<select id="<?php echo $field['id']; ?>_size_on_desk" name="<?php echo esc_attr($field['name']) ?>[size_on_desk]">
														<?php foreach ( $this->desk_options as $v => $label ): ?>
															<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['size_on_desk'] ) && $field['value']['size_on_desk'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
														<?php endforeach; ?>
													</select>
												</div>
												<!-- End desk Options -->
											</div>
										</div>
									</div>
								</div>
								<?php } ?>
								<!-- End Responsive Options -->
								<!-- Box Model -->
								<div class="acf-pb-section acf-pb-box-model">
									<h2 class="acf-pb-section-header">Box Model</h2>
									<?php if ($field['show_full_width'] == 'yes') { ?>
										<div class="acf-pb-section-inner">

											<!-- Full Width Options -->
											
											<div class="acf-section-styles-full-width-option">
												<div class="acf-label">
													<label for="<?php echo $field['id']; ?>_full_width_option"><?php _e( 'Make Full Width', 'acf-section_styles' ); ?></label>
												</div>
												<p><?php _e( 'If you select "Yes" this section\'s background will extend to the edges of the window.', 'acf-section_styles' ); ?></p>
												<select id="<?php echo $field['id']; ?>_make_full_width" class="acf-section-styles-full-width-option" name="<?php echo esc_attr($field['name']) ?>[make_full_width]">
													<?php foreach ( $this->full_width_options as $v => $label ): ?>
														<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['make_full_width'] ) && $field['value']['make_full_width'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
											
											<!-- End Full Width Options -->
										</div>
									<?php } ?>
									<div class="acf-pb-section-inner">
										<!-- DESKTOP -->
										<!-- Margin -->
										<?php if ($field['show_margin'] == 'yes') { ?>
										<div class="acf-section-styles-margin">
											<div class="acf-label">
												<label for="<?php echo $field['id']; ?>_desktop_margin"><?php _e( 'Desktop Margin', 'acf-section_styles' ); ?></label>
											</div>
											<ul class="pb-control-group linked">
												<li>
													<label>Top</label>
													<input class="top" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[desktop_margin_top]" value="<?php if ( !empty( $field['value']['desktop_margin_top'] ) ) echo $field['value']['desktop_margin_top']; ?>" />
												</li>
												<li>
													<label>Right</label>
													<input class="right" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[desktop_margin_right]" value="<?php if ( !empty( $field['value']['desktop_margin_top'] ) ) echo $field['value']['desktop_margin_right']; ?>" />
												</li>
												<li>
													<label>Bottom</label>
													<input class="bottom" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[desktop_margin_bottom]" value="<?php if ( !empty( $field['value']['desktop_margin_top'] ) ) echo $field['value']['desktop_margin_bottom']; ?>" />
												</li>
												<li>
													<label>Left</label>
													<input class="left" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[desktop_margin_left]" value="<?php if ( !empty( $field['value']['desktop_margin_top'] ) ) echo $field['value']['desktop_margin_left']; ?>" />
												</li>
												<li>
													<label>Link</label>
													<span class="control-button linked"><span class="dashicons dashicons-admin-links"></span><span class="dashicons dashicons-editor-unlink"></span></span>
												</li>
											</ul>
										</div> 
										<?php } ?>
										<!-- End Margin -->
										<!-- Padding -->
										<?php if ($field['show_padding'] == 'yes') { ?>
										<div class="acf-section-styles-padding">
											<div class="acf-label">
												<label for="<?php echo $field['id']; ?>_desktop_padding"><?php _e( 'Desktop Padding', 'acf-section_styles' ); ?></label>
											</div>
											<ul class="pb-control-group linked">
												<li>
													<label>Top</label>
													<input class="top" placeholder="&ndash;" min="0" name="<?php echo esc_attr($field['name']) ?>[desktop_padding_top]" value="<?php if ( !empty( $field['value']['desktop_padding_top'] ) ) echo $field['value']['desktop_padding_top']; ?>" />
												</li>
												<li>
													<label>Right</label>
													<input class="right" placeholder="&ndash;" min="0" name="<?php echo esc_attr($field['name']) ?>[desktop_padding_right]" value="<?php if ( !empty( $field['value']['desktop_padding_right'] ) ) echo $field['value']['desktop_padding_right']; ?>" />
												</li>
												<li>
													<label>Bottom</label>
													<input class="bottom" placeholder="&ndash;" min="0" name="<?php echo esc_attr($field['name']) ?>[desktop_padding_bottom]" value="<?php if ( !empty( $field['value']['desktop_padding_bottom'] ) ) echo $field['value']['desktop_padding_bottom']; ?>" />
												</li>
												<li>
													<label>Left</label>
													<input class="left" placeholder="&ndash;" min="0" name="<?php echo esc_attr($field['name']) ?>[desktop_padding_left]" value="<?php if ( !empty( $field['value']['desktop_padding_left'] ) ) echo $field['value']['desktop_padding_left']; ?>" />
												</li>
												<li>
													<label>Link</label>
													<span class="control-button linked"><span class="dashicons dashicons-admin-links"></span><span class="dashicons dashicons-editor-unlink"></span></span>
												</li>
											</ul>
										</div> 
										<?php } ?>
										<!-- End Padding -->
										<!-- END DESKTOP -->
										<!-- TABLET -->
										<!-- Margin -->
										<?php if ($field['show_margin'] == 'yes') { ?>
										<div class="acf-section-styles-margin">
											<div class="acf-label">
												<label for="<?php echo $field['id']; ?>_tablet_margin"><?php _e( 'Tablet Margin', 'acf-section_styles' ); ?></label>
											</div>
											<ul class="pb-control-group linked">
												<li>
													<label>Top</label>
													<input class="top" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[tablet_margin_top]" value="<?php if ( !empty( $field['value']['tablet_margin_top'] ) ) echo $field['value']['tablet_margin_top']; ?>" />
												</li>
												<li>
													<label>Right</label>
													<input class="right" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[tablet_margin_right]" value="<?php if ( !empty( $field['value']['tablet_margin_top'] ) ) echo $field['value']['tablet_margin_right']; ?>" />
												</li>
												<li>
													<label>Bottom</label>
													<input class="bottom" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[tablet_margin_bottom]" value="<?php if ( !empty( $field['value']['tablet_margin_top'] ) ) echo $field['value']['tablet_margin_bottom']; ?>" />
												</li>
												<li>
													<label>Left</label>
													<input class="left" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[tablet_margin_left]" value="<?php if ( !empty( $field['value']['tablet_margin_top'] ) ) echo $field['value']['tablet_margin_left']; ?>" />
												</li>
												<li>
													<label>Link</label>
													<span class="control-button linked"><span class="dashicons dashicons-admin-links"></span><span class="dashicons dashicons-editor-unlink"></span></span>
												</li>
											</ul>
										</div> 
										<?php } ?>
										<!-- End Margin -->
										<!-- Padding -->
										<?php if ($field['show_padding'] == 'yes') { ?>
										<div class="acf-section-styles-padding">
											<div class="acf-label">
												<label for="<?php echo $field['id']; ?>_tablet_padding"><?php _e( 'Tablet Padding', 'acf-section_styles' ); ?></label>
											</div>
											<ul class="pb-control-group linked">
												<li>
													<label>Top</label>
													<input class="top" placeholder="&ndash;" min="0" name="<?php echo esc_attr($field['name']) ?>[tablet_padding_top]" value="<?php if ( !empty( $field['value']['tablet_padding_top'] ) ) echo $field['value']['tablet_padding_top']; ?>" />
												</li>
												<li>
													<label>Right</label>
													<input class="right" placeholder="&ndash;" min="0" name="<?php echo esc_attr($field['name']) ?>[tablet_padding_right]" value="<?php if ( !empty( $field['value']['tablet_padding_right'] ) ) echo $field['value']['tablet_padding_right']; ?>" />
												</li>
												<li>
													<label>Bottom</label>
													<input class="bottom" placeholder="&ndash;" min="0" name="<?php echo esc_attr($field['name']) ?>[tablet_padding_bottom]" value="<?php if ( !empty( $field['value']['tablet_padding_bottom'] ) ) echo $field['value']['tablet_padding_bottom']; ?>" />
												</li>
												<li>
													<label>Left</label>
													<input class="left" placeholder="&ndash;" min="0" name="<?php echo esc_attr($field['name']) ?>[tablet_padding_left]" value="<?php if ( !empty( $field['value']['tablet_padding_left'] ) ) echo $field['value']['tablet_padding_left']; ?>" />
												</li>
												<li>
													<label>Link</label>
													<span class="control-button linked"><span class="dashicons dashicons-admin-links"></span><span class="dashicons dashicons-editor-unlink"></span></span>
												</li>
											</ul>
										</div> 
										<?php } ?>
										<!-- End Padding -->
										<!-- END TABLET -->
										<!-- MOBILE -->
										<!-- Margin -->
										<?php if ($field['show_margin'] == 'yes') { ?>
										<div class="acf-section-styles-margin">
											<div class="acf-label">
												<label for="<?php echo $field['id']; ?>_mobile_margin"><?php _e( 'Mobile Margin', 'acf-section_styles' ); ?></label>
											</div>
											<ul class="pb-control-group linked">
												<li>
													<label>Top</label>
													<input class="top" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[mobile_margin_top]" value="<?php if ( !empty( $field['value']['mobile_margin_top'] ) ) echo $field['value']['mobile_margin_top']; ?>" />
												</li>
												<li>
													<label>Right</label>
													<input class="right" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[mobile_margin_right]" value="<?php if ( !empty( $field['value']['mobile_margin_top'] ) ) echo $field['value']['mobile_margin_right']; ?>" />
												</li>
												<li>
													<label>Bottom</label>
													<input class="bottom" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[mobile_margin_bottom]" value="<?php if ( !empty( $field['value']['mobile_margin_top'] ) ) echo $field['value']['mobile_margin_bottom']; ?>" />
												</li>
												<li>
													<label>Left</label>
													<input class="left" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[mobile_margin_left]" value="<?php if ( !empty( $field['value']['mobile_margin_top'] ) ) echo $field['value']['mobile_margin_left']; ?>" />
												</li>
												<li>
													<label>Link</label>
													<span class="control-button linked"><span class="dashicons dashicons-admin-links"></span><span class="dashicons dashicons-editor-unlink"></span></span>
												</li>
											</ul>
										</div> 
										<?php } ?>
										<!-- End Margin -->
										<!-- Padding -->
										<?php if ($field['show_padding'] == 'yes') { ?>
										<div class="acf-section-styles-padding">
											<div class="acf-label">
												<label for="<?php echo $field['id']; ?>_mobile_padding"><?php _e( 'Mobile Padding', 'acf-section_styles' ); ?></label>
											</div>
											<ul class="pb-control-group linked">
												<li>
													<label>Top</label>
													<input class="top" placeholder="&ndash;" min="0" name="<?php echo esc_attr($field['name']) ?>[mobile_padding_top]" value="<?php if ( !empty( $field['value']['mobile_padding_top'] ) ) echo $field['value']['mobile_padding_top']; ?>" />
												</li>
												<li>
													<label>Right</label>
													<input class="right" placeholder="&ndash;" min="0" name="<?php echo esc_attr($field['name']) ?>[mobile_padding_right]" value="<?php if ( !empty( $field['value']['mobile_padding_right'] ) ) echo $field['value']['mobile_padding_right']; ?>" />
												</li>
												<li>
													<label>Bottom</label>
													<input class="bottom" placeholder="&ndash;" min="0" name="<?php echo esc_attr($field['name']) ?>[mobile_padding_bottom]" value="<?php if ( !empty( $field['value']['mobile_padding_bottom'] ) ) echo $field['value']['mobile_padding_bottom']; ?>" />
												</li>
												<li>
													<label>Left</label>
													<input class="left" placeholder="&ndash;" min="0" name="<?php echo esc_attr($field['name']) ?>[mobile_padding_left]" value="<?php if ( !empty( $field['value']['mobile_padding_left'] ) ) echo $field['value']['mobile_padding_left']; ?>" />
												</li>
												<li>
													<label>Link</label>
													<span class="control-button linked"><span class="dashicons dashicons-admin-links"></span><span class="dashicons dashicons-editor-unlink"></span></span>
												</li>
											</ul>
										</div> 
										<?php } ?>
										<!-- End Padding -->
										<!-- END TABLET -->
									</div>
								</div>
								<!-- End Box Model -->
								<?php if ($field['show_alignment'] == 'yes') { ?>
								<!-- Alignment -->
								<div class="acf-pb-section acf-pb-alignment">
									<h2 class="acf-pb-section-header">Alignment</h2>
									<div class="acf-pb-alignment-section">
										
										<!-- DESKTOP -->
										<div class="sub-label">
											<label><?php _e( 'Desktop', 'acf-section_styles' ); ?></label>
										</div>
										<div class="acf-pb-alignment-section-inner">
											<!-- Horizontal -->
											<div class="acf-section-styles-horizontal-alignment col-desk-6">
												<div class="acf-label">
													<label for="<?php echo $field['id']; ?>_desktop_h_align"><?php _e( 'Horizontal', 'acf-section_styles' ); ?></label>
												</div>

												<select id="<?php echo $field['id']; ?>_desktop_h_align" class="acf-section-styles-desktop-h-align" name="<?php echo esc_attr($field['name']) ?>[desktop_h_align]">
													<?php foreach ( $this->horizontal_alignment_options as $v => $label ): ?>
														<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['desktop_h_align'] ) && $field['value']['desktop_h_align'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
													<?php endforeach; ?>
												</select>
											</div> 
											<!-- End Horizontal -->
											<!-- Horizontal -->
											<div class="acf-section-styles-vertical-alignment col-desk-6">
												<div class="acf-label">
													<label for="<?php echo $field['id']; ?>_desktop_v_align"><?php _e( 'Vertical', 'acf-section_styles' ); ?></label>
												</div>

												<select id="<?php echo $field['id']; ?>_desktop_v_align" class="acf-section-styles-desktop-v-align" name="<?php echo esc_attr($field['name']) ?>[desktop_v_align]">
													<?php foreach ( $this->vertical_alignment_options as $v => $label ): ?>
														<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['desktop_v_align'] ) && $field['value']['desktop_v_align'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
													<?php endforeach; ?>
												</select>
											</div> 
											<!-- End Horizontal -->
										</div>
										<!-- END DESKTOP -->
									</div>
									<div class="acf-pb-alignment-section">
										<!-- TABLET -->
										<div class="sub-label">
											<label><?php _e( 'Tablet', 'acf-section_styles' ); ?></label>
										</div>
										<div class="acf-pb-alignment-section-inner">
											<!-- Horizontal -->
											<div class="acf-section-styles-horizontal-alignment col-desk-6">
												<div class="acf-label">
													<label for="<?php echo $field['id']; ?>_tablet_h_align"><?php _e( 'Horizontal', 'acf-section_styles' ); ?></label>
												</div>

												<select id="<?php echo $field['id']; ?>_tablet_h_align" class="acf-section-styles-tablet-h-align" name="<?php echo esc_attr($field['name']) ?>[tablet_h_align]">
													<?php foreach ( $this->horizontal_alignment_options as $v => $label ): ?>
														<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['tablet_h_align'] ) && $field['value']['tablet_h_align'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
													<?php endforeach; ?>
												</select>
											</div> 
											<!-- End Horizontal -->
											<!-- Horizontal -->
											<div class="acf-section-styles-vertical-alignment col-desk-6">
												<div class="acf-label">
													<label for="<?php echo $field['id']; ?>_tablet_v_align"><?php _e( 'Vertical', 'acf-section_styles' ); ?></label>
												</div>

												<select id="<?php echo $field['id']; ?>_tablet_v_align" class="acf-section-styles-tablet-v-align" name="<?php echo esc_attr($field['name']) ?>[tablet_v_align]">
													<?php foreach ( $this->vertical_alignment_options as $v => $label ): ?>
														<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['tablet_v_align'] ) && $field['value']['tablet_v_align'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
													<?php endforeach; ?>
												</select>
											</div> 
											<!-- End Horizontal -->
										</div>
										<!-- END TABLET -->
									</div>
									<div class="acf-pb-alignment-section">
										<!-- MOBILE -->
										<div class="sub-label">
											<label><?php _e( 'Mobile', 'acf-section_styles' ); ?></label>
										</div>
										<div class="acf-pb-alignment-section-inner">
											<!-- Horizontal -->
											<div class="acf-section-styles-horizontal-alignment col-desk-6">
												<div class="acf-label">
													<label for="<?php echo $field['id']; ?>_mobile_h_align"><?php _e( 'Horizontal', 'acf-section_styles' ); ?></label>
												</div>

												<select id="<?php echo $field['id']; ?>_mobile_h_align" class="acf-section-styles-mobile-h-align" name="<?php echo esc_attr($field['name']) ?>[mobile_h_align]">
													<?php foreach ( $this->horizontal_alignment_options as $v => $label ): ?>
														<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['mobile_h_align'] ) && $field['value']['mobile_h_align'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
													<?php endforeach; ?>
												</select>
											</div> 
											<!-- End Horizontal -->
											<!-- Horizontal -->
											<div class="acf-section-styles-vertical-alignment col-desk-6">
												<div class="acf-label">
													<label for="<?php echo $field['id']; ?>_mobile_v_align"><?php _e( 'Vertical', 'acf-section_styles' ); ?></label>
												</div>

												<select id="<?php echo $field['id']; ?>_mobile_v_align" class="acf-section-styles-mobile-v-align" name="<?php echo esc_attr($field['name']) ?>[mobile_v_align]">
													<?php foreach ( $this->vertical_alignment_options as $v => $label ): ?>
														<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['mobile_v_align'] ) && $field['value']['mobile_v_align'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
													<?php endforeach; ?>
												</select>
											</div> 
											<!-- End Horizontal -->
										</div>
										<!-- END MOBILE -->
									</div>
								</div>
								<?php } ?>
								<!-- End Alignment -->
							</div>
							<!-- End  Layout -->
							<!-- Design -->
							<div class="acf-pb-section-styles section-wrapper design-wrapper wp-tab-panel" id="tabs-2" style="display: none;">
								<!-- Background -->
								<?php if ($field['show_background'] == 'yes') { ?>
								<div class="acf-pb-section acf-pb-background">
									<h2 class="acf-pb-section-header">Background</h2>
									<div class="acf-pb-section-inner">
										<!-- Background Color -->
										<div class="acf-section-styles-background-color-container">
											<!-- Colour 1 -->
											<div class="col-desk-6">
												<div class="acf-label">
													<label for= "<?php echo $field['id']; ?>_background_color_1"><?php _e( 'Colour 1', 'acf-section_styles' ); ?></label>
													<input class="bm-pb-acf-color-picker acf-section-styles-background-color_1" data-alpha="true" name="<?php echo esc_attr($field['name']) ?>[background_color_1]" id="<?php echo $field['id']; ?>_background_color_1" type="text" value="<?php if ( !empty( $field['value']['background_color_1'] ) ) echo $field['value']['background_color_1']; ?>" />
												</div>		
											</div>
											<!--  End Color 1-->
											<!-- Colour 2 -->
											<div class="col-desk-6">
												<div class="acf-label">
													<label for= "<?php echo $field['id']; ?>_background_color_2"><?php _e( 'Colour 2', 'acf-section_styles' ); ?></label>
													<input class="bm-pb-acf-color-picker acf-section-styles-background-color_2" data-alpha="true" name="<?php echo esc_attr($field['name']) ?>[background_color_2]" id="<?php echo $field['id']; ?>_background_color_2" type="text" value="<?php if ( !empty( $field['value']['background_color_2'] ) ) echo $field['value']['background_color_2']; ?>" />
												</div>
											</div>
											<!-- End Colour 2 -->
										</div>
										<!-- End Background Color -->
										<!-- Gradient -->
										<div class="acf-section-styles-background-gradient-container col-desk-12">
											<div class="acf-section-styles-background-gradient">
												<!-- Gradient Direction -->
												<div class="acf-label">
													<label for="<?php echo $field['id']; ?>_gradient_direction"><?php _e( 'Gradient Direction', 'acf-section_styles' ); ?></label>
												</div>

												<select id="<?php echo $field['id']; ?>_gradient_direction" class="acf-section-styles-gradient-direction" name="<?php echo esc_attr($field['name']) ?>[gradient_direction]">
													<?php foreach ( $this->gradient_direction_options as $v => $label ): ?>
														<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['gradient_direction'] ) && $field['value']['gradient_direction'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
													<?php endforeach; ?>
												</select>
												<!-- End Gradient Direction -->

											</div>
										</div>
										<!-- End Gradient -->	
										<!-- Background Actual -->
										<div class="acf-section-styles-background-actual">
											<div class="acf-label">
												<label for="<?php echo $field['id']; ?>_background_actual"><?php _e( 'Background Actual', 'acf-section_styles' ); ?></label>
											</div>
											<input class="background-actual" name="<?php echo esc_attr($field['name']) ?>[background_actual]" id="<?php echo $field['id']; ?>_background_actual" type="text" value="<?php if ( !empty( $field['value']['background_actual'] ) ) echo $field['value']['background_actual']; ?>" />
										</div>
										<!-- End Background Actual -->
										<!-- Background Actual -->
										<div class="acf-section-styles-background-parallax">
											<div class="acf-label">
												<label for="<?php echo $field['id']; ?>_background_parallax"><?php _e( 'Background Parallax', 'acf-section_styles' ); ?></label>
											</div>
											<input class="background-parallax" name="<?php echo esc_attr($field['name']) ?>[background_parallax]" id="<?php echo $field['id']; ?>_background_parallax" type="text" value="<?php if ( !empty( $field['value']['background_parallax'] ) ) echo $field['value']['background_parallax']; ?>" />
										</div>
										<!-- End Background Actual -->
										<div class="background-sample"></div>	
										<!-- Background Image -->
										<?php
										$div = array(
											'class'	=> 'acf-section-styles-background-image-container',
										);

										$url = '';

										if ( !empty( $field['value']['background_image'] ) ) {

											// update vars
											$attachment = wp_get_attachment_image_src($field['value']['background_image'], 'full');

											// url exists
											if ( $attachment ) {
												$url = $attachment[0];
												$div['class'] .= ' has-value';
											}
										}
										?>
										<div <?php acf_esc_attr_e( $div ); ?>>
											<div class="acf-label">
												<label for="<?php echo $field['id']; ?>_background_image"><?php _e( 'Background Image', 'acf-section_styles' ); ?></label>
											</div>

											<input type="hidden" id="<?php echo $field['id']; ?>_background_image" name="<?php echo esc_attr($field['name']) ?>[background_image]" value="<?php if ( !empty( $field['value']['background_image'] ) ) echo $field['value']['background_image']; ?>" class="acf-section-styles-background-image-input" />

											<div class="view show-if-value">
												<div class="acf-section-styles-background-image-preview-container"<?php if ( !empty( $field['value']['background_color'] ) ) echo ' style="background-color: ' . $field['value']['background_color'] . '"'; ?>>
													<img id="<?php echo $field['id']; ?>_background_image_preview" src="<?php echo $url; ?>" alt="" class="acf-section-styles-background-image-preview" />
												</div>

												<p style="margin: 5px 0 0;"><a href="#" class="acf-section-styles-background-image-remove" data-target="<?php echo $field['id']; ?>"><?php _e( 'Remove selected image', 'acf-section_styles' ); ?></a></p>

												<div class="acf-section-styles-background-style-container col-desk-6">
													<div class="acf-label">
														<label for="<?php echo $field['id']; ?>_background_style"><?php _e( 'Image Style', 'acf-section_styles' ); ?></label>
													</div>
													<select class="image-style" id="<?php echo $field['id']; ?>_background_style" name="<?php echo esc_attr($field['name']) ?>[background_style]">
														<?php foreach ( $this->background_style_options as $v => $label ): ?>
															<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['background_style'] ) && $field['value']['background_style'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
														<?php endforeach; ?>
													</select>
												</div>

												<div class="acf-section-styles-background-style-container col-desk-6">
													<div class="acf-label">
														<label for="<?php echo $field['id']; ?>_background_repeat"><?php _e( 'Image Repeat', 'acf-section_styles' ); ?></label>
													</div>
													<select class="image-repeat" id="<?php echo $field['id']; ?>_background_repeat" name="<?php echo esc_attr($field['name']) ?>[background_repeat]">
														<?php foreach ( $this->background_repeat_options as $v => $label ): ?>
															<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['background_repeat'] ) && $field['value']['background_repeat'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
														<?php endforeach; ?>
													</select>
												</div>

												<div class="acf-section-styles-background-position-container col-desk-6">
													<div class="acf-label">
														<label for="<?php echo $field['id']; ?>_background_position_1"><?php _e( 'Image Position', 'acf-section_styles' ); ?></label>
													</div>

													<div class="acf-section-styles-input-row">
														<div class="acf-section-styles-input-col-half">
															<select class="background-pos-vert" id="<?php echo $field['id']; ?>_background_position_1" name="<?php echo esc_attr($field['name']) ?>[background_position_1]" >
																<?php foreach ( $this->background_position_options_1 as $v => $label ): ?>
																	<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['background_position_1'] ) && $field['value']['background_position_1'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
																<?php endforeach; ?>
															</select>
														</div>
														<div class="acf-section-styles-input-col-half">
															<select class="background-pos-hor" id="<?php echo $field['id']; ?>_background_position_2" name="<?php echo esc_attr($field['name']) ?>[background_position_2]" class="acf-section-styles-background-position-1">
																<?php foreach ( $this->background_position_options_2 as $v => $label ): ?>
																	<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['background_position_2'] ) && $field['value']['background_position_2'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
																<?php endforeach; ?>
															</select>
														</div>
													</div>
												</div>
												<div class="acf-section-styles-background-position-container col-desk-6">
													<div class="acf-label">
														<label for="<?php echo $field['id']; ?>_background_image_size"><?php _e( 'Image Size', 'acf-section_styles' ); ?></label>
													</div>

													<div class="acf-section-styles-input-row">
														<div class="acf-section-styles-input-col-half">
															<select class="image-size" id="<?php echo $field['id']; ?>_background_position_1" name="<?php echo esc_attr($field['name']) ?>[background_size]" >
																<?php foreach ( $this->background_size_options as $v => $label ): ?>
																	<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['background_size'] ) && $field['value']['background_size'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
																<?php endforeach; ?>
															</select>
														</div>
													</div>
												</div>

											</div>

											<div class="view hide-if-value">
												<p style="margin: 0;"><?php _e( 'No image selected','acf-section_styles' ); ?> <a data-target="<?php echo $field['id']; ?>" class="acf-button button acf-section-styles-background-image-select" href="#"><?php _e( 'Add Image','acf-section_styles' ); ?></a></p>
											</div>

										</div>
										<!-- End Background Image -->
									</div>
								</div>
								<!-- End Background -->
								<?php } ?>
							</div>
							<!-- End  Design -->
							<div class="wp-tab-panel" id="tabs-3" style="display: none;">
								<div class="acf-pb-section typography-wrapper">
									<h2 class="acf-pb-section-header">Typography</h2>
									<div class="acf-pb-tabs bm-pb-typo-tabs">
										<ul class="wp-tab-bar">
											<li><a href="#tabs-h1">H1</a></li>
											<li><a href="#tabs-h2">H2</a></li>
											<li><a href="#tabs-h3">H3</a></li>
											<li><a href="#tabs-h4-6">H4-H6</a></li>
											<li><a href="#tabs-paras">Paragraphs</a></li>
											<li><a href="#tabs-links">Links</a></li>
										</ul>
										<span class="typo-full-reset">RESET ALL TPOGRAPHY TO DEFAULTS</span>
										<div id="tabs-h1">
											<div class="acf-pb-section-inner typo-default-switcher">
												<div class="acf-label ">
													<label for="<?php echo $field['id']; ?>_h1_use_defaults"><?php _e( 'Use Default/Parent Settings', 'acf-section_styles' ); ?>
														<select id="<?php echo $field['id']; ?>_h1_use_default" name="<?php echo esc_attr($field['name']) ?>[h1_use_default]">
															<?php foreach ( $this->use_default_font_options as $v => $label ): ?>
																<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['h1_use_default'] ) && $field['value']['h1_use_default'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
															<?php endforeach; ?>
														</select>
													</label>
												</div>
											</div>
											<div class="acf-pb-section-inner<?php if ($field['value']['h1_use_default'] === 'yes') {echo ' disabled';}?>">
												<div class="row">
													<!-- Font Colour -->
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for="<?php echo $field['id']; ?>_h1_font_color"><?php _e( 'Font Colour ', 'acf-section_styles' ); ?></label>
														</div>
														<input class="acf-type-input bm-pb-typo-color acf-section-styles-h1-font-color" data-default="<?php echo $field['base_font_color'];?>" data-preview="h1-preview" data-style="color" data-alpha="true" name="<?php echo esc_attr($field['name']) ?>[h1_font_color]" id="<?php echo $field['id']; ?>_h1_font_color" type="text" value="<?php if ( !empty( $field['value']['h1_font_color'] ) ) echo $field['value']['h1_font_color']; ?>" />		
													</div>
													<!--  End Font Colour-->
													<!-- Family -->
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for="<?php echo $field['id']; ?>_h1_font_family"><?php _e( 'Font Family', 'acf-section_styles' ); ?></label>
														</div>

														<select id="<?php echo $field['id']; ?>_h1_font_family" data-default="<?php echo $field['base_heading_family'];?>" data-preview="h1-preview" data-style="font-family" class="acf-type-input acf-section-styles-h1-font-family" name="<?php echo esc_attr($field['name']) ?>[h1_font_family]">
															<?php foreach ( $this->font_family_options as $v => $label ): ?>
																<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['h1_font_family'] ) && $field['value']['h1_font_family'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
															<?php endforeach; ?>
														</select>
													</div>
													<!-- End Family -->
													<!-- Weight -->
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for="<?php echo $field['id']; ?>_h1_weight"><?php _e( 'Font Weight', 'acf-section_styles' ); ?></label>
														</div>

														<select id="<?php echo $field['id']; ?>_h1_font_weight" data-default="<?php echo $field['base_font_weight'];?>" data-preview="h1-preview" data-style="font-weight" class="acf-type-input acf-section-styles-h1-weight" name="<?php echo esc_attr($field['name']) ?>[h1_font_weight]">
															<?php foreach ( $this->font_weight_options as $v => $label ): ?>
																<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['h1_font_weight'] ) && $field['value']['h1_font_weight'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
															<?php endforeach; ?>
														</select>
													</div>
													<!-- End Weight -->
													<!-- Font Size -->
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for="<?php echo $field['id']; ?>_h1_font_size"><?php _e( 'Font Size', 'acf-section_styles' ); ?></label>
														</div>

														<input class="acf-type-input acf-section-styles-h1-font-size font-size" data-default="<?php echo $field['h1_font_size'];?>" data-preview="h1-preview" data-style="font-size" name="<?php echo esc_attr($field['name']) ?>[h1_font_size]" id="<?php echo $field['id']; ?>_h1_font_size" type="text" value="<?php if ( !empty( $field['value']['h1_font_size'] ) ) echo $field['value']['h1_font_size']; ?>" />
													</div>
													<!-- End Font Size -->
												</div>
											
												<!-- Text Shadow -->
												<div class="row text-shadow">
													<div class="bm-pb-input-wrap col-desk-12">
														<div class="acf-label">
															<label for= "<?php echo $field['id']; ?>_h1_text_shadow"><?php _e( 'Text Shadow Actual', 'acf-section_styles' ); ?></label>
														</div>
														<input class="acf-type-input acf-section-styles-text-shadow-actual" data-default="<?php echo $field['base_text_shadow'];?>" data-preview="h1-preview" data-style="text-shadow" data-alpha="true" name="<?php echo esc_attr($field['name']) ?>[h1_text_shadow_actual]" id="<?php echo $field['id']; ?>_h1_text_shadow_actual" type="text" value="<?php if ( !empty( $field['value']['h1_text_shadow_actual'] ) ) echo $field['value']['h1_text_shadow_actual']; ?>" />
													</div>
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for= "<?php echo $field['id']; ?>_h1_text_shadow_color"><?php _e( 'Text Shadow Color', 'acf-section_styles' ); ?></label>
														</div>
														<input class="acf-type-input bm-pb-typo-color acf-section-styles-text-shadow-color" data-default="<?php echo $field['base_text_shadow_color'];?>" data-preview="h1-preview" data-style="text-shadow" data-alpha="true" name="<?php echo esc_attr($field['name']) ?>[h1_text_shadow_color]" id="<?php echo $field['id']; ?>_h1_text_shadow_color" type="text" value="<?php if ( !empty( $field['value']['h1_text_shadow_color'] ) ) echo $field['value']['h1_text_shadow_color']; ?>" />
													</div>	
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for= "<?php echo $field['id']; ?>_h1_text_shadow_h"><?php _e( 'H-Shadow ', 'acf-section_styles' ); ?></label>
														</div>
														<input class="acf-type-input px-value acf-section-styles-text-shadow-h" data-default="<?php echo $field['base_text_shadow_size'];?>" data-preview="h1-preview" data-style="text-shadow" name="<?php echo esc_attr($field['name']) ?>[h1_text_shadow_h]" id="<?php echo $field['id']; ?>_h1_text_shadow_h" type="text" value="<?php if ( !empty( $field['value']['h1_text_shadow_h'] ) ) echo $field['value']['h1_text_shadow_h']; ?>" />
													</div>	
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for= "<?php echo $field['id']; ?>_h1_text_shadow_v"><?php _e( 'V-Shadow ', 'acf-section_styles' ); ?></label>
														</div>
														<input class="acf-type-input px-value acf-section-styles-text-shadow-v" data-default="<?php echo $field['base_text_shadow_size'];?>" data-preview="h1-preview" data-style="text-shadow" name="<?php echo esc_attr($field['name']) ?>[h1_text_shadow_v]" id="<?php echo $field['id']; ?>_h1_text_shadow_v" type="text" value="<?php if ( !empty( $field['value']['h1_text_shadow_v'] ) ) echo $field['value']['h1_text_shadow_v']; ?>" />
													</div>		
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for= "<?php echo $field['id']; ?>_h1_text_shadow_blur"><?php _e( 'Blur ', 'acf-section_styles' ); ?></label>
														</div>
														<input class="acf-type-input px-value acf-section-styles-text-shadow-blur" data-default="<?php echo $field['base_text_shadow_size'];?>" data-preview="h1-preview" data-style="text-shadow" name="<?php echo esc_attr($field['name']) ?>[h1_text_shadow_blur]" id="<?php echo $field['id']; ?>_h1_text_shadow_blur" type="text" value="<?php if ( !empty( $field['value']['h1_text_shadow_blur'] ) ) echo $field['value']['h1_text_shadow_blur']; ?>" />
													</div>	
												</div>
												<!--  End Text Shadow -->
												<div class="disabled-overlay"></div>
											</div>
										</div>
										<div id="tabs-h2">
											<div class="acf-pb-section-inner typo-default-switcher">
												<div class="acf-label ">
													<label for="<?php echo $field['id']; ?>_h2_use_defaults"><?php _e( 'Use Default/Parent Settings', 'acf-section_styles' ); ?>
														<select id="<?php echo $field['id']; ?>_h2_use_default" name="<?php echo esc_attr($field['name']) ?>[h2_use_default]">
															<?php foreach ( $this->use_default_font_options as $v => $label ): ?>
																<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['h2_use_default'] ) && $field['value']['h2_use_default'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
															<?php endforeach; ?>
														</select>
													</label>
												</div>
											</div>
											<div class="acf-pb-section-inner<?php if ($field['value']['h2_use_default'] === 'yes') {echo ' disabled';}?>">
												<div class="row">
													<!-- Font Colour -->
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for="<?php echo $field['id']; ?>_h2_font_color"><?php _e( 'Font Colour ', 'acf-section_styles' ); ?></label>
														</div>
														<input class="acf-type-input bm-pb-typo-color acf-section-styles-h2-font-color" data-default="<?php echo $field['base_font_color'];?>" data-preview="h2-preview" data-style="color" data-alpha="true" name="<?php echo esc_attr($field['name']) ?>[h2_font_color]" id="<?php echo $field['id']; ?>_h2_font_color" type="text" value="<?php if ( !empty( $field['value']['h2_font_color'] ) ) echo $field['value']['h2_font_color']; ?>" />		
													</div>
													<!--  End Font Colour-->
													<!-- Family -->
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for="<?php echo $field['id']; ?>_h2_font_family"><?php _e( 'Font Family', 'acf-section_styles' ); ?></label>
														</div>

														<select id="<?php echo $field['id']; ?>_h2_font_family" data-default="<?php echo $field['base_heading_family'];?>" data-preview="h2-preview" data-style="font-family" class="acf-type-input acf-section-styles-h2-font-family" name="<?php echo esc_attr($field['name']) ?>[h2_font_family]">
															<?php foreach ( $this->font_family_options as $v => $label ): ?>
																<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['h2_font_family'] ) && $field['value']['h2_font_family'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
															<?php endforeach; ?>
														</select>
													</div>
													<!-- End Family -->
													<!-- Weight -->
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for="<?php echo $field['id']; ?>_h2_weight"><?php _e( 'Font Weight', 'acf-section_styles' ); ?></label>
														</div>

														<select id="<?php echo $field['id']; ?>_h2_font_weight" data-default="<?php echo $field['base_font_weight'];?>" data-preview="h2-preview" data-style="font-weight" class="acf-type-input acf-section-styles-h2-weight" name="<?php echo esc_attr($field['name']) ?>[h2_font_weight]">
															<?php foreach ( $this->font_weight_options as $v => $label ): ?>
																<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['h2_font_weight'] ) && $field['value']['h2_font_weight'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
															<?php endforeach; ?>
														</select>
													</div>
													<!-- End Weight -->
													<!-- Font Size -->
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for="<?php echo $field['id']; ?>_h2_font_size"><?php _e( 'Font Size', 'acf-section_styles' ); ?></label>
														</div>

														<input class="acf-type-input acf-section-styles-h2-font-size font-size" data-default="<?php echo $field['h2_font_size'];?>" data-preview="h2-preview" data-style="font-size" name="<?php echo esc_attr($field['name']) ?>[h2_font_size]" id="<?php echo $field['id']; ?>_h2_font_size" type="text" value="<?php if ( !empty( $field['value']['h2_font_size'] ) ) echo $field['value']['h2_font_size']; ?>" />
													</div>
													<!-- End Font Size -->
												</div>
											
												<!-- Text Shadow -->
												<div class="row text-shadow">
													<div class="bm-pb-input-wrap col-desk-12">
														<div class="acf-label">
															<label for= "<?php echo $field['id']; ?>_h2_text_shadow"><?php _e( 'Text Shadow Actual', 'acf-section_styles' ); ?></label>
														</div>
														<input class="acf-type-input acf-section-styles-text-shadow-actual" data-default="<?php echo $field['base_text_shadow'];?>" data-preview="h2-preview" data-style="text-shadow" data-alpha="true" name="<?php echo esc_attr($field['name']) ?>[h2_text_shadow_actual]" id="<?php echo $field['id']; ?>_h2_text_shadow_actual" type="text" value="<?php if ( !empty( $field['value']['h2_text_shadow_actual'] ) ) echo $field['value']['h2_text_shadow_actual']; ?>" />
													</div>
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for= "<?php echo $field['id']; ?>_h2_text_shadow_color"><?php _e( 'Text Shadow Color', 'acf-section_styles' ); ?></label>
														</div>
														<input class="acf-type-input bm-pb-typo-color acf-section-styles-text-shadow-color" data-default="<?php echo $field['base_text_shadow_color'];?>" data-preview="h2-preview" data-style="text-shadow" data-alpha="true" name="<?php echo esc_attr($field['name']) ?>[h2_text_shadow_color]" id="<?php echo $field['id']; ?>_h2_text_shadow_color" type="text" value="<?php if ( !empty( $field['value']['h2_text_shadow_color'] ) ) echo $field['value']['h2_text_shadow_color']; ?>" />
													</div>	
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for= "<?php echo $field['id']; ?>_h2_text_shadow_h"><?php _e( 'H-Shadow ', 'acf-section_styles' ); ?></label>
														</div>
														<input class="acf-type-input px-value acf-section-styles-text-shadow-h" data-default="<?php echo $field['base_text_shadow_size'];?>" data-preview="h2-preview" data-style="text-shadow" name="<?php echo esc_attr($field['name']) ?>[h2_text_shadow_h]" id="<?php echo $field['id']; ?>_h2_text_shadow_h" type="text" value="<?php if ( !empty( $field['value']['h2_text_shadow_h'] ) ) echo $field['value']['h2_text_shadow_h']; ?>" />
													</div>	
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for= "<?php echo $field['id']; ?>_h2_text_shadow_v"><?php _e( 'V-Shadow ', 'acf-section_styles' ); ?></label>
														</div>
														<input class="acf-type-input px-value acf-section-styles-text-shadow-v" data-default="<?php echo $field['base_text_shadow_size'];?>" data-preview="h2-preview" data-style="text-shadow" name="<?php echo esc_attr($field['name']) ?>[h2_text_shadow_v]" id="<?php echo $field['id']; ?>_h2_text_shadow_v" type="text" value="<?php if ( !empty( $field['value']['h2_text_shadow_v'] ) ) echo $field['value']['h2_text_shadow_v']; ?>" />
													</div>		
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for= "<?php echo $field['id']; ?>_h2_text_shadow_blur"><?php _e( 'Blur ', 'acf-section_styles' ); ?></label>
														</div>
														<input class="acf-type-input px-value acf-section-styles-text-shadow-blur" data-default="<?php echo $field['base_text_shadow_size'];?>" data-preview="h2-preview" data-style="text-shadow" name="<?php echo esc_attr($field['name']) ?>[h2_text_shadow_blur]" id="<?php echo $field['id']; ?>_h2_text_shadow_blur" type="text" value="<?php if ( !empty( $field['value']['h2_text_shadow_blur'] ) ) echo $field['value']['h2_text_shadow_blur']; ?>" />
													</div>	
												</div>
												<!--  End Text Shadow -->
												<div class="disabled-overlay"></div>
											</div>
										</div>
										<div id="tabs-h3">
											<div class="acf-pb-section-inner typo-default-switcher">
												<div class="acf-label ">
													<label for="<?php echo $field['id']; ?>_h3_use_defaults"><?php _e( 'Use Default/Parent Settings', 'acf-section_styles' ); ?>
														<select id="<?php echo $field['id']; ?>_h3_use_default" name="<?php echo esc_attr($field['name']) ?>[h3_use_default]">
															<?php foreach ( $this->use_default_font_options as $v => $label ): ?>
																<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['h3_use_default'] ) && $field['value']['h3_use_default'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
															<?php endforeach; ?>
														</select>
													</label>
												</div>
											</div>
											<div class="acf-pb-section-inner<?php if ($field['value']['h3_use_default'] === 'yes') {echo ' disabled';}?>">
												<div class="row">
													<!-- Font Colour -->
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for="<?php echo $field['id']; ?>_h3_font_color"><?php _e( 'Font Colour ', 'acf-section_styles' ); ?></label>
														</div>
														<input class="acf-type-input bm-pb-typo-color acf-section-styles-h3-font-color" data-default="<?php echo $field['base_font_color'];?>" data-preview="h3-preview" data-style="color" data-alpha="true" name="<?php echo esc_attr($field['name']) ?>[h3_font_color]" id="<?php echo $field['id']; ?>_h3_font_color" type="text" value="<?php if ( !empty( $field['value']['h3_font_color'] ) ) echo $field['value']['h3_font_color']; ?>" />		
													</div>
													<!--  End Font Colour-->
													<!-- Family -->
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for="<?php echo $field['id']; ?>_h3_font_family"><?php _e( 'Font Family', 'acf-section_styles' ); ?></label>
														</div>

														<select id="<?php echo $field['id']; ?>_h3_font_family" data-default="<?php echo $field['base_heading_family'];?>" data-preview="h3-preview" data-style="font-family" class="acf-type-input acf-section-styles-h3-font-family" name="<?php echo esc_attr($field['name']) ?>[h3_font_family]">
															<?php foreach ( $this->font_family_options as $v => $label ): ?>
																<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['h3_font_family'] ) && $field['value']['h3_font_family'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
															<?php endforeach; ?>
														</select>
													</div>
													<!-- End Family -->
													<!-- Weight -->
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for="<?php echo $field['id']; ?>_h3_weight"><?php _e( 'Font Weight', 'acf-section_styles' ); ?></label>
														</div>

														<select id="<?php echo $field['id']; ?>_h3_font_weight" data-default="<?php echo $field['base_font_weight'];?>" data-preview="h3-preview" data-style="font-weight" class="acf-type-input acf-section-styles-h3-weight" name="<?php echo esc_attr($field['name']) ?>[h3_font_weight]">
															<?php foreach ( $this->font_weight_options as $v => $label ): ?>
																<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['h3_font_weight'] ) && $field['value']['h3_font_weight'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
															<?php endforeach; ?>
														</select>
													</div>
													<!-- End Weight -->
													<!-- Font Size -->
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for="<?php echo $field['id']; ?>_h3_font_size"><?php _e( 'Font Size', 'acf-section_styles' ); ?></label>
														</div>

														<input class="acf-type-input acf-section-styles-h3-font-size font-size" data-default="<?php echo $field['h3_font_size'];?>" data-preview="h3-preview" data-style="font-size" name="<?php echo esc_attr($field['name']) ?>[h3_font_size]" id="<?php echo $field['id']; ?>_h3_font_size" type="text" value="<?php if ( !empty( $field['value']['h3_font_size'] ) ) echo $field['value']['h3_font_size']; ?>" />
													</div>
													<!-- End Font Size -->
												</div>
											
												<!-- Text Shadow -->
												<div class="row text-shadow">
													<div class="bm-pb-input-wrap col-desk-12">
														<div class="acf-label">
															<label for= "<?php echo $field['id']; ?>_h3_text_shadow"><?php _e( 'Text Shadow Actual', 'acf-section_styles' ); ?></label>
														</div>
														<input class="acf-type-input acf-section-styles-text-shadow-actual" data-default="<?php echo $field['base_text_shadow'];?>" data-preview="h3-preview" data-style="text-shadow" data-alpha="true" name="<?php echo esc_attr($field['name']) ?>[h3_text_shadow_actual]" id="<?php echo $field['id']; ?>_h3_text_shadow_actual" type="text" value="<?php if ( !empty( $field['value']['h3_text_shadow_actual'] ) ) echo $field['value']['h3_text_shadow_actual']; ?>" />
													</div>
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for= "<?php echo $field['id']; ?>_h3_text_shadow_color"><?php _e( 'Text Shadow Color', 'acf-section_styles' ); ?></label>
														</div>
														<input class="acf-type-input bm-pb-typo-color acf-section-styles-text-shadow-color" data-default="<?php echo $field['base_text_shadow_color'];?>" data-preview="h3-preview" data-style="text-shadow" data-alpha="true" name="<?php echo esc_attr($field['name']) ?>[h3_text_shadow_color]" id="<?php echo $field['id']; ?>_h3_text_shadow_color" type="text" value="<?php if ( !empty( $field['value']['h3_text_shadow_color'] ) ) echo $field['value']['h3_text_shadow_color']; ?>" />
													</div>	
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for= "<?php echo $field['id']; ?>_h3_text_shadow_h"><?php _e( 'H-Shadow ', 'acf-section_styles' ); ?></label>
														</div>
														<input class="acf-type-input px-value acf-section-styles-text-shadow-h" data-default="<?php echo $field['base_text_shadow_size'];?>" data-preview="h3-preview" data-style="text-shadow" name="<?php echo esc_attr($field['name']) ?>[h3_text_shadow_h]" id="<?php echo $field['id']; ?>_h3_text_shadow_h" type="text" value="<?php if ( !empty( $field['value']['h3_text_shadow_h'] ) ) echo $field['value']['h3_text_shadow_h']; ?>" />
													</div>	
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for= "<?php echo $field['id']; ?>_h3_text_shadow_v"><?php _e( 'V-Shadow ', 'acf-section_styles' ); ?></label>
														</div>
														<input class="acf-type-input px-value acf-section-styles-text-shadow-v" data-default="<?php echo $field['base_text_shadow_size'];?>" data-preview="h3-preview" data-style="text-shadow" name="<?php echo esc_attr($field['name']) ?>[h3_text_shadow_v]" id="<?php echo $field['id']; ?>_h3_text_shadow_v" type="text" value="<?php if ( !empty( $field['value']['h3_text_shadow_v'] ) ) echo $field['value']['h3_text_shadow_v']; ?>" />
													</div>		
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for= "<?php echo $field['id']; ?>_h3_text_shadow_blur"><?php _e( 'Blur ', 'acf-section_styles' ); ?></label>
														</div>
														<input class="acf-type-input px-value acf-section-styles-text-shadow-blur" data-default="<?php echo $field['base_text_shadow_size'];?>" data-preview="h3-preview" data-style="text-shadow" name="<?php echo esc_attr($field['name']) ?>[h3_text_shadow_blur]" id="<?php echo $field['id']; ?>_h3_text_shadow_blur" type="text" value="<?php if ( !empty( $field['value']['h3_text_shadow_blur'] ) ) echo $field['value']['h3_text_shadow_blur']; ?>" />
													</div>	
												</div>
												<!--  End Text Shadow -->
												<div class="disabled-overlay"></div>
											</div>
										</div>
										<div id="tabs-h4-6">
											<div class="acf-pb-section-inner typo-default-switcher">
												<div class="acf-label ">
													<label for="<?php echo $field['id']; ?>_h4_6_use_defaults"><?php _e( 'Use Default/Parent Settings', 'acf-section_styles' ); ?>
														<select id="<?php echo $field['id']; ?>_h4_6_use_default" name="<?php echo esc_attr($field['name']) ?>[h4_6_use_default]">
															<?php foreach ( $this->use_default_font_options as $v => $label ): ?>
																<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['h4_6_use_default'] ) && $field['value']['h4_6_use_default'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
															<?php endforeach; ?>
														</select>
													</label>
												</div>
											</div>
											<div class="acf-pb-section-inner<?php if ($field['value']['h4_6_use_default'] === 'yes') {echo ' disabled';}?>">
												<div class="row">
													<!-- Font Colour -->
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for="<?php echo $field['id']; ?>_h4_6_font_color"><?php _e( 'Font Colour ', 'acf-section_styles' ); ?></label>
														</div>
														<input class="acf-type-input bm-pb-typo-color acf-section-styles-h4-6-font-color" data-default="<?php echo $field['base_font_color'];?>" data-preview="h4-6-preview" data-style="color" data-alpha="true" name="<?php echo esc_attr($field['name']) ?>[h4_6_font_color]" id="<?php echo $field['id']; ?>_h4_6_font_color" type="text" value="<?php if ( !empty( $field['value']['h4_6_font_color'] ) ) echo $field['value']['h4_6_font_color']; ?>" />		
													</div>
													<!--  End Font Colour-->
													<!-- Family -->
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for="<?php echo $field['id']; ?>_h4_6_font_family"><?php _e( 'Font Family', 'acf-section_styles' ); ?></label>
														</div>

														<select id="<?php echo $field['id']; ?>_h4_6_font_family" data-default="<?php echo $field['base_heading_family'];?>" data-preview="h4-6-preview" data-style="font-family" class="acf-type-input acf-section-styles-h4-6-font-family" name="<?php echo esc_attr($field['name']) ?>[h4_6_font_family]">
															<?php foreach ( $this->font_family_options as $v => $label ): ?>
																<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['h4_6_font_family'] ) && $field['value']['h4_6_font_family'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
															<?php endforeach; ?>
														</select>
													</div>
													<!-- End Family -->
													<!-- Weight -->
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for="<?php echo $field['id']; ?>_h4_6_weight"><?php _e( 'Font Weight', 'acf-section_styles' ); ?></label>
														</div>

														<select id="<?php echo $field['id']; ?>_h4_6_font_weight" data-default="<?php echo $field['base_font_weight'];?>" data-preview="h4-6-preview" data-style="font-weight" class="acf-type-input acf-section-styles-h4-6-weight" name="<?php echo esc_attr($field['name']) ?>[h4_6_font_weight]">
															<?php foreach ( $this->font_weight_options as $v => $label ): ?>
																<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['h4_6_font_weight'] ) && $field['value']['h4_6_font_weight'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
															<?php endforeach; ?>
														</select>
													</div>
													<!-- End Weight -->
													<!-- Font Size -->
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for="<?php echo $field['id']; ?>_h4_6_font_size"><?php _e( 'Font Size', 'acf-section_styles' ); ?></label>
														</div>

														<input class="acf-type-input acf-section-styles-h4-6-font-size font-size" data-default="<?php echo $field['h4_6_font_size'];?>" data-preview="h4-6-preview" data-style="font-size" name="<?php echo esc_attr($field['name']) ?>[h4_6_font_size]" id="<?php echo $field['id']; ?>_h4_6_font_size" type="text" value="<?php if ( !empty( $field['value']['h4_6_font_size'] ) ) echo $field['value']['h4_6_font_size']; ?>" />
													</div>
													<!-- End Font Size -->
												</div>
											
												<!-- Text Shadow -->
												<div class="row text-shadow">
													<div class="bm-pb-input-wrap col-desk-12">
														<div class="acf-label">
															<label for= "<?php echo $field['id']; ?>_h4_6_text_shadow"><?php _e( 'Text Shadow Actual', 'acf-section_styles' ); ?></label>
														</div>
														<input class="acf-type-input acf-section-styles-text-shadow-actual" data-default="<?php echo $field['base_text_shadow'];?>" data-preview="h4-6-preview" data-style="text-shadow" data-alpha="true" name="<?php echo esc_attr($field['name']) ?>[h4_6_text_shadow_actual]" id="<?php echo $field['id']; ?>_h4_6_text_shadow_actual" type="text" value="<?php if ( !empty( $field['value']['h4_6_text_shadow_actual'] ) ) echo $field['value']['h4_6_text_shadow_actual']; ?>" />
													</div>
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for= "<?php echo $field['id']; ?>_h4_6_text_shadow_color"><?php _e( 'Text Shadow Color', 'acf-section_styles' ); ?></label>
														</div>
														<input class="acf-type-input bm-pb-typo-color acf-section-styles-text-shadow-color" data-default="<?php echo $field['base_text_shadow_color'];?>" data-preview="h4-6-preview" data-style="text-shadow" data-alpha="true" name="<?php echo esc_attr($field['name']) ?>[h4_6_text_shadow_color]" id="<?php echo $field['id']; ?>_h4_6_text_shadow_color" type="text" value="<?php if ( !empty( $field['value']['h4_6_text_shadow_color'] ) ) echo $field['value']['h4_6_text_shadow_color']; ?>" />
													</div>	
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for= "<?php echo $field['id']; ?>_h4_6_text_shadow_h"><?php _e( 'H-Shadow ', 'acf-section_styles' ); ?></label>
														</div>
														<input class="acf-type-input px-value acf-section-styles-text-shadow-h" data-default="<?php echo $field['base_text_shadow_size'];?>" data-preview="h4-6-preview" data-style="text-shadow" name="<?php echo esc_attr($field['name']) ?>[h4_6_text_shadow_h]" id="<?php echo $field['id']; ?>_h4_6_text_shadow_h" type="text" value="<?php if ( !empty( $field['value']['h4_6_text_shadow_h'] ) ) echo $field['value']['h4_6_text_shadow_h']; ?>" />
													</div>	
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for= "<?php echo $field['id']; ?>_h4_6_text_shadow_v"><?php _e( 'V-Shadow ', 'acf-section_styles' ); ?></label>
														</div>
														<input class="acf-type-input px-value acf-section-styles-text-shadow-v" data-default="<?php echo $field['base_text_shadow_size'];?>" data-preview="h4-6-preview" data-style="text-shadow" name="<?php echo esc_attr($field['name']) ?>[h4_6_text_shadow_v]" id="<?php echo $field['id']; ?>_h4_6_text_shadow_v" type="text" value="<?php if ( !empty( $field['value']['h4_6_text_shadow_v'] ) ) echo $field['value']['h4_6_text_shadow_v']; ?>" />
													</div>		
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for= "<?php echo $field['id']; ?>_h4_6_text_shadow_blur"><?php _e( 'Blur ', 'acf-section_styles' ); ?></label>
														</div>
														<input class="acf-type-input px-value acf-section-styles-text-shadow-blur" data-default="<?php echo $field['base_text_shadow_size'];?>" data-preview="h4-6-preview" data-style="text-shadow" name="<?php echo esc_attr($field['name']) ?>[h4_6_text_shadow_blur]" id="<?php echo $field['id']; ?>_h4_6_text_shadow_blur" type="text" value="<?php if ( !empty( $field['value']['h4_6_text_shadow_blur'] ) ) echo $field['value']['h4_6_text_shadow_blur']; ?>" />
													</div>	
												</div>
												<!--  End Text Shadow -->
												<div class="disabled-overlay"></div>
											</div>
										</div>
										<div id="tabs-paras">
											<div class="acf-pb-section-inner typo-default-switcher">
												<div class="acf-label ">
													<label for="<?php echo $field['id']; ?>_p_use_defaults"><?php _e( 'Use Default/Parent Settings', 'acf-section_styles' ); ?>
														<select id="<?php echo $field['id']; ?>_p_use_default" name="<?php echo esc_attr($field['name']) ?>[p_use_default]">
															<?php foreach ( $this->use_default_font_options as $v => $label ): ?>
																<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['p_use_default'] ) && $field['value']['p_use_default'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
															<?php endforeach; ?>
														</select>
													</label>
												</div>
											</div>
											<div class="acf-pb-section-inner<?php if ($field['value']['p_use_default'] === 'yes') {echo ' disabled';}?>">
												<div class="row">
													<!-- Font Colour -->
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for="<?php echo $field['id']; ?>_p_font_color"><?php _e( 'Font Colour ', 'acf-section_styles' ); ?></label>
														</div>
														<input class="acf-type-input bm-pb-typo-color acf-section-styles-p-font-color" data-default="<?php echo $field['base_font_color'];?>" data-preview="p-preview" data-style="color" data-alpha="true" name="<?php echo esc_attr($field['name']) ?>[p_font_color]" id="<?php echo $field['id']; ?>_p_font_color" type="text" value="<?php if ( !empty( $field['value']['p_font_color'] ) ) echo $field['value']['p_font_color']; ?>" />		
													</div>
													<!--  End Font Colour-->
													<!-- Family -->
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for="<?php echo $field['id']; ?>_p_font_family"><?php _e( 'Font Family', 'acf-section_styles' ); ?></label>
														</div>

														<select id="<?php echo $field['id']; ?>_p_font_family" data-default="<?php echo $field['base_heading_family'];?>" data-preview="p-preview" data-style="font-family" class="acf-type-input acf-section-styles-p-font-family" name="<?php echo esc_attr($field['name']) ?>[p_font_family]">
															<?php foreach ( $this->font_family_options as $v => $label ): ?>
																<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['p_font_family'] ) && $field['value']['p_font_family'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
															<?php endforeach; ?>
														</select>
													</div>
													<!-- End Family -->
													<!-- Weight -->
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for="<?php echo $field['id']; ?>_p_weight"><?php _e( 'Font Weight', 'acf-section_styles' ); ?></label>
														</div>

														<select id="<?php echo $field['id']; ?>_p_font_weight" data-default="<?php echo $field['base_font_weight'];?>" data-preview="p-preview" data-style="font-weight" class="acf-type-input acf-section-styles-p-weight" name="<?php echo esc_attr($field['name']) ?>[p_font_weight]">
															<?php foreach ( $this->font_weight_options as $v => $label ): ?>
																<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['p_font_weight'] ) && $field['value']['p_font_weight'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
															<?php endforeach; ?>
														</select>
													</div>
													<!-- End Weight -->
													<!-- Font Size -->
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for="<?php echo $field['id']; ?>_p_font_size"><?php _e( 'Font Size', 'acf-section_styles' ); ?></label>
														</div>

														<input class="acf-type-input acf-section-styles-p-font-size font-size" data-default="<?php echo $field['p_font_size'];?>" data-preview="p-preview" data-style="font-size" name="<?php echo esc_attr($field['name']) ?>[p_font_size]" id="<?php echo $field['id']; ?>_p_font_size" type="text" value="<?php if ( !empty( $field['value']['p_font_size'] ) ) echo $field['value']['p_font_size']; ?>" />
													</div>
													<!-- End Font Size -->
												</div>
											
												<!-- Text Shadow -->
												<div class="row text-shadow">
													<div class="bm-pb-input-wrap col-desk-12">
														<div class="acf-label">
															<label for= "<?php echo $field['id']; ?>_p_text_shadow"><?php _e( 'Text Shadow Actual', 'acf-section_styles' ); ?></label>
														</div>
														<input class="acf-type-input acf-section-styles-text-shadow-actual" data-default="<?php echo $field['base_text_shadow'];?>" data-preview="p-preview" data-style="text-shadow" data-alpha="true" name="<?php echo esc_attr($field['name']) ?>[p_text_shadow_actual]" id="<?php echo $field['id']; ?>_p_text_shadow_actual" type="text" value="<?php if ( !empty( $field['value']['p_text_shadow_actual'] ) ) echo $field['value']['p_text_shadow_actual']; ?>" />
													</div>
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for= "<?php echo $field['id']; ?>_p_text_shadow_color"><?php _e( 'Text Shadow Color', 'acf-section_styles' ); ?></label>
														</div>
														<input class="acf-type-input bm-pb-typo-color acf-section-styles-text-shadow-color" data-default="<?php echo $field['base_text_shadow_color'];?>" data-preview="p-preview" data-style="text-shadow" data-alpha="true" name="<?php echo esc_attr($field['name']) ?>[p_text_shadow_color]" id="<?php echo $field['id']; ?>_p_text_shadow_color" type="text" value="<?php if ( !empty( $field['value']['p_text_shadow_color'] ) ) echo $field['value']['p_text_shadow_color']; ?>" />
													</div>	
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for= "<?php echo $field['id']; ?>_p_text_shadow_h"><?php _e( 'H-Shadow ', 'acf-section_styles' ); ?></label>
														</div>
														<input class="acf-type-input px-value acf-section-styles-text-shadow-h" data-default="<?php echo $field['base_text_shadow_size'];?>" data-preview="p-preview" data-style="text-shadow" name="<?php echo esc_attr($field['name']) ?>[p_text_shadow_h]" id="<?php echo $field['id']; ?>_p_text_shadow_h" type="text" value="<?php if ( !empty( $field['value']['p_text_shadow_h'] ) ) echo $field['value']['p_text_shadow_h']; ?>" />
													</div>	
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for= "<?php echo $field['id']; ?>_p_text_shadow_v"><?php _e( 'V-Shadow ', 'acf-section_styles' ); ?></label>
														</div>
														<input class="acf-type-input px-value acf-section-styles-text-shadow-v" data-default="<?php echo $field['base_text_shadow_size'];?>" data-preview="p-preview" data-style="text-shadow" name="<?php echo esc_attr($field['name']) ?>[p_text_shadow_v]" id="<?php echo $field['id']; ?>_p_text_shadow_v" type="text" value="<?php if ( !empty( $field['value']['p_text_shadow_v'] ) ) echo $field['value']['p_text_shadow_v']; ?>" />
													</div>		
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for= "<?php echo $field['id']; ?>_p_text_shadow_blur"><?php _e( 'Blur ', 'acf-section_styles' ); ?></label>
														</div>
														<input class="acf-type-input px-value acf-section-styles-text-shadow-blur" data-default="<?php echo $field['base_text_shadow_size'];?>" data-preview="p-preview" data-style="text-shadow" name="<?php echo esc_attr($field['name']) ?>[p_text_shadow_blur]" id="<?php echo $field['id']; ?>_p_text_shadow_blur" type="text" value="<?php if ( !empty( $field['value']['p_text_shadow_blur'] ) ) echo $field['value']['p_text_shadow_blur']; ?>" />
													</div>	
												</div>
												<!--  End Text Shadow -->
												<div class="disabled-overlay"></div>
											</div>
										</div>
										<div id="tabs-links">
											<div class="acf-pb-section-inner typo-default-switcher">
												<div class="acf-label ">
													<label for="<?php echo $field['id']; ?>_links_use_defaults"><?php _e( 'Use Default/Parent Settings', 'acf-section_styles' ); ?>
														<select id="<?php echo $field['id']; ?>_links_use_default" name="<?php echo esc_attr($field['name']) ?>[links_use_default]">
															<?php foreach ( $this->use_default_font_options as $v => $label ): ?>
																<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['links_use_default'] ) && $field['value']['links_use_default'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
															<?php endforeach; ?>
														</select>
													</label>
												</div>
											</div>
											<div class="acf-pb-section-inner<?php if ($field['value']['links_use_default'] === 'yes') {echo ' disabled';}?>">
												<div class="row">
													<!-- Font Colour -->
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for="<?php echo $field['id']; ?>_links_font_color"><?php _e( 'Font Colour ', 'acf-section_styles' ); ?></label>
														</div>
														<input class="acf-type-input bm-pb-typo-color acf-section-styles-links-font-color" data-default="<?php echo $field['base_font_color'];?>" data-preview="links-preview" data-style="color" data-alpha="true" name="<?php echo esc_attr($field['name']) ?>[links_font_color]" id="<?php echo $field['id']; ?>_links_font_color" type="text" value="<?php if ( !empty( $field['value']['links_font_color'] ) ) echo $field['value']['links_font_color']; ?>" />		
													</div>
													<!--  End Font Colour-->
													<!-- Family -->
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for="<?php echo $field['id']; ?>_links_font_family"><?php _e( 'Font Family', 'acf-section_styles' ); ?></label>
														</div>

														<select id="<?php echo $field['id']; ?>_links_font_family" data-default="<?php echo $field['base_heading_family'];?>" data-preview="links-preview" data-style="font-family" class="acf-type-input acf-section-styles-links-font-family" name="<?php echo esc_attr($field['name']) ?>[links_font_family]">
															<?php foreach ( $this->font_family_options as $v => $label ): ?>
																<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['links_font_family'] ) && $field['value']['links_font_family'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
															<?php endforeach; ?>
														</select>
													</div>
													<!-- End Family -->
													<!-- Weight -->
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for="<?php echo $field['id']; ?>_links_weight"><?php _e( 'Font Weight', 'acf-section_styles' ); ?></label>
														</div>

														<select id="<?php echo $field['id']; ?>_links_font_weight" data-default="<?php echo $field['base_font_weight'];?>" data-preview="links-preview" data-style="font-weight" class="acf-type-input acf-section-styles-links-weight" name="<?php echo esc_attr($field['name']) ?>[links_font_weight]">
															<?php foreach ( $this->font_weight_options as $v => $label ): ?>
																<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['links_font_weight'] ) && $field['value']['links_font_weight'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
															<?php endforeach; ?>
														</select>
													</div>
													<!-- End Weight -->
													<!-- Font Size -->
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for="<?php echo $field['id']; ?>_links_font_size"><?php _e( 'Font Size', 'acf-section_styles' ); ?></label>
														</div>

														<input class="acf-type-input acf-section-styles-links-font-size font-size" data-default="<?php echo $field['links_font_size'];?>" data-preview="links-preview" data-style="font-size" name="<?php echo esc_attr($field['name']) ?>[links_font_size]" id="<?php echo $field['id']; ?>_links_font_size" type="text" value="<?php if ( !empty( $field['value']['links_font_size'] ) ) echo $field['value']['links_font_size']; ?>" />
													</div>
													<!-- End Font Size -->
												</div>
											
												<!-- Text Shadow -->
												<div class="row text-shadow">
													<div class="bm-pb-input-wrap col-desk-12">
														<div class="acf-label">
															<label for= "<?php echo $field['id']; ?>_links_text_shadow"><?php _e( 'Text Shadow Actual', 'acf-section_styles' ); ?></label>
														</div>
														<input class="acf-type-input acf-section-styles-text-shadow-actual" data-default="<?php echo $field['base_text_shadow'];?>" data-preview="links-preview" data-style="text-shadow" data-alpha="true" name="<?php echo esc_attr($field['name']) ?>[links_text_shadow_actual]" id="<?php echo $field['id']; ?>_links_text_shadow_actual" type="text" value="<?php if ( !empty( $field['value']['links_text_shadow_actual'] ) ) echo $field['value']['links_text_shadow_actual']; ?>" />
													</div>
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for= "<?php echo $field['id']; ?>_links_text_shadow_color"><?php _e( 'Text Shadow Color', 'acf-section_styles' ); ?></label>
														</div>
														<input class="acf-type-input bm-pb-typo-color acf-section-styles-text-shadow-color" data-default="<?php echo $field['base_text_shadow_color'];?>" data-preview="links-preview" data-style="text-shadow" data-alpha="true" name="<?php echo esc_attr($field['name']) ?>[links_text_shadow_color]" id="<?php echo $field['id']; ?>_links_text_shadow_color" type="text" value="<?php if ( !empty( $field['value']['links_text_shadow_color'] ) ) echo $field['value']['links_text_shadow_color']; ?>" />
													</div>	
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for= "<?php echo $field['id']; ?>_links_text_shadow_h"><?php _e( 'H-Shadow ', 'acf-section_styles' ); ?></label>
														</div>
														<input class="acf-type-input px-value acf-section-styles-text-shadow-h" data-default="<?php echo $field['base_text_shadow_size'];?>" data-preview="links-preview" data-style="text-shadow" name="<?php echo esc_attr($field['name']) ?>[links_text_shadow_h]" id="<?php echo $field['id']; ?>_links_text_shadow_h" type="text" value="<?php if ( !empty( $field['value']['links_text_shadow_h'] ) ) echo $field['value']['links_text_shadow_h']; ?>" />
													</div>	
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for= "<?php echo $field['id']; ?>_links_text_shadow_v"><?php _e( 'V-Shadow ', 'acf-section_styles' ); ?></label>
														</div>
														<input class="acf-type-input px-value acf-section-styles-text-shadow-v" data-default="<?php echo $field['base_text_shadow_size'];?>" data-preview="links-preview" data-style="text-shadow" name="<?php echo esc_attr($field['name']) ?>[links_text_shadow_v]" id="<?php echo $field['id']; ?>_links_text_shadow_v" type="text" value="<?php if ( !empty( $field['value']['links_text_shadow_v'] ) ) echo $field['value']['links_text_shadow_v']; ?>" />
													</div>		
													<div class="bm-pb-input-wrap col-desk-3">
														<div class="acf-label">
															<label for= "<?php echo $field['id']; ?>_links_text_shadow_blur"><?php _e( 'Blur ', 'acf-section_styles' ); ?></label>
														</div>
														<input class="acf-type-input px-value acf-section-styles-text-shadow-blur" data-default="<?php echo $field['base_text_shadow_size'];?>" data-preview="links-preview" data-style="text-shadow" name="<?php echo esc_attr($field['name']) ?>[links_text_shadow_blur]" id="<?php echo $field['id']; ?>_links_text_shadow_blur" type="text" value="<?php if ( !empty( $field['value']['links_text_shadow_blur'] ) ) echo $field['value']['links_text_shadow_blur']; ?>" />
													</div>	
												</div>
												<!--  End Text Shadow -->
												<div class="disabled-overlay"></div>
											</div>
										</div>
									</div>
									<div class="bm-pb-acf-typo-preview-container">
										<div class="acf-label">
											<label>Typography Preview</label>
										</div>
										<div class="bm-pb-acf-typo-preview">
											<h1 class="h1-preview">Heading 1</h1>
											<h2 class="h2-preview">Heading 2</h2>
											<h3 class="h3-preview">Heading 3</h3>
											<h4 class="h4-6-preview">Heading 4-6</h4>
											<p class="p-preview">Paragraph Text</p>
											<a class="a-preview" href="javascript:void(0)">Links</a>
										</div>
									</div>
								</div>
								<div class="acf-pb-section">
									<h2 class="acf-pb-section-header">Animation</h2>
									<div class="acf-pb-section-inner">
										<!-- Animation -->
										<div class="acf-section-styles-animation">
											<!-- Animation Type -->
											<div class="col-desk-4">
												<div class="acf-label">
													<label for="<?php echo $field['id']; ?>_animation_type"><?php _e( 'Animation Type', 'acf-section_styles' ); ?></label>
												</div>
												<select id="<?php echo $field['id']; ?>_animation_type" class="acf-section-styles-animation-type" name="<?php echo esc_attr($field['name']) ?>[animation_type]">
													<?php foreach ( $this->animation_type_options as $v => $label ): ?>
														<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['animation_type'] ) && $field['value']['animation_type'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
											<!-- End Animation Type -->
											<!-- Animation Duration -->
											<div class="col-desk-4">
												<div class="acf-label">
													<label for="<?php echo $field['id']; ?>_animation_duration"><?php _e( 'Animation Duration', 'acf-section_styles' ); ?></label>
												</div>
												<input class="acf-section-styles-animation-duration" name="<?php echo esc_attr($field['name']) ?>[animation_duration]" id="<?php echo $field['id']; ?>_animation_duration" type="text" value="<?php if ( !empty( $field['value']['animation_duration'] ) ) echo $field['value']['animation_duration']; ?>" />
											</div>
											<!-- End Animation Duration -->
											<!-- Animation Delay -->
											<div class="col-desk-4">
												<div class="acf-label">
													<label for="<?php echo $field['id']; ?>_animation_delay"><?php _e( 'Animation Delay', 'acf-section_styles' ); ?></label>
												</div>

												<input class="acf-section-styles-animation-delay" name="<?php echo esc_attr($field['name']) ?>[animation_delay]" id="<?php echo $field['id']; ?>_animation_delay" type="text" value="<?php if ( !empty( $field['value']['animation_delay'] ) ) echo $field['value']['animation_delay']; ?>" />
											</div>
											<!-- End Animation Delay -->
										</div>
									</div>
								</div>								
							</div>
						</div>
					</div>
					<!-- End Modal Inner -->
				</div>
				<!-- End Modal Wrappper -->
			</div> 
				<!-- End .acf-section-styles-container -->
				<?php
			}


		/*
		*  input_admin_enqueue_scripts()
		*
		*  This action is called in the admin_enqueue_scripts action on the edit screen where your field is created.
		*  Use this action to add CSS + JavaScript to assist your render_field() action.
		*
		*  @type	action (admin_enqueue_scripts)
		*  @since	3.6
		*  @date	23/01/13
		*
		*  @param	n/a
		*  @return	n/a
		*/

		function input_admin_enqueue_scripts() {

			// vars
			$url = $this->settings['url'];
			$version = $this->settings['version'];

			// register & include JS
			wp_enqueue_media();
			
			wp_register_script('acf-input-section_styles-js', plugin_dir_url( __FILE__ ) . '/js/input.js', array('jquery'), $version );
			wp_enqueue_script('acf-input-section_styles-js');

			// Tabslet - https://github.com/vdw/Tabslet
			wp_register_script('acf-pb-tabslet', plugin_dir_url( __FILE__ ) . '/js/jquery.tabslet.min.js', array('jquery'), $version );
			wp_enqueue_script('acf-pb-tabslet');

			// Alpha color picker - https://github.com/kallookoo/wp-color-picker-alpha
			wp_enqueue_style('wp-color-picker' );
			wp_register_script('bm-pb-acf-alpha-color-picker-js', plugin_dir_url( __FILE__ ) . '/js/wp-color-picker-alpha.min.js', array('wp-color-picker'), $version, true );
			wp_enqueue_script('bm-pb-acf-alpha-color-picker-js');


			// register & include CSS
			//wp_register_style( 'acf-input-section_styles', "{$url}assets/css/input.css", array('acf-input'), $version );
			//wp_enqueue_style('acf-input-section_styles');
		}	

		/*
		*  format_value()
		*
		*  This filter is appied to the $value after it is loaded from the db and before it is returned to the template
		*
		*  @type	filter
		*  @since	3.6
		*  @date	23/01/13
		*
		*  @param	$value (mixed) the value which was loaded from the database
		*  @param	$post_id (mixed) the $post_id from which the value was loaded
		*  @param	$field (array) the field array holding all the field options
		*
		*  @return	$value (mixed) the modified value
		*/

		function format_value( $value, $post_id, $field ) {

			// bail early if no value
			if ( empty( $value ) ) return $value;

			if ( !empty( $value['background_image'] ) ) {
				$value['background_image'] = acf_get_attachment( $value['background_image'] );
			}

			// background position value
			$value['background_position'] = $value['background_position_1'] . ' ' . $value['background_position_2'];

			// format padding value
			$value['margin'] = !empty( $value['margin_top'] ) ? $value['margin_top'] : '0';
			$value['margin'] .= ' ';	// space
			$value['margin'] .= !empty( $value['margin_right'] ) ? $value['margin_right'] : '0';
			$value['margin'] .= ' ';	// space
			$value['margin'] .= !empty( $value['margin_bottom'] ) ? $value['margin_bottom'] : '0';
			$value['margin'] .= ' ';	// space
			$value['margin'] .= !empty( $value['margin_left'] ) ? $value['margin_left'] : '0';

			// format border value
			$value['border_width'] = !empty( $value['border_top'] ) ? $value['border_top'] : '0';
			$value['border_width'] .= ' ';	// space
			$value['border_width'] .= !empty( $value['border_right'] ) ? $value['border_right'] : '0';
			$value['border_width'] .= ' ';	// space
			$value['border_width'] .= !empty( $value['border_bottom'] ) ? $value['border_bottom'] : '0';
			$value['border_width'] .= ' ';	// space
			$value['border_width'] .= !empty( $value['border_left'] ) ? $value['border_left'] : '0';

			// format padding value
			$value['padding'] = !empty( $value['padding_top'] ) ? $value['padding_top'] : '0';
			$value['padding'] .= ' ';	// space
			$value['padding'] .= !empty( $value['padding_right'] ) ? $value['padding_right'] : '0';
			$value['padding'] .= ' ';	// space
			$value['padding'] .= !empty( $value['padding_bottom'] ) ? $value['padding_bottom'] : '0';
			$value['padding'] .= ' ';	// space
			$value['padding'] .= !empty( $value['padding_left'] ) ? $value['padding_left'] : '0';

			return $value;
		}

		/*
		*  update_value()
		*
		*  This filter is applied to the $field before it is saved to the database
		*
		*  @type	filter
		*  @date	23/01/2013
		*  @since	3.6.0
		*
		*  @param	$field (array) the field array holding all the field options
		*  @return	$field
		*/

		function update_value( $value, $post_id, $field  ) {

			$default_unit = apply_filters( 'acf_section_styles_default_unit', 'px' );

			// if fields do not have a unit attached apply default unit
			$auto_append_unit_items = apply_filters( 'acf_section_styles_append_units', array(
				'desktop_margin_top',
				'desktop_margin_right',
				'desktop_margin_bottom',
				'desktop_margin_left',
				'desktop_border_top',
				'desktop_border_right',
				'desktop_border_bottom',
				'desktop_border_left',
				'desktop_padding_top',
				'desktop_padding_right',
				'desktop_padding_bottom',
				'desktop_padding_left',
				'h1_font_size',
				'h2_font_size',
				'h3_font_size',
				'h4_6_font_size',
				'p_font_size',
				'links_font_size',
			) );

			foreach ( $auto_append_unit_items as $i ) {
				if ( ctype_digit( $value[$i] ) ) {
					$value[$i] .= $default_unit;
				}
			}

			return $value;

		}	

	}

	// initialize
	new acf_field_section_styles( $this->settings );

// class_exists check
endif;