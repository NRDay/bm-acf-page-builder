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
	
				//mobile	
				'mobile_margin_top'				=> '0',
				'mobile_margin_right'			=> '0',
				'mobile_margin_bottom'			=> '0',
				'mobile_margin_left'			=> '0',
				'mobile_padding_top'			=> '0',
				'mobile_padding_right'			=> '0',
				'mobile_padding_bottom'			=> '0',
				'mobile_padding_left'			=> '0',
	
				'border_top'					=> '0',
				'border_right'					=> '0',
				'border_bottom'					=> '0',
				'border_left'					=> '0',
				'border_style'					=> 'solid',
						
				'background_style'				=> 'default',
			);

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

			// Default margins
			acf_render_field_wrap(array(
				'label'					=> __( 'Default Margins', 'acf-section_styles' ),
				'type'					=> 'text',
				'name'					=> 'margin_top',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['margin_top'],
				'prepend'				=> __( 'top', 'acf-section_styles' ),
				'wrapper'				=> array(
					'data-name' => 'margin-wrapper'
				)
			), 'tr');

			acf_render_field_wrap(array(
				'type'					=> 'text',
				'name'					=> 'margin_right',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['margin_right'],
				'prepend'				=> __( 'right', 'acf'),
				'wrapper'				=> array(
					'data-append' => 'margin-wrapper'
				)
			), 'tr');

			acf_render_field_wrap(array(
				'type'					=> 'text',
				'name'					=> 'margin_bottom',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['margin_bottom'],
				'prepend'				=> __( 'bottom', 'acf' ),
				'wrapper'				=> array(
					'data-append' => 'margin-wrapper'
				)
			), 'tr');

			acf_render_field_wrap(array(
				'type'					=> 'text',
				'name'					=> 'margin_left',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['margin_left'],
				'prepend'				=> __( 'left', 'acf' ),
				'wrapper'				=> array(
					'data-append' => 'margin-wrapper'
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

			// Default padding
			acf_render_field_wrap(array(
				'label'					=> __( 'Default Padding', 'acf-section_styles' ),
				'type'					=> 'text',
				'name'					=> 'padding_top',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['padding_top'],
				'prepend'				=> __( 'top', 'acf-section_styles' ),
				'wrapper'				=> array(
					'data-name' => 'padding-wrapper'
				)
			), 'tr');

			acf_render_field_wrap(array(
				'type'					=> 'text',
				'name'					=> 'padding_right',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['padding_right'],
				'prepend'				=> __( 'right', 'acf'),
				'wrapper'				=> array(
					'data-append' => 'padding-wrapper'
				)
			), 'tr');

			acf_render_field_wrap(array(
				'type'					=> 'text',
				'name'					=> 'padding_bottom',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['padding_bottom'],
				'prepend'				=> __( 'bottom', 'acf' ),
				'wrapper'				=> array(
					'data-append' => 'padding-wrapper'
				)
			), 'tr');

			acf_render_field_wrap(array(
				'type'					=> 'text',
				'name'					=> 'padding_left',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['padding_left'],
				'prepend'				=> __( 'left', 'acf' ),
				'wrapper'				=> array(
					'data-append' => 'padding-wrapper'
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

				//desktop
				$field['value']['desktop_margin_top'] = $field['desktop_margin_top'];
				$field['value']['desktop_margin_right'] = $field['desktop_margin_right'];
				$field['value']['desktop_margin_bottom'] = $field['desktop_margin_bottom'];
				$field['value']['desktop_margin_left'] = $field['desktop_margin_left'];

				$field['value']['desktop_padding_top'] = $field['desktop_padding_top'];
				$field['value']['desktop_padding_right'] = $field['desktop_padding_right'];
				$field['value']['desktop_padding_bottom'] = $field['desktop_padding_bottom'];
				$field['value']['desktop_padding_left'] = $field['desktop_padding_left'];

				//tablet
				$field['value']['tablet_margin_top'] = $field['tablet_margin_top'];
				$field['value']['tablet_margin_right'] = $field['tablet_margin_right'];
				$field['value']['tablet_margin_bottom'] = $field['tablet_margin_bottom'];
				$field['value']['tablet_margin_left'] = $field['tablet_margin_left'];

				$field['value']['tablet_padding_top'] = $field['tablet_padding_top'];
				$field['value']['tablet_padding_right'] = $field['tablet_padding_right'];
				$field['value']['tablet_padding_bottom'] = $field['tablet_padding_bottom'];
				$field['value']['tablet_padding_left'] = $field['tablet_padding_left'];

				//mobile
				$field['value']['desktop_margin_top'] = $field['desktop_margin_top'];
				$field['value']['desktop_margin_right'] = $field['desktop_margin_right'];
				$field['value']['desktop_margin_bottom'] = $field['desktop_margin_bottom'];
				$field['value']['desktop_margin_left'] = $field['desktop_margin_left'];

				$field['value']['desktop_padding_top'] = $field['desktop_padding_top'];
				$field['value']['desktop_padding_right'] = $field['desktop_padding_right'];
				$field['value']['desktop_padding_bottom'] = $field['desktop_padding_bottom'];
				$field['value']['desktop_padding_left'] = $field['desktop_padding_left'];

				//border
				$field['value']['border_top'] = $field['border_top'];
				$field['value']['border_right'] = $field['border_right'];
				$field['value']['border_bottom'] = $field['border_bottom'];
				$field['value']['border_left'] = $field['border_left'];
				$field['value']['border_color'] = $field['border_color'];
				$field['value']['border_style'] = $field['border_style'];

				//background
				$field['value']['background_color'] = $field['background_color'];
				$field['value']['background_style'] = $field['background_style'];
				}
			?>
			<div class="acf-pb-options-modal-triggers">
				<div class="box-model-trigger"><a class="acf-button button button-primary" href="#response-modal">Column Options<span class="acf-icon -pencil small"</span></a></div>
			</div>
			<div class="acf-section-styles-container" tabindex="-1">
				<div id="response-modal" class="acf-pb-options-modal">
					<div class="modal-header">
						<span class="modal-label">Column Options</span>
						<div class="modal-close">
							<span class="screen-reader-text">Close</span>
							<span class="tb-close-icon"></span>
						</div>
					</div>
					<div class="modal-inner">
		
						<!-- Desktop Layout -->
						<div class="acf-section-styles-box-model desktop">

							<!-- Margin -->
							<div class="acf-section-styles-margin">
								
								<div class="acf-label">
									<label for="<?php echo $field['id']; ?>_desktop_margin"><?php _e( 'Desktop Margin', 'acf-section_styles' ); ?></label>
								</div>
								<ul class="pb-control-group linked">
									<li>
										<label>Top</label>
										<input type="number" class="margin top" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[desktop_margin_top]" value="<?php if ( !empty( $field['value']['desktop_margin_top'] ) ) echo $field['value']['desktop_margin_right']; ?>" />
									</li>
									<li>
										<label>Right</label>
										<input type="number" class="margin right" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[desktop_margin_right]" value="<?php if ( !empty( $field['value']['desktop_margin_top'] ) ) echo $field['value']['desktop_margin_right']; ?>" />
									</li>
									<li>
										<label>Bottom</label>
										<input type="number" class="margin bottom" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[desktop_margin_bottom]" value="<?php if ( !empty( $field['value']['desktop_margin_top'] ) ) echo $field['value']['desktop_margin_bottom']; ?>" />
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
						<div class="acf-section-styles-box-model tablet">

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
						<div class="acf-section-styles-box-model mobile">

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
				</div>
			</div> <!-- End .acf-section-styles-container -->
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
				'margin_top',
				'margin_right',
				'margin_bottom',
				'margin_left',
				'border_top',
				'border_right',
				'border_bottom',
				'border_left',
				'padding_top',
				'padding_right',
				'padding_bottom',
				'padding_left'
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