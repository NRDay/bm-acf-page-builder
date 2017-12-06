<!-- Responsive Options -->
							<?php if ($field['show_responsive'] == 'yes') { ?>
							<div class="acf-pb-section acf-section-responsive-options">
								<h2 class="acf-pb-section-header">Responsive Options</h2>
								<div class="acf-pb-section-inner">
									<div class="acf-responsive-options-input-row">
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
							</div>
							<?php } ?>
							<!-- End Responsive Options -->