<?php

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// check if class already exists
if ( !class_exists('acf_field_section_options') ) :

	class acf_field_section_options extends acf_field {

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

			$this->name = 'section_options';
			$this->label = __( 'Section Options', 'acf-section_options' );
			$this->category = apply_filters( 'acf_section_options_category', 'Appearance' );

			$this->defaults = array(
				'background_color'		=> 'transparent',
				'make_full_width'		=> 'no',
			);

			$this->background_color = apply_filters( 'acf_section_options_background_color', array(
				'transparent'			=> __( 'Transparent', 'acf-section_options' ),
				'white'					=> __( 'White', 'acf-section_options' ),
				'purple'				=> __( 'Purple', 'acf-section_options' ),
				'green'					=> __( 'Green', 'acf-section_options' ),
			) );

			$this->make_full_width = apply_filters( 'acf_section_options_make_full_width', array(
				'no'					=> __( 'No', 'acf-section_options' ),
				'yes'					=> __( 'Yes', 'acf-section_options' ),
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

			// Default Colour
			acf_render_field_wrap(array(
				'label'					=> __( 'Default Background Colour', 'acf-section_options' ),
				'type'					=> 'select',
				'name'					=> 'background_colour',
				'choices'				=> $this->background_color,
				'prefix'				=> $field['prefix'],
				'value'					=> $field['background_color'],
				'wrapper'				=> array(
					'data-name' 	=> 'section-options-wrapper'
				)
			), 'tr');

			// Default Parallax
			acf_render_field_wrap(array(
				'label'					=> __( 'Default Full Width Option', 'acf-section_styles' ),
				'type'					=> 'select',
				'name'					=> 'make_full_width',
				'choices'				=> $this->make_full_width,
				'prefix'				=> $field['prefix'],
				'value'					=> $field['make_full_width'],
				'wrapper'				=> array(
					'data-name' 	=> 'make_full_width_options-wrapper'
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
				$field['value']['background_colour'] 	= $field['background_colour'];
				$field['value']['make_full_width'] 		= $field['make_full_width'];
				}
			?>
			<div class="acf-pb-options-modal-triggers">
				<div class="box-model-trigger"><a class="acf-button button button-primary" href="#section-modal">Section Options<span class="acf-icon -pencil small"</span></a></div>
			</div>
			<div class="acf-section-options-container" tabindex="-1">
				<div id="section-modal" class="acf-pb-options-modal">
					<div class="modal-header"><span class="modal-label">Section Options</span><div class="modal-close"><span class="screen-reader-text">Close</span><span class="tb-close-icon"></span></div></div>
						<div class="modal-inner">
						<!-- Responsive Options -->
						<div class="acf-section-section-options">

							<div class="acf-section-options-input-row">
								<div class="acf-section-options-input">
									<!-- Colour Options -->
									<div class="acf-section-options-background-container">
										<div class="acf-label">
											<label for= ""><?php _e( 'Background Colour', 'acf-section_options' ); ?></label>
											<p><?php _e( 'Choose the background colour for this section.', 'acf-section_options' ); ?>
										</div>

										<select id="<?php echo $field['id']; ?>_background_colour" name="<?php echo esc_attr($field['name']) ?>[background_colour]">
											<?php foreach ( $this->background_color as $v => $label ): ?>
											<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['background_colour'] ) && $field['value']['background_colour'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<!-- End Colour Options -->
								</div>
								
								<div class="acf-section-options-input">
									<!-- tablet Options -->
									<div class="acf-section-options-full-width">
										<div class="acf-label">
											<label for= ""><?php _e( 'Make Section Full Width', 'acf-section_options' ); ?></label>
											<p><?php _e( 'Choose "Yes" if you want the background to stretch the full width of the window.', 'acf-section_options' ); ?>
										</div>

										<select id="<?php echo $field['id']; ?>_make_full_width" name="<?php echo esc_attr($field['name']) ?>[make_full_width]">
											<?php foreach ( $this->make_full_width as $v => $label ): ?>
											<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['make_full_width'] ) && $field['value']['make_full_width'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<!-- End tablet Options -->
								</div>
							</div>

						</div>
						<!-- End Style Options -->
					</div>
				</div>
			</div> <!-- End .acf-section-styles-container -->
		<?php
		}

	}

	// initialize
	new acf_field_section_options( $this->settings );

// class_exists check
endif;
