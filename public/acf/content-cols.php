<?php 

/* Page Builder 2 Columns*/

// Use counter to give each section a unique UD
$section_id = '';
if ($acf_pb_counter) {
		$section_id = 'page-'.$acf_pb_counter;
} 

// Get Section Styles
$section_options = get_sub_field('section_styles');


// Variable to store classes
$section_classes = '';

//variable to store data attributes;
$data = '';

// Add Full Width if selected
if ($section_options['make_full_width'] === 'yes' ) {
	$section_classes .=	' full-width';
}

// Add Animation Classes if selected
$animation_classes = '';
$animation_data_add = '';
$animation_data_remove = '';
if ($section_options['animation_type'] !== 'none' ) {
	$animation_classes .=	' to-animate hidden animated';
	$animation_data_add = ' data-vp-add-class="'.$section_options['animation_type'].' visible"';
	$animation_data_remove = ' data-vp-remove-class="hidden"';
}

// Add parallax data if selected 
$parallax_data = '';
if ($section_options['background_style'] == 'parallax') {
	$img_id = $section_options['background_image'];
	$img_url = wp_get_attachment_image_src( $img_id, 'full');
	$parallax_data = 'data-parallax="scroll" data-image-src="'.$img_url[0].'"';
}

// Get Alignment options
$align_classes = '';
if ( $section_options['show_alignment'] === 'yes' ) {	
	$h_align = ' h-align-content-'.$section_options['desktop_h_align'];
	$v_align = ' grid--'.$section_options['desktop_v_align'];
	$align_classes = $h_align.$v_align;
}

?>
<section id="pb-section-<?php echo $section_id;?>" class="page-builder-row<? echo $section_classes;?>"<?php echo $parallax_data; ?>>
	
	<?php if ($section_options['make_full_width'] === 'yes' ) {
		echo '<div class="full-width-inner">';
	}?>
	<div class="section-content<? echo $animation_classes;?>"<?php echo $animation_data_add.$animation_data_remove; ?>>
		<div class="grid<?php echo $align_classes;?>">
			<?php 
			$column_count = 1;
			foreach ($acf_pb_layouts as $key => $value) {

				//Dynamic Variables
			    $responsive = get_sub_field($acf_pb_prefix.$value.'_column_options');


			    $responsive_classes = '';
				$responsive_classes.= ' col--'.$responsive['size_on_mobile'].'-12';
				$responsive_classes.= ' tablet--'.$responsive['size_on_tablet'].'-12';
				$responsive_classes.= ' desk--'.$responsive['size_on_desk'].'-12';

				$parallax_data = '';
				if ($responsive['background_style'] == 'parallax') {
					$img_url = $responsive['background_image']['url'];
					$parallax_data = 'data-parallax="scroll" data-image-src="'.$img_url.'"';
				}

				// Get Alignment options
				$align_classes = '';
				if ( $responsive['show_alignment'] === 'yes' ) {	
					$h_align = ' h-align-content-'.$responsive['desktop_h_align'];
					$responsive_classes.= $h_align;
				}

				if( have_rows($acf_pb_prefix.$value.'_elements_elements') ): 
					$element_count = 1; //Counter so we can give each element in the column a unique class?>
					
					<div class="grid__item column-<?php echo $acf_pb_counter.'-'.$column_count.$responsive_classes;?>">
						<div class="grid__item-content"<?php echo $parallax_data; ?>>
							<?php 
							
							while ( have_rows($acf_pb_prefix.$value.'_elements_elements') ) : the_row();	
								

								$file = get_row_layout();
								include(locate_template('bm-acf-pb-layouts/acf-'. get_row_layout() .'.php'));

								//Increment element count
								$element_count++;

						    endwhile; 
						    ?>
						</div>
					</div>

				<?php endif;
				$responsive_classes = null;
				$column_count++;
			} ?>
		</div>
	</div>
	<?php if ($section_options['make_full_width'] === 'yes' ) {
		echo '</div>';
	}?>
</section>


