<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package fletwp
 */


get_header();
    
?>

        <?php 
            
             //the_archive_title( '<h1 class="page-title">', '</h1>' );
            if ( have_posts() ) : 
            
            
                get_template_part( 'template-parts/content', 'archive' );
            
               
            else :

                get_template_part( 'template-parts/content', 'none' );

            endif;
        ?> 
    


<?php

get_footer();
