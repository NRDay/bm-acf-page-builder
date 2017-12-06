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

				//display
				'display_margin'		=> 'yes',
				'display_padding'		=> 'yes',

				//margin
				'margin_top'			=> '0',
				'margin_right'			=> '0',
				'margin_bottom'			=> '0',
				'margin_left'			=> '0',

				'desktop_margin_top'			=> '0',
				'desktop_margin_right'			=> '0',
				'desktop_margin_bottom'			=> '0',
				'desktop_margin_left'			=> '0',

				'tablet_margin_top'				=> '0',
				'tablet_margin_right'			=> '0',
				'tablet_margin_bottom'			=> '0',
				'tablet_margin_left'			=> '0',

				'mobile_margin_top'				=> '0',
				'mobile_margin_right'			=> '0',
				'mobile_margin_bottom'			=> '0',
				'mobile_margin_left'			=> '0',

				'margin_unit'					=> 'px',

				//padding
				'padding_top'			=> '0',
				'padding_right'			=> '0',
				'padding_bottom'		=> '0',
				'padding_left'			=> '0',

				'desktop_padding_top'			=> '0',
				'desktop_padding_right'			=> '0',
				'desktop_padding_bottom'		=> '0',
				'desktop_padding_left'			=> '0',

				'tablet_padding_top'			=> '0',
				'tablet_padding_right'			=> '0',
				'tablet_padding_bottom'			=> '0',
				'tablet_padding_left'			=> '0',

				'mobile_padding_top'			=> '0',
				'mobile_padding_right'			=> '0',
				'mobile_padding_bottom'			=> '0',
				'mobile_padding_left'			=> '0',

				'padding_unit'			=> 'px',
	
				'border_top'					=> '0',
				'border_right'					=> '0',
				'border_bottom'					=> '0',
				'border_left'					=> '0',
				'border_style'					=> 'solid',
						
				'background_style'				=> 'default',
			);

			$this->margin_options = apply_filters('acf_section_styles_margin_options', array(
				'yes'			=> __( 'Show', 'acf-section_styles' ),
				'no'			=> __( 'Hide', 'acf-section_styles' ),
			) );

			$this->padding_options = apply_filters('acf_section_styles_padding_options', array(
				'yes'			=> __( 'Show', 'acf-section_styles' ),
				'no'			=> __( 'Hide', 'acf-section_styles' ),
			) );

			$this->unit_options = apply_filters('acf_section_styles', array(
				'px'			=> __( 'px', 'acf-section_styles' ),
				'em'			=> __( 'em', 'acf-section_styles' ),
			) );

			$this->border_options = apply_filters( 'acf_section_styles_border_options', array(
				'none'			=> __( 'None', 'acf-section_styles' ),
				'solid'			=> __( 'Solid', 'acf-section_styles' ),
				'dotted' 		=> __( 'Dotted', 'acf-section_styles' ),
				'dashed' 		=> __( 'Dashed', 'acf-section_styles' ),
				'double'		=> __( 'Double', 'acf-section_styles' ),
				'groove'		=> __( 'Groove', 'acf-section_styles' ),
				'ridge'			=> __( 'Ridge', 'acf-section_styles' ),
				'inset'			=> __( 'Inset', 'acf-section_styles' ),
				'outset'		=> __( 'Outset', 'acf-section_styles' ),
			) );

			$this->background_style_options = apply_filters( 'acf_section_styles_background_style_options', array(
				'default'		=> __( 'Theme Default', 'acf-section_styles' ),
				'cover'			=> __( 'Cover', 'acf-section_styles' ),
				'contain'		=> __( 'Contain', 'acf-section_styles' ),
				'no-repeat'		=> __( 'No Repeat', 'acf-section_styles' ),
				'repeat'		=> __( 'Repeat', 'acf-section_styles' ),
				'repeat-x'		=> __( 'Repeat Horizontally', 'acf-section_styles' ),
				'repeat-y'		=> __( 'Repeat Vertically', 'acf-section_styles' ),
			) );

			$this->background_position_options_1 = apply_filters( 'acf_section_styles_background_position_options_1', array(
				'top'			=> __( 'Top', 'acf-section_styles' ),
				'center'		=> __( 'Center', 'acf-section_styles' ),
				'bottom'		=> __( 'Bottom', 'acf-section_styles' )
			) );

			$this->background_position_options_2 = apply_filters( 'acf_section_styles_background_position_options_2', array(
				'left'			=> __( 'Left', 'acf-section_styles' ),
				'center'		=> __( 'Center', 'acf-section_styles' ),
				'right'			=> __( 'Right', 'acf-section_styles' )
			) );

			$this->background_position_options_2 = apply_filters( 'acf_section_styles_background_position_options_2', array(
				'left'			=> __( 'Left', 'acf-section_styles' ),
				'center'		=> __( 'Center', 'acf-section_styles' ),
				'right'			=> __( 'Right', 'acf-section_styles' )
			) );

			$this->animation_type = apply_filters( 'acf_section_styles_animation_type', array(
				'none' 				=> __( '-none-', 'acf-section_styles' ),
				'bounce' 			=> __( 'bounce', 'acf-section_styles' ),
				'flash' 			=> __( 'flash', 'acf-section_styles' ),
				'pulse' 			=> __( 'pulse', 'acf-section_styles' ),
				'rubberBand' 		=> __( 'rubberBand', 'acf-section_styles' ),
				'shake' 			=> __( 'shake', 'acf-section_styles' ),
				'swing' 			=> __( 'swing', 'acf-section_styles' ),
				'tada' 				=> __( 'tada', 'acf-section_styles' ),
				'wobble'			=> __( 'wobble', 'acf-section_styles' ),
				'bounceIn' 			=> __( 'bounceIn', 'acf-section_styles' ),
				'bounceInDown' 		=> __( 'bounceInDown', 'acf-section_styles' ),
				'bounceInLeft' 		=> __( 'bounceInLeft', 'acf-section_styles' ),
				'bounceInRight' 	=> __( 'bounceInRight', 'acf-section_styles' ),
				'bounceInUp' 		=> __( 'bounceInUp', 'acf-section_styles' ),
				'fadeIn' 			=> __( 'fadeIn', 'acf-section_styles' ),
				'fadeInDown' 		=> __( 'fadeInDown', 'acf-section_styles' ),
				'fadeInDownBig' 	=> __( 'fadeInDownBig', 'acf-section_styles' ),
				'fadeInLeft' 		=> __( 'fadeInLeft', 'acf-section_styles' ),
				'fadeInLeftBig' 	=> __( 'fadeInLeftBig', 'acf-section_styles' ),
				'fadeInRight' 		=> __( 'fadeInRight', 'acf-section_styles' ),
				'fadeInRightBig' 	=> __( 'fadeInRightBig', 'acf-section_styles' ),
				'fadeInUp' 			=> __( 'fadeInUp', 'acf-section_styles' ),
				'fadeInUpBig' 		=> __( 'fadeInUpBig', 'acf-section_styles' ),
				'flip' 				=> __( 'flip', 'acf-section_styles' ),
				'flipInX' 			=> __( 'flipInX', 'acf-section_styles' ),
				'flipInY' 			=> __( 'flipInY', 'acf-section_styles' ),
				'lightSpeedIn' 		=> __( 'lightSpeedIn', 'acf-section_styles' ),
				'rotateIn' 			=> __( 'rotateIn', 'acf-section_styles' ),
				'rotateInDownLeft' 	=> __( 'rotateInDownLeft', 'acf-section_styles' ),
				'rotateInDownRight' => __( 'rotateInDownRight', 'acf-section_styles' ),
				'rotateInUpLeft' 	=> __( 'rotateInUpLeft', 'acf-section_styles' ),
				'rotateInUpRight' 	=> __( 'rotateInUpRight', 'acf-section_styles' ),
				'rollIn' 			=> __( 'rollIn', 'acf-section_styles' ),
				'zoomIn' 			=> __( 'zoomIn', 'acf-section_styles' ),
				'zoomInDown' 		=> __( 'zoomInDown', 'acf-section_styles' ),
				'zoomInLeft' 		=> __( 'zoomInLeft', 'acf-section_styles' ),
				'zoomInRight' 		=> __( 'zoomInRight', 'acf-section_styles' ),
				'zoomInUp' 			=> __( 'zoomInUp', 'acf-section_styles' ),
				'slideInDown' 		=> __( 'slideInDown', 'acf-section_styles' ),
				'slideInLeft' 		=> __( 'slideInLeft', 'acf-section_styles' ),
				'slideInRight' 		=> __( 'slideInRight', 'acf-section_styles' ),
				'slideInUp' 		=> __( 'slideInUp', 'acf-section_styles' ),
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

			// Default border styles
			acf_render_field_wrap(array(
				'label'					=> __( 'Display Margin', 'acf-section_styles' ),
				'type'					=> 'select',
				'name'					=> 'display_margin',
				'choices'				=> $this->margin_options,
				'prefix'				=> $field['prefix'],
				'value'					=> $field['display_margin'],
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

			acf_render_field_wrap(array(
				'type'					=> 'select',
				'name'					=> 'margin_unit',
				'choices'				=> $this->unit_options,
				'prefix'				=> $field['prefix'],
				'value'					=> $field['margin_unit'],
				'prepend'				=> __( 'left', 'acf' ),
				'wrapper'				=> array(
					'data-append' => 'margin-wrapper'
				)
			), 'tr');

			// Default border styles
			acf_render_field_wrap(array(
				'label'					=> __( 'Display Padding', 'acf-section_styles' ),
				'type'					=> 'select',
				'name'					=> 'display_padding',
				'choices'				=> $this->padding_options,
				'prefix'				=> $field['prefix'],
				'value'					=> $field['display_padding'],
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

			acf_render_field_wrap(array(
				'type'					=> 'select',
				'name'					=> 'padding_unit',
				'choices'				=> $this->unit_options,
				'prefix'				=> $field['prefix'],
				'value'					=> $field['padding_unit'],
				'prepend'				=> __( 'left', 'acf' ),
				'wrapper'				=> array(
					'data-append' => 'padding-wrapper'
				)
			), 'tr');


			// Default borders
			acf_render_field_wrap(array(
				'label'					=> __( 'Default Borders', 'acf-section_styles' ),
				'type'					=> 'text',
				'name'					=> 'border_top',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['border_top'],
				'prepend'				=> __( 'top', 'acf-section_styles' ),
				'wrapper'				=> array(
					'data-name' => 'border-wrapper'
				)
			), 'tr');

			acf_render_field_wrap(array(
				'type'					=> 'text',
				'name'					=> 'border_right',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['border_right'],
				'prepend'				=> __( 'right', 'acf'),
				'wrapper'				=> array(
					'data-append' => 'border-wrapper'
				)
			), 'tr');

			acf_render_field_wrap(array(
				'type'					=> 'text',
				'name'					=> 'border_bottom',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['border_bottom'],
				'prepend'				=> __( 'bottom', 'acf' ),
				'wrapper'				=> array(
					'data-append' => 'border-wrapper'
				)
			), 'tr');

			acf_render_field_wrap(array(
				'type'					=> 'text',
				'name'					=> 'border_left',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['border_left'],
				'prepend'				=> __( 'left', 'acf' ),
				'wrapper'				=> array(
					'data-append' => 'border-wrapper'
				)
			), 'tr');

			// Default border styles
			acf_render_field_wrap(array(
				'label'					=> __( 'Default Border Style', 'acf-section_styles' ),
				'type'					=> 'select',
				'name'					=> 'border_style',
				'choices'				=> $this->border_options,
				'prefix'				=> $field['prefix'],
				'value'					=> $field['border_style'],
				'wrapper'				=> array(
					'data-name' => 'border-settings-wrapper'
				)
			), 'tr');

			acf_render_field_wrap(array(
				'type'					=> 'color_picker',
				'name'					=> 'border_color',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['border_color'],
				'wrapper'				=> array(
					'data-append' => 'border-settings-wrapper'
				)
			), 'tr');

			// Default background styles
			acf_render_field_wrap(array(
				'label'					=> __( 'Default Background Style', 'acf-section_styles' ),
				'type'					=> 'select',
				'name'					=> 'background_style',
				'choices'				=> $this->background_style_options,
				'prefix'				=> $field['prefix'],
				'value'					=> $field['background_style'],
				'wrapper'				=> array(
					'data-name' => 'background-settings-wrapper'
				)
			), 'tr');

			acf_render_field_wrap(array(
				'type'					=> 'color_picker',
				'name'					=> 'background_color',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['background_color'],
				'wrapper'				=> array(
					'data-append' => 'background-settings-wrapper'
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

			// if values are empty fetch defaults
			if ( empty( $field['value'] ) ) {

				// MARGIN

				$field['value']['display_margin'] = $field['display_margin'];
				//desktop
				$field['value']['desktop_margin_top'] = $field['desktop_margin_top'];
				$field['value']['desktop_margin_right'] = $field['desktop_margin_right'];
				$field['value']['desktop_margin_bottom'] = $field['desktop_margin_bottom'];
				$field['value']['desktop_margin_left'] = $field['desktop_margin_left'];
				//tablet
				$field['value']['tablet_margin_top'] = $field['tablet_margin_top'];
				$field['value']['tablet_margin_right'] = $field['tablet_margin_right'];
				$field['value']['tablet_margin_bottom'] = $field['tablet_margin_bottom'];
				$field['value']['tablet_margin_left'] = $field['tablet_margin_left'];
				//mobile
				$field['value']['mobile_margin_top'] = $field['mobile_margin_top'];
				$field['value']['mobile_margin_right'] = $field['mobile_margin_right'];
				$field['value']['mobile_margin_bottom'] = $field['mobile_margin_bottom'];
				$field['value']['mobile_margin_left'] = $field['mobile_margin_left'];


				// PADDING

				$field['value']['display_padding'] = $field['display_padding'];
				//desktop
				$field['value']['desktop_padding_top'] = $field['desktop_padding_top'];
				$field['value']['desktop_padding_right'] = $field['desktop_padding_right'];
				$field['value']['desktop_padding_bottom'] = $field['desktop_padding_bottom'];
				$field['value']['desktop_padding_left'] = $field['desktop_padding_left'];
				//tablet
				$field['value']['tablet_padding_top'] = $field['tablet_padding_top'];
				$field['value']['tablet_padding_right'] = $field['tablet_padding_right'];
				$field['value']['tablet_padding_bottom'] = $field['tablet_padding_bottom'];
				$field['value']['tablet_padding_left'] = $field['tablet_padding_left'];
				//mobile
				$field['value']['mobile_padding_top'] = $field['mobile_padding_top'];
				$field['value']['mobile_padding_right'] = $field['pmobile_adding_right'];
				$field['value']['mobile_padding_bottom'] = $field['mobile_padding_bottom'];
				$field['value']['mobile_padding_left'] = $field['mobile_padding_left'];


				// BORDER

				$field['value']['border_top'] = $field['border_top'];
				$field['value']['border_right'] = $field['border_right'];
				$field['value']['border_bottom'] = $field['border_bottom'];
				$field['value']['border_left'] = $field['border_left'];
				$field['value']['border_color'] = $field['border_color'];
				$field['value']['border_style'] = $field['border_style'];


				// BACKGROUND

				$field['value']['background_color'] = $field['background_color'];
				$field['value']['background_style'] = $field['background_style'];

			} ?>

			<!-- Modal Button -->
			<div class="acf-pb-options-modal-triggers">
				<div class="box-model-trigger"><a class="acf-button button button-primary" href="#response-modal">Column Options<span class="acf-icon -pencil small"</span></a></div>
			</div>
			<!-- End Modal Button -->
			<!-- End .acf-section-styles-container -->
			<div class="acf-section-styles-container" tabindex="-1">
				<!-- Modal Wrappper -->
				<div id="response-modal" class="acf-pb-options-modal">
					<!-- Modal Header -->
					<div class="modal-header">
						<span class="modal-label">Column Options</span>
						<div class="modal-close">
							<span class="screen-reader-text">Close</span>
							<span class="tb-close-icon"></span>
						</div>
					</div>
					<!-- End Modal Header -->
					<!-- Modal Inner -->
					<div class="modal-inner">
						<!-- Layout -->
								<div class="acf-pb-section-styles section-wrapper layout-wrapper">
									<header>
										<h2>Layout</h2>
									</header>
									<!-- Responsive Switcher -->
									<!-- <div class="devices-switcher">
										<ul class="pb-control-group devices">
											<li><span class="dashicons dashicons-desktop"></span></li>
											<li><span class="dashicons dashicons-tablet"></span></li>
											<li><span class="dashicons dashicons-tablet"></span></li>
										</ul>
									</div> -->
									<!-- Desktop Layout -->
									<div class="acf-pb-desktop-layout">
										<!-- Margin -->
											<div class="acf-section-styles-margin">
												<div class="acf-label">
													<label for="<?php echo $field['id']; ?>_desktop_margin"><?php _e( 'Desktop Margin', 'acf-section_styles' ); ?></label>
												</div>
												<ul class="pb-control-group linked">
													<li>
														<label>Top</label>
														<input type="number" class="margin top" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[desktop_margin_top]" value="<?php if ( !empty( $field['value']['desktop_margin_top'] ) ) echo $field['value']['desktop_margin_top']; ?>" />
													</li>
													<li>
														<label>Right</label>
														<input type="number" class="margin right" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[desktop_margin_right]" value="<?php if ( !empty( $field['value']['desktop_margin_right'] ) ) echo $field['value']['desktop_margin_right']; ?>" />
													</li>
													<li>
														<label>Bottom</label>
														<input type="number" class="margin bottom" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[desktop_margin_bottom]" value="<?php if ( !empty( $field['value']['desktop_margin_bottom'] ) ) echo $field['value']['desktop_margin_bottom']; ?>" />
													</li>
													<li>
														<label>Left</label>
														<input type="number" class="margin left" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[desktop_margin_left]" value="<?php if ( !empty( $field['value']['desktop_margin_top'] ) ) echo $field['value']['desktop_margin_left']; ?>" />
													</li>
													<li>
														<label>Link</label>
														<span class="control-button linked"><span class="dashicons dashicons-admin-links"></span><span class="dashicons dashicons-editor-unlink"></span></span>
													</li>
												</ul>
											</div> 
										<!-- End Margin -->
										<!-- Padding -->
											<div class="acf-section-styles-padding">
												<div class="acf-label">
													<label for="<?php echo $field['id']; ?>_desktop_padding"><?php _e( 'Desktop Padding', 'acf-section_styles' ); ?></label>
												</div>
												<ul class="pb-control-group linked">
													<li>
														<label>Top</label>
														<input type="number" class="padding top" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[desktop_padding_top]" value="<?php if ( !empty( $field['value']['desktop_padding_top'] ) ) echo $field['value']['desktop_padding_right']; ?>" />
													</li>
													<li>
														<label>Right</label>
														<input type="number" class="padding right" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[desktop_padding_right]" value="<?php if ( !empty( $field['value']['desktop_padding_top'] ) ) echo $field['value']['desktop_padding_right']; ?>" />
													</li>
													<li>
														<label>Bottom</label>
														<input type="number" class="padding bottom" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[desktop_padding_bottom]" value="<?php if ( !empty( $field['value']['desktop_padding_top'] ) ) echo $field['value']['desktop_padding_bottom']; ?>" />
													</li>
													<li>
														<label>Left</label>
														<input type="number" class="padding left" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[desktop_padding_left]" value="<?php if ( !empty( $field['value']['desktop_padding_top'] ) ) echo $field['value']['desktop_padding_left']; ?>" />
													</li>
													<li>
														<label>Link</label>
														<span class="control-button linked"><span class="dashicons dashicons-admin-links"></span><span class="dashicons dashicons-editor-unlink"></span></span>
													</li>
												</ul>
											</div> 
										<!-- End Padding -->
									</div>
									<!-- End Desktop Layout -->
									<!-- Tablet Layout -->
									<div class="acf-pb-tablet-layout">
										<!-- Margin -->
											<div class="acf-section-styles-margin">
												<div class="acf-label">
													<label for="<?php echo $field['id']; ?>_tablet_margin"><?php _e( 'Tablet Margin', 'acf-section_styles' ); ?></label>
												</div>
												<ul class="pb-control-group linked">
													<li>
														<label>Top</label>
														<input type="number" class="margin top" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[tablet_margin_top]" value="<?php if ( !empty( $field['value']['tablet_margin_top'] ) ) echo $field['value']['tablet_margin_right']; ?>" />
													</li>
													<li>
														<label>Right</label>
														<input type="number" class="margin right" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[tablet_margin_right]" value="<?php if ( !empty( $field['value']['tablet_margin_top'] ) ) echo $field['value']['tablet_margin_right']; ?>" />
													</li>
													<li>
														<label>Bottom</label>
														<input type="number" class="margin bottom" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[tablet_margin_bottom]" value="<?php if ( !empty( $field['value']['tablet_margin_top'] ) ) echo $field['value']['tablet_margin_bottom']; ?>" />
													</li>
													<li>
														<label>Left</label>
														<input type="number" class="margin left" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[tablet_margin_left]" value="<?php if ( !empty( $field['value']['tablet_margin_top'] ) ) echo $field['value']['tablet_margin_left']; ?>" />
													</li>
													<li>
														<label>Link</label>
														<span class="control-button linked"><span class="dashicons dashicons-admin-links"></span><span class="dashicons dashicons-editor-unlink"></span></span>
													</li>
												</ul>
											</div> 
										<!-- End Margin -->
										<!-- Padding -->
											<div class="acf-section-styles-padding">
												<div class="acf-label">
													<label for="<?php echo $field['id']; ?>_tablet_padding"><?php _e( 'Tablet Padding', 'acf-section_styles' ); ?></label>
												</div>
												<ul class="pb-control-group linked">
													<li>
														<label>Top</label>
														<input type="number" class="padding top" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[tablet_padding_top]" value="<?php if ( !empty( $field['value']['tablet_padding_top'] ) ) echo $field['value']['tablet_padding_right']; ?>" />
													</li>
													<li>
														<label>Right</label>
														<input type="number" class="padding right" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[tablet_padding_right]" value="<?php if ( !empty( $field['value']['tablet_padding_top'] ) ) echo $field['value']['tablet_padding_right']; ?>" />
													</li>
													<li>
														<label>Bottom</label>
														<input type="number" class="padding bottom" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[tablet_padding_bottom]" value="<?php if ( !empty( $field['value']['tablet_padding_top'] ) ) echo $field['value']['tablet_padding_bottom']; ?>" />
													</li>
													<li>
														<label>Left</label>
														<input type="number" class="padding left" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[tablet_padding_left]" value="<?php if ( !empty( $field['value']['tablet_padding_top'] ) ) echo $field['value']['tablet_padding_left']; ?>" />
													</li>
													<li>
														<label>Link</label>
														<span class="control-button linked"><span class="dashicons dashicons-admin-links"></span><span class="dashicons dashicons-editor-unlink"></span></span>
													</li>
												</ul>
											</div> 
										<!-- End Padding -->
									</div>
									<!-- End Tablet Layout -->
									<!-- Mobile Layout -->
									<div class="acf-pb-mobile-layout">
										<!-- Margin -->
											<div class="acf-section-styles-margin">
												<div class="acf-label">
													<label for="<?php echo $field['id']; ?>_mobile_margin"><?php _e( 'Mobile Margin', 'acf-section_styles' ); ?></label>
												</div>
												<ul class="pb-control-group linked">
													<li>
														<label>Top</label>
														<input type="number" class="margin top" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[mobile_margin_top]" value="<?php if ( !empty( $field['value']['mobile_margin_top'] ) ) echo $field['value']['mobile_margin_right']; ?>" />
													</li>
													<li>
														<label>Right</label>
														<input type="number" class="margin right" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[mobile_margin_right]" value="<?php if ( !empty( $field['value']['mobile_margin_top'] ) ) echo $field['value']['mobile_margin_right']; ?>" />
													</li>
													<li>
														<label>Bottom</label>
														<input type="number" class="margin bottom" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[mobile_margin_bottom]" value="<?php if ( !empty( $field['value']['mobile_margin_top'] ) ) echo $field['value']['mobile_margin_bottom']; ?>" />
													</li>
													<li>
														<label>Left</label>
														<input type="number" class="margin left" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[mobile_margin_left]" value="<?php if ( !empty( $field['value']['mobile_margin_top'] ) ) echo $field['value']['mobile_margin_left']; ?>" />
													</li>
													<li>
														<label>Link</label>
														<span class="control-button linked"><span class="dashicons dashicons-admin-links"></span><span class="dashicons dashicons-editor-unlink"></span></span>
													</li>
												</ul>
											</div>
										<!-- End Margin -->
										<!-- Padding -->
											<div class="acf-section-styles-padding">
												<div class="acf-label">
													<label for="<?php echo $field['id']; ?>_mobile_padding"><?php _e( 'Mobile Padding', 'acf-section_styles' ); ?></label>
												</div>
												<ul class="pb-control-group linked">
													<li>
														<label>Top</label>
														<input type="number" class="padding top" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[mobile_padding_top]" value="<?php if ( !empty( $field['value']['mobile_padding_top'] ) ) echo $field['value']['mobile_padding_right']; ?>" />
													</li>
													<li>
														<label>Right</label>
														<input type="number" class="padding right" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[mobile_padding_right]" value="<?php if ( !empty( $field['value']['mobile_padding_top'] ) ) echo $field['value']['mobile_padding_right']; ?>" />
													</li>
													<li>
														<label>Bottom</label>
														<input type="number" class="padding bottom" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[mobile_padding_bottom]" value="<?php if ( !empty( $field['value']['mobile_padding_top'] ) ) echo $field['value']['mobile_padding_bottom']; ?>" />
													</li>
													<li>
														<label>Left</label>
														<input type="number" class="padding left" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[mobile_padding_left]" value="<?php if ( !empty( $field['value']['mobile_padding_top'] ) ) echo $field['value']['mobile_padding_left']; ?>" />
													</li>
													<li>
														<label>Link</label>
														<span class="control-button linked"><span class="dashicons dashicons-admin-links"></span><span class="dashicons dashicons-editor-unlink"></span></span>
													</li>
												</ul>
											</div> 
										<!-- End Padding -->
									</div>
									<!-- End Mobile Layout -->
								</div>
						<!-- End  Layout -->
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

		/*function input_admin_enqueue_scripts() {

			// vars
			$url = $this->settings['url'];
			$version = $this->settings['version'];

			// register & include JS
			wp_enqueue_media();
			wp_enqueue_style( 'wp-color-picker' );
			wp_register_script( 'acf-input-section_styles', "{$url}assets/js/input.js", array('acf-input'), $version );
			wp_enqueue_script('acf-input-section_styles');

			// register & include CSS
			wp_register_style( 'acf-input-section_styles', "{$url}assets/css/input.css", array('acf-input'), $version );
			wp_enqueue_style('acf-input-section_styles');

		}	*/

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


		}	

	}

	// initialize
	new acf_field_section_styles( $this->settings );

// class_exists check
endif;