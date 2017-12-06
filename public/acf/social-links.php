<?php 

if( have_rows('social_links','option') ):

 	// loop through the rows of data
    while ( have_rows('social_links') ) : the_row();

        // display a sub field value
        the_sub_field('account_name');

    endwhile;

else :

    // no rows found

endif;

?>

