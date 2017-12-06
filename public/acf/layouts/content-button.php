<?php 
	//Get fields
	$button_text = get_sub_field('button_text');
	$internal_or_external_link = get_sub_field('internal_or_external_link');
	if ($internal_or_external_link === 'internal') :
		$link = get_permalink( get_sub_field( 'internal_link[0]' ) );
	elseif ($internal_or_external_link === 'external') :
		$link = get_sub_field( 'external_lkink' ) ;
	endif;	
?>
<div class="button-holder">
	<a class="btn btn-<?php the_sub_field('button_colour');?>" href="<?php echo $link;?>"><?php echo $button_text;?></a>
</div>
