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

    $posts = get_sub_field('posts');

	// WP_Query arguments
	$args = array (
		'post_type'              => array( 'post' ),
		'post__in' 				 => $posts,
	);
    ?>
    <div class="content-blog-pull<?php echo $wrapper_responsive_classes;?>">
    <?php 
        // The Query
        $query = new WP_Query( $args );

		// The Loop
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post(); 
	                $thumb_id = get_post_thumbnail_id();
	                $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'medium', true);
	                $thumb_url = $thumb_url_array[0]; ?>
	                <div class="blog-pull-single grid-item<?php echo $responsive_classes;?>">
	                	<a href="<?php the_permalink(); ?>">
	                    	<img src="<?php echo $thumb_url; ?>" alt="<?php the_title(); ?>">
	                    	<?php the_date('d M, Y', '<span class="date">', '</span>'); ?>
	                    	<?php 
								$h1_display = get_field('display_h1'); 
								if ($h1_display) : ?>
									<h3><?php echo $h1_display; ?></h3>
								<?php else :
									the_title( '<h3>', '</h3>' ); 
								endif;	
							?>
	                        <p><?php echo excerpt(30);?></p>
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