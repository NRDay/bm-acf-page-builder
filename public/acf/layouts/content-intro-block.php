<?php 

    //H Tag options
    $h_text             = get_sub_field('heading');
    $h_style            = get_sub_field('heading_style');
    $h_color            = get_sub_field('heading_color');
    $border             = get_sub_field('show_border');
    $border_color       = get_sub_field('border_color');
    $border_pos         = get_sub_field('border_position');

    //H Tag Classes
    $h_classes          = '';
    $h_classes          .= 'bm-pb-font-color-'.$h_color;

    if ($border === 'yes') {
        $h_classes      .= ' pb-border';
        $h_classes      .= ' pb-border-'.$border_pos;
        $h_classes      .= ' pb-border-'.$border_color;
    }

    //Sub Heading Options
    $sub_heading        = get_sub_field('sub_heading');
    $sub_heading_color  = get_sub_field('sub_heading_text_color');

    //Sub Heading Classes
    $sub_classes        = 'bm-pb-font-color-'.$sub_heading_color;
    
    //WYSIWYG Options
    $wysiwyg            = get_sub_field('main_copy');
    $wysiwyg_color      = get_sub_field('main_copy_text_color');

    //WYSIWYG Classes
    $wysiwyg_classes    = 'bm-pb-font-color-'.$wysiwyg_color;


?>

<section class="intro-block">
    <?php 
    	if ($h_text) {
    		if ($h_style === 'h1') : 
    		echo '<h1 class="'.$h_classes.'">'.$h_text.'</h1>';
	    	elseif ($h_style === 'h2') : 
	    		echo '<h2 class="'.$h_classes.'">'.$h_text.'</h2>';
	    	elseif ($h_style === 'h3') : 
	    		echo '<h3 class="'.$h_classes.'">'.$h_text.'</h3>';
	    	elseif ($h_style === 'h4') : 
	    		echo '<h4 class="'.$h_classes.'">'.$h_text.'</h4>';
	    	elseif ($h_style === 'h5' ) : 
	    		echo '<h5 class="'.$h_classes.'">'.$h_text.'</h5>';
	    	elseif ($h_style === 'h6') : 
	    		echo '<h6 class="'.$h_classes.'">'.$h_text.'</h6>';
	    	endif;
    	}
    ?>
    <?php 
    	if ($sub_heading) { ?>
			<p class="sub-heading <?php echo $sub_classes;?>"><?php echo $sub_heading; ?></p>
    <?php } ;?>

    <?php 
        if ($wysiwyg) { ?>
        <div class="pb-wysiwyg <?php echo $wysiwyg_classes;?>">
            <?php echo $wysiwyg; ?>
        </div>
    <?php } ;?>
</section>