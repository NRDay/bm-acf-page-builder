<?php 
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
?>
<div class="beverage-packages<?php echo $wrapper_responsive_classes;?>">
	<?php 
		//Column Options
	$responsive_classes = '';
		if ( get_sub_field('columns') ) {
			$responsive_classes.= ' col-desk-'.get_sub_field('columns');
		}
		if ( get_sub_field('columns_tablet') ) {
			$responsive_classes.= ' col-tablet-'.get_sub_field('columns_tablet');
		}
		if ( get_sub_field('columns_mobile') ) {
			$responsive_classes.= ' col-mobile-'.get_sub_field('columns_mobile');
		}
	?>
	<?php 
		// WP_Query arguments
		if ( get_sub_field('choose__packages') === 'specific') :
			$packages = get_sub_field('select_packages');
			$args = array (
				'post_type'             => array( 'package' ),
				'orderby'				=> 'title',
				'order'					=> 'ASC',
				'post__in'				=> $packages,
			);
		elseif ( get_sub_field('choose__packages') === 'all') : 
			$args = array (
				'post_type'             => array( 'package' ),
				'orderby'				=> 'title',
				'order'					=> 'ASC',
			);
		endif;
		
		// The Query
		$query = new WP_Query( $args );

		// The Loop
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post(); 
	                $description 	= get_field('description');
	                $price 			= get_field('price'); 
	                $image 			= get_field('image');


					if( !empty($image) ) {

						// vars
						$url = $image['url'];
						

						// thumbnail
						$size = 'pull-thumb';
						$thumb = $image['sizes'][ $size ];

					} ?>
	                <div class="package-single grid-item<?php echo $responsive_classes;?>">
				        <h3><?php the_title(); ?></h3>
				        <span class="price">£<?php echo $price;?></span>
						<?php echo $description;?>
				    </div>
			<?php }
		} else {
			// no posts found
		}

		// Restore original Post Data
		wp_reset_postdata();
	?>
		
</div>