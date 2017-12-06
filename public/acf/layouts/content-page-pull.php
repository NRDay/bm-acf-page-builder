<?php 

    //Column Options
    $responsive_classes = '';
    if ( get_sub_field('item_width_on_desktops') ) {
        $responsive_classes .= ' col-desk-'.get_sub_field('item_width_on_desktops');
    }
    if ( get_sub_field('item_width_on_tablets') ) {
        $responsive_classes .= ' col-tablet-'.get_sub_field('item_width_on_tablets');
    }
    if ( get_sub_field('item_width_on_mobiles') ) {
        $responsive_classes .= ' col-mobile-'.get_sub_field('item_width_on_mobiles');
    }

    $wrapper_responsive_classes = '';
    //Last Item Centre Options
    if ( get_sub_field('centre_last_item_on_desktops') === 'yes') {
        $wrapper_responsive_classes .= ' center-last-desktop';
    }
    //Last Item Centre Options
    if ( get_sub_field('centre_last_item_on_tablets') === 'yes') {
        $wrapper_responsive_classes .= ' center-last-tablet';
    }
    //Last Item Centre Options
    if ( get_sub_field('centre_last_item_on_mobiles') === 'yes') {
        $wrapper_responsive_classes .= ' center-last-mobile';
    }

    $pages = get_sub_field('show_pages');
    // WP_Query arguments
    $args = array(
        'post_type' => 'page',
        'post__in' => $pages,
        'orderby' => 'post__in',
    );
    ?>
    <div class="page-pull<?php echo $wrapper_responsive_classes;?>">
    <?php 
        // The Query
        $query = new WP_Query( $args );

        // The Loop

        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post(); 
                $thumb_id = get_post_thumbnail_id();
                $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'pull-thumb', true);
                $thumb_url = $thumb_url_array[0]; ?>
                <div class="page-pull-single grid-item<?php echo $responsive_classes;?>">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo $thumb_url; ?>" alt="<?php the_title(); ?>">
                        <h3><?php the_title(); ?></h3>
                        <p><?php echo excerpt(55);?></p>
                    </a>
                </div>
               
            <?php }
        } else {
            // no posts found
        }

        // Restore original Post Data
        wp_reset_postdata();
    ?>
    </div>