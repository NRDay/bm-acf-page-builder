<?php 
    $bg_url    		= get_sub_field('background_image');
    $heading   		= get_sub_field('heading_text');
    $main_text   	= get_sub_field('main_text');
    $link_choice 	= get_sub_field('internal_or_external_link');
    
    if ( $link_choice === 'internal') {
    	$link = get_sub_field('internal_link');
    } elseif ( $link_choice === 'external' ) {
    	$link = get_sub_field('external_url');
    };

    $link_text   	= get_sub_field('link_text');
?>

<div class="background-card" style="background-image:url(<?php echo $bg_url;?>)">
    <h3><?php echo $heading;?></h3>
    <p><?php echo $main_text;?></p>
    <a class="button" href="<?php echo $link;?>" <?php if ( $link_choice == 'external' ) { echo 'target="_BLANK"'; }?>><?php echo $link_text;?></a>
</div>