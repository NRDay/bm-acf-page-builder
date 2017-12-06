<?php 
    $images         = get_sub_field('images');
    $columns        = get_sub_field('columns');
    $last_link      = get_sub_field('last_item_link');
    $remove_gutter  = get_sub_field('remove_spaces');

    $gallery_classes = '';
    if ($remove_gutter === 'yes' ) {
        $gallery_classes .= 'col-collapse ';
    }
    $gallery_classes .=' gallery gallery-columns-'.$columns;
    if( $images ): ?>
        <div class="<?php echo $gallery_classes;?>">
                <?php foreach( $images as $image ): ?>
                <div class="gallery-item">
                    <div class="aspect-wrapper">
                        <a rel="gallery-1" href="<?php echo $image['url']; ?>" class="swipebox">
                            <img src="<?php echo $image['sizes']['pull-thumb']; ?>" alt="<?php echo $image['alt']; ?>">
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php if ($last_link == 'yes') { ?>
                <div class="gallery-item">
                    <div class="aspect-wrapper">
                        <a href="#" class="gallery-link">
                            <span>View the full gallery</span>
                        </a>
                    </div>
                </div>
                <?php } ?>
                
        </div>
    <?php endif; 
?>     
