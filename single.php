	
<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all post by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'post' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flitwp-Template
 */

get_header();

?>


<?php 
            
             
            

               
            
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/single', get_post_type() );
                    endwhile;
                    else:  get_template_part( 'template-parts/single','none' );    
                endif;
                  
     
        ?>



<?php

get_footer();
