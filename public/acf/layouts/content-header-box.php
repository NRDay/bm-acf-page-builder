<?php 
/* Header Box Layout */
	$h_style = get_sub_field('header_text_style');
	$h_align = get_sub_field('alignment');
	$h_text = get_sub_field('header_text');
	
	?>	
	<div class="acf-pb-header-block clear" style="<?php echo $h_align.';';?><?php echo 'color:'.$text_color.';';?>">

		<?php if ($h_text) {
			echo '<'.$h_style.'>'.$h_text.'</'.$h_style.'>';
		};
		$h_sub_text = get_sub_field('sub_text');
		if ($h_sub_text) { ?>
			<p><?php echo $h_sub_text ?></p>
		<?php }; ?>
	</div>