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
<div class="reservable-areas<?php echo $wrapper_responsive_classes;?>">
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
		if ( get_sub_field('choose_areas') === 'specific') :
			$packages = get_sub_field('select_areas');
			$args = array (
				'post_type'             => array( 'area' ),
				'post__in'				=> $packages,
				'orderby'				=> 'post__in',
			);
		elseif ( get_sub_field('choose_areas') === 'all') : 
			$args = array (
				'post_type'             => array( 'area' ),
				'orderby'				=> 'menu_order',
				'order'					=> 'ASC',
			);
		endif;

		// The Query
		$query = new WP_Query( $args );

		// The Loop
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post(); 
					$capacity		= get_field('capacity');
	                $description 	= get_field('description');
	                $image 			= get_field('image'); 


					if( !empty($image) ) {

						// vars
						$url = $image['url'];
						

						// thumbnail
						$size = 'pull-thumb';
						$thumb = $image['sizes'][ $size ];

					} ?>
	                <div class="area-single grid-item<?php echo $responsive_classes;?>">
				        <h3 class="area-name"><?php the_title(); ?></h3>
				        <div class="area-image">
				        	<img src="<?php echo $thumb;?>" alt="">
				        </div>
				        <a class="modal-trigger" href="#area-<?php echo the_id();?>-modal" rel="modal:open"></a>

						<!-- Modal HTML embedded directly into document -->
						<div class="modal" id="area-<?php the_id();?>-modal" style="display:none;">
						  	<h3><?php the_title(); ?></h3>
						  	<?php echo $description;?>
						  	<a class="inner-close" href="#" rel="modal:close">CLOSE</a>
						</div>
				    </div>
			<?php }
		} else {
			// no posts found
		}

		// Restore original Post Data
		wp_reset_postdata();
	?>
		
</div>