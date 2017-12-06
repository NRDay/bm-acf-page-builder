<div class="reviews">
    <div class="slider-wrapper">
    	<div class="review-slider">
			<?php 
				// WP_Query arguments
				$args = array (
					'post_type'              => array( 'review' ),
				);

				// The Query
				$query = new WP_Query( $args );

				// The Loop
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post(); 
			                $author 	= get_field('name');
			                $review 	= get_field('review');
			                $date 		= get_field('date'); ?>
			                <div class="review">
						        <?php echo $review; ?>
						        <span class="name"><?php echo $author; ?> - <?php echo $date; ?></span>
						    </div>
					<?php }
				} else {
					// no posts found
				}

				// Restore original Post Data
				wp_reset_postdata();
			?>
		</div>
	</div>
</div>