<?php 
    $hero_bg_url    = get_sub_field('hero_background');
    $hero_heading   = get_sub_field('hero_heading');
?>

<section class="hero" data-parallax="scroll" data-image-src="<?php echo $hero_bg_url; ?>">
    <div class="hero-overlay"></div>
    <h1><?php echo $hero_heading; ?></h1>
</section>