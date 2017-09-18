<?php

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// check if class already exists
if ( !class_exists('acf_field_responsive_options') ) :

	class acf_field_responsive_options extends acf_field {

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

			$this->name = 'responsive_options';
			$this->label = __( 'Responsive Options', 'acf-responsive_options' );
			$this->category = apply_filters( 'acf_responsive_options_category', 'Appearance' );

			$this->defaults = array(
				'unique_id'				=> '',
				'background_color'		=> 'transparent',
				'size_on_mobile'		=> '0',
				'size_on_tablet'		=> '0',
				'center_on_tablet'		=> '0',
				'size_on_desktop'		=> '0',
			);

			$this->background_color = apply_filters( 'acf_responsive_options_background_color', array(
				'transparent'			=> __( 'Transparent', 'acf-responsive_options' ),
				'white'					=> __( 'White', 'acf-responsive_options' ),
				'purple'				=> __( 'Purple', 'acf-responsive_options' ),
				'green'					=> __( 'Green', 'acf-responsive_options' ),
			) );

			$this->mobile_options = apply_filters( 'acf_responsive_options_mobile_options', array(
				'col-mobile-1'			=> __( '1', 'acf-responsive_options' ),
				'col-mobile-2'			=> __( '2', 'acf-responsive_options' ),
				'col-mobile-3'			=> __( '3', 'acf-responsive_options' ),
				'col-mobile-4'			=> __( '4', 'acf-responsive_options' ),
				'col-mobile-5'			=> __( '5', 'acf-responsive_options' ),
				'col-mobile-6'			=> __( '6', 'acf-responsive_options' ),
				'col-mobile-7'			=> __( '7', 'acf-responsive_options' ),
				'col-mobile-8'			=> __( '8', 'acf-responsive_options' ),
				'col-mobile-9'			=> __( '9', 'acf-responsive_options' ),
				'col-mobile-10'			=> __( '10', 'acf-responsive_options' ),
				'col-mobile-11'			=> __( '11', 'acf-responsive_options' ),
				'col-mobile-12'			=> __( '12', 'acf-responsive_options' ),
			) );

			$this->tablet_options = apply_filters( 'acf_responsive_options_tablet_options', array(
				'col-tablet-1'			=> __( '1', 'acf-responsive_options' ),
				'col-tablet-2'			=> __( '2', 'acf-responsive_options' ),
				'col-tablet-3'			=> __( '3', 'acf-responsive_options' ),
				'col-tablet-4'			=> __( '4', 'acf-responsive_options' ),
				'col-tablet-5'			=> __( '5', 'acf-responsive_options' ),
				'col-tablet-6'			=> __( '6', 'acf-responsive_options' ),
				'col-tablet-7'			=> __( '7', 'acf-responsive_options' ),
				'col-tablet-8'			=> __( '8', 'acf-responsive_options' ),
				'col-tablet-9'			=> __( '9', 'acf-responsive_options' ),
				'col-tablet-10'			=> __( '10', 'acf-responsive_options' ),
				'col-tablet-11'			=> __( '11', 'acf-responsive_options' ),
				'col-tablet-12'			=> __( '12', 'acf-responsive_options' ),
			) );

			$this->center_tablet_options = apply_filters( 'acf_responsive_options_center_tablet_options', array(
				'center'				=> __( '1', 'acf-responsive_options' ),
			) );

			$this->center_tablet_options = apply_filters( 'acf_responsive_options_center_tablet_options', array(
				'no'			=> __( 'No', 'acf-responsive_options' ),
				'yes'			=> __( 'Yes', 'acf-responsive_options' ),
			) );

			$this->desk_options = apply_filters( 'acf_responsive_options_desk_options', array(
				'col-desk-1'			=> __( '1', 'acf-responsive_options' ),
				'col-desk-2'			=> __( '2', 'acf-responsive_options' ),
				'col-desk-3'			=> __( '3', 'acf-responsive_options' ),
				'col-desk-4'			=> __( '4', 'acf-responsive_options' ),
				'col-desk-5'			=> __( '5', 'acf-responsive_options' ),
				'col-desk-6'			=> __( '6', 'acf-responsive_options' ),
				'col-desk-7'			=> __( '7', 'acf-responsive_options' ),
				'col-desk-8'			=> __( '8', 'acf-responsive_options' ),
				'col-desk-9'			=> __( '9', 'acf-responsive_options' ),
				'col-desk-10'			=> __( '10', 'acf-responsive_options' ),
				'col-desk-11'			=> __( '11', 'acf-responsive_options' ),
				'col-desk-12'			=> __( '12', 'acf-responsive_options' ),
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

			// Default Unique ID
			acf_render_field_wrap(array(
				'label'					=> __( 'Default Unique ID', 'acf-responsive_options' ),
				'type'					=> 'text',
				'name'					=> 'unique_id',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['unique_id'],
				'wrapper'				=> array(
					'data-name' 	=> 'responsive-options-wrapper'
				)
			), 'tr');

			// Default Colour
			acf_render_field_wrap(array(
				'label'					=> __( 'Default Backgorund Colour', 'acf-responsive_options' ),
				'type'					=> 'select',
				'name'					=> 'background_colour',
				'choices'				=> $this->background_color,
				'prefix'				=> $field['prefix'],
				'value'					=> $field['background_color'],
				'wrapper'				=> array(
					'data-name' 	=> 'responsive-options-wrapper'
				)
			), 'tr');

			// Default Mobile
			acf_render_field_wrap(array(
				'label'					=> __( 'Default Mobile Style', 'acf-responsive_options' ),
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
				'label'					=> __( 'Default Tablet Style', 'acf-responsive_options' ),
				'type'					=> 'select',
				'name'					=> 'size_on_tablet',
				'choices'				=> $this->tablet_options,
				'prefix'				=> $field['prefix'],
				'value'					=> $field['size_on_tablet'],
				'wrapper'				=> array(
					'data-name' 	=> 'responsive-options-wrapper'
				)
			), 'tr');

			// Default Parallax
			acf_render_field_wrap(array(
				'label'					=> __( 'Default Tablet Center Option', 'acf-section_styles' ),
				'type'					=> 'select',
				'name'					=> 'center_tablet_options',
				'choices'				=> $this->center_tablet_options,
				'prefix'				=> $field['prefix'],
				'value'					=> $field['center_tablet_options'],
				'wrapper'				=> array(
					'data-name' 	=> 'center_tablet_options-wrapper'
				)
			), 'tr');

			// Default desk
			acf_render_field_wrap(array(
				'label'					=> __( 'Default Desk Style', 'acf-responsive_options' ),
				'type'					=> 'select',
				'name'					=> 'size_on_desk',
				'choices'				=> $this->desk_options,
				'prefix'				=> $field['prefix'],
				'value'					=> $field['size_on_desk'],
				'wrapper'				=> array(
					'data-name' 	=> 'responsive-options-wrapper'
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
				$field['value']['unique_id'] 				= $field['unique_id'];
				$field['value']['background_colour'] 		= $field['background_colour'];
				$field['value']['size_on_mobile'] 			= $field['size_on_mobile'];
				$field['value']['size_on_tablet'] 			= $field['size_on_tablet'];
				$field['value']['center_tablet_options'] 	= $field['center_tablet_options'];
				$field['value']['size_on_desk'] 			= $field['size_on_desk'];
				}
			?>
			<div class="acf-pb-options-modal-triggers">
				<div class="box-model-trigger"><a class="acf-button button button-primary" href="#response-modal">Column Options<span class="acf-icon -pencil small"</span></a></div>
			</div>
			<div class="acf-responsive-options-container" tabindex="-1">
				<div id="response-modal" class="acf-pb-options-modal">
					<div class="modal-header"><span class="modal-label">Column Options</span><div class="modal-close"><span class="screen-reader-text">Close</span><span class="tb-close-icon"></span></div></div>
						<div class="modal-inner">
						<!-- Responsive Options -->
						<div class="acf-section-responsive-options">

							<div class="acf-responsive-options-input-row">
								<div class="acf-responsive-options-input">
									<!-- Colour Options -->
									<div class="acf-responsive-options-unique-id-container">
										<div class="acf-label">
											<label for= ""><?php _e( 'Unique ID', 'acf-responsive_options' ); ?></label>
										</div>
										<input type="text" id="<?php echo $field['id']; ?>_unique_id" name="<?php echo esc_attr($field['name']) ?>[unique_id]" value="<?php if ( !empty( $field['value']['unique_id'] ) && $field['value']['unique_id']  ) echo $field['value']['unique_id']; ?>">
				
									</div>
									<!-- End Colour Options -->
								</div>
								<div class="acf-responsive-options-input">
									<!-- Colour Options -->
									<div class="acf-responsive-options-background-container">
										<div class="acf-label">
											<label for= ""><?php _e( 'Background Colour', 'acf-responsive_options' ); ?></label>
										</div>

										<select id="<?php echo $field['id']; ?>_background_colour" name="<?php echo esc_attr($field['name']) ?>[background_colour]">
											<?php foreach ( $this->background_color as $v => $label ): ?>
											<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['background_colour'] ) && $field['value']['background_colour'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<!-- End Colour Options -->
								</div>
								<div class="acf-responsive-options-input">
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
								<div class="acf-responsive-options-input">
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
										<div class="acf-label">
											<label for= ""><?php _e( 'Center on Tablets', 'acf-responsive_options' ); ?></label>
										</div>

										<select id="<?php echo $field['id']; ?>_center_tablet_options" name="<?php echo esc_attr($field['name']) ?>[center_tablet_options]">
											<?php foreach ( $this->center_tablet_options as $v => $label ): ?>
											<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['center_tablet_options'] ) && $field['value']['center_tablet_options'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<!-- End tablet Options -->
								</div>
								<div class="acf-responsive-options-input">
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
						<!-- End Style Options -->
					</div>
				</div>
			</div> <!-- End .acf-section-styles-container -->
		<?php
		}

	}

	// initialize
	new acf_field_responsive_options( $this->settings );

// class_exists check
endif;
